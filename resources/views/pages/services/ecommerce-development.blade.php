@extends('layouts.app')

@section('title', 'E-Commerce Development Services | Custom Online Stores | Bluebase Technologies')
@section('meta_description', 'Custom e-commerce store development, bespoke storefronts, and payment gateway integrations with Stripe, Razorpay, and Shopify. Engineered for speed and maximum checkout conversions.')

@section('content')
<!-- HERO SECTION -->
<section class="hero-section">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- SEO / AEO / GEO Hidden Breadcrumb (Active for Crawlers & Bots, Visually Hidden) -->
    <nav aria-label="Breadcrumb" class="hero-breadcrumb">
      <ol class="breadcrumb-pill" itemscope itemtype="https://schema.org/BreadcrumbList">
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('home') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Home</span>
          </a>
          <meta itemprop="position" content="1">
        </li>
        <li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <a href="{{ route('services') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Services</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">E-Commerce Development</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Custom E-Commerce Stores</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Custom E-Commerce Stores <br><mark>Built to Sell &amp; Scale</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      From bespoke storefronts to seamless one-page checkouts, we engineer fast online stores that turn everyday traffic into paying customers.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=ecommerce-development" class="c-btn -primary">
        <span class="c-btn__txt">Start Your Store Project</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
          <span class="c-btn__ico-hover">
            <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
          </span>
        </span>
      </a>
      <a href="#interactive-ecomm-demo" class="c-btn -secondary">
        <span class="c-btn__txt">Explore Live Store Demo</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base">
            <svg viewBox="0 0 16 16"><path d="M8 3v10M3 8l5 5 5-5"/></svg>
          </span>
          <span class="c-btn__ico-hover">
            <svg viewBox="0 0 16 16"><path d="M8 3v10M3 8l5 5 5-5"/></svg>
          </span>
        </span>
      </a>
    </div>

    <div class="hero-badges stagger-4" data-viewport="true">
      <div class="hero-badge-item">Frictionless 1-Page Checkout</div>
      <div class="hero-badge-item">Stripe &amp; Multi-Currency</div>
      <div class="hero-badge-item">100% Code &amp; Store Ownership</div>
    </div>

  </div>
</section>

<!-- MARQUEE SECTION -->
@include('partials.client-marquee', ['heading' => 'Trusted by modern brands, founders, and growing businesses worldwide'])

<!-- INTERACTIVE E-COMMERCE STORE EXPERIENCE -->
<section class="ecomm-showcase-section" id="interactive-ecomm-demo">
  <div class="container">
    
    <div class="text-center" style="max-width: 840px; margin: 0 auto 36px;" data-viewport="true">
      <span class="section-tag">Live Storefront Experience</span>
      <h2 class="section-title">Experience the High-Converting E-Commerce Stack We Engineer</h2>
      <p class="section-subtitle" style="margin: 0 auto;">
        Interact with the live online store mockup below. Filter products by category, test the instant Add-to-Cart drawer, apply discount code <code>LAUNCH20</code>, and experience frictionless one-click checkout.
      </p>
    </div>

    <!-- The E-Commerce Storefront Desktop Window Frame -->
    <div class="ecomm-store-window" data-viewport="true">
      
      <!-- Top Chrome Bar -->
      <div class="ecomm-store-chrome">
        <div class="saas-traffic-lights">
          <div class="saas-traffic-dot -red" title="Close Window"></div>
          <div class="saas-traffic-dot -yellow" title="Minimize Window"></div>
          <div class="saas-traffic-dot -green" title="Expand Window"></div>
        </div>

        <div class="ecomm-chrome-center">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
          <span>store.lumina-craft.com/shop/new-arrivals</span>
        </div>

        <div class="ecomm-chrome-right">
          <div class="saas-status-pill">
            <span class="saas-status-dot"></span>
            <span>99.99% Gateway Uptime</span>
          </div>
          <span style="font-size: 0.75rem; color: #94a3b8; font-weight: 600;">USD ($)</span>
        </div>
      </div>

      <!-- Store Announcement Banner -->
      <div class="ecomm-store-banner">
        <span>FREE EXPRESS SHIPPING ON ORDERS OVER $150 &bull; 30-DAY HASSLE-FREE RETURNS</span>
      </div>

      <!-- Store Navigation Header -->
      <div class="ecomm-store-header">
        <div class="ecomm-brand">
          <div class="ecomm-brand-logo">L</div>
          <span class="ecomm-brand-name">Lumina</span>
        </div>

        <!-- Category Filter Tabs -->
        <div class="ecomm-category-tabs" role="tablist">
          <button class="ecomm-category-tab active" data-category="all">All Products</button>
          <button class="ecomm-category-tab" data-category="audio">Audio &amp; Tech</button>
          <button class="ecomm-category-tab" data-category="apparel">Apparel</button>
          <button class="ecomm-category-tab" data-category="workspace">Workspace</button>
        </div>

        <!-- Header Actions: Cart Trigger -->
        <div class="ecomm-header-actions">
          <button class="ecomm-cart-trigger" id="openCartDrawerBtn" title="View Shopping Cart">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            <span>Cart</span>
            <span class="ecomm-cart-count-pill" id="cartCountBadge">2</span>
          </button>
        </div>
      </div>

      <!-- Store Product Grid -->
      <div class="ecomm-store-content">
        <div class="ecomm-products-grid" id="productGrid">
          
          <!-- Product 1: Studio Headphones -->
          <div class="ecomm-product-card" data-category="audio">
            <div class="ecomm-product-visual">
              <span class="ecomm-product-tag -sale">15% Off</span>
              <div class="ecomm-product-icon-art">
                <svg viewBox="0 0 24 24" width="46" height="46" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
              </div>
            </div>
            <div class="ecomm-product-info">
              <div>
                <div class="ecomm-product-cat">Audio &amp; Tech</div>
                <h4 class="ecomm-product-title">AeroFlow ANC Studio Headphones</h4>
                <div class="ecomm-product-reviews">
                  <div class="ecomm-stars">
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                  </div>
                  <span>4.9 (142 reviews)</span>
                </div>
              </div>

              <div class="ecomm-product-bottom">
                <div class="ecomm-price-block">
                  <span class="ecomm-price-current">$189.00</span>
                  <span class="ecomm-price-old">$220.00</span>
                </div>
                <button class="ecomm-add-btn" data-name="AeroFlow Studio Headphones" data-price="189.00" data-cat="Audio &amp; Tech">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path d="M8 2v12M2 8h12"/></svg>
                  <span>Add to Cart</span>
                </button>
              </div>
            </div>
          </div>

          <!-- Product 2: Merino Parka -->
          <div class="ecomm-product-card" data-category="apparel">
            <div class="ecomm-product-visual">
              <span class="ecomm-product-tag -popular">Best Seller</span>
              <div class="ecomm-product-icon-art">
                <svg viewBox="0 0 24 24" width="46" height="46" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M20.38 3.46 16 2a4 4 0 0 1-8 0L3.62 3.46a2 2 0 0 0-1.34 2.23l.58 3.47a1 1 0 0 0 .99.84H6v10c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2V10h2.15a1 1 0 0 0 .99-.84l.58-3.47a2 2 0 0 0-1.34-2.23z"/></svg>
              </div>
            </div>
            <div class="ecomm-product-info">
              <div>
                <div class="ecomm-product-cat">Apparel</div>
                <h4 class="ecomm-product-title">Merino Wool Minimalist Parka</h4>
                <div class="ecomm-product-reviews">
                  <div class="ecomm-stars">
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                  </div>
                  <span>4.8 (89 reviews)</span>
                </div>
              </div>

              <div class="ecomm-product-bottom">
                <div class="ecomm-price-block">
                  <span class="ecomm-price-current">$245.00</span>
                </div>
                <button class="ecomm-add-btn" data-name="Merino Wool Minimalist Parka" data-price="245.00" data-cat="Apparel">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path d="M8 2v12M2 8h12"/></svg>
                  <span>Add to Cart</span>
                </button>
              </div>
            </div>
          </div>

          <!-- Product 3: Titanium Smartwatch -->
          <div class="ecomm-product-card" data-category="audio">
            <div class="ecomm-product-visual">
              <span class="ecomm-product-tag -popular">Popular</span>
              <div class="ecomm-product-icon-art">
                <svg viewBox="0 0 24 24" width="46" height="46" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="6" y="2" width="12" height="20" rx="3"/><circle cx="12" cy="12" r="5"/><polyline points="12 10 12 12 14 13"/></svg>
              </div>
            </div>
            <div class="ecomm-product-info">
              <div>
                <div class="ecomm-product-cat">Audio &amp; Tech</div>
                <h4 class="ecomm-product-title">Obsidian Titanium Smartwatch</h4>
                <div class="ecomm-product-reviews">
                  <div class="ecomm-stars">
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                  </div>
                  <span>4.9 (210 reviews)</span>
                </div>
              </div>

              <div class="ecomm-product-bottom">
                <div class="ecomm-price-block">
                  <span class="ecomm-price-current">$149.00</span>
                  <span class="ecomm-price-old">$180.00</span>
                </div>
                <button class="ecomm-add-btn" data-name="Obsidian Titanium Smartwatch" data-price="149.00" data-cat="Audio &amp; Tech">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path d="M8 2v12M2 8h12"/></svg>
                  <span>Add to Cart</span>
                </button>
              </div>
            </div>
          </div>

          <!-- Product 4: Walnut Desk Mat -->
          <div class="ecomm-product-card" data-category="workspace">
            <div class="ecomm-product-visual">
              <span class="ecomm-product-tag -sale">Limited</span>
              <div class="ecomm-product-icon-art">
                <svg viewBox="0 0 24 24" width="46" height="46" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
              </div>
            </div>
            <div class="ecomm-product-info">
              <div>
                <div class="ecomm-product-cat">Workspace</div>
                <h4 class="ecomm-product-title">Solid Walnut Ergonomic Desk Mat</h4>
                <div class="ecomm-product-reviews">
                  <div class="ecomm-stars">
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <svg viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                  </div>
                  <span>4.8 (64 reviews)</span>
                </div>
              </div>

              <div class="ecomm-product-bottom">
                <div class="ecomm-price-block">
                  <span class="ecomm-price-current">$79.00</span>
                </div>
                <button class="ecomm-add-btn" data-name="Solid Walnut Desk Mat" data-price="79.00" data-cat="Workspace">
                  <svg viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path d="M8 2v12M2 8h12"/></svg>
                  <span>Add to Cart</span>
                </button>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Slide-Over Cart Drawer & Instant One-Page Checkout -->
      <aside class="ecomm-cart-drawer" id="cartDrawer" aria-label="Shopping Bag">
        <div class="ecomm-cart-drawer-header">
          <div class="ecomm-cart-drawer-title">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/></svg>
            <span>Shopping Bag (<span id="cartDrawerCount">2</span>)</span>
          </div>
          <button class="ecomm-cart-close-btn" id="closeCartDrawerBtn" title="Close Bag">
            <svg viewBox="0 0 16 16" width="14" height="14" fill="currentColor"><path d="M4 4l8 8M12 4l-8 8"/></svg>
          </button>
        </div>

        <div class="ecomm-cart-drawer-body" id="cartItemsList">
          <!-- Item 1 -->
          <div class="ecomm-cart-item">
            <div class="ecomm-cart-item-left">
              <div class="ecomm-cart-item-icon">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>
              </div>
              <div class="ecomm-cart-item-info">
                <span class="ecomm-cart-item-name">AeroFlow ANC Headphones</span>
                <span class="ecomm-cart-item-meta">Qty: 1 &bull; Color: Obsidian</span>
              </div>
            </div>
            <span class="ecomm-cart-item-price">$189.00</span>
          </div>

          <!-- Item 2 -->
          <div class="ecomm-cart-item">
            <div class="ecomm-cart-item-left">
              <div class="ecomm-cart-item-icon">
                <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="6" y="2" width="12" height="20" rx="3"/><circle cx="12" cy="12" r="5"/><polyline points="12 10 12 12 14 13"/></svg>
              </div>
              <div class="ecomm-cart-item-info">
                <span class="ecomm-cart-item-name">Obsidian Titanium Watch</span>
                <span class="ecomm-cart-item-meta">Qty: 1 &bull; Size: 44mm</span>
              </div>
            </div>
            <span class="ecomm-cart-item-price">$149.00</span>
          </div>
        </div>

        <!-- Cart Footer with Discount & One-Click Checkout -->
        <div class="ecomm-cart-drawer-footer">
          <div class="ecomm-promo-box">
            <input type="text" class="ecomm-promo-input" id="promoInput" placeholder="Promo code (try LAUNCH20)" value="LAUNCH20">
            <button class="ecomm-promo-btn" id="applyPromoBtn">Apply</button>
          </div>
          <div id="promoNotice" style="display: block; font-size: 0.74rem; color: #059669; font-weight: 600; margin-bottom: 10px;">
            Discount code applied: 20% savings.
          </div>

          <div class="ecomm-cart-totals">
            <div class="ecomm-cart-row">
              <span>Subtotal</span>
              <span id="cartSubtotal">$338.00</span>
            </div>
            <div class="ecomm-cart-row">
              <span>Express Shipping</span>
              <span style="color: #059669; font-weight: 600;">FREE</span>
            </div>
            <div class="ecomm-cart-row" id="discountRow" style="color: #059669;">
              <span>Promo Discount (20%)</span>
              <span id="discountVal">-$67.60</span>
            </div>
            <div class="ecomm-cart-row -total">
              <span>Estimated Total</span>
              <span id="cartFinalTotal">$270.40</span>
            </div>
          </div>

          <button class="ecomm-pay-apple-btn" id="applePayBtn">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.87c.6-.74 1.01-1.77.9-2.8-.88.04-1.94.59-2.56 1.32-.54.62-.99 1.63-.86 2.65.98.08 1.93-.46 2.52-1.17z"/></svg>
            <span>Pay with Apple Pay</span>
          </button>

          <button class="ecomm-pay-stripe-btn" id="stripePayBtn">
            <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="12" height="10" rx="2"/><line x1="2" y1="7" x2="14" y2="7"/></svg>
            <span>Proceed to Secure Checkout</span>
          </button>

          <div style="text-align: center; margin-top: 10px; font-size: 0.72rem; color: var(--color-gray-500); display: flex; align-items: center; justify-content: center; gap: 8px;">
            <span>256-Bit SSL Encryption</span>
            <span>&bull;</span>
            <span>Stripe PCI-DSS Level 1</span>
          </div>
        </div>
      </aside>

    </div>

  </div>
</section>

<!-- BENTO ARCHITECTURE GRID SECTION -->
<section class="subpage-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Conversion Architecture</span>
      <h2 class="section-title">Engineered for Rapid Checkout &amp; Maximum Order Value</h2>
      <p class="section-subtitle" style="margin: 0 auto;">
        We eliminate friction across your sales funnel. Sub-second product navigation, express payment methods, and automated inventory sync.
      </p>
    </div>

    <div class="bento-showcase-grid">
      
      <!-- Track 1: Frictionless One-Page Checkout (Span 7) -->
      <div class="bento-card -span-7 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">Frictionless Checkout</span>
          <h3 class="bento-card-title">One-Page Express Checkout Funnel</h3>
          <p class="bento-card-desc">Eliminate cart abandonment with single-step checkouts. Integrated with Apple Pay, Google Pay, auto-address lookup, and zero mandatory account creation.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Apple Pay &amp; Google Pay</span>
            <span class="token-pill">Guest Checkout</span>
            <span class="token-pill">1-Click Purchase</span>
            <span class="token-pill">Address Autocomplete</span>
          </div>
        </div>
      </div>

      <!-- Track 2: Sub-Second Faceted Search (Span 5) -->
      <div class="bento-card -span-5 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Instant Discovery</span>
          <h3 class="bento-card-title">Sub-Second Product Search &amp; Filters</h3>
          <p class="bento-card-desc">Instant faceted search powered by Algolia and Meilisearch. Category filtering, multi-variant color selectors, and live stock tags with zero reload lag.</p>
        </div>

        <div class="bento-interactive-snippet">
          <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 8px; font-size: 0.86rem; color: var(--color-gray-600);">
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="13" height="13" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Sub-50ms query responses
            </li>
            <li style="display: flex; align-items: center; gap: 8px;">
              <svg viewBox="0 0 16 16" width="13" height="13" fill="#0050E7"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg>
              Typo-tolerant intelligent matching
            </li>
          </ul>
        </div>
      </div>

      <!-- Track 3: Automated Inventory Sync (Span 5) -->
      <div class="bento-card -span-5 stagger-1" data-viewport="true">
        <div>
          <span class="bento-card-badge">Operations &amp; ERP</span>
          <h3 class="bento-card-title">Automated Inventory &amp; Multi-Channel Sync</h3>
          <p class="bento-card-desc">Sync stock in real time between your custom web store, Shopify, ERP, warehouse management system, and accounting software.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; gap: 8px; flex-wrap: wrap;">
            <span class="token-pill">Shopify / Woo APIs</span>
            <span class="token-pill">Warehouse Webhooks</span>
            <span class="token-pill">Automated Low-Stock Alerts</span>
          </div>
        </div>
      </div>

      <!-- Track 4: Multi-Currency & Localized Gateways (Span 7) -->
      <div class="bento-card -span-7 stagger-2" data-viewport="true">
        <div>
          <span class="bento-card-badge">Global Sales</span>
          <h3 class="bento-card-title">Multi-Currency &amp; Localized Payment Gateways</h3>
          <p class="bento-card-desc">Accept payments in 135+ currencies with automatic geolocation detection. Direct integrations with Stripe, Razorpay, Klarna Pay in 4, and PayPal.</p>
        </div>

        <div class="bento-interactive-snippet">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
            <span style="font-weight: 600; font-size: 0.85rem; color: var(--color-primary);">Global Gateway Pipeline</span>
            <span style="font-size: 0.78rem; color: #059669; font-weight: 600;">100% Secure Checkout</span>
          </div>
          <div class="tokens-strip">
            <span class="token-pill">Stripe Elements</span>
            <span class="token-pill">Razorpay Subscriptions</span>
            <span class="token-pill">Klarna BNPL</span>
            <span class="token-pill">Automated Tax / VAT</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- E-COMMERCE CONVERSION BENCHMARKS -->
<section class="subpage-section -gray" style="padding: 70px 0;">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Performance Benchmarks</span>
      <h2 class="section-title">Built for High Volume &amp; Maximum Speed</h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every 100ms improvement in page speed directly increases online store sales. We build for peak load reliability.</p>
    </div>

    <div class="stats-grid-4">
      <div class="stat-card-clean stagger-1" data-viewport="true">
        <div class="stat-card-number">
          &lt;1.2<span class="symbol">s</span>
        </div>
        <h3 class="stat-card-title">Average Storefront Speed</h3>
        <p class="stat-card-desc">Optimized asset bundles, responsive WebP images, and edge CDN caching worldwide.</p>
      </div>

      <div class="stat-card-clean stagger-2" data-viewport="true">
        <div class="stat-card-number">
          +35<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Checkout Conversion Lift</h3>
        <p class="stat-card-desc">Proven one-page funnel designs eliminating form friction and surprise charges.</p>
      </div>

      <div class="stat-card-clean stagger-3" data-viewport="true">
        <div class="stat-card-number">
          99.99<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Gateway Uptime</h3>
        <p class="stat-card-desc">Redundant fallback payment processors ensuring zero lost sales during peak promotions.</p>
      </div>

      <div class="stat-card-clean stagger-4" data-viewport="true">
        <div class="stat-card-number">
          100<span class="symbol">%</span>
        </div>
        <h3 class="stat-card-title">Code Ownership</h3>
        <p class="stat-card-desc">Complete intellectual property, custom themes, and data pipelines 100% owned by you.</p>
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
      <p class="section-subtitle" style="margin: 0 auto;">Based in India and operating on a remote-first engineering model, we build and deploy digital products for founders and businesses across North America, Europe, Australia, and Asia.</p>
    </div>

    <div class="geo-collab-grid">
      <div class="geo-collab-card stagger-1" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <h3 class="geo-collab-title">Timezone Overlap</h3>
        <p class="geo-collab-desc">We offer daily overlapping work hours with US (EST/PST), UK (GMT), European (CET), and Australian (AEST) time zones for real-time collaboration and sprint reviews.</p>
      </div>

      <div class="geo-collab-card stagger-2" data-viewport="true">
        <div class="geo-collab-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
        </div>
        <h3 class="geo-collab-title">Direct Developer Access</h3>
        <p class="geo-collab-desc">Collaborate directly with senior developers and solution architects over Slack, WhatsApp, and Google Meet with zero layers of management.</p>
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

<!-- TECH STACK SECTION -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Our Technology Stack</span>
      <h2 class="section-title">Modern E-Commerce Platforms &amp; Tools</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We select scalable, proven e-commerce frameworks and infrastructure tailored to your catalog volume and business requirements.</p>
    </div>

    <div class="tech-stack-grid">
      <div class="tech-stack-category stagger-1" data-viewport="true">
        <h3 class="tech-cat-title">Storefront Tech</h3>
        <ul class="tech-cat-list">
          <li>Next.js Commerce</li>
          <li>React &amp; TypeScript</li>
          <li>Tailwind CSS</li>
          <li>Shopify Hydrogen</li>
          <li>Shopify Liquid</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-2" data-viewport="true">
        <h3 class="tech-cat-title">Backend &amp; CMS</h3>
        <ul class="tech-cat-list">
          <li>Laravel (PHP 8.3)</li>
          <li>Headless Shopify</li>
          <li>WooCommerce</li>
          <li>PostgreSQL / MySQL</li>
          <li>Redis Caching</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-3" data-viewport="true">
        <h3 class="tech-cat-title">Payment Gateways</h3>
        <ul class="tech-cat-list">
          <li>Stripe Payments</li>
          <li>Apple Pay &amp; Google Pay</li>
          <li>Razorpay India</li>
          <li>Klarna BNPL</li>
          <li>PayPal Express</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-4" data-viewport="true">
        <h3 class="tech-cat-title">Search &amp; Marketing</h3>
        <ul class="tech-cat-list">
          <li>Algolia Search</li>
          <li>Meilisearch</li>
          <li>Klaviyo Email Flows</li>
          <li>Google Analytics 4</li>
          <li>Meta Pixel &amp; CAPI</li>
        </ul>
      </div>
      <div class="tech-stack-category stagger-5" data-viewport="true">
        <h3 class="tech-cat-title">Cloud &amp; Logistics</h3>
        <ul class="tech-cat-list">
          <li>ShipStation API</li>
          <li>EasyPost Shipping</li>
          <li>AWS CloudFront</li>
          <li>Vercel Edge Network</li>
          <li>Cloudflare CDN</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- 4-STEP DELIVERY PROCESS SECTION -->
<section class="usecases-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Delivery Framework</span>
      <h2 class="section-title">How We Deliver Your Online Store</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, sprint-based approach from product catalog architecture to live checkout validation.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Catalog &amp; UX Audit</h3>
        <p class="process-step-desc">We map product taxonomies, variant matrices, payment gateways, and checkout flows to maximize average order value.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">Storefront Design</h3>
        <p class="process-step-desc">We craft bespoke Figma design systems and clickable product page prototypes before coding begins.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Development &amp; Sync</h3>
        <p class="process-step-desc">We engineer the storefront with clean code, integrate payment webhooks, and automate inventory and shipping channels.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">QA &amp; Store Handover</h3>
        <p class="process-step-desc">End-to-end checkout testing across credit cards, Apple Pay, multi-currency processing, and full repository handover.</p>
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
        <p class="section-subtitle">Direct, transparent answers to common questions about our E-Commerce Store Development services.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>Which e-commerce platform should we choose?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>It depends on your business model. For direct-to-consumer brands looking for fast setup and reliability, Shopify or Headless Shopify (Hydrogen/Next.js) is ideal. For bespoke marketplaces, multi-vendor platforms, or complex subscription logic, a custom Laravel storefront provides 100% architectural flexibility without monthly platform revenue taxes.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Which payment gateways do you integrate?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We integrate Stripe, Apple Pay, Google Pay, Razorpay, PayPal Express, Klarna, and regional European/Australian local payment methods with automated webhook reconciliation and fraud detection.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you optimize checkout conversion rates?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We implement single-step one-page checkouts, auto-address completion via Google Places API, prominent trust badges, 1-click express wallets (Apple/Google Pay), and automated abandoned cart recovery email triggers.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Who owns the source code and store assets?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>You own 100% of all intellectual property, source repositories, custom themes, and customer database integrations from day one. Everything is hosted in your Git repository.</p>
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
          Ready to Build Your Online Store?<br><mark>Let's Maximize Your Sales</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Tell us about your product catalog and target market to receive a comprehensive e-commerce roadmap and transparent milestone estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=ecommerce-development" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
            <span class="c-btn__txt">Start Your E-Commerce Store</span>
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
          <div class="cta-pill-item">Fast 24-Hour Response</div>
          <div class="cta-pill-item">Fixed Milestone Pricing</div>
          <div class="cta-pill-item">100% Code Ownership</div>
          <div class="cta-pill-item">Direct Engineer Access</div>
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
      "@@id": "{{ url('/ecommerce-development') }}",
      "url": "{{ url('/ecommerce-development') }}",
      "name": "E-Commerce Development Services | Custom Online Stores | Bluebase Technologies",
      "description": "Custom e-commerce store development, bespoke storefronts, and payment gateway integrations with Stripe, Razorpay, and Shopify. Engineered for speed and maximum checkout conversions.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/ecommerce-development#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/ecommerce-development#breadcrumb') }}",
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
          "name": "E-Commerce Development",
          "item": "{{ url('/ecommerce-development') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/ecommerce-development#service') }}",
      "name": "E-Commerce Development Services | Custom Online Stores | Bluebase Technologies",
      "serviceType": "E-Commerce Engineering & Custom Storefront Architecture",
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
      "@@id": "{{ url('/ecommerce-development#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "Which e-commerce platform should we choose?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "It depends on your business model. For direct-to-consumer brands looking for fast setup and reliability, Shopify or Headless Shopify (Hydrogen/Next.js) is ideal. For bespoke marketplaces, multi-vendor platforms, or complex subscription logic, a custom Laravel storefront provides 100% architectural flexibility without monthly platform revenue taxes."
          }
        },
        {
          "@@type": "Question",
          "name": "Which payment gateways do you integrate?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We integrate Stripe, Apple Pay, Google Pay, Razorpay, PayPal Express, Klarna, and regional European/Australian local payment methods with automated webhook reconciliation and fraud detection."
          }
        },
        {
          "@@type": "Question",
          "name": "How do you optimize checkout conversion rates?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We implement single-step one-page checkouts, auto-address completion via Google Places API, prominent trust badges, 1-click express wallets (Apple/Google Pay), and automated abandoned cart recovery email triggers."
          }
        },
        {
          "@@type": "Question",
          "name": "Who owns the source code and store assets?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You own 100% of all intellectual property, source repositories, custom themes, and customer database integrations from day one. Everything is hosted in your Git repository."
          }
        }
      ]
    }
  ]
}
</script>

<!-- Interactive E-Commerce Storefront Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Category Filter Tabs
  const catTabs = document.querySelectorAll('.ecomm-category-tab');
  const productCards = document.querySelectorAll('.ecomm-product-card');

  catTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      catTabs.forEach(t => t.classList.remove('active'));
      this.classList.add('active');

      const selectedCat = this.getAttribute('data-category');
      productCards.forEach(function (card) {
        if (selectedCat === 'all' || card.getAttribute('data-category') === selectedCat) {
          card.style.display = 'flex';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });

  // Slide-Over Cart Drawer Toggle
  const cartDrawer = document.getElementById('cartDrawer');
  const openCartBtn = document.getElementById('openCartDrawerBtn');
  const closeCartBtn = document.getElementById('closeCartDrawerBtn');
  const cartBadge = document.getElementById('cartCountBadge');
  const cartDrawerCount = document.getElementById('cartDrawerCount');

  let currentCount = 2;
  let currentSubtotal = 338.00;
  let discountApplied = true;

  function updateTotals() {
    const subtotalEl = document.getElementById('cartSubtotal');
    const discountRow = document.getElementById('discountRow');
    const discountValEl = document.getElementById('discountVal');
    const finalTotalEl = document.getElementById('cartFinalTotal');

    if (subtotalEl) subtotalEl.textContent = '$' + currentSubtotal.toFixed(2);

    let finalTotal = currentSubtotal;
    if (discountApplied) {
      const discount = currentSubtotal * 0.20;
      if (discountRow) discountRow.style.display = 'flex';
      if (discountValEl) discountValEl.textContent = '-$' + discount.toFixed(2);
      finalTotal = currentSubtotal - discount;
    } else {
      if (discountRow) discountRow.style.display = 'none';
    }

    if (finalTotalEl) finalTotalEl.textContent = '$' + finalTotal.toFixed(2);
  }

  if (openCartBtn && cartDrawer) {
    openCartBtn.addEventListener('click', function () {
      cartDrawer.classList.toggle('open');
    });
  }

  if (closeCartBtn && cartDrawer) {
    closeCartBtn.addEventListener('click', function () {
      cartDrawer.classList.remove('open');
    });
  }

  // Add to Cart Button Interactivity
  const addBtns = document.querySelectorAll('.ecomm-add-btn');
  const cartList = document.getElementById('cartItemsList');

  addBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const name = this.getAttribute('data-name');
      const price = parseFloat(this.getAttribute('data-price')) || 0;

      // Animate button
      const origText = this.innerHTML;
      this.classList.add('added');
      this.innerHTML = '<svg viewBox="0 0 16 16" width="13" height="13" fill="currentColor"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg><span>Added!</span>';

      // Update counters
      currentCount++;
      currentSubtotal += price;
      if (cartBadge) cartBadge.textContent = currentCount;
      if (cartDrawerCount) cartDrawerCount.textContent = currentCount;

      // Append item to cart drawer
      if (cartList) {
        const itemEl = document.createElement('div');
        itemEl.className = 'ecomm-cart-item';
        itemEl.innerHTML = `
          <div class="ecomm-cart-item-left">
            <div class="ecomm-cart-item-icon">
              <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/></svg>
            </div>
            <div class="ecomm-cart-item-info">
              <span class="ecomm-cart-item-name">${name}</span>
              <span class="ecomm-cart-item-meta">Qty: 1 &bull; Direct Checkout</span>
            </div>
          </div>
          <span class="ecomm-cart-item-price">$${price.toFixed(2)}</span>
        `;
        cartList.prepend(itemEl);
      }

      updateTotals();

      // Open drawer to delight the user
      setTimeout(function () {
        if (cartDrawer) cartDrawer.classList.add('open');
      }, 300);

      setTimeout(() => {
        this.classList.remove('added');
        this.innerHTML = origText;
      }, 2000);
    });
  });

  // Promo Code Handler
  const promoBtn = document.getElementById('applyPromoBtn');
  const promoInput = document.getElementById('promoInput');
  const promoNotice = document.getElementById('promoNotice');

  if (promoBtn && promoInput && promoNotice) {
    promoBtn.addEventListener('click', function () {
      const code = promoInput.value.trim().toUpperCase();
      if (code === 'LAUNCH20') {
        discountApplied = true;
        promoNotice.style.display = 'block';
        promoNotice.style.color = '#059669';
        promoNotice.textContent = 'Coupon applied: 20% discount activated.';
      } else if (code === '') {
        discountApplied = false;
        promoNotice.style.display = 'none';
      } else {
        discountApplied = false;
        promoNotice.style.display = 'block';
        promoNotice.style.color = '#ef4444';
        promoNotice.textContent = 'Invalid code. Try LAUNCH20 for 20% off.';
      }
      updateTotals();
    });
  }

  // Simulated Instant Checkout
  const applePayBtn = document.getElementById('applePayBtn');
  const stripePayBtn = document.getElementById('stripePayBtn');

  function simulateCheckoutSuccess(btn, label) {
    const orig = btn.innerHTML;
    btn.disabled = true;
    btn.innerHTML = '<span>Processing Secure Order...</span>';

    setTimeout(function () {
      btn.innerHTML = '<span style="color: #ffffff;">Order Placed! Confirmation sent.</span>';
      setTimeout(function () {
        btn.disabled = false;
        btn.innerHTML = orig;
        if (cartDrawer) cartDrawer.classList.remove('open');
      }, 2000);
    }, 700);
  }

  if (applePayBtn) {
    applePayBtn.addEventListener('click', function () {
      simulateCheckoutSuccess(this, 'Apple Pay');
    });
  }

  if (stripePayBtn) {
    stripePayBtn.addEventListener('click', function () {
      simulateCheckoutSuccess(this, 'Stripe Checkout');
    });
  }
});
</script>
@endpush