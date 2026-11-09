@extends('admin.layout')

@section('title', $isEdit ? 'Edit Service' : 'Create Service')
@section('page_title', $isEdit ? 'Edit Service: ' . $service->title : 'Create New Enterprise Service')

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.cms.services.index') }}" class="btn btn-secondary btn-sm">&larr; Back to Services List</a>
</div>

<div class="card" style="max-width: 960px;">
  <form action="{{ $isEdit ? route('admin.cms.services.update', $service->id) : route('admin.cms.services.store') }}" method="POST">
    @csrf

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Service Title *</label>
        <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-control" placeholder="e.g. Autonomous AI Agents & Copilots" required>
      </div>

      <div class="form-group">
        <label class="form-label">URL Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $service->slug) }}" class="form-control" placeholder="auto-generated if empty">
        <div class="form-hint">Used for URLs: /services/{slug}</div>
      </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Tagline</label>
        <input type="text" name="tagline" value="{{ old('tagline', $service->tagline) }}" class="form-control" placeholder="e.g. Enterprise-grade LLMs and autonomous multi-agent workflows">
      </div>

      <div class="form-group">
        <label class="form-label">Icon Name / CSS Class</label>
        <input type="text" name="icon" value="{{ old('icon', $service->icon) }}" class="form-control" placeholder="cpu, code-square, phone, layers">
      </div>
    </div>

    <!-- Short Summary with Light Text Editor -->
    <div class="form-group">
      <label class="form-label">Short Summary (Light Editor) *</label>
      <textarea name="summary" class="form-control editor-light" rows="3" required placeholder="Concise 1-2 sentence elevator pitch for cards...">{{ old('summary', $service->summary) }}</textarea>
    </div>

    <!-- Full Technical Description with Full Advanced Editor -->
    <div class="form-group">
      <label class="form-label">Full Technical Description (Advanced Editor)</label>
      <textarea name="description" class="form-control editor-advanced" rows="7" placeholder="In-depth explanation of service capabilities, architectural approach, and enterprise value...">{{ old('description', $service->description) }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Key Features &amp; Capabilities (One per line)</label>
      <textarea name="features_text" class="form-control" rows="5" placeholder="Deterministic retrieval-augmented generation (RAG)&#10;Multi-agent task orchestration & tool calling&#10;Native ERP & database operational access&#10;Audit trails and compliance logs">{{ old('features_text', is_array($service->features) ? implode("\n", $service->features) : '') }}</textarea>
      <div class="form-hint">Each line will become a bullet feature on the service card and landing page.</div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center; margin-top: 10px;">
      <div class="form-group">
        <label class="form-label">Display Order</label>
        <input type="number" name="display_order" value="{{ old('display_order', $service->display_order ?? 0) }}" class="form-control" style="width: 140px;">
        <div class="form-hint">Lower numbers display first.</div>
      </div>

      <div class="form-group" style="padding-top: 16px;">
        <label class="form-check">
          <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active ?? true) ? 'checked' : '' }}>
          <span style="font-size: 0.88rem; font-weight: 600;">Active &amp; Published on Website</span>
        </label>
      </div>
    </div>

    <div style="margin-top: 24px; display: flex; gap: 12px;">
      <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Service' : 'Create Service' }}</button>
      <a href="{{ route('admin.cms.services.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
