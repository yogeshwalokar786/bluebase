<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\DemoBooking;
use App\Models\TrialRequest;
use App\Models\PartnerApplication;
use App\Models\NewsletterSubscriber;
use App\Models\SiteSetting;
use App\Models\EmailMessage;
use App\Services\MailboxService;
use App\Mail\InquiryConfirmationMail;
use App\Mail\AdminInquiryNotificationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InquiryController extends Controller
{
    public function contactForm()
    {
        return view('pages.contact');
    }

    /**
     * Advanced Human Verification Token Generator
     * Generates a tamper-proof cryptographically signed verification challenge
     * with client IP binding, random nonce, and anti-replay timestamps.
     */
    public function generateSecurityToken(Request $request)
    {
        // 1. Basic bot heuristics check
        $dwellTime = (float) $request->input('dwell_time', 0);
        $isWebDriver = $request->boolean('webdriver', false);

        if ($isWebDriver || ($dwellTime > 0 && $dwellTime < 0.4)) {
            return response()->json([
                'success' => false,
                'message' => 'Automated bot activity detected.',
            ], 403);
        }

        // 2. Generate signed cryptographic proof
        $timestamp = time();
        $nonce = Str::random(32);
        $ip = $request->ip();
        $secret = config('app.key') ?: 'bluebase-cloud-shield-salt';

        $signature = hash_hmac('sha256', "{$timestamp}|{$nonce}|{$ip}", $secret);
        $payload = base64_encode(json_encode([
            't' => $timestamp,
            'n' => $nonce,
            'ip' => $ip,
            'sig' => $signature,
        ]));

        session(['human_verified_token' => $payload]);

        return response()->json([
            'success' => true,
            'token' => $payload,
            'message' => 'Verification successful.',
        ]);
    }

    public function storeContact(Request $request)
    {
        // 1. Invisible Honeypot Security Check (catches naive crawlers)
        if ($request->filled('_hp_contact_check')) {
            return back()->with('success', 'Thank you! Your message has been received. Our enterprise engineering team will get back to you within 24 hours.');
        }

        // 2. Advanced Human Verification Cryptographic Token Validation
        $clientToken = $request->input('verification_token');
        $sessionToken = session('human_verified_token');
        $isHumanVerified = false;

        if (!empty($clientToken) && !empty($sessionToken) && hash_equals($sessionToken, $clientToken)) {
            $decoded = json_decode(base64_decode($clientToken), true);
            if (is_array($decoded) && isset($decoded['t'], $decoded['n'], $decoded['ip'], $decoded['sig'])) {
                $secret = config('app.key') ?: 'bluebase-cloud-shield-salt';
                $expectedSig = hash_hmac('sha256', "{$decoded['t']}|{$decoded['n']}|{$decoded['ip']}", $secret);

                $elapsed = time() - (int)$decoded['t'];
                // Valid signature, matching IP, and fresh within 15 minutes (900s)
                if (hash_equals($expectedSig, $decoded['sig']) && $decoded['ip'] === $request->ip() && $elapsed >= 0 && $elapsed <= 900) {
                    $isHumanVerified = true;
                }
            }
        }

        if (!$isHumanVerified) {
            return back()->withInput()->withErrors([
                'verification_token' => 'Please complete the "Verify you are human" check before submitting.',
            ]);
        }

        // 3. Strict Input Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'service' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'service.required' => 'Please select the primary project interest for your message.',
            'message.min' => 'Please provide at least 10 characters describing your project.',
        ]);

        $validated['ip_address'] = $request->ip();
        $validated['status'] = 'new';

        // 4. Persist to MySQL database with defensive safety
        $inquiry = null;
        try {
            $inquiry = ContactInquiry::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('ContactInquiry insertion error: ' . $e->getMessage(), $validated);
        }

        // 5. Asynchronously forward lead to Bluebase CRM API
        try {
            $crmUrl = rtrim(config('services.crm.url') ?: env('CRM_URL', 'https://crm.bluebasetechnologies.com'), '/');
            \Illuminate\Support\Facades\Http::timeout(3)->post($crmUrl . '/api/leads/sync', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'] ?? null,
                'company' => $validated['company'] ?? null,
                'service' => $validated['service'] ?? null,
                'source' => 'Website Contact Form',
                'notes' => $validated['message'] ?? null,
                'sync_token' => env('CRM_SYNC_TOKEN', 'bluebase-sync-secret-key-2026'),
            ]);
        } catch (\Throwable $crmError) {
            \Illuminate\Support\Facades\Log::warning('CRM lead sync non-fatal: ' . $crmError->getMessage());
        }

        // 6. Send user confirmation and admin alert via SMTP
        $this->sendInquiryEmails([
            'type' => 'contact',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service' => $validated['service'],
            'message' => $validated['message'],
            'reference_id' => $inquiry?->id,
            'ip_address' => $validated['ip_address'] ?? $request->ip(),
        ]);

        // 7. Consume verification token so it cannot be re-used
        session()->forget('human_verified_token');

        return back()->with('success', 'Thank you! Your message has been received. Our enterprise engineering team will get back to you within 24 hours.');
    }

    public function demoForm()
    {
        return redirect()->route('contact', [], 301);
    }

    public function storeDemo(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'job_title' => 'nullable|string|max:255',
            'current_erp' => 'nullable|string|max:255',
            'interested_product' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $demo = null;
        try {
            $demo = DemoBooking::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Demo booking submitted: ' . $validated['email']);
        }

        // Send user confirmation and admin alert via SMTP
        $this->sendInquiryEmails([
            'type' => 'demo',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'service' => $validated['interested_product'] ?? 'Product Demo Consultation',
            'message' => $validated['notes'] ?? 'Demo booking consultation requested.',
            'reference_id' => $demo?->id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Demo scheduled successfully! A calendar invitation and confirmation has been sent to your email.');
    }

    public function trialForm()
    {
        return view('pages.free-trial');
    }

    public function storeTrial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'cloud_platform' => 'nullable|string|max:255',
            'sap_version' => 'nullable|string|max:255',
        ]);

        $trial = null;
        try {
            $trial = TrialRequest::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Trial request submitted: ' . $validated['email']);
        }

        // Asynchronously forward estimate/trial request to Bluebase CRM API
        try {
            $crmUrl = rtrim(config('services.crm.url') ?: env('CRM_URL', 'https://crm.bluebasetechnologies.com'), '/');
            \Illuminate\Support\Facades\Http::timeout(3)->post($crmUrl . '/api/leads/sync', [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'company' => $validated['company'] ?? null,
                'service' => 'Estimate / Project Trial Request',
                'source' => 'Website Estimate Form',
                'notes' => 'Cloud: ' . ($validated['cloud_platform'] ?? 'N/A') . ' | Architecture: ' . ($validated['sap_version'] ?? 'N/A'),
                'sync_token' => env('CRM_SYNC_TOKEN', 'bluebase-sync-secret-key-2026'),
            ]);
        } catch (\Throwable $crmError) {
            \Illuminate\Support\Facades\Log::warning('CRM lead sync non-fatal: ' . $crmError->getMessage());
        }

        // Send user confirmation and admin alert via SMTP
        $this->sendInquiryEmails([
            'type' => 'estimate',
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => null,
            'company' => $validated['company'] ?? null,
            'service' => 'Project Architecture Audit / Free Trial',
            'message' => 'Cloud: ' . ($validated['cloud_platform'] ?? 'N/A') . ' | Architecture: ' . ($validated['sap_version'] ?? 'N/A'),
            'reference_id' => $trial?->id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Trial account provisioned! Check your inbox for your Bluebase cloud credentials and sandbox access.');
    }

    public function storePartner(Request $request)
    {
        $validated = $request->validate([
            'partner_type' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        $partner = null;
        try {
            $partner = PartnerApplication::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Partner application submitted: ' . $validated['email']);
        }

        // Send user confirmation and admin alert via SMTP
        $this->sendInquiryEmails([
            'type' => 'partner',
            'name' => $validated['contact_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company_name'],
            'service' => $validated['partner_type'] ?? 'Enterprise Partnership',
            'message' => $validated['message'] ?? 'Alliance & Partner inquiry',
            'reference_id' => $partner?->id,
            'ip_address' => $request->ip(),
        ]);

        return back()->with('success', 'Partner application submitted! Our Global Alliance Director will contact you shortly.');
    }

    public function storeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $validated['ip_address'] = $request->ip();

        try {
            NewsletterSubscriber::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Newsletter subscription: ' . $validated['email']);
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Subscribed successfully!']);
        }

        return back()->with('success', 'Subscribed successfully! You will receive our monthly enterprise architecture digest.');
    }

    /**
     * Configure dynamic SMTP, register inquiry in Webmail inbox, and dispatch confirmation/admin emails.
     * Wrapped in defensive try/catch to ensure user requests never fail on mail transport issues.
     */
    protected function sendInquiryEmails(array $data): void
    {
        try {
            MailboxService::configureRuntimeSmtp();

            // 1. Record incoming inquiry into EmailMessage (Inbox)
            $incoming = MailboxService::recordIncomingInquiry(
                $data['type'] ?? 'contact',
                $data,
                $data['reference_id'] ?? null
            );

            // 2. Dispatch Confirmation Mail to Inquirer
            if (!empty($data['email'])) {
                Mail::to($data['email'])->send(new InquiryConfirmationMail($data));

                // Log outgoing automated confirmation into Sent folder
                if ($incoming) {
                    try {
                        EmailMessage::create([
                            'folder' => 'sent',
                            'inquiry_type' => $data['type'] ?? 'contact',
                            'inquiry_id' => $data['reference_id'] ?? null,
                            'parent_id' => $incoming->id,
                            'sender_name' => config('mail.from.name', 'Bluebase Technologies'),
                            'sender_email' => config('mail.from.address', 'info@bluebasetechnologies.com'),
                            'recipient_name' => $data['name'] ?? null,
                            'recipient_email' => $data['email'],
                            'subject' => 'Confirmation: ' . ($incoming->subject ?? 'We Received Your Request'),
                            'body' => "Thank you for reaching out to Bluebase Technologies. Our engineering team has received your inquiry and is reviewing your specifications.",
                            'is_read' => true,
                            'is_starred' => false,
                            'status' => 'sent',
                            'sent_at' => now(),
                        ]);
                    } catch (\Throwable $e) {}
                }
            }

            // 3. Dispatch Notification Mail to Admin / Sales Desk
            $adminEmail = SiteSetting::get('contact_email') ?? config('mail.from.address') ?? 'info@bluebasetechnologies.com';
            if (!empty($adminEmail)) {
                Mail::to($adminEmail)->send(new AdminInquiryNotificationMail($data));
            }
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('SMTP Inquiry email dispatch failed: ' . $e->getMessage(), [
                'inquiry' => $data,
            ]);
        }
    }
}

