@extends('admin.layout')

@section('title', ($job->exists ? 'Edit' : 'Post') . ' Job Opening')
@section('page_title', ($job->exists ? 'Edit Opening: ' . $job->title : 'Post New Job Opening'))

@section('content')
<style>
  .career-form-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 32px;
    padding-top: 20px;
    border-top: 1px solid var(--border-color);
    gap: 12px;
    flex-wrap: wrap;
  }
  @media (max-width: 600px) {
    .career-form-footer {
      flex-direction: column-reverse;
    }
    .career-form-footer .btn {
      width: 100%;
      justify-content: center;
    }
  }
</style>

<div style="max-width: 860px; margin: 0 auto;">
  <div style="margin-bottom: 16px;">
    <a href="{{ route('admin.cms.careers.index') }}" class="btn btn-secondary btn-sm">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
      Back to Job Openings
    </a>
  </div>

  <div class="card" style="margin-bottom: 0;">
    <form action="{{ $job->exists ? route('admin.cms.careers.update', $job->id) : route('admin.cms.careers.store') }}" method="POST">
      @csrf

      <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
        
        <!-- Job Title -->
        <div class="form-group">
          <label for="title" class="form-label" style="font-weight: 600;">Job Title / Role <span style="color: #EF4444;">*</span></label>
          <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" class="form-control" placeholder="e.g. Staff Full-Stack Engineer (React / Go / Node)" required>
          @error('title')
            <div style="color: #EF4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Department & Category (2-Column Grid) -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label for="department" class="form-label" style="font-weight: 600;">Department Squad <span style="color: #EF4444;">*</span></label>
            <input type="text" name="department" id="department" value="{{ old('department', $job->department) }}" class="form-control" placeholder="e.g. Engineering, AI Research &amp; Labs, Mobile" required>
            @error('department')
              <div style="color: #EF4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="category" class="form-label" style="font-weight: 600;">Filter Category <span style="color: #EF4444;">*</span></label>
            <select name="category" id="category" class="form-select" required>
              <option value="backend" {{ old('category', $job->category) === 'backend' ? 'selected' : '' }}>Backend &amp; Full-Stack</option>
              <option value="ai" {{ old('category', $job->category) === 'ai' ? 'selected' : '' }}>AI &amp; Machine Learning</option>
              <option value="mobile-cloud" {{ old('category', $job->category) === 'mobile-cloud' ? 'selected' : '' }}>Mobile &amp; DevOps</option>
              <option value="design" {{ old('category', $job->category) === 'design' ? 'selected' : '' }}>Design &amp; Architecture</option>
            </select>
            @error('category')
              <div style="color: #EF4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Location, Employment Type & Experience (3-Column Grid) -->
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label for="location" class="form-label" style="font-weight: 600;">Location <span style="color: #EF4444;">*</span></label>
            <input type="text" name="location" id="location" value="{{ old('location', $job->location ?? 'Remote (India / Global)') }}" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="type" class="form-label" style="font-weight: 600;">Employment Type <span style="color: #EF4444;">*</span></label>
            <select name="type" id="type" class="form-select" required>
              <option value="Full-time" {{ old('type', $job->type) === 'Full-time' ? 'selected' : '' }}>Full-time</option>
              <option value="Contract" {{ old('type', $job->type) === 'Contract' ? 'selected' : '' }}>Contract</option>
              <option value="Part-time" {{ old('type', $job->type) === 'Part-time' ? 'selected' : '' }}>Part-time</option>
              <option value="Internship" {{ old('type', $job->type) === 'Internship' ? 'selected' : '' }}>Internship</option>
            </select>
          </div>

          <div class="form-group">
            <label for="experience" class="form-label" style="font-weight: 600;">Experience Level</label>
            <input type="text" name="experience" id="experience" value="{{ old('experience', $job->experience ?? 'Senior (3+ yrs)') }}" class="form-control" placeholder="e.g. Lead (5+ yrs)">
          </div>
        </div>

        <!-- Skills Tags -->
        <div class="form-group">
          <label for="skills_tags" class="form-label" style="font-weight: 600;">Required Skills / Tech Stack Tags</label>
          <input type="text" name="skills_tags" id="skills_tags" value="{{ old('skills_tags', $job->skills_tags) }}" class="form-control" placeholder="e.g. Go, React / Next.js, PostgreSQL, Redis, Docker (Comma separated)">
          <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">Separate skills by commas. These will be highlighted as technology pills on the role card.</p>
        </div>

        <!-- Role Description -->
        <div class="form-group">
          <label for="description" class="form-label" style="font-weight: 600;">Role Overview &amp; Responsibilities <span style="color: #EF4444;">*</span></label>
          <textarea name="description" id="description" rows="5" class="form-control" placeholder="Describe the mission, technical stack, key deliverables, and impact for this position..." required>{{ old('description', $job->description) }}</textarea>
          @error('description')
            <div style="color: #EF4444; font-size: 0.8rem; margin-top: 4px;">{{ $message }}</div>
          @enderror
        </div>

        <!-- Application Email & Sequence Order (2-Column Grid) -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
          <div class="form-group">
            <label for="apply_email" class="form-label" style="font-weight: 600;">Direct Application Destination</label>
            <input type="email" name="apply_email" id="apply_email" value="{{ old('apply_email', $job->apply_email ?? 'info@bluebasetechnologies.com') }}" class="form-control">
            <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">Where applicant resumes and portfolios will be routed.</p>
          </div>

          <div class="form-group">
            <label for="display_order" class="form-label" style="font-weight: 600;">Display Order Sequence</label>
            <input type="number" name="display_order" id="display_order" value="{{ old('display_order', $job->display_order ?? 1) }}" class="form-control" min="0" step="1">
            <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">Sequence order on the careers page job board.</p>
          </div>
        </div>

        <!-- Visibility Checkbox -->
        <div class="form-group">
          <label style="display: flex; align-items: center; gap: 10px; cursor: pointer; font-size: 0.88rem; padding: 10px 14px; background: rgba(0, 80, 231, 0.05); border: 1px solid var(--border-color); border-radius: 8px;">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $job->is_active ?? true) ? 'checked' : '' }} style="width: 18px; height: 18px; accent-color: var(--accent);">
            <span><strong>Publish Live on Careers Page</strong> (Immediately visible to candidates)</span>
          </label>
        </div>

      </div>

      <!-- Form Footer Actions -->
      <div class="career-form-footer">
        <a href="{{ route('admin.cms.careers.index') }}" class="btn btn-secondary">
          Cancel
        </a>
        <button type="submit" class="btn btn-primary" style="padding: 10px 24px;">
          {{ $job->exists ? 'Save Changes' : 'Publish Job Opening' }}
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
