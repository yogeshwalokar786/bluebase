@extends('admin.layout')

@section('title', 'Case Studies & Blog CMS')
@section('page_title', 'Case Studies & Engineering Blog CMS')

@section('content')
<div class="filter-bar">
  <div style="font-size: 0.9rem; color: var(--text-muted);">
    Publish enterprise case studies, technical whitepapers, and thought leadership articles.
  </div>
  <a href="{{ route('admin.cms.blogs.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Create New Article
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>Article</th>
          <th>Category</th>
          <th>Author</th>
          <th>Read Time</th>
          <th>Status</th>
          <th>Published</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($blogs as $blog)
          <tr>
            <td style="font-weight: 600; max-width: 340px;">
              <div>{{ $blog->title }}</div>
              <code style="font-size: 0.72rem; color: #93C5FD;">/suits-blog#{{ $blog->slug }}</code>
            </td>
            <td><span class="badge" style="background: rgba(0, 80, 231, 0.2); color: #60A5FA;">{{ $blog->category }}</span></td>
            <td style="font-size: 0.8rem; color: var(--text-muted);">{{ $blog->author }}</td>
            <td style="font-size: 0.8rem; color: var(--text-dim);">{{ $blog->read_time }}</td>
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
                <form action="{{ route('admin.cms.blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Delete article '{{ $blog->title }}'?');">
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
