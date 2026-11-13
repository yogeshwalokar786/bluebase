<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function company()
    {
        return view('pages.company.company');
    }

    public function careers()
    {
        return view('pages.company.careers');
    }

    public function customerStories()
    {
        return view('pages.company.customer-stories');
    }

    public function omgRentalBikesStory()
    {
        return view('pages.company.omg-rental-bikes');
    }

    public function aarohiClassicStory()
    {
        return view('pages.company.aarohi-classic-2024');
    }

    public function complianceSecurity()
    {
        return view('pages.company.compliance-security');
    }

    public function howWeWork()
    {
        return view('pages.company.how-we-work');
    }

    public function partnerOverview()
    {
        return view('pages.company.partner-overview');
    }

    public function becomePartner()
    {
        return view('pages.company.become-a-partner');
    }

    public function findPartner()
    {
        return view('pages.company.find-a-partner');
    }
}

