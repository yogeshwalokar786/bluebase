@extends('admin.layout')

@section('title', 'Manage Page SEO')
@section('page_title', 'Per-Page SEO & Metadata Management')

@section('content')
<div class="filter-bar">
  <div style="display: flex; gap: 8px;">
    <a href="{{ route('admin.seo.global') }}" class="btn btn-secondary btn-sm">Global SEO Defaults</a>
    <a href="{{ route('admin.seo.pages.index') }}" class="btn btn-primary btn-sm">Page SEO ({{ $pages->total() }})</a>
    <a href="{{ route('admin.seo.sitemap.index') }}" class="btn btn-secondary btn-sm">XML Sitemap</a>
  </div>

  <div style="display: flex; gap: 10px; align-items: center;">
    <form method="GET" action="{{ route('admin.seo.pages.index') }}" style="display: flex; gap: 8px;">
      <select name="sitemap" class="form-select" style="width: 140px; padding: 6px 10px; font-size: 0.82rem;" onchange="this.form.submit()">
        <option value="">All Pages</option>
        <option value="yes" {{ request('sitemap') === 'yes' ? 'selected' : '' }}>In Sitemap ({{ $totalInSitemap }})</option>
        <option value="no" {{ request('sitemap') === 'no' ? 'selected' : '' }}>Excluded</option>
      </select>
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search pages..." class="form-control" style="width: 200px; padding: 6px 12px; font-size: 0.82rem;">
      <button type="submit" class="btn btn-secondary btn-sm">Search</button>
      @if(request('search') || request('sitemap'))
        <a href="{{ route('admin.seo.pages.index') }}" class="btn btn-secondary btn-sm">Reset</a>
      @endif
    </form>
    <a href="{{ route('admin.seo.pages.create') }}" class="btn btn-primary btn-sm">+ Add Page SEO</a>
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>Page / Route</th>
          <th>URL Path</th>
          <th>Meta Title Preview</th>
          <th>Robots</th>
          <th>Priority</th>
          <th>Sitemap</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($pages as $page)
          <tr>
            <td>
              <div style="font-weight: 600;">{{ $page->page_name }}</div>
              <code style="font-size: 0.72rem; color: #93C5FD;">route: {{ $page->route_name }}</code>
            </td>
            <td>
              <a href="{{ url($page->url_path) }}" target="_blank" style="font-size: 0.8rem; color: var(--accent); text-decoration: none; font-family: monospace;">
                {{ $page->url_path }} &nearr;
              </a>
            </td>
            <td>
              <div style="font-size: 0.82rem; color: #E2E8F0; max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $page->meta_title }}">
                {{ $page->meta_title }}
              </div>
              <div style="font-size: 0.72rem; color: var(--text-dim); max-width: 320px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                {{ $page->meta_description }}
              </div>
            </td>
            <td>
              <span class="badge" style="background: rgba(255,255,255,0.06); font-size: 0.68rem; color: #CBD5E1;">
                {{ $page->robots }}
              </span>
            </td>
            <td style="font-family: monospace; font-size: 0.85rem; font-weight: 700; color: var(--accent);">
              {{ number_format($page->priority, 1) }}
            </td>
            <td>
              @if($page->is_in_sitemap)
                <span class="badge badge-active">Indexed</span>
              @else
                <span class="badge badge-inactive">Excluded</span>
              @endif
            </td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.seo.pages.edit', $page->id) }}" class="btn btn-secondary btn-sm">Edit SEO</a>
                <form action="{{ route('admin.seo.pages.destroy', $page->id) }}" method="POST" onsubmit="return confirm('Delete SEO entry for \'{{ $page->page_name }}\'?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 32px;">No page SEO entries found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">
    {{ $pages->links() }}
  </div>
</div>
@endsection

