@extends('layouts.app')

@section('title', 'Enterprise Mobile App Development & Offline Mobility | Bluebase')
@section('meta_description', 'Build robust iOS, Android, and cross-platform mobile apps with guaranteed offline data synchronization for warehouses, field services, and frontline teams.')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Mission-Critical Mobile Solutions</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Enterprise Mobile Apps that <mark>Never Stop Working</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          Frontline workers cannot afford network dropouts. Bluebase engineers industrial-grade mobile applications with bi-directional conflict resolution, SQLite-backed offline storage, and instantaneous sync.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="{{ route('book-a-demo') }}" class="c-btn -primary">
                    <span class="c-btn__txt">Schedule Mobile App Consultation</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('free-trial') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Request Architecture Scope</span>
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
          <div class="hero-badge-item">100% Offline Resilience</div><div class="hero-badge-item">Hardware Barcode/RFID Support</div><div class="hero-badge-item">iOS & Android</div>
        </div>
      </div>
    </section>

  <!-- CLIENT LOGO MARQUEE -->
  @include('partials.client-marquee', ['heading' => 'Trusted by 600+ high-growth companies and global enterprises to engineer mission-critical digital products'])

    <!-- STICKY FEATURE SECTION -->
    <section class="sticky-features-section">
      <div class="container">
        <div class="sticky-layout">
          <div class="sticky-left" data-viewport="true">
            <span class="section-tag light">Mission-Critical Mobility</span>
            <h2 class="section-title">Enterprise Mobile Apps that <mark>Never Stop Working.</mark></h2>
            <p class="section-subtitle light">Field technicians and warehouse operators cannot afford app freezes or connectivity dropouts. Bluebase builds offline-first enterprise mobile apps with instantaneous sync.</p>
            <div class="sticky-image-wrap">
              <img src="{{ asset('images/illustrations/workflow-canvas.jpg') }}" alt="Enterprise Mobile Apps that <mark>Never Stop Working.</mark>">
            </div>
          </div>
          <div class="sticky-right">
            <div class="feature-scroll-card stagger-1" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">True Offline-First Architecture</h3>
              <p class="feature-card-desc">Local SQLite database caching with multi-master sync algorithms and automated conflict resolution when connectivity returns.</p>
              <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">Offline Architecture</span>
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
            <div class="feature-scroll-card stagger-2" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/code-bar.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Industrial Hardware Scanning</h3>
              <p class="feature-card-desc">Native integration with Zebra, Honeywell, and camera-based 1D/2D barcode and RFID scanners for ultra-fast picking.</p>
              <a href="{{ route('use-cases.warehouse-logistics') }}" class="c-btn -link">
                    <span class="c-btn__txt">Hardware Integrations</span>
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
            <div class="feature-scroll-card stagger-3" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/diagram.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Cross-Platform iOS & Android</h3>
              <p class="feature-card-desc">Engineered with React Native and Flutter for single-codebase efficiency with 100% native performance.</p>
              <a href="{{ route('customer-stories') }}" class="c-btn -link">
                    <span class="c-btn__txt">Mobile Case Studies</span>
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
    </section>    <!-- FEATURE GRID SECTION -->
    <section class="usecases-section">
      <div class="container">
        <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
          <span class="section-tag">Mobile Capabilities</span>
          <h2 class="section-title">Built for Harsh Industrial & Field Environments</h2>
          <p class="section-subtitle" style="margin: 0 auto;">Whether offshore on oil rigs or deep inside shielded warehouse aisles, our mobile applications never crash.</p>
        </div>
        <div class="features-grid-3">
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/cube.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Warehouse Floor Applications</h3>
            <p class="card-text">Inventory counting, bin transfers, pallet verification, and cross-docking optimized for rugged handheld terminals.</p>
          </div>
          <a href="{{ route('use-cases.warehouse-logistics') }}" class="c-btn -link">
                    <span class="c-btn__txt">Warehouse Apps</span>
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
        <div class="feature-card-clean stagger-2" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Field Inspection & Maintenance</h3>
            <p class="card-text">Digital checklist execution, photo attachments, voice dictation, and customer signature capture on tablets.</p>
          </div>
          <a href="{{ route('use-cases.asset-management') }}" class="c-btn -link">
                    <span class="c-btn__txt">Field Work Orders</span>
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
        <div class="feature-card-clean stagger-3" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Fleet Dispatch & Route Navigation</h3>
            <p class="card-text">Turn-by-turn routing, real-time vehicle GPS telemetry, and instant proof-of-delivery sync.</p>
          </div>
          <a href="{{ route('use-cases.warehouse-logistics') }}" class="c-btn -link">
                    <span class="c-btn__txt">Fleet Logistics</span>
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
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/ai-agent.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Biometric & Single Sign-On</h3>
            <p class="card-text">FaceID, fingerprint recognition, and corporate Okta/Azure AD authentication designed for shared mobile devices.</p>
          </div>
          <a href="{{ route('compliance-security') }}" class="c-btn -link">
                    <span class="c-btn__txt">Mobile Security</span>
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
        <div class="feature-card-clean stagger-2" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/code-bar.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Mobile Device Management (MDM)</h3>
            <p class="card-text">Seamless deployment via Microsoft Intune, VMware Workspace ONE, and private enterprise app stores.</p>
          </div>
          <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">MDM Deployment</span>
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
        <div class="feature-card-clean stagger-3" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Push Notifications & Alerts</h3>
            <p class="card-text">Real-time push notifications alerting frontline workers to urgent work orders, machine faults, or dispatch changes.</p>
          </div>
          <a href="{{ route('contact') }}" class="c-btn -link">
                    <span class="c-btn__txt">Alert Systems</span>
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
    </section>

  <!-- FAQ ACCORDION -->
  <section class="faq-section">
    <div class="container">
      <div class="faq-layout">
        <div class="faq-left" data-viewport="true">
          <span class="section-tag">FAQ</span>
          <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
          <p class="section-subtitle">Everything you need to know about our engineering services, pod structure, and delivery model.</p>
        </div>
        <div class="faq-right">
          <div class="accordion-list">
              <div class="accordion-item open stagger-1" data-viewport="true">
                <button class="accordion-trigger" aria-expanded="true">
                  <span>What services does Bluebase provide?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>Bluebase is a modern digital engineering and AI consultancy startup. We provide end-to-end custom software development, autonomous AI agent workflows, generative AI fine-tuning, cloud-native modernization, offline-first mobile applications, and dedicated cross-functional engineering pods.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item stagger-2" data-viewport="true">
                <button class="accordion-trigger" aria-expanded="false">
                  <span>How does Bluebase engage with clients?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>We offer three flexible engagement models tailored to your project stage: Dedicated Engineering Pods (senior cross-functional teams that integrate into your roadmap), Fixed-Outcome Product Builds (turnkey MVP or feature engineering with guaranteed delivery milestones), and Fractional Architecture & AI Advisory.</p>
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
                    <p>You own 100% of all intellectual property, source code, data pipelines, and design assets created during our engagement. Everything is developed directly in your repositories with zero vendor lock-in.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item stagger-4" data-viewport="true">
                <button class="accordion-trigger" aria-expanded="false">
                  <span>How fast can an engineering pod ramp up and start shipping?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>Our senior engineering pods can be assembled and onboarded in as little as 1 to 2 weeks. Every pod includes a Lead Solutions Architect, Senior Full-Stack Engineers, and QA specialists who hit the ground running with production-ready code in sprint one.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item stagger-5" data-viewport="true">
                <button class="accordion-trigger" aria-expanded="false">
                  <span>How does Bluebase handle enterprise security, compliance, and confidentiality?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>We operate under strict enterprise security protocols. Bluebase is SOC 2 Type II compliant, adheres to ISO 27001 standards, and follows GDPR and HIPAA guidelines. We sign comprehensive NDAs before any technical architecture discussions.</p>
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
            Ready to Mobilize Your Frontline Operations?<br><mark>Build Offline-First with Bluebase</mark>.
          </h2>
          <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
            <a href="{{ route('book-a-demo') }}" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
                    <span class="c-btn__txt">Schedule a Discovery Call</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a>
            <a href="{{ route('free-trial') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
                    <span class="c-btn__txt">Request a Project Proposal</span>
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
            <div class="cta-pill-item">Dedicated senior engineering pods</div>
            <div class="cta-pill-item">Autonomous AI &amp; custom LLMs</div>
            <div class="cta-pill-item">100% client-owned code &amp; IP</div>
            <div class="cta-pill-item">Enterprise SOC 2 &amp; ISO 27001</div>
            <div class="cta-pill-item">Sprint-one velocity guarantee</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </main>

      <!-- SITE FOOTER -->
@endsection
