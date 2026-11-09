@extends('admin.layout')

@section('title', $isEdit ? 'Edit Article' : 'Create Article')
@section('page_title', $isEdit ? 'Edit Article: ' . $blog->title : 'Create New Case Study or Article')

@section('content')
  <div style="margin-bottom: 20px;">
    <a href="{{ route('admin.cms.blogs.index') }}" class="btn btn-secondary btn-sm">&larr; Back to Articles</a>
  </div>

  <div class="card" style="max-width: 960px;">
    <form action="{{ $isEdit ? route('admin.cms.blogs.update', $blog->id) : route('admin.cms.blogs.store') }}"
      method="POST">
      @csrf

      <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Article Title *</label>
          <input type="text" name="title" value="{{ old('title', $blog->title) }}" class="form-control" required
            placeholder="e.g. How Hauni Cut Mobile Factory Latency by 80%">
        </div>

        <div class="form-group">
          <label class="form-label">URL Slug</label>
          <input type="text" name="slug" value="{{ old('slug', $blog->slug) }}" class="form-control"
            placeholder="auto-generated from title">
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px;">
        <div class="form-group">
          <label class="form-label">Category *</label>
          <input type="text" name="category" value="{{ old('category', $blog->category ?? 'Case Study') }}"
            class="form-control" placeholder="Case Study, AI & Engineering, Architecture" required>
        </div>

        <div class="form-group">
          <label class="form-label">Author Name &amp; Title *</label>
          <input type="text" name="author" value="{{ old('author', $blog->author ?? 'Bluebase Engineering Team') }}"
            class="form-control" required>
        </div>

        <div class="form-group">
          <label class="form-label">Read Time</label>
          <input type="text" name="read_time" value="{{ old('read_time', $blog->read_time ?? '5 min read') }}"
            class="form-control">
        </div>
      </div>

      <!-- Featured Image Picker with File Manager Popup -->
      <div class="form-group">
        <label class="form-label">Featured Hero &amp; Thumbnail Image</label>
        <div class="media-picker-group">
          <div class="media-picker-input-wrap">
            <input type="text" name="image" id="blog_image"
              value="{{ old('image', $blog->image ?? 'images/stories/hauni.jpg') }}" class="form-control"
              placeholder="images/stories/hauni.jpg or uploads/...">
            <button type="button" class="btn btn-secondary btn-filemanager" data-target="#blog_image"
              data-preview="#blog_image_preview" data-type="image">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                style="width: 15px; height: 15px;">
                <rect x="3" y="3" width="18" height="18" rx="2" />
                <circle cx="8.5" cy="8.5" r="1.5" />
                <polyline points="21 15 16 10 5 21" />
              </svg>
              Browse Media
            </button>
          </div>
          <div class="media-preview-container" id="blog_image_preview">
            @if($blog->image)
              <img src="{{ asset($blog->image) }}" alt="Preview" onerror="this.style.display='none';">
            @else
              <div class="media-preview-placeholder">No image selected</div>
            @endif
          </div>
        </div>
        <div class="form-hint">Click &ldquo;Browse Media&rdquo; to pick from the library or upload a new high-resolution
          header image.</div>
      </div>

      <!-- Excerpt with Light WYSIWYG Editor -->
      <div class="form-group">
        <label class="form-label">Executive Excerpt (Light Editor) *</label>
        <textarea name="excerpt" class="form-control editor-light" rows="3" required
          placeholder="Short summary displayed on cards and search snippets...">{{ old('excerpt', $blog->excerpt) }}</textarea>
        <div class="form-hint">Rich light text editor with bold, italic, lists, and links.</div>
      </div>

      <!-- Body Content with Full Advanced WYSIWYG Editor -->
      <div class="form-group">
        <label class="form-label">Article Body Content (Full Advanced Editor) *</label>
        <textarea name="content" class="form-control editor-advanced" rows="12" required
          placeholder="Write the full case study or technical article here...">{{ old('content', $blog->content) }}</textarea>
        <div class="form-hint">Full advanced editor with headers, font colors, code blocks, tables, embedded videos, HTML
          source view, and direct media library image insertions.</div>
      </div>

      <div class="form-group" style="margin-top: 16px;">
        <label class="form-check">
          <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published ?? true) ? 'checked' : '' }}>
          <span style="font-size: 0.88rem; font-weight: 600;">Publish Live Immediately</span>
        </label>
      </div>

      <div style="margin-top: 24px; display: flex; gap: 12px;">
        <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update Article' : 'Publish Article' }}</button>
        <a href="{{ route('admin.cms.blogs.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
@endsection