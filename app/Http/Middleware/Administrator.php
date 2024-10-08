<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,string $role): Response
    {
        if (Auth::check()&& $role == 'administrator')
       // Auth::->user()->hasRole == 'admin' //function istead of string 
    {
        return $next($request);
        }
        return redirect('/');
    }
}
