<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;

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
        | TOTAL EMPLOYEES
        |--------------------------------------------------------------------------
        */

        $totalEmployees =
            Employee::count();

        /*
        |--------------------------------------------------------------------------
        | COMPLETE PROFILES (has at least one education record)
        |--------------------------------------------------------------------------
        */

        $completeProfiles =
            Employee::has('educations')
                ->count();

        /*
        |--------------------------------------------------------------------------
        | INCOMPLETE PROFILES
        |--------------------------------------------------------------------------
        */

        $incompleteProfiles =
            $totalEmployees - $completeProfiles;

        /*
        |--------------------------------------------------------------------------
        | NEW THIS MONTH
        |--------------------------------------------------------------------------
        */

        $newThisMonth =
            Employee::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count();

        /*
        |--------------------------------------------------------------------------
        | RECENT EMPLOYEES
        |--------------------------------------------------------------------------
        */

        $recentEmployees =
            Employee::withCount('educations')
                ->latest()
                ->take(5)
                ->get();

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD VIEW
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', compact(

            'totalEmployees',

            'completeProfiles',

            'incompleteProfiles',

            'newThisMonth',

            'recentEmployees'

        ));
    }
}