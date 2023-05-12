<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForAll
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // logger("ForAll Middleware | ".$request->path());
        // logger("WebOnly Middleware | ".$request->path());
        logger("apiOnly Middleware | ".$request->path());
        return $next($request);
    }
}
