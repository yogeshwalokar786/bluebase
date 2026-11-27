<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NegotiateMarkdownMiddleware
{
    /**
     * Handle an incoming request and negotiate Markdown representation if requested.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only process for GET and HEAD requests
        if (!$request->isMethodSafe()) {
            return $next($request);
        }

        // Check if client / AI agent requested Markdown
        if (!$this->wantsMarkdown($request)) {
            $response = $next($request);
            // Inform caches that response varies based on Accept header
            $response->headers->set('Vary', 'Accept', false);
            return $response;
        }

        // Fast-path for homepage: return dedicated, token-efficient llms.txt Markdown
        $path = trim($request->path(), '/');
        if ($path === '' || $path === 'home') {
            $llmsPath = public_path('llms.txt');
            if (file_exists($llmsPath)) {
                $markdown = file_get_contents($llmsPath);
                return response($markdown, 200, [
                    'Content-Type' => 'text/markdown; charset=utf-8',
                    'Vary' => 'Accept',
                    'Cache-Control' => 'public, max-age=3600',
                    'X-Content-Type-Options' => 'nosniff',
                    'Link' => '<https://bluebasetechnologies.com/llms.txt>; rel="help"; type="text/plain", <https://bluebasetechnologies.com/llms.txt>; rel="alternate"; type="text/plain", <https://bluebasetechnologies.com/>; rel="canonical"',
                ]);
            }
        }

        // Let the controller produce the standard response
        $response = $next($request);

        // If response is successful and HTML, convert into clean Markdown representation
        $contentType = (string) $response->headers->get('Content-Type', '');
        if ($response->isSuccessful() && (stripos($contentType, 'text/html') !== false || empty($contentType))) {
            $html = $response->getContent();
            if (is_string($html) && !empty($html)) {
                $markdown = $this->convertHtmlToMarkdown($html, $request->fullUrl());
                $response->setContent($markdown);
                $response->headers->set('Content-Type', 'text/markdown; charset=utf-8');
                $response->headers->set('Vary', 'Accept', false);
            }
        }

        return $response;
    }

    /**
     * Determine if the incoming request asks for Markdown.
     */
    protected function wantsMarkdown(Request $request): bool
    {
        $accept = (string) $request->header('Accept', '');

        // Standard HTTP content negotiation for markdown
        if (stripos($accept, 'text/markdown') !== false || stripos($accept, 'text/x-markdown') !== false) {
            return true;
        }

        // Optional query parameter ?format=markdown or ?format=md
        $format = strtolower((string) $request->query('format', ''));
        return $format === 'markdown' || $format === 'md';
    }

    /**
     * Convert an HTML document into a concise, token-efficient Markdown representation.
     */
    protected function convertHtmlToMarkdown(string $html, string $url): string
    {
        // 1. Extract page title and meta description
        $title = '';
        if (preg_match('/<title[^>]*>(.*?)<\/title>/is', $html, $matches)) {
            $title = trim(strip_tags($matches[1]));
        }

        $description = '';
        if (preg_match('/<meta[^>]+name=[\'"]description[\'"][^>]+content=[\'"]([^\'"]+)[\'"]/is', $html, $matches)) {
            $description = trim(html_entity_decode($matches[1], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
        }

        // 2. Remove non-content structural elements (scripts, styles, navs, footers, svg, noscript)
        $cleaned = preg_replace('/<(script|style|nav|footer|svg|noscript|iframe|canvas)[^>]*>.*?<\/\1>/is', '', $html);

        // 3. Remove header navigation elements to focus on primary page content
        $cleaned = preg_replace('/<header\b[^>]*>.*?<\/header>/is', '', $cleaned);

        // 4. Convert headings to Markdown
        for ($i = 6; $i >= 1; $i--) {
            $cleaned = preg_replace_callback(
                '/<h' . $i . '[^>]*>(.*?)<\/h' . $i . '>/is',
                function ($m) use ($i) {
                    $text = trim(strip_tags($m[1]));
                    return $text !== '' ? "\n\n" . str_repeat('#', $i) . " " . $text . "\n\n" : '';
                },
                $cleaned
            );
        }

        // 5. Convert links to Markdown [anchor](href)
        $cleaned = preg_replace_callback(
            '/<a\b[^>]*href=[\'"]([^\'"]+)[\'"][^>]*>(.*?)<\/a>/is',
            function ($m) {
                $href = trim($m[1]);
                $text = trim(strip_tags($m[2]));
                if ($text === '' || $href === '' || str_starts_with($href, '#') || str_starts_with($href, 'javascript:')) {
                    return $text;
                }
                return '[' . $text . '](' . $href . ')';
            },
            $cleaned
        );

        // 6. Convert list items to Markdown bullets
        $cleaned = preg_replace_callback(
            '/<li[^>]*>(.*?)<\/li>/is',
            function ($m) {
                $text = trim(strip_tags($m[1], '<a><strong><em>'));
                return $text !== '' ? "\n- " . $text : '';
            },
            $cleaned
        );

        // 7. Convert paragraphs and line breaks
        $cleaned = preg_replace('/<p[^>]*>(.*?)<\/p>/is', "\n\n$1\n\n", $cleaned);
        $cleaned = preg_replace('/<br\s*\/?>/is', "\n", $cleaned);

        // 8. Convert inline formatting (bold, italic, code)
        $cleaned = preg_replace('/<(strong|b)[^>]*>(.*?)<\/\1>/is', '**$2**', $cleaned);
        $cleaned = preg_replace('/<(em|i)[^>]*>(.*?)<\/\1>/is', '*$2*', $cleaned);
        $cleaned = preg_replace('/<code[^>]*>(.*?)<\/code>/is', '`$1`', $cleaned);

        // 9. Strip all remaining HTML tags
        $cleaned = strip_tags($cleaned);

        // 10. Decode HTML entities
        $cleaned = html_entity_decode($cleaned, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        // 11. Normalize excessive whitespace and blank lines
        $lines = explode("\n", $cleaned);
        $normalizedLines = [];
        $prevBlank = false;

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if ($trimmed === '') {
                if (!$prevBlank) {
                    $normalizedLines[] = '';
                    $prevBlank = true;
                }
            } else {
                $normalizedLines[] = $trimmed;
                $prevBlank = false;
            }
        }

        $body = trim(implode("\n", $normalizedLines));

        // 12. Build final structured Markdown document
        $output = '';
        if ($title !== '') {
            $output .= "# " . $title . "\n\n";
        }
        if ($description !== '') {
            $output .= "> " . $description . "\n\n";
        }
        $output .= "Source URL: " . $url . "\n\n---\n\n";
        $output .= $body;

        return trim($output) . "\n";
    }
}
