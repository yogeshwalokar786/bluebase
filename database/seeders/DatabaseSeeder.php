<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use App\Models\Solution;
use App\Models\ContactInquiry;
use App\Models\DemoBooking;
use App\Models\TrialRequest;
use App\Models\PartnerApplication;
use App\Models\NewsletterSubscriber;
use App\Models\Blog;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@bluebase.com'],
            [
                'name' => 'Bluebase Administrator',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Core Enterprise Services
        $services = [
            [
                'title' => 'Custom Web & Cloud Engineering',
                'slug' => 'custom-web-cloud-engineering',
                'tagline' => 'High-velocity cloud native architectures',
                'icon' => 'code-square',
                'summary' => 'High-performance web applications, distributed cloud backends, and microservices architectures built for infinite scale and 99.99% reliability.',
                'description' => 'Architecting and deploying resilient, scalable web applications and cloud-native distributed microservices on AWS, Azure, and Google Cloud with deterministic enterprise security.',
                'features' => [
                    'Multi-cloud cloud-native architectures',
                    'Microservices & event-driven data streaming',
                    'High-concurrency API gateways & GraphQL',
                    '99.99% SLA uptime with automated failover'
                ],
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Autonomous AI Agents & Copilots',
                'slug' => 'ai-agents-copilots',
                'tagline' => 'Enterprise-grade LLMs and autonomous multi-agent workflows',
                'icon' => 'cpu',
                'summary' => 'Multi-agent AI workflows that connect directly to your databases and APIs, automating complex multi-step operational tasks with deterministic safety.',
                'description' => 'Bridge the gap between enterprise data and cognitive automation. Our AI agents execute multi-step workflows, retrieve real-time context from ERPs, and run autonomous decision cycles safely.',
                'features' => [
                    'Deterministic retrieval-augmented generation (RAG)',
                    'Multi-agent task orchestration & tool calling',
                    'Native ERP & database operational access',
                    'Guardrailed compliance and human-in-the-loop audit trails'
                ],
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Legacy Modernization & Cloud Migration',
                'slug' => 'legacy-modernization',
                'tagline' => 'De-risk legacy migrations with zero downtime',
                'icon' => 'arrow-repeat',
                'summary' => 'Phased strangler-fig migrations that decouple legacy monoliths into cloud-native microservices with zero operational downtime and zero data loss.',
                'description' => 'Transform dated monoliths and mission-critical legacy applications into agile, modern cloud stacks without interrupting everyday business operations.',
                'features' => [
                    'Strangler fig modernization patterns',
                    'Mainframe & legacy ERP decoupling',
                    'Zero-downtime database replication & cutover',
                    'Containerization on Kubernetes & serverless'
                ],
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'Offline-First Enterprise Mobility',
                'slug' => 'offline-first-mobility',
                'tagline' => 'Rugged industrial mobile apps that never drop out',
                'icon' => 'phone',
                'summary' => 'Mission-critical iOS and Android applications with local SQLite synchronization and hardware barcode/RFID verification that never drop out.',
                'description' => 'Keep your frontline teams productive in remote plants, deep underground warehouses, and off-grid facilities with guaranteed two-way delta sync.',
                'features' => [
                    'Hardware barcode, RFID & Bluetooth peripheral integration',
                    'Robust conflict resolution & delta data synchronization',
                    'Native iOS, Android & ruggedized Zebra/Honeywell device support',
                    'Sub-millisecond local SQLite transaction response'
                ],
                'is_active' => true,
                'display_order' => 4,
            ],
            [
                'title' => 'SAP Native Integration & Optimization',
                'slug' => 'sap-native-integration',
                'tagline' => 'Direct ABAP integration without complex middleware',
                'icon' => 'layers',
                'summary' => 'Connect modern digital frontends directly to SAP S/4HANA and ECC using certified ABAP APIs, slashing latency and eliminating costly middleware licensing.',
                'description' => 'Unlock direct, certified communication between your front-end customer experiences and SAP ERP backbones without paying middleware bloat.',
                'features' => [
                    'Direct ABAP RFC / OData certified connectors',
                    'Sub-second transactional round-trip response times',
                    'Preservation of SAP security roles and authorization matrix',
                    'Bypass third-party API integration tolls'
                ],
                'is_active' => true,
                'display_order' => 5,
            ],
            [
                'title' => 'Enterprise UI/UX & Design Systems',
                'slug' => 'design-systems-dxp',
                'tagline' => 'Consumer-grade ergonomics for mission-critical enterprise tools',
                'icon' => 'palette',
                'summary' => 'Transform frustrating green-screen and cluttered ERP interfaces into sleek, intuitive, accessible design systems that cut training costs by 80%.',
                'description' => 'Design user journeys that maximize frontline velocity and eliminate user fatigue. We engineer cohesive component libraries and accessible design systems.',
                'features' => [
                    'Component design systems with Figma & Storybook sync',
                    'WCAG 2.1 AA accessibility compliance',
                    'Touch-optimized industrial UI for rugged handheld terminals',
                    'Rapid interactive prototyping and user velocity benchmarking'
                ],
                'is_active' => true,
                'display_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        // 3. Strategic Industry Solutions
        $solutions = [
            [
                'title' => 'Warehouse & Yard Management Mobility',
                'slug' => 'warehouse-yard-management',
                'tagline' => 'High-velocity receiving, picking, putaway, and cycle counting',
                'icon' => 'box-seam',
                'summary' => 'End-to-end mobile barcode scanning and inventory movement apps with offline synchronization for fast warehouse execution.',
                'description' => 'Streamline every stock movement inside your fulfillment centers and logistics yards with real-time barcode scanning and instant ERP synchronization.',
                'features' => [
                    'Real-time bin location tracking & automated route pick optimization',
                    'Instant SAP IM / WM / EWM delta synchronization',
                    'Cycle counting with discrepancy alerts'
                ],
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'title' => 'Predictive Asset Health & Maintenance',
                'slug' => 'asset-health-maintenance',
                'tagline' => 'Maximize asset uptime with IoT sensors and AI diagnosis',
                'icon' => 'tools',
                'summary' => 'Empower field engineers with predictive maintenance schedules, equipment telemetry history, and digital work order sign-offs.',
                'description' => 'Prevent catastrophic machinery failures with AI-driven anomaly alerts and mobile-first work order execution directly tied to Plant Maintenance (PM).',
                'features' => [
                    'Automated work order creation from sensor thresholds',
                    'Offline equipment manuals & interactive schematic diagrams',
                    'Photo and audio capture for maintenance evidence',
                    'Digital signatures & regulatory compliance documentation'
                ],
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'title' => 'Secure Supplier & Vendor Portals',
                'slug' => 'supplier-vendor-portals',
                'tagline' => 'Frictionless collaboration for global procurement networks',
                'icon' => 'people',
                'summary' => 'Self-service supplier onboarding, purchase order confirmations, advance shipping notifications (ASN), and automated invoice matching.',
                'description' => 'Cut down procurement email overhead by 70%. Provide suppliers a branded, secure portal for PO acknowledgement, order tracking, and discrepancy resolution.',
                'features' => [
                    'Self-service vendor profile & tax certification management',
                    'PO flip to electronic invoice with 3-way matching',
                    'Real-time delivery milestone notifications',
                    'Multi-currency and global tax jurisdiction support'
                ],
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'title' => 'Global Inventory & Supply Chain Sync',
                'slug' => 'inventory-supply-chain',
                'tagline' => 'Real-time multi-echelon stock visibility and forecasting',
                'icon' => 'globe2',
                'summary' => 'Unify inventory across regional warehouses, transit hubs, and retail points for accurate fulfillment promises and reduced carrying costs.',
                'description' => 'Eliminate phantom stock and costly stockouts with bi-directional real-time data sync across all your ERP instances, 3PL partners, and sales channels.',
                'features' => [
                    'Multi-location aggregated stock availability',
                    'Safety stock dynamic recalculation based on lead time variance',
                    'Inter-company transfer order automation',
                    'Comprehensive audit trail with serialized unit tracking'
                ],
                'is_active' => true,
                'display_order' => 4,
            ],
        ];

        foreach ($solutions as $solution) {
            Solution::updateOrCreate(['slug' => $solution['slug']], $solution);
        }

        // 4. Sample Leads
        ContactInquiry::updateOrCreate(
            ['email' => 'michael.schmidt@daimler-supply.de'],
            [
                'name' => 'Michael Schmidt',
                'company' => 'Daimler Supply Logistics',
                'phone' => '+49 711 1790',
                'service' => 'SAP Native Integration & Optimization',
                'message' => 'Looking to modernize our warehouse mobile terminals running on SAP ECC 6.0 with offline capabilities.',
                'status' => 'new',
                'admin_notes' => 'Priority prospect. Follow-up meeting scheduled for Friday.',
                'ip_address' => '127.0.0.1',
            ]
        );

        DemoBooking::updateOrCreate(
            ['email' => 'sarah.connor@aerotech-defense.com'],
            [
                'name' => 'Sarah Connor',
                'company' => 'Aerotech Defense Systems',
                'phone' => '+1 (555) 432-8921',
                'job_title' => 'VP of IT Engineering',
                'current_erp' => 'SAP S/4HANA Private Cloud',
                'interested_product' => 'Bluebase DXP & Autonomous AI Agents',
                'notes' => 'Need a live demonstration of multi-agent workflows executing transactional tasks with compliance audit trails.',
                'admin_notes' => 'Assigned to Lead Solutions Architect. Demo environment provisioned.',
                'status' => 'confirmed',
            ]
        );

        TrialRequest::updateOrCreate(
            ['email' => 'alex.turner@cloudscale-logistics.com'],
            [
                'name' => 'Alex Turner',
                'company' => 'CloudScale Logistics Inc.',
                'phone' => '+1 (415) 890-1122',
                'cloud_platform' => 'AWS',
                'sap_version' => 'S/4HANA 2023',
                'status' => 'active',
                'admin_notes' => '14-day enterprise sandbox provisioned on cluster eu-central-1.',
            ]
        );

        PartnerApplication::updateOrCreate(
            ['email' => 'partnerships@nordic-integrations.se'],
            [
                'partner_type' => 'System Integrator (SI)',
                'company_name' => 'Nordic Integrations AB',
                'contact_name' => 'Elin Lindqvist',
                'phone' => '+46 8 123 4567',
                'country' => 'Sweden',
                'message' => 'We are an established SAP Gold Partner in Scandinavia and want to certify our consultants on Bluebase DXP.',
                'status' => 'new',
                'admin_notes' => 'Schedule introductory call with VP of Global Partnerships.',
            ]
        );

        NewsletterSubscriber::updateOrCreate(
            ['email' => 'david.miller@enterprise-cloud.io'],
            [
                'ip_address' => '127.0.0.1',
                'is_active' => true,
            ]
        );

        // 5. Site Settings CMS
        $settings = [
            'site_name' => 'Bluebase Technologies',
            'site_tagline' => 'Digital Engineering & Autonomous AI Services',
            'contact_email' => 'contact@bluebase.com',
            'contact_phone' => '+1 (800) 555-BLUE',
            'support_email' => 'support@bluebase.com',
            'office_address' => '742 Innovation Way, Suite 400, San Francisco, CA 94107',
            'business_hours' => 'Monday - Friday: 8:00 AM - 6:00 PM PST',
            'linkedin_url' => 'https://linkedin.com/company/bluebase',
            'twitter_url' => 'https://twitter.com/bluebase_tech',
            'github_url' => 'https://github.com/bluebase-tech',
            'hero_badge' => 'NEXT-GEN ENTERPRISE PLATFORM',
            'hero_title' => 'Empower Your Enterprise With Autonomous AI & Digital Engineering',
            'hero_subtitle' => 'Turn complex legacy systems into ultra-fast, offline-capable, AI-augmented applications without downtime.',
        ];

        foreach ($settings as $key => $val) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $val, 'group' => 'general']);
        }

        // 6. Case Studies / Blog CMS
        $blogs = [
            [
                'title' => 'How Hauni Cut Mobile Factory Latency by 80% with Offline-First Architecture',
                'slug' => 'hauni-manufacturing-offline-first-case-study',
                'category' => 'Case Study',
                'author' => 'Marcus Vance, Principal Architect',
                'read_time' => '6 min read',
                'image' => 'images/stories/hauni.jpg',
                'excerpt' => 'A deep dive into how international tobacco and machinery giant Hauni modernized shop-floor terminal responsiveness across 14 manufacturing plants.',
                'content' => 'Manufacturing plants face harsh operational environments where reliable Wi-Fi cannot be taken for granted. By implementing Bluebase offline-first local SQLite sync with certified SAP RFC connectors, Hauni eliminated network timeouts completely and boosted operator velocity by 34%.',
                'is_published' => true,
                'published_at' => now()->subDays(12),
            ],
            [
                'title' => 'Deterministic AI Agents: Moving Beyond Chatbots to Operational ERP Automation',
                'slug' => 'deterministic-ai-agents-erp-automation',
                'category' => 'AI & Engineering',
                'author' => 'Dr. Elena Rostova, VP of AI Systems',
                'read_time' => '8 min read',
                'image' => 'images/stories/screens-clicks.jpg',
                'excerpt' => 'Why enterprises are replacing fragile screen-scraping bots with self-governing multi-agent workflows bounded by deterministic verification layers.',
                'content' => 'Large language models excel at reasoning over ambiguous unstructured inputs, but business transactions demand zero-tolerance accuracy. We explore how multi-agent supervisor architectures execute transactional API calls with strict guardrails and complete audit logs.',
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'The Strangler Fig Pattern: Modernizing SAP ECC Without Risky Big-Bang Re-platforming',
                'slug' => 'strangler-fig-pattern-sap-modernization',
                'category' => 'Architecture',
                'author' => 'Devon Shaw, Enterprise Migration Lead',
                'read_time' => '5 min read',
                'image' => 'images/stories/whitepaper-autonomous.png',
                'excerpt' => 'How Fortune 500 supply chains systematically decouple brittle monolithic codebases into containerized microservices without a single second of customer downtime.',
                'content' => 'Big-bang enterprise re-platforming projects fail at an alarming 70% rate. Learn how decoupling high-transaction interfaces into high-speed modern APIs lets you migrate modules piece by piece while keeping backend accounting intact.',
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ]
        ];

        foreach ($blogs as $blog) {
            Blog::updateOrCreate(['slug' => $blog['slug']], $blog);
        }

        // 7. Testimonials CMS
        $testimonials = [
            [
                'client_name' => 'Henrik Møller',
                'client_role' => 'Global IT Director',
                'company_name' => 'Hauni Maschinenbau GmbH',
                'quote' => 'Bluebase delivered our offline-first shop floor suite ahead of schedule. Our plant operators experienced an immediate 80% reduction in scan-to-verify latency.',
                'rating' => 5,
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'client_name' => 'Claire Dupont',
                'client_role' => 'VP Supply Chain Digitalization',
                'company_name' => 'Bell Foods International',
                'quote' => 'The autonomous AI inventory agents saved our logistics team over 40 hours of manual reconciliation every single week. Seamless SAP integration.',
                'rating' => 5,
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'client_name' => 'Arthur Pendelton',
                'client_role' => 'Chief Technology Officer',
                'company_name' => 'Rust-Oleum Europe',
                'quote' => 'Unbelievably clean code, lightning-fast execution, and an intuitive UI that required zero user training. A game-changer for our manufacturing operations.',
                'rating' => 5,
                'is_active' => true,
                'display_order' => 3,
            ]
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }
    }
}
