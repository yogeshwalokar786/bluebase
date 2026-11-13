@extends('layouts.app')

@section('title', 'Security, Compliance & Governance Standards | Bluebase Technologies')
@section('meta_description', 'Enterprise-grade security, SOC 2 Type II controls, ISO/IEC 27001 ISMS, GDPR data residency, zero-trust infrastructure, and guaranteed 100% client IP ownership.')

@section('content')

<!-- 1. HERO SECTION (PREVIOUS STANDARD HERO FORMAT) -->
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
          <a href="{{ route('company') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Company</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">Security &amp; Compliance</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Security &bull; Compliance</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Enterprise Security Built <br><mark>Into Every Line of Code</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      Zero-trust architecture, automated vulnerability scanning, and 100% client IP ownership.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="{{ route('contact') }}?service=compliance-security" class="c-btn -primary">
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
      <a href="{{ route('contact') }}" class="c-btn -secondary">
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
      <div class="hero-badge-item">SOC 2 Aligned</div>
      <div class="hero-badge-item">ISO 27001</div>
      <div class="hero-badge-item">100% IP Ownership</div>
    </div>

  </div>
</section>

<!-- 2. ENTERPRISE COMPLIANCE & FRAMEWORKS STRIP -->
<section class="trust-frameworks-strip">
  <div class="container">
    <div class="frameworks-grid" data-viewport="true">
      
      <div class="framework-card">
        <div class="framework-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 2L3 7v6c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V7l-9-5z"/>
          </svg>
        </div>
        <div class="framework-info">
          <strong>SOC 2 Type II</strong>
          <span>Trust Services Criteria</span>
        </div>
      </div>

      <div class="framework-card">
        <div class="framework-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <circle cx="12" cy="12" r="10"/>
            <path d="M12 6v6l4 2"/>
          </svg>
        </div>
        <div class="framework-info">
          <strong>ISO/IEC 27001</strong>
          <span>Information Security ISMS</span>
        </div>
      </div>

      <div class="framework-card">
        <div class="framework-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
          </svg>
        </div>
        <div class="framework-info">
          <strong>GDPR &amp; DPDP</strong>
          <span>Data Sovereignty &amp; Privacy</span>
        </div>
      </div>

      <div class="framework-card">
        <div class="framework-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>
          </svg>
        </div>
        <div class="framework-info">
          <strong>OWASP Top 10</strong>
          <span>AppSec Vulnerability Hardening</span>
        </div>
      </div>

      <div class="framework-card">
        <div class="framework-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
            <polyline points="22 4 12 14.01 9 11.01"/>
          </svg>
        </div>
        <div class="framework-info">
          <strong>HIPAA Ready</strong>
          <span>BAA &amp; ePHI Isolation Standards</span>
        </div>
      </div>

      <div class="framework-card">
        <div class="framework-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"/>
            <line x1="1" y1="10" x2="23" y2="10"/>
          </svg>
        </div>
        <div class="framework-info">
          <strong>PCI-DSS Ready</strong>
          <span>Zero Raw PAN Storage Model</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- 3. DEFENSE-IN-DEPTH INTERACTIVE ARCHITECTURAL PIPELINE -->
<section class="defense-pipeline-section" id="defense-pipeline">
  <div class="container">
    
    <div class="text-center" style="max-width: 820px; margin: 0 auto 30px;" data-viewport="true">
      <span class="section-tag">Defense-in-Depth Model</span>
      <h2 class="section-title">Five Concentric Layers of <mark>Software Protection</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Explore the systematic defense controls enforced across every Bluebase engagement from initial commit to cloud deployment.</p>
    </div>

    <div class="pipeline-layout" data-viewport="true">
      
      <!-- Left: Interactive Layer Selectors -->
      <div class="pipeline-nav" role="tablist" aria-label="Defense Layers">
        
        <button type="button" class="pipeline-nav-btn active" role="tab" aria-selected="true" data-pipeline-target="layer-perimeter">
          <span class="pipeline-step-num">L1</span>
          <div class="pipeline-nav-text">
            <strong>Perimeter &amp; Network Edge</strong>
            <span>Global WAF, Anti-DDoS, DNSSEC &amp; Strict TLS 1.3</span>
          </div>
        </button>

        <button type="button" class="pipeline-nav-btn" role="tab" aria-selected="false" data-pipeline-target="layer-iam">
          <span class="pipeline-step-num">L2</span>
          <div class="pipeline-nav-text">
            <strong>Zero-Trust IAM &amp; Access</strong>
            <span>Hardware FIDO2 Keys, Least Privilege &amp; Ephemeral SSH</span>
          </div>
        </button>

        <button type="button" class="pipeline-nav-btn" role="tab" aria-selected="false" data-pipeline-target="layer-devsecops">
          <span class="pipeline-step-num">L3</span>
          <div class="pipeline-nav-text">
            <strong>DevSecOps &amp; CI/CD Gates</strong>
            <span>Automated SAST, Snyk Dependencies &amp; GitGuardian</span>
          </div>
        </button>

        <button type="button" class="pipeline-nav-btn" role="tab" aria-selected="false" data-pipeline-target="layer-crypto">
          <span class="pipeline-step-num">L4</span>
          <div class="pipeline-nav-text">
            <strong>Cryptographic Data Vault</strong>
            <span>Envelope AES-256-GCM, AWS KMS &amp; Daily Snapshots</span>
          </div>
        </button>

        <button type="button" class="pipeline-nav-btn" role="tab" aria-selected="false" data-pipeline-target="layer-ip">
          <span class="pipeline-step-num">L5</span>
          <div class="pipeline-nav-text">
            <strong>Legal Sovereignty &amp; IP Transfer</strong>
            <span>100% Work-for-Hire Assignment &amp; Zero AI Leakage</span>
          </div>
        </button>

      </div>

      <!-- Right: Detailed Layer Display Cards -->
      <div class="pipeline-content-card">
        
        <!-- PANE 1: Perimeter -->
        <div class="pipeline-pane active" id="layer-perimeter" role="tabpanel">
          <div class="pipeline-pane-header">
            <div>
              <span class="pipeline-badge-pill">Layer 01 &bull; Edge &amp; Network Protection</span>
              <h3 class="pipeline-pane-title" style="margin-top: 8px;">Perimeter Defense &amp; Traffic Sanitization</h3>
            </div>
            <span class="matrix-pill-pass">Enforced</span>
          </div>

          <div class="pipeline-grid-controls">
            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="7"/><path d="M8 5v6M5 8h6"/></svg>
                Cloudflare Enterprise WAF
              </div>
              <p>Managed rulesets blocking OWASP Top 10 exploits, zero-day CVE probes, malicious bots, and automated scrapers at the edge.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4h12v8H2z"/><path d="M6 12v2h4v-2"/></svg>
                Multi-Terabit DDoS Scrubbing
              </div>
              <p>Automated Layer 3, 4, and 7 volumetric mitigation ensuring 99.99% system availability even during high-intensity attacks.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="7" width="10" height="7" rx="1.5"/><path d="M5.5 7V4.5a2.5 2.5 0 0 1 5 0V7"/></svg>
                Strict TLS 1.3 Cipher Suites
              </div>
              <p>Deprecation of TLS 1.0/1.1 and insecure ciphers. Enforced Perfect Forward Secrecy (PFS) and HTTP Strict Transport Security (HSTS).</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 13h10M4 3l4 8 4-8"/></svg>
                DNSSEC &amp; Origin Cloaking
              </div>
              <p>Cryptographic DNS signing preventing DNS spoofing and cache poisoning, paired with private VPC origin isolation.</p>
            </div>
          </div>

          <div class="pipeline-terminal-box">
            <div class="pipeline-terminal-header">
              <span>EDGE TELEMETRY AUDIT</span>
              <span>TLS 1.3 / HSTS: PRELOAD / 0 BLOCKED ORIGINS</span>
            </div>
            <code>
              &gt; curl -I https://api.clientdomain.com/v1/health<br>
              HTTP/2 200 OK<br>
              strict-transport-security: max-age=63072000; includeSubDomains; preload<br>
              x-content-type-options: nosniff<br>
              x-frame-options: DENY<br>
              content-security-policy: default-src 'self'; frame-ancestors 'none'<br>
              cf-cache-status: DYNAMIC (WAF Sanitized)
            </code>
          </div>
        </div>

        <!-- PANE 2: Zero-Trust IAM -->
        <div class="pipeline-pane" id="layer-iam" role="tabpanel">
          <div class="pipeline-pane-header">
            <div>
              <span class="pipeline-badge-pill">Layer 02 &bull; Identity &amp; Human Security</span>
              <h3 class="pipeline-pane-title" style="margin-top: 8px;">Zero-Trust Access &amp; Personnel Controls</h3>
            </div>
            <span class="matrix-pill-pass">Enforced</span>
          </div>

          <div class="pipeline-grid-controls">
            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="10" height="10" rx="2"/><circle cx="8" cy="8" r="2"/></svg>
                Hardware Security Keys (FIDO2)
              </div>
              <p>Phishing-resistant YubiKey / WebAuthn MFA required for all developer accounts, Git remotes, and cloud consoles.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM2 14c0-2.5 3-4 6-4s6 1.5 6 4"/></svg>
                Principle of Least Privilege (PoLP)
              </div>
              <p>Role-based access control (RBAC). Developers only receive scoped, audited access to repositories required for their active sprint.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="6"/><path d="M8 4v4l3 2"/></svg>
                Ephemeral Bastion Access
              </div>
              <p>Zero permanent SSH keys or production database credentials. Just-in-time access expires automatically after approved time windows.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2z"/><path d="M6 8l2 2 4-4"/></svg>
                Rigorous Background Vetting
              </div>
              <p>100% of Bluebase engineers undergo identity, criminal history, and credential verification before signing mandatory strict NDAs.</p>
            </div>
          </div>

          <div class="pipeline-terminal-box">
            <div class="pipeline-terminal-header">
              <span>IAM ACCESS LOG</span>
              <span>SSO ENFORCED / HARDWARE TOKEN: VERIFIED</span>
            </div>
            <code>
              [IAM] Session requested: dev-engineer@bluebase.tech<br>
              [MFA] Hardware WebAuthn challenge passed (FIDO2 Level 2 Token)<br>
              [RBAC] Scope granted: repo:client-platform-web (Read/Write)<br>
              [AUDIT] Production DB Direct Access: DENIED (Air-Gapped Policy)
            </code>
          </div>
        </div>

        <!-- PANE 3: DevSecOps CI/CD -->
        <div class="pipeline-pane" id="layer-devsecops" role="tabpanel">
          <div class="pipeline-pane-header">
            <div>
              <span class="pipeline-badge-pill">Layer 03 &bull; Pipeline &amp; Code Quality</span>
              <h3 class="pipeline-pane-title" style="margin-top: 8px;">Automated DevSecOps Pipeline Gates</h3>
            </div>
            <span class="matrix-pill-pass">Enforced</span>
          </div>

          <div class="pipeline-grid-controls">
            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 5 1 8 4 11"/><polyline points="12 5 15 8 12 11"/><line x1="10" y1="3" x2="6" y2="13"/></svg>
                Static Code Analysis (SAST)
              </div>
              <p>SonarQube and GitHub CodeQL run on every pull request. Builds fail automatically if code smells or vulnerabilities are detected.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="12" height="10" rx="2"/><path d="M6 7l2 2 2-2"/></svg>
                Snyk &amp; Dependency Scanning
              </div>
              <p>Automated Software Bill of Materials (SBOM) tracking. Immediate alerts for outdated packages or vulnerable third-party dependencies.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h8v8H4z"/><path d="M7 7l2 2"/></svg>
                GitGuardian Secret Shield
              </div>
              <p>Pre-commit hooks and remote scans ensure no API keys, private certificates, or database credentials ever enter the Git commit tree.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="6"/><path d="M8 5v3l2 2"/></svg>
                Zero-Blocker CI Merge Policy
              </div>
              <p>Zero tolerance for High or Critical severity CVEs. Pull requests cannot merge into staging or main until all checks return 100% green.</p>
            </div>
          </div>

          <div class="pipeline-terminal-box">
            <div class="pipeline-terminal-header">
              <span>GITHUB ACTIONS CI AUDIT</span>
              <span>PIPELINE STATUS: PASSED / ALL GATES VERIFIED</span>
            </div>
            <code>
              &gt; snyk test --severity-threshold=high<br>
              Tested 412 dependencies for known issues. Zero vulnerable paths found.<br>
              &gt; gitguardian scan --all<br>
              Found 0 secrets across 84 commits.<br>
              &gt; sonar-scanner<br>
              Quality Gate: PASSED (Security Rating: A, Coverage: 92.4%)
            </code>
          </div>
        </div>

        <!-- PANE 4: Cryptography & Data -->
        <div class="pipeline-pane" id="layer-crypto" role="tabpanel">
          <div class="pipeline-pane-header">
            <div>
              <span class="pipeline-badge-pill">Layer 04 &bull; Storage &amp; Cryptography</span>
              <h3 class="pipeline-pane-title" style="margin-top: 8px;">Cryptographic Vault &amp; Data Residency</h3>
            </div>
            <span class="matrix-pill-pass">Enforced</span>
          </div>

          <div class="pipeline-grid-controls">
            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="7" width="10" height="7" rx="1.5"/><path d="M5.5 7V4.5a2.5 2.5 0 0 1 5 0V7"/></svg>
                AES-256-GCM Envelope Encryption
              </div>
              <p>All sensitive records, customer documents, and database volumes are encrypted at rest using industry-standard AES-256-GCM ciphers.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M2 4h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4z"/><path d="M5 2h6v2H5V2z"/></svg>
                AWS KMS / HashiCorp Vault
              </div>
              <p>Keys are never stored alongside data. Master keys rotate automatically via dedicated hardware security modules (HSMs).</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2a6 6 0 0 0-6 6c0 3 2 5.5 5 6v-2a4 4 0 1 1 4 0v2c3-.5 5-3 5-6a6 6 0 0 0-6-6z"/></svg>
                Geographic Data Sovereignty
              </div>
              <p>Data residency tailored to your jurisdiction (US-East, EU Frankfurt, India Mumbai, AP-Southeast) ensuring GDPR &amp; DPDP compliance.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 13h10M4 3l4 8 4-8"/></svg>
                Automated Daily Hash-Verified Backups
              </div>
              <p>Point-in-time recovery (PITR) with automated SHA-256 integrity checksums stored across isolated disaster recovery availability zones.</p>
            </div>
          </div>

          <div class="pipeline-terminal-box">
            <div class="pipeline-terminal-header">
              <span>STORAGE ENCRYPTION AUDIT</span>
              <span>AES-256-GCM / KMS KEY ROTATION: ENABLED</span>
            </div>
            <code>
              [AWS KMS] Master Key ARN: arn:aws:kms:eu-central-1:***:key/***<br>
              [STORAGE] Volume Encryption: aws/ebs (Status: Encrypted, AES-256)<br>
              [S3 BUCKET] Default Encryption: SSE-KMS (Bucket Key: Enabled)<br>
              [BACKUP] SHA-256 Checksum Verified: 7f83b1657ff1fc53b92dc18148a1d6...
            </code>
          </div>
        </div>

        <!-- PANE 5: Legal & IP Ownership -->
        <div class="pipeline-pane" id="layer-ip" role="tabpanel">
          <div class="pipeline-pane-header">
            <div>
              <span class="pipeline-badge-pill">Layer 05 &bull; Legal Sovereignty &amp; IP</span>
              <h3 class="pipeline-pane-title" style="margin-top: 8px;">100% Client IP Ownership &amp; AI Privacy</h3>
            </div>
            <span class="matrix-pill-pass">Enforced</span>
          </div>

          <div class="pipeline-grid-controls">
            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/><path d="M5 8l2 2 4-4"/></svg>
                Full Work-for-Hire Assignment
              </div>
              <p>All source code, schemas, documentation, and Figma assets transfer 100% to you. Zero ongoing royalties or vendor proprietary traps.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="10" height="10" rx="2"/><circle cx="8" cy="8" r="2"/></svg>
                Zero AI Model Training Clause
              </div>
              <p>We mandate enterprise API agreements with OpenAI and Anthropic with zero-data-retention (ZDR). Your business logic is never used for training.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12V4l8 4-8 4z"/></svg>
                Unencumbered Repository Handover
              </div>
              <p>Your team retains root administrative access to your Git organization, cloud hosting environments, and domain DNS throughout development.</p>
            </div>

            <div class="control-item">
              <div class="control-item-header">
                <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 1.5L2.5 4v4c0 3.5 2.5 6.2 5.5 7 3-0.8 5.5-3.5 5.5-7V4L8 1.5z"/></svg>
                Bilateral Mutual NDAs
              </div>
              <p>Standard bilateral non-disclosure agreements executed prior to any architectural discovery, code auditing, or wireframe discussions.</p>
            </div>
          </div>

          <div class="pipeline-terminal-box">
            <div class="pipeline-terminal-header">
              <span>LEGAL GOVERNANCE CERTIFICATE</span>
              <span>IP ASSIGNMENT: AUTOMATIC / ZERO ROYALTY ENCUMBRANCE</span>
            </div>
            <code>
              &gt; CONTRACT CLAUSE 8.1 (INTELLECTUAL PROPERTY):<br>
              "Developer irrevocably assigns to Client all right, title, and interest<br>
              in and to the Deliverables, including all patent, copyright, trademark,<br>
              and trade secret rights. Developer retains zero proprietary lien."
            </code>
          </div>
        </div>

      </div>

    </div>
  </div>
</section>

<!-- 4. ENTERPRISE COMPLIANCE CONTROL MATRIX -->
<section class="compliance-matrix-section" id="compliance-matrix">
  <div class="container">
    
    <div class="text-center" style="max-width: 820px; margin: 0 auto 30px;" data-viewport="true">
      <span class="section-tag">Procurement &amp; Governance Matrix</span>
      <h2 class="section-title">Bluebase Enterprise Standard vs <mark>Traditional Agency</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Review the institutional security safeguards and verification mechanisms we uphold for every engineering engagement.</p>
    </div>

    <div class="matrix-table-wrap" data-viewport="true">
      <table class="matrix-table">
        <thead>
          <tr>
            <th style="width: 25%;">Control Domain</th>
            <th class="col-bluebase" style="width: 35%;">Bluebase Technologies Standard</th>
            <th style="width: 25%;">Traditional Agency Model</th>
            <th style="width: 15%;">Audit Proof</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="matrix-domain">
              <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M13 2H3a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/><path d="M5 8l2 2 4-4"/></svg>
              Intellectual Property
            </td>
            <td class="td-bluebase">
              <span class="matrix-pill-pass">PASS</span>
              100% complete work-for-hire assignment. Clean Git history transferred without licensing strings.
            </td>
            <td class="td-legacy">Often retained under ambiguous master agreements or proprietary agency boilerplates.</td>
            <td class="td-verification">Executed IP Assignment Deed</td>
          </tr>

          <tr>
            <td class="matrix-domain">
              <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 5 1 8 4 11"/><polyline points="12 5 15 8 12 11"/><line x1="10" y1="3" x2="6" y2="13"/></svg>
              Automated Code Auditing
            </td>
            <td class="td-bluebase">
              <span class="matrix-pill-pass">PASS</span>
              Automated SonarQube &amp; CodeQL on every PR with a mandatory 0-blocker policy for high CVEs.
            </td>
            <td class="td-legacy">Manual spot-checks or nonexistent automated security gates before release.</td>
            <td class="td-verification">CI Pull Request Logs</td>
          </tr>

          <tr>
            <td class="matrix-domain">
              <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h8v8H4z"/><path d="M7 7l2 2"/></svg>
              Secret &amp; Key Governance
            </td>
            <td class="td-bluebase">
              <span class="matrix-pill-pass">PASS</span>
              GitGuardian pre-commit scanning. Zero plain-text credentials stored in version control.
            </td>
            <td class="td-legacy">Secrets often committed directly into git repositories or shared insecurely over chat.</td>
            <td class="td-verification">Vault Access Logs</td>
          </tr>

          <tr>
            <td class="matrix-domain">
              <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="7" width="10" height="7" rx="1.5"/><path d="M5.5 7V4.5a2.5 2.5 0 0 1 5 0V7"/></svg>
              Data Encryption
            </td>
            <td class="td-bluebase">
              <span class="matrix-pill-pass">PASS</span>
              AES-256-GCM at rest, TLS 1.3 in transit with Perfect Forward Secrecy across all endpoints.
            </td>
            <td class="td-legacy">Standard TLS only; unencrypted database backups frequently stored on local machines.</td>
            <td class="td-verification">KMS Cipher Audit</td>
          </tr>

          <tr>
            <td class="matrix-domain">
              <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="10" height="10" rx="2"/><circle cx="8" cy="8" r="2"/></svg>
              AI Code Confidentiality
            </td>
            <td class="td-bluebase">
              <span class="matrix-pill-pass">PASS</span>
              Zero Data Retention (ZDR) enterprise agreements. Source code is never retained or trained on.
            </td>
            <td class="td-legacy">Unregulated free consumer AI tools that ingest proprietary business logic into public LLMs.</td>
            <td class="td-verification">Enterprise AI Terms</td>
          </tr>

          <tr>
            <td class="matrix-domain">
              <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="8" cy="8" r="6"/><path d="M8 4v4l3 2"/></svg>
              Critical Vulnerability SLA
            </td>
            <td class="td-bluebase">
              <span class="matrix-pill-pass">PASS</span>
              Strict &lt; 24h remediation SLA for zero-day vulnerabilities affecting active managed deployments.
            </td>
            <td class="td-legacy">Best-effort response taking days or weeks without dedicated security on-call engineers.</td>
            <td class="td-verification">PagerDuty Audit SLA</td>
          </tr>

          <tr>
            <td class="matrix-domain">
              <svg viewBox="0 0 16 16" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><path d="M8 2a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM2 14c0-2.5 3-4 6-4s6 1.5 6 4"/></svg>
              Personnel Governance
            </td>
            <td class="td-bluebase">
              <span class="matrix-pill-pass">PASS</span>
              Mandatory criminal &amp; identity background verification, bilateral NDAs, and hardware MFA tokens.
            </td>
            <td class="td-legacy">Unvetted freelance contractors operating on unsecured personal consumer devices.</td>
            <td class="td-verification">HR Verification Records</td>
          </tr>
        </tbody>
      </table>
    </div>

  </div>
</section>

<!-- 5. REAL-TIME INCIDENT RESPONSE & ZERO-DOWNTIME SLA PROTOCOL -->
<section class="incident-response-flow" id="incident-protocol">
  <div class="container">
    
    <div class="text-center" style="max-width: 820px; margin: 0 auto 30px;" data-viewport="true">
      <span class="section-tag" style="background: rgba(255,255,255,0.08); color: #38bdf8;">Continuous Defense SLA</span>
      <h2 class="section-title" style="color: #ffffff;">Four-Stage Rapid Vulnerability <mark>Mitigation Protocol</mark></h2>
      <p class="section-subtitle" style="color: #94a3b8; margin: 0 auto;">How our engineering team ingests, isolates, patches, and validates software updates when security advisories emerge.</p>
    </div>

    <div class="sla-timeline-grid" data-viewport="true">
      
      <div class="sla-step-card">
        <span class="sla-time-pill">&lt; 15 MINS</span>
        <h3>01. CVE Ingestion</h3>
        <p>Continuous automated feeds from NVD, GitHub Advisory Database, and Snyk flag emerging vulnerabilities in real-time.</p>
      </div>

      <div class="sla-step-card">
        <span class="sla-time-pill">&lt; 4 HOURS</span>
        <h3>02. Sandbox Isolation</h3>
        <p>Security engineers reproduce the attack vector inside an isolated, air-gapped staging container to synthesize a verified patch.</p>
      </div>

      <div class="sla-step-card">
        <span class="sla-time-pill">&lt; 12 HOURS</span>
        <h3>03. Regression Matrix</h3>
        <p>Full suite of automated end-to-end integration and security tests execute against the patched build with zero performance regressions.</p>
      </div>

      <div class="sla-step-card">
        <span class="sla-time-pill">&lt; 24 HOURS</span>
        <h3>04. Blue/Green Rollout</h3>
        <p>Zero-downtime atomic deployment switch via traffic mirroring, followed by continuous telemetry monitoring and client disclosure.</p>
      </div>

    </div>

  </div>
</section>

<!-- 6. CLIENT TRUST CHARTER & AI PRIVACY GUARANTEE -->
<section class="trust-charter-section" id="trust-charter">
  <div class="container">
    
    <div class="charter-card-banner" data-viewport="true">
      <div class="charter-intro">
        <span class="section-tag">Institutional Commitment</span>
        <h2 class="section-title">The Bluebase <mark>Client Trust Charter</mark></h2>
        <p class="section-subtitle" style="margin: 0 auto;">Our formal commitment to protecting your company's intellectual capital, data residency, and confidential trade secrets.</p>
      </div>

      <div class="charter-pillars-grid">
        
        <div class="charter-pillar">
          <div class="charter-pillar-icon">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M12 2L3 7v6c0 5.5 3.8 10.7 9 12 5.2-1.3 9-6.5 9-12V7l-9-5z"/>
            </svg>
          </div>
          <h3>Unconditional IP Ownership</h3>
          <p>Every line of custom software, database migration, API specification, and design component created for your project is assigned 100% to your organization upon final invoice settlement.</p>
        </div>

        <div class="charter-pillar">
          <div class="charter-pillar-icon">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
          </div>
          <h3>Enterprise AI Confidentiality</h3>
          <p>We strictly prohibit using client source code, confidential databases, or internal documents to train commercial machine learning models. Zero data retention policies are strictly enforced.</p>
        </div>

        <div class="charter-pillar">
          <div class="charter-pillar-icon">
            <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
              <circle cx="12" cy="12" r="10"/>
              <path d="M12 6v6l4 2"/>
            </svg>
          </div>
          <h3>Air-Gapped Production Data</h3>
          <p>Bluebase engineers develop exclusively using synthesized dummy fixtures and anonymized test databases. Developers never touch unmasked live production customer PII.</p>
        </div>

      </div>
    </div>

  </div>
</section>

<!-- 7. REAL CLIENT LOGOS SECTION -->
@include('partials.client-marquee', ['heading' => 'Trusted by modern brands, founders, and growing businesses worldwide'])

<!-- 8. ENTERPRISE PROCUREMENT & SECURITY FAQ -->
<section class="security-faq-section" id="security-faq">
  <div class="container">
    
    <div class="text-center" style="max-width: 820px; margin: 0 auto;" data-viewport="true">
      <span class="section-tag">Procurement Questions</span>
      <h2 class="section-title">Frequently Asked <mark>Security Questions</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Direct answers for Chief Technology Officers, CISOs, and legal procurement teams evaluating Bluebase.</p>
    </div>

    <div class="sec-faq-grid" data-viewport="true">
      
      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Do you execute bilateral Non-Disclosure Agreements (NDAs) prior to discovery?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 6l4 4 4-4"/>
          </svg>
        </button>
        <div class="sec-faq-answer">
          <p>Yes. We routinely execute mutual NDAs with enterprise partners before conducting architectural discovery, code inspections, or technical requirement reviews. We are happy to review your legal counsel's custom agreement or provide our standard mutual NDA.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Who legally owns the code repositories and cloud infrastructure?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 6l4 4 4-4"/>
          </svg>
        </button>
        <div class="sec-faq-answer">
          <p>You do. Under our standard master services agreement, all deliverables are engineered as "work-for-hire" with full copyright, patent, and trade secret assignment transferring irrevocably to your firm upon invoice settlement. You hold root administrative credentials from day one.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Can our internal security team conduct independent penetration tests?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 6l4 4 4-4"/>
          </svg>
        </button>
        <div class="sec-faq-answer">
          <p>Absolutely. We encourage and support third-party penetration testing on staging environments prior to production launch. We assist in scoping test windows and provide rapid remediation for any discovered findings within our defined SLA windows.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>How do you isolate client data across internal developer environments?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 6l4 4 4-4"/>
          </svg>
        </button>
        <div class="sec-faq-answer">
          <p>Engineers work exclusively within containerized Docker environments populated by synthetic data fixtures. Direct connections to production client databases are air-gapped and strictly forbidden by IAM policies. Ephemeral bastion access requires managerial approval and multi-party logging.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Are AI tools used during development trained on our proprietary code?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 6l4 4 4-4"/>
          </svg>
        </button>
        <div class="sec-faq-answer">
          <p>No. Bluebase enforces zero-data-retention (ZDR) enterprise agreements with AI platform providers. Consumer AI tools with training opt-in clauses are blocked across our corporate network. Your business logic, schemas, and algorithms are never fed back into public foundation models.</p>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- 9. SECURITY & PROCUREMENT AUDIT CTA -->
<section class="sec-cta-section">
  <div class="container">
    <div class="sec-cta-box" data-viewport="true">
      <span class="trust-status-badge" style="background: rgba(34, 197, 94, 0.12); color: #86efac; border-color: rgba(34, 197, 94, 0.3);">
        <span class="trust-pulse-dot" aria-hidden="true"></span>
        Enterprise Procurement Ready
      </span>
      <h2>Ready to Build on <mark>Zero-Trust Infrastructure</mark>?</h2>
      <p>Consult with our lead security architects. We'll walk your technical team through our compliance documentation, automated CI test suites, and cryptographic posture.</p>
      
      <div class="sec-cta-actions">
        <a href="{{ route('contact') }}?service=compliance-security" class="c-btn -primary">
          <span class="c-btn__txt">Start Security Onboarding</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base">
              <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </span>
            <span class="c-btn__ico-hover">
              <svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </span>
          </span>
        </a>
        <a href="{{ route('contact') }}" class="c-btn -secondary" style="border-color: rgba(255,255,255,0.2); color: #ffffff;">
          <span class="c-btn__txt">Schedule Audit Call</span>
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

<!-- INTERACTIVE PIPELINE & FAQ JAVASCRIPT -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // 1. Defense Pipeline Tab Switcher
  const pipelineBtns = document.querySelectorAll('.pipeline-nav-btn');
  const pipelinePanes = document.querySelectorAll('.pipeline-pane');

  pipelineBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      const targetId = this.getAttribute('data-pipeline-target');
      
      pipelineBtns.forEach(b => {
        b.classList.remove('active');
        b.setAttribute('aria-selected', 'false');
      });
      pipelinePanes.forEach(p => p.classList.remove('active'));

      this.classList.add('active');
      this.setAttribute('aria-selected', 'true');

      const targetPane = document.getElementById(targetId);
      if (targetPane) {
        targetPane.classList.add('active');
      }
    });
  });

  // 2. Security FAQ Accordion
  const faqQuestions = document.querySelectorAll('.sec-faq-question');
  faqQuestions.forEach(btn => {
    btn.addEventListener('click', function() {
      const item = this.closest('.sec-faq-item');
      const isExpanded = this.getAttribute('aria-expanded') === 'true';
      
      document.querySelectorAll('.sec-faq-item').forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('active');
          const otherBtn = otherItem.querySelector('.sec-faq-question');
          if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
        }
      });

      if (isExpanded) {
        item.classList.remove('active');
        this.setAttribute('aria-expanded', 'false');
      } else {
        item.classList.add('active');
        this.setAttribute('aria-expanded', 'true');
      }
    });
  });
});
</script>

<!-- SCHEMA.ORG STRUCTURED DATA -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@graph": [
    {
      "@@type": "WebPage",
      "@@id": "{{ url()->current() }}#webpage",
      "url": "{{ url()->current() }}",
      "name": "Security, Compliance & Governance Standards | Bluebase Technologies",
      "description": "Enterprise-grade security, SOC 2 Type II controls, ISO/IEC 27001 ISMS, GDPR data residency, zero-trust infrastructure, and guaranteed 100% client IP ownership.",
      "publisher": {
        "@@type": "Organization",
        "name": "Bluebase Technologies",
        "url": "{{ route('home') }}",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ asset('images/logo.svg') }}"
        }
      }
    },
    {
      "@@type": "BreadcrumbList",
      "@@id": "{{ url()->current() }}#breadcrumb",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ route('home') }}"
        },
        {
          "@@type": "ListItem",
          "position": 2,
          "name": "Company",
          "item": "{{ route('company') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "Security & Compliance",
          "item": "{{ url()->current() }}"
        }
      ]
    }
  ]
}
</script>

@endsection