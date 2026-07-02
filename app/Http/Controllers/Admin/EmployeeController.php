<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST ALL EMPLOYEES
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Employee::withCount('educations');

        /*
        |--------------------------------------------------------------------------
        | SEARCH (name / email / city)
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('full_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%");

            });

        }

        /*
        |--------------------------------------------------------------------------
        | FILTER BY PROFILE STATUS
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {

            if ($request->status === 'complete') {

                $query->has('educations');

            } elseif ($request->status === 'incomplete') {

                $query->doesntHave('educations');

            }

        }

        $employees = $query->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.employees.index', compact('employees'));
    }

    /*
    |--------------------------------------------------------------------------
    | VIEW SINGLE EMPLOYEE (FULL PROFILE)
    |--------------------------------------------------------------------------
    */

    public function show(Employee $employee)
    {
        $employee->load('educations', 'user');

        return view('admin.employees.show', compact('employee'));
    }
}