@extends('admin.layout')

@section('title', 'Careers & Job Openings CMS')
@section('page_title', 'Careers & Job Openings CMS')

@section('content')
<style>
  .careers-header-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    margin-bottom: 24px;
    flex-wrap: wrap;
  }
  .careers-header-text h2 {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--text);
    margin: 0 0 4px 0;
  }
  .careers-header-text p {
    font-size: 0.82rem;
    color: var(--text-muted);
    margin: 0;
    max-width: 620px;
    line-height: 1.5;
  }
  .btn-status-toggle {
    border: none;
    cursor: pointer;
    background: none;
    padding: 0;
    font-family: inherit;
  }
  .careers-desktop-table {
    display: block;
    width: 100%;
    max-width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    box-sizing: border-box;
  }
  .careers-desktop-table .data-table {
    width: 100%;
    min-width: 720px;
  }
  .careers-mobile-cards {
    display: none;
  }

  @media (max-width: 768px) {
    .careers-header-bar {
      flex-direction: column;
      align-items: stretch;
      gap: 12px;
    }
    .careers-header-bar .btn {
      width: 100%;
      justify-content: center;
    }
    .careers-desktop-table {
      display: none;
    }
    .careers-mobile-cards {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .career-item-card {
      background: rgba(15, 23, 42, 0.55);
      border: 1px solid var(--border-color);
      border-radius: 10px;
      padding: 14px;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    html.light-mode .career-item-card {
      background: #FFFFFF;
      border-color: #E2E8F0;
    }
    .career-card-top {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 10px;
    }
    .career-card-title {
      font-weight: 700;
      font-size: 0.95rem;
      color: var(--text);
    }
    .career-card-dept {
      font-size: 0.75rem;
      color: var(--accent);
      font-weight: 600;
      margin-top: 2px;
    }
    .career-card-meta {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 8px 10px;
      background: rgba(0, 0, 0, 0.25);
      border-radius: 6px;
      font-size: 0.78rem;
    }
    html.light-mode .career-card-meta {
      background: #F8FAFC;
      border: 1px solid #E2E8F0;
    }
    .career-card-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 5px;
    }
    .career-tag-mini {
      font-size: 0.7rem;
      padding: 2px 7px;
      background: rgba(255, 255, 255, 0.06);
      border: 1px solid var(--border-color);
      border-radius: 4px;
      color: var(--text-muted);
    }
    html.light-mode .career-tag-mini {
      background: #F1F5F9;
      color: #475569;
    }
    .career-card-actions {
      display: flex;
      align-items: center;
      gap: 8px;
      border-top: 1px solid var(--border-color);
      padding-top: 10px;
      margin-top: 4px;
    }
    .career-card-actions .btn {
      flex: 1;
      justify-content: center;
      font-size: 0.8rem;
      padding: 7px 10px;
    }
  }
</style>

<!-- Top Action Header -->
<div class="careers-header-bar">
  <div class="careers-header-text">
    <h2>Engineering Positions &amp; Job Openings</h2>
    <p>Manage dynamic engineering roles published on the <a href="{{ route('careers') }}" target="_blank" style="color: var(--accent); text-decoration: underline;">Careers Hub</a>. Updates publish instantly.</p>
  </div>
  <a href="{{ route('admin.cms.careers.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 16px; height: 16px;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Post New Role
  </a>
</div>

<!-- Main Table Card -->
<div class="card">
  <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
    <div class="card-title">
      <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
      All Job Openings ({{ $totalJobs }})
    </div>
    <span class="badge badge-confirmed">{{ $activeJobs }} Published on Careers Page</span>
  </div>

  <!-- 1. Desktop & Tablet View Table -->
  <div class="careers-desktop-table table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th style="width: 60px;">Order</th>
          <th>Role Title &amp; Department</th>
          <th style="width: 150px;">Category</th>
          <th style="width: 140px;">Location &amp; Type</th>
          <th style="width: 100px;">Status</th>
          <th style="width: 130px; text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($jobs as $job)
          <tr>
            <td style="font-family: monospace; color: var(--accent); font-weight: 700;">#{{ $job->display_order }}</td>
            <td style="font-weight: 600;">
              <div style="color: var(--text); font-size: 0.92rem;">{{ $job->title }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 2px;">
                {{ $job->department }} &bull; {{ $job->experience ?? 'All Levels' }}
              </div>
              @if(!empty($job->skills_list))
                <div style="display: flex; gap: 4px; flex-wrap: wrap; margin-top: 6px;">
                  @foreach(array_slice($job->skills_list, 0, 4) as $skill)
                    <span style="font-size: 0.68rem; padding: 1px 6px; border-radius: 4px; background: rgba(255,255,255,0.06); color: var(--text-dim); border: 1px solid var(--border-color);">{{ $skill }}</span>
                  @endforeach
                </div>
              @endif
            </td>
            <td>
              <span class="badge badge-new" style="font-size: 0.72rem;">{{ $job->category_label }}</span>
            </td>
            <td>
              <div style="font-size: 0.82rem; color: var(--text);">{{ $job->type }}</div>
              <div style="font-size: 0.72rem; color: var(--text-muted); margin-top: 2px;">{{ $job->location }}</div>
            </td>
            <td>
              <form action="{{ route('admin.cms.careers.toggle', $job->id) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn-status-toggle badge {{ $job->is_active ? 'badge-confirmed' : 'badge-inactive' }}" title="Click to toggle publish status">
                  {{ $job->is_active ? 'Active' : 'Hidden' }}
                </button>
              </form>
            </td>
            <td style="text-align: right;">
              <div style="display: inline-flex; gap: 6px;">
                <a href="{{ route('admin.cms.careers.edit', $job->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ route('admin.cms.careers.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove opening \'{{ $job->title }}\'?');" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" title="Delete Role">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 36px 20px;">
              No job openings configured yet. Click "Post New Role" to create your first opening.
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- 2. Mobile View Cards (Screens <= 768px) -->
  <div class="careers-mobile-cards">
    @forelse($jobs as $job)
      <div class="career-item-card">
        <div class="career-card-top">
          <div>
            <div class="career-card-title">{{ $job->title }}</div>
            <div class="career-card-dept">{{ $job->department }} &bull; {{ $job->experience ?? 'All Levels' }}</div>
          </div>
          <span style="font-family: monospace; font-size: 0.8rem; font-weight: 700; color: var(--accent); background: rgba(96,165,250,0.1); padding: 2px 7px; border-radius: 4px;">
            #{{ $job->display_order }}
          </span>
        </div>

        <div class="career-card-tags">
          <span class="badge badge-new" style="font-size: 0.7rem;">{{ $job->category_label }}</span>
          @foreach(array_slice($job->skills_list, 0, 3) as $skill)
            <span class="career-tag-mini">{{ $skill }}</span>
          @endforeach
        </div>

        <div class="career-card-meta">
          <div>
            <span style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase;">Status:</span>
            <form action="{{ route('admin.cms.careers.toggle', $job->id) }}" method="POST" style="display:inline; margin-left: 4px;">
              @csrf
              <button type="submit" class="btn-status-toggle badge {{ $job->is_active ? 'badge-confirmed' : 'badge-inactive' }}">
                {{ $job->is_active ? 'Active' : 'Hidden' }}
              </button>
            </form>
          </div>
          <div style="font-size: 0.75rem; color: var(--text-muted);">
            {{ $job->type }} &bull; {{ $job->location }}
          </div>
        </div>

        <div class="career-card-actions">
          <a href="{{ route('admin.cms.careers.edit', $job->id) }}" class="btn btn-secondary btn-sm">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            Edit
          </a>
          <form action="{{ route('admin.cms.careers.destroy', $job->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove opening \'{{ $job->title }}\'?');" style="flex: 1; display: flex;">
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
        No job openings configured yet. Click "Post New Role" to create your first opening.
      </div>
    @endforelse
  </div>

  @if($jobs->hasPages())
    <div style="margin-top: 20px;">
      {{ $jobs->links() }}
    </div>
  @endif
</div>
@endsection
