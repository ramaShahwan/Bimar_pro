<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Course_Enrollment;
use Illuminate\Http\Request;

class BimarCourseEnrollmentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_Course_Enrollment::all();
        return view('admin.enrollment',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addenrollment');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tr_course_enrol_program_id' => 'required',
            'tr_course_enrol_course_id' => 'required',
            'tr_course_enrol_year_id' => 'required',
            'tr_course_enrol_arrangement' => 'required',
            'tr_course_enrol_price' => 'required',
            'tr_course_enrol_type' => 'required',
          ]);

        $data = new Bimar_Course_Enrollment;
        $data->tr_course_enrol_program_id = $request->tr_course_enrol_program_id;
        $data->tr_course_enrol_course_id = $request->tr_course_enrol_course_id;
        $data->tr_course_enrol_year_id = $request->tr_course_enrol_year_id;
        $data->tr_course_enrol_arrangement = $request->tr_course_enrol_arrangement;
        $data->tr_course_enrol_discount = $request->tr_course_enrol_discount;
        $data->tr_course_enrol_desc = $request->tr_course_enrol_desc;
        $data->tr_course_enrol_reg_start_date = $request->tr_course_enrol_reg_start_date;
        $data->tr_course_enrol_reg_end_date = $request->tr_course_enrol_reg_end_date;
        $data->tr_course_enrol_session_start_date = $request->tr_course_enrol_session_start_date;
        $data->tr_course_enrol_session_end_date = $request->tr_course_enrol_session_end_date;
        $data->tr_course_enrol_mark = $request->tr_course_enrol_mark;
        $data->tr_course_enrol_oralmark = $request->tr_course_enrol_oralmark;
        $data->tr_course_enrol_finalmark = $request->tr_course_enrol_finalmark;
        $data->tr_course_enrol_price = $request->tr_course_enrol_price;
        $data->tr_course_enrol_type = $request->tr_course_enrol_type;
        $data->tr_course_enrol_status = $request->tr_course_enrol_status;
        $data->tr_course_enrol_update_date = now();
        $data->tr_course_enrol_create_date = now();
        $data->save();

     return redirect()->back()->with('message','تم الإضافة');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Bimar_Course_Enrollment::where('tr_course_enrol_id',$id)->first();

        return view('admin.enrollment_details',compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Bimar_Course_Enrollment::findOrFail($id);
        return view('admin.updateenrollment', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tr_course_enrol_program_id' => 'required',
            'tr_course_enrol_course_id' => 'required',
            'tr_course_enrol_year_id' => 'required',
            'tr_course_enrol_arrangement' => 'required',
            'tr_course_enrol_price' => 'required',
            'tr_course_enrol_type' => 'required',
          ]);
       $data = Bimar_Course_Enrollment::findOrFail($id);
       $data->tr_course_enrol_program_id = $request->tr_course_enrol_program_id;
       $data->tr_course_enrol_course_id = $request->tr_course_enrol_course_id;
       $data->tr_course_enrol_year_id = $request->tr_course_enrol_year_id;
       $data->tr_course_enrol_arrangement = $request->tr_course_enrol_arrangement;
       $data->tr_course_enrol_discount = $request->tr_course_enrol_discount;
       $data->tr_course_enrol_desc = $request->tr_course_enrol_desc;
       $data->tr_course_enrol_reg_start_date = $request->tr_course_enrol_reg_start_date;
       $data->tr_course_enrol_reg_end_date = $request->tr_course_enrol_reg_end_date;
       $data->tr_course_enrol_session_start_date = $request->tr_course_enrol_session_start_date;
       $data->tr_course_enrol_session_end_date = $request->tr_course_enrol_session_end_date;
       $data->tr_course_enrol_mark = $request->tr_course_enrol_mark;
       $data->tr_course_enrol_oralmark = $request->tr_course_enrol_oralmark;
       $data->tr_course_enrol_finalmark = $request->tr_course_enrol_finalmark;
       $data->tr_course_enrol_price = $request->tr_course_enrol_price;
       $data->tr_course_enrol_type = $request->tr_course_enrol_type;
       $data->tr_course_enrol_status = $request->tr_course_enrol_status;
       $data->tr_course_enrol_update_date = now();
       $data->update();

      return redirect()->back()->with('message','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Course_Enrollment $bimar_Course_Enrollment)
    {
        //
    }

    public function updateSwitchStatus(Request $request, $id)
    {
        $data = Bimar_Course_Enrollment::find($id);

        if ($data) {
            $data->tr_course_enrol_status = $request->tr_course_enrol_status;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    }
}
