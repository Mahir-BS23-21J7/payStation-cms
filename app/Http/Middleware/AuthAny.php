<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAny
{
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user() || Auth::guard('admin')->check()) {
            return $next($request);
        }

        return redirect()->back();
    }
}
