<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display public listing of technical articles.
     */
    public function index(Request $request)
    {
        $selectedCategory = $request->query('category', 'all');
        $searchQuery = trim($request->query('q', ''));

        // Query builder for published blogs
        $query = Blog::published();

        if (!empty($searchQuery)) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', "%{$searchQuery}%")
                  ->orWhere('excerpt', 'like', "%{$searchQuery}%")
                  ->orWhere('content', 'like', "%{$searchQuery}%")
                  ->orWhere('author', 'like', "%{$searchQuery}%")
                  ->orWhere('category', 'like', "%{$searchQuery}%");
            });
        }

        if ($selectedCategory !== 'all') {
            $query->where(function ($q) use ($selectedCategory) {
                $q->where('category', 'like', "%{$selectedCategory}%");
            });
        }

        // Get Featured Article
        $featuredBlog = Blog::published()
            ->where('is_featured', true)
            ->first();

        // If no featured flagged, use the latest published blog
        if (!$featuredBlog) {
            $featuredBlog = Blog::published()->first();
        }

        // Get all articles (if all, exclude featured from grid so it isn't duplicated; if filtering, show matching)
        $blogsQuery = clone $query;
        if ($selectedCategory === 'all' && empty($searchQuery) && $featuredBlog) {
            $blogsQuery->where('id', '!=', $featuredBlog->id);
        }
        $blogs = $blogsQuery->get();

        // Categories with counts
        $allPublished = Blog::published()->get();
        $categories = [
            'all' => [
                'name' => 'All Articles',
                'slug' => 'all',
                'count' => $allPublished->count(),
            ],
            'saas' => [
                'name' => 'SaaS Architecture',
                'slug' => 'saas',
                'count' => $allPublished->filter(fn($b) => stripos($b->category, 'SaaS') !== false)->count(),
            ],
            'frontend' => [
                'name' => 'Frontend & Next.js',
                'slug' => 'frontend',
                'count' => $allPublished->filter(fn($b) => stripos($b->category, 'Frontend') !== false)->count(),
            ],
            'backend' => [
                'name' => 'API & Backend',
                'slug' => 'backend',
                'count' => $allPublished->filter(fn($b) => stripos($b->category, 'Backend') !== false || stripos($b->category, 'API') !== false)->count(),
            ],
            'security' => [
                'name' => 'DevSecOps & Security',
                'slug' => 'security',
                'count' => $allPublished->filter(fn($b) => stripos($b->category, 'Security') !== false || stripos($b->category, 'DevSecOps') !== false)->count(),
            ],
            'mobile' => [
                'name' => 'Mobile Engineering',
                'slug' => 'mobile',
                'count' => $allPublished->filter(fn($b) => stripos($b->category, 'Mobile') !== false)->count(),
            ],
            'ai' => [
                'name' => 'AI & Systems',
                'slug' => 'ai',
                'count' => $allPublished->filter(fn($b) => stripos($b->category, 'AI') !== false)->count(),
            ],
        ];

        return view('pages.resources.blog', compact(
            'featuredBlog',
            'blogs',
            'categories',
            'selectedCategory',
            'searchQuery'
        ));
    }

    /**
     * Display a single technical article deep-dive.
     */
    public function show(string $slug)
    {
        $blog = Blog::published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Related blogs: same category or latest, excluding current
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where(function ($q) use ($blog) {
                $categoryKeyword = explode(' ', $blog->category)[0] ?? '';
                if (!empty($categoryKeyword)) {
                    $q->where('category', 'like', "%{$categoryKeyword}%");
                }
            })
            ->take(3)
            ->get();

        if ($relatedBlogs->count() < 3) {
            $fallback = Blog::published()
                ->where('id', '!=', $blog->id)
                ->whereNotIn('id', $relatedBlogs->pluck('id'))
                ->take(3 - $relatedBlogs->count())
                ->get();
            $relatedBlogs = $relatedBlogs->concat($fallback);
        }

        return view('pages.resources.blog-single', compact('blog', 'relatedBlogs'));
    }
}

