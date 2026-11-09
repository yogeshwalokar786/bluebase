@extends('layouts.app')

@section('title', 'OMG Rental Bikes Case Study | Custom Fleet ERP & Growth Engine | Bluebase')
@section('meta_description', 'Discover how Bluebase engineered a custom fleet management ERP, high-converting booking portal, and digital growth engine for OMG Rental Bikes, scaling direct bookings by 3.5X with 100% managed infrastructure.')

@push('styles')
<style>
/* ==========================================================================
   CASE STUDY: OMG RENTAL BIKES SPECIFIC STYLING
   ========================================================================== */
.cs-hero {
  padding: 130px 0 60px;
  background: radial-gradient(circle at 85% 15%, rgba(0, 80, 231, 0.06) 0%, transparent 60%), #ffffff;
  position: relative;
  border-bottom: 1px solid var(--color-gray-200);
}

.cs-breadcrumbs {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.85rem;
  color: var(--color-text-muted);
  margin-bottom: 20px;
}

.cs-breadcrumbs a {
  color: var(--color-primary);
  text-decoration: none;
  transition: color 0.2s ease;
}

.cs-breadcrumbs a:hover {
  color: var(--color-accent);
}

.cs-hero-badge {
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

.cs-hero-badge::before {
  content: "";
  display: inline-block;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--color-accent);
  box-shadow: 0 0 8px rgba(0, 80, 231, 0.6);
}

.cs-hero-title {
  font-size: clamp(2.2rem, 4.5vw, 3.6rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.15;
  letter-spacing: -0.025em;
  margin-bottom: 20px;
  max-width: 980px;
}

.cs-hero-desc {
  font-size: 1.15rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  max-width: 860px;
  margin-bottom: 34px;
}

/* Client Identity Spotlight Header */
.cs-client-card {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 18px;
  padding: 24px 32px;
  box-shadow: 0 12px 35px rgba(10, 15, 36, 0.05);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 28px;
  flex-wrap: wrap;
  margin-bottom: 50px;
}

.cs-client-info {
  display: flex;
  align-items: center;
  gap: 22px;
}

.cs-client-logo-box {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 12px;
  padding: 12px 18px;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.03);
}

.cs-client-logo-box img {
  height: 48px;
  width: auto;
  object-fit: contain;
}

.cs-client-details h4 {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 6px;
}

.cs-client-tags {
  display: flex;
  gap: 8px;
  flex-wrap: wrap;
}

.cs-tag-pill {
  font-size: 0.78rem;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 6px;
  background: var(--color-gray-100);
  color: var(--color-text-muted);
}

.cs-tag-pill.managed {
  background: #ecfdf5;
  color: #047857;
  font-weight: 700;
}

.cs-client-actions {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}

/* Metric Highlights Grid */
.cs-metrics-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  margin-bottom: 60px;
}

.cs-metric-box {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 28px 24px;
  position: relative;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(10, 15, 36, 0.03);
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}

.cs-metric-box:hover {
  transform: translateY(-4px);
  box-shadow: 0 16px 36px rgba(0, 80, 231, 0.08);
  border-color: rgba(0, 80, 231, 0.25);
}

.cs-metric-box::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(90deg, #0050e7, #38bdf8);
}

.cs-metric-num {
  font-size: clamp(2.4rem, 3.5vw, 3.2rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1;
  margin-bottom: 10px;
  letter-spacing: -0.03em;
  display: flex;
  align-items: baseline;
}

.cs-metric-num span.accent {
  color: var(--color-accent);
}

.cs-metric-title {
  font-size: 0.96rem;
  font-weight: 600;
  color: var(--color-primary);
  margin-bottom: 6px;
  line-height: 1.35;
}

.cs-metric-desc {
  font-size: 0.84rem;
  color: var(--color-text-muted);
  line-height: 1.5;
  margin: 0;
}

/* Main Two-Column Story Layout */
.cs-story-section {
  padding: 80px 0;
  background: #ffffff;
}

.cs-story-layout {
  display: grid;
  grid-template-columns: 1fr 340px;
  gap: 60px;
  align-items: start;
}

.cs-story-body {
  max-width: 780px;
}

.cs-section-header {
  margin-bottom: 28px;
}

.cs-section-header h2 {
  font-size: 1.95rem;
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.25;
  margin-bottom: 14px;
}

.cs-section-header p {
  font-size: 1.05rem;
  line-height: 1.7;
  color: var(--color-text-muted);
}

/* Challenge / Problem Cards */
.cs-challenge-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
  margin: 32px 0 54px;
}

.cs-challenge-card {
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  border-radius: 14px;
  padding: 22px 20px;
  transition: all 0.2s ease;
}

.cs-challenge-card:hover {
  background: #ffffff;
  border-color: #cbd5e1;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
}

.cs-challenge-card .cs-card-icon {
  width: 36px;
  height: 36px;
  border-radius: 8px;
  background: #fee2e2;
  color: #ef4444;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 14px;
}

.cs-challenge-card .cs-card-icon svg {
  width: 18px;
  height: 18px;
  fill: currentColor;
}

.cs-challenge-card h4 {
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 8px;
}

.cs-challenge-card p {
  font-size: 0.88rem;
  line-height: 1.55;
  color: var(--color-text-muted);
  margin: 0;
}

/* Solution Pillars Detailed List */
.cs-solution-block {
  margin-bottom: 50px;
}

.cs-pillar-item {
  display: flex;
  gap: 24px;
  margin-bottom: 34px;
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 26px;
  box-shadow: 0 4px 16px rgba(10, 15, 36, 0.02);
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.cs-pillar-item:hover {
  border-color: rgba(0, 80, 231, 0.25);
  box-shadow: 0 10px 30px rgba(0, 80, 231, 0.06);
}

.cs-pillar-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: rgba(0, 80, 231, 0.1);
  color: var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.cs-pillar-icon svg {
  width: 24px;
  height: 24px;
  fill: currentColor;
}

.cs-pillar-content h3 {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 8px;
  line-height: 1.3;
}

.cs-pillar-content p {
  font-size: 0.94rem;
  line-height: 1.6;
  color: var(--color-text-muted);
  margin-bottom: 12px;
}

.cs-feature-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.cs-feature-tag {
  font-size: 0.78rem;
  font-weight: 600;
  background: #f1f5f9;
  color: #334155;
  padding: 4px 10px;
  border-radius: 6px;
}

/* Client Testimonial Spotlight */
.cs-quote-box {
  background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%);
  color: #ffffff;
  border-radius: 20px;
  padding: 38px 34px;
  margin: 50px 0;
  position: relative;
  overflow: hidden;
  box-shadow: 0 20px 45px rgba(15, 23, 42, 0.15);
}

.cs-quote-box::before {
  content: "“";
  position: absolute;
  top: -20px;
  right: 20px;
  font-size: 140px;
  font-family: Georgia, serif;
  color: rgba(255, 255, 255, 0.06);
  line-height: 1;
  pointer-events: none;
}

.cs-quote-text {
  font-size: 1.2rem;
  line-height: 1.65;
  font-style: italic;
  font-weight: 400;
  color: #f1f5f9;
  margin-bottom: 24px;
  position: relative;
  z-index: 1;
}

.cs-quote-author {
  display: flex;
  align-items: center;
  gap: 16px;
  position: relative;
  z-index: 1;
}

.cs-author-avatar {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(255, 255, 255, 0.15);
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 700;
  font-size: 1.1rem;
  color: #ffffff;
}

.cs-author-info h5 {
  font-size: 1rem;
  font-weight: 700;
  color: #ffffff;
  margin: 0 0 2px;
}

.cs-author-info p {
  font-size: 0.85rem;
  color: #94a3b8;
  margin: 0;
}

/* Sticky Sidebar Widget */
.cs-sidebar {
  position: sticky;
  top: 100px;
  display: flex;
  flex-direction: column;
  gap: 24px;
}

.cs-sidebar-widget {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 26px 22px;
  box-shadow: 0 8px 24px rgba(10, 15, 36, 0.04);
}

.cs-widget-title {
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 16px;
  padding-bottom: 12px;
  border-bottom: 1px solid var(--color-gray-200);
}

.cs-meta-list {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.cs-meta-row {
  display: flex;
  flex-direction: column;
  gap: 2px;
}

.cs-meta-label {
  font-size: 0.76rem;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  font-weight: 700;
  color: var(--color-text-muted);
}

.cs-meta-val {
  font-size: 0.92rem;
  font-weight: 600;
  color: var(--color-primary);
}

.cs-tech-pills {
  display: flex;
  flex-wrap: wrap;
  gap: 6px;
  margin-top: 4px;
}

.cs-tech-pill {
  font-size: 0.76rem;
  font-weight: 600;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  padding: 4px 8px;
  border-radius: 6px;
  color: var(--color-primary);
}

.cs-sidebar-cta {
  background: linear-gradient(145deg, rgba(0, 80, 231, 0.05) 0%, rgba(0, 180, 216, 0.05) 100%);
  border: 1px solid rgba(0, 80, 231, 0.2);
  border-radius: 16px;
  padding: 24px 20px;
  text-align: center;
}

.cs-sidebar-cta h4 {
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 8px;
}

.cs-sidebar-cta p {
  font-size: 0.85rem;
  line-height: 1.5;
  color: var(--color-text-muted);
  margin-bottom: 18px;
}

/* Bottom CTA Banner */
.cs-bottom-banner {
  padding: 80px 0;
  background: #f8fafc;
  border-top: 1px solid var(--color-gray-200);
  text-align: center;
}

.cs-bottom-box {
  max-width: 820px;
  margin: 0 auto;
}

.cs-bottom-box h2 {
  font-size: clamp(2rem, 3.5vw, 2.8rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.2;
  margin-bottom: 16px;
}

.cs-bottom-box p {
  font-size: 1.1rem;
  line-height: 1.6;
  color: var(--color-text-muted);
  margin-bottom: 30px;
}

.cs-bottom-actions {
  display: flex;
  justify-content: center;
  gap: 16px;
  flex-wrap: wrap;
}

/* Responsive Overrides */
@media (max-width: 991px) {
  .cs-story-layout {
    grid-template-columns: 1fr;
    gap: 40px;
  }

  .cs-sidebar {
    position: static;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }

  .cs-metrics-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .cs-hero {
    padding: 100px 0 40px;
  }

  .cs-client-card {
    padding: 18px;
    flex-direction: column;
    align-items: flex-start;
  }

  .cs-client-actions {
    width: 100%;
  }

  .cs-client-actions .c-btn {
    width: 100%;
    justify-content: center;
  }

  .cs-challenge-grid {
    grid-template-columns: 1fr;
  }

  .cs-pillar-item {
    flex-direction: column;
    gap: 16px;
    padding: 20px 18px;
  }

  .cs-sidebar {
    grid-template-columns: 1fr;
  }

  .cs-quote-box {
    padding: 26px 20px;
  }

  .cs-quote-text {
    font-size: 1.05rem;
  }
}

@media (max-width: 480px) {
  .cs-metrics-grid {
    grid-template-columns: 1fr;
    gap: 12px;
  }

  .cs-metric-box {
    padding: 20px 18px;
  }
}
</style>
@endpush

@section('content')
<main id="main-content">

  <!-- ========================================================================
       HERO SECTION
       ======================================================================== -->
  <section class="cs-hero">
    <div class="container">
      
      <!-- Breadcrumbs -->
      <nav class="cs-breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <a href="{{ route('customer-stories') }}">Customer Stories</a>
        <span>/</span>
        <span style="color: var(--color-accent); font-weight: 500;">OMG Rental Bikes</span>
      </nav>

      <span class="cs-hero-badge">Case Study: Mobility &amp; Urban Rental Tech</span>
      
      <h1 class="cs-hero-title">
        How OMG Rental Bikes Automated Fleet Operations, Scaled Bookings &amp; <mark>Dominates Local Search</mark>.
      </h1>

      <p class="cs-hero-desc">
        OMG Rental Bikes partnered with Bluebase Technologies to engineer their complete digital operating system: an automated web booking engine, custom cloud fleet management software with paperless KYC, Google My Business (GMB) search domination, and full social media marketing—100% fully managed with zero in-house IT overhead.
      </p>

      <!-- Client Identity Bar -->
      <div class="cs-client-card">
        <div class="cs-client-info">
          <div class="cs-client-logo-box">
            <img src="{{ asset('images/stories/omg-rental-bikes-brand.png') }}" alt="OMG Rental Bikes Logo">
          </div>
          <div class="cs-client-details">
            <h4>OMG Rental Bikes</h4>
            <div class="cs-client-tags">
              <span class="cs-tag-pill">Two-Wheeler Rental Fleet</span>
              <span class="cs-tag-pill">Fleet ERP &amp; Software</span>
              <span class="cs-tag-pill managed">100% Managed by Bluebase</span>
            </div>
          </div>
        </div>

        <div class="cs-client-actions">
          <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" class="c-btn -secondary" style="padding: 12px 22px;">
            <span class="c-btn__txt">Visit Live Website</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 12px 24px;">
            <span class="c-btn__txt">Build Your Startup Platform</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>
      </div>

      <!-- Verified Impact Metrics -->
      <div class="cs-metrics-grid">
        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">3.5</span>X</div>
          <div class="cs-metric-title">Direct Online Bookings</div>
          <p class="cs-metric-desc">Growth in direct web reservations, reducing reliance on expensive 25% third-party aggregator commissions.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">45</span>%</div>
          <div class="cs-metric-title">Idle Fleet Reduction</div>
          <p class="cs-metric-desc">Real-time inventory grid eliminated double-bookings and minimized vehicle idle time across pickup locations.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">#1</span></div>
          <div class="cs-metric-title">Local Google Search Rank</div>
          <p class="cs-metric-desc">Secured top ranking on Google Maps and organic local search queries for prime two-wheeler rental keywords.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">100</span>%</div>
          <div class="cs-metric-title">Paperless Digital KYC</div>
          <p class="cs-metric-desc">Instant customer ID verification, digital signature, and automated rental agreement generation in under 60 seconds.</p>
        </div>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       MAIN STORY & ARCHITECTURE SECTION
       ======================================================================== -->
  <section class="cs-story-section">
    <div class="container">
      <div class="cs-story-layout">
        
        <!-- Story Content Body -->
        <div class="cs-story-body">
          
          <!-- Background & Context -->
          <div class="cs-section-header">
            <span class="section-tag">Client Background</span>
            <h2>Modernizing an Ambitious Mobility Startup</h2>
            <p>
              OMG Rental Bikes is a premier two-wheeler mobility provider offering scooters, cruisers, and commuter bikes to tourists and locals in high-demand travel hubs. As traveler traffic accelerated post-pandemic, the startup experienced rapid demand that outgrew manual operations.
            </p>
          </div>

          <!-- The Core Challenges -->
          <div class="cs-section-header" style="margin-top: 40px;">
            <span class="section-tag" style="color: #ef4444; border-color: rgba(239, 68, 68, 0.2); background: rgba(239, 68, 68, 0.08);">The Bottlenecks</span>
            <h2>What Was Holding Growth Back?</h2>
            <p>
              Operating a growing rental fleet with manual paper contracts and fragmented communication channels created severe friction:
            </p>
          </div>

          <div class="cs-challenge-grid">
            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Paper-Based Contracts &amp; Manual KYC</h4>
              <p>Photocopying physical driving licenses, collecting cash deposits, and signing physical paper agreements created 15-minute wait queues at pickup hubs.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Double-Bookings &amp; Fleet Blindspots</h4>
              <p>Fleet availability tracked on phone calls and WhatsApp caused accidental double-bookings during weekend spikes and unmonitored bike returns.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
              </div>
              <h4>High Aggregator Commission Fees</h4>
              <p>Third-party travel aggregators pocketed up to 25% of rental fees, while keeping customer contact information locked away from the brand.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Low Local Google Maps Presence</h4>
              <p>Despite possessing great bikes, their unoptimized Google Business Profile meant high-intent tourists searching "bike rental near me" went to competitors.</p>
            </div>
          </div>

          <!-- The Comprehensive Solution -->
          <div class="cs-solution-block">
            <div class="cs-section-header">
              <span class="section-tag">The Bluebase Solution</span>
              <h2>An End-to-End Digital Operating Ecosystem</h2>
              <p>
                Bluebase stepped in as OMG Rental Bikes' complete engineering and digital growth pod. Rather than patching together disconnected SaaS tools, we built a cohesive, tailored platform:
              </p>
            </div>

            <!-- Pillar 1: Web Booking Engine -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>1. High-Converting Web Booking Engine (omgrentalbikes.com)</h3>
                <p>
                  Engineered a lightweight, lightning-fast web booking experience optimized for mobile browsers. Riders can filter bikes by category (scooters, cruisers, gear bikes), select pickup and drop dates, add safety helmets, and secure their ride with instant online token payments.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Instant Bike Availability</span>
                  <span class="cs-feature-tag">Dynamic Hourly/Daily Pricing</span>
                  <span class="cs-feature-tag">UPI &amp; Card Gateway</span>
                  <span class="cs-feature-tag">WhatsApp Confirmation Bot</span>
                </div>
              </div>
            </div>

            <!-- Pillar 2: Cloud Fleet ERP -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path d="M8 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM15 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z"/><path d="M3 4a1 1 0 00-1 1v10a1 1 0 001 1h1.05a2.5 2.5 0 014.9 0H10a1 1 0 001-1V5a1 1 0 00-1-1H3zM14 7a1 1 0 00-1 1v6.05A2.5 2.5 0 0115.95 16H17a1 1 0 001-1v-5a1 1 0 00-.293-.707l-2-2A1 1 0 0015 7h-1z"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>2. Custom Business &amp; Fleet Management Software (ERP)</h3>
                <p>
                  Built a dedicated administrative software dashboard that gives the operations team real-time visibility over every vehicle in their fleet. The system monitors statuses (On Road, Reserved, Available, In Servicing), records odometer readings, and tracks security deposits.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Multi-Hub Vehicle Dispatch</span>
                  <span class="cs-feature-tag">Automated Deposit Ledger</span>
                  <span class="cs-feature-tag">Service &amp; Insurance Alerts</span>
                  <span class="cs-feature-tag">Revenue &amp; P&amp;L Analytics</span>
                </div>
              </div>
            </div>

            <!-- Pillar 3: Paperless Digital KYC -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 00-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm0 4a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>3. Instant Paperless Digital KYC &amp; Verification</h3>
                <p>
                  Replaced physical paperwork with an automated digital flow: customers upload their Driving License and Aadhaar via mobile browser, complete digital canvas e-signing, and the system automatically generates a legally binding, timestamped PDF agreement.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Govt ID Upload &amp; Cloud Storage</span>
                  <span class="cs-feature-tag">Digital Screen Signature</span>
                  <span class="cs-feature-tag">Automated PDF Generation</span>
                  <span class="cs-feature-tag">&lt;60 Seconds Turnaround</span>
                </div>
              </div>
            </div>

            <!-- Pillar 4: GMB & Social Growth -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>4. Google Business Profile (GMB) &amp; Social Growth Engine</h3>
                <p>
                  Bluebase took over complete management of their local digital footprint. We optimized their Google Business Profile with geo-tagged high-res photography, accurate category structuring, weekly Google updates, and automated review collection. On social media, consistent brand creatives drive direct tourist inquiries.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">#1 Local Google Map Pack</span>
                  <span class="cs-feature-tag">5-Star Review Automation</span>
                  <span class="cs-feature-tag">Social Media Creatives</span>
                  <span class="cs-feature-tag">Local SEO Citations</span>
                </div>
              </div>
            </div>

            <!-- Pillar 5: Fully Managed Tech -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>5. 100% Fully Managed Infrastructure by Bluebase</h3>
                <p>
                  The founders never worry about servers, uptime, security updates, or bug fixes. Bluebase acts as their dedicated external CTO and engineering team, monitoring server health 24/7, rolling out new features on request, and ensuring 99.9% uptime.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">99.9% Uptime Guarantee</span>
                  <span class="cs-feature-tag">Automated Daily Backups</span>
                  <span class="cs-feature-tag">SSL &amp; Cloud Security</span>
                  <span class="cs-feature-tag">Zero In-House Tech Overhead</span>
                </div>
              </div>
            </div>

          </div>

          <!-- Client Testimonial Card -->
          <div class="cs-quote-box">
            <p class="cs-quote-text">
              "Bluebase didn't just build us a website; they gave us a complete digital backbone. Before them, our team was losing hours on paper forms, phone calls, and paying huge commissions to aggregators. Today, our fleet management software runs smoothly, our web bookings are at an all-time high, and we rank at the very top of Google Maps in our territory. Having Bluebase manage everything lets us focus 100% on expanding our fleet."
            </p>
            <div class="cs-quote-author">
              <div class="cs-author-avatar">OR</div>
              <div class="cs-author-info">
                <h5>Operations Leadership</h5>
                <p>OMG Rental Bikes</p>
              </div>
            </div>
          </div>

          <!-- Business Key Takeaway -->
          <div class="cs-section-header">
            <span class="section-tag">Key Takeaway</span>
            <h2>Why the Startup Fully Managed Model Works</h2>
            <p>
              For growing physical businesses—rental fleets, logistics hubs, service companies—hiring in-house developers is cost-prohibitive, while off-the-shelf SaaS forces compromise and charges ongoing per-asset fees. Bluebase provides the perfect sweet spot: <strong>custom enterprise-grade software built exactly for your workflow, fully maintained and scaled by our engineering pod.</strong>
            </p>
          </div>

        </div>

        <!-- Sticky Sidebar Specs -->
        <aside class="cs-sidebar">
          
          <!-- Quick Project Specs Widget -->
          <div class="cs-sidebar-widget">
            <h4 class="cs-widget-title">Project Summary</h4>
            <div class="cs-meta-list">
              <div class="cs-meta-row">
                <span class="cs-meta-label">Client</span>
                <span class="cs-meta-val">OMG Rental Bikes</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Industry</span>
                <span class="cs-meta-val">Two-Wheeler Mobility &amp; Rentals</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Engagement Model</span>
                <span class="cs-meta-val">Full Build &amp; Ongoing Managed Services</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Deliverables</span>
                <span class="cs-meta-val">Web Booking Engine, Fleet ERP, Digital KYC, GMB Optimization, Social Marketing</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Live Platform</span>
                <a href="https://omgrentalbikes.com" target="_blank" rel="noopener noreferrer" style="color: var(--color-accent); font-weight: 600; text-decoration: underline; font-size: 0.92rem;">omgrentalbikes.com</a>
              </div>
            </div>
          </div>

          <!-- Tech Stack Widget -->
          <div class="cs-sidebar-widget">
            <h4 class="cs-widget-title">Technology Stack</h4>
            <div class="cs-meta-list">
              <div class="cs-meta-row">
                <span class="cs-meta-label">Web &amp; Booking Portal</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">PHP / Laravel</span>
                  <span class="cs-tech-pill">Blade</span>
                  <span class="cs-tech-pill">JavaScript ES6+</span>
                  <span class="cs-tech-pill">CSS3 Responsive</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Database &amp; Storage</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">MySQL</span>
                  <span class="cs-tech-pill">AWS S3 (Encrypted KYC)</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">APIs &amp; Automation</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Razorpay Payment Gateway</span>
                  <span class="cs-tech-pill">WhatsApp Business Cloud API</span>
                  <span class="cs-tech-pill">Google Maps Places API</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Growth &amp; SEO</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Google My Business (GMB)</span>
                  <span class="cs-tech-pill">Local Citation Engine</span>
                  <span class="cs-tech-pill">Social Content Strategy</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Discovery Call CTA Widget -->
          <div class="cs-sidebar-cta">
            <h4>Ready to Build Yours?</h4>
            <p>Get a custom software solution tailored to your startup's exact operations with transparent milestone billing.</p>
            <a href="{{ route('contact') }}" class="c-btn -primary" style="width: 100%; justify-content: center;">
              <span class="c-btn__txt">Talk to Our Builders</span>
            </a>
          </div>

        </aside>

      </div>
    </div>
  </section>

  <!-- ========================================================================
       BOTTOM CONVERSION CTA BANNER
       ======================================================================== -->
  <section class="cs-bottom-banner">
    <div class="container">
      <div class="cs-bottom-box" data-viewport="true">
        <span class="section-tag">Next Move</span>
        <h2>Build Your Startup's Custom Platform With Bluebase</h2>
        <p>
          Whether you need a high-converting web booking engine, custom inventory ERP, or a full digital operating system, our agile engineering pods ship clean, production-ready code on time.
        </p>
        <div class="cs-bottom-actions">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 16px 36px; font-size: 1rem;">
            <span class="c-btn__txt">Start Your Project</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('customer-stories') }}" class="c-btn -secondary" style="padding: 16px 32px; font-size: 1rem;">
            <span class="c-btn__txt">Explore More Case Studies</span>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection
