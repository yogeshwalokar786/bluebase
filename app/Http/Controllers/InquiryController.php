<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use App\Models\DemoBooking;
use App\Models\TrialRequest;
use App\Models\PartnerApplication;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function contactForm()
    {
        return view('pages.contact');
    }

    public function storeContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'service' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        $validated['ip_address'] = $request->ip();

        ContactInquiry::create($validated);

        return back()->with('success', 'Thank you! Your message has been received. Our enterprise engineering team will get back to you within 24 hours.');
    }

    public function demoForm()
    {
        return view('pages.book-a-demo');
    }

    public function storeDemo(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'phone' => 'nullable|string|max:50',
            'job_title' => 'nullable|string|max:255',
            'current_erp' => 'nullable|string|max:255',
            'interested_product' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
        ]);

        DemoBooking::create($validated);

        return back()->with('success', 'Demo scheduled successfully! A calendar invitation and confirmation has been sent to your email.');
    }

    public function trialForm()
    {
        return view('pages.free-trial');
    }

    public function storeTrial(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'required|string|max:255',
            'cloud_platform' => 'nullable|string|max:255',
            'sap_version' => 'nullable|string|max:255',
        ]);

        TrialRequest::create($validated);

        return back()->with('success', 'Trial account provisioned! Check your inbox for your Bluebase cloud credentials and sandbox access.');
    }

    public function storePartner(Request $request)
    {
        $validated = $request->validate([
            'partner_type' => 'nullable|string|max:255',
            'company_name' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        PartnerApplication::create($validated);

        return back()->with('success', 'Partner application submitted! Our Global Alliance Director will contact you shortly.');
    }

    public function storeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255|unique:newsletter_subscribers,email',
        ], [
            'email.unique' => 'You are already subscribed to our enterprise newsletter!',
        ]);

        $validated['ip_address'] = $request->ip();

        NewsletterSubscriber::create($validated);

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Subscribed successfully!']);
        }

        return back()->with('success', 'Subscribed successfully! You will receive our monthly enterprise architecture digest.');
    }
}

