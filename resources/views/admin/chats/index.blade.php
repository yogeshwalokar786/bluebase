@extends('admin.layout')

@section('title', 'AI Live Chats')
@section('page_title', 'AI Live Chat Conversations')

@section('content')
<!-- Header Stats Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
  <div class="card" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-dim); text-transform: uppercase;">Total Sessions</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: var(--text); margin-top: 6px;">{{ $stats['total'] }}</div>
  </div>
  <div class="card card-featured" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.75rem; font-weight: 700; color: #10B981; text-transform: uppercase;">Captured Leads</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: #10B981; margin-top: 6px;">{{ $stats['with_leads'] }}</div>
  </div>
  <div class="card" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.75rem; font-weight: 700; color: var(--accent); text-transform: uppercase;">In Active Discussion</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: var(--accent); margin-top: 6px;">{{ $stats['conversing'] }}</div>
  </div>
  <div class="card" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.75rem; font-weight: 700; color: #F59E0B; text-transform: uppercase;">Active Sessions</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: #F59E0B; margin-top: 6px;">{{ $stats['active'] }}</div>
  </div>
</div>

<!-- Main Table Card -->
<div class="card">
  <div class="card-header" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
    <div class="card-title">
      <svg style="width: 18px; height: 18px; color: #10B981;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      Chat Transcripts &amp; Captured Leads
    </div>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('admin.chats.index') }}" style="display: flex; gap: 10px; flex-wrap: wrap; align-items: center;">
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Search visitor, email, UUID..." class="form-control" style="width: 240px; font-size: 0.82rem; padding: 7px 12px;">

      <select name="step" class="form-select" style="width: 150px; font-size: 0.82rem; padding: 7px 12px;">
        <option value="">All Steps</option>
        <option value="conversing" {{ request('step') == 'conversing' ? 'selected' : '' }}>Conversing</option>
        <option value="ask_email" {{ request('step') == 'ask_email' ? 'selected' : '' }}>Awaiting Email</option>
        <option value="ask_name" {{ request('step') == 'ask_name' ? 'selected' : '' }}>Awaiting Name</option>
      </select>

      <select name="status" class="form-select" style="width: 130px; font-size: 0.82rem; padding: 7px 12px;">
        <option value="">All Status</option>
        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
      </select>

      <button type="submit" class="btn btn-secondary btn-sm" style="padding: 7px 14px;">Filter</button>
      @if(request()->anyFilled(['search', 'step', 'status']))
        <a href="{{ route('admin.chats.index') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.06); color: var(--text-muted); padding: 7px 12px;">Reset</a>
      @endif
    </form>
  </div>

  @if($sessions->isEmpty())
    <div style="text-align: center; padding: 48px 20px; color: var(--text-muted);">
      <svg style="width: 44px; height: 44px; margin-bottom: 14px; opacity: 0.35;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      <div style="font-size: 1rem; font-weight: 600; color: var(--text);">No chat conversations found</div>
      <p style="font-size: 0.85rem; margin-top: 6px;">Conversations initiated on the public website widget will appear here in real time.</p>
    </div>
  @else
    <div class="table-responsive">
      <table class="data-table">
        <thead>
          <tr>
            <th style="width: 50px;">ID</th>
            <th>Visitor / Lead</th>
            <th>Email</th>
            <th>Progress Step</th>
            <th>Messages</th>
            <th>Status</th>
            <th>Last Active</th>
            <th style="width: 140px; text-align: right;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sessions as $session)
            <tr>
              <td style="color: var(--text-dim); font-size: 0.8rem;">#{{ $session->id }}</td>
              <td>
                <div style="font-weight: 600; color: var(--text);">
                  {{ $session->visitor_name ?: 'Anonymous Visitor' }}
                </div>
                <div style="font-size: 0.72rem; color: var(--text-dim); font-family: monospace;">
                  {{ substr($session->session_uuid, 0, 18) }}...
                </div>
              </td>
              <td>
                @if($session->visitor_email)
                  <a href="mailto:{{ $session->visitor_email }}" style="color: var(--accent); text-decoration: none; font-size: 0.85rem;">
                    {{ $session->visitor_email }}
                  </a>
                @else
                  <span style="color: var(--text-dim); font-size: 0.8rem; font-style: italic;">Not provided</span>
                @endif
              </td>
              <td>
                @if($session->step === 'conversing')
                  <span class="badge badge-confirmed" style="background: rgba(16, 185, 129, 0.15); color: #10B981; border: 1px solid rgba(16, 185, 129, 0.3);">
                    Conversing
                  </span>
                @elseif($session->step === 'ask_email')
                  <span class="badge" style="background: rgba(245, 158, 11, 0.15); color: #F59E0B; border: 1px solid rgba(245, 158, 11, 0.3);">
                    Waiting Email
                  </span>
                @else
                  <span class="badge" style="background: rgba(148, 163, 184, 0.15); color: #94A3B8; border: 1px solid rgba(148, 163, 184, 0.3);">
                    Waiting Name
                  </span>
                @endif
              </td>
              <td>
                <span style="font-weight: 600; font-size: 0.85rem;">{{ $session->messages_count }}</span>
                <span style="font-size: 0.75rem; color: var(--text-dim);">msgs</span>
              </td>
              <td>
                <form action="{{ route('admin.chats.toggle', $session->id) }}" method="POST" style="display: inline;">
                  @csrf
                  <button type="submit" class="badge" style="cursor: pointer; border: 1px solid {{ $session->status === 'active' ? 'rgba(16, 185, 129, 0.3)' : 'rgba(239, 68, 68, 0.3)' }}; background: {{ $session->status === 'active' ? 'rgba(16, 185, 129, 0.12)' : 'rgba(239, 68, 68, 0.12)' }}; color: {{ $session->status === 'active' ? '#10B981' : '#EF4444' }};">
                    {{ ucfirst($session->status) }}
                  </button>
                </form>
              </td>
              <td style="font-size: 0.8rem; color: var(--text-muted);">
                {{ $session->last_message_at ? $session->last_message_at->diffForHumans() : $session->created_at->diffForHumans() }}
              </td>
              <td style="text-align: right;">
                <div style="display: flex; gap: 8px; justify-content: flex-end;">
                  <a href="{{ route('admin.chats.show', $session->id) }}" class="btn btn-primary btn-sm" style="padding: 5px 10px; font-size: 0.78rem;">
                    Transcript
                  </a>
                  <form action="{{ route('admin.chats.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this chat transcript?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" style="padding: 5px 8px;" title="Delete Transcript">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div style="padding: 16px 20px; border-top: 1px solid var(--border-color);">
      {{ $sessions->links() }}
    </div>
  @endif
</div>
@endsection
