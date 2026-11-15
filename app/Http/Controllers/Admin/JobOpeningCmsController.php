<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobOpeningCmsController extends Controller
{
    public function index(Request $request)
    {
        $query = JobOpening::query();

        if ($request->filled('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('department', 'like', "%{$search}%")
                  ->orWhere('skills_tags', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $jobs = $query->orderBy('display_order', 'asc')->orderBy('id', 'asc')->paginate(15);
        $totalJobs = JobOpening::count();
        $activeJobs = JobOpening::where('is_active', true)->count();

        return view('admin.cms.careers.index', compact('jobs', 'totalJobs', 'activeJobs'));
    }

    public function create()
    {
        $job = new JobOpening([
            'is_active' => true,
            'department' => 'Engineering',
            'category' => 'backend',
            'location' => 'Remote (India / Global)',
            'type' => 'Full-time',
            'experience' => 'Senior (3+ yrs)',
            'display_order' => JobOpening::max('display_order') + 1,
            'apply_email' => 'info@bluebasetechnologies.com',
        ]);

        return view('admin.cms.careers.form', compact('job'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_openings,slug',
            'department' => 'required|string|max:100',
            'category' => 'required|string|max:50',
            'location' => 'required|string|max:150',
            'type' => 'required|string|max:50',
            'experience' => 'nullable|string|max:100',
            'skills_tags' => 'nullable|string|max:500',
            'apply_email' => 'nullable|email|max:150',
            'description' => 'required|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['display_order'] = $validated['display_order'] ?? (JobOpening::max('display_order') + 1);

        JobOpening::create($validated);

        return redirect()->route('admin.cms.careers.index')->with('success', "Job opening '{$validated['title']}' created successfully.");
    }

    public function edit(int $id)
    {
        $job = JobOpening::findOrFail($id);
        return view('admin.cms.careers.form', compact('job'));
    }

    public function update(Request $request, int $id)
    {
        $job = JobOpening::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:job_openings,slug,' . $id,
            'department' => 'required|string|max:100',
            'category' => 'required|string|max:50',
            'location' => 'required|string|max:150',
            'type' => 'required|string|max:50',
            'experience' => 'nullable|string|max:100',
            'skills_tags' => 'nullable|string|max:500',
            'apply_email' => 'nullable|email|max:150',
            'description' => 'required|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title']);
        }
        $validated['is_active'] = $request->boolean('is_active', true);

        $job->update($validated);

        return redirect()->route('admin.cms.careers.index')->with('success', "Job opening '{$job->title}' updated successfully.");
    }

    public function destroy(int $id)
    {
        $job = JobOpening::findOrFail($id);
        $title = $job->title;
        $job->delete();

        return redirect()->route('admin.cms.careers.index')->with('success', "Job opening '{$title}' removed.");
    }

    public function toggle(int $id)
    {
        $job = JobOpening::findOrFail($id);
        $job->is_active = !$job->is_active;
        $job->save();

        $status = $job->is_active ? 'published' : 'hidden';
        return redirect()->back()->with('success', "Job opening '{$job->title}' is now {$status}.");
    }
}
