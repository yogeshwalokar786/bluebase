@extends('layouts.app')

@section('title', $story->seo_title)
@section('meta_description', $story->seo_description)
@if(!empty($story->meta_keywords))
  @section('meta_keywords', $story->meta_keywords)
@endif
@section('canonical_url', $story->canonical_url ?: route('customer-stories.show', $story->slug))
@section('og_image', $story->hero_image)

@push('schema')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ addslashes($story->title) }}",
  "description": "{{ addslashes(strip_tags($story->excerpt ?: $story->title)) }}",
  "image": "{{ asset($story->hero_image) }}",
  "author": {
    "@type": "Organization",
    "name": "Bluebase Technologies",
    "url": "https://bluebasetechnologies.com"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Bluebase Technologies",
    "logo": {
      "@type": "ImageObject",
      "url": "https://bluebasetechnologies.com/images/favicon.ico"
    }
  },
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{ route('customer-stories.show', $story->slug) }}"
  }
}
</script>
@endpush

@push('styles')
<style>
.cs-single-hero {
  padding: 130px 0 60px;
  background: radial-gradient(circle at 85% 15%, rgba(0, 80, 231, 0.06) 0%, transparent 60%), #ffffff;
  position: relative;
  border-bottom: 1px solid var(--color-gray-200);
}
.cs-single-breadcrumbs {
  display: flex;
  align-items: center;
  gap: 8px;
  font-size: 0.85rem;
  color: var(--color-text-muted);
  margin-bottom: 20px;
}
.cs-single-breadcrumbs a {
  color: var(--color-primary);
  text-decoration: none;
}
.cs-single-badge-row {
  display: flex;
  align-items: center;
  gap: 10px;
  flex-wrap: wrap;
  margin-bottom: 16px;
}
.cs-single-badge {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 4px 12px;
  border-radius: 9999px;
  font-size: 0.8rem;
  font-weight: 600;
  background: rgba(0, 80, 231, 0.08);
  color: var(--color-primary);
  border: 1px solid rgba(0, 80, 231, 0.2);
}
.cs-single-title {
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 800;
  line-height: 1.15;
  color: var(--color-text);
  margin-bottom: 18px;
  letter-spacing: -0.02em;
}
.cs-single-desc {
  font-size: 1.15rem;
  line-height: 1.6;
  color: var(--color-text-muted);
  max-width: 820px;
  margin-bottom: 30px;
}
.cs-single-stats-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
  gap: 18px;
  margin: 36px 0;
}
.cs-single-stat-card {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 14px;
  padding: 22px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
}
.cs-single-stat-num {
  font-size: 2.2rem;
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1;
  margin-bottom: 6px;
}
.cs-single-stat-num span {
  font-size: 1.4rem;
}
.cs-single-stat-lbl {
  font-size: 0.85rem;
  font-weight: 600;
  color: var(--color-text-muted);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}
.cs-single-media-wrap {
  margin: 40px 0 60px;
  border-radius: 20px;
  overflow: hidden;
  box-shadow: 0 20px 45px -15px rgba(15, 23, 42, 0.15);
  border: 1px solid var(--color-gray-200);
  background: #0a192f;
}
.cs-single-media-wrap img {
  width: 100%;
  height: auto;
  display: block;
}
.cs-single-content-grid {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 48px;
  margin-bottom: 80px;
}
@media (max-width: 900px) {
  .cs-single-content-grid {
    grid-template-columns: 1fr;
    gap: 36px;
  }
}
.cs-section-box {
  background: #ffffff;
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 36px;
  margin-bottom: 30px;
}
.cs-section-box h3 {
  font-size: 1.4rem;
  font-weight: 700;
  margin-bottom: 14px;
  color: var(--color-text);
}
.cs-section-box p {
  font-size: 1.02rem;
  line-height: 1.7;
  color: #4b5563;
  margin: 0;
}
.cs-sidebar-card {
  background: linear-gradient(160deg, #ffffff 0%, #f8fafc 100%);
  border: 1px solid var(--color-gray-200);
  border-radius: 16px;
  padding: 30px;
  margin-bottom: 24px;
  position: sticky;
  top: 100px;
}
.cs-meta-list {
  list-style: none;
  padding: 0;
  margin: 0 0 24px;
}
.cs-meta-list li {
  display: flex;
  justify-content: space-between;
  padding: 10px 0;
  border-bottom: 1px solid var(--color-gray-200);
  font-size: 0.9rem;
}
.cs-meta-list li:last-child {
  border-bottom: none;
}
.cs-meta-lbl {
  color: var(--color-text-muted);
  font-weight: 500;
}
.cs-meta-val {
  font-weight: 600;
  color: var(--color-text);
  text-align: right;
}
.cs-tech-tags {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-top: 12px;
}
.cs-tech-pill {
  font-size: 0.78rem;
  padding: 4px 10px;
  background: #f1f5f9;
  border-radius: 6px;
  color: #334155;
  font-weight: 600;
}
</style>
@endpush

@section('content')
<main id="main-content">

  <!-- 1. HERO SECTION -->
  <section class="cs-single-hero">
    <div class="container">
      
      <!-- Breadcrumbs -->
      <nav class="cs-single-breadcrumbs" aria-label="Breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        <a href="{{ route('customer-stories') }}">Customer Stories</a>
        <span>/</span>
        <span>{{ $story->client_name }}</span>
      </nav>

      <!-- Badge Row -->
      <div class="cs-single-badge-row">
        @if(!empty($story->industry))
          <span class="cs-single-badge">{{ $story->industry }}</span>
        @endif
        @if(!empty($story->service_tag))
          <span class="cs-single-badge" style="background: rgba(16, 185, 129, 0.08); color: #047857; border-color: rgba(16, 185, 129, 0.25);">
            {{ $story->service_tag }}
          </span>
        @endif
        @if(!empty($story->status_badge))
          <span class="cs-single-badge" style="background: rgba(29, 78, 216, 0.08); color: #1d4ed8; border-color: rgba(29, 78, 216, 0.25);">
            {{ $story->status_badge }}
          </span>
        @endif
      </div>

      <h1 class="cs-single-title">{{ $story->title }}</h1>
      <p class="cs-single-desc">{{ $story->excerpt }}</p>

      <!-- Key Metrics Row -->
      @if(!empty($story->featured_stats) && is_array($story->featured_stats))
      <div class="cs-single-stats-grid">
        @foreach($story->featured_stats as $stat)
        <div class="cs-single-stat-card">
          <div class="cs-single-stat-num">{{ $stat['num'] ?? '' }}<span>{{ $stat['suffix'] ?? '' }}</span></div>
          <div class="cs-single-stat-lbl">{{ $stat['label'] ?? '' }}</div>
        </div>
        @endforeach
      </div>
      @endif

      <!-- Visual Media Showcase -->
      <div class="cs-single-media-wrap">
        <img src="{{ asset($story->hero_image) }}?v=3" alt="{{ $story->client_name }} Visual Showcase" loading="lazy">
      </div>

      <!-- Main Content Grid -->
      <div class="cs-single-content-grid">
        
        <!-- Left: Case Study Breakdown -->
        <div>
          @if(!empty($story->challenge))
          <div class="cs-section-box">
            <h3>The Challenge</h3>
            <p>{{ $story->challenge }}</p>
          </div>
          @endif

          @if(!empty($story->solution))
          <div class="cs-section-box">
            <h3>Our Engineering Solution</h3>
            <p>{{ $story->solution }}</p>
          </div>
          @endif

          @if(!empty($story->results))
          <div class="cs-section-box">
            <h3>Measurable Business Results</h3>
            <p>{{ $story->results }}</p>
          </div>
          @endif

          @if(!empty($story->content))
          <div class="cs-section-box" style="line-height: 1.8;">
            {!! $story->content !!}
          </div>
          @endif

          @if(!empty($story->testimonial_quote))
          <div class="cs-section-box" style="background: linear-gradient(135deg, rgba(0, 80, 231, 0.04) 0%, rgba(56, 189, 248, 0.04) 100%); border-left: 4px solid var(--color-primary);">
            <blockquote style="font-size: 1.15rem; font-style: italic; color: var(--color-text); margin: 0 0 14px;">
              "{{ $story->testimonial_quote }}"
            </blockquote>
            <p style="font-weight: 700; color: var(--color-text); margin: 0;">
              {{ $story->testimonial_author ?? '' }}
              @if(!empty($story->testimonial_role))
                <span style="font-weight: 400; color: var(--color-text-muted);"> — {{ $story->testimonial_role }}</span>
              @endif
            </p>
          </div>
          @endif
        </div>

        <!-- Right: Project Snapshot Sidebar -->
        <div>
          <div class="cs-sidebar-card">
            <h4 style="font-size: 1.1rem; font-weight: 700; margin-bottom: 18px;">Project Snapshot</h4>
            <ul class="cs-meta-list">
              <li>
                <span class="cs-meta-lbl">Client</span>
                <span class="cs-meta-val">{{ $story->client_name }}</span>
              </li>
              <li>
                <span class="cs-meta-lbl">Industry</span>
                <span class="cs-meta-val">{{ $story->industry }}</span>
              </li>
              <li>
                <span class="cs-meta-lbl">Engagement</span>
                <span class="cs-meta-val">{{ $story->service_tag }}</span>
              </li>
              @if(!empty($story->project_url))
              <li>
                <span class="cs-meta-lbl">Website</span>
                <span class="cs-meta-val">
                  <a href="{{ $story->project_url }}" target="_blank" rel="noopener noreferrer" style="color: var(--color-primary); text-decoration: underline;">
                    {{ $story->project_url_label ?? 'Visit Link' }} &nearr;
                  </a>
                </span>
              </li>
              @endif
            </ul>

            @if(!empty($story->technologies) && is_array($story->technologies))
            <div>
              <span style="font-size: 0.85rem; font-weight: 600; color: var(--color-text-muted); text-transform: uppercase; letter-spacing: 0.05em;">Tech Stack</span>
              <div class="cs-tech-tags">
                @foreach($story->technologies as $tech)
                  <span class="cs-tech-pill">{{ $tech }}</span>
                @endforeach
              </div>
            </div>
            @endif

            <div style="margin-top: 28px; padding-top: 20px; border-top: 1px solid var(--color-gray-200);">
              <a href="{{ route('contact') }}" class="c-btn -primary" style="width: 100%; justify-content: center; text-align: center; padding: 12px 20px;">
                <span class="c-btn__txt">Start Similar Project</span>
              </a>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

</main>
@endsection
