<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function whitepapers()
    {
        return view('pages.resources.whitepapers');
    }

    public function blog(Request $request)
    {
        return app(BlogController::class)->index($request);
    }

    public function blogShow($slug)
    {
        return app(BlogController::class)->show($slug);
    }

    public function suitsBlog()
    {
        return redirect()->route('blog', [], 301);
    }

    public function privacyPolicy()
    {
        return view('pages.legal.privacy-policy');
    }

    public function termsOfUse()
    {
        return view('pages.legal.terms-of-use');
    }
}

