@extends('layouts.app')

@section('title', 'Contact Web & Software Developers | Bluebase Technologies')
@section('meta_description', 'Get in touch with Bluebase Technologies to discuss your web development, mobile app, or software project. Receive a detailed proposal in 24 hours.')
@section('meta_keywords', 'contact bluebase, hire developers, web development inquiry, mobile app quote, custom software estimate, project consultation')
@section('canonical_url', url('/contact'))

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contact Bluebase Technologies",
  "description": "Reach out to Bluebase Technologies to discuss custom website, web app, mobile app, or software engineering projects.",
  "url": "{{ url('/contact') }}",
  "mainEntity": {
    "@type": "Organization",
    "name": "Bluebase Technologies",
    "url": "https://bluebasetechnologies.com",
    "email": "info@bluebasetechnologies.com",
    "contactPoint": {
      "@type": "ContactPoint",
      "contactType": "Sales & Project Discovery",
      "email": "info@bluebasetechnologies.com",
      "availableLanguage": ["English", "Hindi"]
    }
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    {
      "@type": "Question",
      "name": "What services does Bluebase provide?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "Bluebase is a digital engineering studio. We provide end-to-end custom software development, high-performance web applications, cloud infrastructure, offline-first mobile applications, and dedicated engineering support."
      }
    },
    {
      "@type": "Question",
      "name": "How does Bluebase engage with clients?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We offer two straightforward engagement models tailored to your project: Fixed-Scope Product Builds (milestone-based web and mobile development with clear delivery timelines) and Dedicated Monthly Retainers (dedicated developer capacity working directly on your roadmap)."
      }
    },
    {
      "@type": "Question",
      "name": "Who owns the intellectual property and code?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "You own 100% of all intellectual property, source code, data pipelines, and design assets created during our engagement. Everything is developed directly in your repositories with zero vendor lock-in."
      }
    },
    {
      "@type": "Question",
      "name": "How fast can development ramp up and start shipping?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We can typically begin project kickoff within 3 to 5 business days after scope approval. We work in rapid 2-week iterations, shipping tangible, testable code to staging environments from sprint one."
      }
    },
    {
      "@type": "Question",
      "name": "How does Bluebase handle security, confidentiality, and data protection?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We adhere to industry-standard application security practices, encrypt all data in transit and at rest, and sign comprehensive Non-Disclosure Agreements (NDAs) before discussing any project architecture or business data. 100% of your code and intellectual property belongs to you."
      }
    },
    {
      "@type": "Question",
      "name": "How do you collaborate remotely across different time zones?",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "We are remote-first by design, which keeps our overhead low and our communication fast and documented. We collaborate seamlessly via shared communication channels, video sprint walkthroughs, and direct GitHub/GitLab pull requests with full visibility into every milestone."
      }
    }
  ]
}
</script>
@endpush

@section('content')

    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Get in Touch</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Let's Discuss Your Next <mark>Engineering Initiative</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          Whether you have an immediate product deadline, need a dedicated engineering team, or want to build a custom web or mobile application, we're ready to help.
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
                  </a> <a href="{{ route('contact') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Request Project Estimate</span>
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
          <div class="hero-badge-item">24 Business Hours Response</div><div class="hero-badge-item">India (Startup HQ)</div><div class="hero-badge-item">Operating in IST (UTC+05:30)</div>
        </div>
      </div>
    </section>

  <!-- CLIENT LOGO MARQUEE -->
  @include('partials.client-marquee', ['heading' => 'Trusted by modern brands, ambitious startups, and fast-growing businesses'])

    <!-- REMOTE-FIRST CONTACT & COMMUNICATION HUBS SECTION -->
    <section class="subpage-section" style="padding-top: 30px;">
      <div class="container" style="max-width: 1180px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 40px; align-items: start;">
          
          <!-- Remote-First Details Left -->
          <div data-viewport="true">
            <span class="section-tag">Global Engineering &bull; Remote-First Model</span>
            <h2 style="font-size: 2.1rem; font-weight: 700; margin: 12px 0 16px; color: var(--color-primary); line-height: 1.25;">
              Distributed Software Engineering, <mark style="background: none; color: var(--color-accent);">Global Production Impact</mark>.
            </h2>
            <p style="color: var(--color-gray-600); margin-bottom: 28px; font-size: 1.05rem; line-height: 1.6;">
              Bluebase Technologies is a specialized software engineering studio operating on a modern <strong>remote-first delivery model</strong>. We give high-growth startups and established businesses direct access to experienced full-stack developers, mobile engineers, and cloud specialists without traditional agency overhead or vendor markup.
            </p>
            
            <div style="display: flex; flex-direction: column; gap: 18px;">
              
              <!-- Location & Operating Model Card -->
              <div style="background: #ffffff; padding: 24px; border-radius: 14px; border: 1px solid var(--color-gray-200); box-shadow: 0 4px 16px rgba(0,0,0,0.03);">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 10px;">
                  <div style="width: 40px; height: 40px; border-radius: 10px; background: rgba(0, 80, 231, 0.08); display: flex; align-items: center; justify-content: center; color: var(--color-accent);">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                  </div>
                  <div>
                    <h4 style="font-size: 1.15rem; font-weight: 700; color: var(--color-primary); margin: 0;">Distributed Engineering Hub</h4>
                    <span style="font-size: 0.82rem; color: var(--color-accent); font-weight: 600;">Remote-First Tech Studio</span>
                  </div>
                </div>
                <p style="color: var(--color-gray-600); font-size: 0.95rem; line-height: 1.55; margin: 0;">
                  Operating as a fully digital, remote-first technology studio delivering high-performance web applications, mobile platforms, and custom business software for clients worldwide.
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
                    <span style="color: var(--color-gray-700);">Emergency maintenance &amp; uptime monitoring</span>
                  </div>
                </div>
                <div style="margin-top: 12px; background: #F8FAFC; border-radius: 8px; padding: 10px 12px; font-size: 0.85rem; color: var(--color-gray-700); border: 1px dashed var(--color-gray-300);">
                  <strong>Global Overlap:</strong> We coordinate active working hours to overlap smoothly with US, European, and APAC client time zones.
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
                <div style="display: flex; justify-content: space-between; align-items: center; font-size: 0.95rem;">
                  <span style="color: var(--color-gray-600);">Email:</span>
                  <a href="mailto:info@bluebasetechnologies.com" style="color: var(--color-accent); font-weight: 600;">info@bluebasetechnologies.com</a>
                </div>
              </div>

            </div>
          </div>

          <!-- Contact Form Right -->
          <div class="form-card" data-viewport="true" id="contactFormCard" style="background: #ffffff; padding: 36px; border-radius: 16px; border: 1px solid var(--color-gray-200); box-shadow: 0 10px 30px rgba(0,0,0,0.04);">
            <h3 style="font-size: 1.6rem; font-weight: 700; margin-bottom: 8px; color: var(--color-primary);">Send Us a Message</h3>
            <p style="color: var(--color-gray-600); margin-bottom: 24px; font-size: 0.95rem;">
              Fill out the form below and our lead engineer will respond within 24 business hours.
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

            <form action="{{ route('contact.store') }}" method="POST" id="contactForm" toolname="request_project_estimate" tooldescription="Submit inquiry and project requirements for custom software development estimate">
              @csrf

              <div class="form-group" style="margin-bottom: 18px;">
                <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Your Full Name *</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}" placeholder="e.g. Your Name" style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">
              </div>

              <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 18px;">
                <div class="form-group">
                  <label class="form-label" style="font-weight: 600; font-size: 0.9rem; margin-bottom: 6px; display: block;">Work Email *</label>
                  <input type="email" name="email" class="form-control" required value="{{ old('email') }}" placeholder="you@company.com" style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">
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
                <textarea name="message" id="contactMessageInput" class="form-control" rows="4" required placeholder="Tell us about your project, idea, or requirements..." style="width: 100%; padding: 12px 14px; border: 1px solid var(--color-gray-300); border-radius: 8px; font-size: 0.95rem;">{{ old('message') }}</textarea>
                <div style="font-size: 0.78rem; color: var(--color-gray-500); margin-top: 5px;">
                  Note: For anti-spam and security compliance, URLs, web links, and domain references are strictly prohibited in inquiries.
                </div>
                <div id="urlBlockedWarning" style="display: none; align-items: center; gap: 8px; margin-top: 8px; padding: 10px 14px; border-radius: 8px; background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.3); color: #DC2626; font-size: 0.82rem; font-weight: 600;">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                  <span>Security Notice: URLs, web addresses, and links (e.g. http://, www., .com) are strictly prohibited. Please remove links to submit.</span>
                </div>
              </div>

              <!-- Invisible Security Honeypot -->
              <input type="text" name="_hp_contact_check" style="position: absolute; left: -9999px; opacity: 0; pointer-events: none;" tabindex="-1" autocomplete="off">

              <!-- Advanced Cloud Shield Human Verification (Turnstile Style) -->
              <div class="turnstile-verification-box" id="turnstileVerificationBox" style="margin-bottom: 24px;">
                <div class="turnstile-widget" id="turnstileWidget">
                  <div class="turnstile-main">
                    <button type="button" class="turnstile-checkbox-btn" id="turnstileTrigger" aria-label="Verify you are human">
                      <span class="turnstile-checkbox-indicator" id="turnstileIndicator">
                        <!-- Checkmark SVG -->
                        <svg class="turnstile-svg-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                        <!-- Spinner SVG -->
                        <svg class="turnstile-svg-spinner" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                          <circle cx="12" cy="12" r="10" stroke-opacity="0.2" stroke-linecap="round"></circle>
                          <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
                        </svg>
                      </span>
                    </button>
                    <div class="turnstile-text-block">
                      <span class="turnstile-status-title" id="turnstileStatusTitle">Verify you are human</span>
                      <span class="turnstile-status-sub" id="turnstileStatusSub">Cloud Security Verification</span>
                    </div>
                  </div>
                  
                  <div class="turnstile-badge-col">
                    <div class="turnstile-brand-badge">
                      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#2563EB" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                        <path d="M9 12l2 2 4-4"/>
                      </svg>
                      <div class="turnstile-brand-name">
                        <strong>Bluebase</strong> Shield
                      </div>
                    </div>
                    <div class="turnstile-terms-links">
                      <a href="{{ route('privacy-policy') }}" target="_blank">Privacy</a> &bull; <a href="{{ route('terms-of-use') }}" target="_blank">Terms</a>
                    </div>
                  </div>
                </div>

                <input type="hidden" name="verification_token" id="verificationTokenInput" value="">
                
                @error('verification_token')
                  <div class="turnstile-error-msg" id="turnstileErrorMsg">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                    <span>{{ $message }}</span>
                  </div>
                @enderror
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
          <span class="section-tag">Support &amp; Communication</span>
          <h2 class="section-title">Transparent, Direct <mark>Engineering Support</mark></h2>
          <p class="section-subtitle" style="margin: 0 auto;">Direct collaboration with the developers actually writing your code.</p>
        </div>
        <div class="features-grid-3">
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Direct Communication Channels</h3>
            <p class="card-text">Every client project gets a direct shared Slack, WhatsApp, or email channel for quick, asynchronous communication.</p>
          </div>
          <a href="{{ route('services') }}" class="c-btn -link">
                    <span class="c-btn__txt">Direct Chat</span>
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
            <h3 class="card-title-lg">Proactive Uptime Monitoring</h3>
            <p class="card-text">Automated health checks, SSL certificate monitoring, and rapid incident resolution for live web systems.</p>
          </div>
          <a href="{{ route('compliance-security') }}" class="c-btn -link">
                    <span class="c-btn__txt">System Health</span>
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
          <a href="{{ route('contact') }}" class="c-btn -link">
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
          <p class="section-subtitle">Everything you need to know about our engineering services, process, and delivery model.</p>
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
                    <p>Bluebase is a digital engineering studio. We provide end-to-end custom software development, high-performance web applications, cloud infrastructure, offline-first mobile applications, and dedicated engineering support.</p>
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
                    <p>We offer two straightforward engagement models tailored to your project: Fixed-Scope Product Builds (milestone-based web and mobile development with clear delivery timelines) and Dedicated Monthly Retainers (dedicated developer capacity working directly on your roadmap).</p>
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
                  <span>How fast can development ramp up and start shipping?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>We can typically begin project kickoff within 3 to 5 business days after scope approval. We work in rapid 2-week iterations, shipping tangible, testable code to staging environments from sprint one.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item stagger-5" data-viewport="true">
                <button class="accordion-trigger" aria-expanded="false">
                  <span>How does Bluebase handle security, confidentiality, and data protection?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>We adhere to industry-standard application security practices, encrypt all data in transit and at rest, and sign comprehensive Non-Disclosure Agreements (NDAs) before discussing any project architecture or business data. 100% of your code and intellectual property belongs to you.</p>
                  </div>
                </div>
              </div>
              <div class="accordion-item stagger-6" data-viewport="true">
                <button class="accordion-trigger" aria-expanded="false">
                  <span>How do you collaborate remotely across different time zones?</span>
                  <div class="accordion-icon">
                    <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
                  </div>
                </button>
                <div class="accordion-content">
                  <div class="accordion-inner">
                    <p>We are remote-first by design, which keeps our overhead low and our communication fast and documented. We collaborate seamlessly via shared communication channels, video sprint walkthroughs, and direct GitHub/GitLab pull requests with full visibility into every milestone.</p>
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
            <a href="#contactForm" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
                    <span class="c-btn__txt">Send Us a Message</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a>
            <a href="{{ route('contact') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
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
            <div class="cta-pill-item">Direct developer collaboration</div>
            <div class="cta-pill-item">Modern web &amp; mobile architectures</div>
            <div class="cta-pill-item">100% client-owned code &amp; IP</div>
            <div class="cta-pill-item">Strict NDA &amp; IP Protection</div>
            <div class="cta-pill-item">Sprint-one velocity guarantee</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

      <!-- SITE FOOTER -->
@endsection

@push('scripts')
<style>
.turnstile-verification-box {
  user-select: none;
}
.turnstile-widget {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #FAFAFA;
  border: 1px solid #D1D5DB;
  border-radius: 10px;
  padding: 12px 16px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.04);
  transition: all 0.25s ease;
  max-width: 360px;
  gap: 12px;
  cursor: pointer;
}
.turnstile-widget:hover {
  border-color: #9CA3AF;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
}
.turnstile-widget.verified {
  background: #F0FDF4;
  border-color: #86EFAC;
  box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.12);
  cursor: default;
}
.turnstile-widget.verifying {
  border-color: #60A5FA;
  background: #EFF6FF;
  cursor: wait;
}
.turnstile-widget.error-shake {
  animation: turnstileShake 0.4s cubic-bezier(0.36, 0.07, 0.19, 0.97) both;
  border-color: #EF4444;
}
@keyframes turnstileShake {
  10%, 90% { transform: translate3d(-1px, 0, 0); }
  20%, 80% { transform: translate3d(2px, 0, 0); }
  30%, 50%, 70% { transform: translate3d(-3px, 0, 0); }
  40%, 60% { transform: translate3d(3px, 0, 0); }
}
.turnstile-main {
  display: flex;
  align-items: center;
  gap: 12px;
}
.turnstile-checkbox-btn {
  background: none;
  border: none;
  padding: 0;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
.turnstile-checkbox-indicator {
  width: 28px;
  height: 28px;
  border: 2px solid #CBD5E1;
  border-radius: 6px;
  background: #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
  color: #FFFFFF;
  position: relative;
}
.turnstile-widget:not(.verified):not(.verifying):hover .turnstile-checkbox-indicator {
  border-color: #2563EB;
  box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
}
.turnstile-svg-check,
.turnstile-svg-spinner {
  width: 17px;
  height: 17px;
  display: none;
}
.turnstile-widget.verifying .turnstile-checkbox-indicator {
  border-color: #2563EB;
  background: #FFFFFF;
  color: #2563EB;
}
.turnstile-widget.verifying .turnstile-svg-spinner {
  display: block;
  animation: turnstileSpin 0.8s linear infinite;
}
@keyframes turnstileSpin {
  100% { transform: rotate(360deg); }
}
.turnstile-widget.verified .turnstile-checkbox-indicator {
  background: #16A34A;
  border-color: #16A34A;
  color: #FFFFFF;
  transform: scale(1.05);
}
.turnstile-widget.verified .turnstile-svg-check {
  display: block;
  animation: turnstileCheckFade 0.25s ease-out;
}
@keyframes turnstileCheckFade {
  0% { transform: scale(0.5); opacity: 0; }
  100% { transform: scale(1); opacity: 1; }
}
.turnstile-text-block {
  display: flex;
  flex-direction: column;
}
.turnstile-status-title {
  font-size: 0.9rem;
  font-weight: 600;
  color: #1F2937;
  line-height: 1.3;
}
.turnstile-widget.verified .turnstile-status-title {
  color: #15803D;
}
.turnstile-status-sub {
  font-size: 0.72rem;
  color: #6B7280;
  line-height: 1.2;
}
.turnstile-widget.verified .turnstile-status-sub {
  color: #16A34A;
}
.turnstile-badge-col {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  border-left: 1px solid #E5E7EB;
  padding-left: 12px;
}
.turnstile-brand-badge {
  display: flex;
  align-items: center;
  gap: 5px;
}
.turnstile-brand-name {
  font-size: 0.72rem;
  color: #4B5563;
  line-height: 1.1;
  text-align: right;
}
.turnstile-brand-name strong {
  color: #1E3A8A;
}
.turnstile-terms-links {
  font-size: 0.65rem;
  color: #9CA3AF;
  margin-top: 3px;
}
.turnstile-terms-links a {
  color: #9CA3AF;
  text-decoration: none;
}
.turnstile-terms-links a:hover {
  text-decoration: underline;
  color: #4B5563;
}
.turnstile-error-msg {
  display: flex;
  align-items: center;
  gap: 6px;
  color: #DC2626;
  font-size: 0.8rem;
  font-weight: 500;
  margin-top: 6px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const pageStartTime = performance.now();
  const widget = document.getElementById('turnstileWidget');
  const trigger = document.getElementById('turnstileTrigger');
  const label = document.getElementById('turnstileStatusTitle');
  const sublabel = document.getElementById('turnstileStatusSub');
  const tokenInput = document.getElementById('verificationTokenInput');
  const form = document.getElementById('contactForm');
  let isVerified = false;
  let isVerifying = false;

  const performVerification = function() {
    if (isVerified || isVerifying) return;
    isVerifying = true;

    widget.classList.remove('error-shake');
    widget.classList.add('verifying');
    label.textContent = 'Verifying browser...';
    sublabel.textContent = 'Performing integrity check';

    const dwellSeconds = (performance.now() - pageStartTime) / 1000;
    const isBotWebDriver = !!(navigator.webdriver);

    // Realistic Cloudflare Turnstile verification simulation (600ms - 900ms)
    const simulatedDelay = Math.max(550, Math.floor(Math.random() * 300) + 600);

    setTimeout(function() {
      fetch('{{ route('contact.security.verify') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
          'Accept': 'application/json'
        },
        body: JSON.stringify({
          dwell_time: dwellSeconds,
          webdriver: isBotWebDriver,
          screen_res: window.screen.width + 'x' + window.screen.height,
          viewport: window.innerWidth + 'x' + window.innerHeight
        })
      })
      .then(function(res) {
        if (!res.ok) throw new Error('Verification network error');
        return res.json();
      })
      .then(function(data) {
        if (data.success && data.token) {
          isVerified = true;
          isVerifying = false;
          tokenInput.value = data.token;

          widget.classList.remove('verifying');
          widget.classList.add('verified');
          label.textContent = 'Success! Human verified';
          sublabel.textContent = 'Cloud security confirmed';

          const err = document.getElementById('turnstileErrorMsg');
          if (err) err.style.display = 'none';
        } else {
          throw new Error('Verification rejected');
        }
      })
      .catch(function() {
        isVerifying = false;
        widget.classList.remove('verifying');
        label.textContent = 'Verification failed';
        sublabel.textContent = 'Click to try again';
      });
    }, simulatedDelay);
  };

  if (trigger) {
    trigger.addEventListener('click', function(e) {
      e.stopPropagation();
      performVerification();
    });
  }

  if (widget) {
    widget.addEventListener('click', function(e) {
      if (!isVerified && !isVerifying && !e.target.closest('a')) {
        performVerification();
      }
    });
  }

  // Real-Time Client-Side URL Detection
  const urlRegex = /(?:https?:\/\/|ftp:\/\/|www\.|\.[a-z]{2,8}\/|\b[a-z0-9\-\._]+\.(?:com|org|net|xyz|top|ru|cn|in|io|co|biz|site|online|app|dev)\b)/i;
  const submitBtn = form ? form.querySelector('button[type="submit"]') : null;
  const urlWarning = document.getElementById('urlBlockedWarning');

  function checkFormForUrls() {
    if (!form) return false;
    const inputs = form.querySelectorAll('input[type="text"], input[type="tel"], textarea');
    let hasUrl = false;
    inputs.forEach(function(input) {
      if (input.name !== '_token' && input.name !== 'verification_token' && input.value && urlRegex.test(input.value)) {
        hasUrl = true;
        input.style.borderColor = '#EF4444';
      } else if (input.style.borderColor === 'rgb(239, 68, 68)' || input.style.borderColor === '#ef4444') {
        input.style.borderColor = '';
      }
    });

    if (urlWarning) {
      urlWarning.style.display = hasUrl ? 'flex' : 'none';
    }
    if (submitBtn) {
      submitBtn.disabled = hasUrl;
      submitBtn.style.opacity = hasUrl ? '0.5' : '1';
      submitBtn.style.cursor = hasUrl ? 'not-allowed' : 'pointer';
    }
    return hasUrl;
  }

  if (form) {
    form.addEventListener('input', checkFormForUrls);
    form.addEventListener('paste', function() {
      setTimeout(checkFormForUrls, 50);
    });

    form.addEventListener('submit', function(e) {
      if (checkFormForUrls()) {
        e.preventDefault();
        if (urlWarning) urlWarning.style.display = 'flex';
        return;
      }

      if (!isVerified || !tokenInput.value) {
        e.preventDefault();
        widget.classList.remove('error-shake');
        void widget.offsetWidth;
        widget.classList.add('error-shake');

        let err = document.getElementById('turnstileErrorMsg');
        if (!err) {
          err = document.createElement('div');
          err.id = 'turnstileErrorMsg';
          err.className = 'turnstile-error-msg';
          err.innerHTML = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg><span>Please complete the "Verify you are human" check before submitting.</span>';
          document.getElementById('turnstileVerificationBox').appendChild(err);
        } else {
          err.style.display = 'flex';
        }

        performVerification();
      }
    });
  }
});
</script>
@endpush
