@extends('layouts.app')

@section('title', 'Legacy System Modernization & Cloud Migration | Bluebase')
@section('meta_description', 'Modernize legacy applications, decouple mission-critical databases, and migrate to cloud platforms with guaranteed business continuity and zero data loss.')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Zero-Downtime System Modernization</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Modernize Legacy Systems <mark>Without Business Disruption</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          Legacy monoliths choke innovation and cost millions in maintenance. Bluebase executes phased modernization strategiesâ€”strangler fig patterns, API encapsulation, and cloud migrationsâ€”with zero operational interruption.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="{{ route('book-a-demo') }}" class="c-btn -primary">
                    <span class="c-btn__txt">Schedule Modernization Assessment</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('free-trial') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Request Free Migration Roadmap</span>
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
          <div class="hero-badge-item">Zero Data Loss</div><div class="hero-badge-item">Phased Strangler Migration</div><div class="hero-badge-item">Cloud Cost Reduction</div>
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
            <span class="section-tag light">Zero-Downtime Modernization</span>
            <h2 class="section-title">Modernize Legacy Systems <mark>Without Business Disruption.</mark></h2>
            <p class="section-subtitle light">Monolithic legacy codebases and outdated databases stifle organizational agility. Bluebase modernizes enterprise software using proven phased strangler fig patterns with zero downtime.</p>
            <div class="sticky-image-wrap">
              <img src="{{ asset('images/illustrations/ui-illustration.jpg') }}" alt="Modernize Legacy Systems <mark>Without Business Disruption.</mark>">
            </div>
          </div>
          <div class="sticky-right">
            <div class="feature-scroll-card stagger-1" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Strangler Fig Decoupling</h3>
              <p class="feature-card-desc">Extracting monolithic services into microservices incrementally, validating each phase in production without risky 'big bang' migrations.</p>
              <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">Strangler Pattern</span>
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
              <h3 class="feature-card-title">Zero Data Loss Guarantees</h3>
              <p class="feature-card-desc">Bi-directional data replication and dual-write strategies ensuring continuous data consistency across legacy and modern databases.</p>
              <a href="{{ route('modernization.sap-integration') }}" class="c-btn -link">
                    <span class="c-btn__txt">Data Replication</span>
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
                <img src="{{ asset('images/icons/code-bar.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Cloud Modernization & Scale</h3>
              <p class="feature-card-desc">Re-platforming on-premises infrastructure to AWS, Azure, or GCP with automated container orchestration and cost savings.</p>
              <a href="{{ route('modernization.sap-native') }}" class="c-btn -link">
                    <span class="c-btn__txt">Cloud Migration</span>
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
          <span class="section-tag">Modernization Solutions</span>
          <h2 class="section-title">Phased Modernization Without Operational Risk</h2>
          <p class="section-subtitle" style="margin: 0 auto;">Keep your business running 24/7 while your underlying technology stack transforms.</p>
        </div>
        <div class="features-grid-3">
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/cube.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">SAP ECC to S/4HANA Transition</h3>
            <p class="card-text">Decoupling custom business logic into clean cloud microservices before or during your S/4HANA transformation.</p>
          </div>
          <a href="{{ route('customer-stories') }}" class="c-btn -link">
                    <span class="c-btn__txt">SAP Migration</span>
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
            <h3 class="card-title-lg">Monolith to Microservices</h3>
            <p class="card-text">Breaking monolithic codebases into autonomous, independently deployable services communicating via gRPC and Kafka.</p>
          </div>
          <a href="{{ route('modernization.sap-integration') }}" class="c-btn -link">
                    <span class="c-btn__txt">Microservices</span>
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
            <h3 class="card-title-lg">Database Re-Architecting</h3>
            <p class="card-text">Migrating legacy Oracle and MS SQL databases to scalable PostgreSQL, Aurora, and DynamoDB with zero data loss.</p>
          </div>
          <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">Database Migration</span>
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
            <h3 class="card-title-lg">API Encapsulation</h3>
            <p class="card-text">Wrapping aging mainframe or AS400 endpoints with modern REST/GraphQL APIs that modern frontends can consume.</p>
          </div>
          <a href="{{ route('modernization.sap-integration') }}" class="c-btn -link">
                    <span class="c-btn__txt">API Wrapping</span>
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
            <h3 class="card-title-lg">Automated Code Refactoring</h3>
            <p class="card-text">Using static analysis and AI-assisted refactoring to update outdated dependencies, eliminate security flaws, and boost speed.</p>
          </div>
          <a href="{{ route('products.ai-agents') }}" class="c-btn -link">
                    <span class="c-btn__txt">AI Refactoring</span>
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
            <h3 class="card-title-lg">Continuous Architecture Audits</h3>
            <p class="card-text">Comprehensive codebase reviews identifying technical debt, security vulnerabilities, and performance bottlenecks.</p>
          </div>
          <a href="{{ route('free-trial') }}" class="c-btn -link">
                    <span class="c-btn__txt">Request Audit</span>
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
            Ready to Modernize Your Legacy Architecture?<br><mark>Migrate with Zero Downtime</mark>.
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
