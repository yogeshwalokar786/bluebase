<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialCmsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('display_order', 'asc')->get();
        return view('admin.cms.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.cms.testimonials.form', [
            'testimonial' => new Testimonial(['is_active' => true, 'rating' => 5, 'display_order' => Testimonial::count() + 1]),
            'isEdit' => false,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_role' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'display_order' => 'nullable|integer',
        ]);

        Testimonial::create([
            'client_name' => $request->client_name,
            'client_role' => $request->client_role,
            'company_name' => $request->company_name,
            'quote' => $request->quote,
            'rating' => $request->rating,
            'avatar' => $request->avatar,
            'is_active' => $request->has('is_active'),
            'display_order' => $request->display_order ?? 0,
        ]);

        return redirect()->route('admin.cms.testimonials.index')->with('success', "Testimonial from '{$request->client_name}' created.");
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.cms.testimonials.form', [
            'testimonial' => $testimonial,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'client_name' => 'required|string|max:255',
            'client_role' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'display_order' => 'nullable|integer',
        ]);

        $testimonial->update([
            'client_name' => $request->client_name,
            'client_role' => $request->client_role,
            'company_name' => $request->company_name,
            'quote' => $request->quote,
            'rating' => $request->rating,
            'avatar' => $request->avatar,
            'is_active' => $request->has('is_active'),
            'display_order' => $request->display_order ?? $testimonial->display_order,
        ]);

        return redirect()->route('admin.cms.testimonials.index')->with('success', "Testimonial updated successfully.");
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('admin.cms.testimonials.index')->with('success', "Testimonial deleted.");
    }
}

