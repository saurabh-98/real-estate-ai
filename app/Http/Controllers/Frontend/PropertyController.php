<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PROPERTY LISTING
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | PROPERTY QUERY
        |--------------------------------------------------------------------------
        */

        $query = Property::with('propertyType');

        /*
        |--------------------------------------------------------------------------
        | SEARCH BY CITY
        |--------------------------------------------------------------------------
        */

        if ($request->filled('city')) {

            $query->where(
                'city',
                'LIKE',
                '%' . $request->city . '%'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER BY PROPERTY TYPE
        |--------------------------------------------------------------------------
        */

        if ($request->filled('type')) {

            $query->where(
                'property_type_id',
                $request->type
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER BY PRICE
        |--------------------------------------------------------------------------
        */

        if ($request->filled('min_price')) {

            $query->where(
                'price',
                '>=',
                $request->min_price
            );
        }

        if ($request->filled('max_price')) {

            $query->where(
                'price',
                '<=',
                $request->max_price
            );
        }

        /*
        |--------------------------------------------------------------------------
        | GET PROPERTIES
        |--------------------------------------------------------------------------
        */

        $properties = $query
            ->latest()
            ->paginate(9);

        /*
        |--------------------------------------------------------------------------
        | GET PROPERTY TYPES
        |--------------------------------------------------------------------------
        */

        $types = \App\Models\PropertyType::latest()->get();

        return view(
            'properties.index',
            compact(
                'properties',
                'types'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PROPERTY DETAILS
    |--------------------------------------------------------------------------
    */

    public function show($slug)
    {
        /*
        |--------------------------------------------------------------------------
        | FIND PROPERTY
        |--------------------------------------------------------------------------
        */

        $property = Property::with('propertyType')
            ->where(
                'slug',
                $slug
            )
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | RELATED PROPERTIES
        |--------------------------------------------------------------------------
        */

        $relatedProperties = Property::with('propertyType')

            ->where(
                'property_type_id',
                $property->property_type_id
            )

            ->where(
                'id',
                '!=',
                $property->id
            )

            ->latest()

            ->take(4)

            ->get();

        return view(
            'properties.show',
            compact(
                'property',
                'relatedProperties'
            )
        );
    }
}