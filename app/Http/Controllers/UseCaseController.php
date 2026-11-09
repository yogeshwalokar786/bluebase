<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UseCaseController extends Controller
{
    public function assetManagement()
    {
        return view('pages.use-cases.asset-management');
    }

    public function runMobileOffline()
    {
        return view('pages.use-cases.run-mobile-in-offline');
    }

    public function supplierPortals()
    {
        return view('pages.use-cases.supplier-portals');
    }

    public function stockInventory()
    {
        return view('pages.use-cases.stock-inventory-management');
    }

    public function warehouseLogistics()
    {
        return view('pages.use-cases.use-case-warehouse-and-logistics');
    }

    public function industryManufacturing()
    {
        return view('pages.use-cases.industry-manufacturing');
    }

    public function industryDefense()
    {
        return view('pages.use-cases.industry-defense');
    }
}

