@extends('admin.layout')

@section('title', 'XML Sitemap Generator')
@section('page_title', 'XML Sitemap Generator & Search Engine Submission')

@section('content')
<div class="filter-bar">
  <div style="display: flex; gap: 8px;">
    <a href="{{ route('admin.seo.global') }}" class="btn btn-secondary btn-sm">Global SEO Defaults</a>
    <a href="{{ route('admin.seo.pages.index') }}" class="btn btn-secondary btn-sm">Page SEO ({{ $pagesCount }})</a>
    <a href="{{ route('admin.seo.sitemap.index') }}" class="btn btn-primary btn-sm">XML Sitemap</a>
  </div>

  <div style="display: flex; gap: 10px; align-items: center;">
    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="btn btn-secondary btn-sm">
      <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
      Open Live sitemap.xml
    </a>
    <form action="{{ route('admin.seo.sitemap.generate') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-primary btn-sm">
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
        Regenerate Sitemap Now
      </button>
    </form>
  </div>
</div>

<!-- Metrics Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; margin-bottom: 24px;">
  <div class="card" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Sitemap Status</div>
    <div style="margin-top: 6px;">
      @if($exists)
        <span class="badge badge-confirmed" style="font-size: 0.85rem; padding: 4px 10px;">Active on Disk</span>
      @else
        <span class="badge badge-danger" style="font-size: 0.85rem; padding: 4px 10px;">Not Generated</span>
      @endif
    </div>
  </div>

  <div class="card" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Total Indexed URLs</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: #fff; margin-top: 4px;">{{ $totalUrls }}</div>
    <div style="font-size: 0.72rem; color: var(--text-dim); margin-top: 2px;">{{ $pagesCount }} pages, {{ $blogsCount }} articles</div>
  </div>

  <div class="card" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">File Size</div>
    <div style="font-size: 1.8rem; font-weight: 800; color: var(--accent); margin-top: 4px;">
      {{ $exists ? round($fileSize / 1024, 1) . ' KB' : '0 KB' }}
    </div>
    <div style="font-size: 0.72rem; color: var(--text-dim); margin-top: 2px;">public/sitemap.xml</div>
  </div>

  <div class="card" style="margin-bottom: 0; padding: 18px;">
    <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-dim); letter-spacing: 0.05em;">Last Generated</div>
    <div style="font-size: 0.95rem; font-weight: 600; color: #fff; margin-top: 8px;">
      {{ $lastModified }}
    </div>
    <div style="font-size: 0.72rem; color: var(--text-dim); margin-top: 2px;">Standard sitemap 0.9 XML</div>
  </div>
</div>

<!-- Search Engine Submission URLs -->
<div class="card" style="margin-bottom: 24px; background: rgba(9, 14, 35, 0.5);">
  <div class="card-title" style="margin-bottom: 8px;">Search Console Submission Endpoints</div>
  <p style="font-size: 0.82rem; color: var(--text-muted); margin-bottom: 12px;">Submit this direct URL to Google Search Console, Bing Webmaster Tools, and Yandex to index your pages automatically:</p>
  <div style="display: flex; gap: 10px; align-items: center;">
    <input type="text" readonly value="{{ url('/sitemap.xml') }}" class="form-control" style="font-family: monospace; font-size: 0.85rem; background: rgba(0,0,0,0.4);" id="sitemapUrlField">
    <button type="button" class="btn btn-secondary btn-sm" onclick="copySitemapUrl(this)">Copy URL</button>
  </div>
</div>

<!-- XML Live Code Inspection Window -->
<div class="card">
  <div class="card-header">
    <div class="card-title">
      <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
      XML Sitemap Inspector (public/sitemap.xml)
    </div>
    @if($exists)
      <a href="{{ url('/sitemap.xml') }}" download="sitemap.xml" class="btn btn-secondary btn-sm">Download XML</a>
    @endif
  </div>

  @if($exists && $xmlContent)
    <div style="max-height: 480px; overflow-y: auto; background: #040714; border: 1px solid var(--border-color); border-radius: 8px; padding: 16px;">
      <pre style="margin: 0; font-family: 'JetBrains Mono', monospace; font-size: 0.8rem; color: #86EFAC; line-height: 1.6; white-space: pre-wrap;">{{ $xmlContent }}</pre>
    </div>
  @else
    <div style="text-align: center; padding: 40px; color: var(--text-muted);">
      <p style="margin-bottom: 14px;">The sitemap.xml file has not been written to disk yet.</p>
      <form action="{{ route('admin.seo.sitemap.generate') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Generate Sitemap Now</button>
      </form>
    </div>
  @endif
</div>
@endsection

@push('scripts')
<script>
function copySitemapUrl(btn) {
  const inp = document.getElementById('sitemapUrlField');
  if (!inp) return;
  navigator.clipboard.writeText(inp.value).then(() => {
    const orig = btn.innerText;
    btn.innerText = 'Copied!';
    btn.style.borderColor = 'var(--success)';
    setTimeout(() => {
      btn.innerText = orig;
      btn.style.borderColor = '';
    }, 1800);
  });
}
</script>
@endpush

