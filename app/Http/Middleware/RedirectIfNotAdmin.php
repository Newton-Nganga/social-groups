<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotAdmin
{
    public function handle(Request $request, Closure $next)
    {


        if (!Auth::guard('admin')->check()) {
            return redirect('/admin/login');
        }

        // if (!Auth::guard('admin')->check()) {
        //     // save the intented URl to redirect after login
        //     session()->put('url.intented', url()->full());

        //     return redirect('admin.login');
        // }

        return $next($request);
    }
}
