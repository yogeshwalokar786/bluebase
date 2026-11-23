@extends('admin.layout')

@section('title', 'XML Sitemap Generator')
@section('page_title', 'XML Sitemap Generator & Search Console Indexing')

@section('content')
<div style="max-width: 1100px; margin: 0 auto;">

  <!-- Navigation Tab Bar -->
  <div style="display: flex; gap: 12px; margin-bottom: 20px; flex-wrap: wrap;">
    <a href="{{ route('admin.settings') }}" class="btn btn-secondary btn-sm">Site Settings</a>
    <a href="{{ route('admin.code_placement.index') }}" class="btn btn-secondary btn-sm">Code Placement &amp; Pixels</a>
    <a href="{{ route('admin.sitemap.index') }}" class="btn btn-primary btn-sm">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px; margin-right: 4px; vertical-align: middle;"><circle cx="12" cy="5" r="3"/><circle cx="5" cy="19" r="3"/><circle cx="19" cy="19" r="3"/><path d="M5 16v-4a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v4"/><line x1="12" y1="8" x2="12" y2="12"/></svg>
      XML Sitemap Generator
    </a>
  </div>

  <!-- Primary Action Bar -->
  <div class="card" style="margin-bottom: 24px; padding: 18px 24px; background: linear-gradient(135deg, rgba(7, 11, 25, 0.95) 0%, rgba(13, 27, 62, 0.95) 100%); border: 1px solid rgba(0, 80, 231, 0.25);">
    <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; gap: 16px;">
      <div>
        <div style="font-size: 1.15rem; font-weight: 700; color: #FFFFFF; display: flex; align-items: center; gap: 10px;">
          <span>Sitemaps.org 0.9 XML Engine</span>
          @if($exists)
            <span style="font-size: 0.7rem; font-weight: 700; padding: 3px 8px; border-radius: 999px; background: rgba(34, 197, 94, 0.15); color: #4ADE80; border: 1px solid rgba(34, 197, 94, 0.3); text-transform: uppercase; letter-spacing: 0.05em;">Active on Disk</span>
          @else
            <span style="font-size: 0.7rem; font-weight: 700; padding: 3px 8px; border-radius: 999px; background: rgba(239, 68, 68, 0.15); color: #F87171; border: 1px solid rgba(239, 68, 68, 0.3); text-transform: uppercase; letter-spacing: 0.05em;">Not Generated</span>
          @endif
        </div>
        <div style="font-size: 0.82rem; color: #94A3B8; margin-top: 4px;">
          Automatically crawls and compiles all canonical public pages, dynamic blog articles, case studies, and categories with Google Image extensions into public/sitemap.xml.
        </div>
      </div>

      <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap;">
        <a href="{{ url('/sitemap.xml') }}" target="_blank" class="btn btn-secondary btn-sm" style="font-weight: 600;">
          <svg style="width: 14px; height: 14px; margin-right: 4px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
          Open Live sitemap.xml
        </a>
        @if($exists)
          <a href="{{ route('admin.sitemap.download') }}" class="btn btn-secondary btn-sm" style="font-weight: 600;">
            <svg style="width: 14px; height: 14px; margin-right: 4px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            Download XML
          </a>
        @endif
        <form action="{{ route('admin.sitemap.generate') }}" method="POST" style="margin: 0;">
          @csrf
          <button type="submit" class="btn btn-primary btn-sm" style="font-weight: 700; padding: 7px 16px;">
            <svg style="width: 14px; height: 14px; margin-right: 4px; vertical-align: middle;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>
            Regenerate Sitemap Now
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Real-Time Metrics -->
  <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 16px; margin-bottom: 24px;">
    <div class="card" style="margin-bottom: 0; padding: 18px;">
      <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.05em;">Total Indexed URLs</div>
      <div style="font-size: 2rem; font-weight: 800; color: #FFFFFF; margin-top: 4px;">{{ $totalUrls }}</div>
      <div style="font-size: 0.75rem; color: #94A3B8; margin-top: 2px;">
        {{ $pagesCount }} pages, {{ $caseStudiesCount }} stories, {{ $blogsCount }} blogs
      </div>
    </div>

    <div class="card" style="margin-bottom: 0; padding: 18px;">
      <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.05em;">File Size on Disk</div>
      <div style="font-size: 2rem; font-weight: 800; color: var(--accent); margin-top: 4px;">
        {{ $exists ? round($fileSize / 1024, 1) . ' KB' : '0 KB' }}
      </div>
      <div style="font-size: 0.75rem; color: #94A3B8; margin-top: 2px;">Target: public/sitemap.xml</div>
    </div>

    <div class="card" style="margin-bottom: 0; padding: 18px;">
      <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.05em;">Last Generated</div>
      <div style="font-size: 1rem; font-weight: 700; color: #FFFFFF; margin-top: 10px;">
        {{ $lastModified }}
      </div>
      <div style="font-size: 0.75rem; color: #94A3B8; margin-top: 2px;">Automated canonical indexing</div>
    </div>

    <div class="card" style="margin-bottom: 0; padding: 18px;">
      <div style="font-size: 0.72rem; font-weight: 700; text-transform: uppercase; color: var(--text-muted); letter-spacing: 0.05em;">Image Extensions</div>
      <div style="font-size: 1.15rem; font-weight: 700; color: #38BDF8; margin-top: 8px;">Enabled</div>
      <div style="font-size: 0.75rem; color: #94A3B8; margin-top: 2px;">Google Images namespace included</div>
    </div>
  </div>

  <!-- Search Engine Submission Helper -->
  <div class="card" style="margin-bottom: 24px;">
    <h3 style="font-size: 1.05rem; font-weight: 700; margin-bottom: 8px; color: var(--accent); border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
      Search Console Submission Endpoints
    </h3>
    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 16px;">
      Submit this canonical sitemap endpoint to Google Search Console and Bing Webmaster Tools so all pages, blogs, and case studies are crawled immediately:
    </p>

    <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 16px;">
      <input type="text" readonly value="{{ url('/sitemap.xml') }}" class="form-control" style="font-family: monospace; font-size: 0.88rem; background: #070B19; color: #E2E8F0;" id="sitemapUrlField">
      <button type="button" class="btn btn-secondary" onclick="copySitemapUrl(this)" style="font-weight: 600; white-space: nowrap;">Copy URL</button>
    </div>

    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
      <a href="https://search.google.com/search-console/sitemaps" target="_blank" class="btn btn-secondary btn-sm" style="display: flex; align-items: center; gap: 6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        Open Google Search Console Sitemaps
      </a>
      <a href="https://www.bing.com/webmasters/sitemaps" target="_blank" class="btn btn-secondary btn-sm" style="display: flex; align-items: center; gap: 6px;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="width: 14px; height: 14px;"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
        Open Bing Webmaster Tools Sitemaps
      </a>
    </div>
  </div>

  <!-- XML Code Inspector -->
  <div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;">
      <div style="font-size: 1.05rem; font-weight: 700; color: var(--text-primary); display: flex; align-items: center; gap: 8px;">
        <svg style="width: 18px; height: 18px; color: var(--accent);" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        Live XML Inspector (public/sitemap.xml)
      </div>
      @if($exists)
        <span style="font-size: 0.75rem; color: var(--text-muted); font-family: monospace;">{{ $fileSize }} bytes</span>
      @endif
    </div>

    @if($exists && $xmlContent)
      <div style="max-height: 480px; overflow-y: auto; background: #070B19; border: 1px solid var(--border-color); border-radius: 8px; padding: 18px;">
        <pre style="margin: 0; font-family: 'Consolas', 'Monaco', monospace; font-size: 0.8rem; color: #4ADE80; line-height: 1.6; white-space: pre-wrap;">{{ $xmlContent }}</pre>
      </div>
    @else
      <div style="text-align: center; padding: 40px; color: var(--text-muted);">
        <p style="margin-bottom: 16px;">The sitemap.xml file has not been written to disk yet.</p>
        <form action="{{ route('admin.sitemap.generate') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-primary" style="padding: 10px 24px;">Generate Sitemap Now</button>
        </form>
      </div>
    @endif
  </div>

</div>

<script>
  function copySitemapUrl(btn) {
    const field = document.getElementById('sitemapUrlField');
    if (!field) return;
    field.select();
    navigator.clipboard.writeText(field.value).then(() => {
      const orig = btn.innerText;
      btn.innerText = 'Copied!';
      btn.classList.add('btn-primary');
      btn.classList.remove('btn-secondary');
      setTimeout(() => {
        btn.innerText = orig;
        btn.classList.remove('btn-primary');
        btn.classList.add('btn-secondary');
      }, 2000);
    });
  }
</script>
@endsection
