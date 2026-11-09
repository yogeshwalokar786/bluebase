@extends('admin.layout')

@section('title', 'Contact Inquiries')
@section('page_title', 'Contact Inquiries & RFP Leads')

@section('content')
<div class="filter-bar">
  <div class="filter-tabs">
    <a href="{{ route('admin.leads.inquiries', ['status' => 'all']) }}" class="filter-tab {{ request('status', 'all') === 'all' ? 'active' : '' }}">
      All <span class="count">{{ $counts['all'] }}</span>
    </a>
    <a href="{{ route('admin.leads.inquiries', ['status' => 'new']) }}" class="filter-tab {{ request('status') === 'new' ? 'active' : '' }}">
      New <span class="count">{{ $counts['new'] }}</span>
    </a>
    <a href="{{ route('admin.leads.inquiries', ['status' => 'reviewed']) }}" class="filter-tab {{ request('status') === 'reviewed' ? 'active' : '' }}">
      Reviewed <span class="count">{{ $counts['reviewed'] }}</span>
    </a>
    <a href="{{ route('admin.leads.inquiries', ['status' => 'contacted']) }}" class="filter-tab {{ request('status') === 'contacted' ? 'active' : '' }}">
      Contacted <span class="count">{{ $counts['contacted'] }}</span>
    </a>
    <a href="{{ route('admin.leads.inquiries', ['status' => 'closed']) }}" class="filter-tab {{ request('status') === 'closed' ? 'active' : '' }}">
      Closed <span class="count">{{ $counts['closed'] }}</span>
    </a>
  </div>

  <div style="display: flex; gap: 12px; align-items: center;">
    <form method="GET" action="{{ route('admin.leads.inquiries') }}" style="display: flex; gap: 8px;">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search leads..." class="form-control" style="width: 220px; padding: 6px 12px; font-size: 0.82rem;">
      <button type="submit" class="btn btn-secondary btn-sm">Search</button>
    </form>
    <a href="{{ route('admin.leads.inquiries.export') }}" class="btn btn-secondary btn-sm" title="Export CSV">
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
          <th>Lead / Contact</th>
          <th>Company</th>
          <th>Service Target</th>
          <th>Status</th>
          <th>Submitted</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($inquiries as $inq)
          <tr>
            <td style="font-family: monospace; color: var(--accent);">#{{ $inq->id }}</td>
            <td>
              <div style="font-weight: 600;">{{ $inq->name }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $inq->email }}</div>
              @if($inq->phone)
                <div style="font-size: 0.72rem; color: var(--text-dim);">{{ $inq->phone }}</div>
              @endif
            </td>
            <td>{{ $inq->company ?? '—' }}</td>
            <td>
              <span style="font-size: 0.8rem; color: var(--text-muted);">{{ $inq->service ?? 'General Inquiry' }}</span>
            </td>
            <td>
              <span class="badge badge-{{ $inq->status }}">{{ $inq->status }}</span>
            </td>
            <td style="font-size: 0.78rem; color: var(--text-muted);">{{ $inq->created_at->format('M d, Y H:i') }}</td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.leads.inquiries.show', $inq->id) }}" class="btn btn-secondary btn-sm">View</a>
                <form action="{{ route('admin.leads.inquiries.destroy', $inq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete inquiry #{{ $inq->id }}?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 32px;">No inquiries found matching criteria.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="pagination">
    {{ $inquiries->links() }}
  </div>
</div>
@endsection
