<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Type;
use Illuminate\Http\Request;

class BimarTrainingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_Training_Type::all();
        return view('admin.training_type',compact('data'));
    }
    public function updateSwitch($typeId)
    {
        $type = Bimar_Training_Type::find($typeId);
        if($type){
            if($type->tr_type_status){
                $type->tr_type_status =0;
            }
            else{
                $type->tr_type_status =1;
            }
            $type->save();
        }
        return back();

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addtype');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tr_type_name_en' => 'required|unique:bimar_training_types',
            'tr_type_name_ar' => 'required|unique:bimar_training_types',
          ]);

        $data = new Bimar_Training_Type;
        $data->tr_type_name_en = $request->tr_type_name_en;
        $data->tr_type_name_ar = $request->tr_type_name_ar;
        $data->tr_type_status = $request->tr_type_status;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Type $bimar_Training_Type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bimar_Training_Type::findOrFail($id);
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tr_type_name_en' => 'required',
            'tr_type_name_ar' => 'required',
        ]);

        $data = Bimar_Training_Type::findOrFail($id);
        $data->tr_type_name_en = $request->tr_type_name_en;
        $data->tr_type_name_ar = $request->tr_type_name_ar;
        $data->tr_type_status = $request->tr_type_status;
        $data->update();

        return response()->json(['message' => 'تم التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Type $bimar_Training_Type)
    {
        //
    }

    public function updateSwitchStatus(Request $request, $id)
    {
        $data = Bimar_Training_Type::find($id);

        if ($data) {
            $data->tr_type_status = $request->tr_type_status;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    }
}
