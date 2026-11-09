@extends('layouts.app')

@section('title', 'UI/UX Product Design &amp; Prototyping Services | Bluebase Technologies')
@section('meta_description', 'High-converting user experience and interface design for web and mobile products. Complete Figma design systems, wireframing, clickable interactive prototypes, and developer-ready design tokens.')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- SEO / AEO Breadcrumb Navigation (Structured for Crawlers) -->
    <nav aria-label="Breadcrumb" class="hero-breadcrumb" data-viewport="true">
      <ol class="breadcrumb-pill" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('home') }}" itemprop="item" class="breadcrumb-link">
            <svg viewBox="0 0 16 16" width="12" height="12" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <path d="M2.5 6.5L8 2l5.5 4.5v7a1 1 0 0 1-1 1h-9a1 1 0 0 1-1-1v-7z"/>
            </svg>
            <span itemprop="name">Home</span>
          </a>
          <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('services') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Services</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">UI/UX Design &amp; Prototyping</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Design Engineering Studio &bull; UI/UX Systems</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Intuitive Product Design That <br><mark>Users Love &amp; Converts</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      We craft human-centric UI/UX architectures, comprehensive Figma design systems, and clickable prototypes that maximize user conversion.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=ui-ux-design" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Project</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
          <span class="c-btn__ico-hover">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
        </span>
      </a>
      <a href="{{ route('book-a-demo') }}" class="c-btn -secondary">
        <span class="c-btn__txt">Schedule a Call</span>
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
      <div class="hero-badge-item">Figma Component Systems</div>
      <div class="hero-badge-item">Clickable Interactive Prototypes</div>
      <div class="hero-badge-item">100% Tokenized Design Handoff</div>
    </div>

  </div>
</section>

<!-- MARQUEE SECTION -->
<section class="marquee-section">
  <div class="container">
    <h2 class="marquee-heading" data-viewport="true">Trusted by modern brands, founders, and growing businesses worldwide</h2>
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

<!-- INTERACTIVE FIGMA-GRADE DESIGN STUDIO SHOWCASE SECTION -->
<section class="subpage-section" id="interactive-design-studio" style="padding-top: 10px;">
  <div class="container">
    <div class="text-center" style="max-width: 860px; margin: 0 auto 36px;" data-viewport="true">
      <span class="section-tag">Interactive Design Engine</span>
      <h2 class="section-title">Experience the Figma-Grade <mark>Canvas We Engineer</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">
        Interact with the live Figma design workspace below. Test clickable interactive app prototypes, switch design tokens in real time, inspect developer-ready CSS handoffs, and audit WCAG accessibility scores.
      </p>
    </div>

    <!-- The Complete Figma Studio Window -->
    <div class="figma-studio-wrapper" data-viewport="true">
      <div class="figma-studio-window" id="figmaStudio">
        
        <!-- 1. FIGMA TOP TOOLBAR -->
        <div class="figma-toolbar">
          <div class="figma-toolbar-left">
            <div class="figma-traffic-lights">
              <span class="figma-light -red"></span>
              <span class="figma-light -yellow"></span>
              <span class="figma-light -green"></span>
            </div>
            <div class="figma-doc-title">
              <svg viewBox="0 0 38 57" width="14" height="21" fill="none">
                <path d="M19 28.5C19 23.2533 23.2533 19 28.5 19C33.7467 19 38 23.2533 38 28.5C38 33.7467 33.7467 38 28.5 38H19V28.5Z" fill="#1ABCFE"/>
                <path d="M0 47.5C0 42.2533 4.25329 38 9.5 38H19V47.5C19 52.7467 14.7467 57 9.5 57C4.25329 57 0 52.7467 0 47.5Z" fill="#0ACF83"/>
                <path d="M19 0V19H28.5C33.7467 19 38 14.7467 38 9.5C38 4.25329 33.7467 0 28.5 0H19Z" fill="#FF7262"/>
                <path d="M0 9.5C0 14.7467 4.25329 19 9.5 19H19V0H9.5C4.25329 0 0 4.25329 0 9.5Z" fill="#F24E1E"/>
                <path d="M0 28.5C0 33.7467 4.25329 38 9.5 38H19V19H9.5C4.25329 19 0 23.2533 0 28.5Z" fill="#A259FF"/>
              </svg>
              <span>Bluebase Design Engine v4.2 &bull; Product Systems</span>
              <span class="figma-doc-badge">Main</span>
            </div>
          </div>

          <!-- Center Tool Icons -->
          <div class="figma-tool-icons">
            <button class="figma-tool-btn active" title="Move Tool (V)" aria-label="Select Tool">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 3 7 18 3-7 7-3L3 3z"/></svg>
            </button>
            <button class="figma-tool-btn" title="Frame (F)" aria-label="Frame Tool">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="9" x2="20" y2="9"/><line x1="4" y1="15" x2="20" y2="15"/><line x1="10" y1="3" x2="8" y2="21"/><line x1="16" y1="3" x2="14" y2="21"/></svg>
            </button>
            <button class="figma-tool-btn" title="Shape (R)" aria-label="Rectangle Tool">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
            </button>
            <button class="figma-tool-btn" title="Pen Tool (P)" aria-label="Pen Tool">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m12 19 7-7 3 3-7 7-3-3z"/><path d="m18 13-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/></svg>
            </button>
            <button class="figma-tool-btn" title="Text (T)" aria-label="Text Tool">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 7 4 4 20 4 20 7"/><line x1="9" y1="20" x2="15" y2="20"/><line x1="12" y1="4" x2="12" y2="20"/></svg>
            </button>
            <button class="figma-tool-btn" title="Components (Shift+I)" aria-label="Components Tool">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 12 12 22 22 12 12 2"/></svg>
            </button>
          </div>

          <!-- Right Toolbar Actions -->
          <div class="figma-toolbar-right">
            <!-- Multiplayer Avatars -->
            <div class="figma-avatars" title="Multiplayer Live Collaborators">
              <span class="figma-avatar -sc" title="Sarah Chen (Lead UX)">SC</span>
              <span class="figma-avatar -ak" title="Alex Kumar (Frontend Lead)">AK</span>
              <span class="figma-avatar -mr" title="Marcus (Product Founder)">MR</span>
            </div>
            
            <!-- Play / Present Button -->
            <button class="figma-play-btn" id="presentBtn" aria-label="Preview Prototype">
              <svg viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              <span>Present</span>
            </button>
          </div>
        </div>

        <!-- 2. MODE BAR (TABS + COLOR SWITCHER) -->
        <div class="figma-mode-bar">
          <div class="figma-mode-tabs" role="tablist">
            <button class="figma-mode-tab active" data-tab="prototype" role="tab" aria-selected="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              <span>Interactive Prototype</span>
            </button>
            <button class="figma-mode-tab" data-tab="tokens" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 2a7 7 0 1 0 7 7"/></svg>
              <span>Design System &amp; Tokens</span>
            </button>
            <button class="figma-mode-tab" data-tab="devmode" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
              <span>Dev Mode (CSS Specs)</span>
            </button>
            <button class="figma-mode-tab" data-tab="scorecard" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
              <span>UX Usability &amp; WCAG</span>
            </button>
            <button class="figma-mode-tab" data-tab="userflow" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><path d="M10 6.5h4M17.5 10v4"/></svg>
              <span>User Journey Flow</span>
            </button>
          </div>

          <div class="figma-mode-options">
            <!-- Theme Color Swatches -->
            <div class="figma-swatches" title="Live Theme Palette Accent">
              <span class="figma-swatch-dot -blue active" data-color="#0050E7" data-rgb="0, 80, 231" title="Brand Blue"></span>
              <span class="figma-swatch-dot -emerald" data-color="#059669" data-rgb="5, 150, 105" title="Emerald Fintech"></span>
              <span class="figma-swatch-dot -violet" data-color="#7c3aed" data-rgb="124, 58, 237" title="Electric Violet"></span>
              <span class="figma-swatch-dot -obsidian" data-color="#334155" data-rgb="51, 65, 85" title="Obsidian Noir"></span>
            </div>

            <!-- Dark / Light Toggle -->
            <button class="figma-mode-tab" id="artboardThemeToggle" style="border: 1px solid rgba(255,255,255,0.12); padding: 5px 10px;" aria-label="Toggle Canvas Theme">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" id="canvasThemeIcon"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
              <span id="canvasThemeText">Dark</span>
            </button>
          </div>
        </div>

        <!-- 3. FIGMA WORKSPACE: SIDEBAR + CANVAS + INSPECTOR -->
        <div class="figma-workspace">
          
          <!-- LEFT SIDEBAR: LAYERS TREE -->
          <div class="figma-sidebar-left">
            <div class="figma-panel-title">
              <span>Layers</span>
              <span style="font-size: 0.68rem; color: #60a5fa; font-family: monospace;">Figma v124</span>
            </div>
            <ul class="figma-layer-tree">
              <li class="figma-layer-item active" data-layer="artboard">
                <span class="figma-layer-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="9" x2="20" y2="9"/><line x1="4" y1="15" x2="20" y2="15"/><line x1="10" y1="3" x2="8" y2="21"/><line x1="16" y1="3" x2="14" y2="21"/></svg>
                  <span># Analytics Dashboard</span>
                </span>
                <span class="figma-layer-eye"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
              </li>
              <li class="figma-layer-item" data-layer="navbar">
                <span class="figma-layer-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 12 12 22 22 12 12 2"/></svg>
                  <span>Navbar / Fixed</span>
                </span>
                <span class="figma-layer-eye"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
              </li>
              <li class="figma-layer-item" data-layer="metrics">
                <span class="figma-layer-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                  <span>Metrics Row [Auto]</span>
                </span>
                <span class="figma-layer-eye"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
              </li>
              <li class="figma-layer-item" data-layer="chart">
                <span class="figma-layer-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                  <span>Revenue Chart [SVG]</span>
                </span>
                <span class="figma-layer-eye"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
              </li>
              <li class="figma-layer-item" data-layer="table">
                <span class="figma-layer-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
                  <span>Transactions List</span>
                </span>
                <span class="figma-layer-eye"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
              </li>
              <li class="figma-layer-item" data-layer="modal">
                <span class="figma-layer-left">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
                  <span>Modal Drawer [Sheet]</span>
                </span>
                <span class="figma-layer-eye"><svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></span>
              </li>
            </ul>

            <div class="figma-panel-title" style="margin-top: auto;">
              <span>Assets &bull; Tokens</span>
              <span style="font-size: 0.68rem; color: #10b981;">Synced</span>
            </div>
            <div style="padding: 10px 14px; font-size: 0.74rem; color: #64748b; line-height: 1.5;">
              <span style="display: block; color: #94a3b8; font-weight: 600;">Tailwind 4.0 Config</span>
              <span>128 tokens, 32 auto-layout components mapped.</span>
            </div>
          </div>

          <!-- CENTER CANVAS: DOT GRID WITH ARTBOARDS -->
          <div class="figma-canvas">
            
            <!-- Artboard Frame Label -->
            <div class="figma-artboard-badge">
              <span># SaaS Dashboard / Analytics &bull; 1280 &times; 800 &bull; Auto-layout</span>
            </div>

            <!-- Authentic Floating Multiplayer Cursor -->
            <div class="figma-cursor">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                <path d="M5.65376 12.3673H5.46026L5.31717 12.4976L0.500002 16.8829L0.500002 1.19841L11.7841 12.3673H5.65376Z" fill="var(--studio-accent)" stroke="#ffffff" stroke-width="1.5"/>
              </svg>
              <span class="figma-cursor-tag">Sarah Chen (Lead UX)</span>
            </div>

            <!-- THE MAIN ARTBOARD -->
            <div class="figma-artboard" id="artboardFrame">
              
              <!-- PANEL 1: INTERACTIVE PROTOTYPE (LIVE APP) -->
              <div class="figma-canvas-panel active" id="canvas-prototype">
                <div style="padding: 24px;">
                  
                  <!-- App Header Inside Artboard -->
                  <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 18px; border-bottom: 1px solid rgba(0,0,0,0.06); margin-bottom: 20px;">
                    <div style="display: flex; align-items: center; gap: 12px;">
                      <div style="width: 34px; height: 34px; border-radius: 9px; background: var(--studio-accent); display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 800; font-size: 0.95rem;">
                        B
                      </div>
                      <div>
                        <div style="font-size: 0.95rem; font-weight: 700; margin: 0; line-height: 1.2;">Nexus Analytics Cloud</div>
                        <span style="font-size: 0.72rem; color: #64748b;">Production Cluster &bull; us-east-1</span>
                      </div>
                    </div>

                    <div style="display: flex; align-items: center; gap: 10px;">
                      <!-- Quick Filter Segment -->
                      <div style="display: flex; background: rgba(0,0,0,0.05); padding: 3px; border-radius: 7px; gap: 4px;">
                        <button class="proto-time-tab active" data-time="7d" style="background: #fff; border: none; padding: 4px 10px; border-radius: 5px; font-size: 0.72rem; font-weight: 700; cursor: pointer; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">7D</button>
                        <button class="proto-time-tab" data-time="30d" style="background: transparent; border: none; padding: 4px 10px; border-radius: 5px; font-size: 0.72rem; font-weight: 600; color: #64748b; cursor: pointer;">30D</button>
                        <button class="proto-time-tab" data-time="1y" style="background: transparent; border: none; padding: 4px 10px; border-radius: 5px; font-size: 0.72rem; font-weight: 600; color: #64748b; cursor: pointer;">1Y</button>
                      </div>

                      <!-- Trigger Prototype Modal Button -->
                      <button id="triggerModalBtn" style="background: var(--studio-accent); color: #fff; border: none; padding: 6px 14px; border-radius: 7px; font-size: 0.78rem; font-weight: 700; cursor: pointer; transition: all 0.2s;">
                        + New Campaign
                      </button>
                    </div>
                  </div>

                  <!-- 3 Metric KPI Cards Grid -->
                  <div class="figma-kpi-grid">
                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 16px;">
                      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <span style="font-size: 0.76rem; font-weight: 600; color: #64748b;">Monthly Recurring Revenue</span>
                        <span style="font-size: 0.7rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 6px; border-radius: 4px;">+24.6%</span>
                      </div>
                      <div style="font-size: 1.6rem; font-weight: 800; letter-spacing: -0.02em; color: var(--studio-accent);" id="kpiMrr">$148,200</div>
                      <span style="font-size: 0.72rem; color: #94a3b8;">vs $118,900 previous period</span>
                    </div>

                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 16px;">
                      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <span style="font-size: 0.76rem; font-weight: 600; color: #64748b;">Active SaaS Workspaces</span>
                        <span style="font-size: 0.7rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 6px; border-radius: 4px;">+18.2%</span>
                      </div>
                      <div style="font-size: 1.6rem; font-weight: 800; letter-spacing: -0.02em;" id="kpiUsers">12,840</div>
                      <span style="font-size: 0.72rem; color: #94a3b8;">99.8% retention rate</span>
                    </div>

                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 16px;">
                      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                        <span style="font-size: 0.76rem; font-weight: 600; color: #64748b;">Funnel Conversion Lift</span>
                        <span style="font-size: 0.7rem; font-weight: 700; color: #10b981; background: rgba(16, 185, 129, 0.12); padding: 2px 6px; border-radius: 4px;">+2.4x</span>
                      </div>
                      <div style="font-size: 1.6rem; font-weight: 800; letter-spacing: -0.02em;" id="kpiLift">4.82%</div>
                      <span style="font-size: 0.72rem; color: #94a3b8;">Zero friction sign-up flow</span>
                    </div>
                  </div>

                  <!-- High-Fidelity Interactive Revenue SVG Chart -->
                  <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px; margin-bottom: 22px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                      <div>
                        <span style="font-size: 0.88rem; font-weight: 700;">Conversion &amp; Revenue Velocity</span>
                        <span style="font-size: 0.74rem; color: #64748b; display: block;">Interactive vector bezier paths with auto-layout coordinates</span>
                      </div>
                      <span style="font-size: 0.72rem; font-family: monospace; color: var(--studio-accent); font-weight: 700; background: rgba(var(--studio-accent-rgb), 0.1); padding: 3px 8px; border-radius: 6px;">Live Prototype</span>
                    </div>

                    <!-- Vector Chart SVG -->
                    <div style="height: 140px; width: 100%; position: relative;">
                      <svg viewBox="0 0 700 140" preserveAspectRatio="none" style="width: 100%; height: 100%; overflow: visible;">
                        <defs>
                          <linearGradient id="chartGradient" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="var(--studio-accent)" stop-opacity="0.28"/>
                            <stop offset="100%" stop-color="var(--studio-accent)" stop-opacity="0.0"/>
                          </linearGradient>
                        </defs>
                        <!-- Grid lines -->
                        <line x1="0" y1="35" x2="700" y2="35" stroke="rgba(0,0,0,0.06)" stroke-dasharray="4"/>
                        <line x1="0" y1="70" x2="700" y2="70" stroke="rgba(0,0,0,0.06)" stroke-dasharray="4"/>
                        <line x1="0" y1="105" x2="700" y2="105" stroke="rgba(0,0,0,0.06)" stroke-dasharray="4"/>
                        <!-- Filled Area -->
                        <polygon points="0,140 0,95 70,82 140,88 210,65 280,50 350,60 420,38 490,44 560,25 630,30 700,12 700,140" fill="url(#chartGradient)"/>
                        <!-- Curve Line -->
                        <polyline points="0,95 70,82 140,88 210,65 280,50 350,60 420,38 490,44 560,25 630,30 700,12" fill="none" stroke="var(--studio-accent)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <!-- Interactive Data Points -->
                        <circle cx="210" cy="65" r="4" fill="#fff" stroke="var(--studio-accent)" stroke-width="2.5"/>
                        <circle cx="420" cy="38" r="4" fill="#fff" stroke="var(--studio-accent)" stroke-width="2.5"/>
                        <circle cx="700" cy="12" r="5" fill="#fff" stroke="var(--studio-accent)" stroke-width="3"/>
                      </svg>
                    </div>
                    <div style="display: flex; justify-content: space-between; font-size: 0.7rem; color: #94a3b8; margin-top: 8px; font-family: monospace;">
                      <span>Mon</span>
                      <span>Tue</span>
                      <span>Wed</span>
                      <span>Thu</span>
                      <span>Fri</span>
                      <span>Sat</span>
                      <span>Sun (Peak: $148.2k)</span>
                    </div>
                  </div>

                  <!-- Interactive Data Table -->
                  <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 16px;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
                      <span style="font-size: 0.84rem; font-weight: 700;">Recent User Conversions</span>
                      <span style="font-size: 0.72rem; color: #64748b;">Showing 3 live transactions</span>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 8px;">
                      <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; background: rgba(0,0,0,0.02); border-radius: 8px; font-size: 0.78rem;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                          <div style="width: 26px; height: 26px; border-radius: 50%; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.68rem;">JD</div>
                          <span style="font-weight: 600;">John Davidson &bull; Enterprise SaaS</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px;">
                          <span style="font-weight: 700; color: var(--studio-accent);">$4,800/yr</span>
                          <span style="background: rgba(16, 185, 129, 0.14); color: #059669; padding: 2px 7px; border-radius: 4px; font-size: 0.68rem; font-weight: 700;">Completed</span>
                        </div>
                      </div>

                      <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; background: rgba(0,0,0,0.02); border-radius: 8px; font-size: 0.78rem;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                          <div style="width: 26px; height: 26px; border-radius: 50%; background: #e2e8f0; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.68rem;">ER</div>
                          <span style="font-weight: 600;">Elena Rostova &bull; Pro Tier</span>
                        </div>
                        <div style="display: flex; align-items: center; gap: 14px;">
                          <span style="font-weight: 700; color: var(--studio-accent);">$990/yr</span>
                          <span style="background: rgba(16, 185, 129, 0.14); color: #059669; padding: 2px 7px; border-radius: 4px; font-size: 0.68rem; font-weight: 700;">Completed</span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <!-- PANEL 2: DESIGN SYSTEM & TOKENS -->
              <div class="figma-canvas-panel" id="canvas-tokens">
                <div style="padding: 24px;">
                  <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 4px;">Figma Component Sandbox &amp; Tokens</h3>
                    <p style="font-size: 0.8rem; color: #64748b; margin: 0;">Auto-layout master components mapped directly to production Tailwind CSS classes.</p>
                  </div>

                  <!-- Component Matrix Grid -->
                  <div class="figma-matrix-grid">
                    
                    <!-- Box 1: Button State Matrix -->
                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px;">
                      <div style="font-size: 0.84rem; font-weight: 700; margin-bottom: 12px;">Button Variants &bull; Interactive States</div>
                      <div style="display: flex; flex-direction: column; gap: 10px;">
                        <button class="studio-demo-btn -primary" style="justify-content: space-between;">
                          <span>Primary Action</span>
                          <span style="font-size: 0.7rem; font-family: monospace; opacity: 0.8;">auto-layout</span>
                        </button>
                        <button class="studio-demo-btn -secondary" style="justify-content: space-between;">
                          <span>Secondary Subtle</span>
                          <span style="font-size: 0.7rem; font-family: monospace; opacity: 0.8;">hover: tint</span>
                        </button>
                        <div style="display: flex; gap: 8px;">
                          <button style="flex: 1; padding: 8px; border-radius: 6px; border: 1px dashed rgba(0,0,0,0.2); background: transparent; font-size: 0.76rem; font-weight: 600; cursor: not-allowed; opacity: 0.6;">
                            Disabled State
                          </button>
                          <button id="loadingStateBtn" style="flex: 1; padding: 8px; border-radius: 6px; background: var(--studio-accent); color: #fff; border: none; font-size: 0.76rem; font-weight: 700; cursor: pointer;">
                            Click to Load
                          </button>
                        </div>
                      </div>
                    </div>

                    <!-- Box 2: Live Form Validation -->
                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px;">
                      <div style="font-size: 0.84rem; font-weight: 700; margin-bottom: 12px;">Form Controls &bull; Live Validation</div>
                      <div style="display: flex; flex-direction: column; gap: 10px;">
                        <div>
                          <label style="font-size: 0.76rem; font-weight: 600; color: #64748b; display: block; margin-bottom: 4px;">Business Email</label>
                          <div style="position: relative;">
                            <input type="text" id="liveValidateInput" class="studio-demo-input" value="lead@bluebase.io" style="padding-right: 30px;">
                            <span id="liveValCheck" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); color: #10b981; font-weight: 800;">&#10003;</span>
                          </div>
                          <span id="liveValMsg" style="font-size: 0.72rem; color: #10b981; font-weight: 600; display: block; margin-top: 4px;">Valid email structure</span>
                        </div>

                        <!-- Toggle Switch -->
                        <div style="display: flex; justify-content: space-between; align-items: center; padding-top: 6px;">
                          <span style="font-size: 0.8rem; font-weight: 600;">Two-Factor Authentication</span>
                          <div id="liveSwitchToggle" style="width: 44px; height: 24px; background: var(--studio-accent); border-radius: 999px; position: relative; cursor: pointer; transition: background 0.2s;">
                            <div id="liveSwitchKnob" style="width: 18px; height: 18px; background: #fff; border-radius: 50%; position: absolute; top: 3px; right: 3px; transition: all 0.2s;"></div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                  <!-- Color Swatches Row -->
                  <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px;">
                    <div style="font-size: 0.84rem; font-weight: 700; margin-bottom: 12px;">Semantic Color Scale Tokens (Click to Copy HEX)</div>
                    <div class="figma-color-ramp-grid">
                      <div class="color-token-tile" data-hex="var(--studio-accent)" style="cursor: pointer;">
                        <div style="height: 48px; border-radius: 8px; background: var(--studio-accent); margin-bottom: 6px;"></div>
                        <span style="font-size: 0.78rem; font-weight: 700; display: block;">Primary 600</span>
                        <span style="font-size: 0.7rem; font-family: monospace; color: #64748b;">var(--studio-accent)</span>
                      </div>
                      <div class="color-token-tile" data-hex="#0F172A" style="cursor: pointer;">
                        <div style="height: 48px; border-radius: 8px; background: #0F172A; margin-bottom: 6px;"></div>
                        <span style="font-size: 0.78rem; font-weight: 700; display: block;">Slate 900</span>
                        <span style="font-size: 0.7rem; font-family: monospace; color: #64748b;">#0F172A</span>
                      </div>
                      <div class="color-token-tile" data-hex="#10B981" style="cursor: pointer;">
                        <div style="height: 48px; border-radius: 8px; background: #10B981; margin-bottom: 6px;"></div>
                        <span style="font-size: 0.78rem; font-weight: 700; display: block;">Emerald 500</span>
                        <span style="font-size: 0.7rem; font-family: monospace; color: #64748b;">#10B981</span>
                      </div>
                      <div class="color-token-tile" data-hex="#F8FAFC" style="cursor: pointer;">
                        <div style="height: 48px; border-radius: 8px; background: #F1F5F9; border: 1px solid #cbd5e1; margin-bottom: 6px;"></div>
                        <span style="font-size: 0.78rem; font-weight: 700; display: block;">Surface 50</span>
                        <span style="font-size: 0.7rem; font-family: monospace; color: #64748b;">#F8FAFC</span>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

              <!-- PANEL 3: DEV MODE (CSS SPECS & CODE HANDOFF) -->
              <div class="figma-canvas-panel" id="canvas-devmode">
                <div style="padding: 24px;">
                  <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 18px;">
                    <div>
                      <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 4px;">Figma Dev Mode &bull; Engineering Handoff</h3>
                      <p style="font-size: 0.8rem; color: #64748b; margin: 0;">100% tokenized CSS &amp; Tailwind definitions ready for instant copy-paste.</p>
                    </div>
                    <span style="font-size: 0.72rem; font-weight: 700; background: rgba(0, 80, 231, 0.12); color: var(--studio-accent); padding: 4px 10px; border-radius: 6px; border: 1px solid rgba(0, 80, 231, 0.25);">
                      Token Drift: 0%
                    </span>
                  </div>

                  <!-- Measurement Visualizer -->
                  <div style="background: rgba(0,0,0,0.02); border: 1px dashed rgba(239, 68, 68, 0.4); border-radius: 10px; padding: 20px; position: relative; margin-bottom: 18px;">
                    <div style="position: absolute; top: 4px; left: 8px; font-size: 0.65rem; color: #ef4444; font-family: monospace; font-weight: 700;">p: 24px &bull; gap: 16px</div>
                    <div style="background: var(--studio-accent); color: #fff; padding: 12px 24px; border-radius: 10px; display: inline-flex; align-items: center; gap: 10px; box-shadow: 0 8px 24px rgba(var(--studio-accent-rgb), 0.3);">
                      <span style="font-weight: 700; font-size: 0.86rem;">Interactive CTA Button</span>
                      <span style="font-size: 0.68rem; font-family: monospace; background: rgba(255,255,255,0.2); padding: 2px 6px; border-radius: 4px;">h: 44px</span>
                    </div>
                  </div>

                  <!-- Syntax Highlighted CSS Box -->
                  <div class="figma-code-snippet">
                    <button class="figma-copy-code-btn" id="copyCssBtn">Copy CSS</button>
                    <pre style="margin: 0; font-family: inherit; font-size: inherit;"><code>/* Bluebase Design System v4.2 - CTA Token */
.c-btn-primary {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  padding: 12px 24px;
  gap: 10px;
  border-radius: 10px;
  background-color: var(--studio-accent);
  color: #ffffff;
  font-family: 'Inter', -apple-system, sans-serif;
  font-size: 14px;
  font-weight: 700;
  box-shadow: 0 8px 24px rgba(var(--studio-accent-rgb), 0.35);
  transition: all 180ms cubic-bezier(0.16, 1, 0.3, 1);
}

/* Tailwind CSS v4 Utility Mapping */
@apply inline-flex items-center px-6 py-3 rounded-xl font-bold bg-primary-600 text-white shadow-lg transition-all;</code></pre>
                  </div>
                </div>
              </div>

              <!-- PANEL 4: UX USABILITY & WCAG SCORECARD -->
              <div class="figma-canvas-panel" id="canvas-scorecard">
                <div style="padding: 24px;">
                  <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 4px;">WCAG 2.1 AAA Usability &amp; Contrast Audit</h3>
                    <p style="font-size: 0.8rem; color: #64748b; margin: 0;">Automated algorithmic verification guaranteeing zero visual friction.</p>
                  </div>

                  <div class="figma-scorecard-matrix">
                    <!-- Card 1 -->
                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px;">
                      <div style="font-size: 2.2rem; font-weight: 800; color: var(--studio-accent); line-height: 1;">7.4 : 1</div>
                      <div style="font-size: 0.86rem; font-weight: 700; margin-top: 6px;">WCAG AAA Contrast Ratio</div>
                      <span style="font-size: 0.74rem; color: #10b981; font-weight: 600;">Passes for normal body and display text in both dark &amp; light modes.</span>
                    </div>

                    <!-- Card 2 -->
                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px;">
                      <div style="font-size: 2.2rem; font-weight: 800; color: var(--studio-accent); line-height: 1;">98 <span style="font-size: 1.2rem;">/ 100</span></div>
                      <div style="font-size: 0.86rem; font-weight: 700; margin-top: 6px;">System Usability Scale (SUS)</div>
                      <span style="font-size: 0.74rem; color: #10b981; font-weight: 600;">Top 1% benchmark across modern SaaS products worldwide.</span>
                    </div>

                    <!-- Card 3 -->
                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px;">
                      <div style="font-size: 2.2rem; font-weight: 800; color: var(--studio-accent); line-height: 1;">48 px</div>
                      <div style="font-size: 0.86rem; font-weight: 700; margin-top: 6px;">Minimum Touch Target Size</div>
                      <span style="font-size: 0.74rem; color: #10b981; font-weight: 600;">Thumb-friendly iOS &amp; Android guidelines with 0% misclick rate.</span>
                    </div>

                    <!-- Card 4 -->
                    <div style="background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 12px; padding: 18px;">
                      <div style="font-size: 2.2rem; font-weight: 800; color: var(--studio-accent); line-height: 1;">100 %</div>
                      <div style="font-size: 0.86rem; font-weight: 700; margin-top: 6px;">Figma to Code Sync</div>
                      <span style="font-size: 0.74rem; color: #10b981; font-weight: 600;">Zero token divergence between master .fig file and code repository.</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- PANEL 5: USER JOURNEY FLOW -->
              <div class="figma-canvas-panel" id="canvas-userflow">
                <div style="padding: 24px;">
                  <div style="margin-bottom: 20px;">
                    <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 4px;">Frictionless Customer Funnel Journey</h3>
                    <p style="font-size: 0.8rem; color: #64748b; margin: 0;">Mapping cognitive load reduction across the entire conversion funnel.</p>
                  </div>

                  <div style="display: flex; flex-direction: column; gap: 12px;">
                    <div style="display: flex; align-items: center; gap: 14px; background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 10px; padding: 14px;">
                      <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--studio-accent); color: #fff; font-weight: 800; font-size: 0.8rem; display: flex; align-items: center; justify-content: center;">01</div>
                      <div style="flex: 1;">
                        <div style="font-size: 0.84rem; font-weight: 700;">Intent Discovery &amp; Value Scan</div>
                        <div style="font-size: 0.74rem; color: #64748b;">Sub-second visual hierarchy delivers core value proposition in under 3 seconds.</div>
                      </div>
                      <span style="font-size: 0.72rem; font-weight: 700; color: #10b981;">100% Cohort</span>
                    </div>

                    <div style="display: flex; align-items: center; gap: 14px; background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 10px; padding: 14px;">
                      <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--studio-accent); color: #fff; font-weight: 800; font-size: 0.8rem; display: flex; align-items: center; justify-content: center;">02</div>
                      <div style="flex: 1;">
                        <div style="font-size: 0.84rem; font-weight: 700;">1-Click Social Sign-Up (Zero Passwords)</div>
                        <div style="font-size: 0.74rem; color: #64748b;">Friction dropped by 42% by replacing lengthy forms with Google &amp; Apple Auth.</div>
                      </div>
                      <span style="font-size: 0.72rem; font-weight: 700; color: #10b981;">+38% Lift</span>
                    </div>

                    <div style="display: flex; align-items: center; gap: 14px; background: rgba(0,0,0,0.02); border: 1px solid rgba(0,0,0,0.07); border-radius: 10px; padding: 14px;">
                      <div style="width: 28px; height: 28px; border-radius: 50%; background: var(--studio-accent); color: #fff; font-weight: 800; font-size: 0.8rem; display: flex; align-items: center; justify-content: center;">03</div>
                      <div style="flex: 1;">
                        <div style="font-size: 0.84rem; font-weight: 700;">Interactive First-Time User Experience (FTUX)</div>
                        <div style="font-size: 0.74rem; color: #64748b;">Personalized 3-step checklist that achieves time-to-value within 60 seconds.</div>
                      </div>
                      <span style="font-size: 0.72rem; font-weight: 700; color: #10b981;">92% Retention</span>
                    </div>
                  </div>
                </div>
              </div>

              <!-- PROTOTYPE DEMO MODAL POPUP -->
              <div class="figma-demo-modal-overlay" id="prototypeModal">
                <div class="figma-demo-modal-box">
                  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 14px;">
                    <span style="font-size: 0.95rem; font-weight: 800;">Launch New Campaign</span>
                    <button id="closeModalBtn" style="background: transparent; border: none; font-size: 1.2rem; cursor: pointer; color: #64748b;">&times;</button>
                  </div>
                  <p style="font-size: 0.82rem; color: #64748b; line-height: 1.5; margin-bottom: 16px;">
                    This is an authentic interactive prototype modal simulating real application overlay transitions.
                  </p>
                  <div style="display: flex; flex-direction: column; gap: 10px; margin-bottom: 18px;">
                    <input type="text" class="studio-demo-input" placeholder="Campaign identifier" value="Q4 Enterprise Growth">
                    <button class="studio-demo-btn -primary" id="confirmModalBtn" style="width: 100%;">Deploy Flow &rarr;</button>
                  </div>
                  <span style="font-size: 0.7rem; color: #94a3b8; text-align: center; display: block;">Smart Animate &bull; 250ms ease-out</span>
                </div>
              </div>

            </div>
          </div>

          <!-- RIGHT SIDEBAR: DESIGN & INSPECT PROPERTIES -->
          <div class="figma-sidebar-right">
            <div class="figma-panel-title">
              <span>Inspect</span>
              <span style="font-size: 0.68rem; color: #94a3b8;">CSS / Props</span>
            </div>

            <!-- Frame Properties -->
            <div class="figma-inspect-group">
              <div class="figma-inspect-title">Dimensions</div>
              <div class="figma-inspect-props">
                <div class="figma-prop-box">
                  <span class="figma-prop-label">W</span>
                  <span class="figma-prop-val">1280px</span>
                </div>
                <div class="figma-prop-box">
                  <span class="figma-prop-label">H</span>
                  <span class="figma-prop-val">800px</span>
                </div>
                <div class="figma-prop-box">
                  <span class="figma-prop-label">X</span>
                  <span class="figma-prop-val">0px</span>
                </div>
                <div class="figma-prop-box">
                  <span class="figma-prop-label">R</span>
                  <span class="figma-prop-val">14px</span>
                </div>
              </div>
            </div>

            <!-- Auto Layout -->
            <div class="figma-inspect-group">
              <div class="figma-inspect-title">Auto-Layout</div>
              <div class="figma-inspect-props">
                <div class="figma-prop-box">
                  <span class="figma-prop-label">Flow</span>
                  <span class="figma-prop-val">Vertical</span>
                </div>
                <div class="figma-prop-box">
                  <span class="figma-prop-label">Gap</span>
                  <span class="figma-prop-val">16px</span>
                </div>
                <div class="figma-prop-box">
                  <span class="figma-prop-label">Pad X</span>
                  <span class="figma-prop-val">24px</span>
                </div>
                <div class="figma-prop-box">
                  <span class="figma-prop-label">Pad Y</span>
                  <span class="figma-prop-val">24px</span>
                </div>
              </div>
            </div>

            <!-- Color Fill -->
            <div class="figma-inspect-group">
              <div class="figma-inspect-title">Fill &amp; Stroke</div>
              <div style="display: flex; flex-direction: column; gap: 8px;">
                <div class="figma-prop-box">
                  <span class="figma-prop-label">Accent</span>
                  <span class="figma-prop-val" id="inspectAccentVal">#0050E7</span>
                </div>
                <div class="figma-prop-box">
                  <span class="figma-prop-label">Stroke</span>
                  <span class="figma-prop-val">1px Inside</span>
                </div>
              </div>
            </div>

            <!-- Export -->
            <div class="figma-inspect-group" style="margin-top: auto; border-bottom: none;">
              <div class="figma-inspect-title">Export Presets</div>
              <div style="display: flex; gap: 6px;">
                <span style="background: rgba(255,255,255,0.06); padding: 4px 8px; border-radius: 4px; font-size: 0.68rem; font-family: monospace; color: #94a3b8;">SVG 2x</span>
                <span style="background: rgba(255,255,255,0.06); padding: 4px 8px; border-radius: 4px; font-size: 0.68rem; font-family: monospace; color: #94a3b8;">PNG 3x</span>
                <span style="background: rgba(255,255,255,0.06); padding: 4px 8px; border-radius: 4px; font-size: 0.68rem; font-family: monospace; color: #94a3b8;">JSON</span>
              </div>
            </div>

          </div>

        </div>

      </div>
    </div>

  </div>
</section>

<!-- BENTO UX ARCHITECTURE GRID (CORE DISCIPLINES) -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Core Disciplines</span>
      <h2 class="section-title">End-to-End <mark>Product Design Capabilities</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">From exploratory low-fidelity wireframing to enterprise Figma component systems that empower engineering teams to ship faster.</p>
    </div>

    <div class="services-bento-grid">
      <!-- Bento 1: Figma Component Design Systems (Span 7) -->
      <div class="bento-card span-7 stagger-1" data-viewport="true">
        <div class="bento-badge">Design Systems</div>
        <h3 class="bento-title">Enterprise Component Systems in Figma</h3>
        <p class="bento-desc">We build clean, tokenized Figma libraries with auto-layout, interactive hover states, and responsive variants. Your entire team stays aligned around a unified visual language.</p>
        <div class="bento-tags">
          <span class="bento-tag">Auto-Layout 5.0</span>
          <span class="bento-tag">Semantic Variables</span>
          <span class="bento-tag">Responsive Variants</span>
          <span class="bento-tag">Tailwind Mapping</span>
        </div>
      </div>

      <!-- Bento 2: Clickable Interactive Prototypes (Span 5) -->
      <div class="bento-card span-5 stagger-2" data-viewport="true">
        <div class="bento-badge">Interactive Prototyping</div>
        <h3 class="bento-title">Clickable Real-Feel Prototypes</h3>
        <p class="bento-desc">Test real product interactions before committing development hours. Walk investors, stakeholders, and early adopters through fully interactive click-through flows.</p>
        <div class="bento-tags">
          <span class="bento-tag">Smart Animate</span>
          <span class="bento-tag">Interactive States</span>
          <span class="bento-tag">Investor Ready</span>
        </div>
      </div>

      <!-- Bento 3: User Journey & Friction Audits (Span 5) -->
      <div class="bento-card span-5 stagger-3" data-viewport="true">
        <div class="bento-badge">User Research</div>
        <h3 class="bento-title">User Journey &amp; Friction Audits</h3>
        <p class="bento-desc">We eliminate drop-offs and cognitive fatigue by auditing user task flows, optimizing visual hierarchy, and creating thumb-friendly mobile layouts that accelerate conversion.</p>
        <div class="bento-tags">
          <span class="bento-tag">Information Architecture</span>
          <span class="bento-tag">Friction Audits</span>
          <span class="bento-tag">Task Mapping</span>
        </div>
      </div>

      <!-- Bento 4: Zero-Friction Dev Handoff (Span 7) -->
      <div class="bento-card span-7 stagger-4" data-viewport="true">
        <div class="bento-badge">Developer Handoff</div>
        <h3 class="bento-title">Pixel-Perfect Engineering Handoff</h3>
        <p class="bento-desc">Eliminate designer-developer misalignment. Every screen is delivered with exact CSS values, exportable SVG assets, design tokens in JSON format, and live walkthrough sessions.</p>
        <div class="bento-tags">
          <span class="bento-tag">Figma Dev Mode</span>
          <span class="bento-tag">Design Token JSON</span>
          <span class="bento-tag">SVG Asset Packs</span>
          <span class="bento-tag">Developer Walkthrough</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- UX PERFORMANCE & USABILITY BENCHMARKS SECTION -->
<section class="ux-benchmarks-section" id="ux-benchmarks">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 50px;" data-viewport="true">
      <span class="section-tag">Measured Performance &amp; Usability</span>
      <h2 class="section-title">Design Driven by <mark>Quantifiable UX Benchmarks</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every wireframe flow, interactive component, and design token is rigorously validated to eliminate user friction and maximize conversion rates.</p>
    </div>

    <div class="ux-benchmarks-grid">
      <!-- Benchmark Card 1: 98/100 SUS -->
      <div class="ux-benchmark-card stagger-1" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Usability Benchmark</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">98<span class="ux-benchmark-unit">/100</span></div>
            <span class="ux-benchmark-pill">Top 1% Global Tier</span>
          </div>

          <!-- Micro-Widget: SUS Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 98%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Avg Software: 68 SUS</span>
              <span style="color: var(--color-primary); font-weight: 700;">Bluebase: 98 SUS</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">System Usability (SUS) Score</h3>
          <p class="ux-benchmark-desc">Ranked in the top 1% usability percentile across software applications. Audited through rigorous multi-device task completion testing.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>ISO 9241-11 Standard</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Verified Score</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 2: 2.4x Conversion Lift -->
      <div class="ux-benchmark-card stagger-2" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Funnel Optimization</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">2.4<span class="ux-benchmark-unit">x</span></div>
            <span class="ux-benchmark-pill">+140% Growth</span>
          </div>

          <!-- Micro-Widget: Before/After Conversion -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-sparkline-row">
              <div class="ux-widget-spark-item">
                <span style="color: #64748b; font-family: monospace;">Legacy UI</span>
                <div class="ux-widget-spark-bar-wrap">
                  <div class="ux-widget-spark-bar" style="width: 32%; background: #94a3b8;"></div>
                </div>
                <span style="font-family: monospace; color: #64748b;">2.1%</span>
              </div>
              <div class="ux-widget-spark-item">
                <span style="color: var(--color-primary); font-weight: 700; font-family: monospace;">Bluebase UI</span>
                <div class="ux-widget-spark-bar-wrap">
                  <div class="ux-widget-spark-bar" style="width: 82%; background: var(--color-primary);"></div>
                </div>
                <span style="font-family: monospace; color: var(--color-primary); font-weight: 700;">5.04%</span>
              </div>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Average Conversion Lift</h3>
          <p class="ux-benchmark-desc">Measured user sign-up, onboarding completion, and checkout funnel conversion increase after structural UI/UX architecture redesign.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>A/B Split Test Audited</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Significant Lift</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 3: <48hrs Prototype Delivery -->
      <div class="ux-benchmark-card stagger-3" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Sprint Velocity</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">&lt;48<span class="ux-benchmark-unit">hrs</span></div>
            <span class="ux-benchmark-pill">Rapid Turnaround</span>
          </div>

          <!-- Micro-Widget: Sprint Timeline -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-timeline">
              <div class="ux-widget-step">
                <span class="ux-widget-step-dot"></span>
                <span>0h Flow</span>
              </div>
              <span class="ux-widget-step-arrow">&rarr;</span>
              <div class="ux-widget-step">
                <span class="ux-widget-step-dot"></span>
                <span>24h Kit</span>
              </div>
              <span class="ux-widget-step-arrow">&rarr;</span>
              <div class="ux-widget-step">
                <span class="ux-widget-step-dot" style="background: #10b981;"></span>
                <span style="color: var(--color-primary); font-weight: 700;">48h Prototype</span>
              </div>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Rapid Prototype Delivery</h3>
          <p class="ux-benchmark-desc">Interactive clickable wireframe prototypes delivered for fast investor validation, user feedback, and agile stakeholder sign-off.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>2-Week Sprints</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Active Staging</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 4: 100% Design Token Sync -->
      <div class="ux-benchmark-card stagger-4" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Zero Design Debt</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">100<span class="ux-benchmark-unit">%</span></div>
            <span class="ux-benchmark-pill">Zero Token Drift</span>
          </div>

          <!-- Micro-Widget: Token Sync Ratio -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 100%; background: #10b981;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Figma (128)</span>
              <span style="color: #10b981; font-weight: 700;">Tailwind (100% Sync)</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Design Token Sync</h3>
          <p class="ux-benchmark-desc">Direct 1:1 mapping between Figma variables and Tailwind CSS code. Eliminates designer-developer friction completely.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>GitHub CI/CD Automation</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Automated</span>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ENGINEERING & ACCESSIBILITY STANDARDS SECTION -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Quality Standards</span>
      <h2 class="section-title">Built for Longevity, Accessibility &amp; Speed</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We do not cut corners or deliver fragile templates. Every layout follows disciplined usability and engineering standards.</p>
    </div>

    <div class="features-grid-2">
      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="card-title-lg">WCAG 2.1 AAA Accessibility</h3>
        <p class="card-text">Every color pair, typography scale, and interactive focus state adheres strictly to international WCAG standards for maximum readability and legal compliance.</p>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
        </div>
        <h3 class="card-title-lg">Mobile-First Ergonomics</h3>
        <p class="card-text">Thumb-friendly tap zones, natural swipe gestures, and clear visual hierarchies designed specifically for one-handed smartphone interaction.</p>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <h3 class="card-title-lg">Component-Driven Architecture</h3>
        <p class="card-text">Modular auto-layout master components with smart variants that allow your design system to scale smoothly from 10 screens to 500+ screens without visual clutter.</p>
      </div>

      <div class="feature-card-clean stagger-4" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="card-title-lg">100% Client-Owned Figma Files</h3>
        <p class="card-text">No proprietary locks or withheld assets. You receive full editing rights and 100% ownership of all master Figma files, design tokens, and vector graphics from day one.</p>
      </div>
    </div>
  </div>
</section>

<!-- GEO: GLOBAL REMOTE COLLABORATION SECTION -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Global Delivery</span>
      <h2 class="section-title">Worldwide Collaboration, Zero Friction</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Based in India and operating on a remote-first engineering model, we design and ship digital products for founders and businesses across North America, Europe, Australia, and Asia.</p>
    </div>

    <div class="geo-collab-grid">
      <div class="geo-collab-card stagger-1" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="geo-collab-title">Timezone Overlap</h3>
        <p class="geo-collab-desc">We offer daily overlapping work hours with US (EST/PST), UK (GMT), European (CET), and Australian (AEST) time zones for real-time design reviews and weekly sprint calls.</p>
      </div>

      <div class="geo-collab-card stagger-2" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3 class="geo-collab-title">Direct Designer Access</h3>
        <p class="geo-collab-desc">Collaborate directly with senior product designers and design system architects over Slack, Loom, and Google Meet with zero intermediaries or account managers.</p>
      </div>

      <div class="geo-collab-card stagger-3" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
        </div>
        <h3 class="geo-collab-title">Multi-Currency &amp; Contracts</h3>
        <p class="geo-collab-desc">Seamless invoicing and contracts in USD, EUR, GBP, AUD, and INR. Secure milestone payments processed via Stripe and international wire transfers with complete compliance.</p>
      </div>
    </div>
  </div>
</section>

<!-- TECH & DESIGN STACK SECTION -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Our Design Stack</span>
      <h2 class="section-title">Industry-Standard Design &amp; Prototyping Tools</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We use the modern product design toolchain for rapid iteration, collaborative reviews, and seamless engineering handoffs.</p>
    </div>

    <div class="tech-stack-grid">
      <!-- 01: UX Research & Strategy -->
      <div class="tech-stack-category stagger-1" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </div>
        <h3 class="tech-cat-title">Research &amp; Strategy</h3>
        <ul class="tech-cat-list">
          <li>User Persona Mapping</li>
          <li>Customer Journey Audits</li>
          <li>Information Architecture</li>
          <li>Competitor Heuristics</li>
        </ul>
      </div>

      <!-- 02: Design & Wireframing -->
      <div class="tech-stack-category stagger-2" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
        </div>
        <h3 class="tech-cat-title">Design &amp; Wireframing</h3>
        <ul class="tech-cat-list">
          <li>Figma (Master Workspace)</li>
          <li>FigJam Flowcharts</li>
          <li>Auto-Layout 5.0</li>
          <li>Figma Variables &amp; Tokens</li>
        </ul>
      </div>

      <!-- 03: Prototyping & Motion -->
      <div class="tech-stack-category stagger-3" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="5 3 19 12 5 21 5 3"/></svg>
        </div>
        <h3 class="tech-cat-title">Prototyping &amp; Motion</h3>
        <ul class="tech-cat-list">
          <li>Interactive Components</li>
          <li>Smart Animate Engine</li>
          <li>Lottie Motion Exports</li>
          <li>Micro-Interaction Specs</li>
        </ul>
      </div>

      <!-- 04: Component Systems -->
      <div class="tech-stack-category stagger-4" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 12 12 22 22 12 12 2"/></svg>
        </div>
        <h3 class="tech-cat-title">Component Systems</h3>
        <ul class="tech-cat-list">
          <li>Tailwind CSS Mappings</li>
          <li>Radix UI Primitives</li>
          <li>Lucide Vector Icons</li>
          <li>WCAG Contrast Checkers</li>
        </ul>
      </div>

      <!-- 05: Deliverables & Handoff -->
      <div class="tech-stack-category stagger-5" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
        </div>
        <h3 class="tech-cat-title">Deliverables</h3>
        <ul class="tech-cat-list">
          <li>Figma Master .fig Files</li>
          <li>Clickable Prototype URLs</li>
          <li>Design Token JSON Exports</li>
          <li>SVG / WebP Asset Packs</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4-STEP AGILE DESIGN SPRINT PROCESS -->
<section class="usecases-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Delivery Framework</span>
      <h2 class="section-title">How We Design Your Product</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, sprint-based approach where you review interactive prototypes every week.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Discover &amp; Map</h3>
        <p class="process-step-desc">We map out user personas, define primary task flows, analyze competitor friction points, and establish the information architecture.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">Wireframe &amp; Align</h3>
        <p class="process-step-desc">We produce low-fidelity screen layouts and structural flows to validate content hierarchy and core functionality before visual styling.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Component System</h3>
        <p class="process-step-desc">We craft pixel-perfect typography, color palettes, and reusable UI components with responsive auto-layout variants.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">Prototype &amp; Handoff</h3>
        <p class="process-step-desc">We connect clickable prototype interactions, conduct user testing, and generate developer-ready tokens and specs for engineers.</p>
      </div>
    </div>
  </div>
</section>

<!-- FAQ SECTION -->
<section class="faq-section -gray">
  <div class="container">
    <div class="faq-layout">
      <div class="faq-left" data-viewport="true">
        <span class="section-tag">Frequently Asked</span>
        <h2 class="section-title">Questions &amp; <mark>Answers</mark></h2>
        <p class="section-subtitle">Direct, transparent answers to common questions about our UI/UX Design &amp; Prototyping services.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>Do we get full access to the original Figma design files?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. You receive 100% ownership and full editing access to all Figma files, design tokens, component libraries, and interactive prototypes upon completion.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How many revision rounds are included?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We work collaboratively in weekly sprints with open feedback. Typically, each milestone includes two structured revision cycles to ensure you love the final design before handoff.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Can our internal developers build from your designs easily?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. Our designs are built with auto-layout and mapped directly to developer tokens (like Tailwind CSS spacing, colors, and typography), making developer implementation fast and accurate.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How long does a full UI/UX design project take?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>A complete product design (wireframes, design system, and clickable prototype) for a SaaS platform or mobile app typically takes 2 to 4 weeks.</p>
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
          Ready to Elevate Your Product?<br><mark>Let's Design It Right</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Share your product vision and receive an interactive design roadmap and fixed-milestone proposal within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=ui-ux-design" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Start Your Project</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base">
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </span>
              <span class="c-btn__ico-hover">
                <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
              </span>
            </span>
          </a>
          <a href="{{ route('book-a-demo') }}" class="c-btn -outline-white" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Schedule a Call</span>
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
          <div class="cta-pill-item">Fast 24-Hour Proposal</div>
          <div class="cta-pill-item">Fixed Milestone Pricing</div>
          <div class="cta-pill-item">100% Figma File Ownership</div>
          <div class="cta-pill-item">Direct Designer Collaboration</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<!-- Comprehensive Schema.org Structured Data (SEO / AEO / GEO Optimization) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url('/ui-ux-design') }}",
      "url": "{{ url('/ui-ux-design') }}",
      "name": "UI/UX Product Design &amp; Prototyping Services | Bluebase Technologies",
      "description": "High-converting user experience and interface design for web and mobile products. Complete Figma design systems, wireframing, clickable interactive prototypes, and developer-ready design tokens.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/ui-ux-design#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/ui-ux-design#breadcrumb') }}",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ url('/') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Services",
          "item": "{{ route('services') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "UI/UX Design &amp; Prototyping",
          "item": "{{ url('/ui-ux-design') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/ui-ux-design#service') }}",
      "name": "UI/UX Product Design &amp; Prototyping Services | Bluebase Technologies",
      "serviceType": "UI/UX Product Design &amp; Prototyping",
      "provider": {
        "@@type": "Corporation",
        "name": "Bluebase Technologies",
        "url": "{{ url('/') }}",
        "logo": "{{ asset('images/logo-bluebase.png') }}",
        "foundingLocation": {
          "@@type": "Place",
          "name": "India"
        }
      },
      "areaServed": [
        { "@@type": "Country", "name": "United States" },
        { "@@type": "Country", "name": "United Kingdom" },
        { "@@type": "Country", "name": "European Union" },
        { "@@type": "Country", "name": "Australia" },
        { "@@type": "Country", "name": "Canada" },
        { "@@type": "Country", "name": "India" }
      ],
      "termsOfService": "{{ url('/terms') }}"
    },
    {
      "@@type": "FAQPage",
      "@@id": "{{ url('/ui-ux-design#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "Do we get full access to the original Figma design files?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. You receive 100% ownership and full editing access to all Figma files, design tokens, component libraries, and interactive prototypes upon completion."
          }
        },
        {
          "@@type": "Question",
          "name": "How many revision rounds are included?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We work collaboratively in weekly sprints with open feedback. Typically, each milestone includes two structured revision cycles to ensure you love the final design before handoff."
          }
        },
        {
          "@@type": "Question",
          "name": "Can our internal developers build from your designs easily?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. Our designs are built with auto-layout and mapped directly to developer tokens (like Tailwind CSS spacing, colors, and typography), making developer implementation fast and accurate."
          }
        },
        {
          "@@type": "Question",
          "name": "How long does a full UI/UX design project take?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "A complete product design (wireframes, design system, and clickable prototype) for a SaaS platform or mobile app typically takes 2 to 4 weeks."
          }
        }
      ]
    }
  ]
}
</script>

<!-- Interactive Figma Studio Engine JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const figmaStudio = document.getElementById('figmaStudio');
  const artboardFrame = document.getElementById('artboardFrame');
  const canvasThemeToggle = document.getElementById('artboardThemeToggle');
  const canvasThemeText = document.getElementById('canvasThemeText');
  const swatches = document.querySelectorAll('.figma-swatch-dot');
  const modeTabs = document.querySelectorAll('.figma-mode-tab[data-tab]');
  const canvasPanels = document.querySelectorAll('.figma-canvas-panel');
  const layerItems = document.querySelectorAll('.figma-layer-item');
  const inspectAccentVal = document.getElementById('inspectAccentVal');

  // 1. Live Color Palette Swatches
  swatches.forEach(function (swatch) {
    swatch.addEventListener('click', function () {
      swatches.forEach(s => s.classList.remove('active'));
      swatch.classList.add('active');
      const color = swatch.getAttribute('data-color');
      const rgb = swatch.getAttribute('data-rgb');
      if (figmaStudio) {
        figmaStudio.style.setProperty('--studio-accent', color);
        figmaStudio.style.setProperty('--studio-accent-rgb', rgb);
      }
      if (inspectAccentVal) {
        inspectAccentVal.textContent = color;
      }
    });
  });

  // 2. Dark / Light Mode Toggle for Artboard
  if (canvasThemeToggle && artboardFrame) {
    canvasThemeToggle.addEventListener('click', function () {
      const isDark = artboardFrame.classList.toggle('dark-mode');
      canvasThemeText.textContent = isDark ? 'Light' : 'Dark';
    });
  }

  // 3. Module Mode Tabs Switcher
  modeTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      modeTabs.forEach(t => {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');

      const targetId = 'canvas-' + tab.getAttribute('data-tab');
      canvasPanels.forEach(p => {
        p.classList.remove('active');
        if (p.id === targetId) {
          p.classList.add('active');
        }
      });
    });
  });

  // 4. Layers Click Interaction
  layerItems.forEach(function (layer) {
    layer.addEventListener('click', function () {
      layerItems.forEach(l => l.classList.remove('active'));
      layer.classList.add('active');
    });
  });

  // 5. Prototype Time Tabs (7D / 30D / 1Y)
  const timeTabs = document.querySelectorAll('.proto-time-tab');
  const kpiMrr = document.getElementById('kpiMrr');
  const kpiUsers = document.getElementById('kpiUsers');
  const kpiLift = document.getElementById('kpiLift');

  timeTabs.forEach(function (btn) {
    btn.addEventListener('click', function () {
      timeTabs.forEach(b => {
        b.classList.remove('active');
        b.style.background = 'transparent';
        b.style.color = '#64748b';
      });
      btn.classList.add('active');
      btn.style.background = '#fff';
      btn.style.color = '#000';

      const time = btn.getAttribute('data-time');
      if (time === '7d') {
        if (kpiMrr) kpiMrr.textContent = '$148,200';
        if (kpiUsers) kpiUsers.textContent = '12,840';
        if (kpiLift) kpiLift.textContent = '4.82%';
      } else if (time === '30d') {
        if (kpiMrr) kpiMrr.textContent = '$492,600';
        if (kpiUsers) kpiUsers.textContent = '48,190';
        if (kpiLift) kpiLift.textContent = '5.14%';
      } else if (time === '1y') {
        if (kpiMrr) kpiMrr.textContent = '$2.14M';
        if (kpiUsers) kpiUsers.textContent = '184,300';
        if (kpiLift) kpiLift.textContent = '6.40%';
      }
    });
  });

  // 6. Prototype Modal Trigger & Close
  const triggerModalBtn = document.getElementById('triggerModalBtn');
  const prototypeModal = document.getElementById('prototypeModal');
  const closeModalBtn = document.getElementById('closeModalBtn');
  const confirmModalBtn = document.getElementById('confirmModalBtn');
  const presentBtn = document.getElementById('presentBtn');

  function openModal() {
    if (prototypeModal) prototypeModal.classList.add('active');
  }
  function closeModal() {
    if (prototypeModal) prototypeModal.classList.remove('active');
  }

  if (triggerModalBtn) triggerModalBtn.addEventListener('click', openModal);
  if (presentBtn) presentBtn.addEventListener('click', openModal);
  if (closeModalBtn) closeModalBtn.addEventListener('click', closeModal);
  if (confirmModalBtn) confirmModalBtn.addEventListener('click', closeModal);

  // 7. Live Input Validation Simulation
  const liveInput = document.getElementById('liveValidateInput');
  const liveCheck = document.getElementById('liveValCheck');
  const liveMsg = document.getElementById('liveValMsg');

  if (liveInput && liveCheck && liveMsg) {
    liveInput.addEventListener('input', function () {
      const val = liveInput.value.trim();
      const isValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
      if (isValid) {
        liveCheck.textContent = '\u2713';
        liveCheck.style.color = '#10b981';
        liveMsg.textContent = 'Valid email structure';
        liveMsg.style.color = '#10b981';
      } else {
        liveCheck.textContent = '\u2715';
        liveCheck.style.color = '#ef4444';
        liveMsg.textContent = 'Please enter a valid email format';
        liveMsg.style.color = '#ef4444';
      }
    });
  }

  // 8. Live Switch Toggle
  const liveSwitch = document.getElementById('liveSwitchToggle');
  const liveKnob = document.getElementById('liveSwitchKnob');
  let switchState = true;
  if (liveSwitch && liveKnob) {
    liveSwitch.addEventListener('click', function () {
      switchState = !switchState;
      if (switchState) {
        liveSwitch.style.background = 'var(--studio-accent)';
        liveKnob.style.right = '3px';
        liveKnob.style.left = 'auto';
      } else {
        liveSwitch.style.background = '#94a3b8';
        liveKnob.style.left = '3px';
        liveKnob.style.right = 'auto';
      }
    });
  }

  // 9. Loading State Button Simulation
  const loadingBtn = document.getElementById('loadingStateBtn');
  if (loadingBtn) {
    loadingBtn.addEventListener('click', function () {
      const original = loadingBtn.textContent;
      loadingBtn.textContent = 'Loading...';
      loadingBtn.style.opacity = '0.7';
      setTimeout(function () {
        loadingBtn.textContent = 'Success!';
        loadingBtn.style.background = '#10b981';
        setTimeout(function () {
          loadingBtn.textContent = original;
          loadingBtn.style.background = 'var(--studio-accent)';
          loadingBtn.style.opacity = '1';
        }, 1200);
      }, 800);
    });
  }

  // 10. Copy CSS Code Button
  const copyCssBtn = document.getElementById('copyCssBtn');
  if (copyCssBtn) {
    copyCssBtn.addEventListener('click', function () {
      copyCssBtn.textContent = 'Copied!';
      setTimeout(function () {
        copyCssBtn.textContent = 'Copy CSS';
      }, 1500);
    });
  }

  // 11. Color Token Swatch Click to Copy
  const colorTiles = document.querySelectorAll('.color-token-tile');
  colorTiles.forEach(function (tile) {
    tile.addEventListener('click', function () {
      const hex = tile.getAttribute('data-hex');
      const label = tile.querySelector('span:first-of-type');
      if (label) {
        const orig = label.textContent;
        label.textContent = 'Copied!';
        setTimeout(function () {
          label.textContent = orig;
        }, 1200);
      }
    });
  });
});
</script>
@endpush
