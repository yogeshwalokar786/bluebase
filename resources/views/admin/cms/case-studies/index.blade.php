@extends('admin.layout')

@section('title', 'Case Studies CMS')
@section('page_title', 'Client Case Studies & Customer Stories')

@section('content')
<style>
  .cs-header-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }
  .cs-header-text h2 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--text);
    margin: 0 0 4px 0;
  }
  .cs-header-text p {
    font-size: 0.82rem;
    color: var(--text-muted);
    margin: 0;
    line-height: 1.5;
  }
  .cs-desktop-table {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }
  .cs-desktop-table .data-table {
    width: 100%;
    min-width: 800px;
  }
  .btn-status-toggle {
    border: none;
    cursor: pointer;
    background: none;
    padding: 0;
    font-family: inherit;
  }
  .badge-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 10px;
    border-radius: 9999px;
    font-size: 0.72rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.04em;
  }
  .badge-status.published {
    background: rgba(16, 185, 129, 0.15);
    color: #10B981;
    border: 1px solid rgba(16, 185, 129, 0.3);
  }
  .badge-status.draft {
    background: rgba(239, 68, 68, 0.15);
    color: #EF4444;
    border: 1px solid rgba(239, 68, 68, 0.3);
  }
  .cs-thumb {
    width: 52px;
    height: 34px;
    border-radius: 6px;
    object-fit: cover;
    background: #0a192f;
    border: 1px solid rgba(255,255,255,0.1);
  }
</style>

<div class="cs-header-bar">
  <div class="cs-header-text">
    <h2>Client Case Studies &amp; Customer Stories CMS</h2>
    <p>Manage, add, and publish high-converting client deliverable breakdowns displayed across the homepage and customer stories catalog.</p>
  </div>
  <a href="{{ route('admin.cms.case-studies.create') }}" class="btn btn-primary" style="display:inline-flex; align-items:center; gap:8px;">
    <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
    <span>Add New Case Study</span>
  </a>
</div>

<!-- Stats Overview -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
  <div class="card" style="padding: 18px 20px;">
    <div style="font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Total Stories</div>
    <div style="font-size: 1.6rem; font-weight: 700; color: var(--text);">{{ $totalStories }}</div>
  </div>
  <div class="card" style="padding: 18px 20px;">
    <div style="font-size: 0.75rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">Published Live</div>
    <div style="font-size: 1.6rem; font-weight: 700; color: var(--success);">{{ $publishedStories }}</div>
  </div>
</div>

<div class="card" style="padding: 0; overflow: hidden;">
  <div class="cs-desktop-table">
    <table class="data-table">
      <thead>
        <tr>
          <th style="width: 70px;">Image</th>
          <th>Title &amp; Client</th>
          <th>Industry</th>
          <th>Service Tag</th>
          <th style="width: 90px; text-align: center;">Order</th>
          <th style="width: 110px; text-align: center;">Status</th>
          <th style="width: 140px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($caseStudies as $story)
        <tr>
          <td>
            <img src="{{ asset($story->hero_image) }}?v=3" alt="{{ $story->client_name }}" class="cs-thumb">
          </td>
          <td>
            <div style="font-weight: 600; color: var(--text); margin-bottom: 3px;">
              {{ $story->title }}
            </div>
            <div style="font-size: 0.78rem; color: var(--accent); display: flex; align-items: center; gap: 8px;">
              <span>Client: <strong>{{ $story->client_name }}</strong></span>
              <span>&bull;</span>
              <span>/customer-stories/{{ $story->slug }}</span>
            </div>
          </td>
          <td>
            <span style="font-size: 0.82rem; color: var(--text-muted);">{{ $story->industry }}</span>
          </td>
          <td>
            <span style="font-size: 0.82rem; color: var(--text-muted);">{{ $story->service_tag }}</span>
          </td>
          <td style="text-align: center; font-weight: 600; color: var(--text);">
            {{ $story->display_order }}
          </td>
          <td style="text-align: center;">
            <form action="{{ route('admin.cms.case-studies.toggle', $story->id) }}" method="POST" style="display:inline;">
              @csrf
              <button type="submit" class="btn-status-toggle" title="Click to toggle status">
                @if($story->is_published)
                  <span class="badge-status published">Published</span>
                @else
                  <span class="badge-status draft">Draft</span>
                @endif
              </button>
            </form>
          </td>
          <td style="text-align: right;">
            <div style="display: inline-flex; align-items: center; gap: 6px;">
              <a href="{{ $story->url ?? route('customer-stories.show', $story->slug) }}" target="_blank" class="btn btn-sm btn-outline" title="View Public Page">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
              </a>
              <a href="{{ route('admin.cms.case-studies.edit', $story->id) }}" class="btn btn-sm btn-outline" title="Edit Story">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
              </a>
              <form action="{{ route('admin.cms.case-studies.destroy', $story->id) }}" method="POST" onsubmit="return confirm('Delete this case study?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Delete Story">
                  <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                </button>
              </form>
            </div>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-muted);">
            No case studies found. Click "Add New Case Study" to create one.
          </td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>

@if($caseStudies->hasPages())
<div style="margin-top: 20px;">
  {{ $caseStudies->links() }}
</div>
@endif

@endsection
