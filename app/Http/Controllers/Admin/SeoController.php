<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageSeo;
use App\Models\SiteSetting;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class SeoController extends Controller
{
    // ==========================================
    // 1. GLOBAL SEO CONFIGURATION
    // ==========================================
    public function globalSeo()
    {
        $settings = SiteSetting::where('group', 'seo')
            ->pluck('value', 'key')
            ->toArray();

        return view('admin.seo.global', compact('settings'));
    }

    public function updateGlobalSeo(Request $request)
    {
        $keys = [
            'seo_default_title',
            'seo_default_description',
            'seo_default_keywords',
            'seo_default_og_image',
            'seo_twitter_handle',
            'seo_robots',
            'seo_google_verification',
            'seo_bing_verification',
            'seo_header_scripts',
            'seo_footer_scripts',
        ];

        foreach ($keys as $k) {
            SiteSetting::set($k, $request->input($k), 'seo');
        }

        return back()->with('success', 'Global SEO metadata and analytics scripts updated successfully.');
    }

    // ==========================================
    // 2. PER-PAGE SEO MANAGER
    // ==========================================
    public function pageSeoIndex(Request $request)
    {
        $query = PageSeo::query();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('page_name', 'like', "%{$s}%")
                  ->orWhere('route_name', 'like', "%{$s}%")
                  ->orWhere('meta_title', 'like', "%{$s}%")
                  ->orWhere('url_path', 'like', "%{$s}%");
            });
        }

        if ($request->filled('sitemap')) {
            if ($request->sitemap === 'yes') {
                $query->where('is_in_sitemap', true);
            } elseif ($request->sitemap === 'no') {
                $query->where('is_in_sitemap', false);
            }
        }

        $pages = $query->orderBy('priority', 'desc')->paginate(20)->withQueryString();
        $totalInSitemap = PageSeo::where('is_in_sitemap', true)->count();

        return view('admin.seo.pages-index', compact('pages', 'totalInSitemap'));
    }

    public function pageSeoCreate()
    {
        return view('admin.seo.page-form', [
            'page' => new PageSeo([
                'priority' => 0.8,
                'changefreq' => 'weekly',
                'robots' => 'index, follow',
                'is_in_sitemap' => true,
            ]),
            'isEdit' => false,
        ]);
    }

    public function pageSeoStore(Request $request)
    {
        $request->validate([
            'page_name' => 'required|string|max:255',
            'route_name' => 'required|string|max:100|unique:page_seos,route_name',
            'url_path' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|string',
            'og_image' => 'nullable|string',
            'robots' => 'required|string',
            'priority' => 'required|numeric|min:0|max:1',
            'changefreq' => 'required|string',
        ]);

        PageSeo::create([
            'page_name' => $request->page_name,
            'route_name' => $request->route_name,
            'url_path' => $request->url_path,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'canonical_url' => $request->canonical_url ?: url($request->url_path),
            'og_image' => $request->og_image ?: 'images/stories/omg-rental-bikes-brand.png',
            'robots' => $request->robots,
            'priority' => $request->priority,
            'changefreq' => $request->changefreq,
            'is_in_sitemap' => $request->has('is_in_sitemap'),
        ]);

        return redirect()->route('admin.seo.pages.index')->with('success', "SEO entry for '{$request->page_name}' created successfully.");
    }

    public function pageSeoEdit($id)
    {
        $page = PageSeo::findOrFail($id);
        return view('admin.seo.page-form', [
            'page' => $page,
            'isEdit' => true,
        ]);
    }

    public function pageSeoUpdate(Request $request, $id)
    {
        $page = PageSeo::findOrFail($id);

        $request->validate([
            'page_name' => 'required|string|max:255',
            'route_name' => "required|string|max:100|unique:page_seos,route_name,{$id}",
            'url_path' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'required|string',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|string',
            'og_image' => 'nullable|string',
            'robots' => 'required|string',
            'priority' => 'required|numeric|min:0|max:1',
            'changefreq' => 'required|string',
        ]);

        $page->update([
            'page_name' => $request->page_name,
            'route_name' => $request->route_name,
            'url_path' => $request->url_path,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'canonical_url' => $request->canonical_url ?: url($request->url_path),
            'og_image' => $request->og_image,
            'robots' => $request->robots,
            'priority' => $request->priority,
            'changefreq' => $request->changefreq,
            'is_in_sitemap' => $request->has('is_in_sitemap'),
        ]);

        return redirect()->route('admin.seo.pages.index')->with('success', "SEO entry for '{$page->page_name}' updated successfully.");
    }

    public function pageSeoDestroy($id)
    {
        $page = PageSeo::findOrFail($id);
        $name = $page->page_name;
        $page->delete();

        return redirect()->route('admin.seo.pages.index')->with('success', "SEO record for '{$name}' deleted.");
    }

    // ==========================================
    // 3. SITEMAP GENERATOR & MANAGER
    // ==========================================
    public function sitemapIndex()
    {
        $sitemapFile = public_path('sitemap.xml');
        $exists = File::exists($sitemapFile);
        $fileSize = $exists ? File::size($sitemapFile) : 0;
        $lastModified = $exists ? date('M d, Y H:i:s', File::lastModified($sitemapFile)) : 'Not generated yet';
        $xmlContent = $exists ? File::get($sitemapFile) : null;

        $pagesCount = PageSeo::where('is_in_sitemap', true)->count();
        $blogsCount = Blog::where('is_published', true)->count();
        $totalUrls = $pagesCount + $blogsCount;

        $lastGeneratedSetting = SiteSetting::get('sitemap_last_generated', $lastModified);

        return view('admin.seo.sitemap', compact(
            'exists',
            'fileSize',
            'lastModified',
            'lastGeneratedSetting',
            'xmlContent',
            'pagesCount',
            'blogsCount',
            'totalUrls'
        ));
    }

    public function generateSitemap()
    {
        $baseUrl = url('/');
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ' .
                'xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" ' .
                'xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . "\n";

        // 1. Pages from page_seos
        $pages = PageSeo::where('is_in_sitemap', true)->orderBy('priority', 'desc')->get();
        foreach ($pages as $p) {
            $loc = $baseUrl . '/' . ltrim($p->url_path, '/');
            $lastmod = $p->updated_at ? $p->updated_at->format('Y-m-d') : date('Y-m-d');
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>{$p->changefreq}</changefreq>\n";
            $xml .= "    <priority>" . number_format($p->priority, 1) . "</priority>\n";
            $xml .= "  </url>\n";
        }

        // 2. Published Blog Posts & Case Studies
        $blogs = Blog::where('is_published', true)->latest()->get();
        foreach ($blogs as $b) {
            $loc = $baseUrl . '/blog/' . $b->slug;
            $lastmod = $b->updated_at ? $b->updated_at->format('Y-m-d') : date('Y-m-d');
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "    <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "    <changefreq>weekly</changefreq>\n";
            $xml .= "    <priority>0.7</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        // Save to public/sitemap.xml
        $sitemapPath = public_path('sitemap.xml');
        File::put($sitemapPath, $xml);

        // Update SiteSetting
        SiteSetting::set('sitemap_last_generated', now()->toDateTimeString(), 'seo');

        return back()->with('success', 'Sitemap.xml regenerated successfully with all canonical URLs, blogs, and services.');
    }

    // ==========================================
    // 4. PUBLIC SITEMAP.XML ROUTE
    // ==========================================
    public function publicSitemap()
    {
        $sitemapPath = public_path('sitemap.xml');
        if (!File::exists($sitemapPath)) {
            $this->generateSitemap();
        }

        $content = File::get($sitemapPath);
        return Response::make($content, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'X-Robots-Tag' => 'noindex',
        ]);
    }
}

