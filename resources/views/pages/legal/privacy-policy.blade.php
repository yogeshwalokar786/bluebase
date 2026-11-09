@extends('layouts.app')

@section('title', 'Privacy Policy | Bluebase Technologies Inc.')
@section('meta_description', 'Bluebase')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Legal & Data Protection</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Transparency &amp; Privacy at <mark>Bluebase</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          We respect your privacy and protect your personal information with enterprise-grade security standards and full regulatory compliance.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="{{ route('contact') }}" class="c-btn -primary">
                    <span class="c-btn__txt">Contact Privacy Officer</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('compliance-security') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">View Security Standards</span>
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
          <div class="hero-badge-item">GDPR Compliant</div><div class="hero-badge-item">CCPA Aligned</div><div class="hero-badge-item">Strict Data Minimization</div>
        </div>
      </div>
    </section>

  <!-- CLIENT LOGO MARQUEE -->
  @include('partials.client-marquee', ['heading' => 'Trusted by 600+ high-growth companies and global enterprises to engineer mission-critical digital products'])

    <!-- LEGAL CONTENT SECTION -->
    <section class="subpage-section" style="padding-top: 30px;">
      <div class="container" style="max-width: 860px; line-height: 1.75; color: var(--color-gray-700);">
        
        <div style="background: #fff; padding: 48px; border-radius: 16px; border: 1px solid var(--color-gray-200); box-shadow: 0 4px 20px rgba(0,0,0,0.03);" data-viewport="true">
          <p style="font-size: 0.9rem; color: var(--color-gray-500); margin-bottom: 24px;">Last Updated: October 31, 2026</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">1. Introduction &amp; Commitment</h2>
          <p>Bluebase Technologies Inc. ("Bluebase", "we", "our", or "us") is dedicated to safeguarding your privacy and protecting the confidentiality of your personal and corporate information. This Privacy Policy outlines our transparent policies regarding the collection, use, disclosure, and protection of information obtained through our website (bluebase.tech), software engineering services, client collaboration portals, and communications.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">2. Information We Collect</h2>
          <p>We collect information only where necessary to provide you with top-tier digital engineering, consulting, and AI services. This includes:</p>
          <ul style="padding-left: 24px; margin-bottom: 16px;">
            <li><strong>Contact Information:</strong> Names, corporate email addresses, phone numbers, and company affiliations submitted via our discovery call or proposal forms.</li>
            <li><strong>Project Specifications:</strong> Technical requirements, project briefs, architectural constraints, and budget expectations provided during project scoping.</li>
            <li><strong>Technical &amp; Telemetry Data:</strong> IP addresses, browser types, operating systems, and anonymous navigation patterns collected via essential first-party cookies for website security and performance.</li>
          </ul>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">3. How We Use Your Information</h2>
          <p>Information gathered by Bluebase is strictly utilized to:</p>
          <ul style="padding-left: 24px; margin-bottom: 16px;">
            <li>Prepare detailed architectural proposals, scope project timelines, and schedule technical discovery sessions.</li>
            <li>Deliver and manage our contracted software engineering, cloud architecture, and AI development services.</li>
            <li>Enforce enterprise security protocols, prevent fraudulent activity, and comply with legal and regulatory mandates.</li>
          </ul>
          <p><strong>We never sell, rent, or trade your personal or corporate data to third-party advertisers or data brokers.</strong></p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">4. Client IP &amp; Proprietary Code Isolation</h2>
          <p>All source code, proprietary algorithms, data models, and documentation created during our client engineering engagements are maintained in isolated client-owned repositories. Our engineers adhere to strict multi-factor authentication, air-gapped secret management, and non-disclosure agreements.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">5. International Data Transfers &amp; GDPR / CCPA Rights</h2>
          <p>Bluebase complies with the General Data Protection Regulation (GDPR) and California Consumer Privacy Act (CCPA). European and California residents retain the right to access, rectify, port, or erase their personal data from our operational systems at any time by contacting privacy@bluebase.tech.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">6. Data Retention &amp; Security</h2>
          <p>We maintain enterprise-grade physical, technical, and administrative controls (SOC 2 Type II certified) to prevent unauthorized access or disclosure. Information is retained only as long as necessary to fulfill the purposes of engagement or comply with legal audit requirements.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">7. Contact Our Data Protection Officer</h2>
          <p>If you have questions, inquiries, or requests regarding this Privacy Policy or your data rights, please reach out to our Data Protection Office at <strong>privacy@bluebase.tech</strong> or write to: Bluebase Technologies Inc., Attn: Privacy Office, 535 Mission Street, 14th Floor, San Francisco, CA 94105.</p>
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
            Have Questions About Data Privacy?<br><mark>Our Security Team is Here to Help</mark>.
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
