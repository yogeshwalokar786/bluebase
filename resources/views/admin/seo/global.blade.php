@extends('admin.layout')

@section('title', 'Global SEO & Tracking')
@section('page_title', 'Advanced Global SEO & Tracking Configuration')

@section('content')
<div style="display: flex; gap: 12px; margin-bottom: 20px;">
  <a href="{{ route('admin.seo.global') }}" class="btn btn-primary btn-sm">Global SEO Defaults</a>
  <a href="{{ route('admin.seo.pages.index') }}" class="btn btn-secondary btn-sm">Manage Page SEO ({{ \App\Models\PageSeo::count() }} Pages)</a>
  <a href="{{ route('admin.seo.sitemap.index') }}" class="btn btn-secondary btn-sm">XML Sitemap Generator</a>
</div>

<div class="card" style="max-width: 960px;">
  <form action="{{ route('admin.seo.global.update') }}" method="POST">
    @csrf

    <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
      1. Default Meta &amp; Search Engine Snippets
    </h3>

    <div class="form-group">
      <label class="form-label">Global Default Meta Title *</label>
      <input type="text" name="seo_default_title" value="{{ $settings['seo_default_title'] ?? 'Bluebase Technologies | Digital Engineering & Autonomous AI Services' }}" class="form-control" required>
      <div class="form-hint">Recommended length: 50–60 characters. Appears as default title tag in search results.</div>
    </div>

    <div class="form-group">
      <label class="form-label">Global Default Meta Description *</label>
      <textarea name="seo_default_description" class="form-control" rows="3" required>{{ $settings['seo_default_description'] ?? 'Bluebase is an elite digital engineering and autonomous AI services platform building cloud-native architectures, AI copilots, and enterprise web & mobile products.' }}</textarea>
      <div class="form-hint">Recommended length: 140–160 characters. Used when a page has no custom meta description.</div>
    </div>

    <div class="form-group">
      <label class="form-label">Global Default Meta Keywords</label>
      <input type="text" name="seo_default_keywords" value="{{ $settings['seo_default_keywords'] ?? 'digital engineering, autonomous AI agents, enterprise mobility, SAP integration, cloud architecture' }}" class="form-control">
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Default Robots Indexing Policy</label>
        <select name="seo_robots" class="form-select">
          <option value="index, follow" {{ ($settings['seo_robots'] ?? 'index, follow') === 'index, follow' ? 'selected' : '' }}>index, follow (Recommended for Production)</option>
          <option value="noindex, follow" {{ ($settings['seo_robots'] ?? '') === 'noindex, follow' ? 'selected' : '' }}>noindex, follow</option>
          <option value="noindex, nofollow" {{ ($settings['seo_robots'] ?? '') === 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow (Staging / Private)</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Twitter / X Publisher Handle</label>
        <input type="text" name="seo_twitter_handle" value="{{ $settings['seo_twitter_handle'] ?? '@bluebase_tech' }}" class="form-control" placeholder="@company">
      </div>
    </div>

    <h3 style="font-size: 1.05rem; font-weight: 700; margin-top: 24px; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
      2. Social Media Sharing Card (OpenGraph)
    </h3>

    <div class="form-group">
      <label class="form-label">Default Social Share Image (1200 × 630 px)</label>
      <div class="media-picker-group">
        <div class="media-picker-input-wrap">
          <input type="text" name="seo_default_og_image" id="seo_og_image" value="{{ $settings['seo_default_og_image'] ?? 'images/stories/hauni.jpg' }}" class="form-control" placeholder="images/...">
          <button type="button" class="btn btn-secondary btn-filemanager" data-target="#seo_og_image" data-preview="#seo_og_image_preview">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            Select via File Manager
          </button>
        </div>
        <div class="media-preview-container" id="seo_og_image_preview" style="width: 240px; height: 126px;">
          <img src="{{ asset($settings['seo_default_og_image'] ?? 'images/stories/hauni.jpg') }}" alt="OG Preview">
        </div>
      </div>
      <div class="form-hint">Displayed when links to your site are shared on LinkedIn, Twitter, Slack, and WhatsApp.</div>
    </div>

    <h3 style="font-size: 1.05rem; font-weight: 700; margin-top: 24px; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
      3. Webmaster &amp; Search Console Verification
    </h3>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Google Search Console Verification Token</label>
        <input type="text" name="seo_google_verification" value="{{ $settings['seo_google_verification'] ?? '' }}" class="form-control" placeholder="google-site-verification=...">
        <div class="form-hint">Inserts &lt;meta name="google-site-verification"&gt; in &lt;head&gt;.</div>
      </div>

      <div class="form-group">
        <label class="form-label">Bing Webmaster Tools Verification Token</label>
        <input type="text" name="seo_bing_verification" value="{{ $settings['seo_bing_verification'] ?? '' }}" class="form-control" placeholder="msvalidate.01=...">
        <div class="form-hint">Inserts &lt;meta name="msvalidate.01"&gt; in &lt;head&gt;.</div>
      </div>
    </div>

    <h3 style="font-size: 1.05rem; font-weight: 700; margin-top: 24px; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
      4. Analytics, Header &amp; Footer Code Injection
    </h3>

    <div class="form-group">
      <label class="form-label">Custom Header Scripts (Google Analytics, GTM, Meta Pixel)</label>
      <textarea name="seo_header_scripts" class="form-control" rows="4" style="font-family: monospace; font-size: 0.8rem;" placeholder="<!-- Paste <script> tags here -->">{{ $settings['seo_header_scripts'] ?? '' }}</textarea>
      <div class="form-hint">Injected directly before &lt;/head&gt; on every public page.</div>
    </div>

    <div class="form-group">
      <label class="form-label">Custom Footer Scripts (Chat widgets, Conversion tracking)</label>
      <textarea name="seo_footer_scripts" class="form-control" rows="4" style="font-family: monospace; font-size: 0.8rem;" placeholder="<!-- Paste footer scripts here -->">{{ $settings['seo_footer_scripts'] ?? '' }}</textarea>
      <div class="form-hint">Injected directly before &lt;/body&gt; on every public page.</div>
    </div>

    <div style="margin-top: 28px;">
      <button type="submit" class="btn btn-primary" style="padding: 10px 24px;">Save Global SEO Settings</button>
    </div>
  </form>
</div>
@endsection

