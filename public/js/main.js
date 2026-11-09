/**
  * Features:
 * - Viewport Scroll Observer (Staggered Reveals & Fade-Scale)
 * - Sticky Header with blur on scroll
 * - Floating Back-to-Top Button
 * - Mobile Menu Drawer & Submenu Accordions
 * - Pure JavaScript Animated Counters (73%, 61%, 4X, 300+)
 * - Built Inside SAP Sticky Split Cards Active Highlighting
 * - Interactive Platform Architecture Graph
 * - Customer Stories Interactive Smooth Carousel (Touch, Dots, Auto-play)
 * - Insights Tabs Switcher
 * - FAQ Smooth Animated Accordion (+ rotates to x)
 * - Smooth In-Page Anchor Scrolling
 */

document.addEventListener('DOMContentLoaded', () => {

  // ==========================================================================
  // 1. VIEWPORT SCROLL ANIMATIONS (Staggered Reveals & Scale Reveals)
  // ==========================================================================
  const viewportElements = document.querySelectorAll('[data-viewport="true"], [data-animation="fade-scale"]');
  
  if ('IntersectionObserver' in window && viewportElements.length > 0) {
    const viewportObserver = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-viewport');
          // Once revealed, unobserve to maintain high scroll performance
          observer.unobserve(entry.target);
        }
      });
    }, {
      rootMargin: '0px 0px -40px 0px',
      threshold: 0.12
    });

    viewportElements.forEach(el => viewportObserver.observe(el));
  } else {
    // Fallback for older browsers
    viewportElements.forEach(el => el.classList.add('in-viewport'));
  }

  // ==========================================================================
  // 2. STICKY HEADER & FLOATING BACK-TO-TOP BUTTON
  // ==========================================================================
  const header = document.querySelector('.site-header');
  const backToTopBtn = document.getElementById('backToTop');

  const handleWindowScroll = () => {
    const scrollPos = window.scrollY;

    // Header blur & height transition
    if (header) {
      if (scrollPos > 40) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }

    // Back-to-top visibility
    if (backToTopBtn) {
      if (scrollPos > 420) {
        backToTopBtn.classList.add('visible');
      } else {
        backToTopBtn.classList.remove('visible');
      }
    }
  };

  window.addEventListener('scroll', handleWindowScroll, { passive: true });
  handleWindowScroll();

  if (backToTopBtn) {
    backToTopBtn.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }

  // ==========================================================================
  // 3. MOBILE MENU DRAWER & ACCORDIONS
  // ==========================================================================
  const mobileToggle = document.querySelector('.mobile-toggle');
  const mobileDrawer = document.querySelector('.mobile-nav-drawer');
  const mobileOverlay = document.querySelector('.mobile-overlay');

  const toggleMobileMenu = () => {
    const isOpen = mobileDrawer && mobileDrawer.classList.contains('open');
    if (isOpen) {
      mobileDrawer.classList.remove('open');
      if (mobileToggle) mobileToggle.classList.remove('active');
      if (mobileOverlay) mobileOverlay.classList.remove('active');
      document.body.style.overflow = '';
    } else {
      if (mobileDrawer) mobileDrawer.classList.add('open');
      if (mobileToggle) mobileToggle.classList.add('active');
      if (mobileOverlay) mobileOverlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    }
  };

  if (mobileToggle && mobileDrawer && mobileOverlay) {
    mobileToggle.addEventListener('click', toggleMobileMenu);
    mobileOverlay.addEventListener('click', toggleMobileMenu);
  }

  // Mobile submenu accordion
  const mobileMenuTitles = document.querySelectorAll('.mobile-menu-title');
  mobileMenuTitles.forEach(btn => {
    btn.addEventListener('click', () => {
      const parent = btn.parentElement;
      const submenu = parent.querySelector('.mobile-submenu');
      if (submenu) {
        submenu.classList.toggle('open');
        const icon = btn.querySelector('svg');
        if (icon) {
          icon.style.transform = submenu.classList.contains('open') ? 'rotate(180deg)' : 'rotate(0deg)';
        }
      }
    });
  });

  // ==========================================================================
  // 4. STATS & ANIMATED METRIC COUNTERS
  // ==========================================================================
  const counterElements = document.querySelectorAll('.stat-number-val');
  let countersAnimated = false;

  const animateCounters = () => {
    counterElements.forEach(el => {
      const target = parseInt(el.getAttribute('data-target'), 10);
      const duration = 1600; // ms
      const startTime = performance.now();

      const updateCounter = (currentTime) => {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        // Easing: easeOutQuad
        const easeProgress = 1 - (1 - progress) * (1 - progress);
        const currentVal = Math.floor(easeProgress * target);
        el.textContent = currentVal;

        if (progress < 1) {
          requestAnimationFrame(updateCounter);
        } else {
          el.textContent = target;
        }
      };

      requestAnimationFrame(updateCounter);
    });
  };

  const statsSection = document.querySelector('.research-section');
  if (statsSection && counterElements.length > 0) {
    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !countersAnimated) {
          countersAnimated = true;
          animateCounters();
        }
      });
    }, { threshold: 0.25 });

    statsObserver.observe(statsSection);
  }

  // ==========================================================================
  // 5. BUILT INSIDE SAP (STICKY FEATURES SCROLL HIGHLIGHTING)
  // ==========================================================================
  const featureCards = document.querySelectorAll('.feature-scroll-card');
  if (featureCards.length > 0 && 'IntersectionObserver' in window) {
    const cardObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('active-card');
        } else {
          entry.target.classList.remove('active-card');
        }
      });
    }, {
      rootMargin: '-20% 0px -40% 0px',
      threshold: 0.2
    });

    featureCards.forEach(card => cardObserver.observe(card));
  }

  // ==========================================================================
  // 6. INTERACTIVE ARCHITECTURE GRAPH & HIGH-Smooth PERIMETER LASER BEAM
  // ==========================================================================
  const archCanvas = document.querySelector('.system-arch-beam-canvas');
  const archTier = document.querySelector('.system-arch-tier.-neptune');

  if (archCanvas && archTier) {
    const ctx = archCanvas.getContext('2d');
    let isVisible = true;
    let animId = null;
    let startTime = performance.now();
    const duration = 6000; // 6.0 seconds per complete perimeter loop (exact match to video)
    const trailLength = 160; // 160px glowing laser trail

    // Mathematical perimeter tracking for rounded rectangle
    function getPerimeterPoint(dist, w, h, r) {
      const topLen = w - 2 * r;
      const rightLen = h - 2 * r;
      const botLen = topLen;
      const leftLen = rightLen;
      const arcLen = 0.5 * Math.PI * r;
      const total = 2 * topLen + 2 * rightLen + 4 * arcLen;

      let d = ((dist % total) + total) % total;

      // Top straight (left to right)
      if (d <= topLen) {
        return { x: r + d, y: 0 };
      }
      d -= topLen;

      // Top-right arc
      if (d <= arcLen) {
        const a = -Math.PI / 2 + (d / arcLen) * (Math.PI / 2);
        return { x: w - r + Math.cos(a) * r, y: r + Math.sin(a) * r };
      }
      d -= arcLen;

      // Right straight (top to bottom)
      if (d <= rightLen) {
        return { x: w, y: r + d };
      }
      d -= rightLen;

      // Bottom-right arc
      if (d <= arcLen) {
        const a = 0 + (d / arcLen) * (Math.PI / 2);
        return { x: w - r + Math.cos(a) * r, y: h - r + Math.sin(a) * r };
      }
      d -= arcLen;

      // Bottom straight (right to left)
      if (d <= botLen) {
        return { x: w - r - d, y: h };
      }
      d -= botLen;

      // Bottom-left arc
      if (d <= arcLen) {
        const a = Math.PI / 2 + (d / arcLen) * (Math.PI / 2);
        return { x: r + Math.cos(a) * r, y: h - r + Math.sin(a) * r };
      }
      d -= arcLen;

      // Left straight (bottom to top)
      if (d <= leftLen) {
        return { x: 0, y: h - r - d };
      }
      d -= leftLen;

      // Top-left arc
      const a = Math.PI + (d / arcLen) * (Math.PI / 2);
      return { x: r + Math.cos(a) * r, y: r + Math.sin(a) * r };
    }

    function resizeCanvas() {
      const rect = archTier.getBoundingClientRect();
      const dpr = Math.min(window.devicePixelRatio || 1, 2);
      archCanvas.width = (rect.width + 4) * dpr;
      archCanvas.height = (rect.height + 4) * dpr;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    }

    window.addEventListener('resize', resizeCanvas, { passive: true });
    resizeCanvas();

    function drawBeam(now) {
      if (!isVisible) return;

      const rect = archTier.getBoundingClientRect();
      const w = rect.width;
      const h = rect.height;
      const r = 12;
      const offset = 2; // +2px offset for centered border tracking

      ctx.clearRect(0, 0, w + 4, h + 4);

      const elapsed = (now - startTime) % duration;
      const progress = elapsed / duration;

      const topLen = w - 2 * r;
      const rightLen = h - 2 * r;
      const arcLen = 0.5 * Math.PI * r;
      const total = 2 * topLen + 2 * rightLen + 4 * arcLen;
      const headDist = progress * total;

      // 1. Outer luminous electric blue glow trail (160px)
      const outerSteps = 30;
      for (let i = 0; i < outerSteps; i++) {
        const t0 = i / outerSteps;
        const t1 = (i + 1) / outerSteps;
        const d0 = headDist - trailLength * (1 - t0);
        const d1 = headDist - trailLength * (1 - t1);

        const p0 = getPerimeterPoint(d0, w, h, r);
        const p1 = getPerimeterPoint(d1, w, h, r);

        ctx.beginPath();
        ctx.moveTo(p0.x + offset, p0.y + offset);
        ctx.lineTo(p1.x + offset, p1.y + offset);

        const alpha = Math.pow(t1, 1.8);
        ctx.strokeStyle = `rgba(0, 80, 231, ${alpha * 0.95})`;
        ctx.lineWidth = 2.5 + t1 * 1.5;
        ctx.lineCap = 'round';
        ctx.shadowColor = '#0050E7';
        ctx.shadowBlur = 10 * t1;
        ctx.stroke();
      }

      // 2. Inner high-intensity cyan/blue beam core (65px)
      const coreSteps = 16;
      const coreLength = 65;
      for (let i = 0; i < coreSteps; i++) {
        const t0 = i / coreSteps;
        const t1 = (i + 1) / coreSteps;
        const d0 = headDist - coreLength * (1 - t0);
        const d1 = headDist - coreLength * (1 - t1);

        const p0 = getPerimeterPoint(d0, w, h, r);
        const p1 = getPerimeterPoint(d1, w, h, r);

        ctx.beginPath();
        ctx.moveTo(p0.x + offset, p0.y + offset);
        ctx.lineTo(p1.x + offset, p1.y + offset);

        const alpha = Math.pow(t1, 1.5);
        ctx.strokeStyle = `rgba(96, 165, 250, ${alpha * 0.98})`;
        ctx.lineWidth = 2 + t1 * 1.2;
        ctx.lineCap = 'round';
        ctx.shadowColor = '#3B82F6';
        ctx.shadowBlur = 6 * t1;
        ctx.stroke();
      }

      // 3. Leading blazing white laser tip
      const head = getPerimeterPoint(headDist, w, h, r);
      ctx.beginPath();
      ctx.arc(head.x + offset, head.y + offset, 2.8, 0, 2 * Math.PI);
      ctx.fillStyle = '#ffffff';
      ctx.shadowColor = '#ffffff';
      ctx.shadowBlur = 12;
      ctx.fill();

      animId = requestAnimationFrame(drawBeam);
    }

    // Performance optimization: Pause loop when scrolled out of view
    if ('IntersectionObserver' in window) {
      const beamObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            if (!isVisible) {
              isVisible = true;
              startTime = performance.now();
              animId = requestAnimationFrame(drawBeam);
            }
          } else {
            isVisible = false;
            if (animId) cancelAnimationFrame(animId);
          }
        });
      }, { threshold: 0.05 });

      beamObserver.observe(archTier);
    }

    animId = requestAnimationFrame(drawBeam);
  }

  // ==========================================================================
  // 7. CUSTOMER STORIES CAROUSEL
  // ==========================================================================
  const sliderTrack = document.querySelector('.slider-track');
  const slides = document.querySelectorAll('.story-slide');
  const prevBtn = document.querySelector('.slider-btn-prev');
  const nextBtn = document.querySelector('.slider-btn-next');
  const dotsContainer = document.querySelector('.slider-dots');

  if (sliderTrack && slides.length > 0) {
    let currentSlide = 0;
    const totalSlides = slides.length;
    let autoPlayInterval = null;

    // Create pagination dots
    if (dotsContainer) {
      dotsContainer.innerHTML = '';
      for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('div');
        dot.classList.add('slider-dot');
        if (i === 0) dot.classList.add('active');
        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
        dot.addEventListener('click', () => {
          goToSlide(i);
          resetAutoplay();
        });
        dotsContainer.appendChild(dot);
      }
    }

    const updateSlider = () => {
      sliderTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
      const dots = document.querySelectorAll('.slider-dot');
      dots.forEach((dot, idx) => {
        dot.classList.toggle('active', idx === currentSlide);
      });
    };

    const goToSlide = (idx) => {
      currentSlide = (idx + totalSlides) % totalSlides;
      updateSlider();
    };

    const nextSlide = () => goToSlide(currentSlide + 1);
    const prevSlide = () => goToSlide(currentSlide - 1);

    if (prevBtn) prevBtn.addEventListener('click', () => { prevSlide(); resetAutoplay(); });
    if (nextBtn) nextBtn.addEventListener('click', () => { nextSlide(); resetAutoplay(); });

    // Touch Swipe Support for Mobile & Tablets
    let startX = 0;
    let endX = 0;
    sliderTrack.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
    }, { passive: true });

    sliderTrack.addEventListener('touchend', (e) => {
      endX = e.changedTouches[0].clientX;
      const diff = startX - endX;
      if (Math.abs(diff) > 45) {
        if (diff > 0) nextSlide();
        else prevSlide();
        resetAutoplay();
      }
    }, { passive: true });

    // Autoplay
    const startAutoplay = () => {
      autoPlayInterval = setInterval(nextSlide, 7500);
    };

    const resetAutoplay = () => {
      clearInterval(autoPlayInterval);
      startAutoplay();
    };

    const sliderWrap = document.querySelector('.slider-container');
    if (sliderWrap) {
      sliderWrap.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
      sliderWrap.addEventListener('mouseleave', startAutoplay);
    }

    startAutoplay();
  }

  // ==========================================================================
  // 8. INSIGHTS TABS SWITCHER
  // ==========================================================================
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabPanels = document.querySelectorAll('.tab-panel');

  tabButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      const targetTab = btn.getAttribute('data-tab');

      tabButtons.forEach(b => b.classList.remove('active'));
      tabPanels.forEach(p => p.classList.remove('active'));

      btn.classList.add('active');
      const panel = document.getElementById(targetTab);
      if (panel) {
        panel.classList.add('active');
        // Trigger reveal for any cards inside newly activated panel
        const panelCards = panel.querySelectorAll('[data-viewport="true"]');
        panelCards.forEach(c => c.classList.add('in-viewport'));
      }
    });
  });

  // ==========================================================================
  // 9. FAQ SMOOTH ACCORDION
  // ==========================================================================
  const accordionItems = document.querySelectorAll('.accordion-item');

  accordionItems.forEach(item => {
    const trigger = item.querySelector('.accordion-trigger');
    const content = item.querySelector('.accordion-content');

    // Open first item by default
    if (item.classList.contains('open') && content) {
      content.style.maxHeight = content.scrollHeight + 'px';
      trigger.setAttribute('aria-expanded', 'true');
    }

    trigger.addEventListener('click', () => {
      const isOpen = item.classList.contains('open');

      // Close other items for single-open behavior
      accordionItems.forEach(otherItem => {
        if (otherItem !== item) {
          otherItem.classList.remove('open');
          const otherTrigger = otherItem.querySelector('.accordion-trigger');
          const otherContent = otherItem.querySelector('.accordion-content');
          if (otherContent) otherContent.style.maxHeight = null;
          if (otherTrigger) otherTrigger.setAttribute('aria-expanded', 'false');
        }
      });

      // Toggle clicked item
      if (!isOpen) {
        item.classList.add('open');
        content.style.maxHeight = content.scrollHeight + 'px';
        trigger.setAttribute('aria-expanded', 'true');
      } else {
        item.classList.remove('open');
        content.style.maxHeight = null;
        trigger.setAttribute('aria-expanded', 'false');
      }
    });
  });

  // ==========================================================================
  // 10. SMOOTH IN-PAGE ANCHOR NAVIGATION
  // ==========================================================================
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      const targetId = this.getAttribute('href');
      if (targetId && targetId !== '#' && targetId.length > 1) {
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
          e.preventDefault();
          targetElement.scrollIntoView({ behavior: 'smooth' });
          // If mobile menu was open, close it cleanly
          if (mobileDrawer && mobileDrawer.classList.contains('open')) {
            toggleMobileMenu();
          }
        }
      }
    });
  });

});


// ==========================================================================
// 11. SITE PRELOADER: GANESHA IDOL OUTLINE TRANSITION & DISMISSAL
// ==========================================================================
(() => {
  const preloader = document.getElementById('site-preloader');
  if (!preloader) return;

  const minAnimationTime = 1400; // Time in ms to appreciate the sacred outline draw
  const initTimestamp = performance.now();
  let hasDismissed = false;

  const dismissPreloader = () => {
    if (hasDismissed) return;
    hasDismissed = true;

    const timeElapsed = performance.now() - initTimestamp;
    const remainingTime = Math.max(0, minAnimationTime - timeElapsed);

    setTimeout(() => {
      preloader.classList.add('loaded');
      document.body.classList.add('preloader-done');

      // Remove after transition finishes to free GPU and DOM resources
      setTimeout(() => {
        if (preloader.parentNode) {
          preloader.style.display = 'none';
        }
      }, 850);
    }, remainingTime);
  };

  // Trigger when all assets load, or fallback after safety timeout
  if (document.readyState === 'complete') {
    dismissPreloader();
  } else {
    window.addEventListener('load', dismissPreloader);
    // Safety fallback timeout so page is never blocked
    setTimeout(dismissPreloader, 3200);
  }

  // Developer / Client preview trigger
  window.replayGaneshaLoader = () => {
    preloader.style.display = 'flex';
    preloader.classList.remove('loaded');
    document.body.classList.remove('preloader-done');
    setTimeout(() => {
      preloader.classList.add('loaded');
    }, 2400);
  };
})();