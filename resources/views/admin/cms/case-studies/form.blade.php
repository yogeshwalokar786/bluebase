@extends('admin.layout')

@section('title', $isEdit ? 'Edit Case Study' : 'Create Case Study')
@section('page_title', $isEdit ? 'Edit Case Study' : 'Create Case Study')

@section('content')
<style>
  .form-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 24px;
  }
  @media (max-width: 900px) {
    .form-grid {
      grid-template-columns: 1fr;
    }
  }
  .form-group {
    margin-bottom: 20px;
  }
  .form-group label {
    display: block;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--text);
    margin-bottom: 7px;
  }
  .form-group .hint {
    font-size: 0.75rem;
    color: var(--text-dim);
    margin-top: 5px;
  }
  .form-control {
    width: 100%;
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 10px 14px;
    color: var(--text);
    font-family: inherit;
    font-size: 0.9rem;
    transition: all 0.2s;
  }
  .form-control:focus {
    outline: none;
    border-color: var(--accent);
    box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.15);
  }
  textarea.form-control {
    min-height: 90px;
    resize: vertical;
  }
  .checkbox-label {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    font-size: 0.88rem;
    color: var(--text);
    font-weight: 500;
  }
  .checkbox-label input {
    width: 18px;
    height: 18px;
    accent-color: var(--primary);
  }
</style>

<div style="margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between;">
  <div>
    <a href="{{ route('admin.cms.case-studies.index') }}" style="color: var(--accent); text-decoration: none; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 6px; margin-bottom: 8px;">
      &larr; Back to All Case Studies
    </a>
    <h2 style="font-size: 1.3rem; font-weight: 700; color: var(--text); margin: 0;">
      {{ $isEdit ? 'Edit: ' . $story->client_name : 'Create New Case Study' }}
    </h2>
  </div>
</div>

<form action="{{ $isEdit ? route('admin.cms.case-studies.update', $story->id) : route('admin.cms.case-studies.store') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <div class="form-grid">
    
    <!-- Left Column: Primary Content -->
    <div>
      <div class="card" style="padding: 24px; margin-bottom: 24px;">
        <h3 style="font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
          Core Case Study Information
        </h3>

        <div class="form-group">
          <label>Case Study Headline *</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $story->title) }}" placeholder="e.g. Custom Fleet Management ERP & Instant Booking Engine" required>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label>Client Name *</label>
            <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $story->client_name) }}" placeholder="e.g. OMG Rental Bikes" required>
          </div>

          <div class="form-group">
            <label>URL Slug (auto-generated if empty)</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $story->slug) }}" placeholder="e.g. omg-rental-bikes">
          </div>
        </div>

        <!-- Client Logo Picker with File Manager & Direct Upload -->
        <div class="form-group">
          <label style="font-weight: 600; color: var(--text);">Client Brand Logo</label>
          <div class="media-picker-group">
            <div class="media-picker-input-wrap">
              <input type="text" name="client_logo" id="client_logo"
                value="{{ old('client_logo', $story->client_logo) }}" class="form-control"
                placeholder="images/clients/logo.png or uploads/...">
              <button type="button" class="btn btn-secondary btn-filemanager" data-target="#client_logo"
                data-preview="#client_logo_preview" data-type="image">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;">
                  <rect x="3" y="3" width="18" height="18" rx="2" />
                  <circle cx="8.5" cy="8.5" r="1.5" />
                  <polyline points="21 15 16 10 5 21" />
                </svg>
                Browse Media
              </button>
            </div>
            <div class="media-preview-container" id="client_logo_preview" style="width: 120px; height: 60px;">
              @if($story->client_logo)
                <img src="{{ asset($story->client_logo) }}" alt="Preview" onerror="this.style.display='none';">
              @else
                <div class="media-preview-placeholder">No logo</div>
              @endif
            </div>
          </div>
          <div style="margin-top: 6px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
            <div class="hint" style="margin-top: 0;">Select from media library or upload a file directly:</div>
            <input type="file" name="client_logo_file" id="client_logo_file" accept="image/*" style="font-size: 0.8rem; color: var(--text-muted);" onchange="previewDirectFile(this, '#client_logo_preview')">
          </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label>Industry</label>
            <input type="text" name="industry" class="form-control" value="{{ old('industry', $story->industry) }}" placeholder="e.g. Mobility Startup">
          </div>

          <div class="form-group">
            <label>Service Tag</label>
            <input type="text" name="service_tag" class="form-control" value="{{ old('service_tag', $story->service_tag) }}" placeholder="e.g. Fleet ERP & Web">
          </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 16px;">
          <div class="form-group">
            <label>Status Badge Text</label>
            <input type="text" name="status_badge" class="form-control" value="{{ old('status_badge', $story->status_badge) }}" placeholder="e.g. Live & Fully Managed">
          </div>

          <div class="form-group">
            <label>Badge Color</label>
            <select name="status_color" class="form-control">
              <option value="green" {{ old('status_color', $story->status_color) === 'green' ? 'selected' : '' }}>Green (Live / Scaled)</option>
              <option value="blue" {{ old('status_color', $story->status_color) === 'blue' ? 'selected' : '' }}>Blue (Event / Remote)</option>
              <option value="amber" {{ old('status_color', $story->status_color) === 'amber' ? 'selected' : '' }}>Amber (Extension / Tool)</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label>Metric Chip Subtitle</label>
          <input type="text" name="metric_chip" class="form-control" value="{{ old('metric_chip', $story->metric_chip) }}" placeholder="e.g. 100% Paperless KYC · Real-Time Fleet ERP">
        </div>

        <!-- Hero Image Picker with File Manager & Direct Upload (Like Blogs) -->
        <div class="form-group">
          <label class="form-label" style="font-weight: 600; color: var(--text);">Featured Hero &amp; Thumbnail Image</label>
          <div class="media-picker-group">
            <div class="media-picker-input-wrap">
              <input type="text" name="hero_image" id="hero_image"
                value="{{ old('hero_image', $story->hero_image ?? 'images/stories/omg-rental-bikes-brand.png') }}" class="form-control"
                placeholder="images/stories/omg-rental-bikes-brand.png or uploads/...">
              <button type="button" class="btn btn-secondary btn-filemanager" data-target="#hero_image"
                data-preview="#hero_image_preview" data-type="image">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;">
                  <rect x="3" y="3" width="18" height="18" rx="2" />
                  <circle cx="8.5" cy="8.5" r="1.5" />
                  <polyline points="21 15 16 10 5 21" />
                </svg>
                Browse Media
              </button>
            </div>
            <div class="media-preview-container" id="hero_image_preview">
              @if($story->hero_image)
                <img src="{{ asset($story->hero_image) }}" alt="Preview" onerror="this.style.display='none';">
              @else
                <div class="media-preview-placeholder">No image selected</div>
              @endif
            </div>
          </div>
          <div style="margin-top: 8px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
            <div class="hint" style="margin-top: 0;">Click &ldquo;Browse Media&rdquo; to choose from media library, or upload directly from your device:</div>
            <input type="file" name="hero_image_file" id="hero_image_file" accept="image/*" style="font-size: 0.8rem; color: var(--text-muted);" onchange="previewDirectFile(this, '#hero_image_preview')">
          </div>
        </div>

        <div class="form-group">
          <label>Excerpt / Card Summary *</label>
          <textarea name="excerpt" class="form-control" style="min-height: 80px;" required>{{ old('excerpt', $story->excerpt) }}</textarea>
        </div>
      </div>

      <!-- Narrative Breakdown -->
      <div class="card" style="padding: 24px; margin-bottom: 24px;">
        <h3 style="font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
          Case Study Narrative Breakdown
        </h3>

        <div class="form-group">
          <label>The Challenge</label>
          <textarea name="challenge" class="form-control" style="min-height: 100px;">{{ old('challenge', $story->challenge) }}</textarea>
        </div>

        <div class="form-group">
          <label>Our Solution</label>
          <textarea name="solution" class="form-control" style="min-height: 100px;">{{ old('solution', $story->solution) }}</textarea>
        </div>

        <div class="form-group">
          <label>Measurable Results</label>
          <textarea name="results" class="form-control" style="min-height: 100px;">{{ old('results', $story->results) }}</textarea>
        </div>

        <div class="form-group">
          <label>Full Content (Rich HTML / Markdown)</label>
          <textarea name="content" class="form-control" style="min-height: 160px;">{{ old('content', $story->content) }}</textarea>
          <div class="hint">Optional deep-dive technical write-up.</div>
        </div>
      </div>

      <!-- SEO Settings -->
      <div class="card" style="padding: 24px;">
        <h3 style="font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
          Search Engine Optimization (SEO)
        </h3>

        <div class="form-group">
          <label>Meta Title</label>
          <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $story->meta_title) }}" placeholder="e.g. OMG Rental Bikes Case Study | Bluebase Technologies">
        </div>

        <div class="form-group">
          <label>Meta Description</label>
          <textarea name="meta_description" class="form-control" style="min-height: 80px;">{{ old('meta_description', $story->meta_description) }}</textarea>
        </div>

        <div class="form-group">
          <label>Meta Keywords</label>
          <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords', $story->meta_keywords) }}">
        </div>
      </div>
    </div>

    <!-- Right Column: Settings & Metrics -->
    <div>
      <div class="card" style="padding: 24px; margin-bottom: 24px;">
        <h3 style="font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
          Publishing Controls
        </h3>

        <div class="form-group">
          <label class="checkbox-label">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $story->is_published) ? 'checked' : '' }}>
            <span>Publish Live on Website</span>
          </label>
        </div>

        <div class="form-group">
          <label class="checkbox-label">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $story->is_featured) ? 'checked' : '' }}>
            <span>Feature in Spotlight Hero</span>
          </label>
        </div>

        <div class="form-group">
          <label>Display Sort Order</label>
          <input type="number" name="display_order" class="form-control" value="{{ old('display_order', $story->display_order ?? 0) }}">
          <div class="hint">Lower numbers appear first (1, 2, 3...)</div>
        </div>

        <div class="form-group">
          <label>Custom View Blade (Optional)</label>
          <input type="text" name="view_blade" class="form-control" value="{{ old('view_blade', $story->view_blade) }}" placeholder="pages.company.omg-rental-bikes">
          <div class="hint">Leave empty to use universal single case study template.</div>
        </div>

        <div class="form-group">
          <label>External Project URL</label>
          <input type="url" name="project_url" class="form-control" value="{{ old('project_url', $story->project_url) }}" placeholder="https://omgrentalbikes.com">
        </div>

        <div class="form-group">
          <label>Project URL Label</label>
          <input type="text" name="project_url_label" class="form-control" value="{{ old('project_url_label', $story->project_url_label) }}" placeholder="omgrentalbikes.com">
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; padding: 12px; margin-top: 10px;">
          {{ $isEdit ? 'Save Changes' : 'Publish Case Study' }}
        </button>
      </div>

      <!-- Metrics Config -->
      <div class="card" style="padding: 24px; margin-bottom: 24px;">
        <h3 style="font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 18px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
          Highlight Metrics
        </h3>

        @php
          $rawFeatured = '';
          if (!empty($story->featured_stats) && is_array($story->featured_stats)) {
              $lines = [];
              foreach ($story->featured_stats as $fs) {
                  $lines[] = ($fs['num'] ?? '') . ' | ' . ($fs['suffix'] ?? '') . ' | ' . ($fs['label'] ?? '');
              }
              $rawFeatured = implode("\n", $lines);
          }

          $rawPills = '';
          if (!empty($story->stats_pills) && is_array($story->stats_pills)) {
              $lines = [];
              foreach ($story->stats_pills as $sp) {
                  $lines[] = ($sp['value'] ?? '') . ' | ' . ($sp['label'] ?? '');
              }
              $rawPills = implode("\n", $lines);
          }

          $rawTech = '';
          if (!empty($story->technologies) && is_array($story->technologies)) {
              $rawTech = implode(', ', $story->technologies);
          }
        @endphp

        <div class="form-group">
          <label>Hero Spotlight Metrics (1 per line)</label>
          <textarea name="featured_stats_raw" class="form-control" style="min-height: 80px; font-family: monospace; font-size: 0.8rem;" placeholder="3.5 | X | Direct Bookings&#10;45 | % | Idle Drop&#10;# | 1 | Google Rank">{{ old('featured_stats_raw', $rawFeatured) }}</textarea>
          <div class="hint">Format: <code>Number | Suffix | Label</code></div>
        </div>

        <div class="form-group">
          <label>Card Stats Pills (1 per line)</label>
          <textarea name="stats_pills_raw" class="form-control" style="min-height: 80px; font-family: monospace; font-size: 0.8rem;" placeholder="3.5X | Direct Bookings&#10;100% | Digital KYC">{{ old('stats_pills_raw', $rawPills) }}</textarea>
          <div class="hint">Format: <code>Value | Label</code></div>
        </div>

        <div class="form-group">
          <label>Technologies Used</label>
          <input type="text" name="technologies_raw" class="form-control" value="{{ old('technologies_raw', $rawTech) }}" placeholder="Laravel, MySQL, Redis, Tailwind CSS">
          <div class="hint">Comma-separated list</div>
        </div>
      </div>
    </div>

  </div>
</form>

@push('scripts')
<script>
function previewDirectFile(input, previewSelector) {
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      const container = document.querySelector(previewSelector);
      if (container) {
        container.innerHTML = '<img src="' + e.target.result + '" alt="Preview" style="max-height: 100%; max-width: 100%; border-radius: 6px; object-fit: contain;">';
      }
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
@endpush

@endsection
