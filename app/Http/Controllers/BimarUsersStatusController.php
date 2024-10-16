<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Users_Status;
use Illuminate\Http\Request;

class BimarUsersStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_Users_Status::all();
        return view('admin.statuses',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addstatus');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tr_users_status_name_en' => 'required|unique:bimar_users_statuses',
            'tr_users_status_name_ar' => 'required|unique:bimar_users_statuses',
            'tr_users_status' => 'required|in:0,1',
          ]);

        $data = new Bimar_Users_Status;
        $data->tr_users_status_name_en = $request->tr_users_status_name_en;
        $data->tr_users_status_name_ar = $request->tr_users_status_name_ar;
        $data->tr_users_status_desc = $request->tr_users_status_desc;
        $data->tr_users_status = $request->tr_users_status;
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_Users_Status $bimar_Users_Status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bimar_Users_Status::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $validated = $request->validate([
                'tr_users_status_name_en' => 'required',
                'tr_users_status_name_ar' => 'required',
                'tr_users_status' => 'required|in:0,1',
            ]);

            $data = Bimar_Users_Status::findOrFail($id);
            $data->tr_users_status_name_en = $request->tr_users_status_name_en;
            $data->tr_users_status_name_ar = $request->tr_users_status_name_ar;
            $data->tr_users_status_desc = $request->tr_users_status_desc;
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
    public function destroy(Bimar_Users_Status $bimar_Users_Status)
    {
        //
    }

    public function updateSwitch($statusId)
    {
        $status = Bimar_Users_Status::find($statusId);
        if($status){
            if($status->tr_users_status){
                $status->tr_users_status =0;
            }
            else{
                $status->tr_users_status =1;
            }
            $status->save();
        }
        return back();
    }
}
