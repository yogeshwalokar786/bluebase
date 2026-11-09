<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function neptuneDxp()
    {
        return view('pages.products.neptune-dxp');
    }

    public function aiAgents()
    {
        return view('pages.products.ai-agents');
    }

    public function naia()
    {
        return view('pages.products.naia');
    }
}

