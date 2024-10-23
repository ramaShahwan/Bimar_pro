<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Trainee;
use Illuminate\Http\Request;
use App\Helpers\PasswordGenerator;
use Illuminate\Support\Facades\Hash;
use App\Models\Bimar_Users_Status;
use App\Models\Bimar_User_Gender;

class BimarTraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_Trainee::all();
        return view('admin.trainee',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('admin.addtrainee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'trainee_fname_ar' => 'required|unistring|max:100',
            'trainee_lname_ar' => 'required|string|max:100',
            'trainee_fname_en' => 'required|string|max:100',
            'trainee_lname_en' => 'required|string|max:100',
            'trainee_mobile' => 'required|string|max:50',
            'trainee_email' => 'required|string|email|max:50|unique:bimar_trainees',
        ]);

        $randomPassword = PasswordGenerator::generate(12);
        $data = Bimar_Trainee::create([
            'trainee_fname_ar' =>$request->trainee_fname_ar,
            'trainee_lname_ar' => $request->trainee_lname_ar,
            'trainee_fname_en' => $request->trainee_fname_en,
            'trainee_lname_en' => $request->trainee_lname_en,
            'trainee_mobile' => $request->trainee_mobile,
            'trainee_email' => $request->trainee_email,
            'bimar_users_status_id' => $request->bimar_users_status_id,
            'trainee_address' => $request->trainee_address,
            'bimar_users_gender_id' => $request->bimar_users_gender_id,
            'trainee_pass' => Hash::make($randomPassword),
            'trainee_last_pass'=>null,
            'tr_user_lastaccess'=>null,

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
        return redirect()->route('admin.addtrainee')->with('success',($randomPassword), ' تم إنشاء الحساب بنجاح. وهذه هي كلمة المرور .');;
   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Bimar_Trainee::where('id',$id)->first();

        return view('admin.showtrainee',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bimar_Trainee::findOrFail($id); 
        $gender = Bimar_User_Gender::all();
        $status = Bimar_Users_Status::all(); 

        return view('admin.updatetrainee', compact('data', 'gender','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'trainee_fname_ar' => 'required|unistring|max:100',
                'trainee_lname_ar' => 'required|string|max:100',
                'trainee_fname_en' => 'required|string|max:100',
                'trainee_lname_en' => 'required|string|max:100',
                'trainee_mobile' => 'required|string|max:50',
                'trainee_email' => 'required|string|email|max:50|unique:bimar_trainees',
            ]);

            $data = Bimar_Trainee::findOrFail($id);
            $data->trainee_fname_ar = $request->trainee_fname_ar;
            $data->trainee_lname_ar = $request->trainee_lname_ar;
            $data->trainee_fname_en = $request->trainee_fname_en;
            $data->trainee_lname_en = $request->trainee_lname_en;
            $data->tr_user_lname_ar = $request->tr_user_lname_ar;
            $data->trainee_mobile = $request->trainee_mobile;
            $data->trainee_email = $request->trainee_email;
            $data->trainee_address = $request->trainee_address;
            $data->bimar_users_gender_id = $request->bimar_users_gender_id;
            $data->update();

            // store image
            if($request->hasFile('trainee_personal_img')){
             $newImage = $request->file('trainee_personal_img');
             //for change image name
            $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/trainee/'), $newImageName);
            $data->trainee_personal_img = $newImageName;
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
    public function destroy(Bimar_Trainee $bimar_Trainee)
    {
        //
    }

    public function changePassword($id)
    {
     $user = Bimar_Trainee::findOrFail($id);
 
     $randomPassword = PasswordGenerator::generate(12);
    
     $old_password =  $user->trainee_pass;
     $user->trainee_last_pass =  $old_password;
     // $user = Auth::user();
     $user->trainee_pass = Hash::make($randomPassword);
     $user->trainee_passchangedate = now(); 
     $user->save();
 
     return redirect()->route('admin.changepass')->with(($randomPassword) ,'تم تعديل كلمة المرور بنجاح وهذه هي كلمة المرور الجديدة ');
   }
}
