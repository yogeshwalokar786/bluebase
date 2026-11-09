@extends('admin.layout')

@section('title', 'Services CMS')
@section('page_title', 'Core Enterprise Services CMS')

@section('content')
<div class="filter-bar">
  <div style="font-size: 0.9rem; color: var(--text-muted);">
    Manage service catalog displayed across the marketing website, megamenus, and solutions pages.
  </div>
  <a href="{{ route('admin.cms.services.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Add New Service
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>Order</th>
          <th>Service Title</th>
          <th>Slug</th>
          <th>Tagline</th>
          <th>Features</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($services as $s)
          <tr>
            <td style="font-family: monospace; color: var(--accent); font-weight: 700;">#{{ $s->display_order }}</td>
            <td style="font-weight: 600;">
              <div>{{ $s->title }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted); max-width: 320px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                {{ $s->summary }}
              </div>
            </td>
            <td><code style="font-size: 0.78rem; color: #93C5FD;">{{ $s->slug }}</code></td>
            <td style="font-size: 0.8rem; color: var(--text-muted);">{{ $s->tagline ?? '—' }}</td>
            <td>
              <span class="badge" style="background: rgba(255,255,255,0.06); color: #E2E8F0;">
                {{ is_array($s->features) ? count($s->features) : 0 }} bullets
              </span>
            </td>
            <td>
              <form action="{{ route('admin.cms.services.toggle', $s->id) }}" method="POST">
                @csrf
                <button type="submit" class="badge {{ $s->is_active ? 'badge-active' : 'badge-inactive' }}" style="border: none; cursor: pointer;">
                  {{ $s->is_active ? 'Active' : 'Disabled' }}
                </button>
              </form>
            </td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.cms.services.edit', $s->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ route('admin.cms.services.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Delete service '{{ $s->title }}'?');">
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
            <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 32px;">No services defined in database yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
