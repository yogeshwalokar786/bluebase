@extends('layouts.app')

@section('title', 'About Bluebase Technologies | Digital Engineering Studio & Remote-First Team')
@section('meta_description', 'Bluebase Technologies is an agile, remote-first digital engineering studio based in India. We architect custom websites, web applications, mobile apps, and scalable digital solutions for growing businesses worldwide.')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- SEO / AEO Breadcrumb Navigation Pill -->
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
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">Company</span>
          <meta itemprop="position" content="2">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">About Bluebase</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Digital Engineering, <br><mark>Built for Ambitious Brands</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      We build high-performance websites, custom web applications, and mobile products with clean code, direct developer access, and transparent delivery.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}" class="c-btn -primary">
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
      <a href="{{ route('services') }}" class="c-btn -secondary">
        <span class="c-btn__txt">Explore Services</span>
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
      <div class="hero-badge-item">Remote-First Studio</div>
      <div class="hero-badge-item">100% Code Ownership</div>
      <div class="hero-badge-item">Direct Developer Access</div>
    </div>

  </div>
</section>

<!-- IMPACT & KEY METRICS COUNTERS -->
<section class="subpage-section -gray" style="padding: 60px 0;">
  <div class="container">
    <div class="stats-grid-4">
      <div class="stat-card-clean stagger-1" data-viewport="true">
        <div class="stat-card-number">
          40<span class="symbol">+</span>
        </div>
        <h3 class="stat-card-title">Digital Products Shipped</h3>
        <p class="stat-card-desc">SaaS MVPs, custom web applications, mobile apps, and marketing websites launched successfully.</p>
      </div>

      <div class="stat-card-clean stagger-2" data-viewport="true">
        <div class="stat-card-number">
          99.9<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Production Uptime Record</h3>
        <p class="stat-card-desc">Reliable cloud deployments on AWS and DigitalOcean backed by proactive daily monitoring.</p>
      </div>

      <div class="stat-card-clean stagger-3" data-viewport="true">
        <div class="stat-card-number">
          90<span class="symbol">+</span>
        </div>
        <h3 class="stat-card-title">Core Web Vitals Standard</h3>
        <p class="stat-card-desc">Every frontend is tuned for sub-second page loads, accessible markup, and green performance scores.</p>
      </div>

      <div class="stat-card-clean stagger-4" data-viewport="true">
        <div class="stat-card-number">
          &lt;60<span class="symbol">s</span>
        </div>
        <h3 class="stat-card-title">Automated Alert Escalation</h3>
        <p class="stat-card-desc">Real-time telemetry and 24/7 uptime monitoring to resolve technical issues before customers notice.</p>
      </div>
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

<!-- OUR STORY & MISSION SECTION -->
<section class="subpage-section">
  <div class="container">
    <div class="company-story-grid">
      
      <!-- Left Column: Story & Narrative -->
      <div class="company-story-left" data-viewport="true">
        <span class="section-tag">Who We Are</span>
        <h2 class="section-title">Engineered as the Antithesis of the Traditional Agency Model</h2>
        <p class="section-subtitle" style="margin-bottom: 24px; text-align: left;">
          Traditional software agencies often operate with layers of account managers, sales representatives, and inflated markups, while delegating the actual coding to junior staff.
        </p>
        <p style="font-size: 1rem; color: var(--color-gray-600); line-height: 1.7; margin-bottom: 24px;">
          Bluebase Technologies was created to offer an honest, efficient alternative: a remote-first engineering studio based in India where clients collaborate directly with senior engineers and product designers.
        </p>
        <p style="font-size: 1rem; color: var(--color-gray-600); line-height: 1.7; margin-bottom: 32px;">
          We move fast, communicate clearly, and write maintainable, modular code. Whether you are launching an early-stage SaaS MVP, redesigning an enterprise website, or scaling a mobile product, we focus entirely on business impact and technical excellence.
        </p>
        <div>
          <a href="{{ route('contact') }}" class="c-btn -primary">
            <span class="c-btn__txt">Start a Conversation</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>
      </div>

      <!-- Right Column: Key Pillars -->
      <div class="company-story-right">
        
        <div class="story-feature-card stagger-1" data-viewport="true">
          <div class="story-feature-header">
            <div class="story-feature-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3 class="story-feature-title">Builders First, Not Middlemen</h3>
          </div>
          <p class="story-feature-desc">
            Work directly with the software engineers and UI designers who build your product. No non-technical account managers, no message distortion, and zero communication bottlenecks.
          </p>
        </div>

        <div class="story-feature-card stagger-2" data-viewport="true">
          <div class="story-feature-header">
            <div class="story-feature-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
            <h3 class="story-feature-title">Disciplined 2-Week Sprints</h3>
          </div>
          <p class="story-feature-desc">
            We work in transparent agile sprints with continuous deployments to live staging environments. You review working software every week and iterate with real feedback.
          </p>
        </div>

        <div class="story-feature-card stagger-3" data-viewport="true">
          <div class="story-feature-header">
            <div class="story-feature-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <h3 class="story-feature-title">Transparent Fixed Pricing</h3>
          </div>
          <p class="story-feature-desc">
            Clear project milestones and fixed pricing agreements. No unexpected hourly bills, no hidden maintenance markups, and zero vendor lock-in.
          </p>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- CORE PRINCIPLES & VALUES -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Engineering Culture</span>
      <h2 class="section-title">The Principles Behind Every Line of Code</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Practical, disciplined engineering values that protect your project from technical debt and future headaches.</p>
    </div>

    <div class="features-grid-3">
      
      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div>
          <div class="card-icon-box">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16.5 9.4 7.55 4.24a1.78 1.78 0 0 0-2.5 1.55v12.42a1.78 1.78 0 0 0 2.5 1.55L16.5 14.6a1.78 1.78 0 0 0 0-3.2z"/></svg>
          </div>
          <h3 class="card-title-lg">Craftsmanship Over Shortcuts</h3>
          <p class="card-text">
            We write clean, modular, and maintainable code adhering to modern MVC patterns and strict coding standards. No fragile hacks or unmaintained packages.
          </p>
        </div>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div>
          <div class="card-icon-box">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          </div>
          <h3 class="card-title-lg">100% Client-Owned Code</h3>
          <p class="card-text">
            Every Git repository, database schema, design token, and server credential is your intellectual property from day one. You can hand over your codebase anytime with zero friction.
          </p>
        </div>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div>
          <div class="card-icon-box">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
          </div>
          <h3 class="card-title-lg">Relentless Performance</h3>
          <p class="card-text">
            Sub-second page load times and 90+ Core Web Vitals are foundational requirements, not afterthoughts. Fast websites convert visitors and rank higher on search engines.
          </p>
        </div>
      </div>

      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div>
          <div class="card-icon-box">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
          </div>
          <h3 class="card-title-lg">Pragmatic Tech Stacks</h3>
          <p class="card-text">
            We build with battle-tested frameworks like Laravel, React, Next.js, Node.js, and Flutter. Technologies with vast communities, long-term stability, and abundant developer availability.
          </p>
        </div>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div>
          <div class="card-icon-box">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <h3 class="card-title-lg">Production-Grade Security</h3>
          <p class="card-text">
            OWASP security practices, automated CSRF verification, SQL injection protection, encrypted secrets, and rate-limiting middleware are incorporated into every deployment.
          </p>
        </div>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div>
          <div class="card-icon-box">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
          </div>
          <h3 class="card-title-lg">Long-Term Reliability</h3>
          <p class="card-text">
            Our relationship extends beyond initial launch. We offer proactive maintenance, 24/7 uptime monitoring, regular framework updates, and feature iteration retainers.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- GEO: GLOBAL REMOTE COLLABORATION -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Global Collaboration</span>
      <h2 class="section-title">Seamless Delivery Across Borders</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Based in India and operating on a remote-first model, we partner with founders and engineering leaders across the globe with zero friction.</p>
    </div>

    <div class="geo-collab-grid">
      <div class="geo-collab-card stagger-1" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="geo-collab-title">Timezone Overlap</h3>
        <p class="geo-collab-desc">We offer scheduled overlapping working hours with US (EST/PST), UK (GMT), European (CET), and Australian (AEST) time zones for real-time collaboration, sprint planning, and reviews.</p>
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
        <p class="geo-collab-desc">Invoicing and contracts in USD, EUR, GBP, AUD, and INR. Milestone payments processed securely via Stripe or international wire transfers with complete regulatory compliance.</p>
      </div>
    </div>
  </div>
</section>

<!-- QUALITY ENGINEERING STANDARDS -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Quality Standards</span>
      <h2 class="section-title">How We Guarantee Production Reliability</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every project follows strict technical safeguards to guarantee code stability, security, and maintainability.</p>
    </div>

    <div class="features-grid-2">
      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
        </div>
        <h3 class="card-title-lg">Peer Code Reviews</h3>
        <p class="card-text">No code reaches staging or production without thorough peer review to enforce architecture conventions, query performance, and security checks.</p>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
        </div>
        <h3 class="card-title-lg">Automated CI/CD Pipelines</h3>
        <p class="card-text">Automated linting, unit testing, and GitHub Actions workflows ensure zero-downtime, predictable deployments on every sprint release.</p>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
        </div>
        <h3 class="card-title-lg">Transparent Staging Previews</h3>
        <p class="card-text">Password-protected staging URLs allow your team to test, review, and approve features in real time before live production launch.</p>
      </div>

      <div class="feature-card-clean stagger-4" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        </div>
        <h3 class="card-title-lg">Full Technical Handover</h3>
        <p class="card-text">Complete Postman API documentation, database schemas, and developer setup documentation so any future engineer can onboard instantly.</p>
      </div>
    </div>
  </div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS SECTION -->
<section class="faq-section" id="faq">
  <div class="container">
    <div class="faq-layout">
      
      <div class="faq-left" data-viewport="true">
        <span class="section-tag">Frequently Asked Questions</span>
        <h2 class="section-title">Common Questions About <mark>Bluebase</mark></h2>
        <p class="section-subtitle">
          Direct, honest answers regarding our remote-first model, collaboration workflows, code ownership, and contracts.
        </p>
      </div>

      <div class="faq-right">
        <div class="accordion-list">
          
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>Where is Bluebase Technologies located?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>
                  Bluebase Technologies is an independent digital engineering startup based in India. We operate on a fully remote-first model, collaborating seamlessly with clients across India and internationally in the US, UK, Europe, Australia, and UAE with zero physical office bureaucracy.
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How does remote collaboration work across different time zones?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>
                  Our core engineers operate on Indian Standard Time (IST / UTC+05:30) and maintain daily scheduled overlap hours for clients in US (EST/PST), UK, European, and Australian time zones. We provide async updates via Slack/WhatsApp and live sprint reviews via Google Meet.
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Who owns the source code and designs after project completion?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>
                  You own 100% of all intellectual property from day one. All Git repositories, Figma design tokens, database schemas, and server credentials are completely transferred to you with zero vendor lock-in or recurring proprietary license fees.
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>What size companies do you typically partner with?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>
                  We partner with early-stage startup founders validating 0-to-1 MVPs, growing digital brands requiring high-performance web platforms, and established businesses seeking custom web applications or mobile products without agency bloat.
                </p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-5" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you structure project pricing and contracts?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>
                  We provide transparent, fixed milestone-based pricing. Before work begins, we establish a detailed specification of deliverables, sprint roadmaps, and fixed milestone costs. Invoices can be paid in USD, EUR, GBP, AUD, or INR via Stripe or wire transfers.
                </p>
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
          Ready to Build Your Next Product?<br><mark>Partner with Bluebase Technologies</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Share your product vision and receive a clear technical proposal and transparent milestone estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Start a Conversation</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('book-a-demo') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Schedule a Call</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>

        <div class="cta-pills-row stagger-3" data-viewport="true">
          <div class="cta-pill-item">India-based core engineering team</div>
          <div class="cta-pill-item">100% client-owned code &amp; IP</div>
          <div class="cta-pill-item">Transparent milestone pricing</div>
          <div class="cta-pill-item">Direct developer communication</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<!-- Structured Data: Organization, AboutPage, BreadcrumbList & FAQ (SEO / AEO / GEO Optimization) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "AboutPage",
      "@@id": "{{ url('/company') }}",
      "url": "{{ url('/company') }}",
      "name": "About Bluebase Technologies | Digital Engineering Studio",
      "description": "Bluebase Technologies is an agile, remote-first digital engineering studio based in India. We architect custom websites, web applications, mobile apps, and scalable digital solutions for growing businesses worldwide.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/company#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/company#breadcrumb') }}",
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
          "name": "Company",
          "item": "{{ url('/company') }}"
        }
      ]
    },
    {
      "@@type": "Corporation",
      "@@id": "{{ url('/#organization') }}",
      "name": "Bluebase Technologies",
      "alternateName": "Bluebase Tech",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/logo-bluebase.png') }}",
      "description": "Bluebase Technologies is a digital engineering and software development startup based in India, operating on a remote-first delivery model.",
      "foundingLocation": {
        "@@type": "Place",
        "name": "India"
      },
      "address": {
        "@@type": "PostalAddress",
        "addressCountry": "IN"
      },
      "openingHoursSpecification": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
        "opens": "09:30",
        "closes": "19:00"
      },
      "contactPoint": [
        {
          "@@type": "ContactPoint",
          "email": "contact@bluebase.com",
          "contactType": "customer service",
          "availableLanguage": ["English", "Hindi"]
        },
        {
          "@@type": "ContactPoint",
          "email": "sales@bluebase.com",
          "contactType": "sales",
          "availableLanguage": ["English", "Hindi"]
        }
      ],
      "areaServed": [
        { "@@type": "Country", "name": "India" },
        { "@@type": "Country", "name": "United States" },
        { "@@type": "Country", "name": "United Kingdom" },
        { "@@type": "Country", "name": "European Union" },
        { "@@type": "Country", "name": "Australia" }
      ],
      "knowsAbout": [
        "Web Application Development",
        "Website Design",
        "Mobile App Development",
        "SaaS MVP Engineering",
        "E-Commerce Solutions",
        "UI/UX Design",
        "API & Backend Integration",
        "Laravel Development",
        "Full-Stack Software Engineering"
      ]
    },
    {
      "@@type": "FAQPage",
      "@@id": "{{ url('/company#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "Where is Bluebase Technologies located?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Bluebase Technologies is an independent digital engineering startup based in India. We operate as a fully remote-first organization, serving clients across India and internationally without physical office constraints."
          }
        },
        {
          "@@type": "Question",
          "name": "How does remote collaboration work across different time zones?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Our core engineers operate on Indian Standard Time (IST / UTC+05:30) and maintain daily scheduled overlap hours for clients in US (EST/PST), UK, European, and Australian time zones. We provide async updates via Slack/WhatsApp and live sprint reviews via Google Meet."
          }
        },
        {
          "@@type": "Question",
          "name": "Who owns the source code and designs after project completion?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You own 100% of all intellectual property from day one. All Git repositories, Figma design tokens, database schemas, and server credentials are completely transferred to you with zero vendor lock-in or recurring proprietary license fees."
          }
        },
        {
          "@@type": "Question",
          "name": "What size companies do you typically partner with?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We partner with early-stage startup founders validating 0-to-1 MVPs, growing digital brands requiring high-performance web platforms, and established businesses seeking custom web applications or mobile products without agency bloat."
          }
        },
        {
          "@@type": "Question",
          "name": "How do you structure project pricing and contracts?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We provide transparent, fixed milestone-based pricing. Before work begins, we establish a detailed specification of deliverables, sprint roadmaps, and fixed milestone costs. Invoices can be paid in USD, EUR, GBP, AUD, or INR via Stripe or wire transfers."
          }
        }
      ]
    }
  ]
}
</script>
@endpush
