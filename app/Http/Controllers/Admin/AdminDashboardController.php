<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientLogo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $uploadsDir = public_path('uploads');
        $totalFiles = File::exists($uploadsDir) ? count(File::allFiles($uploadsDir)) : 0;

        $stats = [
            'clients_count' => ClientLogo::count(),
            'clients_active' => ClientLogo::where('is_active', true)->count(),
            'files_count' => $totalFiles,
            'settings_count' => SiteSetting::count(),
            'official_email' => SiteSetting::get('contact_email', 'info@bluebasetechnologies.com'),
            'company_name' => SiteSetting::get('site_name', 'Bluebase Technologies'),
            'contact_phone' => SiteSetting::get('contact_phone', '+91 79727 65119'),
        ];

        $recent_clients = ClientLogo::orderBy('sort_order', 'asc')->latest()->take(8)->get();

        return view('admin.dashboard', compact('stats', 'recent_clients'));
    }
}
