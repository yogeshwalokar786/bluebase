@extends('admin.layout')

@section('title', 'Partner Applications')
@section('page_title', 'Alliance & Partner Network Applications')

@section('content')
<div class="filter-bar">
  <div class="filter-tabs">
    <a href="{{ route('admin.leads.partners', ['status' => 'all']) }}" class="filter-tab {{ request('status', 'all') === 'all' ? 'active' : '' }}">
      All <span class="count">{{ $counts['all'] }}</span>
    </a>
    <a href="{{ route('admin.leads.partners', ['status' => 'new']) }}" class="filter-tab {{ request('status') === 'new' ? 'active' : '' }}">
      New <span class="count">{{ $counts['new'] }}</span>
    </a>
    <a href="{{ route('admin.leads.partners', ['status' => 'approved']) }}" class="filter-tab {{ request('status') === 'approved' ? 'active' : '' }}">
      Approved <span class="count">{{ $counts['approved'] }}</span>
    </a>
    <a href="{{ route('admin.leads.partners', ['status' => 'rejected']) }}" class="filter-tab {{ request('status') === 'rejected' ? 'active' : '' }}">
      Rejected <span class="count">{{ $counts['rejected'] }}</span>
    </a>
  </div>

  <div style="display: flex; gap: 12px; align-items: center;">
    <form method="GET" action="{{ route('admin.leads.partners') }}" style="display: flex; gap: 8px;">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search partners..." class="form-control" style="width: 220px; padding: 6px 12px; font-size: 0.82rem;">
      <button type="submit" class="btn btn-secondary btn-sm">Search</button>
    </form>
    <a href="{{ route('admin.leads.partners.export') }}" class="btn btn-secondary btn-sm">
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
          <th>Company</th>
          <th>Key Contact</th>
          <th>Partner Tier / Type</th>
          <th>Country</th>
          <th>Status</th>
          <th>Applied</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($partners as $p)
          <tr>
            <td style="font-family: monospace; color: var(--accent);">#{{ $p->id }}</td>
            <td style="font-weight: 600;">{{ $p->company_name }}</td>
            <td>
              <div>{{ $p->contact_name }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $p->email }}</div>
            </td>
            <td><span class="badge" style="background: rgba(139, 92, 246, 0.2); color: #C4B5FD;">{{ $p->partner_type ?? 'SI / Reseller' }}</span></td>
            <td>{{ $p->country ?? 'Global' }}</td>
            <td><span class="badge badge-{{ $p->status }}">{{ $p->status }}</span></td>
            <td style="font-size: 0.78rem; color: var(--text-muted);">{{ $p->created_at->format('M d, Y') }}</td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.leads.partners.show', $p->id) }}" class="btn btn-secondary btn-sm">View</a>
                <form action="{{ route('admin.leads.partners.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Delete partner application #{{ $p->id }}?');">
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
            <td colspan="8" style="text-align: center; color: var(--text-muted); padding: 32px;">No partner applications found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">
    {{ $partners->links() }}
  </div>
</div>
@endsection
