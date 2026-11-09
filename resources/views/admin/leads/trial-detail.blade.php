@extends('admin.layout')

@section('title', 'Trial Request #' . $trial->id)
@section('page_title', 'Trial Sandbox #' . $trial->id . ' — ' . $trial->company)

@section('content')
<div style="margin-bottom: 20px;">
  <a href="{{ route('admin.leads.trials') }}" class="btn btn-secondary btn-sm">&larr; Back to Trial Requests</a>
</div>

<div class="detail-grid">
  <div class="card">
    <div class="card-header">
      <div class="card-title">Sandbox Provisioning Parameters</div>
      <span class="badge badge-{{ $trial->status }}">{{ $trial->status }}</span>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
      <div class="info-item">
        <div class="info-label">Developer / Lead</div>
        <div class="info-value">{{ $trial->name }}</div>
      </div>
      <div class="info-item">
        <div class="info-label">Organization</div>
        <div class="info-value">{{ $trial->company }}</div>
      </div>
      <div class="info-item">
        <div class="info-label">Email</div>
        <div class="info-value">
          <a href="mailto:{{ $trial->email }}" style="color: var(--accent); text-decoration: none;">{{ $trial->email }}</a>
        </div>
      </div>
      <div class="info-item">
        <div class="info-label">Preferred Cloud</div>
        <div class="info-value">{{ $trial->cloud_platform ?? 'AWS / Azure' }}</div>
      </div>
      <div class="info-item">
        <div class="info-label">Target ERP Version</div>
        <div class="info-value">{{ $trial->sap_version ?? 'S/4HANA Private Cloud' }}</div>
      </div>
      <div class="info-item">
        <div class="info-label">Requested On</div>
        <div class="info-value">{{ $trial->created_at->format('F d, Y H:i:s') }}</div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-title" style="margin-bottom: 16px;">Sandbox Management</div>
    <form action="{{ route('admin.leads.trials.update', $trial->id) }}" method="POST">
      @csrf
      <div class="form-group">
        <label class="form-label">Trial Status</label>
        <select name="status" class="form-select">
          <option value="pending" {{ $trial->status === 'pending' ? 'selected' : '' }}>Pending Provisioning</option>
          <option value="active" {{ $trial->status === 'active' ? 'selected' : '' }}>Active Sandbox (14-day license)</option>
          <option value="expired" {{ $trial->status === 'expired' ? 'selected' : '' }}>Expired</option>
          <option value="converted" {{ $trial->status === 'converted' ? 'selected' : '' }}>Converted to Enterprise Customer</option>
        </select>
      </div>

      <div class="form-group">
        <label class="form-label">Cluster Credentials &amp; Admin Notes</label>
        <textarea name="admin_notes" class="form-control" rows="5" placeholder="Cluster endpoint, tenant ID, trial license key...">{{ $trial->admin_notes }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center; margin-bottom: 10px;">Update Sandbox</button>
    </form>

    <form action="{{ route('admin.leads.trials.destroy', $trial->id) }}" method="POST" onsubmit="return confirm('Permanently delete this trial request?');">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger" style="width: 100%; justify-content: center;">Delete Request</button>
    </form>
  </div>
</div>
@endsection
