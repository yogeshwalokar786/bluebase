@extends('layouts.app')

@section('title', 'Generative AI, Custom LLMs & AI Copilots | Bluebase')
@section('meta_description', 'Custom LLM fine-tuning, retrieval-augmented generation (RAG), and domain-specific AI copilots engineered on your proprietary enterprise data.')

@section('content')
<main id="main-content">
    <!-- HERO SECTION -->
    <section class="hero-section">
      <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
      <div class="container hero-content">
        <p class="hero-pretitle" data-viewport="true">Custom Enterprise GenAI Solutions</p>
        <h1 class="hero-title stagger-1" data-viewport="true">
          Proprietary AI Models &amp; Copilots <mark>Trained on Your Data</mark>.
        </h1>
        <p class="hero-description stagger-2" data-viewport="true">
          Unlock the value of your enterprise knowledge base. Bluebase builds private RAG architectures, fine-tunes state-of-the-art open-source LLMs, and delivers custom copilots that operate completely within your security perimeter.
        </p>

        <div class="hero-buttons stagger-3" data-viewport="true">
          <a href="{{ route('book-a-demo') }}" class="c-btn -primary">
                    <span class="c-btn__txt">Schedule GenAI Strategy Call</span>
                    <span class="c-btn__ico">
                      <span class="c-btn__ico-base">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                      <span class="c-btn__ico-hover">
                        <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
                      </span>
                    </span>
                  </a> <a href="{{ route('free-trial') }}" class="c-btn -secondary">
                    <span class="c-btn__txt">Request Private RAG Audit</span>
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
          <div class="hero-badge-item">Zero Data Leakage</div><div class="hero-badge-item">Hybrid Vector RAG</div><div class="hero-badge-item">Sub-Second Inference</div>
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

    <!-- STICKY FEATURE SECTION -->
    <section class="sticky-features-section">
      <div class="container">
        <div class="sticky-layout">
          <div class="sticky-left" data-viewport="true">
            <span class="section-tag light">Enterprise GenAI & RAG</span>
            <h2 class="section-title">Private, Custom LLMs <mark>Trained on Your Enterprise Data.</mark></h2>
            <p class="section-subtitle light">Harness the power of foundation models without sending sensitive proprietary IP to third-party public clouds. Bluebase engineers custom private RAG architectures.</p>
            <div class="sticky-image-wrap">
              <img src="{{ asset('images/illustrations/workflow-canvas.jpg') }}" alt="Private, Custom LLMs <mark>Trained on Your Enterprise Data.</mark>">
            </div>
          </div>
          <div class="sticky-right">
            <div class="feature-scroll-card stagger-1" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/ai-agent.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Hybrid Vector & Keyword RAG</h3>
              <p class="feature-card-desc">Combining dense vector embeddings with BM25 keyword matching and cross-encoder rerankers for pinpoint factual accuracy across millions of documents.</p>
              <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">Explore RAG Stack</span>
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
            <div class="feature-scroll-card stagger-2" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">Domain-Specific Model Fine-Tuning</h3>
              <p class="feature-card-desc">Fine-tuning open-source LLMs (Llama 3, Mistral, Gemma) using LoRA / QLoRA techniques on your domain knowledge and internal vocabulary.</p>
              <a href="{{ route('whitepapers') }}" class="c-btn -link">
                    <span class="c-btn__txt">Model Benchmarks</span>
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
            <div class="feature-scroll-card stagger-3" data-viewport="true">
              <div class="feature-card-icon">
                <img src="{{ asset('images/icons/code-bar.svg') }}" alt="" width="24" height="24">
              </div>
              <h3 class="feature-card-title">VPC & Air-Gapped Deployment</h3>
              <p class="feature-card-desc">Run LLM inference entirely inside your private AWS/Azure VPC or on-premises GPU clusters with zero data leakage guarantees.</p>
              <a href="{{ route('compliance-security') }}" class="c-btn -link">
                    <span class="c-btn__txt">Data Privacy Controls</span>
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
      </div>
    </section>    <!-- FEATURE GRID SECTION -->
    <section class="usecases-section">
      <div class="container">
        <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
          <span class="section-tag">Generative AI Solutions</span>
          <h2 class="section-title">High-Impact Generative AI for Business Operations</h2>
          <p class="section-subtitle" style="margin: 0 auto;">Custom generative AI applications engineered to augment human expertise, synthesize insights, and accelerate output.</p>
        </div>
        <div class="features-grid-3">
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/ai-agent.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Enterprise Knowledge Search</h3>
            <p class="card-text">Ask complex natural language questions across millions of internal PDFs, wikis, and technical manuals with direct citations.</p>
          </div>
          <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">Knowledge Search</span>
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
            <h3 class="card-title-lg">Automated Document Synthesis</h3>
            <p class="card-text">Instant extraction, structured summarization, and key clause comparison across legal agreements and vendor contracts.</p>
          </div>
          <a href="{{ route('whitepapers') }}" class="c-btn -link">
                    <span class="c-btn__txt">Document AI</span>
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
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Code Assistants & Refactoring</h3>
            <p class="card-text">Custom coding assistants trained on your internal repos, design systems, and architectural patterns to boost developer speed.</p>
          </div>
          <a href="{{ route('services.professional') }}" class="c-btn -link">
                    <span class="c-btn__txt">Developer Copilots</span>
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
        <div class="feature-card-clean stagger-1" data-viewport="true">
          <div>
            <div class="card-icon-box">
              <img src="{{ asset('images/icons/cube.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Multilingual Translation & Tone</h3>
            <p class="card-text">Preserve regulatory compliance and technical terminology across real-time global communications in 50+ languages.</p>
          </div>
          <a href="{{ route('book-a-demo') }}" class="c-btn -link">
                    <span class="c-btn__txt">Language Pipelines</span>
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
              <img src="{{ asset('images/icons/code-bar.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Voice AI & Audio Transcription</h3>
            <p class="card-text">Whisper-grade speech-to-text and low-latency synthetic voice pipelines for real-time customer and dispatch operations.</p>
          </div>
          <a href="{{ route('contact') }}" class="c-btn -link">
                    <span class="c-btn__txt">Voice Solutions</span>
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
              <img src="{{ asset('images/icons/tool.svg') }}" alt="" width="26" height="26">
            </div>
            <h3 class="card-title-lg">Synthetic Data Generation</h3>
            <p class="card-text">Generate high-fidelity, privacy-safe synthetic datasets to train specialized models and test mission-critical edge cases.</p>
          </div>
          <a href="{{ route('free-trial') }}" class="c-btn -link">
                    <span class="c-btn__txt">Synthetic Data</span>
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
            Ready to Unleash Custom Enterprise GenAI?<br><mark>Build Your Private Model</mark>.
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
