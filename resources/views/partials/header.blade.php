<!-- SITE HEADER -->
<header class="site-header">
  <div class="container-fluid header-container">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="header-logo" aria-label="Bluebase Technologies Home">
      <img src="{{ asset('images/logo-bluebase-white.png') }}" alt="Bluebase Technologies" class="header-logo-white">
      <img src="{{ asset('images/logo-bluebase.png') }}" alt="Bluebase Technologies" class="header-logo-dark" style="display: none;">
    </a>

    <!-- Desktop Nav -->
    <nav class="header-nav" aria-label="Main Navigation">
      <ul class="nav-list">
        
        <!-- 1. Services Dropdown -->
        <li class="nav-item">
          <a href="{{ route('services') }}" class="nav-link {{ request()->is('services*') ? 'active' : '' }}">
            Services
            <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
          </a>
          <div class="megamenu">
            <div class="megamenu-grid">
              
              <!-- Col 1: Development & Engineering -->
              <div class="megamenu-col">
                <h4>Development &amp; Engineering</h4>
                <ul>
                  <li><a href="{{ route('services.web-development') }}">Web App Development</a></li>
                  <li><a href="{{ route('services.website-design') }}">Website Design &amp; Build</a></li>
                  <li><a href="{{ route('services.mobile-app-development') }}">Mobile App Development</a></li>
                  <li><a href="{{ route('services.saas-mvp-development') }}">SaaS MVP Engineering</a></li>
                  <li><a href="{{ route('services.ecommerce-development') }}">E-Commerce Online Stores</a></li>
                </ul>
              </div>

              <!-- Col 2: Design & Solutions -->
              <div class="megamenu-col">
                <h4>Design &amp; Solutions</h4>
                <ul>
                  <li><a href="{{ route('services.ui-ux-design') }}">UI/UX Design &amp; Prototyping</a></li>
                  <li><a href="{{ route('services.api-backend-development') }}">API &amp; Backend Development</a></li>
                  <li><a href="{{ route('services.website-redesign') }}">Website Redesign &amp; Speed</a></li>
                  <li><a href="{{ route('services.maintenance-support') }}">Maintenance &amp; Support</a></li>
                  <li><a href="{{ route('compliance-security') }}">Security &amp; Performance</a></li>
                </ul>
              </div>

              <!-- Col 3: How We Work -->
              <div class="megamenu-col">
                <h4><a href="{{ route('how-we-work') }}" style="color: inherit; text-decoration: none;">How We Work</a></h4>
                <ul>
                  <li><a href="{{ route('how-we-work') }}#direct-developer-access">Direct Developer Access</a></li>
                  <li><a href="{{ route('how-we-work') }}#agile-milestone-sprints">Agile Milestone Sprints</a></li>
                  <li><a href="{{ route('how-we-work') }}#client-code-ownership">100% Client Code Ownership</a></li>
                  <li><a href="{{ route('how-we-work') }}#transparent-fixed-pricing">Transparent Fixed Pricing</a></li>
                  <li><a href="{{ route('how-we-work') }}#free-project-consultation">Free Project Consultation</a></li>
                </ul>
              </div>

              <!-- Feature Highlight Card -->
              <div class="megamenu-card">
                <div>
                  <span class="megamenu-card-tag">Practical Engineering</span>
                  <h5 class="megamenu-card-title">We build clean, responsive, high-performing websites and digital products for modern founders.</h5>
                </div>
                <a href="{{ route('contact') }}" class="c-btn -link">
                  <span class="c-btn__txt">Start Your Project</span>
                  <span class="c-btn__ico">
                    <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                    <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                  </span>
                </a>
              </div>

            </div>
          </div>
        </li>

        <!-- 2. Company Dropdown -->
        <li class="nav-item">
          <a href="{{ route('company') }}" class="nav-link {{ request()->is('company*') || request()->is('careers*') ? 'active' : '' }}">
            Company
            <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
          </a>
          <div class="megamenu -company">
            <div class="megamenu-grid">
              
              <div class="megamenu-col">
                <h4>Company</h4>
                <ul>
                  <li><a href="{{ route('company') }}"><strong>About Bluebase Technologies</strong></a></li>
                  <li><a href="{{ route('how-we-work') }}"><strong>How We Work (Our Process)</strong></a></li>
                  <li><a href="{{ route('company') }}#story">Our Story &amp; Mission</a></li>
                  <li><a href="{{ route('company') }}#values">Core Engineering Principles</a></li>
                  <li><a href="{{ route('company') }}#faq">Frequently Asked Questions</a></li>
                  <li><a href="{{ route('careers') }}">Careers &amp; Open Roles</a></li>
                  <li><a href="{{ route('compliance-security') }}">Security &amp; Client Privacy</a></li>
                </ul>
              </div>

              <div class="megamenu-card">
                <div>
                  <span class="megamenu-card-tag">Remote-First Team</span>
                  <h5 class="megamenu-card-title">An independent software startup delivering quality engineering without agency overhead.</h5>
                </div>
                <a href="{{ route('company') }}" class="c-btn -link">
                  <span class="c-btn__txt">Explore Our Story</span>
                  <span class="c-btn__ico">
                    <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                    <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                  </span>
                </a>
              </div>

            </div>
          </div>
        </li>

        <!-- 3. Solutions Dropdown -->
        <li class="nav-item">
          <a href="{{ route('solutions') }}" class="nav-link {{ request()->is('solutions*') ? 'active' : '' }}">
            Solutions
            <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
          </a>
          <div class="megamenu -solutions">
            <div class="megamenu-grid">
              
              <div class="megamenu-col">
                <h4>For Startups</h4>
                <ul>
                  <li><a href="{{ route('services.saas-mvp-development') }}">Early-Stage MVP Launch</a></li>
                  <li><a href="{{ route('services.web-development') }}">SaaS Product Engineering</a></li>
                  <li><a href="{{ route('services.ui-ux-design') }}">UI/UX Product Design</a></li>
                  <li><a href="{{ route('services.mobile-app-development') }}">Mobile App Products</a></li>
                  <li><a href="{{ route('services.website-redesign') }}">Website Redesign &amp; Upgrades</a></li>
                </ul>
              </div>

              <div class="megamenu-col">
                <h4>For Growing Businesses</h4>
                <ul>
                  <li><a href="{{ route('services.website-design') }}">Corporate &amp; Marketing Websites</a></li>
                  <li><a href="{{ route('services.ecommerce-development') }}">Online Stores &amp; E-Commerce</a></li>
                  <li><a href="{{ route('services.web-development') }}">Client &amp; Customer Portals</a></li>
                  <li><a href="{{ route('services.web-development') }}">Internal Admin Dashboards</a></li>
                  <li><a href="{{ route('services.api-backend-development') }}">Payment &amp; API Integrations</a></li>
                </ul>
              </div>

              <div class="megamenu-card">
                <div>
                  <span class="megamenu-card-tag">Tailored Solutions</span>
                  <h5 class="megamenu-card-title">Reliable web and mobile engineering designed to launch fast and scale with your business.</h5>
                </div>
                <a href="{{ route('solutions') }}" class="c-btn -link">
                  <span class="c-btn__txt">Explore Solutions</span>
                  <span class="c-btn__ico">
                    <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                    <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                  </span>
                </a>
              </div>

            </div>
          </div>
        </li>

        <!-- 4. Resources Dropdown -->
        <li class="nav-item">
          <a href="{{ route('blog') }}" class="nav-link {{ request()->is('blog*') || request()->is('whitepapers*') ? 'active' : '' }}">
            Resources
            <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
          </a>
          <div class="megamenu -resources">
            <div class="megamenu-grid">
              
              <div class="megamenu-col">
                <h4>Insights &amp; Articles</h4>
                <ul>
                  <li><a href="{{ route('blog') }}"><strong>Bluebase Tech Blog</strong></a></li>
                  <li><a href="{{ route('customer-stories') }}">Client Project Stories</a></li>
                  <li><a href="{{ route('whitepapers') }}">Developer Guides</a></li>
                  <li><a href="{{ route('blog') }}">Architecture Articles</a></li>
                </ul>
              </div>

              <div class="megamenu-col">
                <h4>Transparency &amp; Legal</h4>
                <ul>
                  <li><a href="{{ route('privacy-policy') }}">Client Privacy Policy</a></li>
                  <li><a href="{{ route('terms-of-use') }}">Terms of Service</a></li>
                  <li><a href="{{ route('compliance-security') }}">Security &amp; Data Safety</a></li>
                  <li><a href="{{ route('company') }}#faq">Frequently Asked Questions</a></li>
                </ul>
              </div>

              <div class="megamenu-card">
                <div>
                  <span class="megamenu-card-tag">Tech Blog</span>
                  <h5 class="megamenu-card-title">Practical guides on modern web development, UI design, and launching digital products.</h5>
                </div>
                <a href="{{ route('blog') }}" class="c-btn -link">
                  <span class="c-btn__txt">Read Our Blog</span>
                  <span class="c-btn__ico">
                    <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                    <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
                  </span>
                </a>
              </div>

            </div>
          </div>
        </li>

        <!-- 5. Contact Direct Link -->
        <li class="nav-item">
          <a href="{{ route('contact') }}" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
        </li>

      </ul>
    </nav>

    <!-- Action Buttons -->
    <div class="header-actions">
      <a href="{{ route('contact') }}" class="c-btn -primary">
        <span class="c-btn__txt">Start a Project</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        </span>
      </a>
      <a href="{{ route('book-a-demo') }}" class="c-btn -secondary">
        <span class="c-btn__txt">Schedule a Call</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        </span>
      </a>
    </div>

    <!-- Mobile Hamburger Button -->
    <button class="mobile-toggle" aria-label="Toggle Navigation Menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div>
</header>

<!-- Mobile Overlay & Drawer -->
<div class="mobile-overlay"></div>
<aside class="mobile-nav-drawer" aria-label="Mobile Navigation">
  
  <!-- Mobile Services -->
  <div class="mobile-menu-item">
    <button class="mobile-menu-title">
      <span>Services</span>
      <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
    </button>
    <div class="mobile-submenu">
      <a href="{{ route('services.web-development') }}">Web App Development</a>
      <a href="{{ route('services.website-design') }}">Website Design &amp; Build</a>
      <a href="{{ route('services.mobile-app-development') }}">Mobile App Development</a>
      <a href="{{ route('services.saas-mvp-development') }}">SaaS MVP Engineering</a>
      <a href="{{ route('services.ui-ux-design') }}">UI/UX Design &amp; Prototyping</a>
      <a href="{{ route('services.ecommerce-development') }}">E-Commerce Online Stores</a>
      <a href="{{ route('services.api-backend-development') }}">API &amp; Backend Development</a>
      <a href="{{ route('services.website-redesign') }}">Website Redesign &amp; Speed</a>
      <a href="{{ route('services.maintenance-support') }}">Maintenance &amp; Support</a>
    </div>
  </div>

  <!-- Mobile Company -->
  <div class="mobile-menu-item">
    <button class="mobile-menu-title">
      <span>Company</span>
      <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
    </button>
    <div class="mobile-submenu">
      <a href="{{ route('company') }}"><strong>About Bluebase Technologies</strong></a>
      <a href="{{ route('how-we-work') }}"><strong>How We Work (Our Process)</strong></a>
      <a href="{{ route('company') }}#story">Our Story &amp; Mission</a>
      <a href="{{ route('company') }}#values">Core Engineering Principles</a>
      <a href="{{ route('company') }}#faq">Frequently Asked Questions</a>
      <a href="{{ route('careers') }}">Careers &amp; Open Roles</a>
      <a href="{{ route('compliance-security') }}">Security &amp; Client Privacy</a>
    </div>
  </div>

  <!-- Mobile Solutions -->
  <div class="mobile-menu-item">
    <button class="mobile-menu-title">
      <span>Solutions</span>
      <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
    </button>
    <div class="mobile-submenu">
      <a href="{{ route('services.saas-mvp-development') }}">Early-Stage MVP Launch</a>
      <a href="{{ route('services.web-development') }}">Custom Web Platforms</a>
      <a href="{{ route('services.website-design') }}">Corporate &amp; Marketing Websites</a>
      <a href="{{ route('services.ecommerce-development') }}">Online Stores &amp; E-Commerce</a>
      <a href="{{ route('services.web-development') }}">Client &amp; Customer Portals</a>
      <a href="{{ route('customer-stories') }}">Client Project Stories</a>
    </div>
  </div>

  <!-- Mobile Resources -->
  <div class="mobile-menu-item">
    <button class="mobile-menu-title">
      <span>Resources</span>
      <svg viewBox="0 0 10 6"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" fill="none"/></svg>
    </button>
    <div class="mobile-submenu">
      <a href="{{ route('blog') }}"><strong>Bluebase Tech Blog</strong></a>
      <a href="{{ route('customer-stories') }}">Client Project Stories</a>
      <a href="{{ route('whitepapers') }}">Developer Guides</a>
      <a href="{{ route('compliance-security') }}">Security &amp; Data Safety</a>
      <a href="{{ route('terms-of-use') }}">Terms of Service</a>
      <a href="{{ route('privacy-policy') }}">Client Privacy Policy</a>
    </div>
  </div>

  <!-- Mobile Contact -->
  <div class="mobile-menu-item">
    <a href="{{ route('contact') }}" class="mobile-menu-title" style="display: block;">Contact</a>
  </div>

  <!-- Mobile CTAs -->
  <div class="mobile-actions">
    <a href="{{ route('contact') }}" class="c-btn -primary" style="width: 100%;">
      <span class="c-btn__txt">Start a Project</span>
      <span class="c-btn__ico">
        <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
      </span>
    </a>
    <a href="{{ route('book-a-demo') }}" class="c-btn -secondary" style="width: 100%;">
      <span class="c-btn__txt">Schedule a Call</span>
      <span class="c-btn__ico">
        <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
      </span>
    </a>
  </div>
</aside>
