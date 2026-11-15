<?php

namespace App\Services;

use App\Models\ChatSession;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotEngine
{
    /**
     * Last recorded AI error for real-time diagnostics.
     */
    protected ?string $lastAiError = null;

    /**
     * Initial greeting when chat window is first opened.
     * Pure AI greeting inviting the visitor to discuss their project.
     */
    public function getInitialGreeting(): array
    {
        return [
            'message' => "Hello! Welcome to Bluebase Technologies. I'm your AI engineering consultant. What type of project are you looking to build today?",
            'step' => 'conversing',
            'suggestions' => [],
        ];
    }

    /**
     * Full conversational AI processor.
     * Every user message is processed directly by the live AI model (Google Gemini or OpenAI).
     * Visitor contact details (name, email, phone) are automatically extracted and saved in background.
     */
    public function process(ChatSession $session, string $rawMessage): array
    {
        $input = trim($rawMessage);
        $session->step = 'conversing';

        // 1. Automatically extract Name, Email, or Phone from user message in background
        $this->extractVisitorDetails($session, $input);

        $visitorName = $session->visitor_name ?: '';
        $visitorEmail = $session->visitor_email ?: '';
        $visitorPhone = $session->visitor_phone ?: '';

        // 2. Full Live AI Conversation
        if ($this->hasAiApiKey()) {
            $aiResult = $this->callAiApi($session, $input, $visitorName, $visitorEmail, $visitorPhone);
            if ($aiResult !== null) {
                return $aiResult;
            }
        }

        // 3. Fallback when AI API key is not configured or temporarily unreachable
        return $this->getFallbackResponse($session, $input, $visitorName, $visitorEmail, $visitorPhone);
    }

    /**
     * Extract visitor contact details (email, phone, name) automatically from conversational text.
     */
    protected function extractVisitorDetails(ChatSession $session, string $input): void
    {
        $updated = false;

        // 1. Email Extraction
        if (empty($session->visitor_email)) {
            if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $input, $matches)) {
                $session->visitor_email = strtolower($matches[0]);
                $updated = true;
            }
        }

        // 2. Phone Extraction (Indian 10-digit or international format)
        if (empty($session->visitor_phone)) {
            if (preg_match('/(\+?91[\-\s]?)?[6-9]\d{9}/', $input, $matches)) {
                $session->visitor_phone = preg_replace('/[^\d+]/', '', $matches[0]);
                $updated = true;
            } elseif (preg_match('/\b\d{10,12}\b/', $input, $matches)) {
                $session->visitor_phone = $matches[0];
                $updated = true;
            }
        }

        // 3. Name Extraction (e.g. "my name is Yogesh", "I am Yogesh", "call me Yogesh")
        if (empty($session->visitor_name)) {
            if (preg_match('/(?:my name is|i am|i\'m|call me|myself)\s+([a-zA-Z\s]{2,30})/i', $input, $matches)) {
                $extracted = $this->extractCleanName($matches[1]);
                if (!empty($extracted)) {
                    $session->visitor_name = $extracted;
                    $updated = true;
                }
            }
        }

        if ($updated && $session->exists) {
            $session->save();
        }
    }

    /**
     * Clean and capitalize visitor name.
     */
    protected function extractCleanName(string $input): string
    {
        $cleaned = trim($input);
        $cleaned = preg_replace('/^(my name is|i am called|i am|i\'m|call me|this is|myself)\s+/i', '', $cleaned);
        $cleaned = rtrim($cleaned, " .!?,;:-");
        $cleaned = preg_replace('/[^a-zA-Z\s\.\'-]/', '', $cleaned);
        $words = array_values(array_filter(explode(' ', trim($cleaned))));
        if (empty($words)) {
            return '';
        }
        $nameWords = array_slice($words, 0, 4);
        return ucwords(strtolower(implode(' ', $nameWords)));
    }

    /**
     * Check if an AI API key is configured.
     */
    public function hasAiApiKey(): bool
    {
        $key = $this->getAiApiKey();
        return !empty($key);
    }

    /**
     * Retrieve AI API Key from Database Settings, Storage File, Config, or Environment.
     */
    public function getAiApiKey(): ?string
    {
        // 1. Database SiteSetting (from Admin CMS)
        try {
            $dbKey = SiteSetting::get('gemini_api_key')
                ?: SiteSetting::get('ai_api_key')
                ?: SiteSetting::get('google_api_key');
            if (!empty($dbKey) && strlen(trim($dbKey)) > 5) {
                return trim($dbKey);
            }
        } catch (\Throwable $e) {}

        // 2. Storage file backup (storage/app/ai_key.txt or base/ai_key.txt)
        try {
            $paths = [storage_path('app/ai_key.txt'), base_path('ai_key.txt')];
            foreach ($paths as $path) {
                if (file_exists($path)) {
                    $savedKey = trim(file_get_contents($path));
                    if (!empty($savedKey) && strlen($savedKey) > 5) {
                        return $savedKey;
                    }
                }
            }
        } catch (\Throwable $e) {}

        // 3. Config services (services.gemini.api_key / services.openai.key)
        try {
            $configKey = config('services.gemini.api_key') ?: config('services.openai.key');
            if (!empty($configKey) && strlen(trim($configKey)) > 5) {
                return trim($configKey);
            }
        } catch (\Throwable $e) {}

        // 4. Environment Variables
        $envKey = env('GEMINI_API_KEY')
            ?: env('GOOGLE_API_KEY')
            ?: env('GOOGLE_GEMINI_API_KEY')
            ?: env('AI_API_KEY')
            ?: env('OPENAI_API_KEY');
        if (!empty($envKey) && strlen(trim($envKey)) > 5) {
            return trim($envKey);
        }

        return null;
    }

    /**
     * Call Live AI API (Gemini or OpenAI) based on key prefix.
     */
    protected function callAiApi(ChatSession $session, string $input, string $visitorName, string $visitorEmail, string $visitorPhone = ''): ?array
    {
        $apiKey = $this->getAiApiKey();
        if (empty($apiKey)) {
            return null;
        }

        // If key begins with "sk-", route to OpenAI API
        if (str_starts_with($apiKey, 'sk-')) {
            return $this->callOpenAiApi($apiKey, $session, $input, $visitorName, $visitorEmail, $visitorPhone);
        }

        // Otherwise default to Google Gemini API
        return $this->callGeminiApi($apiKey, $session, $input, $visitorName, $visitorEmail, $visitorPhone);
    }

    /**
     * Call Google Gemini API (gemini-1.5-flash, gemini-2.0-flash, gemini-1.5-pro).
     */
    protected function callGeminiApi(string $apiKey, ChatSession $session, string $input, string $visitorName, string $visitorEmail, string $visitorPhone = ''): ?array
    {
        $cleanApiKey = trim($apiKey, " \t\n\r\0\x0B\"'");

        $model = 'gemini-1.5-flash';
        try {
            $dbModel = SiteSetting::get('gemini_model');
            if (!empty($dbModel)) {
                $model = trim($dbModel);
            } else {
                $model = config('services.gemini.model') ?: env('GEMINI_MODEL', 'gemini-1.5-flash');
            }
        } catch (\Throwable $e) {
            $model = 'gemini-1.5-flash';
        }

        $model = preg_replace('#^models/#', '', trim($model));
        if (empty($model)) {
            $model = 'gemini-1.5-flash';
        }

        $systemPrompt = $this->buildSystemInstruction($visitorName, $visitorEmail, $visitorPhone);
        $contents = $this->buildGeminiContents($session, $input);

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$cleanApiKey}";

        try {
            $response = Http::withoutVerifying()
                ->timeout(15)
                ->withHeaders([
                    'Content-Type' => 'application/json',
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
            }

            Log::warning('Gemini API Non-200 Response [' . $response->status() . ']: ' . $response->body());
            $errorJson = $response->json();
            $errMsg = $errorJson['error']['message'] ?? ('HTTP ' . $response->status());
            $this->lastAiError = "Gemini [{$response->status()}]: {$errMsg}";

            // Fallback 1: If 404 (model not found), retry with gemini-1.5-flash
            if ($response->status() === 404 && $model !== 'gemini-1.5-flash') {
                $fallbackUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$cleanApiKey}";
                $retry = Http::withoutVerifying()->timeout(15)
                    ->withHeaders(['Content-Type' => 'application/json'])
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

            // Fallback 2: If 400 Bad Request, prepend system prompt into first user turn
            if ($response->status() === 400) {
                $contentsWithSystem = $contents;
                if (!empty($contentsWithSystem) && $contentsWithSystem[0]['role'] === 'user') {
                    $contentsWithSystem[0]['parts'][0]['text'] = "Context & Rules:\n" . $systemPrompt . "\n\nVisitor Message:\n" . $contentsWithSystem[0]['parts'][0]['text'];
                }
                $retry2 = Http::withoutVerifying()->timeout(15)
                    ->withHeaders(['Content-Type' => 'application/json'])
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
        } catch (\Throwable $e) {
            $this->lastAiError = "Gemini Connection Exception: " . $e->getMessage();
            Log::warning($this->lastAiError);
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
        $contents = [];

        if ($session->exists) {
            // Get past 12 messages in chronological order
            $pastMessages = $session->messages()
                ->orderBy('created_at', 'desc')
                ->take(12)
                ->get()
                ->reverse();

            // If the latest message in DB is the current input, pop it so we append it cleanly below
            if ($pastMessages->isNotEmpty() && $pastMessages->last()->message === $input && $pastMessages->last()->sender === 'user') {
                $pastMessages->pop();
            }

            foreach ($pastMessages as $msg) {
                $text = trim($msg->message);
                if ($text === '') continue;

                $role = ($msg->sender === 'bot') ? 'model' : 'user';

                if (empty($contents)) {
                    if ($role === 'user') {
                        $contents[] = ['role' => 'user', 'parts' => [['text' => $text]]];
                    }
                    continue;
                }

                $lastIdx = count($contents) - 1;
                if ($contents[$lastIdx]['role'] === $role) {
                    $contents[$lastIdx]['parts'][0]['text'] .= "\n" . $text;
                } else {
                    $contents[] = ['role' => $role, 'parts' => [['text' => $text]]];
                }
            }
        }

        // Append the current user turn as the final 'user' role
        if (empty($contents)) {
            $contents[] = ['role' => 'user', 'parts' => [['text' => trim($input)]]];
        } else {
            $lastIdx = count($contents) - 1;
            if ($contents[$lastIdx]['role'] === 'user') {
                $contents[$lastIdx]['parts'][0]['text'] .= "\n" . trim($input);
            } else {
                $contents[] = ['role' => 'user', 'parts' => [['text' => trim($input)]]];
            }
        }

        return $contents;
    }

    /**
     * Call OpenAI API as alternate provider.
     */
    protected function callOpenAiApi(string $apiKey, ChatSession $session, string $input, string $visitorName, string $visitorEmail, string $visitorPhone = ''): ?array
    {
        $systemPrompt = $this->buildSystemInstruction($visitorName, $visitorEmail, $visitorPhone);
        $messages = $this->buildOpenAiMessages($session, $input, $systemPrompt);

        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer {$apiKey}",
                'Content-Type' => 'application/json',
            ])->timeout(15)->post('https://api.openai.com/v1/chat/completions', [
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
            } else {
                Log::warning('OpenAI API Error [' . $response->status() . ']: ' . $response->body());
            }
        } catch (\Throwable $e) {
            Log::warning('OpenAI API Exception: ' . $e->getMessage());
        }

        return null;
    }

    /**
     * Build OpenAI Chat Completions messages array.
     */
    protected function buildOpenAiMessages(ChatSession $session, string $input, string $systemPrompt): array
    {
        $messages = [];
        $messages[] = ['role' => 'system', 'content' => $systemPrompt];

        if ($session->exists) {
            $pastMessages = $session->messages()
                ->orderBy('created_at', 'desc')
                ->take(12)
                ->get()
                ->reverse();

            if ($pastMessages->isNotEmpty() && $pastMessages->last()->message === $input && $pastMessages->last()->sender === 'user') {
                $pastMessages->pop();
            }

            foreach ($pastMessages as $msg) {
                $text = trim($msg->message);
                if ($text === '') continue;
                $messages[] = [
                    'role' => ($msg->sender === 'bot') ? 'assistant' : 'user',
                    'content' => $text,
                ];
            }
        }

        $messages[] = ['role' => 'user', 'content' => trim($input)];
        return $messages;
    }

    /**
     * Build Bluebase Knowledge Base System Instruction for Google Gemini / OpenAI.
     */
    protected function buildSystemInstruction(string $visitorName, string $visitorEmail, string $visitorPhone = ''): string
    {
        $nameInfo = $visitorName ?: 'Visitor (not yet shared - ask politely when appropriate)';
        $emailInfo = $visitorEmail ?: 'Not yet shared (ask politely when sharing estimates or preparing a proposal)';
        $phoneInfo = $visitorPhone ?: 'Not yet shared';

        return <<<PROMPT
You are the Bluebase AI Engineering Consultant, representing Bluebase Technologies (Nagpur, Maharashtra, India).
Your role is to understand what the visitor wants to build, provide clear, practical architectural advice, give realistic timeline and pricing guidance, and naturally guide them toward a proposal or consultation call.

VERIFIED VISITOR PROFILE:
- Name: {$nameInfo}
- Email: {$emailInfo}
- Phone/WhatsApp: {$phoneInfo}

CRITICAL CONVERSATIONAL GUIDELINES:
1. Address the visitor warmly by their first name when known.
2. SPEAK IN SIMPLE, FRIENDLY, EVERYDAY HUMAN ENGLISH:
   - When a visitor asks for a clinic, corporate, small business, or static website, DO NOT overwhelm them with developer jargon (e.g. PostgreSQL, Redis, Docker, microservices, RBAC, third-party authentication APIs).
   - Instead, speak to their business outcomes: clean modern design, instant sub-second mobile loading, Google Maps directions, WhatsApp booking, and easy inquiry forms.
   - When a visitor asks for a complex SaaS, web application, or mobile app, demonstrate deep engineering expertise.
3. CONCLUDE EVERY TURN WITH ONE SIMPLE, ACTIONABLE FOLLOW-UP QUESTION to keep the dialogue natural and focused.
4. LEAD CAPTURE: If the visitor's name or contact information is not yet known, politely ask for their name and email or WhatsApp number when discussing quotes, timelines, or sending a proposal.
5. Keep your responses concise (typically 2 to 3 short paragraphs). Never dump giant encyclopedic walls of text.

BLUEBASE TECHNOLOGIES CORE KNOWLEDGE:
- Origins & HQ: Headquartered in Nagpur, Maharashtra, India (Zero Mile City). Remote-first engineering model with daily overlap across US (EST/PST) and UK/Europe (GMT/CET).
- Services:
  1. Corporate & Business Websites: Executive, high-trust designs (Home, About, Services, Team, Case Studies, Inquiries), 1 to 2-week turnaround, budget-friendly fixed price.
  2. Clinic & Healthcare Websites: Doctor profiles, services & treatments, clinic hours, Google Maps directions, one-tap WhatsApp appointment button.
  3. SaaS MVP Engineering: Rapid 3 to 6-week turnaround, multi-tenant databases, Stripe/Razorpay billing, role-based access control.
  4. Cross-Platform Mobile Apps: iOS & Android dual-launch with Flutter and React Native.
  5. Decoupled Web Applications & Portals: Next.js, React, Laravel, Node.js, Tailwind CSS, sub-second load times.
- Pricing Philosophy:
  - Transparent fixed-price milestone contracts for MVPs and websites (zero surprise bills).
  - Dedicated senior developer pods on monthly sprint retainers for ongoing products.
  - 100% intellectual property (IP) and code ownership transferred to the client.
- Case Studies:
  - OMG Rental Bikes (omgrentalbikes.com vehicle rental ERP and booking engine).
  - Aarohi Classic 2024 (live athlete registration & scoring platform).
- Contact: info@bluebasetechnologies.com, Phone: +91 79727 65119.
PROMPT;
    }

    /**
     * Fallback response when no AI API key is configured or the external API is unreachable.
     */
    protected function getFallbackResponse(ChatSession $session, string $input, string $visitorName, string $visitorEmail, string $visitorPhone): array
    {
        $salutation = $visitorName ? " {$visitorName}" : "";

        if ($this->hasAiApiKey()) {
            $errorInfo = $this->lastAiError ? "\n\n*(AI Notice: {$this->lastAiError})*" : "";
            return [
                'message' => "Thank you for reaching out to Bluebase{$salutation}! We design and engineer custom corporate websites, clinic portals, SaaS MVPs, and mobile apps with fast 1 to 2-week delivery.{$errorInfo}\n\nOur engineering pod is ready to assist you—what are the key features or pages you have in mind?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        return [
            'message' => "Thank you for reaching out to Bluebase{$salutation}! We design and engineer custom corporate websites, clinic portals, SaaS MVPs, and mobile apps with fast 1 to 2-week delivery.\n\nTo activate live conversational AI, please enter your Gemini API Key in the Admin CMS Settings (or set GEMINI_API_KEY in your .env file). Meanwhile, what are the key features or pages you have in mind for your project?",
            'step' => 'conversing',
            'suggestions' => [],
        ];
    }
}
