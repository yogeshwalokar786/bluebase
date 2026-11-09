<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCmsController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('blogCategory')->latest()->paginate(15);
        $categories = BlogCategory::withCount('blogs')->orderBy('name')->get();
        return view('admin.cms.blogs.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = BlogCategory::active()->get();
        return view('admin.cms.blogs.form', [
            'blog' => new Blog([
                'is_published' => true,
                'author' => 'Bluebase Engineering Team',
                'author_role' => 'Principal Systems Architect',
                'category' => 'SaaS Architecture',
                'robots' => 'index, follow',
                'schema_type' => 'TechArticle',
            ]),
            'categories' => $categories,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'category_id' => 'nullable',
            'new_category_name' => 'nullable|string|max:100',
            'author' => 'required|string|max:150',
            'author_role' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            // SEO Panel Validation
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            'focus_keyword' => 'nullable|string|max:150',
            'canonical_url' => 'nullable|string|max:500',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:1000',
            'og_image' => 'nullable|string|max:255',
            'robots' => 'nullable|string|max:50',
            'schema_type' => 'nullable|string|max:50',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        // Resolve or Dynamically Create Category
        $categoryId = null;
        $categoryName = 'Engineering';

        if (!empty($request->new_category_name)) {
            $cat = BlogCategory::firstOrCreate(
                ['slug' => Str::slug($request->new_category_name)],
                ['name' => trim($request->new_category_name), 'display_order' => 10]
            );
            $categoryId = $cat->id;
            $categoryName = $cat->name;
        } elseif (!empty($request->category_id) && is_numeric($request->category_id)) {
            $cat = BlogCategory::find($request->category_id);
            if ($cat) {
                $categoryId = $cat->id;
                $categoryName = $cat->name;
            }
        } elseif (!empty($request->category)) {
            $cat = BlogCategory::firstOrCreate(
                ['slug' => Str::slug($request->category)],
                ['name' => trim($request->category), 'display_order' => 10]
            );
            $categoryId = $cat->id;
            $categoryName = $cat->name;
        }

        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $categoryId,
            'category' => $categoryName,
            'author' => $request->author,
            'author_role' => $request->author_role ?: 'Principal Systems Architect',
            'read_time' => $request->read_time ?: '5 min read',
            'image' => $request->image ?: 'images/stories/screens-clicks.jpg',
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
            'is_featured' => $request->has('is_featured'),
            'published_at' => $request->has('is_published') ? now() : null,
            // SEO Structure
            'meta_title' => $request->meta_title ?: $request->title,
            'meta_description' => $request->meta_description ?: Str::limit(strip_tags($request->excerpt), 155),
            'meta_keywords' => $request->meta_keywords,
            'focus_keyword' => $request->focus_keyword,
            'canonical_url' => $request->canonical_url,
            'og_title' => $request->og_title ?: ($request->meta_title ?: $request->title),
            'og_description' => $request->og_description ?: ($request->meta_description ?: Str::limit(strip_tags($request->excerpt), 155)),
            'og_image' => $request->og_image ?: $request->image,
            'robots' => $request->robots ?: 'index, follow',
            'schema_type' => $request->schema_type ?: 'TechArticle',
        ]);

        return redirect()->route('admin.cms.blogs.index')->with('success', "Article '{$request->title}' published with dynamic category and SEO structure.");
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::active()->get();
        return view('admin.cms.blogs.form', [
            'blog' => $blog,
            'categories' => $categories,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => "nullable|string|max:255|unique:blogs,slug,{$id}",
            'category_id' => 'nullable',
            'new_category_name' => 'nullable|string|max:100',
            'author' => 'required|string|max:150',
            'author_role' => 'nullable|string|max:100',
            'read_time' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            // SEO Panel Validation
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:1000',
            'meta_keywords' => 'nullable|string|max:500',
            'focus_keyword' => 'nullable|string|max:150',
            'canonical_url' => 'nullable|string|max:500',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:1000',
            'og_image' => 'nullable|string|max:255',
            'robots' => 'nullable|string|max:50',
            'schema_type' => 'nullable|string|max:50',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $wasPublished = $blog->is_published;
        $isPublished = $request->has('is_published');

        // Resolve or Dynamically Create Category
        $categoryId = $blog->category_id;
        $categoryName = $blog->category;

        if (!empty($request->new_category_name)) {
            $cat = BlogCategory::firstOrCreate(
                ['slug' => Str::slug($request->new_category_name)],
                ['name' => trim($request->new_category_name), 'display_order' => 10]
            );
            $categoryId = $cat->id;
            $categoryName = $cat->name;
        } elseif (!empty($request->category_id) && is_numeric($request->category_id)) {
            $cat = BlogCategory::find($request->category_id);
            if ($cat) {
                $categoryId = $cat->id;
                $categoryName = $cat->name;
            }
        }

        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'category_id' => $categoryId,
            'category' => $categoryName,
            'author' => $request->author,
            'author_role' => $request->author_role ?: $blog->author_role,
            'read_time' => $request->read_time ?: $blog->read_time,
            'image' => $request->image ?: $blog->image,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $isPublished,
            'is_featured' => $request->has('is_featured'),
            'published_at' => ($isPublished && !$wasPublished) ? now() : $blog->published_at,
            // SEO Structure
            'meta_title' => $request->meta_title ?: $blog->meta_title,
            'meta_description' => $request->meta_description ?: $blog->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'focus_keyword' => $request->focus_keyword,
            'canonical_url' => $request->canonical_url,
            'og_title' => $request->og_title ?: $blog->og_title,
            'og_description' => $request->og_description ?: $blog->og_description,
            'og_image' => $request->og_image ?: $blog->og_image,
            'robots' => $request->robots ?: 'index, follow',
            'schema_type' => $request->schema_type ?: 'TechArticle',
        ]);

        return redirect()->route('admin.cms.blogs.index')->with('success', "Article '{$blog->title}' updated with category and SEO settings.");
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $title = $blog->title;
        $blog->delete();

        return redirect()->route('admin.cms.blogs.index')->with('success', "Article '{$title}' deleted.");
    }

    public function togglePublish($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->is_published = !$blog->is_published;
        if ($blog->is_published && !$blog->published_at) {
            $blog->published_at = now();
        }
        $blog->save();

        $status = $blog->is_published ? 'published' : 'moved to draft';
        return back()->with('success', "Article is now {$status}.");
    }

    /**
     * AJAX endpoint to dynamically create a new blog category on-the-fly.
     */
    public function ajaxStoreCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:500',
        ]);

        $slug = Str::slug($request->name);

        $category = BlogCategory::firstOrCreate(
            ['slug' => $slug],
            [
                'name' => trim($request->name),
                'description' => $request->description,
                'meta_title' => trim($request->name) . ' Articles & Case Studies — Bluebase Tech Blog',
                'meta_description' => $request->description ?: ('Explore architectural deep dives and case studies in ' . trim($request->name)),
                'display_order' => 10,
                'is_active' => true,
            ]
        );

        return response()->json([
            'success' => true,
            'category' => [
                'id' => $category->id,
                'name' => $category->name,
                'slug' => $category->slug,
            ],
            'message' => "Category '{$category->name}' created successfully.",
        ]);
    }
}
