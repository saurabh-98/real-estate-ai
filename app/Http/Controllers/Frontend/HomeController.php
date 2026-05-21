<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyType;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HOME PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | FEATURED PROPERTIES
        |--------------------------------------------------------------------------
        */

        $properties =

            Property::with('propertyType')

                ->where('status', 1)

                ->latest()

                ->take(6)

                ->get();

        /*
        |--------------------------------------------------------------------------
        | SINGLE FEATURED PROPERTY
        |--------------------------------------------------------------------------
        */

        $featuredProperty =

            Property::with('propertyType')

                ->where('status', 1)

                ->where('is_featured', 1)

                ->latest()

                ->first();

        /*
        |--------------------------------------------------------------------------
        | TOTAL PROPERTIES
        |--------------------------------------------------------------------------
        */

        $totalProperties =

            Property::where('status', 1)

                ->count();

        /*
        |--------------------------------------------------------------------------
        | FEATURED COUNT
        |--------------------------------------------------------------------------
        */

        $featuredProperties =

            Property::where('status', 1)

                ->where('is_featured', 1)

                ->count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL CITIES
        |--------------------------------------------------------------------------
        */

        $citiesCount =

            Property::where('status', 1)

                ->distinct('city')

                ->count('city');

        /*
        |--------------------------------------------------------------------------
        | PROPERTY TYPES
        |--------------------------------------------------------------------------
        */

        $propertyTypes =

            PropertyType::latest()

                ->get();

        /*
        |--------------------------------------------------------------------------
        | RECENT PROPERTIES
        |--------------------------------------------------------------------------
        */

        $recentProperties =

            Property::where('status', 1)

                ->latest()

                ->take(8)

                ->get();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('home', compact(

            'properties',

            'featuredProperty',

            'totalProperties',

            'featuredProperties',

            'citiesCount',

            'propertyTypes',

            'recentProperties'

        ));
    }
}