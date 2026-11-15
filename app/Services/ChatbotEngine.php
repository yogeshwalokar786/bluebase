<?php

namespace App\Services;

use App\Models\ChatSession;

class ChatbotEngine
{
    /**
     * Get initial greeting message when chat starts.
     */
    public function getInitialGreeting(): array
    {
        return [
            'message' => "Hello! Welcome to Bluebase Technologies. I am your AI assistant. Before we explore our services and solutions, may I please know your full name?",
            'step' => 'ask_name',
            'suggestions' => [],
        ];
    }

    /**
     * Process visitor message and produce an AI-style response.
     */
    public function process(ChatSession $session, string $rawMessage): array
    {
        $message = trim($rawMessage);

        if ($session->step === 'ask_name') {
            return $this->handleNameStep($session, $message);
        }

        if ($session->step === 'ask_email') {
            return $this->handleEmailStep($session, $message);
        }

        return $this->handleConversingStep($session, $message);
    }

    /**
     * Step 1: Capture visitor's name.
     */
    protected function handleNameStep(ChatSession $session, string $input): array
    {
        // Extract name if visitor wrote "I am John" or "My name is John"
        $cleaned = preg_replace('/^(my name is|i am|i\'m|this is|call me)\s+/i', '', $input);
        $cleaned = trim(preg_replace('/[^a-zA-Z\s\.\'-]/', '', $cleaned));

        if (strlen($cleaned) < 2) {
            return [
                'message' => "Could you please tell me your name so I know who I am speaking with?",
                'step' => 'ask_name',
                'suggestions' => [],
            ];
        }

        $session->visitor_name = ucwords(strtolower(substr($cleaned, 0, 100)));
        $session->step = 'ask_email';
        if ($session->exists) {
            $session->save();
        }

        return [
            'message' => "Nice to meet you, {$session->visitor_name}! Could you please share your email address so our team can follow up with any project details, proposals, or estimates?",
            'step' => 'ask_email',
            'suggestions' => [],
        ];
    }

    /**
     * Step 2: Capture visitor's email.
     */
    protected function handleEmailStep(ChatSession $session, string $input): array
    {
        // Extract email using regex
        if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $input, $matches)) {
            $email = strtolower($matches[0]);
            $session->visitor_email = substr($email, 0, 120);
            $session->step = 'conversing';
            if ($session->exists) {
                $session->save();
            }

            $name = $session->visitor_name ?: 'there';

            return [
                'message' => "Thank you, {$name}! Your contact details are noted. I am ready to help you explore what Bluebase Technologies can build for you.\n\nWhat kind of solution or service are you interested in today?",
                'step' => 'conversing',
                'suggestions' => [
                    'Web Development',
                    'Mobile App Development',
                    'SaaS MVP Launchpad',
                    'AI & Autonomous Agents',
                    'UI/UX Design',
                    'Project Pricing & Timeline',
                ],
            ];
        }

        return [
            'message' => "Please enter a valid email address (e.g., name@company.com) so we can ensure you receive our project documentation and follow-ups.",
            'step' => 'ask_email',
            'suggestions' => [],
        ];
    }

    /**
     * Step 3: Conversational intelligence without external AI API.
     */
    protected function handleConversingStep(ChatSession $session, string $input): array
    {
        $normalized = strtolower($input);
        $name = $session->visitor_name ?: 'friend';

        // Check intents by priority keywords
        if ($this->matches($normalized, ['what can you do', 'services', 'what do you do', 'what services', 'offer', 'capabilities', 'help me'])) {
            return [
                'message' => "At Bluebase Technologies, we provide full-lifecycle software development and digital transformation services:\n\n" .
                    "1. Custom Web Engineering: Scalable web apps with Laravel, Next.js, React, Node.js, and cloud backends.\n" .
                    "2. Mobile App Development: Cross-platform iOS and Android apps using Flutter and React Native.\n" .
                    "3. SaaS MVP Launchpad: Rapid 3-6 week product engineering for startups and enterprise innovators.\n" .
                    "4. AI & Intelligent Automation: Custom autonomous agents, RAG workflows, and workflow automation.\n" .
                    "5. UI/UX & Product Design: Human-centered design systems, Figma prototypes, and conversion optimization.\n" .
                    "6. Cloud & DevOps: AWS, Google Cloud, Docker, Kubernetes, and automated CI/CD pipelines.\n\n" .
                    "Which of these areas matches your current project?",
                'step' => 'conversing',
                'suggestions' => ['Web Development', 'Mobile App Development', 'SaaS MVP Launchpad', 'AI & Autonomous Agents', 'Pricing & Timeline'],
            ];
        }

        if ($this->matches($normalized, ['web', 'website', 'laravel', 'react', 'nextjs', 'next.js', 'vue', 'frontend', 'backend', 'full stack', 'fullstack', 'php', 'node'])) {
            return [
                'message' => "Our Web Development division builds enterprise-grade, high-performance web applications tailored to your specific workflow:\n\n" .
                    "- Modern Architecture: Headless architectures, microservices, and robust REST/GraphQL APIs.\n" .
                    "- Tech Stack: Laravel, Next.js, React, Vue, Node.js, Tailwind CSS, PostgreSQL, and Redis.\n" .
                    "- High Throughput: Sub-second load times, rigorous security practices, and horizontal scalability.\n" .
                    "- Integrations: Payment gateways (Stripe, Razorpay, PayPal), CRM synchronization, and multi-tenant systems.\n\n" .
                    "Are you looking to build a brand new web application, or modernize an existing platform?",
                'step' => 'conversing',
                'suggestions' => ['Build from scratch', 'Modernize existing app', 'Get a web estimate', 'Talk to engineer'],
            ];
        }

        if ($this->matches($normalized, ['mobile', 'app', 'android', 'ios', 'flutter', 'react native', 'iphone', 'play store', 'app store'])) {
            return [
                'message' => "We craft engaging, 60fps mobile applications for both iOS and Android platforms:\n\n" .
                    "- Cross-Platform Excellence: Flutter and React Native for unified codebases with native speed and feel.\n" .
                    "- Native Capabilities: Deep integration with camera, GPS, Bluetooth, biometric authentication, and push notifications.\n" .
                    "- Offline-First: Local SQLite/Hive caching so your users never face broken screens during poor network conditions.\n" .
                    "- Full Store Publishing: We handle App Store and Google Play submissions, compliance, and post-launch maintenance.\n\n" .
                    "Do you have a product specification or wireframes ready for your mobile app?",
                'step' => 'conversing',
                'suggestions' => ['Have specifications ready', 'Need design & wireframes', 'Mobile app pricing', 'Cross-platform vs Native'],
            ];
        }

        if ($this->matches($normalized, ['saas', 'mvp', 'startup', 'prototype', 'launchpad', 'founder', 'minimum viable'])) {
            return [
                'message' => "Our SaaS MVP Launchpad is engineered specifically for founders and product teams who need to launch in weeks, not months:\n\n" .
                    "- Fast Delivery: 3 to 6 week rapid development sprints from architecture to live deployment.\n" .
                    "- Core SaaS Foundation: Pre-built architecture for authentication, multi-tenant database isolation, and role-based permissions.\n" .
                    "- Monetization Ready: Integrated subscription billing with Stripe, Lemon Squeezy, or Paddle.\n" .
                    "- Investor & User Ready: Production-grade code, audit-ready security, and intuitive onboarding flows.\n\n" .
                    "Would you like to schedule an initial architecture scoping session for your MVP?",
                'step' => 'conversing',
                'suggestions' => ['Book MVP consultation', 'What is the MVP timeline?', 'Estimated MVP cost'],
            ];
        }

        if ($this->matches($normalized, ['ai', 'artificial intelligence', 'machine learning', 'llm', 'rag', 'agent', 'bot', 'automation', 'nlp'])) {
            return [
                'message' => "Bluebase develops cutting-edge AI systems and autonomous agent pipelines:\n\n" .
                    "- Autonomous Multi-Agent Workflows: Domain-specific agents collaborating to execute complex multi-step tasks.\n" .
                    "- Enterprise RAG Systems: Retrieval-Augmented Generation on your private documentation and databases with vector search.\n" .
                    "- Vector Database Setup: Fast embeddings search with Qdrant, Pinecone, pgvector, or Milvus.\n" .
                    "- Intelligent Automation: Document processing, automated data enrichment, and smart customer support bots.\n\n" .
                    "What specific process or workflow are you aiming to automate with AI?",
                'step' => 'conversing',
                'suggestions' => ['Customer Support AI', 'Internal Document RAG', 'Autonomous Agent Workflow', 'AI Cost & Consultation'],
            ];
        }

        if ($this->matches($normalized, ['ui', 'ux', 'design', 'figma', 'prototype', 'wireframe', 'branding'])) {
            return [
                'message' => "Our UI/UX team delivers human-centered, high-converting product designs:\n\n" .
                    "- Discovery & Journey Mapping: User personas, information architecture, and core journey optimization.\n" .
                    "- Interactive Figma Prototypes: Clickable, high-fidelity prototypes allowing you to test before writing code.\n" .
                    "- Design Systems: Comprehensive component libraries and design tokens for seamless developer handoff.\n" .
                    "- Usability Audits: Deep evaluations of existing interfaces to eliminate friction and elevate conversion rates.\n\n" .
                    "Are you starting a fresh design from scratch, or revamping an existing product?",
                'step' => 'conversing',
                'suggestions' => ['New product design', 'Revamp existing UI', 'Figma design tokens', 'UI/UX timeline'],
            ];
        }

        if ($this->matches($normalized, ['cloud', 'devops', 'aws', 'gcp', 'docker', 'kubernetes', 'k8s', 'server', 'hosting', 'infrastructure', 'ci/cd'])) {
            return [
                'message' => "Our Cloud & DevOps architects build bulletproof, scalable infrastructures with 99.99% uptime:\n\n" .
                    "- Cloud Platforms: Amazon Web Services (AWS), Google Cloud Platform (GCP), DigitalOcean, and hybrid setups.\n" .
                    "- Container Orchestration: Docker and Kubernetes with automated horizontal pod autoscaling.\n" .
                    "- CI/CD Pipelines: Automated linting, test suites, and zero-downtime blue-green or canary deployments.\n" .
                    "- Infrastructure as Code (IaC): Terraform and Ansible for repeatable, version-controlled cloud environments.\n\n" .
                    "Do you need cloud migration, infrastructure optimization, or a fresh deployment pipeline?",
                'step' => 'conversing',
                'suggestions' => ['AWS / GCP Setup', 'Docker & Kubernetes', 'CI/CD Pipeline', 'Security & Backup'],
            ];
        }

        if ($this->matches($normalized, ['price', 'pricing', 'cost', 'rate', 'budget', 'quote', 'estimate', 'how much', 'fee', 'charge'])) {
            return [
                'message' => "We offer three flexible engagement models tailored to your project goals:\n\n" .
                    "1. Fixed-Price Milestone Contracts: Clear deliverables, timeline, and milestone-based payments. Best for defined projects like MVPs, website revamps, or standalone apps.\n" .
                    "2. Dedicated Engineering Pods: A dedicated team (Full-stack engineers, UI/UX designer, QA engineer, PM) working exclusively on your product on a monthly retainer.\n" .
                    "3. Sprint-Based Agile Billing: Bi-weekly sprints providing maximum flexibility as your scope evolves.\n\n" .
                    "Since each system is custom-built, we provide a detailed proposal and itemized cost breakdown after a quick 20-minute discovery call.\n\n" .
                    "Would you like us to prepare a tailored estimate for your project?",
                'step' => 'conversing',
                'suggestions' => ['Request tailored estimate', 'Schedule discovery call', 'View MVP packages'],
            ];
        }

        if ($this->matches($normalized, ['time', 'timeline', 'duration', 'how long', 'weeks', 'months', 'deadline', 'turnaround'])) {
            return [
                'message' => "Our average delivery timelines by project scale:\n\n" .
                    "- SaaS MVP Launchpad: 3 to 6 weeks from kickoff to production deployment.\n" .
                    "- Custom Web Application / Portal: 6 to 10 weeks depending on complexity.\n" .
                    "- Cross-Platform Mobile App: 8 to 14 weeks including App Store and Google Play approvals.\n" .
                    "- Enterprise Scaled Platform: 3 to 6 months delivered across structured 2-week agile sprints.\n\n" .
                    "Every project includes bi-weekly sprint demos and a private staging URL so you test progress in real time.",
                'step' => 'conversing',
                'suggestions' => ['SaaS MVP timeline', 'Mobile App timeline', 'Schedule kickoff call'],
            ];
        }

        if ($this->matches($normalized, ['where', 'location', 'office', 'headquarters', 'nagpur', 'india', 'company', 'about', 'who are you', 'team'])) {
            return [
                'message' => "Bluebase Technologies is a full-service software engineering and digital transformation agency.\n\n" .
                    "- Global Headquarters: Nagpur, Maharashtra, India.\n" .
                    "- Global Client Base: We collaborate with forward-thinking founders and enterprises across North America, Europe, Australia, and the Middle East.\n" .
                    "- Timezone Alignment: Our pods maintain convenient 4 to 6 hour daily overlap with US, UK, and European business hours.\n" .
                    "- Engineering Culture: Senior-led developers, agile ceremonies, transparent daily asynchronous updates, and strict code review standards.\n\n" .
                    "Would you like to connect directly with our engineering leadership?",
                'step' => 'conversing',
                'suggestions' => ['Schedule a meeting', 'View services', 'Contact information'],
            ];
        }

        if ($this->matches($normalized, ['career', 'job', 'hiring', 'internship', 'apply', 'vacancy', 'positions', 'openings'])) {
            return [
                'message' => "We are continuously expanding our team with passionate builders!\n\n" .
                    "- You can view all our current openings on our Careers page at /career.\n" .
                    "- We look for skilled Laravel developers, React/Next.js engineers, Flutter mobile developers, and UI/UX designers.\n" .
                    "- You can also send your resume, GitHub profile, and portfolio directly to careers@bluebase.com.",
                'step' => 'conversing',
                'suggestions' => ['View Careers Page', 'Contact Support', 'About Bluebase'],
            ];
        }

        if ($this->matches($normalized, ['contact', 'email', 'phone', 'call', 'meeting', 'reach', 'talk to human', 'schedule', 'speak', 'book'])) {
            return [
                'message' => "We would love to discuss your project in detail!\n\n" .
                    "- Official Email: contact@bluebase.com\n" .
                    "- Online Inquiry: You can submit your requirements on our /contact page anytime.\n" .
                    "- Response Time: Our technology director will review your details and respond within 24 business hours with an initial scope assessment.\n" .
                    "- Since I already have your contact email ({$session->visitor_email}), our team will also follow up with you directly!",
                'step' => 'conversing',
                'suggestions' => ['Go to Contact Page', 'Explore Web Services', 'Explore Mobile Services'],
            ];
        }

        if ($this->matches($normalized, ['hello', 'hi', 'hey', 'good morning', 'good afternoon', 'good evening', 'greetings', 'sup'])) {
            return [
                'message' => "Hello {$name}! It is great connecting with you. How can Bluebase help elevate your software or digital product today?",
                'step' => 'conversing',
                'suggestions' => ['Web Development', 'Mobile Apps', 'SaaS MVP', 'AI Solutions', 'Pricing & Timeline'],
            ];
        }

        if ($this->matches($normalized, ['thank', 'thanks', 'awesome', 'great', 'cool', 'perfect', 'appreciate', 'bye', 'goodbye'])) {
            return [
                'message' => "You are very welcome, {$name}! It is our pleasure. If you have any more questions or would like to initiate a new project, we are always here. Have an exceptional day ahead!",
                'step' => 'conversing',
                'suggestions' => ['Explore our services', 'Schedule a consultation', 'About Bluebase'],
            ];
        }

        // Intelligent contextual fallback
        return [
            'message' => "I appreciate your message, {$name}. As your Bluebase AI assistant, I want to make sure you get the most accurate answers about our engineering capabilities, project architecture, pricing models, or delivery schedules.\n\n" .
                "Could you provide a few more details about what you are looking to build, or choose one of our core specialties below?",
            'step' => 'conversing',
            'suggestions' => [
                'Custom Web Development',
                'Mobile App Engineering',
                'SaaS MVP in 3-6 Weeks',
                'AI & Automation Workflows',
                'Project Pricing & Timeline',
                'Talk to Solutions Team',
            ],
        ];
    }

    /**
     * Helper to match keyword substrings or words.
     */
    protected function matches(string $input, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            if (str_contains($input, strtolower($keyword))) {
                return true;
            }
        }
        return false;
    }
}
