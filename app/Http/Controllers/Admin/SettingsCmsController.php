<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingsCmsController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
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
        ];

        foreach ($allowedKeys as $key) {
            if ($request->has($key)) {
                SiteSetting::set($key, $request->input($key));
            }
        }

        // Handle checkbox for video enabled
        SiteSetting::set('hero_video_enabled', $request->has('hero_video_enabled') ? '1' : '0');

        return back()->with('success', 'Site configuration and CMS settings updated successfully.');
    }
}

