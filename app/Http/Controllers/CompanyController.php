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

        // Graceful fallback roles if database table is not populated yet
        if ($jobs->isEmpty()) {
            $jobs = collect([
                (object)[
                    'id' => 1,
                    'title' => 'Staff Full-Stack Engineer (React / Go / Node)',
                    'slug' => 'staff-full-stack-engineer-react-go-node',
                    'department' => 'Engineering',
                    'category' => 'backend',
                    'location' => 'Remote (India / Global)',
                    'type' => 'Full-time',
                    'experience' => 'Lead (5+ yrs)',
                    'description' => 'Lead architecture and implementation of high-throughput web applications and scalable microservices. You will work on real-time booking engines, client enterprise portals, and distributed transactional APIs.',
                    'skills_list' => ['Go', 'React / Next.js', 'PostgreSQL', 'Redis', 'Docker'],
                    'apply_email' => 'info@bluebasetechnologies.com',
                ],
                (object)[
                    'id' => 2,
                    'title' => 'Principal AI & Agent Systems Architect',
                    'slug' => 'principal-ai-agent-systems-architect',
                    'department' => 'AI Research & Labs',
                    'category' => 'ai',
                    'location' => 'Remote (India / Global)',
                    'type' => 'Full-time',
                    'experience' => 'Principal (6+ yrs)',
                    'description' => 'Architect autonomous multi-agent pipelines, build hybrid vector search RAG systems, and deploy fine-tuned open-weight models for enterprise production workloads with sub-second latencies.',
                    'skills_list' => ['Python', 'LangChain / LlamaIndex', 'Vector DBs (Qdrant)', 'FastAPI', 'PyTorch'],
                    'apply_email' => 'info@bluebasetechnologies.com',
                ],
                (object)[
                    'id' => 3,
                    'title' => 'Senior Cloud & DevOps Engineer',
                    'slug' => 'senior-cloud-devops-engineer',
                    'department' => 'Infrastructure & SRE',
                    'category' => 'mobile-cloud',
                    'location' => 'Remote (India / Global)',
                    'type' => 'Full-time',
                    'experience' => 'Senior (4+ yrs)',
                    'description' => 'Own our multi-region Kubernetes clusters, automated GitOps CI/CD pipelines, Terraform infrastructure-as-code, and zero-trust security postures across AWS and Cloudflare.',
                    'skills_list' => ['Kubernetes', 'AWS / GCP', 'Terraform IaC', 'GitHub Actions', 'Prometheus'],
                    'apply_email' => 'info@bluebasetechnologies.com',
                ],
                (object)[
                    'id' => 4,
                    'title' => 'Senior Mobile Engineer (Flutter / React Native)',
                    'slug' => 'senior-mobile-engineer-flutter-react-native',
                    'department' => 'Mobile Engineering',
                    'category' => 'mobile-cloud',
                    'location' => 'Remote (India / Global)',
                    'type' => 'Full-time',
                    'experience' => 'Senior (4+ yrs)',
                    'description' => 'Develop responsive cross-platform native experiences, offline-first sync engines, biometric auth flows, and edge computing for logistics & fleet tracking mobile platforms.',
                    'skills_list' => ['Flutter / Dart', 'React Native', 'iOS / Android', 'GraphQL', 'SQLite'],
                    'apply_email' => 'info@bluebasetechnologies.com',
                ],
                (object)[
                    'id' => 5,
                    'title' => 'Lead Product Designer & Design Systems',
                    'slug' => 'lead-product-designer-design-systems',
                    'department' => 'Design & Experience',
                    'category' => 'design',
                    'location' => 'Remote (India / Global)',
                    'type' => 'Full-time',
                    'experience' => 'Lead (5+ yrs)',
                    'description' => 'Architect comprehensive Figma design token libraries, craft accessible data-dense enterprise dashboards, and establish cohesive motion guidelines for client applications.',
                    'skills_list' => ['Figma', 'Design Tokens', 'UX Research', 'Design Systems', 'Prototyping'],
                    'apply_email' => 'info@bluebasetechnologies.com',
                ],
                (object)[
                    'id' => 6,
                    'title' => 'Data & Vector Systems Engineer (Python / Distributed DBs)',
                    'slug' => 'data-vector-systems-engineer-python-distributed-dbs',
                    'department' => 'Data Infrastructure',
                    'category' => 'backend',
                    'location' => 'Remote (India / Global)',
                    'type' => 'Full-time',
                    'experience' => 'Senior (4+ yrs)',
                    'description' => 'Design event-driven data streaming pipelines, schema registries, and real-time analytical cubes with sub-second OLAP queries across millions of transactional events.',
                    'skills_list' => ['Python', 'Apache Kafka', 'ClickHouse', 'PostgreSQL', 'Vector Indexing'],
                    'apply_email' => 'info@bluebasetechnologies.com',
                ],
            ]);
        }

        $categories = [
            'all' => [
                'label' => 'All Roles (' . $jobs->count() . ')',
                'count' => $jobs->count(),
            ],
            'backend' => [
                'label' => 'Backend & Full-Stack',
                'count' => $jobs->where('category', 'backend')->count(),
            ],
            'ai' => [
                'label' => 'AI & Machine Learning',
                'count' => $jobs->where('category', 'ai')->count(),
            ],
            'mobile-cloud' => [
                'label' => 'Mobile & DevOps',
                'count' => $jobs->where('category', 'mobile-cloud')->count(),
            ],
            'design' => [
                'label' => 'Design & Architecture',
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

