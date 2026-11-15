<?php

namespace App\Services;

use App\Models\ChatSession;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotEngine
{
    /**
     * Initial greeting when chat window is first opened.
     */
    public function getInitialGreeting(): array
    {
        return [
            'message' => "Hello! Welcome to Bluebase Technologies. I am your engineering advisor.\n\nWe build custom SaaS MVPs, web platforms, mobile apps, and autonomous AI systems. What kind of project or solution are you looking to build?",
            'step' => 'conversing',
            'suggestions' => [
                'SaaS MVP in 3-6 Weeks',
                'Mobile App Development',
                'Custom Web Platforms',
                'AI & Autonomous Agents',
                'Project Pricing & Timeline',
                'Case Studies & Work',
            ],
        ];
    }

    /**
     * Human-like conversational processor with AI API integration & local fallback.
     */
    public function process(ChatSession $session, string $rawMessage): array
    {
        $input = trim($rawMessage);
        $normalized = strtolower($input);

        // 1. Extract Email if present anywhere in the message
        $newEmailFound = false;
        if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $input, $emailMatches)) {
            $extractedEmail = strtolower($emailMatches[0]);
            if ($session->visitor_email !== $extractedEmail) {
                $session->visitor_email = substr($extractedEmail, 0, 120);
                $newEmailFound = true;
            }
        }

        // 2. Extract Name if explicitly stated or if introducing self
        $newNameFound = false;
        $extractedName = $this->extractName($input, $normalized, $session);
        if ($extractedName && $session->visitor_name !== $extractedName) {
            $session->visitor_name = $extractedName;
            $newNameFound = true;
        }

        // 3. Detect if visitor opts out of giving contact details (e.g. "skip", "no email", "not now")
        $isOptOut = $this->matches($normalized, ['skip', 'no email', 'not now', 'later', 'don\'t want', 'no thanks', 'prefer not', 'just browsing', 'anonymous']);

        // 4. Update session step to conversing so it NEVER gets stuck
        $session->step = 'conversing';
        if ($session->exists) {
            $session->save();
        }

        $visitorName = $session->visitor_name ?: '';
        $visitorEmail = $session->visitor_email ?: '';

        // 5. If Google Gemini API is enabled & configured, attempt AI inference
        if ($this->hasGeminiKey()) {
            $aiResult = $this->callGeminiApi($session, $input, $visitorName, $visitorEmail);
            if ($aiResult !== null) {
                return $aiResult;
            }
        }

        // 6. Local Rule-based Knowledge Engine (Fallback & offline mode)
        $intentResult = $this->matchKnowledgeIntent($normalized, $session);

        // Handle edge case: User ONLY gave their name
        if ($newNameFound && empty($intentResult['matched_intent']) && strlen($input) < 40 && !$this->isQuestion($normalized)) {
            return [
                'message' => "Nice to meet you, {$visitorName}! Welcome to Bluebase Technologies.\n\nHow can our software engineering team help you today? Feel free to ask about our web development, mobile apps, SaaS MVP creation, AI systems, or project pricing.",
                'step' => 'conversing',
                'suggestions' => [
                    'SaaS MVP Launchpad',
                    'Mobile App Development',
                    'Custom Web Engineering',
                    'AI & Autonomous Agents',
                    'Pricing & Timeline',
                ],
            ];
        }

        // Handle edge case: User ONLY gave their email
        if ($newEmailFound && empty($intentResult['matched_intent']) && strlen($input) < 60 && !$this->isQuestion($normalized)) {
            $salutation = $visitorName ? "Thank you, {$visitorName}!" : "Thank you!";
            return [
                'message' => "{$salutation} I have recorded your email ({$visitorEmail}) for our technical solutions team.\n\nWhat kind of product or application are you looking to engineer with Bluebase?",
                'step' => 'conversing',
                'suggestions' => [
                    'Explore SaaS MVP',
                    'Mobile App Development',
                    'Our 4-Phase Process',
                    'OMG Rental Bikes Case Study',
                    'Schedule a Discovery Call',
                ],
            ];
        }

        // Handle edge case: User opted out
        if ($isOptOut && empty($intentResult['matched_intent'])) {
            return [
                'message' => "No problem at all! We are completely open and transparent. What questions do you have about our engineering capabilities, tech stacks, or delivery models?",
                'step' => 'conversing',
                'suggestions' => [
                    'Web Development Tech Stack',
                    'Mobile App Architecture',
                    'SaaS MVP 3-6 Week Delivery',
                    'How We Work & IP Rights',
                ],
            ];
        }

        // Formulate Response with Conversational Flow
        $replyBody = $intentResult['message'];
        $suggestions = $intentResult['suggestions'];

        $followUp = '';
        if ($newEmailFound) {
            $followUp = "\n\n(I've noted your email {$visitorEmail} so our technical leads can follow up with any specifications you need!)";
        } elseif (empty($visitorName) && !$isOptOut && rand(1, 2) === 1 && strlen($replyBody) > 100) {
            $followUp = "\n\nBy the way, who do I have the pleasure of speaking with?";
        } elseif (!empty($visitorName) && empty($visitorEmail) && !$isOptOut && $this->isHighIntent($normalized) && rand(1, 2) === 1) {
            $followUp = "\n\nIf you'd like our technical scoping deck or an architectural estimate for your project, {$visitorName}, feel free to share your email!";
        }

        return [
            'message' => trim($replyBody . $followUp),
            'step' => 'conversing',
            'suggestions' => $suggestions,
        ];
    }

    /**
     * Check if Gemini API key is configured.
     */
    public function hasGeminiKey(): bool
    {
        $key = $this->getGeminiKey();
        return !empty($key);
    }

    /**
     * Retrieve Gemini API Key from settings or environment.
     */
    protected function getGeminiKey(): ?string
    {
        try {
            $dbKey = SiteSetting::get('gemini_api_key');
            if (!empty($dbKey)) {
                return trim($dbKey);
            }
        } catch (\Throwable $e) {
            // Database not reachable
        }

        try {
            $configKey = config('services.gemini.api_key');
            if (!empty($configKey)) {
                return trim($configKey);
            }
        } catch (\Throwable $e) {
            // Config helper not initialized
        }

        $envKey = env('GEMINI_API_KEY');
        return !empty($envKey) ? trim($envKey) : null;
    }

    /**
     * Retrieve preferred Gemini model.
     */
    protected function getGeminiModel(): string
    {
        try {
            $dbModel = SiteSetting::get('gemini_model');
            if (!empty($dbModel)) {
                return trim($dbModel);
            }
        } catch (\Throwable $e) {
            // Database not reachable
        }

        try {
            $configModel = config('services.gemini.model');
            if (!empty($configModel)) {
                return trim($configModel);
            }
        } catch (\Throwable $e) {
            // Config helper not initialized
        }

        return env('GEMINI_MODEL', 'gemini-1.5-flash');
    }

    /**
     * Call Google Gemini API with system instructions and chat memory.
     */
    protected function callGeminiApi(ChatSession $session, string $input, string $visitorName, string $visitorEmail): ?array
    {
        $apiKey = $this->getGeminiKey();
        if (empty($apiKey)) {
            return null;
        }

        $model = $this->getGeminiModel();
        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

        // Build System Prompt with comprehensive Bluebase training
        $systemInstruction = $this->buildSystemInstruction($visitorName, $visitorEmail);

        // Fetch past conversation messages for conversational memory
        $contents = [];
        if ($session->exists) {
            $pastMessages = $session->messages()->orderBy('created_at', 'asc')->take(8)->get();
            foreach ($pastMessages as $msg) {
                // Skip the immediate current message if already recorded
                if ($msg->message === $input && $msg->sender === 'user' && $msg->id === $pastMessages->last()->id) {
                    continue;
                }
                $contents[] = [
                    'role' => ($msg->sender === 'bot') ? 'model' : 'user',
                    'parts' => [['text' => $msg->message]],
                ];
            }
        }

        // Add current user input
        $contents[] = [
            'role' => 'user',
            'parts' => [['text' => $input]],
        ];

        try {
            $response = Http::timeout(12)->post($url, [
                'systemInstruction' => [
                    'parts' => [
                        ['text' => $systemInstruction],
                    ],
                ],
                'contents' => $contents,
                'generationConfig' => [
                    'temperature' => 0.7,
                    'maxOutputTokens' => 850,
                ],
            ]);

            if ($response->successful()) {
                $reply = $response->json('candidates.0.content.parts.0.text');
                if (!empty($reply)) {
                    return [
                        'message' => trim($reply),
                        'step' => 'conversing',
                        'suggestions' => $this->deriveSuggestions($input . ' ' . $reply),
                    ];
                }
            } else {
                Log::warning('Gemini API returned error: ' . $response->body());
            }
        } catch (\Throwable $e) {
            Log::warning('Gemini API call exception: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * System instruction that trains the AI model on real Bluebase data.
     */
    protected function buildSystemInstruction(string $visitorName, string $visitorEmail): string
    {
        $nameInfo = $visitorName ? "The visitor's name is {$visitorName}." : "The visitor has not provided their name yet.";
        $emailInfo = $visitorEmail ? "The visitor's email is {$visitorEmail}." : "The visitor has not provided their email yet.";

        return <<<PROMPT
You are the Bluebase AI Engineering Consultant representing Bluebase Technologies.
Bluebase is a modern software engineering and digital transformation agency.

Context About Visitor:
{$nameInfo}
{$emailInfo}

Bluebase Real Facts & Company Knowledge:
1. Location & Origins:
   - Headquartered and founded in Nagpur, Maharashtra, India (Zero Mile City).
   - Operates with a lean, remote-first model with senior developers across India and global delivery reach.
   - 4-6 hours daily timezone overlap with US (EST/PST), UK/Europe (GMT/CET), and Gulf (GST) business hours.
   - Direct Senior Engineer Pods: Clients communicate directly with architects and developers (no account managers or junior pass-offs).
   - Contact: info@bluebasetechnologies.com, Phone: +91 79727 65119, Online Contact Form at /contact.

2. Intellectual Property & Client Guarantees:
   - 100% legal IP Assignment Deed: Clients own all Git repositories, commit history, Figma design systems, database schemas, and cloud accounts from day 1 with zero vendor lock-in.

3. Core Services:
   - SaaS MVP Launchpad: Rapid 3-to-6 week delivery from concept to live production. Multi-tenant workspace isolation, subscription billing (Stripe, Razorpay, Paddle) with automated webhooks, granular RBAC, and developer API sandbox.
   - Mobile App Development: Cross-platform dual launch on iOS & Android using Flutter and React Native (saving 40-50% in development costs). Native Swift/Kotlin modules, offline-first SQLite/Hive caching (<15ms query speed), 99.8% crash-free sessions, and guaranteed 100% App Store and Google Play approval.
   - Custom Full-Stack Web: Decoupled and modern architectures using Next.js, React, Laravel, Node.js, Tailwind CSS, PostgreSQL, and Redis. Sub-second page loads engineered for 90+ Core Web Vitals.
   - AI & Autonomous Agents: Multi-agent orchestration frameworks for complex workflows, Enterprise RAG on private documents and SQL databases, high-speed vector retrieval with Qdrant, Pinecone, or pgvector.
   - UI/UX & Design Studio: Clickable interactive Figma prototypes before writing code, comprehensive design token libraries, responsive layouts, usability heuristic audits.
   - 24/7 SLA & Maintenance: 99.99% uptime guarantee, monthly vulnerability audits, proactive patching, automated backups, and 30-day post-launch warranty.

4. Flagship Case Studies:
   - OMG Rental Bikes (omgrentalbikes.com): Full vehicle rental booking engine, custom fleet management ERP, instant paperless digital KYC verification, Google Business Profile growth, and 100% managed cloud infrastructure.
   - Aarohi Classic 2024: Regional fitness championship digital platform handling high-volume online athlete registrations, automated WhatsApp communication, live score updates, and Meta/Google ad execution with zero downtime.

5. Pricing & Timelines:
   - Fixed-Scope Milestone Contracts (guaranteed deliverables, zero surprise bills).
   - Dedicated Senior Pods (monthly retainers for full-stack developers and designers).
   - Agile Sprint Retainers (2-week sprints).
   - Average timelines: MVP in 3-6 weeks, mobile apps in 6-10 weeks, enterprise web platforms in 6-12 weeks.

Conversational Tone & Guidelines:
- Act like an articulate, senior technical consultant. Be direct, professional, warm, and concise.
- Format responses cleanly using bullet points (•) and bold titles (**Title**) where appropriate.
- If the visitor shares their name or email, acknowledge it naturally.
- If you do not have their name or email yet, occasionally and politely invite them to connect or receive a scoping proposal, but never block the conversation or sound repetitive.
- Keep responses focused, typically between 2 to 4 concise paragraphs.
PROMPT;
    }

    /**
     * Derive relevant quick reply suggestions based on conversational text.
     */
    protected function deriveSuggestions(string $text): array
    {
        $text = strtolower($text);

        if (str_contains($text, 'saas') || str_contains($text, 'mvp')) {
            return ['What is the MVP timeline?', 'Estimated MVP cost', '4-Phase Delivery Process', 'Schedule Discovery Call'];
        }

        if (str_contains($text, 'mobile') || str_contains($text, 'flutter') || str_contains($text, 'app')) {
            return ['Mobile app pricing', 'Cross-platform vs Native', 'Need Figma UI/UX Design', 'Schedule Discovery Call'];
        }

        if (str_contains($text, 'price') || str_contains($text, 'cost') || str_contains($text, 'rate')) {
            return ['Book Discovery Session', 'SaaS MVP Cost Estimate', 'Mobile App Estimate', 'How We Work'];
        }

        if (str_contains($text, 'case study') || str_contains($text, 'omg') || str_contains($text, 'aarohi')) {
            return ['OMG Rental Bikes Details', 'Aarohi Classic Details', 'Schedule Discovery Call', 'Explore All Services'];
        }

        return [
            'SaaS MVP in 3-6 Weeks',
            'Mobile App Development',
            'Custom Web Platforms',
            'AI & Autonomous Agents',
            'Pricing & Timeline',
        ];
    }

    /**
     * Extract human name from message if not asking a service question.
     */
    protected function extractName(string $input, string $normalized, ChatSession $session): ?string
    {
        // 1. Explicit pattern: "my name is Alex", "name is Rahul", "call me Priya"
        if (preg_match('/\b(?:my name is|name is|call me|i am called)\s+([a-zA-Z\s\.\'-]{2,35})/i', $input, $m)) {
            $raw = $m[1];
            $parts = preg_split('/\b(and|my|email|phone|from|with|,|\.)\b/i', $raw);
            $candidate = trim(preg_replace('/[^a-zA-Z\s\.\'-]/', '', $parts[0] ?? $raw));
            if (!preg_match('/\b(looking|interested|seeking|trying|building|wondering|asking|happy)\b/i', $candidate) && strlen($candidate) >= 2) {
                $words = array_values(array_filter(explode(' ', $candidate)));
                return ucwords(strtolower(implode(' ', array_slice($words, 0, 3))));
            }
        }

        // 2. Pattern for "I am [Name]" or "I'm [Name]"
        if (preg_match('/\b(?:i am|i\'m|this is)\s+([a-zA-Z\s\.\'-]{2,35})/i', $input, $m)) {
            $raw = $m[1];
            $parts = preg_split('/\b(and|my|email|phone|from|with|,|\.)\b/i', $raw);
            $candidate = trim(preg_replace('/[^a-zA-Z\s\.\'-]/', '', $parts[0] ?? $raw));
            if (!preg_match('/\b(looking|interested|seeking|trying|building|wondering|asking|happy)\b/i', $candidate) && strlen($candidate) >= 2) {
                $words = array_values(array_filter(explode(' ', $candidate)));
                return ucwords(strtolower(implode(' ', array_slice($words, 0, 3))));
            }
        }

        // 3. If name is already set, do not re-extract from arbitrary words
        if (!empty($session->visitor_name)) {
            return null;
        }

        // 4. If input is a question or contains service inquiry keywords, IT IS NOT A NAME
        if ($this->isQuestion($normalized) || $this->hasInquiryKeywords($normalized)) {
            return null;
        }

        // 5. Standalone name: 1 to 3 words, all letters, length 2 to 35
        $cleaned = trim(preg_replace('/[^a-zA-Z\s]/', '', $input));
        $words = array_filter(explode(' ', $cleaned));
        if (count($words) >= 1 && count($words) <= 3 && strlen($cleaned) >= 2 && strlen($cleaned) <= 35) {
            $firstWord = strtolower($words[0]);
            $blacklist = ['hello', 'hi', 'hey', 'help', 'test', 'yes', 'no', 'nope', 'none', 'ok', 'okay', 'sure', 'thanks', 'thank', 'cool', 'good', 'services', 'pricing', 'cost', 'bluebase', 'skip', 'later', 'pass', 'nothing', 'stop'];
            if (!in_array($firstWord, $blacklist)) {
                return ucwords(strtolower(implode(' ', $words)));
            }
        }

        return null;
    }

    /**
     * Checks if input contains question indicators.
     */
    protected function isQuestion(string $input): bool
    {
        return str_contains($input, '?') ||
               preg_match('/\b(what|how|why|who|where|when|can|could|do|does|will|would|is|are|tell me|explain)\b/i', $input);
    }

    /**
     * Checks if input has service inquiry keywords.
     */
    protected function hasInquiryKeywords(string $input): bool
    {
        return preg_match('/\b(service|web|website|app|mobile|flutter|react|saas|mvp|ai|rag|agent|pricing|price|cost|quote|timeline|time|nagpur|office|contact|email|phone|hire|career|job|figma|design|cloud|devops|aws|database|laravel|node|portfolio|case study|omg|aarohi)\b/i', $input);
    }

    /**
     * Checks if user shows high commercial buying intent.
     */
    protected function isHighIntent(string $input): bool
    {
        return preg_match('/\b(price|pricing|cost|estimate|quote|hire|start|build|contract|proposal|timeline|budget|nda)\b/i', $input);
    }

    /**
     * Local Fallback Knowledge Intent Matcher.
     */
    protected function matchKnowledgeIntent(string $input, ChatSession $session): array
    {
        $visitorName = $session->visitor_name ?: '';
        $namePrefix = $visitorName ? "{$visitorName}, " : "";

        // 1. Case Studies & Proven Work (OMG Rental Bikes & Aarohi Classic) - High Priority
        if ($this->matches($input, ['case study', 'case studies', 'portfolio', 'past work', 'proof of work', 'what have you built', 'examples of your work', 'omg rental', 'aarohi'])) {
            return [
                'matched_intent' => 'case_studies',
                'message' => "Here are two flagship platforms engineered and delivered by Bluebase:\n\n" .
                    "1. **OMG Rental Bikes (`omgrentalbikes.com`)**:\n" .
                    "   • End-to-end mobility booking engine and vehicle fleet ERP.\n" .
                    "   • Instant paperless digital KYC verification for riders.\n" .
                    "   • Automated payment settlement, Google Business Profile growth, and 100% managed cloud infrastructure.\n\n" .
                    "2. **Aarohi Classic 2024**:\n" .
                    "   • Regional championship digital operations handling thousands of concurrent athlete and spectator registrations.\n" .
                    "   • Automated WhatsApp broadcast communication and live score management with zero downtime.\n" .
                    "   • Comprehensive Meta and Google ad acquisition campaigns.\n\n" .
                    "Would you like more details on either of these case studies, or a walk-through relevant to your industry?",
                'suggestions' => ['OMG Rental Bikes Details', 'Aarohi Classic Details', 'Client Logos & Brands', 'Book Discovery Session'],
            ];
        }

        // 2. Services Overview / What does Bluebase do
        if ($this->matches($input, ['what do you do', 'what services', 'services do you provide', 'services you offer', 'tell me about your services', 'what can you build', 'what does bluebase do', 'capabilities', 'list of services', 'all services'])) {
            return [
                'matched_intent' => 'services_overview',
                'message' => "At **Bluebase Technologies**, we provide end-to-end digital engineering across 5 core pillars:\n\n" .
                    "1. **SaaS MVP Launchpad**: Rapid 3 to 6-week product delivery from concept to production with multi-tenant architecture and Stripe billing.\n" .
                    "2. **Mobile App Development**: Fluid cross-platform dual launch (iOS & Android) with Flutter and React Native with offline SQLite caching.\n" .
                    "3. **Custom Full-Stack Web**: High-throughput web applications with Next.js, React, Laravel, Node.js, and cloud backends.\n" .
                    "4. **AI & Autonomous Agents**: Domain-specific multi-agent workflows and enterprise RAG pipelines on private company data.\n" .
                    "5. **UI/UX & Design Systems**: Human-centered interactive Figma prototypes, design tokens, and conversion optimization.\n\n" .
                    "Which of these areas aligns with your current project goals?",
                'suggestions' => ['SaaS MVP Launchpad', 'Mobile App Development', 'Custom Web Platforms', 'AI & Autonomous Agents', 'Pricing & Timeline'],
            ];
        }

        // 3. SaaS MVP Development
        if ($this->matches($input, ['saas', 'mvp', 'minimum viable', 'startup launch', 'launchpad', 'prototype', 'mrr', 'multi-tenant', 'multitenant', 'tenant', 'stripe billing'])) {
            return [
                'matched_intent' => 'saas_mvp',
                'message' => "Our **SaaS MVP Launchpad** is engineered specifically for founders and enterprise innovators who need to launch in 3 to 6 weeks:\n\n" .
                    "• **Disciplined 3-6 Week Sprints**: Rapid delivery from architectural blueprint to live cloud production.\n" .
                    "• **Multi-Tenant Architecture**: Robust tenant workspace isolation, custom domain support, and database partitioning.\n" .
                    "• **Billing & Monetization Engine**: Integrated Stripe, Razorpay, or Paddle subscriptions with automated webhook orchestration for upgrades, downgrades, and dunning.\n" .
                    "• **Role-Based Access Control (RBAC)**: Granular roles (Owner, Admin, Member, Viewer) with fine-grained permission guards.\n" .
                    "• **100% Client-Owned Source Code**: You receive full IP assignment, commit history, and infrastructure access from day 1 with zero vendor lock-in.\n\n" .
                    "Would you like to discuss the core features for your SaaS MVP or review our 4-stage sprint delivery process?",
                'suggestions' => ['What is the MVP timeline?', 'Estimated MVP cost', '4-Phase Delivery Process', 'Book an Architecture Call'],
            ];
        }

        // 4. Mobile App Development
        if ($this->matches($input, ['mobile', 'app', 'android', 'ios', 'flutter', 'react native', 'iphone', 'play store', 'app store', 'cross platform', 'native app'])) {
            return [
                'matched_intent' => 'mobile_apps',
                'message' => "Our **Mobile Engineering Team** builds fluid, high-retention cross-platform applications for iOS and Android:\n\n" .
                    "• **Cross-Platform Dual Launch**: Single-codebase efficiency with Flutter and React Native, saving 40-50% in development and ongoing maintenance costs.\n" .
                    "• **Native Hardware Integration**: Deep integration with camera, GPS, Bluetooth, biometric authentication, and push notifications.\n" .
                    "• **Offline-First Architecture**: Local SQLite and Hive caching providing sub-15ms cached local query speeds so users never see blank screens.\n" .
                    "• **Guaranteed Store Approval**: 100% track record for Apple App Store and Google Play Store compliance, submission, and publication.\n" .
                    "• **High Reliability**: Engineered for 99.8% crash-free sessions with automated crash reporting and remote telemetry.\n\n" .
                    "Do you have wireframes ready, or would you like our product team to design clickable Figma prototypes first?",
                'suggestions' => ['Need Figma UI/UX Design', 'Have specifications ready', 'Mobile app pricing', 'Cross-platform vs Native'],
            ];
        }

        // 5. Web & Full-Stack Development
        if ($this->matches($input, ['web development', 'web app', 'website', 'laravel', 'nextjs', 'next.js', 'react', 'vue', 'node', 'full stack', 'fullstack', 'backend', 'frontend', 'portal', 'tailwind'])) {
            return [
                'matched_intent' => 'web_development',
                'message' => "Our **Full-Stack Web Engineering** practice builds enterprise-grade, high-throughput web applications:\n\n" .
                    "• **Modern Decoupled Tech Stack**: Next.js, React, Laravel, Node.js, Tailwind CSS, PostgreSQL, and Redis.\n" .
                    "• **High Throughput & Speed**: Sub-second page loads, aggressive database query indexing, and CDN asset distribution for 90+ Core Web Vitals.\n" .
                    "• **Enterprise Security**: SSO integration, OAuth2, multi-factor authentication (MFA), CSRF protection, and AES-256 data encryption.\n" .
                    "• **API & Microservices Architecture**: Clean RESTful and GraphQL APIs built for horizontal scaling across cloud providers.\n\n" .
                    "Are you planning a brand-new application from scratch, or modernizing an existing web platform?",
                'suggestions' => ['Build from scratch', 'Modernize existing application', 'Web development pricing', 'API & Backend details'],
            ];
        }

        // 6. AI & Autonomous Agent Pipelines
        if ($this->matches($input, ['ai', 'artificial intelligence', 'autonomous', 'agent', 'rag', 'llm', 'vector', 'qdrant', 'pinecone', 'machine learning', 'automation', 'nlp', 'bot'])) {
            return [
                'matched_intent' => 'ai_agents',
                'message' => "Bluebase develops custom **Autonomous AI Agents & Enterprise RAG Pipelines** tailored to your business data:\n\n" .
                    "• **Multi-Agent Orchestration**: Specialized autonomous agent pods that coordinate to execute complex multi-step workflows.\n" .
                    "• **Enterprise RAG Systems**: Retrieval-Augmented Generation indexing your private internal documentation, PDFs, and SQL databases.\n" .
                    "• **Vector Database Infrastructure**: High-speed embeddings storage and sub-second semantic search using Qdrant, Pinecone, or pgvector.\n" .
                    "• **Workflow Automation**: Automated document parsing, invoice processing, CRM data enrichment, and intelligent conversational assistants.\n\n" .
                    "What specific task or operational process are you looking to automate with AI?",
                'suggestions' => ['Internal Document RAG', 'Automated Workflow Agents', 'Customer Support AI', 'Schedule AI Consultation'],
            ];
        }

        // 7. UI/UX Design & Figma Systems
        if ($this->matches($input, ['ui', 'ux', 'design', 'figma', 'prototype', 'wireframe', 'user experience', 'user interface', 'branding', 'design system', 'tokens'])) {
            return [
                'matched_intent' => 'ui_ux',
                'message' => "Our **UI/UX & Product Design Studio** crafts conversion-focused, intuitive interfaces before a single line of code is written:\n\n" .
                    "• **Interactive Clickable Prototypes**: High-fidelity Figma prototypes allowing you to validate user flows and investor presentations.\n" .
                    "• **Scalable Design Systems**: Standardized design tokens (typography, color palettes, spacing, components) for pixel-perfect developer handoff.\n" .
                    "• **Responsive Multi-Viewport Layouts**: Flawless experiences across mobile, tablet, desktop, and ultra-wide displays.\n" .
                    "• **Usability & Heuristic Audits**: In-depth analysis of existing products to eliminate user friction and boost conversion rates.\n\n" .
                    "Do you need a fresh design from concept, or a revamp of an existing application?",
                'suggestions' => ['New concept design', 'Revamp existing product', 'UI/UX design timeline', 'View Design Case Studies'],
            ];
        }

        // 8. Pricing, Cost, Estimates & Quotes
        if ($this->matches($input, ['price', 'pricing', 'cost', 'quote', 'estimate', 'rate', 'how much', 'fee', 'charge', 'budget', 'expensive', 'cheap'])) {
            return [
                'matched_intent' => 'pricing',
                'message' => "{$namePrefix}our pricing is transparent, predictable, and tailored to project requirements:\n\n" .
                    "• **Fixed-Scope Milestone Contracts**: Clearly defined deliverables, timeline, and milestone payment stages. Best for SaaS MVPs, web revamps, and standalone apps. You get guaranteed deliverables with zero surprise bills.\n" .
                    "• **Dedicated Senior Engineering Pods**: Full-time dedicated senior developers, UI/UX designers, and QA engineers on a monthly retainer. Perfect for continuous product scaling.\n" .
                    "• **Agile Sprint Billing**: Bi-weekly sprints providing maximum agility as your product scope evolves.\n\n" .
                    "We provide a comprehensive technical specification proposal and itemized estimate within 48 hours of a 30-minute discovery call.\n\n" .
                    "Would you like to schedule a 30-minute whiteboard discovery session for your project?",
                'suggestions' => ['Book Discovery Session', 'SaaS MVP Cost Estimate', 'Mobile App Estimate', 'How We Work'],
            ];
        }

        // 9. Timelines & Delivery Speed
        if ($this->matches($input, ['timeline', 'duration', 'how long', 'weeks', 'months', 'deadline', 'turnaround', 'speed', 'fast', 'delivery time'])) {
            return [
                'matched_intent' => 'timeline',
                'message' => "Here is how our typical delivery schedules look by project scale:\n\n" .
                    "• **SaaS MVP Launchpad**: 3 to 6 weeks from kickoff to production deployment.\n" .
                    "• **Cross-Platform Mobile App**: 6 to 10 weeks including App Store and Google Play approvals.\n" .
                    "• **Custom Web Application / Enterprise Portal**: 6 to 12 weeks depending on integration complexity.\n" .
                    "• **Clickable Figma UI/UX Prototype**: 1 to 2 weeks.\n\n" .
                    "All projects follow structured 2-week agile sprints with bi-weekly live staging demos so you test working software continuously.",
                'suggestions' => ['SaaS MVP 3-6 Week Sprint', 'Mobile App Timeline', '4-Phase Delivery Process', 'Get Started'],
            ];
        }

        // 10. Company Origins, Location, Team & Nagpur
        if ($this->matches($input, ['where', 'location', 'headquarters', 'hq', 'office', 'nagpur', 'india', 'about', 'who are you', 'team', 'remote', 'founders'])) {
            return [
                'matched_intent' => 'company',
                'message' => "Here is who we are at **Bluebase Technologies**:\n\n" .
                    "• **Headquarters & Origin**: Founded and registered in **Nagpur, Maharashtra, India** (Zero Mile City).\n" .
                    "• **Remote-First Architecture**: Operating with a lean, senior-led engineering pod model that delivers worldwide without traditional agency overhead.\n" .
                    "• **Global Reach**: Collaborating with founders and enterprises across North America, Europe, Australia, and the Middle East.\n" .
                    "• **Direct Developer Access**: You speak directly with senior architects and software engineers—no non-technical account managers or junior pass-offs.\n" .
                    "• **Timezone Overlap**: Dedicated 4 to 6 hours daily overlap with US (EST/PST), European (GMT/CET), and Gulf business hours.\n\n" .
                    "Would you like to connect with our engineering leadership for a quick virtual discovery call?",
                'suggestions' => ['Schedule a Discovery Call', 'Explore Services', 'View Case Studies', 'Contact Information'],
            ];
        }

        // 11. How We Work, IP Ownership & Security
        if ($this->matches($input, ['how we work', 'process', 'methodology', 'ip ownership', 'intellectual property', 'code ownership', 'nda', 'security', 'guarantee', 'warranty'])) {
            return [
                'matched_intent' => 'how_we_work',
                'message' => "The **Bluebase Delivery Standard** is built on transparency, client ownership, and engineering rigor:\n\n" .
                    "1. **Pre-Call Mutual NDA**: Your ideas and proprietary data are protected before any deep technical discussion.\n" .
                    "2. **100% IP Assignment Deed**: You own all Git repositories, commit histories, database schemas, and Figma tokens from day 1.\n" .
                    "3. **Structured 4-Phase Delivery**: Scope & Architecture → Clickable Prototype → Agile Sprints → Production Deployment.\n" .
                    "4. **Bi-Weekly Staging Demos**: Real working software deployed to private staging URLs every 2 weeks.\n" .
                    "5. **30-Day Comprehensive Warranty**: Complete post-launch support and bug-fix warranty on all production handovers.\n\n" .
                    "Would you like to review our detailed process or set up an initial consultation?",
                'suggestions' => ['Book Discovery Session', 'View Services', 'SaaS MVP Launchpad', 'Contact Information'],
            ];
        }

        // 12. Maintenance, Support & 24/7 SLA
        if ($this->matches($input, ['maintenance', 'support', 'sla', 'uptime', 'bug fix', 'patch', 'audit', 'monitoring', 'backup', 'retainer'])) {
            return [
                'matched_intent' => 'maintenance',
                'message' => "Our **Maintenance & 24/7 SLA Engineering** guarantees high availability, security, and continuous health:\n\n" .
                    "• **99.99% Uptime Guarantee**: Automated multi-region health checks and failover triggers.\n" .
                    "• **Continuous Security Patching**: Monthly vulnerability scans, dependency audits, and proactive security updates.\n" .
                    "• **Automated Encrypted Backups**: Daily database snapshots stored in isolated cold storage with instant recovery procedures.\n" .
                    "• **Proactive Performance Tuning**: Database query profiling, server resource monitoring, and Redis caching optimization.\n\n" .
                    "Do you have an existing application that needs maintenance or performance optimization?",
                'suggestions' => ['Optimize existing platform', 'Request Security Audit', 'Web Development Services', 'Talk to Engineer'],
            ];
        }

        // 13. E-Commerce Development
        if ($this->matches($input, ['ecommerce', 'e-commerce', 'online store', 'cart', 'checkout', 'payment gateway', 'shopify', 'products'])) {
            return [
                'matched_intent' => 'ecommerce',
                'message' => "Our **E-Commerce Engineering** builds ultra-fast, high-converting digital storefronts:\n\n" .
                    "• **Headless & Custom Architectures**: Sub-second load speeds that boost organic SEO and checkout conversions.\n" .
                    "• **Payment Gateways**: Seamless integration with Stripe, Razorpay, PayPal, Apple Pay, and Google Pay.\n" .
                    "• **Inventory & Order Automation**: Real-time stock synchronization, automated invoice generation, and courier tracking APIs.\n" .
                    "• **Conversion Optimization**: Frictionless 1-page checkout flows and automated abandoned cart recovery.\n\n" .
                    "Are you building a custom shopping platform or scaling an existing online brand?",
                'suggestions' => ['Custom E-Commerce Platform', 'Checkout Optimization', 'Get an Estimate', 'View Case Studies'],
            ];
        }

        // 14. Careers, Jobs & Hiring
        if ($this->matches($input, ['career', 'job', 'hiring', 'internship', 'apply', 'vacancy', 'positions', 'openings', 'work with you'])) {
            return [
                'matched_intent' => 'careers',
                'message' => "We are always seeking talented engineers, designers, and problem solvers:\n\n" .
                    "• **Active Openings**: Senior Laravel Full-Stack Engineers, Next.js/React Developers, Flutter Mobile Developers, and UI/UX Designers.\n" .
                    "• **How to Apply**: Visit our Careers portal at `/careers` to view open job requisitions.\n" .
                    "• **Direct Application**: Send your resume, GitHub profile, and portfolio directly to `careers@bluebase.com`.\n\n" .
                    "Our talent acquisition team reviews all applications within 48 business hours.",
                'suggestions' => ['View Careers Page', 'Contact Support', 'About Bluebase'],
            ];
        }

        // 15. Contact, Call, Meeting & Official Inquiries
        if ($this->matches($input, ['how to contact', 'contact info', 'contact number', 'phone number', 'call you', 'schedule a call', 'book a call', 'book a meeting', 'speak with human', 'talk to human', 'reach out', 'office email'])) {
            return [
                'matched_intent' => 'contact',
                'message' => "Here is how you can connect directly with our technology team:\n\n" .
                    "• **Official Inquiries**: `info@bluebasetechnologies.com`\n" .
                    "• **Direct Phone**: `+91 79727 65119`\n" .
                    "• **Online Contact**: Visit `/contact` to submit your project requirements through our interactive form.\n" .
                    "• **Location**: Nagpur, Maharashtra, India (Zero Mile City) with global client coverage.\n" .
                    "• **Response Time**: Our solutions director reviews all inquiries and responds with an initial technical assessment within 24 business hours.",
                'suggestions' => ['Go to Contact Page', 'Explore Web Services', 'SaaS MVP in 3-6 Weeks', 'Mobile App Development'],
            ];
        }

        // 16. Greetings
        if ($this->matches($input, ['hello', 'hi', 'hey', 'good morning', 'good afternoon', 'good evening', 'greetings', 'yo'])) {
            $greeting = $visitorName ? "Hello {$visitorName}!" : "Hello!";
            return [
                'matched_intent' => 'greeting',
                'message' => "{$greeting} Great to connect with you. I am your Bluebase technical advisor.\n\nWhat kind of digital product or engineering service are you looking to explore today?",
                'suggestions' => [
                    'SaaS MVP Launchpad',
                    'Mobile App Development',
                    'Custom Web Engineering',
                    'AI & Autonomous Agents',
                    'Pricing & Timeline',
                ],
            ];
        }

        // 17. Appreciation / Courtesy
        if ($this->matches($input, ['thank', 'thanks', 'appreciate', 'awesome', 'great', 'cool', 'perfect', 'ok', 'okay', 'got it'])) {
            $thanks = $visitorName ? "You are very welcome, {$visitorName}!" : "You are very welcome!";
            return [
                'matched_intent' => 'gratitude',
                'message' => "{$thanks} If there is anything else you need—whether technical specs, sprint pricing, or architectural guidance—I am always here to assist.\n\nWould you like to explore our case studies or schedule a 30-minute discovery call?",
                'suggestions' => ['Schedule a Discovery Call', 'OMG Rental Bikes Case Study', 'Explore Services', 'Our 4-Phase Process'],
            ];
        }

        // 18. Intelligent Contextual Fallback
        return [
            'matched_intent' => null,
            'message' => "{$namePrefix}at Bluebase Technologies, we specialize in high-performance digital engineering:\n\n" .
                "• **SaaS MVP Launchpad**: From idea to live production in 3 to 6 weeks with multi-tenant architecture and Stripe billing.\n" .
                "• **Mobile Applications**: Dual-launch iOS & Android apps with Flutter and React Native.\n" .
                "• **Enterprise Web Platforms**: Ultra-fast web portals built on Next.js, Laravel, and cloud microservices.\n" .
                "• **AI & Autonomous Agents**: Domain-specific autonomous workflows and RAG data pipelines.\n\n" .
                "Could you tell me a little more about what you are planning to build, or select one of the areas below?",
            'suggestions' => [
                'SaaS MVP in 3-6 Weeks',
                'Mobile App Development',
                'Custom Web Platforms',
                'AI & Autonomous Agents',
                'Pricing & Timeline',
                'Contact Our Team',
            ],
        ];
    }

    /**
     * Check if message matches any of the keywords with word boundary protection for short words.
     */
    protected function matches(string $input, array $keywords): bool
    {
        foreach ($keywords as $keyword) {
            $kw = strtolower($keyword);
            if (strlen($kw) <= 3) {
                if (preg_match('/\b' . preg_quote($kw, '/') . '\b/i', $input)) {
                    return true;
                }
            } else {
                if (str_contains($input, $kw)) {
                    return true;
                }
            }
        }
        return false;
    }
}
