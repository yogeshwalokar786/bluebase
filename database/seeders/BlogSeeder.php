<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $categoryMap = BlogCategory::all()->pluck('id', 'slug')->toArray();

        $articles = [
            [
                'title' => 'Engineering OMG Rental Bikes: Scaling Fleet ERP & Real-Time Booking for Two-Wheeler Rentals',
                'slug' => 'engineering-omg-rental-bikes-fleet-erp-booking-engine',
                'category' => 'Case Studies',
                'category_slug' => 'case-studies',
                'tags' => 'Vehicle Rental ERP, Real-Time Booking, Razorpay, Fleet Management, OMG Rental Bikes',
                'author' => 'Bluebase Engineering Pod',
                'author_role' => 'Principal Solutions Architect • Bluebase Technologies',
                'author_avatar' => 'BB',
                'read_time' => '6 min read',
                'is_featured' => true,
                'image' => 'images/stories/omg-rental-bikes-brand.png',
                'excerpt' => 'How Bluebase engineered an end-to-end vehicle rental ERP and instant online reservation engine for OMG Rental Bikes, automating deposit handling, fleet availability, and digital contract signing.',
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'meta_title' => 'OMG Rental Bikes Case Study: Fleet ERP & Real-Time Booking — Bluebase',
                'meta_description' => 'How Bluebase built the custom online reservation engine, dynamic fleet inventory ERP, and instant digital KYC system for OMG Rental Bikes.',
                'content' => <<<'HTML'
<h2>Transforming Urban Two-Wheeler Rentals</h2>
<p>OMG Rental Bikes (<a href="https://omgrentalbikes.com" target="_blank" rel="noopener">omgrentalbikes.com</a>) operates one of Central India's fastest-growing premium two-wheeler vehicle rental fleets. Originally relying on phone reservations, manual register ledgers, and physical paper lease agreements, the business encountered severe operational bottlenecks during peak travel seasons: double-booked vehicles, delayed security deposit refunds, and manual customer KYC verification.</p>

<p>Bluebase Technologies was engaged to engineer a comprehensive digital rental ecosystem: a lightning-fast customer booking web application paired with an administrative fleet management ERP.</p>

<div class="article-callout-box">
  <div class="callout-title">Key Engineering Outcome</div>
  <p>Eliminated 100% of double-booking conflicts, reduced customer vehicle checkout time from 15 minutes to under 2 minutes, and scaled online reservations by over 400% within the first 90 days of launch.</p>
</div>

<h2>The Core Architectural Pillars</h2>
<p>To resolve the operational challenges, our engineering pod implemented four synchronized modules:</p>

<h3>1. Real-Time Dynamic Fleet Allocation Engine</h3>
<p>Vehicle availability operates across hourly, daily, and monthly tiers. Our state-machine scheduling algorithm automatically locks vehicle slots upon checkout initiation, prunes unconfirmed holds after 10 minutes, and prevents cross-branch allocation conflicts across city hubs.</p>

<h3>2. Instant Digital KYC & Document Verification</h3>
<p>Customers upload government IDs and driving licenses directly from mobile cameras. Images are automatically compressed, encrypted at rest, and verified against operational checklists before vehicle handover, eliminating paper liability completely.</p>

<h3>3. Seamless Payment & Security Deposit Workflows</h3>
<p>Integrated with Razorpay to support instant UPI, debit/credit cards, and automated digital security deposit pre-authorizations. Customers receive real-time automated refunds directly to their original payment source immediately upon vehicle inspection return.</p>

<h3>4. Mobile Inspection & Damage Checklists</h3>
<p>Branch personnel conduct visual check-ins and check-outs on smartphones, documenting existing vehicle conditions, odometer readings, and fuel levels with timestamped photos signed digitally by the customer.</p>

<h2>Performance Benchmarks</h2>
<div class="metric-highlight-grid">
  <div class="metric-card">
    <div class="metric-num">0.82 s</div>
    <div class="metric-lbl">Mobile Page Load</div>
  </div>
  <div class="metric-card">
    <div class="metric-num">0%</div>
    <div class="metric-lbl">Double Booking Errors</div>
  </div>
  <div class="metric-card">
    <div class="metric-num">400%+</div>
    <div class="metric-lbl">Surge in Online Bookings</div>
  </div>
</div>

<h2>Conclusion</h2>
<p>By replacing manual paperwork with automated fleet state machines and instant digital payments, OMG Rental Bikes established a high-trust, scalable brand that serves thousands of commuters, tourists, and corporate riders every month.</p>
HTML
            ],
            [
                'title' => 'Building Aarohi Classic: Real-Time Athlete Registration & Live Scoring Engine for National Events',
                'slug' => 'building-aarohi-classic-live-athlete-registration-scoring-platform',
                'category' => 'Case Studies',
                'category_slug' => 'case-studies',
                'tags' => 'High Concurrency, Live Scoring, Sports Tech, Real-Time Leaderboards, Aarohi Classic',
                'author' => 'Bluebase Engineering Pod',
                'author_role' => 'Head of Digital Systems • Bluebase Technologies',
                'author_avatar' => 'AC',
                'read_time' => '7 min read',
                'is_featured' => false,
                'image' => 'images/stories/aarohi-classic-brand.png',
                'excerpt' => 'How we architected a high-concurrency event registration and live scoreboard portal for Aarohi Classic, processing thousands of athlete entries and live heat scoring with sub-50ms latency.',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'meta_title' => 'Aarohi Classic Case Study: Live Athlete Registration & Scoring — Bluebase',
                'meta_description' => 'Architecting real-time sports event platforms: high-concurrency athlete registration, live heat tabulation, and audience leaderboards for Aarohi Classic.',
                'content' => <<<'HTML'
<h2>The High-Stakes World of National Sporting Events</h2>
<p>Aarohi Classic is a premier national athletic championship drawing thousands of competitors, coaches, and sports enthusiasts. Managing paper entries, athlete weighing category brackets, and manual scorecards across fast-paced competitive heats traditionally created hours of scoring delays and audience frustration.</p>

<p>The Aarohi Classic organizing committee partnered with Bluebase Technologies to design an end-to-end digital event platform capable of handling intense registration traffic spikes and delivering instantaneous live scoreboards to ringside screens and mobile viewers.</p>

<h2>The Technical Blueprint</h2>

<h3>1. High-Concurrency Event Registration Pipeline</h3>
<p>When championship registrations open, thousands of athletes submit entries simultaneously. We engineered an asynchronous submission queue backed by Redis, validating weight categories, age divisions, and athlete affiliation credentials with sub-100ms response times.</p>

<h3>2. Automated Chest Numbers & QR Digital Passes</h3>
<p>Upon registration confirmation, athletes receive digital tournament entry passes with cryptographically signed QR codes. At registration weigh-in desks, scanners verify participant status instantly, assign physical chest numbers, and sync participant arrival to the live roster.</p>

<h3>3. Real-Time Ringside Scoring Webhooks</h3>
<p>Judges and referees input scores on locked tablet interfaces. Points are calculated through division-specific scoring algorithms, verified against variance thresholds, and broadcast to arena visual displays and online audiences via real-time WebSocket channels with zero perceptible lag.</p>

<div class="article-callout-box">
  <div class="callout-title">Audience Engagement Benchmark</div>
  <p>Over 25,000 live spectators followed athlete heat leaderboards concurrently on tournament day, with average scoreboard delivery latency held under 45 milliseconds.</p>
</div>

<h2>Impact &amp; Client Growth</h2>
<p>The platform transformed Aarohi Classic into a benchmark modern sports organization, eliminating clerical scoring disputes and providing athletes with downloadable digital participation certificates and verified ranking records immediately upon tournament completion.</p>
HTML
            ],
            [
                'title' => 'Building Scalable SaaS MVPs: The Founder\'s Guide to Sprint-One Velocity & Milestone Delivery',
                'slug' => 'building-scalable-saas-mvps-founders-guide-sprint-one-velocity',
                'category' => 'SaaS Architecture & MVPs',
                'category_slug' => 'saas-engineering',
                'tags' => 'SaaS MVP, Startup Velocity, Next.js, Laravel, Stripe, Multi-Tenancy, Milestone Billing',
                'author' => 'Bluebase Product Pod',
                'author_role' => 'SaaS Architecture Team • Bluebase Technologies',
                'author_avatar' => 'SP',
                'read_time' => '8 min read',
                'is_featured' => false,
                'image' => 'images/stories/screens-clicks.jpg',
                'excerpt' => 'How founders can launch a production-grade SaaS MVP in 3 to 6 weeks. Selecting the right decoupled tech stack, avoiding microservice traps, and structuring milestone contracts for 100% IP ownership.',
                'is_published' => true,
                'published_at' => now()->subDays(8),
                'meta_title' => 'SaaS MVP Development Guide: 3 to 6-Week Launch Playbook — Bluebase',
                'meta_description' => 'A practical founder guide to rapid SaaS MVP delivery: choosing decoupled tech stacks, multi-tenant database isolation, and milestone-based pricing.',
                'content' => <<<'HTML'
<h2>Why 90% of SaaS MVPs Fail Before Launch</h2>
<p>The most common startup pitfall is not a shortage of ambition—it is architectural over-engineering. First-time founders often spend months building distributed microservices, multi-region Kubernetes clusters, and bespoke billing engines before validating whether paying customers actually want their core product.</p>

<p>At Bluebase Technologies, our <strong>3 to 6-Week SaaS MVP Delivery Model</strong> is built around sprint velocity, commercial focus, and rock-solid foundational code that scales smoothly from 10 to 100,000 users without rewrites.</p>

<h2>The Pragmatic SaaS Tech Stack</h2>
<p>We reject fragile low-code tools that lock founders in and cause technical debt. Instead, we combine two proven technologies:</p>
<ul>
  <li><strong>Frontend:</strong> Next.js (React) with Tailwind CSS for sub-second page loads, excellent SEO ranking, and mobile-responsive user dashboards.</li>
  <li><strong>Backend:</strong> Laravel or Node.js with PostgreSQL/MySQL for deterministic business logic, asynchronous queues, and enterprise role-based access control (RBAC).</li>
</ul>

<h2>The 4 Pillars of a Production-Ready MVP</h2>

<h3>1. Multi-Tenant Data Isolation</h3>
<p>Whether you choose tenant-scoped schemas or row-level tenant keys, tenant data boundaries must be enforced mathematically at the database layer. No organization should ever risk seeing another tenant's records.</p>

<h3>2. Subscription Billing & Webhook Idempotency</h3>
<p>Integrating Stripe or Razorpay requires more than a simple checkout button. Robust SaaS MVPs require automated plan upgrades/downgrades, dunning management for failed cards, and idempotent webhook handlers that prevent duplicate charge processing.</p>

<h3>3. Self-Serve Authentication & Team Invites</h3>
<p>Modern B2B buyers expect seamless organization onboarding: magic links, Google/Microsoft SSO, and granular team permission roles (Admin, Editor, Viewer).</p>

<h3>4. Milestone Pricing & 100% IP Ownership</h3>
<p>Never enter into open-ended hourly billing where incentives are misaligned. At Bluebase, every SaaS MVP is built on fixed-price milestone contracts: you review, test, and approve each deliverable on staging before releasing payments, and own 100% of the intellectual property upon launch.</p>
HTML
            ],
            [
                'title' => 'Digital Transformation for Medical Clinics: Online Appointments, WhatsApp Booking & High-Trust Patient Portals',
                'slug' => 'digital-transformation-medical-clinics-online-appointments-whatsapp-booking',
                'category' => 'Healthcare & Clinic Tech',
                'category_slug' => 'healthcare-tech',
                'tags' => 'Clinic Website, Doctor Profile, WhatsApp Booking, Google Maps, Patient Trust, Healthcare Tech',
                'author' => 'Bluebase Healthcare Pod',
                'author_role' => 'Healthcare Solutions Lead • Bluebase Technologies',
                'author_avatar' => 'HC',
                'read_time' => '6 min read',
                'is_featured' => false,
                'image' => 'images/stories/hauni.jpg',
                'excerpt' => 'Why generic website templates fail medical practices, and how custom clinic web platforms streamline patient appointments, Google Maps navigation, doctor credentials, and direct WhatsApp consultations.',
                'is_published' => true,
                'published_at' => now()->subDays(11),
                'meta_title' => 'Medical Clinic Website Engineering & Patient Booking Portals — Bluebase',
                'meta_description' => 'How healthcare practices and doctor clinics modernize patient onboarding with WhatsApp appointment booking, Google Maps directions, and high-trust web design.',
                'content' => <<<'HTML'
<h2>The Changing Patient Journey</h2>
<p>Over 82% of patients search for specialists, check clinic reviews, and explore treatment options on their smartphones before ever dialing a reception desk. Yet, the vast majority of local clinics, dental centers, and healthcare practitioners rely on outdated, non-responsive websites or static business directories that frustrate prospective patients.</p>

<p>A custom clinic web portal acts as your 24/7 digital reception desk—establishing clinical authority, clarifying treatments, and eliminating reception phone jams.</p>

<h2>What Every High-Converting Clinic Website Requires</h2>

<h3>1. Clear Doctor Credentials & Specializations</h3>
<p>Patients choose doctors, not corporate logos. Highlighting medical degrees, clinical fellowships, years of surgical experience, and published clinical achievements builds instant trust with anxious patients.</p>

<h3>2. One-Tap WhatsApp & Online Appointment Booking</h3>
<p>In modern patient demographics, forcing callers through busy telephone lines results in lost consultations. We engineer one-tap WhatsApp appointment triggers with pre-populated patient inquiry templates, alongside simple calendar booking forms.</p>

<h3>3. Transparent Treatment Catalogs & FAQ</h3>
<p>Answering common questions—procedure steps, recovery periods, and initial consultation procedures—lowers anxiety and prepares patients for their initial visit.</p>

<h3>4. Exact Google Maps Driving Directions</h3>
<p>Integrated interactive Google Maps with live navigation links ensure patients arrive on time without confusing hub directions or parking confusion.</p>

<div class="article-callout-box">
  <div class="callout-title">Fast 1 to 2-Week Turnaround</div>
  <p>Bluebase delivers custom, mobile-optimized clinic websites in 1 to 2 weeks at transparent fixed pricing, complete with Google Maps setup, WhatsApp buttons, and fast SSL hosting.</p>
</div>
HTML
            ],
            [
                'title' => 'Modern Corporate Website Engineering: Why Custom Architecture Outperforms Generic CMS Templates',
                'slug' => 'modern-corporate-website-engineering-custom-architecture-vs-cms-templates',
                'category' => 'Corporate & Web Engineering',
                'category_slug' => 'web-engineering',
                'tags' => 'Corporate Website, B2B Web, Executive Design, Sub-Second Performance, SEO, Next.js',
                'author' => 'Bluebase Web Team',
                'author_role' => 'Lead Web Engineer • Bluebase Technologies',
                'author_avatar' => 'CW',
                'read_time' => '6 min read',
                'is_featured' => false,
                'image' => 'images/stories/sapinsider-thumb.jpg',
                'excerpt' => 'How custom corporate websites deliver executive brand authority, 95+ Core Web Vitals, enterprise security, and seamless lead capture that generic WordPress themes cannot match.',
                'is_published' => true,
                'published_at' => now()->subDays(14),
                'meta_title' => 'Custom Corporate Website Engineering vs Generic CMS Templates — Bluebase',
                'meta_description' => 'Why bespoke corporate website engineering delivers superior brand trust, sub-second speed, and higher B2B inquiry conversion rates than generic CMS themes.',
                'content' => <<<'HTML'
<h2>Your Website is Your Digital Headquarters</h2>
<p>For B2B enterprises, consulting firms, and modern service providers, your website is frequently the first meeting room where prospective enterprise clients, partners, and top talent evaluate your credibility. A generic, bloated template signals amateur execution, while a sharp, responsive, sub-second custom web application conveys institutional authority.</p>

<h2>The Hidden Costs of Generic Template Themes</h2>
<ul>
  <li><strong>Slow Mobile Load Times:</strong> Bloated themes load dozens of unnecessary scripts, triggering poor Core Web Vitals and degrading Google organic rankings.</li>
  <li><strong>Security Vulnerabilities:</strong> Generic plugin ecosystems represent the #1 attack vector for website defacement and database injections.</li>
  <li><strong>Rigid Design Constraints:</strong> Trying to customize canned themes inevitably creates layout bugs, broken mobile views, and visual inconsistencies.</li>
</ul>

<h2>The Bluebase Custom Engineering Approach</h2>
<p>We build tailored corporate web platforms that embody your executive brand identity:</p>
<ul>
  <li><strong>Clean Decoupled Code:</strong> Built with modern HTML5/CSS, Tailwind, or Next.js for sub-second speeds on 4G and 5G mobile devices.</li>
  <li><strong>High-Converting Inquiry Flows:</strong> Strategic positioning of contact forms, case studies, client testimonial carousels, and WhatsApp connections.</li>
  <li><strong>Full SEO Schema Integration:</strong> Semantic Organization, Article, and Service schemas structured directly for Google Rich Snippets and executive discovery.</li>
</ul>
HTML
            ],
            [
                'title' => 'Cross-Platform Mobile Apps: Choosing Between Flutter & React Native for Scalable Dual-Launch',
                'slug' => 'cross-platform-mobile-apps-flutter-vs-react-native-dual-launch',
                'category' => 'Mobile Engineering',
                'category_slug' => 'mobile-engineering',
                'tags' => 'Flutter, React Native, iOS, Android, Cross-Platform Mobile, Native Performance',
                'author' => 'Bluebase Mobile Pod',
                'author_role' => 'Mobile Systems Architect • Bluebase Technologies',
                'author_avatar' => 'MB',
                'read_time' => '7 min read',
                'is_featured' => false,
                'image' => 'images/illustrations/ui-illustration.jpg',
                'excerpt' => 'A practical comparison of rendering performance, developer velocity, hardware integrations, and ecosystem maturity when launching iOS and Android apps simultaneously.',
                'is_published' => true,
                'published_at' => now()->subDays(17),
                'meta_title' => 'Flutter vs React Native: Dual-Launch Mobile Strategy — Bluebase',
                'meta_description' => 'Comparing Flutter and React Native for startups and enterprises: single codebase efficiency, 60fps performance, and hardware integrations.',
                'content' => <<<'HTML'
<h2>Why Separate Native iOS & Android Apps Are Often a Mistake</h2>
<p>Historically, building mobile applications required provisioning two separate engineering teams: Swift engineers for iOS and Kotlin engineers for Android. For early-stage products and high-growth companies, this approach doubles capital expenditure, desynchronizes feature releases, and creates divergent user experiences.</p>

<p>Modern cross-platform frameworks—specifically <strong>Flutter</strong> and <strong>React Native</strong>—allow businesses to launch simultaneously on the Apple App Store and Google Play Store with 90%+ shared codebase parity and 60fps native performance.</p>

<h2>Flutter vs. React Native: When to Choose Which</h2>

<h3>Choose Flutter When:</h3>
<ul>
  <li>Your product demands custom, complex animations, vector canvas drawing, or strict pixel-perfect UI consistency across all device sizes.</li>
  <li>You need maximum raw graphics performance for hardware dashboard monitoring or vehicle diagnostics.</li>
  <li>You want single-language Dart compilation directly to ARM machine code.</li>
</ul>

<h3>Choose React Native When:</h3>
<ul>
  <li>Your team already operates an extensive Next.js or React web codebase and can share business logic, validation schemas, and state stores.</li>
  <li>Your application relies heavily on platform-specific native views and operating system UI patterns.</li>
  <li>You want over-the-air (OTA) code push updates for rapid bug fixes without waiting for app store review cycles.</li>
</ul>
HTML
            ],
            [
                'title' => 'Engineering High-Conversion Ecommerce: Sub-Second Product Catalogs, Instant UPI & Scalable Checkouts',
                'slug' => 'engineering-high-conversion-ecommerce-sub-second-catalogs-instant-upi-checkouts',
                'category' => 'Ecommerce & Retail',
                'category_slug' => 'ecommerce-retail',
                'tags' => 'Ecommerce, Razorpay, UPI Checkout, Cart Recovery, Mobile Commerce, Core Web Vitals',
                'author' => 'Bluebase Commerce Pod',
                'author_role' => 'Commerce Engineering Specialist • Bluebase Technologies',
                'author_avatar' => 'EC',
                'read_time' => '6 min read',
                'is_featured' => false,
                'image' => 'images/stories/asia-express-food.png',
                'excerpt' => 'How sub-second catalog speeds, instant 1-click UPI checkout, and automated inventory reconciliation drive higher conversions and reduce cart abandonment on modern digital storefronts.',
                'is_published' => true,
                'published_at' => now()->subDays(20),
                'meta_title' => 'High-Conversion Ecommerce Architecture: Instant UPI & Sub-Second Speed — Bluebase',
                'meta_description' => 'Architecting fast, mobile-first ecommerce platforms: UPI checkout optimization, abandoned cart recovery, and sub-second catalog browsing.',
                'content' => <<<'HTML'
<h2>The High Cost of Checkout Friction</h2>
<p>In modern digital commerce, every 100-millisecond delay in product catalog loading drops conversion rates by up to 7%. Furthermore, over 70% of potential buyers abandon their shopping carts at checkout due to complicated multi-step forms, slow OTP delivery, and payment gateway failures.</p>

<h2>Engineering for Maximum Conversion</h2>
<p>At Bluebase Technologies, we build custom digital storefronts engineered around three commercial fundamentals:</p>

<h3>1. Sub-Second Mobile Catalog Navigation</h3>
<p>Decoupled product filtering with optimized images, instant category search, and zero layout shift, ensuring shoppers can browse hundreds of SKUs effortlessly on mobile data.</p>

<h3>2. 1-Click UPI & Express Checkout</h3>
<p>Direct integration with top payment gateways (Razorpay, Cashfree, Stripe) allowing shoppers to complete payments via Google Pay, PhonePe, Paytm, cards, or Cash on Delivery in under 15 seconds.</p>

<h3>3. Automated Cart Recovery & WhatsApp Notifications</h3>
<p>Automated triggers send personalized WhatsApp and email reminders to shoppers who abandon their checkout, recovering up to 20% of lost revenue automatically.</p>
HTML
            ],
            [
                'title' => 'Agentic AI in Production: Moving Past Toy Chatbots to Deterministic Enterprise Workflows',
                'slug' => 'agentic-ai-in-production-moving-past-toy-chatbots-to-enterprise-workflows',
                'category' => 'AI & Systems',
                'category_slug' => 'ai-systems',
                'tags' => 'Autonomous Agents, LLM Guardrails, Python, Enterprise Automation, Document Processing',
                'author' => 'Bluebase AI Systems Team',
                'author_role' => 'Principal AI Systems Architect • Bluebase Technologies',
                'author_avatar' => 'AI',
                'read_time' => '8 min read',
                'is_featured' => false,
                'image' => 'images/stories/whitepaper-autonomous.png',
                'excerpt' => 'Why standard LLM chatbots fail enterprise business rules, and how deterministic multi-agent systems automate invoice parsing, document verification, and CRM synchronization with audit integrity.',
                'is_published' => true,
                'published_at' => now()->subDays(24),
                'meta_title' => 'Agentic AI in Production: Deterministic Enterprise Systems — Bluebase',
                'meta_description' => 'Building enterprise AI agent loops: moving past generic chatbots to deterministic schema validation, automated document parsing, and audit ledgers.',
                'content' => <<<'HTML'
<h2>Beyond Simple Conversational Chatbots</h2>
<p>While consumer AI chat interfaces have captured worldwide attention, enterprise software requires 100% deterministic reliability. A business cannot tolerate an AI that hallucinates invoice numbers, submits invalid accounting entries, or triggers unverified database mutations.</p>

<p>Bluebase engineers production-ready <strong>Agentic AI Systems</strong> that combine the reasoning power of modern LLMs with strict programmatic guardrails, schema validation, and human-in-the-loop oversight.</p>

<h2>The 4 Pillars of Production Agentic Systems</h2>

<h3>1. Constrained Schema Decoding</h3>
<p>All model outputs must conform to strict JSON schemas. If a model response fails schema validation, retry loops with error corrections execute automatically before any system action occurs.</p>

<h3>2. Sandboxed Tool Execution</h3>
<p>Agents interact with company databases and third-party APIs through tightly restricted tool definitions with scoped OAuth permissions and rate limiters.</p>

<h3>3. Immutable Audit Trails</h3>
<p>Every decision step, tool invocation, and data transform is logged with cryptographic hashes in tamper-evident audit tables for complete compliance traceability.</p>

<h3>4. Human-in-the-Loop Approval Gates</h3>
<p>High-value or irreversible actions (such as authorizing vendor payouts or publishing public changes) pause execution until an authenticated human operator approves the payload.</p>
HTML
            ]
        ];

        foreach ($articles as $art) {
            $catSlug = $art['category_slug'] ?? 'web-engineering';
            unset($art['category_slug']);

            if (isset($categoryMap[$catSlug])) {
                $art['category_id'] = $categoryMap[$catSlug];
            }

            Blog::updateOrCreate(
                ['slug' => $art['slug']],
                $art
            );
        }
    }
}
