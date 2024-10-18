<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bimar_User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Helpers\PasswordGenerator;


class UserRegisterController  extends Controller
{
    /**
     * Display the registration view.
     */
    public function register(Request $request)
    {
        $request->validate([
            'tr_user_name' => 'required|unistring|max:50|que:bimar_users',
            'tr_user_fname_en' => 'required|string|max:100',
            'tr_user_lname_en' => 'required|string|max:100',
            'tr_user_fname_ar' => 'required|string|max:100',
            'tr_user_lname_ar' => 'required|string|max:100',
            'tr_user_mobile' => 'required|string|max:50',
            'tr_user_email' => 'required|string|email|max:50|unique:bimar_users',
            // 'tr_user_pass' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $randomPassword = PasswordGenerator::generate(12);
        $data = Bimar_User::create([
            'trainee_fname_ar' => $request->trainee_fname_ar,
            'trainee_lname_ar' => $request->trainee_lname_ar,
            'trainee_fname_en' => $request->trainee_fname_ar,
            'trainee_lname_en' => $request->trainee_lname_ar,
            'tr_user_mobile' => $request->tr_user_mobile,
            'tr_user_phone'=>$request->tr_user_phone,
            'tr_user_email' => $request->tr_user_email,
            'bimar_users_status_id' => $request->bimar_users_status_id,
            'bimar_users_gender_id' => $request->bimar_users_gender_id,
            'tr_user_address' => $request->tr_user_address,
            'bimar_users_gender_id' => $request->bimar_users_gender_id,
            'bimar_users_academic_degree_id'=> $request->bimar_users_academic_degree_id,
            'bimar_role_id'=> $request->bimar_role_id,
            'tr_user_pass' => Hash::make($randomPassword),
        ]);

            // store image
            if($request->hasFile('tr_user_personal_img')){
                $newImage = $request->file('tr_user_personal_img');
                //for change image name
                $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
                $newImage->move(public_path('img/user/'), $newImageName);
                $data->tr_user_personal_img = $newImageName;
                $data->update();
            }
        return redirect()->route('login')->with('success',($randomPassword), ' تم إنشاء الحساب بنجاح. وهذه هي كلمة المرور .');;
    }
}
