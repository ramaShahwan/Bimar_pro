<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Bimar_Training_Program;

class BimarTrainingCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_Training_Course::all();
        $programs = Bimar_Training_Program::all();
        return view('admin.courses',compact('data','programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.addcourse');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input fields
        $validated = $request->validate([
            'tr_course_code' => 'required',
            'tr_course_name_en' => 'required',
            'tr_course_name_ar' => 'required',
            'tr_course_program_id' => 'required',
            'tr_is_diploma' => 'required',
        ]);

        // Create and save new course data
        $data = new Bimar_Training_Course();
        $data->tr_course_code = $request->tr_course_code;
        $data->tr_course_name_en = $request->tr_course_name_en;
        $data->tr_course_name_ar = $request->tr_course_name_ar;
        $data->tr_course_program_id = $request->tr_course_program_id;
        $data->tr_course_desc = $request->tr_course_desc;
        $data->tr_course_status = $request->tr_course_status;
        $data->tr_is_diploma = $request->tr_is_diploma;
        $data->save(); // Save the record first to get the ID

        // Store the uploaded image if present
        if ($request->hasFile('tr_course_img')) {
            $newImage = $request->file('tr_course_img');
            $newImageName = 'image_' . $data->tr_course_id . '.' . $newImage->getClientOriginalExtension();
            $newImage->move(public_path('img/course/'), $newImageName);
            $data->tr_course_img = $newImageName;
            $data->update(); // Update after assigning the image name
        }

        return redirect()->back()->with('message', 'تم الإضافة');

    }


    /**
     * Display the specified resource.
     */
    public function show(Bimar_Training_Course $bimar_Training_Course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($tr_course_id)
    {
        $data = Bimar_Training_Course::find($tr_course_id);
        $programs = Bimar_Training_Program::all();
        return view('admin.updatecourse', compact('data','programs'));
        // if (!$course) {
        //     return response()->json(['error' => 'Course not found'], 404);
        // }

        // return response()->json($course);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $tr_course_id)
    {

            // Validate incoming data
            $validated = $request->validate([
                'tr_course_code' => 'required',
                'tr_course_name_en' => 'required',
                'tr_course_name_ar' => 'required',
                'tr_course_program_id' => 'required',
                'tr_is_diploma' => 'required',
            ]);

            // Retrieve the current course to verify its existence
            $course = Bimar_Training_Course::findOrFail($tr_course_id);
            $oldImageName = $course->tr_course_img;

            // Update course data
            $course->tr_course_code = $request->tr_course_code;
            $course->tr_course_name_en = $request->tr_course_name_en;
            $course->tr_course_name_ar = $request->tr_course_name_ar;
            $course->tr_course_program_id = $request->tr_course_program_id;
            $course->tr_course_desc = $request->tr_course_desc;
            $course->tr_course_status = $request->tr_course_status;
            $course->tr_is_diploma = $request->tr_is_diploma;

            // Handle image upload if a new image is provided
            if ($request->hasFile('tr_course_img')) {
                // Delete the old image if it exists
                if ($oldImageName) {
                    File::delete(public_path('img/course/') . $oldImageName);
                }

                // Upload the new image
                $newImage = $request->file('tr_course_img');
                $newImageName = 'image_' . $tr_course_id . '.' . $newImage->getClientOriginalExtension();
                $newImage->move(public_path('img/course/'), $newImageName);

                // Update the image name in the course
                $course->tr_course_img = $newImageName;
            }

            // Save changes to the database
            $course->save();

      
            // return response()->json(['message' => 'تم التعديل بنجاح'], 200);
            // return redirect()->back()->with(['message'=>'تم التعديل']);
            // $data = Bimar_Training_Course::all();
            // $programs = Bimar_Training_Program::all();
            return redirect()->route('courses')->with(['message'=>'تم التعديل']);
            // return view('admin.courses')->with(['data' => $data,'programs'=> $programs,'message'=>'تم التعديل']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Course $bimar_Training_Course)
    {
        //
    }

    // public function updateSwitchStatus(Request $request, $id)
    // {
    //     $data = Bimar_Training_Course::find($id);

    //     if ($data) {
    //         $data->tr_course_status = $request->tr_course_status;
    //         $data->save();

    //         return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    //     } else {
    //         return response()->json(['success' => false, 'message' => 'Item not found'], 404);
    //     }
    // }
    public function updatSwitch($courseId)
    {
        $course = Bimar_Training_Course::find($courseId);
        if($course){
            if($course->tr_course_status){
                $course->tr_course_status =0;
            }
            else{
                $course->tr_course_status =1;
            }
            $course->save();
        }
        return back();

    }
}
