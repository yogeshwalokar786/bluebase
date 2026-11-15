@extends('admin.layout')

@section('title', 'Admin Dashboard')
@section('page_title', 'Admin Console & Site Management')

@section('content')
<!-- Three Core Management Hub Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 32px;">

  <!-- 1. Client Logos -->
  <div class="card card-featured" style="margin-bottom: 0; padding: 24px; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: var(--accent); letter-spacing: 0.06em;">Client Logos CMS</span>
        <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(0, 80, 231, 0.1); display: flex; align-items: center; justify-content: center; color: var(--accent);">
          <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
        </div>
      </div>
      <div class="metric-value" style="font-size: 2.2rem; font-weight: 800; color: var(--text);">{{ $stats['clients_count'] }}</div>
      <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 6px;">
        <span class="badge badge-confirmed" style="font-size: 0.75rem;">{{ $stats['clients_active'] }} Active on Homepage &amp; Careers</span>
      </div>
    </div>
    <div style="display: flex; gap: 10px; margin-top: 24px;">
      <a href="{{ route('admin.cms.clients.index') }}" class="btn btn-primary btn-sm" style="flex: 1; text-align: center; justify-content: center;">Manage Logos</a>
      <a href="{{ route('admin.cms.clients.create') }}" class="btn btn-secondary btn-sm">+ Add New</a>
    </div>
  </div>

  <!-- 2. Media Manager -->
  <div class="card" style="margin-bottom: 0; padding: 24px; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.06em;">Media Manager</span>
        <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(56, 189, 248, 0.1); display: flex; align-items: center; justify-content: center; color: #0284c7;">
          <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/></svg>
        </div>
      </div>
      <div class="metric-value" style="font-size: 2.2rem; font-weight: 800; color: var(--text);">{{ $stats['files_count'] }}</div>
      <div style="font-size: 0.82rem; color: var(--text-muted); margin-top: 6px;">
        Uploaded media, vectors, images &amp; documents
      </div>
    </div>
    <div style="margin-top: 24px;">
      <a href="{{ route('admin.filemanager.index') }}" class="btn btn-secondary btn-sm" style="width: 100%; text-align: center; justify-content: center;">Open Media Library &rarr;</a>
    </div>
  </div>

  <!-- 3. Site Settings -->
  <div class="card" style="margin-bottom: 0; padding: 24px; display: flex; flex-direction: column; justify-content: space-between;">
    <div>
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
        <span style="font-size: 0.78rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.06em;">Site Settings</span>
        <div style="width: 36px; height: 36px; border-radius: 10px; background: rgba(16, 185, 129, 0.1); display: flex; align-items: center; justify-content: center; color: #10b981;">
          <svg style="width: 20px; height: 20px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
        </div>
      </div>
      <div style="font-weight: 700; font-size: 1.1rem; color: var(--text);">{{ $stats['company_name'] }}</div>
      <div style="font-size: 0.85rem; color: var(--accent); margin-top: 6px; font-weight: 600;">
        {{ $stats['official_email'] }}
      </div>
      <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 4px;">
        Phone: {{ $stats['contact_phone'] }}
      </div>
    </div>
    <div style="margin-top: 24px;">
      <a href="{{ route('admin.settings') }}" class="btn btn-secondary btn-sm" style="width: 100%; text-align: center; justify-content: center;">Edit Configuration &rarr;</a>
    </div>
  </div>

</div>

<!-- Client Logos Section -->
<div class="card">
  <div class="card-header" style="display: flex; align-items: center; justify-content: space-between;">
    <div class="card-title">
      <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      Client Logos Showcase
    </div>
    <div style="display: flex; gap: 8px;">
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
