<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\Auth\LoginRequest;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SHOW LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function create(): View
    {
        return view('auth.login');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN USER
    |--------------------------------------------------------------------------
    */

    public function store(LoginRequest $request)
{
    /*
    |--------------------------------------------------------------------------
    | Authenticate User
    |--------------------------------------------------------------------------
    */

    $request->authenticate();

    /*
    |--------------------------------------------------------------------------
    | Regenerate Session
    |--------------------------------------------------------------------------
    */

    $request->session()->regenerate();

    $user = auth()->user();

    /*
    |--------------------------------------------------------------------------
    | Redirect According To Role
    |--------------------------------------------------------------------------
    */

    if ($user->role === 'admin') {

        $redirect = route('admin.dashboard');

    } elseif ($user->role === 'employee') {

        $redirect = route('employee.dashboard');

    } else {

        Auth::logout();

        return back()->withErrors([
            'email' => 'Invalid user role.'
        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | AJAX Response
    |--------------------------------------------------------------------------
    */

    if ($request->ajax()) {

        return response()->json([

            'success'  => true,

            'message'  => 'Login successful.',

            'redirect' => $redirect,

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | Normal Response
    |--------------------------------------------------------------------------
    */

    return redirect()->to($redirect);
}
    /*
    |--------------------------------------------------------------------------
    | LOGOUT USER
    |--------------------------------------------------------------------------
    */

    public function destroy(Request $request): RedirectResponse
    {
        /*
        |--------------------------------------------------------------------------
        | LOGOUT
        |--------------------------------------------------------------------------
        */

        Auth::guard('web')->logout();

        /*
        |--------------------------------------------------------------------------
        | INVALIDATE SESSION
        |--------------------------------------------------------------------------
        */

        $request->session()->invalidate();

        /*
        |--------------------------------------------------------------------------
        | REGENERATE TOKEN
        |--------------------------------------------------------------------------
        */

        $request->session()->regenerateToken();

        /*
        |--------------------------------------------------------------------------
        | REDIRECT LOGIN
        |--------------------------------------------------------------------------
        */

        return redirect()->route('login');
    }
}