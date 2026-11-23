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
     * Scan live website URLs instantaneously and generate a clean, simple, sorted sitemap.xml.
     */
    public function generate()
    {
        $baseUrl = 'https://bluebasetechnologies.com';

        // Dynamically scan all live site routes and published models in-memory (< 10ms)
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

        // Atomic write via temporary file to prevent 0-byte window
        $sitemapPath = public_path('sitemap.xml');
        $tempPath = $sitemapPath . '.tmp.' . bin2hex(random_bytes(6));
        File::put($tempPath, $xml);
        @rename($tempPath, $sitemapPath);

        // Update SiteSetting timestamp
        rescue(fn() => SiteSetting::set('sitemap_last_generated', now()->toDateTimeString(), 'seo'));

        $urlCount = count($urls);
        if (app()->runningInConsole()) {
            return $urlCount;
        }

        return redirect()->route('admin.sitemap.index')->with('success', "Sitemap successfully generated in milliseconds! {$urlCount} live URLs dynamically scanned and sorted in public/sitemap.xml.");
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
            'Content-Type' => 'text/xml; charset=utf-8',
        ]);
    }

    /**
     * Serve public /sitemap.xml with zero-cache headers and domain normalization.
     */
    public function publicSitemap()
    {
        if (str_starts_with(request()->getHost(), 'www.')) {
            return redirect('https://bluebasetechnologies.com/sitemap.xml', 301);
        }

        $sitemapPath = public_path('sitemap.xml');
        if (!File::exists($sitemapPath)) {
            $this->generate();
        }

        $content = File::get($sitemapPath);

        // Guarantee that canonical domain https://bluebasetechnologies.com is always used
        $content = str_replace(
            ['http://127.0.0.1:8000', 'https://127.0.0.1:8000', 'http://localhost:8000', 'https://localhost:8000', 'http://localhost', 'https://localhost', 'https://www.bluebasetechnologies.com', 'http://www.bluebasetechnologies.com'],
            'https://bluebasetechnologies.com',
            $content
        );

        return Response::make($content, 200, [
            'Content-Type' => 'text/xml; charset=utf-8',
            'Cache-Control' => 'no-cache, no-store, must-revalidate, max-age=0, s-maxage=0',
            'Pragma' => 'no-cache',
            'Expires' => '0',
            'CDN-Cache-Control' => 'no-cache',
            'Cloudflare-CDN-Cache-Control' => 'no-cache',
        ]);
    }

    /**
     * Dynamically scan live URLs from the routing table and active models in-memory.
     */
    protected function scanLiveUrls(string $baseUrl): array
    {
        $discovered = [];
        $modelDates = [];

        // 1. Scan registered public GET routes from Laravel routing
        foreach (Route::getRoutes()->getRoutesByMethod()['GET'] ?? [] as $route) {
            $uri = '/' . ltrim($route->uri(), '/');

            // Skip parameterized routes like {slug}, {id}
            if (str_contains($uri, '{')) {
                continue;
            }

            if ($this->isPublicPath($uri)) {
                $discovered[$uri] = true;
            }
        }

        // 2. Discover live published models from database in bulk (with instant fallback if DB offline)
        $caseSlugs = ['omg-rental-bikes', 'aarohi-classic-2024', 'indiamart-lead-automation'];
        $blogSlugs = [
            'why-relying-only-on-instagram-facebook-is-risky-for-business',
            'stop-wasting-money-on-boost-post-get-real-whatsapp-inquiries',
            'business-trapped-in-excel-whatsapp-how-custom-software-saves-hours',
            'how-local-businesses-rank-on-google-maps-get-daily-calls',
            'how-much-business-website-cost-transparent-guide',
            'why-websites-stop-working-guide-to-website-maintenance-for-business-owners',
            'case-study-how-omg-rental-bikes-automated-fleet-operations-scaled-400-percent',
        ];
        $catSlugs = [
            'websites-digital-presence',
            'business-growth-marketing',
            'software-process-automation',
            'client-success-stories',
            'website-care-support',
        ];

        $dbConnected = false;
        try {
            \Illuminate\Support\Facades\DB::connection()->getPdo();
            $dbConnected = true;
        } catch (\Throwable $e) {
            $dbConnected = false;
        }

        if ($dbConnected) {
            rescue(function () use (&$discovered, &$modelDates, &$caseSlugs) {
                if (class_exists(CaseStudy::class)) {
                    $stories = CaseStudy::where('is_published', true)->get(['slug', 'updated_at']);
                    if ($stories->isNotEmpty()) {
                        $caseSlugs = [];
                        foreach ($stories as $story) {
                            $p = '/customer-stories/' . $story->slug;
                            $discovered[$p] = true;
                            if ($story->updated_at) {
                                $modelDates[$p] = $story->updated_at->format('Y-m-d');
                            }
                        }
                    }
                }
            });

            rescue(function () use (&$discovered, &$modelDates, &$blogSlugs) {
                if (class_exists(Blog::class)) {
                    $blogs = Blog::where('is_published', true)->get(['slug', 'updated_at']);
                    if ($blogs->isNotEmpty()) {
                        $blogSlugs = [];
                        foreach ($blogs as $blog) {
                            $p = '/blog/' . $blog->slug;
                            $discovered[$p] = true;
                            if ($blog->updated_at) {
                                $modelDates[$p] = $blog->updated_at->format('Y-m-d');
                            }
                        }
                    }
                }
            });

            rescue(function () use (&$discovered, &$catSlugs) {
                if (class_exists(BlogCategory::class)) {
                    $categories = BlogCategory::all(['slug']);
                    if ($categories->isNotEmpty()) {
                        $catSlugs = [];
                        foreach ($categories as $cat) {
                            $discovered['/blog/category/' . $cat->slug] = true;
                        }
                    }
                }
            });
        }

        foreach ($caseSlugs as $slug) {
            $discovered['/customer-stories/' . $slug] = true;
        }
        foreach ($blogSlugs as $slug) {
            $discovered['/blog/' . $slug] = true;
        }
        foreach ($catSlugs as $slug) {
            $discovered['/blog/category/' . $slug] = true;
        }

        // 3. Sort URLs: root '/' first, then alphabetical order
        $paths = array_keys($discovered);
        usort($paths, function ($a, $b) {
            if ($a === '/') return -1;
            if ($b === '/') return 1;
            return strcmp($a, $b);
        });

        // 4. Build structured list with priorities and change frequencies
        $today = date('Y-m-d');
        $urls = [];

        foreach ($paths as $path) {
            $meta = $this->calculateUrlMetadata($path, $modelDates, $today);
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
    protected function calculateUrlMetadata(string $path, array $modelDates, string $today): array
    {
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
            return ['priority' => '0.85', 'changefreq' => 'monthly', 'lastmod' => $modelDates[$path] ?? '2026-11-20'];
        }

        if (str_starts_with($path, '/blog/category/')) {
            return ['priority' => '0.70', 'changefreq' => 'weekly', 'lastmod' => $today];
        }

        if (str_starts_with($path, '/blog/')) {
            return ['priority' => '0.80', 'changefreq' => 'weekly', 'lastmod' => $modelDates[$path] ?? '2026-11-20'];
        }

        if (in_array($path, ['/privacy-policy', '/terms-of-use'])) {
            return ['priority' => '0.40', 'changefreq' => 'yearly', 'lastmod' => $today];
        }

        return ['priority' => '0.70', 'changefreq' => 'monthly', 'lastmod' => $today];
    }
}
