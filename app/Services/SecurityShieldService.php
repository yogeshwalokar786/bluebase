<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SecurityShieldService
{
    /**
     * Regex patterns that detect URLs, links, domain names, and obfuscated web addresses.
     */
    protected static array $urlPatterns = [
        // Standard protocols
        '/(?:https?|ftp|sftp):\/\/[^\s<>"\'\)]+/i',
        
        // Protocol-less www. links
        '/\bwww\.[a-z0-9\-]+(\.[a-z0-9\-]+)+[^\s<>"\'\)]*/i',
        
        // Common top-level domains with or without paths
        '/\b[a-z0-9\-\._]{2,63}\.(?:com|org|net|in|co|io|xyz|top|ru|cn|biz|info|site|online|club|live|shop|app|dev|pro|vip|link|work|click|tk|ml|ga|cf|gq|me|cc|to|us|uk|de|nl|fr|pl|br|asia)(?:\/[^\s<>"\'\)]*)?/i',
        
        // Obfuscated dots like example[.]com or example(dot)com
        '/[a-z0-9\-_]+\s*(?:\[\.\]|\(dot\)|\bdot\b)\s*(?:com|org|net|xyz|ru|cn|in|co|io)/i',
        
        // HTML anchor and link tags
        '/<a\s+[^>]*href\s*=[^>]*>/i',
        
        // Markdown links [text](http://...)
        '/\[.*?\]\s*\((?:https?:\/\/|\/|www\.)[^\)]*\)/i',
        
        // BBCode [url] tags
        '/\[url(?:=.*?)?\].*?\[\/url\]/i',
        
        // Instant messaging and URL shortener shortcuts
        '/\b(?:t\.me|wa\.me|bit\.ly|tinyurl\.com|goo\.gl|is\.gd|ow\.ly|buff\.ly|t\.co)\/[a-z0-9_\-\.\/]+/i',
    ];

    /**
     * Patterns that detect malicious attack vectors (XSS, SQLi, Path Traversal, Command Injection).
     */
    protected static array $threatPatterns = [
        // XSS & Script Execution
        '/<script\b[^>]*>(.*?)<\/script>/is',
        '/javascript\s*:\s*[^\s;]+/i',
        '/vbscript\s*:\s*[^\s;]+/i',
        '/\bon(error|load|click|mouseover|focus|blur|change|submit)\s*=/i',
        '/<(iframe|object|embed|applet|meta|link|svg\b[^>]*\bon)/i',
        
        // SQL Injection indicators
        '/\b(?:union\s+all\s+select|union\s+select|select\s+.*\s+from|insert\s+into|delete\s+from|drop\s+table|update\s+.*\s+set)\b/i',
        '/\b(?:information_schema|benchmark\s*\(|sleep\s*\(|waitfor\s+delay)\b/i',
        '/(\'|\")\s*(?:or|and)\s*(\'|\"|1=1|true)\b/i',
        
        // Directory Traversal
        '/(?:\.\.[\/\\\\]){2,}/',
        '/\/(?:etc\/(?:passwd|shadow)|windows\/system32)/i',
    ];

    /**
     * Check if a string contains any prohibited URL or web link pattern.
     */
    public static function containsForbiddenUrl(?string $text): bool
    {
        if (empty($text)) {
            return false;
        }

        foreach (self::$urlPatterns as $pattern) {
            if (preg_match($pattern, $text)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if a string contains any malicious attack payload.
     */
    public static function containsMaliciousPayload(?string $text): bool
    {
        if (empty($text)) {
            return false;
        }

        foreach (self::$threatPatterns as $pattern) {
            if (preg_match($pattern, $text)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Validate an entire HTTP Request for anti-spam URL compliance and security threats.
     * Returns an error message string if blocked, or null if completely clean.
     */
    public static function validateSubmissionSecurity(Request $request, array $exemptFields = ['_token', 'verification_token', '_hp_contact_check']): ?string
    {
        // 1. Invisible Honeypot Trap Check
        if ($request->filled('_hp_contact_check')) {
            Log::notice('Bot trapped by invisible honeypot', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);
            return 'HONEYPOT_TRAPPED';
        }

        $allInputs = $request->except($exemptFields);

        foreach ($allInputs as $field => $value) {
            if (is_string($value)) {
                // Check for malicious attack payloads first
                if (self::containsMaliciousPayload($value)) {
                    Log::warning('Malicious payload blocked on form field', [
                        'field' => $field,
                        'ip' => $request->ip(),
                        'input_excerpt' => substr($value, 0, 100),
                    ]);
                    return 'Security Alert: Invalid characters or suspicious payload detected in the submission.';
                }

                // Check for prohibited URLs and web links
                if (self::containsForbiddenUrl($value)) {
                    Log::info('Spam URL submission blocked', [
                        'field' => $field,
                        'ip' => $request->ip(),
                        'input_excerpt' => substr($value, 0, 100),
                    ]);
                    return 'Security Policy: For anti-spam protection, URLs, web addresses, and domain links (e.g. http://, www., .com) are strictly prohibited in the message. Please remove all links and describe your inquiry in plain text.';
                }
            }
        }

        return null;
    }

    /**
     * Clean and sanitize input to neutralize any residual HTML or script tags.
     */
    public static function sanitize(mixed $value): mixed
    {
        if (is_string($value)) {
            return trim(strip_tags($value));
        }

        if (is_array($value)) {
            return array_map([self::class, 'sanitize'], $value);
        }

        return $value;
    }
}
