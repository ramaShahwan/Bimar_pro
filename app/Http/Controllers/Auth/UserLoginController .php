<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
  

//     public function login(Request $request)
// {
//     $request->validate([
//         'tr_user_name' => 'required|string',
//         'tr_user_pass' => 'required|string',
//     ]);

//     $credentials = $request->only('tr_user_name', 'tr_user_pass');

//     // محاولة تسجيل الدخول كمسؤول
//     if (Auth::guard('administrator')->attempt($credentials)) {
//         return redirect()->intended('administrator.dashboard');
//     }
//     // محاولة تسجيل الدخول كمستخدم عمليات
//     elseif (Auth::guard('operation_user')->attempt($credentials)) {
//         return redirect()->intended('operation_user.dashboard');
//     }
//     // محاولة تسجيل الدخول كمدرب
//     elseif (Auth::guard('trainer')->attempt($credentials)) {
//         return redirect()->intended('trainer.dashboard');
//     }
//     // محاولة تسجيل الدخول كمتدرب
//     elseif (Auth::guard('trainee')->attempt($credentials)) {
//         return redirect()->intended('trainee.dashboard');
//     }

//     return back()->withErrors(['tr_user_name' => 'تم إدخال بيانات غير صحيحة.']);
// }


    // public function logout(Request $request)
    // {
    //     Auth::guard('user')->logout();
    
    //     session()->flush();
    
    //     return redirect()->route('user.login');
    // }

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

        $credentials = [
            'tr_user_name' => $request->tr_user_name,
            'password' => $request->tr_user_pass,
        ];

        if (Auth::guard('administrator')->attempt($credentials)) {
            return redirect()->intended('administrator.dashboard');
        } elseif (Auth::guard('operation_user')->attempt($credentials)) {
            return redirect()->intended('operation_user.dashboard');
        } elseif (Auth::guard('trainer')->attempt($credentials)) {
            return redirect()->intended('trainer.dashboard');
        }

        return back()->withErrors(['tr_user_name' => 'تم إدخال بيانات غير صحيحة.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/'); // أو أي مسار مناسب
    }
}