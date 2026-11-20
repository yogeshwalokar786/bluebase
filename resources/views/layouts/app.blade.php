@php
  $currentRoute = request()->route()?->getName() ?? 'home';
  $seo = \App\Models\PageSeo::forRoute($currentRoute);
  $globalSettings = \App\Models\SiteSetting::all()->pluck('value', 'key');

  $pageTitle = $__env->yieldContent('title', $seo->meta_title ?? $globalSettings['seo_default_title'] ?? 'Bluebase Technologies | Custom Web, Mobile App & Software Development');
  $pageDescription = $__env->yieldContent('meta_description', $seo->meta_description ?? $globalSettings['seo_default_description'] ?? 'Bluebase Technologies is a remote-first digital engineering studio building custom websites, web applications, mobile apps, SaaS MVPs, and business software.');
  $pageKeywords = $__env->yieldContent('meta_keywords', $seo->meta_keywords ?? $globalSettings['seo_default_keywords'] ?? 'web development, custom software, mobile app development, website design, saas development, ecommerce stores, bluebase technologies');
  $canonicalUrl = $__env->yieldContent('canonical_url', $seo->canonical_url ?? url()->current());
  $ogImage = $__env->yieldContent('og_image', $seo->og_image ?? $globalSettings['seo_default_og_image'] ?? 'images/blogs/social-media-vs-owned-website.jpg');
  $twitterHandle = $globalSettings['seo_twitter_handle'] ?? '@bluebase_tech';
  $robotsTag = $__env->yieldContent('robots', $seo->robots ?? $globalSettings['seo_robots'] ?? 'index, follow');
  $googleVerification = $globalSettings['seo_google_verification'] ?? null;
  $headerScripts = $globalSettings['seo_header_scripts'] ?? null;
  $footerScripts = $globalSettings['seo_footer_scripts'] ?? null;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#0a192f">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Primary Meta SEO -->
  <title>{{ $pageTitle }}</title>
  <meta name="description" content="{{ $pageDescription }}">
  @if($pageKeywords)
    <meta name="keywords" content="{{ $pageKeywords }}">
  @endif
  <meta name="robots" content="{{ $robotsTag }}">
  <link rel="canonical" href="{{ $canonicalUrl }}">

  <!-- OpenGraph Social Sharing (LinkedIn, Facebook, Slack) -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">
  <meta property="og:title" content="{{ $pageTitle }}">
  <meta property="og:description" content="{{ $pageDescription }}">
  <meta property="og:url" content="{{ $canonicalUrl }}">
  <meta property="og:site_name" content="{{ $globalSettings['site_name'] ?? 'Bluebase Technologies' }}">
  @if($ogImage)
    <meta property="og:image" content="{{ asset($ogImage) }}">
  @endif

  <!-- Twitter / X Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{{ $pageTitle }}">
  <meta name="twitter:description" content="{{ $pageDescription }}">
  @if($twitterHandle)
    <meta name="twitter:site" content="{{ $twitterHandle }}">
  @endif
  @if($ogImage)
    <meta name="twitter:image" content="{{ asset($ogImage) }}">
  @endif

  <!-- Search Engine Verification -->
  @if($googleVerification)
    <meta name="google-site-verification" content="{{ $googleVerification }}">
  @endif

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

  <!-- Global Structured Data (Organization & WebSite Schema) -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "https://bluebasetechnologies.com/#organization",
        "name": "Bluebase Technologies",
        "url": "https://bluebasetechnologies.com",
        "logo": {
          "@type": "ImageObject",
          "url": "https://bluebasetechnologies.com/images/favicon.ico",
          "caption": "Bluebase Technologies"
        },
        "description": "Bluebase Technologies is a remote-first digital engineering studio delivering custom websites, web applications, mobile apps, SaaS MVPs, and business software.",
        "email": "info@bluebasetechnologies.com",
        "sameAs": [
          "https://linkedin.com/company/bluebase",
          "https://twitter.com/bluebase_tech",
          "https://github.com/bluebase-tech"
        ],
        "contactPoint": {
          "@type": "ContactPoint",
          "contactType": "Customer Support",
          "email": "info@bluebasetechnologies.com"
        }
      },
      {
        "@type": "WebSite",
        "@id": "https://bluebasetechnologies.com/#website",
        "url": "https://bluebasetechnologies.com",
        "name": "Bluebase Technologies",
        "publisher": {
          "@id": "https://bluebasetechnologies.com/#organization"
        },
        "inLanguage": "en-US"
      }
    ]
  }
  </script>
  @stack('schema')

  <!-- Google Fonts: Inter & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
    rel="stylesheet">

  <!-- Core Stylesheet with Cache Busting -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}">
  @stack('styles')

  <!-- Injected Custom Header Scripts (e.g. Analytics / GTM) -->
  @if($headerScripts)
    {!! $headerScripts !!}
  @endif
</head>

<body class="@yield('body_class', '')">

  <!-- Site Navigation Header -->
  @include('partials.header')

  <!-- Flash Notification Messages -->
  @include('partials.flash')

  <!-- Main Content Wrapper -->
  <main id="main-content">
    @yield('content')
  </main>

  <!-- Site Footer -->
  @include('partials.footer')

  <!-- Floating Back to Top Button -->
  <button class="back-to-top" id="backToTop" aria-label="Back to Top">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
      stroke-linejoin="round">
      <polyline points="18 15 12 9 6 15"></polyline>
    </svg>
  </button>

  <!-- Core JavaScript -->
  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')

  <!-- Injected Custom Footer Scripts -->
  @if($footerScripts)
    {!! $footerScripts !!}
  @endif
</body>

</html>