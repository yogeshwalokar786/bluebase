@extends('layouts.app')

@section('title', 'How We Work — Direct Developer Access & Agile Sprints | Bluebase Technologies')
@section('meta_description', 'Explore our engineering delivery model: Direct senior developer access, 2-week milestone sprints, 100% client code ownership, fixed transparent pricing, and free technical consultation.')

@section('content')

<!-- HERO SECTION (SHORT & CRISP AS REQUESTED) -->
<section class="hero-section">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- SEO / AEO Breadcrumb Navigation -->
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
          <a href="{{ route('company') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Company</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">How We Work</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">How We Work &bull; Process</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Built for Speed, <br><mark>Clarity &amp; Code Ownership</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      Direct developer access, 2-week agile sprints, and 100% client code ownership.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Project</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        </span>
      </a>
      <a href="{{ route('book-a-demo') }}" class="c-btn -secondary">
        <span class="c-btn__txt">Schedule a Call</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        </span>
      </a>
    </div>

    <div class="hero-badges stagger-4" data-viewport="true">
      <div class="hero-badge-item">Direct Engineers</div>
      <div class="hero-badge-item">2-Week Sprints</div>
      <div class="hero-badge-item">100% IP Ownership</div>
    </div>

  </div>
</section>

<!-- CLIENT LOGOS MARQUEE -->
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
</section>

<!-- ==========================================================================
     PILLAR 01: DIRECT DEVELOPER ACCESS (ADVANCED DARK ARCHITECTURE)
     ========================================================================== -->
<section class="hww-section-adv -dark" id="direct-developer-access">
  <div class="container">
    
    <div data-viewport="true">
      <span class="hww-badge-tag">Pillar 01 &bull; Direct Communication</span>
      <h2 class="hww-title-lg">
        Direct Access to the Engineers <br><mark>Writing Your Code</mark>.
      </h2>
      <p class="hww-desc-lg">
        We eliminate the traditional agency game of telephone. You collaborate directly with senior full-stack architects and product engineers inside your Slack, with zero non-technical intermediaries slowing you down.
      </p>
    </div>

    <!-- Communication Architecture Comparison Deck -->
    <div class="comm-compare-grid" data-viewport="true">
      
      <!-- Card A: Traditional Agency -->
      <div class="comm-compare-card -agency">
        <span class="comm-compare-label">Traditional Agency Game of Telephone</span>
        
        <div class="comm-chain">
          <div class="comm-chain-step">
            <div class="comm-step-ico">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>
            </div>
            <span>You submit a feature request to an Account Executive</span>
          </div>

          <div class="comm-chain-step">
            <div class="comm-step-ico">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>
            </div>
            <span>Account Exec translates request to an offshore Project Manager</span>
          </div>

          <div class="comm-chain-step">
            <div class="comm-step-ico">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>
            </div>
            <span>Project Manager assigns task to unvetted junior contractor</span>
          </div>

          <div class="comm-chain-step">
            <div class="comm-step-ico">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4l8 8M12 4L4 12"/></svg>
            </div>
            <span>Code delivered 7 days late with critical misinterpretations</span>
          </div>
        </div>

        <div class="comm-stat-footer">
          <span>Latency: <strong>4-7 Days</strong></span>
          <span style="color: #ef4444; font-weight: 700;">6 Points of Failure</span>
        </div>
      </div>

      <!-- Card B: Bluebase Direct Pipeline -->
      <div class="comm-compare-card -bluebase">
        <span class="comm-compare-label">Bluebase Direct Senior Full-Stack Conduit</span>

        <div class="comm-chain">
          <div class="comm-chain-step">
            <div class="comm-step-ico">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 3h12v10H2z"/><path d="M5 6h6M5 9h4"/></svg>
            </div>
            <span>You drop requirements directly in shared Slack / Microsoft Teams</span>
          </div>

          <div class="comm-chain-step">
            <div class="comm-step-ico">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 5 1 8 4 11"/><polyline points="12 5 15 8 12 11"/><line x1="10" y1="3" x2="6" y2="13"/></svg>
            </div>
            <span>Senior Lead Architect reviews, estimates, and implements code</span>
          </div>

          <div class="comm-chain-step">
            <div class="comm-step-ico">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="10" height="10" rx="2"/><circle cx="8" cy="8" r="2"/></svg>
            </div>
            <span>Interactive Loom video walkthrough &amp; preview URL pushed</span>
          </div>

          <div class="comm-chain-step" style="background: rgba(52, 211, 153, 0.1); border-color: rgba(52, 211, 153, 0.3);">
            <div class="comm-step-ico" style="background: rgba(52, 211, 153, 0.2); color: #34d399;">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
            </div>
            <span style="color: #34d399;">Tested feature live on staging in hours, not weeks</span>
          </div>
        </div>

        <div class="comm-stat-footer">
          <span>Average Slack Reply: <strong>&lt; 15 Mins</strong></span>
          <span style="color: #34d399; font-weight: 700;">Zero Intermediaries</span>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================================================
     PILLAR 02: AGILE MILESTONE SPRINTS (ADVANCED SPRINT BOARD)
     ========================================================================== -->
<section class="hww-section-adv -light" id="agile-milestone-sprints">
  <div class="container">
    
    <div data-viewport="true">
      <span class="hww-badge-tag">Pillar 02 &bull; 14-Day Delivery Velocity</span>
      <h2 class="hww-title-lg">
        Structured Sprints with <br><mark>Working Software Every 14 Days</mark>.
      </h2>
      <p class="hww-desc-lg">
        You never wait months to see what we've built. We work in disciplined 2-week agile sprints, deploying functional preview environments after every milestone so you can test, validate, and iterate continuously.
      </p>
    </div>

    <!-- Linear/GitHub Projects Style Sprint Board Simulator -->
    <div class="sprint-board-mockup" data-viewport="true">
      <div class="sprint-board-header">
        <div class="sprint-board-title">
          <svg viewBox="0 0 16 16" width="18" height="18" fill="none" stroke="#60a5fa" stroke-width="2">
            <rect x="2" y="2" width="12" height="12" rx="2"/>
            <path d="M6 2v12M10 2v12M2 6h12M2 10h12"/>
          </svg>
          <span style="color: #ffffff; font-weight: 700; font-size: 0.95rem;">Sprint 04: SaaS Billing &amp; Analytics Dashboard</span>
          <span class="sprint-cadence-pill">Active 14-Day Cycle</span>
        </div>
        <div style="font-size: 0.78rem; color: #94a3b8;">Velocity: <strong>38 Story Points</strong> &bull; CI/CD: <strong>Passing</strong></div>
      </div>

      <div class="sprint-columns-grid">
        
        <!-- Col 1 -->
        <div class="sprint-col">
          <div class="sprint-col-header">
            <span>01. Scoped Backlog</span>
            <span>3</span>
          </div>

          <div class="sprint-task-card">
            <div class="sprint-task-id">BLUE-182</div>
            <div class="sprint-task-title">Custom Stripe Metered Webhook Listeners</div>
            <div class="sprint-task-meta">
              <span>Backend &bull; 5 SP</span>
              <span class="sprint-ci-pass">Approved</span>
            </div>
          </div>

          <div class="sprint-task-card">
            <div class="sprint-task-id">BLUE-184</div>
            <div class="sprint-task-title">Multi-Tenant PostgreSQL Migration Tables</div>
            <div class="sprint-task-meta">
              <span>Database &bull; 8 SP</span>
              <span class="sprint-ci-pass">Approved</span>
            </div>
          </div>
        </div>

        <!-- Col 2 -->
        <div class="sprint-col">
          <div class="sprint-col-header">
            <span>02. In Development</span>
            <span>2</span>
          </div>

          <div class="sprint-task-card" style="border-color: rgba(96, 165, 250, 0.4);">
            <div class="sprint-task-id">BLUE-187</div>
            <div class="sprint-task-title">Figma Token Mapping to Tailwind CSS Engine</div>
            <div class="sprint-task-meta">
              <span>Frontend &bull; 5 SP</span>
              <span style="color: #60a5fa; font-weight: 600;">Branch: feat/tokens</span>
            </div>
          </div>

          <div class="sprint-task-card">
            <div class="sprint-task-id">BLUE-189</div>
            <div class="sprint-task-title">JWT Session Invalidation on Password Change</div>
            <div class="sprint-task-meta">
              <span>Security &bull; 3 SP</span>
              <span style="color: #60a5fa; font-weight: 600;">TDD Green</span>
            </div>
          </div>
        </div>

        <!-- Col 3 -->
        <div class="sprint-col">
          <div class="sprint-col-header">
            <span>03. Staging QA</span>
            <span>2</span>
          </div>

          <div class="sprint-task-card" style="border-color: rgba(245, 158, 11, 0.4);">
            <div class="sprint-task-id">BLUE-190</div>
            <div class="sprint-task-title">Interactive Chart Telemetry on Mobile Web</div>
            <div class="sprint-task-meta">
              <span>QA &bull; 5 SP</span>
              <span style="color: #fbbf24; font-weight: 600;">pr-42.client.com</span>
            </div>
          </div>

          <div class="sprint-task-card">
            <div class="sprint-task-id">BLUE-191</div>
            <div class="sprint-task-title">Export Customer Invoices as PDF Stream</div>
            <div class="sprint-task-meta">
              <span>Feature &bull; 3 SP</span>
              <span style="color: #fbbf24; font-weight: 600;">Testing Passed</span>
            </div>
          </div>
        </div>

        <!-- Col 4 -->
        <div class="sprint-col">
          <div class="sprint-col-header">
            <span>04. Production Ready</span>
            <span>4</span>
          </div>

          <div class="sprint-task-card" style="border-color: rgba(52, 211, 153, 0.4); background: rgba(52, 211, 153, 0.05);">
            <div class="sprint-task-id" style="color: #34d399;">BLUE-176</div>
            <div class="sprint-task-title">Google OAuth 2.0 &amp; Magic Link Authentication</div>
            <div class="sprint-task-meta">
              <span>Merged &bull; 8 SP</span>
              <span class="sprint-ci-pass">
                <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
                Deployed
              </span>
            </div>
          </div>

          <div class="sprint-task-card" style="border-color: rgba(52, 211, 153, 0.4); background: rgba(52, 211, 153, 0.05);">
            <div class="sprint-task-id" style="color: #34d399;">BLUE-179</div>
            <div class="sprint-task-title">Redis Cache Invalidation on Product Updates</div>
            <div class="sprint-task-meta">
              <span>Merged &bull; 5 SP</span>
              <span class="sprint-ci-pass">
                <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
                Deployed
              </span>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- ==========================================================================
     PILLAR 03: 100% CODE OWNERSHIP (SOVEREIGN CUSTODY MATRIX)
     ========================================================================== -->
<section class="hww-section-adv -subtle" id="client-code-ownership">
  <div class="container">
    
    <div data-viewport="true">
      <span class="hww-badge-tag">Pillar 03 &bull; Total IP Sovereignty</span>
      <h2 class="hww-title-lg">
        You Own 100% of the Code, <br><mark>Assets &amp; Cloud Infrastructure</mark>.
      </h2>
      <p class="hww-desc-lg">
        We believe your software should be your asset, not our hostage. Every line of backend code, UI design component, database schema, and deployment script is 100% your intellectual property from day one.
      </p>
    </div>

    <!-- Sovereign Custody Matrix Grid -->
    <div class="ownership-matrix-grid" data-viewport="true">
      
      <div class="ownership-box-adv">
        <div class="ownership-ico-wrap">
          <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="16 18 22 12 16 6"/>
            <polyline points="8 6 2 12 8 18"/>
          </svg>
        </div>
        <h3>Git Repositories &amp; Commits</h3>
        <p>Built directly inside your GitHub or GitLab organization. You maintain root administrative credentials and audit access from day one.</p>
        <span class="ownership-badge-status">
          <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
          100% Client Owned
        </span>
      </div>

      <div class="ownership-box-adv">
        <div class="ownership-ico-wrap">
          <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
            <circle cx="8.5" cy="8.5" r="1.5"/>
            <polyline points="21 15 16 10 5 21"/>
          </svg>
        </div>
        <h3>Figma Design Systems</h3>
        <p>Master Figma .fig files, design token variables, vector SVG exports, and responsive auto-layout component kits transferred cleanly.</p>
        <span class="ownership-badge-status">
          <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
          100% Client Owned
        </span>
      </div>

      <div class="ownership-box-adv">
        <div class="ownership-ico-wrap">
          <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
            <ellipse cx="12" cy="5" rx="9" ry="3"/>
            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/>
            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/>
          </svg>
        </div>
        <h3>Database &amp; Infrastructure</h3>
        <p>PostgreSQL / MySQL migrations, Dockerfiles, and Terraform scripts hosted directly in your AWS, Vercel, or DigitalOcean cloud.</p>
        <span class="ownership-badge-status">
          <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
          100% Client Owned
        </span>
      </div>

      <div class="ownership-box-adv">
        <div class="ownership-ico-wrap">
          <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2L3 7v6c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V7l-9-5z"/>
          </svg>
        </div>
        <h3>Legal IP Assignment Deed</h3>
        <p>Full irrevocable work-for-hire assignment deed with $0.00 royalty lien and zero proprietary vendor lock-in strings attached.</p>
        <span class="ownership-badge-status">
          <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
          Zero Vendor Liens
        </span>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================================================
     PILLAR 04: TRANSPARENT FIXED PRICING (ADVANCED MILESTONE DECK)
     ========================================================================== -->
<section class="hww-section-adv -dark" id="transparent-fixed-pricing">
  <div class="container">
    
    <div data-viewport="true">
      <span class="hww-badge-tag">Pillar 04 &bull; Predictable Economics</span>
      <h2 class="hww-title-lg">
        Milestone-Based Fixed Pricing <br><mark>with Zero Surprise Invoices</mark>.
      </h2>
      <p class="hww-desc-lg">
        No vague hourly billing, inflated estimates, or unexpected invoice surprises. We provide transparent milestone estimates with clearly defined deliverables, so you know exactly what you are paying for and when it will be delivered.
      </p>
    </div>

    <!-- 4-Gate Milestone Payment Deck -->
    <div class="pricing-timeline-deck" data-viewport="true">
      
      <div class="pricing-gate-card">
        <div>
          <div class="pricing-gate-header">
            <span class="pricing-gate-step">GATE 01 &bull; KICKOFF</span>
            <span class="pricing-gate-pct">25%</span>
          </div>
          <h3>UI/UX Prototype &amp; Architecture</h3>
          <p>Full Figma high-fidelity wireframes, responsive design tokens, database ERD schema mapping, and API specifications.</p>
        </div>
        <div class="pricing-gate-trigger">
          <strong>Payment Trigger:</strong>
          Approved clickable Figma prototype &amp; architectural sign-off.
        </div>
      </div>

      <div class="pricing-gate-card">
        <div>
          <div class="pricing-gate-header">
            <span class="pricing-gate-step">GATE 02 &bull; CORE BUILD</span>
            <span class="pricing-gate-pct">35%</span>
          </div>
          <h3>Core Backend &amp; Database</h3>
          <p>Primary business logic, authentication, database migrations, model relationships, and initial frontend integration.</p>
        </div>
        <div class="pricing-gate-trigger">
          <strong>Payment Trigger:</strong>
          Working staging preview URL with primary flows testable.
        </div>
      </div>

      <div class="pricing-gate-card">
        <div>
          <div class="pricing-gate-header">
            <span class="pricing-gate-step">GATE 03 &bull; INTEGRATIONS</span>
            <span class="pricing-gate-pct">25%</span>
          </div>
          <h3>APIs, Payments &amp; Security</h3>
          <p>Stripe webhooks, external REST APIs, background job workers, automated SAST security scan checks, and responsive polishing.</p>
        </div>
        <div class="pricing-gate-trigger">
          <strong>Payment Trigger:</strong>
          Full end-to-end sandbox walkthrough &amp; client acceptance.
        </div>
      </div>

      <div class="pricing-gate-card" style="border-color: rgba(52, 211, 153, 0.4);">
        <div>
          <div class="pricing-gate-header">
            <span class="pricing-gate-step" style="color: #34d399;">GATE 04 &bull; PRODUCTION</span>
            <span class="pricing-gate-pct" style="color: #34d399;">15%</span>
          </div>
          <h3>Live Launch &amp; 30-Day Warranty</h3>
          <p>Production DNS cutover, SSL certificates, performance optimization, repository handoff, and 30-day bug warranty.</p>
        </div>
        <div class="pricing-gate-trigger" style="border-color: rgba(52, 211, 153, 0.25);">
          <strong style="color: #34d399;">Payment Trigger:</strong>
          Live deployment verified &amp; final IP deed delivered.
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================================================
     PILLAR 05: FREE PROJECT CONSULTATION (ADVANCED DISCOVERY BLUEPRINT)
     ========================================================================== -->
<section class="hww-section-adv -light" id="free-project-consultation">
  <div class="container">
    
    <div data-viewport="true">
      <span class="hww-badge-tag">Pillar 05 &bull; Zero-Risk Discovery</span>
      <h2 class="hww-title-lg">
        30-Minute Architecture Review <br><mark>Before You Spend a Dollar</mark>.
      </h2>
      <p class="hww-desc-lg">
        We want you to feel completely confident before committing. Schedule a free, no-obligation technical consultation with our engineering leads to review your architecture, discuss technical feasibility, and map out a realistic roadmap.
      </p>
    </div>

    <!-- Consultation Blueprint & Takeaways Console -->
    <div class="consultation-blueprint-grid" data-viewport="true">
      
      <!-- Left: 3-Stage Discovery Process -->
      <div class="consult-steps-stack">
        
        <div class="consult-step-card">
          <div class="consult-step-num-box">01</div>
          <div class="consult-step-content">
            <h3>Pre-Call Mutual NDA Execution</h3>
            <p>Your concepts, trade secrets, and existing code are legally safeguarded before we review any technical specifications or wireframes.</p>
          </div>
        </div>

        <div class="consult-step-card">
          <div class="consult-step-num-box">02</div>
          <div class="consult-step-content">
            <h3>30-Minute Live Whiteboard Session</h3>
            <p>Direct video conversation with our Lead Software Architect. We analyze your requirements, identify technical risks, and evaluate stack options.</p>
          </div>
        </div>

        <div class="consult-step-card">
          <div class="consult-step-num-box">03</div>
          <div class="consult-step-content">
            <h3>48-Hour Deliverables Package</h3>
            <p>You receive an actionable written report containing stack recommendations, sprint milestones, and fixed pricing with zero pressure to buy.</p>
          </div>
        </div>

      </div>

      <!-- Right: What You Walk Away With -->
      <div class="consult-sidebar-box">
        <span class="hww-badge-tag" style="background: rgba(52, 211, 153, 0.12); color: #34d399; border-color: rgba(52, 211, 153, 0.3);">
          100% Free &bull; Zero Obligation
        </span>

        <h3 style="font-size: 1.4rem; font-weight: 800; color: #ffffff; margin-bottom: 12px;">
          What You Receive in 48 Hours
        </h3>
        <p style="font-size: 0.88rem; color: #94a3b8; line-height: 1.6; margin-bottom: 24px;">
          Even if you choose not to hire Bluebase, this consultation provides immediate technical clarity for your engineering roadmap:
        </p>

        <div class="consult-deliverable-item">
          <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>
          <span>System Architecture &amp; Database Diagram</span>
        </div>

        <div class="consult-deliverable-item">
          <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 5 1 8 4 11"/><polyline points="12 5 15 8 12 11"/><line x1="10" y1="3" x2="6" y2="13"/></svg>
          <span>Tech Stack &amp; Framework Recommendations</span>
        </div>

        <div class="consult-deliverable-item">
          <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="10" height="10" rx="2"/></svg>
          <span>Milestone Sprints &amp; Timeline Estimate</span>
        </div>

        <div class="consult-deliverable-item">
          <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 1.5L2.5 4v4c0 3.5 2.5 6.2 5.5 7 3-0.8 5.5-3.5 5.5-7V4L8 1.5z"/></svg>
          <span>Signed Bilateral Mutual NDA</span>
        </div>

        <div style="margin-top: 30px;">
          <a href="{{ route('book-a-demo') }}" class="c-btn -primary" style="width: 100%; justify-content: center;">
            <span class="c-btn__txt">Schedule Free 30-Min Call</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- ==========================================================================
     METHODOLOGY COMPARISON MATRIX
     ========================================================================== -->
<section class="compliance-matrix-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 30px;" data-viewport="true">
      <span class="section-tag">Delivery Matrix</span>
      <h2 class="section-title">The Bluebase Way vs <mark>Traditional Options</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Review how our direct senior engineering model compares against legacy digital agencies and freelance platforms.</p>
    </div>

    <div class="matrix-table-wrap" data-viewport="true">
      <table class="matrix-table">
        <thead>
          <tr>
            <th style="width: 25%;">Capability Domain</th>
            <th class="col-bluebase" style="width: 35%;">Bluebase Technologies Direct Model</th>
            <th style="width: 20%;">Traditional Agency</th>
            <th style="width: 20%;">Freelance Marketplaces</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="matrix-domain">Developer Access</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">Direct</span> Direct Slack &amp; video calls with full-stack engineers</td>
            <td class="td-legacy">Filtered through account executives</td>
            <td class="td-legacy">Direct, but unpredictable timezone availability</td>
          </tr>
          <tr>
            <td class="matrix-domain">Delivery Cadence</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">14-Day</span> Working staging preview deployed every 2 weeks</td>
            <td class="td-legacy">Infrequent quarterly milestone releases</td>
            <td class="td-legacy">Sporadic, unstructured ad-hoc commits</td>
          </tr>
          <tr>
            <td class="matrix-domain">Code Ownership</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">100%</span> Irrevocable full IP assignment deed ($0 royalties)</td>
            <td class="td-legacy">Proprietary agency runtime lock-in</td>
            <td class="td-legacy">Ambiguous legal IP assignment terms</td>
          </tr>
          <tr>
            <td class="matrix-domain">Pricing Model</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">Fixed</span> Transparent milestone pricing &amp; 0% hosting markup</td>
            <td class="td-legacy">Opaque hourly billing &amp; surprise overages</td>
            <td class="td-legacy">Hourly rates with continuous scope creep</td>
          </tr>
          <tr>
            <td class="matrix-domain">Engineering Talent</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">Senior</span> Senior-only architects &amp; product developers</td>
            <td class="td-legacy">Junior developers managed from afar</td>
            <td class="td-legacy">Unvetted and volatile technical skill</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- ==========================================================================
     FREQUENTLY ASKED QUESTIONS (FAQ)
     ========================================================================== -->
<section class="security-faq-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto;" data-viewport="true">
      <span class="section-tag">Process Questions</span>
      <h2 class="section-title">Frequently Asked <mark>Process Questions</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Direct answers about our development process, communication cadence, and engagement models.</p>
    </div>

    <div class="sec-faq-grid" data-viewport="true">
      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>How quickly can we kick off a project after signing?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>Typically within 3 to 5 business days. Once the mutual NDA and statement of work are finalized, we invite your team to a dedicated Slack/Teams workspace, initialize your Git repository branches, and hold Sprint 1 planning.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Can we change features or priorities in the middle of a sprint?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>Yes. Because we work in flexible 2-week sprints, you have the agility to re-prioritize your backlog before every sprint kickoff. For mid-sprint changes, we simply swap items of equivalent effort to protect your deadline and budget.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>What communication channels do you use during active sprints?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>We adapt to your team's existing workflow. Our default setup is a dedicated private Slack or Microsoft Teams channel with daily async standups, combined with Loom video walkthroughs and weekly scheduled video review calls.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Who handles cloud hosting and deployment accounts?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>You hold root ownership of your cloud accounts (AWS, Vercel, DigitalOcean, Hetzner, etc.). We configure Infrastructure as Code (IaC) and deployment pipelines inside your environment, so you never pay agency markups or risk lock-in.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>What happens after our product successfully launches?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>Every project includes a 30-day post-launch warranty period where any bug fixes are handled immediately with zero extra charge. Afterwards, you can seamlessly transition to our limited maintenance &amp; continuous support plan.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ==========================================================================
     CALL TO ACTION
     ========================================================================== -->
<section class="sec-cta-section">
  <div class="container">
    <div class="sec-cta-box" data-viewport="true">
      <span class="trust-status-badge" style="background: rgba(34, 197, 94, 0.12); color: #86efac; border-color: rgba(34, 197, 94, 0.3);">
        <span class="trust-pulse-dot" aria-hidden="true"></span>
        Sprint Slots Available
      </span>
      <h2>Ready to Build with <mark>Direct Senior Engineers</mark>?</h2>
      <p>Schedule a free 30-minute technical discovery call. We'll evaluate your requirements, answer your questions, and deliver a detailed milestone proposal within 48 hours.</p>
      
      <div class="sec-cta-actions">
        <a href="{{ route('contact') }}" class="c-btn -primary">
          <span class="c-btn__txt">Start Your Project</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
        <a href="{{ route('book-a-demo') }}" class="c-btn -secondary" style="border-color: rgba(255,255,255,0.2); color: #ffffff;">
          <span class="c-btn__txt">Book Discovery Call</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- SCRIPTS: FAQ & STICKY NAV -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // FAQ Accordion
  const faqQuestions = document.querySelectorAll('.sec-faq-question');
  faqQuestions.forEach(btn => {
    btn.addEventListener('click', function() {
      const item = this.closest('.sec-faq-item');
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      
      document.querySelectorAll('.sec-faq-item').forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
          const otherBtn = otherItem.querySelector('.sec-faq-question');
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
        }
      });

      if (isExpanded) {
        item.classList.remove('active');
        this.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('active');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
});
</script>

<!-- SCHEMA.ORG STRUCTURED DATA -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url()->current() }}#webpage",
      "url": "{{ url()->current() }}",
      "name": "How We Work — Direct Developer Access & Agile Sprints | Bluebase Technologies",
      "description": "Explore our engineering delivery model: Direct senior developer access, 2-week milestone sprints, 100% client code ownership, fixed transparent pricing, and free technical consultation.",
      "publisher": {
        "@@type": "Organization",
        "name": "Bluebase Technologies",
        "url": "{{ route('home') }}",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ asset('images/logo.svg') }}"
        }
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url()->current() }}#breadcrumb",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ route('home') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Company",
          "item": "{{ route('company') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "How We Work",
          "item": "{{ url()->current() }}"
        }
      ]
    }
  ]
}
</script>

@endsection