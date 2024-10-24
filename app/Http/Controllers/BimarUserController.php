<?php

namespace App\Http\Controllers;

use App\Models\Bimar_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Helpers\PasswordGenerator;
use App\Models\Bimar_Users_Status;
use App\Models\Bimar_Roles;
use App\Models\Bimar_User_Academic_Degree;
use App\Models\Bimar_User_Gender;

class BimarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_User::all();
        return view('admin.user',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.adduser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
                'tr_user_name' =>$request->tr_user_name,
                'tr_user_fname_en' => $request->tr_user_fname_en,
                'tr_user_lname_en' => $request->tr_user_lname_en,
                'tr_user_fname_ar' => $request->tr_user_fname_ar,
                'tr_user_lname_ar' => $request->tr_user_lname_ar,
                'tr_user_mobile' => $request->tr_user_mobile,
                'tr_user_phone'=>$request->tr_user_phone,
                'tr_user_email' => $request->tr_user_email,
                'bimar_users_status_id' => '1',
                'tr_user_address' => $request->tr_user_address,
                'bimar_users_gender_id' => $request->bimar_users_gender_id,
                'bimar_users_academic_degree_id'=> $request->bimar_users_academic_degree_id,
                'bimar_role_id'=> $request->bimar_role_id,
                'tr_user_pass' => Hash::make($randomPassword),
                'tr_last_pass'=>null,
                'tr_user_lastaccess'=>null,

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
            return redirect()->route('admin.addemp')->with('success',($randomPassword), ' تم إنشاء الحساب بنجاح. وهذه هي كلمة المرور .');;
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Bimar_User::where('id',$id)->first();

        return view('admin.showuser',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bimar_User::findOrFail($id); 
        $gender = Bimar_User_Gender::where('tr_users_status','1')->get();
        $grade = Bimar_User_Academic_Degree::where('tr_users_degree_status','1')->get();
        $role = Bimar_Roles::where('tr_role_status','1')->get();
        $status = Bimar_Users_Status::where('tr_users_status','1')->get();

        return view('admin.updateuser', compact('data', 'gender', 'grade', 'role', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            $validated = $request->validate([
                'tr_user_name' => 'required|unistring|max:50',
                'tr_user_fname_en' => 'required|string|max:100',
                'tr_user_lname_en' => 'required|string|max:100',
                'tr_user_fname_ar' => 'required|string|max:100',
                'tr_user_lname_ar' => 'required|string|max:100',
                'tr_user_mobile' => 'required|string|max:50',
                'tr_user_email' => 'required|string|email|max:50',
                // 'tr_user_pass' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $data = Bimar_User::findOrFail($id);
            $data->tr_user_name = $request->tr_user_name;
            $data->tr_user_fname_en = $request->tr_user_fname_en;
            $data->tr_user_lname_en = $request->tr_user_lname_en;
            $data->tr_user_fname_ar = $request->tr_user_fname_ar;
            $data->tr_user_lname_ar = $request->tr_user_lname_ar;
            $data->tr_user_mobile = $request->tr_user_mobile;
            $data->tr_user_phone = $request->tr_user_phone;
            $data->tr_user_email = $request->tr_user_email;
            $data->tr_user_address = $request->tr_user_address;
            $data->bimar_users_status_id = $request->bimar_users_status_id;
            $data->bimar_users_gender_id = $request->bimar_users_gender_id;
            $data->bimar_users_academic_degree_id = $request->bimar_users_academic_degree_id;
            $data->bimar_role_id = $request->bimar_role_id;

            $data->update();

            // store image
            if($request->hasFile('tr_user_personal_img')){
             $newImage = $request->file('tr_user_personal_img');
             //for change image name
            $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/user/'), $newImageName);
            $data->tr_user_personal_img = $newImageName;
            $data->update();
 }

            return response()->json(['message' => 'تم التعديل بنجاح'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_User $bimar_User)
    {
        //
    }

    public function changePassword($id)
   {
    $user = Bimar_User::findOrFail($id);

    $randomPassword = PasswordGenerator::generate(12);
   
    $old_password =  $user->tr_user_pass;
    $user->tr_last_pass =  $old_password;
    // $user = Auth::user();
    $user->tr_user_pass = Hash::make($randomPassword);
    $user->tr_user_passchangedate = now(); 
    $user->save();

    return redirect()->route('admin.changepass')->with(($randomPassword) ,'تم تعديل كلمة المرور بنجاح وهذه هي كلمة المرور الجديدة ');
  }
}
