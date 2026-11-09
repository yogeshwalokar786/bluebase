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

  <!-- 3. USE CASE / CORE CAPABILITIES CARDS -->
  <section class="usecases-section" id="solutions">
    <div class="container">
      <div class="usecases-header" data-viewport="true">
        <span class="section-tag">What We Build</span>
        <h2 class="section-title">Every Great Product Starts <br>With Clean Engineering.</h2>
        <p class="section-subtitle" style="margin: 0 auto 24px;">
          From rapid SaaS MVPs and cross-platform mobile apps to custom e-commerce stores, we turn your requirements into production-ready software.
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
        
        <!-- Card 1 -->
        <article class="usecase-card stagger-1" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="Code Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">Custom Web Apps &amp; SaaS MVPs</h3>
          </div>
          <div class="usecase-card-body">
            <p>Full-stack web applications, SaaS dashboards, and portal architectures engineered with Laravel, React, Vue, and modern relational databases.</p>
            <a href="{{ route('products.neptune-dxp') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore Web Apps</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

        <!-- Card 2 -->
        <article class="usecase-card stagger-2" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/code-bar.svg') }}" alt="Mobile Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">Cross-Platform Mobile Apps</h3>
          </div>
          <div class="usecase-card-body">
            <p>Responsive, high-performance iOS and Android applications built with Flutter and React Native, featuring smooth animations and offline data caching.</p>
            <a href="{{ route('use-cases.run-mobile-in-offline') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore Mobile Apps</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

        <!-- Card 3 -->
        <article class="usecase-card stagger-3" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="E-Commerce Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">E-Commerce &amp; Online Stores</h3>
          </div>
          <div class="usecase-card-body">
            <p>Modern online storefronts with seamless product catalogs, custom carts, secure payment gateway integrations (Stripe, Razorpay), and order management.</p>
            <a href="{{ route('use-cases.supplier-portals') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore E-Commerce</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

        <!-- Card 4 -->
        <article class="usecase-card stagger-4" data-viewport="true">
          <img src="{{ asset('images/illustrations/watermark.png') }}" alt="" class="usecase-watermark" aria-hidden="true">
          <div class="usecase-card-header">
            <div class="usecase-card-icon">
              <img src="{{ asset('images/icons/cube.svg') }}" alt="Design Icon" width="22" height="22">
            </div>
            <h3 class="usecase-card-title">UI/UX Design &amp; Prototyping</h3>
          </div>
          <div class="usecase-card-body">
            <p>Pixel-perfect Figma wireframes, accessible component libraries, interactive prototypes, and modern visual identities built before writing a single line of code.</p>
            <a href="{{ route('modernization.sap-fiori') }}" class="c-btn -link">
              <span class="c-btn__txt">Explore UI/UX Design</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </article>

      </div>
    </div>
  </section>

  <!-- 4. RESEARCH & STATS -->
  <section class="research-section">
    <div class="container">
      <div class="research-layout">
        
        <!-- Left: Stats -->
        <div class="research-left">
          <div class="research-left-header" data-viewport="true">
            <span class="section-tag">The Startup Advantage</span>
            <h2 class="section-title">Why Modern Founders &amp; Brands Choose <br><mark>Bluebase Engineering.</mark></h2>
            <p class="section-subtitle">
              Traditional consultancies burden you with non-technical middlemen, bloated retainers, and junior developer markups. Bluebase gives you direct access to skilled engineers who build cleanly and ship on time.
            </p>
          </div>

          <div class="stats-grid">
            <div class="stat-item stagger-1" data-viewport="true">
              <div class="stat-number">
                <span class="stat-number-val" data-target="3">0</span><span class="stat-symbol">X</span>
              </div>
              <div class="stat-label">faster time-to-market with focused milestone sprints</div>
            </div>

            <div class="stat-item stagger-2" data-viewport="true">
              <div class="stat-number">
                <span class="stat-number-val" data-target="100">0</span><span class="stat-symbol">%</span>
              </div>
              <div class="stat-label">intellectual property and code ownership transferred to you</div>
            </div>

            <div class="stat-item stagger-3" data-viewport="true">
              <div class="stat-number">
                <span class="stat-number-val" data-target="0">0</span><span class="stat-symbol"></span>
              </div>
              <div class="stat-label">zero proprietary vendor lock-in or recurring licensing traps</div>
            </div>
          </div>

          <div class="stat-sub-bar stagger-4" data-viewport="true">
            <div class="stat-sub-number">100%</div>
            <div class="stat-label">direct collaboration with the developers building your software</div>
          </div>
        </div>

        <!-- Right: Spotlight Preview Card -->
        <div class="research-right">
          <div class="research-card-box" data-viewport="true" data-animation="fade-scale">
            <img src="{{ asset('images/footer-logo.svg') }}" alt="Bluebase Logo" class="research-card-logo">
            <h3 class="research-card-title">The Founder's Playbook: Building &amp; Launching Digital Products Faster</h3>
            <img src="{{ asset('images/stories/sapinsider-thumb.jpg') }}" alt="Playbook Spotlight Cover" class="research-card-thumb">
            <a href="{{ route('company') }}" class="c-btn -primary" style="width: 100%; justify-content: center;">
              <span class="c-btn__txt">Explore Our Story &amp; Approach</span>
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

  <!-- 5. STICKY FEATURES SECTION (The Bluebase Engineering Standard) -->
  <section class="sticky-features-section" id="platform">
    <div class="container">
      <div class="sticky-layout">
        
        <!-- Left Sticky -->
        <div class="sticky-left" data-viewport="true">
          <span class="section-tag light">Our Engineering Standard</span>
          <h2 class="section-title">Direct Collaboration, <mark>Zero Operational Bloat.</mark></h2>
          <p class="section-subtitle light">
            We operate as an agile, remote-first software development team. You communicate directly with the engineers writing your code, reviewing live staging links as each milestone progresses.
          </p>
          <div class="sticky-image-wrap">
            <img src="{{ asset('images/illustrations/workflow-canvas.jpg') }}" alt="Bluebase Engineering Workflow">
          </div>
        </div>

        <!-- Right Scrolling Feature Cards -->
        <div class="sticky-right">
          
          <div class="feature-scroll-card stagger-1" data-viewport="true">
            <div class="feature-card-icon">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="Builder Icon" width="24" height="24">
            </div>
            <h3 class="feature-card-title">Builders First, Not Middlemen</h3>
            <p class="feature-card-desc">
              When you partner with Bluebase, you communicate directly with senior full-stack developers and UI designers. No layers of non-technical managers slowing down decision-making.
            </p>
            <a href="{{ route('company') }}" class="c-btn -link">
              <span class="c-btn__txt">How We Collaborate</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>

          <div class="feature-scroll-card stagger-2" data-viewport="true">
            <div class="feature-card-icon">
              <img src="{{ asset('images/icons/code-bar.svg') }}" alt="Agile Icon" width="24" height="24">
            </div>
            <h3 class="feature-card-title">Sprint-Based Milestone Delivery</h3>
            <p class="feature-card-desc">
              We work in focused 2-week sprints. Every sprint produces testable, working software on private staging environments, ensuring you always see progress before approving milestones.
            </p>
            <a href="{{ route('book-a-demo') }}" class="c-btn -link">
              <span class="c-btn__txt">Schedule a Consultation</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>

          <div class="feature-scroll-card stagger-3" data-viewport="true">
            <div class="feature-card-icon">
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="IP Icon" width="24" height="24">
            </div>
            <h3 class="feature-card-title">100% Client-Owned Code &amp; IP</h3>
            <p class="feature-card-desc">
              You own every repository, commit, design asset, and database schema from day one. Zero proprietary runtime locks, zero recurring vendor license traps.
            </p>
            <a href="{{ route('company') }}" class="c-btn -link">
              <span class="c-btn__txt">Read Code Ownership Policy</span>
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

  <!-- 6. MODERN SYSTEM ARCHITECTURE -->
  <section class="video-section">
    <div class="container">
      <div class="video-header" data-viewport="true">
        <span class="section-tag light">Our Technology Stack</span>
        <h2 class="section-title">
          Modern Stacks.<br>
          <mark>Resilient Digital Engineering.</mark>
        </h2>
        <p class="section-subtitle light" style="margin: 0 auto;">
          We build with battle-tested, high-productivity technologies that are fast, secure, easy to maintain, and cost-effective to scale.
        </p>
      </div>

      <div class="video-container" data-viewport="true" data-animation="fade-scale">
        <div class="system-arch-diagram">
          
          <!-- TIER 1: USERS & CHANNELS -->
          <div class="system-arch-tier -channels">
            <div class="system-arch-tag">&lt; USER TOUCHPOINTS &amp; CHANNELS /&gt;</div>
            <div class="system-arch-pills">
              <span class="system-arch-pill">Web Applications</span>
              <span class="system-arch-pill">iOS &amp; Android Apps</span>
              <span class="system-arch-pill">E-Commerce Stores</span>
              <span class="system-arch-pill">Admin Consoles</span>
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

          <!-- TIER 2: BLUEBASE Â· CORE APPLICATION ENGINE (CENTERPIECE) -->
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
                <p class="work-card-desc">React, Vue, Next.js &amp; Tailwind</p>
              </div>

              <!-- Col 2: Robust Backend Engine -->
              <div class="system-arch-work-card">
                <h4 class="work-card-title">Backend Architecture</h4>
                <p class="work-card-desc">Laravel, PHP, Node.js &amp; REST APIs</p>
              </div>

              <!-- Col 3: Data & State -->
              <div class="system-arch-work-card">
                <h4 class="work-card-title">Relational Databases</h4>
                <p class="work-card-desc">MySQL, PostgreSQL &amp; Redis Cache</p>
              </div>
            </div>

            <!-- Bottom Pill inside Bluebase Box -->
            <div class="system-arch-work-footer">
              <span class="system-arch-pill -highlight">Clean architecture &middot; responsive design &middot; high performance</span>
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
                <span class="system-arch-pill">Vercel</span>
                <span class="system-arch-pill">SSL &amp; CDN</span>
              </div>
            </div>

            <!-- Right Box: THIRD-PARTY INTEGRATIONS -->
            <div class="system-arch-tier -connected">
              <div class="system-arch-tag">&lt; THIRD-PARTY INTEGRATIONS /&gt;</div>
              <div class="system-arch-pills">
                <span class="system-arch-pill">Stripe / Razorpay</span>
                <span class="system-arch-pill">Auth</span>
                <span class="system-arch-pill">Custom APIs</span>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- 7. CHOOSE YOUR NEXT MOVE -->
  <section class="nextmove-section">
    <div class="container">
      <div class="nextmove-header" data-viewport="true">
        <span class="section-tag">Tailored For Your Goals</span>
        <h2 class="section-title">Choose Your <mark>Next Move</mark>.</h2>
        <p class="section-subtitle" style="margin: 0 auto;">
          Whether you're validating an MVP, building a custom business platform, or redesigning an existing website, we're one conversation away.
        </p>
      </div>

      <div class="nextmove-grid">
        
        <!-- Card Left -->
        <div class="nextmove-card-full stagger-1" data-viewport="true">
          <div>
            <h3 class="section-title" style="font-size: 1.85rem;">For Founders &amp; Startups</h3>
            <p>Turn your product vision into launched software in weeks. We design, code, and deploy custom web applications and SaaS MVPs with transparent milestone pricing and 100% intellectual property ownership.</p>
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
          <img src="{{ asset('images/illustrations/ui-illustration.jpg') }}" alt="Bluebase Product Experience">
        </div>

        <!-- Cards Right -->
        <div class="nextmove-column-stack">
          <div class="nextmove-card-small stagger-2" data-viewport="true">
            <div>
              <h3>For Growing Businesses &amp; Brands</h3>
              <p>Elevate your digital presence with custom websites, fast e-commerce storefronts, and automated client portals that drive real customer engagement.</p>
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
              <h3>For Teams Needing Extra Capacity</h3>
              <p>Add skilled full-stack engineering capacity to your sprints. We collaborate seamlessly via Slack and GitHub to accelerate your product releases.</p>
            </div>
            <a href="{{ route('book-a-demo') }}" class="c-btn -link">
              <span class="c-btn__txt">Schedule a Consultation</span>
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

  <!-- 8. CUSTOMER STORIES SLIDER -->
  <section class="stories-section" id="stories">
    <div class="container">
      <div class="stories-header" data-viewport="true">
        <span class="section-tag">Client Success</span>
        <h2 class="section-title">Digital Products We Help Bring to Life.</h2>
      </div>

      <div class="slider-container" data-viewport="true" data-animation="fade-scale">
        <div class="slider-track-wrap">
          <div class="slider-track">
            
            <!-- Slide 1 -->
            <div class="story-slide">
              <div class="story-image-wrap">
                <img src="{{ asset('images/stories/asia-express-food.png') }}" alt="Real-time Tracking Platform">
              </div>
              <div class="story-content">
                <div class="story-tags">
                  <span class="story-tag">Web Application</span>
                  <span class="story-tag">Real-Time Data</span>
                </div>
                <h3 class="story-title">Custom Order Tracking &amp; Inventory Management Platform for Modern Distribution.</h3>
                <a href="{{ route('customer-stories') }}" class="c-btn -link">
                  <span class="c-btn__txt">Read Story</span>
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

            <!-- Slide 2 -->
            <div class="story-slide">
              <div class="story-image-wrap">
                <img src="{{ asset('images/stories/compass.png') }}" alt="Frontline Mobile App">
              </div>
              <div class="story-content">
                <div class="story-tags">
                  <span class="story-tag">Mobile App</span>
                  <span class="story-tag">Productivity</span>
                </div>
                <h3 class="story-title">Cross-Platform Mobile Application Eliminating Manual Paper Logs for Field Teams.</h3>
                <a href="{{ route('customer-stories') }}" class="c-btn -link">
                  <span class="c-btn__txt">Read Story</span>
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

            <!-- Slide 3 -->
            <div class="story-slide">
              <div class="story-image-wrap">
                <img src="{{ asset('images/stories/alba.jpg') }}" alt="Client Extranet Portal">
              </div>
              <div class="story-content">
                <div class="story-tags">
                  <span class="story-tag">Client Portal</span>
                  <span class="story-tag">Security</span>
                </div>
                <h3 class="story-title">Self-Service Customer Extranet Providing Real-Time Billing &amp; Project Updates.</h3>
                <a href="{{ route('customer-stories') }}" class="c-btn -link">
                  <span class="c-btn__txt">Read Story</span>
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

            <!-- Slide 4 -->
            <div class="story-slide">
              <div class="story-image-wrap">
                <img src="{{ asset('images/stories/rust-oleum.png') }}" alt="E-Commerce Fulfillment">
              </div>
              <div class="story-content">
                <div class="story-tags">
                  <span class="story-tag">E-Commerce</span>
                  <span class="story-tag">Fulfillment</span>
                </div>
                <h3 class="story-title">High-Conversion E-Commerce Platform with Real-Time Stock Sync &amp; Frictionless Checkout.</h3>
                <a href="{{ route('customer-stories') }}" class="c-btn -link">
                  <span class="c-btn__txt">Read Story</span>
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

        <!-- Controls -->
        <div class="slider-controls">
          <div class="slider-dots"></div>
          <div class="slider-arrows">
            <button class="slider-btn slider-btn-prev" aria-label="Previous Slide">
              <svg viewBox="0 0 24 24"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="slider-btn slider-btn-next" aria-label="Next Slide">
              <svg viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
            </button>
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
