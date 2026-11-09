@extends('layouts.app')

@if(isset($currentCategory) && $currentCategory)
  @section('title', $currentCategory->meta_title ?: ($currentCategory->name . ' Articles & Case Studies — Bluebase Tech Blog'))
  @section('meta_description', $currentCategory->meta_description ?: ('Explore technical articles, engineering benchmarks, and system design teardowns in ' . $currentCategory->name . ' by Bluebase Technologies.'))
  @section('canonical_url', route('blog.category', $currentCategory->slug))
@else
  @section('title', 'Bluebase Tech Blog — Software Architecture & Engineering | Bluebase Technologies')
  @section('meta_description', 'Deep-dive engineering playbooks, system design teardowns, and production lessons learned from senior full-stack software architects and AI engineers.')
  @section('canonical_url', route('blog'))
@endif

@section('content')

<!-- HERO SECTION (SHORT & CRISP AS REQUESTED) -->
<section class="hero-section">
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
          <span itemprop="name">Resources</span>
          <meta itemprop="position" content="2">
        </li>
        <li class="breadcrumb-sep" aria-hidden="true">
          <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 12l4-4-4-4"/>
          </svg>
        </li>
        <li class="breadcrumb-item {{ !isset($currentCategory) ? '-current' : '' }}" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          @if(isset($currentCategory))
            <a href="{{ route('blog') }}" itemprop="item" class="breadcrumb-link">
              <span itemprop="name">Tech Blog</span>
            </a>
          @else
            <span itemprop="name" aria-current="page">Tech Blog</span>
          @endif
          <meta itemprop="position" content="3">
        </li>
        @if(isset($currentCategory))
          <li class="breadcrumb-sep" aria-hidden="true">
            <svg viewBox="0 0 16 16" width="9" height="9" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 12l4-4-4-4"/>
            </svg>
          </li>
          <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <span itemprop="name" aria-current="page">{{ $currentCategory->name }}</span>
            <meta itemprop="position" content="4">
          </li>
        @endif
      </ol>
    </nav>

    @if(isset($currentCategory))
      <p class="hero-pretitle" data-viewport="true">Category Archive &bull; Engineering</p>
      <h1 class="hero-title stagger-1" data-viewport="true">
        {{ $currentCategory->name }} <br><mark>Engineering Deep Dives</mark>.
      </h1>
      <p class="hero-description stagger-2" data-viewport="true">
        {{ $currentCategory->description ?: 'Production playbooks, architectural teardowns, and benchmarks in ' . $currentCategory->name . '.' }}
      </p>
    @else
      <p class="hero-pretitle" data-viewport="true">Engineering &bull; Insights</p>
      <h1 class="hero-title stagger-1" data-viewport="true">
        Tech Blog Built <br><mark>for Modern Builders</mark>.
      </h1>
      <p class="hero-description stagger-2" data-viewport="true">
        Architecture teardowns, system design playbooks, and production lessons.
      </p>
    @endif

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="#articles-grid-section" class="c-btn -primary">
        <span class="c-btn__txt">Explore Articles</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        </span>
      </a>
      <a href="#newsletter-digest" class="c-btn -secondary">
        <span class="c-btn__txt">Subscribe</span>
        <span class="c-btn__ico">
          <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
        </span>
      </a>
    </div>

    <div class="hero-badges stagger-4" data-viewport="true">
      <div class="hero-badge-item">Senior Engineers</div>
      <div class="hero-badge-item">Production Tested</div>
      <div class="hero-badge-item">Zero Fluff</div>
    </div>

  </div>
</section>

<!-- FEATURED ARTICLE SHOWCASE (Displayed on main blog index) -->
@if($featuredBlog && !isset($currentCategory))
<section class="blog-featured-section" id="featured-article">
  <div class="container">
    <div class="blog-featured-card" data-viewport="true">
      
      <!-- Content Left -->
      <div class="blog-featured-content">
        <div>
          <div class="blog-meta-top">
            <a href="{{ route('blog.category', $featuredBlog->category_slug) }}" class="blog-cat-badge">
              {{ $featuredBlog->effective_category_name }}
            </a>
            <span class="blog-read-time">{{ $featuredBlog->read_time }} &bull; {{ $featuredBlog->published_at ? $featuredBlog->published_at->format('F Y') : 'Featured' }}</span>
          </div>

          <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="blog-featured-title">
            {{ $featuredBlog->title }}
          </a>

          <p class="blog-featured-excerpt">
            {{ $featuredBlog->excerpt }}
          </p>

          <div class="blog-author-block">
            <div class="blog-author-avatar">{{ $featuredBlog->author_initials }}</div>
            <div class="blog-author-info">
              <span class="blog-author-name">{{ $featuredBlog->author }}</span>
              <span class="blog-author-role">{{ $featuredBlog->author_role ?? 'Principal Systems Architect' }}</span>
            </div>
          </div>
        </div>

        <div class="blog-featured-cta">
          <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="c-btn -primary">
            <span class="c-btn__txt">Read Deep Dive</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>
      </div>

      <!-- Visual Right: Interactive Architecture Teaser -->
      <div class="blog-featured-visual">
        <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="blog-visual-link" aria-label="Read Architecture Blueprint">
          <div class="blog-code-badge">Production Architecture &bull; PostgreSQL RLS</div>
          <div class="blog-terminal-window">
            <div class="terminal-dots">
              <span></span><span></span><span></span>
            </div>
            <code>
              -- Enforce strict row-level security<br>
              ALTER TABLE organization_invoices<br>
              ENABLE ROW LEVEL SECURITY;<br>
              <br>
              CREATE POLICY tenant_isolation_policy ON organization_invoices<br>
              USING (tenant_id = current_setting('app.current_tenant_id')::uuid);<br>
              <br>
              -- Query planner bypasses cross-tenant scans<br>
              EXPLAIN ANALYZE SELECT * FROM organization_invoices;<br>
              Execution Time: 0.842 ms (Bitmap Heap Scan)
            </code>
          </div>
        </a>
      </div>

    </div>
  </div>
</section>
@endif

<!-- DYNAMIC TOPIC CATEGORY FILTER BAR -->
<section class="blog-filter-section" id="articles-grid-section">
  <div class="container">
    <div style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px;">
      <ul class="blog-filter-list" role="tablist" aria-label="Article Categories" style="margin-bottom: 0;">
        @foreach($categories as $key => $cat)
          @if($cat['count'] > 0 || $key === 'all')
            <li>
              <a href="{{ $cat['url'] }}" 
                 class="blog-filter-btn {{ $selectedCategory === $key ? 'active' : '' }}"
                 style="text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                {{ $cat['name'] }}
                <span style="font-size: 0.72rem; opacity: 0.8; padding: 1px 6px; border-radius: 10px; background: rgba(255,255,255,0.1);">{{ $cat['count'] }}</span>
              </a>
            </li>
          @endif
        @endforeach
      </ul>

      @if(isset($currentCategory))
        <a href="{{ route('blog') }}" class="btn btn-secondary btn-sm" style="display: inline-flex; align-items: center; gap: 6px; text-decoration: none; font-size: 0.82rem; padding: 6px 14px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.1); color: var(--text-muted);">
          &times; Clear Filter (View All)
        </a>
      @endif
    </div>
  </div>
</section>

<!-- CURATED ARTICLES GRID -->
<section class="blog-grid-section">
  <div class="container">
    <div class="blog-articles-grid" data-viewport="true" id="articles-grid">
      
      @forelse($blogs as $art)
        <a href="{{ route('blog.show', $art->slug) }}" class="blog-article-card" data-category="{{ $art->category_slug }}">
          <div class="blog-card-body">
            <div class="blog-meta-top">
              <span class="blog-cat-badge">{{ $art->effective_category_name }}</span>
              <span class="blog-read-time">{{ $art->read_time }}</span>
            </div>
            <h3 class="blog-card-title">
              {{ $art->title }}
            </h3>
            <p class="blog-card-excerpt">
              {{ Str::limit($art->excerpt ?? strip_tags($art->content), 140) }}
            </p>
          </div>
          <div class="blog-card-footer">
            <div class="blog-mini-author">
              <div class="blog-mini-avatar">{{ $art->author_initials }}</div>
              <div class="blog-mini-meta">
                <strong>{{ $art->author }}</strong>
                <span>{{ $art->published_at ? $art->published_at->format('M Y') : 'Recent' }}</span>
              </div>
            </div>
            <div class="blog-read-arrow" aria-hidden="true">
              <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg>
            </div>
          </div>
        </a>
      @empty
        <div class="blog-empty-state" style="grid-column: 1 / -1; text-align: center; padding: 60px 20px; background: rgba(15, 23, 42, 0.4); border: 1px dashed var(--border-color); border-radius: 16px;">
          <h3 style="font-size: 1.3rem; margin-bottom: 8px; color: var(--text);">No articles in {{ isset($currentCategory) ? $currentCategory->name : 'this category' }} yet</h3>
          <p style="color: var(--text-muted); max-width: 480px; margin: 0 auto 20px;">We are continually releasing new production teardowns and architectural blueprints. Check back shortly or browse all categories.</p>
          <a href="{{ route('blog') }}" class="c-btn -primary">
            <span class="c-btn__txt">View All Articles</span>
          </a>
        </div>
      @endforelse

    </div>

    @if($blogs->hasPages())
      <div style="margin-top: 40px; display: flex; justify-content: center;">
        {{ $blogs->links() }}
      </div>
    @endif
  </div>
</section>

<!-- WEEKLY ENGINEERING DIGEST NEWSLETTER -->
<section class="blog-newsletter-section" id="newsletter-digest">
  <div class="container">
    <div class="blog-newsletter-box" data-viewport="true">
      <div class="blog-nl-left">
        <span class="blog-nl-badge">Production Digest</span>
        <h2 class="blog-nl-title">Architectural playbooks. <br>Direct to your inbox.</h2>
        <p class="blog-nl-desc">
          One technical email every Thursday. Microservices, edge caching, zero-trust cloud infrastructure, and AI copilots. Zero marketing fluff.
        </p>
      </div>

      <div class="blog-nl-right">
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="blog-nl-form" id="newsletterForm">
          @csrf
          <input type="email" name="email" class="blog-nl-input" placeholder="colleague@company.com" required autocomplete="email">
          <button type="submit" class="c-btn -primary">
            <span class="c-btn__txt">Join Digest</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </button>
        </form>
        <span class="blog-nl-privacy">No tracking. Unsubscribe in one click anytime.</span>
      </div>
    </div>
  </div>
</section>

@endsection
