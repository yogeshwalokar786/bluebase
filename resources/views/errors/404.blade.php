@extends('layouts.app')

@section('title', 'Page Not Found - 404 | Bluebase Technologies')
@section('meta_description', 'The page you requested could not be found. Explore our custom software engineering services, case studies, or contact our engineering team.')
@section('robots', 'noindex, follow')

@section('content')
<main id="main-content" style="background-color: var(--color-primary, #0a192f); min-height: 80vh; display: flex; align-items: center; padding: 120px 0 80px;">
  <div class="container" style="max-width: 960px; margin: 0 auto; text-align: center; position: relative;">
    
    <!-- Subtle Background Glow -->
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 480px; height: 480px; background: radial-gradient(circle, rgba(37, 99, 235, 0.18) 0%, rgba(10, 25, 47, 0) 70%); pointer-events: none; z-index: 0;"></div>

    <div style="position: relative; z-index: 1;">
      <!-- Status Badge -->
      <div style="display: inline-flex; align-items: center; gap: 8px; padding: 6px 16px; border-radius: 9999px; background: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.25); color: #38bdf8; font-size: 0.85rem; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 24px;">
        <span style="width: 8px; height: 8px; border-radius: 50%; background: #38bdf8;"></span>
        Error 404 &bull; Page Not Found
      </div>

      <!-- Large Gradient 404 Display -->
      <h1 style="font-size: clamp(5rem, 14vw, 9.5rem); font-weight: 800; line-height: 1; margin: 0 0 16px; font-family: 'Plus Jakarta Sans', sans-serif; letter-spacing: -0.04em; background: linear-gradient(135deg, #ffffff 20%, #38bdf8 60%, #2563eb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);">
        404
      </h1>

      <!-- Main Heading -->
      <h2 style="font-size: clamp(1.6rem, 3.5vw, 2.3rem); font-weight: 700; color: #ffffff; margin: 0 0 16px; line-height: 1.25;">
        Looks like you took an unexpected detour
      </h2>

      <!-- Description -->
      <p style="font-size: 1.1rem; color: #94a3b8; max-width: 600px; margin: 0 auto 36px; line-height: 1.65;">
        The page you are looking for may have been moved, renamed, or is temporarily unavailable. Let us help you get back on track.
      </p>

      <!-- Action Buttons -->
      <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap; margin-bottom: 50px;">
        <a href="{{ route('home') }}" class="c-btn -primary" style="padding: 14px 30px; font-size: 1rem;">
          <span class="c-btn__txt">Back to Homepage</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
        <a href="{{ route('contact') }}" class="c-btn -outline-white" style="padding: 14px 30px; font-size: 1rem;">
          <span class="c-btn__txt">Contact Engineering Team</span>
          <span class="c-btn__ico">
            <span class="c-btn__ico-base"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
            <span class="c-btn__ico-hover"><svg viewBox="0 0 16 16"><path d="M4 12L12 4M12 4H6M12 4V10"/></svg></span>
          </span>
        </a>
      </div>

      <!-- Quick Helpful Links Grid -->
      <div style="border-top: 1px solid rgba(255, 255, 255, 0.08); padding-top: 40px; text-align: left;">
        <p style="text-align: center; color: #64748b; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600; margin-bottom: 24px;">
          Popular Destinations
        </p>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
          
          <a href="{{ route('services.web-development') }}" style="display: block; padding: 20px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; text-decoration: none; transition: all 0.25s ease;" onmouseover="this.style.borderColor='rgba(56, 189, 248, 0.4)'; this.style.background='rgba(56, 189, 248, 0.06)';" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.08)'; this.style.background='rgba(255, 255, 255, 0.03)';">
            <div style="font-weight: 600; color: #ffffff; font-size: 1rem; margin-bottom: 6px;">Web Development</div>
            <div style="font-size: 0.85rem; color: #94a3b8; line-height: 1.4;">Custom platforms, scalable portals, and enterprise web solutions.</div>
          </a>

          <a href="{{ route('services.mobile-app-development') }}" style="display: block; padding: 20px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; text-decoration: none; transition: all 0.25s ease;" onmouseover="this.style.borderColor='rgba(56, 189, 248, 0.4)'; this.style.background='rgba(56, 189, 248, 0.06)';" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.08)'; this.style.background='rgba(255, 255, 255, 0.03)';">
            <div style="font-weight: 600; color: #ffffff; font-size: 1rem; margin-bottom: 6px;">Mobile Apps</div>
            <div style="font-size: 0.85rem; color: #94a3b8; line-height: 1.4;">High-performance iOS and Android native and cross-platform apps.</div>
          </a>

          <a href="{{ route('customer-stories') }}" style="display: block; padding: 20px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; text-decoration: none; transition: all 0.25s ease;" onmouseover="this.style.borderColor='rgba(56, 189, 248, 0.4)'; this.style.background='rgba(56, 189, 248, 0.06)';" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.08)'; this.style.background='rgba(255, 255, 255, 0.03)';">
            <div style="font-weight: 600; color: #ffffff; font-size: 1rem; margin-bottom: 6px;">Case Studies</div>
            <div style="font-size: 0.85rem; color: #94a3b8; line-height: 1.4;">Real-world client software engineering and delivery outcomes.</div>
          </a>

          <a href="{{ route('blog') }}" style="display: block; padding: 20px; background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.08); border-radius: 12px; text-decoration: none; transition: all 0.25s ease;" onmouseover="this.style.borderColor='rgba(56, 189, 248, 0.4)'; this.style.background='rgba(56, 189, 248, 0.06)';" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.08)'; this.style.background='rgba(255, 255, 255, 0.03)';">
            <div style="font-weight: 600; color: #ffffff; font-size: 1rem; margin-bottom: 6px;">Tech Insights</div>
            <div style="font-size: 0.85rem; color: #94a3b8; line-height: 1.4;">Engineering articles, software guides, and architectural practices.</div>
          </a>

        </div>
      </div>

    </div>
  </div>
</main>
@endsection
