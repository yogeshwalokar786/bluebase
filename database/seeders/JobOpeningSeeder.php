<?php

namespace Database\Seeders;

use App\Models\JobOpening;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class JobOpeningSeeder extends Seeder
{
    public function run(): void
    {
        $openings = [
            [
                'title' => 'Staff Full-Stack Engineer (React / Go / Node)',
                'slug' => 'staff-full-stack-engineer-react-go-node',
                'department' => 'Engineering',
                'category' => 'backend',
                'location' => 'Remote (India / Global)',
                'type' => 'Full-time',
                'experience' => 'Lead (5+ yrs)',
                'description' => 'Lead architecture and implementation of high-throughput web applications and scalable microservices. You will work on real-time booking engines, client enterprise portals, and distributed transactional APIs.',
                'skills_tags' => 'Go, React / Next.js, PostgreSQL, Redis, Docker',
                'apply_email' => 'info@bluebasetechnologies.com',
                'display_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Principal AI & Agent Systems Architect',
                'slug' => 'principal-ai-agent-systems-architect',
                'department' => 'AI Research & Labs',
                'category' => 'ai',
                'location' => 'Remote (India / Global)',
                'type' => 'Full-time',
                'experience' => 'Principal (6+ yrs)',
                'description' => 'Architect autonomous multi-agent pipelines, build hybrid vector search RAG systems, and deploy fine-tuned open-weight models for enterprise production workloads with sub-second latencies.',
                'skills_tags' => 'Python, LangChain / LlamaIndex, Vector DBs (Qdrant), FastAPI, PyTorch',
                'apply_email' => 'info@bluebasetechnologies.com',
                'display_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Senior Cloud & DevOps Engineer',
                'slug' => 'senior-cloud-devops-engineer',
                'department' => 'Infrastructure & SRE',
                'category' => 'mobile-cloud',
                'location' => 'Remote (India / Global)',
                'type' => 'Full-time',
                'experience' => 'Senior (4+ yrs)',
                'description' => 'Own our multi-region Kubernetes clusters, automated GitOps CI/CD pipelines, Terraform infrastructure-as-code, and zero-trust security postures across AWS and Cloudflare.',
                'skills_tags' => 'Kubernetes, AWS / GCP, Terraform IaC, GitHub Actions, Prometheus',
                'apply_email' => 'info@bluebasetechnologies.com',
                'display_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Senior Mobile Engineer (Flutter / React Native)',
                'slug' => 'senior-mobile-engineer-flutter-react-native',
                'department' => 'Mobile Engineering',
                'category' => 'mobile-cloud',
                'location' => 'Remote (India / Global)',
                'type' => 'Full-time',
                'experience' => 'Senior (4+ yrs)',
                'description' => 'Develop responsive cross-platform native experiences, offline-first sync engines, biometric auth flows, and edge computing for logistics & fleet tracking mobile platforms.',
                'skills_tags' => 'Flutter / Dart, React Native, iOS / Android, GraphQL, SQLite',
                'apply_email' => 'info@bluebasetechnologies.com',
                'display_order' => 4,
                'is_active' => true,
            ],
            [
                'title' => 'Lead Product Designer & Design Systems',
                'slug' => 'lead-product-designer-design-systems',
                'department' => 'Design & Experience',
                'category' => 'design',
                'location' => 'Remote (India / Global)',
                'type' => 'Full-time',
                'experience' => 'Lead (5+ yrs)',
                'description' => 'Architect comprehensive Figma design token libraries, craft accessible data-dense enterprise dashboards, and establish cohesive motion guidelines for client applications.',
                'skills_tags' => 'Figma, Design Tokens, UX Research, Design Systems, Prototyping',
                'apply_email' => 'info@bluebasetechnologies.com',
                'display_order' => 5,
                'is_active' => true,
            ],
            [
                'title' => 'Data & Vector Systems Engineer (Python / Distributed DBs)',
                'slug' => 'data-vector-systems-engineer-python-distributed-dbs',
                'department' => 'Data Infrastructure',
                'category' => 'backend',
                'location' => 'Remote (India / Global)',
                'type' => 'Full-time',
                'experience' => 'Senior (4+ yrs)',
                'description' => 'Design event-driven data streaming pipelines, schema registries, and real-time analytical cubes with sub-second OLAP queries across millions of transactional events.',
                'skills_tags' => 'Python, Apache Kafka, ClickHouse, PostgreSQL, Vector Indexing',
                'apply_email' => 'info@bluebasetechnologies.com',
                'display_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($openings as $opening) {
            JobOpening::updateOrCreate(
                ['slug' => $opening['slug']],
                $opening
            );
        }
    }
}
