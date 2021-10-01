<?php

namespace App\Http\Middleware;

use App\Models\Driver;
use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DriverAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            throw_if(!$request->bearerToken(), ModelNotFoundException::class);

            $driver = Driver::whereApiToken($request->bearerToken())->firstOrFail();

            auth('driver')->loginUsingId($driver->id);

            return $next($request);
        } catch (ModelNotFoundException $exception) {
            return new Response([
                'message' => 'unauthorized'
            ], 401);
        }
    }
}
