@extends('admin.layout')

@section('title', ($client->exists ? 'Edit' : 'Add') . ' Client Logo')
@section('page_title', ($client->exists ? 'Edit Client Logo: ' . $client->name : 'Add New Client Logo'))

@section('content')
<style>
  .logo-upload-grid {
    display: flex;
    gap: 20px;
    align-items: flex-start;
    flex-wrap: wrap;
  }
  .logo-preview-card {
    width: 170px;
    height: 92px;
    border: 2px dashed var(--border-color);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    padding: 8px;
    overflow: hidden;
    flex-shrink: 0;
    transition: border-color 0.2s ease;
  }
  .logo-controls-wrap {
    flex: 1;
    min-width: 260px;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .media-picker-bar {
    display: flex;
    gap: 8px;
    align-items: center;
  }
  .client-form-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 32px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
    gap: 12px;
    flex-wrap: wrap;
  }

  @media (max-width: 600px) {
    .logo-upload-grid {
      flex-direction: column;
      align-items: stretch;
    }
    .logo-preview-card {
      width: 100%;
      max-width: 200px;
      height: 90px;
      margin: 0 auto;
    }
    .logo-controls-wrap {
      min-width: 0;
      width: 100%;
    }
    .media-picker-bar {
      flex-direction: column;
      align-items: stretch;
    }
    .client-form-footer {
      flex-direction: column-reverse;
    }
    .client-form-footer .btn {
      width: 100%;
      justify-content: center;
    }
  }
</style>

<div style="max-width: 820px; margin: 0 auto;">
  <div style="margin-bottom: 16px;">
    <a href="{{ route('admin.cms.clients.index') }}" class="btn btn-secondary btn-sm">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
      Back to Client Logos
    </a>
  </div>

  <div class="card" style="margin-bottom: 0;">
    <form action="{{ $client->exists ? route('admin.cms.clients.update', $client->id) : route('admin.cms.clients.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
        
        <!-- Brand Name -->
        <div class="form-group">
          <label for="name" class="form-label" style="font-weight: 600;">Client / Company Name <span style="color: #EF4444;">*</span></label>
          <input type="text" name="name" id="name" value="{{ old('name', $client->name) }}" class="form-control" placeholder="e.g. Acme Corporation, Hauni, Daimler" required>
          @error('name')
            <div style="color: #EF4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Logo Upload & Live Preview -->
        <div class="form-group">
          <label class="form-label" style="font-weight: 600;">Client Logo Asset <span style="color: #EF4444;">*</span></label>
          
          <div class="logo-upload-grid">
            <!-- Current / Selected Image Preview Box -->
            <div class="logo-preview-card">
              <img id="logoPreview" src="{{ $client->logo_path ? asset($client->logo_path) : 'data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'40\' fill=\'%2364748B\' viewBox=\'0 0 24 24\'><rect width=\'24\' height=\'24\' fill=\'none\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'9\'>Preview</text></svg>' }}" alt="Preview" style="max-height: 72px; max-width: 150px; object-fit: contain;">
            </div>

            <div class="logo-controls-wrap">
              <!-- Method A: File Upload -->
              <div>
                <input type="file" name="logo" id="logoInput" class="form-control" accept="image/png,image/jpeg,image/webp,image/svg+xml" onchange="previewSelectedLogo(event)">
                <p style="font-size: 0.75rem; color: var(--text-muted); margin: 5px 0 0;">Upload PNG, WebP or SVG with transparent background (180px–320px width recommended).</p>
              </div>
              
              <!-- Method B: Media Library or Path -->
              <div class="media-picker-bar">
                <input type="text" name="logo_path" id="logo_path" value="{{ old('logo_path', $client->logo_path) }}" class="form-control" style="font-size: 0.8rem; padding: 6px 10px;" placeholder="images/clients/brand.webp" oninput="document.getElementById('logoPreview').src = this.value ? '{{ url('/') }}/' + this.value.replace(/^\//, '') : ''">
                <button type="button" class="btn btn-secondary btn-filemanager" data-target="#logo_path" data-preview="#logoPreview" style="white-space: nowrap; font-size: 0.78rem;">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                  Media Library
                </button>
              </div>
            </div>
          </div>

          @error('logo')
            <div style="color: #EF4444; font-size: 0.8rem; margin-top: 6px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Target Website Link -->
        <div class="form-group">
          <label for="website_url" class="form-label" style="font-weight: 600;">Client Website URL <span style="font-size: 0.78rem; font-weight: normal; color: var(--text-muted);">(Optional)</span></label>
          <input type="url" name="website_url" id="website_url" value="{{ old('website_url', $client->website_url) }}" class="form-control" placeholder="https://client-company.com">
          <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 4px;">Clicking the logo on the website marquee will open the client's official site in a new browser tab.</p>
          @error('website_url')
            <div style="color: #EF4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Display Order & Active Toggle -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label for="display_order" class="form-label" style="font-weight: 600;">Display Order Sequence</label>
            <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $client->display_order ?? 1) }}" class="form-control" min="0" step="1">
            <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 4px;">Sequence priority in the scrolling marquee banner.</p>
          </div>

          <div class="form-group" style="display: flex; flex-direction: column; justify-content: center;">
            <label class="form-label" style="font-weight: 600; margin-bottom: 8px;">Visibility Status</label>
            <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.88rem;">
              <input type="checkbox" name="is_active" value="1" {{ old('is_active', $client->is_active ?? true) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--accent);">
              <span>Publish actively across marketing marquees</span>
            </label>
          </div>
        </div>

      </div>

      <!-- Form Footer Actions -->
      <div class="client-form-footer">
        <a href="{{ route('admin.cms.clients.index') }}" class="btn btn-secondary">
          Cancel
        </a>
        <button type="submit" class="btn btn-primary" style="padding: 10px 24px;">
          {{ $client->exists ? 'Save Changes' : 'Create Client Logo' }}
        </button>
      </div>
    </form>
  </div>
</div>

<script>
function previewSelectedLogo(event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('logoPreview').src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}
</script>
@endsection

