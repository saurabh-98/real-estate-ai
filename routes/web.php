<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Frontend\HomeController;


use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EmployeeController;

use App\Http\Controllers\Employee\DashboardController as EmployeeDashboardController;
use App\Http\Controllers\Employee\ProfileController;
use App\Http\Controllers\Employee\EducationController;

/*
|--------------------------------------------------------------------------
| PUBLIC WEBSITE
|--------------------------------------------------------------------------
*/

Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');

/*
|--------------------------------------------------------------------------
| ROLE BASED DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([
        'auth',
        'role:admin'
    ])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [AdminDashboardController::class, 'index']
        )->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Employees
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/employees',
            [EmployeeController::class, 'index']
        )->name('employees.index');

        Route::get(
            '/employees/{employee}',
            [EmployeeController::class, 'show']
        )->name('employees.show');

});

/*
|--------------------------------------------------------------------------
| EMPLOYEE ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware([
        'auth',
        'role:employee'
    ])
    ->prefix('employee')
    ->name('employee.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [EmployeeDashboardController::class, 'index']
        )->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Profile
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/profile/create',
            [ProfileController::class, 'create']
        )->name('profile.create');

        Route::post(
            '/profile',
            [ProfileController::class, 'store']
        )->name('profile.store');

        Route::get(
            '/profile',
            [ProfileController::class, 'show']
        )->name('profile.show');

        Route::get(
            '/profile/edit',
            [ProfileController::class, 'edit']
        )->name('profile.edit');

        Route::put(
            '/profile',
            [ProfileController::class, 'update']
        )->name('profile.update');

        /*
        |--------------------------------------------------------------------------
        | Education
        |--------------------------------------------------------------------------
        */

        Route::post(
            '/education',
            [EducationController::class, 'store']
        )->name('education.store');

        Route::delete(
            '/education/{education}',
            [EducationController::class, 'destroy']
        )->name('education.destroy');

});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';