@extends('admin.layout')

@section('title', 'Webmail & Client Inbox')
@section('page_title', 'Enterprise Webmail & Client Communications')

@section('content')
<style>
  .webmail-container {
    display: flex;
    gap: 16px;
    height: calc(100vh - 140px);
    min-height: 620px;
    background: var(--bg-surface);
    border: 1px solid var(--border-color);
    border-radius: 12px;
    overflow: hidden;
    position: relative;
  }
  
  /* Sidebar Folder Column */
  .mail-sidebar {
    width: 230px;
    min-width: 230px;
    background: rgba(7, 11, 25, 0.65);
    border-right: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
    padding: 16px 12px;
  }
  
  .btn-compose {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    width: 100%;
    padding: 11px 16px;
    background: linear-gradient(135deg, #0050e7 0%, #1d68ff 100%);
    color: #ffffff;
    font-weight: 700;
    font-size: 0.88rem;
    border-radius: 8px;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 14px var(--primary-glow);
    transition: all 0.2s;
    margin-bottom: 20px;
    text-decoration: none;
  }
  .btn-compose:hover {
    background: linear-gradient(135deg, #1d68ff 0%, #3b82f6 100%);
    transform: translateY(-1px);
    color: #ffffff;
  }
  
  .folder-nav {
    display: flex;
    flex-direction: column;
    gap: 4px;
    flex: 1;
  }
  .folder-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 12px;
    border-radius: 8px;
    color: var(--text-muted);
    font-size: 0.84rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.15s;
  }
  .folder-link:hover {
    background: rgba(255, 255, 255, 0.05);
    color: #ffffff;
  }
  .folder-link.active {
    background: rgba(0, 80, 231, 0.18);
    color: var(--accent);
    font-weight: 600;
    border-left: 3px solid var(--primary);
  }
  .folder-link-content {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .folder-link svg {
    width: 16px;
    height: 16px;
  }
  .folder-badge {
    font-size: 0.7rem;
    padding: 2px 7px;
    border-radius: 10px;
    background: rgba(255, 255, 255, 0.08);
    color: var(--text-muted);
    font-weight: 600;
  }
  .folder-link.active .folder-badge {
    background: var(--primary);
    color: #ffffff;
  }
  
  .mail-account-box {
    padding: 12px;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    font-size: 0.75rem;
    color: var(--text-muted);
    margin-top: auto;
  }
  .mail-account-title {
    font-weight: 700;
    color: var(--text);
    margin-bottom: 4px;
    display: flex;
    align-items: center;
    gap: 6px;
  }
  
  /* Mail List Column */
  .mail-list-pane {
    width: 360px;
    min-width: 340px;
    border-right: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
    background: rgba(9, 14, 35, 0.4);
  }
  
  .mail-list-header {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  
  .mail-search-box {
    position: relative;
  }
  .mail-search-box input {
    width: 100%;
    background: rgba(7, 11, 25, 0.8);
    border: 1px solid var(--border-color);
    border-radius: 8px;
    padding: 8px 12px 8px 34px;
    color: var(--text);
    font-size: 0.82rem;
  }
  .mail-search-box svg {
    position: absolute;
    left: 10px;
    top: 50%;
    transform: translateY(-50%);
    width: 15px;
    height: 15px;
    color: var(--text-dim);
  }
  
  .mail-list-items {
    flex: 1;
    overflow-y: auto;
  }
  .mail-list-items::-webkit-scrollbar { width: 5px; }
  .mail-list-items::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
  
  .mail-card {
    padding: 14px 16px;
    border-bottom: 1px solid var(--border-color);
    cursor: pointer;
    transition: all 0.15s;
    text-decoration: none;
    display: block;
    color: inherit;
    position: relative;
  }
  .mail-card:hover {
    background: rgba(255, 255, 255, 0.04);
  }
  .mail-card.selected {
    background: rgba(0, 80, 231, 0.12);
    border-left: 3px solid var(--accent);
  }
  .mail-card.unread {
    background: rgba(96, 165, 250, 0.05);
  }
  .mail-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 5px;
  }
  .mail-sender-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
    min-width: 0;
  }
  .mail-avatar {
    width: 26px;
    height: 26px;
    border-radius: 50%;
    background: linear-gradient(135deg, #1e293b, #334155);
    color: #93c5fd;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.72rem;
    font-weight: 700;
    flex-shrink: 0;
  }
  .mail-sender-name {
    font-size: 0.84rem;
    font-weight: 600;
    color: var(--text);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .mail-card.unread .mail-sender-name {
    font-weight: 800;
    color: #ffffff;
  }
  .mail-card-date {
    font-size: 0.72rem;
    color: var(--text-dim);
    flex-shrink: 0;
  }
  .mail-card-subject {
    font-size: 0.8rem;
    color: #cbd5e1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin-bottom: 4px;
  }
  .mail-card.unread .mail-card-subject {
    font-weight: 700;
    color: var(--accent);
  }
  .mail-card-snippet {
    font-size: 0.75rem;
    color: var(--text-muted);
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  
  /* Reading & Reply Pane */
  .mail-read-pane {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    background: rgba(7, 11, 25, 0.4);
  }
  .mail-read-pane::-webkit-scrollbar { width: 6px; }
  .mail-read-pane::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 10px; }
  
  .mail-read-toolbar {
    padding: 12px 24px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: rgba(9, 14, 35, 0.7);
  }
  
  .thread-list {
    padding: 24px;
    display: flex;
    flex-direction: column;
    gap: 18px;
    flex: 1;
  }
  
  .thread-card {
    background: rgba(15, 23, 42, 0.6);
    border: 1px solid var(--border-color);
    border-radius: 10px;
    overflow: hidden;
  }
  .thread-card.sent-by-us {
    border-color: rgba(0, 80, 231, 0.35);
    background: rgba(0, 80, 231, 0.05);
  }
  
  .thread-card-header {
    padding: 14px 20px;
    background: rgba(255, 255, 255, 0.02);
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .thread-sender-info {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .thread-avatar {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: linear-gradient(135deg, #0050e7, #60a5fa);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    font-weight: 700;
  }
  .thread-sender-name {
    font-size: 0.9rem;
    font-weight: 700;
    color: var(--text);
  }
  .thread-sender-meta {
    font-size: 0.76rem;
    color: var(--text-muted);
  }
  .thread-card-body {
    padding: 20px;
    font-size: 0.88rem;
    line-height: 1.7;
    color: #e2e8f0;
    white-space: pre-wrap;
    word-break: break-word;
  }
  
  /* Reply Composer Box */
  .reply-box {
    margin: 0 24px 24px 24px;
    background: rgba(15, 23, 42, 0.9);
    border: 1px solid var(--accent);
    border-radius: 10px;
    overflow: hidden;
  }
  .reply-box-header {
    padding: 12px 18px;
    background: rgba(96, 165, 250, 0.1);
    border-bottom: 1px solid rgba(96, 165, 250, 0.2);
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.82rem;
    font-weight: 600;
    color: var(--accent);
  }
  .reply-box textarea {
    width: 100%;
    background: transparent;
    border: none;
    padding: 16px;
    color: #ffffff;
    font-family: inherit;
    font-size: 0.88rem;
    line-height: 1.6;
    resize: vertical;
    min-height: 120px;
    outline: none;
  }
  .reply-box-footer {
    padding: 10px 16px;
    background: rgba(7, 11, 25, 0.6);
    border-top: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  /* Empty State */
  .mail-empty-state {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: var(--text-dim);
    padding: 40px;
    text-align: center;
  }
  .mail-empty-state svg {
    width: 64px;
    height: 64px;
    margin-bottom: 16px;
    color: rgba(255, 255, 255, 0.1);
  }

  /* Compose Modal */
  .compose-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(4px);
    z-index: 999;
    align-items: center;
    justify-content: center;
  }
  .compose-modal.open {
    display: flex;
  }
  .compose-modal-card {
    width: 680px;
    max-width: 95vw;
    background: #090E23;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.5);
    overflow: hidden;
  }
  .compose-modal-header {
    padding: 14px 20px;
    background: rgba(15, 23, 42, 0.8);
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-weight: 700;
  }
</style>

<div class="webmail-container">

  <!-- 1. LEFT SIDEBAR (FOLDERS & COMPOSE) -->
  <aside class="mail-sidebar">
    <button type="button" class="btn-compose" onclick="openComposeModal()">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 16px; height: 16px; stroke-width: 2.5;"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
      Compose Email
    </button>

    <nav class="folder-nav">
      <a href="{{ route('admin.mail.index', ['folder' => 'inbox']) }}" class="folder-link {{ $folder === 'inbox' ? 'active' : '' }}">
        <span class="folder-link-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <span>Inbox</span>
        </span>
        @if($counts['inbox_unread'] > 0)
          <span class="folder-badge" style="background: var(--primary); color: #fff;">{{ $counts['inbox_unread'] }}</span>
        @else
          <span class="folder-badge">{{ $counts['inbox_total'] }}</span>
        @endif
      </a>

      <a href="{{ route('admin.mail.index', ['folder' => 'sent']) }}" class="folder-link {{ $folder === 'sent' ? 'active' : '' }}">
        <span class="folder-link-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
          <span>Sent Mail</span>
        </span>
        <span class="folder-badge">{{ $counts['sent_total'] }}</span>
      </a>

      <a href="{{ route('admin.mail.index', ['folder' => 'starred']) }}" class="folder-link {{ $folder === 'starred' ? 'active' : '' }}">
        <span class="folder-link-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <span>Starred</span>
        </span>
        <span class="folder-badge">{{ $counts['starred_total'] }}</span>
      </a>

      <a href="{{ route('admin.mail.index', ['folder' => 'trash']) }}" class="folder-link {{ $folder === 'trash' ? 'active' : '' }}">
        <span class="folder-link-content">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
          <span>Trash</span>
        </span>
        <span class="folder-badge">{{ $counts['trash_total'] }}</span>
      </a>
    </nav>

    <!-- Synchronize Inquiries / IMAP Action -->
    <form action="{{ route('admin.mail.sync') }}" method="POST" style="margin-top: 14px;">
      @csrf
      <button type="submit" class="btn btn-secondary" style="width: 100%; font-size: 0.78rem; padding: 7px 12px; justify-content: center;" title="Fetch latest website inquiries and check IMAP">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 14px; height: 14px;"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
        Sync Inbox Leads
      </button>
    </form>

    <div class="mail-account-box">
      <div class="mail-account-title">
        <span style="display: inline-block; width: 7px; height: 7px; border-radius: 50%; background: var(--success);"></span>
        Active SMTP Mailbox
      </div>
      <div style="word-break: break-all; color: var(--accent);">
        {{ config('mail.from.address', 'info@bluebasetechnologies.com') }}
      </div>
      <div style="margin-top: 4px; font-size: 0.7rem; color: var(--text-dim);">
        Host: {{ config('mail.mailers.smtp.host', 'smtp.gmail.com') }}
      </div>
    </div>
  </aside>

  <!-- 2. MIDDLE LIST PANE (MESSAGES OVERVIEW) -->
  <section class="mail-list-pane">
    <div class="mail-list-header">
      <form action="{{ route('admin.mail.index') }}" method="GET" class="mail-search-box">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" name="search" value="{{ $search }}" placeholder="Search sender, subject, or text...">
      </form>
      <div style="display: flex; align-items: center; justify-content: space-between; font-size: 0.76rem; color: var(--text-muted);">
        <span style="text-transform: uppercase; font-weight: 700; letter-spacing: 0.05em; color: var(--text);">
          {{ strtoupper($folder) }} ({{ $messages->total() }})
        </span>
        @if(!empty($search))
          <a href="{{ route('admin.mail.index', ['folder' => $folder]) }}" style="color: var(--accent); text-decoration: none;">Clear Search</a>
        @endif
      </div>
    </div>

    <div class="mail-list-items">
      @forelse($messages as $msg)
        @php
          $isSelected = $selectedMessage && $selectedMessage->id === $msg->id;
          $displayName = ($folder === 'sent') ? 'To: ' . ($msg->recipient_name ?: $msg->recipient_email) : ($msg->sender_name ?: $msg->sender_email);
          $initial = strtoupper(substr($displayName, 0, 1));
        @endphp
        <a href="{{ route('admin.mail.index', ['folder' => $folder, 'selected_id' => $msg->id, 'search' => $search]) }}"
           class="mail-card {{ $isSelected ? 'selected' : '' }} {{ !$msg->is_read && $msg->folder === 'inbox' ? 'unread' : '' }}">
          <div class="mail-card-header">
            <div class="mail-sender-wrap">
              <div class="mail-avatar">{{ $initial }}</div>
              <div class="mail-sender-name">{{ $displayName }}</div>
            </div>
            <div class="mail-card-date">{{ $msg->created_at ? $msg->created_at->diffForHumans(null, true, true) : '' }}</div>
          </div>
          <div class="mail-card-subject">{{ $msg->subject }}</div>
          <div class="mail-card-snippet">{{ Str::limit(strip_tags($msg->body), 65) }}</div>
        </a>
      @empty
        <div style="padding: 40px 20px; text-align: center; color: var(--text-dim); font-size: 0.85rem;">
          No emails found in {{ ucfirst($folder) }}.
        </div>
      @endforelse
    </div>

    @if($messages->hasPages())
      <div style="padding: 8px 16px; border-top: 1px solid var(--border-color); background: rgba(7, 11, 25, 0.4);">
        {{ $messages->links() }}
      </div>
    @endif
  </section>

  <!-- 3. RIGHT PANE (READING & CONVERSATION THREAD) -->
  <main class="mail-read-pane">
    @if($selectedMessage)
      <div class="mail-read-toolbar">
        <div style="display: flex; align-items: center; gap: 10px;">
          <span style="font-size: 0.75rem; padding: 3px 8px; border-radius: 4px; background: rgba(0, 80, 231, 0.2); color: var(--accent); font-weight: 700; text-transform: uppercase;">
            {{ $selectedMessage->inquiry_type ? ucfirst($selectedMessage->inquiry_type) : 'Direct Email' }}
          </span>
          <span style="font-size: 0.78rem; color: var(--text-muted);">
            Reference #{{ $selectedMessage->id }}
          </span>
        </div>

        <div style="display: flex; align-items: center; gap: 8px;">
          <!-- Star Toggle -->
          <form action="{{ route('admin.mail.star', $selectedMessage->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-secondary" style="padding: 6px 10px;" title="Toggle Star">
              <svg viewBox="0 0 24 24" fill="{{ $selectedMessage->is_starred ? '#F59E0B' : 'none' }}" stroke="{{ $selectedMessage->is_starred ? '#F59E0B' : 'currentColor' }}" style="width: 15px; height: 15px;"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </button>
          </form>

          <!-- Toggle Read -->
          <form action="{{ route('admin.mail.read', $selectedMessage->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-secondary" style="padding: 6px 10px;" title="Mark as {{ $selectedMessage->is_read ? 'Unread' : 'Read' }}">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 15px; height: 15px;"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </button>
          </form>

          @if($selectedMessage->folder === 'trash')
            <form action="{{ route('admin.mail.restore', $selectedMessage->id) }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="btn btn-secondary" style="padding: 6px 10px;" title="Restore to Inbox">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 15px; height: 15px;"><polyline points="9 14 4 9 9 4"/><path d="M20 20v-7a4 4 0 0 0-4-4H4"/></svg>
                Restore
              </button>
            </form>
            <form action="{{ route('admin.mail.destroy', $selectedMessage->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Permanently delete this email?');">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" style="padding: 6px 10px;" title="Delete Forever">
                Delete
              </button>
            </form>
          @else
            <form action="{{ route('admin.mail.trash', $selectedMessage->id) }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="btn btn-secondary" style="padding: 6px 10px; color: var(--danger);" title="Move to Trash">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 15px; height: 15px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
              </button>
            </form>
          @endif
        </div>
      </div>

      <!-- Subject Header -->
      <div style="padding: 20px 24px 0 24px;">
        <h2 style="font-size: 1.25rem; font-weight: 800; color: #ffffff; margin: 0 0 6px 0;">
          {{ $selectedMessage->subject }}
        </h2>
      </div>

      <!-- Thread Messages -->
      <div class="thread-list">
        @foreach($thread as $tMsg)
          @php
            $isSentByUs = ($tMsg->folder === 'sent' || $tMsg->sender_email === config('mail.from.address'));
          @endphp
          <article class="thread-card {{ $isSentByUs ? 'sent-by-us' : '' }}">
            <div class="thread-card-header">
              <div class="thread-sender-info">
                <div class="thread-avatar" style="{{ $isSentByUs ? 'background: linear-gradient(135deg, #10B981, #059669);' : '' }}">
                  {{ strtoupper(substr($tMsg->sender_name ?: $tMsg->sender_email, 0, 1)) }}
                </div>
                <div>
                  <div class="thread-sender-name">
                    {{ $tMsg->sender_name ?: $tMsg->sender_email }}
                    @if($isSentByUs)
                      <span style="font-size: 0.7rem; padding: 1px 6px; border-radius: 4px; background: rgba(16, 185, 129, 0.2); color: var(--success); font-weight: 600; margin-left: 6px;">
                        Bluebase Outbound (SMTP)
                      </span>
                    @endif
                  </div>
                  <div class="thread-sender-meta">
                    From: &lt;{{ $tMsg->sender_email }}&gt; &bull; To: &lt;{{ $tMsg->recipient_email }}&gt;
                  </div>
                </div>
              </div>
              <div style="font-size: 0.75rem; color: var(--text-dim); text-align: right;">
                {{ $tMsg->created_at ? $tMsg->created_at->format('M d, Y &bull; h:i A') : '' }}
              </div>
            </div>
            <div class="thread-card-body">{!! nl2br(e($tMsg->body)) !!}</div>
          </article>
        @endforeach
      </div>

      <!-- Quick Reply Box -->
      @php
        $replyToEmail = ($selectedMessage->folder === 'sent') ? $selectedMessage->recipient_email : $selectedMessage->sender_email;
        $replyToName = ($selectedMessage->folder === 'sent') ? $selectedMessage->recipient_name : $selectedMessage->sender_name;
        $replySubject = str_starts_with(strtolower($selectedMessage->subject), 're:') ? $selectedMessage->subject : 'Re: ' . $selectedMessage->subject;
      @endphp
      <div class="reply-box">
        <form action="{{ route('admin.mail.send') }}" method="POST">
          @csrf
          <input type="hidden" name="parent_id" value="{{ $selectedMessage->parent_id ?: $selectedMessage->id }}">
          <input type="hidden" name="inquiry_id" value="{{ $selectedMessage->inquiry_id }}">
          <input type="hidden" name="inquiry_type" value="{{ $selectedMessage->inquiry_type }}">
          <input type="hidden" name="recipient_email" value="{{ $replyToEmail }}">
          <input type="hidden" name="recipient_name" value="{{ $replyToName }}">
          <input type="hidden" name="subject" value="{{ $replySubject }}">

          <div class="reply-box-header">
            <span>Replying directly to &lt;{{ $replyToEmail }}&gt;</span>
            <div style="display: flex; gap: 8px;">
              <select onchange="insertReplyTemplate(this)" style="background: rgba(7, 11, 25, 0.8); border: 1px solid var(--border-color); color: var(--text); font-size: 0.75rem; padding: 2px 8px; border-radius: 4px;">
                <option value="">Insert Quick Response...</option>
                <option value="Thank you for reaching out to Bluebase Technologies. We have reviewed your inquiry and would love to schedule a 20-minute technical architecture discovery session. Please let us know your availability.">Schedule Technical Call</option>
                <option value="Thank you for your interest in Bluebase Technologies. Our engineering team has prepared the initial project scope and architecture estimate. Please find our response and timeline below.">Scope & Estimate Proposal</option>
                <option value="We have provisioned your sandbox environment. You can access the dedicated demo instance and explore our autonomous services.">Demo Provisioning Ready</option>
              </select>
            </div>
          </div>

          <textarea name="body" id="quickReplyBody" placeholder="Type your response to {{ $replyToName ?: $replyToEmail }} here... Dispatched instantly via your configured SMTP." required></textarea>

          <div class="reply-box-footer">
            <span style="font-size: 0.72rem; color: var(--text-dim);">
              Outbound Sender: {{ config('mail.from.address', 'info@bluebasetechnologies.com') }}
            </span>
            <button type="submit" class="btn btn-primary" style="padding: 8px 20px; font-weight: 700;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 14px; height: 14px;"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
              Send Reply via SMTP
            </button>
          </div>
        </form>
      </div>

    @else
      <div class="mail-empty-state">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        <h3 style="font-size: 1.1rem; color: var(--text); font-weight: 700; margin-bottom: 6px;">No Conversation Selected</h3>
        <p style="font-size: 0.85rem; max-width: 320px; line-height: 1.5;">
          Select an inquiry or email from the list to view its complete thread, or click <strong>Compose Email</strong> to dispatch a new message via SMTP.
        </p>
      </div>
    @endif
  </main>

</div>

<!-- 4. COMPOSE NEW EMAIL MODAL DIALOG -->
<div class="compose-modal" id="composeModal">
  <div class="compose-modal-card">
    <div class="compose-modal-header">
      <div style="display: flex; align-items: center; gap: 8px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 18px; height: 18px; color: var(--accent);"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
        <span>Compose New Outbound Email</span>
      </div>
      <button type="button" onclick="closeComposeModal()" style="background: none; border: none; color: var(--text-dim); cursor: pointer; padding: 4px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 18px; height: 18px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    <form action="{{ route('admin.mail.send') }}" method="POST" style="padding: 20px;">
      @csrf
      <input type="hidden" name="inquiry_type" value="direct">

      <div class="form-group" style="margin-bottom: 14px;">
        <label class="form-label">To (Recipient Email Address) *</label>
        <input type="email" name="recipient_email" required class="form-control" placeholder="client@example.com">
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px;">
        <div class="form-group">
          <label class="form-label">Recipient Full Name (Optional)</label>
          <input type="text" name="recipient_name" class="form-control" placeholder="e.g. Sarah Jenkins">
        </div>

        <div class="form-group">
          <label class="form-label">CC (Optional, comma-separated)</label>
          <input type="text" name="cc" class="form-control" placeholder="lead@company.com">
        </div>
      </div>

      <div class="form-group" style="margin-bottom: 14px;">
        <label class="form-label">Subject *</label>
        <input type="text" name="subject" required class="form-control" placeholder="e.g. Bluebase Technologies — Software Architecture Proposal">
      </div>

      <div class="form-group" style="margin-bottom: 20px;">
        <label class="form-label">Email Message Body *</label>
        <textarea name="body" rows="9" required class="form-control" placeholder="Write your email here... It will be formatted with corporate Bluebase branding and delivered via your configured SMTP server."></textarea>
      </div>

      <div style="display: flex; align-items: center; justify-content: space-between; border-top: 1px solid var(--border-color); padding-top: 16px;">
        <div style="font-size: 0.75rem; color: var(--text-dim);">
          Sender: {{ config('mail.from.name', 'Bluebase') }} &lt;{{ config('mail.from.address', 'info@bluebasetechnologies.com') }}&gt;
        </div>
        <div style="display: flex; gap: 10px;">
          <button type="button" class="btn btn-secondary" onclick="closeComposeModal()">Cancel</button>
          <button type="submit" class="btn btn-primary" style="padding: 10px 24px; font-weight: 700;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" style="width: 14px; height: 14px;"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
            Send Email via SMTP
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  function openComposeModal() {
    const modal = document.getElementById('composeModal');
    if (modal) modal.classList.add('open');
  }

  function closeComposeModal() {
    const modal = document.getElementById('composeModal');
    if (modal) modal.classList.remove('open');
  }

  function insertReplyTemplate(select) {
    const val = select.value;
    if (!val) return;
    const textarea = document.getElementById('quickReplyBody');
    if (textarea) {
      if (textarea.value.trim().length > 0) {
        textarea.value += "\n\n" + val;
      } else {
        textarea.value = val;
      }
      textarea.focus();
    }
    select.value = '';
  }

  // Close modal on escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeComposeModal();
  });
</script>
@endsection
