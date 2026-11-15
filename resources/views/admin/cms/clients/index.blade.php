@extends('admin.layout')

@section('title', 'Client Logos CMS')
@section('page_title', 'Client Logos & Partner Trust Cloud')

@section('content')
<style>
  /* Responsive Client Logos Styles */
  .clients-header-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }
  .clients-header-text h2 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--text);
    margin: 0 0 4px 0;
  }
  .clients-header-text p {
    font-size: 0.82rem;
    color: var(--text-muted);
    margin: 0;
    max-width: 620px;
    line-height: 1.5;
  }

  /* Marquee Preview Strip */
  .marquee-strip-card {
    margin-bottom: 24px;
    max-width: 100%;
    overflow: hidden;
  }
  .marquee-strip-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 14px;
    flex-wrap: wrap;
    gap: 10px;
  }
  .marquee-strip-scroll {
    display: flex;
    gap: 14px;
    overflow-x: auto;
    width: 100%;
    max-width: 100%;
    padding: 14px;
    background: rgba(0, 0, 0, 0.25);
    border-radius: 10px;
    border: 1px solid var(--border-color);
    align-items: center;
    -webkit-overflow-scrolling: touch;
    box-sizing: border-box;
  }
  .marquee-strip-scroll::-webkit-scrollbar {
    height: 5px;
  }
  .marquee-strip-scroll::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.15);
    border-radius: 10px;
  }
  html.light-mode .marquee-strip-scroll {
    background: #F1F5F9;
  }
  .marquee-item {
    flex-shrink: 0;
    padding: 12px 16px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    text-align: center;
    min-width: 120px;
    transition: transform 0.2s ease, border-color 0.2s ease;
  }
  .marquee-item:hover {
    transform: translateY(-2px);
    border-color: rgba(96, 165, 250, 0.4);
  }
  html.light-mode .marquee-item {
    background: #FFFFFF;
    border-color: #E2E8F0;
  }

  /* Desktop Table vs Mobile Cards */
  .clients-desktop-table {
    display: block;
    width: 100%;
    max-width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    box-sizing: border-box;
  }
  .clients-desktop-table .data-table {
    width: 100%;
    min-width: 700px;
  }
  .clients-mobile-cards {
    display: none;
  }

  /* Status Toggle Button */
  .btn-status-toggle {
    border: none;
    cursor: pointer;
    background: none;
    padding: 0;
    font-family: inherit;
  }

  @media (max-width: 768px) {
    .clients-header-bar {
      flex-direction: column;
      align-items: stretch;
      gap: 12px;
    }
    .clients-header-bar .btn {
      width: 100%;
      justify-content: center;
    }
    .clients-desktop-table {
      display: none;
    }
    .clients-mobile-cards {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .client-card-item {
      background: rgba(15, 23, 42, 0.55);
      border: 1px solid var(--border-color);
      border-radius: 10px;
      padding: 14px;
      display: flex;
      flex-direction: column;
      gap: 12px;
      transition: border-color 0.2s;
    }
    html.light-mode .client-card-item {
      background: #FFFFFF;
      border-color: #E2E8F0;
    }
    .client-card-header-row {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .client-card-thumb {
      width: 64px;
      height: 44px;
      background: #ffffff;
      border: 1px solid var(--border-color);
      border-radius: 6px;
      padding: 4px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .client-card-thumb img {
      max-width: 100%;
      max-height: 100%;
      object-fit: contain;
    }
    .client-card-info {
      flex: 1;
      min-width: 0;
    }
    .client-card-name {
      font-weight: 700;
      font-size: 0.92rem;
      color: var(--text);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .client-card-path {
      font-size: 0.72rem;
      color: var(--text-muted);
      font-family: monospace;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
      margin-top: 2px;
    }
    .client-card-meta-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 8px;
      padding: 8px 10px;
      background: rgba(0, 0, 0, 0.25);
      border-radius: 6px;
      font-size: 0.78rem;
    }
    html.light-mode .client-card-meta-row {
      background: #F8FAFC;
      border: 1px solid #E2E8F0;
    }
    .client-card-actions {
      display: flex;
      align-items: center;
      gap: 8px;
      border-top: 1px solid var(--border-color);
      padding-top: 10px;
    }
    .client-card-actions .btn {
      flex: 1;
      justify-content: center;
      font-size: 0.8rem;
      padding: 7px 10px;
    }
  }
</style>

<!-- Top Action Header -->
<div class="clients-header-bar">
  <div class="clients-header-text">
    <h2>Client Logos Showcase</h2>
    <p>Manage client and enterprise logos featured across marquee banners on homepage, careers, and solution pages.</p>
  </div>
  <a href="{{ route('admin.cms.clients.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 16px; height: 16px;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Add Client Logo
  </a>
</div>

<!-- Live Visual Marquee Preview -->
<div class="card marquee-strip-card">
  <div class="marquee-strip-header">
    <div>
      <h3 style="font-size: 0.95rem; font-weight: 700; margin: 0 0 3px;">Live Marquee Visual Strip</h3>
      <p style="font-size: 0.78rem; color: var(--text-muted); margin: 0;">Preview of active logos as rendered on public marquee banners.</p>
    </div>
    <span class="badge badge-confirmed">{{ $clients->where('is_active', true)->count() }} Active on Website</span>
  </div>

  <div class="marquee-strip-scroll">
    @forelse($clients->where('is_active', true) as $c)
      <div class="marquee-item">
        <img src="{{ asset($c->logo_path) }}" alt="{{ $c->name }}" style="max-height: 36px; max-width: 100px; object-fit: contain; display: block; margin: 0 auto 6px;" loading="lazy">
        <div style="font-size: 0.72rem; font-weight: 600; color: var(--text-muted); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 105px;">
          {{ $c->name }}
        </div>
      </div>
    @empty
      <div style="color: var(--text-muted); font-size: 0.82rem; padding: 14px;">No active client logos to preview.</div>
    @endforelse
  </div>
</div>

<!-- Main Clients List Card -->
<div class="card">
  <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
    <div class="card-title">
      <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      All Configured Client Logos ({{ $clients->count() }})
    </div>
  </div>

  <!-- 1. Desktop & Tablet View Table -->
  <div class="clients-desktop-table table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th style="width: 60px;">Order</th>
          <th style="width: 110px;">Logo Preview</th>
          <th>Client / Brand Name</th>
          <th>Target Link</th>
          <th style="width: 100px;">Status</th>
          <th style="width: 120px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($clients as $c)
          <tr>
            <td style="font-family: monospace; color: var(--accent); font-weight: 700;">#{{ $c->display_order }}</td>
            <td>
              <div style="width: 90px; height: 42px; display: flex; align-items: center; justify-content: center; background: #ffffff; border: 1px solid var(--border-color); border-radius: 6px; padding: 4px;">
                <img src="{{ asset($c->logo_path) }}" alt="{{ $c->name }}" style="max-height: 34px; max-width: 82px; object-fit: contain;">
              </div>
            </td>
            <td style="font-weight: 600; min-width: 160px; max-width: 240px;">
              <div style="color: var(--text); overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $c->name }}">{{ $c->name }}</div>
              <div style="font-size: 0.72rem; color: var(--text-muted); font-family: monospace; margin-top: 2px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $c->logo_path }}">{{ $c->logo_path }}</div>
            </td>
            <td style="min-width: 160px; max-width: 220px;">
              @if($c->website_url)
                <a href="{{ $c->website_url }}" target="_blank" rel="noopener noreferrer" style="color: var(--accent); font-size: 0.82rem; text-decoration: underline; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; display: block;" title="{{ $c->website_url }}">
                  {{ Str::limit($c->website_url, 30) }}
                </a>
              @else
                <span style="color: var(--text-dim); font-size: 0.78rem;">None (Display only)</span>
              @endif
            </td>
            <td>
              <form action="{{ route('admin.cms.clients.toggle', $c->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-status-toggle badge {{ $c->is_active ? 'badge-confirmed' : 'badge-inactive' }}" title="Click to toggle status">
                  {{ $c->is_active ? 'Active' : 'Hidden' }}
                </button>
              </form>
            </td>
            <td style="text-align: right;">
              <div style="display: inline-flex; gap: 6px;">
                <a href="{{ route('admin.cms.clients.edit', $c->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ route('admin.cms.clients.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove client logo \'{{ $c->name }}\'?');" style="display:inline;">
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
            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 36px 20px;">
              No client logos configured yet. Click "Add Client Logo" to create your first brand item.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- 2. Mobile View Cards (Screens <= 768px) -->
  <div class="clients-mobile-cards">
    @forelse($clients as $c)
      <div class="client-card-item">
        <div class="client-card-header-row">
          <div class="client-card-thumb">
            <img src="{{ asset($c->logo_path) }}" alt="{{ $c->name }}">
          </div>
          <div class="client-card-info">
            <div class="client-card-name">{{ $c->name }}</div>
            <div class="client-card-path">{{ $c->logo_path }}</div>
          </div>
          <span style="font-family: monospace; font-size: 0.8rem; font-weight: 700; color: var(--accent); background: rgba(96,165,250,0.1); padding: 3px 8px; border-radius: 4px;">
            #{{ $c->display_order }}
          </span>
        </div>

        <div class="client-card-meta-row">
          <div>
            <span style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase;">Status:</span>
            <form action="{{ route('admin.cms.clients.toggle', $c->id) }}" method="POST" style="display:inline; margin-left: 4px;">
              @csrf
              <button type="submit" class="btn-status-toggle badge {{ $c->is_active ? 'badge-confirmed' : 'badge-inactive' }}" title="Click to toggle status">
                {{ $c->is_active ? 'Active' : 'Hidden' }}
              </button>
            </form>
          </div>
          <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 55%; text-align: right;">
            @if($c->website_url)
              <a href="{{ $c->website_url }}" target="_blank" rel="noopener noreferrer" style="color: var(--accent); font-size: 0.75rem; text-decoration: underline;">
                {{ Str::limit($c->website_url, 22) }}
              </a>
            @else
              <span style="color: var(--text-dim); font-size: 0.72rem;">No link</span>
            @endif
          </div>
        </div>

        <div class="client-card-actions">
          <a href="{{ route('admin.cms.clients.edit', $c->id) }}" class="btn btn-secondary btn-sm">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Edit
          </a>
          <form action="{{ route('admin.cms.clients.destroy', $c->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove client logo \'{{ $c->name }}\'?');" style="flex: 1; display: flex;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" style="width: 100%; justify-content: center;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
              Delete
            </button>
          </form>
        </div>
      </div>
    @empty
      <div style="text-align: center; color: var(--text-muted); padding: 36px 20px;">
        No client logos configured yet. Click "Add Client Logo" to create your first brand item.
      </div>
    @endforelse
  </div>
</div>
@endsection

