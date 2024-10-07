<?php

namespace App\Http\Controllers;

use App\Models\Bimar_Training_Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;  

class BimarTrainingCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Bimar_Training_Course::all();
        return view('admin.course',compact('data'));
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
        //protected $fillable = ['tr_course_code', 'tr_course_name_en', 'tr_course_name_ar', 
    //  'tr_course_img', 'tr_course_program_id','tr_course_desc','tr_course_status','tr_is_diploma'];

    $validated = $request->validate([
        'tr_course_code' => 'required',
        'tr_course_name_en' => 'required',
        'tr_course_name_ar' => 'required',
        'tr_course_program_id' => 'required',
        'tr_is_diploma' => 'required',
      ]);

    $data = new Bimar_Training_Course;
    $data->tr_course_code = $request->tr_course_code;
    $data->tr_course_name_en = $request->tr_course_name_en;
    $data->tr_course_name_ar = $request->tr_course_name_ar;
    $data->tr_course_program_id = $request->tr_course_program_id;
    $data->tr_course_desc = $request->tr_course_desc;
    $data->tr_course_status = $request->tr_course_status;
    $data->tr_is_diploma = $request->tr_is_diploma;
    $data->save();

     // store image
     if($request->hasFile('tr_course_img')){
        $newImage = $request->file('tr_course_img');
        //for change image name
        $newImageName = 'image_' .  $data->id . '.' . $newImage->getClientOriginalExtension();
        $newImage->move(public_path('img/course/'), $newImageName);
        $data->tr_course_img = $newImageName;
        $data->update();
     }

    return redirect()->back()->with('message','تم الإضافة');
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
    public function edit( $id)
    {
        $data = Bimar_Training_Course::findOrFail($id);
        return view('admin.updatecourse', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'tr_course_code' => 'required',
            'tr_course_name_en' => 'required',
            'tr_course_name_ar' => 'required',
            'tr_course_program_id' => 'required',
            'tr_is_diploma' => 'required',
          ]);

       $data = Bimar_Training_Course::findOrFail($id);
       $oldImageName=$data->tr_course_img;

       $data->tr_course_code = $request->tr_course_code;
       $data->tr_course_name_en = $request->tr_course_name_en;
       $data->tr_course_name_ar = $request->tr_course_name_ar;
       $data->tr_course_program_id = $request->tr_course_program_id;
       $data->tr_course_desc = $request->tr_course_desc;
       $data->tr_course_status = $request->tr_course_status;
       $data->tr_is_diploma = $request->tr_is_diploma;

        // update newImage
        if ($request->hasFile('tr_course_img')) {
        // Delete the old image from the server
        if ($oldImageName) {
         File::delete(public_path('img/course/') . $oldImageName);
        }
         // Upload new image
         $newImage = $request->file('tr_course_img');
         $newImageName = 'image_' . $data->id . '.' . $newImage->getClientOriginalExtension();
         $newImage->move(public_path('img/course/'), $newImageName);
  
         // Update the image record with the new image name
         $data->tr_course_img = $newImageName;
        }
       $data->update();

      return redirect()->back()->with('message','تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_Training_Course $bimar_Training_Course)
    {
        //
    }
    
    public function updateSwitchStatus(Request $request, $id)
    {
        $data = Bimar_Training_Course::find($id);

        if ($data) {
            $data->tr_course_status = $request->tr_course_status;
            $data->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Item not found'], 404);
        }
    }
}
