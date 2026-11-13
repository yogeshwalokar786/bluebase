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

      <span class="cs-hero-badge">Case Study: Remote Digital Marketing &amp; Event Operations</span>
      
      <h1 class="cs-hero-title">
        How Bluebase Remotely Managed Paid Ads, Social Media, Online Registrations &amp; WhatsApp for <mark>Aarohi Classic 2024</mark>.
      </h1>

      <p class="cs-hero-desc">
        Aarohi Classic partnered with Bluebase Technologies to handle their complete digital presence 100% remotely from our office: running targeted Meta and Google ad campaigns, managing official social media handles with custom creatives, setting up online athlete registrations, and managing participant inquiries and broadcast updates over WhatsApp.
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
              <span class="cs-tag-pill">Remote Digital Marketing</span>
              <span class="cs-tag-pill managed">100% Remote Digital Ops</span>
            </div>
          </div>
        </div>

        <div class="cs-client-actions">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 12px 24px;">
            <span class="c-btn__txt">Get Remote Digital Support</span>
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
          <div class="cs-metric-num"><span class="accent">250</span>+</div>
          <div class="cs-metric-title">Online Registrations</div>
          <p class="cs-metric-desc">Athlete category entries and attendee passes collected, organized, and tracked digitally from our desk.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">4.2</span>X</div>
          <div class="cs-metric-title">Return On Ad Spend (ROAS)</div>
          <p class="cs-metric-desc">Targeted Meta and Google ad campaigns managed off-site, driving participant signups and ticket sales.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">100</span>%</div>
          <div class="cs-metric-title">WhatsApp Communication</div>
          <p class="cs-metric-desc">Broadcast updates, category schedule sheets, and athlete inquiry responses delivered directly via WhatsApp.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">100</span>%</div>
          <div class="cs-metric-title">Remote Execution</div>
          <p class="cs-metric-desc">Executed completely from our office with zero in-person venue presence, saving organizers valuable time.</p>
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
            <h2>Regional Fitness &amp; Physique Championship</h2>
            <p>
              Aarohi Classic is an independent regional fitness competition bringing together competitors across Men's Physique, Bodybuilding, and Fitness divisions. As the event date approached, the organizing committee had their hands full managing on-ground arrangements—stage setup, judging panels, trophies, and sponsors. They partnered with Bluebase Technologies to completely take over their digital marketing, participant registrations, and athlete communication remotely from our office.
            </p>
          </div>

          <!-- The Core Challenges -->
          <div class="cs-section-header" style="margin-top: 10px;">
            <span class="section-tag" style="color: #ef4444; border-color: rgba(239, 68, 68, 0.2); background: rgba(239, 68, 68, 0.08);">The Bottlenecks</span>
            <h2>What Was Holding Event Digital Operations Back?</h2>
            <p>
              Before partnering with Bluebase, managing participant intake and promotion through manual phone calls and informal messages created unnecessary friction:
            </p>
          </div>

          <div class="cs-challenge-grid">
            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Manual Intake &amp; Disorganized Signups</h4>
              <p>Taking athlete entries over scattered personal messages and paper slips made tracking weight categories and divisions chaotic.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Uncoordinated Athlete Communication</h4>
              <p>No dedicated messaging system to broadcast official weigh-in time slots, rule sheets, or schedule updates to registered competitors.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Limited Paid Ad Reach &amp; Promotion</h4>
              <p>Without targeted advertising, nearby gym goers and fitness enthusiasts in surrounding areas were unaware of the event dates and entry passes.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Scattered Fee &amp; Payment Records</h4>
              <p>Handling entry fees across unverified payment screenshots made financial tracking and confirmation issuance time-consuming for the organizers.</p>
            </div>
          </div>

          <!-- The Comprehensive Solution -->
          <div class="cs-solution-block">
            <div class="cs-section-header">
              <span class="section-tag">The Bluebase Solution</span>
              <h2>Complete Remote Digital Management from Our Office</h2>
              <p>
                Bluebase took full ownership of the digital workflow, operating 100% remotely from our desk so the client's team could concentrate entirely on on-ground event execution:
              </p>
            </div>

            <!-- Pillar 1: Targeted Paid Ads -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12 1.586l-4 4v12.828l4-4V1.586zM3.707 3.293A1 1 0 002 4v10a1 1 0 00.293.707L6 18.414V5.586L3.707 3.293zM17.707 5.293L14 1.586v12.828l2.293 2.293A1 1 0 0018 16V6a1 1 0 00-.293-.707z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>1. Targeted Meta &amp; Google Ad Campaigns</h3>
                <p>
                  Set up and optimized high-intent advertising campaigns across Instagram, Facebook, and Google Search. Ads targeted local gym members, personal trainers, and bodybuilding competitors, driving direct traffic to athlete registration and ticket inquiries.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">4.2X Verified ROAS</span>
                  <span class="cs-feature-tag">Local Fitness Demographics</span>
                  <span class="cs-feature-tag">Instagram Reels Ads</span>
                  <span class="cs-feature-tag">Targeted Inquiry Generation</span>
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
                  Managed the championship's social channels remotely with engaging graphic posters, athlete countdown creatives, category breakdowns, rules announcements, sponsor branding, and event-day story coverage.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Custom Poster Designs</span>
                  <span class="cs-feature-tag">Athlete Countdown Creatives</span>
                  <span class="cs-feature-tag">Sponsor Asset Branding</span>
                  <span class="cs-feature-tag">Active Handle Engagement</span>
                </div>
              </div>
            </div>

            <!-- Pillar 3: Custom Online Registration Portal -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 5a2 2 0 012-2h10a2 2 0 012 2v8a2 2 0 01-2 2h-2.22l.123.489.804.804A1 1 0 0113 18H7a1 1 0 01-.707-1.707l.804-.804L7.22 15H5a2 2 0 01-2-2V5zm5.771 7H5V5h10v7H8.771z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>3. Online Athlete &amp; Visitor Registration Setup</h3>
                <p>
                  Created a dedicated mobile-friendly digital registration flow where competitors selected their category (Men's Physique, Bodybuilding, Classic), declared weight brackets, uploaded identity proof, and completed their signups online with instant digital confirmation passes.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Mobile Registration Flow</span>
                  <span class="cs-feature-tag">Category &amp; Weight Selection</span>
                  <span class="cs-feature-tag">Digital Pass Issuance</span>
                  <span class="cs-feature-tag">Organized Participant Database</span>
                </div>
              </div>
            </div>

            <!-- Pillar 4: WhatsApp Management -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zm-4 0H9v2h2V9z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>4. WhatsApp Broadcasts &amp; Participant Communication</h3>
                <p>
                  Operated direct WhatsApp communication from our office: answering athlete questions, broadcasting official weigh-in time slots, sharing stage guidelines, and sending digital passes straight to participants' phones.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Direct WhatsApp Support</span>
                  <span class="cs-feature-tag">Weigh-in Schedule Broadcasts</span>
                  <span class="cs-feature-tag">Digital Pass Delivery</span>
                  <span class="cs-feature-tag">Fast Athlete Query Resolution</span>
                </div>
              </div>
            </div>

            <!-- Pillar 5: Remote Data Handover & Clean Coordination -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2 5a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm14 1a1 1 0 11-2 0 1 1 0 012 0zM2 13a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>5. 100% Remote Coordination &amp; Clean Data Handover</h3>
                <p>
                  Maintained real-time, categorized participant sheets so the client's on-ground team had instant access to verified athlete lists, contact details, and division counts without handling any digital friction themselves.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">100% Off-Site Support</span>
                  <span class="cs-feature-tag">Real-Time Categorized Sheets</span>
                  <span class="cs-feature-tag">Zero On-Ground Hassle</span>
                  <span class="cs-feature-tag">Seamless Organizer Handover</span>
                </div>
              </div>
            </div>

          </div>

          <!-- Client Testimonial Card -->
          <div class="cs-quote-box">
            <p class="cs-quote-text">
              "We were completely busy with venue coordination, stage setup, and judging panels. Having Bluebase take over our entire digital presence—running our ads, designing social media graphics, setting up our online registration, and handling athlete communication over WhatsApp remotely—was a huge relief. They handled everything smoothly from their office without ever needing our constant supervision."
            </p>
            <div class="cs-quote-author">
              <div class="cs-author-avatar">AC</div>
              <div class="cs-author-info">
                <h5>Organizing Team</h5>
                <p>Aarohi Classic 2024</p>
              </div>
            </div>
          </div>

          <!-- Business Key Takeaway -->
          <div class="cs-section-header">
            <span class="section-tag">Key Takeaway</span>
            <h2>Remote Digital Execution That Saves Event Organizers Time</h2>
            <p>
              Event organizers already have their hands full with physical logistics and venue execution. Partnering with a dedicated digital team to manage <strong>paid ads, social media handles, online registrations, and WhatsApp communication remotely</strong> ensures full digital reach and smooth communication without any in-person management overhead.
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
                <span class="cs-meta-val">Sports &amp; Fitness Event</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Engagement Model</span>
                <span class="cs-meta-val">100% Remote Digital Operations &amp; Marketing</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Deliverables</span>
                <span class="cs-meta-val">Meta &amp; Google Ads, Social Handle Management, Online Registration Portal, WhatsApp Management</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Scope</span>
                <span class="cs-meta-val">Regional Fitness Event, 250+ Athletes &amp; Attendees</span>
              </div>
            </div>
          </div>

          <!-- Tech Stack Widget -->
          <div class="cs-sidebar-widget">
            <h4 class="cs-widget-title">Digital &amp; Marketing Tools</h4>
            <div class="cs-meta-list">
              <div class="cs-meta-row">
                <span class="cs-meta-label">Online Registration</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Mobile Registration Portal</span>
                  <span class="cs-tech-pill">Digital Confirmation Passes</span>
                  <span class="cs-tech-pill">Real-Time Data Sync</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Performance Advertising</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Meta Ads Manager</span>
                  <span class="cs-tech-pill">Google Ads</span>
                  <span class="cs-tech-pill">Instagram Promotion</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Messaging &amp; Support</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">WhatsApp Business</span>
                  <span class="cs-tech-pill">Broadcast Lists</span>
                  <span class="cs-tech-pill">Remote Helpdesk</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Creative &amp; Design</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Motion Teasers</span>
                  <span class="cs-tech-pill">Poster Graphics</span>
                  <span class="cs-tech-pill">Event Day Stories</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Sidebar CTA -->
          <div class="cs-sidebar-cta">
            <h4>Organizing an Event or Tournament?</h4>
            <p>Let Bluebase handle your registrations, advertising campaigns, and WhatsApp communications remotely with zero stress.</p>
            <a href="{{ route('contact') }}" class="c-btn -primary" style="width: 100%; justify-content: center;">
              <span class="c-btn__txt">Get Remote Event Support</span>
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

