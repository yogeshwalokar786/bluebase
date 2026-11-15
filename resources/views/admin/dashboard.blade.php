@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page_title', 'Admin Console & Site Management')

@section('content')
<!-- Core Management Hub Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px; margin-bottom: 24px;">

  <!-- 1. Blog Articles CMS -->
  <div class="card card-featured" style="margin-bottom: 0; padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--accent); letter-spacing: 0.06em;">Blog Articles CMS</span>
        <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(0, 80, 231, 0.12); display: flex; align-items: center; justify-content: center; color: var(--accent);">
          <svg style="width: 19px; height: 19px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
        </div>
      </div>
      <div class="metric-value" style="font-size: 2.2rem; font-weight: 800; color: var(--text);">{{ $stats['blogs_count'] }}</div>
      <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 6px;">
        <span class="badge badge-confirmed" style="font-size: 0.72rem;">{{ $stats['blogs_published'] }} Published Live</span>
      </div>
    </div>
    <div style="display: flex; gap: 8px; margin-top: 22px; flex-wrap: wrap;">
      <a href="{{ route('admin.cms.blogs.index') }}" class="btn btn-primary btn-sm" style="flex: 1; text-align: center; justify-content: center; min-width: 120px;">Manage Articles</a>
      <a href="{{ route('admin.cms.blogs.create') }}" class="btn btn-secondary btn-sm">+ New Post</a>
    </div>
  </div>

  <!-- 2. Careers CMS -->
  <div class="card" style="margin-bottom: 0; padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: #a855f7; letter-spacing: 0.06em;">Careers &amp; Openings</span>
        <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(168, 85, 247, 0.12); display: flex; align-items: center; justify-content: center; color: #a855f7;">
          <svg style="width: 19px; height: 19px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
        </div>
      </div>
      <div class="metric-value" style="font-size: 2.2rem; font-weight: 800; color: var(--text);">{{ $stats['jobs_count'] }}</div>
      <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 6px;">
        <span class="badge badge-confirmed" style="font-size: 0.72rem;">{{ $stats['jobs_active'] }} Active Hiring Roles</span>
      </div>
    </div>
    <div style="display: flex; gap: 8px; margin-top: 22px; flex-wrap: wrap;">
      <a href="{{ route('admin.cms.careers.index') }}" class="btn btn-primary btn-sm" style="flex: 1; text-align: center; justify-content: center; min-width: 120px;">Manage Roles</a>
      <a href="{{ route('admin.cms.careers.create') }}" class="btn btn-secondary btn-sm">+ Add Role</a>
    </div>
  </div>

  <!-- 3. Client Logos -->
  <div class="card" style="margin-bottom: 0; padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.06em;">Client Logos</span>
        <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(56, 189, 248, 0.12); display: flex; align-items: center; justify-content: center; color: #38bdf8;">
          <svg style="width: 19px; height: 19px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        </div>
      </div>
      <div class="metric-value" style="font-size: 2.2rem; font-weight: 800; color: var(--text);">{{ $stats['clients_count'] }}</div>
      <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 6px;">
        <span class="badge badge-confirmed" style="font-size: 0.72rem;">{{ $stats['clients_active'] }} Active on Banners</span>
      </div>
    </div>
    <div style="display: flex; gap: 8px; margin-top: 22px; flex-wrap: wrap;">
      <a href="{{ route('admin.cms.clients.index') }}" class="btn btn-secondary btn-sm" style="flex: 1; text-align: center; justify-content: center; min-width: 120px;">Manage Logos</a>
      <a href="{{ route('admin.cms.clients.create') }}" class="btn btn-secondary btn-sm">+ New Logo</a>
    </div>
  </div>

  <!-- 4. Media Library -->
  <div class="card" style="margin-bottom: 0; padding: 22px; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <span style="font-size: 0.75rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.06em;">Media Library</span>
        <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(56, 189, 248, 0.1); display: flex; align-items: center; justify-content: center; color: #0284c7;">
          <svg style="width: 19px; height: 19px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
        </div>
      </div>
      <div class="metric-value" style="font-size: 2.2rem; font-weight: 800; color: var(--text);">{{ $stats['files_count'] }}</div>
      <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 6px;">
        Uploaded media, vectors &amp; documents
      </div>
    </div>
    <div style="margin-top: 22px;">
      <a href="{{ route('admin.filemanager.index') }}" class="btn btn-secondary btn-sm" style="width: 100%; text-align: center; justify-content: center;">Open Media Library &rarr;</a>
    </div>
  </div>

</div>

<!-- Client Logos Section -->
<div class="card">
  <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
    <div class="card-title">
      <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      Client Logos Showcase
    </div>
    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
      <a href="{{ route('admin.cms.clients.create') }}" class="btn btn-primary btn-sm">+ Add New Logo</a>
      <a href="{{ route('admin.cms.clients.index') }}" class="btn btn-secondary btn-sm">View All ({{ $stats['clients_count'] }})</a>
    </div>
  </div>

  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th style="width: 80px;">Logo</th>
          <th>Client Name</th>
          <th>Status</th>
          <th>Order</th>
          <th style="text-align: right;">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse($recent_clients as $client)
          <tr>
            <td>
              <div style="width: 60px; height: 38px; background: #ffffff; border: 1px solid var(--border); border-radius: 6px; padding: 4px; display: flex; align-items: center; justify-content: center;">
                <img src="{{ asset($client->logo_path) }}" alt="{{ $client->name }}" style="max-width: 100%; max-height: 100%; object-fit: contain;">
              </div>
            </td>
            <td>
              <div style="font-weight: 600; color: var(--text);">{{ $client->name }}</div>
              @if($client->website_url)
                <a href="{{ $client->website_url }}" target="_blank" style="font-size: 0.75rem; color: var(--accent); text-decoration: none;">{{ $client->website_url }}</a>
              @endif
            </td>
            <td>
              @if($client->is_active)
                <span class="badge badge-confirmed">Active</span>
              @else
                <span class="badge badge-pending">Hidden</span>
              @endif
            </td>
            <td>
              <span style="font-family: monospace; font-size: 0.85rem; color: var(--text-dim);">#{{ $client->display_order }}</span>
            </td>
            <td style="text-align: right;">
              <a href="{{ route('admin.cms.clients.edit', $client->id) }}" class="btn btn-secondary btn-sm">Edit</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" style="text-align: center; padding: 36px 20px; color: var(--text-muted);">
              No client logos configured yet. <a href="{{ route('admin.cms.clients.create') }}" style="color: var(--accent);">Add your first client logo</a>.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
