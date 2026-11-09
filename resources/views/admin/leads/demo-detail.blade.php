@extends('admin.layout')

@section('title', 'Demo Booking #' . $demo->id)
@section('page_title', 'Demo Booking #' . $demo->id . ' — ' . $demo->company)

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.leads.demos') }}" class="btn btn-secondary btn-sm">&larr; Back to Demo Bookings</a>
</div>

<div class="detail-grid">
  <div style="display: flex; flex-direction: column; gap: 24px;">
    <div class="card">
      <div class="card-header">
        <div class="card-title">
          <svg style="width: 20px; height: 20px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/></svg>
          Prospect &amp; Infrastructure
        </div>
        <span class="badge badge-{{ $demo->status }}">{{ $demo->status }}</span>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div class="info-item">
          <div class="info-label">Contact Name</div>
          <div class="info-value">{{ $demo->name }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Company</div>
          <div class="info-value">{{ $demo->company }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Email Address</div>
          <div class="info-value">
            <a href="mailto:{{ $demo->email }}" style="color: var(--accent); text-decoration: none;">{{ $demo->email }}</a>
          </div>
        </div>
        <div class="info-item">
          <div class="info-label">Phone Number</div>
          <div class="info-value">{{ $demo->phone ?? 'Not provided' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Job Title / Role</div>
          <div class="info-value">{{ $demo->job_title ?? 'Not specified' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Current ERP / Core Backend</div>
          <div class="info-value">{{ $demo->current_erp ?? 'Not specified' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Requested Solution</div>
          <div class="info-value" style="color: var(--accent);">{{ $demo->interested_product ?? 'Enterprise DXP' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Requested On</div>
          <div class="info-value">{{ $demo->created_at->format('F d, Y 	 H:i:s') }}</div>
        </div>
      </div>
    </div>

    @if($demo->notes)
      <div class="card">
        <div class="card-title" style="margin-bottom: 12px;">Client Requirements / Demo Brief</div>
        <div class="message-box">{{ $demo->notes }}</div>
      </div>
    @endif
  </div>

  <div style="display: flex; flex-direction: column; gap: 24px;">
    <div class="card">
      <div class="card-title" style="margin-bottom: 16px;">Update Booking Status</div>
      <form action="{{ route('admin.leads.demos.update', $demo->id) }}" method="POST">
        @csrf
        <div class="form-group">
          <label class="form-label">Booking Status</label>
          <select name="status" class="form-select">
            <option value="pending" {{ $demo->status === 'pending' ? 'selected' : '' }}>Pending Review</option>
            <option value="confirmed" {{ $demo->status === 'confirmed' ? 'selected' : '' }}>Confirmed &amp; Scheduled</option>
            <option value="completed" {{ $demo->status === 'completed' ? 'selected' : '' }}>Completed (Demo Delivered)</option>
            <option value="cancelled" {{ $demo->status === 'cancelled' ? 'selected' : '' }}>Cancelled / Rescheduled</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Internal Admin Notes</label>
          <textarea name="admin_notes" class="form-control" rows="5" placeholder="Meeting invite URL, assigned sales engineer, sandbox links...">{{ $demo->admin_notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">Save Booking</button>
      </form>
    </div>

    <div class="card">
      <a href="mailto:{{ $demo->email }}?subject=Bluebase%20Demo%20Session:%20{{ urlencode($demo->company) }}" class="btn btn-secondary" style="width: 100%; justify-content: center; margin-bottom: 10px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        Send Calendar Invite
      </a>
      <form action="{{ route('admin.leads.demos.destroy', $demo->id) }}" method="POST" onsubmit="return confirm('Permanently delete this demo booking?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" style="width: 100%; justify-content: center;">Delete Booking</button>
      </form>
    </div>
  </div>
</div>
@endsection
