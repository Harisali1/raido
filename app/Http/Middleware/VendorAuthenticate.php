<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorAuthenticate
{
    /**
     * Handle an incoming request.
     * @param Request $request
     * @param Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'vendor')
    {
        if (!Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::VENDOR_LOGIN);
        }

        return $next($request);
    }
}
