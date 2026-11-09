@extends('admin.layout')

@section('title', $isEdit ? 'Edit Testimonial' : 'Add Testimonial')
@section('page_title', $isEdit ? 'Edit Testimonial: ' . $testimonial->client_name : 'Add Client Testimonial')

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.cms.testimonials.index') }}" class="btn btn-secondary btn-sm">&larr; Back to Testimonials</a>
</div>

<div class="card" style="max-width: 860px;">
  <form action="{{ $isEdit ? route('admin.cms.testimonials.update', $testimonial->id) : route('admin.cms.testimonials.store') }}" method="POST">
    @csrf

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Client / Executive Name *</label>
        <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}" class="form-control" required placeholder="e.g. Henrik Møller">
      </div>

      <div class="form-group">
        <label class="form-label">Title / Role</label>
        <input type="text" name="client_role" value="{{ old('client_role', $testimonial->client_role) }}" class="form-control" placeholder="e.g. Global IT Director">
      </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Company Name</label>
        <input type="text" name="company_name" value="{{ old('company_name', $testimonial->company_name) }}" class="form-control" placeholder="e.g. Hauni Maschinenbau GmbH">
      </div>

      <div class="form-group">
        <label class="form-label">Star Rating (1-5)</label>
        <select name="rating" class="form-select">
          <option value="5" {{ old('rating', $testimonial->rating ?? 5) == 5 ? 'selected' : '' }}>5 Stars ★★★★★</option>
          <option value="4" {{ old('rating', $testimonial->rating) == 4 ? 'selected' : '' }}>4 Stars ★★★★☆</option>
          <option value="3" {{ old('rating', $testimonial->rating) == 3 ? 'selected' : '' }}>3 Stars ★★★☆☆</option>
        </select>
      </div>
    </div>

    <!-- Client Avatar / Logo Picker with File Manager Popup -->
    <div class="form-group">
      <label class="form-label">Client Avatar or Company Logo</label>
      <div class="media-picker-group">
        <div class="media-picker-input-wrap">
          <input type="text" name="avatar" id="testimonial_avatar" value="{{ old('avatar', $testimonial->avatar) }}" class="form-control" placeholder="images/logos/... or uploads/...">
          <button type="button" class="btn btn-secondary btn-filemanager" data-target="#testimonial_avatar" data-preview="#testimonial_avatar_preview" data-type="image">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
            Browse Media
          </button>
        </div>
        <div class="media-preview-container" id="testimonial_avatar_preview" style="width: 80px; height: 80px; border-radius: 50%;">
          @if($testimonial->avatar)
            <img src="{{ asset($testimonial->avatar) }}" alt="Preview" onerror="this.style.display='none';">
          @else
            <div class="media-preview-placeholder">No avatar</div>
          @endif
        </div>
      </div>
    </div>

    <!-- Quote with Light WYSIWYG Editor -->
    <div class="form-group">
      <label class="form-label">Client Quote / Testimonial (Light Editor) *</label>
      <textarea name="quote" class="form-control editor-light" rows="4" required placeholder="Share the impact, metrics achieved, or customer praise...">{{ old('quote', $testimonial->quote) }}</textarea>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center; margin-top: 10px;">
      <div class="form-group">
        <label class="form-label">Display Order</label>
        <input type="number" name="display_order" value="{{ old('display_order', $testimonial->display_order ?? 0) }}" class="form-control" style="width: 140px;">
      </div>

      <div class="form-group" style="padding-top: 16px;">
        <label class="form-check">
          <input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
          <span style="font-size: 0.88rem; font-weight: 600;">Show on Website</span>
        </label>
      </div>
    </div>

    <div style="margin-top: 24px; display: flex; gap: 12px;">
      <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Testimonial' : 'Save Testimonial' }}</button>
      <a href="{{ route('admin.cms.testimonials.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
