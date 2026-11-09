@if(session('success'))
  <div style="position: fixed; top: 90px; right: 24px; z-index: 9999; background: #0050E7; color: #ffffff; padding: 16px 24px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0, 80, 231, 0.4); display: flex; align-items: center; gap: 12px; font-weight: 500; max-width: 480px; animation: slideInRight 0.4s ease;" id="flash-success">
    <svg style="width: 24px; height: 24px; flex-shrink: 0;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
    <span>{{ session('success') }}</span>
    <button onclick="document.getElementById('flash-success').remove()" style="background: none; border: none; color: #fff; margin-left: auto; cursor: pointer; font-size: 1.2rem; padding: 0 4px;">&times;</button>
  </div>
@endif

@if(isset($errors) && $errors->any())
  <div style="position: fixed; top: 90px; right: 24px; z-index: 9999; background: #EF4444; color: #ffffff; padding: 16px 24px; border-radius: 12px; box-shadow: 0 10px 30px rgba(239, 68, 68, 0.4); display: flex; align-items: flex-start; gap: 12px; font-weight: 500; max-width: 480px; animation: slideInRight 0.4s ease;" id="flash-error">
    <svg style="width: 24px; height: 24px; flex-shrink: 0; margin-top: 2px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
    <div>
      <div style="font-weight: 700; margin-bottom: 4px;">Please correct the errors below:</div>
      <ul style="margin: 0; padding-left: 18px; font-size: 0.9rem;">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    <button onclick="document.getElementById('flash-error').remove()" style="background: none; border: none; color: #fff; margin-left: auto; cursor: pointer; font-size: 1.2rem; padding: 0 4px;">&times;</button>
  </div>
@endif
