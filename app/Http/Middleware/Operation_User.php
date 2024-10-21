<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class Operation_User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('Operation_User')->check()) {
            $user = Auth::guard('Operation_User')->user();
            if ($user->Bimar_Role === 'Operation_User') {
                return $next($request);
            }
        }
        return redirect('/');
    }
}
