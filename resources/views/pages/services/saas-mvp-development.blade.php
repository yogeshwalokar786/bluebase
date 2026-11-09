@extends('layouts.app')

@section('title', 'SaaS MVP Development Services | Rapid 0 to 1 Launch | Bluebase Technologies')
@section('meta_description', 'Turn your startup idea into a production-ready SaaS MVP in 3 to 6 weeks. Multi-tenant architecture, automated Stripe billing, role-based auth, and interactive user dashboards.')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- SEO / AEO / GEO Hidden Breadcrumb (Active for Crawlers & Bots, Visually Hidden) -->
    <nav aria-label="Breadcrumb" class="hero-breadcrumb">
      <ol class="breadcrumb-pill" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('home') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Home</span>
          </a>
          <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('services') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Services</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">SaaS MVP Development</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">SaaS Engineering Studio</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Launch Your SaaS MVP <br><mark>From Concept to Revenue</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      We build production-ready SaaS applications with multi-tenant architecture, automated Stripe billing, and interactive dashboards designed to validate and acquire paying users fast.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=saas-mvp-development" class="c-btn -primary">
        <span class="c-btn__txt">Start Your SaaS Project</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
          <span class="c-btn__ico-hover">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
        </span>
      </a>
      <a href="#interactive-saas-demo" class="c-btn -secondary">
        <span class="c-btn__txt">Explore Live App Demo</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base">
            <svg viewBox="0 0 16 16"><path d="M8 3v10M3 8l5 5 5-5"/></svg>
          </span>
          <span class="c-btn__ico-hover">
            <svg viewBox="0 0 16 16"><path d="M8 3v10M3 8l5 5 5-5"/></svg>
          </span>
        </span>
      </a>
    </div>

    <div class="hero-badges stagger-4" data-viewport="true">
      <div class="hero-badge-item">Rapid 3 to 6 Week Launch</div>
      <div class="hero-badge-item">Multi-Tenant &amp; Stripe Ready</div>
      <div class="hero-badge-item">100% Code &amp; IP Ownership</div>
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

<!-- INTERACTIVE SAAS APPLICATION SHOWCASE SECTION -->
<section class="saas-showcase-section" id="interactive-saas-demo">
  <div class="container">
    
    <div class="text-center" style="max-width: 840px; margin: 0 auto 36px;" data-viewport="true">
      <span class="section-tag">Interactive SaaS Platform</span>
      <h2 class="section-title">Experience the Production SaaS Stack We Engineer</h2>
      <p class="section-subtitle" style="margin: 0 auto;">
        Interact with the live SaaS application below. Click through the module tabs to test real-time MRR analytics, multi-tenant workspace provisioning, automated Stripe billing, API gateway controls, and granular role permissions.
      </p>
    </div>

    <!-- Module Switcher Tabs -->
    <div class="saas-nav-tabs-wrapper" data-viewport="true">
      <div class="saas-nav-tabs" role="tablist">
        <button class="saas-nav-tab active" data-tab="analytics" role="tab" aria-selected="true">
          <svg viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
          <span>MRR &amp; Analytics</span>
        </button>
        <button class="saas-nav-tab" data-tab="tenants" role="tab" aria-selected="false">
          <svg viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          <span>Multi-Tenant Workspaces</span>
        </button>
        <button class="saas-nav-tab" data-tab="billing" role="tab" aria-selected="false">
          <svg viewBox="0 0 24 24"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
          <span>Stripe Subscriptions</span>
        </button>
        <button class="saas-nav-tab" data-tab="api" role="tab" aria-selected="false">
          <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
          <span>API Gateway &amp; Sandbox</span>
        </button>
        <button class="saas-nav-tab" data-tab="rbac" role="tab" aria-selected="false">
          <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          <span>Role-Based Auth (RBAC)</span>
        </button>
      </div>
    </div>

    <!-- The SaaS Application Desktop Window Frame -->
    <div class="saas-app-window" data-viewport="true">
      
      <!-- Top Chrome Bar -->
      <div class="saas-app-chrome">
        <div class="saas-traffic-lights">
          <div class="saas-traffic-dot -red" title="Close Window"></div>
          <div class="saas-traffic-dot -yellow" title="Minimize Window"></div>
          <div class="saas-traffic-dot -green" title="Expand Window"></div>
        </div>

        <div class="saas-chrome-center">
          <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <span>app.saasflow.io/workspace/acme-corp/analytics</span>
        </div>

        <div class="saas-chrome-right">
          <div class="saas-status-pill">
            <span class="saas-status-dot"></span>
            <span>All Systems Operational (24ms)</span>
          </div>
          <div class="saas-user-pill">
            <div class="saas-user-avatar">DC</div>
            <span>Devin Cole</span>
          </div>
        </div>
      </div>

      <!-- App Body (Sidebar + Viewport) -->
      <div class="saas-app-body">
        
        <!-- Left Sidebar Navigation -->
        <aside class="saas-app-sidebar">
          <div>
            <div class="saas-sidebar-brand">
              <div class="saas-brand-icon">S</div>
              <div class="saas-brand-meta">
                <span class="saas-brand-name">SaaSFlow Platform</span>
                <span class="saas-brand-badge">v2.4 Scale Tier</span>
              </div>
            </div>

            <div class="saas-workspace-select">
              <span>Acme Technologies</span>
              <svg viewBox="0 0 16 16" width="12" height="12" fill="currentColor"><path d="M4 6l4 4 4-4"/></svg>
            </div>

            <nav class="saas-sidebar-menu">
              <button class="saas-menu-item active" data-tab="analytics">
                <div class="saas-menu-item-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>
                  <span>MRR &amp; Analytics</span>
                </div>
                <span class="saas-menu-badge">$24.8k</span>
              </button>

              <button class="saas-menu-item" data-tab="tenants">
                <div class="saas-menu-item-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/></svg>
                  <span>Tenants &amp; Orgs</span>
                </div>
                <span class="saas-menu-badge">1,428</span>
              </button>

              <button class="saas-menu-item" data-tab="billing">
                <div class="saas-menu-item-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
                  <span>Stripe Subscriptions</span>
                </div>
                <span class="saas-menu-badge">Live</span>
              </button>

              <button class="saas-menu-item" data-tab="api">
                <div class="saas-menu-item-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                  <span>API Keys &amp; Hooks</span>
                </div>
                <span class="saas-menu-badge">99.9%</span>
              </button>

              <button class="saas-menu-item" data-tab="rbac">
                <div class="saas-menu-item-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  <span>Role Permissions</span>
                </div>
                <span class="saas-menu-badge">RBAC</span>
              </button>
            </nav>
          </div>

          <!-- Bottom Quota Widget -->
          <div class="saas-sidebar-footer-widget">
            <div class="saas-widget-label">
              <span>Monthly API Quota</span>
              <span>78%</span>
            </div>
            <div class="saas-widget-progress">
              <div class="saas-widget-fill"></div>
            </div>
            <div class="saas-widget-plan">
              <span>78,410 / 100,000 req</span>
              <a href="{{ route('contact') }}?service=saas-mvp-development" class="saas-widget-link">Upgrade</a>
            </div>
          </div>
        </aside>

        <!-- Right Main Viewport Area -->
        <main class="saas-app-viewport">
          
          <!-- TAB PANEL 1: MRR & REVENUE ANALYTICS -->
          <div class="saas-tab-panel active" id="panel-analytics">
            <div class="saas-viewport-header">
              <div>
                <h3 class="saas-viewport-title">MRR &amp; Revenue Analytics</h3>
                <p class="saas-viewport-subtitle">Real-time financial performance synchronized directly via Stripe webhooks.</p>
              </div>
              <div class="saas-header-actions">
                <button class="saas-pill-btn">
                  <span>Last 30 Days</span>
                  <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 6l4 4 4-4"/></svg>
                </button>
                <button class="saas-pill-btn -primary">
                  <svg viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2v10M4 8l4 4 4-4"/></svg>
                  <span>Export Report</span>
                </button>
              </div>
            </div>

            <!-- 4 Metric Cards -->
            <div class="saas-stat-cards-grid">
              <div class="saas-stat-card">
                <div class="saas-stat-card-label">Monthly Recurring (MRR)</div>
                <div class="saas-stat-card-value">$24,850.00</div>
                <div class="saas-stat-card-trend">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 11l5-5 5 5"/></svg>
                  <span>+18.4% vs last month</span>
                </div>
              </div>

              <div class="saas-stat-card">
                <div class="saas-stat-card-label">Paid Workspaces</div>
                <div class="saas-stat-card-value">1,428</div>
                <div class="saas-stat-card-trend -blue">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 11l5-5 5 5"/></svg>
                  <span>+84 new this week</span>
                </div>
              </div>

              <div class="saas-stat-card">
                <div class="saas-stat-card-label">Net Logo Churn</div>
                <div class="saas-stat-card-value">0.65%</div>
                <div class="saas-stat-card-trend">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 5l5 5 5-5"/></svg>
                  <span>-0.3% improvement</span>
                </div>
              </div>

              <div class="saas-stat-card">
                <div class="saas-stat-card-label">LTV / CAC Ratio</div>
                <div class="saas-stat-card-value">4.8x</div>
                <div class="saas-stat-card-trend">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 4L4 12"/></svg>
                  <span>Healthy Unit Economics</span>
                </div>
              </div>
            </div>

            <!-- SVG Visual Trend Chart -->
            <div class="saas-chart-box">
              <div class="saas-chart-header">
                <div>
                  <span class="saas-chart-title">MRR Trajectory (Current Sprint)</span>
                  <span style="font-size: 0.78rem; color: #059669; font-weight: 600; margin-left: 8px;">Target: $30,000</span>
                </div>
                <div class="saas-chart-filters">
                  <button class="saas-chart-filter-btn">7D</button>
                  <button class="saas-chart-filter-btn active">30D</button>
                  <button class="saas-chart-filter-btn">90D</button>
                  <button class="saas-chart-filter-btn">YTD</button>
                </div>
              </div>

              <svg class="saas-svg-chart" viewBox="0 0 760 160" preserveAspectRatio="none">
                <defs>
                  <linearGradient id="chartGrad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#0050E7" stop-opacity="0.22"/>
                    <stop offset="100%" stop-color="#0050E7" stop-opacity="0.0"/>
                  </linearGradient>
                </defs>
                <!-- Grid Lines -->
                <line x1="0" y1="40" x2="760" y2="40" stroke="#f1f5f9" stroke-width="1"/>
                <line x1="0" y1="80" x2="760" y2="80" stroke="#f1f5f9" stroke-width="1"/>
                <line x1="0" y1="120" x2="760" y2="120" stroke="#f1f5f9" stroke-width="1"/>
                <!-- Area Fill -->
                <path d="M 0,130 Q 120,120 220,95 T 440,65 T 620,40 T 760,20 L 760,160 L 0,160 Z" fill="url(#chartGrad)"/>
                <!-- Line -->
                <path d="M 0,130 Q 120,120 220,95 T 440,65 T 620,40 T 760,20" fill="none" stroke="#0050E7" stroke-width="3" stroke-linecap="round"/>
                <!-- Data Points -->
                <circle cx="220" cy="95" r="4.5" fill="#ffffff" stroke="#0050E7" stroke-width="2.5"/>
                <circle cx="440" cy="65" r="4.5" fill="#ffffff" stroke="#0050E7" stroke-width="2.5"/>
                <circle cx="620" cy="40" r="4.5" fill="#ffffff" stroke="#0050E7" stroke-width="2.5"/>
                <circle cx="760" cy="20" r="5" fill="#0050E7" stroke="#ffffff" stroke-width="2"/>
              </svg>
            </div>

            <!-- Customer Transactions Table -->
            <div class="saas-table-wrapper">
              <div class="saas-table-header">
                <h4 class="saas-table-title">Recent Workspace Subscriptions</h4>
                <span style="font-size: 0.78rem; color: var(--color-gray-500);">Live Webhook Feed</span>
              </div>
              <table class="saas-data-table">
                <thead>
                  <tr>
                    <th>Workspace</th>
                    <th>Plan Tier</th>
                    <th>MRR</th>
                    <th>Stripe Status</th>
                    <th>Renewal Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="saas-org-cell">
                        <div class="saas-org-badge">AC</div>
                        <div>
                          <div class="saas-org-name">Acme Technologies</div>
                          <div class="saas-org-sub">cus_9K4j2l9a...</div>
                        </div>
                      </div>
                    </td>
                    <td>Scale Tier</td>
                    <td><strong>$249.00</strong></td>
                    <td><span class="saas-pill-status -paid">● Active Paid</span></td>
                    <td>Nov 28, 2026</td>
                    <td><a href="#manage" style="color: var(--color-accent); font-weight: 600;">Manage</a></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="saas-org-cell">
                        <div class="saas-org-badge">HS</div>
                        <div>
                          <div class="saas-org-name">HyperScale AI</div>
                          <div class="saas-org-sub">cus_8B1q7m3e...</div>
                        </div>
                      </div>
                    </td>
                    <td>Growth Pro</td>
                    <td><strong>$79.00</strong></td>
                    <td><span class="saas-pill-status -paid">● Active Paid</span></td>
                    <td>Dec 02, 2026</td>
                    <td><a href="#manage" style="color: var(--color-accent); font-weight: 600;">Manage</a></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="saas-org-cell">
                        <div class="saas-org-badge">SX</div>
                        <div>
                          <div class="saas-org-name">Synthetix Labs</div>
                          <div class="saas-org-sub">cus_7P3w8x1z...</div>
                        </div>
                      </div>
                    </td>
                    <td>Team Pro</td>
                    <td><strong>$79.00</strong></td>
                    <td><span class="saas-pill-status -trial">● 14-Day Trial</span></td>
                    <td>Nov 19, 2026</td>
                    <td><a href="#manage" style="color: var(--color-accent); font-weight: 600;">Manage</a></td>
                  </tr>
                  <tr>
                    <td>
                      <div class="saas-org-cell">
                        <div class="saas-org-badge">NL</div>
                        <div>
                          <div class="saas-org-name">Nordic Logistics</div>
                          <div class="saas-org-sub">cus_6M9v4t2k...</div>
                        </div>
                      </div>
                    </td>
                    <td>Scale Tier</td>
                    <td><strong>$249.00</strong></td>
                    <td><span class="saas-pill-status -paid">● Active Paid</span></td>
                    <td>Nov 24, 2026</td>
                    <td><a href="#manage" style="color: var(--color-accent); font-weight: 600;">Manage</a></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>

          <!-- TAB PANEL 2: MULTI-TENANT WORKSPACES -->
          <div class="saas-tab-panel" id="panel-tenants">
            <div class="saas-viewport-header">
              <div>
                <h3 class="saas-viewport-title">Multi-Tenant Workspaces &amp; Schema Isolation</h3>
                <p class="saas-viewport-subtitle">Each organization enjoys strict database separation, automated subdomain routing, and dedicated storage buckets.</p>
              </div>
              <div class="saas-header-actions">
                <button class="saas-pill-btn -primary" id="openTenantModalBtn">
                  <svg viewBox="0 0 16 16" fill="currentColor"><path d="M8 2v12M2 8h12"/></svg>
                  <span>Provision New Tenant</span>
                </button>
              </div>
            </div>

            <div class="saas-tenant-grid">
              <div class="saas-tenant-card">
                <div class="saas-tenant-top">
                  <div>
                    <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: 2px;">Acme Corp</h4>
                    <span class="saas-tenant-domain">acme.saasflow.io</span>
                  </div>
                  <span class="saas-pill-status -active">● Schema Isolated</span>
                </div>
                <div class="saas-tenant-meta-list">
                  <div class="saas-tenant-meta-row"><span>Database Schema:</span><strong>tenant_acme_prod</strong></div>
                  <div class="saas-tenant-meta-row"><span>Active Seats:</span><strong>48 / 50 seats</strong></div>
                  <div class="saas-tenant-meta-row"><span>Query Latency:</span><strong style="color: #059669;">0.02ms (PostgreSQL)</strong></div>
                </div>
              </div>

              <div class="saas-tenant-card">
                <div class="saas-tenant-top">
                  <div>
                    <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: 2px;">HyperScale AI</h4>
                    <span class="saas-tenant-domain">hyperscale.saasflow.io</span>
                  </div>
                  <span class="saas-pill-status -active">● Schema Isolated</span>
                </div>
                <div class="saas-tenant-meta-list">
                  <div class="saas-tenant-meta-row"><span>Database Schema:</span><strong>tenant_hyper_prod</strong></div>
                  <div class="saas-tenant-meta-row"><span>Active Seats:</span><strong>120 seats (Enterprise)</strong></div>
                  <div class="saas-tenant-meta-row"><span>Query Latency:</span><strong style="color: #059669;">0.01ms (PostgreSQL)</strong></div>
                </div>
              </div>

              <div class="saas-tenant-card">
                <div class="saas-tenant-top">
                  <div>
                    <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: 2px;">Nordic Logistics</h4>
                    <span class="saas-tenant-domain">nordic.saasflow.io</span>
                  </div>
                  <span class="saas-pill-status -active">● Schema Isolated</span>
                </div>
                <div class="saas-tenant-meta-list">
                  <div class="saas-tenant-meta-row"><span>Database Schema:</span><strong>tenant_nordic_prod</strong></div>
                  <div class="saas-tenant-meta-row"><span>Active Seats:</span><strong>34 seats</strong></div>
                  <div class="saas-tenant-meta-row"><span>Query Latency:</span><strong style="color: #059669;">0.03ms (PostgreSQL)</strong></div>
                </div>
              </div>

              <div class="saas-tenant-card">
                <div class="saas-tenant-top">
                  <div>
                    <h4 style="font-size: 1.05rem; font-weight: 700; color: var(--color-primary); margin-bottom: 2px;">Vanguard Media</h4>
                    <span class="saas-tenant-domain">vanguard.saasflow.io</span>
                  </div>
                  <span class="saas-pill-status -active">● Schema Isolated</span>
                </div>
                <div class="saas-tenant-meta-list">
                  <div class="saas-tenant-meta-row"><span>Database Schema:</span><strong>tenant_vanguard_prod</strong></div>
                  <div class="saas-tenant-meta-row"><span>Active Seats:</span><strong>18 seats</strong></div>
                  <div class="saas-tenant-meta-row"><span>Query Latency:</span><strong style="color: #059669;">0.02ms (PostgreSQL)</strong></div>
                </div>
              </div>
            </div>

            <!-- Interactive Subdomain Provisioning Simulator -->
            <div class="saas-provision-box">
              <h4 style="font-size: 0.98rem; font-weight: 700; color: var(--color-primary); margin-bottom: 4px;">Test Live Tenant Provisioning</h4>
              <p style="font-size: 0.84rem; color: var(--color-gray-600); margin: 0;">Type any organization subdomain to test the automated tenant routing and database migration script:</p>
              
              <div class="saas-provision-input-group">
                <input type="text" id="tenantInput" class="saas-provision-input" placeholder="e.g. stripe, revolut, zapier" value="startup">
                <button type="button" id="provisionTenantBtn" class="saas-pill-btn -primary" style="padding: 10px 20px;">
                  <span>Provision Subdomain &amp; Schema</span>
                </button>
              </div>

              <div id="provisionFeedback" style="margin-top: 12px; font-size: 0.84rem; display: none; padding: 10px 14px; background: rgba(16, 185, 129, 0.1); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 8px; color: #059669; font-weight: 600;">
                Subdomain provisioned with isolated database schema in 120ms.
              </div>
            </div>

          </div>

          <!-- TAB PANEL 3: STRIPE BILLING & PLANS -->
          <div class="saas-tab-panel" id="panel-billing">
            <div class="saas-viewport-header">
              <div>
                <h3 class="saas-viewport-title">Stripe Subscriptions &amp; Webhook Orchestration</h3>
                <p class="saas-viewport-subtitle">Automated tier switching, self-service customer portal, and idempotent webhook handlers for failed payment retries.</p>
              </div>
              <div class="saas-header-actions">
                <span class="saas-pill-status -paid">● Stripe API v2024-06-20 Connected</span>
              </div>
            </div>

            <!-- 3 Pricing Tiers In-App Preview -->
            <div class="saas-pricing-preview-grid">
              <div style="padding: 18px; border: 1px solid var(--color-gray-200); border-radius: 12px; background: #F8FAFC;">
                <span style="font-size: 0.76rem; font-weight: 700; color: var(--color-gray-500); text-transform: uppercase;">Starter Tier</span>
                <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin: 6px 0;">$29<span style="font-size: 0.85rem; font-weight: 500; color: var(--color-gray-600);">/mo</span></div>
                <p style="font-size: 0.8rem; color: var(--color-gray-600); margin-bottom: 12px;">420 Active Subscribers</p>
                <span class="saas-pill-status -paid" style="font-size: 0.72rem;">price_1O83...starter</span>
              </div>

              <div style="padding: 18px; border: 2px solid var(--color-accent); border-radius: 12px; background: #ffffff; box-shadow: 0 4px 16px rgba(0, 80, 231, 0.08);">
                <span style="font-size: 0.76rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase;">Growth Pro (Most Popular)</span>
                <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin: 6px 0;">$79<span style="font-size: 0.85rem; font-weight: 500; color: var(--color-gray-600);">/mo</span></div>
                <p style="font-size: 0.8rem; color: var(--color-gray-600); margin-bottom: 12px;">815 Active Subscribers</p>
                <span class="saas-pill-status -paid" style="font-size: 0.72rem;">price_1O84...growth</span>
              </div>

              <div style="padding: 18px; border: 1px solid var(--color-gray-200); border-radius: 12px; background: #F8FAFC;">
                <span style="font-size: 0.76rem; font-weight: 700; color: var(--color-gray-500); text-transform: uppercase;">Scale Enterprise</span>
                <div style="font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin: 6px 0;">$249<span style="font-size: 0.85rem; font-weight: 500; color: var(--color-gray-600);">/mo</span></div>
                <p style="font-size: 0.8rem; color: var(--color-gray-600); margin-bottom: 12px;">193 Active Subscribers</p>
                <span class="saas-pill-status -paid" style="font-size: 0.72rem;">price_1O85...scale</span>
              </div>
            </div>

            <!-- Live Stripe Webhook Event Stream -->
            <div class="saas-table-wrapper">
              <div class="saas-table-header">
                <h4 class="saas-table-title">Real-Time Stripe Webhook Events</h4>
                <span style="font-size: 0.78rem; color: #059669; font-weight: 600;">Idempotent Handlers • 0 Drops</span>
              </div>
              <div class="saas-event-list" style="padding: 14px;">
                <div class="saas-event-item">
                  <div class="saas-event-left">
                    <span class="saas-event-badge">evt_3N82...</span>
                    <div>
                      <span class="saas-event-name">invoice.payment_succeeded</span>
                      <span style="font-size: 0.76rem; color: var(--color-gray-500); margin-left: 8px;">Customer: Acme Corp ($249.00)</span>
                    </div>
                  </div>
                  <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="font-size: 0.76rem; color: var(--color-gray-500);">2 mins ago</span>
                    <span class="saas-pill-status -paid">HTTP 200 OK</span>
                  </div>
                </div>

                <div class="saas-event-item">
                  <div class="saas-event-left">
                    <span class="saas-event-badge">evt_3N81...</span>
                    <div>
                      <span class="saas-event-name">customer.subscription.created</span>
                      <span style="font-size: 0.76rem; color: var(--color-gray-500); margin-left: 8px;">Plan: Growth Pro ($79.00)</span>
                    </div>
                  </div>
                  <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="font-size: 0.76rem; color: var(--color-gray-500);">14 mins ago</span>
                    <span class="saas-pill-status -paid">HTTP 200 OK</span>
                  </div>
                </div>

                <div class="saas-event-item">
                  <div class="saas-event-left">
                    <span class="saas-event-badge">evt_3N80...</span>
                    <div>
                      <span class="saas-event-name">charge.captured</span>
                      <span style="font-size: 0.76rem; color: var(--color-gray-500); margin-left: 8px;">Automatic receipt sent to finance@nordic.io</span>
                    </div>
                  </div>
                  <div style="display: flex; align-items: center; gap: 12px;">
                    <span style="font-size: 0.76rem; color: var(--color-gray-500);">1 hour ago</span>
                    <span class="saas-pill-status -paid">HTTP 200 OK</span>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- TAB PANEL 4: API GATEWAY & SANDBOX -->
          <div class="saas-tab-panel" id="panel-api">
            <div class="saas-viewport-header">
              <div>
                <h3 class="saas-viewport-title">Developer API Gateway &amp; Sandbox</h3>
                <p class="saas-viewport-subtitle">RESTful endpoints with token authentication, token-bucket rate limiting, and interactive sandbox responses.</p>
              </div>
              <div class="saas-header-actions">
                <button class="saas-pill-btn -primary" id="runApiTestBtn">
                  <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 2l10 6-10 6V2z"/></svg>
                  <span>Send Test API Request</span>
                </button>
              </div>
            </div>

            <!-- API Key Strip -->
            <div class="saas-api-key-strip">
              <div>
                <span style="font-size: 0.78rem; font-weight: 700; color: var(--color-gray-600); text-transform: uppercase;">Production API Key</span>
                <div class="saas-api-key-code">
                  pk_live_9f2a74c18d098e72ba6554109b8
                </div>
              </div>
              <div>
                <span class="saas-pill-status -paid">Rate Limit: 1,000 req/min</span>
              </div>
            </div>

            <!-- Interactive Terminal / JSON Console -->
            <div class="saas-api-terminal">
              <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; color: #94a3b8; font-size: 0.76rem; border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-bottom: 8px;">
                <span>ENDPOINT: GET /api/v1/workspaces/metrics</span>
                <span id="apiStatusTag" style="color: #34d399; font-weight: 600;">200 OK • 32ms</span>
              </div>
              <pre id="apiJsonConsole" style="margin: 0; font-family: var(--font-mono, monospace); color: #e2e8f0; font-size: 0.84rem;">{
  "status": "success",
  "http_code": 200,
  "tenant_id": "org_acme_prod",
  "timestamp": "2026-11-07T12:00:00Z",
  "latency_ms": 32,
  "data": {
    "mrr": 24850.00,
    "active_subscribers": 1428,
    "churn_rate": "0.65%",
    "stripe_webhook_synced": true
  },
  "rate_limit_remaining": 998
}</pre>
            </div>

          </div>

          <!-- TAB PANEL 5: ROLE-BASED ACCESS CONTROL (RBAC) -->
          <div class="saas-tab-panel" id="panel-rbac">
            <div class="saas-viewport-header">
              <div>
                <h3 class="saas-viewport-title">Granular Role-Based Access Control (RBAC)</h3>
                <p class="saas-viewport-subtitle">Protect sensitive routes and database operations with role hierarchies (Superadmin, Workspace Admin, Member, Read-Only).</p>
              </div>
              <div class="saas-header-actions">
                <span class="saas-pill-status -paid">● Strict Middleware Enforced</span>
              </div>
            </div>

            <div class="saas-rbac-table-wrapper">
              <table class="saas-rbac-table">
                <thead>
                  <tr>
                    <th>Platform Permission Scope</th>
                    <th>Superadmin</th>
                    <th>Workspace Admin</th>
                    <th>Team Member</th>
                    <th>Read-Only Viewer</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Manage Stripe Invoices &amp; Billing</td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                  </tr>
                  <tr>
                    <td>Invite &amp; Revoke Team Seats</td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                  </tr>
                  <tr>
                    <td>Create &amp; Edit Core Projects</td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                  </tr>
                  <tr>
                    <td>Rotate Production API Keys</td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox"><span class="saas-slider"></span></label>
                    </td>
                  </tr>
                  <tr>
                    <td>View Audit Logs &amp; Analytics</td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                    <td>
                      <label class="saas-switch"><input type="checkbox" checked><span class="saas-slider"></span></label>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>

        </main>
      </div>

    </div>

  </div>
</section>

<!-- BENTO ARCHITECTURE GRID SECTION -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Engineering Foundation</span>
      <h2 class="section-title">Engineered for Rapid Validation &amp; Real Scale</h2>
      <p class="section-subtitle" style="margin: 0 auto;">
        We eliminate non-essential scope to launch your SaaS in 3 to 6 weeks, built on clean production architectures that scale effortlessly as your user base expands.
      </p>
    </div>

    <div class="bento-showcase-grid">
      
      <!-- Track 1: 0 to 1 Lean Architecture (Span 7) -->
      <div class="bento-card -span-7 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">Lean 0 to 1 Architecture</span>
          <h3 class="bento-card-title">Disciplined Scoping for Fast 3 to 6 Week Launch</h3>
          <p class="bento-card-desc">We cut non-essential features and prioritize the singular core workflow that drives customer willingness to pay. No bloated templates, no technical debt.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Domain-Driven Schema</span>
            <span class="token-pill">Modular MVC</span>
            <span class="token-pill">Clean API Routes</span>
            <span class="token-pill">Zero Bloat</span>
          </div>
        </div>
      </div>

      <!-- Track 2: Stripe & Recurring Billing (Span 5) -->
      <div class="bento-card -span-5 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Recurring Monetization</span>
          <h3 class="bento-card-title">Stripe &amp; Razorpay Billing Engine</h3>
          <p class="bento-card-desc">Tiered pricing plans, automated subscription renewals, self-service customer invoice portal, and webhook dunning for failed payments.</p>
        </div>

        <div class="bento-interactive-snippet">
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; font-size: 0.86rem; color: var(--color-gray-600);">
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="13" height="13" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Automated invoice generation &amp; tax compliance
            </li>
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="13" height="13" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Instant upgrades, downgrades &amp; prorations
            </li>
          </ul>
        </div>
      </div>

      <!-- Track 3: Multi-Tenancy & Isolation (Span 5) -->
      <div class="bento-card -span-5 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">Data Isolation</span>
          <h3 class="bento-card-title">Enterprise Multi-Tenant Workspaces</h3>
          <p class="bento-card-desc">Subdomain routing, tenant scoped databases, and granular role permissions so your B2B customers' data remains strictly isolated.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Subdomain Routing</span>
            <span class="token-pill">PostgreSQL Schemas</span>
            <span class="token-pill">Tenant Scopes</span>
          </div>
        </div>
      </div>

      <!-- Track 4: 100% Code Ownership (Span 7) -->
      <div class="bento-card -span-7 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Full IP Transfer</span>
          <h3 class="bento-card-title">100% Client-Owned Source Code &amp; Infrastructure</h3>
          <p class="bento-card-desc">Zero proprietary vendor lock-in. You own complete Git repositories, database migrations, CI/CD pipelines, and design systems from day one.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-weight: 600; font-size: 0.85rem; color: var(--color-primary);">Transparent Handover</span>
            <span style="font-size: 0.78rem; color: #059669; font-weight: 600;">100% IP Ownership</span>
          </div>
          <div class="tokens-strip">
            <span class="token-pill">GitHub / GitLab Repos</span>
            <span class="token-pill">Automated CI/CD Actions</span>
            <span class="token-pill">Postman API Collections</span>
            <span class="token-pill">Figma Design System</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- SAAS IMPACT METRICS -->
<section class="subpage-section -gray" style="padding: 70px 0;">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Performance Benchmarks</span>
      <h2 class="section-title">Built for Real Traction &amp; Investor Confidence</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Our SaaS MVPs deliver production-grade stability, sub-second response times, and rock-solid billing security.</p>
    </div>

    <div class="stats-grid-4">
      <div class="stat-card-clean stagger-1" data-viewport="true">
        <div class="stat-card-number">
          3-6<span class="symbol">wks</span>
        </div>
        <h3 class="stat-card-title">Average Time to Market</h3>
        <p class="stat-card-desc">From initial scoping workshop to production deployment on your custom domain.</p>
      </div>

      <div class="stat-card-clean stagger-2" data-viewport="true">
        <div class="stat-card-number">
          99.9<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Billing Reliability</h3>
        <p class="stat-card-desc">Idempotent Stripe webhook handling ensuring zero dropped payment transactions.</p>
      </div>

      <div class="stat-card-clean stagger-3" data-viewport="true">
        <div class="stat-card-number">
          100<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Code &amp; IP Ownership</h3>
        <p class="stat-card-desc">Complete intellectual property, source repositories, and deployment keys transferred to you.</p>
      </div>

      <div class="stat-card-clean stagger-4" data-viewport="true">
        <div class="stat-card-number">
          0<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Vendor Lock-In</h3>
        <p class="stat-card-desc">Built using standard open-source frameworks that any experienced engineering team can maintain.</p>
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

<!-- TECH STACK SECTION -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Our Technology Stack</span>
      <h2 class="section-title">Battle-Tested Modern Technologies</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We pick stable, modern technologies with active developer communities and excellent long-term support.</p>
    </div>

    <div class="tech-stack-grid">
      <div class="tech-stack-category stagger-1" data-viewport="true">
        <h3 class="tech-cat-title">Backend Architecture</h3>
        <ul class="tech-cat-list">
          <li>Laravel (PHP 8.3)</li>
          <li>PostgreSQL</li>
          <li>MySQL</li>
          <li>Redis Caching</li>
          <li>RESTful Endpoints</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-2" data-viewport="true">
        <h3 class="tech-cat-title">Frontend Experience</h3>
        <ul class="tech-cat-list">
          <li>React</li>
          <li>Next.js</li>
          <li>Tailwind CSS</li>
          <li>TypeScript</li>
          <li>Inertia.js</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-3" data-viewport="true">
        <h3 class="tech-cat-title">Payments &amp; Billing</h3>
        <ul class="tech-cat-list">
          <li>Stripe Billing</li>
          <li>Stripe Elements</li>
          <li>Razorpay Subscriptions</li>
          <li>Customer Portal</li>
          <li>Webhooks</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-4" data-viewport="true">
        <h3 class="tech-cat-title">Communication</h3>
        <ul class="tech-cat-list">
          <li>Postmark Email</li>
          <li>SendGrid</li>
          <li>Twilio SMS</li>
          <li>Pusher WebSockets</li>
          <li>AWS S3 Storage</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-5" data-viewport="true">
        <h3 class="tech-cat-title">Cloud &amp; Deployment</h3>
        <ul class="tech-cat-list">
          <li>DigitalOcean App Platform</li>
          <li>AWS Cloud</li>
          <li>Vercel</li>
          <li>Docker</li>
          <li>GitHub Actions</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4-STEP DELIVERY PROCESS SECTION -->
<section class="usecases-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Delivery Framework</span>
      <h2 class="section-title">How We Deliver Your SaaS Project</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, sprint-based approach where you see tangible progress every week.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Scope &amp; Architecture</h3>
        <p class="process-step-desc">We map out user flows, define data models, select the ideal technology stack, and establish a fixed milestone roadmap within 48 hours.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">UI/UX &amp; Prototype</h3>
        <p class="process-step-desc">We create component design systems and clickable Figma prototypes. You test and approve the exact interface before coding begins.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Agile Sprints</h3>
        <p class="process-step-desc">We build in 2-week agile sprints. You receive live password-protected staging URLs to test features and give direct feedback.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">QA &amp; Full Handover</h3>
        <p class="process-step-desc">Comprehensive cross-device testing, Core Web Vitals tuning, production cutover, and 100% repository and credential transfer.</p>
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
        <p class="section-subtitle">Direct, transparent answers to common questions about our SaaS MVP Development services.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>What is typically included in a 3 to 6 week SaaS MVP?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>An MVP includes user authentication (sign-up, login, password resets), multi-tenant organization workspaces, subscription billing (Stripe/Razorpay), your core primary feature workflow, an interactive dashboard, and transactional email setup.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Can we scale the codebase after launching the MVP?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. We write clean, modular MVC code with separated domain logic. We do not use throwaway shortcuts, so your MVP serves as the production foundation that your future team can scale without rewrites.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you handle pricing and milestones for an MVP?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We offer transparent, fixed-scope milestone pricing. Before any code is written, we define the exact deliverables and timelines for each milestone so you know your total investment upfront.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Who owns the intellectual property and code?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>You own 100% of all intellectual property, source code, database models, and design assets from day one. Everything is hosted in your Git repository.</p>
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
          Ready to Launch Your SaaS MVP?<br><mark>Let's Build It Right</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Tell us about your SaaS idea and receive a comprehensive technical architecture plan and transparent milestone estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=saas-mvp-development" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Start Your SaaS MVP</span>
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
<!-- Comprehensive Schema.org Structured Data (SEO / AEO / GEO Optimization) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url('/saas-mvp-development') }}",
      "url": "{{ url('/saas-mvp-development') }}",
      "name": "SaaS MVP Development Services | Rapid 0 to 1 Launch | Bluebase Technologies",
      "description": "Turn your startup idea into a production-ready SaaS MVP in 3 to 6 weeks. Multi-tenant architecture, automated Stripe billing, role-based auth, and interactive user dashboards.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/saas-mvp-development#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/saas-mvp-development#breadcrumb') }}",
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
          "name": "SaaS MVP Development",
          "item": "{{ url('/saas-mvp-development') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/saas-mvp-development#service') }}",
      "name": "SaaS MVP Development Services | Rapid 0 to 1 Launch | Bluebase Technologies",
      "serviceType": "SaaS MVP Engineering (0 to 1)",
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
      "@@id": "{{ url('/saas-mvp-development#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "What is typically included in a 3 to 6 week SaaS MVP?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "An MVP includes user authentication (sign-up, login, password resets), multi-tenant organization workspaces, subscription billing (Stripe/Razorpay), your core primary feature workflow, an interactive dashboard, and transactional email setup."
          }
        },
        {
          "@@type": "Question",
          "name": "Can we scale the codebase after launching the MVP?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. We write clean, modular MVC code with separated domain logic. We do not use throwaway shortcuts, so your MVP serves as the production foundation that your future team can scale without rewrites."
          }
        },
        {
          "@@type": "Question",
          "name": "How do you handle pricing and milestones for an MVP?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We offer transparent, fixed-scope milestone pricing. Before any code is written, we define the exact deliverables and timelines for each milestone so you know your total investment upfront."
          }
        },
        {
          "@@type": "Question",
          "name": "Who owns the intellectual property and code?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You own 100% of all intellectual property, source code, database models, and design assets from day one. Everything is hosted in your Git repository."
          }
        }
      ]
    }
  ]
}
</script>

<!-- Interactive SaaS Application Dashboard Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Module Tab Navigation Switching (Both outer tabs and inner sidebar)
  const navTabs = document.querySelectorAll('.saas-nav-tab');
  const menuItems = document.querySelectorAll('.saas-menu-item');
  const panels = document.querySelectorAll('.saas-tab-panel');

  function switchTab(targetKey) {
    // Update outer tabs
    navTabs.forEach(function (tab) {
      if (tab.getAttribute('data-tab') === targetKey) {
        tab.classList.add('active');
        tab.setAttribute('aria-selected', 'true');
      } else {
        tab.classList.remove('active');
        tab.setAttribute('aria-selected', 'false');
      }
    });

    // Update inner sidebar items
    menuItems.forEach(function (item) {
      if (item.getAttribute('data-tab') === targetKey) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });

    // Update panels
    panels.forEach(function (panel) {
      if (panel.id === 'panel-' + targetKey) {
        panel.classList.add('active');
      } else {
        panel.classList.remove('active');
      }
    });
  }

  navTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      const key = this.getAttribute('data-tab');
      switchTab(key);
    });
  });

  menuItems.forEach(function (item) {
    item.addEventListener('click', function () {
      const key = this.getAttribute('data-tab');
      switchTab(key);
    });
  });

  // Interactive Subdomain Provisioning Simulator
  const provisionBtn = document.getElementById('provisionTenantBtn');
  const tenantInput = document.getElementById('tenantInput');
  const provisionFeedback = document.getElementById('provisionFeedback');

  if (provisionBtn && tenantInput && provisionFeedback) {
    provisionBtn.addEventListener('click', function () {
      const rawVal = tenantInput.value.trim().toLowerCase().replace(/[^a-z0-9-]/g, '');
      const sub = rawVal || 'my-app';
      provisionBtn.disabled = true;
      provisionBtn.innerHTML = '<span>Provisioning isolated schema...</span>';
      
      setTimeout(function () {
        provisionBtn.disabled = false;
        provisionBtn.innerHTML = '<span>Provision Subdomain &amp; Schema</span>';
        provisionFeedback.style.display = 'block';
        provisionFeedback.innerHTML = '<strong>Success!</strong> Tenant <code>' + sub + '.saasflow.io</code> created with PostgreSQL schema <code>tenant_' + sub + '_prod</code> (Latency: 22ms).';
      }, 400);
    });
  }

  // Interactive API Tester Sandbox
  const runApiBtn = document.getElementById('runApiTestBtn');
  const apiStatusTag = document.getElementById('apiStatusTag');
  const apiConsole = document.getElementById('apiJsonConsole');

  if (runApiBtn && apiConsole) {
    runApiBtn.addEventListener('click', function () {
      runApiBtn.disabled = true;
      runApiBtn.innerHTML = '<span>Calling API Gateway...</span>';
      
      setTimeout(function () {
        const randLatency = Math.floor(Math.random() * 15) + 22; // 22ms to 36ms
        const nowIso = new Date().toISOString();
        const randReqRem = Math.floor(Math.random() * 20) + 980;

        if (apiStatusTag) {
          apiStatusTag.innerHTML = '200 OK • ' + randLatency + 'ms';
        }

        apiConsole.textContent = JSON.stringify({
          status: "success",
          http_code: 200,
          tenant_id: "org_acme_prod",
          timestamp: nowIso,
          latency_ms: randLatency,
          data: {
            mrr: 24850.00,
            active_subscribers: 1428,
            churn_rate: "0.65%",
            stripe_webhook_synced: true,
            db_isolation: "Row-Level Schema"
          },
          rate_limit_remaining: randReqRem
        }, null, 2);

        runApiBtn.disabled = false;
        runApiBtn.innerHTML = '<svg viewBox="0 0 16 16" width="14" height="14" fill="currentColor"><path d="M4 2l10 6-10 6V2z"/></svg><span>Send Test API Request</span>';
      }, 350);
    });
  }

  // Quick Open Tenant Modal button switches to Tenant tab
  const openTenantModalBtn = document.getElementById('openTenantModalBtn');
  if (openTenantModalBtn && tenantInput) {
    openTenantModalBtn.addEventListener('click', function () {
      tenantInput.focus();
      tenantInput.select();
    });
  }
});
</script>
@endpush