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

        if (!empty($story->view_blade) && view()->exists($story->view_blade)) {
            return view($story->view_blade, compact('story'));
        }

        return view('pages.company.case-study-single', compact('story'));
    }

    public function omgRentalBikesStory()
    {
        return $this->showStory('omg-rental-bikes');
    }

    public function aarohiClassicStory()
    {
        return $this->showStory('aarohi-classic-2024');
    }

    public function indiamartLeadAutomationStory()
    {
        return $this->showStory('indiamart-lead-automation');
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
                'project_url' => 'https://omgrentalbikes.com',
                'project_url_label' => 'omgrentalbikes.com',
                'view_blade' => 'pages.company.omg-rental-bikes',
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
                'project_url' => null,
                'project_url_label' => 'Championship 2024',
                'view_blade' => 'pages.company.aarohi-classic-2024',
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
                'project_url' => null,
                'project_url_label' => 'Browser Automation',
                'view_blade' => 'pages.company.indiamart-lead-automation',
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

