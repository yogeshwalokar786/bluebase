@extends('admin.layout')

@section('title', 'Chat Transcript #' . $session->id)
@section('page_title', 'Conversation Transcript')

@section('content')
<div style="margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
  <div style="display: flex; align-items: center; gap: 12px;">
    <a href="{{ route('admin.chats.index') }}" class="btn btn-secondary btn-sm">
      &larr; Back to Conversations
    </a>
    <span style="font-size: 0.95rem; font-weight: 700; color: var(--text);">
      Session #{{ $session->id }} &mdash; {{ $session->visitor_name ?: 'Anonymous Visitor' }}
    </span>
    <span class="badge" style="border: 1px solid {{ $session->status === 'active' ? 'rgba(16, 185, 129, 0.3)' : 'rgba(239, 68, 68, 0.3)' }}; background: {{ $session->status === 'active' ? 'rgba(16, 185, 129, 0.12)' : 'rgba(239, 68, 68, 0.12)' }}; color: {{ $session->status === 'active' ? '#10B981' : '#EF4444' }};">
      {{ ucfirst($session->status) }}
    </span>
  </div>

  <div style="display: flex; gap: 8px;">
    <form action="{{ route('admin.chats.toggle', $session->id) }}" method="POST" style="display: inline;">
      @csrf
      <button type="submit" class="btn btn-secondary btn-sm">
        Mark as {{ $session->status === 'active' ? 'Closed' : 'Active' }}
      </button>
    </form>
    <form action="{{ route('admin.chats.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Delete this conversation completely?');" style="display: inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger btn-sm">Delete Transcript</button>
    </form>
  </div>
</div>

<div style="display: grid; grid-template-columns: 320px 1fr; gap: 24px; align-items: start;">
  <!-- Visitor Information Sidebar -->
  <div class="card" style="margin-bottom: 0;">
    <div class="card-header">
      <div class="card-title" style="font-size: 0.9rem;">
        <svg style="width: 16px; height: 16px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
        Visitor Profile
      </div>
    </div>

    <div style="display: flex; flex-direction: column; gap: 16px; font-size: 0.85rem;">
      <div>
        <div style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">Full Name</div>
        <div style="font-weight: 700; color: var(--text); font-size: 1rem;">
          {{ $session->visitor_name ?: 'Not Provided Yet' }}
        </div>
      </div>

      <div>
        <div style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">Email Address</div>
        @if($session->visitor_email)
          <a href="mailto:{{ $session->visitor_email }}" style="color: var(--accent); font-weight: 600; text-decoration: none; word-break: break-all;">
            {{ $session->visitor_email }}
          </a>
        @else
          <span style="color: var(--text-muted); font-style: italic;">Not Captured</span>
        @endif
      </div>

      <div>
        <div style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">Current Stage</div>
        <div>
          @if($session->step === 'conversing')
            <span class="badge badge-confirmed" style="background: rgba(16, 185, 129, 0.15); color: #10B981; border: 1px solid rgba(16, 185, 129, 0.3);">
              Conversing (Leads Captured)
            </span>
          @elseif($session->step === 'ask_email')
            <span class="badge" style="background: rgba(245, 158, 11, 0.15); color: #F59E0B; border: 1px solid rgba(245, 158, 11, 0.3);">
              Awaiting Email Address
            </span>
          @else
            <span class="badge" style="background: rgba(148, 163, 184, 0.15); color: #94A3B8; border: 1px solid rgba(148, 163, 184, 0.3);">
              Awaiting Visitor Name
            </span>
          @endif
        </div>
      </div>

      <div style="border-top: 1px solid var(--border-color); padding-top: 14px;">
        <div style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">IP Address</div>
        <div style="font-family: monospace; color: var(--text-muted); font-size: 0.8rem;">
          {{ $session->ip_address ?: 'Unknown IP' }}
        </div>
      </div>

      <div>
        <div style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">Device / Browser</div>
        <div style="color: var(--text-muted); font-size: 0.78rem; word-break: break-word; line-height: 1.4;">
          {{ $session->user_agent ?: 'Standard Web Browser' }}
        </div>
      </div>

      <div style="border-top: 1px solid var(--border-color); padding-top: 14px;">
        <div style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">Conversation Timeline</div>
        <div style="font-size: 0.8rem; color: var(--text-muted); line-height: 1.5;">
          <div>Started: {{ $session->created_at->format('M d, Y h:i A') }}</div>
          <div>Last Activity: {{ $session->last_message_at ? $session->last_message_at->format('M d, Y h:i A') : $session->created_at->format('M d, Y h:i A') }}</div>
        </div>
      </div>

      <div>
        <div style="color: var(--text-dim); font-size: 0.72rem; text-transform: uppercase; font-weight: 600; margin-bottom: 4px;">Session UUID</div>
        <div style="font-family: monospace; font-size: 0.72rem; color: var(--text-dim); word-break: break-all;">
          {{ $session->session_uuid }}
        </div>
      </div>
    </div>
  </div>

  <!-- Chat Transcript Feed -->
  <div class="card" style="margin-bottom: 0; display: flex; flex-direction: column;">
    <div class="card-header" style="border-bottom: 1px solid var(--border-color);">
      <div class="card-title" style="font-size: 0.95rem;">
        <svg style="width: 17px; height: 17px; color: #10B981;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        Full Live Chat Transcript ({{ $session->messages->count() }} messages)
      </div>
    </div>

    <div style="display: flex; flex-direction: column; gap: 18px; padding: 20px; max-height: 680px; overflow-y: auto;">
      @forelse($session->messages as $msg)
        @if($msg->sender === 'bot')
          <!-- Bot Speech Bubble -->
          <div style="display: flex; gap: 12px; max-width: 85%; align-self: flex-start;">
            <div style="width: 36px; height: 36px; border-radius: 50%; background: linear-gradient(135deg, #0050E7, #002b80); display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; box-shadow: 0 4px 12px rgba(0, 80, 231, 0.3);">
              <svg style="width: 18px; height: 18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="10" rx="2"/><circle cx="12" cy="5" r="2"/><path d="M12 7v4"/><line x1="8" y1="16" x2="8" y2="16"/><line x1="16" y1="16" x2="16" y2="16"/></svg>
            </div>
            <div style="flex: 1;">
              <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                <span style="font-size: 0.78rem; font-weight: 700; color: #60a5fa;">Bluebase AI Assistant</span>
                <span style="font-size: 0.7rem; color: var(--text-dim);">{{ $msg->created_at->format('h:i A') }}</span>
              </div>
              <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid var(--border-color); border-radius: 12px; border-top-left-radius: 2px; padding: 14px 16px; color: var(--text); font-size: 0.88rem; line-height: 1.6; white-space: pre-wrap; word-break: break-word;">{{ $msg->message }}</div>

              @if(!empty($msg->metadata['suggestions']))
                <div style="display: flex; flex-wrap: wrap; gap: 6px; margin-top: 8px;">
                  @foreach($msg->metadata['suggestions'] as $suggestion)
                    <span style="font-size: 0.72rem; padding: 4px 10px; border-radius: 20px; background: rgba(0, 80, 231, 0.1); border: 1px solid rgba(0, 80, 231, 0.25); color: #93c5fd;">
                      {{ $suggestion }}
                    </span>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
        @else
          <!-- User Speech Bubble -->
          <div style="display: flex; gap: 12px; max-width: 85%; align-self: flex-end; flex-direction: row-reverse;">
            <div style="width: 36px; height: 36px; border-radius: 50%; background: #10B981; display: flex; align-items: center; justify-content: center; color: #fff; flex-shrink: 0; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);">
              <svg style="width: 18px; height: 18px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div style="flex: 1; text-align: right;">
              <div style="display: flex; align-items: center; justify-content: flex-end; gap: 8px; margin-bottom: 4px;">
                <span style="font-size: 0.7rem; color: var(--text-dim);">{{ $msg->created_at->format('h:i A') }}</span>
                <span style="font-size: 0.78rem; font-weight: 700; color: #10B981;">{{ $session->visitor_name ?: 'Visitor' }}</span>
              </div>
              <div style="display: inline-block; text-align: left; background: #0050E7; color: #ffffff; border-radius: 12px; border-top-right-radius: 2px; padding: 14px 16px; font-size: 0.88rem; line-height: 1.6; word-break: break-word;">{{ $msg->message }}</div>
            </div>
          </div>
        @endif
      @empty
        <div style="text-align: center; padding: 40px; color: var(--text-muted);">
          No messages recorded in this session.
        </div>
      @endforelse
    </div>
  </div>
</div>

<style>
@media (max-width: 900px) {
  div[style*="grid-template-columns: 320px 1fr"] {
    grid-template-columns: 1fr !important;
  }
}
</style>
@endsection
