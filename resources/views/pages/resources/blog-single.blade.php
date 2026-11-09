@extends('layouts.app')

@section('title', $blog->title . ' — Bluebase Tech Blog | Bluebase Technologies')
@section('meta_description', Str::limit(strip_tags($blog->excerpt ?? $blog->content), 155))

@section('content')

<!-- ARTICLE STRUCTURED DATA (SCHEMA.ORG TECHARTICLE) -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "TechArticle",
  "headline": "{{ addslashes($blog->title) }}",
  "description": "{{ addslashes(strip_tags($blog->excerpt ?? $blog->title)) }}",
  "image": "{{ asset($blog->image ?: 'images/stories/screens-clicks.jpg') }}",
  "author": {
    "@@type": "Person",
    "name": "{{ addslashes($blog->author) }}"
  },
  "publisher": {
    "@@type": "Organization",
    "name": "Bluebase Technologies",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('images/logo.png') }}"
    }
  },
  "datePublished": "{{ $blog->published_at ? $blog->published_at->toIso8601String() : $blog->created_at->toIso8601String() }}",
  "dateModified": "{{ $blog->updated_at->toIso8601String() }}"
}
</script>

<!-- HERO SECTION (ARTICLE HEADER WITH PREVIOUS BALANCED FONT SIZES) -->
<section class="hero-section -article-hero">
  <img src="{{ asset('images/hero-v2-bg.svg') }}" alt="" class="hero-bg" aria-hidden="true">
  <div class="container hero-content">
    
    <!-- SEO / AEO Breadcrumb Navigation -->
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
          <a href="{{ route('blog') }}" itemprop="item" class="breadcrumb-link">
            <span itemprop="name">Tech Blog</span>
          </a>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">{{ Str::limit($blog->title, 38) }}</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <!-- Category Pill & Read Meta -->
    <div style="display: flex; align-items: center; gap: 10px; margin-top: 10px;" data-viewport="true">
      <a href="{{ route('blog') }}?category={{ $blog->category_slug }}" class="blog-cat-badge">
        {{ $blog->category }}
      </a>
      <span class="blog-read-time" style="color: #94a3b8; font-size: 0.82rem; font-weight: 500;">
        {{ $blog->read_time }} &bull; {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'Recent' }}
      </span>
    </div>

    <!-- Article Main Headline (Balanced Typography) -->
    <h1 class="blog-single-title" data-viewport="true">
      {{ $blog->title }}
    </h1>

    <!-- Executive Summary / Excerpt -->
    @if($blog->excerpt)
      <p class="blog-single-lead" data-viewport="true">
        {{ $blog->excerpt }}
      </p>
    @endif

    <!-- Author Byline & Social Actions -->
    <div class="blog-single-byline" data-viewport="true">
      <div class="blog-byline-author">
        <div class="blog-byline-avatar">
          {{ $blog->author_initials }}
        </div>
        <div class="blog-byline-text">
          <strong>{{ $blog->author }}</strong>
          <span>{!! $blog->author_role ?? 'Senior Software Architect &bull; Bluebase Technologies' !!}</span>
        </div>
      </div>

      <div class="blog-byline-actions">
        <button type="button" class="blog-share-pill-btn" onclick="navigator.clipboard.writeText(window.location.href); alert('Article link copied to clipboard!');" aria-label="Copy article link">
          <svg viewBox="0 0 16 16" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6.5 9.5a3 3 0 0 0 4.24 0l2-2a3 3 0 0 0-4.24-4.24l-1 1"/>
            <path d="M9.5 6.5a3 3 0 0 0-4.24 0l-2 2a3 3 0 0 0 4.24 4.24l1-1"/>
          </svg>
          <span>Share Article</span>
        </button>
        <a href="{{ route('blog') }}" class="blog-share-pill-btn">
          <span>All Articles</span>
        </a>
      </div>
    </div>

    <!-- Hero Badges -->
    <div class="hero-badges stagger-4" data-viewport="true">
      <div class="hero-badge-item">Author: {{ $blog->author }}</div>
      <div class="hero-badge-item">{{ $blog->read_time }}</div>
      <div class="hero-badge-item">Production Verified</div>
      <div class="hero-badge-item">100% Client Code Ownership</div>
    </div>

  </div>
</section>

<!-- MAIN ARTICLE SECTION (HARMONIZED BLUEBASE LIGHT ARCHITECTURE) -->
<section class="blog-single-page-section">
  <div class="container">
    <div class="blog-single-grid">

      <!-- LEFT COLUMN: SIDE SECTION (STICKY SIDEBAR WIDGETS) -->
      <aside class="article-sidebar" aria-label="Article Navigation & Metadata">
        
        <!-- Back to Blog Navigation Pill -->
        <a href="{{ route('blog') }}" class="widget-back-btn">
          <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 8H4M8 12l-4-4 4-4"/>
          </svg>
          <span>Back to Tech Blog</span>
        </a>

        <!-- Table of Contents Widget -->
        <div class="article-sidebar-widget">
          <div class="widget-heading">
            <svg class="widget-heading-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M2 4h12M2 8h8M2 12h10"/>
            </svg>
            <span>In This Article</span>
          </div>
          <nav class="widget-toc-nav" aria-label="Table of contents">
            <ul class="widget-toc-list" id="article-toc-list">
              <li><a href="#overview" class="widget-toc-link">Executive Summary</a></li>
              <li><a href="#architecture" class="widget-toc-link">Core Architecture</a></li>
              <li><a href="#implementation" class="widget-toc-link">Code Implementation</a></li>
              <li><a href="#benchmarks" class="widget-toc-link">Performance &amp; Scale</a></li>
              <li><a href="#key-takeaways" class="widget-toc-link">Production Takeaways</a></li>
            </ul>
          </nav>
        </div>

        <!-- Technical Metadata Widget -->
        <div class="article-sidebar-widget">
          <div class="widget-heading">
            <svg class="widget-heading-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M2 3h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/>
              <path d="M5 8h6M5 11h3"/>
            </svg>
            <span>Article Specifications</span>
          </div>
          <div class="widget-meta-rows">
            <div class="widget-meta-row">
              <span class="widget-meta-label">Discipline</span>
              <span class="widget-meta-val">{{ $blog->category }}</span>
            </div>
            <div class="widget-meta-row">
              <span class="widget-meta-label">Read Time</span>
              <span class="widget-meta-val">{{ $blog->read_time }}</span>
            </div>
            <div class="widget-meta-row">
              <span class="widget-meta-label">Architecture</span>
              <span class="widget-meta-val">Distributed Cloud</span>
            </div>
            <div class="widget-meta-row">
              <span class="widget-meta-label">Production Grade</span>
              <span class="widget-meta-badge">Verified</span>
            </div>
          </div>

          @if($blog->tags)
            <div class="widget-tags-cloud">
              @foreach(explode(',', $blog->tags) as $tag)
                <span class="widget-tag-pill">{{ trim($tag) }}</span>
              @endforeach
            </div>
          @endif
        </div>

        <!-- Newsletter Quick Signup Widget -->
        <div class="article-sidebar-widget sidebar-digest-widget">
          <div class="widget-heading" style="border-bottom-color: rgba(0, 80, 231, 0.15);">
            <svg class="widget-heading-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M2 3h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1z"/>
              <path d="M2 4l6 5 6-5"/>
            </svg>
            <span>Engineering Digest</span>
          </div>
          <p class="sidebar-digest-desc">
            Bi-weekly system design playbooks delivered straight to your inbox. Zero marketing spam.
          </p>
          <form action="{{ route('newsletter.subscribe') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Enter your work email..." required class="sidebar-digest-input">
            <button type="submit" class="c-btn -primary" style="width: 100%; justify-content: center; padding: 10px 16px;">
              <span class="c-btn__txt">Subscribe Free</span>
            </button>
          </form>
        </div>

      </aside>

      <!-- RIGHT COLUMN: MAIN ARTICLE READING CARD -->
      <main class="article-reading-card">
        <article class="article-main-body" id="article-content">

          <!-- Executive Summary Callout Box -->
          <div class="article-callout-box" id="overview">
            <div class="callout-title">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="8" cy="8" r="6"/>
                <path d="M8 5v3M8 11h.01"/>
              </svg>
              <span>Executive Architectural Summary</span>
            </div>
            <p>
              {{ $blog->excerpt ?? 'In high-throughput enterprise environments, systems must be built for deterministic isolation, sub-millisecond data pipelines, and seamless operational scalability.' }}
            </p>
          </div>

          <!-- Rendered Article HTML Body -->
          <div class="article-html-body" id="architecture">
            {!! $blog->content !!}
          </div>

          <!-- Article Key Takeaways -->
          <div class="article-callout-box" id="key-takeaways" style="border-left-color: #0050e7; background: #f8fafc; border-color: #e2e8f0; border-left-width: 5px;">
            <div class="callout-title" style="color: #0f172a;">Key Engineering Takeaways</div>
            <ul style="margin: 12px 0 0; padding-left: 20px;">
              <li>Architect isolation boundaries directly at the storage engine level rather than relying solely on application middleware.</li>
              <li>Decouple compute and background worker pipelines with Redis cluster streams and deterministic idempotency keys.</li>
              <li>Incorporate automated regression checks into your CI/CD runner to catch latency regressions before code reaches staging.</li>
            </ul>
          </div>

          <!-- Feedback & Share Strip -->
          <div class="article-interaction-strip">
            <div class="article-feedback-text">
              Did this technical playbook help your system design?
            </div>
            <div class="article-feedback-btns">
              <button type="button" class="feedback-pill-btn" onclick="this.innerHTML='Thanks for your feedback!'; this.disabled=true;">
                Helpful
              </button>
              <button type="button" class="feedback-pill-btn" onclick="window.location.href='{{ route('contact') }}?topic=feedback';">
                Suggest Improvement
              </button>
            </div>
          </div>

          <!-- Author Bio Card Inside Reading Box -->
          <div class="article-author-bio-card">
            <div class="author-bio-avatar">
              {{ $blog->author_initials }}
            </div>
            <div class="author-bio-info">
              <h4>{{ $blog->author }}</h4>
              <span class="bio-role">{!! $blog->author_role ?? 'Senior Software Architect &bull; Bluebase Technologies' !!}</span>
              <p>
                Architecting mission-critical distributed systems, cloud-native enterprise web applications, and autonomous agent systems at Bluebase Technologies.
              </p>
            </div>
          </div>

        </article>
      </main>

    </div>
  </div>
</section>

<!-- UP NEXT IN ENGINEERING (RELATED ARTICLES) -->
@if($relatedBlogs->isNotEmpty())
<section class="blog-related-section">
  <div class="container">
    
    <div class="related-header">
      <p class="section-pretitle">Continuous Learning</p>
      <h2 class="section-title">Up Next in Engineering</h2>
    </div>

    <div class="blog-articles-grid" data-viewport="true">
      @foreach($relatedBlogs as $rel)
        <a href="{{ route('blog.show', $rel->slug) }}" class="blog-article-card" data-category="{{ $rel->category_slug }}">
          <div class="blog-card-body">
            <div class="blog-meta-top">
              <span class="blog-cat-badge">{{ $rel->category }}</span>
              <span class="blog-read-time">{{ $rel->read_time }}</span>
            </div>
            <h3 class="blog-card-title">
              {{ $rel->title }}
            </h3>
            <p class="blog-card-excerpt">
              {{ Str::limit($rel->excerpt ?? strip_tags($rel->content), 125) }}
            </p>
          </div>
          <div class="blog-card-footer">
            <div class="blog-mini-author">
              <div class="blog-mini-avatar">{{ $rel->author_initials }}</div>
              <div class="blog-mini-meta">
                <strong>{{ $rel->author }}</strong>
                <span>{{ $rel->published_at ? $rel->published_at->format('M Y') : 'Recent' }}</span>
              </div>
            </div>
            <div class="blog-read-arrow" aria-hidden="true">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 12L12 4M12 4H6M12 4V10"/>
              </svg>
            </div>
          </div>
        </a>
      @endforeach
    </div>

  </div>
</section>
@endif

<!-- BESPOKE ARCHITECTURE CONSULTATION BANNER (LAST SECTION) -->
<section class="blog-single-cta-section">
  <div class="container">
    <div class="blog-cta-banner" data-viewport="true">
      <div class="blog-cta-glow-orb" aria-hidden="true"></div>

      <!-- Left Content Column -->
      <div class="blog-cta-content">
        <span class="blog-cta-tag">
          <span class="blog-cta-tag-dot" aria-hidden="true"></span>
          Direct Developer Access &bull; Digital Engineering Studio
        </span>
        <h2 class="blog-cta-title">
          Build Your Next Digital Product with <br><mark>Direct Senior Engineers</mark>.
        </h2>
        <p class="blog-cta-desc">
          We eliminate the agency game of telephone. Collaborate directly with senior full-stack software architects in Slack, ship working milestone sprints every 14 days, and own 100% of your code, IP, and cloud accounts from Day 1.
        </p>

        <div class="blog-cta-actions">
          <a href="{{ route('contact') }}?service=web-development" class="c-btn -primary">
            <span class="c-btn__txt">Start Your Project</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
          <a href="{{ route('how-we-work') }}" class="c-btn -outline-white">
            <span class="c-btn__txt">How We Work</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>

        <div class="blog-cta-guarantees">
          <div class="blog-cta-guarantee-item">
            <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M13.5 4.5l-7 7-3.5-3.5"/>
            </svg>
            <span>Direct Slack with Engineers</span>
          </div>
          <div class="blog-cta-guarantee-item">
            <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M13.5 4.5l-7 7-3.5-3.5"/>
            </svg>
            <span>14-Day Working Sprints</span>
          </div>
          <div class="blog-cta-guarantee-item">
            <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M13.5 4.5l-7 7-3.5-3.5"/>
            </svg>
            <span>100% Client Code Ownership</span>
          </div>
          <div class="blog-cta-guarantee-item">
            <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M13.5 4.5l-7 7-3.5-3.5"/>
            </svg>
            <span>Transparent Fixed Pricing</span>
          </div>
        </div>
      </div>

      <!-- Right Column Engagement Model Card -->
      <div class="blog-cta-card-box">
        <div class="blog-cta-card-header">
          <span class="blog-cta-card-label">The Bluebase Delivery Model</span>
          <span class="blog-cta-card-status">
            <span class="blog-cta-status-pulse" aria-hidden="true"></span>
            Sprint Slots Available
          </span>
        </div>

        <div class="blog-cta-spec-list">
          <div class="blog-cta-spec-item">
            <span class="blog-cta-spec-k">Team Access</span>
            <span class="blog-cta-spec-v">Senior Full-Stack &amp; AI Engineers</span>
          </div>
          <div class="blog-cta-spec-item">
            <span class="blog-cta-spec-k">Sprint Cadence</span>
            <span class="blog-cta-spec-v">2-Week Deliverable Milestones</span>
          </div>
          <div class="blog-cta-spec-item">
            <span class="blog-cta-spec-k">Code Ownership</span>
            <span class="blog-cta-spec-v" style="color: #38bdf8;">100% Client Repos &amp; IP</span>
          </div>
          <div class="blog-cta-spec-item">
            <span class="blog-cta-spec-k">Pricing Model</span>
            <span class="blog-cta-spec-v">Fixed Milestone Quotes</span>
          </div>
          <div class="blog-cta-spec-item">
            <span class="blog-cta-spec-k">Free Discovery</span>
            <span class="blog-cta-spec-v">30-Min Architecture Consultation</span>
          </div>
        </div>

        <div class="blog-cta-card-note">
          Have an upcoming web application, SaaS product, or mobile app to build? Schedule a free discovery call to review requirements and receive a milestone roadmap within 48 hours.
        </div>
      </div>

    </div>
  </div>
</section>

@endsection
