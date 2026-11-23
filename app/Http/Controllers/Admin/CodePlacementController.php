<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class CodePlacementController extends Controller
{
    /**
     * Show the Code Placement, Analytics & Tracking management interface.
     */
    public function index()
    {
        $settings = [];
        try {
            $settings = SiteSetting::all()->pluck('value', 'key')->toArray();
        } catch (\Throwable $e) {}

        return view('admin.code-placement.index', compact('settings'));
    }

    /**
     * Update Code Placement, Pixels, and Verification settings.
     */
    public function update(Request $request)
    {
        $textFields = [
            'analytics_ga4_id',
            'analytics_gtm_id',
            'analytics_meta_pixel_id',
            'analytics_clarity_id',
            'seo_google_verification',
            'seo_bing_verification',
            'seo_pinterest_verification',
            'custom_head_scripts',
            'custom_body_open_scripts',
            'custom_footer_scripts',
            'custom_global_css',
        ];

        foreach ($textFields as $field) {
            $value = $request->input($field);
            SiteSetting::set($field, $value, 'tracking');
        }

        // Checkbox toggles (1 if checked, 0 if unchecked)
        $booleanFields = [
            'tracking_scripts_enabled',
            'analytics_ga4_enabled',
            'analytics_gtm_enabled',
            'analytics_meta_pixel_enabled',
            'analytics_clarity_enabled',
        ];

        foreach ($booleanFields as $toggle) {
            $val = $request->has($toggle) ? '1' : '0';
            SiteSetting::set($toggle, $val, 'tracking');
        }

        // Backward compatibility synchronization with legacy keys
        $customHead = $request->input('custom_head_scripts');
        $customFooter = $request->input('custom_footer_scripts');
        if ($customHead !== null) {
            SiteSetting::set('seo_header_scripts', $customHead, 'seo');
        }
        if ($customFooter !== null) {
            SiteSetting::set('seo_footer_scripts', $customFooter, 'seo');
        }

        // Invalidate cached global tracking settings
        rescue(function () {
            cache()->forget('global_site_settings');
            cache()->forget('site_settings_home');
        });

        return redirect()->route('admin.code_placement.index')->with('success', 'Code placement, analytics pixels, and tracking configurations updated successfully.');
    }
}
