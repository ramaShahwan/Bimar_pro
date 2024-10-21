<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Bimar_Course_Enrollment;

class Bimar_Training_Type extends Model
{
    // use HasFactory;
    // protected $primaryKey = 'tr_type_id'; 
    // public $incrementing = true; 
    // protected $keyType = 'int';

    // protected $guarded=[];
    protected $fillable = ['tr_type_name_en', 'tr_type_name_ar', 'tr_type_status'];

    protected $table = 'bimar_training_types';

    public function bimar_course_Enrollments(): HasMany
      {
          return $this->hasMany(Bimar_Course_Enrollment::class);
      }
}
