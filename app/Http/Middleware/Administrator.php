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
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('administrator')->check()) {
            $user = Auth::guard('administrator')->user();
            if ($user->Bimar_Role === 'administrator') {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
