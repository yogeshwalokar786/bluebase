<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use App\Models\ChatSession;
use Illuminate\Http\Request;

class ChatCmsController extends Controller
{
    /**
     * Display list of all chat sessions.
     */
    public function index(Request $request)
    {
        $query = ChatSession::withCount('messages')->orderBy('last_message_at', 'desc')->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('visitor_name', 'like', "%{$search}%")
                  ->orWhere('visitor_email', 'like', "%{$search}%")
                  ->orWhere('session_uuid', 'like', "%{$search}%")
                  ->orWhere('ip_address', 'like', "%{$search}%");
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('step')) {
            $query->where('step', $request->step);
        }

        $sessions = $query->paginate(20)->withQueryString();

        $stats = [
            'total' => ChatSession::count(),
            'with_leads' => ChatSession::whereNotNull('visitor_email')->count(),
            'active' => ChatSession::where('status', 'active')->count(),
            'conversing' => ChatSession::where('step', 'conversing')->count(),
        ];

        return view('admin.chats.index', compact('sessions', 'stats'));
    }

    /**
     * Display single conversation transcript.
     */
    public function show($id)
    {
        $session = ChatSession::with(['messages' => function ($q) {
            $q->orderBy('created_at', 'asc');
        }])->findOrFail($id);

        return view('admin.chats.show', compact('session'));
    }

    /**
     * Toggle session status (active / closed).
     */
    public function toggle($id)
    {
        $session = ChatSession::findOrFail($id);
        $session->status = ($session->status === 'active') ? 'closed' : 'active';
        $session->save();

        return redirect()->back()->with('success', "Chat session marked as {$session->status}.");
    }

    /**
     * Delete a chat session and its transcripts.
     */
    public function destroy($id)
    {
        $session = ChatSession::findOrFail($id);
        $session->delete();

        return redirect()->route('admin.chats.index')->with('success', 'Chat session and transcript deleted successfully.');
    }
}
