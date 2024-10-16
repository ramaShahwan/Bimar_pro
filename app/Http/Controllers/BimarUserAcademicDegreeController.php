<?php

namespace App\Http\Controllers;

use App\Models\Bimar_User_Academic_Degree;
use Illuminate\Http\Request;

class BimarUserAcademicDegreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_User_Academic_Degree::all();
        return view('admin.grade',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addgrade');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tr_users_degree_name_en' => 'required|unique:bimar_users_academic_degrees',
            'tr_users_gender_name_ar' => 'required|unique:bimar_users_academic_degrees',
            'tr_users_degree_status' => 'required|in:0,1',
          ]);

        $data = new Bimar_User_Academic_Degree;
        $data->tr_users_degree_name_en = $request->tr_users_degree_name_en;
        $data->tr_users_degree_name_ar = $request->tr_users_degree_name_ar;
        $data->tr_users_degree_desc = $request->tr_users_degree_desc;
        $data->tr_users_degree_status = $request->tr_users_degree_status;

        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_User_Academic_Degree $bimar_User_Academic_Degree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bimar_User_Academic_Degree::findOrFail($id);
        return response()->json($data); 
    }   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $validated = $request->validate([
                'tr_users_degree_name_en' => 'required',
                'tr_users_gender_name_ar' => 'required',
                'tr_users_degree_status' => 'required|in:0,1',
            ]);

            $data = Bimar_User_Academic_Degree::findOrFail($id);
            $data->tr_users_degree_name_en = $request->tr_users_degree_name_en;
            $data->tr_users_degree_name_ar = $request->tr_users_degree_name_ar;
            $data->tr_users_degree_desc = $request->tr_users_degree_desc;
            $data->tr_users_degree_status = $request->tr_users_degree_status;
            $data->update();

            return response()->json(['message' => 'تم التعديل بنجاح'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_User_Academic_Degree $bimar_User_Academic_Degree)
    {
        //
    }

    public function updateSwitch($yearId)
    {
        $grade = Bimar_User_Academic_Degree::find($yearId);
        if($grade){
            if($grade->tr_users_degree_status){
                $grade->tr_users_degree_status =0;
            }
            else{
                $grade->tr_users_degree_status =1;
            }
            $grade->save();
        }
        return back();
    }
}
