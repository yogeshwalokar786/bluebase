<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Solution;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $solutions = Solution::all();
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        return view('pages.home', compact('services', 'solutions', 'settings'));
    }
}

