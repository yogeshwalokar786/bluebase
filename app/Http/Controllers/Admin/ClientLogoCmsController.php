<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ClientLogoCmsController extends Controller
{
    /**
     * Display a listing of the client logos.
     */
    public function index()
    {
        $clients = ClientLogo::orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
        return view('admin.cms.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client logo.
     */
    public function create()
    {
        $client = new ClientLogo([
            'is_active' => true,
            'display_order' => ClientLogo::max('display_order') + 1,
        ]);

        return view('admin.cms.clients.form', compact('client'));
    }

    /**
     * Store a newly created client logo in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'logo_path' => 'nullable|string|max:500',
            'website_url' => 'nullable|url|max:500',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $logoPath = $validated['logo_path'] ?? null;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $baseName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $filename = time() . '_' . $baseName . '.' . $extension;

            $destination = public_path('images/clients');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true, true);
            }

            $file->move($destination, $filename);
            $logoPath = 'images/clients/' . $filename;
        }

        if (empty($logoPath)) {
            return back()->withInput()->withErrors(['logo' => 'Please upload a client logo image or specify a valid logo path.']);
        }

        ClientLogo::create([
            'name' => $validated['name'],
            'logo_path' => $logoPath,
            'website_url' => $validated['website_url'] ?? null,
            'display_order' => $validated['display_order'] ?? (ClientLogo::max('display_order') + 1),
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.cms.clients.index')->with('success', "Client logo '{$validated['name']}' added successfully.");
    }

    /**
     * Show the form for editing the specified client logo.
     */
    public function edit($id)
    {
        $client = ClientLogo::findOrFail($id);
        return view('admin.cms.clients.form', compact('client'));
    }

    /**
     * Update the specified client logo in storage.
     */
    public function update(Request $request, $id)
    {
        $client = ClientLogo::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:4096',
            'logo_path' => 'nullable|string|max:500',
            'website_url' => 'nullable|url|max:500',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $logoPath = $client->logo_path;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $baseName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME));
            $filename = time() . '_' . $baseName . '.' . $extension;

            $destination = public_path('images/clients');
            if (!File::isDirectory($destination)) {
                File::makeDirectory($destination, 0755, true, true);
            }

            $file->move($destination, $filename);
            $logoPath = 'images/clients/' . $filename;
        } elseif (!empty($validated['logo_path'])) {
            $logoPath = $validated['logo_path'];
        }

        $client->update([
            'name' => $validated['name'],
            'logo_path' => $logoPath,
            'website_url' => $validated['website_url'] ?? null,
            'display_order' => $validated['display_order'] ?? $client->display_order,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.cms.clients.index')->with('success', "Client logo '{$client->name}' updated successfully.");
    }

    /**
     * Remove the specified client logo from storage.
     */
    public function destroy($id)
    {
        $client = ClientLogo::findOrFail($id);
        $name = $client->name;
        $client->delete();

        return redirect()->route('admin.cms.clients.index')->with('success', "Client logo '{$name}' removed successfully.");
    }

    /**
     * Toggle active state for a client logo.
     */
    public function toggleActive($id)
    {
        $client = ClientLogo::findOrFail($id);
        $client->is_active = !$client->is_active;
        $client->save();

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_active' => $client->is_active,
                'message' => "Client logo '{$client->name}' is now " . ($client->is_active ? 'active' : 'inactive') . '.',
            ]);
        }

        return back()->with('success', "Client logo '{$client->name}' is now " . ($client->is_active ? 'active' : 'inactive') . '.');
    }

    /**
     * Reorder client logos.
     */
    public function reorder(Request $request)
    {
        $order = $request->input('order', []);
        if (is_array($order)) {
            foreach ($order as $index => $id) {
                ClientLogo::where('id', $id)->update(['display_order' => $index + 1]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Client logos reordered successfully.']);
    }
}

