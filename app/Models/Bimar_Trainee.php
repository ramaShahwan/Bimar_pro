<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_Trainee extends Model
{
    use HasFactory;

    protected $fillable = ['trainee_fname_ar', 'trainee_lname_ar', 'trainee_mobile', 
    'trainee_email', 'trainee_gender','bimar_users_status_id','bimar_users_gender_id',
    'trainee_address','trainee_personal_img','trainee_pass','trainee_last_pass','trainee_passchangedate',
     'trainee_createdate','trainee_lastaccess','trainee_status'];
    
    protected $table = 'bimar_trainees';

    public function Bimar_User_Gender()
    {
        return $this->belongsTo(Bimar_User_Gender::class, 'bimar_users_gender_id');
    }

    public function Bimar_Users_Status()
    {
        return $this->belongsTo(Bimar_Users_Status::class, 'bimar_users_status_id');
    }
}
