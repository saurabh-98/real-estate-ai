<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PropertyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CONSTRUCTOR
    |--------------------------------------------------------------------------
    */

    public function __construct()
    {
        
    }

    /*
    |--------------------------------------------------------------------------
    | PROPERTY LISTING
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AJAX REQUEST
        |--------------------------------------------------------------------------
        */

        if ($request->ajax()) {

            $properties = Property::with('propertyType')
                ->latest()
                ->get();

            return response()->json([

                'properties' => $properties

            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | NORMAL VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.properties.index');
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE PROPERTY PAGE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $propertyTypes = PropertyType::where(
            'status',
            1
        )->get();

        return view(
            'admin.properties.create',
            compact('propertyTypes')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE PROPERTY
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validator = Validator::make($request->all(), [

            'property_type_id' => 'required|exists:property_types,id',

            'title' => 'required|max:255',

            'description' => 'required',

            'price' => 'required|numeric',

            'city' => 'required|max:255',

            'state' => 'nullable|max:255',

            'country' => 'nullable|max:255',

            'address' => 'nullable',

            'bedrooms' => 'nullable|numeric',

            'bathrooms' => 'nullable|numeric',

            'garage' => 'nullable|numeric',

            'area' => 'nullable',

            'featured_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'seo_title' => 'nullable|max:255',

            'seo_description' => 'nullable',

            'seo_keywords' => 'nullable',

            'is_featured' => 'nullable',

            'status' => 'nullable',

        ]);

        /*
        |--------------------------------------------------------------------------
        | VALIDATION ERROR RESPONSE
        |--------------------------------------------------------------------------
        */

        if ($validator->fails()) {

            return response()->json([

                'status' => false,

                'message' => 'Validation errors',

                'errors' => $validator->errors()

            ], 422);

        }

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | IMAGE UPLOAD
            |--------------------------------------------------------------------------
            */

            $imageName = null;

            if ($request->hasFile('featured_image')) {

                $image = $request->file('featured_image');

                $imageName =
                    time() .
                    '_' .
                    Str::slug($request->title) .
                    '.' .
                    $image->getClientOriginalExtension();

                /*
                |--------------------------------------------------------------------------
                | STORE IMAGE IN STORAGE
                |--------------------------------------------------------------------------
                */

                $image->storeAs(

                    'properties',

                    $imageName,

                    'public'

                );

            }

            /*
            |--------------------------------------------------------------------------
            | CREATE PROPERTY
            |--------------------------------------------------------------------------
            */

            $property = Property::create([

                'property_type_id' =>
                    $request->property_type_id,

                'title' =>
                    $request->title,

                'slug' =>
                    Str::slug($request->title),

                'description' =>
                    $request->description,

                'price' =>
                    $request->price,

                'city' =>
                    $request->city,

                'state' =>
                    $request->state,

                'country' =>
                    $request->country,

                'address' =>
                    $request->address,

                'bedrooms' =>
                    $request->bedrooms,

                'bathrooms' =>
                    $request->bathrooms,

                'garage' =>
                    $request->garage,

                'area' =>
                    $request->area,

                'featured_image' =>
                    $imageName,

                'seo_title' =>
                    $request->seo_title,

                'seo_description' =>
                    $request->seo_description,

                'seo_keywords' =>
                    $request->seo_keywords,

                'is_featured' =>
                    $request->is_featured
                        ? 1
                        : 0,

                'status' =>
                    $request->status
                        ? 1
                        : 0,

            ]);

            DB::commit();

            /*
            |--------------------------------------------------------------------------
            | SUCCESS RESPONSE
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'status' => true,

                'message' => 'Property created successfully.',

                'data' => $property

            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();

            /*
            |--------------------------------------------------------------------------
            | ERROR RESPONSE
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'status' => false,

                'message' => 'Something went wrong.',

                'error' => $e->getMessage()

            ], 500);

        }
    }


    /*
    |--------------------------------------------------------------------------
    | SHOW PROPERTY
    |--------------------------------------------------------------------------
    */

    public function show(string $id)
    {
        $property = Property::findOrFail($id);

        return view(
            'admin.properties.show',
            compact('property')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PROPERTY PAGE
    |--------------------------------------------------------------------------
    */

    public function edit(string $id)
    {
        $property = Property::findOrFail($id);

        $propertyTypes = PropertyType::where(
            'status',
            1
        )->get();

        return view(
            'admin.properties.edit',
            compact(
                'property',
                'propertyTypes'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PROPERTY
    |--------------------------------------------------------------------------
    */

    public function update(
    Request $request,
        string $id
    )
    {
        /*
        |--------------------------------------------------------------------------
        | FIND PROPERTY
        |--------------------------------------------------------------------------
        */

        $property = Property::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validator = Validator::make($request->all(), [

            'property_type_id' => 'required|exists:property_types,id',

            'title' => 'required|max:255',

            'description' => 'required',

            'price' => 'required|numeric',

            'city' => 'required|max:255',

            'state' => 'nullable|max:255',

            'country' => 'nullable|max:255',

            'address' => 'nullable',

            'bedrooms' => 'nullable|numeric',

            'bathrooms' => 'nullable|numeric',

            'garage' => 'nullable|numeric',

            'area' => 'nullable',

            'featured_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'seo_title' => 'nullable|max:255',

            'seo_description' => 'nullable',

            'seo_keywords' => 'nullable',

        ]);

        /*
        |--------------------------------------------------------------------------
        | VALIDATION ERROR RESPONSE
        |--------------------------------------------------------------------------
        */

        if ($validator->fails()) {

            return response()->json([

                'status' => false,

                'message' => 'Validation errors',

                'errors' => $validator->errors()

            ], 422);

        }

        DB::beginTransaction();

        try {

            /*
            |--------------------------------------------------------------------------
            | IMAGE UPDATE
            |--------------------------------------------------------------------------
            */

            $imageName = $property->featured_image;

            if ($request->hasFile('featured_image')) {

                /*
                |--------------------------------------------------------------------------
                | DELETE OLD IMAGE
                |--------------------------------------------------------------------------
                */

                if (

                    $property->featured_image &&

                    Storage::disk('public')->exists(
                        'properties/' . $property->featured_image
                    )

                ) {

                    Storage::disk('public')->delete(
                        'properties/' . $property->featured_image
                    );

                }

                /*
                |--------------------------------------------------------------------------
                | STORE NEW IMAGE
                |--------------------------------------------------------------------------
                */

                $image = $request->file('featured_image');

                $imageName =
                    time() .
                    '_' .
                    Str::slug($request->title) .
                    '.' .
                    $image->getClientOriginalExtension();

                $image->storeAs(

                    'properties',

                    $imageName,

                    'public'

                );

            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE PROPERTY
            |--------------------------------------------------------------------------
            */

            $property->update([

                'property_type_id' =>
                    $request->property_type_id,

                'title' =>
                    $request->title,

                'slug' =>
                    Str::slug($request->title),

                'description' =>
                    $request->description,

                'price' =>
                    $request->price,

                'city' =>
                    $request->city,

                'state' =>
                    $request->state,

                'country' =>
                    $request->country,

                'address' =>
                    $request->address,

                'bedrooms' =>
                    $request->bedrooms,

                'bathrooms' =>
                    $request->bathrooms,

                'garage' =>
                    $request->garage,

                'area' =>
                    $request->area,

                'featured_image' =>
                    $imageName,

                'seo_title' =>
                    $request->seo_title,

                'seo_description' =>
                    $request->seo_description,

                'seo_keywords' =>
                    $request->seo_keywords,

                'is_featured' =>
                    $request->is_featured
                        ? 1
                        : 0,

                'status' =>
                    $request->status
                        ? 1
                        : 0,

            ]);

            DB::commit();

            /*
            |--------------------------------------------------------------------------
            | SUCCESS RESPONSE
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'status' => true,

                'message' => 'Property updated successfully.',

                'data' => $property

            ], 200);

        } catch (\Exception $e) {

            DB::rollBack();

            /*
            |--------------------------------------------------------------------------
            | ERROR RESPONSE
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'status' => false,

                'message' => 'Something went wrong.',

                'error' => $e->getMessage()

            ], 500);

        }
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE PROPERTY
    |--------------------------------------------------------------------------
    */

    public function destroy(string $id)
    {
        /*
        |--------------------------------------------------------------------------
        | FIND PROPERTY
        |--------------------------------------------------------------------------
        */

        $property = Property::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | DELETE IMAGE
        |--------------------------------------------------------------------------
        */

        if (
            $property->featured_image &&
            File::exists(
                public_path(
                    'uploads/properties/' .
                    $property->featured_image
                )
            )
        ) {

            File::delete(
                public_path(
                    'uploads/properties/' .
                    $property->featured_image
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DELETE PROPERTY
        |--------------------------------------------------------------------------
        */

        $property->delete();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('admin.properties.index')
            ->with(
                'success',
                'Property deleted successfully.'
            );
    }
}