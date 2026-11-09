@extends('layouts.app')

@section('title', 'Website Redesign & Speed Optimization Services | Bluebase Technologies')
@section('meta_description', 'Transform outdated, slow websites into fast, modern platforms with 90+ Google PageSpeed scores, sub-second LCP, mobile-first UX, and zero SEO rank loss.')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- SEO / AEO Breadcrumb Navigation (Structured for Crawlers) -->
    <nav aria-label="Breadcrumb" class="hero-breadcrumb" data-viewport="true">
      <ol class="breadcrumb-pill" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('home') }}" itemprop="item" class="breadcrumb-link">
            <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M2.5 6.5L8 2l5.5 4.5v7a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-7z"/>
            </svg>
            <span itemprop="name">Home</span>
          </a>
          <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('services') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Services</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">Website Redesign &amp; Speed</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Website Redesign &bull; Speed Optimization</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Modern Redesigns Built for <br><mark>Speed &amp; Conversions</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      We turn slow, dated websites into sub-second, high-converting platforms with zero SEO rank loss.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=website-redesign" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Project</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
          <span class="c-btn__ico-hover">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
        </span>
      </a>
      <a href="{{ route('book-a-demo') }}" class="c-btn -secondary">
        <span class="c-btn__txt">Schedule a Call</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
          <span class="c-btn__ico-hover">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
        </span>
      </a>
    </div>

    <div class="hero-badges stagger-4" data-viewport="true">
      <div class="hero-badge-item">90+ PageSpeed</div>
      <div class="hero-badge-item">Zero SEO Loss</div>
      <div class="hero-badge-item">Modern UI Overhaul</div>
    </div>

  </div>
</section>

<!-- MARQUEE SECTION -->
@include('partials.client-marquee', ['heading' => 'Trusted by modern brands, founders, and growing businesses worldwide'])

<!-- INTERACTIVE WEBSITE REDESIGN & SPEED STUDIO SECTION -->
<section class="subpage-section -gray" id="interactive-redesign-studio">
  <div class="container">
    <div class="text-center" style="max-width: 860px; margin: 0 auto 40px;" data-viewport="true">
      <span class="section-tag">Interactive Performance Lab</span>
      <h2 class="section-title">Before / After Transformation &amp; <mark>Speed Engine</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Inspect real-time Core Web Vitals diagnostics, payload compression benchmarks, and automated 301 URL migration engines.</p>
    </div>

    <div class="redesign-studio-wrapper" data-viewport="true">
      <div class="redesign-studio-window">
        <!-- Chrome Header Bar -->
        <div class="redesign-studio-chrome">
          <div class="redesign-chrome-left">
            <div class="redesign-traffic-dots">
              <span class="redesign-dot -red"></span>
              <span class="redesign-dot -yellow"></span>
              <span class="redesign-dot -green"></span>
            </div>
            <div class="redesign-doc-title">
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polygon points="12 6 12 12 16 14"/></svg>
              <span>audit.bluebase.io/v1 &bull; Website Redesign &amp; Speed Engine</span>
            </div>
          </div>
          <div class="redesign-chrome-right">
            <button type="button" class="redesign-toggle-btn active" id="redesign-compare-toggle" title="Toggle Before / After View">
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 3h5v5"/><path d="M4 20L21 3"/><path d="M21 16v5h-5"/><path d="M15 15l6 6"/><path d="M4 4l5 5"/></svg>
              <span>Toggle View: Split / Side-by-Side</span>
            </button>
          </div>
        </div>

        <!-- Mode Navigation Bar -->
        <div class="redesign-studio-nav" role="tablist" aria-label="Redesign Modes">
          <div class="redesign-nav-tabs">
            <button type="button" class="redesign-nav-tab active" data-target="panel-visuals" role="tab" aria-selected="true" id="tab-visuals">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
              <span>Visual &amp; UX Transformation</span>
            </button>
            <button type="button" class="redesign-nav-tab" data-target="panel-vitals" role="tab" aria-selected="false" id="tab-vitals">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
              <span>Core Web Vitals Audit</span>
            </button>
            <button type="button" class="redesign-nav-tab" data-target="panel-assets" role="tab" aria-selected="false" id="tab-assets">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
              <span>Asset &amp; Payload Purge</span>
            </button>
            <button type="button" class="redesign-nav-tab" data-target="panel-seo" role="tab" aria-selected="false" id="tab-seo">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
              <span>Zero SEO Loss 301 Engine</span>
            </button>
            <button type="button" class="redesign-nav-tab" data-target="panel-conversion" role="tab" aria-selected="false" id="tab-conversion">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              <span>Conversion &amp; Trust Polish</span>
            </button>
          </div>
        </div>

        <!-- TAB PANEL 1: Visual & UX Transformation -->
        <div class="redesign-studio-panel active" id="panel-visuals" role="tabpanel" aria-labelledby="tab-visuals">
          <div class="redesign-compare-grid" id="compare-grid-container">
            <!-- Legacy Site Card -->
            <div class="redesign-card -before" id="card-before">
              <div class="redesign-card-header">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span class="redesign-tag -before">Legacy Site &bull; 2018</span>
                  <span style="font-size: 0.76rem; color: #94a3b8; font-weight: 600;">Outdated Codebase</span>
                </div>
                <div class="lighthouse-badge -poor">
                  <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                  <span>Score: 38 / 100</span>
                </div>
              </div>
              <div class="redesign-card-body">
                <div class="legacy-wireframe-box">
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <span style="font-size: 0.75rem; color: #ef4444; font-weight: 700; text-transform: uppercase;">Technical Red Flags</span>
                    <span style="font-size: 0.7rem; color: #94a3b8;">14 Blocking Scripts</span>
                  </div>
                  <div style="font-size: 0.8rem; color: #cbd5e1; line-height: 1.5; margin-bottom: 10px;">
                    Cluttered layout, bloated jQuery plugins, non-responsive tables, uncompressed 4.8MB hero images, and missing SSL mixed-content warnings.
                  </div>
                  <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                    <span class="redesign-feature-pill" style="color: #fca5a5; border-color: rgba(239, 68, 68, 0.3);">FCP: 4.8s (Slow)</span>
                    <span class="redesign-feature-pill" style="color: #fca5a5; border-color: rgba(239, 68, 68, 0.3);">CLS: 0.44 (Shifting)</span>
                    <span class="redesign-feature-pill" style="color: #fca5a5; border-color: rgba(239, 68, 68, 0.3);">Mobile: Failed</span>
                  </div>
                </div>

                <div style="margin-top: 6px;">
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Total Page Weight</span>
                    <span style="color: #ef4444; font-weight: 700;">8.7 MB (Heavy)</span>
                  </div>
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Largest Contentful Paint</span>
                    <span style="color: #ef4444; font-weight: 700;">6.2 Seconds</span>
                  </div>
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Mobile Usability</span>
                    <span style="color: #ef4444; font-weight: 700;">Text Too Small to Read</span>
                  </div>
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Avg Visitor Bounce Rate</span>
                    <span style="color: #ef4444; font-weight: 700;">68.4% (Lost Traffic)</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modern Bluebase Redesign Card -->
            <div class="redesign-card -after" id="card-after">
              <div class="redesign-card-header">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span class="redesign-tag -after">Bluebase Modern &bull; 2026</span>
                  <span style="font-size: 0.76rem; color: #86efac; font-weight: 600;">High-Performance Flagship</span>
                </div>
                <div class="lighthouse-badge -good">
                  <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><polyline points="20 6 9 17 4 12"/></svg>
                  <span>Score: 98 / 100</span>
                </div>
              </div>
              <div class="redesign-card-body">
                <div class="modern-wireframe-box">
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                    <span style="font-size: 0.75rem; color: #34d399; font-weight: 700; text-transform: uppercase;">Engineering Overhaul</span>
                    <span style="font-size: 0.7rem; color: #38bdf8; font-weight: 600;">Zero Render-Blocking</span>
                  </div>
                  <div style="font-size: 0.8rem; color: #e2e8f0; line-height: 1.5; margin-bottom: 10px;">
                    Sleek responsive design, tree-shaken bundles, next-gen WebP/AVIF responsive srcset, fluid typography, and sub-second Largest Contentful Paint.
                  </div>
                  <div style="display: flex; gap: 6px; flex-wrap: wrap;">
                    <span class="redesign-feature-pill" style="color: #86efac; border-color: rgba(16, 185, 129, 0.3);">FCP: 0.5s (Instant)</span>
                    <span class="redesign-feature-pill" style="color: #86efac; border-color: rgba(16, 185, 129, 0.3);">CLS: 0.00 (Zero Shift)</span>
                    <span class="redesign-feature-pill" style="color: #86efac; border-color: rgba(16, 185, 129, 0.3);">Mobile: 100% Passed</span>
                  </div>
                </div>

                <div style="margin-top: 6px;">
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Total Page Weight</span>
                    <span style="color: #10b981; font-weight: 700;">445 KB (85%+ Saved)</span>
                  </div>
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Largest Contentful Paint</span>
                    <span style="color: #10b981; font-weight: 700;">0.7 Seconds</span>
                  </div>
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Mobile Usability</span>
                    <span style="color: #10b981; font-weight: 700;">Fluid Touch Optimized</span>
                  </div>
                  <div class="redesign-stat-row">
                    <span style="color: #94a3b8;">Funnel Conversion Lift</span>
                    <span style="color: #10b981; font-weight: 700;">+140% (2.4x Multiplier)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANEL 2: Core Web Vitals Audit -->
        <div class="redesign-studio-panel" id="panel-vitals" role="tabpanel" aria-labelledby="tab-vitals">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">Google Core Web Vitals Telemetry</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">Measured against Google Chrome User Experience (CrUX) production thresholds.</p>
            </div>
            <div style="display: flex; gap: 10px;">
              <span class="lighthouse-badge -good">Mobile: 98 / 100</span>
              <span class="lighthouse-badge -good">Desktop: 100 / 100</span>
            </div>
          </div>

          <div class="vitals-grid">
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">0.7s</div>
              <div class="vital-label">LCP (Largest Paint)</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Was 4.8s &bull; <strong style="color: #34d399;">85% Faster</strong></div>
            </div>
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">0.00</div>
              <div class="vital-label">CLS (Layout Shift)</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Was 0.42 &bull; <strong style="color: #34d399;">Zero Shifting</strong></div>
            </div>
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">42ms</div>
              <div class="vital-label">INP (Responsiveness)</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Was 380ms &bull; <strong style="color: #34d399;">Sub-50ms</strong></div>
            </div>
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">0.5s</div>
              <div class="vital-label">FCP (First Paint)</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Was 3.4s &bull; <strong style="color: #34d399;">Instant Load</strong></div>
            </div>
          </div>

          <div style="margin-top: 20px; background: rgba(0, 0, 0, 0.3); border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.08); padding: 14px;">
            <div style="font-size: 0.75rem; font-weight: 700; color: #38bdf8; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 8px;">
              Lighthouse CI Automated Audit Diagnostics
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.78rem; font-family: var(--font-mono, monospace);">
              <div style="display: flex; align-items: center; gap: 8px; color: #86efac;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>[PASSED] Eliminated 14 render-blocking stylesheets &amp; scripts &mdash; saved 2,840ms</span>
              </div>
              <div style="display: flex; align-items: center; gap: 8px; color: #86efac;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>[PASSED] Encoded images in AVIF/WebP with explicit width/height dimensions &mdash; saved 4,120KB</span>
              </div>
              <div style="display: flex; align-items: center; gap: 8px; color: #86efac;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>[PASSED] Subsetting local WOFF2 fonts with font-display: swap &mdash; 0ms layout shift</span>
              </div>
              <div style="display: flex; align-items: center; gap: 8px; color: #86efac;">
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                <span>[PASSED] Cloudflare edge static cache &amp; Brotli compression active &mdash; TTFB 85ms</span>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANEL 3: Asset & Payload Purge -->
        <div class="redesign-studio-panel" id="panel-assets" role="tabpanel" aria-labelledby="tab-assets">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">Asset Weight &amp; Payload Purge</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">Total transfer weight reduced from 8.7 MB down to 445 KB (85%+ byte savings).</p>
            </div>
            <span class="redirect-status-badge" style="font-size: 0.76rem; padding: 4px 10px;">
              Total Savings: 8,255 KB
            </span>
          </div>

          <div style="display: flex; flex-direction: column; gap: 16px;">
            <!-- JavaScript -->
            <div>
              <div style="display: flex; justify-content: space-between; font-size: 0.78rem; font-weight: 600;">
                <span style="color: #cbd5e1;">JavaScript Bundles (Tree-shaken &amp; purged)</span>
                <span style="color: #94a3b8;">Was 2.4 MB &rarr; <strong style="color: #10b981;">142 KB (94% smaller)</strong></span>
              </div>
              <div class="redesign-bar-wrapper">
                <div class="redesign-bar-fill -green" style="width: 6%;"></div>
              </div>
            </div>

            <!-- CSS -->
            <div>
              <div style="display: flex; justify-content: space-between; font-size: 0.78rem; font-weight: 600;">
                <span style="color: #cbd5e1;">CSS Stylesheets (Tailwind JIT Purged)</span>
                <span style="color: #94a3b8;">Was 860 KB &rarr; <strong style="color: #10b981;">48 KB (94% smaller)</strong></span>
              </div>
              <div class="redesign-bar-wrapper">
                <div class="redesign-bar-fill -green" style="width: 5%;"></div>
              </div>
            </div>

            <!-- Images & Media -->
            <div>
              <div style="display: flex; justify-content: space-between; font-size: 0.78rem; font-weight: 600;">
                <span style="color: #cbd5e1;">Images &amp; Media (AVIF / WebP srcset)</span>
                <span style="color: #94a3b8;">Was 4.8 MB &rarr; <strong style="color: #10b981;">210 KB (95% smaller)</strong></span>
              </div>
              <div class="redesign-bar-wrapper">
                <div class="redesign-bar-fill -green" style="width: 5%;"></div>
              </div>
            </div>

            <!-- Web Fonts -->
            <div>
              <div style="display: flex; justify-content: space-between; font-size: 0.78rem; font-weight: 600;">
                <span style="color: #cbd5e1;">Web Fonts (SubsetFonts WOFF2)</span>
                <span style="color: #94a3b8;">Was 650 KB &rarr; <strong style="color: #10b981;">45 KB (93% smaller)</strong></span>
              </div>
              <div class="redesign-bar-wrapper">
                <div class="redesign-bar-fill -green" style="width: 7%;"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANEL 4: Zero SEO Loss 301 Engine -->
        <div class="redesign-studio-panel" id="panel-seo" role="tabpanel" aria-labelledby="tab-seo">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">Automated 301 Permanent Redirect Mapping</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">1,280 / 1,280 Indexed URLs Crawled &amp; Mapped with 100% Google backlink authority preserved.</p>
            </div>
            <div style="position: relative;">
              <input type="text" id="seo-filter-input" placeholder="Filter URL routes..." style="background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.15); color: #fff; padding: 4px 10px; border-radius: 6px; font-size: 0.74rem; font-family: var(--font-mono, monospace); outline: none;">
            </div>
          </div>

          <div style="overflow-x: auto; background: rgba(0, 0, 0, 0.25); border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.08);">
            <table class="redirect-table">
              <thead>
                <tr>
                  <th>Legacy Source URL</th>
                  <th>Target Destination URL</th>
                  <th>HTTP Status</th>
                  <th>SEO Equity</th>
                </tr>
              </thead>
              <tbody id="seo-table-body">
                <tr>
                  <td style="color: #fca5a5;">/company-services.html</td>
                  <td style="color: #86efac;">/services/</td>
                  <td><span class="redirect-status-badge">301 Permanent</span></td>
                  <td style="color: #38bdf8;">100% Preserved</td>
                </tr>
                <tr>
                  <td style="color: #fca5a5;">/products_archive.php?id=42</td>
                  <td style="color: #86efac;">/products/enterprise/</td>
                  <td><span class="redirect-status-badge">301 Permanent</span></td>
                  <td style="color: #38bdf8;">100% Preserved</td>
                </tr>
                <tr>
                  <td style="color: #fca5a5;">/contact-us-page.htm</td>
                  <td style="color: #86efac;">/contact/</td>
                  <td><span class="redirect-status-badge">301 Permanent</span></td>
                  <td style="color: #38bdf8;">100% Preserved</td>
                </tr>
                <tr>
                  <td style="color: #fca5a5;">/blog/speed-optimization-2019/</td>
                  <td style="color: #86efac;">/insights/speed-optimization/</td>
                  <td><span class="redirect-status-badge">301 Permanent</span></td>
                  <td style="color: #38bdf8;">100% Preserved</td>
                </tr>
                <tr>
                  <td style="color: #fca5a5;">/case-studies-list.aspx</td>
                  <td style="color: #86efac;">/work/</td>
                  <td><span class="redirect-status-badge">301 Permanent</span></td>
                  <td style="color: #38bdf8;">100% Preserved</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p style="font-size: 0.72rem; color: #64748b; margin-top: 10px; font-family: var(--font-mono, monospace);">
            Audit status: Automatic XML sitemap generation, self-referencing canonical headers, and Search Console re-indexing protocol ready.
          </p>
        </div>

        <!-- TAB PANEL 5: Conversion & Trust Polish -->
        <div class="redesign-studio-panel" id="panel-conversion" role="tabpanel" aria-labelledby="tab-conversion">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">UX Friction Reduction &amp; Funnel Uplift</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">Measured user sign-up and checkout completion increase after redesign deployment.</p>
            </div>
            <span class="redirect-status-badge" style="font-size: 0.76rem; padding: 4px 10px;">
              Avg Conversion Lift: +140%
            </span>
          </div>

          <div class="vitals-grid">
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">26%</div>
              <div class="vital-label">Visitor Bounce Rate</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Down from <strong style="color: #ef4444;">68%</strong></div>
            </div>
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">3m 48s</div>
              <div class="vital-label">Session Duration</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Up from <strong style="color: #38bdf8;">1m 12s</strong></div>
            </div>
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">2.4x</div>
              <div class="vital-label">Conversion Rate</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Funnel completions</div>
            </div>
            <div class="vital-box">
              <div class="vital-val" style="color: #10b981;">19%</div>
              <div class="vital-label">Form Drop-off</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Down from <strong style="color: #ef4444;">58%</strong></div>
            </div>
          </div>

          <div style="margin-top: 20px; display: grid; grid-template-columns: repeat(2, 1fr); gap: 14px;">
            <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 8px; padding: 12px;">
              <div style="font-size: 0.8rem; font-weight: 700; color: #38bdf8; margin-bottom: 4px;">Mobile-First Ergonomics</div>
              <p style="font-size: 0.74rem; color: #cbd5e1; line-height: 1.4; margin: 0;">Sticky bottom conversion drawer, 48px+ thumb touch targets, and zero accidental mis-taps.</p>
            </div>
            <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 8px; padding: 12px;">
              <div style="font-size: 0.8rem; font-weight: 700; color: #38bdf8; margin-bottom: 4px;">WCAG AAA Accessibility</div>
              <p style="font-size: 0.74rem; color: #cbd5e1; line-height: 1.4; margin: 0;">High contrast typography ratios, ARIA landmark roles, and seamless keyboard navigation.</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- BENTO CAPABILITIES SECTION -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Core Capabilities</span>
      <h2 class="section-title">Disciplined Engineering for <mark>High-Growth Websites</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every redesign blends modern visual aesthetics with strict performance budgets, code refactoring, and search engine continuity.</p>
    </div>

    <div class="services-catalog-grid">
      <!-- Capability 0: Contemporary Visual & UX Redesign (Span 7) -->
      <div class="service-card-modern -span-7 stagger-1" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Visual Refresh</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
          </div>
          <h3 class="service-title">Contemporary Visual &amp; UX Redesign</h3>
          <p class="service-desc">Transform dated interfaces into modern, trustworthy digital experiences that convert visitors into paying clients.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Modern typography, color palettes &amp; visual hierarchy
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Clean, spacious layouts that highlight your value proposition
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Mobile-first responsive design tailored for touch devices
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Interactive trust badges, testimonials &amp; social proof
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Visual Refresh</span>
            <span class="tech-tag-pill">Modern UI</span>
            <span class="tech-tag-pill">Mobile First</span>
            <span class="tech-tag-pill">Conversion Rate</span>
          </div>
          <a href="{{ route('contact') }}?service=website-redesign" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- Capability 1: Google PageSpeed 90+ Optimization (Span 5) -->
      <div class="service-card-modern -span-5 stagger-2" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Core Web Vitals</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
            </div>
          </div>
          <h3 class="service-title">Google PageSpeed 90+ Optimization</h3>
          <p class="service-desc">Eliminate slow loading penalties and improve search rankings by passing all Google Core Web Vitals.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Sub-second Largest Contentful Paint (LCP)
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Eliminating Cumulative Layout Shifts (CLS)
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Interaction to Next Paint (INP) sub-50ms tuning
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Passing Google PageSpeed mobile &amp; desktop audits
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Core Web Vitals</span>
            <span class="tech-tag-pill">PageSpeed 90+</span>
            <span class="tech-tag-pill">LCP Fix</span>
            <span class="tech-tag-pill">Lighthouse</span>
          </div>
          <a href="{{ route('contact') }}?service=website-redesign" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- Capability 2: Technical Debt & Code Cleanups (Span 5) -->
      <div class="service-card-modern -span-5 stagger-3" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Code Cleanups</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
          </div>
          <h3 class="service-title">Technical Debt &amp; Code Cleanups</h3>
          <p class="service-desc">Replace bloated plugins, heavy legacy libraries, and spaghetti markup with clean, semantic modern code.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Stripping out unnecessary third-party scripts
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Minifying CSS, JavaScript &amp; HTML bundles
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Removing dead CSS classes &amp; unused legacy assets
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Cleaner architecture maintainable by any senior team
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Code Cleanup</span>
            <span class="tech-tag-pill">Tree-Shaking</span>
            <span class="tech-tag-pill">Minification</span>
            <span class="tech-tag-pill">Semantic HTML</span>
          </div>
          <a href="{{ route('contact') }}?service=website-redesign" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- Capability 3: Zero SEO Rank Loss & 301 Mapping (Span 7) -->
      <div class="service-card-modern -span-7 stagger-4" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">SEO Preservation</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
          </div>
          <h3 class="service-title">Zero SEO Rank Loss &amp; 301 Mapping</h3>
          <p class="service-desc">Protect your valuable organic search rankings and domain authority during the redesign transition.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Comprehensive crawl audit of all existing indexed URLs
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Exact 301 permanent redirect mapping for changed paths
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Preserving historical metadata, headings &amp; backlink equity
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Immediate post-launch Google Search Console re-indexing
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">SEO Preservation</span>
            <span class="tech-tag-pill">301 Redirects</span>
            <span class="tech-tag-pill">Search Console</span>
            <span class="tech-tag-pill">Zero Traffic Loss</span>
          </div>
          <a href="{{ route('contact') }}?service=website-redesign" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- UX PERFORMANCE & USABILITY BENCHMARKS SECTION -->
<section class="ux-benchmarks-section subpage-section -gray" id="ux-benchmarks">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 50px;" data-viewport="true">
      <span class="section-tag">Performance Benchmarks</span>
      <h2 class="section-title">Engineered for Observable <mark>Speed &amp; Conversion Growth</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every metric is measured against real user telemetry and Google search engine indexing standards.</p>
    </div>

    <div class="ux-benchmarks-grid">
      <!-- Benchmark Card 1: 98/100 Google PageSpeed -->
      <div class="ux-benchmark-card stagger-1" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Performance Benchmark</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">98<span class="ux-benchmark-unit">/100</span></div>
            <span class="ux-benchmark-pill">Top 1% Global Tier</span>
          </div>

          <!-- Micro-Widget: Score Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 98%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Avg Website: 48</span>
              <span style="color: var(--color-primary); font-weight: 700;">Bluebase: 98 PageSpeed</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Google PageSpeed Score</h3>
          <p class="ux-benchmark-desc">Ranked in the top 1% performance tier across software applications, audited with rigorous Google Lighthouse metrics.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>Google Lighthouse Standard</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Verified Score</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 2: 0.7s LCP -->
      <div class="ux-benchmark-card stagger-2" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Core Web Vitals</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">0.7<span class="ux-benchmark-unit">s</span></div>
            <span class="ux-benchmark-pill">Sub-Second Paint</span>
          </div>

          <!-- Micro-Widget: LCP Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 85%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Avg LCP: 4.6s</span>
              <span style="color: var(--color-primary); font-weight: 700;">Bluebase: 0.7s LCP</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Largest Contentful Paint</h3>
          <p class="ux-benchmark-desc">Sub-second page rendering for peak user retention, totally eliminating the 3-second mobile abandonment bounce rate.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>W3C Performance Standard</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Sub-Second Paint</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 3: 0% SEO Rank Loss -->
      <div class="ux-benchmark-card stagger-3" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Traffic Continuity</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">0<span class="ux-benchmark-unit">%</span></div>
            <span class="ux-benchmark-pill">100% Traffic Kept</span>
          </div>

          <!-- Micro-Widget: Rank Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 100%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Rank Loss: 0%</span>
              <span style="color: var(--color-primary); font-weight: 700;">Index Parity: 100%</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">SEO Rank Loss Guarantee</h3>
          <p class="ux-benchmark-desc">Guaranteed organic search authority preservation via automated 301 mappings and pre-launch crawl validation.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>Search Console Parity</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Zero Drop Guarantee</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 4: 85% Payload Reduction -->
      <div class="ux-benchmark-card stagger-4" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Payload Optimization</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">85<span class="ux-benchmark-unit">%</span></div>
            <span class="ux-benchmark-pill">Byte Savings</span>
          </div>

          <!-- Micro-Widget: Payload Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 85%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Before: 8.7MB</span>
              <span style="color: var(--color-primary); font-weight: 700;">After: 445KB Payload</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Average Payload Reduction</h3>
          <p class="ux-benchmark-desc">Massive byte savings via WebP/AVIF compression, tree-shaking, font subsetting, and dead code purging.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>Next-Gen Asset Pipeline</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Optimized Bundle</span>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TECH STACK SECTION (CENTER-ALIGNED 5-BLOCK) -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Our Technology Stack</span>
      <h2 class="section-title">Battle-Tested <mark>Modern Performance Tools</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">We combine industry-standard diagnostics, modern front-end build tools, asset compression engines, and edge caching networks.</p>
    </div>

    <div class="tech-stack-grid">
      <!-- 01: Audit & Diagnostics -->
      <div class="tech-stack-category stagger-1" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <h3 class="tech-cat-title">Audit &amp; Diagnostics</h3>
        <ul class="tech-cat-list">
          <li>Google Lighthouse CI</li>
          <li>Core Web Vitals</li>
          <li>Search Console Telemetry</li>
          <li>Screaming Frog Crawls</li>
        </ul>
      </div>

      <!-- 02: Modern Front-End -->
      <div class="tech-stack-category stagger-2" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
        </div>
        <h3 class="tech-cat-title">Modern Front-End</h3>
        <ul class="tech-cat-list">
          <li>Tailwind CSS (JIT)</li>
          <li>Vite Bundler &amp; Purger</li>
          <li>Alpine.js Primitives</li>
          <li>Semantic HTML5</li>
        </ul>
      </div>

      <!-- 03: Asset Compression -->
      <div class="tech-stack-category stagger-3" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
        </div>
        <h3 class="tech-cat-title">Asset Compression</h3>
        <ul class="tech-cat-list">
          <li>WebP &amp; AVIF Encoders</li>
          <li>SVGO Vector Purger</li>
          <li>WOFF2 Font Subsetter</li>
          <li>Responsive srcset Delivery</li>
        </ul>
      </div>

      <!-- 04: Caching & Edge Delivery -->
      <div class="tech-stack-category stagger-4" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 10h-1.26A8 8 0 1 0 9 20h9a5 5 0 0 0 0-10z"/></svg>
        </div>
        <h3 class="tech-cat-title">Caching &amp; Edge Delivery</h3>
        <ul class="tech-cat-list">
          <li>Cloudflare Edge CDN</li>
          <li>Redis Object Cache</li>
          <li>Brotli &amp; Gzip Compression</li>
          <li>HTTP/3 Protocol Multiplex</li>
        </ul>
      </div>

      <!-- 05: SEO Continuity -->
      <div class="tech-stack-category stagger-5" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
        </div>
        <h3 class="tech-cat-title">SEO Continuity</h3>
        <ul class="tech-cat-list">
          <li>301 Permanent Redirect Maps</li>
          <li>Schema.org JSON-LD Graphs</li>
          <li>Automated XML Sitemaps</li>
          <li>Robots.txt &amp; Canonicals</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ENGINEERING STANDARDS SECTION -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Quality Standards</span>
      <h2 class="section-title">Built for Longevity, Security &amp; Speed</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We do not cut corners or deliver fragile templates. Every line of code follows disciplined production standards.</p>
    </div>

    <div class="features-grid-2">
      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16.5 9.4 7.55 4.24a1.78 1.78 0 0 0-2.5 1.55v12.42a1.78 1.78 0 0 0 2.5 1.55L16.5 14.6a1.78 1.78 0 0 0 0-3.2z"/></svg>
        </div>
        <h3 class="card-title-lg">Modular Code Architecture</h3>
        <p class="card-text">Strict separation of concerns, semantic structure, and clean reusable components. Your code is easy to read, test, and hand over to any future developer with zero friction.</p>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <h3 class="card-title-lg">Sub-Second Page Loads</h3>
        <p class="card-text">We optimize script bundles, leverage browser caching, compress assets, and tune server responses to ensure your pages load in under a second worldwide.</p>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="card-title-lg">Enterprise Security Built-In</h3>
        <p class="card-text">Comprehensive protection against SQL injection, CSRF attacks, XSS vulnerabilities, and brute-force logins with encrypted secrets and automated rate limiting.</p>
      </div>

      <div class="feature-card-clean stagger-4" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="card-title-lg">100% Client-Owned Source Code</h3>
        <p class="card-text">No proprietary locks, no closed platforms. You own 100% of all Git repositories, databases, design files, and deployment keys from day one.</p>
      </div>
    </div>
  </div>
</section>

<!-- GEO: GLOBAL REMOTE COLLABORATION SECTION -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Global Delivery</span>
      <h2 class="section-title">Worldwide Collaboration, Zero Friction</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Based in India and operating on a remote-first engineering model, we build and deploy digital products for founders and businesses across North America, Europe, Australia, and Asia.</p>
    </div>

    <div class="geo-collab-grid">
      <div class="geo-collab-card stagger-1" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="geo-collab-title">Timezone Overlap</h3>
        <p class="geo-collab-desc">We offer daily overlapping work hours with US (EST/PST), UK (GMT), European (CET), and Australian (AEST) time zones for real-time collaboration and sprint reviews.</p>
      </div>

      <div class="geo-collab-card stagger-2" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3 class="geo-collab-title">Direct Developer Access</h3>
        <p class="geo-collab-desc">Collaborate directly with senior developers and solution architects over Slack, WhatsApp, and Google Meet with zero layers of management.</p>
      </div>

      <div class="geo-collab-card stagger-3" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        </div>
        <h3 class="geo-collab-title">Multi-Currency &amp; Contracts</h3>
        <p class="geo-collab-desc">Seamless invoicing and contracts in USD, EUR, GBP, AUD, and INR. Secure milestone payments processed via Stripe and international wire transfers with complete compliance.</p>
      </div>
    </div>
  </div>
</section>

<!-- 4-STEP DELIVERY PROCESS SECTION -->
<section class="usecases-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Delivery Framework</span>
      <h2 class="section-title">How We Deliver Your Redesign</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, sprint-based approach where you see tangible progress every week.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Scope &amp; SEO Crawl</h3>
        <p class="process-step-desc">We audit all existing indexed URLs, Core Web Vitals bottlenecks, competitor heuristics, and establish fixed speed benchmarks within 48 hours.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">UI/UX &amp; Wireframing</h3>
        <p class="process-step-desc">We create modern Figma wireframes, responsive design tokens, and clickable prototypes. You test and approve the exact interface before coding begins.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Performance Sprints</h3>
        <p class="process-step-desc">We refactor into semantic code, eliminate heavy scripts, compress media into WebP/AVIF, and test continuously against Google Lighthouse.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">Zero-Downtime Cutover</h3>
        <p class="process-step-desc">We deploy 301 permanent redirect maps, verify Google Search Console indexing, test SSL edge caching, and execute 100% credential handover.</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="faq-section -gray">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-left" data-viewport="true">
        <span class="section-tag">Frequently Asked</span>
        <h2 class="section-title">Questions &amp; <mark>Answers</mark></h2>
        <p class="section-subtitle">Direct, transparent answers to common questions about our Website Redesign &amp; Speed services.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>Will we lose our existing Google search rankings during a redesign?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>No. We perform a full pre-launch URL crawl audit and map exact 301 permanent redirects for any changed URLs. We preserve your existing keyword hierarchy, title tags, and backlink equity so your search rankings are protected.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you guarantee a 90+ Google PageSpeed score?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We engineer performance from the ground up: converting images to WebP/AVIF, minifying CSS/JS, subsetting fonts, eliminating render-blocking scripts, and setting up CDN caching. We test against Google Lighthouse before going live.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How long does a website redesign typically take?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>A complete website redesign typically takes 2 to 3 weeks from wireframe review to live production cutover.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Can we keep our existing content, domain, and email configuration?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. We preserve all your valuable existing content, customer data, and domain configuration while giving the visual design and underlying code an overhaul.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-5" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>What CMS or technology stack do you recommend for our new site?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Depending on your content workflow, we build on high-performance frameworks like Laravel, headless WordPress, Next.js, or static site generators paired with Tailwind CSS and Vite for sub-second speeds.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-6" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Do you provide warranty and support after the redesign launches?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Every redesign project includes a comprehensive 30-day post-launch warranty covering bug fixes, speed telemetry monitoring, and Search Console indexing verification.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CLOSING CALL TO ACTION BANNER -->
<section class="cta-banner-section">
  <div class="container">
    <div class="cta-banner-box" data-viewport="true" data-animation="fade-scale">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="cta-banner-bg" aria-hidden="true">
      <div class="cta-banner-content">
        <h2 class="cta-banner-title stagger-1" data-viewport="true">
          Ready to Modernize Your Website?<br><mark>Let's Build It Right</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Tell us about your requirements and receive a comprehensive technical plan and transparent estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=website-redesign" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Start Your Project</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base">
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </span>
              <span class="c-btn__ico-hover">
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </span>
            </span>
          </a>
          <a href="{{ route('book-a-demo') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Schedule a Call</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base">
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </span>
              <span class="c-btn__ico-hover">
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </span>
            </span>
          </a>
        </div>

        <div class="cta-pills-row stagger-3" data-viewport="true">
          <div class="cta-pill-item">Fast 24-Hour Response</div>
          <div class="cta-pill-item">Fixed Milestone Pricing</div>
          <div class="cta-pill-item">100% Code Ownership</div>
          <div class="cta-pill-item">Direct Engineer Access</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Mode Tab Switching
  const tabs = document.querySelectorAll('.redesign-nav-tab');
  const panels = document.querySelectorAll('.redesign-studio-panel');

  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      const targetId = this.getAttribute('data-target');
      tabs.forEach(t => {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      panels.forEach(p => p.classList.remove('active'));

      this.classList.add('active');
      this.setAttribute('aria-selected', 'true');
      const targetPanel = document.getElementById(targetId);
      if (targetPanel) {
        targetPanel.classList.add('active');
      }
    });
  });

  // Split View Toggle
  const toggleBtn = document.getElementById('redesign-compare-toggle');
  const cardBefore = document.getElementById('card-before');
  const cardAfter = document.getElementById('card-after');
  let viewMode = 0; // 0: both, 1: after only, 2: before only

  if (toggleBtn && cardBefore && cardAfter) {
    toggleBtn.addEventListener('click', function () {
      viewMode = (viewMode + 1) % 3;
      if (viewMode === 0) {
        cardBefore.style.display = 'flex';
        cardAfter.style.display = 'flex';
        toggleBtn.querySelector('span').textContent = 'Toggle View: Side-by-Side';
      } else if (viewMode === 1) {
        cardBefore.style.display = 'none';
        cardAfter.style.display = 'flex';
        toggleBtn.querySelector('span').textContent = 'Showing: Bluebase Modern Only';
      } else {
        cardBefore.style.display = 'flex';
        cardAfter.style.display = 'none';
        toggleBtn.querySelector('span').textContent = 'Showing: Legacy Site Only';
      }
    });
  }

  // Live 301 Filter Input
  const filterInput = document.getElementById('seo-filter-input');
  const tableBody = document.getElementById('seo-table-body');
  if (filterInput && tableBody) {
    filterInput.addEventListener('input', function () {
      const query = this.value.toLowerCase();
      const rows = tableBody.querySelectorAll('tr');
      rows.forEach(function (row) {
        const text = row.textContent.toLowerCase();
        row.style.display = text.indexOf(query) !== -1 ? '' : 'none';
      });
    });
  }
});
</script>

<!-- Comprehensive Schema.org Structured Data (SEO / AEO / GEO Optimization) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url('/website-redesign') }}",
      "url": "{{ url('/website-redesign') }}",
      "name": "Website Redesign & Speed Optimization Services | Bluebase Technologies",
      "description": "Transform outdated, slow websites into fast, modern platforms with 90+ Google PageSpeed scores, sub-second LCP, mobile-first UX, and zero SEO rank loss.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/website-redesign#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/website-redesign#breadcrumb') }}",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ url('/') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Services",
          "item": "{{ route('services') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "Website Redesign & Speed",
          "item": "{{ url('/website-redesign') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/website-redesign#service') }}",
      "name": "Website Redesign & Speed Optimization Services | Bluebase Technologies",
      "serviceType": "Website Redesign & Performance Engineering",
      "provider": {
        "@@type": "Corporation",
        "name": "Bluebase Technologies",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo-bluebase.png') }}",
        "foundingLocation": {
          "@@type": "Place",
          "name": "India"
        }
      },
      "areaServed": [
        { "@@type": "Country", "name": "United States" },
        { "@@type": "Country", "name": "United Kingdom" },
        { "@@type": "Country", "name": "European Union" },
        { "@@type": "Country", "name": "Australia" },
        { "@@type": "Country", "name": "Canada" },
        { "@@type": "Country", "name": "India" }
      ],
      "termsOfService": "{{ url('/terms') }}"
    },
    {
      "@@type": "FAQPage",
      "@@id": "{{ url('/website-redesign#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "Will we lose our existing Google search rankings during a redesign?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "No. We perform a full pre-launch URL crawl audit and map exact 301 permanent redirects for any changed URLs. We preserve your existing keyword hierarchy, title tags, and backlink equity so your search rankings are protected."
          }
        },
        {
          "@@type": "Question",
          "name": "How do you guarantee a 90+ Google PageSpeed score?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We engineer performance from the ground up: converting images to WebP/AVIF, minifying CSS/JS, subsetting fonts, eliminating render-blocking scripts, and setting up CDN caching. We test against Google Lighthouse before going live."
          }
        },
        {
          "@@type": "Question",
          "name": "How long does a website redesign typically take?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "A complete website redesign typically takes 2 to 3 weeks from wireframe review to live production cutover."
          }
        },
        {
          "@@type": "Question",
          "name": "Can we keep our existing content, domain, and email configuration?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. We preserve all your valuable existing content, customer data, and domain configuration while giving the visual design and underlying code an overhaul."
          }
        },
        {
          "@@type": "Question",
          "name": "What CMS or technology stack do you recommend for our new site?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Depending on your content workflow, we build on high-performance frameworks like Laravel, headless WordPress, Next.js, or static site generators paired with Tailwind CSS and Vite for sub-second speeds."
          }
        },
        {
          "@@type": "Question",
          "name": "Do you provide warranty and support after the redesign launches?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Every redesign project includes a comprehensive 30-day post-launch warranty covering bug fixes, speed telemetry monitoring, and Search Console indexing verification."
          }
        }
      ]
    }
  ]
}
</script>
@endpush