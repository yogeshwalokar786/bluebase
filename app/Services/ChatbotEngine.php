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
        try {
            $dbKey = SiteSetting::get('gemini_api_key') ?: SiteSetting::get('ai_api_key');
            if (!empty($dbKey)) {
                return trim($dbKey);
            }
        } catch (\Throwable $e) {}

        try {
            $configKey = config('services.gemini.api_key');
            if (!empty($configKey)) {
                return trim($configKey);
            }
        } catch (\Throwable $e) {}

        $envKey = env('GEMINI_API_KEY') ?: env('AI_API_KEY') ?: env('OPENAI_API_KEY');
        return !empty($envKey) ? trim($envKey) : null;
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
     * Call Google Gemini API.
     */
    protected function callGeminiApi(string $apiKey, ChatSession $session, string $input, string $visitorName, string $visitorEmail): ?array
    {
        $model = env('GEMINI_MODEL', 'gemini-1.5-flash');
        try {
            $dbModel = SiteSetting::get('gemini_model');
            if (!empty($dbModel)) {
                $model = trim($dbModel);
            }
        } catch (\Throwable $e) {}

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";
        $systemPrompt = $this->buildSystemInstruction($visitorName, $visitorEmail);
        $contents = $this->buildGeminiContents($session, $input);

        try {
            $response = Http::timeout(12)->post($url, [
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
                $reply = $response->json('candidates.0.content.parts.0.text');
                if (!empty($reply)) {
                    return [
                        'message' => trim($reply),
                        'step' => 'conversing',
                        'suggestions' => [],
                    ];
                }
            } else {
                Log::warning('Gemini API Error: ' . $response->body());
            }
        } catch (\Throwable $e) {
            Log::warning('Gemini API Exception: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Build strictly alternating contents array compliant with Google Gemini API requirements:
     * 1. Must start with role 'user'.
     * 2. Roles must strictly alternate between 'user' and 'model'.
     * 3. Must end with role 'user'.
     */
    protected function buildGeminiContents(ChatSession $session, string $input): array
    {
        $contents = [];
        $trimmedInput = trim($input);

        if ($session->exists) {
            $pastMessages = $session->messages()->orderBy('created_at', 'asc')->take(12)->get();
            foreach ($pastMessages as $msg) {
                $text = trim($msg->message);
                if ($text === '') continue;

                $role = ($msg->sender === 'bot') ? 'model' : 'user';

                // First message in Gemini contents MUST be 'user'
                if (empty($contents) && $role !== 'user') {
                    continue;
                }

                $lastIdx = count($contents) - 1;
                if ($lastIdx >= 0 && $contents[$lastIdx]['role'] === $role) {
                    // Combine consecutive messages from the same role
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
        }

        // Ensure the current user input is the final 'user' turn
        $lastIdx = count($contents) - 1;
        if ($lastIdx >= 0 && $contents[$lastIdx]['role'] === 'user') {
            if ($contents[$lastIdx]['parts'][0]['text'] !== $trimmedInput) {
                $contents[$lastIdx]['parts'][0]['text'] .= "\n" . $trimmedInput;
            }
        } else {
            $contents[] = [
                'role' => 'user',
                'parts' => [['text' => $trimmedInput]],
            ];
        }

        // Final sanity check: remove any leading 'model' turns
        while (!empty($contents) && $contents[0]['role'] !== 'user') {
            array_shift($contents);
        }

        if (empty($contents)) {
            $contents[] = [
                'role' => 'user',
                'parts' => [['text' => $trimmedInput]],
            ];
        }

        return $contents;
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

        // Web Development inquiry
        if ($this->matches($normalized, ['web', 'website', 'laravel', 'nextjs', 'next.js', 'react', 'vue', 'node', 'full stack', 'fullstack', 'portal', 'tailwind'])) {
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

        // Natural fallback tailored to whatever the user said
        $cleanPrompt = substr($input, 0, 100);
        return [
            'message' => "That sounds interesting regarding \"{$cleanPrompt}\". At Bluebase, we engineer custom SaaS MVPs, web applications, cross-platform mobile apps, and autonomous AI systems.\n\nCould you tell me a bit more about the specific features or workflow you'd like your application to have?",
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
