<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailMessage;
use App\Services\MailboxService;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(Request $request)
    {
        EmailMessage::ensureTableExists();

        // If the mailbox is empty, backfill existing website inquiries automatically
        try {
            if (EmailMessage::count() === 0) {
                MailboxService::syncExistingWebsiteInquiries();
            }
        } catch (\Throwable $e) {}

        $folder = $request->input('folder', 'inbox');
        $search = trim($request->input('search', ''));
        $selectedId = $request->input('selected_id');

        $query = EmailMessage::query();

        if ($folder === 'starred') {
            $query->where('is_starred', true)->where('folder', '!=', 'trash');
        } elseif ($folder === 'all') {
            $query->where('folder', '!=', 'trash');
        } else {
            $query->where('folder', $folder);
        }

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('subject', 'like', "%{$search}%")
                  ->orWhere('sender_name', 'like', "%{$search}%")
                  ->orWhere('sender_email', 'like', "%{$search}%")
                  ->orWhere('recipient_email', 'like', "%{$search}%")
                  ->orWhere('body', 'like', "%{$search}%");
            });
        }

        $messages = $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();

        // Calculate folder counts
        $counts = [
            'inbox_unread' => rescue(fn() => EmailMessage::where('folder', 'inbox')->where('is_read', false)->count(), 0),
            'inbox_total' => rescue(fn() => EmailMessage::where('folder', 'inbox')->count(), 0),
            'sent_total' => rescue(fn() => EmailMessage::where('folder', 'sent')->count(), 0),
            'starred_total' => rescue(fn() => EmailMessage::where('is_starred', true)->where('folder', '!=', 'trash')->count(), 0),
            'trash_total' => rescue(fn() => EmailMessage::where('folder', 'trash')->count(), 0),
        ];

        // Resolve selected message and its conversation thread
        $selectedMessage = null;
        $thread = collect();

        if ($selectedId) {
            $selectedMessage = EmailMessage::find($selectedId);
            if ($selectedMessage) {
                if (!$selectedMessage->is_read && $selectedMessage->folder === 'inbox') {
                    $selectedMessage->update(['is_read' => true]);
                    $counts['inbox_unread'] = max(0, $counts['inbox_unread'] - 1);
                }
                $thread = $selectedMessage->conversationThread();
            }
        } elseif ($messages->count() > 0 && !$request->has('page')) {
            // Default to selecting the first message
            $selectedMessage = $messages->first();
            if ($selectedMessage) {
                if (!$selectedMessage->is_read && $selectedMessage->folder === 'inbox') {
                    $selectedMessage->update(['is_read' => true]);
                    $counts['inbox_unread'] = max(0, $counts['inbox_unread'] - 1);
                }
                $thread = $selectedMessage->conversationThread();
            }
        }

        $signature = MailboxService::getDefaultSignature();

        return view('admin.mail.index', compact('messages', 'folder', 'search', 'selectedMessage', 'thread', 'counts', 'signature'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'recipient_email' => 'required|email|max:255',
            'recipient_name' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
            'cc' => 'nullable|string',
            'bcc' => 'nullable|string',
            'parent_id' => 'nullable|integer',
            'inquiry_id' => 'nullable|integer',
            'inquiry_type' => 'nullable|string',
            'signature' => 'nullable|string',
            'include_signature' => 'nullable',
            'attachments.*' => 'nullable|file|max:10240', // 10MB per file
        ]);

        $payload = $validated;
        if ($request->hasFile('attachments')) {
            $payload['attachments'] = $request->file('attachments');
        }
        $payload['include_signature'] = $request->has('include_signature');

        try {
            $sent = MailboxService::sendMail($payload);
            return redirect()->route('admin.mail.index', [
                'folder' => $request->input('folder', 'sent'),
                'selected_id' => $sent->id,
            ])->with('success', 'Email sent successfully via SMTP to ' . $validated['recipient_email']);
        } catch (\Throwable $e) {
            return back()->withInput()->with('error', 'Failed to dispatch email: ' . $e->getMessage());
        }
    }

    public function updateSignature(Request $request)
    {
        $request->validate([
            'mail_signature' => 'required|string',
        ]);

        try {
            \App\Models\SiteSetting::set('mail_signature', $request->input('mail_signature'));
            return back()->with('success', 'Email signature updated successfully.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Failed to update signature: ' . $e->getMessage());
        }
    }

    public function bulk(Request $request)
    {
        $action = $request->input('action');
        $ids = $request->input('ids', []);

        if (empty($ids) || !is_array($ids)) {
            return back()->with('error', 'Please select at least one email message.');
        }

        switch ($action) {
            case 'trash':
                EmailMessage::whereIn('id', $ids)->update(['folder' => 'trash']);
                $msg = count($ids) . ' message(s) moved to Trash.';
                break;
            case 'restore':
                foreach ($ids as $id) {
                    $m = EmailMessage::find($id);
                    if ($m) {
                        $m->update(['folder' => ($m->status === 'sent') ? 'sent' : 'inbox']);
                    }
                }
                $msg = count($ids) . ' message(s) restored.';
                break;
            case 'delete':
                EmailMessage::whereIn('id', $ids)->delete();
                $msg = count($ids) . ' message(s) permanently deleted.';
                break;
            case 'mark_read':
                EmailMessage::whereIn('id', $ids)->update(['is_read' => true]);
                $msg = count($ids) . ' message(s) marked as read.';
                break;
            case 'mark_unread':
                EmailMessage::whereIn('id', $ids)->update(['is_read' => false]);
                $msg = count($ids) . ' message(s) marked as unread.';
                break;
            case 'star':
                EmailMessage::whereIn('id', $ids)->update(['is_starred' => true]);
                $msg = count($ids) . ' message(s) starred.';
                break;
            default:
                $msg = 'No action performed.';
        }

        return back()->with('success', $msg);
    }

    public function toggleStar(Request $request, $id)
    {
        $message = EmailMessage::findOrFail($id);
        $message->update(['is_starred' => !$message->is_starred]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'is_starred' => $message->is_starred]);
        }

        return back()->with('success', $message->is_starred ? 'Email marked as starred.' : 'Email removed from starred.');
    }

    public function toggleRead(Request $request, $id)
    {
        $message = EmailMessage::findOrFail($id);
        $message->update(['is_read' => !$message->is_read]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'is_read' => $message->is_read]);
        }

        return back()->with('success', $message->is_read ? 'Marked as read.' : 'Marked as unread.');
    }

    public function moveToTrash($id)
    {
        $message = EmailMessage::findOrFail($id);
        $message->update(['folder' => 'trash']);

        return redirect()->route('admin.mail.index', ['folder' => 'trash'])
            ->with('success', 'Email moved to Trash.');
    }

    public function restore($id)
    {
        $message = EmailMessage::findOrFail($id);
        $targetFolder = ($message->status === 'sent') ? 'sent' : 'inbox';
        $message->update(['folder' => $targetFolder]);

        return redirect()->route('admin.mail.index', ['folder' => $targetFolder, 'selected_id' => $message->id])
            ->with('success', "Email restored to {$targetFolder}.");
    }

    public function destroy($id)
    {
        $message = EmailMessage::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.mail.index', ['folder' => 'trash'])
            ->with('success', 'Email permanently deleted.');
    }

    public function sync()
    {
        $inquiriesImported = MailboxService::syncExistingWebsiteInquiries();
        $imapResult = MailboxService::syncImapInbox();

        $totalNew = $inquiriesImported + ($imapResult['count'] ?? 0);
        $note = "Mailbox synchronized! {$inquiriesImported} website inquiries checked.";
        if (!empty($imapResult['message'])) {
            $note .= ' ' . $imapResult['message'];
        }

        return redirect()->route('admin.mail.index', ['folder' => 'inbox'])
            ->with('success', $note);
    }
}
