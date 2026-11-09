@extends('admin.layout')

@section('title', 'Testimonials CMS')
@section('page_title', 'Client Testimonials & Executive Quotes')

@section('content')
<div class="filter-bar">
  <div style="font-size: 0.9rem; color: var(--text-muted);">
    Manage customer quotes and enterprise testimonials featured on the homepage.
  </div>
  <a href="{{ route('admin.cms.testimonials.create') }}" class="btn btn-primary">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
    Add Testimonial
  </a>
</div>

<div class="card">
  <div class="table-responsive">
    <table class="data-table">
      <thead>
        <tr>
          <th>Order</th>
          <th>Client &amp; Organization</th>
          <th>Quote</th>
          <th>Rating</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($testimonials as $t)
          <tr>
            <td style="font-family: monospace; color: var(--accent); font-weight: 700;">#{{ $t->display_order }}</td>
            <td style="font-weight: 600;">
              <div>{{ $t->client_name }}</div>
              <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $t->client_role }}, {{ $t->company_name }}</div>
            </td>
            <td style="font-size: 0.85rem; color: #CBD5E1; max-width: 400px;">
              &ldquo;{{ $t->quote }}&rdquo;
            </td>
            <td>
              <span style="color: #FBBF24; font-size: 0.9rem;">{{ str_repeat('★', $t->rating) }}</span>
            </td>
            <td>
              <span class="badge {{ $t->is_active ? 'badge-confirmed' : 'badge-inactive' }}">
                {{ $t->is_active ? 'Active' : 'Hidden' }}
              </span>
            </td>
            <td>
              <div style="display: flex; gap: 8px;">
                <a href="{{ route('admin.cms.testimonials.edit', $t->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                <form action="{{ route('admin.cms.testimonials.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Delete testimonial from '{{ $t->client_name }}'?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 13px; height: 13px;"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 32px;">No testimonials entered yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
