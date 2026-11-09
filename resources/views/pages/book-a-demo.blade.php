@extends('layouts.app')

@section('title', 'Schedule a Discovery Call | Bluebase Digital Engineering')
@section('meta_description', 'Book a 30-minute consultation with a Bluebase Principal Solutions Architect to discuss your product roadmap, tech stack, and engineering requirements.')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Schedule a Consultation</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Speak Directly With a <mark>Principal Solutions Architect</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          No pushy sales reps. In 30 minutes, our technical leads will review your architecture, discuss your product goals, and outline a concrete engineering roadmap.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="#bookDemoForm" class="c-btn -primary">
                    <span class="c-btn__txt">Schedule Discovery Call Below</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('free-trial') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Request Written Proposal</span>
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
          <div class="hero-badge-item">Zero Obligation</div><div class="hero-badge-item">Direct Technical Architect</div><div class="hero-badge-item">NDA Protected</div>
        </div>
      </div>
    </section>

  <!-- CLIENT LOGO MARQUEE -->
  @include('partials.client-marquee', ['heading' => 'Trusted by 600+ high-growth companies and global enterprises to engineer mission-critical digital products'])

    <!-- DEMO BOOKING FORM SECTION -->
    <section class="subpage-section" style="padding-top: 20px;">
      <div class="container" style="max-width: 960px;">
        <div class="form-card" data-viewport="true">
          <div class="text-center" style="margin-bottom: 36px;">
            <span class="section-tag">Direct Architect Consultation</span>
            <h2 style="font-size: 2rem; margin-top: 10px; font-weight: 700;">Schedule a 30-Minute Architecture Discovery Call</h2>
            <p style="color: var(--color-gray-600); font-size: 1rem;">Speak directly with a Principal Solutions Architect. No sales fluffâ€”we discuss your tech stack, product goals, and concrete engineering roadmaps.</p>
          </div>

          <form id="bookDemoForm" onsubmit="event.preventDefault(); document.getElementById('demoSuccessMsg').style.display='block'; this.style.display='none';">
            <div class="form-grid-2">
              <div class="form-group">
                <label class="form-label">First Name *</label>
                <input type="text" class="form-control" required placeholder="Alex">
              </div>
              <div class="form-group">
                <label class="form-label">Last Name *</label>
                <input type="text" class="form-control" required placeholder="Taylor">
              </div>
            </div>

            <div class="form-grid-2">
              <div class="form-group">
                <label class="form-label">Work Email *</label>
                <input type="email" class="form-control" required placeholder="alex@company.com">
              </div>
              <div class="form-group">
                <label class="form-label">Company Name *</label>
                <input type="text" class="form-control" required placeholder="Acme Technologies">
              </div>
            </div>

            <div class="form-grid-2">
              <div class="form-group">
                <label class="form-label">Primary Initiative *</label>
                <select class="form-control" required>
                  <option value="">Select Primary Focus...</option>
                  <option value="custom">Custom Web &amp; Cloud Platform Engineering</option>
                  <option value="ai">Autonomous AI Agents &amp; Custom LLMs</option>
                  <option value="mobile">Offline-First Enterprise Mobile App</option>
                  <option value="pod">Dedicated Senior Engineering Pod</option>
                  <option value="modernize">Legacy System &amp; Cloud Migration</option>
                  <option value="integration">Enterprise API Integration &amp; Middleware</option>
                </select>
              </div>
              <div class="form-group">
                <label class="form-label">Estimated Timeline *</label>
                <select class="form-control" required>
                  <option value="immediate">Immediate (Ready to kick off in 2-4 weeks)</option>
                  <option value="quarter">This Quarter (1-3 months)</option>
                  <option value="exploratory">Exploratory / Planning Stage</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label">Tell Us About Your Project &amp; Technical Requirements</label>
              <textarea class="form-control" rows="4" placeholder="Briefly describe what you're looking to build or solve, current tech stack, and any key architectural constraints..."></textarea>
            </div>

            <button type="submit" class="c-btn -primary" style="width: 100%; justify-content: center; margin-top: 12px;">
              <span class="c-btn__txt">Confirm Discovery Call</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </button>
          </form>

          <div id="demoSuccessMsg" style="display:none; text-align:center; padding: 40px 20px;">
            <div style="width: 64px; height: 64px; background: rgba(255, 158, 51, 0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
              <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#FF9E33" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
            </div>
            <h3 style="font-size: 1.6rem; font-weight: 700; margin-bottom: 12px;">Discovery Call Requested</h3>
            <p style="color: var(--color-gray-600); max-width: 520px; margin: 0 auto 24px;">Thank you! A calendar invitation and video link from our Principal Solutions Architect have been sent to your email. We look forward to talking shop.</p>
            <a href="{{ route('home') }}" class="c-btn -secondary"><span class="c-btn__txt">Return to Home</span></a>
          </div>
        </div>
      </div>
    </section>    <!-- FEATURE GRID SECTION -->
    <section class="usecases-section">
      <div class="container">
        <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
          <span class="section-tag">What to Expect on the Call</span>
          <h2 class="section-title">A 30-Minute Architecture Deep Dive</h2>
          <p class="section-subtitle" style="margin: 0 auto;">Here is how we run our technical discovery calls.</p>
        </div>
        <div class="features-grid-3">
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Technical Requirements Review</h3>
            <p class="card-text">We review your functional goals, database schemas, latency targets, and compliance requirements.</p>
          </div>
          <a href="{{ route('products.neptune-dxp') }}" class="c-btn -link">
                    <span class="c-btn__txt">Engineering Standards</span>
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
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">System Architecture Mapping</h3>
            <p class="card-text">Our architect maps out recommended technology choices, cloud components, and API integration paths.</p>
          </div>
          <a href="{{ route('modernization.sap-native') }}" class="c-btn -link">
                    <span class="c-btn__txt">Cloud Architectures</span>
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
              <img src="{{ asset('images/icons/cube.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Sprint Roadmap & Pod Estimates</h3>
            <p class="card-text">We provide preliminary sprint timelines, team composition estimates, and transparent pricing models.</p>
          </div>
          <a href="{{ route('services.professional') }}" class="c-btn -link">
                    <span class="c-btn__txt">Pod Structure</span>
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
            Ready to Architect Your Next Big Initiative?<br><mark>Let's Talk Technical Architecture</mark>.
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
