@extends('layouts.app')

@section('title', 'Aarohi Classic 2024 Case Study | Digital Event Tech, Ads & WhatsApp Ops | Bluebase')
@section('meta_description', 'Learn how Bluebase powered Aarohi Classic 2024 with performance Meta & Google ads, social media handle management, custom athlete registration portal, and WhatsApp Business automation.')

@push('styles')
<style>
/* ==========================================================================
   CASE STUDY: AAROHI CLASSIC 2024 SPECIFIC STYLING
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
  background: #0f172a;
  border: 1px solid var(--color-gray-200);
  border-radius: 12px;
  padding: 10px 16px;
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
  background: linear-gradient(90deg, #0050e7, #eab308);
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
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 6px;
}

.cs-metric-desc {
  font-size: 0.86rem;
  line-height: 1.5;
  color: var(--color-text-muted);
  margin: 0;
}

/* Main Layout Grid */
.cs-story-section {
  padding: 70px 0 100px;
  background: #ffffff;
}

.cs-story-layout {
  display: grid;
  grid-template-columns: 1fr 340px;
  gap: 56px;
  align-items: start;
}

/* Story Content Typography */
.cs-story-body {
  display: flex;
  flex-direction: column;
  gap: 50px;
}

.cs-section-header {
  margin-bottom: 24px;
}

.cs-section-header .section-tag {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--color-accent);
  background: rgba(0, 80, 231, 0.08);
  border: 1px solid rgba(0, 80, 231, 0.2);
  padding: 4px 12px;
  border-radius: 9999px;
  margin-bottom: 14px;
}

.cs-section-header h2 {
  font-size: clamp(1.8rem, 3vw, 2.4rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.25;
  letter-spacing: -0.02em;
  margin-bottom: 14px;
}

.cs-section-header p {
  font-size: 1.05rem;
  line-height: 1.7;
  color: var(--color-text-muted);
  margin: 0;
}

/* Challenge Cards Grid */
.cs-challenge-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 20px;
  margin-top: 24px;
}

.cs-challenge-card {
  background: #fafaf9;
  border: 1px solid var(--color-gray-200);
  border-radius: 14px;
  padding: 24px 22px;
  position: relative;
  transition: border-color 0.2s ease;
}

.cs-challenge-card:hover {
  border-color: #cbd5e1;
}

.cs-card-icon {
  width: 40px;
  height: 40px;
  border-radius: 10px;
  background: rgba(239, 68, 68, 0.1);
  color: #ef4444;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 16px;
}

.cs-card-icon svg {
  width: 22px;
  height: 22px;
  fill: currentColor;
}

.cs-challenge-card h4 {
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 8px;
}

.cs-challenge-card p {
  font-size: 0.92rem;
  line-height: 1.55;
  color: var(--color-text-muted);
  margin: 0;
}

/* Solution Pillars */
.cs-solution-block {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.cs-pillar-item {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 28px 26px;
  display: flex;
  gap: 22px;
  box-shadow: 0 4px 18px rgba(10, 15, 36, 0.03);
  transition: border-color 0.25s ease, box-shadow 0.25s ease;
}

.cs-pillar-item:hover {
  border-color: rgba(0, 80, 231, 0.3);
  box-shadow: 0 10px 30px rgba(0, 80, 231, 0.06);
}

.cs-pillar-icon {
  width: 48px;
  height: 48px;
  flex-shrink: 0;
  border-radius: 12px;
  background: rgba(0, 80, 231, 0.08);
  color: var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
}

.cs-pillar-icon svg {
  width: 24px;
  height: 24px;
  fill: currentColor;
}

.cs-pillar-content h3 {
  font-size: 1.22rem;
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
  margin: 20px 0;
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
  font-size: 1.15rem;
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
  background: #eab308;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: 800;
  font-size: 1.1rem;
  color: #0f172a;
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
  background: linear-gradient(145deg, rgba(0, 80, 231, 0.05) 0%, rgba(234, 179, 8, 0.08) 100%);
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
        <span style="color: var(--color-accent); font-weight: 500;">Aarohi Classic 2024</span>
      </nav>

      <span class="cs-hero-badge">Case Study: Mega Event Tech &amp; Performance Marketing</span>
      
      <h1 class="cs-hero-title">
        How Aarohi Classic 2024 Automated Athlete Registrations, Scaled Ticket Sales &amp; Streamlined <mark>WhatsApp Operations</mark>.
      </h1>

      <p class="cs-hero-desc">
        Aarohi Classic partnered with Bluebase Technologies to architect their complete digital event engine: high-performance Meta and Google advertising, full social media handle management, a custom online athlete and visitor registration portal with instant QR e-passes, and end-to-end WhatsApp Business automation for weigh-in and stage call alerts.
      </p>

      <!-- Client Identity Bar -->
      <div class="cs-client-card">
        <div class="cs-client-info">
          <div class="cs-client-logo-box">
            <img src="{{ asset('images/stories/aarohi-classic-brand.png') }}" alt="Aarohi Classic 2024 Banner">
          </div>
          <div class="cs-client-details">
            <h4>Aarohi Classic 2024</h4>
            <div class="cs-client-tags">
              <span class="cs-tag-pill">Fitness Championship</span>
              <span class="cs-tag-pill">Event Tech &amp; Automation</span>
              <span class="cs-tag-pill managed">Managed by Bluebase</span>
            </div>
          </div>
        </div>

        <div class="cs-client-actions">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 12px 24px;">
            <span class="c-btn__txt">Power Your Next Event</span>
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
          <div class="cs-metric-num"><span class="accent">5,000</span>+</div>
          <div class="cs-metric-title">Registrations Handled</div>
          <p class="cs-metric-desc">Seamless online registration of competing athletes and spectator attendees with zero system downtime.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">12</span>X</div>
          <div class="cs-metric-title">Return On Ad Spend (ROAS)</div>
          <p class="cs-metric-desc">Precision micro-targeted Meta and Google ads driving sold-out auditorium passes and athlete entries.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">100</span>%</div>
          <div class="cs-metric-title">WhatsApp Broadcast Delivery</div>
          <p class="cs-metric-desc">Instant automated WhatsApp alerts for official weigh-in time slots, rule handbooks, and stage calls.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">Zero</span></div>
          <div class="cs-metric-title">On-Site Counter Delays</div>
          <p class="cs-metric-desc">Paperless digital QR e-pass check-in cleared athlete entry and spectator queues in under 10 seconds.</p>
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
            <span class="section-tag">Event Background</span>
            <h2>A Premier Fitness &amp; Physique Championship</h2>
            <p>
              Aarohi Classic is recognized as a premier championship celebrating elite bodybuilding, Men's Physique, Classic Physique, and fitness athletes. Bringing together competitors, gym owners, coaches, sponsors, and hundreds of fitness enthusiasts, the 2024 championship required a sophisticated digital infrastructure capable of coordinating high-stakes operations under intense deadlines.
            </p>
          </div>

          <!-- The Core Challenges -->
          <div class="cs-section-header" style="margin-top: 10px;">
            <span class="section-tag" style="color: #ef4444; border-color: rgba(239, 68, 68, 0.2); background: rgba(239, 68, 68, 0.08);">The Bottlenecks</span>
            <h2>What Was Holding Event Operations Back?</h2>
            <p>
              Traditional mega-events rely on fragmented spreadsheets, manual cash collections, and chaotic stage announcements that create immense operational friction:
            </p>
          </div>

          <div class="cs-challenge-grid">
            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Paper Forms &amp; Long Weigh-in Queues</h4>
              <p>Athletes waiting in hours-long queues to verify identity, categorize weight classes, and receive physical badges created exhaustion before competing.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Delayed Stage Calls &amp; Athlete Confusion</h4>
              <p>Megaphone announcements failed to reach athletes in backstage warm-up areas, risking delayed category line-ups and judging schedule overruns.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Untracked Ticket Sales &amp; Ad Spend Leakage</h4>
              <p>Without structured pixel tracking and conversion funnels, previous promotional budgets lacked clear attribution and failed to maximize pass sales.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Manual Payment &amp; Category Reconciliation</h4>
              <p>Tracking entry fees across multiple UPI IDs and cash receipts resulted in tedious manual bookkeeping and payment verification bottlenecks.</p>
            </div>
          </div>

          <!-- The Comprehensive Solution -->
          <div class="cs-solution-block">
            <div class="cs-section-header">
              <span class="section-tag">The Bluebase Solution</span>
              <h2>An End-to-End Digital Event Management Engine</h2>
              <p>
                Bluebase served as the comprehensive technology and growth partner for Aarohi Classic 2024, deploying an integrated ecosystem spanning performance marketing, social media branding, registration software, and WhatsApp Cloud automation:
              </p>
            </div>

            <!-- Pillar 1: Targeted Paid Ads -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>1. High-Performance Meta &amp; Google Ads Engine</h3>
                <p>
                  Engineered laser-targeted advertising campaigns across Meta (Instagram &amp; Facebook) and Google Search. Campaigns targeted fitness professionals, gym members, coaches, and bodybuilding enthusiasts across key geographic zones, directing high-intent traffic to registration and ticket booking funnels.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">12X Verified ROAS</span>
                  <span class="cs-feature-tag">Custom Fitness Demographics</span>
                  <span class="cs-feature-tag">Meta Conversions API Tracking</span>
                  <span class="cs-feature-tag">Sold-Out Auditorium Passes</span>
                </div>
              </div>
            </div>

            <!-- Pillar 2: Complete Social Media Handle Management -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>2. Full Social Media Creative &amp; Handle Management</h3>
                <p>
                  Our creative team handled the official social media presence from inception through post-event highlights. We designed high-impact motion teasers, athlete spotlights, sponsor promotional reels, countdown graphics, and real-time event day coverage that drove virality and sponsor satisfaction.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">High-End Motion Creatives</span>
                  <span class="cs-feature-tag">Athlete Spotlight Posts</span>
                  <span class="cs-feature-tag">Live Event-Day Stories &amp; Reels</span>
                  <span class="cs-feature-tag">Sponsor Integration Assets</span>
                </div>
              </div>
            </div>

            <!-- Pillar 3: Custom Online Registration Portal -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>3. Custom Athlete &amp; Visitor Online Registration Engine</h3>
                <p>
                  Built a dedicated, lightning-fast digital registration platform. Athletes selected divisions (Men's Physique, Bodybuilding, Classic), declared weight brackets, uploaded identity proof, and completed digital fee checkout. Attendees purchased spectator tickets and received instantaneous digital QR entry passes.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Dynamic Category &amp; Weight Validation</span>
                  <span class="cs-feature-tag">Integrated UPI &amp; Card Gateway</span>
                  <span class="cs-feature-tag">Instant QR E-Pass Issuance</span>
                  <span class="cs-feature-tag">Automated Financial Ledger</span>
                </div>
              </div>
            </div>

            <!-- Pillar 4: WhatsApp Business Automation -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zm-4 0H9v2h2V9z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>4. WhatsApp Business Cloud Operations &amp; Live Alerts</h3>
                <p>
                  Implemented an enterprise WhatsApp Business automation bot that connected directly to the registration database. Athletes received instant registration confirmations, digital QR passes, official weigh-in time slots, rulebooks, and critical real-time backstage stage call notifications straight to their WhatsApp.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Real-Time Stage Call Alerts</span>
                  <span class="cs-feature-tag">Automated QR Pass Delivery</span>
                  <span class="cs-feature-tag">Weigh-in Schedule Broadcasts</span>
                  <span class="cs-feature-tag">24/7 Automated FAQ Support</span>
                </div>
              </div>
            </div>

            <!-- Pillar 5: On-Site Gate & Cloud Reliability -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>5. High-Throughput Gate Scanner &amp; 100% Cloud Uptime</h3>
                <p>
                  Equipped event volunteers with high-speed smartphone QR scanners synced in real-time to prevent pass duplication. Bluebase managed cloud hosting infrastructure to effortlessly absorb massive surges in traffic during registration closing deadlines and live event days.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">&lt;10s Rapid Gate Check-In</span>
                  <span class="cs-feature-tag">Zero Cloud Downtime</span>
                  <span class="cs-feature-tag">Duplicate Pass Prevention</span>
                  <span class="cs-feature-tag">On-Site &amp; Remote Tech Support</span>
                </div>
              </div>
            </div>

          </div>

          <!-- Client Testimonial Card -->
          <div class="cs-quote-box">
            <p class="cs-quote-text">
              "Organizing a large-scale fitness championship comes with immense logistical challenges—especially coordinating athlete weigh-ins, ticket sales, and backstage schedules. Bluebase took over our complete digital ecosystem: their performance ads packed our auditorium, their registration portal eliminated check-in queues, and their WhatsApp automation kept hundreds of athletes informed on stage timings in real time. They were true partners in making Aarohi Classic 2024 a historic success."
            </p>
            <div class="cs-quote-author">
              <div class="cs-author-avatar">AC</div>
              <div class="cs-author-info">
                <h5>Organizing Committee</h5>
                <p>Aarohi Classic 2024</p>
              </div>
            </div>
          </div>

          <!-- Business Key Takeaway -->
          <div class="cs-section-header">
            <span class="section-tag">Key Takeaway</span>
            <h2>Why Unified Event Tech Trumps Disconnected Tools</h2>
            <p>
              When high-stakes events rely on separate ad agencies, generic ticketing portals, and manual volunteer communications, critical information gets lost. Bluebase delivers an integrated solution where <strong>performance ads, registration portals, payment gateways, and WhatsApp alerts speak to each other seamlessly</strong>—saving hundreds of operational hours and delivering a world-class attendee experience.
            </p>
          </div>

        </div>

        <!-- Sticky Sidebar Specs -->
        <aside class="cs-sidebar">
          
          <!-- Quick Project Specs Widget -->
          <div class="cs-sidebar-widget">
            <h4 class="cs-widget-title">Event Summary</h4>
            <div class="cs-meta-list">
              <div class="cs-meta-row">
                <span class="cs-meta-label">Client</span>
                <span class="cs-meta-val">Aarohi Classic 2024</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Industry</span>
                <span class="cs-meta-val">Sports, Fitness &amp; Mega Events</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Engagement Model</span>
                <span class="cs-meta-val">Full Digital Operations &amp; Tech Partner</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Deliverables</span>
                <span class="cs-meta-val">Meta &amp; Google Ads, Social Media Management, Registration Portal, QR E-Passes, WhatsApp Automation</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Scope</span>
                <span class="cs-meta-val">National &amp; Regional Athletes, 5,000+ Total Attendees</span>
              </div>
            </div>
          </div>

          <!-- Tech Stack Widget -->
          <div class="cs-sidebar-widget">
            <h4 class="cs-widget-title">Technology &amp; Marketing Stack</h4>
            <div class="cs-meta-list">
              <div class="cs-meta-row">
                <span class="cs-meta-label">Registration Engine</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">PHP / Laravel</span>
                  <span class="cs-tech-pill">Blade</span>
                  <span class="cs-tech-pill">Alpine.js</span>
                  <span class="cs-tech-pill">CSS3 Responsive</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Performance Advertising</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Meta Ads Manager</span>
                  <span class="cs-tech-pill">Google Ads</span>
                  <span class="cs-tech-pill">Conversions API (CAPI)</span>
                  <span class="cs-tech-pill">Custom Retargeting</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Automation &amp; Messaging</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">WhatsApp Cloud API</span>
                  <span class="cs-tech-pill">Webhook Triggers</span>
                  <span class="cs-tech-pill">Automated Broadcasts</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Gate Verification &amp; Payments</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Dynamic QR Engine</span>
                  <span class="cs-tech-pill">Razorpay Payment Gateway</span>
                  <span class="cs-tech-pill">Mobile QR Scanner WebApp</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Sidebar CTA -->
          <div class="cs-sidebar-cta">
            <h4>Planning a Mega Event?</h4>
            <p>Let Bluebase handle your registrations, advertising campaigns, and WhatsApp communications with zero stress.</p>
            <a href="{{ route('contact') }}" class="c-btn -primary" style="width: 100%; justify-content: center;">
              <span class="c-btn__txt">Talk to Our Event Tech Team</span>
            </a>
          </div>

        </aside>

      </div>
    </div>
  </section>

  <!-- ========================================================================
       BOTTOM CTA BANNER
       ======================================================================== -->
  <section class="cs-bottom-banner">
    <div class="container">
      <div class="cs-bottom-box">
        <h2>Ready to Automate Your Operations and Scale Digital Revenue?</h2>
        <p>
          Whether you are launching a mobility platform, hosting a national championship, or scaling a tech startup, Bluebase provides direct senior builder collaboration with 100% managed execution.
        </p>
        <div class="cs-bottom-actions">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 14px 30px;">
            <span class="c-btn__txt">Start Your Project</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('customer-stories') }}" class="c-btn -secondary" style="padding: 14px 28px;">
            <span class="c-btn__txt">View All Customer Stories</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection
