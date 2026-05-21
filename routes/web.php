<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| FRONTEND CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Frontend\PropertyController;

/*
|--------------------------------------------------------------------------
| ADMIN CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\PropertyController as AdminPropertyController;

use App\Http\Controllers\Admin\AIController;

use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;

/*
|--------------------------------------------------------------------------
| OTHER CONTROLLERS
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\EnquiryController;

/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| HOME PAGE
|--------------------------------------------------------------------------
*/

Route::get(

    '/',

    [HomeController::class, 'index']

)->name('home');

/*
|--------------------------------------------------------------------------
| PROPERTY LISTING
|--------------------------------------------------------------------------
*/

Route::get(

    '/properties',

    [PropertyController::class, 'index']

)->name('properties');

/*
|--------------------------------------------------------------------------
| PROPERTY DETAILS
|--------------------------------------------------------------------------
*/

Route::get(

    '/property/{slug}',

    [PropertyController::class, 'show']

)->name('properties.show');

/*
|--------------------------------------------------------------------------
| SEND ENQUIRY
|--------------------------------------------------------------------------
*/

Route::post(

    '/send-enquiry',

    [EnquiryController::class, 'store']

)->name('send.enquiry');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])

    ->prefix('admin')

    ->name('admin.')

    ->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(

        '/dashboard',

        [DashboardController::class, 'index']

    )->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | PROPERTY CRUD
    |--------------------------------------------------------------------------
    */

    Route::resource(

        'properties',

        AdminPropertyController::class

    );

    /*
    |--------------------------------------------------------------------------
    | AI DESCRIPTION GENERATOR
    |--------------------------------------------------------------------------
    */

    Route::post(

        '/generate-ai-description',

        [AIController::class, 'generateDescription']

    )->name('ai.description');

    /*
    |--------------------------------------------------------------------------
    | ENQUIRY MODULE
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | LIST
    |--------------------------------------------------------------------------
    */

    Route::get(

        '/enquiries',

        [AdminEnquiryController::class, 'index']

    )->name('enquiries');

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    Route::get(

        '/enquiries/{id}',

        [AdminEnquiryController::class, 'show']

    )->name('enquiries.show');

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    Route::delete(

        '/enquiries/{id}',

        [AdminEnquiryController::class, 'destroy']

    )->name('enquiries.destroy');

    /*
    |--------------------------------------------------------------------------
    | UPDATE STATUS
    |--------------------------------------------------------------------------
    */

    Route::post(

        '/enquiries/{id}/status',

        [AdminEnquiryController::class, 'updateStatus']

    )->name('enquiries.status');

    /*
    |--------------------------------------------------------------------------
    | BULK DELETE
    |--------------------------------------------------------------------------
    */

    Route::post(

        '/enquiries/bulk-delete',

        [AdminEnquiryController::class, 'bulkDelete']

    )->name('enquiries.bulkDelete');

    /*
    |--------------------------------------------------------------------------
    | MARK ALL READ
    |--------------------------------------------------------------------------
    */

    Route::post(

        '/enquiries/mark-all-read',

        [AdminEnquiryController::class, 'markAllRead']

    )->name('enquiries.markAllRead');

});

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';