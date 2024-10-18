<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckPasswordChanged
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('user')->check()) {
            $user = Auth::user();
            // تحقق مما إذا كانت كلمة المرور قد تم تغييرها
            if (is_null($user->tr_user_passchangedate)) {
                return redirect()->route('change-password');
            }
        }

        return $next($request);
    }
}