@extends('layouts.app')

@section('title', 'Dedicated Maintenance & Support for Bluebase Projects | Bluebase Technologies')
@section('meta_description', 'High-availability maintenance, proactive security updates, 24/7 uptime monitoring, and priority engineer sprint reserves provided exclusively for projects built and delivered by Bluebase.')

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
          <span itemprop="name" aria-current="page">Maintenance &amp; Support</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Client Retainers &bull; Dedicated Project Support</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Continuous Maintenance &amp; Support <br><mark>for Bluebase Projects</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      Dedicated high-availability maintenance, proactive security updates, <br class="desktop-br">and priority sprint support &mdash; exclusively for applications engineered by Bluebase.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=maintenance-support" class="c-btn -primary">
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
      <div class="hero-badge-item">For Bluebase Projects Only</div>
      <div class="hero-badge-item">Senior Engineer On-Call</div>
      <div class="hero-badge-item">99.9% Uptime SLA</div>
    </div>

  </div>
</section>

<!-- MARQUEE SECTION -->
<section class="marquee-section">
  <div class="container">
    <h2 class="marquee-heading" data-viewport="true">Trusted by modern brands, founders, and growing businesses worldwide</h2>
  </div>
  <div class="marquee-container">
        <div class="marquee-track">
      <div class="marquee-item"><img src="{{ asset('images/clients/aarohi-logo.webp') }}" alt="Aarohi Classic Championship" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/aarya-logo.webp') }}" alt="Aarya Waste Innovations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/austin-logo.webp') }}" alt="Austin Moto Premium" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/diets-logo.webp') }}" alt="Diets by Dietitian" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/dream-logo.webp') }}" alt="Dreamland Vacations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/omg-logo.webp') }}" alt="OMG Rental Bikes" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/rednetik-logo.webp') }}" alt="Rednetik" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shine-interior-logo.png') }}" alt="Shinne Interior" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shristiyam_logo.webp') }}" alt="Shristiyam" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/trevanta_logo.webp') }}" alt="Trevanta International" loading="lazy"></div>

      <!-- Loop duplicates for continuous smooth marquee scroller -->
      <div class="marquee-item"><img src="{{ asset('images/clients/aarohi-logo.webp') }}" alt="Aarohi Classic Championship" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/aarya-logo.webp') }}" alt="Aarya Waste Innovations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/austin-logo.webp') }}" alt="Austin Moto Premium" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/diets-logo.webp') }}" alt="Diets by Dietitian" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/dream-logo.webp') }}" alt="Dreamland Vacations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/omg-logo.webp') }}" alt="OMG Rental Bikes" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/rednetik-logo.webp') }}" alt="Rednetik" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shine-interior-logo.png') }}" alt="Shinne Interior" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shristiyam_logo.webp') }}" alt="Shristiyam" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/trevanta_logo.webp') }}" alt="Trevanta International" loading="lazy"></div>
    </div>
  </div>
  </div>
</section>

<!-- EXCLUSIVE POLICY NOTICE BANNER -->
<section class="subpage-section" style="padding-bottom: 20px;">
  <div class="container">
    <div style="background: rgba(0, 80, 231, 0.04); border: 1px solid rgba(0, 80, 231, 0.2); border-radius: 12px; padding: 24px 28px; display: flex; align-items: center; justify-content: space-between; gap: 20px; flex-wrap: wrap;" data-viewport="true">
      <div style="display: flex; align-items: flex-start; gap: 16px; max-width: 820px;">
        <div style="width: 40px; height: 40px; border-radius: 8px; background: rgba(0, 80, 231, 0.12); border: 1px solid rgba(0, 80, 231, 0.25); display: flex; align-items: center; justify-content: center; flex-shrink: 0; color: #0050E7;">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <div>
          <h3 style="font-size: 1.05rem; font-weight: 700; color: var(--color-text-main, #0f172a); margin: 0 0 6px;">Why We Support Only Bluebase-Engineered Builds</h3>
          <p style="font-size: 0.88rem; color: var(--color-text-muted, #64748b); line-height: 1.6; margin: 0;">
            We do not run an outsourced generic helpdesk for third-party spaghetti code. Our maintenance retainers are limited strictly to digital products engineered by our studio. Because our senior developers built your architecture from day one, we guarantee instant root-cause resolution, zero onboarding friction, and uncompromising 99.9% uptime.
          </p>
        </div>
      </div>
      <div>
        <span class="maintenance-exclusive-badge">Limited Client Retainers</span>
      </div>
    </div>
  </div>
</section>

<!-- INTERACTIVE MAINTENANCE CONSOLE SECTION -->
<section class="subpage-section -gray" id="interactive-maintenance-console">
  <div class="container">
    <div class="text-center" style="max-width: 860px; margin: 0 auto 40px;" data-viewport="true">
      <span class="section-tag">Production Operations</span>
      <h2 class="section-title">Bluebase Project Fleet Health &amp; <mark>SLA Console</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Inspect real-time uptime telemetry, automated dependency security patches, offsite backups, and direct engineer response queues.</p>
    </div>

    <div class="maintenance-console-wrapper" data-viewport="true">
      <div class="maintenance-console-window">
        <!-- Chrome Header Bar -->
        <div class="maintenance-console-chrome">
          <div class="maintenance-chrome-left">
            <div class="maintenance-traffic-dots">
              <span class="maintenance-dot -red"></span>
              <span class="maintenance-dot -yellow"></span>
              <span class="maintenance-dot -green"></span>
            </div>
            <div class="maintenance-doc-title">
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#38bdf8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
              <span>status.bluebase.io/v1 &bull; Bluebase Client Fleet Telemetry</span>
            </div>
          </div>
          <div class="maintenance-chrome-right">
            <div class="maintenance-status-pill">
              <span class="maintenance-status-dot"></span>
              <span>All Systems Operational (99.99%)</span>
            </div>
          </div>
        </div>

        <!-- Mode Navigation Bar -->
        <div class="maintenance-console-nav" role="tablist" aria-label="Maintenance Modes">
          <div class="maintenance-nav-tabs">
            <button type="button" class="maintenance-nav-tab active" data-target="panel-telemetry" role="tab" aria-selected="true" id="tab-telemetry">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
              <span>Live Uptime &amp; Telemetry</span>
            </button>
            <button type="button" class="maintenance-nav-tab" data-target="panel-security" role="tab" aria-selected="false" id="tab-security">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              <span>Security &amp; Patching Pipeline</span>
            </button>
            <button type="button" class="maintenance-nav-tab" data-target="panel-backups" role="tab" aria-selected="false" id="tab-backups">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span>Disaster Recovery &amp; Snapshots</span>
            </button>
            <button type="button" class="maintenance-nav-tab" data-target="panel-sla" role="tab" aria-selected="false" id="tab-sla">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
              <span>Engineer SLA &amp; Incident Dispatch</span>
            </button>
            <button type="button" class="maintenance-nav-tab" data-target="panel-sprint" role="tab" aria-selected="false" id="tab-sprint">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 12 12 22 22 12 12 2"/></svg>
              <span>Sprint Allocation &amp; Iteration Bank</span>
            </button>
          </div>
        </div>

        <!-- TAB PANEL 1: Live Uptime & Telemetry -->
        <div class="maintenance-console-panel active" id="panel-telemetry" role="tabpanel" aria-labelledby="tab-telemetry">
          <div class="maintenance-grid-4">
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #10b981;">99.99%</div>
              <div class="maintenance-metric-label">90-Day Fleet Uptime</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Zero unannounced downtime</div>
            </div>
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #38bdf8;">68ms</div>
              <div class="maintenance-metric-label">Avg Global TTFB</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Edge accelerated across 280+ PoPs</div>
            </div>
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #818cf8;">60s</div>
              <div class="maintenance-metric-label">Heartbeat Ping Interval</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Multi-region synthetic monitors</div>
            </div>
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #10b981;">0</div>
              <div class="maintenance-metric-label">Active Degradations</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">All services fully healthy</div>
            </div>
          </div>

          <div style="margin-top: 20px; background: rgba(0, 0, 0, 0.3); border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.08); padding: 16px;">
            <div style="font-size: 0.76rem; font-weight: 700; color: #38bdf8; text-transform: uppercase; letter-spacing: 0.04em; margin-bottom: 12px;">
              Live Infrastructure Node Telemetry
            </div>
            <div style="display: flex; flex-direction: column; gap: 10px; font-size: 0.8rem; font-family: var(--font-mono, monospace);">
              <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 8px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;"></span>
                  <span style="color: #f8fafc; font-weight: 600;">Production API Gateway &amp; Microservices</span>
                </div>
                <span style="color: #10b981;">Operational (42ms latency)</span>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 8px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;"></span>
                  <span style="color: #f8fafc; font-weight: 600;">Managed Database Connection Pool (MySQL 8.0)</span>
                </div>
                <span style="color: #10b981;">Healthy (14% active connections, 0 locks)</span>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255, 255, 255, 0.05); padding-bottom: 8px;">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;"></span>
                  <span style="color: #f8fafc; font-weight: 600;">In-Memory Redis Cache &amp; Session Store</span>
                </div>
                <span style="color: #10b981;">Healthy (99.6% cache hit ratio)</span>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center;">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981;"></span>
                  <span style="color: #f8fafc; font-weight: 600;">SSL/TLS Wildcard Security Certificate</span>
                </div>
                <span style="color: #38bdf8;">Valid (318 days until automated renewal)</span>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANEL 2: Security & Patching Pipeline -->
        <div class="maintenance-console-panel" id="panel-security" role="tabpanel" aria-labelledby="tab-security">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">Automated Security Auditing &amp; Zero-Downtime Patching</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">Proactive framework patches applied first on staging clones with automated integration tests.</p>
            </div>
            <span class="maintenance-status-pill">Vulnerabilities: 0 Detected</span>
          </div>

          <div class="maintenance-terminal-box">
            <div class="maintenance-log-line">
              <span class="maintenance-log-time">[04:12:08 UTC]</span>
              <span style="color: #38bdf8;">AUDIT:</span>
              <span style="color: #86efac;">Running Composer &amp; NPM lockfile audit across production dependencies...</span>
            </div>
            <div class="maintenance-log-line">
              <span class="maintenance-log-time">[04:12:14 UTC]</span>
              <span style="color: #10b981;">SUCCESS:</span>
              <span style="color: #f8fafc;">0 High, 0 Critical CVE advisories detected. All libraries compliant with OWASP standards.</span>
            </div>
            <div class="maintenance-log-line">
              <span class="maintenance-log-time">[07:30:22 UTC]</span>
              <span style="color: #fbbf24;">SECURITY PATCH:</span>
              <span style="color: #f8fafc;">Framework security update staged on isolated testing environment.</span>
            </div>
            <div class="maintenance-log-line">
              <span class="maintenance-log-time">[07:31:05 UTC]</span>
              <span style="color: #38bdf8;">CI/CD:</span>
              <span style="color: #86efac;">182 automated unit &amp; regression tests passed (0 failures).</span>
            </div>
            <div class="maintenance-log-line">
              <span class="maintenance-log-time">[07:32:00 UTC]</span>
              <span style="color: #10b981;">DEPLOYED:</span>
              <span style="color: #f8fafc;">Hot-swapped to production fleet via rolling zero-downtime deployment.</span>
            </div>
            <div class="maintenance-log-line">
              <span class="maintenance-log-time">[12:00:00 UTC]</span>
              <span style="color: #38bdf8;">WAF TELEMETRY:</span>
              <span style="color: #94a3b8;">Cloudflare WAF blocked 4,120 malicious scraping requests &bull; Zero false positives.</span>
            </div>
          </div>
        </div>

        <!-- TAB PANEL 3: Disaster Recovery & Snapshots -->
        <div class="maintenance-console-panel" id="panel-backups" role="tabpanel" aria-labelledby="tab-backups">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">Dual-Region Encrypted Offsite Snapshots</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">Automatic daily database dumps and asset backups synchronized to AWS S3 &amp; Cloudflare R2.</p>
            </div>
            <span class="maintenance-status-pill">Recovery RTO: &lt;15 Mins</span>
          </div>

          <div style="display: flex; flex-direction: column; gap: 10px;">
            <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 8px; padding: 12px 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
              <div>
                <div style="font-size: 0.82rem; font-weight: 700; color: #f8fafc;">Daily Full Snapshot (Database &amp; Media Assets)</div>
                <div style="font-size: 0.72rem; color: #94a3b8; font-family: var(--font-mono, monospace);">Today &bull; 03:00 UTC &bull; Destination: AWS S3 us-east-1 (AES-256 Encrypted)</div>
              </div>
              <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 0.74rem; color: #94a3b8; font-family: var(--font-mono, monospace);">1.84 GB</span>
                <span class="maintenance-status-pill" style="padding: 2px 8px; font-size: 0.7rem;">Verified Healthy</span>
              </div>
            </div>

            <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 8px; padding: 12px 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
              <div>
                <div style="font-size: 0.82rem; font-weight: 700; color: #f8fafc;">Redundant Secondary Mirror</div>
                <div style="font-size: 0.72rem; color: #94a3b8; font-family: var(--font-mono, monospace);">Yesterday &bull; 03:00 UTC &bull; Destination: Cloudflare R2 Global Edge (Encrypted)</div>
              </div>
              <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 0.74rem; color: #94a3b8; font-family: var(--font-mono, monospace);">1.82 GB</span>
                <span class="maintenance-status-pill" style="padding: 2px 8px; font-size: 0.7rem;">Verified Healthy</span>
              </div>
            </div>

            <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 8px; padding: 12px 16px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px;">
              <div>
                <div style="font-size: 0.82rem; font-weight: 700; color: #f8fafc;">Archived Rolling Retention Point</div>
                <div style="font-size: 0.72rem; color: #94a3b8; font-family: var(--font-mono, monospace);">2 Days Ago &bull; 03:00 UTC &bull; Destination: Cold Storage Offsite Vault</div>
              </div>
              <div style="display: flex; align-items: center; gap: 10px;">
                <span style="font-size: 0.74rem; color: #94a3b8; font-family: var(--font-mono, monospace);">1.80 GB</span>
                <span class="maintenance-status-pill" style="padding: 2px 8px; font-size: 0.7rem;">Verified Healthy</span>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB PANEL 4: Engineer SLA & Incident Dispatch -->
        <div class="maintenance-console-panel" id="panel-sla" role="tabpanel" aria-labelledby="tab-sla">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">Direct Senior Engineer Response &amp; Priority SLAs</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">Supported directly by the original architects who engineered your codebase. Zero helpdesk triage.</p>
            </div>
            <span class="maintenance-status-pill">Avg P1 Resolution: 24 Mins</span>
          </div>

          <div class="maintenance-grid-4">
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #ef4444;">&lt;30m</div>
              <div class="maintenance-metric-label">P1 Critical Outage SLA</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Direct phone &amp; SMS engineer page</div>
            </div>
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #fbbf24;">&lt;2h</div>
              <div class="maintenance-metric-label">P2 Major Issue SLA</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Direct Slack / WhatsApp VIP channel</div>
            </div>
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #38bdf8;">&lt;24h</div>
              <div class="maintenance-metric-label">P3 Minor Polish SLA</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Assigned directly into active sprint</div>
            </div>
            <div class="maintenance-metric-box">
              <div class="maintenance-metric-val" style="color: #10b981;">100%</div>
              <div class="maintenance-metric-label">Senior Architect Access</div>
              <div style="font-size: 0.7rem; color: #94a3b8; margin-top: 4px;">Zero junior tiers or middle managers</div>
            </div>
          </div>
        </div>

        <!-- TAB PANEL 5: Sprint Allocation & Iteration Bank -->
        <div class="maintenance-console-panel" id="panel-sprint" role="tabpanel" aria-labelledby="tab-sprint">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; flex-wrap: wrap; gap: 10px;">
            <div>
              <span style="font-size: 0.85rem; font-weight: 700; color: #f8fafc;">Dedicated Monthly Development Sprint Reserve</span>
              <p style="font-size: 0.75rem; color: #94a3b8; margin: 2px 0 0;">Dedicated monthly developer hours for ongoing feature enhancements with 60-day rollover flexibility.</p>
            </div>
            <span class="maintenance-status-pill">Rollover Window: 60 Days</span>
          </div>

          <div style="background: rgba(0, 0, 0, 0.3); border-radius: 8px; border: 1px solid rgba(255, 255, 255, 0.08); padding: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
              <span style="font-size: 0.82rem; font-weight: 700; color: #f8fafc;">Current Month Sprint Utilization</span>
              <span style="font-size: 0.78rem; color: #38bdf8; font-family: var(--font-mono, monospace);">14h used / 20h reserved (6h rolled over)</span>
            </div>
            <div style="background: rgba(255, 255, 255, 0.08); height: 8px; border-radius: 999px; overflow: hidden; margin-bottom: 14px;">
              <div style="background: linear-gradient(90deg, #0050E7, #38bdf8); height: 100%; width: 70%; border-radius: 999px;"></div>
            </div>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; font-size: 0.78rem; color: #cbd5e1;">
              <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.06); border-radius: 6px; padding: 10px;">
                <div style="font-weight: 700; color: #86efac; margin-bottom: 2px;">Completed This Month</div>
                <div>Added automated CSV transaction export &bull; Optimized checkout funnel speed</div>
              </div>
              <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.06); border-radius: 6px; padding: 10px;">
                <div style="font-weight: 700; color: #38bdf8; margin-bottom: 2px;">Upcoming Sprint Queue</div>
                <div>Stripe webhook retry logic expansion &bull; Redis query memory defragmentation</div>
              </div>
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
      <span class="section-tag">Dedicated Capabilities</span>
      <h2 class="section-title">Long-Term Reliability for <mark>Bluebase Platforms</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Engineered exclusively for our client partners to safeguard uptime, prevent security drift, and support continuous growth.</p>
    </div>

    <div class="services-catalog-grid">
      <!-- Capability 0: Dedicated Maintenance for Bluebase Builds (Span 7) -->
      <div class="service-card-modern -span-7 stagger-1" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Exclusive Retainer</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
          </div>
          <h3 class="service-title">Dedicated Maintenance for Bluebase Builds</h3>
          <p class="service-desc">We maintain only the platforms we engineer, guaranteeing deep architectural knowledge and zero third-party code friction.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Supported directly by the original architects who built your system
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Zero ramp-up time or knowledge transfer delays during incidents
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Deep familiarity with your database schemas, APIs, and edge CDN
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Direct Git branch deployments adhering to strict CI/CD pipelines
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Bluebase Exclusive</span>
            <span class="tech-tag-pill">Code Continuity</span>
            <span class="tech-tag-pill">Zero Ramp-up</span>
            <span class="tech-tag-pill">Original Team</span>
          </div>
          <a href="{{ route('contact') }}?service=maintenance-support" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- Capability 1: Proactive 24/7 Health & Uptime Telemetry (Span 5) -->
      <div class="service-card-modern -span-5 stagger-2" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Uptime Telemetry</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
            </div>
          </div>
          <h3 class="service-title">Proactive 24/7 Health &amp; Uptime Telemetry</h3>
          <p class="service-desc">Continuous multi-region synthetic heartbeat checks detecting server latency and errors before users notice.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Continuous 60-second pings across global endpoints
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Instant automated SMS, Slack &amp; phone alerts
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Server CPU, RAM, disk space &amp; query latency tracking
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Automated service healing &amp; worker restarts
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">24/7 Telemetry</span>
            <span class="tech-tag-pill">60s Pings</span>
            <span class="tech-tag-pill">Instant Alerts</span>
            <span class="tech-tag-pill">99.9% Uptime</span>
          </div>
          <a href="{{ route('contact') }}?service=maintenance-support" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- Capability 2: Automated Security & Dependency Patching (Span 5) -->
      <div class="service-card-modern -span-5 stagger-3" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Patch Management</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
            </div>
          </div>
          <h3 class="service-title">Automated Security &amp; Dependency Patching</h3>
          <p class="service-desc">Keep your production stack immune to emerging vulnerabilities with disciplined framework and package updates.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Regular framework updates (Laravel, Node.js, PHP)
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Automated third-party vulnerability audits &amp; upgrades
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Automated SSL certificate renewals &amp; HTTPS enforcement
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Cloudflare WAF rule hardening &amp; bot filtering
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Security Patches</span>
            <span class="tech-tag-pill">Vulnerability Audits</span>
            <span class="tech-tag-pill">SSL Autopilot</span>
            <span class="tech-tag-pill">Zero-Day Defense</span>
          </div>
          <a href="{{ route('contact') }}?service=maintenance-support" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- Capability 3: Priority SLA & Direct Engineer Access (Span 7) -->
      <div class="service-card-modern -span-7 stagger-4" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Priority Support</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
          </div>
          <h3 class="service-title">Priority SLA &amp; Direct Engineer Access</h3>
          <p class="service-desc">Skip bureaucratic support tickets. Connect directly with the developers who wrote your code over private Slack channels.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Sub-30 minute critical incident SLA response time
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Dedicated Slack Connect &amp; WhatsApp VIP developer line
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Monthly allocated sprint hours for feature enhancements
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              60-day sprint hour rollover with zero penalty or vendor lock-in
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Direct Slack</span>
            <span class="tech-tag-pill">Sub-30m SLA</span>
            <span class="tech-tag-pill">Feature Sprints</span>
            <span class="tech-tag-pill">Monthly Rollover</span>
          </div>
          <a href="{{ route('contact') }}?service=maintenance-support" class="service-action-link">
            <span>Get Started</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- UX PERFORMANCE & RELIABILITY BENCHMARKS SECTION -->
<section class="ux-benchmarks-section subpage-section -gray" id="ux-benchmarks">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 50px;" data-viewport="true">
      <span class="section-tag">Reliability Benchmarks</span>
      <h2 class="section-title">Engineered for Uncompromising <mark>Uptime &amp; SLA Execution</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every benchmark is backed by real-time infrastructure monitors and contractually protected service level agreements.</p>
    </div>

    <div class="ux-benchmarks-grid">
      <!-- Benchmark Card 1: 99.9% Production Uptime -->
      <div class="ux-benchmark-card stagger-1" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Availability SLA</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">99.9<span class="ux-benchmark-unit">%</span></div>
            <span class="ux-benchmark-pill">Contractual SLA</span>
          </div>

          <!-- Micro-Widget: Uptime Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 99.9%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Industry Avg: 98.5%</span>
              <span style="color: var(--color-primary); font-weight: 700;">Bluebase: 99.99% Actual</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Production Uptime SLA</h3>
          <p class="ux-benchmark-desc">Guaranteed production availability backed by automated multi-region ping telemetry and automated server recovery.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>Enterprise SLA Standard</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Verified Uptime</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 2: <30min Critical Incident SLA -->
      <div class="ux-benchmark-card stagger-2" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Incident Response</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">&lt;30<span class="ux-benchmark-unit">min</span></div>
            <span class="ux-benchmark-pill">Critical Incident</span>
          </div>

          <!-- Micro-Widget: Response Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 90%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Avg Helpdesk: 4 Hours</span>
              <span style="color: var(--color-primary); font-weight: 700;">Bluebase: &lt;30 Mins</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Critical Incident SLA</h3>
          <p class="ux-benchmark-desc">Direct response by senior engineers who built your application, totally bypassing outsourced tier-1 triage.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>Direct Architect Dispatch</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Rapid Resolution</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 3: 100% Codebase Familiarity -->
      <div class="ux-benchmark-card stagger-3" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Zero Knowledge Gap</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">100<span class="ux-benchmark-unit">%</span></div>
            <span class="ux-benchmark-pill">Bluebase Builds</span>
          </div>

          <!-- Micro-Widget: Familiarity Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 100%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Legacy Onboarding: Weeks</span>
              <span style="color: var(--color-primary); font-weight: 700;">Bluebase: Day One</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Codebase Familiarity</h3>
          <p class="ux-benchmark-desc">Maintained exclusively by the engineering studio that authored your Git repositories, data models, and API integrations.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>Author-Level Precision</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Zero Guesswork</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 4: 24/7 Automated Health Monitoring -->
      <div class="ux-benchmark-card stagger-4" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Active Telemetry</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">24/7<span class="ux-benchmark-unit"></span></div>
            <span class="ux-benchmark-pill">Synthetic Pings</span>
          </div>

          <!-- Micro-Widget: Monitoring Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 100%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Ping Interval: 60s</span>
              <span style="color: var(--color-primary); font-weight: 700;">Global Probes: Active</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Automated Health Monitoring</h3>
          <p class="ux-benchmark-desc">Continuous telemetry tracking CPU, memory, database query health, SSL expiration, and CDN edge latency.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>Full-Stack Observability</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Continuous Watch</span>
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
      <span class="section-tag">Our Operations Stack</span>
      <h2 class="section-title">Battle-Tested <mark>Monitoring &amp; DevOps Toolchain</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">We integrate enterprise-grade telemetry, automated backup vaults, and secure communication channels.</p>
    </div>

    <div class="tech-stack-grid">
      <!-- 01: Uptime & Telemetry -->
      <div class="tech-stack-category stagger-1" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
        </div>
        <h3 class="tech-cat-title">Uptime &amp; Telemetry</h3>
        <ul class="tech-cat-list">
          <li>Uptime Kuma Synthetic Pings</li>
          <li>Datadog Synthetic Probes</li>
          <li>Better Uptime Multi-Region</li>
          <li>Blackbox HTTP/TCP Monitors</li>
        </ul>
      </div>

      <!-- 02: Application Monitoring -->
      <div class="tech-stack-category stagger-2" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        <h3 class="tech-cat-title">Application Monitoring</h3>
        <ul class="tech-cat-list">
          <li>Sentry Real-Time Error Logs</li>
          <li>Laravel Telescope &amp; Pulse</li>
          <li>Logstash &amp; Elasticsearch</li>
          <li>New Relic APM Tracing</li>
        </ul>
      </div>

      <!-- 03: Backup & Recovery -->
      <div class="tech-stack-category stagger-3" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
        </div>
        <h3 class="tech-cat-title">Backup &amp; Recovery</h3>
        <ul class="tech-cat-list">
          <li>AWS S3 Encrypted Buckets</li>
          <li>Cloudflare R2 Global Edge</li>
          <li>Automated MySQL Snapshots</li>
          <li>Point-in-Time PITR Rollbacks</li>
        </ul>
      </div>

      <!-- 04: Security & Patching -->
      <div class="tech-stack-category stagger-4" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="tech-cat-title">Security &amp; Patching</h3>
        <ul class="tech-cat-list">
          <li>Dependabot &amp; Snyk Auditing</li>
          <li>SSL/TLS Automated Certbot</li>
          <li>Nginx Rate Limiting</li>
          <li>Cloudflare Enterprise WAF</li>
        </ul>
      </div>

      <!-- 05: Direct Communication -->
      <div class="tech-stack-category stagger-5" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3 class="tech-cat-title">Direct Communication</h3>
        <ul class="tech-cat-list">
          <li>Dedicated Client Slack Connect</li>
          <li>WhatsApp Developer Line</li>
          <li>Linear Sprint Board Sync</li>
          <li>Loom Video Walkthroughs</li>
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
      <h2 class="section-title">How Our Retainers Operate</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, sprint-based approach ensuring continuous stability and zero production regressions.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Handover &amp; Telemetry</h3>
        <p class="process-step-desc">Upon product deployment, we establish synthetic uptime monitors, automated S3 snapshot backups, and configure alert channels within 24 hours.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">24/7 Monitoring</h3>
        <p class="process-step-desc">Automated 60-second heartbeat checks actively inspect API latencies, memory pressure, and SSL status across global regions.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Proactive Patching</h3>
        <p class="process-step-desc">We test all security patches on isolated staging clones and perform zero-downtime rolling production hot-swaps.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">Sprint Feature Iterations</h3>
        <p class="process-step-desc">Use your allocated monthly hours for UX improvements, conversion optimizations, and third-party API integrations.</p>
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
        <p class="section-subtitle">Direct, transparent answers regarding our dedicated maintenance and client support retainers.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>Do you offer maintenance for websites or apps built by external agencies?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>No. We provide ongoing maintenance and support exclusively for applications and platforms engineered and delivered by Bluebase (or select long-term client partners). This strict policy ensures our senior engineers know every line of code intimately, eliminates third-party spaghetti code surprises, and allows us to contractually guarantee rapid sub-30 minute SLA response times.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>What is included in a Bluebase project maintenance retainer?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Retainers include 24/7 automated uptime telemetry, daily encrypted offsite backups, framework and dependency security patching, monthly slow query optimization, direct Slack access to your lead developers, and a dedicated monthly hour reserve for feature iterations.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How quickly do you respond during a critical production emergency?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>For critical P1 production outages, our on-call senior engineers are alerted via automated SMS and direct phone pages within 60 seconds, with an initial incident response guarantee of under 30 minutes.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Can unused monthly maintenance hours roll over?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. Retainer plans allow allocated feature improvement hours to roll over for up to 60 days, giving you the flexibility to batch new feature releases or prepare for seasonal traffic spikes.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-5" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do we communicate with engineers during maintenance?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>You have a direct, private Slack Connect channel and WhatsApp line connected directly to the senior engineers who built your platform. No support tickets or non-technical intermediaries.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-6" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Are there long-term contract lock-ins?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>No. Our maintenance agreements operate on a flexible month-to-month basis. You can adjust your hours or pause with 30 days notice with zero cancellation fees or vendor lock-in.</p>
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
          Ready to Build Your Next Product?<br><mark>Let's Build It Right</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Partner with an engineering studio that stands behind every line of code with dedicated post-launch support and continuous SLAs.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=maintenance-support" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
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
          <div class="cta-pill-item">For Bluebase Projects Only</div>
          <div class="cta-pill-item">Senior Engineer On-Call</div>
          <div class="cta-pill-item">99.9% Uptime SLA</div>
          <div class="cta-pill-item">Direct Slack Access</div>
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
  const tabs = document.querySelectorAll('.maintenance-nav-tab');
  const panels = document.querySelectorAll('.maintenance-console-panel');

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
});
</script>

<!-- Comprehensive Schema.org Structured Data (SEO / AEO / GEO Optimization) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url('/maintenance-support') }}",
      "url": "{{ url('/maintenance-support') }}",
      "name": "Dedicated Maintenance & Support for Bluebase Projects | Bluebase Technologies",
      "description": "High-availability maintenance, proactive security updates, 24/7 uptime monitoring, and priority engineer sprint reserves provided exclusively for projects built and delivered by Bluebase.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/maintenance-support#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/maintenance-support#breadcrumb') }}",
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
          "name": "Maintenance & Support",
          "item": "{{ url('/maintenance-support') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/maintenance-support#service') }}",
      "name": "Dedicated Maintenance & Support for Bluebase Projects | Bluebase Technologies",
      "serviceType": "Dedicated Web & App Maintenance Retainers",
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
      "@@id": "{{ url('/maintenance-support#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "Do you offer maintenance for websites or apps built by external agencies?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "No. We provide ongoing maintenance and support exclusively for applications and platforms engineered and delivered by Bluebase (or select long-term client partners). This strict policy ensures our senior engineers know every line of code intimately, eliminates third-party spaghetti code surprises, and allows us to contractually guarantee rapid sub-30 minute SLA response times."
          }
        },
        {
          "@@type": "Question",
          "name": "What is included in a Bluebase project maintenance retainer?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Retainers include 24/7 automated uptime telemetry, daily encrypted offsite backups, framework and dependency security patching, monthly slow query optimization, direct Slack access to your lead developers, and a dedicated monthly hour reserve for feature iterations."
          }
        },
        {
          "@@type": "Question",
          "name": "How quickly do you respond during a critical production emergency?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "For critical P1 production outages, our on-call senior engineers are alerted via automated SMS and direct phone pages within 60 seconds, with an initial incident response guarantee of under 30 minutes."
          }
        },
        {
          "@@type": "Question",
          "name": "Can unused monthly maintenance hours roll over?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. Retainer plans allow allocated feature improvement hours to roll over for up to 60 days, giving you the flexibility to batch new feature releases or prepare for seasonal traffic spikes."
          }
        },
        {
          "@@type": "Question",
          "name": "How do we communicate with engineers during maintenance?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You have a direct, private Slack Connect channel and WhatsApp line connected directly to the senior engineers who built your platform. No support tickets or non-technical intermediaries."
          }
        },
        {
          "@@type": "Question",
          "name": "Are there long-term contract lock-ins?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "No. Our maintenance agreements operate on a flexible month-to-month basis. You can adjust your hours or pause with 30 days notice with zero cancellation fees or vendor lock-in."
          }
        }
      ]
    }
  ]
}
</script>
@endpush