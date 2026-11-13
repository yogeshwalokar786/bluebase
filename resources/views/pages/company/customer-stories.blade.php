@extends('layouts.app')

@section('title', 'Client Success Stories & Engineering Impact | Bluebase')
@section('meta_description', 'Discover how Bluebase partners with ambitious founders to engineer custom web booking engines, mobile apps, and fleet ERP software—scaling revenue and automating operations.')

@push('styles')
<style>
/* ==========================================================================
   CUSTOMER STORIES SPOTLIGHT STYLING
   ========================================================================== */
.stories-hero {
  padding: 120px 0 60px;
  background: radial-gradient(circle at 80% 20%, rgba(0, 80, 231, 0.05) 0%, transparent 60%), #ffffff;
  position: relative;
  border-bottom: 1px solid var(--color-gray-200);
}

.stories-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 14px;
  border-radius: 9999px;
  background: rgba(0, 80, 231, 0.08);
  border: 1px solid rgba(0, 80, 231, 0.2);
  color: var(--color-accent);
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: 20px;
}

.stories-badge::before {
  content: "";
  display: inline-block;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--color-accent);
  box-shadow: 0 0 8px rgba(0, 80, 231, 0.6);
}

.stories-hero-title {
  font-size: clamp(2.3rem, 4.5vw, 3.6rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.15;
  letter-spacing: -0.025em;
  margin-bottom: 20px;
  max-width: 900px;
}

.stories-hero-desc {
  font-size: 1.15rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  max-width: 820px;
  margin-bottom: 34px;
}

/* OMG Rental Bikes Featured Master Card */
.story-spotlight-section {
  padding: 80px 0;
  background: #ffffff;
}

.story-spotlight-card {
  background: linear-gradient(150deg, #ffffff 0%, #f8fafc 100%);
  border: 1px solid rgba(0, 80, 231, 0.18);
  border-radius: 24px;
  padding: 48px;
  box-shadow: 0 20px 50px rgba(10, 15, 36, 0.06);
  position: relative;
  overflow: hidden;
  margin-bottom: 50px;
}

.story-spotlight-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #0050e7 0%, #38bdf8 100%);
}

.story-card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
  flex-wrap: wrap;
  margin-bottom: 30px;
  padding-bottom: 24px;
  border-bottom: 1px solid var(--color-gray-200);
}

.story-brand-info {
  display: flex;
  align-items: center;
  gap: 20px;
}

.story-logo-container {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 14px;
  padding: 12px 20px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
}

.story-logo-container img {
  height: 44px;
  width: auto;
  object-fit: contain;
}

.story-brand-text h3 {
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 6px;
}

.story-pills {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.story-pill {
  font-size: 0.78rem;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 6px;
  background: var(--color-gray-100);
  color: var(--color-text-muted);
}

.story-pill.highlight {
  background: #ecfdf5;
  color: #047857;
  font-weight: 700;
}

.story-headline {
  font-size: clamp(1.6rem, 2.8vw, 2.2rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.25;
  margin-bottom: 16px;
  letter-spacing: -0.02em;
}

.story-summary-text {
  font-size: 1.05rem;
  line-height: 1.7;
  color: var(--color-text-muted);
  max-width: 860px;
  margin-bottom: 36px;
}

/* 4 Metrics Highlight Grid */
.story-metrics-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 40px;
}

.story-metric-item {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 24px 20px;
  box-shadow: 0 4px 14px rgba(10, 15, 36, 0.02);
  transition: transform 0.2s ease, border-color 0.2s ease;
}

.story-metric-item:hover {
  transform: translateY(-3px);
  border-color: rgba(0, 80, 231, 0.3);
}

.story-metric-val {
  font-size: clamp(2rem, 3vw, 2.6rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1;
  margin-bottom: 8px;
  letter-spacing: -0.03em;
}

.story-metric-val span {
  color: var(--color-accent);
}

.story-metric-lbl {
  font-size: 0.92rem;
  font-weight: 600;
  color: var(--color-primary);
  margin-bottom: 4px;
}

.story-metric-sub {
  font-size: 0.8rem;
  color: var(--color-text-muted);
  line-height: 1.4;
  margin: 0;
}

/* Action Buttons inside Card */
.story-card-actions {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
}

/* Pipeline Note Card */
.pipeline-card {
  background: #f8fafc;
  border: 1px solid var(--color-gray-200);
  border-radius: 20px;
  padding: 36px 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 30px;
  flex-wrap: wrap;
}

.pipeline-content h4 {
  font-size: 1.3rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 8px;
}

.pipeline-content p {
  font-size: 0.95rem;
  line-height: 1.6;
  color: var(--color-text-muted);
  max-width: 680px;
  margin: 0;
}

/* Hero Badges on Light Hero */
.stories-hero .hero-badges {
  display: flex !important;
  justify-content: flex-start !important;
  gap: 12px !important;
  flex-wrap: wrap !important;
  margin-top: 14px !important;
}

.stories-hero .hero-badge-item {
  display: inline-flex !important;
  align-items: center !important;
  gap: 8px !important;
  background: #f8fafc !important;
  border: 1px solid #e2e8f0 !important;
  border-radius: 9999px !important;
  color: #1e293b !important;
  font-weight: 600 !important;
  font-size: 0.88rem !important;
  padding: 8px 18px !important;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03) !important;
  transition: all 0.2s ease !important;
}

.stories-hero .hero-badge-item::before {
  content: "" !important;
  display: inline-block !important;
  width: 7px !important;
  height: 7px !important;
  border-radius: 50% !important;
  background: #0050e7 !important;
  box-shadow: 0 0 6px rgba(0, 80, 231, 0.6) !important;
}

.stories-hero .hero-badge-item:hover {
  background: #ffffff !important;
  border-color: rgba(0, 80, 231, 0.3) !important;
  color: #0050e7 !important;
  transform: translateY(-2px) !important;
}

/* Responsive */
@media (max-width: 991px) {
  .story-spotlight-card {
    padding: 32px 24px;
  }

  .story-metrics-row {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .stories-hero {
    padding: 100px 0 40px;
  }

  .story-card-header {
    flex-direction: column;
    align-items: flex-start;
  }

  .story-card-actions {
    width: 100%;
  }

  .story-card-actions .c-btn {
    width: 100%;
    justify-content: center;
  }

  .story-metrics-row {
    grid-template-columns: 1fr;
    gap: 12px;
  }

  .pipeline-card {
    padding: 24px 20px;
    flex-direction: column;
    align-items: flex-start;
  }

  .pipeline-card .c-btn {
    width: 100%;
    justify-content: center;
  }
}
</style>
@endpush

@section('content')
<main id="main-content">

  <!-- ========================================================================
       HERO SECTION
       ======================================================================== -->
  <section class="stories-hero">
    <div class="container">
      
      <span class="stories-badge">Client Success &amp; Transformation</span>
      
      <h1 class="stories-hero-title">
        Real-World Engineering Impact for <mark>Ambitious Startups</mark>.
      </h1>

      <p class="stories-hero-desc">
        We partner with startup founders and growing brands to design, engineer, and fully manage their core digital operating systems—from custom web booking portals and cloud ERPs to local search domination.
      </p>

      <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap; margin-bottom: 34px;">
        <a href="#featured-success" class="c-btn -primary" style="padding: 14px 30px;">
          <span class="c-btn__txt">View Featured Case Study</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
        <a href="{{ route('free-trial') }}" class="c-btn -secondary" style="padding: 14px 28px;">
          <span class="c-btn__txt">Get Free Project Estimate</span>
        </a>
      </div>

      <div class="hero-badges" style="margin-top: 14px;">
        <div class="hero-badge-item">100% Client Code Ownership</div>
        <div class="hero-badge-item">Fully Managed Tech Infrastructure</div>
        <div class="hero-badge-item">Direct Builder Collaboration</div>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       FEATURED CLIENT SPOTLIGHT: OMG RENTAL BIKES
       ======================================================================== -->
  <section class="story-spotlight-section" id="featured-success">
    <div class="container">
      
      <div class="text-center" style="max-width: 800px; margin: 0 auto 48px;" data-viewport="true">
        <span class="section-tag">Featured Success Story</span>
        <h2 class="section-title">From Manual Spreadsheets to an Automated Fleet Engine</h2>
        <p class="section-subtitle" style="margin: 0 auto;">How Bluebase engineered a complete digital operating system for OMG Rental Bikes.</p>
      </div>

      <!-- Spotlight Card -->
      <div class="story-spotlight-card" data-viewport="true">
        
        <!-- Brand Header Bar -->
        <div class="story-card-header">
          <div class="story-brand-info">
            <div class="story-logo-container">
              <img src="{{ asset('images/stories/omg-rental-bikes-brand.png') }}" alt="OMG Rental Bikes Logo">
            </div>
            <div class="story-brand-text">
              <h3>OMG Rental Bikes</h3>
              <div class="story-pills">
                <span class="story-pill">Two-Wheeler Mobility</span>
                <span class="story-pill">Custom Fleet ERP</span>
                <span class="story-pill highlight">100% Fully Managed by Bluebase</span>
              </div>
            </div>
          </div>

          <div>
            <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" style="font-size: 0.92rem; color: var(--color-accent); font-weight: 600; text-decoration: underline;">
              omgrentalbikes.com &nearr;
            </a>
          </div>
        </div>

        <!-- Headline & Description -->
        <h2 class="story-headline">
          Custom Fleet Management ERP, Online Booking Portal &amp; Local Search Domination
        </h2>

        <p class="story-summary-text">
          OMG Rental Bikes partnered with Bluebase to replace paper contracts, physical ID photocopying, and double-booking headaches with a modern, cloud-based fleet operations ecosystem. We engineered their high-converting web booking portal at omgrentalbikes.com, custom fleet management software with paperless digital KYC, and fully manage their #1 ranking Google Business Profile and social growth marketing.
        </p>

        <!-- 4 Verified Result Metrics -->
        <div class="story-metrics-row">
          <div class="story-metric-item">
            <div class="story-metric-val">3.5<span>X</span></div>
            <div class="story-metric-lbl">Direct Online Bookings</div>
            <p class="story-metric-sub">Direct reservations increased significantly, reducing reliance on 25% third-party aggregator commissions.</p>
          </div>

          <div class="story-metric-item">
            <div class="story-metric-val">45<span>%</span></div>
            <div class="story-metric-lbl">Idle Fleet Reduction</div>
            <p class="story-metric-sub">Live vehicle inventory tracking eliminated double-bookings and minimized vehicle idle time across hubs.</p>
          </div>

          <div class="story-metric-item">
            <div class="story-metric-val">#<span>1</span></div>
            <div class="story-metric-lbl">Google Maps Search Rank</div>
            <p class="story-metric-sub">Secured top position on Google Maps and organic local queries for primary city bike rental keywords.</p>
          </div>

          <div class="story-metric-item">
            <div class="story-metric-val">100<span>%</span></div>
            <div class="story-metric-lbl">Paperless Digital KYC</div>
            <p class="story-metric-sub">Instant mobile driving license upload and digital signature generating PDF agreements in under 60 seconds.</p>
          </div>
        </div>

        <!-- Card CTA Actions -->
        <div class="story-card-actions">
          <a href="{{ route('customer-stories.omg-rental-bikes') }}" class="c-btn -primary" style="padding: 14px 28px;">
            <span class="c-btn__txt">Read In-Depth Case Study</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" class="c-btn -secondary" style="padding: 14px 24px;">
            <span class="c-btn__txt">Visit Live Website</span>
          </a>
          <a href="{{ route('contact') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
            Build Your Startup Platform &rarr;
          </a>
        </div>

      </div>

      <!-- Spotlight Card 2: Aarohi Classic 2024 -->
      <div class="story-spotlight-card" data-viewport="true" style="margin-top: 48px;">
        
        <!-- Brand Header Bar -->
        <div class="story-card-header">
          <div class="story-brand-info">
            <div class="story-logo-container" style="background: #0f172a; padding: 10px 16px;">
              <img src="{{ asset('images/stories/aarohi-classic-brand.png') }}" alt="Aarohi Classic 2024 Banner">
            </div>
            <div class="story-brand-text">
              <h3>Aarohi Classic 2024</h3>
              <div class="story-pills">
                <span class="story-pill">Sports &amp; Fitness Championship</span>
                <span class="story-pill">Digital Event Tech &amp; Ads</span>
                <span class="story-pill highlight">100% Managed by Bluebase</span>
              </div>
            </div>
          </div>

          <div>
            <span style="font-size: 0.85rem; color: var(--color-text-muted); font-weight: 600;">
              Championship Event Tech
            </span>
          </div>
        </div>

        <!-- Headline & Description -->
        <h2 class="story-headline">
          Online Athlete Registrations, Performance Ads &amp; WhatsApp Operations
        </h2>

        <p class="story-summary-text">
          Aarohi Classic partnered with Bluebase Technologies to handle their complete event workflow: targeted Meta and Google advertising funnels, official social media handle creatives, an online athlete registration portal with instant QR e-passes, and automated weigh-in and stage call notifications via WhatsApp Business API.
        </p>

        <!-- 4 Verified Result Metrics -->
        <div class="story-metrics-row">
          <div class="story-metric-item">
            <div class="story-metric-val">250<span>+</span></div>
            <div class="story-metric-lbl">Registrations Handled</div>
            <p class="story-metric-sub">Seamless digital registration of competing athletes and attendee passes with zero paperwork.</p>
          </div>

          <div class="story-metric-item">
            <div class="story-metric-val">4.2<span>X</span></div>
            <div class="story-metric-lbl">Return On Ad Spend (ROAS)</div>
            <p class="story-metric-sub">Targeted Meta and Google ad campaigns driving local athlete signups and event passes.</p>
          </div>

          <div class="story-metric-item">
            <div class="story-metric-val">100<span>%</span></div>
            <div class="story-metric-lbl">WhatsApp Broadcast Delivery</div>
            <p class="story-metric-sub">Instant automated alerts for official weigh-in time slots, rule sheets, and backstage calls.</p>
          </div>

          <div class="story-metric-item">
            <div class="story-metric-val">Zero</div>
            <div class="story-metric-lbl">Paper Entry Confusion</div>
            <p class="story-metric-sub">Paperless digital QR e-pass scanning cleared athlete entry and attendee queues in seconds.</p>
          </div>
        </div>

        <!-- Card CTA Actions -->
        <div class="story-card-actions">
          <a href="{{ route('customer-stories.aarohi-classic-2024') }}" class="c-btn -primary" style="padding: 14px 28px;">
            <span class="c-btn__txt">Read In-Depth Case Study</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('contact') }}" class="c-btn -secondary" style="padding: 14px 24px;">
            <span class="c-btn__txt">Power Your Next Event</span>
          </a>
          <a href="{{ route('contact') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
            Schedule Tech Discovery &rarr;
          </a>
        </div>

      </div>

      <!-- Active Sprints / Upcoming Pipeline Card -->
      <div class="pipeline-card" data-viewport="true">
        <div class="pipeline-content">
          <span class="section-tag" style="margin-bottom: 8px;">Active Sprints</span>
          <h4>More Client Projects Shipped in 2-Week Sprints</h4>
          <p>
            We are actively engineering custom web applications, mobile platforms, and business automation software for growing startups across logistics, e-commerce, and SaaS. Additional detailed client case studies are currently being documented and will be published following their public launch.
          </p>
        </div>
        <div>
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 12px 26px; white-space: nowrap;">
            <span class="c-btn__txt">Start Your Project</span>
          </a>
        </div>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       FAQ ACCORDION SECTION
       ======================================================================== -->
  <section class="faq-section" style="border-top: 1px solid var(--color-gray-200);">
    <div class="container">
      <div class="faq-layout">
        <div class="faq-left" data-viewport="true">
          <span class="section-tag">FAQ</span>
          <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
          <p class="section-subtitle">Everything you need to know about our engineering pod model, code ownership, and sprint delivery.</p>
        </div>
        <div class="faq-right">
          <div class="accordion-list">
            <div class="accordion-item open stagger-1" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="true">
                <span>Who owns the intellectual property and source code?</span>
                <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>You own 100% of all intellectual property, source code, database schemas, and design assets from day one. Everything is committed directly to your private GitHub/GitLab repositories with zero vendor lock-in or ongoing royalty fees.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-2" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How does your sprint milestone model work?</span>
                <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>We work in disciplined 2-week agile sprints. Before each sprint begins, we define explicit deliverables and acceptance criteria. You test working software on live staging links and only pay as milestones are verified.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-3" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>Do you offer post-launch maintenance and managed support?</span>
                <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Yes. As demonstrated with OMG Rental Bikes, we offer fully managed technology partnerships where we monitor server health 24/7, deploy security patches, handle automated backups, and roll out feature updates so founders never worry about in-house IT overhead.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-4" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How fast can an engineering pod begin?</span>
                <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Following an initial discovery scoping session, our senior builders assemble your architecture roadmap and begin shipping production-ready code in as little as 1 week.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================================
       CLOSING CTA BANNER
       ======================================================================== -->
  <section class="cta-banner-section">
    <div class="container">
      <div class="cta-banner-box" data-viewport="true">
        <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="cta-banner-bg" aria-hidden="true">
        <div class="cta-banner-content">
          <h2 class="cta-banner-title stagger-1" data-viewport="true">
            Ready to Build Your Startup's Next Move?<br><mark>Partner with Bluebase Engineering</mark>.
          </h2>
          <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
            <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
              <span class="c-btn__txt">Start Your Project</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
            <a href="{{ route('free-trial') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
              <span class="c-btn__txt">Request Project Estimate</span>
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

</main>
@endsection
