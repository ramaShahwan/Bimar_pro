<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BimarTrainingProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_Training_Program::all();
        return view('admin.programs',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addprogram');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tr_program_code' => 'required',
            'tr_program_name_en' => 'required',
            'tr_program_name_ar' => 'required',
          ]);

        $data = new Bimar_Training_Program;
        $data->tr_program_code = $request->tr_program_code;
        $data->tr_program_name_en = $request->tr_program_name_en;
        $data->tr_program_name_ar = $request->tr_program_name_ar;
        $data->tr_program_status = $request->tr_program_status;
        $data->tr_program_desc = $request->tr_program_desc;
        $data->save();

         // store image
         if($request->hasFile('tr_program_img')){
            $newImage = $request->file('tr_program_img');
            //for change image name
            $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/program/'), $newImageName);
            $data->tr_program_img = $newImageName;
            $data->update();
         }

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Program $bimar_Training_Program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id)
     {
         $data = Bimar_Training_Program::findOrFail($id);

         return response()->json($data);
     }

     public function update(Request $request, $id)
     {
         $validated = $request->validate([
             'tr_program_code' => 'required',
             'tr_program_name_en' => 'required',
             'tr_program_name_ar' => 'required',
         ]);

         $data = Bimar_Training_Program::findOrFail($id);
         $oldImageName = $data->tr_program_img;

         $data->tr_program_code = $request->tr_program_code;
         $data->tr_program_name_en = $request->tr_program_name_en;
         $data->tr_program_name_ar = $request->tr_program_name_ar;
         $data->tr_program_status = $request->tr_program_status;
         $data->tr_program_desc = $request->tr_program_desc;

         if ($request->hasFile('tr_program_img')) {
             if ($oldImageName) {
                 File::delete(public_path('img/program/') . $oldImageName);
             }
             $newImage = $request->file('tr_program_img');
             $newImageName = 'image_' . $data->id . '.' . $newImage->getClientOriginalExtension();
             $newImage->move(public_path('img/program/'), $newImageName);

             $data->tr_program_img = $newImageName;
         }

         $data->save();

         return response()->json(['message' => 'تم التعديل']);
     }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Program $bimar_Training_Program)
    {
        //
    }

    // public function updateSwitchStatus(Request $request, $id)
    // {
    //     $data = Bimar_Training_Program::find($id);

    //     if ($data) {
    //         $data->tr_program_status = $request->tr_program_status;
    //         $data->save();

    //         return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    //     }
    // }
    public function updateSwitch($programId)
    {
        $program = Bimar_Training_Program::find($programId);
        if($program){
            if($program->tr_program_status){
                $program->tr_program_status =0;
            }
            else{
                $program->tr_program_status =1;
            }
            $program->save();
        }
        return back();

    }
}
