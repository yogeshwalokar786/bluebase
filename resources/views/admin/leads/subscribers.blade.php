@extends('admin.layout')

@section('title', 'Newsletter Subscribers')
@section('page_title', 'Newsletter Subscribers & Audience')

@section('content')
<div class="filter-bar">
  <div style="font-size: 0.95rem; font-weight: 600; display: flex; align-items: center; gap: 8px;">
    <span>Total Active Audience:</span>
    <span class="badge badge-active">{{ $total_active }} Active</span>
  </div>

  <div style="display: flex; gap: 12px; align-items: center;">
    <form method="GET" action="{{ route('admin.leads.subscribers') }}" style="display: flex; gap: 8px;">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search email..." class="form-control" style="width: 240px; padding: 6px 12px; font-size: 0.82rem;">
      <button type="submit" class="btn btn-secondary btn-sm">Search</button>
    </form>
    <a href="{{ route('admin.leads.subscribers.export') }}" class="btn btn-secondary btn-sm">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
      Export CSV
    </a>
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Email Address</th>
          <th>Status</th>
          <th>Subscribed Date</th>
          <th>IP Origin</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($subscribers as $sub)
          <tr>
            <td style="font-family: monospace; color: var(--accent);">#{{ $sub->id }}</td>
            <td style="font-weight: 500;">{{ $sub->email }}</td>
            <td>
              @if($sub->is_active)
                <span class="badge badge-active">Subscribed</span>
              @else
                <span class="badge badge-inactive">Unsubscribed</span>
              @endif
            </td>
            <td style="font-size: 0.78rem; color: var(--text-muted);">{{ $sub->created_at->format('M d, Y H:i') }}</td>
            <td style="font-family: monospace; font-size: 0.78rem; color: var(--text-dim);">{{ $sub->ip_address ?? '127.0.0.1' }}</td>
            <td>
              <div style="display: flex; gap: 8px;">
                <form action="{{ route('admin.leads.subscribers.toggle', $sub->id) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-secondary btn-sm" title="Toggle Active">
                    {{ $sub->is_active ? 'Deactivate' : 'Activate' }}
                  </button>
                </form>
                <form action="{{ route('admin.leads.subscribers.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('Remove subscriber {{ $sub->email }}?');">
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
            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 32px;">No subscribers found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">
    {{ $subscribers->links() }}
  </div>
</div>
@endsection
