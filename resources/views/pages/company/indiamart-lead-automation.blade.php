@extends('layouts.app')

@section('title', 'IndiaMART Lead Automation Extension Case Study | B2B Lead Scraping & Real-Time Sync | Bluebase')
@section('meta_description', 'Discover how Bluebase engineered a custom Chromium browser extension that automates IndiaMART buy-lead discovery, filters qualified commercial inquiries, and syncs lead data instantly to CRM.')

@push('styles')
<style>
/* ==========================================================================
   CASE STUDY: INDIAMART LEAD AUTOMATION SPECIFIC STYLING
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
  width: 68px;
  height: 68px;
  border-radius: 14px;
  background: #f8fafc;
  border: 1px solid #e2e8f0;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 10px;
  flex-shrink: 0;
  color: var(--color-accent);
}

.cs-client-logo-box svg {
  width: 38px;
  height: 38px;
  fill: currentColor;
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
  background: #f1f5f9;
  color: #475569;
}

.cs-tag-pill.managed {
  background: #ecfdf5;
  color: #047857;
  border: 1px solid rgba(16, 185, 129, 0.3);
}

.cs-client-actions {
  display: flex;
  align-items: center;
  gap: 14px;
  flex-wrap: wrap;
}

/* Impact Metrics Grid */
.cs-metrics-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
}

.cs-metric-box {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 24px 22px;
  box-shadow: 0 4px 16px rgba(10, 15, 36, 0.03);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.cs-metric-box:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 28px rgba(0, 80, 231, 0.08);
}

.cs-metric-num {
  font-size: clamp(2rem, 3.2vw, 2.8rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1;
  letter-spacing: -0.03em;
  margin-bottom: 8px;
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

/* Solution Pillars */
.cs-solution-block {
  margin: 20px 0 60px;
}

.cs-pillar-item {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 28px 26px;
  margin-bottom: 22px;
  display: flex;
  gap: 24px;
  align-items: flex-start;
  box-shadow: 0 4px 16px rgba(10, 15, 36, 0.02);
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.cs-pillar-item:hover {
  border-color: rgba(0, 80, 231, 0.3);
  box-shadow: 0 8px 24px rgba(0, 80, 231, 0.05);
}

.cs-pillar-icon {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: rgba(0, 80, 231, 0.08);
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
  margin-bottom: 10px;
}

.cs-pillar-content p {
  font-size: 0.94rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  margin-bottom: 14px;
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

/* Client Quote Card */
.cs-quote-box {
  background: linear-gradient(145deg, #0a0f24 0%, #111a3b 100%);
  border-radius: 20px;
  padding: 38px 34px;
  color: #ffffff;
  margin: 50px 0 60px;
  position: relative;
  overflow: hidden;
}

.cs-quote-box::before {
  content: "“";
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 8rem;
  line-height: 1;
  font-family: Georgia, serif;
  color: rgba(255, 255, 255, 0.05);
  pointer-events: none;
}

.cs-quote-text {
  font-size: 1.15rem;
  line-height: 1.7;
  font-style: italic;
  color: #e2e8f0;
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
  width: 44px;
  height: 44px;
  border-radius: 50%;
  background: var(--color-accent);
  color: #ffffff;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.95rem;
}

.cs-author-info h5 {
  font-size: 1rem;
  font-weight: 700;
  color: #ffffff;
  margin: 0 0 2px;
}

.cs-author-info p {
  font-size: 0.82rem;
  color: #94a3b8;
  margin: 0;
}

/* Sidebar Specifications */
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
        <span style="color: var(--color-accent); font-weight: 500;">IndiaMART Lead Automation Extension</span>
      </nav>

      <span class="cs-hero-badge">Case Study: B2B Lead Tech &amp; Browser Automation</span>
      
      <h1 class="cs-hero-title">
        Automating IndiaMART Buy-Lead Discovery, Commercial Intent Filtering &amp; <mark>Real-Time CRM Synchronization</mark>.
      </h1>

      <p class="cs-hero-desc">
        A high-volume B2B industrial component distributor partnered with Bluebase Technologies to eliminate manual lead scraping. We engineered a proprietary Chromium extension that continuously monitors IndiaMART buyer inquiries, filters out retail spam, and syncs high-value commercial leads directly into their CRM and Google Sheets in real time.
      </p>

      <!-- Client Identity Bar -->
      <div class="cs-client-card">
        <div class="cs-client-info">
          <div class="cs-client-logo-box">
            <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/></svg>
          </div>
          <div class="cs-client-details">
            <h4>Industrial Components &amp; Machinery Spares Wholesale Distributor</h4>
            <div class="cs-client-tags">
              <span class="cs-tag-pill">B2B Wholesale &amp; Manufacturing</span>
              <span class="cs-tag-pill">Chromium Extension Engine</span>
              <span class="cs-tag-pill managed">Engineered by Bluebase</span>
            </div>
          </div>
        </div>

        <div class="cs-client-actions">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 12px 24px;">
            <span class="c-btn__txt">Automate Your B2B Sales Workflow</span>
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
          <div class="cs-metric-num"><span class="accent">&lt;10</span>s</div>
          <div class="cs-metric-title">Lead Detection &amp; Alert</div>
          <p class="cs-metric-desc">Down from 45+ minutes manually. Instant audio and desktop notifications alert sales reps the moment a qualified buyer posts.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">4.5</span>h</div>
          <div class="cs-metric-title">Daily Time Saved / Rep</div>
          <p class="cs-metric-desc">Automated DOM scraping, contact deduplication, and intent scoring completely replaced tedious copy-pasting.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">3.2</span>X</div>
          <div class="cs-metric-title">Lead Qualification Rate</div>
          <p class="cs-metric-desc">Eliminating retail noise allows reps to focus 100% on high-intent commercial buyers with verified requirements.</p>
        </div>

        <div class="cs-metric-box">
          <div class="cs-metric-num"><span class="accent">₹42</span>L+</div>
          <div class="cs-metric-title">New Pipeline in 90 Days</div>
          <p class="cs-metric-desc">High-value commercial orders captured directly through automated inquiry filtering and immediate sales response.</p>
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
            <h2>The High-Stakes Race for IndiaMART Buy-Leads</h2>
            <p>
              Operating in competitive B2B industrial manufacturing and machinery spares distribution, our client supplies factories and manufacturing plants across Western and Southern India. To expand their pipeline, they subscribed to IndiaMART's top-tier seller plan, receiving hundreds of buyer inquiries and buy-leads every single week.
            </p>
          </div>

          <!-- The Core Challenges -->
          <div class="cs-section-header" style="margin-top: 40px;">
            <span class="section-tag" style="color: #ef4444; border-color: rgba(239, 68, 68, 0.2); background: rgba(239, 68, 68, 0.08);">The Bottlenecks</span>
            <h2>Why Manual Lead Processing Was Failing</h2>
            <p>
              While the lead flow was enormous, the operational friction of handling leads manually was bleeding thousands of rupees in lost deals and wasted sales payroll:
            </p>
          </div>

          <div class="cs-challenge-grid">
            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Aggressive Multi-Vendor Lead Burn</h4>
              <p>IndiaMART distributes hot buy-leads to up to 5 competing vendors simultaneously. If a supplier fails to reach out within minutes, competitors have already claimed and engaged the buyer.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Endless Manual Browser Refreshing</h4>
              <p>Sales representatives spent 4.5 hours daily sitting in front of open browser tabs, hitting refresh (F5), copying buyer phone numbers into Excel sheets, and typing manual notes.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a8 8 0 100 16 8 8 0 000-16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
              </div>
              <h4>Retail Spam &amp; MOQ Mismatches</h4>
              <p>Over 60% of inquiries were consumers asking for 1 single retail unit. Reps wasted paid buy-lead credits and hours verifying requests that did not meet their 50-unit commercial MOQ.</p>
            </div>

            <div class="cs-challenge-card">
              <div class="cs-card-icon">
                <svg viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
              </div>
              <h4>Delayed Response &amp; Lead Slippage</h4>
              <p>Valuable commercial buyer leads arriving during lunch breaks, meetings, or off-hours remained unviewed for hours, giving rival sellers an open window to close the contract.</p>
            </div>
          </div>

          <!-- The Comprehensive Solution -->
          <div class="cs-solution-block">
            <div class="cs-section-header">
              <span class="section-tag">The Bluebase Solution</span>
              <h2>A Custom Chromium Extension &amp; Webhook Engine</h2>
              <p>
                Bluebase engineered a bespoke, secure workflow automation suite built specifically for IndiaMART seller portals. Rather than relying on fragile manual scraping, we designed a compliant client-side extension backed by a cloud queue worker:
              </p>
            </div>

            <!-- Pillar 1: Manifest V3 Extension -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L2.414 11l3.293 3.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L17.586 11l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>1. Real-Time DOM Observer Extension (Manifest V3)</h3>
                <p>
                  Engineered a lightweight Chromium browser extension operating inside the IndiaMART seller dashboard. Using asynchronous `MutationObserver` listeners and background service workers, the extension detects new buy-leads the millisecond they render on-screen, completely eliminating the need for manual tab refreshing.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Chrome &amp; Edge Compatible</span>
                  <span class="cs-feature-tag">Zero Anti-Bot Detection Flags</span>
                  <span class="cs-feature-tag">Zero Manual Screen Refreshing</span>
                  <span class="cs-feature-tag">Live Status Indicator Badge</span>
                </div>
              </div>
            </div>

            <!-- Pillar 2: Intent & MOQ Filtering -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>2. Commercial Intent &amp; MOQ Filtering Engine</h3>
                <p>
                  Before claiming or processing a lead, the extension parses the inquiry details: requested quantity, estimated order value, buyer location, and commercial keywords (e.g., "bulk", "dealer", "factory", "tender"). Queries under the client's minimum quantity threshold are filtered out, saving precious paid IndiaMART lead credits.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Dynamic MOQ Thresholding</span>
                  <span class="cs-feature-tag">Negative Keyword Filtering</span>
                  <span class="cs-feature-tag">Lead Credit Protection</span>
                  <span class="cs-feature-tag">Verified GST Number Check</span>
                </div>
              </div>
            </div>

            <!-- Pillar 3: CRM Synchronization -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z"/><path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z"/><path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>3. 1-Click Secure CRM &amp; Google Sheets Synchronization</h3>
                <p>
                  Once an inquiry qualifies, the extension extracts verified buyer details (contact name, company name, phone number, city, requirement specifications) and fires an encrypted HTTPS webhook to the client's CRM and master Google Sheet in real time. Deduplication logic ensures existing clients are flagged immediately.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Instant Webhook Dispatch</span>
                  <span class="cs-feature-tag">Automatic Phone Deduplication</span>
                  <span class="cs-feature-tag">Google Sheets Sync</span>
                  <span class="cs-feature-tag">Sales Rep Round-Robin Assignment</span>
                </div>
              </div>
            </div>

            <!-- Pillar 4: Priority Desktop Alerts -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>4. High-Priority Audio &amp; Desktop Sales Notifications</h3>
                <p>
                  The moment a qualified inquiry enters the console matching priority criteria, the extension fires an audible audio chime and a sticky desktop notification banner displaying the buyer's requested product, quantity, and city. Reps can review and initiate direct phone contact immediately while the requirement is fresh.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Audible Audio Chime</span>
                  <span class="cs-feature-tag">Sticky Desktop Banner</span>
                  <span class="cs-feature-tag">Instant Phone Click-to-Call</span>
                  <span class="cs-feature-tag">Zero Missed Opportunities</span>
                </div>
              </div>
            </div>

            <!-- Pillar 5: Safety, Anti-Ban & Rate Limiting -->
            <div class="cs-pillar-item">
              <div class="cs-pillar-icon">
                <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
              </div>
              <div class="cs-pillar-content">
                <h3>5. Anti-Ban Safeguards &amp; Passive DOM Listeners</h3>
                <p>
                  To protect seller accounts from aggressive rate limiting, Bluebase built passive observer listeners and human emulation pauses into the extension. The extension never injects invasive scripts or triggers aggressive automated requests, safeguarding seller accounts and platform compliance.
                </p>
                <div class="cs-feature-tags">
                  <span class="cs-feature-tag">Passive DOM Listening</span>
                  <span class="cs-feature-tag">Jittered Micro-Delays</span>
                  <span class="cs-feature-tag">Encrypted Auth Tokens</span>
                  <span class="cs-feature-tag">Automated Session Recovery</span>
                </div>
              </div>
            </div>

          </div>

          <!-- Client Testimonial Card -->
          <div class="cs-quote-box">
            <p class="cs-quote-text">
              "On IndiaMART, speed is everything. Before Bluebase built this extension, our sales team was glued to the screen refreshing tabs, and competitors would call buyers before we even noticed the notification. Now, the extension captures the lead, qualifies commercial quantity, and logs it directly into our CRM with instant alerts. It feels like magic, and our response rate improved dramatically."
            </p>
            <div class="cs-quote-author">
              <div class="cs-author-avatar">ID</div>
              <div class="cs-author-info">
                <h5>Sales &amp; Operations Leadership</h5>
                <p>Industrial Components &amp; Spares Wholesale</p>
              </div>
            </div>
          </div>

          <!-- Business Key Takeaway -->
          <div class="cs-section-header">
            <span class="section-tag">Key Takeaway</span>
            <h2>Custom Browser Automation vs. Generic SaaS</h2>
            <p>
              Off-the-shelf CRM tools cannot interact deeply with closed vendor portals like IndiaMART, TradeIndia, or Justdial. By engineering a <strong>custom browser extension tailored to their exact workflow</strong>, Bluebase delivered an unfair competitive advantage that paid for itself within the first 14 days of deployment.
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
                <span class="cs-meta-val">Industrial Components &amp; Spares Wholesale</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Industry</span>
                <span class="cs-meta-val">B2B Machinery &amp; Industrial Spares</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Engagement Model</span>
                <span class="cs-meta-val">Custom Browser Extension &amp; Webhook Engine</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Deliverables</span>
                <span class="cs-meta-val">Chrome Extension (V3), Webhook Relay, Desktop Notification Engine, CRM Sheet Sync</span>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Turnaround</span>
                <span class="cs-meta-val">Shipped in 10 Days</span>
              </div>
            </div>
          </div>

          <!-- Tech Stack Widget -->
          <div class="cs-sidebar-widget">
            <h4 class="cs-widget-title">Technology Stack</h4>
            <div class="cs-meta-list">
              <div class="cs-meta-row">
                <span class="cs-meta-label">Browser Extension</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Manifest V3</span>
                  <span class="cs-tech-pill">TypeScript</span>
                  <span class="cs-tech-pill">MutationObserver</span>
                  <span class="cs-tech-pill">Chrome Storage API</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Backend &amp; Webhooks</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">PHP / Laravel</span>
                  <span class="cs-tech-pill">Redis Queue Worker</span>
                  <span class="cs-tech-pill">PostgreSQL</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Integrations &amp; APIs</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">Google Sheets REST API</span>
                  <span class="cs-tech-pill">CRM Webhook Handlers</span>
                  <span class="cs-tech-pill">Desktop Notification API</span>
                </div>
              </div>
              <div class="cs-meta-row">
                <span class="cs-meta-label">Security &amp; Compliance</span>
                <div class="cs-tech-pills">
                  <span class="cs-tech-pill">AES-256 Token Encryption</span>
                  <span class="cs-tech-pill">Passive DOM Listeners</span>
                  <span class="cs-tech-pill">Human Emulation Delays</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Discovery Call CTA Widget -->
          <div class="cs-sidebar-cta">
            <h4>Have a Manual Workflow?</h4>
            <p>We build custom browser extensions, internal bots, and lead capture pipelines that save hours every day.</p>
            <a href="{{ route('contact') }}" class="c-btn -primary" style="width: 100%; justify-content: center;">
              <span class="c-btn__txt">Talk to Our Automation Pod</span>
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
        <h2>Automate Your Lead Pipeline &amp; Repetitive Workflows With Bluebase</h2>
        <p>
          Whether you need a Chrome extension to capture B2B buyer leads, custom CRM integration, or automated workflow tools, Bluebase engineers robust, enterprise-grade automations in weeks.
        </p>
        <div class="cs-bottom-actions">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 16px 36px; font-size: 1rem;">
            <span class="c-btn__txt">Schedule Workflow Discovery</span>
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
