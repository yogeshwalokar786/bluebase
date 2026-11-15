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

        if (empty($settings['gemini_api_key'])) {
            $keyPath = storage_path('app/ai_key.txt');
            if (file_exists($keyPath)) {
                $settings['gemini_api_key'] = trim(file_get_contents($keyPath));
            } elseif (env('GEMINI_API_KEY')) {
                $settings['gemini_api_key'] = env('GEMINI_API_KEY');
            }
        }

        if (empty($settings['gemini_model'])) {
            $settings['gemini_model'] = env('GEMINI_MODEL', 'gemini-1.5-flash');
        }

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
            'gemini_api_key',
            'gemini_model',
            'gemini_enabled',
        ];

        foreach ($allowedKeys as $key) {
            if ($request->has($key)) {
                try {
                    SiteSetting::set($key, $request->input($key));
                } catch (\Throwable $e) {}
            }
        }

        if ($request->filled('gemini_api_key')) {
            $keyVal = trim($request->input('gemini_api_key'));
            try {
                file_put_contents(storage_path('app/ai_key.txt'), $keyVal);
            } catch (\Throwable $e) {}
        }

        // Handle checkbox for video enabled
        try {
            SiteSetting::set('hero_video_enabled', $request->has('hero_video_enabled') ? '1' : '0');
        } catch (\Throwable $e) {}

        return back()->with('success', 'Site configuration and CMS settings updated successfully.');
    }
}

