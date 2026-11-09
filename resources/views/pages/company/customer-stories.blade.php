@extends('layouts.app')

@section('title', 'Client Transformation Stories & Case Studies | Bluebase')
@section('meta_description', 'Explore how global leaders and ambitious startups accelerated their engineering roadmaps, cut downtime, and automated workflows with Bluebase.')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Proven Engineering Track Record</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Proven Impact Across <mark>Startups & Global Leaders</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          Discover how Bluebase engineering pods have delivered mission-critical web platforms, autonomous AI pipelines, and digital transformations for enterprises worldwide.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="{{ route('book-a-demo') }}" class="c-btn -primary">
                    <span class="c-btn__txt">Schedule Client Transformation Call</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('free-trial') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Request Specific Case Study PDF</span>
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
          <div class="hero-badge-item">120+ Products Delivered</div><div class="hero-badge-item">85% Faster Deployment</div><div class="hero-badge-item">99.99% Reliability</div>
        </div>
      </div>
    </section>

  <!-- CLIENT LOGO MARQUEE -->
  <section class="marquee-section">
    <div class="container">
      <h2 class="marquee-heading" data-viewport="true">Trusted by 600+ high-growth companies and global enterprises to engineer mission-critical digital products</h2>
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

    <!-- STICKY FEATURE SECTION -->
    <section class="sticky-features-section">
      <div class="container">
        <div class="sticky-layout">
          <div class="sticky-left" data-viewport="true">
            <span class="section-tag light">Proven Client Impact</span>
            <h2 class="section-title">Real-World Engineering Impact Across <mark>Startups & Global Leaders.</mark></h2>
            <p class="section-subtitle light">Discover how Bluebase engineering pods partner with high-growth startups and Fortune 500 enterprises to solve complex software challenges, automate workflows, and drive measurable revenue.</p>
            <div class="sticky-image-wrap">
              <img src="{{ asset('images/illustrations/ui-illustration.jpg') }}" alt="Real-World Engineering Impact Across <mark>Startups & Global Leaders.</mark>">
            </div>
          </div>
          <div class="sticky-right">
            <div class="feature-scroll-card stagger-1" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Johnson & Johnson: Global Clinical Logistics</h3>
              <p class="feature-card-desc">Replaced fragmented spreadsheet tracking with an automated, GxP-validated inventory platform deployed across 40+ global distribution hubs.</p>
              <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">View Architecture</span>
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
                <img src="{{ asset('images/icons/diagram.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Secil Group: 17 Industrial Apps in 3 Months</h3>
              <p class="feature-card-desc">Deployed dedicated Bluebase pods to deliver 17 mobile plant maintenance and quarry dispatch apps, cutting unplanned equipment downtime by 38%.</p>
              <a href="{{ route('customer-stories') }}" class="c-btn -link">
                    <span class="c-btn__txt">Read Full Story</span>
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
                <img src="{{ asset('images/icons/cube.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Bell Food Group: 20+ Offline Mobile Apps</h3>
              <p class="feature-card-desc">Engineered offline-first mobile picking and quality inspection apps for thousands of frontline workers operating inside cold-storage food facilities.</p>
              <a href="{{ route('use-cases.run-mobile-in-offline') }}" class="c-btn -link">
                    <span class="c-btn__txt">Explore Mobile Stack</span>
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
          <span class="section-tag">Featured Case Studies</span>
          <h2 class="section-title">Transformation Stories Across Industries</h2>
          <p class="section-subtitle" style="margin: 0 auto;">Detailed case studies of how our engineering pods deliver rapid business outcomes.</p>
        </div>
        <div class="features-grid-3">
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/cube.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Asia Express Food: Supply Chain Logistics</h3>
            <p class="card-text">Engineered real-time order tracking and warehouse barcode verification, eliminating shipping errors and accelerating fulfillment by 30%.</p>
          </div>
          <a href="{{ route('use-cases.warehouse-logistics') }}" class="c-btn -link">
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
        </div>
        <div class="feature-card-clean stagger-2" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Compass Group: Frontline Hospitality Operations</h3>
            <p class="card-text">Custom tablet interfaces replaced manual paper audits across hundreds of kitchens, saving 15,000 manager hours annually.</p>
          </div>
          <a href="{{ route('book-a-demo') }}" class="c-btn -link">
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
        </div>
        <div class="feature-card-clean stagger-3" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">ALBA Group: Paperless Employee Portal</h3>
            <p class="card-text">Unified multi-tenant HR and contractor extranet serving 8,000+ employees with automated approvals and mobile self-service.</p>
          </div>
          <a href="{{ route('use-cases.supplier-portals') }}" class="c-btn -link">
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
        </div>
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/code-bar.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Rust-Oleum: 100% Paperless Smart Warehouse</h3>
            <p class="card-text">Engineered rugged mobile scanning apps synchronizing inventory transactions in real time with enterprise ERP backends.</p>
          </div>
          <a href="{{ route('use-cases.stock-inventory-management') }}" class="c-btn -link">
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
        </div>
        <div class="feature-card-clean stagger-2" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/ai-agent.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Hauni Technologies: IoT Predictive Maintenance</h3>
            <p class="card-text">Real-time edge telemetry and AI anomaly detection platforms connecting high-speed cigarette machinery worldwide.</p>
          </div>
          <a href="{{ route('use-cases.asset-management') }}" class="c-btn -link">
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
        </div>
        <div class="feature-card-clean stagger-3" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Dussmann Group: Smart Facility Management</h3>
            <p class="card-text">Cross-platform mobile apps for 60,000+ service staff, digitizing hospital cleaning validation and facility maintenance.</p>
          </div>
          <a href="{{ route('company') }}" class="c-btn -link">
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
            Ready to Write Your Success Story?<br><mark>Partner with Bluebase Engineering</mark>.
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
