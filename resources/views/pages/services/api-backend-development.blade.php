@extends('layouts.app')

@section('title', 'API &amp; Backend Development Services | Scalable Architectures | Bluebase Technologies')
@section('meta_description', 'High-performance backend systems, RESTful and GraphQL APIs, third-party integrations, and scalable database architectures engineered with Laravel, Node.js, and Redis.')

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
          <span itemprop="name" aria-current="page">API &amp; Backend Development</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Engineering Studio &bull; API &amp; Backend Systems</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Scalable Backend Architectures &amp; <br><mark>High-Throughput APIs</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      We build robust backend infrastructures, secure RESTful &amp; GraphQL APIs, and distributed database systems engineered for high uptime and sub-50ms response times.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=api-backend-development" class="c-btn -primary">
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
      <div class="hero-badge-item">Sub-50ms Response Latency</div>
      <div class="hero-badge-item">Automated OpenAPI 3.0 &amp; Postman</div>
      <div class="hero-badge-item">Zero-Downtime Microservices &amp; Redis</div>
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

<!-- INTERACTIVE API GATEWAY & BACKEND SANDBOX SHOWCASE SECTION -->
<section class="subpage-section" id="interactive-api-sandbox" style="padding-top: 10px;">
  <div class="container">
    <div class="text-center" style="max-width: 860px; margin: 0 auto 36px;" data-viewport="true">
      <span class="section-tag">Interactive API Console</span>
      <h2 class="section-title">Test Our Production <mark>API &amp; Backend Engine</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">
        Interact with the live API gateway below. Send simulated REST requests, test PostgreSQL query execution plans, dispatch webhook event streams, and audit Redis rate limiters.
      </p>
    </div>

    <!-- Live API Gateway Sandbox Window -->
    <div class="api-sandbox-wrapper" data-viewport="true">
      <div class="api-sandbox-window" id="apiSandbox">
        
        <!-- Chrome Top Header -->
        <div class="api-sandbox-chrome">
          <div class="api-chrome-left">
            <div class="api-traffic-dots">
              <span class="api-dot -red"></span>
              <span class="api-dot -yellow"></span>
              <span class="api-dot -green"></span>
            </div>
            <div class="api-gateway-badge">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
              <span>gateway.bluebase.io/v1 &bull; Microservices Router</span>
            </div>
          </div>

          <div class="api-chrome-right">
            <span class="api-latency-pill">24ms Latency</span>
            <span class="api-status-pill">
              <svg viewBox="0 0 24 24" width="10" height="10" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
              <span>Cluster Healthy</span>
            </span>
            <span style="color: #64748b;">us-east-1</span>
          </div>
        </div>

        <!-- Mode Navigation Bar -->
        <div class="api-sandbox-nav">
          <div class="api-nav-tabs" role="tablist">
            <button class="api-nav-tab active" data-tab="console" role="tab" aria-selected="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 17 10 11 4 5"/><line x1="12" y1="19" x2="20" y2="19"/></svg>
              <span>REST API Console</span>
            </button>
            <button class="api-nav-tab" data-tab="database" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
              <span>Database Query Optimizer</span>
            </button>
            <button class="api-nav-tab" data-tab="webhooks" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
              <span>Webhook Event Stream</span>
            </button>
            <button class="api-nav-tab" data-tab="auth" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <span>OAuth2 &amp; JWT Security</span>
            </button>
            <button class="api-nav-tab" data-tab="redis" role="tab" aria-selected="false">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
              <span>Redis Cache &amp; Rate Limiter</span>
            </button>
          </div>
        </div>

        <!-- TAB 1: REST API CONSOLE (INTERACTIVE TESTER) -->
        <div class="api-sandbox-panel active" id="tab-console">
          
          <!-- Request Bar -->
          <div class="api-request-bar">
            <span class="api-method-badge -post" id="currentMethod">POST</span>
            <input type="text" class="api-url-input" id="currentEndpoint" value="https://gateway.bluebase.io/v1/payments/process" readonly>
            <button class="api-send-btn" id="sendRequestBtn">
              <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
              <span>Send Request</span>
            </button>
          </div>

          <!-- Quick Endpoint Switcher Chips -->
          <div style="display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 20px;">
            <button class="api-endpoint-chip active" data-method="POST" data-badge="POST" data-badge-cls="-post" data-url="https://gateway.bluebase.io/v1/payments/process" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); color: #fff; padding: 5px 12px; border-radius: 6px; font-size: 0.74rem; font-family: monospace; cursor: pointer;">
              POST /v1/payments/process
            </button>
            <button class="api-endpoint-chip" data-method="GET" data-badge="GET" data-badge-cls="-get" data-url="https://gateway.bluebase.io/v1/analytics/realtime" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); color: #94a3b8; padding: 5px 12px; border-radius: 6px; font-size: 0.74rem; font-family: monospace; cursor: pointer;">
              GET /v1/analytics/realtime
            </button>
            <button class="api-endpoint-chip" data-method="GET" data-badge="GET" data-badge-cls="-get" data-url="https://gateway.bluebase.io/v1/health" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.08); color: #94a3b8; padding: 5px 12px; border-radius: 6px; font-size: 0.74rem; font-family: monospace; cursor: pointer;">
              GET /v1/health
            </button>
          </div>

          <!-- Two Column Request/Response Layout -->
          <div class="api-split-layout">
            <!-- Left Box: Request Payload & Headers -->
            <div class="api-split-box">
              <div class="api-box-header">
                <span class="api-box-title">Request Body (JSON)</span>
                <span style="font-size: 0.7rem; color: #64748b; font-family: monospace;">Bearer sec_live_99x...</span>
              </div>
              <div class="api-code-block" id="requestPayloadBox">
<pre style="margin: 0;"><code>{
  "tenant_id": "tenant_bluebase_global",
  "amount": 24900,
  "currency": "USD",
  "payment_method": "pm_card_visa_enterprise",
  "metadata": {
    "order_ref": "ORD-2026-X89",
    "idempotency_key": "idemp_4920491823a"
  }
}</code></pre>
              </div>
            </div>

            <!-- Right Box: Live Gateway Response -->
            <div class="api-split-box">
              <div class="api-box-header">
                <div style="display: flex; align-items: center; gap: 8px;">
                  <span class="api-box-title">Gateway Response</span>
                  <span style="background: rgba(16, 185, 129, 0.15); color: #10b981; font-weight: 800; font-size: 0.72rem; padding: 2px 7px; border-radius: 4px; font-family: monospace;" id="resStatusBadge">200 OK</span>
                  <span style="font-size: 0.72rem; color: #94a3b8; font-family: monospace;" id="resTimeBadge">28ms</span>
                </div>
                <button class="api-copy-btn" id="copyResponseBtn">Copy</button>
              </div>
              <div class="api-code-block" id="responsePayloadBox">
<pre style="margin: 0;"><code style="color: #86efac;" id="responseCodeText">{
  "status": "success",
  "data": {
    "transaction_id": "tx_9918204128",
    "amount_captured": 24900,
    "status": "settled",
    "cleared_at": "2026-11-07T12:30:14Z",
    "routing": {
      "edge_node": "iad-1",
      "db_replica": "pg-cluster-read-02",
      "redis_cache": "hit"
    }
  }
}</code></pre>
              </div>
            </div>
          </div>

        </div>

        <!-- TAB 2: DATABASE QUERY OPTIMIZER -->
        <div class="api-sandbox-panel" id="tab-database">
          <div style="margin-bottom: 20px;">
            <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 6px;">PostgreSQL &amp; MySQL Query Tuning Engine</h3>
            <p style="font-size: 0.82rem; color: #94a3b8; margin: 0;">We eliminate slow table scans and N+1 query cascades using composite indexing and eager loading.</p>
          </div>

          <div class="api-db-plan">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px;">
              <span style="font-size: 0.78rem; font-family: monospace; color: #60a5fa; font-weight: 700;">EXPLAIN ANALYZE SQL QUERY</span>
              <span style="background: rgba(16, 185, 129, 0.15); color: #10b981; font-size: 0.72rem; padding: 2px 8px; border-radius: 4px; font-weight: 700;">400x Performance Boost</span>
            </div>
            <code style="font-family: monospace; font-size: 0.8rem; color: #f1f5f9; display: block; background: #070D19; padding: 10px; border-radius: 6px; margin-bottom: 14px;">
              SELECT id, tenant_id, amount, status FROM orders WHERE tenant_id = 'tenant_99' AND status = 'settled' ORDER BY created_at DESC LIMIT 50;
            </code>

            <div class="api-db-comparison">
              <!-- Before Index -->
              <div class="api-db-card" style="border-left: 3px solid #ef4444;">
                <div style="font-size: 0.78rem; font-weight: 700; color: #ef4444; margin-bottom: 6px;">Unoptimized (Sequential Table Scan)</div>
                <div style="font-size: 1.4rem; font-weight: 800; color: #ef4444; margin-bottom: 4px;">480ms</div>
                <p style="font-size: 0.74rem; color: #94a3b8; line-height: 1.5; margin: 0;">Full table scan inspecting 1,420,000 rows. High disk I/O locking worker threads.</p>
              </div>

              <!-- After Index -->
              <div class="api-db-card" style="border-left: 3px solid #10b981;">
                <div style="font-size: 0.78rem; font-weight: 700; color: #10b981; margin-bottom: 6px;">Optimized (Composite B-Tree Index)</div>
                <div style="font-size: 1.4rem; font-weight: 800; color: #10b981; margin-bottom: 4px;">1.2ms</div>
                <p style="font-size: 0.74rem; color: #94a3b8; line-height: 1.5; margin: 0;">B-tree index scan on `(tenant_id, status, created_at)`. Zero disk I/O, purely in-memory buffer cache.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 3: WEBHOOK EVENT STREAM SIMULATOR -->
        <div class="api-sandbox-panel" id="tab-webhooks">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
              <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 4px;">Idempotent Webhooks &amp; Event Stream</h3>
              <p style="font-size: 0.82rem; color: #94a3b8; margin: 0;">Secure HMAC-SHA256 signatures with exponential backoff retry workers.</p>
            </div>
            <button id="dispatchWebhookBtn" style="background: #0050E7; color: #fff; border: none; padding: 8px 16px; border-radius: 6px; font-size: 0.78rem; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 6px;">
              <svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
              <span>Dispatch Event</span>
            </button>
          </div>

          <div style="background: #070D19; border: 1px solid rgba(255,255,255,0.08); border-radius: 10px; padding: 16px;">
            <div style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 10px; border-bottom: 1px solid rgba(255,255,255,0.06); margin-bottom: 12px; font-size: 0.74rem; font-family: monospace; color: #64748b;">
              <span>EVENT STREAM LOG</span>
              <span>LISTENER: https://client-app.com/api/webhooks</span>
            </div>
            <div style="display: flex; flex-direction: column; gap: 8px;" id="webhookLogContainer">
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; background: #030712; border-radius: 6px; font-size: 0.76rem; font-family: monospace;">
                <span style="color: #10b981; font-weight: 700;">200 OK &bull; payment.succeeded</span>
                <span style="color: #94a3b8;">evt_9918a24 &bull; HMAC verified &bull; 34ms</span>
              </div>
              <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; background: #030712; border-radius: 6px; font-size: 0.76rem; font-family: monospace;">
                <span style="color: #10b981; font-weight: 700;">200 OK &bull; user.provisioned</span>
                <span style="color: #94a3b8;">evt_9918a25 &bull; HMAC verified &bull; 41ms</span>
              </div>
            </div>
          </div>
        </div>

        <!-- TAB 4: OAUTH2 & TOKEN SECURITY VAULT -->
        <div class="api-sandbox-panel" id="tab-auth">
          <div style="margin-bottom: 20px;">
            <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 6px;">Stateless JWT &amp; OAuth2 Scopes Inspector</h3>
            <p style="font-size: 0.82rem; color: #94a3b8; margin: 0;">Cryptographically signed RS256/HS256 tokens carrying role-based permissions.</p>
          </div>

          <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px;">
            <div style="background: #070D19; border: 1px solid rgba(239, 68, 68, 0.4); border-radius: 10px; padding: 16px;">
              <div style="font-size: 0.78rem; font-weight: 700; color: #ef4444; margin-bottom: 8px;">1. HEADER (Algorithm)</div>
              <pre style="margin: 0; font-family: monospace; font-size: 0.75rem; color: #fca5a5;"><code>{
  "alg": "HS256",
  "typ": "JWT"
}</code></pre>
            </div>

            <div style="background: #070D19; border: 1px solid rgba(59, 130, 246, 0.4); border-radius: 10px; padding: 16px;">
              <div style="font-size: 0.78rem; font-weight: 700; color: #60a5fa; margin-bottom: 8px;">2. PAYLOAD (Claims)</div>
              <pre style="margin: 0; font-family: monospace; font-size: 0.75rem; color: #bfdbfe;"><code>{
  "sub": "usr_881920",
  "role": "cluster_admin",
  "scopes": ["read", "write"],
  "exp": 1731056400
}</code></pre>
            </div>

            <div style="background: #070D19; border: 1px solid rgba(16, 185, 129, 0.4); border-radius: 10px; padding: 16px;">
              <div style="font-size: 0.78rem; font-weight: 700; color: #10b981; margin-bottom: 8px;">3. SIGNATURE (Verified)</div>
              <pre style="margin: 0; font-family: monospace; font-size: 0.75rem; color: #86efac;"><code>HMACSHA256(
  base64Url(header) + "." +
  base64Url(payload),
  secret_key
)</code></pre>
            </div>
          </div>
        </div>

        <!-- TAB 5: REDIS CACHE & RATE LIMITING -->
        <div class="api-sandbox-panel" id="tab-redis">
          <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <div>
              <h3 style="font-size: 1.15rem; font-weight: 800; margin: 0 0 4px;">Redis In-Memory Cache &amp; Sliding Window Limiter</h3>
              <p style="font-size: 0.82rem; color: #94a3b8; margin: 0;">Microsecond response latency shielding relational databases from DDoS and traffic surges.</p>
            </div>
            <button id="simulateBurstBtn" style="background: #0050E7; color: #fff; border: none; padding: 8px 16px; border-radius: 6px; font-size: 0.78rem; font-weight: 700; cursor: pointer;">
              Simulate Traffic Burst
            </button>
          </div>

          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
            <!-- Redis Cache Hit Rate -->
            <div style="background: #070D19; border: 1px solid rgba(255,255,255,0.08); border-radius: 10px; padding: 18px;">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <span style="font-size: 0.82rem; font-weight: 700;">Redis Cache Hit Ratio</span>
                <span style="font-size: 0.82rem; font-weight: 800; color: #10b981;">99.4%</span>
              </div>
              <div style="height: 8px; background: rgba(255,255,255,0.08); border-radius: 999px; overflow: hidden; margin-bottom: 12px;">
                <div style="width: 99.4%; height: 100%; background: #10b981; border-radius: 999px;"></div>
              </div>
              <span style="font-size: 0.74rem; color: #94a3b8;">Average in-memory read time: <strong style="color: #fff;">0.4ms</strong>. 4.2 million keys cached.</span>
            </div>

            <!-- Rate Limiter -->
            <div style="background: #070D19; border: 1px solid rgba(255,255,255,0.08); border-radius: 10px; padding: 18px;">
              <div style="display: flex; justify-content: space-between; margin-bottom: 6px;">
                <span style="font-size: 0.82rem; font-weight: 700;">Sliding Window Limit (100 req/min)</span>
                <span style="font-size: 0.82rem; font-weight: 800; color: #60a5fa;" id="rateLimitCount">42 / 100 Used</span>
              </div>
              <div style="height: 8px; background: rgba(255,255,255,0.08); border-radius: 999px; overflow: hidden; margin-bottom: 12px;">
                <div id="rateLimitMeter" style="width: 42%; height: 100%; background: #0050E7; border-radius: 999px; transition: width 0.3s;"></div>
              </div>
              <span style="font-size: 0.74rem; color: #94a3b8;">Status: <strong style="color: #10b981;" id="rateLimitStatus">X-RateLimit-Remaining: 58 (Allowed)</strong></span>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- BENTO BACKEND ARCHITECTURE GRID (CORE CAPABILITIES) -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Core Disciplines</span>
      <h2 class="section-title">Engineered for <mark>Maximum Throughput &amp; Uptime</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Our dedicated engineering studio architecting enterprise-grade API gateways, database normalization, and distributed microservices.</p>
    </div>

    <div class="services-bento-grid">
      <!-- Bento 1: High-Throughput RESTful & GraphQL Gateways (Span 7) -->
      <div class="bento-card span-7 stagger-1" data-viewport="true">
        <div class="bento-badge">API Architecture</div>
        <h3 class="bento-title">High-Throughput RESTful &amp; GraphQL Gateways</h3>
        <p class="bento-desc">Clean, standardized API gateways designed for high concurrency, developer ergonomics, and sub-50ms response times. Delivered with automated OpenAPI 3.0 and Postman collections.</p>
        <div class="bento-tags">
          <span class="bento-tag">OpenAPI 3.0</span>
          <span class="bento-tag">GraphQL Schemas</span>
          <span class="bento-tag">Postman Collections</span>
          <span class="bento-tag">Sub-50ms Latency</span>
        </div>
      </div>

      <!-- Bento 2: Relational & Document Database Engineering (Span 5) -->
      <div class="bento-card span-5 stagger-2" data-viewport="true">
        <div class="bento-badge">Database Design</div>
        <h3 class="bento-title">Relational &amp; Document Databases</h3>
        <p class="bento-desc">Optimized PostgreSQL &amp; MySQL architectures with composite B-tree indexing, zero N+1 query bottlenecks, and automated read-replica failovers.</p>
        <div class="bento-tags">
          <span class="bento-tag">PostgreSQL</span>
          <span class="bento-tag">MySQL</span>
          <span class="bento-tag">Query Tuning</span>
          <span class="bento-tag">Zero N+1</span>
        </div>
      </div>

      <!-- Bento 3: Distributed Redis Caching & Queue Workers (Span 5) -->
      <div class="bento-card span-5 stagger-3" data-viewport="true">
        <div class="bento-badge">Performance Caching</div>
        <h3 class="bento-title">Redis Caching &amp; Async Workers</h3>
        <p class="bento-desc">In-memory caching with smart TTL invalidation, sliding-window rate limiters, and asynchronous queue workers handling background jobs seamlessly.</p>
        <div class="bento-tags">
          <span class="bento-tag">Redis Cache</span>
          <span class="bento-tag">RabbitMQ / SQS</span>
          <span class="bento-tag">Rate Limiting</span>
          <span class="bento-tag">WebSockets</span>
        </div>
      </div>

      <!-- Bento 4: Zero-Trust Security & Auth (Span 7) -->
      <div class="bento-card span-7 stagger-4" data-viewport="true">
        <div class="bento-badge">Security &amp; Auth</div>
        <h3 class="bento-title">Enterprise OAuth2, JWT &amp; Zero-Trust Guard</h3>
        <p class="bento-desc">Bank-grade security featuring stateless JWTs with refresh token rotation, scoped developer API keys, cryptographic HMAC webhook signatures, and granular RBAC middleware.</p>
        <div class="bento-tags">
          <span class="bento-tag">OAuth2</span>
          <span class="bento-tag">Stateless JWT</span>
          <span class="bento-tag">HMAC Webhooks</span>
          <span class="bento-tag">RBAC Security</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- UX PERFORMANCE & BACKEND BENCHMARKS SECTION -->
<section class="ux-benchmarks-section" id="backend-benchmarks">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 50px;" data-viewport="true">
      <span class="section-tag">Measured Performance &amp; Benchmarks</span>
      <h2 class="section-title">Engineered for <mark>Sub-Millisecond Precision</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Every database query, API contract, and cloud service is load-tested and benchmarked to guarantee enterprise-grade reliability.</p>
    </div>

    <div class="ux-benchmarks-grid">
      <!-- Benchmark Card 1: <32ms Response Latency -->
      <div class="ux-benchmark-card stagger-1" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Latency Metric</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">&lt;32<span class="ux-benchmark-unit">ms</span></div>
            <span class="ux-benchmark-pill">Sub-50ms SLA</span>
          </div>

          <!-- Micro-Widget: Latency Breakdown -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 32%;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Edge: 18ms</span>
              <span style="color: var(--color-primary); font-weight: 700;">App Engine: 14ms</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Average API Response Latency</h3>
          <p class="ux-benchmark-desc">Measured across high-concurrency production endpoints with Redis in-memory caching and optimized database indexes.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>OpenAPI 3.0 Standard</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Verified SLA</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 2: 99.99% Uptime SLA -->
      <div class="ux-benchmark-card stagger-2" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">High Availability</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">99.99<span class="ux-benchmark-unit">%</span></div>
            <span class="ux-benchmark-pill">Zero Downtime</span>
          </div>

          <!-- Micro-Widget: Multi-Region Health -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-sparkline-row">
              <div class="ux-widget-spark-item">
                <span style="color: #64748b; font-family: monospace;">Cluster Health</span>
                <div class="ux-widget-spark-bar-wrap">
                  <div class="ux-widget-spark-bar" style="width: 99.99%; background: #10b981;"></div>
                </div>
                <span style="font-family: monospace; color: #10b981; font-weight: 700;">Active</span>
              </div>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Production Uptime SLA</h3>
          <p class="ux-benchmark-desc">Redundant multi-zone cloud clusters with automated health probes, database replication, and instant container failovers.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>AWS / Cloudflare Guard</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Continuous</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 3: 10,000+ RPS Concurrency -->
      <div class="ux-benchmark-card stagger-3" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Concurrency Scale</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">10k<span class="ux-benchmark-unit">+</span></div>
            <span class="ux-benchmark-pill">Req / Second</span>
          </div>

          <!-- Micro-Widget: Concurrency Meter -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-timeline">
              <div class="ux-widget-step">
                <span class="ux-widget-step-dot" style="background: #10b981;"></span>
                <span>Peak Concurrency</span>
              </div>
              <span style="font-family: monospace; color: #10b981; font-weight: 700;">0% Error Rate</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Peak Request Throughput</h3>
          <p class="ux-benchmark-desc">Stress-tested under synthetic peak traffic surges. Asynchronous event queues and Redis rate limiters protect system stability.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>k6 &amp; Locust Load Tested</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Benchmark Passed</span>
          </span>
        </div>
      </div>

      <!-- Benchmark Card 4: 0 N+1 Queries -->
      <div class="ux-benchmark-card stagger-4" data-viewport="true">
        <div>
          <div class="ux-benchmark-header">
            <span class="ux-benchmark-badge">Query Efficiency</span>
            <div class="ux-benchmark-icon-box">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
            </div>
          </div>

          <div class="ux-benchmark-number-row">
            <div class="ux-benchmark-number">0<span class="ux-benchmark-unit">debt</span></div>
            <span class="ux-benchmark-pill">Zero N+1</span>
          </div>

          <!-- Micro-Widget: Query Count -->
          <div class="ux-benchmark-widget">
            <div class="ux-widget-meter-bg">
              <div class="ux-widget-meter-fill" style="width: 100%; background: #10b981;"></div>
            </div>
            <div class="ux-widget-meter-labels">
              <span>Eager Loaded</span>
              <span style="color: #10b981; font-weight: 700;">100% Normalized</span>
            </div>
          </div>

          <h3 class="ux-benchmark-label">Zero N+1 Bottlenecks</h3>
          <p class="ux-benchmark-desc">Strict schema normalization, foreign key constraints, composite indexing, and eager-loading relationship standards.</p>
        </div>

        <div class="ux-benchmark-footer">
          <span>PostgreSQL &amp; MySQL</span>
          <span class="ux-benchmark-check">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            <span>Audited</span>
          </span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ENGINEERING STANDARDS SECTION -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Quality Standards</span>
      <h2 class="section-title">Built for Longevity, Security &amp; Speed</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We do not cut corners or deliver fragile templates. Every line of backend code follows disciplined production standards.</p>
    </div>

    <div class="features-grid-2">
      <div class="feature-card-clean stagger-1" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16.5 9.4 7.55 4.24a1.78 1.78 0 0 0-2.5 1.55v12.42a1.78 1.78 0 0 0 2.5 1.55L16.5 14.6a1.78 1.78 0 0 0 0-3.2z"/></svg>
        </div>
        <h3 class="card-title-lg">Modular Clean Architecture</h3>
        <p class="card-text">Strict separation of concerns, repository patterns, and domain-driven design. Your code is easy to read, test, and hand over to any future developer with zero friction.</p>
      </div>

      <div class="feature-card-clean stagger-2" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
        </div>
        <h3 class="card-title-lg">Sub-50ms API Latency</h3>
        <p class="card-text">We optimize database queries, leverage in-memory Redis caching, compress payloads, and tune HTTP responses to ensure your endpoints return in milliseconds worldwide.</p>
      </div>

      <div class="feature-card-clean stagger-3" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>
        <h3 class="card-title-lg">Enterprise Security Built-In</h3>
        <p class="card-text">Comprehensive protection against SQL injection, CSRF attacks, XSS vulnerabilities, and brute-force logins with encrypted secrets and automated rate limiting.</p>
      </div>

      <div class="feature-card-clean stagger-4" data-viewport="true">
        <div class="card-icon-box">
          <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="card-title-lg">100% Client-Owned Source Code</h3>
        <p class="card-text">No proprietary locks, no closed platforms. You own 100% of all Git repositories, databases, API documentation, and deployment keys from day one.</p>
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
        <p class="geo-collab-desc">Collaborate directly with senior backend engineers and cloud architects over Slack, WhatsApp, and Google Meet with zero layers of management.</p>
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

<!-- TECH STACK SECTION (CENTER-ALIGNED 5-BLOCK TOOLCHAIN) -->
<section class="subpage-section -gray">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 56px;" data-viewport="true">
      <span class="section-tag">Our Technology Stack</span>
      <h2 class="section-title">Battle-Tested Backend Technologies</h2>
      <p class="section-subtitle" style="margin: 0 auto;">We pick stable, modern technologies with active developer communities and excellent long-term support.</p>
    </div>

    <div class="tech-stack-grid">
      <!-- 01: Backend Engines -->
      <div class="tech-stack-category stagger-1" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
        </div>
        <h3 class="tech-cat-title">Backend Engines</h3>
        <ul class="tech-cat-list">
          <li>Laravel (PHP 8.3)</li>
          <li>Node.js (Express)</li>
          <li>Go Microservices</li>
          <li>Python (FastAPI)</li>
        </ul>
      </div>

      <!-- 02: Databases & Storage -->
      <div class="tech-stack-category stagger-2" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"/><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"/></svg>
        </div>
        <h3 class="tech-cat-title">Databases &amp; Storage</h3>
        <ul class="tech-cat-list">
          <li>PostgreSQL</li>
          <li>MySQL 8.0</li>
          <li>Redis In-Memory</li>
          <li>AWS S3 Buckets</li>
        </ul>
      </div>

      <!-- 03: API Standards -->
      <div class="tech-stack-category stagger-3" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
        </div>
        <h3 class="tech-cat-title">API Standards</h3>
        <ul class="tech-cat-list">
          <li>RESTful JSON</li>
          <li>GraphQL APIs</li>
          <li>OpenAPI 3.0</li>
          <li>Postman Collections</li>
        </ul>
      </div>

      <!-- 04: Security & Auth -->
      <div class="tech-stack-category stagger-4" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
        </div>
        <h3 class="tech-cat-title">Security &amp; Auth</h3>
        <ul class="tech-cat-list">
          <li>OAuth2 Servers</li>
          <li>Stateless JWT</li>
          <li>HMAC Webhooks</li>
          <li>Rate Limiting</li>
        </ul>
      </div>

      <!-- 05: DevOps & Cloud -->
      <div class="tech-stack-category stagger-5" data-viewport="true">
        <div class="tech-cat-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
        </div>
        <h3 class="tech-cat-title">DevOps &amp; Cloud</h3>
        <ul class="tech-cat-list">
          <li>Docker Containers</li>
          <li>AWS EC2 &amp; RDS</li>
          <li>GitHub Actions CI/CD</li>
          <li>Cloudflare Proxy</li>
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
      <h2 class="section-title">How We Engineer Your Backend</h2>
      <p class="section-subtitle" style="margin: 0 auto;">A transparent, sprint-based approach where you see tangible progress every week.</p>
    </div>

    <div class="process-grid-4">
      <div class="process-step-box stagger-1" data-viewport="true">
        <div class="process-num">01</div>
        <h3 class="process-step-title">Schema &amp; Architecture</h3>
        <p class="process-step-desc">We normalize database models, define OpenAPI contracts, select the optimal stack, and establish a milestone roadmap within 48 hours.</p>
      </div>

      <div class="process-step-box stagger-2" data-viewport="true">
        <div class="process-num">02</div>
        <h3 class="process-step-title">API Gateways &amp; Auth</h3>
        <p class="process-step-desc">We build core REST/GraphQL endpoints, integrate OAuth2/JWT security layers, and set up automated Postman test collections.</p>
      </div>

      <div class="process-step-box stagger-3" data-viewport="true">
        <div class="process-num">03</div>
        <h3 class="process-step-title">Cache, Queues &amp; Integrations</h3>
        <p class="process-step-desc">We implement Redis caching, asynchronous queue workers, Stripe/Twilio third-party integrations, and automated unit tests.</p>
      </div>

      <div class="process-step-box stagger-4" data-viewport="true">
        <div class="process-num">04</div>
        <h3 class="process-step-title">Load Testing &amp; Handover</h3>
        <p class="process-step-desc">Stress testing under high concurrency, zero-downtime blue-green production cutover, and 100% repository transfer.</p>
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
        <p class="section-subtitle">Direct, transparent answers to common questions about our API &amp; Backend Development services.</p>
      </div>
      <div class="faq-right">
        <div class="accordion-list">
          <div class="accordion-item open stagger-1" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="true">
              <span>What backend frameworks do you specialize in?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Our primary backend framework is Laravel (PHP 8.3) for rapid, highly secure, and expressive backend engineering. We also engineer in Node.js (Express) for lightweight event-driven microservices, paired with PostgreSQL, MySQL, and Redis.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-2" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>How do you ensure sub-50ms API response times?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>We optimize database queries with composite indexes, eliminate N+1 query bottlenecks, cache frequent data queries in Redis, and deploy on high-performance cloud servers with SSD storage.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-3" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Do you provide complete documentation for frontend or mobile developers?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>Yes. We deliver interactive Swagger / OpenAPI documentation and ready-to-run Postman collections with sample requests and response payloads for every single endpoint.</p>
              </div>
            </div>
          </div>
          <div class="accordion-item stagger-4" data-viewport="true">
            <button class="accordion-trigger" aria-expanded="false">
              <span>Who owns the backend source code and database models?</span>
              <div class="accordion-icon">
                <svg viewBox="0 0 24 24"><path d="M12 5v14M5 12h14"/></svg>
              </div>
            </button>
            <div class="accordion-content">
              <div class="accordion-inner">
                <p>You own 100% of all source code, database migration scripts, API contracts, and credentials with zero vendor lock-in.</p>
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
          Ready to Build a High-Performance Backend?<br><mark>Let's Architect It Right</mark>.
        </h2>
        <p style="color: rgba(255, 255, 255, 0.85); font-size: 1.1rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.6;" class="stagger-2" data-viewport="true">
          Tell us about your requirements and receive a comprehensive technical architecture plan and transparent estimate within 24 hours.
        </p>
        <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;" class="stagger-2" data-viewport="true">
          <a href="{{ route('contact') }}?service=api-backend-development" class="c-btn -primary" style="padding: 14px 32px; font-size: 1.05rem;">
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
          <div class="cta-pill-item">100% Code Ownership</div>
          <div class="cta-pill-item">Direct Architect Access</div>
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
      "@@id": "{{ url('/api-backend-development') }}",
      "url": "{{ url('/api-backend-development') }}",
      "name": "API &amp; Backend Development Services | Scalable Architectures | Bluebase Technologies",
      "description": "High-performance backend systems, RESTful and GraphQL APIs, third-party integrations, and scalable database architectures engineered with Laravel, Node.js, and Redis.",
      "isPartOf": {
        "@@type": "WebSite",
        "@@id": "{{ url('/#website') }}",
        "url": "{{ url('/') }}",
        "name": "Bluebase Technologies"
      },
      "breadcrumb": {
        "@@id": "{{ url('/api-backend-development#breadcrumb') }}"
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url('/api-backend-development#breadcrumb') }}",
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
          "name": "API &amp; Backend Development",
          "item": "{{ url('/api-backend-development') }}"
        }
      ]
    },
    {
      "@@type": "Service",
      "@@id": "{{ url('/api-backend-development#service') }}",
      "name": "API &amp; Backend Development Services | Scalable Architectures | Bluebase Technologies",
      "serviceType": "API &amp; Scalable Backend Development",
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
      "@@id": "{{ url('/api-backend-development#faq') }}",
      "mainEntity": [
        {
          "@@type": "Question",
          "name": "What backend frameworks do you specialize in?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Our primary backend framework is Laravel (PHP 8.3) for rapid, highly secure, and expressive backend engineering. We also engineer in Node.js (Express) for lightweight event-driven microservices, paired with PostgreSQL, MySQL, and Redis."
          }
        },
        {
          "@@type": "Question",
          "name": "How do you ensure sub-50ms API response times?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "We optimize database queries with composite indexes, eliminate N+1 query bottlenecks, cache frequent data queries in Redis, and deploy on high-performance cloud servers with SSD storage."
          }
        },
        {
          "@@type": "Question",
          "name": "Do you provide complete documentation for frontend or mobile developers?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "Yes. We deliver interactive Swagger / OpenAPI documentation and ready-to-run Postman collections with sample requests and response payloads for every single endpoint."
          }
        },
        {
          "@@type": "Question",
          "name": "Who owns the backend source code and database models?",
          "acceptedAnswer": {
            "@@type": "Answer",
            "text": "You own 100% of all source code, database migration scripts, API contracts, and credentials with zero vendor lock-in."
          }
        }
      ]
    }
  ]
}
</script>

<!-- Interactive API Sandbox Engine JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const navTabs = document.querySelectorAll('.api-nav-tab');
  const panels = document.querySelectorAll('.api-sandbox-panel');
  const sendBtn = document.getElementById('sendRequestBtn');
  const endpointChips = document.querySelectorAll('.api-endpoint-chip');
  const methodBadge = document.getElementById('currentMethod');
  const endpointInput = document.getElementById('currentEndpoint');
  const reqPayloadBox = document.getElementById('requestPayloadBox');
  const resCodeText = document.getElementById('responseCodeText');
  const resStatusBadge = document.getElementById('resStatusBadge');
  const resTimeBadge = document.getElementById('resTimeBadge');
  const copyResBtn = document.getElementById('copyResponseBtn');
  const dispatchWebhookBtn = document.getElementById('dispatchWebhookBtn');
  const webhookLogContainer = document.getElementById('webhookLogContainer');
  const simulateBurstBtn = document.getElementById('simulateBurstBtn');
  const rateLimitCount = document.getElementById('rateLimitCount');
  const rateLimitMeter = document.getElementById('rateLimitMeter');
  const rateLimitStatus = document.getElementById('rateLimitStatus');

  // 1. Tab Navigation
  navTabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      navTabs.forEach(t => {
        t.classList.remove('active');
        t.setAttribute('aria-selected', 'false');
      });
      tab.classList.add('active');
      tab.setAttribute('aria-selected', 'true');

      const targetId = 'tab-' + tab.getAttribute('data-tab');
      panels.forEach(p => {
        p.classList.remove('active');
        if (p.id === targetId) {
          p.classList.add('active');
        }
      });
    });
  });

  // Sample Endpoints Payload Map
  const endpointData = {
    'https://gateway.bluebase.io/v1/payments/process': {
      method: 'POST',
      badgeCls: '-post',
      req: '{\n  "tenant_id": "tenant_bluebase_global",\n  "amount": 24900,\n  "currency": "USD",\n  "payment_method": "pm_card_visa_enterprise",\n  "metadata": {\n    "order_ref": "ORD-2026-X89",\n    "idempotency_key": "idemp_4920491823a"\n  }\n}',
      res: '{\n  "status": "success",\n  "data": {\n    "transaction_id": "tx_9918204128",\n    "amount_captured": 24900,\n    "status": "settled",\n    "cleared_at": "2026-11-07T12:30:14Z",\n    "routing": {\n      "edge_node": "iad-1",\n      "db_replica": "pg-cluster-read-02",\n      "redis_cache": "hit"\n    }\n  }\n}',
      status: '200 OK',
      time: '28ms'
    },
    'https://gateway.bluebase.io/v1/analytics/realtime': {
      method: 'GET',
      badgeCls: '-get',
      req: '// Query Parameters: ?interval=1m&metrics=throughput,latency,errors',
      res: '{\n  "status": "success",\n  "metrics": {\n    "requests_per_sec": 4820,\n    "p95_latency_ms": 24.2,\n    "p99_latency_ms": 31.8,\n    "error_rate": "0.00%",\n    "active_nodes": 6\n  }\n}',
      status: '200 OK',
      time: '18ms'
    },
    'https://gateway.bluebase.io/v1/health': {
      method: 'GET',
      badgeCls: '-get',
      req: '// Health Check Endpoint (Heartbeat Probe)',
      res: '{\n  "status": "healthy",\n  "timestamp": "2026-11-07T12:30:14Z",\n  "services": {\n    "database": "connected (1.2ms)",\n    "redis": "connected (0.4ms)",\n    "queue_workers": "active (0 delayed)"\n  }\n}',
      status: '200 OK',
      time: '12ms'
    }
  };

  // 2. Endpoint Chip Selector
  endpointChips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      endpointChips.forEach(c => {
        c.classList.remove('active');
        c.style.background = 'rgba(255,255,255,0.04)';
        c.style.color = '#94a3b8';
      });
      chip.classList.add('active');
      chip.style.background = 'rgba(255,255,255,0.08)';
      chip.style.color = '#fff';

      const url = chip.getAttribute('data-url');
      const data = endpointData[url];
      if (data) {
        endpointInput.value = url;
        methodBadge.textContent = data.method;
        methodBadge.className = 'api-method-badge ' + data.badgeCls;
        reqPayloadBox.querySelector('code').textContent = data.req;
        resCodeText.textContent = data.res;
        resStatusBadge.textContent = data.status;
        resTimeBadge.textContent = data.time;
      }
    });
  });

  // 3. Send Request Simulator Button
  if (sendBtn) {
    sendBtn.addEventListener('click', function () {
      sendBtn.innerHTML = '<span>Pinging...</span>';
      resStatusBadge.textContent = 'Executing...';
      resStatusBadge.style.color = '#f59e0b';
      setTimeout(function () {
        sendBtn.innerHTML = '<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg><span>Send Request</span>';
        resStatusBadge.textContent = '200 OK';
        resStatusBadge.style.color = '#10b981';
        const randTime = Math.floor(Math.random() * 15) + 18;
        resTimeBadge.textContent = randTime + 'ms';
      }, 350);
    });
  }

  // 4. Copy Response Button
  if (copyResBtn) {
    copyResBtn.addEventListener('click', function () {
      copyResBtn.textContent = 'Copied!';
      setTimeout(function () {
        copyResBtn.textContent = 'Copy';
      }, 1400);
    });
  }

  // 5. Dispatch Webhook Event Simulation
  if (dispatchWebhookBtn && webhookLogContainer) {
    let evtCounter = 26;
    dispatchWebhookBtn.addEventListener('click', function () {
      const newDiv = document.createElement('div');
      newDiv.style.cssText = 'display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; background: #030712; border-radius: 6px; font-size: 0.76rem; font-family: monospace; animation: apiPanelFade 0.2s ease;';
      const events = ['order.created', 'invoice.paid', 'subscription.renewed', 'auth.mfa_verified'];
      const chosen = events[Math.floor(Math.random() * events.length)];
      const randMs = Math.floor(Math.random() * 20) + 24;
      newDiv.innerHTML = '<span style="color: #10b981; font-weight: 700;">200 OK &bull; ' + chosen + '</span><span style="color: #94a3b8;">evt_9918a' + (evtCounter++) + ' &bull; HMAC verified &bull; ' + randMs + 'ms</span>';
      webhookLogContainer.insertBefore(newDiv, webhookLogContainer.firstChild);
    });
  }

  // 6. Simulate Burst Traffic on Rate Limiter
  if (simulateBurstBtn && rateLimitCount && rateLimitMeter && rateLimitStatus) {
    simulateBurstBtn.addEventListener('click', function () {
      rateLimitCount.textContent = '94 / 100 Used';
      rateLimitMeter.style.width = '94%';
      rateLimitMeter.style.background = '#d97706';
      rateLimitStatus.textContent = 'X-RateLimit-Remaining: 6 (Throttling Near)';
      rateLimitStatus.style.color = '#d97706';
      setTimeout(function () {
        rateLimitCount.textContent = '42 / 100 Used';
        rateLimitMeter.style.width = '42%';
        rateLimitMeter.style.background = '#0050E7';
        rateLimitStatus.textContent = 'X-RateLimit-Remaining: 58 (Allowed)';
        rateLimitStatus.style.color = '#10b981';
      }, 2500);
    });
  }
});
</script>
@endpush
