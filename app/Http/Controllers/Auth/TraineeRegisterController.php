<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Bimar_Trainee;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;



class TraineeRegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function register(Request $request)
    {
        $request->validate([
            'trainee_fname_ar' => 'required|string|max:100',
            'trainee_lname_ar' => 'required|string|max:100',
            'trainee_fname_en' => 'required|string|max:100',
            'trainee_lname_en' => 'required|string|max:100',
            'trainee_mobile' => 'required|string|max:50',
            'trainee_email' => 'required|string|email|max:50|unique:bimar_trainees',
            'trainee_pass' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = Bimar_Trainee::create([
            'trainee_fname_ar' => $request->trainee_fname_ar,
            'trainee_lname_ar' => $request->trainee_lname_ar,
            'trainee_fname_en' => $request->trainee_fname_ar,
            'trainee_lname_en' => $request->trainee_lname_ar,
            'trainee_mobile' => $request->trainee_mobile,
            'trainee_email' => $request->trainee_email,
            'tr_user_passchangedate' => null ,
            'bimar_users_status_id' => $request->bimar_users_status_id,
            'bimar_users_gender_id' => $request->bimar_users_gender_id,
            'trainee_address' => $request->trainee_address,
            'bimar_users_gender_id' => $request->bimar_users_gender_id,

            'trainee_pass' => Hash::make($request->trainee_pass),
        ]);

            // store image
            if($request->hasFile('trainee_personal_img')){
                $newImage = $request->file('trainee_personal_img');
                //for change image name
                $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
                $newImage->move(public_path('img/trainee/'), $newImageName);
                $data->trainee_personal_img = $newImageName;
                $data->update();
            }
        return redirect()->route('login');
    }
}
