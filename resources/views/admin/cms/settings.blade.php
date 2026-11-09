@extends('admin.layout')

@section('title', 'Site Settings')
@section('page_title', 'Global CMS & Enterprise Site Configuration')

@section('content')
  <div class="card" style="max-width: 960px;">
    <form action="{{ route('admin.settings.update') }}" method="POST">
      @csrf

      <h3
        style="font-size: 1.05rem; font-weight: 700; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        1. General Brand &amp; Company Info
      </h3>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Platform Name</label>
          <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'Bluebase Technologies' }}"
            class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label">Corporate Tagline</label>
          <input type="text" name="site_tagline"
            value="{{ $settings['site_tagline'] ?? 'Digital Engineering & Autonomous AI Services' }}"
            class="form-control">
        </div>
      </div>

      <!-- Brand Assets (Logo & Favicon) with File Manager Popup -->
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Primary Brand Logo</label>
          <div class="media-picker-group">
            <div class="media-picker-input-wrap">
              <input type="text" name="site_logo" id="site_logo"
                value="{{ $settings['site_logo'] ?? 'images/logo-bluebase.png' }}" class="form-control">
              <button type="button" class="btn btn-secondary btn-filemanager" data-target="#site_logo"
                data-preview="#site_logo_preview">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  style="width: 14px; height: 14px;">
                  <rect x="3" y="3" width="18" height="18" rx="2" />
                  <circle cx="8.5" cy="8.5" r="1.5" />
                  <polyline points="21 15 16 10 5 21" />
                </svg>
                Select
              </button>
            </div>
            <div class="media-preview-container" id="site_logo_preview" style="height: 60px;">
              <img src="{{ asset($settings['site_logo'] ?? 'images/logo-bluebase.png') }}" alt="Logo Preview">
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Favicon / App Icon</label>
          <div class="media-picker-group">
            <div class="media-picker-input-wrap">
              <input type="text" name="site_favicon" id="site_favicon"
                value="{{ $settings['site_favicon'] ?? 'images/logo-icon.png' }}" class="form-control">
              <button type="button" class="btn btn-secondary btn-filemanager" data-target="#site_favicon"
                data-preview="#site_favicon_preview">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  style="width: 14px; height: 14px;">
                  <rect x="3" y="3" width="18" height="18" rx="2" />
                  <circle cx="8.5" cy="8.5" r="1.5" />
                  <polyline points="21 15 16 10 5 21" />
                </svg>
                Select
              </button>
            </div>
            <div class="media-preview-container" id="site_favicon_preview" style="height: 60px;">
              <img src="{{ asset($settings['site_favicon'] ?? 'images/logo-icon.png') }}" alt="Favicon Preview">
            </div>
          </div>
        </div>
      </div>

      <h3
        style="font-size: 1.05rem; font-weight: 700; margin-top: 24px; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        2. Contact &amp; Headquarters
      </h3>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Sales &amp; Inquiries Email</label>
          <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'contact@bluebase.com' }}"
            class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label">Technical Support Email</label>
          <input type="email" name="support_email" value="{{ $settings['support_email'] ?? 'support@bluebase.com' }}"
            class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label">Direct Phone</label>
          <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '+1 (800) 555-BLUE' }}"
            class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label">Business Hours</label>
          <input type="text" name="business_hours"
            value="{{ $settings['business_hours'] ?? 'Monday - Friday: 8:00 AM - 6:00 PM PST' }}" class="form-control">
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Global Headquarters Address</label>
        <input type="text" name="office_address"
          value="{{ $settings['office_address'] ?? '742 Innovation Way, Suite 400, San Francisco, CA 94107' }}"
          class="form-control">
      </div>

      <h3
        style="font-size: 1.05rem; font-weight: 700; margin-top: 24px; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        3. Social &amp; Developer Links
      </h3>

      <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">LinkedIn URL</label>
          <input type="url" name="linkedin_url"
            value="{{ $settings['linkedin_url'] ?? 'https://linkedin.com/company/bluebase' }}" class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label">Twitter / X URL</label>
          <input type="url" name="twitter_url"
            value="{{ $settings['twitter_url'] ?? 'https://twitter.com/bluebase_tech' }}" class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label">GitHub URL</label>
          <input type="url" name="github_url" value="{{ $settings['github_url'] ?? 'https://github.com/bluebase-tech' }}"
            class="form-control">
        </div>
      </div>

      <h3
        style="font-size: 1.05rem; font-weight: 700; margin-top: 24px; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        4. Homepage Hero Messaging
      </h3>

      <div class="form-group">
        <label class="form-label">Hero Badge Text</label>
        <input type="text" name="hero_badge" value="{{ $settings['hero_badge'] ?? 'NEXT-GEN ENTERPRISE PLATFORM' }}"
          class="form-control">
      </div>

      <div class="form-group">
        <label class="form-label">Hero Main Heading</label>
        <input type="text" name="hero_title"
          value="{{ $settings['hero_title'] ?? 'Empower Your Enterprise With Autonomous AI & Digital Engineering' }}"
          class="form-control">
      </div>

      <div class="form-group">
        <label class="form-label">Hero Subtitle</label>
        <textarea name="hero_subtitle" class="form-control editor-light"
          rows="3">{{ $settings['hero_subtitle'] ?? 'Turn complex legacy systems into ultra-fast, offline-capable, AI-augmented applications without downtime.' }}</textarea>
      </div>

      <h3
        style="font-size: 1.05rem; font-weight: 700; margin-top: 32px; margin-bottom: 16px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
        5. Homepage Hero Running Corporate Background Video
      </h3>

      <div class="form-group" style="display: flex; align-items: center; gap: 12px; margin-bottom: 20px;">
        <input type="checkbox" name="hero_video_enabled" id="hero_video_enabled" value="1"
          {{ ($settings['hero_video_enabled'] ?? '1') !== '0' ? 'checked' : '' }}
          style="width: 20px; height: 20px; accent-color: var(--accent); cursor: pointer;">
        <label for="hero_video_enabled" style="font-weight: 600; cursor: pointer; margin: 0; color: var(--text-primary);">
          Enable Running Corporate Office Background Video on Homepage
        </label>
      </div>

      <!-- Video Source Picker with File Manager & Quick Presets -->
      <div class="form-group">
        <label class="form-label">Background Video Asset (MP4)</label>
        <div class="media-picker-group">
          <div class="media-picker-input-wrap">
            <input type="text" name="hero_video_url" id="hero_video_url"
              value="{{ $settings['hero_video_url'] ?? 'videos/corporate-office.mp4' }}" class="form-control">
            <button type="button" class="btn btn-secondary btn-filemanager" data-target="#hero_video_url"
              data-preview="#admin_hero_video_preview">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                style="width: 14px; height: 14px;">
                <polygon points="23 7 16 12 23 17 23 7"></polygon>
                <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
              </svg>
              Choose from File Manager
            </button>
          </div>
        </div>
        <small style="color: var(--text-muted); display: block; margin-top: 6px;">
          Choose a pre-packaged corporate video or select/upload any custom MP4 via the File Manager.
        </small>
      </div>

      <!-- Quick Corporate Presets -->
      <div class="form-group" style="margin-top: 12px;">
        <label class="form-label" style="font-size: 0.8rem; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-muted);">Quick Corporate Video Presets</label>
        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
          <button type="button" class="btn btn-secondary btn-sm" onclick="selectVideoPreset('videos/corporate-office.mp4', 'images/hero-video-poster.jpg')">
            🏢 Busy Tech Office Floor (Default)
          </button>
          <button type="button" class="btn btn-secondary btn-sm" onclick="selectVideoPreset('videos/corporate-highrise.mp4', 'videos/office-13218-720_frame.jpg')">
            🏙️ Executive Skyscraper Silhouettes
          </button>
          <button type="button" class="btn btn-secondary btn-sm" onclick="selectVideoPreset('videos/corporate-meeting.mp4', 'videos/office-4809-720_frame.jpg')">
            📊 Executive Boardroom Strategy
          </button>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-top: 16px;">
        <div class="form-group">
          <label class="form-label">Video Poster (Fallback Image)</label>
          <div class="media-picker-group">
            <div class="media-picker-input-wrap">
              <input type="text" name="hero_video_poster" id="hero_video_poster"
                value="{{ $settings['hero_video_poster'] ?? 'images/hero-video-poster.jpg' }}" class="form-control">
              <button type="button" class="btn btn-secondary btn-filemanager" data-target="#hero_video_poster">
                Browse
              </button>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Dark Gradient Overlay Opacity (0.20 - 0.95)</label>
          <input type="number" step="0.05" min="0.1" max="1.0" name="hero_video_overlay_opacity" id="hero_video_overlay_opacity"
            value="{{ $settings['hero_video_overlay_opacity'] ?? '0.65' }}" class="form-control">
          <small style="color: var(--text-muted);">Higher values darken the video to guarantee white text contrast.</small>
        </div>
      </div>

      <!-- Live Admin Video Preview -->
      <div class="form-group" style="margin-top: 16px;">
        <label class="form-label">Live Video Stream Preview</label>
        <div style="position: relative; max-width: 640px; border-radius: 8px; overflow: hidden; background: #070B19; border: 1px solid var(--border-color); aspect-ratio: 16/9;">
          <video id="admin_hero_video_player" autoplay loop muted playsinline style="width: 100%; height: 100%; object-fit: cover;">
            <source src="{{ asset($settings['hero_video_url'] ?? 'videos/corporate-office.mp4') }}" type="video/mp4">
          </video>
          <div id="admin_preview_overlay" style="position: absolute; inset: 0; background: radial-gradient(circle at 50% 35%, rgba(7, 11, 25, 0.45) 0%, rgba(7, 11, 25, 0.82) 85%), linear-gradient(180deg, rgba(7, 11, 25, 0.70) 0%, rgba(0, 80, 231, 0.38) 45%, rgba(7, 11, 25, 0.90) 100%); opacity: {{ $settings['hero_video_overlay_opacity'] ?? '0.65' }}; pointer-events: none;"></div>
          <div style="position: absolute; inset: 0; display: flex; flex-direction: column; align-items: center; justify-content: center; text-align: center; color: #fff; padding: 20px; pointer-events: none;">
            <span style="font-size: 0.75rem; letter-spacing: 0.05em; text-transform: uppercase; color: #93C5FD; font-weight: 600;">Hero Preview</span>
            <span style="font-size: 1.25rem; font-weight: 700; margin-top: 4px;">We Engineer Scalable Software & AI Systems</span>
          </div>
        </div>
      </div>

      <script>
        function selectVideoPreset(videoPath, posterPath) {
          const videoInput = document.getElementById('hero_video_url');
          const posterInput = document.getElementById('hero_video_poster');
          const player = document.getElementById('admin_hero_video_player');
          
          if (videoInput) videoInput.value = videoPath;
          if (posterInput && posterPath) posterInput.value = posterPath;
          if (player) {
            player.src = '{{ asset("") }}/' + videoPath.replace(/^\//, '');
            player.load();
            player.play().catch(() => {});
          }
        }

        document.addEventListener('DOMContentLoaded', function() {
          const videoInput = document.getElementById('hero_video_url');
          const opacityInput = document.getElementById('hero_video_overlay_opacity');
          const player = document.getElementById('admin_hero_video_player');
          const overlay = document.getElementById('admin_preview_overlay');

          if (videoInput && player) {
            videoInput.addEventListener('change', function() {
              let url = this.value;
              if (!url.startsWith('http') && !url.startsWith('/')) {
                url = '{{ asset("") }}/' + url;
              }
              player.src = url;
              player.load();
              player.play().catch(() => {});
            });
          }

          if (opacityInput && overlay) {
            opacityInput.addEventListener('input', function() {
              overlay.style.opacity = this.value;
            });
          }
        });
      </script>

      <div style="margin-top: 28px;">
        <button type="submit" class="btn btn-primary" style="padding: 10px 24px; font-size: 0.95rem;">Save Site
          Settings</button>
      </div>
    </form>
  </div>
@endsection