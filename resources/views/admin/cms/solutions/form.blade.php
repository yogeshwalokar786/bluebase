@extends('admin.layout')

@section('title', $isEdit ? 'Edit Solution' : 'Create Solution')
@section('page_title', $isEdit ? 'Edit Solution: ' . $solution->title : 'Create New Industry Solution')

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.cms.solutions.index') }}" class="btn btn-secondary btn-sm">&larr; Back to Solutions List</a>
</div>

<div class="card" style="max-width: 960px;">
  <form action="{{ $isEdit ? route('admin.cms.solutions.update', $solution->id) : route('admin.cms.solutions.store') }}" method="POST">
    @csrf

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Solution Title *</label>
        <input type="text" name="title" value="{{ old('title', $solution->title) }}" class="form-control" placeholder="e.g. Warehouse & Yard Management Mobility" required>
      </div>

      <div class="form-group">
        <label class="form-label">URL Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $solution->slug) }}" class="form-control" placeholder="auto-generated if empty">
        <div class="form-hint">Used for URLs: /solutions/{slug}</div>
      </div>
    </div>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
      <div class="form-group">
        <label class="form-label">Tagline</label>
        <input type="text" name="tagline" value="{{ old('tagline', $solution->tagline) }}" class="form-control" placeholder="e.g. High-velocity receiving, picking, putaway, and cycle counting">
      </div>

      <div class="form-group">
        <label class="form-label">Icon Name</label>
        <input type="text" name="icon" value="{{ old('icon', $solution->icon) }}" class="form-control" placeholder="box-seam, tools, people, globe2">
      </div>
    </div>

    <!-- Short Summary with Light Text Editor -->
    <div class="form-group">
      <label class="form-label">Short Summary (Light Editor) *</label>
      <textarea name="summary" class="form-control editor-light" rows="3" required placeholder="Elevator pitch summary for cards and search results...">{{ old('summary', $solution->summary) }}</textarea>
    </div>

    <!-- Detailed Solution Architecture with Full Advanced Editor -->
    <div class="form-group">
      <label class="form-label">Detailed Solution Architecture (Advanced Editor)</label>
      <textarea name="description" class="form-control editor-advanced" rows="7" placeholder="Operational use cases, ERP delta synchronization mechanisms, hardware support...">{{ old('description', $solution->description) }}</textarea>
    </div>

    <div class="form-group">
      <label class="form-label">Key Features &amp; Deliverables (One per line)</label>
      <textarea name="features_text" class="form-control" rows="5" placeholder="Real-time bin location tracking & automated route pick optimization&#10;Instant SAP IM / WM / EWM delta synchronization&#10;Cycle counting with discrepancy alerts">{{ old('features_text', is_array($solution->features) ? implode("\n", $solution->features) : '') }}</textarea>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; align-items: center; margin-top: 10px;">
      <div class="form-group">
        <label class="form-label">Display Order</label>
        <input type="number" name="display_order" value="{{ old('display_order', $solution->display_order ?? 0) }}" class="form-control" style="width: 140px;">
      </div>

      <div class="form-group" style="padding-top: 16px;">
        <label class="form-check">
          <input type="checkbox" name="is_active" value="1" {{ old('is_active', $solution->is_active ?? true) ? 'checked' : '' }}>
          <span style="font-size: 0.88rem; font-weight: 600;">Active &amp; Visible to Clients</span>
        </label>
      </div>
    </div>

    <div style="margin-top: 24px; display: flex; gap: 12px;">
      <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Solution' : 'Create Solution' }}</button>
      <a href="{{ route('admin.cms.solutions.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
