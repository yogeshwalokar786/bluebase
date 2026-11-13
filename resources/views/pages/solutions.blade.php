@extends('layouts.app')

@section('title', 'Digital Engineering Solutions | Bluebase Technologies')
@section('meta_description', 'Purpose-built digital engineering solutions for founders, startups, and growing businesses: SaaS MVP development, custom web platforms, e-commerce stores, and code optimization.')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- Hero Breadcrumb Navigation Pill -->
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
          <span itemprop="name" aria-current="page">Solutions</span>
          <meta itemprop="position" content="2">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Tailored Digital Solutions &bull; Built For Growth</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Purpose-Built Engineering for <br><mark>Every Stage of Growth</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      Whether you are launching an early-stage SaaS MVP, building a custom e-commerce platform, or modernizing an existing web application, Bluebase provides proven engineering solutions that deliver measurable business results.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Solution</span>
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
      <div class="hero-badge-item">Startup to Scale-Up Velocity</div>
      <div class="hero-badge-item">Milestone-Based Delivery</div>
      <div class="hero-badge-item">100% Client-Owned IP</div>
      <div class="hero-badge-item">Direct Builder Access</div>
    </div>
  </div>
</section>

<!-- MARQUEE SECTION -->
@include('partials.client-marquee', ['heading' => 'Trusted by modern brands, founders, and growing businesses worldwide'])

<!-- SOLUTIONS GRID SECTION -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Targeted Solutions</span>
      <h2 class="section-title">Engineered for Your Specific Growth Goals</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Select the tailored solution roadmap that matches where your business is today and where you need it to be tomorrow.</p>
    </div>

    <div class="services-catalog-grid">
      <!-- 1. For Early-Stage Founders -->
      <div class="service-card-modern stagger-1" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">For Founders</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            </div>
          </div>
          <h3 class="service-title">Early-Stage MVP Launchpad</h3>
          <p class="service-desc">Go from initial concept to a live, functional, and testable product in 3 to 6 weeks to validate market demand with real paying users.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Rapid 3 to 6 week 0-to-1 build turnaround
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Authentication, user onboarding &amp; subscription tiers
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Stripe &amp; Razorpay payment integration
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Ready for investor pitches &amp; beta feedback
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">SaaS MVP</span>
            <span class="tech-tag-pill">Laravel</span>
            <span class="tech-tag-pill">React</span>
            <span class="tech-tag-pill">Stripe</span>
          </div>
          <a href="{{ route('services.saas-mvp-development') }}" class="service-action-link">
            <span>Explore MVP Solution</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 2. For Modern Brands: Website Design & Build -->
      <div class="service-card-modern stagger-2" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">For Brands</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
            </div>
          </div>
          <h3 class="service-title">High-Converting Websites</h3>
          <p class="service-desc">Marketing websites and brand landing pages engineered for visual impact, high search visibility, and lightning-fast page speeds.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Bespoke UI design customized to your brand
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Google PageSpeed 90+ on mobile and desktop
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Semantic HTML5, Schema.org SEO &amp; social meta
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Integrated lead capture funnels &amp; analytics
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
          <a href="{{ route('services.website-design') }}" class="service-action-link">
            <span>Explore Website Solution</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 3. For Scale-ups: Web App & SaaS Architecture -->
      <div class="service-card-modern stagger-3" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">For Scale-ups</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
          </div>
          <h3 class="service-title">Custom Web Platforms</h3>
          <p class="service-desc">Robust full-stack web applications, interactive SaaS dashboards, and customer portals engineered to scale seamlessly as your user base expands.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Scalable PostgreSQL &amp; MySQL database architectures
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Reactive frontend interfaces with React and Next.js
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Role-based permissions &amp; tenant security
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              High-throughput RESTful and GraphQL API backends
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
          <a href="{{ route('services.web-development') }}" class="service-action-link">
            <span>Explore Web Platforms</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 4. E-Commerce & Online Stores -->
      <div class="service-card-modern stagger-1" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Commerce</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            </div>
          </div>
          <h3 class="service-title">E-Commerce &amp; Checkouts</h3>
          <p class="service-desc">Fast, frictionless online shopping experiences and payment integrations designed to increase conversion rates and average order values.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Custom storefronts &amp; headless checkouts
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Stripe, Razorpay, UPI &amp; PayPal gateway integrations
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Live inventory tracking &amp; automated order webhooks
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Cart abandonment flows &amp; transactional email setup
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Shopify</span>
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

      <!-- 5. Cross-Platform Mobile Apps -->
      <div class="service-card-modern stagger-2" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Mobile Solutions</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
            </div>
          </div>
          <h3 class="service-title">Mobile App Products</h3>
          <p class="service-desc">Cross-platform iOS and Android applications developed with Flutter and React Native delivering ultra-smooth native performance.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Single clean codebase for iOS and Android
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Offline local database caching &amp; sync
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Biometric login, push notifications &amp; native APIs
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Complete App Store &amp; Google Play Store release
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">Flutter</span>
            <span class="tech-tag-pill">React Native</span>
            <span class="tech-tag-pill">iOS</span>
            <span class="tech-tag-pill">Android</span>
          </div>
          <a href="{{ route('services.mobile-app-development') }}" class="service-action-link">
            <span>Explore Mobile Solution</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>

      <!-- 6. Website Redesign & Code Modernization -->
      <div class="service-card-modern stagger-3" data-viewport="true">
        <div>
          <div class="service-card-header">
            <span class="service-badge">Modernization</span>
            <div class="service-icon-box">
              <svg viewBox="0 0 24 24"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            </div>
          </div>
          <h3 class="service-title">Website Redesign &amp; Speed</h3>
          <p class="service-desc">Transform slow, outdated web platforms with modern reactive interfaces, clean code refactoring, and Core Web Vitals optimization.</p>
          <ul class="service-checklist">
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Modern visual design refresh for higher conversions
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Google PageSpeed tuning targeting 90+ score
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              Database query indexing &amp; N+1 query elimination
            </li>
            <li>
              <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              100% SEO rank retention &amp; zero URL broken links
            </li>
          </ul>
        </div>
        <div>
          <div class="service-tech-tags">
            <span class="tech-tag-pill">PageSpeed 90+</span>
            <span class="tech-tag-pill">UI Refresh</span>
            <span class="tech-tag-pill">Core Web Vitals</span>
            <span class="tech-tag-pill">Refactoring</span>
          </div>
          <a href="{{ route('services.website-redesign') }}" class="service-action-link">
            <span>Explore Redesign Solution</span>
            <svg viewBox="0 0 16 16" fill="currentColor"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- COMPARISON SECTION: BLUEBASE ADVANTAGE -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">The Bluebase Difference</span>
      <h2 class="section-title">Built for Founders Who Demand Quality &amp; Speed</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We designed our studio specifically to eliminate the overhead of traditional agencies and the inconsistency of freelance portals.</p>
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
            Heavy agency markups for middle management
          </li>
          <li>
            <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            Slow communication via ticketing portals
          </li>
          <li>
            <svg viewBox="0 0 20 20" fill="currentColor" class="ico-cross"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            Rigid contracts with expensive hourly change fees
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
            Zero post-launch warranty or code support
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="faq-section">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-left" data-viewport="true">
        <span class="section-tag">FAQ</span>
        <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
        <p class="section-subtitle">Common questions from founders and business owners about Bluebase solutions.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>What solutions does Bluebase offer?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We provide tailored digital engineering solutions: Early-stage SaaS MVP launches, high-converting marketing websites, custom web applications, cross-platform mobile apps (Flutter &amp; React Native), e-commerce storefronts, and website speed optimization.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How quickly can we launch an MVP?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>A typical 0-to-1 SaaS MVP takes 3 to 6 weeks. We work in disciplined 2-week milestones with password-protected staging preview URLs so you see tangible progress every week.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you handle pricing?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We provide transparent, milestone-based fixed pricing. Before any work begins, we agree on a detailed scope document with defined deliverables and costs per milestone. You never face surprise invoices.</p>
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
                <p>You own 100% of all intellectual property, source code, Figma design files, and database schemas from day one. Upon completion, all Git repositories and credentials are fully transferred to you with zero vendor lock-in.</p>
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
          Ready to Build Your Custom Digital Solution?<br><mark>Let's Get Started</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Tell us about your project requirements and receive a comprehensive roadmap and transparent milestone estimate within 24 hours.
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
          <a href="{{ route('contact') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
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
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "CollectionPage",
      "@@id": "{{ url('/solutions') }}",
      "url": "{{ url('/solutions') }}",
      "name": "Startup & Brand Engineering Solutions | Bluebase Technologies",
      "description": "Tailored digital engineering tracks for startups, scale-ups, and modern brands: SaaS MVP development, custom web applications, high-converting websites, and mobile apps.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/solutions#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/solutions#breadcrumb') }}",
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
          "name": "Solutions",
          "item": "{{ url('/solutions') }}"
        }
      ]
    }
  ]
}
</script>
@endpush
