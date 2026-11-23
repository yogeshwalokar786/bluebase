@extends('admin.layout')

@section('title', 'Code Placement & Pixels')
@section('page_title', 'Code Placement, Pixels & Analytics Tracking')

@section('content')
<div style="max-width: 1100px; margin: 0 auto;">

  <!-- Navigation Tab Bar -->
  <div style="display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;">
    <a href="{{ route('admin.settings') }}" class="btn btn-secondary btn-sm">Site Settings</a>
    <a href="{{ route('admin.code_placement.index') }}" class="btn btn-primary btn-sm">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px; margin-right: 4px; vertical-align: middle;"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
      Code Placement, Pixels &amp; Analytics
    </a>
    <a href="{{ route('admin.sitemap.index') }}" class="btn btn-secondary btn-sm">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px; margin-right: 4px; vertical-align: middle;"><circle cx="12" cy="5" r="3"/><circle cx="5" cy="19" r="3"/><circle cx="19" cy="19" r="3"/><path d="M5 16v-4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v4"/><line x1="12" y1="8" x2="12" y2="12"/></svg>
      XML Sitemap Generator
    </a>
  </div>

  <!-- Quick Status Summary Bar -->
  <div class="card" style="margin-bottom: 24px; padding: 18px 24px; background: linear-gradient(135deg, rgba(7, 11, 25, 0.95) 0%, rgba(13, 27, 62, 0.95) 100%); border: 1px solid rgba(0, 80, 231, 0.25);">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 16px;">
      <div>
        <div style="font-size: 1.1rem; font-weight: 700; color: #FFFFFF; display: flex; align-items: center; gap: 10px;">
          <span>Tracking &amp; Script Engine</span>
          @if(($settings['tracking_scripts_enabled'] ?? '1') !== '0')
            <span style="font-size: 0.7rem; font-weight: 700; padding: 3px 8px; border-radius: 999px; background: rgba(34, 197, 94, 0.15); color: #4ADE80; border: 1px solid rgba(34, 197, 94, 0.3); text-transform: uppercase; letter-spacing: 0.05em;">Active / Live</span>
          @else
            <span style="font-size: 0.7rem; font-weight: 700; padding: 3px 8px; border-radius: 999px; background: rgba(239, 68, 68, 0.15); color: #F87171; border: 1px solid rgba(239, 68, 68, 0.3); text-transform: uppercase; letter-spacing: 0.05em;">Paused</span>
          @endif
        </div>
        <div style="font-size: 0.82rem; color: #94A3B8; margin-top: 4px;">
          Centrally inject Google Analytics, Meta Pixel, GTM, search console tokens, and custom scripts into all 49+ public pages.
        </div>
      </div>

      <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <div style="padding: 6px 12px; border-radius: 6px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.75rem; color: #E2E8F0;">
          GA4: <strong style="color: {{ !empty($settings['analytics_ga4_id'] ?? '') && ($settings['analytics_ga4_enabled'] ?? '1') !== '0' ? '#4ADE80' : '#94A3B8' }}">{{ !empty($settings['analytics_ga4_id'] ?? '') && ($settings['analytics_ga4_enabled'] ?? '1') !== '0' ? 'Ready' : 'Disabled' }}</strong>
        </div>
        <div style="padding: 6px 12px; border-radius: 6px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.75rem; color: #E2E8F0;">
          Meta Pixel: <strong style="color: {{ !empty($settings['analytics_meta_pixel_id'] ?? '') && ($settings['analytics_meta_pixel_enabled'] ?? '1') !== '0' ? '#4ADE80' : '#94A3B8' }}">{{ !empty($settings['analytics_meta_pixel_id'] ?? '') && ($settings['analytics_meta_pixel_enabled'] ?? '1') !== '0' ? 'Ready' : 'Disabled' }}</strong>
        </div>
        <div style="padding: 6px 12px; border-radius: 6px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); font-size: 0.75rem; color: #E2E8F0;">
          GTM: <strong style="color: {{ !empty($settings['analytics_gtm_id'] ?? '') && ($settings['analytics_gtm_enabled'] ?? '1') !== '0' ? '#4ADE80' : '#94A3B8' }}">{{ !empty($settings['analytics_gtm_id'] ?? '') && ($settings['analytics_gtm_enabled'] ?? '1') !== '0' ? 'Ready' : 'Disabled' }}</strong>
        </div>
      </div>
    </div>
  </div>

  <form action="{{ route('admin.code_placement.update') }}" method="POST">
    @csrf

    <!-- SECTION 1: MASTER CONTROLS -->
    <div class="card" style="margin-bottom: 24px;">
      <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px; display: flex; align-items: center; justify-content: space-between;">
        <span>1. Global Master Control</span>
        <span style="font-size: 0.75rem; font-weight: 500; color: var(--text-muted);">Site-wide switch</span>
      </h3>

      <div style="display: flex; align-items: center; justify-content: space-between; padding: 16px; border-radius: 8px; background: rgba(0, 80, 231, 0.05); border: 1px solid rgba(0, 80, 231, 0.15);">
        <div>
          <label for="tracking_scripts_enabled" style="font-weight: 700; font-size: 0.95rem; color: var(--text-primary); cursor: pointer; display: block; margin-bottom: 4px;">
            Enable Live Script Injection on Public Website
          </label>
          <div style="font-size: 0.8rem; color: var(--text-muted); max-width: 700px;">
            When unchecked, all tracking codes, pixels, GTM, and custom scripts are temporarily withheld from public web pages without erasing your saved configurations.
          </div>
        </div>
        <div>
          <label class="switch-toggle" style="position: relative; display: inline-block; width: 48px; height: 26px; cursor: pointer;">
            <input type="checkbox" name="tracking_scripts_enabled" id="tracking_scripts_enabled" value="1" {{ ($settings['tracking_scripts_enabled'] ?? '1') !== '0' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;">
            <span class="toggle-slider" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #334155; transition: .3s; border-radius: 34px;"></span>
          </label>
        </div>
      </div>
    </div>

    <!-- SECTION 2: 1-CLICK MAJOR PIXELS & ANALYTICS -->
    <div class="card" style="margin-bottom: 24px;">
      <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        2. Major Analytics &amp; Conversion Pixels (One-Click Setup)
      </h3>
      <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 20px;">
        Simply enter your Measurement ID or Pixel ID. The engine automatically outputs the official asynchronous SDKs, event handlers, and noscript body fallbacks.
      </p>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        
        <!-- Google Analytics 4 (GA4) -->
        <div style="padding: 18px; border-radius: 8px; border: 1px solid var(--border-color); background: rgba(255, 255, 255, 0.02);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px; color: #F59E0B;"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
              <strong style="color: var(--text-primary); font-size: 0.95rem;">Google Analytics 4 (GA4)</strong>
            </div>
            <label class="switch-toggle" style="position: relative; display: inline-block; width: 40px; height: 22px;">
              <input type="checkbox" name="analytics_ga4_enabled" value="1" {{ ($settings['analytics_ga4_enabled'] ?? '1') !== '0' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;">
              <span class="toggle-slider" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #334155; transition: .3s; border-radius: 34px;"></span>
            </label>
          </div>
          <div class="form-group" style="margin-bottom: 8px;">
            <label class="form-label">GA4 Measurement ID</label>
            <input type="text" name="analytics_ga4_id" value="{{ $settings['analytics_ga4_id'] ?? '' }}" class="form-control" placeholder="e.g. G-XXXXXXXXXX" style="font-family: monospace;">
          </div>
          <div class="form-hint" style="font-size: 0.75rem;">
            Automatically generates and embeds the official Google tag (gtag.js) in the &lt;head&gt; of every public page.
          </div>
        </div>

        <!-- Meta / Facebook Pixel -->
        <div style="padding: 18px; border-radius: 8px; border: 1px solid var(--border-color); background: rgba(255, 255, 255, 0.02);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px; color: #3B82F6;"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/></svg>
              <strong style="color: var(--text-primary); font-size: 0.95rem;">Meta / Facebook Pixel</strong>
            </div>
            <label class="switch-toggle" style="position: relative; display: inline-block; width: 40px; height: 22px;">
              <input type="checkbox" name="analytics_meta_pixel_enabled" value="1" {{ ($settings['analytics_meta_pixel_enabled'] ?? '1') !== '0' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;">
              <span class="toggle-slider" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #334155; transition: .3s; border-radius: 34px;"></span>
            </label>
          </div>
          <div class="form-group" style="margin-bottom: 8px;">
            <label class="form-label">Pixel ID (Dataset ID)</label>
            <input type="text" name="analytics_meta_pixel_id" value="{{ $settings['analytics_meta_pixel_id'] ?? '' }}" class="form-control" placeholder="e.g. 123456789012345" style="font-family: monospace;">
          </div>
          <div class="form-hint" style="font-size: 0.75rem;">
            Injects fbevents.js with PageView tracking in &lt;head&gt; and noscript 1x1 image fallback in &lt;body&gt;.
          </div>
        </div>

        <!-- Google Tag Manager (GTM) -->
        <div style="padding: 18px; border-radius: 8px; border: 1px solid var(--border-color); background: rgba(255, 255, 255, 0.02);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px; color: #10B981;"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
              <strong style="color: var(--text-primary); font-size: 0.95rem;">Google Tag Manager (GTM)</strong>
            </div>
            <label class="switch-toggle" style="position: relative; display: inline-block; width: 40px; height: 22px;">
              <input type="checkbox" name="analytics_gtm_enabled" value="1" {{ ($settings['analytics_gtm_enabled'] ?? '1') !== '0' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;">
              <span class="toggle-slider" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #334155; transition: .3s; border-radius: 34px;"></span>
            </label>
          </div>
          <div class="form-group" style="margin-bottom: 8px;">
            <label class="form-label">GTM Container ID</label>
            <input type="text" name="analytics_gtm_id" value="{{ $settings['analytics_gtm_id'] ?? '' }}" class="form-control" placeholder="e.g. GTM-XXXXXXX" style="font-family: monospace;">
          </div>
          <div class="form-hint" style="font-size: 0.75rem;">
            Places primary container snippet high in &lt;head&gt; and official iframe noscript immediately after opening &lt;body&gt;.
          </div>
        </div>

        <!-- Microsoft Clarity (Heatmaps & Session Recordings) -->
        <div style="padding: 18px; border-radius: 8px; border: 1px solid var(--border-color); background: rgba(255, 255, 255, 0.02);">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
            <div style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px; color: #8B5CF6;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
              <strong style="color: var(--text-primary); font-size: 0.95rem;">Microsoft Clarity (Heatmaps)</strong>
            </div>
            <label class="switch-toggle" style="position: relative; display: inline-block; width: 40px; height: 22px;">
              <input type="checkbox" name="analytics_clarity_enabled" value="1" {{ ($settings['analytics_clarity_enabled'] ?? '1') !== '0' ? 'checked' : '' }} style="opacity: 0; width: 0; height: 0;">
              <span class="toggle-slider" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #334155; transition: .3s; border-radius: 34px;"></span>
            </label>
          </div>
          <div class="form-group" style="margin-bottom: 8px;">
            <label class="form-label">Clarity Project ID</label>
            <input type="text" name="analytics_clarity_id" value="{{ $settings['analytics_clarity_id'] ?? '' }}" class="form-control" placeholder="e.g. k8s9f2p0" style="font-family: monospace;">
          </div>
          <div class="form-hint" style="font-size: 0.75rem;">
            Free heatmaps, click maps, and session recordings asynchronously loaded in &lt;head&gt;.
          </div>
        </div>

      </div>
    </div>

    <!-- SECTION 3: WEBMASTER & SEARCH ENGINE VERIFICATIONS -->
    <div class="card" style="margin-bottom: 24px;">
      <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        3. Webmaster &amp; Search Console Verification
      </h3>

      <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Google Search Console</label>
          <input type="text" name="seo_google_verification" value="{{ $settings['seo_google_verification'] ?? '' }}" class="form-control" placeholder="google-site-verification token or string" style="font-size: 0.85rem;">
          <div class="form-hint">Outputs &lt;meta name="google-site-verification"&gt;</div>
        </div>

        <div class="form-group">
          <label class="form-label">Bing Webmaster Tools</label>
          <input type="text" name="seo_bing_verification" value="{{ $settings['seo_bing_verification'] ?? '' }}" class="form-control" placeholder="msvalidate.01 token" style="font-size: 0.85rem;">
          <div class="form-hint">Outputs &lt;meta name="msvalidate.01"&gt;</div>
        </div>

        <div class="form-group">
          <label class="form-label">Pinterest Verification</label>
          <input type="text" name="seo_pinterest_verification" value="{{ $settings['seo_pinterest_verification'] ?? '' }}" class="form-control" placeholder="p:domain_verify token" style="font-size: 0.85rem;">
          <div class="form-hint">Outputs &lt;meta name="p:domain_verify"&gt;</div>
        </div>
      </div>
    </div>

    <!-- SECTION 4: PRECISION PLACEMENT ZONES -->
    <div class="card" style="margin-bottom: 24px;">
      <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        4. Precision Code Placement Zones (Raw HTML, JS &amp; CSS)
      </h3>
      <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 20px;">
        Inject raw scripts, tags, or styles into exact HTML document locations. Do not delete existing tags when adding new snippets.
      </p>

      <!-- Header Scripts -->
      <div class="form-group" style="margin-bottom: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
          <label class="form-label" style="margin: 0; font-weight: 700;">
            Header Placement Zone <span style="font-family: monospace; color: var(--accent);">&lt;head&gt; ... &lt;/head&gt;</span>
          </label>
          <span style="font-size: 0.75rem; color: var(--text-muted);">Injected immediately before closing &lt;/head&gt;</span>
        </div>
        <textarea name="custom_head_scripts" class="form-control" rows="5" style="font-family: 'Consolas', 'Monaco', monospace; font-size: 0.82rem; background: #070B19; color: #E2E8F0; border-color: rgba(255,255,255,0.12); line-height: 1.5;" placeholder="<!-- Paste custom <script>, <link>, or tracking tags here -->">{{ $settings['custom_head_scripts'] ?? $settings['seo_header_scripts'] ?? '' }}</textarea>
        <div class="form-hint">Recommended for: Custom font preconnects, Hotjar, HubSpot tracking code, LinkedIn Insight tags, custom schema tags.</div>
      </div>

      <!-- Body Open Scripts -->
      <div class="form-group" style="margin-bottom: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
          <label class="form-label" style="margin: 0; font-weight: 700;">
            Body Start Zone <span style="font-family: monospace; color: var(--accent);">&lt;body&gt; ...</span>
          </label>
          <span style="font-size: 0.75rem; color: var(--text-muted);">Injected immediately after opening &lt;body&gt;</span>
        </div>
        <textarea name="custom_body_open_scripts" class="form-control" rows="4" style="font-family: 'Consolas', 'Monaco', monospace; font-size: 0.82rem; background: #070B19; color: #E2E8F0; border-color: rgba(255,255,255,0.12); line-height: 1.5;" placeholder="<!-- Paste custom <body> start scripts or <noscript> tags here -->">{{ $settings['custom_body_open_scripts'] ?? '' }}</textarea>
        <div class="form-hint">Recommended for: Custom &lt;noscript&gt; fallbacks, accessibility widgets, top alert banners, anti-flicker test snippets.</div>
      </div>

      <!-- Footer Scripts -->
      <div class="form-group" style="margin-bottom: 24px;">
        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
          <label class="form-label" style="margin: 0; font-weight: 700;">
            Footer Placement Zone <span style="font-family: monospace; color: var(--accent);">... &lt;/body&gt;</span>
          </label>
          <span style="font-size: 0.75rem; color: var(--text-muted);">Injected immediately before closing &lt;/body&gt;</span>
        </div>
        <textarea name="custom_footer_scripts" class="form-control" rows="5" style="font-family: 'Consolas', 'Monaco', monospace; font-size: 0.82rem; background: #070B19; color: #E2E8F0; border-color: rgba(255,255,255,0.12); line-height: 1.5;" placeholder="<!-- Paste custom footer scripts, chat widgets, or conversion tracking here -->">{{ $settings['custom_footer_scripts'] ?? $settings['seo_footer_scripts'] ?? '' }}</textarea>
        <div class="form-hint">Recommended for: Live chat widgets (Crisp, Tidio, Intercom, WhatsApp button), remarketing pixels, custom conversion triggers.</div>
      </div>

      <!-- Custom Global CSS -->
      <div class="form-group" style="margin-bottom: 12px;">
        <div style="display: flex; justify-content: space-between; align-items: baseline; margin-bottom: 6px;">
          <label class="form-label" style="margin: 0; font-weight: 700;">
            Custom Global CSS <span style="font-family: monospace; color: var(--accent);">&lt;style&gt; ... &lt;/style&gt;</span>
          </label>
          <span style="font-size: 0.75rem; color: var(--text-muted);">Injected in &lt;head&gt; safely inside &lt;style id="bluebase-custom-css"&gt;</span>
        </div>
        <textarea name="custom_global_css" class="form-control" rows="5" style="font-family: 'Consolas', 'Monaco', monospace; font-size: 0.82rem; background: #070B19; color: #E2E8F0; border-color: rgba(255,255,255,0.12); line-height: 1.5;" placeholder="/* Add custom CSS rules here (no <style> tags needed) */
/* Example:
.btn-primary { box-shadow: 0 4px 14px rgba(0, 80, 231, 0.4); }
*/">{{ $settings['custom_global_css'] ?? '' }}</textarea>
        <div class="form-hint">Allows instant styling overrides across the public website without altering static stylesheet files.</div>
      </div>

    </div>

    <!-- SUBMIT BUTTON -->
    <div style="margin-top: 24px; margin-bottom: 36px; display: flex; gap: 14px; align-items: center;">
      <button type="submit" class="btn btn-primary" style="padding: 12px 32px; font-size: 0.95rem; font-weight: 700;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 16px; height: 16px; margin-right: 6px;"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
        Save Code &amp; Pixel Settings
      </button>
      <a href="{{ url('/') }}" target="_blank" class="btn btn-secondary" style="padding: 12px 20px; font-weight: 600;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px; margin-right: 6px;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        Test on Live Site
      </a>
    </div>
  </form>

  <!-- REFERENCE CHEAT SHEET / TEMPLATES CARD -->
  <div class="card" style="margin-top: 32px; border: 1px dashed var(--border-color);">
    <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 12px; color: var(--text-primary); display: flex; align-items: center; gap: 8px;">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 16px; height: 16px; color: var(--accent);"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
      Quick Reference &amp; Custom Event Code Snippets
    </h3>
    <p style="font-size: 0.82rem; color: var(--text-muted); margin-bottom: 16px;">
      Use these JavaScript snippets in your custom footer code or event listeners to trigger conversions in Meta Ads and Google Analytics.
    </p>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
      <div style="background: rgba(0,0,0,0.2); padding: 14px; border-radius: 6px; border: 1px solid var(--border-color);">
        <div style="font-weight: 600; font-size: 0.82rem; color: #93C5FD; margin-bottom: 6px;">Meta Pixel Lead Event (Contact Form / Trial)</div>
        <pre style="margin: 0; font-size: 0.75rem; color: #E2E8F0; font-family: monospace; white-space: pre-wrap; background: transparent; padding: 0;">&lt;script&gt;
// Track a lead conversion on form submission
if (typeof fbq === 'function') {
  fbq('track', 'Lead', {
    content_name: 'Contact Inquiry Submission',
    status: 'new'
  });
}
&lt;/script&gt;</pre>
      </div>

      <div style="background: rgba(0,0,0,0.2); padding: 14px; border-radius: 6px; border: 1px solid var(--border-color);">
        <div style="font-weight: 600; font-size: 0.82rem; color: #FCD34D; margin-bottom: 6px;">GA4 Custom Event Trigger</div>
        <pre style="margin: 0; font-size: 0.75rem; color: #E2E8F0; font-family: monospace; white-space: pre-wrap; background: transparent; padding: 0;">&lt;script&gt;
// Send custom event to Google Analytics 4
if (typeof gtag === 'function') {
  gtag('event', 'generate_lead', {
    currency: 'USD',
    value: 100.00
  });
}
&lt;/script&gt;</pre>
      </div>
    </div>
  </div>

</div>

<style>
  .switch-toggle input:checked + .toggle-slider {
    background-color: var(--accent) !important;
  }
  .switch-toggle input:checked + .toggle-slider:before {
    transform: translateX(22px);
  }
  .toggle-slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .3s;
    border-radius: 50%;
  }
  .card .switch-toggle input:checked + .toggle-slider:before {
    transform: translateX(18px);
  }
</style>
@endsection
