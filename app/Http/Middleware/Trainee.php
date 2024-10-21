<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Bimar_Trainee; 

class Trainee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    //  */
public function handle(Request $request, Closure $next)
{
       // if (Auth::check()) {
    //     $user = Auth::user();

    //     if ($user instanceof Bimar_Trainee && $user->role === null) {
    //         return $next($request);
    //     }
    // }
    // return redirect('/');

        if (Auth::guard('trainee')->check()) {
            $user = Auth::guard('trainee')->user();

            if ($user instanceof Bimar_Trainee) {
                return $next($request);
            }
        }
        return redirect('/');
    }
}




