@extends('layouts.app')

@section('title', 'Website Design & UI/UX Services | Bespoke Digital Experiences | Bluebase Technologies')
@section('meta_description', 'We design and build bespoke, high-converting websites and digital product interfaces for modern brands, founders, and startups. Core Web Vitals 90+ guaranteed, clickable Figma prototypes, and 100% code ownership.')

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
          <span itemprop="name" aria-current="page">Website Design &amp; UI/UX</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">UI/UX &amp; Website Design</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Websites &amp; Interfaces Designed to <br><mark>Captivate &amp; Convert</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      Bespoke digital experiences, clickable Figma prototypes, and high-converting websites engineered to turn visitors into customers.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=website-design" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Design Project</span>
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
      <div class="hero-badge-item">Custom Figma Architecture</div>
      <div class="hero-badge-item">Clickable Mobile &amp; Desktop Prototypes</div>
      <div class="hero-badge-item">100% Code &amp; IP Ownership</div>
    </div>

  </div>
</section>

<!-- MARQUEE SECTION -->
@include('partials.client-marquee', ['heading' => 'Trusted by modern brands, founders, and growing businesses worldwide'])

<!-- BENTO DESIGN SHOWCASE (WHAT WE DESIGN) -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Design Capabilities</span>
      <h2 class="section-title">Everything We Design Is Engineered to Convert</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We merge high-end visual design with rigorous conversion rate optimization (CRO) so your digital interfaces perform as well as they look.</p>
    </div>

    <div class="bento-showcase-grid">
      
      <!-- Bento 1: Custom SaaS Platforms (Span 7) -->
      <div class="bento-card -span-7 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">Web Apps &amp; SaaS</span>
          <h3 class="bento-card-title">SaaS Application &amp; Dashboard Design</h3>
          <p class="bento-card-desc">Complex workflows made clean and intuitive. We design multi-tenant cloud software, analytics dashboards, role-based controls, and seamless onboarding flows that reduce churn.</p>
        </div>
        
        <div class="bento-interactive-snippet">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
            <span style="font-weight: 600; font-size: 0.88rem; color: var(--color-primary);">Workspace User Management</span>
            <span style="font-size: 0.78rem; color: #059669; font-weight: 600;">Active Session</span>
          </div>
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Role-Based Access</span>
            <span class="token-pill">Dark / Light Mode</span>
            <span class="token-pill">Real-Time Data Viz</span>
            <span class="token-pill">Figma Clickable Links</span>
          </div>
        </div>
      </div>

      <!-- Bento 2: High-Converting Marketing Websites (Span 5) -->
      <div class="bento-card -span-5 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Brand Impact</span>
          <h3 class="bento-card-title">High-Converting Marketing Websites</h3>
          <p class="bento-card-desc">Bespoke marketing websites and landing pages engineered to captivate visitors, establish brand credibility, and turn paid traffic into qualified sales inquiries.</p>
        </div>

        <div class="bento-interactive-snippet">
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px; font-size: 0.88rem; color: var(--color-gray-600);">
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Clear visual CTA hierarchy &amp; value proposition
            </li>
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              90+ Core Web Vitals performance guaranteed
            </li>
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Frictionless mobile checkout &amp; lead forms
            </li>
          </ul>
        </div>
      </div>

      <!-- Bento 3: Mobile App UI/UX (Span 5) -->
      <div class="bento-card -span-5 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">iOS &amp; Android</span>
          <h3 class="bento-card-title">Mobile App Product Design</h3>
          <p class="bento-card-desc">Ergonomic, thumb-friendly mobile layouts for iOS and Android. Smooth fluid micro-interactions, dark mode elegance, and intuitive native gesture navigation.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Human Interface Guidelines</span>
            <span class="token-pill">Material 3 Ready</span>
            <span class="token-pill">Haptic Feedback Specs</span>
            <span class="token-pill">Native Gestures</span>
          </div>
        </div>
      </div>

      <!-- Bento 4: Scalable Design Systems (Span 7) -->
      <div class="bento-card -span-7 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Design Systems</span>
          <h3 class="bento-card-title">Comprehensive Figma Design Systems</h3>
          <p class="bento-card-desc">Stop reinventing components. We construct unified design libraries with reusable component variants, typography hierarchies, and color tokens that sync directly to Tailwind CSS and frontend codebases.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
            <span style="font-weight: 600; font-size: 0.85rem; color: var(--color-primary);">Figma Token Library Export</span>
            <span style="font-size: 0.78rem; color: var(--color-accent); font-weight: 600;">100% Client-Owned</span>
          </div>
          <div class="tokens-strip">
            <span class="token-pill"><span class="token-color-dot" style="background: #0050E7;"></span> Accent Brand</span>
            <span class="token-pill"><span class="token-color-dot" style="background: #0F172A;"></span> Primary Slate</span>
            <span class="token-pill"><span class="token-color-dot" style="background: #10B981;"></span> Emerald Success</span>
            <span class="token-pill">Radius: 14px</span>
            <span class="token-pill">Scale: 8-pt Grid</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- MEASURABLE BUSINESS IMPACT METRICS -->
<section class="subpage-section -gray" style="padding: 70px 0;">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Measurable Impact</span>
      <h2 class="section-title">Design That Drives Verifiable Results</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We don't just make things look pretty. Every layout decision is calibrated to increase conversion velocity, retention, and speed.</p>
    </div>

    <div class="stats-grid-4">
      <div class="stat-card-clean stagger-1" data-viewport="true">
        <div class="stat-card-number">
          +140<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Average Conversion Uplift</h3>
        <p class="stat-card-desc">Achieved by removing cognitive friction, optimizing headline clarity, and refining primary CTA hierarchy.</p>
      </div>

      <div class="stat-card-clean stagger-2" data-viewport="true">
        <div class="stat-card-number">
          99.4<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Design-to-Code Fidelity</h3>
        <p class="stat-card-desc">Every Figma frame is translated into clean HTML5, Tailwind CSS, or React code with exact pixel precision.</p>
      </div>

      <div class="stat-card-clean stagger-3" data-viewport="true">
        <div class="stat-card-number">
          &lt;0.8<span class="symbol">s</span>
        </div>
        <h3 class="stat-card-title">First Contentful Paint</h3>
        <p class="stat-card-desc">Lightweight asset optimization, font subsetting, and clean semantic markup for sub-second speeds.</p>
      </div>

      <div class="stat-card-clean stagger-4" data-viewport="true">
        <div class="stat-card-number">
          3.4<span class="symbol">x</span>
        </div>
        <h3 class="stat-card-title">Longer User Engagement</h3>
        <p class="stat-card-desc">Compelling typography, purposeful micro-interactions, and frictionless user flows keep visitors engaged.</p>
      </div>
    </div>
  </div>
</section>

<!-- OUR 4-STEP DESIGN & BUILD PROCESS -->
<section class="usecases-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Design Methodology</span>
      <h2 class="section-title">How We Take Your Project from Concept to Launch</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, collaborative Figma workflow where you test clickable prototypes every step of the way.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Discovery &amp; User Flows</h3>
        <p class="process-step-desc">We audit competitors, map your target audience's mental models, define key conversion funnels, and establish your information architecture.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">Clickable Prototypes</h3>
        <p class="process-step-desc">We build interactive Figma prototypes you can test directly on your mobile device or desktop. You validate the user experience before high-fidelity styling begins.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Design System &amp; UI Polish</h3>
        <p class="process-step-desc">We craft bespoke typography scales, responsive layout tokens, dark/light variants, and micro-interactions, delivering a complete production-ready design library.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">Pixel-Perfect Engineering</h3>
        <p class="process-step-desc">Our developers code the designs into lightweight, responsive HTML5/Tailwind/React with 1:1 fidelity, sub-second speeds, and 100% code ownership.</p>
      </div>
    </div>
  </div>
</section>

<!-- WHAT YOU RECEIVE (100% CLIENT OWNERSHIP) -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Deliverables</span>
      <h2 class="section-title">Everything You Need to Scale With Zero Lock-In</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Complete intellectual property ownership, organized Figma files, and developer-ready specifications from day one.</p>
    </div>

    <div class="features-grid-2">
      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m4.93 4.93 4.24 4.24"/><path d="m14.83 9.17 4.24-4.24"/><path d="m14.83 14.83 4.24 4.24"/><path d="m9.17 14.83-4.24 4.24"/></svg>
        </div>
        <h3 class="card-title-lg">Organized Master Figma Files</h3>
        <p class="card-text">Clean layers, named frames, auto-layout 4.0, and component properties. You receive 100% full edit access to the master Figma workspace with zero restrictions.</p>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
        </div>
        <h3 class="card-title-lg">Multi-Device Breakpoint Artboards</h3>
        <p class="card-text">Every layout is designed and verified across mobile (375px), tablet (768px), desktop (1440px), and ultra-wide screens. Zero broken layouts or awkward text wrapping.</p>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <h3 class="card-title-lg">Production-Ready Code (Optional)</h3>
        <p class="card-text">Need development too? We build your design into semantic HTML5, modern Tailwind CSS, React, or Laravel templates with sub-second performance guaranteed.</p>
      </div>

      <div class="feature-card-clean stagger-4" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="card-title-lg">100% IP &amp; Commercial Ownership</h3>
        <p class="card-text">All design tokens, custom illustrations, SVG icons, and frontend code belong entirely to your company. Zero recurring proprietary platform fees or designer lock-in.</p>
      </div>
    </div>
  </div>
</section>

<!-- GLOBAL COLLABORATION (GEO) -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Global Collaboration</span>
      <h2 class="section-title">Worldwide Delivery with Real-Time Agility</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Based in India and operating on a remote-first model, we collaborate seamlessly with founders and design teams across the globe.</p>
    </div>

    <div class="geo-collab-grid">
      <div class="geo-collab-card stagger-1" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="geo-collab-title">Timezone Overlap</h3>
        <p class="geo-collab-desc">We offer daily scheduled overlap hours with US (EST/PST), UK (GMT), European (CET), and Australian (AEST) time zones for real-time Figma reviews and design standups.</p>
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
        <p class="geo-collab-desc">Transparent fixed milestone pricing in USD, EUR, GBP, AUD, and INR. Invoices processed securely via Stripe or international wire transfers with complete compliance.</p>
      </div>
    </div>
  </div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS SECTION -->
<section class="faq-section -gray" id="faq">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-left" data-viewport="true">
        <span class="section-tag">Design FAQ</span>
        <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
        <p class="section-subtitle">Direct, honest answers about our website design, UI/UX workflow, prototyping, and deliverables.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>Do you design from scratch in Figma or use pre-made templates?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We design 100% custom from scratch in Figma for every project. We never use generic, bloated website templates. Every layout, typography choice, color palette, and component is specifically engineered for your brand, audience mental model, and conversion goals.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How many design revisions do we get?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We provide unlimited collaborative revisions during the wireframing and initial UI prototyping phase. We do not stop until you and your team are completely satisfied with the look, feel, and interaction model of every screen.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Can your team also code the website, or do you only deliver Figma designs?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We do both. We can deliver pure design files (Figma tokens, design system, and clickable prototypes) ready for your in-house engineers, or we can handle the entire end-to-end process: designing in Figma and coding with 1:1 pixel fidelity in Tailwind CSS, HTML5, React, or Laravel with 90+ Core Web Vitals performance guaranteed.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How long does a website design project typically take?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>A typical marketing website or high-converting landing page takes 1 to 3 weeks from kickoff to final approval. A full SaaS web application UI/UX project typically takes 3 to 5 weeks. We provide rapid initial wireframes within 48 to 72 hours of project kickoff.</p>
              </div>
            </div>
          </div>

          <div class="accordion-item stagger-5" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Who owns the Figma master files and source code?</span>
              <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>You own 100% of all intellectual property, Figma design files, component libraries, typography tokens, and code repositories from day one. Everything is transferred to your organization with zero vendor lock-in or recurring licensing fees.</p>
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
          Ready to Elevate Your Website &amp; UI/UX?<br><mark>Let's Design Something Exceptional</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Share your product vision and receive a tailored design proposal, wireframe walkthrough, and transparent estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=website-design" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
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
            <span class="c-btn__txt">Schedule a Design Call</span>
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
          <div class="cta-pill-item">100% Bespoke Figma Architecture</div>
          <div class="cta-pill-item">Unlimited Revisions in Prototyping</div>
          <div class="cta-pill-item">100% Code &amp; IP Ownership</div>
          <div class="cta-pill-item">Direct Senior Designer Access</div>
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
      "@@id": "{{ url('/website-design') }}",
      "url": "{{ url('/website-design') }}",
      "name": "Website Design & UI/UX Services | Bespoke Digital Experiences | Bluebase Technologies",
      "description": "We design and build bespoke, high-converting websites and digital product interfaces for modern brands, founders, and startups. Core Web Vitals 90+ guaranteed, clickable Figma prototypes, and 100% code ownership.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/website-design#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/website-design#breadcrumb') }}",
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
          "name": "Website Design",
          "item": "{{ url('/website-design') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/website-design#service') }}",
      "name": "Website Design & UI/UX Services",
      "serviceType": "Custom Website Design, UI/UX Prototyping & Frontend Engineering",
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
      "@@id": "{{ url('/website-design#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "Do you design from scratch in Figma or use pre-made templates?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We design 100% custom from scratch in Figma for every project. We never use generic, bloated website templates. Every layout, typography choice, color palette, and component is specifically engineered for your brand, audience mental model, and conversion goals."
          }
        },
        {
          "@@type": "Question",
          "name": "How many design revisions do we get?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We provide unlimited collaborative revisions during the wireframing and initial UI prototyping phase. We do not stop until you and your team are completely satisfied with the look, feel, and interaction model of every screen."
          }
        },
        {
          "@@type": "Question",
          "name": "Can your team also code the website, or do you only deliver Figma designs?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We do both. We can deliver pure design files (Figma tokens, design system, and clickable prototypes) ready for your in-house engineers, or we can handle the entire end-to-end process: designing in Figma and coding with 1:1 pixel fidelity in Tailwind CSS, HTML5, React, or Laravel with 90+ Core Web Vitals performance guaranteed."
          }
        },
        {
          "@@type": "Question",
          "name": "How long does a website design project typically take?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "A typical marketing website or high-converting landing page takes 1 to 3 weeks from kickoff to final approval. A full SaaS web application UI/UX project typically takes 3 to 5 weeks. We provide rapid initial wireframes within 48 to 72 hours of project kickoff."
          }
        },
        {
          "@@type": "Question",
          "name": "Who owns the Figma master files and source code?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You own 100% of all intellectual property, Figma design files, component libraries, typography tokens, and code repositories from day one. Everything is transferred to your organization with zero vendor lock-in or recurring licensing fees."
          }
        }
      ]
    }
  ]
}
</script>
@endpush
