<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // If admin is not logged in, redirect to admin login
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login')->with('error', 'Please login to access admin area.');
        }

        // Otherwise, allow access
        return $next($request);
    }
}
