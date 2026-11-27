<?php

namespace App\Http\Middleware;

use App\Services\SecurityShieldService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeadersMiddleware
{
    /**
     * Handle an incoming request and attach enterprise security headers.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. WAF Payload Check on query parameters and raw inputs
        $queryPayload = $request->getQueryString();
        if (!empty($queryPayload) && SecurityShieldService::containsMaliciousPayload(urldecode($queryPayload))) {
            \Illuminate\Support\Facades\Log::alert('Malicious query string payload blocked', [
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
            ]);
            return response('Forbidden: Malicious request blocked by Bluebase Security Shield.', 403);
        }

        /** @var Response $response */
        $response = $next($request);

        // 2. Attach Standard HTTP Security Headers
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'camera=(), microphone=(), geolocation=()');

        // 3. RFC 8288 Link Header advertising llms.txt and Markdown alternates for AI agents and crawlers
        $linkHeaders = [
            '<https://bluebasetechnologies.com/llms.txt>; rel="help"; type="text/plain"',
            '<https://bluebasetechnologies.com/llms.txt>; rel="alternate"; type="text/plain"',
            '<' . $request->url() . '>; rel="alternate"; type="text/markdown"',
        ];
        $response->headers->set('Link', implode(', ', $linkHeaders));

        // Remove server fingerprinting headers
        $response->headers->remove('X-Powered-By');
        if (function_exists('header_remove')) {
            @header_remove('X-Powered-By');
        }

        return $response;
    }
}
