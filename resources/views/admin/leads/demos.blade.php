@extends('admin.layout')

@section('title', 'Demo Bookings')
@section('page_title', 'Enterprise Demo Bookings')

@section('content')
<div class="filter-bar">
  <div class="filter-tabs">
    <a href="{{ route('admin.leads.demos', ['status' => 'all']) }}" class="filter-tab {{ request('status', 'all') === 'all' ? 'active' : '' }}">
      All <span class="count">{{ $counts['all'] }}</span>
    </a>
    <a href="{{ route('admin.leads.demos', ['status' => 'pending']) }}" class="filter-tab {{ request('status') === 'pending' ? 'active' : '' }}">
      Pending <span class="count">{{ $counts['pending'] }}</span>
    </a>
    <a href="{{ route('admin.leads.demos', ['status' => 'confirmed']) }}" class="filter-tab {{ request('status') === 'confirmed' ? 'active' : '' }}">
      Confirmed <span class="count">{{ $counts['confirmed'] }}</span>
    </a>
    <a href="{{ route('admin.leads.demos', ['status' => 'completed']) }}" class="filter-tab {{ request('status') === 'completed' ? 'active' : '' }}">
      Completed <span class="count">{{ $counts['completed'] }}</span>
    </a>
    <a href="{{ route('admin.leads.demos', ['status' => 'cancelled']) }}" class="filter-tab {{ request('status') === 'cancelled' ? 'active' : '' }}">
      Cancelled <span class="count">{{ $counts['cancelled'] }}</span>
    </a>
  </div>

  <div style="display: flex; gap: 12px; align-items: center;">
    <form method="GET" action="{{ route('admin.leads.demos') }}" style="display: flex; gap: 8px;">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search demos..." class="form-control" style="width: 220px; padding: 6px 12px; font-size: 0.82rem;">
      <button type="submit" class="btn btn-secondary btn-sm">Search</button>
    </form>
    <a href="{{ route('admin.leads.demos.export') }}" class="btn btn-secondary btn-sm">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
      CSV Export
    </a>
  </div>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Lead</th>
          <th>Company / Role</th>
          <th>Current ERP</th>
          <th>Product Interest</th>
          <th>Status</th>
          <th>Booked Date</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($demos as $demo)
          <tr>
            <td style="font-family: monospace; color: var(--accent);">#{{ $demo->id }}</td>
            <td>
              <div style="font-weight: 600;">{{ $demo->name }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $demo->email }}</div>
            </td>
            <td>
              <div style="font-weight: 500;">{{ $demo->company }}</div>
              <div style="font-size: 0.75rem; color: var(--text-dim);">{{ $demo->job_title ?? 'N/A' }}</div>
            </td>
            <td><span class="badge" style="background: rgba(255,255,255,0.06); color: #E2E8F0;">{{ $demo->current_erp ?? 'Unspecified' }}</span></td>
            <td><span style="font-size: 0.8rem; color: var(--accent);">{{ $demo->interested_product ?? 'DXP Platform' }}</span></td>
            <td><span class="badge badge-{{ $demo->status }}">{{ $demo->status }}</span></td>
            <td style="font-size: 0.78rem; color: var(--text-muted);">{{ $demo->created_at->format('M d, Y H:i') }}</td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.leads.demos.show', $demo->id) }}" class="btn btn-secondary btn-sm">View</a>
                <form action="{{ route('admin.leads.demos.destroy', $demo->id) }}" method="POST" onsubmit="return confirm('Delete demo booking #{{ $demo->id }}?');">
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
            <td colspan="8" style="text-align: center; color: var(--text-muted); padding: 32px;">No demo bookings found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">
    {{ $demos->links() }}
  </div>
</div>
@endsection
