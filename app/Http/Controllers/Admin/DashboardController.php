<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Enquiry;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TOTAL PROPERTIES
        |--------------------------------------------------------------------------
        */

        $totalProperties =
            Property::count();

        /*
        |--------------------------------------------------------------------------
        | ACTIVE PROPERTIES
        |--------------------------------------------------------------------------
        */

        $activeProperties =
            Property::where('status', 1)
                ->count();

        /*
        |--------------------------------------------------------------------------
        | FEATURED PROPERTIES
        |--------------------------------------------------------------------------
        */

        $featuredProperties =
            Property::where('is_featured', 1)
                ->count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL ENQUIRIES
        |--------------------------------------------------------------------------
        */

        $totalEnquiries =
            Enquiry::count();

        /*
        |--------------------------------------------------------------------------
        | RECENT PROPERTIES
        |--------------------------------------------------------------------------
        */

        $recentProperties =
            Property::latest()
                ->take(5)
                ->get();

        /*
        |--------------------------------------------------------------------------
        | LATEST ENQUIRIES
        |--------------------------------------------------------------------------
        */

        $latestEnquiries =
            Enquiry::latest()
                ->take(5)
                ->get();

        /*
        |--------------------------------------------------------------------------
        | RECENT ACTIVE PROPERTIES
        |--------------------------------------------------------------------------
        */

        $recentActiveProperties =
            Property::where('status', 1)
                ->latest()
                ->take(6)
                ->get();

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(

            'totalProperties',

            'activeProperties',

            'featuredProperties',

            'totalEnquiries',

            'recentProperties',

            'latestEnquiries',

            'recentActiveProperties'

        ));
    }
}