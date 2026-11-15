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
            'message' => "Hello! Welcome to Bluebase Technologies. To get started, what is your **name**?",
            'step' => 'ask_name',
            'suggestions' => [],
        ];
    }

    /**
     * Step-by-step lead qualification and dynamic conversational processor.
     * Flow: ask_name -> ask_email -> ask_phone -> ask_project -> conversing (Gemini AI).
     */
    public function process(ChatSession $session, string $rawMessage): array
    {
        $input = trim($rawMessage);
        $normalized = strtolower($input);
        $currentStep = $session->step ?: 'ask_name';

        // ----------------------------------------------------
        // Step 1: Collect Visitor Name
        // ----------------------------------------------------
        if ($currentStep === 'ask_name') {
            $extractedName = $this->extractCleanName($input);
            if (empty($extractedName) || strlen($extractedName) < 2) {
                return [
                    'message' => "Could you please tell me your **name** so I know who I'm chatting with?",
                    'step' => 'ask_name',
                    'suggestions' => [],
                ];
            }

            $session->visitor_name = $extractedName;
            $session->step = 'ask_email';
            if ($session->exists) {
                $session->save();
            }

            return [
                'message' => "Nice to meet you, **{$extractedName}**! What is your **email address** so our engineering team can share project proposals and follow-up notes?",
                'step' => 'ask_email',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // Step 2: Collect Visitor Email
        // ----------------------------------------------------
        if ($currentStep === 'ask_email') {
            if (preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $input, $emailMatches)) {
                $extractedEmail = strtolower($emailMatches[0]);
                $session->visitor_email = substr($extractedEmail, 0, 120);
                $session->step = 'ask_phone';
                if ($session->exists) {
                    $session->save();
                }

                $name = $session->visitor_name ?: 'there';
                return [
                    'message' => "Thank you, **{$name}**! What is the best **phone number** (or WhatsApp) to reach you? *(You can also type \"skip\" if you prefer email only)*",
                    'step' => 'ask_phone',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "Please provide a valid **email address** (e.g. name@company.com) so we can stay connected.",
                'step' => 'ask_email',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // Step 3: Collect Visitor Phone Number (or Skip)
        // ----------------------------------------------------
        if ($currentStep === 'ask_phone') {
            $isSkip = preg_match('/^(skip|no|later|none|na|n\/a|pass|email only|dont want)$/i', $normalized);
            if (!$isSkip) {
                if (preg_match('/[+]?[0-9\s\-()]{7,20}/', $input, $phoneMatches)) {
                    $cleanedDigits = preg_replace('/[^0-9]/', '', $phoneMatches[0]);
                    if (strlen($cleanedDigits) >= 7) {
                        $session->visitor_phone = substr(trim($phoneMatches[0]), 0, 40);
                    }
                }
            }

            $session->step = 'ask_project';
            if ($session->exists) {
                $session->save();
            }

            return [
                'message' => "Great! What type of project are you looking to build today? (e.g. **Web Application**, **Mobile App**, **SaaS MVP**, **AI Integration**, or **Ecommerce**)",
                'step' => 'ask_project',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // Step 4: Collect Project Type & Launch Google Gemini AI
        // ----------------------------------------------------
        if ($currentStep === 'ask_project') {
            $session->step = 'conversing';
            if ($session->exists) {
                $session->save();
            }

            $visitorName = $session->visitor_name ?: '';
            $visitorEmail = $session->visitor_email ?: '';
            $visitorPhone = $session->visitor_phone ?: '';

            if ($this->hasAiApiKey()) {
                $aiResult = $this->callAiApi($session, $input, $visitorName, $visitorEmail, $visitorPhone);
                if ($aiResult !== null) {
                    return $aiResult;
                }
            }

            return $this->generateDynamicResponse($session, $input, $normalized, $visitorName, $visitorEmail);
        }

        // ----------------------------------------------------
        // Step 5: Full Conversing with Google Gemini AI
        // ----------------------------------------------------
        $session->step = 'conversing';
        if ($session->exists) {
            $session->save();
        }

        $visitorName = $session->visitor_name ?: '';
        $visitorEmail = $session->visitor_email ?: '';
        $visitorPhone = $session->visitor_phone ?: '';

        if ($this->hasAiApiKey()) {
            $aiResult = $this->callAiApi($session, $input, $visitorName, $visitorEmail, $visitorPhone);
            if ($aiResult !== null) {
                return $aiResult;
            }
        }

        return $this->generateDynamicResponse($session, $input, $normalized, $visitorName, $visitorEmail);
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
    protected function callAiApi(ChatSession $session, string $input, string $visitorName, string $visitorEmail, string $visitorPhone = ''): ?array
    {
        $apiKey = $this->getAiApiKey();
        if (empty($apiKey)) {
            return null;
        }

        // If key begins with "sk-", call OpenAI API
        if (str_starts_with($apiKey, 'sk-')) {
            return $this->callOpenAiApi($apiKey, $session, $input, $visitorName, $visitorEmail, $visitorPhone);
        }

        // Default to Google Gemini API
        return $this->callGeminiApi($apiKey, $session, $input, $visitorName, $visitorEmail, $visitorPhone);
    }

    /**
     * Call Google Gemini API with fallback retries and robust parsing.
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
                $model = env('GEMINI_MODEL', 'gemini-1.5-flash');
            }
        } catch (\Throwable $e) {
            $model = env('GEMINI_MODEL', 'gemini-1.5-flash');
        }

        $url = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$cleanApiKey}";
        $systemPrompt = $this->buildSystemInstruction($visitorName, $visitorEmail, $visitorPhone);
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
    protected function callOpenAiApi(string $apiKey, ChatSession $session, string $input, string $visitorName, string $visitorEmail, string $visitorPhone = ''): ?array
    {
        $systemPrompt = $this->buildSystemInstruction($visitorName, $visitorEmail, $visitorPhone);
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
    protected function buildSystemInstruction(string $visitorName, string $visitorEmail, string $visitorPhone = ''): string
    {
        $nameInfo = $visitorName ? "The visitor's verified name is {$visitorName}." : "The visitor has not provided their name yet.";
        $emailInfo = $visitorEmail ? "The visitor's verified email is {$visitorEmail}." : "The visitor has not provided their email yet.";
        $phoneInfo = $visitorPhone ? "The visitor's verified phone/WhatsApp is {$visitorPhone}." : "The visitor's phone is not provided.";

        return <<<PROMPT
You are the senior Technical Solutions Consultant & Software Architect at Bluebase Technologies.
Bluebase is an agile software engineering and digital transformation agency headquartered in Nagpur, Maharashtra, India.

VERIFIED VISITOR PROFILE:
- Name: {$nameInfo}
- Email: {$emailInfo}
- Contact / WhatsApp: {$phoneInfo}

CRITICAL CONVERSATIONAL RULES:
1. Address the visitor warmly by their first name when appropriate.
2. MATCH THE VISITOR'S TECHNICAL LEVEL: If they are a local business owner, clinic doctor, or non-technical client asking for a simple or static website, speak in simple, friendly, everyday human English.
3. NEVER overwhelm non-technical clients with developer jargon like PostgreSQL, Docker, decoupled microservices, RBAC, or third-party authentication APIs!
4. Directly address what the user said with practical, relevant advice. For example, if they mention a clinic, discuss doctor profiles, clinic hours, location maps, and WhatsApp/appointment buttons.
5. ALWAYS conclude your response with exactly ONE simple, thoughtful follow-up question that is easy to answer in 1 or 2 words (e.g. asking about WhatsApp vs online booking, number of pages, or launch timeline).
6. Be concise and natural (typically 2 short paragraphs). Never dump large encyclopedic feature lists.

Bluebase Core Reference (use naturally when relevant):
• Origin & HQ: Founded and headquartered in Nagpur, Maharashtra, India (Zero Mile City). Remote-first model, senior-led engineering pods, direct developer access, daily timezone overlap with US (EST/PST) and UK/Europe (GMT/CET).
• Small Business & Clinic Websites: Fast 1 to 2-week turnaround, mobile-responsive, Google Maps, WhatsApp integration, SEO ready, budget-friendly fixed price.
• SaaS MVP: 3 to 6-week rapid delivery, multi-tenant databases, Stripe/Razorpay billing with webhooks, role-based access control.
• Mobile Apps: Cross-platform iOS & Android dual-launch with Flutter and React Native.
• Web Platforms: Next.js, React, Laravel, Node.js, Tailwind CSS, sub-second load times.
• Case Studies: OMG Rental Bikes (omgrentalbikes.com vehicle rental ERP) and Aarohi Classic 2024 (live athlete registration & scoring platform).
• Contact: info@bluebasetechnologies.com, Phone: +91 79727 65119, Online Contact Form at /contact.
PROMPT;
    }

    /**
     * Clean and format visitor name.
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
     * Dynamic conversational responder used when API key is not yet set or during offline fallback.
     * Speaks in simple, friendly, relatable human language with ZERO corporate/developer jargon.
     */
    protected function generateDynamicResponse(ChatSession $session, string $input, string $normalized, string $visitorName = '', string $visitorEmail = '', bool $newEmailFound = false, bool $newNameFound = false): array
    {
        $salutation = $visitorName ? "{$visitorName}" : "";
        $phone = $session->visitor_phone ?: '';

        // 1. Scan full conversation history to maintain accurate project context
        $historyText = '';
        if ($session->exists) {
            $historyText = strtolower($session->messages()->pluck('message')->implode(' '));
        }
        $fullContext = $historyText . ' ' . $normalized;

        $isClinic = str_contains($fullContext, 'clinic')
            || str_contains($fullContext, 'doctor')
            || str_contains($fullContext, 'hospital')
            || str_contains($fullContext, 'medical')
            || str_contains($fullContext, 'dental')
            || str_contains($fullContext, 'dentist')
            || str_contains($fullContext, 'patient');

        $isStatic = str_contains($fullContext, 'static')
            || str_contains($fullContext, 'simple website')
            || str_contains($fullContext, 'basic website')
            || str_contains($fullContext, 'brochure')
            || str_contains($fullContext, 'profile');

        $isEcommerce = str_contains($fullContext, 'ecommerce')
            || str_contains($fullContext, 'e-commerce')
            || str_contains($fullContext, 'online store')
            || str_contains($fullContext, 'selling');

        // Context from the most recent bot message
        $lastBotMsg = null;
        if ($session->exists) {
            $lastBotMsg = $session->messages()->where('sender', 'bot')->latest()->first();
        }
        $lastBotText = $lastBotMsg ? strtolower($lastBotMsg->message) : '';

        // ----------------------------------------------------
        // A. Pricing / Cost / Estimate Inquiry
        // ----------------------------------------------------
        if ($this->matches($normalized, ['estimate', 'price', 'pricing', 'cost', 'quote', 'rate', 'how much', 'fee', 'charge', 'budget', 'charges'])) {
            if ($isClinic || $isStatic) {
                return [
                    'message' => "For a clean 3 to 5-page static clinic or business website (mobile-friendly, with your profile, services, contact form, Google Maps, and direct WhatsApp booking), it is usually completed in **1 to 2 weeks** at a very budget-friendly fixed price with zero hidden fees.\n\nDoes a straightforward 3 to 5-page website fit what you have in mind?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "For standard static websites (3 to 5 pages), turnaround is typically **1 to 2 weeks** at an affordable fixed price. For custom web applications with online payments or customer accounts, we scope the exact features first and give you a fixed milestone quote.\n\nDoes a simple 3 to 5-page website sound like what you're looking for, or do you need special custom features?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // B. Clinic / Healthcare Specific Inquiries
        // ----------------------------------------------------
        if ($this->matches($normalized, ['clinic', 'doctor', 'hospital', 'medical', 'dental', 'dentist', 'patient', 'health', 'physician'])) {
            return [
                'message' => "A website for your clinic is simple and fast to set up! We typically include your doctor profile, list of treatments & services, clinic hours, Google Maps location, and a direct WhatsApp or appointment booking button.\n\nWould you like patients to book appointments directly on the website, or contact you via WhatsApp / phone call?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // C. Brand New / From Scratch Inquiry
        // ----------------------------------------------------
        if ($this->matches($normalized, ['brand new', 'from scratch', 'new website', 'fresh', 'start from scratch', 'scratch'])) {
            if ($isClinic) {
                return [
                    'message' => "Starting fresh for your clinic is great! We'll make sure the website looks clean, trustworthy, and loads fast on mobile phones, with a clear doctor profile and one-tap WhatsApp button for patients.\n\nDo you already have a clinic name and logo, or do you need help with branding as well?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "Starting from scratch gives us complete freedom to make your website look modern, clean, and fast on mobile phones. Do you already have a logo and content ready, or would you like our team to help with that?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // D. Affirmative response handling ("yes", "yep", "sure", "yeah", "ok", "okay", "correct", "right")
        // ----------------------------------------------------
        $isAffirmative = preg_match('/^(yes|yeah|yep|sure|ok|okay|yup|definitely|absolutely|correct|right|proceed|fine|ha|haan)$/i', $normalized)
            || in_array($normalized, ['yes', 'yeah', 'yep', 'sure', 'ok', 'okay', 'yup', 'correct', 'right']);

        if ($isAffirmative) {
            if ($isClinic) {
                return [
                    'message' => "Great! We can set up everything from your clinic layout to Google Maps directions so patients can easily navigate to your clinic. What is your clinic specialty (e.g. general physician, dental, homeopathy, skin clinic)?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            if (str_contains($lastBotText, 'sample') || str_contains($lastBotText, 'quote') || str_contains($lastBotText, 'fit what you')) {
                return [
                    'message' => "Awesome! We have noted all your details" . ($salutation ? ", {$salutation}" : "") . ". Our team will prepare a sample website layout and a simple quote, and send it to your email ({$visitorEmail})" . ($phone ? " and WhatsApp ({$phone})" : "") . " shortly.\n\nIs there any other specific service or feature you'd like included?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "Understood! Would you like us to share a couple of sample website design links so you can see how it will look?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // E. Negative response handling ("no", "nope", "nah", "not really", "nothing", "none")
        // ----------------------------------------------------
        $isNegative = preg_match('/^(no|nope|nah|not really|nothing|none|not yet|nahi)$/i', $normalized)
            || in_array($normalized, ['no', 'nope', 'nah']);

        if ($isNegative) {
            if (str_contains($lastBotText, 'logo') || str_contains($lastBotText, 'designs') || str_contains($lastBotText, 'content')) {
                return [
                    'message' => "No problem at all! Most clients don't have designs ready. Our team will create a modern, professional layout for you, and we can help with basic logo design and content formatting.\n\nWould you like to see 2 or 3 sample website links to get an idea of the style?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "No problem at all! Feel free to ask any question about the website, timelines, or pricing, and I'll keep it simple.",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // F. Static / Business Profile Website
        // ----------------------------------------------------
        if ($this->matches($normalized, ['static', 'static website', 'simple website', 'basic website', 'landing page', 'portfolio', 'brochure'])) {
            return [
                'message' => "A static website is fast, secure, mobile-friendly, and very budget-friendly. It loads in under a second and usually includes 3 to 5 pages (Home, About Us, Services, Photo Gallery, and Contact with WhatsApp & Google Map).\n\nDo you already have your photos and text ready, or would you like us to help organize them?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // G. Ecommerce Store Inquiry
        // ----------------------------------------------------
        if ($isEcommerce) {
            return [
                'message' => "We build easy-to-manage online stores where customers can browse your products, add items to cart, and pay via UPI, cards, or Cash on Delivery.\n\nRoughly how many products are you planning to sell initially?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // H. Mobile App Inquiry
        // ----------------------------------------------------
        if ($this->matches($normalized, ['mobile', 'app', 'android', 'ios', 'flutter', 'react native', 'play store', 'app store'])) {
            return [
                'message' => "We develop mobile apps for both Android and iPhone using Flutter and React Native. This keeps your development cost down while giving users a smooth 60fps experience.\n\nWhat kind of mobile app are you planning to build, and do you already have screen sketches or wireframes ready?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // I. SaaS / Custom Web Application
        // ----------------------------------------------------
        if ($this->matches($normalized, ['saas', 'mvp', 'startup', 'portal', 'dashboard', 'custom software', 'multi-tenant'])) {
            return [
                'message' => "For a SaaS MVP or custom web platform, our goal is getting your first working version launched in 3 to 6 weeks with user logins, subscription billing, and an admin dashboard.\n\nWhat is the main problem your software will solve for its users?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // J. Generic Website Inquiry (Warm, Simple, Zero Jargon)
        // ----------------------------------------------------
        if ($this->matches($normalized, ['web', 'website', 'page', 'site'])) {
            if ($isClinic) {
                return [
                    'message' => "For your clinic website, we will keep it simple, clean, and mobile-friendly with an appointment button and Google Maps. What is your clinic's specialty (e.g. dental, general clinic, eye clinic, skin)?",
                    'step' => 'conversing',
                    'suggestions' => [],
                ];
            }

            return [
                'message' => "We design and build clean, modern, and mobile-friendly websites—from simple business profile sites to online stores.\n\nWhat kind of business is the website for, and roughly how many pages do you have in mind?",
                'step' => 'conversing',
                'suggestions' => [],
            ];
        }

        // ----------------------------------------------------
        // K. Progressive, Natural Multi-Turn Questions (Zero Jargon)
        // ----------------------------------------------------
        $turnIndex = $session->exists ? $session->messages()->where('sender', 'bot')->count() : 0;

        $simpleQuestions = [
            "Got it" . ($salutation ? ", {$salutation}" : "") . "! Do you already have a domain name or hosting, or would you like us to set that up for you as well?",
            "Understood! What is your ideal timeline for launching the website live?",
            "Makes total sense. Would you like us to share 2 or 3 live design examples of similar websites we've built?",
            "Thank you for sharing those details" . ($salutation ? ", {$salutation}" : "") . "! Our team will review your requirements and reach out to you directly at {$visitorEmail}" . ($phone ? " and {$phone}" : "") . " with a clear plan and estimate. Is there anything else you'd like to ask?",
        ];

        $selectedMsg = $simpleQuestions[$turnIndex % count($simpleQuestions)];
        return [
            'message' => $selectedMsg,
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
