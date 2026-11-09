@extends('admin.layout')

@section('title', 'Case Studies & Blog CMS')
@section('page_title', 'Case Studies & Engineering Blog CMS')

@section('content')
<div class="filter-bar" style="margin-bottom: 20px;">
  <div>
    <div style="font-size: 0.92rem; font-weight: 600; color: var(--text);">
      Technical Playbooks, Architecture Teardowns &amp; Case Studies
    </div>
    <div style="font-size: 0.78rem; color: var(--text-muted); margin-top: 2px;">
      Manage dynamic categories, rich AEO/SEO metadata, and publish live deep-dives.
    </div>
  </div>
  <a href="{{ route('admin.cms.blogs.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Create New Article
  </a>
</div>

<!-- Category Taxonomy Quick Bar -->
@if(isset($categories) && $categories->count() > 0)
  <div class="card" style="margin-bottom: 20px; padding: 14px 18px; background: rgba(0, 80, 231, 0.04); border: 1px dashed var(--border-color);">
    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
      <div style="font-size: 0.8rem; font-weight: 700; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.05em;">
        Active Categories ({{ $categories->count() }})
      </div>
      <div style="display: flex; gap: 8px; flex-wrap: wrap;">
        @foreach($categories as $cat)
          <a href="{{ route('blog.category', $cat->slug) }}" target="_blank" class="badge" style="background: rgba(255, 255, 255, 0.06); border: 1px solid var(--border-color); color: var(--text); padding: 4px 10px; font-size: 0.75rem; text-decoration: none;" title="{{ $cat->description ?: $cat->name }}">
            {{ $cat->name }} ({{ $cat->blogs_count }})
          </a>
        @endforeach
      </div>
    </div>
  </div>
@endif

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>Article &amp; Permalink</th>
          <th>Category</th>
          <th>SEO Score</th>
          <th>Author</th>
          <th>Status</th>
          <th>Published</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($blogs as $blog)
          <tr>
            <td style="font-weight: 600; max-width: 320px;">
              <div style="color: var(--text); font-size: 0.9rem;">{{ $blog->title }}</div>
              <div style="display: flex; align-items: center; gap: 6px; margin-top: 4px;">
                <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" style="font-size: 0.72rem; color: #60A5FA; text-decoration: none; font-family: monospace;">
                  /blog/{{ $blog->slug }}
                </a>
                @if($blog->is_featured)
                  <span class="badge" style="background: rgba(245, 158, 11, 0.2); color: #F59E0B; font-size: 0.65rem; padding: 1px 6px;">Featured</span>
                @endif
              </div>
            </td>
            <td>
              <a href="{{ route('blog.category', $blog->category_slug) }}" target="_blank" class="badge" style="background: rgba(0, 80, 231, 0.2); color: #60A5FA; text-decoration: none;">
                {{ $blog->effective_category_name }}
              </a>
            </td>
            <td>
              @php
                $hasTitle = !empty($blog->meta_title);
                $hasDesc = !empty($blog->meta_description);
                $hasOg = !empty($blog->og_image);
                $seoScore = ($hasTitle ? 35 : 0) + ($hasDesc ? 45 : 0) + ($hasOg ? 20 : 0);
              @endphp
              <div style="display: flex; align-items: center; gap: 6px;" title="Meta Title: {{ $hasTitle ? 'Set' : 'Missing' }} | Meta Desc: {{ $hasDesc ? 'Set' : 'Missing' }} | OG Image: {{ $hasOg ? 'Set' : 'Missing' }}">
                <span style="font-size: 0.72rem; font-weight: 700; color: {{ $seoScore >= 80 ? '#10B981' : ($seoScore >= 40 ? '#F59E0B' : '#64748B') }};">
                  {{ $seoScore }}%
                </span>
                <span style="width: 7px; height: 7px; border-radius: 50%; background: {{ $seoScore >= 80 ? '#10B981' : ($seoScore >= 40 ? '#F59E0B' : '#64748B') }};"></span>
              </div>
            </td>
            <td style="font-size: 0.8rem; color: var(--text-muted);">
              <div>{{ $blog->author }}</div>
              <div style="font-size: 0.72rem; color: var(--text-dim);">{{ $blog->read_time }}</div>
            </td>
            <td>
              <form action="{{ route('admin.cms.blogs.toggle', $blog->id) }}" method="POST">
                @csrf
                <button type="submit" class="badge {{ $blog->is_published ? 'badge-confirmed' : 'badge-inactive' }}" style="border: none; cursor: pointer;">
                  {{ $blog->is_published ? 'Published' : 'Draft' }}
                </button>
              </form>
            </td>
            <td style="font-size: 0.78rem; color: var(--text-muted);">
              {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Unpublished' }}
            </td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.cms.blogs.edit', $blog->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ route('admin.cms.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Delete article \'{{ $blog->title }}\'?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 32px;">No articles or case studies published yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">
    {{ $blogs->links() }}
  </div>
</div>
@endsection
