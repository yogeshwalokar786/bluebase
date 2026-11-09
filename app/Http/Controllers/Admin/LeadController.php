<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use App\Models\DemoBooking;
use App\Models\TrialRequest;
use App\Models\PartnerApplication;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LeadController extends Controller
{
    // ==========================================
    // 1. CONTACT INQUIRIES
    // ==========================================
    public function inquiries(Request $request)
    {
        $query = ContactInquiry::query();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('company', 'like', "%{$s}%")
                  ->orWhere('message', 'like', "%{$s}%");
            });
        }

        $inquiries = $query->latest()->paginate(15)->withQueryString();
        $counts = [
            'all' => ContactInquiry::count(),
            'new' => ContactInquiry::where('status', 'new')->count(),
            'reviewed' => ContactInquiry::where('status', 'reviewed')->count(),
            'contacted' => ContactInquiry::where('status', 'contacted')->count(),
            'closed' => ContactInquiry::where('status', 'closed')->count(),
        ];

        return view('admin.leads.inquiries', compact('inquiries', 'counts'));
    }

    public function showInquiry($id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        return view('admin.leads.inquiry-detail', compact('inquiry'));
    }

    public function updateInquiry(Request $request, $id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        $request->validate([
            'status' => 'required|string',
            'admin_notes' => 'nullable|string',
        ]);

        $inquiry->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', "Inquiry #{$id} updated successfully.");
    }

    public function destroyInquiry($id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        $inquiry->delete();
        return redirect()->route('admin.inquiries')->with('success', "Inquiry #{$id} deleted successfully.");
    }

    public function exportInquiries()
    {
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Date', 'Name', 'Email', 'Company', 'Phone', 'Service', 'Message', 'Status', 'Admin Notes', 'IP Address']);

            ContactInquiry::latest()->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->created_at->toDateTimeString(),
                        $row->name,
                        $row->email,
                        $row->company,
                        $row->phone,
                        $row->service,
                        $row->message,
                        $row->status,
                        $row->admin_notes,
                        $row->ip_address,
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="contact_inquiries_' . date('Y-m-d') . '.csv"');
        return $response;
    }

    // ==========================================
    // 2. DEMO BOOKINGS
    // ==========================================
    public function demos(Request $request)
    {
        $query = DemoBooking::query();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('company', 'like', "%{$s}%")
                  ->orWhere('job_title', 'like', "%{$s}%");
            });
        }

        $demos = $query->latest()->paginate(15)->withQueryString();
        $counts = [
            'all' => DemoBooking::count(),
            'pending' => DemoBooking::where('status', 'pending')->count(),
            'confirmed' => DemoBooking::where('status', 'confirmed')->count(),
            'completed' => DemoBooking::where('status', 'completed')->count(),
            'cancelled' => DemoBooking::where('status', 'cancelled')->count(),
        ];

        return view('admin.leads.demos', compact('demos', 'counts'));
    }

    public function showDemo($id)
    {
        $demo = DemoBooking::findOrFail($id);
        return view('admin.leads.demo-detail', compact('demo'));
    }

    public function updateDemo(Request $request, $id)
    {
        $demo = DemoBooking::findOrFail($id);
        $request->validate([
            'status' => 'required|string',
            'admin_notes' => 'nullable|string',
        ]);

        $demo->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', "Demo Booking #{$id} updated successfully.");
    }

    public function destroyDemo($id)
    {
        $demo = DemoBooking::findOrFail($id);
        $demo->delete();
        return redirect()->route('admin.demos')->with('success', "Demo Booking #{$id} deleted successfully.");
    }

    public function exportDemos()
    {
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Date', 'Name', 'Email', 'Company', 'Phone', 'Job Title', 'Current ERP', 'Interested Product', 'Client Notes', 'Status', 'Admin Notes']);

            DemoBooking::latest()->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->created_at->toDateTimeString(),
                        $row->name,
                        $row->email,
                        $row->company,
                        $row->phone,
                        $row->job_title,
                        $row->current_erp,
                        $row->interested_product,
                        $row->notes,
                        $row->status,
                        $row->admin_notes,
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="demo_bookings_' . date('Y-m-d') . '.csv"');
        return $response;
    }

    // ==========================================
    // 3. TRIAL REQUESTS
    // ==========================================
    public function trials(Request $request)
    {
        $query = TrialRequest::query();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('company', 'like', "%{$s}%");
            });
        }

        $trials = $query->latest()->paginate(15)->withQueryString();
        $counts = [
            'all' => TrialRequest::count(),
            'pending' => TrialRequest::where('status', 'pending')->count(),
            'active' => TrialRequest::where('status', 'active')->count(),
            'expired' => TrialRequest::where('status', 'expired')->count(),
        ];

        return view('admin.leads.trials', compact('trials', 'counts'));
    }

    public function showTrial($id)
    {
        $trial = TrialRequest::findOrFail($id);
        return view('admin.leads.trial-detail', compact('trial'));
    }

    public function updateTrial(Request $request, $id)
    {
        $trial = TrialRequest::findOrFail($id);
        $request->validate([
            'status' => 'required|string',
            'admin_notes' => 'nullable|string',
        ]);

        $trial->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', "Trial Request #{$id} updated successfully.");
    }

    public function destroyTrial($id)
    {
        $trial = TrialRequest::findOrFail($id);
        $trial->delete();
        return redirect()->route('admin.trials')->with('success', "Trial Request #{$id} deleted.");
    }

    public function exportTrials()
    {
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Date', 'Name', 'Email', 'Company', 'Phone', 'Cloud Platform', 'SAP Version', 'Status', 'Admin Notes']);

            TrialRequest::latest()->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->created_at->toDateTimeString(),
                        $row->name,
                        $row->email,
                        $row->company,
                        $row->phone,
                        $row->cloud_platform,
                        $row->sap_version,
                        $row->status,
                        $row->admin_notes,
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="free_trials_' . date('Y-m-d') . '.csv"');
        return $response;
    }

    // ==========================================
    // 4. PARTNER APPLICATIONS
    // ==========================================
    public function partners(Request $request)
    {
        $query = PartnerApplication::query();

        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('company_name', 'like', "%{$s}%")
                  ->orWhere('contact_name', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%");
            });
        }

        $partners = $query->latest()->paginate(15)->withQueryString();
        $counts = [
            'all' => PartnerApplication::count(),
            'new' => PartnerApplication::where('status', 'new')->count(),
            'approved' => PartnerApplication::where('status', 'approved')->count(),
            'rejected' => PartnerApplication::where('status', 'rejected')->count(),
        ];

        return view('admin.leads.partners', compact('partners', 'counts'));
    }

    public function showPartner($id)
    {
        $partner = PartnerApplication::findOrFail($id);
        return view('admin.leads.partner-detail', compact('partner'));
    }

    public function updatePartner(Request $request, $id)
    {
        $partner = PartnerApplication::findOrFail($id);
        $request->validate([
            'status' => 'required|string',
            'admin_notes' => 'nullable|string',
        ]);

        $partner->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', "Partner application #{$id} updated successfully.");
    }

    public function destroyPartner($id)
    {
        $partner = PartnerApplication::findOrFail($id);
        $partner->delete();
        return redirect()->route('admin.partners')->with('success', "Partner Application #{$id} deleted.");
    }

    public function exportPartners()
    {
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Date', 'Type', 'Company', 'Contact', 'Email', 'Phone', 'Country', 'Message', 'Status', 'Admin Notes']);

            PartnerApplication::latest()->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->created_at->toDateTimeString(),
                        $row->partner_type,
                        $row->company_name,
                        $row->contact_name,
                        $row->email,
                        $row->phone,
                        $row->country,
                        $row->message,
                        $row->status,
                        $row->admin_notes,
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="partner_applications_' . date('Y-m-d') . '.csv"');
        return $response;
    }

    // ==========================================
    // 5. NEWSLETTER SUBSCRIBERS
    // ==========================================
    public function subscribers(Request $request)
    {
        $query = NewsletterSubscriber::query();

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where('email', 'like', "%{$s}%");
        }

        $subscribers = $query->latest()->paginate(25)->withQueryString();
        $total_active = NewsletterSubscriber::where('is_active', true)->count();

        return view('admin.leads.subscribers', compact('subscribers', 'total_active'));
    }

    public function toggleSubscriber($id)
    {
        $sub = NewsletterSubscriber::findOrFail($id);
        $sub->is_active = !$sub->is_active;
        $sub->save();

        $status = $sub->is_active ? 'activated' : 'deactivated';
        return back()->with('success', "Subscriber {$sub->email} has been {$status}.");
    }

    public function destroySubscriber($id)
    {
        $sub = NewsletterSubscriber::findOrFail($id);
        $sub->delete();
        return back()->with('success', "Subscriber deleted successfully.");
    }

    public function exportSubscribers()
    {
        $response = new StreamedResponse(function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Subscribed Date', 'Email Address', 'Status', 'IP Address']);

            NewsletterSubscriber::latest()->chunk(200, function ($rows) use ($handle) {
                foreach ($rows as $row) {
                    fputcsv($handle, [
                        $row->id,
                        $row->created_at->toDateTimeString(),
                        $row->email,
                        $row->is_active ? 'Active' : 'Unsubscribed',
                        $row->ip_address,
                    ]);
                }
            });

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set('Content-Disposition', 'attachment; filename="subscribers_' . date('Y-m-d') . '.csv"');
        return $response;
    }
}

