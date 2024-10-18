<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TraineeLoginController  extends Controller
{
    /**
     * Display the registration view.
     */
    public function showLoginForm()
    {
        return view('auth.trainee-login'); // قم بإنشاء هذا العرض
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'trainee_mobile' => 'required|string',
            'trainee_pass' => 'required|string',
        ]);

        if (Auth::guard('trainee')->attempt(['trainee_mobile' => $request->trainee_mobile, 'trainee_pass' => $request->trainee_pass])) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['trainee_mobile' => 'تم إدخال بيانات غير صحيحة.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('trainee')->logout();
        return redirect()->route('trainee.login');
    }
}
