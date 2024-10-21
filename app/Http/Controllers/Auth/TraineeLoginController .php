<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TraineeLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.trainee-login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'trainee_mobile' => 'required|string',
            'trainee_pass' => 'required|string',
        ]);

        $credentials = [
            'trainee_mobile' => $request->trainee_mobile,
            'password' => $request->trainee_pass,
        ];

        if (Auth::guard('trainee')->attempt($credentials)) {
            return redirect()->intended('trainee.dashboard');
        }

        return back()->withErrors(['trainee_mobile' => 'تم إدخال بيانات غير صحيحة.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('trainee')->logout();
        $request->session()->invalidate();
        return redirect('/'); // أو أي مسار مناسب
    }
}