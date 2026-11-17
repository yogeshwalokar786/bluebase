<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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

        return view('pages.home', compact('settings', 'latestBlogs'));
    }
}
