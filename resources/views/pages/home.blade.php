@extends('layouts.app')

@section('title', 'Bluebase Technologies | Digital Engineering, Web & Mobile App Development Startup')
@section('meta_description', 'Bluebase Technologies is an agile, remote-first digital engineering startup based in India. We build high-performance custom websites, web applications, mobile apps, SaaS MVPs, and e-commerce platforms for growing brands and founders worldwide.')

@section('content')
<!-- ========================================================================
     MAIN CONTENT
     ======================================================================== -->
<main id="main-content">

  <!-- 1. HERO SECTION WITH RUNNING CORPORATE OFFICE BACKGROUND VIDEO -->
  <section class="hero-section {{ ($settings['hero_video_enabled'] ?? '1') !== '0' ? 'has-video-bg' : '' }}">
    @php
      $videoEnabled = ($settings['hero_video_enabled'] ?? '1') !== '0';
      $videoUrl = $settings['hero_video_url'] ?? 'videos/corporate-office.mp4';
      $videoPoster = $settings['hero_video_poster'] ?? 'images/hero-video-poster.jpg';
      $overlayOpacity = $settings['hero_video_overlay_opacity'] ?? '0.65';
    @endphp

    @if($videoEnabled)
      <div class="hero-video-wrap" aria-hidden="true">
        <video class="hero-video-elem" id="heroBgVideo" autoplay loop muted playsinline preload="auto" poster="{{ asset($videoPoster) }}">
          <source src="{{ asset($videoUrl) }}" type="video/mp4">
          <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg">
        </video>
        <div class="hero-video-overlay" style="opacity: {{ $overlayOpacity }};"></div>
      </div>
    @else
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
    @endif

    <div class="container hero-content">
      <p class="hero-pretitle" data-viewport="true">Software &amp; Digital Product Studio</p>
      <h1 class="hero-title stagger-1" data-viewport="true">
        We Build Web, Mobile &amp; <mark>Digital Products</mark>.
      </h1>
      <p class="hero-description stagger-2" data-viewport="true">
        We design and build custom web applications, mobile apps, and modern websites for ambitious founders and growing brands.
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
        <div class="hero-badge-item">Remote-First</div>
        <div class="hero-badge-item">100% Client-Owned IP</div>
        <div class="hero-badge-item">Milestone Pricing</div>
      </div>
    </div>

    @if($videoEnabled)
      <!-- Digital Workspace Feed Pill in bottom right of hero -->
      <div class="hero-video-badge" id="heroVideoBadgeWrap">
        <button type="button" class="hero-video-toggle" id="heroVideoToggleBtn" aria-label="Pause/Resume background video" title="Engineering Workspace Video">
          <span class="video-live-dot"></span>
          <span class="video-label" id="heroVideoStateLabel">Engineering Studio Live</span>
          <svg class="video-icon video-icon-pause" id="heroVideoIconPause" viewBox="0 0 24 24" fill="currentColor">
            <rect x="6" y="4" width="4" height="16" rx="1"/>
            <rect x="14" y="4" width="4" height="16" rx="1"/>
          </svg>
          <svg class="video-icon video-icon-play" id="heroVideoIconPlay" viewBox="0 0 24 24" fill="currentColor" style="display:none;">
            <polygon points="5 3 19 12 5 21 5 3"/>
          </svg>
        </button>
      </div>
    @endif
  </section>

  <!-- 2. BRAND LOGO MARQUEE -->
  @include('partials.client-marquee', ['heading' => 'Trusted by modern brands, ambitious startups, and fast-growing businesses worldwide'])

  <!-- 3. OUR SERVICES SECTION -->
  <section class="usecases-section" id="services">
    <div class="container">
      <div class="usecases-header" data-viewport="true">
        <span class="section-tag">Our Services</span>
        <h2 class="section-title">Every Great Product Starts <br>With Clean Engineering.</h2>
        <p class="section-subtitle" style="margin: 0 auto 24px;">
          From rapid SaaS MVPs and cross-platform mobile apps to custom e-commerce stores and robust backend APIs, we turn your requirements into production-ready software.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
          <a href="{{ route('services') }}" class="c-btn -secondary">
            <span class="c-btn__txt">View All Services</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('contact') }}" class="c-btn -primary">
            <span class="c-btn__txt">Start a Project</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>
      </div>

      <div class="usecases-grid">
        
        <!-- Card 1: Web App Development -->
        <article class="usecase-card stagger-1" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="Code Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">
              <a href="{{ route('services.web-development') }}" style="color: inherit; text-decoration: none;">Custom Web App Development</a>
            </h3>
          </div>
          <div class="usecase-card-body">
            <p>Full-stack web applications, SaaS dashboards, and portal architectures engineered with Laravel, React, Vue, and modern relational databases.</p>
            <a href="{{ route('services.web-development') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore Web Apps</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

        <!-- Card 2: Mobile App Development -->
        <article class="usecase-card stagger-2" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/code-bar.svg') }}" alt="Mobile Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">
              <a href="{{ route('services.mobile-app-development') }}" style="color: inherit; text-decoration: none;">Cross-Platform Mobile Apps</a>
            </h3>
          </div>
          <div class="usecase-card-body">
            <p>Responsive, high-performance iOS and Android applications built with Flutter and React Native, featuring smooth animations and offline data caching.</p>
            <a href="{{ route('services.mobile-app-development') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore Mobile Apps</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

        <!-- Card 3: SaaS MVP Engineering -->
        <article class="usecase-card stagger-3" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/ai-agent.svg') }}" alt="SaaS MVP Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">
              <a href="{{ route('services.saas-mvp-development') }}" style="color: inherit; text-decoration: none;">SaaS MVP Engineering</a>
            </h3>
          </div>
          <div class="usecase-card-body">
            <p>Turn your product concept into a launch-ready, testable MVP in 3 to 6 weeks to validate real market demand with paying subscribers and investor pitches.</p>
            <a href="{{ route('services.saas-mvp-development') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore SaaS MVP</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

        <!-- Card 4: E-Commerce & Online Stores -->
        <article class="usecase-card stagger-4" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="E-Commerce Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">
              <a href="{{ route('services.ecommerce-development') }}" style="color: inherit; text-decoration: none;">E-Commerce &amp; Online Stores</a>
            </h3>
          </div>
          <div class="usecase-card-body">
            <p>Modern online storefronts with seamless product catalogs, custom carts, secure payment gateway integrations (Stripe, Razorpay), and order management.</p>
            <a href="{{ route('services.ecommerce-development') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore E-Commerce</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

      </div>

      <!-- More Services CTA Button -->
      <div style="display: flex; justify-content: center; align-items: center; margin-top: 48px;" data-viewport="true">
        <a href="{{ route('services') }}" class="c-btn -primary" style="padding: 16px 36px; font-size: 1rem; border-radius: 9999px;">
          <span class="c-btn__txt">Explore All Services</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
      </div>
    </div>
  </section>

  <!-- 4. WHY CHOOSE US (THE STARTUP ADVANTAGE) -->
  <section class="research-section" id="why-us">
    <div class="container">
      <div class="research-layout">
        
        <!-- Left: Why Choose Us Content & Core Promises -->
        <div class="research-left">
          <div class="research-left-header" data-viewport="true">
            <span class="section-tag">Why Choose Us</span>
            <h2 class="section-title">Built by Founders, <br>For Ambitious <mark>Founders &amp; Brands.</mark></h2>
            <p class="section-subtitle">
              Big agencies slow you down with sales pitches, bloated retainers, and junior developer markups. As an agile engineering startup, we give you direct access to skilled builders who ship clean, production-ready code on time.
            </p>
          </div>

          <div class="stats-grid">
            <div class="stat-item stagger-1" data-viewport="true">
              <div class="stat-number">
                <span class="stat-number-val" data-target="3">0</span><span class="stat-symbol">X</span>
              </div>
              <div class="stat-label">Faster time-to-market with weekly milestone sprints</div>
            </div>

            <div class="stat-item stagger-2" data-viewport="true">
              <div class="stat-number">
                <span class="stat-number-val" data-target="100">0</span><span class="stat-symbol">%</span>
              </div>
              <div class="stat-label">Code and intellectual property ownership from day one</div>
            </div>

            <div class="stat-item stagger-3" data-viewport="true">
              <div class="stat-number">
                <span class="stat-number-val" data-target="1">0</span><span class="stat-symbol">:1</span>
              </div>
              <div class="stat-label">Direct collaboration with your dedicated developers</div>
            </div>
          </div>

          <div class="stat-sub-bar stagger-4" data-viewport="true">
            <div class="stat-sub-number">0%</div>
            <div class="stat-label">Vendor lock-in. Transparent milestone billing with no surprise charges or ongoing license fees.</div>
          </div>
        </div>

        <!-- Right: The Startup Commitment Box -->
        <div class="research-right">
          <div class="research-card-box" data-viewport="true" data-animation="fade-scale">
            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 16px;">
              <span class="section-tag" style="margin-bottom: 0;">Our Commitment</span>
            </div>
            <h3 class="research-card-title">Simple. Honest. Built to Ship.</h3>
            <p style="font-size: 0.9rem; color: var(--color-gray-600); line-height: 1.6; margin-bottom: 20px;">
              We treat every client project like our own product. You get complete transparency, regular progress demos, and zero corporate bureaucracy.
            </p>

            <ul style="list-style: none; padding: 0; margin: 0 0 28px; display: flex; flex-direction: column; gap: 12px;">
              <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 0.88rem; color: var(--color-primary); font-weight: 500;">
                <svg viewBox="0 0 20 20" fill="var(--color-accent)" style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <span>Live staging links updated every sprint</span>
              </li>
              <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 0.88rem; color: var(--color-primary); font-weight: 500;">
                <svg viewBox="0 0 20 20" fill="var(--color-accent)" style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <span>Milestone-based pay as you verify</span>
              </li>
              <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 0.88rem; color: var(--color-primary); font-weight: 500;">
                <svg viewBox="0 0 20 20" fill="var(--color-accent)" style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <span>Clean, modular, and maintainable source code</span>
              </li>
              <li style="display: flex; align-items: flex-start; gap: 10px; font-size: 0.88rem; color: var(--color-primary); font-weight: 500;">
                <svg viewBox="0 0 20 20" fill="var(--color-accent)" style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 2px;"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                <span>Post-launch support &amp; handover documentation</span>
              </li>
            </ul>

            <a href="{{ route('contact') }}" class="c-btn -primary" style="width: 100%; justify-content: center;">
              <span class="c-btn__txt">Talk to Our Engineering Team</span>
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
        </div>

      </div>
    </div>
  </section>

  <!-- 5. HOW WE WORK (OUR 4-STEP AGILE PROCESS) -->
  <section class="sticky-features-section" id="how-we-work">
    <div class="container">
      <div class="sticky-layout">
        
        <!-- Left Sticky -->
        <div class="sticky-left" data-viewport="true">
          <span class="section-tag light">How We Work</span>
          <h2 class="section-title">From Concept to Code, <br><mark>Shipped in 4 Clear Steps.</mark></h2>
          <p class="section-subtitle light">
            We operate as an agile, remote-first software studio. You communicate directly with the engineers writing your code, reviewing live staging links as each milestone progresses.
          </p>
          <div class="sticky-image-wrap">
            <img src="{{ asset('images/illustrations/workflow-canvas.jpg') }}" alt="Bluebase Engineering Workflow">
          </div>
          <div style="margin-top: 24px;">
            <a href="{{ route('contact') }}" class="c-btn -primary" style="display: inline-flex;">
              <span class="c-btn__txt">Start With Step 1</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </div>

        <!-- Right Scrolling Feature Cards -->
        <div class="sticky-right">
          
          <!-- Step 1 -->
          <div class="feature-scroll-card stagger-1" data-viewport="true">
            <div class="feature-card-icon">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="Scope Icon" width="24" height="24">
            </div>
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 6px;">Step 01 &bull; Discovery &amp; Scope</div>
            <h3 class="feature-card-title">1. Technical Blueprint &amp; Fixed Milestones</h3>
            <p class="feature-card-desc">
              We clarify your core feature requirements, choose the right technology stack, architect the database schema, and define concrete weekly sprint milestones with transparent pricing.
            </p>
            <a href="{{ route('contact') }}" class="c-btn -link">
              <span class="c-btn__txt">Discuss Your Project Scope</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>

          <!-- Step 2 -->
          <div class="feature-scroll-card stagger-2" data-viewport="true">
            <div class="feature-card-icon">
              <img src="{{ asset('images/icons/cube.svg') }}" alt="Design Icon" width="24" height="24">
            </div>
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 6px;">Step 02 &bull; Design &amp; Flow</div>
            <h3 class="feature-card-title">2. UI/UX Wireframes &amp; Interactive Prototype</h3>
            <p class="feature-card-desc">
              Before writing heavy backend code, our designers build pixel-perfect Figma layouts and interactive user flows. You test and approve the exact user experience before development starts.
            </p>
            <a href="{{ route('services.ui-ux-design') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore UI/UX Process</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>

          <!-- Step 3 -->
          <div class="feature-scroll-card stagger-3" data-viewport="true">
            <div class="feature-card-icon">
              <img src="{{ asset('images/icons/code-bar.svg') }}" alt="Sprint Icon" width="24" height="24">
            </div>
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 6px;">Step 03 &bull; Agile Engineering</div>
            <h3 class="feature-card-title">3. Weekly Sprints &amp; Live Staging Demos</h3>
            <p class="feature-card-desc">
              We build in fast 1 to 2 week sprints. At the end of every sprint, you receive a live private staging link to test real features, provide feedback, and verify progress directly with the developers.
            </p>
            <a href="{{ route('how-we-work') }}" class="c-btn -link">
              <span class="c-btn__txt">Learn About Sprints</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>

          <!-- Step 4 -->
          <div class="feature-scroll-card stagger-4" data-viewport="true">
            <div class="feature-card-icon">
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="Launch Icon" width="24" height="24">
            </div>
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 6px;">Step 04 &bull; Launch &amp; Handover</div>
            <h3 class="feature-card-title">4. Thorough QA, Launch &amp; 100% IP Handover</h3>
            <p class="feature-card-desc">
              We run cross-browser and mobile device audits, deploy directly to your production cloud hosting, and transfer full repository ownership, documentation, and credentials to your team.
            </p>
            <a href="{{ route('book-a-demo') }}" class="c-btn -link">
              <span class="c-btn__txt">Schedule Free Consultation</span>
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

  <!-- 6. MODERN SYSTEM ARCHITECTURE & TECH STACK -->
  <section class="video-section" id="tech-stack">
    <div class="container">
      <div class="video-header" data-viewport="true">
        <span class="section-tag light">Our Tech Stack</span>
        <h2 class="section-title">
          Battle-Tested Technologies,<br>
          <mark>Built to Scale Without Bloat.</mark>
        </h2>
        <p class="section-subtitle light" style="margin: 0 auto;">
          We build with high-productivity, modern stacks that allow your startup to ship rapidly, keep hosting costs low, and scale smoothly as your user base grows.
        </p>
      </div>

      <div class="video-container" data-viewport="true" data-animation="fade-scale">
        <div class="system-arch-diagram">
          
          <!-- TIER 1: USERS & CHANNELS -->
          <div class="system-arch-tier -channels">
            <div class="system-arch-tag">&lt; FRONTEND &amp; MOBILE CHANNELS /&gt;</div>
            <div class="system-arch-pills">
              <span class="system-arch-pill">Next.js &amp; React</span>
              <span class="system-arch-pill">Vue.js &amp; Inertia</span>
              <span class="system-arch-pill">Flutter &amp; React Native</span>
              <span class="system-arch-pill">Tailwind CSS</span>
              <span class="system-arch-pill">High-Speed Web Apps</span>
              <span class="system-arch-pill">Admin Dashboards</span>
            </div>
          </div>

          <!-- CONNECTORS: TIER 1 TO TIER 2 -->
          <div class="system-arch-connectors">
            <div class="system-arch-conn -c1">
              <span class="conn-dot -top"></span>
              <span class="conn-pulse"></span>
              <span class="conn-dot -bottom"></span>
            </div>
            <div class="system-arch-conn -c2">
              <span class="conn-dot -top"></span>
              <span class="conn-pulse"></span>
              <span class="conn-dot -bottom"></span>
            </div>
            <div class="system-arch-conn -c3">
              <span class="conn-dot -top"></span>
              <span class="conn-pulse"></span>
              <span class="conn-dot -bottom"></span>
            </div>
          </div>

          <!-- TIER 2: BLUEBASE · CORE APPLICATION ENGINE (CENTERPIECE) -->
          <div class="system-arch-tier -neptune">
            <canvas class="system-arch-beam-canvas" aria-hidden="true"></canvas>

            <div class="system-arch-neptune-header">
              <div class="system-arch-tag -orange">&lt; BLUEBASE &middot; APPLICATION ENGINE /&gt;</div>
              <div class="system-arch-logo">
                <img src="{{ asset('images/logo-icon.png') }}" alt="Bluebase Icon" style="height: 28px; width: auto; display: block;">
              </div>
            </div>

            <!-- 3 Core Columns -->
            <div class="system-arch-work-grid">
              <!-- Col 1: High-Speed Frontend -->
              <div class="system-arch-work-card">
                <h4 class="work-card-title">Modern Frontend</h4>
                <p class="work-card-desc">React, Vue, Next.js, Blade &amp; Tailwind</p>
              </div>

              <!-- Col 2: Robust Backend Engine -->
              <div class="system-arch-work-card">
                <h4 class="work-card-title">Backend Architecture</h4>
                <p class="work-card-desc">Laravel, PHP 8.3, Node.js &amp; REST APIs</p>
              </div>

              <!-- Col 3: Data & State -->
              <div class="system-arch-work-card">
                <h4 class="work-card-title">Relational Databases</h4>
                <p class="work-card-desc">MySQL, PostgreSQL &amp; Redis Cache</p>
              </div>
            </div>

            <!-- Bottom Pill inside Bluebase Box -->
            <div class="system-arch-work-footer">
              <span class="system-arch-pill -highlight">Clean architecture &middot; Sub-10ms queries &middot; 100% Client Code Ownership</span>
            </div>
          </div>

          <!-- CONNECTORS: TIER 2 TO TIER 3 -->
          <div class="system-arch-connectors">
            <div class="system-arch-conn -b1">
              <span class="conn-dot -top"></span>
              <span class="conn-pulse"></span>
              <span class="conn-dot -bottom"></span>
            </div>
            <div class="system-arch-conn -b2">
              <span class="conn-dot -top"></span>
              <span class="conn-pulse"></span>
              <span class="conn-dot -bottom"></span>
            </div>
            <div class="system-arch-conn -b3">
              <span class="conn-dot -top"></span>
              <span class="conn-pulse"></span>
              <span class="conn-dot -bottom"></span>
            </div>
          </div>

          <!-- TIER 3: CLOUD & INTEGRATIONS -->
          <div class="system-arch-bottom-grid">
            <!-- Left Box: CLOUD & DEPLOYMENT -->
            <div class="system-arch-tier -record">
              <div class="system-arch-tag">&lt; CLOUD HOSTING &amp; DEPLOYMENT /&gt;</div>
              <div class="system-arch-pills">
                <span class="system-arch-pill">AWS / DigitalOcean</span>
                <span class="system-arch-pill">Vercel Edge</span>
                <span class="system-arch-pill">Docker Containers</span>
                <span class="system-arch-pill">Automated Backups</span>
              </div>
            </div>

            <!-- Right Box: THIRD-PARTY INTEGRATIONS -->
            <div class="system-arch-tier -connected">
              <div class="system-arch-tag">&lt; PAYMENTS &amp; THIRD-PARTY INTEGRATIONS /&gt;</div>
              <div class="system-arch-pills">
                <span class="system-arch-pill">Stripe &amp; Razorpay</span>
                <span class="system-arch-pill">OAuth &amp; JWT Auth</span>
                <span class="system-arch-pill">Transactional Mail</span>
                <span class="system-arch-pill">REST Webhooks</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- 7. CHOOSE YOUR NEXT MOVE -->
  <section class="nextmove-section" id="collaboration">
    <div class="container">
      <div class="nextmove-header" data-viewport="true">
        <span class="section-tag">Let's Build Together</span>
        <h2 class="section-title">Choose How We <mark>Collaborate</mark>.</h2>
        <p class="section-subtitle" style="margin: 0 auto;">
          Whether you're launching a new startup MVP from scratch, modernizing a business platform, or looking for dedicated sprint capacity, we're one message away.
        </p>
      </div>

      <div class="nextmove-grid">
        
        <!-- Card Left: For Founders & Startups -->
        <div class="nextmove-card-full stagger-1" data-viewport="true">
          <div>
            <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 8px;">For Founders &amp; Startups</div>
            <h3 class="section-title" style="font-size: 1.85rem; margin-bottom: 12px;">Launchpad MVP Sprints</h3>
            <p>Go from idea to a launched, production-ready web or mobile app in 3 to 6 weeks. You get transparent milestone-based pricing, weekly staging demos, and 100% intellectual property ownership from day one.</p>
            <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 24px;">
              <span class="service-badge" style="font-size: 0.75rem; padding: 4px 10px;">3-6 Week Turnaround</span>
              <span class="service-badge" style="font-size: 0.75rem; padding: 4px 10px;">Milestone Billing</span>
              <span class="service-badge" style="font-size: 0.75rem; padding: 4px 10px;">100% Code Ownership</span>
            </div>
            <a href="{{ route('contact') }}" class="c-btn -link">
              <span class="c-btn__txt">Start Your Startup MVP</span>
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
          <img src="{{ asset('images/illustrations/ui-illustration.jpg') }}" alt="Bluebase Product Experience" style="max-height: 260px; object-fit: cover; border-radius: 12px; margin-top: 20px;">
        </div>

        <!-- Cards Right -->
        <div class="nextmove-column-stack">
          <div class="nextmove-card-small stagger-2" data-viewport="true">
            <div>
              <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 6px;">For Growing Businesses</div>
              <h3>Custom Platforms &amp; Stores</h3>
              <p>Elevate your business with high-converting marketing websites, modern e-commerce storefronts, and automated client portals engineered for speed and conversion.</p>
            </div>
            <a href="{{ route('services') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore Services</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>

          <div class="nextmove-card-small stagger-3" data-viewport="true">
            <div>
              <div style="font-size: 0.75rem; font-weight: 700; color: var(--color-accent); text-transform: uppercase; letter-spacing: 0.08em; margin-bottom: 6px;">For Scaling Teams</div>
              <h3>Dedicated Developer Sprints</h3>
              <p>Add skilled full-stack engineering capacity directly into your team. Direct daily Slack collaboration, fast PR reviews, and zero agency middlemen.</p>
            </div>
            <a href="{{ route('book-a-demo') }}" class="c-btn -link">
              <span class="c-btn__txt">Talk to Our Team</span>
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

  <!-- 8. FEATURED CLIENT SPOTLIGHT: OMG RENTAL BIKES -->
  <section class="stories-section spotlight-section" id="stories">
    <div class="container">
      <div class="stories-header" data-viewport="true">
        <span class="section-tag">Featured Client Spotlight</span>
        <h2 class="section-title">Scaling an Urban Mobility Startup: <mark>OMG Rental Bikes</mark>.</h2>
        <p class="section-subtitle" style="margin: 16px auto 0; text-align: center;">
          How Bluebase built and continuously manages their entire digital ecosystem—from booking website and proprietary fleet management software to local search dominance and social media growth.
        </p>
      </div>

      <div class="spotlight-card" data-viewport="true" data-animation="fade-up">
        <!-- Top Spotlight Banner -->
        <div class="spotlight-header-bar">
          <div class="spotlight-client-identity">
            <div class="spotlight-logo-wrap">
              <img src="{{ asset('images/clients/omg-logo.webp') }}" alt="OMG Rental Bikes" class="spotlight-logo" loading="lazy">
            </div>
            <div class="spotlight-client-meta">
              <span class="spotlight-client-name">OMG Rental Bikes</span>
              <span class="spotlight-client-industry">Urban Two-Wheeler Mobility &amp; Bike Rentals</span>
            </div>
          </div>
          <div class="spotlight-badges">
            <span class="spotlight-badge badge-managed"><span class="badge-dot"></span> Fully Managed by Bluebase</span>
            <span class="spotlight-badge badge-accent">Live in Production</span>
          </div>
        </div>

        <!-- Spotlight Body: Two Columns -->
        <div class="spotlight-body">
          <div class="spotlight-intro">
            <span class="spotlight-eyebrow">End-to-End Startup Partnership</span>
            <h3 class="spotlight-headline">
              A 360-Degree Operating Engine Built &amp; Managed for Non-Stop Fleet Growth.
            </h3>
            <p class="spotlight-desc">
              OMG Rental Bikes partnered with Bluebase to replace fragmented spreadsheets and manual verification with an automated, custom software engine. From initial architecture to ongoing daily operations, Bluebase manages their technology and digital growth end-to-end so their founding team can focus entirely on scaling their fleet.
            </p>

            <!-- Metrics / Key Deliverables Row -->
            <div class="spotlight-metrics-grid">
              <div class="spotlight-metric">
                <span class="spotlight-metric-value">4-in-1</span>
                <span class="spotlight-metric-label">Unified Stack (Software, Web, GMB &amp; Social)</span>
              </div>
              <div class="spotlight-metric">
                <span class="spotlight-metric-value">100%</span>
                <span class="spotlight-metric-label">Paperless Digital KYC &amp; Verification</span>
              </div>
              <div class="spotlight-metric">
                <span class="spotlight-metric-value">#1</span>
                <span class="spotlight-metric-label">Top Local Search &amp; Google Map Visibility</span>
              </div>
              <div class="spotlight-metric">
                <span class="spotlight-metric-value">24/7</span>
                <span class="spotlight-metric-label">Managed Infrastructure &amp; Support</span>
              </div>
            </div>
          </div>

          <!-- 4 Core Pillars Grid -->
          <div class="spotlight-pillars">
            <h4 class="pillars-heading">What Bluebase Built &amp; Continuously Manages:</h4>

            <div class="pillars-grid">
              <!-- Pillar 1: Fleet ERP -->
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                    <line x1="8" y1="21" x2="16" y2="21"></line>
                    <line x1="12" y1="17" x2="12" y2="21"></line>
                  </svg>
                </div>
                <div class="pillar-content">
                  <h5 class="pillar-title">Custom Fleet Management Software (ERP)</h5>
                  <p class="pillar-text">
                    Custom-engineered operations dashboard managing real-time vehicle availability, paperless digital KYC validation, rental agreements, security deposit tracking, and vehicle maintenance schedules.
                  </p>
                </div>
              </div>

              <!-- Pillar 2: Booking Website -->
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="2" y1="12" x2="22" y2="12"></line>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                  </svg>
                </div>
                <div class="pillar-content">
                  <h5 class="pillar-title">High-Converting Booking Website</h5>
                  <p class="pillar-text">
                    Modern, responsive web platform at <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" class="external-inline-link">omgrentalbikes.com</a> featuring dynamic vehicle catalogs, transparent pricing tiers, instant booking flow, and fast page speeds.
                  </p>
                </div>
              </div>

              <!-- Pillar 3: GMB & Local SEO -->
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                    <circle cx="12" cy="10" r="3"></circle>
                  </svg>
                </div>
                <div class="pillar-content">
                  <h5 class="pillar-title">Google My Business &amp; Local SEO</h5>
                  <p class="pillar-text">
                    Comprehensive local search optimization, Google Maps ranking, review automation workflows, and targeted search keywords that generate consistent organic rental phone calls and direct walk-ins daily.
                  </p>
                </div>
              </div>

              <!-- Pillar 4: Social Media Growth -->
              <div class="pillar-card">
                <div class="pillar-icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="18" cy="5" r="3"></circle>
                    <circle cx="6" cy="12" r="3"></circle>
                    <circle cx="18" cy="19" r="3"></circle>
                    <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                    <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                  </svg>
                </div>
                <div class="pillar-content">
                  <h5 class="pillar-title">Social Media Growth &amp; Marketing</h5>
                  <p class="pillar-text">
                    Multi-channel brand campaigns across Instagram and Facebook with high-impact visual creatives, commuter promotions, student special campaigns, and proactive community engagement.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Spotlight Footer / CTA Bar -->
        <div class="spotlight-footer">
          <div class="spotlight-footer-info">
            <span class="spotlight-footer-label">Managed Partnership:</span>
            <span class="spotlight-footer-desc">Active technical stewardship, continuous feature updates, and infrastructure managed 100% by Bluebase.</span>
          </div>
          <div class="spotlight-actions">
            <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" class="c-btn -secondary">
              <span class="c-btn__txt">Visit Live Website</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base">
                  <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                </span>
                <span class="c-btn__ico-hover">
                  <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                </span>
              </span>
            </a>
            <a href="{{ route('contact') }}" class="c-btn -primary">
              <span class="c-btn__txt">Build Your Startup Software</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base">
                  <svg viewBox="0 0 16 16"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
                </span>
                <span class="c-btn__ico-hover">
                  <svg viewBox="0 0 16 16"><path d="M3 8h10M9 4l4 4-4 4"/></svg>
                </span>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 9. LATEST ON SOFTWARE & WEB ENGINEERING (TABS) -->
  <section class="insights-section" id="resources">
    <div class="container">
      
      <div class="insights-header-row" data-viewport="true">
        <div>
          <span class="section-tag">Engineering Insights</span>
          <h2 class="section-title">Latest on <mark>Web, Mobile &amp; Architecture</mark>.</h2>
        </div>
        <a href="{{ route('suits-blog') }}" class="c-btn -link">
          <span class="c-btn__txt">View All Articles</span>
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

      <div class="insights-tabs-nav" data-viewport="true">
        <button class="tab-btn active" data-tab="tab-blog">Bluebase Tech Blog</button>
        <button class="tab-btn" data-tab="tab-guides">Developer Guides</button>
      </div>

      <!-- Tab 1: Blog -->
      <div class="tab-panel active" id="tab-blog">
        <div class="articles-grid">
          
          <article class="article-card stagger-1" data-viewport="true">
            <img src="{{ asset('images/stories/screens-clicks.jpg') }}" alt="SaaS MVP Guide" class="article-thumb">
            <div class="article-body">
              <div>
                <div class="article-meta">
                  <span class="article-cat">Startup Engineering</span>
                  <time>Nov 2026</time>
                </div>
                <h3 class="article-title">Building Scalable SaaS MVPs: The Founder's Guide to Sprint-One Velocity.</h3>
                <p class="article-desc">How to select practical tech stacks, structure relational databases, and launch working software without massive technical debt.</p>
              </div>
              <a href="{{ route('suits-blog') }}" class="c-btn -link">
                <span class="c-btn__txt">Read Guide</span>
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
          </article>

          <article class="article-card stagger-2" data-viewport="true">
            <img src="{{ asset('images/stories/asia-express-food.png') }}" alt="API Architecture" class="article-thumb">
            <div class="article-body">
              <div>
                <div class="article-meta">
                  <span class="article-cat">Backend Architecture</span>
                  <time>Nov 2026</time>
                </div>
                <h3 class="article-title">Designing High-Speed REST APIs with Laravel &amp; MySQL.</h3>
                <p class="article-desc">Best practices for query indexing, caching strategies, token authentication, and structuring clean API responses.</p>
              </div>
              <a href="{{ route('suits-blog') }}" class="c-btn -link">
                <span class="c-btn__txt">Read Architecture</span>
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
          </article>

          <article class="article-card stagger-3" data-viewport="true">
            <img src="{{ asset('images/illustrations/ui-illustration.jpg') }}" alt="Mobile Development" class="article-thumb">
            <div class="article-body">
              <div>
                <div class="article-meta">
                  <span class="article-cat">Mobile Engineering</span>
                  <time>Nov 2026</time>
                </div>
                <h3 class="article-title">Cross-Platform Mobile Development: Choosing Between Flutter &amp; React Native.</h3>
                <p class="article-desc">A practical comparison of rendering performance, developer velocity, and plugin ecosystems for early-stage products.</p>
              </div>
              <a href="{{ route('suits-blog') }}" class="c-btn -link">
                <span class="c-btn__txt">Read Comparison</span>
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
          </article>

        </div>
      </div>

      <!-- Tab 2: Developer Guides -->
      <div class="tab-panel" id="tab-guides">
        <div class="articles-grid">
          
          <article class="article-card stagger-1" data-viewport="true">
            <img src="{{ asset('images/stories/sapinsider-thumb.jpg') }}" alt="UI/UX System" class="article-thumb">
            <div class="article-body">
              <div>
                <div class="article-meta">
                  <span class="article-cat">UI/UX Design</span>
                  <time>Guide</time>
                </div>
                <h3 class="article-title">Design Systems That Scale: From Figma Tokens to Production CSS.</h3>
                <p class="article-desc">How to bridge the gap between design tokens and maintainable code without layout inconsistencies.</p>
              </div>
              <a href="{{ route('suits-blog') }}" class="c-btn -link">
                <span class="c-btn__txt">Read Guide</span>
                <span class="c-btn__ico">
                  <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                  <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                </span>
              </a>
            </div>
          </article>

          <article class="article-card stagger-2" data-viewport="true">
            <img src="{{ asset('images/illustrations/workflow-canvas.jpg') }}" alt="Performance Optimization" class="article-thumb">
            <div class="article-body">
              <div>
                <div class="article-meta">
                  <span class="article-cat">Performance</span>
                  <time>Guide</time>
                </div>
                <h3 class="article-title">Achieving 95+ Core Web Vitals on Custom Websites.</h3>
                <p class="article-desc">Proven strategies for lazy loading, image formats, asset bundling, and critical CSS in modern web applications.</p>
              </div>
              <a href="{{ route('suits-blog') }}" class="c-btn -link">
                <span class="c-btn__txt">Read Guide</span>
                <span class="c-btn__ico">
                  <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                  <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                </span>
              </a>
            </div>
          </article>

        </div>
      </div>

    </div>
  </section>

  <!-- 10. CLOSING CALL TO ACTION BANNER -->
  <section class="cta-banner-section">
    <div class="container">
      <div class="cta-banner-box" data-viewport="true" data-animation="fade-scale">
        <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="cta-banner-bg" aria-hidden="true">
        <div class="cta-banner-content">
          <h2 class="cta-banner-title stagger-1" data-viewport="true">
            Ready to Build Your Next Product?<br><mark>Partner with Bluebase Technologies</mark>.
          </h2>
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
            <div class="cta-pill-item">Remote-first engineering team</div>
            <div class="cta-pill-item">100% client-owned code &amp; IP</div>
            <div class="cta-pill-item">Indian Standard Time (IST) operations</div>
            <div class="cta-pill-item">Transparent, milestone-based pricing</div>
            <div class="cta-pill-item">Direct developer communication</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- 11. FAQ ACCORDION -->
  <section class="faq-section">
    <div class="container">
      <div class="faq-layout">
        <div class="faq-left" data-viewport="true">
          <span class="section-tag">FAQ</span>
          <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
          <p class="section-subtitle">Direct answers about our services, development process, and how we collaborate with founders and brands.</p>
        </div>
        <div class="faq-right">
          <div class="accordion-list">
            
            <div class="accordion-item open stagger-1" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="true">
                <span>What services does Bluebase Technologies provide?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>We provide full-lifecycle software development for startups, modern brands, and growing businesses: custom web application engineering, SaaS MVP development, cross-platform mobile apps for iOS and Android, e-commerce online stores, UI/UX design in Figma, and custom API backend development.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-2" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How does Bluebase engage with clients remotely?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>We operate as a fully remote-first digital engineering team. We collaborate with you directly via Slack, Google Meet, and GitHub. Our core hours are on Indian Standard Time (IST / UTC+05:30), with guaranteed overlapping working hours for daily standups, sprint reviews, and immediate communication with clients across the globe.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-3" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>Who owns the intellectual property and code?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>You own 100% of all intellectual property, source code, repositories, design assets, and database architecture from day one. Everything is developed directly in your repositories with zero proprietary vendor lock-in or recurring licensing fees.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-4" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How fast can we start and ship our project?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>After an initial discovery call, we prepare a scope and milestone plan within 48 to 72 hours. We work in focused 2-week agile sprints, delivering reviewable, testable code to live staging environments in sprint one.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-5" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How does your pricing and payment structure work?</span>
                <div class="accordion-icon">
                  <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                </div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>We provide transparent, milestone-based pricing. Each milestone has clearly defined deliverables and acceptance criteria. You only release milestone payments after testing and approving the deliverables on staging, with zero surprise fees.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection

@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('heroBgVideo');
    const toggleBtn = document.getElementById('heroVideoToggleBtn');
    const iconPause = document.getElementById('heroVideoIconPause');
    const iconPlay = document.getElementById('heroVideoIconPlay');
    const stateLabel = document.getElementById('heroVideoStateLabel');

    if (video && toggleBtn) {
      toggleBtn.addEventListener('click', function(e) {
        e.preventDefault();
        if (video.paused) {
          video.play().then(function() {
            if (iconPause) iconPause.style.display = 'block';
            if (iconPlay) iconPlay.style.display = 'none';
            if (stateLabel) stateLabel.textContent = 'Engineering Studio Live';
            toggleBtn.classList.remove('is-paused');
          }).catch(function(err) {
            console.log('Video play error:', err);
          });
        } else {
          video.pause();
          if (iconPause) iconPause.style.display = 'none';
          if (iconPlay) iconPlay.style.display = 'block';
          if (stateLabel) stateLabel.textContent = 'Studio Feed Paused';
          toggleBtn.classList.add('is-paused');
        }
      });

      document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
          if (!video.paused) video.pause();
        } else {
          if (!toggleBtn.classList.contains('is-paused')) {
            video.play().catch(function() {});
          }
        }
      });
    }
  });
</script>
@endpush
