<!-- SITE FOOTER -->
<footer class="site-footer">
  <div class="container">
    
    <div class="footer-top">
      <div class="footer-nav-grid" data-viewport="true">
        
        <div class="footer-col">
          <h4>Services</h4>
          <ul>
            <li><a href="{{ route('services.web-development') }}">Web App Development</a></li>
            <li><a href="{{ route('services.website-design') }}">Website Design &amp; Build</a></li>
            <li><a href="{{ route('services.mobile-app-development') }}">Mobile App Development</a></li>
            <li><a href="{{ route('services.saas-mvp-development') }}">SaaS MVP Engineering</a></li>
            <li><a href="{{ route('services.ecommerce-development') }}">E-Commerce Stores</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Case Studies</h4>
          <ul>
            <li><a href="{{ route('customer-stories') }}">Johnson &amp; Johnson</a></li>
            <li><a href="{{ route('customer-stories') }}">Secil Group</a></li>
            <li><a href="{{ route('customer-stories') }}">Dussmann Group</a></li>
            <li><a href="{{ route('customer-stories') }}">Vattenfall Energy</a></li>
            <li><a href="{{ route('customer-stories') }}">Asia Express Food</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Solutions</h4>
          <ul>
            <li><a href="{{ route('services.saas-mvp-development') }}">Early-Stage MVP Launch</a></li>
            <li><a href="{{ route('services.web-development') }}">SaaS Product Engineering</a></li>
            <li><a href="{{ route('services.website-design') }}">Corporate Websites</a></li>
            <li><a href="{{ route('services.ecommerce-development') }}">Online Stores &amp; E-Commerce</a></li>
            <li><a href="{{ route('services.web-development') }}">Client &amp; Customer Portals</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Resources</h4>
          <ul>
            <li><a href="{{ route('blog') }}">Bluebase Tech Blog</a></li>
            <li><a href="{{ route('customer-stories') }}">Client Case Studies</a></li>
            <li><a href="{{ route('whitepapers') }}">Technical Whitepapers</a></li>
            <li><a href="{{ route('blog') }}">Webinars &amp; Events</a></li>
            <li><a href="{{ route('blog') }}">Tech Talks Podcast</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Engineering</h4>
          <ul>
            <li><a href="{{ route('services.ui-ux-design') }}">UI/UX Design &amp; Prototyping</a></li>
            <li><a href="{{ route('services.api-backend-development') }}">API &amp; Backend Development</a></li>
            <li><a href="{{ route('services.website-redesign') }}">Website Redesign &amp; Speed</a></li>
            <li><a href="{{ route('services.maintenance-support') }}">Maintenance &amp; Support</a></li>
            <li><a href="{{ route('book-a-demo') }}">Technical Discovery Call</a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Company</h4>
          <ul>
            <li><a href="{{ route('company') }}">About Bluebase</a></li>
            <li><a href="{{ route('how-we-work') }}">How We Work</a></li>
            <li><a href="{{ route('careers') }}">Careers (We're Hiring!)</a></li>
            <li><a href="{{ route('partner-overview') }}">Partner Overview</a></li>
            <li><a href="{{ route('contact') }}">Contact Us</a></li>
            <li><a href="{{ route('compliance-security') }}">Compliance &amp; Security</a></li>
            <li><a href="{{ route('terms-of-use') }}">Master Services Agreement</a></li>
          </ul>
        </div>

      </div>

      <div class="footer-brand" data-viewport="true">
        <img src="{{ asset('images/footer-logo.svg') }}" alt="Bluebase Logo" class="footer-logo-img">
        <p class="footer-tagline">
          Bluebase is an elite digital engineering and autonomous AI services startup. We partner with ambitious enterprises and fast-growing startups to architect, build, and scale world-class software.
        </p>

        <!-- Live Newsletter Form connected to MySQL DB -->
        <form action="{{ route('newsletter.subscribe') }}" method="POST" style="margin-top: 20px; display: flex; gap: 8px; max-width: 420px;">
          @csrf
          <input type="email" name="email" placeholder="Enter your work email..." required style="flex: 1; padding: 10px 16px; border-radius: 8px; border: 1px solid rgba(255,255,255,0.15); background: rgba(255,255,255,0.06); color: #fff; font-size: 0.9rem;">
          <button type="submit" class="c-btn -primary" style="padding: 10px 18px; font-size: 0.85rem;">Subscribe</button>
        </form>
      </div>
    </div>

    <div class="footer-bottom" data-viewport="true">
      <div>&copy; {{ date('Y') }} Bluebase Technologies Inc. All rights reserved.</div>
      <div class="footer-bottom-links">
        <a href="{{ route('privacy-policy') }}">Privacy Policy</a>
        <a href="{{ route('privacy-policy') }}">Cookie Preferences</a>
        <a href="{{ route('terms-of-use') }}">Terms of Service</a>
        <a href="{{ route('compliance-security') }}">Security Statement</a>
      </div>
      <div class="social-links">
        <a href="https://www.linkedin.com" class="social-link" aria-label="LinkedIn" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
        </a>
        <a href="https://www.facebook.com" class="social-link" aria-label="Facebook" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
        </a>
        <a href="https://x.com" class="social-link" aria-label="X (Twitter)" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>
        <a href="https://www.instagram.com" class="social-link" aria-label="Instagram" target="_blank" rel="noopener">
          <svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        </a>
      </div>
    </div>

  </div>
</footer>
