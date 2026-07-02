<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmployeeAuthenticatedSessionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show Employee Login
    |--------------------------------------------------------------------------
    */

    public function create(): View
    {
       
        return view('auth.employee-login');
    }

    /*
    |--------------------------------------------------------------------------
    | Employee Login
    |--------------------------------------------------------------------------
    */

    public function store(LoginRequest $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Authenticate
        |--------------------------------------------------------------------------
        */

        $request->authenticate();

        /*
        |--------------------------------------------------------------------------
        | Regenerate Session
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerate();

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | Only Employee Can Login
        |--------------------------------------------------------------------------
        */

        if ($user->role !== 'employee') {

            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            if ($request->expectsJson()) {

                return response()->json([
                    'success' => false,
                    'message' => 'Only employees can login from this portal.'
                ], 403);

            }

            return back()->withErrors([
                'email' => 'Only employees can login from this portal.',
            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Redirect URL
        |--------------------------------------------------------------------------
        */

       $redirect = route('employee.dashboard');

        /*
        |--------------------------------------------------------------------------
        | AJAX Response
        |--------------------------------------------------------------------------
        */

        if ($request->expectsJson()) {

            return response()->json([

                'success' => true,

                'message' => 'Welcome ' . $user->name,

                'redirect' => $redirect,

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | Normal Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()->to($redirect);
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('employee.login');
    }
}