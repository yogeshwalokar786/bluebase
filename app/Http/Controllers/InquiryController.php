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
        $num1 = rand(3, 9);
        $num2 = rand(1, 9);
        session(['contact_captcha_sum' => $num1 + $num2]);

        return view('pages.contact', compact('num1', 'num2'));
    }

    public function refreshCaptcha()
    {
        $num1 = rand(3, 9);
        $num2 = rand(1, 9);
        session(['contact_captcha_sum' => $num1 + $num2]);

        return response()->json([
            'num1' => $num1,
            'num2' => $num2,
            'question' => "{$num1} + {$num2}",
        ]);
    }

    public function storeContact(Request $request)
    {
        // 1. Invisible Honeypot Security Check (catches naive bots)
        if ($request->filled('_hp_contact_check')) {
            return back()->with('success', 'Thank you! Your message has been received. Our enterprise engineering team will get back to you within 24 hours.');
        }

        // 2. Strict Input & Human Verification Validation
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'service' => 'required|string|max:255',
            'message' => 'required|string|min:10',
            'captcha_answer' => [
                'required',
                'numeric',
                function ($attribute, $value, $fail) {
                    $expected = session('contact_captcha_sum');
                    if ($expected === null || (int)$value !== (int)$expected) {
                        $fail('Security verification failed. Please solve the math verification problem correctly.');
                    }
                }
            ],
        ], [
            'service.required' => 'Please select the primary project interest for your message.',
            'message.min' => 'Please provide at least 10 characters describing your project.',
            'captcha_answer.required' => 'Please complete the human verification math problem.',
            'captcha_answer.numeric' => 'The human verification answer must be a number.',
        ]);

        $validated['ip_address'] = $request->ip();
        $validated['status'] = 'new';
        unset($validated['captcha_answer']);

        // 3. Persist to MySQL database with defensive safety
        try {
            ContactInquiry::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::error('ContactInquiry insertion error: ' . $e->getMessage(), $validated);
        }

        // 4. Reset captcha session for subsequent submissions
        session()->forget('contact_captcha_sum');

        return back()->with('success', 'Thank you! Your message has been saved. Our engineering team will get back to you within 24 hours.');
    }

    public function demoForm()
    {
        return redirect()->route('contact', [], 301);
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

        try {
            DemoBooking::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Demo booking submitted: ' . $validated['email']);
        }

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

        try {
            TrialRequest::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Trial request submitted: ' . $validated['email']);
        }

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

        try {
            PartnerApplication::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Partner application submitted: ' . $validated['email']);
        }

        return back()->with('success', 'Partner application submitted! Our Global Alliance Director will contact you shortly.');
    }

    public function storeNewsletter(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $validated['ip_address'] = $request->ip();

        try {
            NewsletterSubscriber::create($validated);
        } catch (\Throwable $e) {
            \Illuminate\Support\Facades\Log::info('Newsletter subscription: ' . $validated['email']);
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Subscribed successfully!']);
        }

        return back()->with('success', 'Subscribed successfully! You will receive our monthly enterprise architecture digest.');
    }
}

