@extends('layouts.app')

@section('title', 'Founder & Developer Guides | Practical Digital Product Playbooks | Bluebase')
@section('meta_description', 'Actionable engineering guides, MVP launch blueprints, mobile app frameworks, and tech stack decision matrices—written by builders for ambitious founders.')

@push('styles')
<style>
/* ==========================================================================
   FOUNDER & DEVELOPER GUIDES PAGE STYLING
   ========================================================================== */
.guide-hero {
  padding: 120px 0 60px;
  background: radial-gradient(circle at 80% 20%, rgba(0, 80, 231, 0.05) 0%, transparent 60%), #ffffff;
  position: relative;
  border-bottom: 1px solid var(--color-gray-200);
}

.guide-badge {
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

.guide-badge::before {
  content: "";
  display: inline-block;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  background: var(--color-accent);
  box-shadow: 0 0 8px rgba(0, 80, 231, 0.6);
}

.guide-hero-title {
  font-size: clamp(2.3rem, 4.5vw, 3.6rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.15;
  letter-spacing: -0.025em;
  margin-bottom: 20px;
  max-width: 900px;
}

.guide-hero-desc {
  font-size: 1.15rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  max-width: 820px;
  margin-bottom: 34px;
}

/* Flagship Guide Spotlight Card */
.guide-spotlight {
  background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
  border: 1px solid rgba(0, 80, 231, 0.18);
  border-radius: 20px;
  padding: 38px 40px;
  box-shadow: 0 16px 45px rgba(10, 15, 36, 0.06);
  position: relative;
  overflow: hidden;
  margin-bottom: 60px;
  display: grid;
  grid-template-columns: 1.35fr 1fr;
  gap: 40px;
  align-items: center;
}

.guide-spotlight::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 3px;
  background: linear-gradient(90deg, #0050e7 0%, #38bdf8 100%);
}

.guide-spotlight-tag {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background: #ecfdf5;
  color: #047857;
  font-size: 0.76rem;
  font-weight: 700;
  padding: 4px 10px;
  border-radius: 6px;
  margin-bottom: 14px;
  text-transform: uppercase;
  letter-spacing: 0.06em;
}

.guide-spotlight-title {
  font-size: clamp(1.5rem, 2.4vw, 2rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.25;
  margin-bottom: 14px;
  letter-spacing: -0.02em;
}

.guide-spotlight-text {
  font-size: 0.98rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  margin-bottom: 24px;
}

.guide-checklist-preview {
  list-style: none;
  padding: 0;
  margin: 0 0 28px;
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.guide-checklist-preview li {
  display: flex;
  align-items: center;
  gap: 10px;
  font-size: 0.9rem;
  font-weight: 600;
  color: #1e293b;
}

.guide-checklist-preview li svg {
  width: 16px;
  height: 16px;
  fill: #0050e7;
  flex-shrink: 0;
}

.guide-spotlight-meta-box {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 28px 24px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.03);
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.guide-meta-item {
  display: flex;
  flex-direction: column;
  gap: 3px;
}

.guide-meta-label {
  font-size: 0.74rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  color: var(--color-text-muted);
}

.guide-meta-value {
  font-size: 0.95rem;
  font-weight: 600;
  color: var(--color-primary);
}

/* Category Filter Tabs & Grid */
.guide-catalog-section {
  padding: 80px 0;
  background: #ffffff;
}

.guide-section-header {
  text-align: center;
  max-width: 800px;
  margin: 0 auto 54px;
}

.guide-section-header h2 {
  font-size: clamp(2rem, 3.2vw, 2.6rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.2;
  margin-bottom: 14px;
}

.guide-section-header p {
  font-size: 1.05rem;
  line-height: 1.6;
  color: var(--color-text-muted);
}

.guides-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 28px;
  margin-bottom: 60px;
}

.guide-card {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 28px 26px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  box-shadow: 0 4px 18px rgba(10, 15, 36, 0.03);
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  position: relative;
}

.guide-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 16px 36px rgba(0, 80, 231, 0.08);
  border-color: rgba(0, 80, 231, 0.25);
}

.guide-card-top {
  margin-bottom: 22px;
}

.guide-card-header-bar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
}

.guide-card-category {
  font-size: 0.74rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  color: var(--color-accent);
  background: rgba(0, 80, 231, 0.08);
  padding: 4px 10px;
  border-radius: 6px;
}

.guide-read-time {
  font-size: 0.78rem;
  color: var(--color-text-muted);
  font-weight: 500;
}

.guide-card-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.35;
  margin-bottom: 12px;
}

.guide-card-desc {
  font-size: 0.92rem;
  line-height: 1.6;
  color: var(--color-text-muted);
  margin-bottom: 16px;
}

.guide-key-points {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: 8px;
}

.guide-key-points li {
  display: flex;
  align-items: flex-start;
  gap: 8px;
  font-size: 0.84rem;
  color: #334155;
  line-height: 1.4;
}

.guide-key-points li::before {
  content: "•";
  color: var(--color-accent);
  font-weight: bold;
  font-size: 1rem;
  line-height: 1;
}

.guide-card-action {
  padding-top: 18px;
  border-top: 1px solid var(--color-gray-100);
  display: flex;
  align-items: center;
  justify-content: space-between;
}

/* Philosophy Banner */
.guide-philosophy-banner {
  background: #f8fafc;
  border: 1px solid var(--color-gray-200);
  border-radius: 20px;
  padding: 44px 40px;
  margin: 60px 0;
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  align-items: center;
}

.guide-philosophy-content h3 {
  font-size: 1.65rem;
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.3;
  margin-bottom: 14px;
}

.guide-philosophy-content p {
  font-size: 0.98rem;
  line-height: 1.65;
  color: var(--color-text-muted);
  margin: 0;
}

.guide-value-pills {
  display: flex;
  flex-direction: column;
  gap: 14px;
}

.guide-value-pill {
  background: #ffffff;
  border: 1px solid #e2e8f0;
  border-radius: 12px;
  padding: 14px 18px;
  display: flex;
  align-items: center;
  gap: 14px;
  font-size: 0.92rem;
  font-weight: 600;
  color: var(--color-primary);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
}

.guide-value-icon {
  width: 28px;
  height: 28px;
  border-radius: 50%;
  background: rgba(0, 80, 231, 0.1);
  color: var(--color-accent);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.guide-value-icon svg {
  width: 14px;
  height: 14px;
  fill: currentColor;
}

/* Bottom CTA Banner */
.guide-bottom-banner {
  padding: 80px 0;
  background: radial-gradient(circle at 50% 50%, rgba(0, 80, 231, 0.04) 0%, transparent 70%), #ffffff;
  border-top: 1px solid var(--color-gray-200);
  text-align: center;
}

.guide-bottom-box {
  max-width: 820px;
  margin: 0 auto;
}

.guide-bottom-box h2 {
  font-size: clamp(2rem, 3.4vw, 2.8rem);
  font-weight: 700;
  color: var(--color-primary);
  line-height: 1.2;
  margin-bottom: 16px;
}

.guide-bottom-box p {
  font-size: 1.1rem;
  line-height: 1.6;
  color: var(--color-text-muted);
  margin-bottom: 30px;
}

.guide-bottom-actions {
  display: flex;
  justify-content: center;
  gap: 16px;
  flex-wrap: wrap;
}

/* Responsive */
@media (max-width: 991px) {
  .guide-spotlight {
    grid-template-columns: 1fr;
    gap: 28px;
    padding: 30px 24px;
  }

  .guides-grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }

  .guide-philosophy-banner {
    grid-template-columns: 1fr;
    gap: 28px;
    padding: 32px 24px;
  }
}

@media (max-width: 768px) {
  .guide-hero {
    padding: 100px 0 40px;
  }

  .guides-grid {
    grid-template-columns: 1fr;
  }

  .guide-card {
    padding: 22px 20px;
  }

  .guide-bottom-actions {
    flex-direction: column;
    align-items: stretch;
  }

  .guide-bottom-actions .c-btn {
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
  <section class="guide-hero">
    <div class="container">
      
      <span class="guide-badge">Engineering &amp; Founder Playbooks</span>
      
      <h1 class="guide-hero-title">
        Practical Blueprints for Building &amp; Scaling <mark>Digital Products</mark>.
      </h1>

      <p class="guide-hero-desc">
        No sales fluff, no enterprise jargon, and zero filler. We share real-world architectural frameworks, MVP launch roadmaps, tech stack comparisons, and scaling lessons learned shipping products for ambitious founders and growing brands.
      </p>

      <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap; margin-bottom: 34px;">
        <a href="#featured-playbooks" class="c-btn -primary" style="padding: 14px 30px;">
          <span class="c-btn__txt">Browse Playbooks Below</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
        <a href="{{ route('free-trial') }}" class="c-btn -secondary" style="padding: 14px 28px;">
          <span class="c-btn__txt">Get Free Project Estimate</span>
        </a>
      </div>

      <div class="hero-badges" data-viewport="true" style="margin-top: 10px;">
        <div class="hero-badge-item">100% Free Playbooks</div>
        <div class="hero-badge-item">Founder-First Architecture</div>
        <div class="hero-badge-item">Production-Proven Patterns</div>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       FEATURED FLAGSHIP PLAYBOOK SPOTLIGHT
       ======================================================================== -->
  <section style="padding: 60px 0 20px; background: #ffffff;">
    <div class="container">
      
      <div class="guide-spotlight">
        <div>
          <span class="guide-spotlight-tag">Featured Master Playbook</span>
          <h2 class="guide-spotlight-title">The Startup MVP Launch Blueprint: From Concept to Production in 6 Weeks</h2>
          <p class="guide-spotlight-text">
            Most startups fail not because they couldn't build software, but because they over-engineered features nobody wanted or got trapped in endless agency scope creep. This blueprint details the exact 4-sprint framework we use at Bluebase to validate requirements, build core user journeys, and deploy secure, scalable web and mobile MVPs on time.
          </p>

          <ul class="guide-checklist-preview">
            <li>
              <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span>Ruthless Scope Trimming: Eliminating 60% of non-critical Day-1 features</span>
            </li>
            <li>
              <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span>Stack Selection: Why monolithic speed beats microservices complexity for early MVPs</span>
            </li>
            <li>
              <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
              <span>Production Readiness: Zero-downtime CI/CD, SSL, DB backups, and error telemetry</span>
            </li>
          </ul>

          <div style="display: flex; gap: 14px; align-items: center; flex-wrap: wrap;">
            <a href="{{ route('services.saas-mvp-development') }}" class="c-btn -primary" style="padding: 12px 24px;">
              <span class="c-btn__txt">Explore MVP Services</span>
              <span class="c-btn__ico">
                <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              </span>
            </a>
            <a href="{{ route('contact') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
              Discuss Your MVP Scope With Our Builders &rarr;
            </a>
          </div>
        </div>

        <div class="guide-spotlight-meta-box">
          <div class="guide-meta-item">
            <span class="guide-meta-label">Target Audience</span>
            <span class="guide-meta-value">Early-Stage Founders, Solo Entrepreneurs, Product Owners</span>
          </div>
          <div class="guide-meta-item">
            <span class="guide-meta-label">Recommended Tech Stacks</span>
            <span class="guide-meta-value">Laravel + MySQL, Next.js / TypeScript, Flutter Mobile</span>
          </div>
          <div class="guide-meta-item">
            <span class="guide-meta-label">Typical Delivery Timeline</span>
            <span class="guide-meta-value">4 to 6 Agile Milestone Sprints</span>
          </div>
          <div class="guide-meta-item">
            <span class="guide-meta-label">Cost Optimization</span>
            <span class="guide-meta-value">Milestone-Based Billing, 100% Client Code Ownership</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       GUIDE CATALOG & PLAYBOOKS GRID
       ======================================================================== -->
  <section class="guide-catalog-section" id="featured-playbooks">
    <div class="container">
      
      <div class="guide-section-header">
        <span class="section-tag">Playbook Library</span>
        <h2>Practical Guides for Every Product Stage</h2>
        <p>
          Whether you are launching your initial prototype, rebuilding an outdated platform, or scaling custom business software, explore our architectural blueprints.
        </p>
      </div>

      <div class="guides-grid">
        
        <!-- Guide 1: Mobile Cross-Platform Strategy -->
        <div class="guide-card">
          <div class="guide-card-top">
            <div class="guide-card-header-bar">
              <span class="guide-card-category">Mobile Engineering</span>
              <span class="guide-read-time">7 min read</span>
            </div>
            <h3 class="guide-card-title">Flutter vs. React Native: The Founder's Practical Decision Guide</h3>
            <p class="guide-card-desc">
              A straightforward comparison of performance, UI consistency, third-party native plugin ecosystems, and development speed for launching iOS &amp; Android apps from a single codebase.
            </p>
            <ul class="guide-key-points">
              <li>When Flutter outperforms React Native for custom animation and rendering</li>
              <li>How React Native leverages existing JavaScript web team skillsets</li>
              <li>App Store approval benchmarks &amp; store guidelines compliance</li>
            </ul>
          </div>
          <div class="guide-card-action">
            <a href="{{ route('services.mobile-app-development') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
              <span class="c-btn__txt">Read Mobile Guide</span>
            </a>
            <span style="font-size: 0.8rem; color: #64748b; font-weight: 500;">Cross-Platform</span>
          </div>
        </div>

        <!-- Guide 2: Website Redesign & Conversion Speed -->
        <div class="guide-card">
          <div class="guide-card-top">
            <div class="guide-card-header-bar">
              <span class="guide-card-category">Web Performance</span>
              <span class="guide-read-time">5 min read</span>
            </div>
            <h3 class="guide-card-title">The Sub-Second Web Speed &amp; Conversion Blueprint</h3>
            <p class="guide-card-desc">
              How modern corporate websites achieve 95+ Google PageSpeed scores, zero cumulative layout shifts (CLS), and double lead conversion without bloated page builders.
            </p>
            <ul class="guide-key-points">
              <li>Replacing heavy CMS builders with lightweight, clean modular Blade/HTML</li>
              <li>Asset optimization, modern WebP/AVIF formats, and critical CSS inlining</li>
              <li>Structuring UX hierarchy to convert inbound traffic into booked discovery calls</li>
            </ul>
          </div>
          <div class="guide-card-action">
            <a href="{{ route('services.website-redesign') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
              <span class="c-btn__txt">Explore Speed Tactics</span>
            </a>
            <span style="font-size: 0.8rem; color: #64748b; font-weight: 500;">Core Web Vitals</span>
          </div>
        </div>

        <!-- Guide 3: Custom Business Software & Fleet ERP -->
        <div class="guide-card">
          <div class="guide-card-top">
            <div class="guide-card-header-bar">
              <span class="guide-card-category">Custom ERP &amp; Ops</span>
              <span class="guide-read-time">9 min read</span>
            </div>
            <h3 class="guide-card-title">Building a Custom Fleet &amp; Rental Management System</h3>
            <p class="guide-card-desc">
              How brick-and-mortar rental and logistics businesses digitize operations with real-time vehicle grids, paperless digital KYC, and automated deposit ledgers.
            </p>
            <ul class="guide-key-points">
              <li>Eliminating double-bookings with live atomic inventory status locking</li>
              <li>Instant paperless KYC: mobile camera upload &amp; digital canvas signature</li>
              <li>Automated WhatsApp booking confirmations and dynamic weekend pricing</li>
            </ul>
          </div>
          <div class="guide-card-action">
            <a href="{{ route('customer-stories.omg-rental-bikes') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
              <span class="c-btn__txt">View Live Case Study</span>
            </a>
            <span style="font-size: 0.8rem; color: #047857; font-weight: 600;">OMG Rental Bikes</span>
          </div>
        </div>

        <!-- Guide 4: E-Commerce Architecture & Scaling -->
        <div class="guide-card">
          <div class="guide-card-top">
            <div class="guide-card-header-bar">
              <span class="guide-card-category">E-Commerce Tech</span>
              <span class="guide-read-time">6 min read</span>
            </div>
            <h3 class="guide-card-title">Scaling Online Stores: Custom Storefronts vs. Shopify</h3>
            <p class="guide-card-desc">
              When should growing D2C brands stay on SaaS platforms, and when does proprietary custom store architecture unlock better checkout speed, zero transaction fees, and higher margins?
            </p>
            <ul class="guide-key-points">
              <li>Analyzing app subscription fatigue &amp; platform transaction cut taxes</li>
              <li>Engineering frictionless 1-click checkout flows and UPI integration</li>
              <li>Real-time multi-warehouse inventory syncing and ERP connectors</li>
            </ul>
          </div>
          <div class="guide-card-action">
            <a href="{{ route('services.ecommerce-development') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
              <span class="c-btn__txt">Read E-Commerce Guide</span>
            </a>
            <span style="font-size: 0.8rem; color: #64748b; font-weight: 500;">D2C Commerce</span>
          </div>
        </div>

        <!-- Guide 5: UI/UX Prototyping & Design Systems -->
        <div class="guide-card">
          <div class="guide-card-top">
            <div class="guide-card-header-bar">
              <span class="guide-card-category">UI/UX Product Design</span>
              <span class="guide-read-time">6 min read</span>
            </div>
            <h3 class="guide-card-title">Figma-to-Code: Building Clean Design Systems That Actually Ship</h3>
            <p class="guide-card-desc">
              Bridging the gap between Figma mockups and production-ready code. How modular component libraries keep dev velocity high while maintaining brand polish.
            </p>
            <ul class="guide-key-points">
              <li>Setting up tokenized color palettes, type scales, and responsive grids</li>
              <li>Designing for mobile-first thumb zones and accessible interactions</li>
              <li>Handoff protocols that eliminate developer guessing and rework</li>
            </ul>
          </div>
          <div class="guide-card-action">
            <a href="{{ route('services.ui-ux-design') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
              <span class="c-btn__txt">Explore Design Playbook</span>
            </a>
            <span style="font-size: 0.8rem; color: #64748b; font-weight: 500;">Design Systems</span>
          </div>
        </div>

        <!-- Guide 6: Transparent Milestone Sprints -->
        <div class="guide-card">
          <div class="guide-card-top">
            <div class="guide-card-header-bar">
              <span class="guide-card-category">Engineering Culture</span>
              <span class="guide-read-time">4 min read</span>
            </div>
            <h3 class="guide-card-title">The Agile Milestone Contract: Why Pay-as-You-Verify Protects Founders</h3>
            <p class="guide-card-desc">
              Why traditional agency monthly retainers align incentives against the client, and how sprint-based milestone deliverables guarantee full transparency and code ownership.
            </p>
            <ul class="guide-key-points">
              <li>Weekly live staging server links so you test working software every sprint</li>
              <li>Transparent fixed-scope milestones with zero surprise change-order fees</li>
              <li>Full GitHub repo handover and automated deployment documentation</li>
            </ul>
          </div>
          <div class="guide-card-action">
            <a href="{{ route('how-we-work') }}" class="c-btn -link" style="color: var(--color-accent); font-weight: 600;">
              <span class="c-btn__txt">Our Agile Process</span>
            </a>
            <span style="font-size: 0.8rem; color: #64748b; font-weight: 500;">Zero Bureaucracy</span>
          </div>
        </div>

      </div>

      <!-- Philosophy Callout Banner -->
      <div class="guide-philosophy-banner">
        <div class="guide-philosophy-content">
          <span class="section-tag" style="margin-bottom: 10px;">Our Philosophy</span>
          <h3>Why We Make Our Engineering Playbooks Public</h3>
          <p>
            Too many software agencies treat technology like magic and gatekeep basic information to justify bloated markups. We believe founders make better decisions when they understand the engineering behind their product. Whether you build with Bluebase or with your own team, these playbooks help you avoid expensive mistakes and launch faster.
          </p>
        </div>
        <div class="guide-value-pills">
          <div class="guide-value-pill">
            <div class="guide-value-icon">
              <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
            </div>
            <span>100% Client Intellectual Property &amp; Code Ownership</span>
          </div>
          <div class="guide-value-pill">
            <div class="guide-value-icon">
              <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
            </div>
            <span>Direct Builder Access: No Junior Middlemen or Account Execs</span>
          </div>
          <div class="guide-value-pill">
            <div class="guide-value-icon">
              <svg viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
            </div>
            <span>Transparent Milestone Pricing: Pay as You Verify Code</span>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ========================================================================
       BOTTOM CTA CONVERSION BANNER
       ======================================================================== -->
  <section class="guide-bottom-banner">
    <div class="container">
      <div class="guide-bottom-box" data-viewport="true">
        <span class="section-tag">Next Move</span>
        <h2>Ready to Turn These Playbooks Into Working Software?</h2>
        <p>
          Skip the lengthy agency pitches and get direct access to skilled builders. Tell us about your web, mobile, or SaaS project and receive a detailed milestone breakdown within 48 hours.
        </p>
        <div class="guide-bottom-actions">
          <a href="{{ route('contact') }}" class="c-btn -primary" style="padding: 16px 36px; font-size: 1rem;">
            <span class="c-btn__txt">Start Your Project</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('free-trial') }}" class="c-btn -secondary" style="padding: 16px 32px; font-size: 1rem;">
            <span class="c-btn__txt">Get Free Project Estimate</span>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection
