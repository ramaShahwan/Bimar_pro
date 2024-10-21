<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bimar_Course_Enrollment;


class Bimar_Training_Year extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'tr_year_id'; 
    // public $incrementing = true; 
    // protected $keyType = 'int';
      // protected $guarded=[];
      protected $fillable = ['tr_year_name', 'tr_year', 'tr_year_start_date', 
      'tr_year_end_date', 'tr_year_status','tr_year_desc'];
      
      protected $table = 'bimar_training_years';

      public function bimar_course_Enrollments(): HasMany
      {
          return $this->hasMany(Bimar_Course_Enrollment::class);
      }
}
