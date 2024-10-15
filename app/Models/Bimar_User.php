<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimar_User extends Model
{
    use HasFactory;

    protected $fillable = ['tr_user_name', 'tr_user_fname_en', 'tr_user_lname_en', 
    'tr_user_fname_ar', 'tr_user_lname_ar','bimar_users_gender_id','tr_user_address',
    'tr_user_phone','tr_user_mobile','tr_user_email','tr_user_personal_img','tr_user_grade',
     'tr_user_pass','tr_last_pass','bimar_users_status_id','bimar_role_id','bimar_users_academic_degree_id',
    'tr_user_passchangedate','tr_user_lastaccess','tr_user_createdate'];
    
    protected $table = 'bimar_users';

    public function Bimar_User_Gender()
    {
        return $this->belongsTo(Bimar_User_Gender::class, 'bimar_users_gender_id');
    }

    public function Bimar_Users_Status()
    {
        return $this->belongsTo(Bimar_Users_Status::class, 'bimar_users_status_id');
    }

    public function Bimar_Roles()
    {
        return $this->belongsTo(Bimar_Roles::class, 'bimar_role_id');
    }

    public function Bimar_User_Academic_Degree()
    {
        return $this->belongsTo(Bimar_User_Academic_Degree::class, 'bimar_users_academic_degree_id');
    }
}
