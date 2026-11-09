@extends('admin.layout')

@section('title', 'Free Trial Requests')
@section('page_title', 'Free Trial & Sandbox Provisioning')

@section('content')
<div class="filter-bar">
  <div class="filter-tabs">
    <a href="{{ route('admin.leads.trials', ['status' => 'all']) }}" class="filter-tab {{ request('status', 'all') === 'all' ? 'active' : '' }}">
      All <span class="count">{{ $counts['all'] }}</span>
    </a>
    <a href="{{ route('admin.leads.trials', ['status' => 'pending']) }}" class="filter-tab {{ request('status') === 'pending' ? 'active' : '' }}">
      Pending <span class="count">{{ $counts['pending'] }}</span>
    </a>
    <a href="{{ route('admin.leads.trials', ['status' => 'active']) }}" class="filter-tab {{ request('status') === 'active' ? 'active' : '' }}">
      Active Sandboxes <span class="count">{{ $counts['active'] }}</span>
    </a>
    <a href="{{ route('admin.leads.trials', ['status' => 'expired']) }}" class="filter-tab {{ request('status') === 'expired' ? 'active' : '' }}">
      Expired <span class="count">{{ $counts['expired'] }}</span>
    </a>
  </div>

  <div style="display: flex; gap: 12px; align-items: center;">
    <form method="GET" action="{{ route('admin.leads.trials') }}" style="display: flex; gap: 8px;">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search trials..." class="form-control" style="width: 220px; padding: 6px 12px; font-size: 0.82rem;">
      <button type="submit" class="btn btn-secondary btn-sm">Search</button>
    </form>
    <a href="{{ route('admin.leads.trials.export') }}" class="btn btn-secondary btn-sm">
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
          <th>Company</th>
          <th>Cloud Platform</th>
          <th>SAP Stack</th>
          <th>Status</th>
          <th>Requested</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($trials as $trial)
          <tr>
            <td style="font-family: monospace; color: var(--accent);">#{{ $trial->id }}</td>
            <td>
              <div style="font-weight: 600;">{{ $trial->name }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $trial->email }}</div>
            </td>
            <td>{{ $trial->company }}</td>
            <td><span class="badge" style="background: rgba(96, 165, 250, 0.15); color: #60A5FA;">{{ $trial->cloud_platform ?? 'Cloud/Any' }}</span></td>
            <td>{{ $trial->sap_version ?? 'S/4HANA' }}</td>
            <td><span class="badge badge-{{ $trial->status }}">{{ $trial->status }}</span></td>
            <td style="font-size: 0.78rem; color: var(--text-muted);">{{ $trial->created_at->format('M d, Y') }}</td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.leads.trials.show', $trial->id) }}" class="btn btn-secondary btn-sm">Inspect</a>
                <form action="{{ route('admin.leads.trials.destroy', $trial->id) }}" method="POST" onsubmit="return confirm('Delete trial #{{ $trial->id }}?');">
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
            <td colspan="8" style="text-align: center; color: var(--text-muted); padding: 32px;">No trial requests found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">
    {{ $trials->links() }}
  </div>
</div>
@endsection
