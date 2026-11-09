@extends('layouts.app')

@section('title', 'Contact Bluebase | Remote-First Digital Engineering & AI Consultancy')
@section('meta_description', 'Connect with Bluebase. We operate as a remote-first digital engineering consultancy delivering custom software, autonomous AI agent architectures, and cloud modernization to clients worldwide.')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Get in Touch</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Let's Discuss Your Next <mark>Engineering Initiative</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          Whether you have an immediate product deadline, need a dedicated engineering pod, or want to explore an enterprise AI deployment, we're ready to help.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="#contactForm" class="c-btn -primary">
                    <span class="c-btn__txt">Send Us a Message</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('book-a-demo') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Schedule Live Discovery Call</span>
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
          <div class="hero-badge-item">24-Hour Response Guarantee</div><div class="hero-badge-item">Nagpur, India (Startup HQ)</div><div class="hero-badge-item">Operating in IST (UTC+05:30)</div>
        </div>
      </div>
    </section>

  <!-- CLIENT LOGO MARQUEE -->
  <section class="marquee-section">
    <div class="container">
      <h2 class="marquee-heading" data-viewport="true">Trusted by 600+ high-growth companies and global enterprises to engineer mission-critical digital products</h2>
    </div>
    <div class="marquee-container">
          <div class="marquee-track">
      <div class="marquee-item"><img src="{{ asset('images/clients/aarohi-logo.webp') }}" alt="Aarohi Classic Championship" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/aarya-logo.webp') }}" alt="Aarya Waste Innovations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/austin-logo.webp') }}" alt="Austin Moto Premium" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/diets-logo.webp') }}" alt="Diets by Dietitian" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/dream-logo.webp') }}" alt="Dreamland Vacations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/omg-logo.webp') }}" alt="OMG Rental Bikes" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/rednetik-logo.webp') }}" alt="Rednetik" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shine-interior-logo.png') }}" alt="Shinne Interior" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shristiyam_logo.webp') }}" alt="Shristiyam" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/trevanta_logo.webp') }}" alt="Trevanta International" loading="lazy"></div>

      <!-- Loop duplicates for continuous smooth marquee scroller -->
      <div class="marquee-item"><img src="{{ asset('images/clients/aarohi-logo.webp') }}" alt="Aarohi Classic Championship" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/aarya-logo.webp') }}" alt="Aarya Waste Innovations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/austin-logo.webp') }}" alt="Austin Moto Premium" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/diets-logo.webp') }}" alt="Diets by Dietitian" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/dream-logo.webp') }}" alt="Dreamland Vacations" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/omg-logo.webp') }}" alt="OMG Rental Bikes" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/rednetik-logo.webp') }}" alt="Rednetik" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shine-interior-logo.png') }}" alt="Shinne Interior" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/shristiyam_logo.webp') }}" alt="Shristiyam" loading="lazy"></div>
      <div class="marquee-item"><img src="{{ asset('images/clients/trevanta_logo.webp') }}" alt="Trevanta International" loading="lazy"></div>
    </div>
  </div>
    </div>
  </section>

    <!-- REMOTE-FIRST CONTACT & COMMUNICATION HUBS SECTION -->
    <section class="subpage-section" style="padding-top: 30px;">
      <div class="container" style="max-width: 1180px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 40px; align-items: start;">
          
          <!-- Remote-First Details Left -->
          <div data-viewport="true">
            <span class="section-tag">Nagpur, India • Remote-First</span>
            <h2 style="font-size: 2.1rem; font-weight: 700; margin: 12px 0 16px; color: var(--color-primary); line-height: 1.25;">
              Nagpur-Born Startup, <mark style="background: none; color: var(--color-accent);">Global Engineering Reach</mark>.
            </h2>
            <p style="color: var(--color-gray-600); margin-bottom: 28px; font-size: 1.05rem; line-height: 1.6;">
              Bluebase was founded and is headquartered in <strong>Nagpur, Maharashtra, India</strong>. We operate with a modern remote-first model—giving you direct access to top-tier senior software architects and AI engineers across India without traditional agency overhead.
            </p>
            
            <div style="display: flex; flex-direction: column; gap: 18px;">
              
              <!-- Location & Headquarters Card -->
              <div style="background: #ffffff; padding: 24px; border-radius: 14px; border: 1px solid var(--color-gray-200); box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 10px;">
                  <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0, 80, 231, 0.08); display: flex; align-items: center; justify-content: center; color: var(--color-accent);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                  </div>
                  <div>
                    <h4 style="font-size: 1.15rem; font-weight: 700; color: var(--color-primary); margin: 0;">Nagpur, Maharashtra, India</h4>
                    <span style="font-size: 0.82rem; color: var(--color-accent); font-weight: 600;">Startup Origin &amp; Registered Hub</span>
                  </div>
                </div>
                <p style="color: var(--color-gray-600); font-size: 0.95rem; line-height: 1.55; margin: 0;">
                  Headquartered in Nagpur (Zero Mile City, India). Operating as a fully digital, remote-first team delivering mission-critical web platforms, mobile solutions, and AI agents for clients nationwide and globally.
                </p>
              </div>

              <!-- Timezone & Working Hours Card (Indian Standard Time) -->
              <div style="background: #ffffff; padding: 24px; border-radius: 14px; border: 1px solid var(--color-gray-200); box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                  <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0, 80, 231, 0.08); display: flex; align-items: center; justify-content: center; color: var(--color-accent);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                  </div>
                  <div>
                    <h4 style="font-size: 1.15rem; font-weight: 700; color: var(--color-primary); margin: 0;">Indian Standard Time (IST)</h4>
                    <span style="font-size: 0.82rem; color: #16A34A; font-weight: 600;">UTC+05:30 &bull; Active Operations</span>
                  </div>
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.95rem;">
                  <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                    <span style="color: var(--color-gray-600);">Standard Working Hours:</span>
                    <strong style="color: var(--color-primary);">Monday &ndash; Friday, 9:30 AM &ndash; 7:00 PM IST</strong>
                  </div>
                  <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                    <span style="color: var(--color-gray-600);">Weekend Availability:</span>
                    <span style="color: var(--color-gray-700);">Critical production SLA on-call</span>
                  </div>
                </div>
                <div style="margin-top: 12px; background: #F8FAFC; border-radius: 8px; padding: 10px 12px; font-size: 0.85rem; color: var(--color-gray-700); border: 1px dashed var(--color-gray-300);">
                  <strong>Global Overlap:</strong> Our pods coordinate seamless 4+ hour live overlaps with US, European, and APAC client time zones.
                </div>
              </div>

              <!-- Direct Communication Channels -->
              <div style="background: #ffffff; padding: 24px; border-radius: 14px; border: 1px solid var(--color-gray-200); box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px;">
                  <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0, 80, 231, 0.08); display: flex; align-items: center; justify-content: center; color: var(--color-accent);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                  </div>
                  <h4 style="font-size: 1.15rem; font-weight: 700; color: var(--color-primary); margin: 0;">Direct Communication</h4>
                </div>
                <div style="display: flex; flex-direction: column; gap: 8px; font-size: 0.95rem;">
                  <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                    <span style="color: var(--color-gray-600);">General Inquiries:</span>
                    <a href="mailto:contact@bluebase.com" style="color: var(--color-accent); font-weight: 600;">contact@bluebase.com</a>
                  </div>
                  <div style="display: flex; justify-content: space-between; border-bottom: 1px solid #f1f5f9; padding-bottom: 6px;">
                    <span style="color: var(--color-gray-600);">Project / Pod Proposals:</span>
                    <a href="mailto:sales@bluebase.com" style="color: var(--color-accent); font-weight: 600;">sales@bluebase.com</a>
                  </div>
                  <div style="display: flex; justify-content: space-between;">
                    <span style="color: var(--color-gray-600);">24/7 Client Support:</span>
                    <a href="mailto:support@bluebase.com" style="color: var(--color-accent); font-weight: 600;">support@bluebase.com</a>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <!-- Contact Form Right -->
          <div class="form-card" data-viewport="true" id="contactFormCard" style="background: #ffffff; padding: 36px; border-radius: 16px; border: 1px solid var(--color-gray-200); box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
            <h3 style="font-size: 1.6rem; font-weight: 700; margin-bottom: 8px; color: var(--color-primary);">Send Us a Message</h3>
            <p style="color: var(--color-gray-600); margin-bottom: 24px; font-size: 0.95rem;">
              Fill out the form below and an engineering director will respond within 24 business hours.
            </p>

            @if(session('success'))
              <div style="background: #EFF6FF; border: 1px solid #BFDBFE; color: #1E40AF; padding: 16px 20px; border-radius: 10px; margin-bottom: 24px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                  <strong>{{ session('success') }}</strong>
                </div>
              </div>
            @endif

            @if($errors->any())
              <div style="background: #FEF2F2; border: 1px solid #FECACA; color: #991B1B; padding: 16px 20px; border-radius: 10px; margin-bottom: 24px;">
                <ul style="margin: 0; padding-left: 20px;">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form action="{{ route('contact.store') }}" method="POST" id="contactForm">
              @csrf

              <div class="form-group" style="margin-bottom: 18px;">
                <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Your Full Name *</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="e.g. Alex Morgan" style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">
              </div>

              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 18px;">
                <div class="form-group">
                  <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Work Email *</label>
                  <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="alex@company.com" style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">
                </div>

                <div class="form-group">
                  <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Phone Number</label>
                  <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="+1 (555) 000-0000" style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">
                </div>
              </div>

              <div class="form-group" style="margin-bottom: 18px;">
                <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Company / Business Name</label>
                <input type="text" name="company" class="form-control" value="{{ old('company') }}" placeholder="e.g. Your Business or Startup Name" style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">
              </div>

              <div class="form-group" style="margin-bottom: 18px;">
                <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Primary Project Interest *</label>
                <select name="service" class="form-control" required style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem; background: #fff;">
                  <option value="" disabled {{ old('service') ? '' : 'selected' }}>Select what you want to build...</option>
                  <option value="Website Design & Development" {{ old('service') == 'Website Design & Development' ? 'selected' : '' }}>Website Design &amp; Development</option>
                  <option value="Custom Web Application" {{ old('service') == 'Custom Web Application' ? 'selected' : '' }}>Custom Web Application / SaaS MVP</option>
                  <option value="Mobile App Development" {{ old('service') == 'Mobile App Development' ? 'selected' : '' }}>Mobile App Development (Android &amp; iOS)</option>
                  <option value="E-commerce Store Development" {{ old('service') == 'E-commerce Store Development' ? 'selected' : '' }}>E-commerce Store / Online Shop</option>
                  <option value="UI/UX Design & Prototyping" {{ old('service') == 'UI/UX Design & Prototyping' ? 'selected' : '' }}>UI/UX Design &amp; Figma Prototyping</option>
                  <option value="API & Backend Development" {{ old('service') == 'API & Backend Development' ? 'selected' : '' }}>API &amp; Backend Development</option>
                  <option value="Website Redesign & Maintenance" {{ old('service') == 'Website Redesign & Maintenance' ? 'selected' : '' }}>Website Redesign &amp; Maintenance</option>
                  <option value="General Consultation" {{ old('service') == 'General Consultation' ? 'selected' : '' }}>General Consultation / Other</option>
                </select>
              </div>

              <div class="form-group" style="margin-bottom: 24px;">
                <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Project Details / Message *</label>
                <textarea name="message" class="form-control" rows="4" required placeholder="Tell us about your project, idea, or requirements..." style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">{{ old('message') }}</textarea>
              </div>

              <button type="submit" class="c-btn -primary" style="width: 100%; justify-content: center; padding: 14px; font-size: 1rem; border-radius: 9999px;">
                <span class="c-btn__txt">Send Message</span>
                <span class="c-btn__ico">
                  <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                  <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                </span>
              </button>
            </form>
          </div>

        </div>
      </div>
    </section>
    </section>    <!-- FEATURE GRID SECTION -->
    <section class="usecases-section">
      <div class="container">
        <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
          <span class="section-tag">Support & Communications</span>
          <h2 class="section-title">How We Support Clients 24 Hours a Day</h2>
          <p class="section-subtitle" style="margin: 0 auto;">Real-time technical assistance across all time zones.</p>
        </div>
        <div class="features-grid-3">
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Dedicated Shared Slack Channels</h3>
            <p class="card-text">Every client pod gets a direct shared Slack or Teams channel for instant, asynchronous communication.</p>
          </div>
          <a href="{{ route('services.professional') }}" class="c-btn -link">
                    <span class="c-btn__txt">Pod Communication</span>
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
        <div class="feature-card-clean stagger-2" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/diagram.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">24/7 Production Incident Paging</h3>
            <p class="card-text">Tier-1 critical production alerting through PagerDuty with sub-15-minute response SLA guarantees.</p>
          </div>
          <a href="{{ route('compliance-security') }}" class="c-btn -link">
                    <span class="c-btn__txt">Incident SLA</span>
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
        <div class="feature-card-clean stagger-3" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/cube.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Weekly Sprint Demos</h3>
            <p class="card-text">Live video walkthroughs showcasing tangible software shipped in the preceding two-week cycle.</p>
          </div>
          <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">Sprint Reviews</span>
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
              <div class="accordion-item stagger-6" data-viewport="true">
                <button class="accordion-trigger" aria-expanded="false">
                  <span>How do you collaborate without physical offices, and do you offer on-site workshops?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>We are remote-first by design, which allows us to assemble the best talent worldwide without geographic constraints. We collaborate seamlessly via shared Slack channels, direct GitHub/GitLab PRs, and weekly video sprint walkthroughs. When clients require in-person collaboration for initial architecture discovery, roadmapping, or executive alignment, our Principal Solutions Architects travel on-site directly to your headquarters.</p>
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
            Ready to Build Something Extraordinary?<br><mark>Contact Bluebase Engineering Today</mark>.
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
