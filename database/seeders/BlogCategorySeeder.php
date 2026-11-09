<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'SaaS Architecture',
                'slug' => 'saas-architecture',
                'description' => 'Architectural blueprints, multi-tenant database designs, distributed scaling patterns, and microservices for high-velocity B2B SaaS applications.',
                'meta_title' => 'SaaS Architecture & Multi-Tenant Engineering — Bluebase Tech Blog',
                'meta_description' => 'Deep dive into multi-tenant database isolation, distributed cache invalidation, and resilient cloud architectures for modern B2B SaaS platforms.',
                'display_order' => 1,
            ],
            [
                'name' => 'Frontend & Next.js',
                'slug' => 'frontend-nextjs',
                'description' => 'Modern client-side engineering, Next.js Server Components, real-time hydration, and edge-rendered user experiences.',
                'meta_title' => 'Frontend & Next.js Performance Engineering — Bluebase Tech Blog',
                'meta_description' => 'Master Next.js App Router, streaming SSR, deterministic state machines, and micro-interactions with zero layout shift.',
                'display_order' => 2,
            ],
            [
                'name' => 'API & Backend',
                'slug' => 'api-backend',
                'description' => 'High-throughput REST and GraphQL APIs, event streaming with Kafka/Redis, and PostgreSQL row-level security.',
                'meta_title' => 'API & Distributed Backend Systems — Bluebase Tech Blog',
                'meta_description' => 'Designing sub-10ms transactional APIs, idempotent event pipelines, and resilient distributed systems.',
                'display_order' => 3,
            ],
            [
                'name' => 'DevSecOps & Security',
                'slug' => 'devsecops-security',
                'description' => 'Zero-trust cloud infrastructure, automated SOC2 compliance pipelines, container hardening, and audit logging.',
                'meta_title' => 'DevSecOps & Cloud Security Architecture — Bluebase Tech Blog',
                'meta_description' => 'Enterprise cloud security, immutable audit logs, CI/CD vulnerability scanning, and compliant Kubernetes deployments.',
                'display_order' => 4,
            ],
            [
                'name' => 'Mobile Engineering',
                'slug' => 'mobile-engineering',
                'description' => 'Offline-first React Native and Flutter enterprise mobile apps, background synchronization, and native device bridge optimizations.',
                'meta_title' => 'Enterprise Mobile App Engineering — Bluebase Tech Blog',
                'meta_description' => 'Building offline-first enterprise mobile applications with biometric security and sub-millisecond local SQLite caches.',
                'display_order' => 5,
            ],
            [
                'name' => 'AI & Systems',
                'slug' => 'ai-systems',
                'description' => 'Autonomous LLM agent loops, deterministic schema constraints, retrieval-augmented generation (RAG), and agentic workflows.',
                'meta_title' => 'Autonomous AI Agents & Cognitive Systems — Bluebase Tech Blog',
                'meta_description' => 'Practical implementation of deterministic AI copilots, tool-calling sandboxes, and enterprise vector retrieval systems.',
                'display_order' => 6,
            ],
            [
                'name' => 'Case Study',
                'slug' => 'case-study',
                'description' => 'Real-world technical transformations, performance benchmark breakdowns, and ROI case studies from Bluebase engineering engagements.',
                'meta_title' => 'Digital Engineering Case Studies & Benchmarks — Bluebase Tech Blog',
                'meta_description' => 'In-depth case studies covering production deployments, latency reductions, and scalable architectures built by Bluebase.',
                'display_order' => 7,
            ],
        ];

        foreach ($categories as $cat) {
            $created = BlogCategory::firstOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );

            // Match and link existing blogs to this category
            Blog::where(function ($q) use ($cat) {
                $q->where('category', 'like', "%{$cat['name']}%")
                  ->orWhere('category', 'like', '%' . explode(' ', $cat['name'])[0] . '%');
            })->whereNull('category_id')->update(['category_id' => $created->id]);
        }

        // For any remaining blogs without category_id, map or assign
        $defaultCat = BlogCategory::firstOrCreate(
            ['slug' => 'engineering'],
            [
                'name' => 'Engineering',
                'slug' => 'engineering',
                'description' => 'Core software engineering methodologies, design patterns, and full-stack software practices.',
                'meta_title' => 'Software Engineering & Clean Code — Bluebase Tech Blog',
                'meta_description' => 'Technical blueprints, modern full-stack engineering standards, and clean code principles.',
                'display_order' => 8,
            ]
        );

        Blog::whereNull('category_id')->update([
            'category_id' => $defaultCat->id,
            'category' => $defaultCat->name,
        ]);
    }
}
