<?php

namespace App\Services;

use App\Models\EmailMessage;
use App\Models\ContactInquiry;
use App\Models\DemoBooking;
use App\Models\TrialRequest;
use App\Models\PartnerApplication;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class MailboxService
{
    /**
     * Configure Laravel Mail runtime dynamically using admin CMS credentials.
     */
    public static function configureRuntimeSmtp(): void
    {
        try {
            $host = SiteSetting::get('smtp_host');
            if (!empty($host)) {
                config([
                    'mail.default' => 'smtp',
                    'mail.mailers.smtp.host' => $host,
                    'mail.mailers.smtp.port' => (int) SiteSetting::get('smtp_port', 587),
                    'mail.mailers.smtp.encryption' => SiteSetting::get('smtp_encryption', 'tls') ?: null,
                    'mail.mailers.smtp.username' => SiteSetting::get('smtp_username'),
                    'mail.mailers.smtp.password' => SiteSetting::get('smtp_password'),
                ]);
            }

            $fromAddress = SiteSetting::get('mail_from_address') ?: SiteSetting::get('contact_email', config('mail.from.address'));
            if (!empty($fromAddress)) {
                config(['mail.from.address' => $fromAddress]);
            }

            $fromName = SiteSetting::get('mail_from_name') ?: SiteSetting::get('site_name', config('mail.from.name'));
            if (!empty($fromName)) {
                config(['mail.from.name' => $fromName]);
            }
        } catch (\Throwable $e) {
            Log::warning('MailboxService configureRuntimeSmtp error: ' . $e->getMessage());
        }
    }

    /**
     * Send outgoing email via SMTP and log it into EmailMessage (Sent folder).
     */
    public static function sendMail(array $payload): EmailMessage
    {
        EmailMessage::ensureTableExists();
        self::configureRuntimeSmtp();

        $fromAddress = config('mail.from.address', 'info@bluebasetechnologies.com');
        $fromName = config('mail.from.name', 'Bluebase Technologies');

        $toEmail = trim($payload['recipient_email']);
        $toName = $payload['recipient_name'] ?? null;
        $subject = trim($payload['subject']);
        $body = $payload['body'];
        $parentId = $payload['parent_id'] ?? null;
        $inquiryType = $payload['inquiry_type'] ?? 'direct';
        $inquiryId = $payload['inquiry_id'] ?? null;
        $includeSignature = filter_var($payload['include_signature'] ?? true, FILTER_VALIDATE_BOOLEAN);

        // Append corporate signature if requested and not already present
        if ($includeSignature && !empty($payload['signature'])) {
            if (!str_contains($body, trim($payload['signature']))) {
                $body .= "\n\n" . trim($payload['signature']);
            }
        } elseif ($includeSignature) {
            $defaultSig = self::getDefaultSignature();
            if (!str_contains($body, '--')) {
                $body .= "\n\n" . $defaultSig;
            }
        }

        // Process file attachments if uploaded
        $savedAttachments = [];
        if (!empty($payload['attachments']) && is_array($payload['attachments'])) {
            foreach ($payload['attachments'] as $file) {
                if ($file instanceof \Illuminate\Http\UploadedFile && $file->isValid()) {
                    $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
                    $dir = public_path('uploads/mail_attachments');
                    if (!is_dir($dir)) {
                        @mkdir($dir, 0755, true);
                    }
                    $file->move($dir, $filename);
                    $savedAttachments[] = [
                        'name' => $file->getClientOriginalName(),
                        'path' => 'uploads/mail_attachments/' . $filename,
                        'url' => asset('uploads/mail_attachments/' . $filename),
                        'size' => filesize($dir . '/' . $filename),
                        'mime' => $file->getClientMimeType(),
                    ];
                }
            }
        }

        // Wrap message in clean enterprise HTML styling
        $formattedHtml = self::buildFormattedEmailHtml($subject, $body, $fromName);

        $status = 'sent';
        $errorMessage = null;

        try {
            Mail::html($formattedHtml, function ($message) use ($toEmail, $toName, $subject, $fromAddress, $fromName, $payload, $savedAttachments) {
                $message->from($fromAddress, $fromName)
                    ->replyTo($fromAddress, $fromName)
                    ->to($toEmail, $toName)
                    ->subject($subject);

                if (!empty($payload['cc'])) {
                    $message->cc(array_map('trim', explode(',', $payload['cc'])));
                }
                if (!empty($payload['bcc'])) {
                    $message->bcc(array_map('trim', explode(',', $payload['bcc'])));
                }

                if (!empty($savedAttachments)) {
                    foreach ($savedAttachments as $att) {
                        $fullPath = public_path($att['path']);
                        if (file_exists($fullPath)) {
                            $message->attach($fullPath, [
                                'as' => $att['name'],
                                'mime' => $att['mime'] ?? null,
                            ]);
                        }
                    }
                }
            });
        } catch (\Throwable $e) {
            $status = 'failed';
            $errorMessage = $e->getMessage();
            Log::error('MailboxService sendMail failed: ' . $e->getMessage());
        }

        $sentRecord = EmailMessage::create([
            'folder' => 'sent',
            'inquiry_type' => $inquiryType,
            'inquiry_id' => $inquiryId,
            'parent_id' => $parentId,
            'sender_name' => $fromName,
            'sender_email' => $fromAddress,
            'recipient_name' => $toName,
            'recipient_email' => $toEmail,
            'cc' => $payload['cc'] ?? null,
            'bcc' => $payload['bcc'] ?? null,
            'subject' => $subject,
            'body' => $body,
            'attachments' => !empty($savedAttachments) ? $savedAttachments : null,
            'is_read' => true,
            'is_starred' => false,
            'status' => $status,
            'error_message' => $errorMessage,
            'sent_at' => now(),
        ]);

        // If this is a reply to an existing email, mark the parent inquiry as read
        if ($parentId) {
            try {
                EmailMessage::where('id', $parentId)->update(['is_read' => true]);
            } catch (\Throwable $e) {}
        }

        if ($status === 'failed') {
            throw new \RuntimeException($errorMessage ?? 'Failed to deliver email through SMTP.');
        }

        return $sentRecord;
    }

    /**
     * Get or build corporate default email signature.
     */
    public static function getDefaultSignature(): string
    {
        $custom = SiteSetting::get('mail_signature');
        if (!empty($custom)) {
            return $custom;
        }

        $fromName = SiteSetting::get('mail_from_name', config('mail.from.name', 'Bluebase Technologies'));
        $fromEmail = SiteSetting::get('mail_from_address', config('mail.from.address', 'info@bluebasetechnologies.com'));
        $phone = SiteSetting::get('contact_phone', '+1 (800) 555-BLUE');

        return "--\nBest regards,\n{$fromName}\nBluebase Technologies\nEmail: {$fromEmail} | Tel: {$phone}\nWebsite: https://bluebasetechnologies.com\nDigital Engineering, Cloud Architecture & Autonomous AI Systems";
    }

    /**
     * Record an incoming customer lead/inquiry as an Inbox item in EmailMessage.
     */
    public static function recordIncomingInquiry(string $type, array $data, ?int $inquiryId = null): ?EmailMessage
    {
        EmailMessage::ensureTableExists();

        $senderName = $data['name'] ?? ($data['contact_name'] ?? 'Website Visitor');
        $senderEmail = $data['email'] ?? null;
        if (empty($senderEmail)) {
            return null;
        }

        $subject = match ($type) {
            'contact' => 'Website Inquiry: ' . ($data['service'] ?? 'General Information'),
            'demo' => 'Product Demo Consultation Request: ' . ($data['interested_product'] ?? 'Enterprise Platform'),
            'trial', 'estimate' => 'Project Architecture & Estimate Request: ' . ($data['company'] ?? 'Cloud Assessment'),
            'partner' => 'Enterprise Partner Application: ' . ($data['company_name'] ?? 'Alliance'),
            default => 'New Website Lead: ' . ($data['service'] ?? 'General Inquiry'),
        };

        $bodyParts = [];
        if (!empty($data['company']) || !empty($data['company_name'])) {
            $bodyParts[] = "Company: " . ($data['company'] ?? $data['company_name']);
        }
        if (!empty($data['phone'])) {
            $bodyParts[] = "Phone: " . $data['phone'];
        }
        if (!empty($data['service']) || !empty($data['interested_product'])) {
            $bodyParts[] = "Service / Product: " . ($data['service'] ?? $data['interested_product'] ?? 'N/A');
        }
        if (!empty($data['cloud_platform'])) {
            $bodyParts[] = "Cloud Platform: " . $data['cloud_platform'];
        }
        if (!empty($data['sap_version'])) {
            $bodyParts[] = "Architecture / Environment: " . $data['sap_version'];
        }
        if (!empty($data['message']) || !empty($data['notes'])) {
            $bodyParts[] = "\nMessage / Requirements:\n" . ($data['message'] ?? $data['notes']);
        }

        $body = implode("\n", $bodyParts);

        $adminEmail = SiteSetting::get('contact_email') ?? config('mail.from.address') ?? 'info@bluebasetechnologies.com';

        try {
            return EmailMessage::create([
                'folder' => 'inbox',
                'inquiry_type' => $type,
                'inquiry_id' => $inquiryId,
                'parent_id' => null,
                'sender_name' => $senderName,
                'sender_email' => $senderEmail,
                'recipient_name' => config('mail.from.name', 'Bluebase Team'),
                'recipient_email' => $adminEmail,
                'subject' => $subject,
                'body' => $body,
                'is_read' => false,
                'is_starred' => false,
                'status' => 'received',
                'sent_at' => now(),
            ]);
        } catch (\Throwable $e) {
            Log::warning('MailboxService recordIncomingInquiry error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Backfill existing inquiries from database tables into the Email Messages inbox.
     */
    public static function syncExistingWebsiteInquiries(): int
    {
        EmailMessage::ensureTableExists();
        $importedCount = 0;

        try {
            // 1. Contact Inquiries
            $contactInquiries = ContactInquiry::all();
            foreach ($contactInquiries as $item) {
                $exists = EmailMessage::where('inquiry_type', 'contact')
                    ->where('inquiry_id', $item->id)
                    ->exists();

                if (!$exists) {
                    EmailMessage::create([
                        'folder' => 'inbox',
                        'inquiry_type' => 'contact',
                        'inquiry_id' => $item->id,
                        'sender_name' => $item->name,
                        'sender_email' => $item->email,
                        'recipient_name' => 'Bluebase Desk',
                        'recipient_email' => SiteSetting::get('contact_email', 'info@bluebasetechnologies.com'),
                        'subject' => 'Website Inquiry: ' . ($item->service ?? 'General Question'),
                        'body' => "Company: " . ($item->company ?? 'N/A') . "\nPhone: " . ($item->phone ?? 'N/A') . "\nService: " . $item->service . "\n\nMessage:\n" . $item->message,
                        'is_read' => $item->status === 'contacted',
                        'is_starred' => false,
                        'status' => 'received',
                        'created_at' => $item->created_at ?? now(),
                        'sent_at' => $item->created_at ?? now(),
                    ]);
                    $importedCount++;
                }
            }

            // 2. Demo Bookings
            $demos = DemoBooking::all();
            foreach ($demos as $item) {
                $exists = EmailMessage::where('inquiry_type', 'demo')
                    ->where('inquiry_id', $item->id)
                    ->exists();

                if (!$exists) {
                    EmailMessage::create([
                        'folder' => 'inbox',
                        'inquiry_type' => 'demo',
                        'inquiry_id' => $item->id,
                        'sender_name' => $item->name,
                        'sender_email' => $item->email,
                        'recipient_name' => 'Bluebase Desk',
                        'recipient_email' => SiteSetting::get('contact_email', 'info@bluebasetechnologies.com'),
                        'subject' => 'Product Demo Request: ' . ($item->interested_product ?? 'Enterprise Software'),
                        'body' => "Company: " . $item->company . "\nPhone: " . ($item->phone ?? 'N/A') . "\nProduct: " . ($item->interested_product ?? 'N/A') . "\nCurrent ERP: " . ($item->current_erp ?? 'N/A') . "\n\nNotes:\n" . ($item->notes ?? 'Demo consultation requested.'),
                        'is_read' => $item->status === 'confirmed',
                        'is_starred' => false,
                        'status' => 'received',
                        'created_at' => $item->created_at ?? now(),
                        'sent_at' => $item->created_at ?? now(),
                    ]);
                    $importedCount++;
                }
            }

            // 3. Trial Requests
            $trials = TrialRequest::all();
            foreach ($trials as $item) {
                $exists = EmailMessage::where('inquiry_type', 'trial')
                    ->where('inquiry_id', $item->id)
                    ->exists();

                if (!$exists) {
                    EmailMessage::create([
                        'folder' => 'inbox',
                        'inquiry_type' => 'trial',
                        'inquiry_id' => $item->id,
                        'sender_name' => $item->name,
                        'sender_email' => $item->email,
                        'recipient_name' => 'Bluebase Desk',
                        'recipient_email' => SiteSetting::get('contact_email', 'info@bluebasetechnologies.com'),
                        'subject' => 'Project Architecture & Estimate Request: ' . $item->company,
                        'body' => "Company: " . $item->company . "\nCloud Platform: " . ($item->cloud_platform ?? 'N/A') . "\nArchitecture: " . ($item->sap_version ?? 'N/A'),
                        'is_read' => $item->status === 'approved',
                        'is_starred' => false,
                        'status' => 'received',
                        'created_at' => $item->created_at ?? now(),
                        'sent_at' => $item->created_at ?? now(),
                    ]);
                    $importedCount++;
                }
            }

            // 4. Partner Applications
            $partners = PartnerApplication::all();
            foreach ($partners as $item) {
                $exists = EmailMessage::where('inquiry_type', 'partner')
                    ->where('inquiry_id', $item->id)
                    ->exists();

                if (!$exists) {
                    EmailMessage::create([
                        'folder' => 'inbox',
                        'inquiry_type' => 'partner',
                        'inquiry_id' => $item->id,
                        'sender_name' => $item->contact_name,
                        'sender_email' => $item->email,
                        'recipient_name' => 'Bluebase Desk',
                        'recipient_email' => SiteSetting::get('contact_email', 'info@bluebasetechnologies.com'),
                        'subject' => 'Enterprise Partner Application: ' . $item->company_name,
                        'body' => "Company: " . $item->company_name . "\nPartner Type: " . ($item->partner_type ?? 'N/A') . "\nPhone: " . ($item->phone ?? 'N/A') . "\nCountry: " . ($item->country ?? 'N/A') . "\n\nProposal:\n" . ($item->message ?? 'Alliance proposal'),
                        'is_read' => $item->status === 'approved',
                        'is_starred' => false,
                        'status' => 'received',
                        'created_at' => $item->created_at ?? now(),
                        'sent_at' => $item->created_at ?? now(),
                    ]);
                    $importedCount++;
                }
            }
        } catch (\Throwable $e) {
            Log::warning('MailboxService syncExistingWebsiteInquiries error: ' . $e->getMessage());
        }

        return $importedCount;
    }

    /**
     * Pure PHP SSL Stream IMAP Fetcher.
     * Connects directly to IMAP4rev1 server (Gmail, cPanel, Outlook) over SSL port 993,
     * fetches recent messages, and stores unseen messages in EmailMessage inbox.
     */
    public static function syncImapInbox(): array
    {
        EmailMessage::ensureTableExists();

        $host = SiteSetting::get('imap_host');
        $username = SiteSetting::get('imap_username') ?: SiteSetting::get('smtp_username');
        $password = SiteSetting::get('imap_password') ?: SiteSetting::get('smtp_password');
        $port = (int) (SiteSetting::get('imap_port') ?: 993);

        if (empty($host)) {
            // Default inference: if smtp_host is smtp.gmail.com, infer imap.gmail.com
            $smtpHost = SiteSetting::get('smtp_host', env('MAIL_HOST', ''));
            if (str_contains($smtpHost, 'gmail.com')) {
                $host = 'imap.gmail.com';
            } elseif (!empty($smtpHost)) {
                $host = preg_replace('/^smtp\./i', 'imap.', $smtpHost);
            }
        }

        if (empty($host) || empty($username) || empty($password)) {
            return [
                'success' => false,
                'count' => 0,
                'message' => 'IMAP credentials not configured. Please configure IMAP Host, Username, and Password in Site Settings.',
            ];
        }

        $sslHost = 'ssl://' . $host . ':' . $port;
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        $socket = @stream_socket_client($sslHost, $errno, $errstr, 12, STREAM_CLIENT_CONNECT, $context);
        if (!$socket) {
            return [
                'success' => false,
                'count' => 0,
                'message' => "Unable to connect to IMAP host {$host}:{$port} - {$errstr} ({$errno})",
            ];
        }

        stream_set_timeout($socket, 15);

        // Read initial welcome banner
        $banner = fgets($socket);

        // 1. Send LOGIN command
        $tag = 'A001';
        fwrite($socket, "{$tag} LOGIN \"{$username}\" \"{$password}\"\r\n");
        $loginResponse = self::readUntilTag($socket, $tag);
        if (!str_contains($loginResponse, 'OK')) {
            fclose($socket);
            return [
                'success' => false,
                'count' => 0,
                'message' => 'IMAP Authentication failed for ' . $username . '. Please verify your username and App Password.',
            ];
        }

        // 2. Select INBOX
        $tag = 'A002';
        fwrite($socket, "{$tag} SELECT INBOX\r\n");
        $selectResponse = self::readUntilTag($socket, $tag);

        // 3. Search recent messages
        $tag = 'A003';
        fwrite($socket, "{$tag} SEARCH ALL\r\n");
        $searchResponse = self::readUntilTag($socket, $tag);

        $msgIds = [];
        if (preg_match('/\* SEARCH (.*)/i', $searchResponse, $matches)) {
            $allIds = array_filter(explode(' ', trim($matches[1])));
            // Grab the last 15 messages
            $msgIds = array_slice($allIds, -15);
        }

        $imported = 0;
        foreach ($msgIds as $id) {
            $tag = 'A00' . (100 + (int)$id);
            fwrite($socket, "{$tag} FETCH {$id} (BODY.PEEK[HEADER.FIELDS (SUBJECT FROM TO DATE MESSAGE-ID)] BODY.PEEK[TEXT]<0.4000>)\r\n");
            $fetchData = self::readUntilTag($socket, $tag);

            $subject = self::extractHeader($fetchData, 'Subject') ?: '(No Subject)';
            $from = self::extractHeader($fetchData, 'From') ?: 'Unknown Sender';
            $date = self::extractHeader($fetchData, 'Date');
            $messageId = self::extractHeader($fetchData, 'Message-ID') ?: "imap-{$id}-" . md5($subject . $from);

            // Parse Sender Name and Email from From header (e.g., "John Doe <john@example.com>")
            $senderEmail = $from;
            $senderName = $from;
            if (preg_match('/^(.*?)\s*<([^>]+)>/', $from, $nameMatches)) {
                $senderName = trim($nameMatches[1], " \"'");
                $senderEmail = trim($nameMatches[2]);
            }

            // Extract message body text
            $body = self::extractBodyText($fetchData);

            // Skip if already in database
            $exists = EmailMessage::where('message_id', $messageId)->exists();
            if (!$exists) {
                EmailMessage::create([
                    'folder' => 'inbox',
                    'inquiry_type' => 'imap',
                    'inquiry_id' => null,
                    'parent_id' => null,
                    'sender_name' => $senderName,
                    'sender_email' => $senderEmail,
                    'recipient_name' => 'Bluebase Team',
                    'recipient_email' => $username,
                    'subject' => self::decodeMimeHeader($subject),
                    'body' => $body ?: 'Empty message body or attachment.',
                    'is_read' => false,
                    'is_starred' => false,
                    'status' => 'received',
                    'message_id' => $messageId,
                    'sent_at' => $date ? date('Y-m-d H:i:s', strtotime($date)) : now(),
                ]);
                $imported++;
            }
        }

        // 4. Logout
        fwrite($socket, "A999 LOGOUT\r\n");
        fclose($socket);

        return [
            'success' => true,
            'count' => $imported,
            'message' => "IMAP Synchronization complete! Successfully imported {$imported} new message(s).",
        ];
    }

    private static function readUntilTag($socket, string $tag): string
    {
        $buffer = '';
        while (!feof($socket)) {
            $line = fgets($socket);
            if ($line === false) break;
            $buffer .= $line;
            if (str_starts_with($line, "{$tag} OK") || str_starts_with($line, "{$tag} NO") || str_starts_with($line, "{$tag} BAD")) {
                break;
            }
        }
        return $buffer;
    }

    private static function extractHeader(string $content, string $header): ?string
    {
        if (preg_match('/^' . preg_quote($header, '/') . ':\s*(.+)$/im', $content, $matches)) {
            return trim($matches[1]);
        }
        return null;
    }

    private static function extractBodyText(string $raw): string
    {
        // Remove protocol tags and headers, get plain text snippet
        $cleaned = preg_replace('/^\* \d+ FETCH .*\r?\n/m', '', $raw);
        $cleaned = preg_replace('/^A\d+ OK .*\r?\n/m', '', $cleaned);
        $cleaned = strip_tags($cleaned);
        $cleaned = trim(preg_replace('/\s+/', ' ', $cleaned));
        return substr($cleaned, 0, 3000);
    }

    private static function decodeMimeHeader(string $string): string
    {
        if (function_exists('mb_decode_mimeheader')) {
            return mb_decode_mimeheader($string);
        }
        return iconv_mime_decode($string, ICONV_MIME_DECODE_CONTINUE_ON_ERROR, 'UTF-8');
    }

    /**
     * Enterprise branded HTML wrapper for outgoing emails.
     */
    private static function buildFormattedEmailHtml(string $subject, string $body, string $brandName): string
    {
        $paragraphs = nl2br(e($body));
        $year = date('Y');

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <style>
    body { margin: 0; padding: 0; background-color: #070B19; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; color: #1e293b; }
    .email-wrapper { max-width: 640px; margin: 24px auto; background: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.1); border: 1px solid #e2e8f0; }
    .email-header { background: linear-gradient(135deg, #0a192f 0%, #0d213f 100%); padding: 28px 32px; border-bottom: 3px solid #0050e7; }
    .brand-name { color: #ffffff; font-size: 20px; font-weight: 800; letter-spacing: -0.02em; margin: 0; }
    .email-content { padding: 32px; font-size: 15px; line-height: 1.7; color: #334155; }
    .email-footer { background: #f8fafc; padding: 20px 32px; font-size: 12px; color: #64748b; border-top: 1px solid #e2e8f0; text-align: center; }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <div class="email-header">
      <div class="brand-name">{$brandName}</div>
    </div>
    <div class="email-content">
      <h2 style="font-size: 18px; color: #0f172a; margin-top: 0; margin-bottom: 20px;">{$subject}</h2>
      <div>{$paragraphs}</div>
    </div>
    <div class="email-footer">
      &copy; {$year} {$brandName}. All rights reserved.<br>
      This email was sent directly via Bluebase Cloud Communication Pipeline.
    </div>
  </div>
</body>
</html>
HTML;
    }
}
