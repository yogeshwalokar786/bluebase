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
                'name' => 'Case Studies',
                'slug' => 'case-studies',
                'description' => 'Real-world technical transformations, performance benchmark breakdowns, and client delivery results from Bluebase engineering engagements.',
                'meta_title' => 'Client Case Studies & Technical Architecture — Bluebase Technologies',
                'meta_description' => 'Explore in-depth case studies including OMG Rental Bikes fleet ERP and Aarohi Classic real-time scoring engine.',
                'display_order' => 1,
            ],
            [
                'name' => 'SaaS Architecture & MVPs',
                'slug' => 'saas-engineering',
                'description' => 'Architectural blueprints, multi-tenant databases, rapid 3 to 6-week MVP delivery, and subscription billing for B2B SaaS startups.',
                'meta_title' => 'SaaS MVP Engineering & Multi-Tenant Architecture — Bluebase Tech Blog',
                'meta_description' => 'How to architect, build, and launch production-grade SaaS MVPs in 3 to 6 weeks with zero technical debt.',
                'display_order' => 2,
            ],
            [
                'name' => 'Corporate & Web Engineering',
                'slug' => 'web-engineering',
                'description' => 'Bespoke corporate websites, high-authority brand portals, sub-second load times, and custom web applications with Next.js and Laravel.',
                'meta_title' => 'Corporate & Modern Web Engineering — Bluebase Tech Blog',
                'meta_description' => 'High-performance web architecture, executive corporate design, 95+ Core Web Vitals, and conversion-focused web platforms.',
                'display_order' => 3,
            ],
            [
                'name' => 'Healthcare & Clinic Tech',
                'slug' => 'healthcare-tech',
                'description' => 'Modern digital systems for medical clinics, doctor credentials, Google Maps patient navigation, and direct WhatsApp appointment booking.',
                'meta_title' => 'Healthcare & Clinic Web Engineering — Bluebase Tech Blog',
                'meta_description' => 'How medical clinics and healthcare practices streamline patient bookings with fast, mobile-friendly web portals.',
                'display_order' => 4,
            ],
            [
                'name' => 'Mobile Engineering',
                'slug' => 'mobile-engineering',
                'description' => 'High-performance cross-platform iOS and Android mobile applications built with Flutter and React Native from a single codebase.',
                'meta_title' => 'Cross-Platform Mobile App Engineering — Bluebase Tech Blog',
                'meta_description' => 'Architecting fast, responsive mobile apps with Flutter and React Native, offline synchronization, and native device hardware bridges.',
                'display_order' => 5,
            ],
            [
                'name' => 'Ecommerce & Retail',
                'slug' => 'ecommerce-retail',
                'description' => 'Modern decoupled ecommerce architectures, sub-second product catalog browsing, instant UPI/card payments, and lightweight inventory backends.',
                'meta_title' => 'Ecommerce Engineering & UPI Payment Architecture — Bluebase Tech Blog',
                'meta_description' => 'Engineering fast, high-converting digital storefronts with 1-click UPI checkout and automated cart recovery.',
                'display_order' => 6,
            ],
            [
                'name' => 'AI & Systems',
                'slug' => 'ai-systems',
                'description' => 'Autonomous LLM agent workflows, deterministic schema constraints, back-office document parsing, and enterprise business automation.',
                'meta_title' => 'Autonomous AI Agents & Enterprise Systems — Bluebase Tech Blog',
                'meta_description' => 'Practical enterprise AI implementation: moving beyond toy chatbots to reliable, audit-backed multi-agent workflows.',
                'display_order' => 7,
            ],
        ];

        foreach ($categories as $cat) {
            $created = BlogCategory::updateOrCreate(
                ['slug' => $cat['slug']],
                $cat
            );

            // Match and link existing blogs to this category
            Blog::where(function ($q) use ($cat) {
                $q->where('category', 'like', "%{$cat['name']}%")
                  ->orWhere('category', 'like', '%' . explode(' ', $cat['name'])[0] . '%');
            })->whereNull('category_id')->update(['category_id' => $created->id]);
        }
    }
}
