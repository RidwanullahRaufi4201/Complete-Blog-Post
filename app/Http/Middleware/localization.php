<?php

namespace App\Http\Middleware;

use Closure;
use  Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Session::has('locale'))
        {
            app()->setLocale(Session::get('locale'));
        }
        return $next($request);
    }
}
