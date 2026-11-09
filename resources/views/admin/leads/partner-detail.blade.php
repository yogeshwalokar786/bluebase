@extends('admin.layout')

@section('title', 'Partner #' . $partner->id)
@section('page_title', 'Partner Application: ' . $partner->company_name)

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.leads.partners') }}" class="btn btn-secondary btn-sm">&larr; Back to Partner Applications</a>
</div>

<div class="detail-grid">
  <div style="display: flex; flex-direction: column; gap: 24px;">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Alliance Candidate Profile</div>
        <span class="badge badge-{{ $partner->status }}">{{ $partner->status }}</span>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
        <div class="info-item">
          <div class="info-label">Company Name</div>
          <div class="info-value">{{ $partner->company_name }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Partner Classification</div>
          <div class="info-value" style="color: var(--accent);">{{ $partner->partner_type ?? 'Systems Integrator' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Primary Contact</div>
          <div class="info-value">{{ $partner->contact_name }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Business Email</div>
          <div class="info-value">
            <a href="mailto:{{ $partner->email }}" style="color: var(--accent); text-decoration: none;">{{ $partner->email }}</a>
          </div>
        </div>
        <div class="info-item">
          <div class="info-label">Phone</div>
          <div class="info-value">{{ $partner->phone ?? 'Not provided' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Jurisdiction / Country</div>
          <div class="info-value">{{ $partner->country ?? 'Global' }}</div>
        </div>
        <div class="info-item">
          <div class="info-label">Submitted On</div>
          <div class="info-value">{{ $partner->created_at->format('F d, Y H:i:s') }}</div>
        </div>
      </div>
    </div>

    @if($partner->message)
      <div class="card">
        <div class="card-title" style="margin-bottom: 12px;">Partnership Proposal &amp; Practice Overview</div>
        <div class="message-box">{{ $partner->message }}</div>
      </div>
    @endif
  </div>

  <div class="card">
    <div class="card-title" style="margin-bottom: 16px;">Review &amp; Certification</div>
    <form action="{{ route('admin.leads.partners.update', $partner->id) }}" method="POST">
      @csrf
      <div class="form-group">
        <label class="form-label">Alliance Status</label>
        <select name="status" class="form-select">
          <option value="new" {{ $partner->status === 'new' ? 'selected' : '' }}>New Application</option>
          <option value="under_review" {{ $partner->status === 'under_review' ? 'selected' : '' }}>Under Legal &amp; Technical Review</option>
          <option value="approved" {{ $partner->status === 'approved' ? 'selected' : '' }}>Approved Partner (Certified)</option>
          <option value="rejected" {{ $partner->status === 'rejected' ? 'selected' : '' }}>Rejected / Ineligible</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Partnership Manager Notes</label>
        <textarea name="admin_notes" class="form-control" rows="5" placeholder="Partner tier, revenue share, NDA status...">{{ $partner->admin_notes }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; margin-bottom: 10px;">Update Partner</button>
    </form>

    <form action="{{ route('admin.leads.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Permanently delete this partner application?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger" style="width: 100%; justify-content: center;">Delete Record</button>
    </form>
  </div>
</div>
@endsection
