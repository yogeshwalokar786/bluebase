@extends('admin.layout')

@section('title', ($client->exists ? 'Edit' : 'Add') . ' Client Logo')
@section('page_title', ($client->exists ? 'Edit Client Logo: ' . $client->name : 'Add New Client Logo'))

@section('content')
<div class="card" style="max-width: 820px; margin: 0 auto;">
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
        <label class="form-label" style="font-weight: 600;">Client Logo Image <span style="color: #EF4444;">*</span></label>
        
        <div style="display: flex; gap: 20px; align-items: flex-start; flex-wrap: wrap;">
          <!-- Current / Selected Image Preview Box -->
          <div style="width: 180px; height: 90px; border: 2px dashed var(--border-color); border-radius: 8px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.04); padding: 10px; overflow: hidden; position: relative;">
            <img id="logoPreview" src="{{ $client->logo_path ? asset($client->logo_path) : 'data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'40\' fill=\'%2364748B\' viewBox=\'0 0 24 24\'><rect width=\'24\' height=\'24\' fill=\'none\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'9\'>Preview</text></svg>' }}" alt="Preview" style="max-height: 70px; max-width: 160px; object-fit: contain;">
          </div>

          <div style="flex: 1; min-width: 250px;">
            <input type="file" name="logo" id="logoInput" class="form-control" accept="image/png,image/jpeg,image/webp,image/svg+xml" onchange="previewSelectedLogo(event)">
            <p style="font-size: 0.78rem; color: var(--text-muted); margin: 6px 0 10px;">Recommended: Transparent PNG or WebP with 180px-300px width. SVG vectors are also supported.</p>
            
            <div style="display: flex; align-items: center; gap: 8px;">
              <span style="font-size: 0.75rem; color: var(--text-dim); text-transform: uppercase;">or relative path:</span>
              <input type="text" name="logo_path" id="logo_path" value="{{ old('logo_path', $client->logo_path) }}" class="form-control" style="font-size: 0.8rem; padding: 4px 10px;" placeholder="images/clients/brand.webp" oninput="document.getElementById('logoPreview').src = this.value ? '{{ url('/') }}/' + this.value.replace(/^\//, '') : ''">
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
        <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 4px;">If provided, clicking the logo on the website marquee will open the client's official site in a new tab.</p>
        @error('website_url')
          <div style="color: #EF4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
        @enderror
      </div>

      <!-- Display Order & Active Toggle -->
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div class="form-group">
          <label for="display_order" class="form-label" style="font-weight: 600;">Display Order Sequence</label>
          <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $client->display_order ?? 1) }}" class="form-control" min="0" step="1">
          <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 4px;">Lower numbers appear first in the scrolling marquee banner.</p>
        </div>

        <div class="form-group" style="display: flex; flex-direction: column; justify-content: center;">
          <label class="form-label" style="font-weight: 600; margin-bottom: 8px;">Visibility Status</label>
          <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.9rem;">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $client->is_active ?? true) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--accent);">
            <span>Publish actively across website marquees</span>
          </label>
        </div>
      </div>

    </div>

    <!-- Form Footer Actions -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 32px; padding-top: 20px; border-top: 1px solid var(--border-color);">
      <a href="{{ route('admin.cms.clients.index') }}" class="btn btn-secondary">
        Cancel
      </a>
      <button type="submit" class="btn btn-primary" style="padding: 10px 24px;">
        {{ $client->exists ? 'Save Changes' : 'Create Client Logo' }}
      </button>
    </div>
  </form>
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

