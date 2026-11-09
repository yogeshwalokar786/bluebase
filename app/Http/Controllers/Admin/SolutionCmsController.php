<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Solution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SolutionCmsController extends Controller
{
    public function index()
    {
        $solutions = Solution::orderBy('display_order', 'asc')->get();
        return view('admin.cms.solutions.index', compact('solutions'));
    }

    public function create()
    {
        return view('admin.cms.solutions.form', [
            'solution' => new Solution(['is_active' => true, 'display_order' => Solution::count() + 1]),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:solutions,slug',
            'tagline' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:100',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'features_text' => 'nullable|string',
            'display_order' => 'nullable|integer',
        ]);

        $features = [];
        if ($request->filled('features_text')) {
            $features = array_filter(array_map('trim', explode("\n", $request->features_text)));
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        Solution::create([
            'title' => $request->title,
            'slug' => $slug,
            'tagline' => $request->tagline,
            'icon' => $request->icon ?: 'box-seam',
            'summary' => $request->summary,
            'description' => $request->description,
            'features' => array_values($features),
            'display_order' => $request->display_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.cms.solutions.index')->with('success', "Solution '{$request->title}' created successfully.");
    }

    public function edit($id)
    {
        $solution = Solution::findOrFail($id);
        return view('admin.cms.solutions.form', [
            'solution' => $solution,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $solution = Solution::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => "nullable|string|max:255|unique:solutions,slug,{$id}",
            'tagline' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:100',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'features_text' => 'nullable|string',
            'display_order' => 'nullable|integer',
        ]);

        $features = [];
        if ($request->filled('features_text')) {
            $features = array_filter(array_map('trim', explode("\n", $request->features_text)));
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        $solution->update([
            'title' => $request->title,
            'slug' => $slug,
            'tagline' => $request->tagline,
            'icon' => $request->icon ?: 'box-seam',
            'summary' => $request->summary,
            'description' => $request->description,
            'features' => array_values($features),
            'display_order' => $request->display_order ?? $solution->display_order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.cms.solutions.index')->with('success', "Solution '{$solution->title}' updated successfully.");
    }

    public function destroy($id)
    {
        $solution = Solution::findOrFail($id);
        $title = $solution->title;
        $solution->delete();

        return redirect()->route('admin.cms.solutions.index')->with('success', "Solution '{$title}' deleted successfully.");
    }

    public function toggleActive($id)
    {
        $solution = Solution::findOrFail($id);
        $solution->is_active = !$solution->is_active;
        $solution->save();

        $status = $solution->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Solution '{$solution->title}' is now {$status}.");
    }
}

