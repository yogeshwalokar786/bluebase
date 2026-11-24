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

    public function llmsTxt()
    {
        $path = public_path('llms.txt');
        $content = file_exists($path) ? file_get_contents($path) : '# Bluebase Technologies';

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=utf-8',
            'Cache-Control' => 'public, max-age=86400, stale-while-revalidate=3600',
        ]);
    }

    public function llmsFullTxt()
    {
        $path = public_path('llms-full.txt');
        $content = file_exists($path) ? file_get_contents($path) : '# Bluebase Technologies';

        return response($content, 200, [
            'Content-Type' => 'text/plain; charset=utf-8',
            'Cache-Control' => 'public, max-age=86400, stale-while-revalidate=3600',
        ]);
    }
}

