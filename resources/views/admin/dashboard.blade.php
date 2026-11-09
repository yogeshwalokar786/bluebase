@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page_title', 'Executive Overview & Operations')

@section('content')
<!-- Metric Cards Grid -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 28px;">
  <!-- Total Leads -->
  <div class="card card-featured" style="margin-bottom: 0;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
      <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--accent); letter-spacing: 0.05em;">Total Leads</span>
      <svg style="width: 20px; height: 20px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
    </div>
    <div class="metric-value">{{ $stats['total_leads'] }}</div>
    <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 8px;">Across all conversion channels</div>
  </div>

  <!-- Inquiries -->
  <div class="card" style="margin-bottom: 0;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
      <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Contact Inquiries</span>
      <span class="badge badge-new">{{ $stats['inquiries_new'] }} New</span>
    </div>
    <div class="metric-value">{{ $stats['inquiries_count'] }}</div>
    <a href="{{ route('admin.leads.inquiries') }}" style="display: inline-block; font-size: 0.75rem; color: var(--accent); margin-top: 8px; text-decoration: none;">View inquiries &rarr;</a>
  </div>

  <!-- Demo Bookings -->
  <div class="card" style="margin-bottom: 0;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
      <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Demo Bookings</span>
      <span class="badge badge-pending">{{ $stats['demos_pending'] }} Pending</span>
    </div>
    <div class="metric-value">{{ $stats['demos_count'] }}</div>
    <a href="{{ route('admin.leads.demos') }}" style="display: inline-block; font-size: 0.75rem; color: var(--accent); margin-top: 8px; text-decoration: none;">Manage bookings &rarr;</a>
  </div>

  <!-- Free Trials -->
  <div class="card" style="margin-bottom: 0;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
      <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Trial Sandboxes</span>
      <span class="badge badge-confirmed">Active</span>
    </div>
    <div class="metric-value">{{ $stats['trials_count'] }}</div>
    <a href="{{ route('admin.leads.trials') }}" style="display: inline-block; font-size: 0.75rem; color: var(--accent); margin-top: 8px; text-decoration: none;">Inspect trials &rarr;</a>
  </div>

  <!-- Partners -->
  <div class="card" style="margin-bottom: 0;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
      <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Partners</span>
      <svg style="width: 18px; height: 18px; color: var(--warning);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
    </div>
    <div class="metric-value">{{ $stats['partners_count'] }}</div>
    <a href="{{ route('admin.leads.partners') }}" style="display: inline-block; font-size: 0.75rem; color: var(--accent); margin-top: 8px; text-decoration: none;">View partners &rarr;</a>
  </div>

  <!-- Subscribers -->
  <div class="card" style="margin-bottom: 0;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 12px;">
      <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Subscribers</span>
      <svg style="width: 18px; height: 18px; color: var(--success);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
    </div>
    <div class="metric-value">{{ $stats['subscribers_count'] }}</div>
    <a href="{{ route('admin.leads.subscribers') }}" style="display: inline-block; font-size: 0.75rem; color: var(--accent); margin-top: 8px; text-decoration: none;">Subscribers list &rarr;</a>
  </div>
</div>

<!-- CMS Quick Access Bar -->
<div class="card card-dashed">
  <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
    <div>
      <h3 style="font-size: 1rem; font-weight: 700; margin-bottom: 4px;">Dynamic Content &amp; CMS Shortcuts</h3>
      <p style="font-size: 0.82rem; color: var(--text-muted);">Manage client logos, technical articles, case studies, client testimonials, and site configuration directly.</p>
    </div>
    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
      <a href="{{ route('admin.cms.clients.create') }}" class="btn btn-secondary btn-sm">+ Add Client Logo</a>
      <a href="{{ route('admin.cms.blogs.create') }}" class="btn btn-secondary btn-sm">+ New Article</a>
      <a href="{{ route('admin.settings') }}" class="btn btn-primary btn-sm">Edit Site Settings</a>
    </div>
  </div>
</div>

<!-- Two-Column Leads Breakdown -->
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
  <!-- Recent Inquiries -->
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        Recent Inquiries
      </div>
      <a href="{{ route('admin.leads.inquiries') }}" class="btn btn-secondary btn-sm">View All</a>
    </div>
    <div class="table-responsive">
      <table class="data-table">
        <thead>
          <tr>
            <th>Prospect</th>
            <th>Company</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recent_inquiries as $inq)
            <tr>
              <td>
                <div style="font-weight: 600;">{{ $inq->name }}</div>
                <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $inq->email }}</div>
              </td>
              <td>{{ $inq->company ?? 'N/A' }}</td>
              <td>
                <span class="badge badge-{{ $inq->status }}">{{ $inq->status }}</span>
              </td>
              <td>
                <a href="{{ route('admin.leads.inquiries.show', $inq->id) }}" class="btn btn-secondary btn-sm">Open</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 24px;">No inquiries found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Recent Demo Bookings -->
  <div class="card">
    <div class="card-header">
      <div class="card-title">
        <svg style="width: 18px; height: 18px; color: var(--warning);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        Recent Demo Requests
      </div>
      <a href="{{ route('admin.leads.demos') }}" class="btn btn-secondary btn-sm">View All</a>
    </div>
    <div class="table-responsive">
      <table class="data-table">
        <thead>
          <tr>
            <th>Prospect</th>
            <th>ERP / Target</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recent_demos as $demo)
            <tr>
              <td>
                <div style="font-weight: 600;">{{ $demo->name }}</div>
                <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $demo->company }}</div>
              </td>
              <td>
                <div style="font-size: 0.8rem;">{{ $demo->current_erp ?? 'Unspecified' }}</div>
              </td>
              <td>
                <span class="badge badge-{{ $demo->status }}">{{ $demo->status }}</span>
              </td>
              <td>
                <a href="{{ route('admin.leads.demos.show', $demo->id) }}" class="btn btn-secondary btn-sm">Open</a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" style="text-align: center; color: var(--text-muted); padding: 24px;">No demo requests found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
