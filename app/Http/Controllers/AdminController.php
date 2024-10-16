<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Attempt to log in the admin
        if (Auth::guard('admin')->attempt($credentials)) {
            // return redirect()->route('admin.dashboard');
            return redirect()->intended('admin.dashboard');
        }


        return back()->withErrors([
            'email' => 'Invalid credentials provided',
        ]);
    }

    public function dashboard()
    {
        $analytics = [];
        return view('admin.dashboard', $analytics);
    }
}
