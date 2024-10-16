<?php

namespace App\Http\Controllers;

use App\Models\Bimar_User_Gender;
use Illuminate\Http\Request;

class BimarUserGenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_User_Gender::all();
        return view('admin.gender',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addgender');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tr_users_gender_name_en' => 'required|unique:bimar_users_genders',
            'tr_users_gender_name_ar' => 'required|unique:bimar_users_genders',
            'tr_users_status' => 'required|in:0,1',
          ]);

        $data = new Bimar_User_Gender;
        $data->tr_users_gender_name_en = $request->tr_users_gender_name_en;
        $data->tr_users_gender_name_ar = $request->tr_users_gender_name_ar;
        $data->tr_users_status = $request->tr_users_status;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_User_Gender $bimar_User_Gender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bimar_User_Gender::findOrFail($id);
        return response()->json($data); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $validated = $request->validate([
                'tr_users_gender_name_en' => 'required',
                'tr_users_gender_name_ar' => 'required',
                'tr_users_status' => 'required|in:0,1', 
            ]);

            $data = Bimar_User_Gender::findOrFail($id);
            $data->tr_users_gender_name_en = $request->tr_users_gender_name_en;
            $data->tr_users_gender_name_ar = $request->tr_users_gender_name_ar;
            $data->tr_users_status = $request->tr_users_status;
            $data->update();

            return response()->json(['message' => 'تم التعديل بنجاح'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_User_Gender $bimar_User_Gender)
    {
        //
    }

    public function updateSwitch($genderId)
    {
        $gender = Bimar_User_Gender::find($genderId);
        if($gender){
            if($gender->tr_users_status){
                $gender->tr_users_status =0;
            }
            else{
                $gender->tr_users_status =1;
            }
            $gender->save();
        }
        return back();
    }
}
