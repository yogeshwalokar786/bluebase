@extends('layouts.app')

@section('title', 'Digital Engineering & Development Services | Bluebase')
@section('meta_description', 'Bluebase is an agile digital engineering studio. We build custom web applications, mobile apps, SaaS MVPs, and modern websites for startups and brands.')

@section('content')
<main id="main-content">
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
          <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name" aria-current="page">Services</span>
            <meta itemprop="position" content="2">
          </li>
        </ol>
      </nav>

      <p class="hero-pretitle" data-viewport="true">Engineering Studio &bull; Web, Mobile &amp; SaaS</p>
      <h1 class="hero-title stagger-1" data-viewport="true">
        Digital Services Built for <br><mark>Speed, Scale &amp; Impact</mark>.
      </h1>
      <p class="hero-description stagger-2" data-viewport="true">
        We partner with founders, startups, and growing businesses to build fast web applications, cross-platform mobile apps, and modern high-converting websites. Clean code, fixed milestones, and 100% IP ownership.
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
        <div class="hero-badge-item">0 to 1 Launch in Weeks</div>
        <div class="hero-badge-item">Direct Builder Communication</div>
        <div class="hero-badge-item">100% Code &amp; IP Ownership</div>
        <div class="hero-badge-item">Milestone-Based Pricing</div>
      </div>
    </div>
  </section>

  <!-- MARQUEE SECTION -->
  @include('partials.client-marquee', ['heading' => 'Trusted by modern brands, founders, and growing businesses worldwide'])

  <!-- CORE SERVICES CATALOG SECTION -->
  <section class="subpage-section" id="services-catalog">
    <div class="container">
      <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
        <span class="section-tag">Core Capabilities</span>
        <h2 class="section-title">Everything You Need to Build &amp; Scale</h2>
        <p class="section-subtitle" style="margin: 0 auto;">From zero-to-one MVP prototypes to full-scale web platforms and mobile apps, we deliver modern digital engineering without agency bloat.</p>
      </div>

      <div class="services-catalog-grid">
        <!-- 1. Web App Development -->
        <div class="service-card-modern stagger-1" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">Full-Stack</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
              </div>
            </div>
            <h3 class="service-title">Web App Development</h3>
            <p class="service-desc">Custom web applications, SaaS platforms, and internal portals built with robust architecture and modern reactive interfaces.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Custom SaaS platforms &amp; client portals
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Role-based auth &amp; subscription billing
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Laravel, React, Next.js &amp; Node.js stack
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Production-ready APIs &amp; database design
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">Laravel</span>
              <span class="tech-tag-pill">React</span>
              <span class="tech-tag-pill">Next.js</span>
              <span class="tech-tag-pill">Node.js</span>
              <span class="tech-tag-pill">MySQL</span>
            </div>
            <a href="{{ route('services.web-development') }}" class="service-action-link">
              <span>Explore Web Development</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 2. Website Design & Build -->
        <div class="service-card-modern stagger-2" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">Web Design</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
              </div>
            </div>
            <h3 class="service-title">Website Design &amp; Build</h3>
            <p class="service-desc">High-converting marketing websites and landing pages engineered for brand impact, mobile responsiveness, and high speed.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Bespoke design tailored to your brand
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                90+ Core Web Vitals performance score
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Responsive across mobile, tablet &amp; desktop
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Technical SEO &amp; lead capture integration
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">Tailwind CSS</span>
              <span class="tech-tag-pill">JavaScript</span>
              <span class="tech-tag-pill">PHP / Blade</span>
              <span class="tech-tag-pill">SEO Ready</span>
            </div>
            <a href="{{ route('services.website-design') }}" class="service-action-link">
              <span>Explore Website Design</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 3. Mobile App Development -->
        <div class="service-card-modern stagger-3" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">iOS &amp; Android</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
              </div>
            </div>
            <h3 class="service-title">Mobile App Development</h3>
            <p class="service-desc">Cross-platform iOS and Android mobile apps delivering ultra-smooth native performance with a single clean codebase.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Flutter &amp; React Native cross-platform apps
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Push notifications &amp; offline local storage
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Biometric auth &amp; hardware integrations
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                App Store &amp; Play Store release support
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">Flutter</span>
              <span class="tech-tag-pill">React Native</span>
              <span class="tech-tag-pill">iOS</span>
              <span class="tech-tag-pill">Android</span>
              <span class="tech-tag-pill">Firebase</span>
            </div>
            <a href="{{ route('services.mobile-app-development') }}" class="service-action-link">
              <span>Explore Mobile Apps</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 4. SaaS MVP Engineering -->
        <div class="service-card-modern stagger-1" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">0 to 1 Launch</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              </div>
            </div>
            <h3 class="service-title">SaaS MVP Engineering</h3>
            <p class="service-desc">Turn your product concept into a launch-ready, testable MVP in 3 to 6 weeks to validate real market demand.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Rapid 3 to 6 week development turnaround
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Lean feature architecture &amp; database schema
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                User onboarding, auth &amp; subscription tiers
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Ready for investor demos &amp; early beta users
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">SaaS MVP</span>
              <span class="tech-tag-pill">Laravel</span>
              <span class="tech-tag-pill">React</span>
              <span class="tech-tag-pill">Stripe</span>
              <span class="tech-tag-pill">PostgreSQL</span>
            </div>
            <a href="{{ route('services.saas-mvp-development') }}" class="service-action-link">
              <span>Explore SaaS MVPs</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 5. E-Commerce Online Stores -->
        <div class="service-card-modern stagger-2" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">Commerce</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
              </div>
            </div>
            <h3 class="service-title">E-Commerce Online Stores</h3>
            <p class="service-desc">Fast, custom online storefronts and checkout workflows designed to maximize conversions and average order value.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Custom storefronts &amp; headless architecture
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Stripe, Razorpay, UPI &amp; PayPal payment gateways
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Product inventory, discounts &amp; order tracking
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Fast cart recovery &amp; transactional email setup
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">Shopify</span>
              <span class="tech-tag-pill">WooCommerce</span>
              <span class="tech-tag-pill">Laravel</span>
              <span class="tech-tag-pill">Stripe</span>
              <span class="tech-tag-pill">Razorpay</span>
            </div>
            <a href="{{ route('services.ecommerce-development') }}" class="service-action-link">
              <span>Explore E-Commerce</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 6. UI/UX Design & Prototyping -->
        <div class="service-card-modern stagger-3" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">Product Design</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/></svg>
              </div>
            </div>
            <h3 class="service-title">UI/UX Design &amp; Prototyping</h3>
            <p class="service-desc">Modern, user-centered interface designs, Figma wireframes, and interactive clickable prototypes before writing code.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                User journey mapping &amp; wireframe flows
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Complete component Figma design systems
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Interactive click-through prototypes
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Pixel-perfect developer-ready design tokens
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">Figma</span>
              <span class="tech-tag-pill">Wireframes</span>
              <span class="tech-tag-pill">Design Systems</span>
              <span class="tech-tag-pill">User Testing</span>
            </div>
            <a href="{{ route('services.ui-ux-design') }}" class="service-action-link">
              <span>Explore UI/UX Design</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 7. API & Backend Development -->
        <div class="service-card-modern stagger-1" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">Backend &amp; API</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
              </div>
            </div>
            <h3 class="service-title">API &amp; Backend Development</h3>
            <p class="service-desc">High-performance backend systems, RESTful APIs, third-party integrations, and scalable database architectures.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                High-throughput RESTful API architecture
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Secure webhook handlers &amp; service bridges
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Database modeling, indexing &amp; Redis caching
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                API documentation &amp; automated test suites
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">Laravel</span>
              <span class="tech-tag-pill">Node.js</span>
              <span class="tech-tag-pill">REST APIs</span>
              <span class="tech-tag-pill">PostgreSQL</span>
              <span class="tech-tag-pill">Redis</span>
            </div>
            <a href="{{ route('services.api-backend-development') }}" class="service-action-link">
              <span>Explore API &amp; Backend</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 8. Website Redesign & Speed -->
        <div class="service-card-modern stagger-2" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">Optimization</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
              </div>
            </div>
            <h3 class="service-title">Website Redesign &amp; Speed</h3>
            <p class="service-desc">Revamp outdated websites with modern aesthetics, clean semantic code, and lightning-fast page loading speeds.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Visual &amp; UX revamp for higher conversion rates
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Google PageSpeed 90+ mobile &amp; desktop tuning
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Code minification, asset compression &amp; cleanup
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Full SEO retention &amp; URL structure protection
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">Core Web Vitals</span>
              <span class="tech-tag-pill">Performance</span>
              <span class="tech-tag-pill">Code Audit</span>
              <span class="tech-tag-pill">UI Refresh</span>
            </div>
            <a href="{{ route('services.website-redesign') }}" class="service-action-link">
              <span>Explore Website Redesign</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>

        <!-- 9. Maintenance & Support -->
        <div class="service-card-modern stagger-3" data-viewport="true">
          <div>
            <div class="service-card-header">
              <span class="service-badge">Ongoing Care</span>
              <div class="service-icon-box">
                <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
              </div>
            </div>
            <h3 class="service-title">Maintenance &amp; Support</h3>
            <p class="service-desc">Reliable ongoing technical support, security patching, uptime monitoring, and continuous product enhancements.</p>
            <ul class="service-checklist">
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Proactive bug fixes &amp; security patches
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Framework, package &amp; dependency upgrades
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Automated daily backups &amp; 24/7 uptime monitoring
              </li>
              <li>
                <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                Priority turnaround for new feature requests
              </li>
            </ul>
          </div>
          <div>
            <div class="service-tech-tags">
              <span class="tech-tag-pill">24/7 Monitoring</span>
              <span class="tech-tag-pill">Bug Fixes</span>
              <span class="tech-tag-pill">Security</span>
              <span class="tech-tag-pill">SLA Support</span>
            </div>
            <a href="{{ route('services.maintenance-support') }}" class="service-action-link">
              <span>Explore Maintenance Plans</span>
              <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- COMPARISON SECTION: THE STARTUP ADVANTAGE -->
  <section class="subpage-section -gray">
    <div class="container">
      <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
        <span class="section-tag">The Bluebase Advantage</span>
        <h2 class="section-title">A Better Way to Build Digital Products</h2>
        <p class="section-subtitle" style="margin: 0 auto;">We designed our studio specifically for founders and growing businesses who need speed, quality, and direct builder collaboration.</p>
      </div>

      <div class="comparison-grid">
        <!-- Traditional Agencies -->
        <div class="comparison-card stagger-1" data-viewport="true">
          <div class="comparison-header">
            <span class="comparison-label">Traditional Agency</span>
            <h3 class="comparison-title">Slow &amp; Inflated</h3>
            <p class="comparison-desc">Heavy overhead, multi-layer account managers, and long 6-month timelines.</p>
          </div>
          <ul class="comparison-features">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              3 to 6 months before seeing working software
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              Heavy agency markups for non-technical middle management
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              Slow communication via ticketing portals and emails
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              Rigid contracts with expensive change orders
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              Work often delegated to junior outsourced staff
            </li>
          </ul>
        </div>

        <!-- The Bluebase Studio (Highlighted) -->
        <div class="comparison-card -highlight stagger-2" data-viewport="true">
          <div class="comparison-header">
            <span class="comparison-label">The Bluebase Studio</span>
            <h3 class="comparison-title">Fast, Lean &amp; Dedicated</h3>
            <p class="comparison-desc">Agile engineering, direct developer communication, and transparent milestone pricing.</p>
          </div>
          <ul class="comparison-features">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-check"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Live working software delivered in 2 to 4 week sprints
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-check"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Direct Slack/WhatsApp access to the actual developers
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-check"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Clear milestone-based pricing with zero surprise bills
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-check"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Clean, modular, documented code with 100% IP ownership
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-check"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Dedicated post-launch warranty and maintenance support
            </li>
          </ul>
        </div>

        <!-- Freelance Marketplaces -->
        <div class="comparison-card stagger-3" data-viewport="true">
          <div class="comparison-header">
            <span class="comparison-label">Freelance Portals</span>
            <h3 class="comparison-title">Risky &amp; Fragmented</h3>
            <p class="comparison-desc">Unreliable code standards, ghosting risks, and fragmented accountability.</p>
          </div>
          <ul class="comparison-features">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              Inconsistent quality and lack of UI/UX design cohesion
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              High risk of developer ghosting or missed delivery dates
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              Unmaintainable spaghetti code that breaks under load
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              Zero security audits or automated testing
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              No post-launch support when bugs surface later
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- DELIVERY PROCESS: 4-STEP FRAMEWORK -->
  <section class="usecases-section">
    <div class="container">
      <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
        <span class="section-tag">How We Deliver</span>
        <h2 class="section-title">From Concept to Launch in 4 Clear Steps</h2>
        <p class="section-subtitle" style="margin: 0 auto;">A transparent, collaborative engineering process designed for zero friction and rapid results.</p>
      </div>

      <div class="process-grid-4">
        <div class="process-step-box stagger-1" data-viewport="true">
          <div class="process-num">01</div>
          <h3 class="process-step-title">Technical Discovery</h3>
          <p class="process-step-desc">We review your requirements, map out key user flows, recommend the best tech stack, and deliver a fixed-scope milestone roadmap within 48 hours.</p>
        </div>

        <div class="process-step-box stagger-2" data-viewport="true">
          <div class="process-num">02</div>
          <h3 class="process-step-title">UI/UX &amp; Prototyping</h3>
          <p class="process-step-desc">We design wireframes, component design systems, and clickable Figma prototypes. You review and approve the exact look and feel before coding begins.</p>
        </div>

        <div class="process-step-box stagger-3" data-viewport="true">
          <div class="process-num">03</div>
          <h3 class="process-step-title">Agile Sprints</h3>
          <p class="process-step-desc">We write clean, modular code in 2-week agile milestones. You get password-protected staging preview URLs to test features as they are built.</p>
        </div>

        <div class="process-step-box stagger-4" data-viewport="true">
          <div class="process-num">04</div>
          <h3 class="process-step-title">Launch &amp; Handover</h3>
          <p class="process-step-desc">We perform cross-browser testing, Core Web Vitals tuning, and production deployment. We hand over 100% of the repository, assets, and documentation.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TECH STACK SECTION -->
  <section class="subpage-section -gray">
    <div class="container">
      <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
        <span class="section-tag">Modern Stack</span>
        <h2 class="section-title">Technologies We Build With Daily</h2>
        <p class="section-subtitle" style="margin: 0 auto;">We use battle-tested, modern technologies that ensure high performance, developer ergonomics, and seamless scalability.</p>
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
            <li>Laravel (PHP)</li>
            <li>Node.js</li>
            <li>Express.js</li>
            <li>RESTful APIs</li>
            <li>GraphQL</li>
            <li>Webhooks</li>
          </ul>
        </div>

        <div class="tech-stack-category stagger-3" data-viewport="true">
          <h3 class="tech-cat-title">Mobile</h3>
          <ul class="tech-cat-list">
            <li>Flutter</li>
            <li>React Native</li>
            <li>iOS (Swift UI)</li>
            <li>Android (Kotlin)</li>
            <li>Cross-Platform UI</li>
            <li>Offline Sync</li>
          </ul>
        </div>

        <div class="tech-stack-category stagger-4" data-viewport="true">
          <h3 class="tech-cat-title">Databases</h3>
          <ul class="tech-cat-list">
            <li>MySQL</li>
            <li>PostgreSQL</li>
            <li>Redis Caching</li>
            <li>Supabase</li>
            <li>Firebase</li>
            <li>SQLite</li>
          </ul>
        </div>

        <div class="tech-stack-category stagger-5" data-viewport="true">
          <h3 class="tech-cat-title">Cloud &amp; Tools</h3>
          <ul class="tech-cat-list">
            <li>AWS</li>
            <li>DigitalOcean</li>
            <li>Vercel</li>
            <li>Stripe &amp; Razorpay</li>
            <li>Git &amp; GitHub</li>
            <li>Figma</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQ ACCORDION -->
  <section class="faq-section">
    <div class="container">
      <div class="faq-layout">
        <div class="faq-left" data-viewport="true">
          <span class="section-tag">FAQ</span>
          <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
          <p class="section-subtitle">Common questions from founders and businesses about working with our digital engineering studio.</p>
        </div>
        <div class="faq-right">
          <div class="accordion-list">
            <div class="accordion-item open stagger-1" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="true">
                <span>What digital services does Bluebase provide?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Bluebase is a digital product engineering and design studio. We specialize in custom web application development, responsive website design, cross-platform mobile apps (iOS &amp; Android via Flutter and React Native), SaaS MVP engineering, e-commerce stores, UI/UX Figma design, custom API backends, and ongoing website maintenance.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-2" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How long does a typical project take to complete?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Timelines depend on the project scope. A modern marketing website or landing page typically takes 1 to 3 weeks. A SaaS MVP or custom web application usually takes 3 to 6 weeks. We work in disciplined 2-week sprints so you see tangible working software every step of the way.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-3" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How do you handle project pricing?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>We provide transparent, milestone-based fixed pricing. Before any coding begins, we deliver a detailed scope document with defined deliverables and costs per milestone. You never face surprise invoices or hidden agency fees.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-4" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>Who owns the code and intellectual property?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>You do. You own 100% of all source code, intellectual property, Figma design files, and database schemas from day one. Upon launch, all Git repositories and administrative credentials are fully transferred to you with zero vendor lock-in.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-5" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>Can you redesign or optimize an existing website or app?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Yes. We regularly help companies revamp slow, outdated websites or refactor existing web applications. We audit your current tech stack, improve performance scores (targeting 90+ Core Web Vitals), modernize the UI/UX, and ensure zero loss in existing SEO rankings.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-6" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>Do you provide post-launch maintenance and support?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Yes. Every project includes an initial post-launch warranty period for bug fixes. We also offer ongoing monthly maintenance retainers covering security updates, server monitoring, backups, and continuous feature enhancements.</p>
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
            Ready to Build Your Next Digital Product?<br><mark>Let's Get Started</mark>.
          </h2>
          <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
            Tell us about your project requirements and receive a detailed technical roadmap and milestone quote within 24 hours.
          </p>
          <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
            <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
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
            <div class="cta-pill-item">100% Code &amp; IP Ownership</div>
            <div class="cta-pill-item">Zero Vendor Lock-In</div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('scripts')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "CollectionPage",
      "@@id": "{{ url('/services') }}",
      "url": "{{ url('/services') }}",
      "name": "Digital Engineering & Development Services | Bluebase",
      "description": "Bluebase is an agile digital engineering studio. We build custom web applications, mobile apps, SaaS MVPs, and modern websites for startups and brands.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/services#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/services#breadcrumb') }}",
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
          "item": "{{ url('/services') }}"
        }
      ]
    }
  ]
}
</script>
@endpush
