@extends('admin.layout')

@section('title', 'Inquiry #' . $inquiry->id)
@section('page_title', 'Inquiry Details #' . $inquiry->id)

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.leads.inquiries') }}" class="btn btn-secondary btn-sm">&larr; Back to Inquiries</a>
</div>

<div class="detail-grid">
  <!-- Left Column: Lead & Message Details -->
  <div style="display: flex; flex-direction: column; gap: 24px;">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <svg style="width: 20px; height: 20px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
          Prospect Information
        </div>
        <span class="badge badge-{{ $inquiry->status }}">{{ $inquiry->status }}</span>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div class="info-item">
          <div class="info-label">Full Name</div>
          <div class="info-value">{{ $inquiry->name }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Company</div>
          <div class="info-value">{{ $inquiry->company ?? '—' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Email Address</div>
          <div class="info-value">
            <a href="mailto:{{ $inquiry->email }}" style="color: var(--accent); text-decoration: none;">{{ $inquiry->email }}</a>
          </div>
        </div>
        <div class="info-item">
          <div class="info-label">Phone Number</div>
          <div class="info-value">
            @if($inquiry->phone)
              <a href="tel:{{ $inquiry->phone }}" style="color: var(--accent); text-decoration: none;">{{ $inquiry->phone }}</a>
            @else
              <span style="color: var(--text-dim);">Not provided</span>
            @endif
          </div>
        </div>
        <div class="info-item">
          <div class="info-label">Service Area of Interest</div>
          <div class="info-value">{{ $inquiry->service ?? 'General Inquiry' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Submitted On</div>
          <div class="info-value">{{ $inquiry->created_at->format('F d, Y 	 H:i:s') }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">IP Address</div>
          <div class="info-value" style="font-family: monospace; color: var(--text-muted);">{{ $inquiry->ip_address ?? '127.0.0.1' }}</div>
        </div>
      </div>
    </div>

    <!-- Message Content -->
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          Inquiry Message &amp; Scope
        </div>
      </div>
      <div class="message-box">{{ $inquiry->message }}</div>
    </div>
  </div>

  <!-- Right Column: Status Update & Admin Notes -->
  <div style="display: flex; flex-direction: column; gap: 24px;">
    <div class="card">
      <div class="card-title" style="margin-bottom: 16px;">Update Lead Status</div>
      <form action="{{ route('admin.leads.inquiries.update', $inquiry->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="form-label">Workflow Status</label>
          <select name="status" class="form-select">
            <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New (Unread)</option>
            <option value="reviewed" {{ $inquiry->status === 'reviewed' ? 'selected' : '' }}>Reviewed (Under Evaluation)</option>
            <option value="contacted" {{ $inquiry->status === 'contacted' ? 'selected' : '' }}>Contacted (Outreach Sent)</option>
            <option value="qualified" {{ $inquiry->status === 'qualified' ? 'selected' : '' }}>Qualified (Sales Pipeline)</option>
            <option value="closed" {{ $inquiry->status === 'closed' ? 'selected' : '' }}>Closed / Won</option>
            <option value="spam" {{ $inquiry->status === 'spam' ? 'selected' : '' }}>Spam / Disqualified</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Internal Admin Notes</label>
          <textarea name="admin_notes" class="form-control" rows="5" placeholder="Add confidential notes on conversations, next steps, or deal size...">{{ $inquiry->admin_notes }}</textarea>
          <div class="form-hint">Visible only to Bluebase administrators.</div>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">Save Updates</button>
      </form>
    </div>

    <!-- Quick Communication Action -->
    <div class="card">
      <div class="card-title" style="margin-bottom: 12px;">Quick Action</div>
      <a href="mailto:{{ $inquiry->email }}?subject=Bluebase%20Follow-up:%20{{ urlencode($inquiry->service ?? 'Inquiry') }}" class="btn btn-secondary" style="width: 100%; justify-content: center; margin-bottom: 10px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        Reply via Email
      </a>
      <form action="{{ route('admin.leads.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Permanently delete this inquiry?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" style="width: 100%; justify-content: center;">Delete Inquiry</button>
      </form>
    </div>
  </div>
</div>
@endsection
