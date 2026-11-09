@extends('layouts.app')

@section('title', 'Bluebase Tech Blog — Software Architecture & Engineering | Bluebase Technologies')
@section('meta_description', 'Deep-dive engineering playbooks, system design teardowns, and production lessons learned from senior full-stack software architects and AI engineers.')

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
        <li class="breadcrumb-item -current" itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
          <span itemprop="name" aria-current="page">Tech Blog</span>
          <meta itemprop="position" content="3">
        </li>
      </ol>
    </nav>

    <p class="hero-pretitle" data-viewport="true">Engineering &bull; Insights</p>
    <h1 class="hero-title stagger-1" data-viewport="true">
      Tech Blog Built <br><mark>for Modern Builders</mark>.
    </h1>
    <p class="hero-description stagger-2" data-viewport="true">
      Architecture teardowns, system design playbooks, and production lessons.
    </p>

    <div class="hero-buttons stagger-3" data-viewport="true">
      <a href="#featured-article" class="c-btn -primary">
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

<!-- FEATURED ARTICLE SHOWCASE -->
@if($featuredBlog)
<section class="blog-featured-section" id="featured-article">
  <div class="container">
    <div class="blog-featured-card" data-viewport="true">
      
      <!-- Content Left -->
      <div class="blog-featured-content">
        <div>
          <div class="blog-meta-top">
            <span class="blog-cat-badge">{{ $featuredBlog->category }}</span>
            <span class="blog-read-time">{{ $featuredBlog->read_time }} &bull; {{ $featuredBlog->published_at ? $featuredBlog->published_at->format('F Y') : 'Featured' }}</span>
          </div>

          <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="blog-featured-title">
            {{ $featuredBlog->title }}
          </a>

          <p class="blog-featured-excerpt">
            {{ $featuredBlog->excerpt }}
          </p>
        </div>

        <div class="blog-author-row">
          <div class="blog-author-avatar">{{ $featuredBlog->author_initials }}</div>
          <div class="blog-author-info">
            <strong>{{ $featuredBlog->author }}</strong>
            <span>{!! $featuredBlog->author_role ?? 'Lead Software Architect &bull; Bluebase Technologies' !!}</span>
          </div>
        </div>

        <div style="margin-top: 24px;">
          <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="c-btn -primary">
            <span class="c-btn__txt">Read Full Playbook</span>
            <span class="c-btn__ico">
              <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
              <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            </span>
          </a>
        </div>
      </div>

      <!-- Visual Right: Interactive Schema / Code Snippet -->
      <div class="blog-featured-visual">
        <a href="{{ route('blog.show', $featuredBlog->slug) }}" class="blog-featured-card-link" aria-label="Read featured article: {{ $featuredBlog->title }}">
          <div class="code-snippet-box">
            <div class="code-header-bar">
              <span>POSTGRESQL 16 RLS POLICY</span>
              <span>TENANT_ISOLATION.SQL</span>
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

<!-- TOPIC CATEGORY FILTER BAR -->
<section class="blog-filter-section">
  <div class="container">
    <ul class="blog-filter-list" role="tablist" aria-label="Article Categories">
      @foreach($categories as $key => $cat)
        @if($cat['count'] > 0 || $key === 'all')
          <li>
            <button type="button" 
                    class="blog-filter-btn {{ $selectedCategory === $key ? 'active' : '' }}" 
                    data-filter="{{ $cat['slug'] }}">
              {{ $cat['name'] }} ({{ $cat['count'] }})
            </button>
          </li>
        @endif
      @endforeach
    </ul>
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
              <span class="blog-cat-badge">{{ $art->category }}</span>
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
        <div class="blog-empty-state">
          <h3>No engineering articles found</h3>
          <p>We are constantly publishing new production teardowns. Check back soon or view all articles.</p>
          <a href="{{ route('blog') }}" class="c-btn -primary">
            <span class="c-btn__txt">View All Articles</span>
          </a>
        </div>
      @endforelse

    </div>
  </div>
</section>

<!-- WEEKLY ENGINEERING DIGEST NEWSLETTER -->
<section class="blog-newsletter-section" id="newsletter-digest">
  <div class="container">
    <div class="blog-newsletter-box" data-viewport="true">
      <div class="blog-nl-left">
        <span class="blog-cat-badge" style="background: rgba(34, 197, 94, 0.12); color: #86efac; border-color: rgba(34, 197, 94, 0.3);">
          Bi-Weekly Engineering Digest
        </span>
        <h2>Architectural Teardowns Delivered Straight to Your Inbox</h2>
        <p>No marketing fluff, product spam, or generic listicles. One deep-dive architectural playbook delivered every other Tuesday written by senior engineers.</p>
      </div>

      <div class="blog-nl-right">
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="blog-nl-form">
          @csrf
          <div class="blog-nl-input-group">
            <input type="email" name="email" placeholder="Enter your work email..." required class="blog-nl-input">
            <button type="submit" class="c-btn -primary" style="white-space: nowrap;">Subscribe</button>
          </div>
          <div class="blog-nl-subtext">
            <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 8.5l3.5 3.5L13 4"/></svg>
            <span>Over 2,400+ CTOs and engineers read the digest. Zero spam guaranteed.</span>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- TECH STACK & SYSTEM DESIGN GUIDES -->
<section class="compliance-matrix-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto 30px;" data-viewport="true">
      <span class="section-tag">Production Standards</span>
      <h2 class="section-title">Bluebase Production <mark>Tech Stack Standards</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">The hardened, battle-tested modern technology frameworks we use across client platforms.</p>
    </div>

    <div class="matrix-table-wrap" data-viewport="true">
      <table class="matrix-table">
        <thead>
          <tr>
            <th style="width: 25%;">Layer</th>
            <th class="col-bluebase" style="width: 35%;">Standard Technology Choice</th>
            <th style="width: 25%;">Primary Architectural Benefit</th>
            <th style="width: 15%;">Production Grade</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="matrix-domain">Backend Core</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">PHP 8.3</span> Laravel 11 with Octane &amp; Swoole</td>
            <td class="td-legacy">Sub-10ms response times &amp; clean MVC domain boundaries</td>
            <td class="td-verification">Enterprise Stable</td>
          </tr>
          <tr>
            <td class="matrix-domain">Frontend &amp; UI</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">React / Next</span> Next.js 15 &amp; Tailwind CSS 4</td>
            <td class="td-legacy">Server Components (RSC) &amp; sub-second Core Web Vitals</td>
            <td class="td-verification">Production Ready</td>
          </tr>
          <tr>
            <td class="matrix-domain">Data &amp; Persistence</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">PostgreSQL 16</span> Redis Cluster &amp; Row-Level Security</td>
            <td class="td-legacy">ACID compliance, tenant isolation &amp; microsecond caching</td>
            <td class="td-verification">Zero Leakage</td>
          </tr>
          <tr>
            <td class="matrix-domain">Edge &amp; WAF</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">Cloudflare</span> Enterprise WAF, DDoS Scrubbing &amp; TLS 1.3</td>
            <td class="td-legacy">Global CDN edge routing &amp; automated threat protection</td>
            <td class="td-verification">99.99% Uptime</td>
          </tr>
          <tr>
            <td class="matrix-domain">Mobile Apps</td>
            <td class="td-bluebase"><span class="matrix-pill-pass">Flutter 3.x</span> Dart Multi-Platform Native Engine</td>
            <td class="td-legacy">Single codebase targeting iOS &amp; Android with 100% native speed</td>
            <td class="td-verification">App Store Ready</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS -->
<section class="security-faq-section">
  <div class="container">
    <div class="text-center" style="max-width: 820px; margin: 0 auto;" data-viewport="true">
      <span class="section-tag">Blog FAQ</span>
      <h2 class="section-title">Frequently Asked <mark>Engineering Questions</mark></h2>
      <p class="section-subtitle" style="margin: 0 auto;">Details on our editorial policies, technical review processes, and engineering consultations.</p>
    </div>

    <div class="sec-faq-grid" data-viewport="true">
      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Are these articles based on real production client architectures?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>Yes. Every article is written by working senior software engineers and architects at Bluebase. We extract sanitized, generalized architectural blueprints from real production deployments without ever exposing proprietary client data or trade secrets.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Can our engineering team consult directly with the author architects?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>Yes. We offer free 30-minute technical architecture discovery calls where you can speak directly with our lead software architects about scaling, system design, or auditing your existing stack.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>How often does Bluebase publish new technical articles?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>We prioritize deep technical rigor over publishing frequency. We release 2 to 3 comprehensive, thoroughly tested architectural teardowns per month, delivered directly to our email digest subscribers.</p>
        </div>
      </div>

      <div class="sec-faq-item">
        <button type="button" class="sec-faq-question" aria-expanded="false">
          <span>Do you accept guest contributions or sponsor posts?</span>
          <svg class="sec-faq-toggle-ico" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 6l4 4 4-4"/></svg>
        </button>
        <div class="sec-faq-answer">
          <p>No. We do not accept sponsored posts, paid links, or third-party marketing content. 100% of our articles are written, peer-reviewed, and code-tested by our in-house engineering team.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CALL TO ACTION -->
<section class="sec-cta-section">
  <div class="container">
    <div class="sec-cta-box" data-viewport="true">
      <span class="trust-status-badge" style="background: rgba(34, 197, 94, 0.12); color: #86efac; border-color: rgba(34, 197, 94, 0.3);">
        <span class="trust-pulse-dot" aria-hidden="true"></span>
        Engineering Squads Available
      </span>
      <h2>Have a Complex Software Architecture <mark>to Build or Scale</mark>?</h2>
      <p>Partner with senior full-stack architects. Schedule a free 30-minute discovery call to review requirements, assess technical feasibility, and map out a realistic roadmap.</p>
      
      <div class="sec-cta-actions">
        <a href="{{ route('contact') }}" class="c-btn -primary">
          <span class="c-btn__txt">Start Your Project</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
        <a href="{{ route('book-a-demo') }}" class="c-btn -secondary" style="border-color: rgba(255,255,255,0.2); color: #ffffff;">
          <span class="c-btn__txt">Schedule Architecture Call</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- SCRIPTS: CATEGORY FILTER & FAQ ACCORDION -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Category Filtering
  const filterBtns = document.querySelectorAll('.blog-filter-btn');
  const articles = document.querySelectorAll('.blog-article-card');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      filterBtns.forEach(b => b.classList.remove('active'));
      this.classList.add('active');

      const filter = this.getAttribute('data-filter');

      articles.forEach(article => {
        const cat = (article.getAttribute('data-category') || '').toLowerCase();
        if (filter === 'all' || cat === filter || cat.includes(filter) || filter.includes(cat)) {
          article.style.display = 'flex';
        } else {
          article.style.display = 'none';
        }
      });
    });
  });

  // FAQ Accordion
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
      "@@type": "Blog",
      "@@id": "{{ url()->current() }}#blog",
      "url": "{{ url()->current() }}",
      "name": "Bluebase Tech Blog — Software Architecture & Engineering | Bluebase Technologies",
      "description": "Deep-dive engineering playbooks, system design teardowns, and production lessons learned from senior full-stack software architects and AI engineers.",
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
          "name": "Resources",
          "item": "{{ route('whitepapers') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "Tech Blog",
          "item": "{{ url()->current() }}"
        }
      ]
    }
  ]
}
</script>

@endsection