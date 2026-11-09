<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCmsController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('display_order', 'asc')->get();
        return view('admin.cms.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.cms.services.form', [
            'service' => new Service(['is_active' => true, 'display_order' => Service::count() + 1]),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:services,slug',
            'tagline' => 'nullable|string|max:255',
            'icon' => 'nullable|string|max:100',
            'summary' => 'required|string',
            'description' => 'nullable|string',
            'features_text' => 'nullable|string',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $features = [];
        if ($request->filled('features_text')) {
            $features = array_filter(array_map('trim', explode("\n", $request->features_text)));
        }

        $slug = $request->filled('slug') ? Str::slug($request->slug) : Str::slug($request->title);

        Service::create([
            'title' => $request->title,
            'slug' => $slug,
            'tagline' => $request->tagline,
            'icon' => $request->icon ?: 'cpu',
            'summary' => $request->summary,
            'description' => $request->description,
            'features' => array_values($features),
            'display_order' => $request->display_order ?? 0,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.cms.services.index')->with('success', "Service '{$request->title}' created successfully.");
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.cms.services.form', [
            'service' => $service,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => "nullable|string|max:255|unique:services,slug,{$id}",
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

        $service->update([
            'title' => $request->title,
            'slug' => $slug,
            'tagline' => $request->tagline,
            'icon' => $request->icon ?: 'cpu',
            'summary' => $request->summary,
            'description' => $request->description,
            'features' => array_values($features),
            'display_order' => $request->display_order ?? $service->display_order,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.cms.services.index')->with('success', "Service '{$service->title}' updated successfully.");
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $title = $service->title;
        $service->delete();

        return redirect()->route('admin.cms.services.index')->with('success', "Service '{$title}' deleted successfully.");
    }

    public function toggleActive($id)
    {
        $service = Service::findOrFail($id);
        $service->is_active = !$service->is_active;
        $service->save();

        $status = $service->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Service '{$service->title}' is now {$status}.");
    }
}

