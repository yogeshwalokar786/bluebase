<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\CaseStudy;
use App\Models\PageSeo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

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

        $pagesCount = count($this->getStaticPages());
        $caseStudiesCount = rescue(fn() => CaseStudy::where('is_published', true)->count(), 3);
        $blogsCount = rescue(fn() => Blog::where('is_published', true)->count(), 0);
        $categoriesCount = rescue(fn() => BlogCategory::count(), 0);
        $totalUrls = $pagesCount + $caseStudiesCount + $blogsCount + $categoriesCount;

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
     * Generate fresh sitemap.xml to public/sitemap.xml.
     */
    public function generate()
    {
        $baseUrl = rtrim(config('app.url') && !str_contains(config('app.url'), 'localhost') ? config('app.url') : 'https://bluebasetechnologies.com', '/');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"' . "\n";
        $xml .= '        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"' . "\n";
        $xml .= '        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        $urlCount = 0;
        $today = date('Y-m-d');

        // 1. Static Pages & Services
        $staticPages = $this->getStaticPages();
        foreach ($staticPages as $page) {
            $loc = $page['url_path'] === '/' ? $baseUrl . '/' : $baseUrl . '/' . ltrim($page['url_path'], '/');
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>{$page['changefreq']}</changefreq>\n";
            $xml .= "    <priority>" . number_format($page['priority'], 1) . "</priority>\n";
            $xml .= "  </url>\n";
            $urlCount++;
        }

        // 2. Published Case Studies
        $caseStudies = rescue(fn() => CaseStudy::where('is_published', true)->get(), collect([]));
        $handledSlugs = [];
        foreach ($caseStudies as $cs) {
            $loc = $baseUrl . '/customer-stories/' . $cs->slug;
            $handledSlugs[] = $cs->slug;
            $lastmod = $cs->updated_at ? $cs->updated_at->format('Y-m-d') : $today;

            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>monthly</changefreq>\n";
            $xml .= "    <priority>0.85</priority>\n";

            // Google Image Extension
            $img = $cs->hero_image ?: $cs->thumbnail_image;
            if (!empty($img)) {
                $imgUrl = str_starts_with($img, 'http') ? $img : $baseUrl . '/' . ltrim($img, '/');
                $xml .= "    <image:image>\n";
                $xml .= "      <image:loc>" . htmlspecialchars($imgUrl, ENT_XML1) . "</image:loc>\n";
                $xml .= "      <image:title>" . htmlspecialchars($cs->title, ENT_XML1) . "</image:title>\n";
                $xml .= "    </image:image>\n";
            }
            $xml .= "  </url>\n";
            $urlCount++;
        }

        // Fallback for static case studies if not in database
        $staticStories = [
            'omg-rental-bikes' => 'OMG Rental Bikes Fleet Automation Case Study',
            'aarohi-classic-2024' => 'Aarohi Classic Real Estate & Booking Platform Case Study',
            'indiamart-lead-automation' => 'IndiaMART Lead Automation & CRM Pipeline Case Study',
        ];
        foreach ($staticStories as $slug => $title) {
            if (!in_array($slug, $handledSlugs)) {
                $loc = $baseUrl . '/customer-stories/' . $slug;
                $xml .= "  <url>\n";
                $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
                $xml .= "    <lastmod>{$today}</lastmod>\n";
                $xml .= "    <changefreq>monthly</changefreq>\n";
                $xml .= "    <priority>0.85</priority>\n";
                $xml .= "  </url>\n";
                $urlCount++;
            }
        }

        // 3. Published Blog Articles
        $blogs = rescue(fn() => Blog::where('is_published', true)->latest()->get(), collect([]));
        foreach ($blogs as $blog) {
            $loc = $baseUrl . '/blog/' . $blog->slug;
            $lastmod = $blog->updated_at ? $blog->updated_at->format('Y-m-d') : $today;

            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.80</priority>\n";

            if (!empty($blog->image)) {
                $imgUrl = str_starts_with($blog->image, 'http') ? $blog->image : $baseUrl . '/' . ltrim($blog->image, '/');
                $xml .= "    <image:image>\n";
                $xml .= "      <image:loc>" . htmlspecialchars($imgUrl, ENT_XML1) . "</image:loc>\n";
                $xml .= "      <image:title>" . htmlspecialchars($blog->title, ENT_XML1) . "</image:title>\n";
                $xml .= "    </image:image>\n";
            }
            $xml .= "  </url>\n";
            $urlCount++;
        }

        // 4. Blog Categories
        $categories = rescue(fn() => BlogCategory::all(), collect([]));
        foreach ($categories as $cat) {
            $loc = $baseUrl . '/blog/category/' . $cat->slug;
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>{$today}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.70</priority>\n";
            $xml .= "  </url>\n";
            $urlCount++;
        }

        $xml .= '</urlset>';

        // Save to public/sitemap.xml
        $sitemapPath = public_path('sitemap.xml');
        File::put($sitemapPath, $xml);

        // Update SiteSetting timestamp
        rescue(fn() => SiteSetting::set('sitemap_last_generated', now()->toDateTimeString(), 'seo'));

        return redirect()->route('admin.sitemap.index')->with('success', "Sitemap successfully generated! {$urlCount} total canonical URLs indexed into public/sitemap.xml with Google Image extensions.");
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
     * Inventory of all static canonical pages, services, solutions, use-cases, and legal documents.
     */
    protected function getStaticPages(): array
    {
        return [
            // Core Pages
            ['url_path' => '/', 'priority' => 1.0, 'changefreq' => 'daily'],
            ['url_path' => '/services', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/solutions', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/customer-stories', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/contact', 'priority' => 0.9, 'changefreq' => 'monthly'],
            ['url_path' => '/company', 'priority' => 0.8, 'changefreq' => 'monthly'],
            ['url_path' => '/how-we-work', 'priority' => 0.8, 'changefreq' => 'monthly'],
            ['url_path' => '/compliance-security', 'priority' => 0.8, 'changefreq' => 'monthly'],
            ['url_path' => '/careers', 'priority' => 0.8, 'changefreq' => 'weekly'],
            ['url_path' => '/blog', 'priority' => 0.9, 'changefreq' => 'daily'],

            // Core Engineering Services
            ['url_path' => '/web-development', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/website-design', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/mobile-app-development', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/saas-mvp-development', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/ecommerce-development', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/ui-ux-design', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/api-backend-development', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/website-redesign', 'priority' => 0.9, 'changefreq' => 'weekly'],
            ['url_path' => '/maintenance-support', 'priority' => 0.9, 'changefreq' => 'weekly'],

            // Legal & Terms
            ['url_path' => '/privacy-policy', 'priority' => 0.4, 'changefreq' => 'yearly'],
            ['url_path' => '/terms-of-use', 'priority' => 0.4, 'changefreq' => 'yearly'],
        ];
    }
}
