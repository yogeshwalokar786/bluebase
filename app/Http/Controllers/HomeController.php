<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CaseStudy;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = rescue(fn() => cache()->remember('site_settings_home', 3600, function () {
            $items = SiteSetting::all()->pluck('value', 'key')->toArray();
            foreach (['hero_video_url', 'hero_video_poster'] as $k) {
                if (!empty($items[$k]) && (str_starts_with($items[$k], 'https://videos/') || str_starts_with($items[$k], 'http://videos/') || str_starts_with($items[$k], 'https://images/') || str_starts_with($items[$k], 'http://images/'))) {
                    $cleaned = preg_replace('#^https?://#', '', $items[$k]);
                    $items[$k] = $cleaned;
                    try {
                        SiteSetting::where('key', $k)->update(['value' => $cleaned]);
                    } catch (\Throwable $e) {}
                }
            }
            return $items;
        }), []);

        $latestBlogs = rescue(function () {
            return cache()->remember('home_latest_blogs', 1800, function () {
                return Blog::published()->with('blogCategory')->latest('published_at')->take(3)->get();
            });
        }, collect());

        $latestCaseStudies = rescue(function () {
            return cache()->remember('home_latest_case_studies', 1800, function () {
                if (\Illuminate\Support\Facades\Schema::hasTable('case_studies')) {
                    return CaseStudy::published()->take(3)->get();
                }
                return collect();
            });
        }, collect());

        return view('pages.home', compact('settings', 'latestBlogs', 'latestCaseStudies'));
    }
}
