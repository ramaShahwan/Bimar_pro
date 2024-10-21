<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bimar_Training_Program;
use App\Models\Bimar_Course_Enrollment;

class Bimar_Training_Course extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'tr_course_id'; 
    // public $incrementing = true; 
    // protected $keyType = 'int';
     // protected $guarded=[];
     protected $fillable = ['tr_course_code', 'tr_course_name_en', 'tr_course_name_ar', 
     'tr_course_img', 'bimar_training_program_id','tr_course_desc','tr_course_status','tr_is_diploma'];
     
     protected $table = 'bimar_training_courses';

     public function bimar_training_program()
     {
         return $this->belongsTo(Bimar_Training_Program::class, 'bimar_training_program_id');
     }

     public function bimar_course_Enrollments(): HasMany
     {
         return $this->hasMany(Bimar_Course_Enrollment::class);
     }
}
