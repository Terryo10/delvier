<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;


class IsSupplier
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role != "1") {
            return new response(view("notallowed")->with('status', '404'));
        }

        return $next($request);
    }
}
