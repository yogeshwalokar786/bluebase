<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCmsController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        return view('admin.cms.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.cms.blogs.form', [
            'blog' => new Blog(['is_published' => true, 'author' => 'Bluebase Engineering Team', 'category' => 'Engineering']),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'category' => 'required|string|max:100',
            'author' => 'required|string|max:150',
            'read_time' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'author' => $request->author,
            'read_time' => $request->read_time ?: '5 min read',
            'image' => $request->image ?: 'images/stories/screens-clicks.jpg',
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $request->has('is_published'),
            'published_at' => $request->has('is_published') ? now() : null,
        ]);

        return redirect()->route('admin.cms.blogs.index')->with('success', "Article '{$request->title}' created successfully.");
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.cms.blogs.form', [
            'blog' => $blog,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => "nullable|string|max:255|unique:blogs,slug,{$id}",
            'category' => 'required|string|max:100',
            'author' => 'required|string|max:150',
            'read_time' => 'nullable|string|max:50',
            'image' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'content' => 'required|string',
        ]);

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);
        $wasPublished = $blog->is_published;
        $isPublished = $request->has('is_published');

        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'category' => $request->category,
            'author' => $request->author,
            'read_time' => $request->read_time ?: $blog->read_time,
            'image' => $request->image ?: $blog->image,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'is_published' => $isPublished,
            'published_at' => ($isPublished && !$wasPublished) ? now() : $blog->published_at,
        ]);

        return redirect()->route('admin.cms.blogs.index')->with('success', "Article '{$blog->title}' updated successfully.");
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
}

