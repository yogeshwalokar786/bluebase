<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseStudyCmsController extends Controller
{
    public function index(Request $request)
    {
        $query = CaseStudy::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('client_name', 'like', "%{$search}%")
                  ->orWhere('industry', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        $caseStudies = $query->orderBy('display_order', 'asc')->orderBy('id', 'desc')->paginate(15);
        $totalStories = CaseStudy::count();
        $publishedStories = CaseStudy::where('is_published', true)->count();

        return view('admin.cms.case-studies.index', compact('caseStudies', 'totalStories', 'publishedStories'));
    }

    public function create()
    {
        $story = new CaseStudy([
            'is_published' => true,
            'is_featured' => false,
            'status_color' => 'green',
            'display_order' => (CaseStudy::max('display_order') ?? 0) + 1,
            'published_at' => now(),
        ]);

        return view('admin.cms.case-studies.form', [
            'story' => $story,
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validateStory($request);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

        // Handle JSON array fields if submitted as lines/commas
        $data['technologies'] = $this->parseJsonArray($request->input('technologies_raw'));
        $data['stats_pills'] = $this->parseStatsPills($request->input('stats_pills_raw'));
        $data['featured_stats'] = $this->parseFeaturedStats($request->input('featured_stats_raw'));

        CaseStudy::create($data);

        return redirect()->route('admin.cms.case-studies.index')->with('success', 'Case study created successfully.');
    }

    public function edit($id)
    {
        $story = CaseStudy::findOrFail($id);
        return view('admin.cms.case-studies.form', [
            'story' => $story,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $story = CaseStudy::findOrFail($id);
        $data = $this->validateStory($request, $id);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $data['is_published'] = $request->has('is_published');
        $data['is_featured'] = $request->has('is_featured');

        $data['technologies'] = $this->parseJsonArray($request->input('technologies_raw'));
        $data['stats_pills'] = $this->parseStatsPills($request->input('stats_pills_raw'));
        $data['featured_stats'] = $this->parseFeaturedStats($request->input('featured_stats_raw'));

        $story->update($data);

        return redirect()->route('admin.cms.case-studies.index')->with('success', 'Case study updated successfully.');
    }

    public function destroy($id)
    {
        $story = CaseStudy::findOrFail($id);
        $story->delete();

        return redirect()->route('admin.cms.case-studies.index')->with('success', 'Case study deleted successfully.');
    }

    public function toggle($id)
    {
        $story = CaseStudy::findOrFail($id);
        $story->is_published = !$story->is_published;
        $story->save();

        return back()->with('success', 'Case study status updated successfully.');
    }

    private function validateStory(Request $request, $id = null): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:case_studies,slug,' . $id,
            'client_name' => 'required|string|max:255',
            'client_logo' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'service_tag' => 'nullable|string|max:255',
            'status_badge' => 'nullable|string|max:255',
            'status_color' => 'nullable|string|max:50',
            'metric_chip' => 'nullable|string|max:255',
            'hero_image' => 'nullable|string|max:255',
            'excerpt' => 'required|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'results' => 'nullable|string',
            'content' => 'nullable|string',
            'project_url' => 'nullable|string|max:255',
            'project_url_label' => 'nullable|string|max:255',
            'view_blade' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:500',
            'canonical_url' => 'nullable|string|max:500',
            'og_image' => 'nullable|string|max:255',
        ]);
    }

    private function parseJsonArray($raw): ?array
    {
        if (empty($raw)) return null;
        if (is_array($raw)) return $raw;
        $items = array_map('trim', explode(',', $raw));
        return array_values(array_filter($items));
    }

    private function parseStatsPills($raw): ?array
    {
        if (empty($raw)) return null;
        if (is_array($raw)) return $raw;
        // Expected format per line: Value | Label
        $lines = explode("\n", str_replace("\r", "", $raw));
        $res = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (!$line) continue;
            $parts = explode('|', $line, 2);
            $res[] = [
                'value' => trim($parts[0]),
                'label' => isset($parts[1]) ? trim($parts[1]) : '',
            ];
        }
        return $res;
    }

    private function parseFeaturedStats($raw): ?array
    {
        if (empty($raw)) return null;
        if (is_array($raw)) return $raw;
        // Expected format per line: Num | Suffix | Label
        $lines = explode("\n", str_replace("\r", "", $raw));
        $res = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (!$line) continue;
            $parts = explode('|', $line, 3);
            $res[] = [
                'num' => trim($parts[0]),
                'suffix' => isset($parts[1]) ? trim($parts[1]) : '',
                'label' => isset($parts[2]) ? trim($parts[2]) : '',
            ];
        }
        return $res;
    }
}
