@extends('layouts.app')

@section('title', 'Bluebase Technologies | Digital Engineering, Web & Mobile App Development Startup')
@section('meta_description', 'Bluebase Technologies is an agile, remote-first digital engineering startup based in India. We build high-performance custom websites, web applications, mobile apps, SaaS MVPs, and e-commerce platforms for growing brands and founders worldwide.')

@push('styles')
<style>
/* ==========================================================================
   SECTION 4: WHY CHOOSE US & STARTUP COMMITMENT CARD ENHANCEMENTS
   ========================================================================== */
.research-section {
  position: relative;
  background: #ffffff;
}

.research-card-box {
  background: linear-gradient(160deg, #ffffff 0%, #f8fafc 100%) !important;
  border: 1px solid rgba(0, 80, 231, 0.16) !important;
  border-radius: 20px !important;
  padding: 38px 34px !important;
  box-shadow: 0 20px 45px -12px rgba(15, 23, 42, 0.08), 0 0 0 1px rgba(0, 80, 231, 0.04) !important;
  position: relative !important;
  overflow: hidden !important;
  text-align: left !important;
  transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.3s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.3s ease !important;
}

.research-card-box::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, #0050e7 0%, #38bdf8 100%);
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
}

.research-card-box:hover {
  transform: translateY(-4px) !important;
  box-shadow: 0 28px 55px -12px rgba(0, 80, 231, 0.16), 0 0 0 1px rgba(0, 80, 231, 0.12) !important;
  border-color: rgba(0, 80, 231, 0.32) !important;
}

.commitment-tag-wrap {
  display: flex !important;
  align-items: center !important;
  gap: 8px !important;
  margin-bottom: 16px !important;
}

.commitment-tag-wrap .section-tag {
  display: inline-flex !important;
  align-items: center !important;
  gap: 6px !important;
  background: rgba(0, 80, 231, 0.08) !important;
  color: #0050e7 !important;
  border: 1px solid rgba(0, 80, 231, 0.2) !important;
  padding: 5px 12px !important;
  border-radius: 9999px !important;
  font-size: 0.74rem !important;
  font-weight: 700 !important;
  letter-spacing: 0.06em !important;
  text-transform: uppercase !important;
  margin-bottom: 0 !important;
}

.commitment-tag-wrap .section-tag::before {
  content: "" !important;
  display: inline-block !important;
  width: 6px !important;
  height: 6px !important;
  border-radius: 50% !important;
  background: #0050e7 !important;
  box-shadow: 0 0 8px rgba(0, 80, 231, 0.6) !important;
}

.research-card-box .research-card-title {
  font-size: clamp(1.4rem, 2vw, 1.75rem) !important;
  font-weight: 700 !important;
  color: #0f172a !important;
  line-height: 1.25 !important;
  margin-bottom: 12px !important;
  letter-spacing: -0.02em !important;
  text-align: left !important;
}

.research-card-desc {
  font-size: 0.94rem !important;
  line-height: 1.6 !important;
  color: #475569 !important;
  margin-bottom: 24px !important;
  text-align: left !important;
}

.commitment-list {
  list-style: none !important;
  padding: 0 !important;
  margin: 0 0 26px !important;
  display: flex !important;
  flex-direction: column !important;
  gap: 10px !important;
  width: 100% !important;
  box-sizing: border-box !important;
}

.commitment-list li {
  display: flex !important;
  align-items: flex-start !important;
  gap: 12px !important;
  padding: 12px 14px !important;
  background: #ffffff !important;
  border: 1px solid #e2e8f0 !important;
  border-radius: 12px !important;
  transition: all 0.25s ease !important;
  box-sizing: border-box !important;
  width: 100% !important;
  box-shadow: 0 2px 6px rgba(15, 23, 42, 0.02) !important;
  text-align: left !important;
  margin: 0 !important;
}

.commitment-list li:hover {
  background: #f8fafc !important;
  border-color: rgba(0, 80, 231, 0.3) !important;
  transform: translateX(4px) !important;
  box-shadow: 0 4px 14px rgba(0, 80, 231, 0.08) !important;
}

.commitment-icon-wrap {
  width: 22px !important;
  height: 22px !important;
  min-width: 22px !important;
  min-height: 22px !important;
  border-radius: 50% !important;
  background: rgba(0, 80, 231, 0.12) !important;
  color: #0050e7 !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  flex-shrink: 0 !important;
  margin-top: 1px !important;
}

.commitment-icon-wrap svg {
  width: 13px !important;
  height: 13px !important;
  fill: #0050e7 !important;
  display: block !important;
}

.commitment-list li span {
  font-size: 0.9rem !important;
  font-weight: 500 !important;
  color: #1e293b !important;
  line-height: 1.4 !important;
  flex: 1 !important;
  text-align: left !important;
  margin: 0 !important;
}

.commitment-btn {
  width: 100% !important;
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  gap: 10px !important;
  padding: 14px 20px !important;
  background: #0050e7 !important;
  color: #ffffff !important;
  font-size: 0.94rem !important;
  font-weight: 600 !important;
  border-radius: 9999px !important;
  border: 1px solid #0050e7 !important;
  box-sizing: border-box !important;
  box-shadow: 0 8px 22px rgba(0, 80, 231, 0.28) !important;
  text-decoration: none !important;
  white-space: normal !important;
  text-align: center !important;
  transition: all 0.25s ease !important;
  cursor: pointer !important;
}

.commitment-btn:hover {
  background: #003db3 !important;
  border-color: #003db3 !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 12px 28px rgba(0, 80, 231, 0.38) !important;
}

.commitment-btn .c-btn__txt {
  color: #ffffff !important;
  line-height: 1.25 !important;
}

.commitment-btn .c-btn__ico {
  flex-shrink: 0 !important;
}

/* Responsive Alignment */
@media (max-width: 991px) {
  .research-layout {
    grid-template-columns: 1fr !important;
    gap: 36px !important;
    align-items: stretch !important;
  }

  .research-left,
  .research-right {
    width: 100% !important;
    text-align: left !important;
  }

  .research-card-box {
    width: 100% !important;
    max-width: 100% !important;
    box-sizing: border-box !important;
    margin: 0 !important;
    padding: 28px 20px !important;
  }
}

@media (max-width: 768px) {
  .research-section {
    padding: 50px 0 !important;
  }

  .research-left-header {
    text-align: left !important;
    margin-bottom: 22px !important;
  }

  .research-left-header .section-tag {
    margin-bottom: 10px !important;
    align-self: flex-start !important;
  }

  .research-left-header .section-title {
    font-size: clamp(1.6rem, 5vw, 2.2rem) !important;
    line-height: 1.2 !important;
    margin-bottom: 12px !important;
    text-align: left !important;
  }

  .research-left-header .section-subtitle {
    font-size: 0.88rem !important;
    line-height: 1.55 !important;
    text-align: left !important;
  }

  .stats-grid {
    display: grid !important;
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 10px !important;
    margin-bottom: 20px !important;
  }

  .stat-item {
    border-left: 3px solid #0050e7 !important;
    padding: 0 0 0 10px !important;
    text-align: left !important;
    margin: 0 !important;
  }

  .stat-number {
    font-size: clamp(1.55rem, 5vw, 2.1rem) !important;
    line-height: 1 !important;
    margin-bottom: 4px !important;
    justify-content: flex-start !important;
  }

  .stat-label {
    font-size: 0.74rem !important;
    line-height: 1.35 !important;
    text-align: left !important;
  }

  .stat-sub-bar {
    padding: 14px 0 0 0 !important;
    border-top: 1px solid var(--color-gray-200) !important;
    display: flex !important;
    flex-direction: row !important;
    align-items: flex-start !important;
    gap: 12px !important;
    text-align: left !important;
    margin-top: 0 !important;
    margin-bottom: 28px !important;
  }

  .stat-sub-number {
    font-size: 1.5rem !important;
    line-height: 1 !important;
    flex-shrink: 0 !important;
    text-align: left !important;
  }

  .stat-sub-bar .stat-label {
    font-size: 0.8rem !important;
    line-height: 1.4 !important;
    text-align: left !important;
  }

  .research-card-box {
    padding: 22px 16px !important;
    border-radius: 14px !important;
    text-align: left !important;
  }

  .research-card-box .research-card-title {
    font-size: 1.3rem !important;
    margin-bottom: 8px !important;
    text-align: left !important;
  }

  .research-card-desc {
    font-size: 0.86rem !important;
    line-height: 1.5 !important;
    margin-bottom: 16px !important;
    text-align: left !important;
  }

  .commitment-list {
    gap: 8px !important;
    margin-bottom: 18px !important;
    text-align: left !important;
  }

  .commitment-list li {
    padding: 10px 12px !important;
    font-size: 0.84rem !important;
    gap: 10px !important;
    border-radius: 10px !important;
    text-align: left !important;
  }

  .commitment-list li span {
    font-size: 0.82rem !important;
    line-height: 1.35 !important;
    text-align: left !important;
  }

  .commitment-btn {
    padding: 12px 16px !important;
    border-radius: 9999px !important;
  }

  .commitment-btn .c-btn__txt {
    font-size: 0.86rem !important;
  }
}

@media (max-width: 480px) {
  .stats-grid {
    grid-template-columns: 1fr !important;
    gap: 10px !important;
  }

  .stat-item {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    gap: 12px !important;
    padding: 10px 12px !important;
    background: #f8fafc !important;
    border-radius: 8px !important;
    border-left: 3px solid #0050e7 !important;
  }

  .stat-number {
    min-width: 65px !important;
    font-size: 1.75rem !important;
    margin-bottom: 0 !important;
  }

  .commitment-btn .c-btn__txt {
    font-size: 0.82rem !important;
  }
}
</style>
@endpush

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
      <!-- Digital Workspace Feed Pill in bottom right of hero (desktop only) -->
      <div class="hero-video-badge hide-on-mobile" id="heroVideoBadgeWrap">
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
            <div class="commitment-tag-wrap">
              <span class="section-tag">Our Commitment</span>
            </div>
            <h3 class="research-card-title">Simple. Honest. Built to Ship.</h3>
            <p class="research-card-desc">
              We treat every client project like our own product. You get complete transparency, regular progress demos, and zero corporate bureaucracy.
            </p>

            <ul class="commitment-list">
              <li>
                <div class="commitment-icon-wrap">
                  <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </div>
                <span>Live staging links updated every sprint</span>
              </li>
              <li>
                <div class="commitment-icon-wrap">
                  <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </div>
                <span>Milestone-based pay as you verify</span>
              </li>
              <li>
                <div class="commitment-icon-wrap">
                  <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </div>
                <span>Clean, modular, and maintainable source code</span>
              </li>
              <li>
                <div class="commitment-icon-wrap">
                  <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </div>
                <span>Post-launch support &amp; handover documentation</span>
              </li>
            </ul>

            <a href="{{ route('contact') }}" class="c-btn -primary commitment-btn">
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
          <div class="sticky-image-wrap hide-on-mobile">
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
            <a href="{{ route('contact') }}" class="c-btn -link">
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
          <img src="{{ asset('images/illustrations/ui-illustration.jpg') }}" alt="Bluebase Product Experience" class="hide-on-mobile" style="max-height: 260px; object-fit: cover; border-radius: 12px; margin-top: 20px;">
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
            <a href="{{ route('contact') }}" class="c-btn -link">
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
            
            <!-- Slide 1: OMG Rental Bikes -->
            <div class="story-slide">
              <div class="story-image-wrap">
                <img src="{{ asset('images/stories/omg-rental-bikes-brand.png') }}" alt="OMG Rental Bikes" loading="lazy">
              </div>
              <div class="story-content">
                <div class="story-tags">
                  <span class="story-tag">Mobility Startup</span>
                  <span class="story-tag">Fleet ERP &amp; Software</span>
                  <span class="story-tag" style="background: #ecfdf5; color: #047857;">Fully Managed</span>
                </div>
                <h3 class="story-title">Custom Fleet Management ERP, Booking Portal &amp; Growth Engine for Urban Bike Rentals.</h3>
                <p style="font-size: 0.95rem; line-height: 1.6; color: var(--color-text-muted); margin-bottom: 24px;">
                  OMG Rental Bikes partnered with Bluebase to build and manage their complete digital operating system. We developed their custom fleet management software (real-time vehicle inventory, paperless digital KYC, and automated rental agreements), high-converting booking portal at <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" style="color: var(--color-accent); font-weight: 600; text-decoration: underline;">omgrentalbikes.com</a>, and fully manage their top-ranking Google My Business profile and social media marketing.
                </p>
                <div style="display: flex; gap: 14px; align-items: center; flex-wrap: wrap;">
                  <a href="{{ route('customer-stories.omg-rental-bikes') }}" class="c-btn -primary" style="padding: 12px 24px;">
                    <span class="c-btn__txt">Read Case Study</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a>
                  <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" class="c-btn -secondary" style="padding: 12px 22px;">
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
                  <a href="{{ route('contact') }}" class="c-btn -link" style="color: var(--color-accent);">
                    <span class="c-btn__txt">Build Your Startup Platform</span>
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

            <!-- Future slides can be added directly here as additional .story-slide elements -->

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
            <a href="{{ route('contact') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
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
