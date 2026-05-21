<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AIController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GENERATE AI PROPERTY DESCRIPTION
    |--------------------------------------------------------------------------
    */

    public function generateDescription(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $request->validate([

            'title' => 'required|string|max:255',

            'city' => 'required|string|max:255',

            'property_type' => 'required|string|max:255',

        ]);

        try {

            /*
            |--------------------------------------------------------------------------
            | INPUTS
            |--------------------------------------------------------------------------
            */

            $title = $request->title;

            $city = $request->city;

            $type = $request->property_type;

            /*
            |--------------------------------------------------------------------------
            | OPENAI API KEY
            |--------------------------------------------------------------------------
            */

            $apiKey = env('OPENAI_API_KEY');

            /*
            |--------------------------------------------------------------------------
            | AI PROMPT
            |--------------------------------------------------------------------------
            */

            $prompt = "

                Generate a professional SEO-friendly
                real estate property description.

                Property Title: {$title}

                Property Type: {$type}

                City: {$city}

                Make it:
                - modern
                - luxury style
                - professional
                - attractive for buyers

                Keep description around 120-150 words.

            ";

            /*
            |--------------------------------------------------------------------------
            | TRY REAL OPENAI API
            |--------------------------------------------------------------------------
            */

            if ($apiKey) {

                $response = Http::timeout(60)

                    ->withHeaders([

                        'Authorization' => 'Bearer ' . $apiKey,

                        'Content-Type' => 'application/json',

                    ])

                    ->post(

                        'https://api.openai.com/v1/chat/completions',

                        [

                            'model' => 'gpt-4o-mini',

                            'messages' => [

                                [

                                    'role' => 'system',

                                    'content' =>
                                        'You are a professional real estate copywriter.'

                                ],

                                [

                                    'role' => 'user',

                                    'content' => $prompt

                                ]

                            ],

                            'temperature' => 0.7,

                            'max_tokens' => 300,

                        ]

                    );

                /*
                |--------------------------------------------------------------------------
                | SUCCESS RESPONSE
                |--------------------------------------------------------------------------
                */

                if ($response->successful()) {

                    $data = $response->json();

                    $description =
                        $data['choices'][0]['message']['content']
                        ?? null;

                    if ($description) {

                        return response()->json([

                            'success' => true,

                            'description' => trim($description),

                            'ai_mode' => 'live'

                        ]);

                    }

                }

            }

            /*
            |--------------------------------------------------------------------------
            | FALLBACK AI DEMO GENERATOR
            |--------------------------------------------------------------------------
            */

            $features = [

                'premium interior finishing',
                'modern architecture',
                'luxury lifestyle amenities',
                'excellent ventilation',
                'prime location connectivity',
                'spacious living areas',
                'high-quality construction',
                'beautiful surrounding environment',
                'family-friendly neighborhood',
                'excellent investment opportunity'

            ];

            shuffle($features);

            $description = "

                Discover this exceptional {$type} located in the heart of {$city}.

                {$title} offers {$features[0]}, {$features[1]},
                and {$features[2]} for a modern and comfortable lifestyle.

                This property is thoughtfully designed with
                elegant spaces, premium quality construction,
                and easy access to schools, hospitals,
                shopping centers, and transportation facilities.

                Perfect for families and investment buyers,
                this property combines comfort, luxury,
                and long-term value in one of the most desirable
                locations of {$city}.

                Experience sophisticated living with style,
                convenience, and a peaceful environment.

            ";

            /*
            |--------------------------------------------------------------------------
            | DEMO AI RESPONSE
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'success' => true,

                'description' => trim($description),

                'ai_mode' => 'demo',

                'note' =>
                    'OpenAI billing/quota unavailable. Showing AI demo content.'

            ]);

        } catch (\Exception $e) {

            /*
            |--------------------------------------------------------------------------
            | FINAL FALLBACK
            |--------------------------------------------------------------------------
            */

            return response()->json([

                'success' => false,

                'message' => $e->getMessage()

            ], 500);

        }
    }
}