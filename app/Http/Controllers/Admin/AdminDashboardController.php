<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientLogo;
use App\Models\Blog;
use App\Models\JobOpening;
use App\Models\ContactInquiry;
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
            'inquiries_count' => rescue(fn() => ContactInquiry::count(), 0),
            'inquiries_new' => rescue(fn() => ContactInquiry::where('status', 'new')->count(), 0),
            'clients_count' => rescue(fn() => ClientLogo::count(), 0),
            'clients_active' => rescue(fn() => ClientLogo::where('is_active', true)->count(), 0),
            'blogs_count' => rescue(fn() => Blog::count(), 0),
            'blogs_published' => rescue(fn() => Blog::where('is_published', true)->count(), 0),
            'jobs_count' => rescue(fn() => JobOpening::count(), 0),
            'jobs_active' => rescue(fn() => JobOpening::where('is_active', true)->count(), 0),
            'files_count' => $totalFiles,
            'settings_count' => rescue(fn() => SiteSetting::count(), 0),
            'official_email' => SiteSetting::get('contact_email', 'info@bluebasetechnologies.com'),
            'company_name' => SiteSetting::get('site_name', 'Bluebase Technologies'),
            'contact_phone' => SiteSetting::get('contact_phone', '+91 79727 65119'),
        ];

        $recent_clients = rescue(
            fn() => ClientLogo::orderBy('display_order', 'asc')->orderBy('id', 'asc')->take(8)->get(),
            collect([])
        );

        return view('admin.dashboard', compact('stats', 'recent_clients'));
    }
}
