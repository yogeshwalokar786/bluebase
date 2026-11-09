@extends('layouts.app')

@section('title', 'Mobile App Development Services | iOS & Android Apps | Bluebase Technologies')
@section('meta_description', 'Custom cross-platform mobile app development with Flutter and React Native. Smooth native performance, offline sync, biometric security, and complete App Store release.')

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
          <span itemprop="name" aria-current="page">Mobile App Development</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Mobile Engineering Studio</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      iOS &amp; Android Apps Built for <br><mark>Speed, Fluidity &amp; Scale</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      We engineer high-performance mobile applications using Flutter and React Native. Ultra-smooth native performance, offline local sync, biometric security, and complete App Store &amp; Play Store approval.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=mobile-app-development" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Mobile App</span>
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
      <div class="hero-badge-item">iOS &amp; Android Dual Launch</div>
      <div class="hero-badge-item">Flutter &amp; React Native Core</div>
      <div class="hero-badge-item">Offline-First Local Sync</div>
      <div class="hero-badge-item">100% Code &amp; IP Ownership</div>
    </div>

  </div>
</section>

<!-- MARQUEE SECTION -->
@include('partials.client-marquee', ['heading' => 'Trusted by modern brands, founders, and growing businesses worldwide'])

<!-- INTERACTIVE SMARTPHONE SHOWCASE SECTION -->
<section class="mobile-showcase-section">
  <div class="container">
    <div class="mobile-showcase-layout">
      
      <!-- Left Column: Story & Mobile Highlights -->
      <div data-viewport="true">
        <span class="section-tag">Native Experience</span>
        <h2 class="section-title">Engineered for Daily Active Users &amp; Fluid Performance</h2>
        <p class="section-subtitle" style="text-align: left; margin-bottom: 24px;">
          Mobile users demand instant responsiveness, natural swipe gestures, and reliable offline access. We architect mobile apps that deliver native speed with modern cross-platform efficiency.
        </p>

        <div class="mobile-features-list">
          <div class="mobile-feature-item stagger-1" data-viewport="true">
            <div class="mobile-feature-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
            </div>
            <div>
              <h4 class="mobile-feature-item-title">Offline-First Local Sync</h4>
              <p class="mobile-feature-item-desc">SQLite &amp; Hive embedded storage ensure your app functions seamlessly without internet connectivity, syncing automatically once reconnected.</p>
            </div>
          </div>

          <div class="mobile-feature-item stagger-2" data-viewport="true">
            <div class="mobile-feature-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </div>
            <div>
              <h4 class="mobile-feature-item-title">Hardware Biometric Authentication</h4>
              <p class="mobile-feature-item-desc">Native FaceID, TouchID, and Android Biometric Prompt integrated with hardware-encrypted Keychain and Keystore.</p>
            </div>
          </div>

          <div class="mobile-feature-item stagger-3" data-viewport="true">
            <div class="mobile-feature-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            </div>
            <div>
              <h4 class="mobile-feature-item-title">Real-Time Push Notifications</h4>
              <p class="mobile-feature-item-desc">Firebase Cloud Messaging (FCM) &amp; Apple APNs pipelines with deep-linking directly into specific screens and workflows.</p>
            </div>
          </div>

          <div class="mobile-feature-item stagger-4" data-viewport="true">
            <div class="mobile-feature-item-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
            </div>
            <div>
              <h4 class="mobile-feature-item-title">Apple Pay &amp; Google Pay Ready</h4>
              <p class="mobile-feature-item-desc">One-tap native payment sheet integrations, in-app purchases (IAP), and recurring subscription lifecycle management.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Column: Pure CSS Smartphone Mockup Frame -->
      <div class="phone-mockup-wrapper" data-viewport="true">
        
        <!-- Floating Badges Around the Phone -->
        <div class="phone-floating-pill -top-left">
          <div class="phone-pill-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg>
          </div>
          <span>Hardware-Accelerated Engine</span>
        </div>

        <div class="phone-floating-pill -top-right">
          <div class="phone-pill-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
          </div>
          <span>FaceID &amp; Keychain</span>
        </div>

        <div class="phone-floating-pill -bottom-right">
          <div class="phone-pill-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>
          </div>
          <span>App Store Approved</span>
        </div>

        <!-- The Smartphone Mockup Frame -->
        <div class="phone-mockup-frame">
          <div class="phone-screen">
            
            <!-- Dynamic Island -->
            <div class="phone-dynamic-island"></div>

            <!-- Mobile Status Bar -->
            <div class="phone-status-bar">
              <span>9:41</span>
              <div style="display: flex; gap: 4px; align-items: center;">
                <svg viewBox="0 0 16 16" width="10" height="10" fill="currentColor"><path d="M0 11.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-3zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-6zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-9zm4-3a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-12z"/></svg>
                <span style="font-size: 0.65rem; font-weight: 700;">5G</span>
                <svg viewBox="0 0 16 16" width="12" height="12" fill="currentColor"><rect x="1" y="4" width="12" height="8" rx="2" fill="none" stroke="currentColor" stroke-width="1.2"/><rect x="2.5" y="5.5" width="8" height="5" rx="1"/><path d="M14 7h1v2h-1z"/></svg>
              </div>
            </div>

            <!-- Mobile App Screen Content -->
            <div class="phone-screen-content">
              
              <!-- App Top Bar -->
              <div class="phone-app-header">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <div style="width: 28px; height: 28px; border-radius: 50%; background: #0050E7; color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.75rem;">BT</div>
                  <div>
                    <span style="font-size: 0.65rem; color: var(--color-gray-600); display: block; line-height: 1;">Welcome Back</span>
                    <strong style="font-size: 0.8rem; color: var(--color-primary); line-height: 1.2;">Alex Founder</strong>
                  </div>
                </div>
                <div style="width: 26px; height: 26px; border-radius: 8px; background: #ffffff; border: 1px solid var(--color-gray-200); display: flex; align-items: center; justify-content: center; color: var(--color-primary);">
                  <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/></svg>
                </div>
              </div>

              <!-- Primary Balance / Metric Card -->
              <div class="phone-widget-card" style="background: linear-gradient(135deg, #0F172A 0%, #1E293B 100%); color: #ffffff; border: none;">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                  <span style="font-size: 0.68rem; color: rgba(255, 255, 255, 0.65); text-transform: uppercase; letter-spacing: 0.04em;">Active Cloud Balance</span>
                  <span style="background: rgba(16, 185, 129, 0.2); color: #34d399; font-size: 0.65rem; font-weight: 600; padding: 2px 6px; border-radius: 6px;">Live</span>
                </div>
                <div style="font-size: 1.35rem; font-weight: 700; letter-spacing: -0.02em; margin-bottom: 12px;">$24,850.00</div>
                <div style="display: flex; gap: 8px;">
                  <div style="flex: 1; background: rgba(255, 255, 255, 0.1); border-radius: 6px; padding: 6px 8px; text-align: center; font-size: 0.68rem; font-weight: 600;">Transfer</div>
                  <div style="flex: 1; background: #0050E7; border-radius: 6px; padding: 6px 8px; text-align: center; font-size: 0.68rem; font-weight: 600;">Instant Pay</div>
                </div>
              </div>

              <!-- Quick Action Grid -->
              <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 6px;">
                <div style="background: #ffffff; border: 1px solid var(--color-gray-200); border-radius: 8px; padding: 8px 4px; text-align: center;">
                  <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#0050E7" stroke-width="2" style="margin: 0 auto 3px; display: block;"><polyline points="20 6 9 17 4 12"/></svg>
                  <span style="font-size: 0.62rem; color: var(--color-primary); font-weight: 600; display: block;">Sync</span>
                </div>
                <div style="background: #ffffff; border: 1px solid var(--color-gray-200); border-radius: 8px; padding: 8px 4px; text-align: center;">
                  <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#0050E7" stroke-width="2" style="margin: 0 auto 3px; display: block;"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                  <span style="font-size: 0.62rem; color: var(--color-primary); font-weight: 600; display: block;">Vault</span>
                </div>
                <div style="background: #ffffff; border: 1px solid var(--color-gray-200); border-radius: 8px; padding: 8px 4px; text-align: center;">
                  <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#0050E7" stroke-width="2" style="margin: 0 auto 3px; display: block;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  <span style="font-size: 0.62rem; color: var(--color-primary); font-weight: 600; display: block;">Track</span>
                </div>
                <div style="background: #ffffff; border: 1px solid var(--color-gray-200); border-radius: 8px; padding: 8px 4px; text-align: center;">
                  <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="#0050E7" stroke-width="2" style="margin: 0 auto 3px; display: block;"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                  <span style="font-size: 0.62rem; color: var(--color-primary); font-weight: 600; display: block;">Billing</span>
                </div>
              </div>

              <!-- Recent Activity List -->
              <div class="phone-widget-card" style="padding: 10px 12px; margin-top: auto;">
                <span style="font-size: 0.68rem; font-weight: 600; color: var(--color-gray-600); display: block; margin-bottom: 6px;">Recent Mobile Events</span>
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.72rem; padding: 4px 0; border-bottom: 1px solid #f1f5f9;">
                  <span>Sub-second API Sync</span>
                  <strong style="color: #059669;">48ms</strong>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.72rem; padding: 4px 0;">
                  <span>Biometric Verified</span>
                  <strong style="color: #0050E7;">FaceID</strong>
                </div>
              </div>

            </div>

            <!-- Bottom Navigation Tab Bar -->
            <div class="phone-bottom-nav">
              <div class="phone-tab-item -active">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/></svg>
                <span>Home</span>
              </div>
              <div class="phone-tab-item">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                <span>Stats</span>
              </div>
              <div class="phone-tab-item">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                <span>Alerts</span>
              </div>
              <div class="phone-tab-item">
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
                <span>Profile</span>
              </div>
            </div>

          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- BENTO MOBILE TRACKS (WHAT WE BUILD) -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Engineering Tracks</span>
      <h2 class="section-title">Specialized Mobile App Development Services</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Whether you are launching a standalone mobile startup or extending an existing SaaS web product, we deliver native-grade applications.</p>
    </div>

    <div class="bento-showcase-grid">
      
      <!-- Track 1: Cross-Platform Apps (Span 7) -->
      <div class="bento-card -span-7 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">Flutter &amp; React Native</span>
          <h3 class="bento-card-title">Cross-Platform Dual-Launch Apps</h3>
          <p class="bento-card-desc">Write once, deploy simultaneously to Apple App Store and Google Play. A single clean codebase saves up to 40% in development and ongoing maintenance budgets without sacrificing fluid native performance.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Unified Codebase</span>
            <span class="token-pill">Shared Business Logic</span>
            <span class="token-pill">Zero UI Compromise</span>
            <span class="token-pill">Faster Feature Updates</span>
          </div>
        </div>
      </div>

      <!-- Track 2: SaaS Companion Mobile Apps (Span 5) -->
      <div class="bento-card -span-5 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Enterprise &amp; SaaS</span>
          <h3 class="bento-card-title">SaaS Companion Mobile Apps</h3>
          <p class="bento-card-desc">Put your cloud web platform in your users' pockets. Real-time push alerts, biometric login, offline document caching, and deep links connected to your web database.</p>
        </div>

        <div class="bento-interactive-snippet">
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; font-size: 0.86rem; color: var(--color-gray-600);">
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="13" height="13" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Secure OAuth2 &amp; JWT mobile session tokens
            </li>
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="13" height="13" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Instant push notification triage
            </li>
          </ul>
        </div>
      </div>

      <!-- Track 3: Consumer & On-Demand Apps (Span 5) -->
      <div class="bento-card -span-5 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">Consumer Tech</span>
          <h3 class="bento-card-title">On-Demand &amp; Marketplace Apps</h3>
          <p class="bento-card-desc">Location-aware apps with Google Maps/Apple Maps, real-time driver/service tracking, in-app customer chat, and automated payment disbursements.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Background Geolocation</span>
            <span class="token-pill">Apple Pay &amp; Google Pay</span>
            <span class="token-pill">Live WebSockets</span>
          </div>
        </div>
      </div>

      <!-- Track 4: App Store Deployment & Compliance (Span 7) -->
      <div class="bento-card -span-7 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Release Management</span>
          <h3 class="bento-card-title">Guaranteed App Store &amp; Play Store Approval</h3>
          <p class="bento-card-desc">Never worry about rejection. We handle certificates, provisioning profiles, privacy declarations, screenshot assets, TestFlight beta distribution, and Apple App Review guidelines from start to finish.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-weight: 600; font-size: 0.85rem; color: var(--color-primary);">Full Deployment Pipeline</span>
            <span style="font-size: 0.78rem; color: #059669; font-weight: 600;">100% Approval Record</span>
          </div>
          <div class="tokens-strip">
            <span class="token-pill">Apple Developer Setup</span>
            <span class="token-pill">Google Play Console</span>
            <span class="token-pill">TestFlight Betas</span>
            <span class="token-pill">CI/CD Fastlane Builds</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- MOBILE IMPACT METRICS -->
<section class="subpage-section" style="padding: 70px 0;">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Performance Benchmarks</span>
      <h2 class="section-title">Engineered for User Retention &amp; Zero Lag</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Mobile app success requires sub-second load times, smooth frame rates, and reliable performance across low-end and high-end hardware.</p>
    </div>

    <div class="stats-grid-4">
      <div class="stat-card-clean stagger-1" data-viewport="true">
        <div class="stat-card-number">
          99.9<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Crash-Free Sessions</h3>
        <p class="stat-card-desc">Rock-solid stability, zero jank, and hardware-accelerated rendering using Flutter Impeller and React Native Fabric.</p>
      </div>

      <div class="stat-card-clean stagger-2" data-viewport="true">
        <div class="stat-card-number">
          100<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Store Approval Track Record</h3>
        <p class="stat-card-desc">Strict adherence to Apple App Store Review Guidelines and Google Play developer security policies.</p>
      </div>

      <div class="stat-card-clean stagger-3" data-viewport="true">
        <div class="stat-card-number">
          40<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Development Cost Savings</h3>
        <p class="stat-card-desc">A unified codebase eliminates the need for separate Swift and Kotlin engineering teams.</p>
      </div>

      <div class="stat-card-clean stagger-4" data-viewport="true">
        <div class="stat-card-number">
          &lt;100<span class="symbol">ms</span>
        </div>
        <h3 class="stat-card-title">Cached Local Query Speed</h3>
        <p class="stat-card-desc">Instantaneous offline read and write speeds powered by embedded SQLite and Hive database indexing.</p>
      </div>
    </div>
  </div>
</section>

<!-- 4-STEP DELIVERY LIFECYCLE -->
<section class="usecases-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Development Framework</span>
      <h2 class="section-title">How We Take Your App From Wireframe to App Store</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, milestone-driven mobile development process with continuous TestFlight builds.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Mobile Architecture</h3>
        <p class="process-step-desc">We map screen flows, define local caching strategies, select third-party SDKs, and establish API contracts within 48 hours.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">Clickable Prototypes</h3>
        <p class="process-step-desc">We build interactive mobile prototypes in Figma. You test navigation flows, gesture ergonomics, and screen hierarchies directly on your smartphone.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Cross-Platform Sprints</h3>
        <p class="process-step-desc">We build in 2-week agile sprints. You receive live TestFlight (iOS) and Internal Track (Android) builds to test real software on actual devices.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">App Store Submission</h3>
        <p class="process-step-desc">Complete metadata configuration, compliance checklists, store submission, production approval, and 100% repository handover.</p>
      </div>
    </div>
  </div>
</section>

<!-- QUALITY STANDARDS -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Quality Standards</span>
      <h2 class="section-title">Production Safeguards for Mobile Longevity</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every line of Dart or TypeScript code adheres to production-grade mobile standards.</p>
    </div>

    <div class="features-grid-2">
      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="card-title-lg">Keychain &amp; Keystore Encryption</h3>
        <p class="card-text">Sensitive user credentials, auth tokens, and encryption keys are stored exclusively in iOS Keychain and Android KeyStore, protected against memory dumps.</p>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <h3 class="card-title-lg">Battery &amp; Memory Optimization</h3>
        <p class="card-text">Background tasks, geolocation polling, and WebSocket listeners are throttled intelligently to minimize device CPU usage and battery drain.</p>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
        </div>
        <h3 class="card-title-lg">Multi-Device Screen Adaptation</h3>
        <p class="card-text">Responsive layouts tested across diverse aspect ratios, foldables, tablets, notches, and dynamic islands on iOS and Android.</p>
      </div>

      <div class="feature-card-clean stagger-4" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="card-title-lg">100% Client-Owned Code</h3>
        <p class="card-text">All source code, Git repositories, Figma design assets, and app store credentials belong entirely to your company from day one.</p>
      </div>
    </div>
  </div>
</section>

<!-- GLOBAL COLLABORATION (GEO) -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Global Collaboration</span>
      <h2 class="section-title">Worldwide Delivery with Real-Time Agility</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Based in India and operating on a remote-first engineering model, we collaborate with founders across North America, Europe, Australia, and Asia.</p>
    </div>

    <div class="geo-collab-grid">
      <div class="geo-collab-card stagger-1" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="geo-collab-title">Timezone Overlap</h3>
        <p class="geo-collab-desc">We offer daily scheduled overlap hours with US (EST/PST), UK (GMT), European (CET), and Australian (AEST) time zones for real-time sprint reviews and TestFlight demos.</p>
      </div>

      <div class="geo-collab-card stagger-2" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3 class="geo-collab-title">Direct Developer Access</h3>
        <p class="geo-collab-desc">Collaborate directly with senior mobile engineers and solution architects over Slack, WhatsApp, and Google Meet with zero layers of management.</p>
      </div>

      <div class="geo-collab-card stagger-3" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        </div>
        <h3 class="geo-collab-title">Multi-Currency &amp; Contracts</h3>
        <p class="geo-collab-desc">Transparent fixed milestone pricing in USD, EUR, GBP, AUD, and INR. Milestone payments processed securely via Stripe or international wire transfers with complete compliance.</p>
      </div>
    </div>
  </div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS SECTION -->
<section class="faq-section" id="faq">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-left" data-viewport="true">
        <span class="section-tag">Mobile FAQ</span>
        <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
        <p class="section-subtitle">Direct, honest answers about cross-platform mobile development, Flutter, React Native, and app store approval.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>Flutter vs. React Native: Which should we choose?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Both frameworks deliver exceptional native performance with a single codebase. Flutter is ideal for highly custom visual interfaces, graphics-heavy applications, and consistent cross-platform pixel accuracy. React Native is optimal if your team already has React/TypeScript web expertise or requires deep integration with existing native Swift/Kotlin modules. We help you choose the best fit during our technical discovery call.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How long does it take to develop a cross-platform mobile application?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>A focused MVP mobile app typically takes 4 to 8 weeks from initial Figma prototype to production App Store submission. We work in disciplined 2-week milestones with continuous TestFlight builds so you test real software on your phone every week.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Do you handle the App Store and Google Play submission process?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. We handle the entire release lifecycle: certificates, provisioning profiles, privacy declarations, screenshot generation, TestFlight beta setup, and submission to Apple App Store and Google Play Store until your application is live.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Can the mobile app function offline without internet connectivity?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. We engineer offline-first architectures using local embedded databases (SQLite/Hive) and background queue workers. Users can view data, take actions, and save changes offline, which sync automatically with your cloud backend once connectivity is restored.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-5" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Who owns the source code and developer accounts?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>You own 100% of all intellectual property, source code, Git repositories, and design files from day one. Apps are published directly under your company's Apple and Google developer accounts with zero vendor lock-in.</p>
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
          Ready to Build Your Mobile App?<br><mark>Let's Launch on iOS &amp; Android</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Share your mobile app vision and receive a comprehensive technical proposal, architecture roadmap, and transparent estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=mobile-app-development" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Start Your Mobile App</span>
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
          <div class="cta-pill-item">iOS &amp; Android Dual Launch</div>
          <div class="cta-pill-item">100% App Store Approval Guarantee</div>
          <div class="cta-pill-item">100% Code &amp; IP Ownership</div>
          <div class="cta-pill-item">Direct Senior Engineer Access</div>
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
      "@@id": "{{ url('/mobile-app-development') }}",
      "url": "{{ url('/mobile-app-development') }}",
      "name": "Mobile App Development Services | iOS & Android Apps | Bluebase Technologies",
      "description": "Custom cross-platform mobile app development with Flutter and React Native. Smooth native performance, offline sync, biometric security, and complete App Store release.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/mobile-app-development#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/mobile-app-development#breadcrumb') }}",
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
          "name": "Mobile App Development",
          "item": "{{ url('/mobile-app-development') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/mobile-app-development#service') }}",
      "name": "Mobile App Development Services",
      "serviceType": "Cross-Platform iOS & Android Mobile Application Engineering",
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
      "@@id": "{{ url('/mobile-app-development#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "Flutter vs. React Native: Which should we choose?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Both frameworks deliver exceptional native performance with a single codebase. Flutter is ideal for highly custom visual interfaces, graphics-heavy applications, and consistent cross-platform pixel accuracy. React Native is optimal if your team already has React/TypeScript web expertise or requires deep integration with existing native Swift/Kotlin modules. We help you choose the best fit during our technical discovery call."
          }
        },
        {
          "@@type": "Question",
          "name": "How long does it take to develop a cross-platform mobile application?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "A focused MVP mobile app typically takes 4 to 8 weeks from initial Figma prototype to production App Store submission. We work in disciplined 2-week milestones with continuous TestFlight builds so you test real software on your phone every week."
          }
        },
        {
          "@@type": "Question",
          "name": "Do you handle the App Store and Google Play submission process?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. We handle the entire release lifecycle: certificates, provisioning profiles, privacy declarations, screenshot generation, TestFlight beta setup, and submission to Apple App Store and Google Play Store until your application is live."
          }
        },
        {
          "@@type": "Question",
          "name": "Can the mobile app function offline without internet connectivity?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. We engineer offline-first architectures using local embedded databases (SQLite/Hive) and background queue workers. Users can view data, take actions, and save changes offline, which sync automatically with your cloud backend once connectivity is restored."
          }
        },
        {
          "@@type": "Question",
          "name": "Who owns the source code and developer accounts?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You own 100% of all intellectual property, source code, Git repositories, and design files from day one. Apps are published directly under your company's Apple and Google developer accounts with zero vendor lock-in."
          }
        }
      ]
    }
  ]
}
</script>
@endpush
