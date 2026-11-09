<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display public listing of technical articles.
     */
    public function index(Request $request)
    {
        return $this->renderBlogListing($request);
    }

    /**
     * Dedicated category-wise blog listing page.
     */
    public function category(string $slug, Request $request)
    {
        $category = BlogCategory::where('slug', $slug)->first();

        // If not found in BlogCategory, check if any published blog matches category string
        if (!$category) {
            $fallbackBlog = Blog::published()->where('category', 'like', "%{$slug}%")->first();
            if ($fallbackBlog) {
                $category = BlogCategory::firstOrCreate(
                    ['slug' => $fallbackBlog->category_slug],
                    ['name' => $fallbackBlog->category, 'display_order' => 10]
                );
            } else {
                abort(404, 'Category not found');
            }
        }

        return $this->renderBlogListing($request, $category);
    }

    /**
     * Internal helper to render blog index or category archive.
     */
    protected function renderBlogListing(Request $request, ?BlogCategory $currentCategory = null)
    {
        $selectedCategory = $currentCategory ? $currentCategory->slug : $request->query('category', 'all');
        $searchQuery = trim($request->query('q', ''));

        // Query builder for published blogs
        $query = Blog::published()->with('blogCategory');

        if (!empty($searchQuery)) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('title', 'like', "%{$searchQuery}%")
                  ->orWhere('excerpt', 'like', "%{$searchQuery}%")
                  ->orWhere('content', 'like', "%{$searchQuery}%")
                  ->orWhere('author', 'like', "%{$searchQuery}%")
                  ->orWhere('category', 'like', "%{$searchQuery}%");
            });
        }

        if ($currentCategory) {
            $query->where(function ($q) use ($currentCategory) {
                $q->where('category_id', $currentCategory->id)
                  ->orWhere('category', 'like', "%{$currentCategory->name}%");
            });
        } elseif ($selectedCategory !== 'all') {
            $query->where(function ($q) use ($selectedCategory) {
                $q->whereHas('blogCategory', function ($cq) use ($selectedCategory) {
                    $cq->where('slug', $selectedCategory);
                })->orWhere('category', 'like', "%{$selectedCategory}%");
            });
        }

        // Get Featured Article (only on main blog index without search/filter)
        $featuredBlog = null;
        if (!$currentCategory && $selectedCategory === 'all' && empty($searchQuery)) {
            $featuredBlog = Blog::published()
                ->where('is_featured', true)
                ->first();

            if (!$featuredBlog) {
                $featuredBlog = Blog::published()->first();
            }
        }

        // Get articles
        $blogsQuery = clone $query;
        if ($featuredBlog) {
            $blogsQuery->where('id', '!=', $featuredBlog->id);
        }
        $blogs = $blogsQuery->paginate(12)->withQueryString();

        // Dynamic categories with live article counts
        $dbCategories = BlogCategory::active()->withCount('publishedBlogs')->get();
        $totalPublished = Blog::published()->count();

        $categories = [
            'all' => [
                'name' => 'All Articles',
                'slug' => 'all',
                'count' => $totalPublished,
                'url' => route('blog'),
            ],
        ];

        foreach ($dbCategories as $cat) {
            $categories[$cat->slug] = [
                'name' => $cat->name,
                'slug' => $cat->slug,
                'count' => $cat->published_blogs_count,
                'url' => route('blog.category', $cat->slug),
                'description' => $cat->description,
            ];
        }

        return view('pages.resources.blog', compact(
            'featuredBlog',
            'blogs',
            'categories',
            'selectedCategory',
            'searchQuery',
            'currentCategory'
        ));
    }

    /**
     * Display a single technical article deep-dive.
     */
    public function show(string $slug)
    {
        $blog = Blog::published()
            ->with('blogCategory')
            ->where('slug', $slug)
            ->firstOrFail();

        // Related blogs: same category or latest, excluding current
        $relatedBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->where(function ($q) use ($blog) {
                if ($blog->category_id) {
                    $q->where('category_id', $blog->category_id);
                } else {
                    $categoryKeyword = explode(' ', $blog->category)[0] ?? '';
                    if (!empty($categoryKeyword)) {
                        $q->where('category', 'like', "%{$categoryKeyword}%");
                    }
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
