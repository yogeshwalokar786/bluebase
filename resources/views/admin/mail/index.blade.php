@extends('admin.layout')

@section('title', 'Gmail Webmail & Communications')
@section('page_title', 'Communications & Client Webmail')

@section('content')
<style>
  /* =========================================================
     GMAIL-EXACT UI STYLING & ENTERPRISE COMPONENT DESIGN
     ========================================================= */
  :root {
    --gm-surface: #0b1329;
    --gm-surface-light: #101c3d;
    --gm-border: rgba(255, 255, 255, 0.08);
    --gm-hover: rgba(255, 255, 255, 0.04);
    --gm-selected: rgba(0, 80, 231, 0.16);
    --gm-unread-bg: rgba(96, 165, 250, 0.06);
    --gm-primary: #1a73e8;
    --gm-primary-hover: #1765cc;
    --gm-star: #f4b400;
  }

  .gmail-wrapper {
    display: flex;
    height: calc(100vh - 120px);
    min-height: 650px;
    background: #070B19;
    border: 1px solid var(--gm-border);
    border-radius: 14px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.35);
  }

  /* ---------------- Left Sidebar ---------------- */
  .gmail-sidebar {
    width: 240px;
    min-width: 240px;
    background: #090E23;
    border-right: 1px solid var(--gm-border);
    display: flex;
    flex-direction: column;
    padding: 16px 10px;
  }

  /* Iconic Gmail Pill Compose Button */
  .gmail-compose-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 14px 24px;
    background: #ffffff;
    color: #1f2937;
    font-size: 0.92rem;
    font-weight: 700;
    border-radius: 16px;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    margin-bottom: 16px;
    margin-left: 6px;
    margin-right: 6px;
    text-decoration: none;
  }
  .gmail-compose-btn:hover {
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.45);
    background: #f1f5f9;
    transform: translateY(-1px);
    color: #0f172a;
  }
  .compose-plus-icon {
    width: 20px;
    height: 20px;
  }

  /* Nav Links */
  .gmail-nav {
    display: flex;
    flex-direction: column;
    gap: 2px;
    flex: 1;
    overflow-y: auto;
  }
  .gmail-nav-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 16px;
    border-radius: 0 20px 20px 0;
    margin-right: 8px;
    color: #94a3b8;
    font-size: 0.85rem;
    font-weight: 500;
    text-decoration: none;
    transition: all 0.15s ease;
  }
  .gmail-nav-item:hover {
    background: rgba(255, 255, 255, 0.05);
    color: #ffffff;
  }
  .gmail-nav-item.active {
    background: rgba(0, 80, 231, 0.22);
    color: #93c5fd;
    font-weight: 700;
  }
  .gmail-nav-left {
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .gmail-nav-left svg {
    width: 18px;
    height: 18px;
  }
  .gmail-count-badge {
    font-size: 0.72rem;
    font-weight: 700;
    color: #cbd5e1;
  }
  .gmail-nav-item.active .gmail-count-badge {
    color: #ffffff;
  }

  .gmail-sidebar-section-title {
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: #64748b;
    padding: 16px 16px 6px 16px;
  }

  .gmail-label-pill {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 7px 16px;
    font-size: 0.82rem;
    color: #94a3b8;
    text-decoration: none;
    border-radius: 0 16px 16px 0;
  }
  .gmail-label-pill:hover {
    background: rgba(255, 255, 255, 0.04);
    color: #fff;
  }
  .label-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
  }

  /* ---------------- Main Content Body ---------------- */
  .gmail-main {
    flex: 1;
    display: flex;
    flex-direction: column;
    background: #0b1126;
    min-width: 0;
    overflow: hidden;
  }

  /* Top Toolbar */
  .gmail-topbar {
    padding: 10px 18px;
    background: #070B19;
    border-bottom: 1px solid var(--gm-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
  }

  /* Pill Search Box */
  .gmail-search-bar {
    flex: 1;
    max-width: 620px;
    position: relative;
  }
  .gmail-search-bar input {
    width: 100%;
    background: rgba(255, 255, 255, 0.07);
    border: 1px solid transparent;
    border-radius: 24px;
    padding: 10px 16px 10px 44px;
    color: #ffffff;
    font-size: 0.88rem;
    outline: none;
    transition: all 0.2s;
  }
  .gmail-search-bar input:focus {
    background: #0f172a;
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
  }
  .gmail-search-icon {
    position: absolute;
    left: 14px;
    top: 50%;
    transform: translateY(-50%);
    width: 17px;
    height: 17px;
    color: #94a3b8;
  }

  /* Actions Bar */
  .gmail-action-bar {
    padding: 8px 18px;
    background: rgba(11, 17, 38, 0.95);
    border-bottom: 1px solid var(--gm-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .gmail-action-group {
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .gm-icon-btn {
    background: none;
    border: none;
    color: #94a3b8;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s ease;
  }
  .gm-icon-btn:hover {
    background: rgba(255, 255, 255, 0.08);
    color: #ffffff;
  }
  .gm-icon-btn svg {
    width: 17px;
    height: 17px;
  }

  /* ---------------- Mail Table List ---------------- */
  .gmail-list-container {
    flex: 1;
    overflow-y: auto;
    overflow-x: hidden;
  }
  .gmail-list-container::-webkit-scrollbar { width: 6px; }
  .gmail-list-container::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 10px; }

  .gmail-row {
    display: flex;
    align-items: center;
    padding: 9px 18px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    cursor: pointer;
    transition: background 0.1s ease;
    text-decoration: none;
    color: inherit;
    font-size: 0.86rem;
    position: relative;
  }
  .gmail-row:hover {
    background: var(--gm-hover);
    box-shadow: inset 1px 0 0 #dadce0, inset -1px 0 0 #dadce0, 0 1px 2px 0 rgba(0,0,0,0.3);
  }
  .gmail-row.unread {
    background: var(--gm-unread-bg);
  }
  .gmail-row.selected {
    background: var(--gm-selected);
  }

  .gm-col-select {
    display: flex;
    align-items: center;
    gap: 12px;
    width: 60px;
    flex-shrink: 0;
  }
  .gm-star-icon {
    cursor: pointer;
    color: #64748b;
    transition: color 0.15s ease;
  }
  .gm-star-icon:hover {
    color: #f59e0b;
  }
  .gm-star-icon.starred {
    color: var(--gm-star);
  }

  .gm-col-sender {
    width: 190px;
    min-width: 190px;
    font-weight: 500;
    color: #cbd5e1;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .gmail-row.unread .gm-col-sender {
    font-weight: 800;
    color: #ffffff;
  }

  .gm-col-subject {
    flex: 1;
    min-width: 0;
    display: flex;
    align-items: center;
    gap: 8px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }
  .gm-subject-title {
    color: #cbd5e1;
    font-weight: 500;
  }
  .gmail-row.unread .gm-subject-title {
    font-weight: 800;
    color: #ffffff;
  }
  .gm-subject-snippet {
    color: #64748b;
    font-weight: 400;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .gm-col-date {
    width: 90px;
    text-align: right;
    font-size: 0.75rem;
    color: #64748b;
    font-weight: 600;
    flex-shrink: 0;
  }
  .gmail-row.unread .gm-col-date {
    color: #93c5fd;
    font-weight: 700;
  }

  /* Hover Action Quick Controls */
  .gm-hover-actions {
    display: none;
    align-items: center;
    gap: 4px;
    position: absolute;
    right: 18px;
    background: #0d1633;
    padding-left: 12px;
  }
  .gmail-row:hover .gm-hover-actions {
    display: flex;
  }
  .gmail-row:hover .gm-col-date {
    display: none;
  }

  /* ---------------- Single / Thread View ---------------- */
  .gmail-thread-container {
    flex: 1;
    display: flex;
    flex-direction: column;
    overflow-y: auto;
    padding: 20px 32px;
  }
  .gmail-thread-container::-webkit-scrollbar { width: 6px; }
  .gmail-thread-container::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.12); border-radius: 10px; }

  .thread-subject-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 24px;
  }
  .thread-subject-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0;
  }
  .thread-label-badge {
    font-size: 0.7rem;
    padding: 3px 8px;
    background: rgba(96, 165, 250, 0.15);
    color: #93c5fd;
    border-radius: 4px;
    font-weight: 700;
    text-transform: uppercase;
  }

  .gmail-message-card {
    background: rgba(15, 23, 42, 0.65);
    border: 1px solid var(--gm-border);
    border-radius: 10px;
    margin-bottom: 20px;
    overflow: hidden;
  }
  .gmail-message-card.sent-by-us {
    background: rgba(0, 80, 231, 0.06);
    border-color: rgba(0, 80, 231, 0.3);
  }
  .gmail-msg-header {
    padding: 16px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    border-bottom: 1px solid rgba(255, 255, 255, 0.05);
  }
  .gmail-msg-sender {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .gmail-avatar-circle {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 0.92rem;
  }
  .gmail-avatar-circle.sent {
    background: linear-gradient(135deg, #10b981, #059669);
  }
  .gmail-sender-name {
    font-size: 0.92rem;
    font-weight: 700;
    color: #ffffff;
  }
  .gmail-sender-meta {
    font-size: 0.75rem;
    color: #94a3b8;
  }
  .gmail-msg-body {
    padding: 24px 20px;
    font-size: 0.9rem;
    line-height: 1.7;
    color: #e2e8f0;
    white-space: pre-wrap;
    word-break: break-word;
  }

  /* Gmail Attachment Chips */
  .attachment-tray {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    padding: 0 20px 20px 20px;
  }
  .attachment-chip {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 8px 14px;
    background: rgba(255, 255, 255, 0.06);
    border: 1px solid var(--gm-border);
    border-radius: 8px;
    color: #93c5fd;
    text-decoration: none;
    font-size: 0.8rem;
    font-weight: 500;
    transition: background 0.15s;
  }
  .attachment-chip:hover {
    background: rgba(255, 255, 255, 0.12);
    color: #ffffff;
  }

  /* Gmail Bottom In-Line Reply Box */
  .gmail-inline-reply {
    background: #090e23;
    border: 1px solid #3b82f6;
    border-radius: 12px;
    overflow: hidden;
    margin-top: 10px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.3);
  }
  .gmail-reply-header {
    padding: 12px 18px;
    background: rgba(59, 130, 246, 0.1);
    border-bottom: 1px solid rgba(59, 130, 246, 0.2);
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 0.82rem;
    color: #93c5fd;
  }
  .gmail-reply-textarea {
    width: 100%;
    min-height: 130px;
    background: transparent;
    border: none;
    padding: 16px 18px;
    color: #ffffff;
    font-family: inherit;
    font-size: 0.9rem;
    line-height: 1.6;
    outline: none;
    resize: vertical;
  }
  .gmail-reply-toolbar {
    padding: 10px 18px;
    background: #070b19;
    border-top: 1px solid var(--gm-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  /* ---------------- DOCKED GMAIL FLOATING COMPOSE WINDOW ---------------- */
  .gmail-compose-window {
    display: none;
    position: fixed;
    bottom: 0;
    right: 28px;
    width: 600px;
    max-width: calc(100vw - 40px);
    background: #0c142c;
    border-radius: 12px 12px 0 0;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.65);
    border: 1px solid var(--gm-border);
    border-bottom: none;
    z-index: 1000;
    flex-direction: column;
    overflow: hidden;
  }
  .gmail-compose-window.open {
    display: flex;
  }
  .gmail-compose-window.minimized {
    height: 44px;
    overflow: hidden;
  }
  .gmail-compose-header {
    padding: 11px 16px;
    background: #090e23;
    border-bottom: 1px solid var(--gm-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #ffffff;
    font-weight: 700;
    font-size: 0.88rem;
    cursor: pointer;
  }
  .compose-controls {
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .compose-ctrl-btn {
    background: none;
    border: none;
    color: #94a3b8;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
  }
  .compose-ctrl-btn:hover {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
  }
  .compose-field {
    display: flex;
    align-items: center;
    padding: 9px 16px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.06);
  }
  .compose-field-label {
    width: 50px;
    font-size: 0.82rem;
    color: #64748b;
  }
  .compose-field input {
    flex: 1;
    background: transparent;
    border: none;
    color: #ffffff;
    font-size: 0.86rem;
    outline: none;
  }
  .compose-textarea {
    flex: 1;
    min-height: 220px;
    background: transparent;
    border: none;
    padding: 16px;
    color: #ffffff;
    font-family: inherit;
    font-size: 0.9rem;
    line-height: 1.6;
    outline: none;
    resize: none;
  }
  .compose-bottom-bar {
    padding: 10px 16px;
    background: #090e23;
    border-top: 1px solid var(--gm-border);
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  /* Signature Toggle Badge */
  .sig-badge-toggle {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 0.75rem;
    padding: 4px 10px;
    border-radius: 20px;
    background: rgba(16, 185, 129, 0.15);
    color: #34d399;
    border: 1px solid rgba(16, 185, 129, 0.3);
    cursor: pointer;
  }

  /* ---------------- Signature Settings Modal ---------------- */
  .sig-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(4px);
    z-index: 1100;
    align-items: center;
    justify-content: center;
  }
  .sig-modal.open {
    display: flex;
  }
  .sig-modal-card {
    width: 580px;
    max-width: 95vw;
    background: #090E23;
    border: 1px solid var(--gm-border);
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.6);
  }
</style>

<div class="gmail-wrapper">

  <!-- ================= 1. GMAIL LEFT SIDEBAR ================= -->
  <aside class="gmail-sidebar">
    <!-- Iconic Gmail Pill Compose Button -->
    <button type="button" class="gmail-compose-btn" onclick="openGmailCompose()">
      <svg class="compose-plus-icon" viewBox="0 0 24 24" fill="none">
        <path d="M12 5V19M5 12H19" stroke="#EA4335" stroke-width="3" stroke-linecap="round"/>
      </svg>
      <span>Compose</span>
    </button>

    <nav class="gmail-nav">
      <!-- Inbox -->
      <a href="{{ route('admin.mail.index', ['folder' => 'inbox']) }}" class="gmail-nav-item {{ $folder === 'inbox' ? 'active' : '' }}">
        <span class="gmail-nav-left">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          <span>Inbox</span>
        </span>
        @if($counts['inbox_unread'] > 0)
          <span class="gmail-count-badge" style="color: #60a5fa;">{{ $counts['inbox_unread'] }}</span>
        @else
          <span class="gmail-count-badge">{{ $counts['inbox_total'] }}</span>
        @endif
      </a>

      <!-- Starred -->
      <a href="{{ route('admin.mail.index', ['folder' => 'starred']) }}" class="gmail-nav-item {{ $folder === 'starred' ? 'active' : '' }}">
        <span class="gmail-nav-left">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          <span>Starred</span>
        </span>
        <span class="gmail-count-badge">{{ $counts['starred_total'] }}</span>
      </a>

      <!-- Sent -->
      <a href="{{ route('admin.mail.index', ['folder' => 'sent']) }}" class="gmail-nav-item {{ $folder === 'sent' ? 'active' : '' }}">
        <span class="gmail-nav-left">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
          <span>Sent</span>
        </span>
        <span class="gmail-count-badge">{{ $counts['sent_total'] }}</span>
      </a>

      <!-- Trash -->
      <a href="{{ route('admin.mail.index', ['folder' => 'trash']) }}" class="gmail-nav-item {{ $folder === 'trash' ? 'active' : '' }}">
        <span class="gmail-nav-left">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
          <span>Trash</span>
        </span>
        <span class="gmail-count-badge">{{ $counts['trash_total'] }}</span>
      </a>

      <!-- Labels -->
      <div class="gmail-sidebar-section-title">Inquiry Categories</div>
      <a href="{{ route('admin.mail.index', ['search' => 'contact']) }}" class="gmail-label-pill">
        <span class="label-dot" style="background: #3b82f6;"></span>
        <span>Contact Leads</span>
      </a>
      <a href="{{ route('admin.mail.index', ['search' => 'demo']) }}" class="gmail-label-pill">
        <span class="label-dot" style="background: #10b981;"></span>
        <span>Demo Bookings</span>
      </a>
      <a href="{{ route('admin.mail.index', ['search' => 'trial']) }}" class="gmail-label-pill">
        <span class="label-dot" style="background: #f59e0b;"></span>
        <span>Architecture Estimates</span>
      </a>
      <a href="{{ route('admin.mail.index', ['search' => 'partner']) }}" class="gmail-label-pill">
        <span class="label-dot" style="background: #8b5cf6;"></span>
        <span>Partner Deals</span>
      </a>
    </nav>

    <!-- Bottom Signature & Account Card -->
    <div style="padding: 12px; background: rgba(255,255,255,0.03); border-radius: 8px; border: 1px solid var(--gm-border); margin-top: auto;">
      <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 6px;">
        <span style="font-size: 0.72rem; color: #94a3b8; font-weight: 700;">CORPORATE SIGNATURE</span>
        <button type="button" onclick="openSignatureModal()" style="background: none; border: none; color: #60a5fa; font-size: 0.72rem; cursor: pointer; text-decoration: underline;">Edit</button>
      </div>
      <div style="font-size: 0.72rem; color: #cbd5e1; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
        {{ config('mail.from.name', 'Bluebase Technologies') }}
      </div>
      <div style="font-size: 0.68rem; color: #64748b; margin-top: 2px;">
        SMTP: {{ config('mail.mailers.smtp.host', 'smtp.gmail.com') }}
      </div>
    </div>
  </aside>

  <!-- ================= 2. MAIN WORKSPACE ================= -->
  <main class="gmail-main">

    <!-- Top Pill Search Header -->
    <div class="gmail-topbar">
      <form action="{{ route('admin.mail.index') }}" method="GET" class="gmail-search-bar">
        <input type="hidden" name="folder" value="{{ $folder }}">
        <svg class="gmail-search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" name="search" value="{{ $search }}" placeholder="Search mail (e.g. client name, subject, keyword)...">
      </form>

      <div style="display: flex; align-items: center; gap: 8px;">
        <!-- Synchronize Inquiries / IMAP Button -->
        <form action="{{ route('admin.mail.sync') }}" method="POST" style="margin: 0;">
          @csrf
          <button type="submit" class="gm-icon-btn" title="Refresh & Sync Inbox">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
          </button>
        </form>

        <!-- Edit Signature Button -->
        <button type="button" class="gm-icon-btn" onclick="openSignatureModal()" title="Manage Email Signature">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
        </button>
      </div>
    </div>

    <!-- Action Toolbar (Select All, Delete, Mark Read, Pagination) -->
    <div class="gmail-action-bar">
      <div class="gmail-action-group">
        @if(!$selectedMessage)
          <input type="checkbox" id="selectAllCheckbox" onchange="toggleSelectAll(this)" style="cursor: pointer; width: 16px; height: 16px; accent-color: #3b82f6;">

          <button type="button" class="gm-icon-btn" onclick="applyBulkAction('trash')" title="Delete selected">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
          </button>
          <button type="button" class="gm-icon-btn" onclick="applyBulkAction('mark_read')" title="Mark as read">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          </button>
          <button type="button" class="gm-icon-btn" onclick="applyBulkAction('mark_unread')" title="Mark as unread">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </button>
          <button type="button" class="gm-icon-btn" onclick="applyBulkAction('star')" title="Star selected">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
          </button>
        @else
          <!-- Back to List button -->
          <a href="{{ route('admin.mail.index', ['folder' => $folder, 'search' => $search]) }}" class="gm-icon-btn" title="Back to {{ ucfirst($folder) }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
          </a>
          <!-- Delete thread -->
          <form action="{{ route('admin.mail.trash', $selectedMessage->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="gm-icon-btn" title="Move to Trash">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
            </button>
          </form>
          <!-- Mark Unread -->
          <form action="{{ route('admin.mail.read', $selectedMessage->id) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="gm-icon-btn" title="Mark as unread">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </button>
          </form>
        @endif
      </div>

      <!-- Pagination Count -->
      <div style="font-size: 0.78rem; color: #94a3b8; display: flex; align-items: center; gap: 12px;">
        <span>{{ $messages->firstItem() ?? 0 }}–{{ $messages->lastItem() ?? 0 }} of {{ $messages->total() }}</span>
        @if($messages->hasPages())
          <div style="display: flex; gap: 4px;">
            @if($messages->onFirstPage())
              <span class="gm-icon-btn" style="opacity: 0.3; cursor: not-allowed;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg></span>
            @else
              <a href="{{ $messages->previousPageUrl() }}" class="gm-icon-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="15 18 9 12 15 6"/></svg></a>
            @endif

            @if($messages->hasMorePages())
              <a href="{{ $messages->nextPageUrl() }}" class="gm-icon-btn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></a>
            @else
              <span class="gm-icon-btn" style="opacity: 0.3; cursor: not-allowed;"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg></span>
            @endif
          </div>
        @endif
      </div>
    </div>

    <!-- Hidden Bulk Action Form -->
    <form id="bulkForm" action="{{ route('admin.mail.bulk') }}" method="POST" style="display: none;">
      @csrf
      <input type="hidden" name="action" id="bulkActionInput">
      <div id="bulkIdsContainer"></div>
    </form>

    <!-- Content: LIST VIEW OR CONVERSATION VIEW -->
    @if(!$selectedMessage)
      <!-- GMAIL TABLE ROWS LIST -->
      <div class="gmail-list-container">
        @forelse($messages as $msg)
          @php
            $isUnread = (!$msg->is_read && $msg->folder === 'inbox');
            $displayName = ($folder === 'sent') ? 'To: ' . ($msg->recipient_name ?: $msg->recipient_email) : ($msg->sender_name ?: $msg->sender_email);
          @endphp
          <div class="gmail-row {{ $isUnread ? 'unread' : '' }}" onclick="openEmailRow(event, '{{ route('admin.mail.index', ['folder' => $folder, 'selected_id' => $msg->id, 'search' => $search]) }}')">
            <div class="gm-col-select" onclick="event.stopPropagation()">
              <input type="checkbox" class="mail-item-checkbox" value="{{ $msg->id }}" style="cursor: pointer; width: 15px; height: 15px; accent-color: #3b82f6;">
              <form action="{{ route('admin.mail.star', $msg->id) }}" method="POST" style="display: inline; margin: 0;">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                  <svg class="gm-star-icon {{ $msg->is_starred ? 'starred' : '' }}" viewBox="0 0 24 24" fill="{{ $msg->is_starred ? '#f4b400' : 'none' }}" stroke="currentColor" stroke-width="2" style="width: 17px; height: 17px;">
                    <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                  </svg>
                </button>
              </form>
            </div>

            <div class="gm-col-sender">{{ $displayName }}</div>

            <div class="gm-col-subject">
              <span class="gm-subject-title">{{ $msg->subject }}</span>
              <span class="gm-subject-snippet">&mdash; {{ Str::limit(strip_tags($msg->body), 85) }}</span>
              @if(!empty($msg->attachments))
                <svg viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="2" style="width: 14px; height: 14px; flex-shrink: 0;"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>
              @endif
            </div>

            <div class="gm-col-date">
              {{ $msg->created_at ? $msg->created_at->format('M d') : '' }}
            </div>

            <!-- Gmail Row Hover Actions -->
            <div class="gm-hover-actions" onclick="event.stopPropagation()">
              <form action="{{ route('admin.mail.trash', $msg->id) }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="gm-icon-btn" title="Delete message">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
                </button>
              </form>
              <form action="{{ route('admin.mail.read', $msg->id) }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="gm-icon-btn" title="Mark as {{ $msg->is_read ? 'unread' : 'read' }}">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </button>
              </form>
            </div>
          </div>
        @empty
          <div style="padding: 80px 20px; text-align: center; color: #64748b;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="width: 56px; height: 56px; margin-bottom: 12px; color: rgba(255,255,255,0.08);"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <div style="font-size: 1rem; color: #cbd5e1; font-weight: 600;">No emails found in {{ ucfirst($folder) }}</div>
            <div style="font-size: 0.8rem; margin-top: 4px;">Click Compose to send a new email via SMTP.</div>
          </div>
        @endforelse
      </div>

    @else
      <!-- GMAIL CONVERSATION THREAD VIEW -->
      <div class="gmail-thread-container">
        <!-- Thread Subject -->
        <div class="thread-subject-header">
          <h1 class="thread-subject-title">{{ $selectedMessage->subject }}</h1>
          <span class="thread-label-badge">{{ $selectedMessage->inquiry_type ? ucfirst($selectedMessage->inquiry_type) : 'Inquiry' }}</span>
        </div>

        <!-- Messages Chain -->
        @foreach($thread as $tMsg)
          @php
            $isSentByUs = ($tMsg->folder === 'sent' || $tMsg->sender_email === config('mail.from.address'));
          @endphp
          <article class="gmail-message-card {{ $isSentByUs ? 'sent-by-us' : '' }}">
            <div class="gmail-msg-header">
              <div class="gmail-msg-sender">
                <div class="gmail-avatar-circle {{ $isSentByUs ? 'sent' : '' }}">
                  {{ strtoupper(substr($tMsg->sender_name ?: $tMsg->sender_email, 0, 1)) }}
                </div>
                <div>
                  <div class="gmail-sender-name">
                    {{ $tMsg->sender_name ?: $tMsg->sender_email }}
                    @if($isSentByUs)
                      <span style="font-size: 0.68rem; padding: 2px 6px; border-radius: 4px; background: rgba(16, 185, 129, 0.2); color: #34d399; font-weight: 700; margin-left: 6px;">
                        SMTP OUTBOUND
                      </span>
                    @endif
                  </div>
                  <div class="gmail-sender-meta">
                    from: &lt;{{ $tMsg->sender_email }}&gt; &bull; to: &lt;{{ $tMsg->recipient_email }}&gt;
                  </div>
                </div>
              </div>

              <div style="font-size: 0.75rem; color: #94a3b8; display: flex; align-items: center; gap: 12px;">
                <span>{{ $tMsg->created_at ? $tMsg->created_at->format('M d, Y, h:i A') : '' }}</span>
              </div>
            </div>

            <div class="gmail-msg-body">{!! nl2br(e($tMsg->body)) !!}</div>

            <!-- Attached Files if present -->
            @if(!empty($tMsg->attachments) && is_array($tMsg->attachments))
              <div class="attachment-tray">
                @foreach($tMsg->attachments as $att)
                  <a href="{{ $att['url'] ?? '#' }}" target="_blank" class="attachment-chip">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 15px; height: 15px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                    <span>{{ $att['name'] ?? 'File Attachment' }}</span>
                  </a>
                @endforeach
              </div>
            @endif
          </article>
        @endforeach

        <!-- In-Line Reply Box -->
        @php
          $replyToEmail = ($selectedMessage->folder === 'sent') ? $selectedMessage->recipient_email : $selectedMessage->sender_email;
          $replyToName = ($selectedMessage->folder === 'sent') ? $selectedMessage->recipient_name : $selectedMessage->sender_name;
          $replySubject = str_starts_with(strtolower($selectedMessage->subject), 're:') ? $selectedMessage->subject : 'Re: ' . $selectedMessage->subject;
        @endphp
        <div class="gmail-inline-reply">
          <form action="{{ route('admin.mail.send') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $selectedMessage->parent_id ?: $selectedMessage->id }}">
            <input type="hidden" name="inquiry_id" value="{{ $selectedMessage->inquiry_id }}">
            <input type="hidden" name="inquiry_type" value="{{ $selectedMessage->inquiry_type }}">
            <input type="hidden" name="recipient_email" value="{{ $replyToEmail }}">
            <input type="hidden" name="recipient_name" value="{{ $replyToName }}">
            <input type="hidden" name="subject" value="{{ $replySubject }}">

            <div class="gmail-reply-header">
              <span>Replying to <strong>{{ $replyToName ?: $replyToEmail }}</strong> &lt;{{ $replyToEmail }}&gt;</span>
              <div style="display: flex; align-items: center; gap: 10px;">
                <label style="display: flex; align-items: center; gap: 5px; font-size: 0.76rem; color: #cbd5e1; cursor: pointer;">
                  <input type="checkbox" name="include_signature" value="1" checked style="accent-color: #3b82f6;">
                  Include Signature
                </label>
              </div>
            </div>

            <textarea name="body" class="gmail-reply-textarea" placeholder="Type your response here... Press Send to dispatch via configured SMTP." required></textarea>

            <div class="gmail-reply-toolbar">
              <div style="display: flex; align-items: center; gap: 10px;">
                <!-- Attach file button -->
                <label style="cursor: pointer; display: inline-flex; align-items: center; gap: 6px; font-size: 0.78rem; color: #94a3b8;" title="Attach files">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 17px; height: 17px;"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>
                  <span>Attach</span>
                  <input type="file" name="attachments[]" multiple style="display: none;" onchange="showAttachedCount(this, 'replyAttachBadge')">
                </label>
                <span id="replyAttachBadge" style="font-size: 0.72rem; color: #60a5fa;"></span>
              </div>

              <button type="submit" class="btn btn-primary" style="padding: 9px 24px; font-weight: 700; border-radius: 20px;">
                Send Reply via SMTP
              </button>
            </div>
          </form>
        </div>
      </div>
    @endif

  </main>
</div>

<!-- ================= 3. GMAIL DOCKED FLOATING COMPOSE WINDOW ================= -->
<div class="gmail-compose-window" id="gmailCompose">
  <div class="gmail-compose-header" onclick="toggleComposeMinimize()">
    <span>New Message</span>
    <div class="compose-controls">
      <button type="button" class="compose-ctrl-btn" onclick="event.stopPropagation(); toggleComposeMinimize()" title="Minimize">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><line x1="5" y1="12" x2="19" y2="12"/></svg>
      </button>
      <button type="button" class="compose-ctrl-btn" onclick="event.stopPropagation(); closeGmailCompose()" title="Close">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
  </div>

  <form action="{{ route('admin.mail.send') }}" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; flex: 1;">
    @csrf
    <input type="hidden" name="inquiry_type" value="direct">

    <div class="compose-field">
      <span class="compose-field-label">To</span>
      <input type="email" name="recipient_email" required placeholder="Recipients">
    </div>

    <div class="compose-field">
      <span class="compose-field-label">Subject</span>
      <input type="text" name="subject" required placeholder="Subject">
    </div>

    <textarea name="body" id="composeBody" class="compose-textarea" placeholder="Write your email here..."></textarea>

    <!-- Attached Files indicator -->
    <div id="composeAttachList" style="padding: 0 16px; font-size: 0.75rem; color: #60a5fa;"></div>

    <div class="compose-bottom-bar">
      <div style="display: flex; align-items: center; gap: 12px;">
        <button type="submit" class="btn btn-primary" style="padding: 8px 22px; font-weight: 700; border-radius: 20px;">
          Send
        </button>

        <!-- Attachments -->
        <label style="cursor: pointer; display: inline-flex; align-items: center; color: #94a3b8;" title="Attach files">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px;"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>
          <input type="file" name="attachments[]" multiple style="display: none;" onchange="showAttachedCount(this, 'composeAttachList')">
        </label>

        <!-- Signature insertion toggle -->
        <label style="display: inline-flex; align-items: center; gap: 5px; font-size: 0.75rem; color: #94a3b8; cursor: pointer;">
          <input type="checkbox" name="include_signature" value="1" checked style="accent-color: #3b82f6;">
          Signature
        </label>
      </div>

      <button type="button" class="compose-ctrl-btn" onclick="closeGmailCompose()" title="Discard draft">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 16px; height: 16px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg>
      </button>
    </div>
  </form>
</div>

<!-- ================= 4. CORPORATE SIGNATURE SETTINGS MODAL ================= -->
<div class="sig-modal" id="signatureModal">
  <div class="sig-modal-card">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; border-bottom: 1px solid var(--gm-border); padding-bottom: 12px;">
      <h3 style="font-size: 1.1rem; color: #ffffff; font-weight: 700; margin: 0;">Manage Outbound Email Signature</h3>
      <button type="button" onclick="closeSignatureModal()" style="background: none; border: none; color: #94a3b8; cursor: pointer; padding: 4px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 18px; height: 18px;"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>

    <form action="{{ route('admin.mail.signature') }}" method="POST">
      @csrf
      <p style="font-size: 0.82rem; color: #94a3b8; margin-bottom: 12px;">
        This signature is automatically appended to outbound emails sent via SMTP from the dashboard.
      </p>

      <textarea name="mail_signature" rows="7" class="form-control" style="font-family: monospace; font-size: 0.85rem;" required>{{ $signature }}</textarea>

      <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 16px;">
        <button type="button" class="btn btn-secondary" onclick="closeSignatureModal()">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Signature</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openGmailCompose() {
    const el = document.getElementById('gmailCompose');
    if (el) {
      el.classList.add('open');
      el.classList.remove('minimized');
    }
  }

  function closeGmailCompose() {
    const el = document.getElementById('gmailCompose');
    if (el) el.classList.remove('open');
  }

  function toggleComposeMinimize() {
    const el = document.getElementById('gmailCompose');
    if (el) el.classList.toggle('minimized');
  }

  function openSignatureModal() {
    const el = document.getElementById('signatureModal');
    if (el) el.classList.add('open');
  }

  function closeSignatureModal() {
    const el = document.getElementById('signatureModal');
    if (el) el.classList.remove('open');
  }

  function openEmailRow(event, url) {
    window.location.href = url;
  }

  function toggleSelectAll(master) {
    const boxes = document.querySelectorAll('.mail-item-checkbox');
    boxes.forEach(b => b.checked = master.checked);
  }

  function applyBulkAction(action) {
    const selected = Array.from(document.querySelectorAll('.mail-item-checkbox:checked')).map(b => b.value);
    if (selected.length === 0) {
      alert('Please select at least one email message.');
      return;
    }

    if (action === 'trash' && !confirm('Move ' + selected.length + ' message(s) to Trash?')) {
      return;
    }

    const form = document.getElementById('bulkForm');
    document.getElementById('bulkActionInput').value = action;
    const container = document.getElementById('bulkIdsContainer');
    container.innerHTML = '';
    selected.forEach(id => {
      const inp = document.createElement('input');
      inp.type = 'hidden';
      inp.name = 'ids[]';
      inp.value = id;
      container.appendChild(inp);
    });
    form.submit();
  }

  function showAttachedCount(input, targetId) {
    const el = document.getElementById(targetId);
    if (!el) return;
    if (input.files && input.files.length > 0) {
      el.textContent = input.files.length + ' file(s) attached';
    } else {
      el.textContent = '';
    }
  }
</script>
@endsection
