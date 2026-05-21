<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | STORE ENQUIRY
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'property_id' => 'nullable|integer',

            'name' => [

                'required',
                'string',
                'max:255'
            ],

            'mobile' => [

                'required',
                'digits:10'
            ],

            'email' => [

                'required',
                'email',
                'max:255'
            ],

            'message' => [

                'required',
                'string',
                'min:10',
                'max:2000'
            ],

        ], [

            /*
            |--------------------------------------------------------------------------
            | CUSTOM MESSAGES
            |--------------------------------------------------------------------------
            */

            'name.required' => 'Please enter your full name.',

            'mobile.required' => 'Please enter mobile number.',

            'mobile.digits' => 'Mobile number must be 10 digits.',

            'email.required' => 'Please enter email address.',

            'email.email' => 'Please enter valid email address.',

            'message.required' => 'Please enter your message.',

            'message.min' => 'Message must be minimum 10 characters.',
        ]);

        /*
        |--------------------------------------------------------------------------
        | SAVE ENQUIRY
        |--------------------------------------------------------------------------
        */

        $enquiry = Enquiry::create([

            'property_id' => $request->property_id,

            'name' => strip_tags($request->name),

            'mobile' => strip_tags($request->mobile),

            'email' => strip_tags($request->email),

            'message' => strip_tags($request->message),
        ]);

        /*
        |--------------------------------------------------------------------------
        | RESPONSE
        |--------------------------------------------------------------------------
        */

        return response()->json([

            'status' => true,

            'message' => 'Enquiry submitted successfully.',

            'data' => $enquiry
        ]);
    }
}