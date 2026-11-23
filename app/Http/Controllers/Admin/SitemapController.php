<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\CaseStudy;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    /**
     * Show the Sitemap Generator dashboard with file stats, metrics and inspection.
     */
    public function index()
    {
        $sitemapFile = public_path('sitemap.xml');
        $exists = File::exists($sitemapFile);
        $fileSize = $exists ? File::size($sitemapFile) : 0;
        $lastModified = $exists ? date('M d, Y H:i:s', File::lastModified($sitemapFile)) : 'Not generated yet';
        $xmlContent = $exists ? File::get($sitemapFile) : null;

        $totalUrls = ($exists && $xmlContent) ? substr_count($xmlContent, '<url>') : 0;
        $caseStudiesCount = rescue(fn() => CaseStudy::where('is_published', true)->count(), 3);
        $blogsCount = rescue(fn() => Blog::where('is_published', true)->count(), 7);
        $categoriesCount = rescue(fn() => BlogCategory::count(), 5);
        $pagesCount = max(0, $totalUrls - $caseStudiesCount - $blogsCount - $categoriesCount);

        $lastGeneratedSetting = SiteSetting::get('sitemap_last_generated', $lastModified);

        return view('admin.sitemap.index', compact(
            'exists',
            'fileSize',
            'lastModified',
            'lastGeneratedSetting',
            'xmlContent',
            'pagesCount',
            'caseStudiesCount',
            'blogsCount',
            'categoriesCount',
            'totalUrls'
        ));
    }

    /**
     * Scan live website URLs and generate a clean, simple, sorted sitemap.xml.
     */
    public function generate()
    {
        $rawAppUrl = config('app.url', '');
        $isLocal = empty($rawAppUrl) || str_contains($rawAppUrl, 'localhost') || str_contains($rawAppUrl, '127.0.0.1') || str_contains($rawAppUrl, '::1');
        $baseUrl = rtrim($isLocal ? 'https://bluebasetechnologies.com' : $rawAppUrl, '/');

        // Dynamically scan and discover all live site URLs
        $urls = $this->scanLiveUrls($baseUrl);

        // Build clean, simple, unstyled XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $item) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($item['loc'], ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>{$item['lastmod']}</lastmod>\n";
            $xml .= "    <changefreq>{$item['changefreq']}</changefreq>\n";
            $xml .= "    <priority>{$item['priority']}</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>' . "\n";

        // Save to public/sitemap.xml
        $sitemapPath = public_path('sitemap.xml');
        File::put($sitemapPath, $xml);

        // Update SiteSetting timestamp
        rescue(fn() => SiteSetting::set('sitemap_last_generated', now()->toDateTimeString(), 'seo'));

        $urlCount = count($urls);
        return redirect()->route('admin.sitemap.index')->with('success', "Sitemap successfully generated! {$urlCount} live URLs dynamically scanned and sorted in public/sitemap.xml.");
    }

    /**
     * Download the sitemap.xml file.
     */
    public function download()
    {
        $sitemapPath = public_path('sitemap.xml');
        if (!File::exists($sitemapPath)) {
            $this->generate();
        }

        return response()->download($sitemapPath, 'sitemap.xml', [
            'Content-Type' => 'application/xml',
        ]);
    }

    /**
     * Serve public /sitemap.xml
     */
    public function publicSitemap()
    {
        $sitemapPath = public_path('sitemap.xml');
        if (!File::exists($sitemapPath)) {
            $this->generate();
        }

        $content = File::get($sitemapPath);
        return Response::make($content, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'X-Robots-Tag' => 'noindex',
        ]);
    }

    /**
     * Dynamically scan live URLs from the live site and routing table.
     */
    protected function scanLiveUrls(string $baseUrl): array
    {
        $discovered = [];
        $queue = ['/'];
        $visited = [];

        // 1. Scan registered public GET routes from Laravel routing
        foreach (Route::getRoutes()->getRoutesByMethod()['GET'] ?? [] as $route) {
            $uri = '/' . ltrim($route->uri(), '/');

            // Skip parameterized routes like {slug}, {id}
            if (str_contains($uri, '{')) {
                continue;
            }

            if ($this->isPublicPath($uri)) {
                $queue[] = $uri;
            }
        }

        // 2. Discover live published models from database
        rescue(function () use (&$queue) {
            if (class_exists(CaseStudy::class)) {
                $slugs = CaseStudy::where('is_published', true)->pluck('slug')->all();
                foreach ($slugs as $slug) {
                    $queue[] = '/customer-stories/' . $slug;
                }
            }
        });

        rescue(function () use (&$queue) {
            if (class_exists(Blog::class)) {
                $slugs = Blog::where('is_published', true)->pluck('slug')->all();
                foreach ($slugs as $slug) {
                    $queue[] = '/blog/' . $slug;
                }
            }
        });

        rescue(function () use (&$queue) {
            if (class_exists(BlogCategory::class)) {
                $slugs = BlogCategory::pluck('slug')->all();
                foreach ($slugs as $slug) {
                    $queue[] = '/blog/category/' . $slug;
                }
            }
        });

        // 3. Crawl live website pages to verify reachable 200 OK links
        $queue = array_unique($queue);

        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 4);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_USERAGENT, 'Bluebase-Sitemap-Scanner/1.0');

            $maxCrawl = 150;
            $crawled = 0;

            while (!empty($queue) && $crawled < $maxCrawl) {
                $path = array_shift($queue);
                $path = '/' . ltrim(parse_url($path, PHP_URL_PATH) ?? '', '/');
                if ($path !== '/') {
                    $path = rtrim($path, '/');
                }

                if (isset($visited[$path])) {
                    continue;
                }
                $visited[$path] = true;

                if (!$this->isPublicPath($path)) {
                    continue;
                }

                $targetUrl = $baseUrl . ($path === '/' ? '' : $path);
                curl_setopt($ch, CURLOPT_URL, $targetUrl);
                $html = @curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                $finalUrl = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);

                $finalPath = '/' . ltrim(parse_url($finalUrl, PHP_URL_PATH) ?? '', '/');
                if ($finalPath !== '/') {
                    $finalPath = rtrim($finalPath, '/');
                }

                if ($httpCode === 200 && is_string($html)) {
                    if ($this->isPublicPath($finalPath)) {
                        $discovered[$finalPath] = true;
                    }
                    $crawled++;

                    // Extract and enqueue internal links
                    if (preg_match_all('/<a\s[^>]*href=["\']([^"\']+)["\']/i', $html, $matches)) {
                        foreach ($matches[1] as $href) {
                            $href = trim($href);
                            if (empty($href) || str_starts_with($href, '#') || str_starts_with($href, 'javascript:') || str_starts_with($href, 'mailto:') || str_starts_with($href, 'tel:')) {
                                continue;
                            }

                            $parsed = parse_url($href);
                            $host = $parsed['host'] ?? null;
                            if ($host && !in_array(strtolower($host), ['bluebasetechnologies.com', 'www.bluebasetechnologies.com', 'localhost', '127.0.0.1'])) {
                                continue;
                            }

                            $linkPath = '/' . ltrim($parsed['path'] ?? '/', '/');
                            if ($linkPath !== '/') {
                                $linkPath = rtrim($linkPath, '/');
                            }

                            if ($this->isPublicPath($linkPath) && !isset($visited[$linkPath]) && !in_array($linkPath, $queue)) {
                                $queue[] = $linkPath;
                            }
                        }
                    }
                } elseif ($httpCode === 0) {
                    // Host not reachable via network, keep registered route
                    $discovered[$path] = true;
                }
            }

            curl_close($ch);
        }

        // Include any remaining public paths if crawl did not reach them
        foreach ($queue as $remainingPath) {
            $remainingPath = '/' . ltrim($remainingPath, '/');
            if ($remainingPath !== '/') {
                $remainingPath = rtrim($remainingPath, '/');
            }
            if ($this->isPublicPath($remainingPath)) {
                $discovered[$remainingPath] = true;
            }
        }

        // 4. Sort URLs: root '/' first, then alphabetical order
        $paths = array_keys($discovered);
        usort($paths, function ($a, $b) {
            if ($a === '/') return -1;
            if ($b === '/') return 1;
            return strcmp($a, $b);
        });

        // 5. Build structured list with priorities and change frequencies
        $today = date('Y-m-d');
        $urls = [];

        foreach ($paths as $path) {
            $meta = $this->calculateUrlMetadata($path);
            $urls[] = [
                'loc' => $path === '/' ? $baseUrl . '/' : $baseUrl . $path,
                'path' => $path,
                'lastmod' => $meta['lastmod'] ?? $today,
                'changefreq' => $meta['changefreq'] ?? 'weekly',
                'priority' => $meta['priority'] ?? '0.8',
            ];
        }

        return $urls;
    }

    /**
     * Check if a path is a public indexable page.
     */
    protected function isPublicPath(string $path): bool
    {
        if (preg_match('#^/(admin|login|mail|filemanager|crm|client-portal|newsletter|contact/security-verify|sitemap\.xml|sitemap\.xsl|favicon\.ico|free-trial|up$)#i', $path)) {
            return false;
        }

        if (preg_match('#\.(jpg|jpeg|png|gif|svg|webp|css|js|ico|pdf|zip|xml|xsl|txt|json)$#i', $path)) {
            return false;
        }

        return true;
    }

    /**
     * Determine metadata for each URL dynamically based on its route pattern.
     */
    protected function calculateUrlMetadata(string $path): array
    {
        $today = date('Y-m-d');

        if ($path === '/') {
            return ['priority' => '1.0', 'changefreq' => 'daily', 'lastmod' => $today];
        }

        if (in_array($path, ['/services', '/solutions', '/blog', '/customer-stories', '/contact', '/company', '/how-we-work', '/careers', '/compliance-security'])) {
            return ['priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => $today];
        }

        if (in_array($path, ['/web-development', '/website-design', '/mobile-app-development', '/saas-mvp-development', '/ecommerce-development', '/ui-ux-design', '/api-backend-development', '/website-redesign', '/maintenance-support'])) {
            return ['priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => $today];
        }

        if (str_starts_with($path, '/customer-stories/')) {
            $slug = substr($path, strlen('/customer-stories/'));
            $lastmod = rescue(fn() => CaseStudy::where('slug', $slug)->value('updated_at')?->format('Y-m-d'), $today);
            return ['priority' => '0.85', 'changefreq' => 'monthly', 'lastmod' => $lastmod ?: $today];
        }

        if (str_starts_with($path, '/blog/category/')) {
            return ['priority' => '0.70', 'changefreq' => 'weekly', 'lastmod' => $today];
        }

        if (str_starts_with($path, '/blog/')) {
            $slug = substr($path, strlen('/blog/'));
            $lastmod = rescue(fn() => Blog::where('slug', $slug)->value('updated_at')?->format('Y-m-d'), $today);
            return ['priority' => '0.80', 'changefreq' => 'weekly', 'lastmod' => $lastmod ?: $today];
        }

        if (in_array($path, ['/privacy-policy', '/terms-of-use'])) {
            return ['priority' => '0.40', 'changefreq' => 'yearly', 'lastmod' => $today];
        }

        return ['priority' => '0.70', 'changefreq' => 'monthly', 'lastmod' => $today];
    }
}
