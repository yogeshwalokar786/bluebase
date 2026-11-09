<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->pluck('value', 'key')->toArray();

        return view('pages.home', compact('settings'));
    }
}
