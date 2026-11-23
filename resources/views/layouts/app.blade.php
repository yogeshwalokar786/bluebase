@php
  $currentRoute = request()->route()?->getName() ?? 'home';
  $seo = rescue(fn() => cache()->remember("page_seo_{$currentRoute}", 3600, fn() => \App\Models\PageSeo::forRoute($currentRoute)), null);
  $globalSettings = rescue(fn() => cache()->remember('global_site_settings', 3600, fn() => \App\Models\SiteSetting::all()->pluck('value', 'key')), collect());

  $rawTitle = (string) $__env->yieldContent('title', $seo->meta_title ?? $globalSettings['seo_default_title'] ?? 'Web & Mobile App Development Company India | Bluebase');
  $pageTitle = htmlspecialchars(html_entity_decode(html_entity_decode($rawTitle, ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES | ENT_HTML5, 'UTF-8');

  $rawDescription = (string) $__env->yieldContent('meta_description', $seo->meta_description ?? $globalSettings['seo_default_description'] ?? 'Bluebase Technologies builds custom web applications, SaaS MVPs, and mobile apps for ambitious businesses in India. Get a free proposal today.');
  $pageDescription = htmlspecialchars(html_entity_decode(html_entity_decode($rawDescription, ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES | ENT_HTML5, 'UTF-8'), ENT_QUOTES | ENT_HTML5, 'UTF-8');
  $pageKeywords = $__env->yieldContent('meta_keywords', $seo->meta_keywords ?? $globalSettings['seo_default_keywords'] ?? 'custom software development company india, web development company india, mobile app development india, saas development india, website design company, it services india, bluebase technologies');
  $canonicalUrl = $__env->yieldContent('canonical_url', $seo->canonical_url ?? url()->current());
  $ogImage = $__env->yieldContent('og_image', $seo->og_image ?? $globalSettings['seo_default_og_image'] ?? 'images/bluebase-og-cover.jpg');
  $twitterHandle = $globalSettings['seo_twitter_handle'] ?? '@bluebase_tech';
  $robotsTag = $__env->yieldContent('robots', $seo->robots ?? $globalSettings['seo_robots'] ?? 'index, follow');
  $googleVerification = $globalSettings['seo_google_verification'] ?? null;
  $bingVerification = $globalSettings['seo_bing_verification'] ?? null;
  $pinterestVerification = $globalSettings['seo_pinterest_verification'] ?? null;

  // Master Tracking Switch
  $trackingActive = ($globalSettings['tracking_scripts_enabled'] ?? '1') !== '0';

  // Major Pixels & Analytics Tags
  $gtmId = $globalSettings['analytics_gtm_id'] ?? null;
  $gtmActive = $trackingActive && ($globalSettings['analytics_gtm_enabled'] ?? '1') !== '0' && !empty($gtmId);

  $ga4Id = $globalSettings['analytics_ga4_id'] ?? null;
  $ga4Active = $trackingActive && ($globalSettings['analytics_ga4_enabled'] ?? '1') !== '0' && !empty($ga4Id);

  $pixelId = $globalSettings['analytics_meta_pixel_id'] ?? null;
  $pixelActive = $trackingActive && ($globalSettings['analytics_meta_pixel_enabled'] ?? '1') !== '0' && !empty($pixelId);

  $clarityId = $globalSettings['analytics_clarity_id'] ?? null;
  $clarityActive = $trackingActive && ($globalSettings['analytics_clarity_enabled'] ?? '1') !== '0' && !empty($clarityId);

  // Precision Placement Zones
  $customHeadScripts = $trackingActive ? ($globalSettings['custom_head_scripts'] ?? $globalSettings['seo_header_scripts'] ?? null) : null;
  $customBodyOpenScripts = $trackingActive ? ($globalSettings['custom_body_open_scripts'] ?? null) : null;
  $customFooterScripts = $trackingActive ? ($globalSettings['custom_footer_scripts'] ?? $globalSettings['seo_footer_scripts'] ?? null) : null;
  $customGlobalCss = $globalSettings['custom_global_css'] ?? null;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#0a192f">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Primary Meta SEO -->
  <title>{!! $pageTitle !!}</title>
  <meta name="description" content="{!! $pageDescription !!}">
  @if($pageKeywords)
    <meta name="keywords" content="{{ $pageKeywords }}">
  @endif
  <meta name="robots" content="{{ $robotsTag }}">
  <link rel="canonical" href="{{ $canonicalUrl }}">

  <!-- OpenGraph Social Sharing (LinkedIn, Facebook, Slack, WhatsApp) -->
  <meta property="og:type" content="website">
  <meta property="og:locale" content="en_US">
  <meta property="og:title" content="{!! $pageTitle !!}">
  <meta property="og:description" content="{!! $pageDescription !!}">
  <meta property="og:url" content="{{ $canonicalUrl }}">
  <meta property="og:site_name" content="{{ $globalSettings['site_name'] ?? 'Bluebase Technologies' }}">
  @if($ogImage)
    <meta property="og:image" content="{{ str_starts_with($ogImage, 'http') ? $ogImage : asset($ogImage) }}">
    <meta property="og:image:secure_url" content="{{ str_starts_with($ogImage, 'http') ? $ogImage : asset($ogImage) }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="{!! $pageTitle !!}">
  @endif

  <!-- Twitter / X Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="{!! $pageTitle !!}">
  <meta name="twitter:description" content="{!! $pageDescription !!}">
  @if($twitterHandle)
    <meta name="twitter:site" content="{{ $twitterHandle }}">
    <meta name="twitter:creator" content="{{ $twitterHandle }}">
  @endif
  @if($ogImage)
    <meta name="twitter:image" content="{{ str_starts_with($ogImage, 'http') ? $ogImage : asset($ogImage) }}">
    <meta name="twitter:image:alt" content="{!! $pageTitle !!}">
  @endif

  <!-- Regional Geo Tags (India Target & Global Delivery) -->
  <meta name="geo.region" content="IN">
  <meta name="geo.placename" content="India">
  <meta name="geo.position" content="20.5937;78.9629">
  <meta name="ICBM" content="20.5937, 78.9629">

  <!-- Search Engine Verification -->
  @if($googleVerification)
    <meta name="google-site-verification" content="{{ $googleVerification }}">
  @endif
  @if($bingVerification)
    <meta name="msvalidate.01" content="{{ $bingVerification }}">
  @endif
  @if($pinterestVerification)
    <meta name="p:domain_verify" content="{{ $pinterestVerification }}">
  @endif

  <!-- Favicon & App Touch Icons -->
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo-icon.png') }}">

  <!-- Global Structured Data (Organization & WebSite Schema with Sitelinks Searchbox) -->
  <script type="application/ld+json">
  {
    "@@context": "https://schema.org",
    "@graph": [
      {
        "@type": "Organization",
        "@id": "https://bluebasetechnologies.com/#organization",
        "name": "Bluebase Technologies",
        "alternateName": ["Bluebase", "Bluebase Tech India"],
        "url": "https://bluebasetechnologies.com",
        "logo": {
          "@type": "ImageObject",
          "url": "https://bluebasetechnologies.com/images/logo-icon.png",
          "caption": "Bluebase Technologies Logo"
        },
        "image": "https://bluebasetechnologies.com/images/bluebase-og-cover.jpg",
        "description": "Leading custom software, web, and mobile app development company in India delivering bespoke websites, mobile apps, SaaS MVPs, and cloud engineering.",
        "email": "info@bluebasetechnologies.com",
        "telephone": "+91 79727 65119",
        "address": {
          "@type": "PostalAddress",
          "addressCountry": "IN"
        },
        "sameAs": [
          "https://linkedin.com/company/bluebase",
          "https://twitter.com/bluebase_tech",
          "https://github.com/bluebase-tech"
        ],
        "contactPoint": [
          {
            "@type": "ContactPoint",
            "contactType": "Sales & Inquiries",
            "email": "info@bluebasetechnologies.com",
            "telephone": "+91 79727 65119",
            "availableLanguage": ["English", "Hindi"]
          }
        ]
      },
      {
        "@type": "WebSite",
        "@id": "https://bluebasetechnologies.com/#website",
        "url": "https://bluebasetechnologies.com",
        "name": "Bluebase Technologies",
        "alternateName": ["Bluebase", "Bluebase Technologies India", "Bluebase Tech"],
        "description": "Leading Custom Software, Web & Mobile App Development Company in India",
        "publisher": {
          "@id": "https://bluebasetechnologies.com/#organization"
        },
        "inLanguage": "en-US",
        "potentialAction": {
          "@type": "SearchAction",
          "target": {
            "@type": "EntryPoint",
            "urlTemplate": "https://bluebasetechnologies.com/blog?search={search_term_string}"
          },
          "query-input": "required name=search_term_string"
        }
      }
    ]
  }
  </script>
  @stack('schema')

  <!-- High-Speed Asynchronous Web Fonts: Inter & Plus Jakarta Sans -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" media="print" onload="this.media='all'">
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap">
  </noscript>

  <!-- Core Stylesheet with Preload and Version Hash -->
  <link rel="preload" as="style" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}">
  @stack('styles')

  <!-- Custom Global CSS Injected via Admin -->
  @if($customGlobalCss)
    <style id="bluebase-custom-css">
      {!! $customGlobalCss !!}
    </style>
  @endif

  <!-- Google Tag Manager (Head) -->
  @if($gtmActive)
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','{{ $gtmId }}');</script>
  @endif

  <!-- Google Analytics 4 (GA4 gtag.js) -->
  @if($ga4Active)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $ga4Id }}"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '{{ $ga4Id }}');
    </script>
  @endif

  <!-- Meta (Facebook) Pixel Code (Head) -->
  @if($pixelActive)
    <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '{{ $pixelId }}');
      fbq('track', 'PageView');
    </script>
  @endif

  <!-- Microsoft Clarity -->
  @if($clarityActive)
    <script type="text/javascript">
      (function(c,l,a,r,i,t,y){
          c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
          t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
          y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
      })(window, document, "clarity", "script", "{{ $clarityId }}");
    </script>
  @endif

  <!-- Injected Custom Header Scripts -->
  @if($customHeadScripts)
    {!! $customHeadScripts !!}
  @endif
</head>

<body class="@yield('body_class', '')">
  <!-- Google Tag Manager (noscript body fallback) -->
  @if($gtmActive)
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ $gtmId }}"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  @endif

  <!-- Meta (Facebook) Pixel (noscript body fallback) -->
  @if($pixelActive)
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id={{ $pixelId }}&ev=PageView&noscript=1" alt="" /></noscript>
  @endif

  <!-- Injected Custom Body Open Scripts -->
  @if($customBodyOpenScripts)
    {!! $customBodyOpenScripts !!}
  @endif

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

  <!-- Core JavaScript (Non-Blocking Deferred) -->
  <script src="{{ asset('js/main.js') }}" defer></script>
  @stack('scripts')

  <!-- Injected Custom Footer Scripts -->
  @if($customFooterScripts)
    {!! $customFooterScripts !!}
  @endif
</body>

</html>