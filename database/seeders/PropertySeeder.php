<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Property;

class PropertySeeder extends Seeder
{
    /**
     * Run database seeds.
     */

    public function run(): void
    {
        Property::insert([

            [
                'property_type_id' => 1,

                'title' => 'Luxury Villa',

                'slug' => 'luxury-villa',

                'description' => 'Premium luxury villa with swimming pool and modern interior.',

                'price' => 25000000,

                'city' => 'Mumbai',

                'state' => 'Maharashtra',

                'country' => 'India',

                'address' => 'Bandra West Mumbai',

                'bedrooms' => 4,

                'bathrooms' => 3,

                'garage' => 2,

                'area' => '3500 Sqft',

                'featured_image' => 'villa.jpg',

                'seo_title' => 'Luxury Villa Mumbai',

                'seo_description' => 'Best luxury villa in Mumbai.',

                'seo_keywords' => 'villa,mumbai,luxury property',

                'is_featured' => 1,

                'status' => 1,

                'created_at' => now(),

                'updated_at' => now(),

            ],

            [
                'property_type_id' => 2,

                'title' => 'Modern Apartment',

                'slug' => 'modern-apartment',

                'description' => 'Modern apartment with premium facilities.',

                'price' => 8500000,

                'city' => 'Bangalore',

                'state' => 'Karnataka',

                'country' => 'India',

                'address' => 'MG Road Bangalore',

                'bedrooms' => 3,

                'bathrooms' => 2,

                'garage' => 1,

                'area' => '1800 Sqft',

                'featured_image' => 'apartment.jpg',

                'seo_title' => 'Modern Apartment Bangalore',

                'seo_description' => 'Premium apartment in Bangalore.',

                'seo_keywords' => 'apartment,bangalore,property',

                'is_featured' => 1,

                'status' => 1,

                'created_at' => now(),

                'updated_at' => now(),

            ],

        ]);
    }
}