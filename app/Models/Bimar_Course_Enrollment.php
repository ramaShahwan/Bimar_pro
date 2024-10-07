<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Course_Enrollment extends Model
{
    use HasFactory;

      // protected $guarded=[];
      protected $fillable = ['tr_course_enrol_program_id', 'tr_course_enrol_course_id', 'tr_course_enrol_year_id', 
      'tr_course_enrol_arrangement', 'tr_course_enrol_discount','tr_course_enrol_desc','tr_course_enrol_reg_start_date',
      'tr_course_enrol_reg_end_date','tr_course_enrol_session_start_date','tr_course_enrol_session_end_date',
       'tr_course_enrol_mark','tr_course_enrol_oralmark','tr_course_enrol_finalmark','tr_course_enrol_price',
        'tr_course_enrol_type','tr_course_enrol_status','tr_course_enrol_update_date','tr_course_enrol_create_date'];
      
      protected $table = 'bimar_course_enrollments';
 
      public function bimar_training_program()
      {
          return $this->belongsTo(Bimar_Training_Program::class, 'tr_course_enrol_program_id');
      }

      public function bimar_raining_course()
      {
          return $this->belongsTo(Bimar_Training_Course::class, 'tr_course_enrol_course_id');
      }

      public function bimar_training_type()
      {
          return $this->belongsTo(Bimar_Training_Type::class, 'tr_course_enrol_type');
      }

      public function bimar_training_year()
      {
          return $this->belongsTo(Bimar_Training_Year::class, 'tr_course_enrol_year_id');
      }

}
