@extends('layouts.app')

@section('title', 'Terms of Service & MSA | Bluebase Technologies Inc.')
@section('meta_description', 'Master Services Agreement, terms of service, engagement models, and intellectual property ownership provisions for Bluebase engineering clients.')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Legal Agreements</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Terms of Service &amp; <mark>Master Services Agreement</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          Clear, fair, and transparent contractual terms governing our digital engineering engagements and client intellectual property.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="{{ route('free-trial') }}" class="c-btn -primary">
                    <span class="c-btn__txt">Request Custom SOW</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('contact') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Contact Legal Team</span>
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
          <div class="hero-badge-item">100% Client-Owned IP</div><div class="hero-badge-item">Transparent Terms</div><div class="hero-badge-item">Mutual Non-Disclosure</div>
        </div>
      </div>
    </section>

  <!-- CLIENT LOGO MARQUEE -->
  @include('partials.client-marquee', ['heading' => 'Trusted by 600+ high-growth companies and global enterprises to engineer mission-critical digital products'])

    <!-- MSA TERMS CONTENT SECTION -->
    <section class="subpage-section" style="padding-top: 30px;">
      <div class="container" style="max-width: 860px; line-height: 1.75; color: var(--color-gray-700);">
        
        <div style="background: #fff; padding: 48px; border-radius: 16px; border: 1px solid var(--color-gray-200); box-shadow: 0 4px 20px rgba(0,0,0,0.03);" data-viewport="true">
          <p style="font-size: 0.9rem; color: var(--color-gray-500); margin-bottom: 24px;">Effective Date: October 31, 2026</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">1. Agreement to Terms</h2>
          <p>These Terms of Service and Master Services Agreement ("Terms") constitute a legally binding agreement between you or the entity you represent ("Client") and Bluebase Technologies Inc. ("Bluebase"). By accessing our website, engaging our dedicated engineering pods, or executing a Statement of Work (SOW), you agree to be bound by these Terms.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">2. Engineering Services &amp; SOWs</h2>
          <p>Bluebase provides custom digital engineering, autonomous AI development, cloud architecture modernization, and dedicated engineering squad services. The specific scope, timeline, deliverables, milestones, and pricing for any engagement shall be defined in one or more mutually executed Statements of Work (SOW) referencing these Terms.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">3. Intellectual Property Ownership (100% Client-Owned)</h2>
          <p><strong>You own your product.</strong> Upon full payment of applicable fees under an SOW, Client is the exclusive owner of all rights, title, and interest in and to all deliverables, custom source code, documentation, UI designs, and database schemas created specifically for Client during the engagement ("Client IP"). Bluebase assigns all right, title, and interest in Client IP to Client without restriction or ongoing royalty fees.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">4. Confidentiality &amp; Non-Disclosure</h2>
          <p>Each party agrees to hold the other party's confidential technical, operational, and financial information in strict confidence, using at least the same degree of care it uses for its own sensitive data (and never less than reasonable care). Confidential Information will not be disclosed to any third party without prior written consent.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">5. Fees, Invoicing &amp; Payment Terms</h2>
          <p>Client agrees to pay all fees set forth in the applicable SOW. Invoices for dedicated engineering pods are billed on a bi-weekly or monthly sprint cycle and are payable within thirty (30) days of invoice date unless otherwise specified in the SOW.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">6. Warranties &amp; Engineering Standards</h2>
          <p>Bluebase warrants that all services will be executed in a professional, workmanlike manner adhering to modern software engineering best practices, industry cybersecurity standards, and the specifications outlined in the SOW. We provide a thirty (30) day defect remediation warranty following the final acceptance of each sprint deliverable.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">7. Limitation of Liability</h2>
          <p>Except for breaches of confidentiality or gross negligence, neither party will be liable for any indirect, consequential, or punitive damages. Total aggregate liability under any SOW will not exceed the total fees paid by Client to Bluebase under that specific SOW in the twelve (12) months preceding the claim.</p>

          <h2 style="font-size: 1.5rem; font-weight: 700; color: #38112a; margin-top: 32px; margin-bottom: 12px;">8. Governing Law &amp; Jurisdiction</h2>
          <p>These Terms and any SOW shall be governed by and construed in accordance with the laws of the State of California, without regard to its conflict of laws principles. The parties submit to the exclusive jurisdiction of the state and federal courts located in San Francisco County, California.</p>
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
            Ready to Partner with Clear, Fair Contractual Terms?<br><mark>Let's Build Together</mark>.
          </h2>
          <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
            <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
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
