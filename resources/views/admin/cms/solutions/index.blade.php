@extends('admin.layout')

@section('title', 'Solutions CMS')
@section('page_title', 'Strategic Industry Solutions CMS')

@section('content')
<div class="filter-bar">
  <div style="font-size: 0.9rem; color: var(--text-muted);">
    Manage enterprise vertical solutions (Warehouse mobility, predictive maintenance, supplier portals, etc.).
  </div>
  <a href="{{ route('admin.cms.solutions.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Add New Solution
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>Order</th>
          <th>Solution Name</th>
          <th>Slug</th>
          <th>Tagline</th>
          <th>Features</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($solutions as $sol)
          <tr>
            <td style="font-family: monospace; color: var(--accent); font-weight: 700;">#{{ $sol->display_order }}</td>
            <td style="font-weight: 600;">
              <div>{{ $sol->title }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted); max-width: 320px; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                {{ $sol->summary }}
              </div>
            </td>
            <td><code style="font-size: 0.78rem; color: #93C5FD;">{{ $sol->slug }}</code></td>
            <td style="font-size: 0.8rem; color: var(--text-muted);">{{ $sol->tagline ?? '—' }}</td>
            <td>
              <span class="badge" style="background: rgba(255,255,255,0.06); color: #E2E8F0;">
                {{ is_array($sol->features) ? count($sol->features) : 0 }} bullets
              </span>
            </td>
            <td>
              <form action="{{ route('admin.cms.solutions.toggle', $sol->id) }}" method="POST">
                @csrf
                <button type="submit" class="badge {{ $sol->is_active ? 'badge-active' : 'badge-inactive' }}" style="border: none; cursor: pointer;">
                  {{ $sol->is_active ? 'Active' : 'Disabled' }}
                </button>
              </form>
            </td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.cms.solutions.edit', $sol->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ route('admin.cms.solutions.destroy', $sol->id) }}" method="POST" onsubmit="return confirm('Delete solution '{{ $sol->title }}'?');">
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
            <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 32px;">No solutions created yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
