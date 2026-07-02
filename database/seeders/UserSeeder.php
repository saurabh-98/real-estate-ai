<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | ADMIN USER
        |--------------------------------------------------------------------------
        */

        User::updateOrCreate(

            [
                'email' => 'admin@gmail.com',
            ],

            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]

        );

        /*
        |--------------------------------------------------------------------------
        | EMPLOYEE USER
        |--------------------------------------------------------------------------
        */

        User::updateOrCreate(

            [
                'email' => 'employee@gmail.com',
            ],

            [
                'name' => 'Employee',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'employee',
            ]

        );
    }
}