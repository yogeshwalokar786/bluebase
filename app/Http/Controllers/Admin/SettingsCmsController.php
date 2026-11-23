<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsCmsController extends Controller
{
    public function index()
    {
        $settings = [];
        try {
            $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        } catch (\Throwable $e) {}

        return view('admin.cms.settings', compact('settings'));
    }

    public function update(Request $request)
    {
        $allowedKeys = [
            'site_name',
            'site_tagline',
            'contact_email',
            'contact_phone',
            'support_email',
            'office_address',
            'business_hours',
            'linkedin_url',
            'twitter_url',
            'github_url',
            'hero_badge',
            'hero_title',
            'hero_subtitle',
            'site_logo',
            'site_favicon',
            'hero_watermark',
            'hero_video_url',
            'hero_video_overlay_opacity',
            'hero_video_poster',
            'smtp_host',
            'smtp_port',
            'smtp_encryption',
            'smtp_username',
            'smtp_password',
            'mail_from_address',
            'mail_from_name',
            'imap_host',
            'imap_port',
            'imap_encryption',
            'imap_username',
            'imap_password',
        ];

        foreach ($allowedKeys as $key) {
            if ($request->has($key)) {
                try {
                    SiteSetting::set($key, $request->input($key));
                } catch (\Throwable $e) {}
            }
        }

        // Handle checkbox for video enabled
        try {
            SiteSetting::set('hero_video_enabled', $request->has('hero_video_enabled') ? '1' : '0');
        } catch (\Throwable $e) {}

        // Invalidate frontend cache
        rescue(function () {
            cache()->forget('site_settings_home');
            cache()->forget('global_site_settings');
        });

        return back()->with('success', 'Site configuration and CMS settings updated successfully.');
    }

    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        $recipient = $request->input('test_email');

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

            \Illuminate\Support\Facades\Mail::raw(
                "Hello,\n\nThis is an automated SMTP verification test email from " . config('mail.from.name') . ".\nIf you received this message, your SMTP credentials and delivery pipeline are working properly!\n\nHost: " . config('mail.mailers.smtp.host') . "\nPort: " . config('mail.mailers.smtp.port') . "\nEncryption: " . (config('mail.mailers.smtp.encryption') ?? 'none') . "\nSender: " . config('mail.from.address') . "\nTimestamp: " . now()->toIso8601String() . "\n\nRegards,\nBluebase Cloud Engineering",
                function ($message) use ($recipient) {
                    $message->to($recipient)
                            ->subject('SMTP Verification Test — Bluebase Technologies');
                }
            );

            return back()->with('success', "Test email successfully sent to {$recipient} via SMTP!");
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('SMTP Test email failed: ' . $e->getMessage());
            return back()->with('error', 'SMTP Connection Failed: ' . $e->getMessage());
        }
    }
}

