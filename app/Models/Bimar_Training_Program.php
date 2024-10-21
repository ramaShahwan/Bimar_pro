<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bimar_Training_Course;
use App\Models\Bimar_Course_Enrollment;

use Illuminate\Database\Eloquent\Model;

class Bimar_Training_Program extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'tr_program_id'; 
    // public $incrementing = true; 
    // protected $keyType = 'int';
      // protected $guarded=[];
      protected $fillable = ['tr_program_code', 'tr_program_name_en', 'tr_program_name_ar', 
      'tr_program_img', 'tr_program_status','tr_program_desc'];
      
      protected $table = 'bimar_training_programs';

      public function bimar_training_courses(): HasMany
      {
          return $this->hasMany(Bimar_Training_Course::class);
      }

      public function bimar_course_Enrollments(): HasMany
      {
          return $this->hasMany(Bimar_Course_Enrollment::class);
      }

      
}
