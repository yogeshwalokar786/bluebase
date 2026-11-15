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
        return view('pages.company.customer-stories');
    }

    public function omgRentalBikesStory()
    {
        return view('pages.company.omg-rental-bikes');
    }

    public function aarohiClassicStory()
    {
        return view('pages.company.aarohi-classic-2024');
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

