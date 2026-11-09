<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\DemoBooking;
use App\Models\TrialRequest;
use App\Models\PartnerApplication;
use App\Models\NewsletterSubscriber;
use App\Models\Solution;
use App\Models\Blog;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_leads' => ContactInquiry::count() + DemoBooking::count() + TrialRequest::count() + PartnerApplication::count(),
            'inquiries_count' => ContactInquiry::count(),
            'inquiries_new' => ContactInquiry::where('status', 'new')->count(),
            'demos_count' => DemoBooking::count(),
            'demos_pending' => DemoBooking::where('status', 'pending')->count(),
            'trials_count' => TrialRequest::count(),
            'partners_count' => PartnerApplication::count(),
            'subscribers_count' => NewsletterSubscriber::count(),
            'solutions_count' => Solution::count(),
            'blogs_count' => Blog::count(),
            'testimonials_count' => Testimonial::count(),
        ];

        $recent_inquiries = ContactInquiry::latest()->take(5)->get();
        $recent_demos = DemoBooking::latest()->take(5)->get();
        $recent_trials = TrialRequest::latest()->take(5)->get();
        $recent_partners = PartnerApplication::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recent_inquiries', 'recent_demos', 'recent_trials', 'recent_partners'));
    }
}
