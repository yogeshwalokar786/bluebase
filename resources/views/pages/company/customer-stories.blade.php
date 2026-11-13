@extends('layouts.app')

@section('title', 'Client Success Stories & Engineering Case Studies | Bluebase')
@section('meta_description', 'Explore real-world software engineering case studies from Bluebase. See how we build custom fleet ERPs, web booking portals, digital event operations, and high-converting marketing engines.')

@push('styles')
<style>
/* ==========================================================================
   CUSTOMER STORIES - MODERN REDESIGN
   ========================================================================== */

/* 1. Hero Section */
.cs-hub-hero {
  padding: 130px 0 60px;
  background: 
    radial-gradient(circle at 85% 15%, rgba(0, 80, 231, 0.07) 0%, transparent 55%),
    radial-gradient(circle at 15% 85%, rgba(56, 189, 248, 0.05) 0%, transparent 50%),
    #ffffff;
  position: relative;
  border-bottom: 1px solid var(--color-gray-200);
}

.cs-hub-badge {
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

.cs-hub-badge::before {
  content: "";
  display: inline-block;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--color-accent);
  box-shadow: 0 0 8px rgba(0, 80, 231, 0.6);
}

.cs-hub-title {
  font-size: clamp(2.4rem, 4.8vw, 3.8rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.12;
  letter-spacing: -0.03em;
  margin-bottom: 20px;
  max-width: 920px;
}

.cs-hub-desc {
  font-size: 1.15rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  max-width: 800px;
  margin-bottom: 34px;
}

/* Category Filter Pills */
.cs-filter-bar {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  margin-top: 24px;
}

.cs-filter-btn {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  padding: 8px 18px;
  border-radius: 9999px;
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-primary);
  cursor: pointer;
  transition: all 0.2s ease;
}

.cs-filter-btn:hover {
  border-color: var(--color-accent);
  color: var(--color-accent);
}

.cs-filter-btn.active {
  background: var(--color-primary);
  color: #ffffff;
  border-color: var(--color-primary);
}

/* Trust Bar */
.cs-trust-strip {
  padding: 30px 0;
  background: #f8fafc;
  border-bottom: 1px solid var(--color-gray-200);
}

.cs-trust-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
}

.cs-trust-item {
  display: flex;
  align-items: center;
  gap: 14px;
}

.cs-trust-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  flex-shrink: 0;
  box-shadow: 0 2px 8px rgba(0,0,0,0.03);
}

.cs-trust-icon svg {
  width: 20px;
  height: 20px;
  fill: currentColor;
}

.cs-trust-text h5 {
  font-size: 0.92rem;
  font-weight: 700;
  color: var(--color-primary);
  margin: 0 0 2px;
}

.cs-trust-text p {
  font-size: 0.78rem;
  color: var(--color-text-muted);
  margin: 0;
}

/* 2. Featured Case Study Spotlight */
.cs-featured-section {
  padding: 70px 0 80px;
  background: #ffffff;
}

.cs-featured-card {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 24px;
  padding: 44px;
  box-shadow: 0 20px 50px rgba(10, 15, 36, 0.05);
  display: grid;
  grid-template-columns: 1.15fr 1fr;
  gap: 50px;
  align-items: center;
  position: relative;
  overflow: hidden;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.cs-featured-card:hover {
  box-shadow: 0 25px 60px rgba(0, 80, 231, 0.09);
}

.cs-featured-card::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #0050e7, #38bdf8);
}

.cs-featured-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 18px;
}

.cs-badge-pill {
  font-size: 0.76rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  padding: 4px 10px;
  border-radius: 6px;
  background: rgba(0, 80, 231, 0.08);
  color: var(--color-accent);
}

.cs-badge-pill.status {
  background: #ecfdf5;
  color: #047857;
  display: inline-flex;
  align-items: center;
  gap: 6px;
}

.cs-badge-pill.status::before {
  content: "";
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #10b981;
}

.cs-featured-title {
  font-size: clamp(1.8rem, 2.8vw, 2.4rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.2;
  letter-spacing: -0.025em;
  margin-bottom: 16px;
}

.cs-featured-title mark {
  background: transparent;
  color: var(--color-accent);
}

.cs-featured-desc {
  font-size: 1.02rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  margin-bottom: 28px;
}

/* Metric Strip inside Featured Card */
.cs-featured-stats {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
  margin-bottom: 32px;
  padding: 18px 20px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
}

.cs-stat-item {
  display: flex;
  flex-direction: column;
}

.cs-stat-num {
  font-size: 1.8rem;
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.1;
  letter-spacing: -0.02em;
}

.cs-stat-num span {
  color: var(--color-accent);
}

.cs-stat-lbl {
  font-size: 0.78rem;
  font-weight: 600;
  color: var(--color-text-muted);
  margin-top: 4px;
}

/* Featured Visual Showcase Box */
.cs-featured-visual {
  position: relative;
  border-radius: 18px;
  overflow: hidden;
  box-shadow: 0 16px 40px rgba(10, 15, 36, 0.1);
  border: 1px solid rgba(0, 0, 0, 0.08);
  background: #0f172a;
}

.cs-featured-visual img {
  width: 100%;
  height: auto;
  display: block;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.cs-featured-card:hover .cs-featured-visual img {
  transform: scale(1.02);
}

/* 3. Curated Case Studies Grid */
.cs-grid-section {
  padding: 70px 0 90px;
  background: #f8fafc;
  border-top: 1px solid var(--color-gray-200);
}

.cs-grid-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 24px;
  flex-wrap: wrap;
  margin-bottom: 44px;
}

.cs-cards-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 32px;
}

.cs-story-card {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(10, 15, 36, 0.04);
  display: flex;
  flex-direction: column;
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}

.cs-story-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 20px 45px rgba(0, 80, 231, 0.08);
  border-color: rgba(0, 80, 231, 0.3);
}

.cs-card-img-wrap {
  position: relative;
  width: 100%;
  aspect-ratio: 16 / 9;
  overflow: hidden;
  background: #0f172a;
}

.cs-card-img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.cs-story-card:hover .cs-card-img-wrap img {
  transform: scale(1.04);
}

.cs-card-tag-floating {
  position: absolute;
  top: 16px;
  left: 16px;
  display: flex;
  gap: 8px;
  z-index: 2;
}

.cs-tag-badge {
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.05em;
  padding: 4px 10px;
  border-radius: 6px;
  background: rgba(15, 23, 42, 0.85);
  backdrop-filter: blur(8px);
  color: #ffffff;
  border: 1px solid rgba(255, 255, 255, 0.15);
}

.cs-card-body {
  padding: 30px 28px;
  display: flex;
  flex-direction: column;
  flex-grow: 1;
}

.cs-card-client-row {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 12px;
}

.cs-card-client-name {
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--color-accent);
  text-transform: uppercase;
  letter-spacing: 0.06em;
}

.cs-card-title {
  font-size: 1.35rem;
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.3;
  margin-bottom: 12px;
  letter-spacing: -0.015em;
}

.cs-card-desc {
  font-size: 0.94rem;
  line-height: 1.6;
  color: var(--color-text-muted);
  margin-bottom: 22px;
  flex-grow: 1;
}

/* Card Stat Badges */
.cs-card-stats-row {
  display: flex;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 24px;
  padding-bottom: 20px;
  border-bottom: 1px solid var(--color-gray-200);
}

.cs-card-stat-pill {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 5px 12px;
  background: #f1f5f9;
  border-radius: 8px;
  font-size: 0.82rem;
  font-weight: 600;
  color: var(--color-primary);
}

.cs-card-stat-pill strong {
  color: var(--color-accent);
  font-weight: 800;
}

.cs-card-footer {
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.cs-read-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 0.92rem;
  font-weight: 700;
  color: var(--color-accent);
  text-decoration: none;
  transition: gap 0.2s ease;
}

.cs-read-link:hover {
  gap: 12px;
}

.cs-read-link svg {
  width: 16px;
  height: 16px;
  fill: currentColor;
}

/* 4. Active Sprints / Upcoming Pipeline Cards */
.cs-pipeline-section {
  padding: 70px 0;
  background: #ffffff;
  border-top: 1px solid var(--color-gray-200);
}

.cs-pipeline-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
  margin-top: 36px;
}

.cs-pipeline-box {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 26px 24px;
  position: relative;
  transition: transform 0.2s ease, border-color 0.2s ease;
}

.cs-pipeline-box:hover {
  transform: translateY(-4px);
  border-color: rgba(0, 80, 231, 0.3);
}

.cs-pipe-status {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  padding: 4px 8px;
  border-radius: 6px;
  background: #fef3c7;
  color: #b45309;
  margin-bottom: 14px;
}

.cs-pipe-status::before {
  content: "";
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: #f59e0b;
}

.cs-pipeline-box h4 {
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 8px;
  line-height: 1.35;
}

.cs-pipeline-box p {
  font-size: 0.88rem;
  line-height: 1.55;
  color: var(--color-text-muted);
  margin-bottom: 16px;
}

.cs-pipe-tags {
  display: flex;
  gap: 6px;
  flex-wrap: wrap;
}

.cs-pipe-tag {
  font-size: 0.74rem;
  font-weight: 600;
  background: #f1f5f9;
  color: #475569;
  padding: 3px 8px;
  border-radius: 5px;
}

/* Responsive Overrides */
@media (max-width: 991px) {
  .cs-featured-card {
    grid-template-columns: 1fr;
    gap: 36px;
    padding: 32px;
  }

  .cs-cards-grid {
    grid-template-columns: 1fr;
    gap: 24px;
  }

  .cs-trust-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 18px;
  }

  .cs-pipeline-grid {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .cs-hub-hero {
    padding: 100px 0 40px;
  }

  .cs-featured-card {
    padding: 24px 20px;
  }

  .cs-featured-stats {
    grid-template-columns: 1fr;
    gap: 12px;
  }

  .cs-trust-grid {
    grid-template-columns: 1fr;
  }

  .cs-card-body {
    padding: 22px 20px;
  }
}
</style>
@endpush

@section('content')
<main id="main-content">

  <!-- ========================================================================
       1. HERO SECTION
       ======================================================================== -->
  <section class="cs-hub-hero">
    <div class="container">
      
      <span class="cs-hub-badge">Verified Engineering Impact</span>
      
      <h1 class="cs-hub-title">
        Real Software &amp; Digital Growth Shipped for <mark>Ambitious Brands</mark>.
      </h1>

      <p class="cs-hub-desc">
        We partner with startup founders and business owners to build high-converting web applications, custom fleet ERPs, and automated digital operations. Every solution is delivered with 100% code ownership and disciplined agile execution.
      </p>

      <div style="display: flex; gap: 14px; align-items: center; flex-wrap: wrap;">
        <a href="#featured-story" class="c-btn -primary" style="padding: 14px 28px;">
          <span class="c-btn__txt">Explore Featured Story</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
        <a href="{{ route('free-trial') }}" class="c-btn -secondary" style="padding: 14px 26px;">
          <span class="c-btn__txt">Request Project Estimate</span>
        </a>
      </div>

      <!-- Quick Filter Pills -->
      <div class="cs-filter-bar">
        <span style="font-size: 0.82rem; font-weight: 700; color: var(--color-text-muted); text-transform: uppercase; letter-spacing: 0.05em; margin-right: 6px;">Filter By:</span>
        <button type="button" class="cs-filter-btn active" data-filter="all">All Case Studies (2)</button>
        <button type="button" class="cs-filter-btn" data-filter="mobility">Mobility &amp; Custom ERP</button>
        <button type="button" class="cs-filter-btn" data-filter="event">Event Tech &amp; Remote Ads</button>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       TRUST STRIP: OUR SPRINT PROMISE
       ======================================================================== -->
  <section class="cs-trust-strip">
    <div class="container">
      <div class="cs-trust-grid">
        
        <div class="cs-trust-item">
          <div class="cs-trust-icon">
            <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          </div>
          <div class="cs-trust-text">
            <h5>100% Code Ownership</h5>
            <p>Direct GitHub repo access from day one</p>
          </div>
        </div>

        <div class="cs-trust-item">
          <div class="cs-trust-icon">
            <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 8h3l-4 5v-4H7l4-5v4z" clip-rule="evenodd"/></svg>
          </div>
          <div class="cs-trust-text">
            <h5>2-Week Agile Sprints</h5>
            <p>Tested milestone builds on live staging</p>
          </div>
        </div>

        <div class="cs-trust-item">
          <div class="cs-trust-icon">
            <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/></svg>
          </div>
          <div class="cs-trust-text">
            <h5>Direct Builder Access</h5>
            <p>Work directly with engineers, zero agency fluff</p>
          </div>
        </div>

        <div class="cs-trust-item">
          <div class="cs-trust-icon">
            <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          </div>
          <div class="cs-trust-text">
            <h5>Managed Reliability</h5>
            <p>24/7 cloud health &amp; continuous updates</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ========================================================================
       2. FEATURED SPOTLIGHT: OMG RENTAL BIKES
       ======================================================================== -->
  <section class="cs-featured-section" id="featured-story">
    <div class="container">
      
      <div style="margin-bottom: 32px;" data-viewport="true">
        <span class="section-tag">Featured Success Story</span>
        <h2 class="section-title">Automating Fleet Operations for <mark>OMG Rental Bikes</mark></h2>
      </div>

      <div class="cs-featured-card" data-viewport="true">
        
        <!-- Left: Story Details -->
        <div>
          <div class="cs-featured-meta">
            <span class="cs-badge-pill">Mobility &amp; Fleet ERP</span>
            <span class="cs-badge-pill status">Live in Production</span>
          </div>

          <h3 class="cs-featured-title">
            Custom Fleet Management ERP, Online Booking Engine &amp; Paperless KYC
          </h3>

          <p class="cs-featured-desc">
            OMG Rental Bikes partnered with Bluebase Technologies to eliminate manual spreadsheets, handwritten KYC contracts, and 25% third-party aggregator commissions. We engineered a real-time web booking engine, custom cloud fleet software with automated PDF rental agreements, and fully manage their #1 local Google Maps ranking.
          </p>

          <!-- 3 Highlight Metrics -->
          <div class="cs-featured-stats">
            <div class="cs-stat-item">
              <div class="cs-stat-num">3.5<span>X</span></div>
              <div class="cs-stat-lbl">Direct Bookings</div>
            </div>
            <div class="cs-stat-item">
              <div class="cs-stat-num">45<span>%</span></div>
              <div class="cs-stat-lbl">Idle Fleet Reduction</div>
            </div>
            <div class="cs-stat-item">
              <div class="cs-stat-num">#<span>1</span></div>
              <div class="cs-stat-lbl">Google Search Rank</div>
            </div>
          </div>

          <!-- CTAs -->
          <div style="display: flex; gap: 14px; align-items: center; flex-wrap: wrap;">
            <a href="{{ route('customer-stories.omg-rental-bikes') }}" class="c-btn -primary" style="padding: 13px 26px;">
              <span class="c-btn__txt">Read In-Depth Case Study</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
            <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" class="c-btn -secondary" style="padding: 13px 22px;">
              <span class="c-btn__txt">Visit Live Website</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
          </div>
        </div>

        <!-- Right: Visual Device Showcase -->
        <div class="cs-featured-visual">
          <img src="{{ asset('images/stories/omg-rental-bikes-brand.png') }}" alt="OMG Rental Bikes Brand Showcase" loading="lazy">
        </div>

      </div>

    </div>
  </section>

  <!-- ========================================================================
       3. CURATED CASE STUDIES GRID
       ======================================================================== -->
  <section class="cs-grid-section">
    <div class="container">
      
      <div class="cs-grid-header" data-viewport="true">
        <div>
          <span class="section-tag">Case Study Catalog</span>
          <h2 class="section-title" style="margin-bottom: 0;">Explore Our Client Deliverables</h2>
        </div>
        <p class="section-subtitle" style="max-width: 500px; margin: 0;">
          Detailed technical breakdowns of client architecture, bottlenecks solved, and measurable outcomes.
        </p>
      </div>

      <div class="cs-cards-grid">
        
        <!-- Case Study Card 1: OMG Rental Bikes -->
        <article class="cs-story-card" data-category="mobility" data-viewport="true">
          <div class="cs-card-img-wrap">
            <img src="{{ asset('images/stories/omg-rental-bikes-brand.png') }}" alt="OMG Rental Bikes Platform" loading="lazy">
            <div class="cs-card-tag-floating">
              <span class="cs-tag-badge">Mobility Startup</span>
              <span class="cs-tag-badge" style="background: rgba(4, 120, 87, 0.9);">100% Managed</span>
            </div>
          </div>

          <div class="cs-card-body">
            <div class="cs-card-client-row">
              <span class="cs-card-client-name">OMG Rental Bikes</span>
              <span style="font-size: 0.78rem; color: var(--color-text-muted);">Fleet ERP &amp; Web</span>
            </div>

            <h3 class="cs-card-title">
              Custom Fleet Management ERP, Online Booking Engine &amp; Local SEO Domination
            </h3>

            <p class="cs-card-desc">
              Engineered a centralized cloud platform replacing paper contracts and manual phone bookings with real-time vehicle dispatch, paperless digital KYC verification, and #1 Google Maps ranking.
            </p>

            <div class="cs-card-stats-row">
              <div class="cs-card-stat-pill"><strong>3.5X</strong> Direct Bookings</div>
              <div class="cs-card-stat-pill"><strong>100%</strong> Digital KYC</div>
              <div class="cs-card-stat-pill"><strong>45%</strong> Idle Drop</div>
            </div>

            <div class="cs-card-footer">
              <a href="{{ route('customer-stories.omg-rental-bikes') }}" class="cs-read-link">
                <span>Read Full Case Study</span>
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </a>
              <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" style="font-size: 0.82rem; color: var(--color-text-muted); text-decoration: underline;">
                omgrentalbikes.com &nearr;
              </a>
            </div>
          </div>
        </article>

        <!-- Case Study Card 2: Aarohi Classic 2024 -->
        <article class="cs-story-card" data-category="event" data-viewport="true">
          <div class="cs-card-img-wrap">
            <img src="{{ asset('images/stories/aarohi-classic-brand.png') }}" alt="Aarohi Classic 2024 Event Digital Operations" loading="lazy">
            <div class="cs-card-tag-floating">
              <span class="cs-tag-badge">Sports &amp; Fitness Event</span>
              <span class="cs-tag-badge" style="background: rgba(29, 78, 216, 0.9);">100% Remote Ops</span>
            </div>
          </div>

          <div class="cs-card-body">
            <div class="cs-card-client-row">
              <span class="cs-card-client-name">Aarohi Classic 2024</span>
              <span style="font-size: 0.78rem; color: var(--color-text-muted);">Remote Digital Marketing</span>
            </div>

            <h3 class="cs-card-title">
              Remote Paid Ads, Social Media Handle Management &amp; WhatsApp Operations
            </h3>

            <p class="cs-card-desc">
              Managed the championship's complete digital workflow 100% remotely: targeted Meta and Google ad campaigns, high-impact social media creatives, online athlete registration intake, and WhatsApp communication.
            </p>

            <div class="cs-card-stats-row">
              <div class="cs-card-stat-pill"><strong>250+</strong> Online Registrations</div>
              <div class="cs-card-stat-pill"><strong>4.2X</strong> Ad ROAS</div>
              <div class="cs-card-stat-pill"><strong>100%</strong> Remote Off-Site</div>
            </div>

            <div class="cs-card-footer">
              <a href="{{ route('customer-stories.aarohi-classic-2024') }}" class="cs-read-link">
                <span>Read Full Case Study</span>
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </a>
              <span style="font-size: 0.82rem; color: var(--color-text-muted);">
                Championship 2024
              </span>
            </div>
          </div>
        </article>

      </div>

    </div>
  </section>

  <!-- ========================================================================
       4. IN-PROGRESS PIPELINE / ACTIVE SPRINTS
       ======================================================================== -->
  <section class="cs-pipeline-section">
    <div class="container">
      
      <div class="text-center" style="max-width: 760px; margin: 0 auto 36px;" data-viewport="true">
        <span class="section-tag">Active Engineering Pipeline</span>
        <h2 class="section-title">What Our Builders Are Shipping Next</h2>
        <p class="section-subtitle" style="margin: 0 auto;">
          We are actively developing custom software and web platforms for growing businesses. Additional detailed case studies will be published following production deployment.
        </p>
      </div>

      <div class="cs-pipeline-grid" data-viewport="true">
        
        <div class="cs-pipeline-box">
          <span class="cs-pipe-status">Sprint in Progress</span>
          <h4>Multi-Branch Warehouse Logistics Portal</h4>
          <p>Real-time inventory transfer dispatch, automated barcode scanning, and multi-location reorder forecasting.</p>
          <div class="cs-pipe-tags">
            <span class="cs-pipe-tag">Laravel</span>
            <span class="cs-pipe-tag">Vue.js</span>
            <span class="cs-pipe-tag">REST APIs</span>
          </div>
        </div>

        <div class="cs-pipeline-box">
          <span class="cs-pipe-status">Sprint in Progress</span>
          <h4>B2B SaaS Analytics &amp; Billing Engine</h4>
          <p>Role-based multi-tenant customer dashboard, stripe subscription webhooks, and automated PDF tax invoices.</p>
          <div class="cs-pipe-tags">
            <span class="cs-pipe-tag">SaaS Architecture</span>
            <span class="cs-pipe-tag">Tailwind</span>
            <span class="cs-pipe-tag">PostgreSQL</span>
          </div>
        </div>

        <div class="cs-pipeline-box">
          <span class="cs-pipe-status">Sprint in Progress</span>
          <h4>High-Performance Direct E-Commerce Store</h4>
          <p>Ultra-fast headless online shop with sub-second page loads, custom cart drawer, and UPI one-click checkout.</p>
          <div class="cs-pipe-tags">
            <span class="cs-pipe-tag">E-Commerce</span>
            <span class="cs-pipe-tag">Speed Opt</span>
            <span class="cs-pipe-tag">Razorpay</span>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ========================================================================
       5. FAQ ACCORDION SECTION
       ======================================================================== -->
  <section class="faq-section" style="border-top: 1px solid var(--color-gray-200);">
    <div class="container">
      <div class="faq-layout">
        <div class="faq-left" data-viewport="true">
          <span class="section-tag">FAQ</span>
          <h2 class="section-title">Frequently Asked <mark>Questions</mark></h2>
          <p class="section-subtitle">Everything you need to know about our sprint model, code ownership, and managed engineering partnerships.</p>
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
                  <p>You own 100% of all intellectual property, source code, database schemas, and creative assets from day one. Everything is committed directly to your private GitHub or GitLab repository with zero vendor lock-in.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-2" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How does your 2-week sprint milestone model work?</span>
                <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>We work in disciplined 2-week agile sprints. Before each sprint begins, we define explicit deliverables and acceptance criteria. You test working software on live staging environments and only approve milestone payments as deliverables are verified.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-3" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>Can Bluebase manage our platform after launch?</span>
                <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Yes. As demonstrated with OMG Rental Bikes, we offer ongoing managed partnerships where our engineering team handles 24/7 server monitoring, security patches, regular backups, and feature rollouts so you never have to hire an in-house DevOps team.</p>
                </div>
              </div>
            </div>

            <div class="accordion-item stagger-4" data-viewport="true">
              <button class="accordion-trigger" aria-expanded="false">
                <span>How quickly can an engineering team start?</span>
                <div class="accordion-icon"><svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg></div>
              </button>
              <div class="accordion-content">
                <div class="accordion-inner">
                  <p>Following a free technical discovery consultation, our senior builders assemble your architecture roadmap and begin shipping production code in as little as 5 to 7 business days.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ========================================================================
       6. CLOSING CTA BANNER
       ======================================================================== -->
  <section class="cta-banner-section">
    <div class="container">
      <div class="cta-banner-box" data-viewport="true">
        <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="cta-banner-bg" aria-hidden="true">
        <div class="cta-banner-content">
          <h2 class="cta-banner-title stagger-1" data-viewport="true">
            Ready to Build Your Next Product?<br><mark>Partner with Bluebase Engineering</mark>.
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

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  var filterBtns = document.querySelectorAll('.cs-filter-btn');
  var storyCards = document.querySelectorAll('.cs-story-card');

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      var filter = this.getAttribute('data-filter');

      filterBtns.forEach(function (b) { b.classList.remove('active'); });
      this.classList.add('active');

      storyCards.forEach(function (card) {
        if (filter === 'all' || card.getAttribute('data-category') === filter) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
});
</script>
@endpush
@endsection
