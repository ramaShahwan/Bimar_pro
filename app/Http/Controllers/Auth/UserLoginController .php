<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
;

class UserLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user-login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'tr_user_name' => 'required|string',
            'tr_user_pass' => 'required|string',
        ]);

        if (Auth::guard('user')->attempt(['tr_user_name' => $request->tr_user_name, 'tr_user_pass' => $request->tr_user_pass])) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['tr_user_name' => 'تم إدخال بيانات غير صحيحة.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
}