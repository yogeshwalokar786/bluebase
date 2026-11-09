<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('pages.services', compact('services'));
    }

    public function professionalServices()
    {
        return view('pages.services.professional-services');
    }

    public function webDevelopment()
    {
        return view('pages.services.web-development');
    }

    public function websiteDesign()
    {
        return view('pages.services.website-design');
    }

    public function mobileApp()
    {
        return view('pages.services.mobile-app-development');
    }

    public function saasMvp()
    {
        return view('pages.services.saas-mvp-development');
    }

    public function ecommerce()
    {
        return view('pages.services.ecommerce-development');
    }

    public function uiUxDesign()
    {
        return view('pages.services.ui-ux-design');
    }

    public function apiBackend()
    {
        return view('pages.services.api-backend-development');
    }

    public function websiteRedesign()
    {
        return view('pages.services.website-redesign');
    }

    public function maintenanceSupport()
    {
        return view('pages.services.maintenance-support');
    }
}

