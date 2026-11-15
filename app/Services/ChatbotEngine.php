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
            'message' => "Hello! I am your Bluebase AI engineering advisor. Tell me about your software idea, project requirements, or questions, and let's discuss how we can build it.",
            'step' => 'conversing',
            'suggestions' => [],
        ];
    }

    /**
     * Dynamic conversational processor tailored directly to the user.
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

        // 2. Extract Name if explicitly stated or introducing self
        $newNameFound = false;
        $extractedName = $this->extractName($input, $normalized, $session);
        if ($extractedName && $session->visitor_name !== $extractedName) {
            $session->visitor_name = $extractedName;
            $newNameFound = true;
        }

        // 3. Mark step as conversing
        $session->step = 'conversing';
        if ($session->exists) {
            $session->save();
        }

        $visitorName = $session->visitor_name ?: '';
        $visitorEmail = $session->visitor_email ?: '';

        // 4. Live AI Generation (Google Gemini / OpenAI)
        if ($this->hasAiApiKey()) {
            $aiResult = $this->callAiApi($session, $input, $visitorName, $visitorEmail);
            if ($aiResult !== null) {
                return $aiResult;
            }
        }

        // 5. Dynamic Contextual Responder (Zero predefined static scripts)
        return $this->generateDynamicResponse($session, $input, $normalized, $visitorName, $visitorEmail, $newEmailFound, $newNameFound);
    }

    /**
     * Check if an AI API key (Gemini or OpenAI) is configured.
     */
    public function hasAiApiKey(): bool
    {
        $key = $this->getAiApiKey();
        return !empty($key);
    }

    /**
     * Retrieve AI API Key from settings or environment.
     */
    public function getAiApiKey(): ?string
    {
        // 1. Database SiteSetting
        try {
            $dbKey = SiteSetting::get('gemini_api_key') ?: SiteSetting::get('ai_api_key');
            if (!empty($dbKey) && strlen(trim($dbKey)) > 5) {
                return trim($dbKey);
            }
        } catch (\Throwable $e) {}

        // 2. Storage file backup (storage/app/ai_key.txt)
        try {
            $filePath = storage_path('app/ai_key.txt');
            if (file_exists($filePath)) {
                $savedKey = trim(file_get_contents($filePath));
                if (!empty($savedKey) && strlen($savedKey) > 5) {
                    return $savedKey;
                }
            }
        } catch (\Throwable $e) {}

        // 3. Config services
        try {
            $configKey = config('services.gemini.api_key');
            if (!empty($configKey) && strlen(trim($configKey)) > 5) {
                return trim($configKey);
            }
        } catch (\Throwable $e) {}

        // 4. Environment Variables
        $envKey = env('GEMINI_API_KEY') ?: env('AI_API_KEY') ?: env('OPENAI_API_KEY');
        if (!empty($envKey) && strlen(trim($envKey)) > 5) {
            return trim($envKey);
        }

        return null;
    }

    /**
     * Call Live AI API (Gemini or OpenAI) based on key prefix.
     */
    protected function callAiApi(ChatSession $session, string $input, string $visitorName, string $visitorEmail): ?array
    {
        $apiKey = $this->getAiApiKey();
        if (empty($apiKey)) {
            return null;
        }

        // If key begins with "sk-", call OpenAI API
        if (str_starts_with($apiKey, 'sk-')) {
            return $this->callOpenAiApi($apiKey, $session, $input, $visitorName, $visitorEmail);
        }

        // Default to Google Gemini API
        return $this->callGeminiApi($apiKey, $session, $input, $visitorName, $visitorEmail);
    }

    /**
     * Call Google Gemini API with fallback retries and robust parsing.
     */
    protected function callGeminiApi(string $apiKey, ChatSession $session, string $input, string $visitorName, string $visitorEmail): ?array
    {
        $cleanApiKey = trim($apiKey, " \t\n\r\0\x0B\"'");
        $model = 'gemini-1.5-flash';
        try {
            $dbModel = SiteSetting::get('gemini_model');
            if (!empty($dbModel)) {
                $model = trim($dbModel);
            } else {
                $model = env('GEMINI_MODEL', 'gemini-1.5-flash');
            }
        } catch (\Throwable $e) {
            $model = env('GEMINI_MODEL', 'gemini-1.5-flash');
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$cleanApiKey}";
        $systemPrompt = $this->buildSystemInstruction($visitorName, $visitorEmail);
        $contents = $this->buildGeminiContents($session, $input);

        try {
            $response = Http::withoutVerifying()
                ->timeout(15)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'x-goog-api-key' => $cleanApiKey,
                ])
                ->post($url, [
                    'systemInstruction' => [
                        'parts' => [
                            ['text' => $systemPrompt],
                        ],
                    ],
                    'contents' => $contents,
                    'generationConfig' => [
                        'temperature' => 0.7,
                        'maxOutputTokens' => 800,
                    ],
                ]);

            if ($response->successful()) {
                $reply = $this->extractGeminiResponseText($response->json());
                if ($reply !== null) {
                    return [
                        'message' => $reply,
                        'step' => 'conversing',
                        'suggestions' => [],
                    ];
                }
            } else {
                Log::warning('Gemini API Error [' . $response->status() . ']: ' . $response->body());

                // If 404 (model not found) and model was not gemini-1.5-flash, fallback to gemini-1.5-flash
                if ($response->status() === 404 && $model !== 'gemini-1.5-flash') {
                    $fallbackUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$cleanApiKey}";
                    $retry = Http::withoutVerifying()->timeout(15)
                        ->withHeaders(['Content-Type' => 'application/json', 'x-goog-api-key' => $cleanApiKey])
                        ->post($fallbackUrl, [
                            'systemInstruction' => ['parts' => [['text' => $systemPrompt]]],
                            'contents' => $contents,
                            'generationConfig' => ['temperature' => 0.7, 'maxOutputTokens' => 800],
                        ]);
                    if ($retry->successful()) {
                        $reply = $this->extractGeminiResponseText($retry->json());
                        if ($reply !== null) {
                            return ['message' => $reply, 'step' => 'conversing', 'suggestions' => []];
                        }
                    }
                }

                // If 400 Bad Request, retry with system prompt prepended into the first user turn
                if ($response->status() === 400) {
                    $contentsWithSystem = $contents;
                    if (!empty($contentsWithSystem) && $contentsWithSystem[0]['role'] === 'user') {
                        $contentsWithSystem[0]['parts'][0]['text'] = "Context & Instructions:\n" . $systemPrompt . "\n\nUser Question:\n" . $contentsWithSystem[0]['parts'][0]['text'];
                    }
                    $retry2 = Http::withoutVerifying()->timeout(15)
                        ->withHeaders(['Content-Type' => 'application/json', 'x-goog-api-key' => $cleanApiKey])
                        ->post($url, [
                            'contents' => $contentsWithSystem,
                            'generationConfig' => ['temperature' => 0.7, 'maxOutputTokens' => 800],
                        ]);
                    if ($retry2->successful()) {
                        $reply = $this->extractGeminiResponseText($retry2->json());
                        if ($reply !== null) {
                            return ['message' => $reply, 'step' => 'conversing', 'suggestions' => []];
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            Log::warning('Gemini API Exception: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Extract clean text response from Gemini API payload parts.
     */
    protected function extractGeminiResponseText(array $data): ?string
    {
        $parts = $data['candidates'][0]['content']['parts'] ?? [];
        $text = '';
        foreach ($parts as $part) {
            if (!empty($part['text'])) {
                $text .= $part['text'];
            }
        }
        $text = trim($text);
        return $text !== '' ? $text : null;
    }

    /**
     * Build strictly alternating contents array compliant with Google Gemini API requirements:
     * 1. Must start with role 'user'.
     * 2. Roles must strictly alternate between 'user' and 'model'.
     * 3. Must end with role 'user' containing the latest user message.
     */
    protected function buildGeminiContents(ChatSession $session, string $input): array
    {
        $rawMessages = [];
        if ($session->exists) {
            // Get the recent messages in chronological order
            $rawMessages = $session->messages()
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get()
                ->reverse();
        }

        $contents = [];
        $trimmedInput = trim($input);

        foreach ($rawMessages as $msg) {
            $text = trim($msg->message);
            if ($text === '') continue;

            $role = ($msg->sender === 'bot') ? 'model' : 'user';

            // First turn in Gemini payload MUST be 'user'
            if (empty($contents)) {
                if ($role === 'user') {
                    $contents[] = [
                        'role' => 'user',
                        'parts' => [['text' => $text]],
                    ];
                }
                continue;
            }

            $lastIdx = count($contents) - 1;
            if ($contents[$lastIdx]['role'] === $role) {
                // Merge consecutive messages from same role to satisfy Gemini alternating requirement
                if ($contents[$lastIdx]['parts'][0]['text'] !== $text) {
                    $contents[$lastIdx]['parts'][0]['text'] .= "\n" . $text;
                }
            } else {
                $contents[] = [
                    'role' => $role,
                    'parts' => [['text' => $text]],
                ];
            }
        }

        // Ensure the current user message is the final 'user' turn
        if (empty($contents)) {
            $contents[] = [
                'role' => 'user',
                'parts' => [['text' => $trimmedInput]],
            ];
        } else {
            $lastIdx = count($contents) - 1;
            if ($contents[$lastIdx]['role'] === 'user') {
                if ($contents[$lastIdx]['parts'][0]['text'] !== $trimmedInput) {
                    $contents[$lastIdx]['parts'][0]['text'] = $trimmedInput;
                }
            } else {
                $contents[] = [
                    'role' => 'user',
                    'parts' => [['text' => $trimmedInput]],
                ];
            }
        }

        // Final sanity check: remove any leading 'model' turns and ensure strict alternation
        $sanitized = [];
        foreach ($contents as $turn) {
            if (empty($sanitized)) {
                if ($turn['role'] === 'user') {
                    $sanitized[] = $turn;
                }
                continue;
            }
            $lastIdx = count($sanitized) - 1;
            if ($sanitized[$lastIdx]['role'] === $turn['role']) {
                $sanitized[$lastIdx]['parts'][0]['text'] .= "\n" . $turn['parts'][0]['text'];
            } else {
                $sanitized[] = $turn;
            }
        }

        if (empty($sanitized)) {
            $sanitized[] = [
                'role' => 'user',
                'parts' => [['text' => $trimmedInput]],
            ];
        }

        return $sanitized;
    }

    /**
     * Call OpenAI API as alternate provider.
     */
    protected function callOpenAiApi(string $apiKey, ChatSession $session, string $input, string $visitorName, string $visitorEmail): ?array
    {
        $systemPrompt = $this->buildSystemInstruction($visitorName, $visitorEmail);
        $messages = $this->buildOpenAiMessages($session, $input, $systemPrompt);

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Content-Type' => 'application/json',
            ])->timeout(12)->post('https://api.openai.com/v1/chat/completions', [
                'model' => env('OPENAI_MODEL', 'gpt-4o-mini'),
                'messages' => $messages,
                'temperature' => 0.7,
                'max_tokens' => 800,
            ]);

            if ($response->successful()) {
                $reply = $response->json('choices.0.message.content');
                if (!empty($reply)) {
                    return [
                        'message' => trim($reply),
                        'step' => 'conversing',
                        'suggestions' => [],
                    ];
                }
            }
        } catch (\Throwable $e) {
            Log::warning('OpenAI API Exception: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Build clean OpenAI messages array.
     */
    protected function buildOpenAiMessages(ChatSession $session, string $input, string $systemPrompt): array
    {
        $messages = [
            ['role' => 'system', 'content' => $systemPrompt],
        ];

        $trimmedInput = trim($input);
        if ($session->exists) {
            $pastMessages = $session->messages()->orderBy('created_at', 'asc')->take(12)->get();
            foreach ($pastMessages as $msg) {
                $text = trim($msg->message);
                if ($text === '') continue;

                $role = ($msg->sender === 'bot') ? 'assistant' : 'user';
                $messages[] = [
                    'role' => $role,
                    'content' => $text,
                ];
            }
        }

        $last = end($messages);
        if ($last['role'] !== 'user' || $last['content'] !== $trimmedInput) {
            $messages[] = ['role' => 'user', 'content' => $trimmedInput];
        }

        return $messages;
    }

    /**
     * System instruction that trains the AI on Bluebase and directs it to have natural, question-and-answer dialogue based on the user.
     */
    protected function buildSystemInstruction(string $visitorName, string $visitorEmail): string
    {
        $nameInfo = $visitorName ? "The visitor's name is {$visitorName}." : "The visitor has not provided their name yet.";
        $emailInfo = $visitorEmail ? "The visitor's email is {$visitorEmail}." : "The visitor has not provided their email yet.";

        return <<<PROMPT
You are the Bluebase AI Software Engineering Advisor for Bluebase Technologies.
Bluebase is an agile software engineering and digital transformation agency.

Context About Visitor:
{$nameInfo}
{$emailInfo}

CRITICAL RULES:
1. NO PREDEFINED OR CANNED RESPONSES. Directly address the user's specific statement, idea, or question in every single response.
2. ENGAGE IN TRUE DIALOGUE: Always conclude your response by asking 1 relevant, thoughtful follow-up question specifically based on what the user said to help clarify their technical or business requirements.
3. Be concise and natural (typically 2 to 3 short paragraphs). Never dump large encyclopedic feature lists unless explicitly requested.
4. If the visitor shares their name or email, acknowledge it warmly and remember it.
5. If the visitor asks questions unrelated to software development, answer briefly and politely steer back to how Bluebase can help build their software.

Bluebase Core Reference (use naturally when relevant):
• Origin & HQ: Founded and headquartered in Nagpur, Maharashtra, India (Zero Mile City). Remote-first model, senior-led engineering pods, direct developer access, daily timezone overlap with US (EST/PST) and UK/Europe (GMT/CET).
• SaaS MVP: 3 to 6-week rapid delivery, multi-tenant databases, Stripe/Razorpay billing with webhooks, role-based access control (RBAC).
• Mobile Apps: Cross-platform iOS & Android dual-launch with Flutter and React Native (40-50% cost savings), offline-first SQLite caching, guaranteed 100% App Store approval.
• Web Platforms: Next.js, React, Laravel, Node.js, Tailwind CSS, high-concurrency microservices, sub-second load times.
• AI & Autonomous Agents: Multi-agent workflows, Enterprise RAG on company databases, Qdrant/Pinecone vector search.
• IP Ownership: 100% legal IP Assignment Deed. Clients own all Git repos, commits, Figma tokens, and cloud servers from day 1 with zero vendor lock-in.
• Case Studies: OMG Rental Bikes (omgrentalbikes.com vehicle rental booking ERP) and Aarohi Classic 2024 (live athlete registration & scoring platform).
• Contact: info@bluebasetechnologies.com, Phone: +91 79727 65119, Online Contact Form at /contact.
PROMPT;
    }

    /**
     * Dynamic conversational responder used when API key is not yet set or during offline fallback.
     * Generates tailored answers directly based on the user's prompt and asks a relevant question back!
     */
    protected function generateDynamicResponse(ChatSession $session, string $input, string $normalized, string $visitorName, string $visitorEmail, bool $newEmailFound, bool $newNameFound): array
    {
        $salutation = $visitorName ? "{$visitorName}, " : "";

        // If user just introduced their name
        if ($newNameFound && strlen($input) < 35 && !$this->isQuestion($normalized)) {
            return [
                'message' => "Nice to meet you, {$visitorName}! Welcome to Bluebase Technologies. What kind of software project or digital product are you looking to build?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // If user just shared their email
        if ($newEmailFound && strlen($input) < 55 && !$this->isQuestion($normalized)) {
            $nameGreeting = $visitorName ? "Thank you, {$visitorName}!" : "Thank you!";
            return [
                'message' => "{$nameGreeting} I've noted your email ({$visitorEmail}) for our technical solutions team. What specific technical features or goals are you aiming to achieve with your application?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Context from previous bot message
        $lastBotMsg = null;
        if ($session->exists) {
            $lastBotMsg = $session->messages()->where('sender', 'bot')->latest()->first();
        }
        $lastBotText = $lastBotMsg ? strtolower($lastBotMsg->message) : '';

        // Affirmative response handling ("yes", "yep", "sure", "yeah", "ok", "okay", "correct", "right")
        $isAffirmative = preg_match('/^(yes|yeah|yep|sure|ok|okay|yup|definitely|absolutely|correct|right|proceed|fine)$/i', $normalized)
            || in_array($normalized, ['yes', 'yeah', 'yep', 'sure', 'ok', 'okay', 'yup', 'correct', 'right']);

        if ($isAffirmative) {
            if (str_contains($lastBotText, 'scratch') || str_contains($lastBotText, 'modernizing')) {
                return [
                    'message' => "Building from scratch gives us complete architectural freedom to engineer sub-second page loads, modular API design, and tailored UX flows. Do you have wireframes, feature requirements, or design references ready, or would you like us to assist with the technical scoping and UI wireframing as well?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "Understood! To help guide our architectural recommendations, what core problem will your application solve, and do you have any specific integrations in mind (such as payment processing, authentication, or third-party APIs)?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Negative response handling ("no", "nope", "nah", "not really", "nothing", "none")
        $isNegative = preg_match('/^(no|nope|nah|not really|nothing|none|not yet)$/i', $normalized)
            || in_array($normalized, ['no', 'nope', 'nah']);

        if ($isNegative) {
            return [
                'message' => "Understood, no problem at all! Feel free to share any details about your product concept whenever you're ready, or ask any questions about our development process, tech stack, past work (like OMG Rental Bikes and Aarohi Classic), and 3 to 6-week MVP delivery model.",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Ecommerce platform inquiry
        if ($this->matches($normalized, ['ecommerce', 'e-commerce', 'online store', 'shopping', 'store', 'cart', 'checkout', 'selling', 'products', 'shopify', 'woocommerce', 'marketplace'])) {
            return [
                'message' => "For ecommerce platforms, we build high-converting headless storefronts using Next.js on the frontend with decoupled Laravel or Node.js backends. We integrate multi-currency payment gateways (Stripe/Razorpay), automated inventory tracking, and custom merchant dashboards.\n\nAre you looking to launch a direct-to-consumer (D2C) brand store, or a multi-vendor marketplace with multiple sellers?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Mobile App inquiry
        if ($this->matches($normalized, ['mobile', 'app', 'android', 'ios', 'flutter', 'react native', 'iphone', 'play store', 'app store'])) {
            return [
                'message' => "For mobile applications, {$salutation}we build cross-platform apps using Flutter and React Native. This allows you to launch on both iOS and Android simultaneously from one unified codebase, which cuts development and maintenance costs by almost half while delivering 60fps native performance and offline local caching.\n\nWhat kind of mobile app are you planning to build, and do you already have screen wireframes or Figma designs ready?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // SaaS MVP inquiry
        if ($this->matches($normalized, ['saas', 'mvp', 'minimum viable', 'startup', 'launchpad', 'prototype', 'tenant', 'multi-tenant', 'mrr'])) {
            return [
                'message' => "For a SaaS MVP, our primary focus is getting you from architecture to live production in 3 to 6 weeks. We handle the heavy architectural lifting upfront—multi-tenant workspaces, Stripe or Razorpay subscription billing with automated webhooks, user role management (RBAC), and admin dashboards—so you can start onboarding real users immediately.\n\nWhat core problem does your SaaS solve, and what is the single most critical feature you want in your version 1.0?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Web Development inquiry (with anti-repetition check)
        if ($this->matches($normalized, ['web', 'website', 'laravel', 'nextjs', 'next.js', 'react', 'vue', 'node', 'full stack', 'fullstack', 'portal', 'tailwind'])) {
            if (str_contains($lastBotText, 'on the web engineering side')) {
                return [
                    'message' => "Got it! To ensure we architect the ideal web solution for your needs, what key functionality or user workflows should your website support (such as custom dashboards, client portals, payment gateways, or API integrations)?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "On the web engineering side, we build modern decoupled web applications using Next.js, React, Laravel, and Node.js with PostgreSQL and Redis backends. We engineer for sub-second load times, 90+ Core Web Vitals, and enterprise security with SSO and role-based permissions.\n\nAre you looking to build a brand-new web application from scratch, or are you modernizing an existing codebase?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // AI / Agents inquiry
        if ($this->matches($normalized, ['ai', 'artificial intelligence', 'agent', 'rag', 'llm', 'vector', 'qdrant', 'pinecone', 'machine learning', 'automation'])) {
            return [
                'message' => "For AI systems, we build domain-specific autonomous agent pipelines and Enterprise RAG (Retrieval-Augmented Generation). We connect vector databases like Qdrant and Pinecone to your proprietary documentation, internal PDFs, and databases so the AI can execute complex multi-step workflows with sub-second retrieval.\n\nWhat specific task or operational process are you looking to automate with AI?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Pricing / Cost inquiry
        if ($this->matches($normalized, ['price', 'pricing', 'cost', 'quote', 'estimate', 'rate', 'how much', 'fee', 'charge', 'budget'])) {
            return [
                'message' => "Our pricing is structured around milestone contracts and sprint billing so there are never surprise fees. For MVPs and clearly scoped projects, we provide a fixed-price contract with clear deliverable milestones and 100% IP ownership. For ongoing product iteration, we provide dedicated senior developer pods on monthly retainers.\n\nCould you share a brief overview of the key features or scope of your product so I can give you a more accurate estimate?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Timeline inquiry
        if ($this->matches($normalized, ['timeline', 'duration', 'how long', 'weeks', 'months', 'deadline', 'turnaround', 'speed', 'fast'])) {
            return [
                'message' => "Our typical turnaround is 3 to 6 weeks for a complete SaaS MVP, and 6 to 10 weeks for a full-scale mobile or web application. Every project is run on structured 2-week agile sprints with bi-weekly live staging demos so you test working software continuously.\n\nWhat is your ideal launch target or timeline for having the first working version live?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Location / Company inquiry
        if ($this->matches($normalized, ['where', 'location', 'headquarters', 'hq', 'office', 'nagpur', 'india', 'about', 'who are you', 'team', 'remote'])) {
            return [
                'message' => "Bluebase Technologies is founded and headquartered in Nagpur, Maharashtra, India (Zero Mile City). We operate with a remote-first engineering model, giving you direct access to senior software architects without traditional agency overhead, while maintaining daily 4 to 6-hour timezone overlap with US, UK, and European business hours.\n\nWhere is your team located, and what kind of project are you looking to collaborate on?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Case studies inquiry
        if ($this->matches($normalized, ['case study', 'case studies', 'portfolio', 'past work', 'proof of work', 'what have you built', 'examples', 'omg', 'aarohi'])) {
            return [
                'message' => "Two recent platforms we delivered include **OMG Rental Bikes** (omgrentalbikes.com), where we built the entire online vehicle rental booking engine, fleet ERP, and instant digital KYC verification; and **Aarohi Classic 2024**, a high-volume sports championship platform handling live athlete registrations and automated WhatsApp communications with zero downtime.\n\nWhat industry or market is your product targeting?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // General inquiry / greeting
        if ($this->matches($normalized, ['hello', 'hi', 'hey', 'good morning', 'greetings', 'yo'])) {
            return [
                'message' => "Hello {$visitorName}! I am here to help you scope, architect, and build your software project. What kind of idea or technology are you exploring today?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // Clean conversational fallback - zero robotic repetition
        return [
            'message' => "Understood. At Bluebase Technologies, our senior engineering pods architect custom web platforms, mobile apps, SaaS MVPs, and enterprise AI integrations. Could you tell me a little more about your target audience or the specific workflows you'd like to build?",
            'step' => 'conversing',
            'suggestions' => [],
        ];
    }

    /**
     * Extract human name from message if not asking a service question.
     */
    protected function extractName(string $input, string $normalized, ChatSession $session): ?string
    {
        if (preg_match('/\b(?:my name is|name is|call me|i am called)\s+([a-zA-Z\s\.\'-]{2,35})/i', $input, $m)) {
            $raw = $m[1];
            $parts = preg_split('/\b(and|my|email|phone|from|with|,|\.)\b/i', $raw);
            $candidate = trim(preg_replace('/[^a-zA-Z\s\.\'-]/', '', $parts[0] ?? $raw));
            if (!preg_match('/\b(looking|interested|seeking|trying|building|wondering|asking|happy)\b/i', $candidate) && strlen($candidate) >= 2) {
                $words = array_values(array_filter(explode(' ', $candidate)));
                return ucwords(strtolower(implode(' ', array_slice($words, 0, 3))));
            }
        }

        if (preg_match('/\b(?:i am|i\'m|this is)\s+([a-zA-Z\s\.\'-]{2,35})/i', $input, $m)) {
            $raw = $m[1];
            $parts = preg_split('/\b(and|my|email|phone|from|with|,|\.)\b/i', $raw);
            $candidate = trim(preg_replace('/[^a-zA-Z\s\.\'-]/', '', $parts[0] ?? $raw));
            if (!preg_match('/\b(looking|interested|seeking|trying|building|wondering|asking|happy)\b/i', $candidate) && strlen($candidate) >= 2) {
                $words = array_values(array_filter(explode(' ', $candidate)));
                return ucwords(strtolower(implode(' ', array_slice($words, 0, 3))));
            }
        }

        if (!empty($session->visitor_name)) {
            return null;
        }

        if ($this->isQuestion($normalized) || $this->hasInquiryKeywords($normalized)) {
            return null;
        }

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

    protected function isQuestion(string $input): bool
    {
        return str_contains($input, '?') ||
               preg_match('/\b(what|how|why|who|where|when|can|could|do|does|will|would|is|are|tell me|explain)\b/i', $input);
    }

    protected function hasInquiryKeywords(string $input): bool
    {
        return preg_match('/\b(service|web|website|app|mobile|flutter|react|saas|mvp|ai|rag|agent|pricing|price|cost|quote|timeline|time|nagpur|office|contact|email|phone|hire|career|job|figma|design|cloud|devops|aws|database|laravel|node|portfolio|case study|omg|aarohi)\b/i', $input);
    }

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
