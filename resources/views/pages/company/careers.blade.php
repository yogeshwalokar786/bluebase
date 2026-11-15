@extends('layouts.app')

@section('title', 'Careers at Bluebase | Join Our High-Agency Engineering Teams')
@section('meta_description', 'Explore career opportunities at Bluebase Technologies. We are hiring senior full-stack engineers, AI researchers, and systems architects for 100% remote-first engineering pods.')

@push('styles')
<style>
/* ==========================================================================
   CAREERS PAGE - REDESIGNED MODERN ARCHITECTURE
   ========================================================================== */

/* 1. Hero Section */
.careers-hero {
  padding: 130px 0 70px;
  background: 
    radial-gradient(circle at 85% 15%, rgba(0, 80, 231, 0.08) 0%, transparent 55%),
    radial-gradient(circle at 15% 85%, rgba(56, 189, 248, 0.06) 0%, transparent 50%),
    #ffffff;
  position: relative;
  border-bottom: 1px solid var(--color-gray-200);
  overflow: hidden;
}

.careers-hero-grid {
  position: absolute;
  inset: 0;
  background-size: 40px 40px;
  background-image: 
    linear-gradient(to right, rgba(0, 80, 231, 0.03) 1px, transparent 1px),
    linear-gradient(to bottom, rgba(0, 80, 231, 0.03) 1px, transparent 1px);
  pointer-events: none;
  opacity: 0.7;
}

.careers-badge {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 6px 16px;
  border-radius: 9999px;
  background: rgba(0, 80, 231, 0.08);
  border: 1px solid rgba(0, 80, 231, 0.22);
  color: var(--color-accent);
  font-size: 0.8rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.08em;
  margin-bottom: 22px;
}

.careers-badge-dot {
  width: 7px;
  height: 7px;
  border-radius: 50%;
  background: #10b981;
  box-shadow: 0 0 10px #10b981;
  animation: pulseLiveGreen 2s infinite ease-in-out;
}

@keyframes pulseLiveGreen {
  0%, 100% { opacity: 1; transform: scale(1); }
  50% { opacity: 0.4; transform: scale(0.85); }
}

.careers-title {
  font-size: clamp(2.3rem, 4.5vw, 3.8rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.12;
  letter-spacing: -0.03em;
  margin-bottom: 22px;
  max-width: 940px;
}

.careers-title mark {
  background: transparent;
  color: var(--color-accent);
}

.careers-desc {
  font-size: 1.15rem;
  line-height: 1.65;
  color: var(--color-gray-600);
  max-width: 820px;
  margin-bottom: 34px;
}

.careers-hero-actions {
  display: flex;
  align-items: center;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 40px;
}

.careers-stat-strip {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 18px;
  padding-top: 32px;
  border-top: 1px solid var(--color-gray-200);
}

.careers-stat-card {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.careers-stat-num {
  font-size: 1.55rem;
  font-weight: 800;
  color: var(--color-primary);
  letter-spacing: -0.02em;
}

.careers-stat-label {
  font-size: 0.85rem;
  color: var(--color-gray-600);
  font-weight: 500;
  line-height: 1.4;
}

/* 2. Culture & Why Build Here Section */
.careers-culture-section {
  padding: 85px 0;
  background: #f8fafc;
  border-bottom: 1px solid var(--color-gray-200);
}

.careers-section-header {
  text-align: center;
  max-width: 760px;
  margin: 0 auto 56px;
}

.careers-tag {
  display: inline-block;
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--color-accent);
  text-transform: uppercase;
  letter-spacing: 0.12em;
  margin-bottom: 12px;
}

.careers-section-title {
  font-size: clamp(2rem, 3.2vw, 2.7rem);
  font-weight: 800;
  color: var(--color-primary);
  letter-spacing: -0.025em;
  line-height: 1.2;
  margin-bottom: 16px;
}

.careers-section-sub {
  font-size: 1.05rem;
  color: var(--color-gray-600);
  line-height: 1.6;
}

.careers-culture-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.careers-culture-card {
  background: #ffffff;
  border-radius: 16px;
  padding: 32px 28px;
  border: 1px solid var(--color-gray-200);
  box-shadow: 0 4px 18px rgba(0, 0, 0, 0.03);
  transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
  display: flex;
  flex-direction: column;
}

.careers-culture-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 30px rgba(0, 80, 231, 0.08);
  border-color: rgba(0, 80, 231, 0.3);
}

.careers-icon-box {
  width: 48px;
  height: 48px;
  border-radius: 12px;
  background: rgba(0, 80, 231, 0.08);
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  margin-bottom: 20px;
}

.careers-culture-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: 12px;
  letter-spacing: -0.015em;
}

.careers-culture-text {
  font-size: 0.95rem;
  line-height: 1.6;
  color: var(--color-gray-600);
  margin: 0;
}

/* 3. Modern Tech Stack Showcase */
.careers-stack-section {
  padding: 70px 0;
  background: #ffffff;
  border-bottom: 1px solid var(--color-gray-200);
}

.careers-stack-box {
  background: linear-gradient(135deg, #0b1536 0%, #060913 100%);
  border-radius: 20px;
  padding: 44px 40px;
  color: #ffffff;
  border: 1px solid rgba(56, 189, 248, 0.2);
  box-shadow: 0 16px 40px rgba(0, 0, 0, 0.12);
}

.careers-stack-header {
  margin-bottom: 30px;
  display: flex;
  justify-content: space-between;
  align-items: flex-end;
  flex-wrap: wrap;
  gap: 16px;
}

.careers-stack-pill-cloud {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}

.careers-stack-pill {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  border-radius: 10px;
  background: rgba(255, 255, 255, 0.07);
  border: 1px solid rgba(255, 255, 255, 0.12);
  color: #f1f5f9;
  font-size: 0.88rem;
  font-weight: 600;
  letter-spacing: 0.02em;
  transition: all 0.2s ease;
}

.careers-stack-pill:hover {
  background: rgba(56, 189, 248, 0.15);
  border-color: #38bdf8;
  color: #ffffff;
  transform: translateY(-2px);
}

/* 4. Open Positions Section */
.careers-roles-section {
  padding: 85px 0;
  background: #ffffff;
  border-bottom: 1px solid var(--color-gray-200);
}

.careers-filter-bar {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 40px;
}

.careers-filter-btn {
  background: #f8fafc;
  border: 1px solid var(--color-gray-200);
  padding: 8px 20px;
  border-radius: 9999px;
  font-size: 0.88rem;
  font-weight: 600;
  color: var(--color-primary);
  cursor: pointer;
  transition: all 0.2s ease;
}

.careers-filter-btn:hover {
  border-color: var(--color-accent);
  color: var(--color-accent);
}

.careers-filter-btn.active {
  background: var(--color-primary);
  color: #ffffff;
  border-color: var(--color-primary);
  box-shadow: 0 4px 14px rgba(11, 18, 38, 0.15);
}

.careers-roles-grid {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.career-role-card {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 30px 32px;
  transition: all 0.25s ease;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.02);
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 24px;
}

.career-role-card:hover {
  border-color: rgba(0, 80, 231, 0.4);
  box-shadow: 0 10px 28px rgba(0, 80, 231, 0.08);
  transform: translateY(-2px);
}

.career-role-main {
  flex: 1;
}

.career-role-meta-row {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 10px;
  flex-wrap: wrap;
}

.career-badge-dept {
  font-size: 0.75rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.06em;
  padding: 4px 10px;
  border-radius: 6px;
  background: rgba(0, 80, 231, 0.08);
  color: var(--color-accent);
}

.career-badge-loc {
  font-size: 0.82rem;
  color: var(--color-gray-600);
  display: flex;
  align-items: center;
  gap: 5px;
  font-weight: 500;
}

.career-badge-type {
  font-size: 0.82rem;
  color: #16a34a;
  background: rgba(22, 163, 74, 0.1);
  padding: 3px 8px;
  border-radius: 6px;
  font-weight: 600;
}

.career-role-title {
  font-size: 1.35rem;
  font-weight: 750;
  color: var(--color-primary);
  margin-bottom: 10px;
  letter-spacing: -0.015em;
}

.career-role-desc {
  font-size: 0.95rem;
  color: var(--color-gray-600);
  line-height: 1.55;
  margin-bottom: 16px;
  max-width: 820px;
}

.career-role-tags {
  display: flex;
  align-items: center;
  gap: 8px;
  flex-wrap: wrap;
}

.career-tag-pill {
  font-size: 0.78rem;
  font-weight: 600;
  padding: 4px 10px;
  border-radius: 6px;
  background: #f1f5f9;
  color: var(--color-gray-700);
}

.career-role-actions {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 10px;
  min-width: 170px;
}

.career-apply-btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 24px;
  border-radius: 10px;
  background: var(--color-accent);
  color: #ffffff;
  font-weight: 700;
  font-size: 0.9rem;
  text-decoration: none;
  transition: all 0.2s ease;
  border: 1px solid var(--color-accent);
  cursor: pointer;
  white-space: nowrap;
}

.career-apply-btn:hover {
  background: #0043c7;
  box-shadow: 0 4px 14px rgba(0, 80, 231, 0.35);
  color: #ffffff;
}

/* 5. Transparent 4-Step Hiring Roadmap */
.careers-hiring-process {
  padding: 85px 0;
  background: #f8fafc;
  border-bottom: 1px solid var(--color-gray-200);
}

.hiring-steps-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 22px;
  position: relative;
}

.hiring-step-card {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 30px 24px;
  position: relative;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.02);
}

.hiring-step-badge {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 38px;
  height: 38px;
  border-radius: 10px;
  background: var(--color-primary);
  color: #ffffff;
  font-weight: 800;
  font-size: 0.95rem;
  margin-bottom: 18px;
}

.hiring-step-title {
  font-size: 1.15rem;
  font-weight: 750;
  color: var(--color-primary);
  margin-bottom: 10px;
  letter-spacing: -0.015em;
}

.hiring-step-desc {
  font-size: 0.9rem;
  line-height: 1.55;
  color: var(--color-gray-600);
  margin: 0;
}

/* 6. Candidate FAQ Section */
.careers-faq-section {
  padding: 85px 0;
  background: #ffffff;
  border-bottom: 1px solid var(--color-gray-200);
}

.careers-faq-layout {
  display: grid;
  grid-template-columns: 360px 1fr;
  gap: 50px;
}

.careers-faq-left {
  position: sticky;
  top: 100px;
  height: fit-content;
}

.careers-accordion-item {
  border-bottom: 1px solid var(--color-gray-200);
  padding: 22px 0;
}

.careers-accordion-item:first-child {
  padding-top: 0;
}

.careers-accordion-trigger {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  background: none;
  border: none;
  padding: 0;
  text-align: left;
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--color-primary);
  cursor: pointer;
  transition: color 0.2s ease;
}

.careers-accordion-trigger:hover {
  color: var(--color-accent);
}

.careers-accordion-icon {
  width: 32px;
  height: 32px;
  border-radius: 8px;
  background: #f1f5f9;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: transform 0.25s ease, background 0.25s ease;
}

.careers-accordion-item.active .careers-accordion-icon {
  transform: rotate(45deg);
  background: rgba(0, 80, 231, 0.1);
  color: var(--color-accent);
}

.careers-accordion-body {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.35s cubic-bezier(0.4, 0, 0.2, 1);
}

.careers-accordion-inner {
  padding-top: 14px;
  font-size: 0.95rem;
  line-height: 1.65;
  color: var(--color-gray-600);
}

/* 7. Closing High-Agency Candidate CTA */
.careers-cta-section {
  padding: 85px 0;
  background: #f8fafc;
}

.careers-cta-box {
  background: radial-gradient(ellipse at center, #0b1536 0%, #060913 70%, #020408 100%);
  border-radius: 24px;
  padding: 60px 48px;
  text-align: center;
  color: #ffffff;
  position: relative;
  overflow: hidden;
  border: 1px solid rgba(56, 189, 248, 0.25);
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
}

.careers-cta-title {
  font-size: clamp(2rem, 3.5vw, 2.9rem);
  font-weight: 800;
  line-height: 1.2;
  margin-bottom: 18px;
  letter-spacing: -0.025em;
}

.careers-cta-title mark {
  background: transparent;
  color: #38bdf8;
}

.careers-cta-desc {
  font-size: 1.1rem;
  color: #94a3b8;
  max-width: 680px;
  margin: 0 auto 34px;
  line-height: 1.6;
}

.careers-cta-actions {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 16px;
  flex-wrap: wrap;
  margin-bottom: 30px;
}

.careers-cta-pill-row {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 18px;
  flex-wrap: wrap;
  font-size: 0.85rem;
  color: #94a3b8;
}

.careers-cta-pill-item {
  display: flex;
  align-items: center;
  gap: 8px;
}

.careers-cta-pill-item::before {
  content: "✓";
  color: #38bdf8;
  font-weight: 800;
}

/* Quick Application Modal */
.careers-modal-backdrop {
  position: fixed;
  inset: 0;
  background: rgba(11, 18, 38, 0.7);
  backdrop-filter: blur(8px);
  z-index: 999999;
  display: none;
  align-items: center;
  justify-content: center;
  padding: 20px;
  opacity: 0;
  transition: opacity 0.25s ease;
}

.careers-modal-backdrop.show {
  display: flex;
  opacity: 1;
}

.careers-modal-card {
  background: #ffffff;
  border-radius: 20px;
  width: 100%;
  max-width: 580px;
  padding: 36px 32px;
  box-shadow: 0 25px 60px rgba(0, 0, 0, 0.2);
  position: relative;
  transform: translateY(20px);
  transition: transform 0.25s ease;
}

.careers-modal-backdrop.show .careers-modal-card {
  transform: translateY(0);
}

.careers-modal-close {
  position: absolute;
  top: 20px;
  right: 20px;
  background: #f1f5f9;
  border: none;
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-gray-600);
  cursor: pointer;
  font-size: 1.2rem;
  transition: all 0.2s ease;
}

.careers-modal-close:hover {
  background: #e2e8f0;
  color: var(--color-primary);
}

/* Responsive adjustments */
@media (max-width: 1024px) {
  .careers-culture-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .hiring-steps-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .careers-faq-layout {
    grid-template-columns: 1fr;
    gap: 36px;
  }
  .careers-faq-left {
    position: static;
  }
  .careers-stat-strip {
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
}

@media (max-width: 768px) {
  .careers-hero {
    padding: 100px 0 50px;
  }
  .careers-culture-grid {
    grid-template-columns: 1fr;
  }
  .hiring-steps-grid {
    grid-template-columns: 1fr;
  }
  .career-role-card {
    flex-direction: column;
    align-items: flex-start;
  }
  .career-role-actions {
    align-items: flex-start;
    width: 100%;
  }
  .career-apply-btn {
    width: 100%;
  }
  .careers-cta-box {
    padding: 40px 20px;
  }
}
</style>
@endpush

@section('content')
<main id="main-content">

  <!-- 1. HERO SECTION -->
  <section class="careers-hero">
    <div class="careers-hero-grid" aria-hidden="true"></div>
    <div class="container" style="position: relative; z-index: 2;">
      
      <div class="careers-badge">
        <span class="careers-badge-dot"></span>
        <span>We Are Hiring &bull; Remote-First Global Engineering Pods</span>
      </div>

      <h1 class="careers-title">
        Build High-Impact Software With <mark>Builders, Not Bureaucrats</mark>.
      </h1>

      <p class="careers-desc">
        Join Bluebase as a full-stack engineer, AI systems architect, or cloud specialist. We are a high-agency, remote-first engineering studio where top engineers write production code, experiment with autonomous agent frameworks, and solve real architectural problems.
      </p>

      <div class="careers-hero-actions">
        <a href="#openPositions" class="c-btn -primary" style="padding: 14px 28px; font-size: 0.95rem;">
          <span class="c-btn__txt">View Open Positions (6)</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base">
              <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </span>
          </span>
        </a>
        <a href="#whyBluebase" class="c-btn -secondary" style="padding: 14px 28px; font-size: 0.95rem;">
          <span class="c-btn__txt">Why Build at Bluebase</span>
        </a>
      </div>

      <!-- Quick Metrics Strip -->
      <div class="careers-stat-strip">
        <div class="careers-stat-card">
          <div class="careers-stat-num">100%</div>
          <div class="careers-stat-label">Remote-first with asynchronous, deep-work autonomy</div>
        </div>
        <div class="careers-stat-card">
          <div class="careers-stat-num">Sprint 1</div>
          <div class="careers-stat-label">Ship real code to client production in your first sprint</div>
        </div>
        <div class="careers-stat-card">
          <div class="careers-stat-num">0 Meetings</div>
          <div class="careers-stat-label">Zero pointless status updates &bull; Spec &amp; code-driven delivery</div>
        </div>
        <div class="careers-stat-card">
          <div class="careers-stat-num">1&ndash;2 Weeks</div>
          <div class="careers-stat-label">Fast, respectful interview loop with senior engineering peers</div>
        </div>
      </div>

    </div>
  </section>

  <!-- CLIENT LOGO MARQUEE -->
  @include('partials.client-marquee', ['heading' => 'Our teams engineer mission-critical systems for fast-growing startups and enterprises'])

  <!-- 2. WHY BUILD AT BLUEBASE (CULTURE & VALUES) -->
  <section class="careers-culture-section" id="whyBluebase">
    <div class="container">
      
      <div class="careers-section-header">
        <span class="careers-tag">Life &amp; Engineering at Bluebase</span>
        <h2 class="careers-section-title">Designed for Engineers Who Love Shipping.</h2>
        <p class="careers-section-sub">
          We strip away corporate theater, politics, and layers of middle management so you can focus on mastering your craft and solving complex distributed systems and AI challenges.
        </p>
      </div>

      <div class="careers-culture-grid">
        
        <!-- Card 1 -->
        <div class="careers-culture-card">
          <div class="careers-icon-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
          </div>
          <h3 class="careers-culture-title">Asynchronous Deep Work</h3>
          <p class="careers-culture-text">
            We prioritize written documentation, detailed RFCs, and asynchronous communication over endless calendar invites. Enjoy 4+ hours of uninterrupted flow state every single day.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="careers-culture-card">
          <div class="careers-icon-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
          </div>
          <h3 class="careers-culture-title">High Agency &amp; Code Ownership</h3>
          <p class="careers-culture-text">
            Engineers own features from architecture design to production monitoring. If you identify a cleaner pattern, better database index, or faster API abstraction, you have full license to execute it.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="careers-culture-card">
          <div class="careers-icon-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
          </div>
          <h3 class="careers-culture-title">Top-Tier Compensation &amp; Stipend</h3>
          <p class="careers-culture-text">
            We pay competitive salaries aligned with top global talent benchmarks. You also receive comprehensive health coverage, performance incentives, and home office workstation setup allowances.
          </p>
        </div>

        <!-- Card 4 -->
        <div class="careers-culture-card">
          <div class="careers-icon-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
          </div>
          <h3 class="careers-culture-title">Annual Learning &amp; AI Budget</h3>
          <p class="careers-culture-text">
            Every engineer receives an annual stipend for engineering books, specialized technical courses, cloud lab credits, and cutting-edge LLM API access (OpenAI, Claude, Cursor Pro).
          </p>
        </div>

        <!-- Card 5 -->
        <div class="careers-culture-card">
          <div class="careers-icon-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect><line x1="8" y1="21" x2="16" y2="21"></line><line x1="12" y1="17" x2="12" y2="21"></line></svg>
          </div>
          <h3 class="careers-culture-title">Modern Hardware &amp; Tooling</h3>
          <p class="careers-culture-text">
            Work with top-of-the-line Apple Silicon (M3 Pro/Max) or high-spec Linux hardware. We use modern tools like Linear, GitHub Enterprise, Figma, and automated Docker staging preview environments.
          </p>
        </div>

        <!-- Card 6 -->
        <div class="careers-culture-card">
          <div class="careers-icon-box">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
          </div>
          <h3 class="careers-culture-title">Direct Builder Collaboration</h3>
          <p class="careers-culture-text">
            Collaborate directly with our founders and technical directors who still review code and architect systems daily. No non-technical layers passing down detached requirements.
          </p>
        </div>

      </div>

    </div>
  </section>

  <!-- 3. OUR TECH STACK CANVAS -->
  <section class="careers-stack-section">
    <div class="container">
      <div class="careers-stack-box">
        <div class="careers-stack-header">
          <div>
            <span style="font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.12em; color: #38bdf8; font-weight: 700;">Our Production Toolchain</span>
            <h3 style="font-size: 1.8rem; font-weight: 800; margin: 6px 0 0; color: #ffffff;">The Technologies We Love Shipping With</h3>
          </div>
          <p style="color: #94a3b8; font-size: 0.95rem; max-width: 440px; margin: 0; line-height: 1.5;">
            We don't chase every fleeting trend, but we aggressively adopt tools that make engineers 10x faster and systems 10x more resilient.
          </p>
        </div>

        <div class="careers-stack-pill-cloud">
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Go (Golang)</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> React 19 &amp; Next.js</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> TypeScript</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Python &amp; FastAPI</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> PyTorch &amp; HuggingFace</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Multi-Agent LLMs</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Qdrant &amp; pgvector</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> PostgreSQL</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Redis &amp; Kafka</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Docker &amp; Kubernetes</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> AWS &amp; Cloudflare</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Terraform IaC</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> React Native &amp; SQLite</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Laravel 11 / PHP 8.3</div>
          <div class="careers-stack-pill"><span style="color: #38bdf8;">#</span> Cursor AI &amp; Linear</div>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. OPEN POSITIONS BOARD -->
  <section class="careers-roles-section" id="openPositions">
    <div class="container">
      
      <div class="careers-section-header">
        <span class="careers-tag">Current Openings</span>
        <h2 class="careers-section-title">Explore Open Roles in Our Engineering Squads</h2>
        <p class="careers-section-sub">
          We are actively looking for exceptional engineers and designers to join our pods. All positions are 100% remote-first.
        </p>
      </div>

      <!-- Category Filter Tabs -->
      <div class="careers-filter-bar">
        @foreach($categories as $catKey => $cat)
          <button class="careers-filter-btn {{ $loop->first ? 'active' : '' }}" data-filter="{{ $catKey }}">
            {{ $cat['label'] }}
          </button>
        @endforeach
      </div>

      <!-- Job Roles Grid -->
      <div class="careers-roles-grid">
        @forelse($jobs as $job)
          <div class="career-role-card" data-category="{{ $job->category }}">
            <div class="career-role-main">
              <div class="career-role-meta-row">
                @if(!empty($job->department))
                  <span class="career-badge-dept">{{ $job->department }}</span>
                @endif
                <span class="career-badge-loc">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                  {{ $job->location ?? 'Remote (India / Global)' }}
                </span>
                <span class="career-badge-type">{{ $job->type ?? 'Full-time' }}</span>
                @if(!empty($job->experience))
                  <span class="career-badge-dept" style="background: rgba(30, 41, 59, 0.6); color: #cbd5e1; border-color: rgba(255, 255, 255, 0.08);">{{ $job->experience }}</span>
                @endif
              </div>
              <h3 class="career-role-title">{{ $job->title }}</h3>
              <p class="career-role-desc">
                {{ $job->description }}
              </p>
              @if(!empty($job->skills_list))
                <div class="career-role-tags">
                  @foreach($job->skills_list as $skill)
                    <span class="career-tag-pill">{{ trim($skill) }}</span>
                  @endforeach
                </div>
              @endif
            </div>
            <div class="career-role-actions">
              <button class="career-apply-btn open-apply-modal-btn" data-role="{{ $job->title }}">
                Apply For Role &rarr;
              </button>
              <span style="font-size: 0.8rem; color: var(--color-gray-600);">Fast 24h Review</span>
            </div>
          </div>
        @empty
          <div style="grid-column: 1 / -1; padding: 3rem 1.5rem; text-align: center; background: rgba(15, 23, 42, 0.6); border: 1px dashed rgba(255, 255, 255, 0.12); border-radius: 14px;">
            <p style="color: #94a3b8; font-size: 1.05rem; margin-bottom: 1rem;">No positions currently open in this category. We are always happy to connect with standout engineers and designers.</p>
            <a href="mailto:careers@bluebasetechnologies.com?subject=Spontaneous%20Application%20-%20Engineering" class="career-apply-btn" style="display: inline-block;">
              Send Open Application &rarr;
            </a>
          </div>
        @endforelse
      </div>

    </div>
  </section>

  <!-- 5. TRANSPARENT 4-STEP HIRING ROADMAP -->
  <section class="careers-hiring-process">
    <div class="container">
      
      <div class="careers-section-header">
        <span class="careers-tag">Transparent Hiring</span>
        <h2 class="careers-section-title">Our 4-Step Engineering Interview Loop</h2>
        <p class="careers-section-sub">
          We respect your time. Our interview process takes 1 to 2 weeks total, with real engineering discussions rather than academic puzzles or leetcode trivia.
        </p>
      </div>

      <div class="hiring-steps-grid">
        
        <div class="hiring-step-card">
          <div class="hiring-step-badge">01</div>
          <h3 class="hiring-step-title">Async Review</h3>
          <p class="hiring-step-desc">
            We review your GitHub, recent code samples, or portfolio within 24 to 48 hours. Real engineers inspect your work, not an automated keyword filter.
          </p>
        </div>

        <div class="hiring-step-card">
          <div class="hiring-step-badge">02</div>
          <h3 class="hiring-step-title">Technical Deep-Dive</h3>
          <p class="hiring-step-desc">
            A 45-minute architectural conversation with a Lead Architect. We talk through real systems you've built, trade-offs you made, and how you solve edge cases.
          </p>
        </div>

        <div class="hiring-step-card">
          <div class="hiring-step-badge">03</div>
          <h3 class="hiring-step-title">Practical Pair Session</h3>
          <p class="hiring-step-desc">
            A collaborative 60-minute session reviewing a practical PR or troubleshooting an architecture together. We want to see how we communicate and build as peers.
          </p>
        </div>

        <div class="hiring-step-card">
          <div class="hiring-step-badge">04</div>
          <h3 class="hiring-step-title">Direct Offer &amp; Pod Intro</h3>
          <p class="hiring-step-desc">
            Transparent salary offer with clear expectations. Once accepted, we ship your equipment and integrate you into your dedicated engineering squad.
          </p>
        </div>

      </div>

    </div>
  </section>

  <!-- 6. CANDIDATE FAQ ACCORDION -->
  <section class="careers-faq-section">
    <div class="container">
      <div class="careers-faq-layout">
        
        <div class="careers-faq-left">
          <span class="careers-tag">Candidate FAQ</span>
          <h2 class="careers-section-title">Frequently Asked Questions</h2>
          <p class="careers-section-sub">
            Everything you need to know about remote pod operations, working hours, equipment, and our hiring standards.
          </p>
          <div style="margin-top: 24px;">
            <a href="mailto:info@bluebasetechnologies.com?subject=Question%20About%20Careers%20at%20Bluebase" class="c-btn -secondary" style="font-size: 0.9rem;">
              <span class="c-btn__txt">Have a Specific Question? Email Us</span>
            </a>
          </div>
        </div>

        <div class="careers-faq-right">
          
          <div class="careers-accordion-item active">
            <button class="careers-accordion-trigger" aria-expanded="true">
              <span>What are the working hours and timezone expectations?</span>
              <div class="careers-accordion-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              </div>
            </button>
            <div class="careers-accordion-body" style="max-height: 250px;">
              <div class="careers-accordion-inner">
                Bluebase is 100% remote-first. We operate on Indian Standard Time (IST, UTC+05:30) with flexible asynchronous hours. We typically ask for a consistent 3 to 4-hour live overlap during team collaborative windows (usually afternoons), while the remainder of your day is entirely uninterrupted deep work.
              </div>
            </div>
          </div>

          <div class="careers-accordion-item">
            <button class="careers-accordion-trigger" aria-expanded="false">
              <span>What hardware and home office setup do you provide?</span>
              <div class="careers-accordion-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              </div>
            </button>
            <div class="careers-accordion-body">
              <div class="careers-accordion-inner">
                We equip our full-time engineers with the latest hardware, including Apple Silicon MacBooks (M3 Pro/Max) or equivalent high-spec Linux developer workstations. We also provide a home office equipment allowance for ergonomics, external monitors, and high-speed internet expenses.
              </div>
            </div>
          </div>

          <div class="careers-accordion-item">
            <button class="careers-accordion-trigger" aria-expanded="false">
              <span>What is your stance on AI coding tools like Cursor and GitHub Copilot?</span>
              <div class="careers-accordion-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              </div>
            </button>
            <div class="careers-accordion-body">
              <div class="careers-accordion-inner">
                We actively encourage and subsidize modern AI developer tools. Every engineer receives company accounts for Cursor Pro, GitHub Copilot, and access to state-of-the-art LLMs. We believe AI empowers great engineers to focus on high-leverage architectural thinking and clean system design rather than boilerplate code.
              </div>
            </div>
          </div>

          <div class="careers-accordion-item">
            <button class="careers-accordion-trigger" aria-expanded="false">
              <span>How are performance, compensation reviews, and promotions handled?</span>
              <div class="careers-accordion-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              </div>
            </button>
            <div class="careers-accordion-body">
              <div class="careers-accordion-inner">
                Performance is evaluated on engineering output, code quality, velocity, and architectural ownership—never on vanity metrics like hours logged or messages sent. We conduct transparent bi-annual compensation reviews with market rate adjustments and milestone-based bonuses.
              </div>
            </div>
          </div>

          <div class="careers-accordion-item">
            <button class="careers-accordion-trigger" aria-expanded="false">
              <span>Can I apply if I don't see my exact tech stack or title listed?</span>
              <div class="careers-accordion-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
              </div>
            </button>
            <div class="careers-accordion-body">
              <div class="careers-accordion-inner">
                Yes! We are always eager to hire exceptional engineers, regardless of whether your exact specialty is posted right now. If you have a strong track record of shipping production software, send your resume and GitHub to <strong>info@bluebasetechnologies.com</strong> with a short note on what you love building.
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- 7. CLOSING CANDIDATE CTA BANNER -->
  <section class="careers-cta-section">
    <div class="container">
      <div class="careers-cta-box">
        
        <h2 class="careers-cta-title">
          Don't See Your Exact Role?<br><mark>Send Us a General Application</mark>.
        </h2>
        
        <p class="careers-cta-desc">
          We hire exceptional talent on a rolling basis. If you are passionate about writing clean code, building resilient distributed systems, and exploring AI frameworks, we'd love to connect with you.
        </p>

        <div class="careers-cta-actions">
          <a href="mailto:info@bluebasetechnologies.com?subject=General%20Engineering%20Application%20-%20[Your%20Name]" class="c-btn -primary" style="padding: 14px 32px; font-size: 1rem;">
            <span class="c-btn__txt">Email Your Resume &amp; GitHub</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base">
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </span>
            </span>
          </a>
          <a href="{{ route('contact') }}" class="c-btn -secondary" style="padding: 14px 28px; font-size: 1rem; color: #ffffff; border-color: rgba(255,255,255,0.25);">
            <span class="c-btn__txt">Submit via Contact Form</span>
          </a>
        </div>

        <div class="careers-cta-pill-row">
          <div class="careers-cta-pill-item">100% Remote-First Work</div>
          <div class="careers-cta-pill-item">Direct Founder &amp; Architect Review</div>
          <div class="careers-cta-pill-item">24-48h Response SLA</div>
          <div class="careers-cta-pill-item">Top-Tier Market Compensation</div>
        </div>

      </div>
    </div>
  </section>

  <!-- QUICK APPLICATION MODAL -->
  <div class="careers-modal-backdrop" id="careersApplyModal" role="dialog" aria-modal="true" aria-labelledby="modalRoleTitle">
    <div class="careers-modal-card">
      <button class="careers-modal-close" id="closeApplyModalBtn" aria-label="Close dialog">&times;</button>
      
      <span class="careers-tag">Application Instructions</span>
      <h3 id="modalRoleTitle" style="font-size: 1.45rem; font-weight: 800; color: var(--color-primary); margin: 6px 0 14px; letter-spacing: -0.015em;">
        Apply for Role
      </h3>

      <p style="font-size: 0.95rem; color: var(--color-gray-600); line-height: 1.55; margin-bottom: 22px;">
        To ensure your application is reviewed immediately by an engineering director, please send your email with the following details:
      </p>

      <div style="background: #f8fafc; border: 1px solid var(--color-gray-200); border-radius: 12px; padding: 18px 20px; font-size: 0.9rem; margin-bottom: 24px;">
        <div style="margin-bottom: 8px;"><strong>To:</strong> <a href="mailto:info@bluebasetechnologies.com" style="color: var(--color-accent); font-weight: 600;">info@bluebasetechnologies.com</a></div>
        <div style="margin-bottom: 8px;"><strong>Subject:</strong> <span id="modalSubjectPreview" style="color: var(--color-primary); font-family: monospace; font-size: 0.85rem;">Career Application: [Role] - [Your Name]</span></div>
        <div style="color: var(--color-gray-700); font-size: 0.85rem; line-height: 1.5;">
          &bull; <strong>Resume / CV:</strong> PDF attachment or Notion link<br>
          &bull; <strong>Code / Profiles:</strong> GitHub, GitLab, portfolio, or live project links<br>
          &bull; <strong>Brief intro:</strong> 2-3 sentences about the hardest engineering problem you've solved
        </div>
      </div>

      <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="#" id="modalDirectMailtoBtn" class="c-btn -primary" style="flex: 1; text-align: center; justify-content: center; padding: 12px 20px;">
          <span class="c-btn__txt">Open Email App &amp; Apply</span>
        </a>
        <a href="{{ route('contact') }}" class="c-btn -secondary" style="padding: 12px 20px;">
          <span class="c-btn__txt">Use Web Form</span>
        </a>
      </div>
    </div>
  </div>

</main>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  // 1. Category Filter Logic for Open Roles
  const filterBtns = document.querySelectorAll('.careers-filter-btn');
  const roleCards = document.querySelectorAll('.career-role-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-filter');

      roleCards.forEach(card => {
        if (filterValue === 'all' || card.getAttribute('data-category') === filterValue) {
          card.style.display = 'flex';
          card.style.opacity = '1';
        } else {
          card.style.display = 'none';
          card.style.opacity = '0';
        }
      });
    });
  });

  // 2. Candidate FAQ Accordion
  const accordionItems = document.querySelectorAll('.careers-accordion-item');
  accordionItems.forEach(item => {
    const trigger = item.querySelector('.careers-accordion-trigger');
    const body = item.querySelector('.careers-accordion-body');

    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('active');

      // Close all other accordion items
      accordionItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
          const otherTrigger = otherItem.querySelector('.careers-accordion-trigger');
          const otherBody = otherItem.querySelector('.careers-accordion-body');
          if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
          if (otherBody) otherBody.style.maxHeight = null;
        }
      });

      // Toggle current
      if (isOpen) {
        item.classList.remove('active');
        trigger.setAttribute('aria-expanded', 'false');
        body.style.maxHeight = null;
      } else {
        item.classList.add('active');
        trigger.setAttribute('aria-expanded', 'true');
        body.style.maxHeight = body.scrollHeight + 'px';
      }
    });
  });

  // 3. Application Modal Handler
  const modalBackdrop = document.getElementById('careersApplyModal');
  const modalRoleTitle = document.getElementById('modalRoleTitle');
  const modalSubjectPreview = document.getElementById('modalSubjectPreview');
  const modalDirectMailtoBtn = document.getElementById('modalDirectMailtoBtn');
  const closeModalBtn = document.getElementById('closeApplyModalBtn');
  const openModalBtns = document.querySelectorAll('.open-apply-modal-btn');

  openModalBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const role = btn.getAttribute('data-role') || 'Software Engineer';
      modalRoleTitle.textContent = 'Apply for ' + role;
      
      const subjectText = 'Career Application: ' + role + ' - [Your Name]';
      modalSubjectPreview.textContent = subjectText;
      
      const mailtoUrl = 'mailto:info@bluebasetechnologies.com?subject=' + encodeURIComponent(subjectText) + '&body=' + encodeURIComponent('Hi Bluebase Team,\n\nI am applying for the role of ' + role + '.\n\nLinkedIn: \nGitHub / Portfolio: \n\nBrief Summary of Recent Experience:\n\nLooking forward to hearing from you,\n[Your Name]');
      modalDirectMailtoBtn.setAttribute('href', mailtoUrl);

      modalBackdrop.classList.add('show');
      document.body.style.overflow = 'hidden';
    });
  });

  const closeModal = () => {
    modalBackdrop.classList.remove('show');
    document.body.style.overflow = '';
  };

  if (closeModalBtn) {
    closeModalBtn.addEventListener('click', closeModal);
  }

  modalBackdrop.addEventListener('click', (e) => {
    if (e.target === modalBackdrop) {
      closeModal();
    }
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modalBackdrop.classList.contains('show')) {
      closeModal();
    }
  });
});
</script>
@endpush
