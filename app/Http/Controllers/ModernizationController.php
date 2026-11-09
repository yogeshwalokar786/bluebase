<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModernizationController extends Controller
{
    public function sapNative()
    {
        return view('pages.modernization.sap-native');
    }

    public function moveToS4Hana()
    {
        return view('pages.modernization.move-to-s-4hana');
    }

    public function sapFiori()
    {
        return view('pages.modernization.sap-fiori');
    }

    public function sapIntegration()
    {
        return view('pages.modernization.sap-integration');
    }

    public function lowCodeForSap()
    {
        return view('pages.modernization.low-code-for-sap');
    }
}

