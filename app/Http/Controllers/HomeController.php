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
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        $latestBlogs = rescue(function () {
            return Blog::published()->with('blogCategory')->latest('published_at')->take(3)->get();
        }, collect());

        $latestCaseStudies = rescue(function () {
            if (\Illuminate\Support\Facades\Schema::hasTable('case_studies')) {
                return CaseStudy::published()->take(3)->get();
            }
            return collect();
        }, collect());

        return view('pages.home', compact('settings', 'latestBlogs', 'latestCaseStudies'));
    }
}
