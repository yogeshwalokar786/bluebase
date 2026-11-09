@extends('admin.layout')

@section('title', $isEdit ? 'Edit Page SEO: ' . $page->page_name : 'Add Custom Page SEO')
@section('page_title', $isEdit ? 'SEO Configuration: ' . $page->page_name : 'Create Custom Page SEO')

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.seo.pages.index') }}" class="btn btn-secondary btn-sm">&larr; Back to Page SEO List</a>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
  <!-- Left Column: Form -->
  <div class="card" style="margin-bottom: 0;">
    <form action="{{ $isEdit ? route('admin.seo.pages.update', $page->id) : route('admin.seo.pages.store') }}" method="POST">
      @csrf

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Page Display Name *</label>
          <input type="text" name="page_name" value="{{ old('page_name', $page->page_name) }}" class="form-control" required placeholder="e.g. Core Services Catalog">
        </div>

        <div class="form-group">
          <label class="form-label">Laravel Route Name *</label>
          <input type="text" name="route_name" value="{{ old('route_name', $page->route_name) }}" class="form-control" required placeholder="e.g. services or contact">
          <div class="form-hint">Matches route('route_name')</div>
        </div>
      </div>

      <div class="form-group">
        <label class="form-label">Public URL Path *</label>
        <input type="text" name="url_path" id="url_path_input" value="{{ old('url_path', $page->url_path) }}" class="form-control" required placeholder="e.g. /services or /about-us">
      </div>

      <div class="form-group">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
          <label class="form-label" style="margin-bottom: 0;">Meta Title *</label>
          <span style="font-size: 0.72rem; color: var(--text-dim);" id="titleCharCount">0 / 60</span>
        </div>
        <input type="text" name="meta_title" id="meta_title_input" value="{{ old('meta_title', $page->meta_title) }}" class="form-control" required placeholder="High-CTR SEO Title including primary keyword | Bluebase">
        <div class="form-hint">Recommended: 50–60 characters. Appears as Google's blue headline.</div>
      </div>

      <div class="form-group">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
          <label class="form-label" style="margin-bottom: 0;">Meta Description *</label>
          <span style="font-size: 0.72rem; color: var(--text-dim);" id="descCharCount">0 / 160</span>
        </div>
        <textarea name="meta_description" id="meta_desc_input" class="form-control" rows="3" required placeholder="Engaging summary compelling users to click from search results...">{{ old('meta_description', $page->meta_description) }}</textarea>
        <div class="form-hint">Recommended: 140–160 characters. Appears as the snippet text in Google results.</div>
      </div>

      <div class="form-group">
        <label class="form-label">Meta Keywords (Comma separated)</label>
        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $page->meta_keywords) }}" class="form-control" placeholder="enterprise AI, ERP integration, cloud engineering">
      </div>

      <div class="form-group">
        <label class="form-label">Canonical URL Override</label>
        <input type="url" name="canonical_url" value="{{ old('canonical_url', $page->canonical_url) }}" class="form-control" placeholder="https://bluebase.com/services (leave empty for auto)">
      </div>

      <!-- Social Share OG Image Picker -->
      <div class="form-group">
        <label class="form-label">Social Share Image (OpenGraph / Twitter)</label>
        <div class="media-picker-group">
          <div class="media-picker-input-wrap">
            <input type="text" name="og_image" id="page_og_image" value="{{ old('og_image', $page->og_image ?? 'images/stories/hauni.jpg') }}" class="form-control" placeholder="images/...">
            <button type="button" class="btn btn-secondary btn-filemanager" data-target="#page_og_image" data-preview="#page_og_image_preview">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
              Select Image
            </button>
          </div>
          <div class="media-preview-container" id="page_og_image_preview" style="width: 220px; height: 115px;">
            <img src="{{ asset($page->og_image ?? 'images/stories/hauni.jpg') }}" alt="OG Preview">
          </div>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Robots Tag</label>
          <select name="robots" class="form-select">
            <option value="index, follow" {{ old('robots', $page->robots) === 'index, follow' ? 'selected' : '' }}>index, follow</option>
            <option value="noindex, follow" {{ old('robots', $page->robots) === 'noindex, follow' ? 'selected' : '' }}>noindex, follow</option>
            <option value="noindex, nofollow" {{ old('robots', $page->robots) === 'noindex, nofollow' ? 'selected' : '' }}>noindex, nofollow</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Sitemap Priority (0.0 - 1.0)</label>
          <select name="priority" class="form-select">
            <option value="1.0" {{ old('priority', $page->priority) == 1.0 ? 'selected' : '' }}>1.0 (Highest - Homepage)</option>
            <option value="0.9" {{ old('priority', $page->priority) == 0.9 ? 'selected' : '' }}>0.9 (Very High - Core Solutions)</option>
            <option value="0.8" {{ old('priority', $page->priority) == 0.8 ? 'selected' : '' }}>0.8 (High - Services / Products)</option>
            <option value="0.7" {{ old('priority', $page->priority) == 0.7 ? 'selected' : '' }}>0.7 (Medium-High - Blog / Stories)</option>
            <option value="0.5" {{ old('priority', $page->priority) == 0.5 ? 'selected' : '' }}>0.5 (Normal)</option>
            <option value="0.3" {{ old('priority', $page->priority) == 0.3 ? 'selected' : '' }}>0.3 (Low - Legal / Terms)</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Change Frequency</label>
          <select name="changefreq" class="form-select">
            <option value="daily" {{ old('changefreq', $page->changefreq) === 'daily' ? 'selected' : '' }}>daily</option>
            <option value="weekly" {{ old('changefreq', $page->changefreq) === 'weekly' ? 'selected' : '' }}>weekly</option>
            <option value="monthly" {{ old('changefreq', $page->changefreq) === 'monthly' ? 'selected' : '' }}>monthly</option>
            <option value="yearly" {{ old('changefreq', $page->changefreq) === 'yearly' ? 'selected' : '' }}>yearly</option>
          </select>
        </div>
      </div>

      <div class="form-group" style="margin-top: 10px;">
        <label class="form-check">
          <input type="checkbox" name="is_in_sitemap" value="1" {{ old('is_in_sitemap', $page->is_in_sitemap) ? 'checked' : '' }}>
          <span style="font-size: 0.88rem; font-weight: 600;">Include this URL in XML Sitemap (/sitemap.xml)</span>
        </label>
      </div>

      <div style="margin-top: 28px; display: flex; gap: 12px;">
        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Save SEO Configuration' : 'Create SEO Entry' }}</button>
        <a href="{{ route('admin.seo.pages.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>

  <!-- Right Column: Live Google & Social Preview Simulator -->
  <div style="display: flex; flex-direction: column; gap: 20px;">
    <!-- Google Search Snippet Preview -->
    <div class="card" style="margin-bottom: 0;">
      <div style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); margin-bottom: 12px; letter-spacing: 0.05em; display: flex; align-items: center; gap: 6px;">
        <svg style="width: 16px; height: 16px; color: #4285F4;" viewBox="0 0 24 24" fill="currentColor"><path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/></svg>
        Google Search Snippet Preview
      </div>

      <!-- Realistic Google Search Result Card -->
      <div style="background: #ffffff; color: #4d5156; border-radius: 8px; padding: 14px; font-family: arial, sans-serif; box-shadow: 0 1px 6px rgba(0,0,0,0.2);">
        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
          <div style="width: 18px; height: 18px; border-radius: 50%; background: #0050E7; display: flex; align-items: center; justify-content: center; font-size: 10px; color: #fff; font-weight: bold;">B</div>
          <div style="font-size: 0.75rem; color: #202124;">
            <span style="font-weight: 500;">Bluebase</span>
            <span style="color: #5f6368;" id="previewBreadcrumb">https://bluebase.com/services</span>
          </div>
        </div>
        <div style="font-size: 1.05rem; line-height: 1.3; color: #1a0dab; font-weight: 400; margin-bottom: 4px; cursor: pointer; text-decoration: none;" id="previewTitle">
          {{ $page->meta_title ?? 'Bluebase | Digital Engineering & Autonomous AI Services' }}
        </div>
        <div style="font-size: 0.82rem; line-height: 1.4; color: #4d5156;" id="previewDesc">
          {{ $page->meta_description ?? 'Bluebase is an elite digital engineering and autonomous AI services platform building cloud-native architectures...' }}
        </div>
      </div>
      <div style="font-size: 0.72rem; color: var(--text-dim); margin-top: 10px;">
        * Simulated approximation based on standard Google desktop SERP layout.
      </div>
    </div>

    <!-- Quick Help Card -->
    <div class="card" style="margin-bottom: 0; background: rgba(0, 80, 231, 0.08); border-color: rgba(96, 165, 250, 0.25);">
      <div style="font-size: 0.85rem; font-weight: 700; color: var(--accent); margin-bottom: 8px;">SEO Best Practices:</div>
      <ul style="font-size: 0.78rem; color: var(--text-muted); padding-left: 16px; line-height: 1.6;">
        <li>Place primary keywords in the first 30 characters of the Title.</li>
        <li>Include a clear call to action (e.g. &ldquo;Learn more&rdquo;, &ldquo;Schedule demo&rdquo;) in the description.</li>
        <li>Set priority to 1.0 for Homepage, 0.8 for primary services, and 0.7 for blogs.</li>
      </ul>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
const titleInput = document.getElementById('meta_title_input');
const descInput = document.getElementById('meta_desc_input');
const urlInput = document.getElementById('url_path_input');
const previewTitle = document.getElementById('previewTitle');
const previewDesc = document.getElementById('previewDesc');
const previewBreadcrumb = document.getElementById('previewBreadcrumb');
const titleCharCount = document.getElementById('titleCharCount');
const descCharCount = document.getElementById('descCharCount');

function updatePreview() {
  if (titleInput && previewTitle) {
    const val = titleInput.value.trim() || 'Bluebase Technologies';
    previewTitle.innerText = val;
    titleCharCount.innerText = val.length + ' / 60';
    titleCharCount.style.color = val.length > 60 ? 'var(--warning)' : 'var(--text-dim)';
  }

  if (descInput && previewDesc) {
    const val = descInput.value.trim() || 'No description entered.';
    previewDesc.innerText = val;
    descCharCount.innerText = val.length + ' / 160';
    descCharCount.style.color = val.length > 160 ? 'var(--warning)' : 'var(--text-dim)';
  }

  if (urlInput && previewBreadcrumb) {
    const val = urlInput.value.trim() || '/';
    previewBreadcrumb.innerText = 'https://bluebase.com' + (val.startsWith('/') ? val : '/' + val);
  }
}

if (titleInput) titleInput.addEventListener('input', updatePreview);
if (descInput) descInput.addEventListener('input', updatePreview);
if (urlInput) urlInput.addEventListener('input', updatePreview);

// Run initial
updatePreview();
</script>
@endpush

