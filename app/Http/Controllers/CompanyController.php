<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function company()
    {
        return view('pages.company.company');
    }

    public function careers()
    {
        $jobs = collect();
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('job_openings')) {
                $jobs = \App\Models\JobOpening::active()->get();
            }
        } catch (\Throwable $e) {
            $jobs = collect();
        }

        $categories = [
            'all' => [
                'label' => 'All Roles (' . $jobs->count() . ')',
                'count' => $jobs->count(),
            ],
            'backend' => [
                'label' => 'Web & Backend (' . $jobs->where('category', 'backend')->count() . ')',
                'count' => $jobs->where('category', 'backend')->count(),
            ],
            'frontend' => [
                'label' => 'Frontend & Web Apps (' . $jobs->where('category', 'frontend')->count() . ')',
                'count' => $jobs->where('category', 'frontend')->count(),
            ],
            'mobile-cloud' => [
                'label' => 'Mobile Apps (' . $jobs->where('category', 'mobile-cloud')->count() . ')',
                'count' => $jobs->where('category', 'mobile-cloud')->count(),
            ],
            'design' => [
                'label' => 'UI/UX Design (' . $jobs->where('category', 'design')->count() . ')',
                'count' => $jobs->where('category', 'design')->count(),
            ],
        ];

        return view('pages.company.careers', compact('jobs', 'categories'));
    }

    public function customerStories()
    {
        $caseStudies = collect();
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('case_studies')) {
                $caseStudies = \App\Models\CaseStudy::published()->get();
            }
        } catch (\Throwable $e) {
            $caseStudies = collect();
        }

        if ($caseStudies->isEmpty()) {
            $caseStudies = $this->fallbackCaseStudies();
        }

        $featuredStory = $caseStudies->where('is_featured', true)->first() ?? $caseStudies->first();

        return view('pages.company.customer-stories', compact('caseStudies', 'featuredStory'));
    }

    public function showStory(string $slug)
    {
        $story = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('case_studies')) {
                $story = \App\Models\CaseStudy::where('slug', $slug)->first();
            }
        } catch (\Throwable $e) {
            $story = null;
        }

        if (!$story) {
            $story = $this->fallbackCaseStudies()->firstWhere('slug', $slug);
        }

        if (!$story) {
            abort(404);
        }

        return view('pages.company.case-study-single', compact('story'));
    }

    private function fallbackCaseStudies()
    {
        return collect([
            (object)[
                'id' => 1,
                'title' => 'Custom Fleet Management ERP, Online Booking Engine & Local SEO Domination',
                'slug' => 'omg-rental-bikes',
                'client_name' => 'OMG Rental Bikes',
                'client_logo' => null,
                'industry' => 'Mobility Startup',
                'service_tag' => 'Fleet ERP & Web',
                'status_badge' => 'Live & Fully Managed',
                'status_color' => 'green',
                'metric_chip' => '100% Paperless KYC · Real-Time Fleet ERP',
                'hero_image' => 'images/stories/omg-rental-bikes-brand.png',
                'featured_stats' => [
                    ['num' => '3.5', 'suffix' => 'X', 'label' => 'Direct Bookings'],
                    ['num' => '45', 'suffix' => '%', 'label' => 'Idle Fleet Reduction'],
                    ['num' => '#', 'suffix' => '1', 'label' => 'Google Search Rank'],
                ],
                'stats_pills' => [
                    ['value' => '3.5X', 'label' => 'Direct Bookings'],
                    ['value' => '100%', 'label' => 'Digital KYC'],
                    ['value' => '45%', 'label' => 'Idle Drop'],
                ],
                'excerpt' => 'Engineered a centralized cloud platform replacing paper contracts and manual phone bookings with real-time vehicle dispatch, paperless digital KYC verification, and #1 Google Maps ranking.',
                'challenge' => 'OMG Rental Bikes was running a 100+ vehicle fleet using paper ledger records, manual phone calls, and unverified Aadhaar card photocopies. Vehicle double-booking, missing maintenance tracking, and reliance on aggregator platforms squeezed margins.',
                'solution' => 'Bluebase designed and engineered a full-stack digital operating system: real-time live inventory management, 90-second digital KYC with biometric validation, automated digital rental agreements, instant UPI payments, and localized SEO landing pages.',
                'results' => 'Scaled direct online bookings by 3.5X in 90 days, reduced idle vehicle turnaround by 45%, eliminated vehicle double-booking to zero, and achieved #1 Google Maps local ranking in target tourist hubs.',
                'technologies' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Alpine.js', 'Razorpay', 'DigiLocker API', 'Cloudflare'],
                'testimonial_quote' => 'Bluebase did not just build a website; they automated our entire business. From customer verification to payment collection and fleet maintenance alerts, everything runs in one place.',
                'testimonial_author' => 'Managing Partner',
                'testimonial_role' => 'OMG Rental Bikes',
                'project_url' => 'https://omgrentalbikes.com',
                'project_url_label' => 'omgrentalbikes.com',
                'display_order' => 1,
                'is_featured' => true,
                'is_published' => true,
            ],
            (object)[
                'id' => 2,
                'title' => 'Remote Paid Ads, Social Media Handle Management & WhatsApp Operations',
                'slug' => 'aarohi-classic-2024',
                'client_name' => 'Aarohi Classic 2024',
                'client_logo' => null,
                'industry' => 'Sports & Fitness Event',
                'service_tag' => 'Remote Digital Marketing',
                'status_badge' => '100% Remote Operations',
                'status_color' => 'blue',
                'metric_chip' => '350+ Competitors · Zero Downtime',
                'hero_image' => 'images/stories/aarohi-classic-brand.png',
                'featured_stats' => [
                    ['num' => '250', 'suffix' => '+', 'label' => 'Online Registrations'],
                    ['num' => '4.2', 'suffix' => 'X', 'label' => 'Ad ROAS'],
                    ['num' => '100', 'suffix' => '%', 'label' => 'Remote Off-Site'],
                ],
                'stats_pills' => [
                    ['value' => '250+', 'label' => 'Online Registrations'],
                    ['value' => '4.2X', 'label' => 'Ad ROAS'],
                    ['value' => '100%', 'label' => 'Remote Off-Site'],
                ],
                'excerpt' => 'Managed the championship\'s complete digital workflow 100% remotely: targeted Meta and Google ad campaigns, high-impact social media creatives, online athlete registration intake, and WhatsApp communication.',
                'challenge' => 'A national bodybuilding championship needed to attract athletes from across multiple states on a strict 45-day deadline. Previous editions relied on physical gym posters and word-of-mouth, leading to chaotic on-spot cash registrations.',
                'solution' => 'Bluebase took over 100% remote digital management: high-converting Meta and Instagram ad campaigns, automated category selection landing page, integrated Razorpay entry fee collection, and automated WhatsApp confirmation receipts.',
                'results' => 'Generated 250+ pre-paid athlete registrations before weigh-in day, achieved a 4.2X Return on Ad Spend (ROAS), and eliminated venue registration queues completely.',
                'technologies' => ['Meta Ads Manager', 'WhatsApp Cloud API', 'Razorpay', 'Next.js', 'Google Analytics 4'],
                'testimonial_quote' => 'Bluebase managed our entire registration funnel and social media handles remotely without us worrying about tech or ad management once.',
                'testimonial_author' => 'Executive Organizer',
                'testimonial_role' => 'Aarohi Classic Committee',
                'project_url' => null,
                'project_url_label' => 'Championship 2024',
                'display_order' => 2,
                'is_featured' => true,
                'is_published' => true,
            ],
            (object)[
                'id' => 3,
                'title' => 'Automated IndiaMART Medicine Buy-Lead Capture, Export Intent Filtering & Real-Time CRM Synchronization',
                'slug' => 'indiamart-lead-automation',
                'client_name' => 'Pharmaceutical Exporters',
                'client_logo' => null,
                'industry' => 'Pharma Lead Tech',
                'service_tag' => 'Medicine Export Automation',
                'status_badge' => 'Chrome Extension',
                'status_color' => 'amber',
                'metric_chip' => 'Instant Desk Alerts · 100% Lead Capture',
                'hero_image' => 'images/stories/screens-clicks.jpg',
                'featured_stats' => [
                    ['num' => '<10', 'suffix' => 's', 'label' => 'Lead Alert'],
                    ['num' => '4.5', 'suffix' => ' hrs', 'label' => 'Saved / Day'],
                    ['num' => '3.2', 'suffix' => 'X', 'label' => 'Lead Qualification'],
                ],
                'stats_pills' => [
                    ['value' => '<10s', 'label' => 'Lead Alert'],
                    ['value' => '4.5 hrs', 'label' => 'Saved / Day'],
                    ['value' => '3.2X', 'label' => 'Qualification'],
                ],
                'excerpt' => 'Engineered a bespoke Chrome browser extension for a pharmaceutical manufacturer exporting generic medicines globally, automatically filtering bulk commercial orders from retail prescription noise and syncing qualified leads to CRM in real time.',
                'challenge' => 'International medicine export inquiries on B2B directories like IndiaMART arrive around the clock. The sales desk wasted over 4 hours daily copying and pasting buyer phone numbers and weeding out single-strip retail prescription inquiries from genuine commercial container export buyers.',
                'solution' => 'Engineered a lightweight Manifest V3 Chromium browser extension that sits directly in the sales desk browser, continuously detects incoming buy-leads, parses order volume and medicine name, applies keyword score filtering, and syncs directly into the export CRM.',
                'results' => 'Immediate sub-10-second alerts for commercial export orders, 4.5 employee hours saved daily, and a 3.2X increase in fast turnaround quote submissions before overseas competitors respond.',
                'technologies' => ['Chromium Manifest V3', 'JavaScript ES6+', 'REST APIs', 'Node.js', 'CRM Webhooks'],
                'testimonial_quote' => 'Our export team now receives commercial container inquiries seconds after they post, while spam and domestic prescriptions get filtered automatically.',
                'testimonial_author' => 'VP of International Sales',
                'testimonial_role' => 'Global Pharma Exporter',
                'project_url' => null,
                'project_url_label' => 'Browser Automation',
                'display_order' => 3,
                'is_featured' => true,
                'is_published' => true,
            ],
        ]);
    }

    public function complianceSecurity()
    {
        return view('pages.company.compliance-security');
    }

    public function howWeWork()
    {
        return view('pages.company.how-we-work');
    }

    public function partnerOverview()
    {
        return view('pages.company.partner-overview');
    }

    public function becomePartner()
    {
        return view('pages.company.become-a-partner');
    }

    public function findPartner()
    {
        return view('pages.company.find-a-partner');
    }
}

