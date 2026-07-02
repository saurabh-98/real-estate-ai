<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Employee Portal Home
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalEmployees = Employee::count();

        $registeredUsers = User::where('role', 'employee')->count();

        $completedProfiles = Employee::has('educations')->count();

        $pendingProfiles = $registeredUsers - $completedProfiles;

        /*
        |--------------------------------------------------------------------------
        | Latest Employees
        |--------------------------------------------------------------------------
        */

        $latestEmployees = Employee::latest()
            ->take(6)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | New Employees This Month
        |--------------------------------------------------------------------------
        */

        $newEmployees = Employee::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Dashboard Cards
        |--------------------------------------------------------------------------
        */

        $dashboardCards = [

            [
                'title' => 'Employees',
                'count' => $totalEmployees,
                'icon' => 'fa-users',
                'color' => 'primary',
            ],

            [
                'title' => 'Registered Users',
                'count' => $registeredUsers,
                'icon' => 'fa-user-check',
                'color' => 'success',
            ],

            [
                'title' => 'Completed Profiles',
                'count' => $completedProfiles,
                'icon' => 'fa-address-card',
                'color' => 'info',
            ],

            [
                'title' => 'Pending Profiles',
                'count' => $pendingProfiles,
                'icon' => 'fa-user-clock',
                'color' => 'warning',
            ],

        ];

        /*
        |--------------------------------------------------------------------------
        | Features
        |--------------------------------------------------------------------------
        */

        $features = [

            [
                'icon' => 'fa-id-card',
                'title' => 'Employee Profile',
                'description' => 'Manage complete employee profiles with personal information.',
            ],

            [
                'icon' => 'fa-graduation-cap',
                'title' => 'Education Records',
                'description' => 'Store employee qualifications and certificates securely.',
            ],

            [
                'icon' => 'fa-file-lines',
                'title' => 'Document Management',
                'description' => 'Upload and manage employee documents digitally.',
            ],

            [
                'icon' => 'fa-shield-halved',
                'title' => 'Secure Login',
                'description' => 'Separate Admin and Employee portals with role-based authentication.',
            ],

        ];

        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view('home', compact(

            'dashboardCards',

            'features',

            'latestEmployees',

            'newEmployees',

            'totalEmployees',

            'registeredUsers',

            'completedProfiles',

            'pendingProfiles'

        ));
    }
}