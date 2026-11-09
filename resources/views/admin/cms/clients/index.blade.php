@extends('admin.layout')

@section('title', 'Client Logos CMS')
@section('page_title', 'Client Logos & Partner Trust Cloud')

@section('content')
<div class="filter-bar">
  <div style="font-size: 0.9rem; color: var(--text-muted);">
    Manage the client and enterprise logos featured across all page marquee banners. Changes reflect live on the website.
  </div>
  <a href="{{ route('admin.cms.clients.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Add Client Logo
  </a>
</div>

<!-- Visual Grid Preview -->
<div class="card" style="margin-bottom: 24px;">
  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
    <div>
      <h3 style="font-size: 0.95rem; font-weight: 700; margin: 0 0 4px;">Live Marquee Visual Strip</h3>
      <p style="font-size: 0.8rem; color: var(--text-muted); margin: 0;">This is how client logos appear to website visitors across your marketing pages.</p>
    </div>
    <span class="badge badge-confirmed">{{ $clients->where('is_active', true)->count() }} Active Logos</span>
  </div>
  <div style="display: flex; gap: 16px; overflow-x: auto; padding: 16px; background: rgba(0,0,0,0.25); border-radius: 8px; border: 1px solid var(--border-color); align-items: center;">
    @forelse($clients->where('is_active', true) as $c)
      <div style="flex-shrink: 0; padding: 12px 18px; background: rgba(255,255,255,0.04); border: 1px solid var(--border-color); border-radius: 6px; text-align: center; min-width: 130px;">
        <img src="{{ asset($c->logo_path) }}" alt="{{ $c->name }}" style="max-height: 38px; max-width: 110px; object-fit: contain; display: block; margin: 0 auto 8px; filter: grayscale(15%) brightness(1.1);" loading="lazy">
        <div style="font-size: 0.72rem; font-weight: 600; color: var(--text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 110px;">{{ $c->name }}</div>
      </div>
    @empty
      <div style="color: var(--text-muted); font-size: 0.85rem; padding: 16px;">No active client logos to preview.</div>
    @endforelse
  </div>
</div>

<!-- Detailed Table View -->
<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th style="width: 70px;">Order</th>
          <th style="width: 140px;">Logo Preview</th>
          <th>Client / Brand Name</th>
          <th>Target Link</th>
          <th style="width: 110px;">Status</th>
          <th style="width: 130px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($clients as $c)
          <tr>
            <td style="font-family: monospace; color: var(--accent); font-weight: 700;">#{{ $c->display_order }}</td>
            <td>
              <div style="width: 110px; height: 44px; display: flex; align-items: center; justify-content: center; background: rgba(255,255,255,0.06); border: 1px solid var(--border-color); border-radius: 6px; padding: 6px;">
                <img src="{{ asset($c->logo_path) }}" alt="{{ $c->name }}" style="max-height: 34px; max-width: 95px; object-fit: contain;">
              </div>
            </td>
            <td style="font-weight: 600;">
              <div style="color: var(--text-main);">{{ $c->name }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted); font-family: monospace;">{{ $c->logo_path }}</div>
            </td>
            <td>
              @if($c->website_url)
                <a href="{{ $c->website_url }}" target="_blank" rel="noopener noreferrer" style="color: var(--accent); font-size: 0.82rem; text-decoration: underline; word-break: break-all;">
                  {{ Str::limit($c->website_url, 35) }}
                </a>
              @else
                <span style="color: var(--text-dim); font-size: 0.8rem;">None (Display only)</span>
              @endif
            </td>
            <td>
              <form action="{{ route('admin.cms.clients.toggle', $c->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="badge {{ $c->is_active ? 'badge-confirmed' : 'badge-inactive' }}" style="border: none; cursor: pointer;" title="Click to toggle status">
                  {{ $c->is_active ? 'Active' : 'Inactive' }}
                </button>
              </form>
            </td>
            <td style="text-align: right;">
              <div style="display: inline-flex; gap: 8px;">
                <a href="{{ route('admin.cms.clients.edit', $c->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ route('admin.cms.clients.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove client logo \'{{ $c->name }}\'?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" title="Delete Logo">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 40px;">
              No client logos configured yet. Click "Add Client Logo" to create your first brand item.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection

