<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        PropertyType::insert([

            [
                'name'       => 'Villa',
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name'       => 'Apartment',
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name'       => 'House',
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'name'       => 'Land',
                'status'     => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}