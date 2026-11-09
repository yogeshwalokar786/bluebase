@extends('layouts.app')

@section('title', 'Web Development Services | Custom Web Applications & Websites | Bluebase Technologies')
@section('meta_description', 'Bluebase Technologies provides custom web development services for startups and growing brands. We build scalable SaaS web applications, client portals, and fast websites with Laravel, React, Next.js, and Node.js.')

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
          <span itemprop="name" aria-current="page">Web Development</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Engineering Studio &bull; Custom Web Development</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      High-Performance Web Development for <br><mark>Modern Startups &amp; Brands</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      We engineer custom web applications, SaaS platforms, and lightning-fast websites. From clean architecture and responsive user interfaces to secure backend APIs, we build scalable digital products tailored to your goals.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=web-development" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Web Project</span>
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
      <div class="hero-badge-item">Sub-Second Load Times</div>
      <div class="hero-badge-item">90+ Core Web Vitals</div>
      <div class="hero-badge-item">Laravel &amp; React Ecosystem</div>
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

<!-- WHAT WE BUILD SECTION (SEO / CAPABILITIES) -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">What We Build</span>
      <h2 class="section-title">End-to-End Web Engineering Services</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Whether you need a full-scale web application, an early-stage SaaS MVP, or a high-converting website, our engineering studio delivers with precision.</p>
    </div>

    <div class="services-catalog-grid">
      <!-- 1. Custom Web Applications & SaaS -->
      <div class="service-card-modern stagger-1" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Web Apps &amp; SaaS</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
          </div>
          <h3 class="service-title">Custom SaaS Applications</h3>
          <p class="service-desc">Complete software-as-a-service platforms engineered with scalable multi-tenant architecture, role-based auth, and intuitive client dashboards.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Role-based access control &amp; team workspaces
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Stripe &amp; Razorpay recurring subscription billing
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Interactive analytics &amp; exportable reports
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Automated transactional email notifications
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Laravel</span>
            <span class="tech-tag-pill">React</span>
            <span class="tech-tag-pill">Next.js</span>
            <span class="tech-tag-pill">PostgreSQL</span>
          </div>
          <a href="{{ route('contact') }}?service=web-apps" class="service-action-link">
            <span>Discuss SaaS Architecture</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 2. Marketing Websites & Landing Pages -->
      <div class="service-card-modern stagger-2" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Websites</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
          </div>
          <h3 class="service-title">Marketing Websites &amp; Landing Pages</h3>
          <p class="service-desc">Clean, modern websites tailored for startups and digital brands designed to drive conversions and showcase products.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Custom bespoke UI tailored to your brand identity
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              90+ Core Web Vitals on mobile and desktop
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Semantic HTML5, Schema.org &amp; SEO best practices
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              High-converting lead capture &amp; inquiry forms
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Tailwind CSS</span>
            <span class="tech-tag-pill">HTML5</span>
            <span class="tech-tag-pill">JavaScript</span>
            <span class="tech-tag-pill">PHP</span>
          </div>
          <a href="{{ route('contact') }}?service=websites" class="service-action-link">
            <span>Build Marketing Site</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 3. Client & Admin Portals -->
      <div class="service-card-modern stagger-3" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Portals &amp; Dashboards</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
            </div>
          </div>
          <h3 class="service-title">Client &amp; Admin Portals</h3>
          <p class="service-desc">Centralized portals and internal dashboards built to streamline business workflows, customer access, and data management.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Password-protected customer &amp; vendor accounts
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Real-time data filters, sorting &amp; CSV exports
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Activity logging &amp; audit trails
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Integration with internal tools &amp; databases
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">React</span>
            <span class="tech-tag-pill">Vue.js</span>
            <span class="tech-tag-pill">Laravel</span>
            <span class="tech-tag-pill">REST APIs</span>
          </div>
          <a href="{{ route('contact') }}?service=portals" class="service-action-link">
            <span>Build Client Portal</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 4. E-Commerce & Checkout Platforms -->
      <div class="service-card-modern stagger-1" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">E-Commerce</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            </div>
          </div>
          <h3 class="service-title">E-Commerce &amp; Checkout</h3>
          <p class="service-desc">Fast, frictionless storefronts and payment flows built to maximize purchase conversion rates and average order values.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Custom product pages &amp; dynamic filter trees
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Stripe, Razorpay, UPI &amp; PayPal gateway integrations
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Inventory tracking &amp; order management webhooks
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Cart abandonment recovery emails &amp; discount engines
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Laravel</span>
            <span class="tech-tag-pill">Shopify</span>
            <span class="tech-tag-pill">Stripe</span>
            <span class="tech-tag-pill">Razorpay</span>
          </div>
          <a href="{{ route('contact') }}?service=ecommerce" class="service-action-link">
            <span>Build Online Store</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 5. API Architecture & Headless Backends -->
      <div class="service-card-modern stagger-2" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">APIs &amp; Backends</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
          </div>
          <h3 class="service-title">API &amp; Backend Engineering</h3>
          <p class="service-desc">Robust backend architectures and RESTful APIs that connect your web frontend, mobile applications, and third-party systems.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              High-throughput RESTful API endpoints
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Redis caching layers for sub-100ms responses
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Secure OAuth2, JWT &amp; API key authentication
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Automated Postman &amp; OpenAPI documentation
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Laravel</span>
            <span class="tech-tag-pill">Node.js</span>
            <span class="tech-tag-pill">Express</span>
            <span class="tech-tag-pill">Redis</span>
          </div>
          <a href="{{ route('contact') }}?service=apis" class="service-action-link">
            <span>Design Backend APIs</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 6. Web App Modernization & Speed -->
      <div class="service-card-modern stagger-3" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Modernization</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            </div>
          </div>
          <h3 class="service-title">Code Modernization &amp; Speed</h3>
          <p class="service-desc">Transform slow, outdated web platforms with modern reactive frameworks, optimized database queries, and clean code.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Eliminate technical debt &amp; legacy code bottlenecks
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Google PageSpeed optimization targeting 90+ score
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Database query indexing &amp; N+1 query elimination
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Preserving active customer data &amp; SEO rankings
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Refactoring</span>
            <span class="tech-tag-pill">Core Web Vitals</span>
            <span class="tech-tag-pill">Speed Audit</span>
            <span class="tech-tag-pill">PHP 8.3</span>
          </div>
          <a href="{{ route('contact') }}?service=modernization" class="service-action-link">
            <span>Modernize Web Platform</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ENGINEERING STANDARDS SECTION (SEO / TRUST SIGNALS) -->
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
        <p class="card-text">Strict separation of concerns, MVC structure, and clean reusable components. Your code is easy to read, test, and hand over to any future developer with zero friction.</p>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <h3 class="card-title-lg">Sub-Second Page Loads</h3>
        <p class="card-text">We optimize script bundles, leverage browser caching, compress assets, and tune server responses to ensure your web pages load in under a second worldwide.</p>
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

<!-- GEO: GLOBAL REMOTE COLLABORATION SECTION (GEOGRAPHIC & GLOBAL SEARCH GROUNDING) -->
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

<!-- TECH STACK SECTION (SEO / TECHNICAL CITATIONS) -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Our Technology Stack</span>
      <h2 class="section-title">Battle-Tested Web Technologies</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We pick modern, stable technologies with active developer communities and excellent long-term support.</p>
    </div>

    <div class="tech-stack-grid">
      <div class="tech-stack-category stagger-1" data-viewport="true">
        <h3 class="tech-cat-title">Frontend</h3>
        <ul class="tech-cat-list">
          <li>React</li>
          <li>Next.js</li>
          <li>Vue.js</li>
          <li>Tailwind CSS</li>
          <li>TypeScript</li>
          <li>HTML5 / CSS3</li>
        </ul>
      </div>

      <div class="tech-stack-category stagger-2" data-viewport="true">
        <h3 class="tech-cat-title">Backend</h3>
        <ul class="tech-cat-list">
          <li>Laravel (PHP 8.3)</li>
          <li>Node.js</li>
          <li>Express.js</li>
          <li>RESTful APIs</li>
          <li>WebSockets</li>
          <li>Authentication (OAuth)</li>
        </ul>
      </div>

      <div class="tech-stack-category stagger-3" data-viewport="true">
        <h3 class="tech-cat-title">Databases</h3>
        <ul class="tech-cat-list">
          <li>PostgreSQL</li>
          <li>MySQL</li>
          <li>Redis Caching</li>
          <li>Supabase</li>
          <li>Firebase</li>
          <li>Database Indexing</li>
        </ul>
      </div>

      <div class="tech-stack-category stagger-4" data-viewport="true">
        <h3 class="tech-cat-title">Payments &amp; APIs</h3>
        <ul class="tech-cat-list">
          <li>Stripe Billing</li>
          <li>Razorpay &amp; UPI</li>
          <li>SendGrid &amp; Postmark</li>
          <li>Twilio SMS</li>
          <li>AWS S3 Storage</li>
          <li>Webhook Processors</li>
        </ul>
      </div>

      <div class="tech-stack-category stagger-5" data-viewport="true">
        <h3 class="tech-cat-title">Cloud &amp; DevOps</h3>
        <ul class="tech-cat-list">
          <li>AWS Cloud</li>
          <li>DigitalOcean</li>
          <li>Vercel</li>
          <li>Cloudflare CDN</li>
          <li>Docker Containers</li>
          <li>GitHub CI/CD</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4-STEP DELIVERY PROCESS SECTION (AEO / PROCEDURAL KNOWLEDGE) -->
<section class="usecases-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Development Framework</span>
      <h2 class="section-title">How We Deliver Your Web Project</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, sprint-based approach where you see working software every week.</p>
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

<!-- FAQ SECTION (AEO & RICH SNIPPETS) -->
<section class="faq-section -gray">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-left" data-viewport="true">
        <span class="section-tag">Web FAQ</span>
        <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
        <p class="section-subtitle">Factual, direct answers to common questions about custom web development at Bluebase Technologies.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>What web development technologies do you specialize in?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Our core web engineering stack centers on Laravel (PHP 8.3) for robust, secure backend architecture and RESTful APIs, paired with React, Next.js, or Vue.js for reactive frontends. For marketing websites, we utilize Tailwind CSS with semantic HTML and PHP for maximum speed, accessibility, and 90+ Core Web Vitals performance.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How long does it take to develop a custom web application?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>A custom marketing website typically takes 1 to 3 weeks. A SaaS MVP or custom web application usually takes 3 to 6 weeks. We work in disciplined 2-week milestones with password-protected staging preview URLs so you see constant progress.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you handle project pricing and contracts?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We provide transparent, milestone-based fixed pricing. Before any coding starts, we prepare a detailed scope document detailing features, sprint deliverables, and exact milestone costs. You never face hidden agency markups or unexpected hourly fees.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you guarantee fast website loading speeds and Core Web Vitals?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We optimize Core Web Vitals from the first line of code. This includes minifying scripts, lazy loading media, optimizing database queries, implementing Redis caching, and leveraging Cloudflare global CDNs to ensure sub-second response times worldwide.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-5" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Who owns the source code and intellectual property?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>You own 100% of all intellectual property, source code, design assets, and database schemas from day one. Everything is handed over in a clean Git repository with zero vendor lock-in.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-6" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How does remote collaboration work across different time zones?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We run an asynchronous-first studio with scheduled daily overlap for US, UK, European, and Australian clients. You communicate directly with engineers via a dedicated Slack or WhatsApp channel and receive weekly recorded Loom demos and staging links.</p>
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
          Have a Web Project in Mind?<br><mark>Let's Build It Right</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Tell us about your requirements and receive a comprehensive technical plan and transparent estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=web-development" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Start Your Web Project</span>
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
      "@@id": "{{ url('/web-development') }}",
      "url": "{{ url('/web-development') }}",
      "name": "Web Development Services | Custom Web Applications & Websites",
      "description": "Bluebase Technologies provides custom web development services for startups and growing brands. We build scalable SaaS web applications, client portals, and fast websites with Laravel, React, Next.js, and Node.js.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/web-development#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/web-development#breadcrumb') }}",
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
          "name": "Web Development",
          "item": "{{ url('/web-development') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/web-development#service') }}",
      "name": "Web Development Services",
      "serviceType": "Custom Web Application & Website Development",
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
        { "@@type": "Country", "name": "Canada" },
        { "@@type": "Country", "name": "Australia" },
        { "@@type": "Country", "name": "Germany" },
        { "@@type": "Country", "name": "India" },
        { "@@type": "AdministrativeArea", "name": "Worldwide" }
      ],
      "availableLanguage": ["English", "Hindi"],
      "description": "Custom web application and full-stack website development services using Laravel, React, Next.js, Node.js, and Tailwind CSS. We deliver SaaS MVPs, client portals, and high-performance marketing websites.",
      "hasOfferCatalog": {
        "@@type": "OfferCatalog",
        "name": "Web Development Services Catalog",
        "itemListElement": [
          {
            "@@type": "Offer",
            "itemOffered": {
              "@@type": "Service",
              "name": "Custom SaaS Applications & MVPs"
            }
          },
          {
            "@@type": "Offer",
            "itemOffered": {
              "@@type": "Service",
              "name": "High-Converting Marketing Websites"
            }
          },
          {
            "@@type": "Offer",
            "itemOffered": {
              "@@type": "Service",
              "name": "Client Portals & Admin Dashboards"
            }
          },
          {
            "@@type": "Offer",
            "itemOffered": {
              "@@type": "Service",
              "name": "E-Commerce Online Stores & Checkouts"
            }
          },
          {
            "@@type": "Offer",
            "itemOffered": {
              "@@type": "Service",
              "name": "API & Backend Architecture"
            }
          },
          {
            "@@type": "Offer",
            "itemOffered": {
              "@@type": "Service",
              "name": "Web Performance & Core Web Vitals Optimization"
            }
          }
        ]
      }
    },
    {
      "@@type": "FAQPage",
      "@@id": "{{ url('/web-development#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "What web development technologies do you specialize in?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Our core web engineering stack centers on Laravel (PHP 8.3) for robust, secure backend architecture and RESTful APIs, paired with React, Next.js, or Vue.js for reactive frontends. For marketing websites, we utilize Tailwind CSS with semantic HTML and PHP for maximum speed, accessibility, and 90+ Core Web Vitals performance."
          }
        },
        {
          "@@type": "Question",
          "name": "How long does it take to develop a custom web application?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "A custom marketing website typically takes 1 to 3 weeks. A SaaS MVP or custom web application usually takes 3 to 6 weeks. We work in disciplined 2-week milestones with password-protected staging preview URLs so you see constant progress."
          }
        },
        {
          "@@type": "Question",
          "name": "How do you handle project pricing and contracts?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We provide transparent, milestone-based fixed pricing. Before any coding starts, we prepare a detailed scope document detailing features, sprint deliverables, and exact milestone costs. You never face hidden agency markups or unexpected hourly fees."
          }
        },
        {
          "@@type": "Question",
          "name": "How do you guarantee fast website loading speeds and Core Web Vitals?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We optimize Core Web Vitals from the first line of code. This includes minifying scripts, lazy loading media, optimizing database queries, implementing Redis caching, and leveraging Cloudflare global CDNs to ensure sub-second response times worldwide."
          }
        },
        {
          "@@type": "Question",
          "name": "Who owns the source code and intellectual property?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You own 100% of all intellectual property, source code, design assets, and database schemas from day one. Everything is handed over in a clean Git repository with zero vendor lock-in."
          }
        },
        {
          "@@type": "Question",
          "name": "How does remote collaboration work across different time zones?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We run an asynchronous-first studio with scheduled daily overlap for US, UK, European, and Australian clients. You communicate directly with engineers via a dedicated Slack or WhatsApp channel and receive weekly recorded Loom demos and staging links."
          }
        }
      ]
    }
  ]
}
</script>
@endpush
