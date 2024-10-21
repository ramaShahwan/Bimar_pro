<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

// class Bimar_User extends Model

class Bimar_User extends Authenticatable
{


    // protected $fillable = ['tr_user_name', 'tr_user_fname_en', 'tr_user_lname_en', 
    // 'tr_user_fname_ar', 'tr_user_lname_ar','bimar_users_gender_id','tr_user_address',
    // 'tr_user_phone','tr_user_mobile','tr_user_email','tr_user_personal_img',
    //  'tr_user_pass','tr_last_pass','bimar_users_status_id','bimar_role_id','bimar_users_academic_degree_id',
    // 'tr_user_passchangedate','tr_user_lastaccess','tr_user_createdate'];
    

    protected $table = 'bimar_users'; 

    protected $primaryKey = 'id'; 

    protected $guarded = []; 

    // protected $username = 'tr_user_name';
    // protected $password = 'tr_user_pass';

    // تحديد اسم حقل اسم المستخدم
    public function getAuthIdentifierName()
    {
        return 'tr_user_name';
    }

    // تحديد حقل كلمة المرور
    public function getAuthPassword()
    {
        return $this->tr_user_pass;
    }

    // تعطيل تذكير التوكن إذا لم يكن موجودًا
    public $rememberTokenName = false;

    public function Bimar_User_Gender()
    {
        return $this->belongsTo(Bimar_User_Gender::class, 'bimar_users_gender_id');
    }

    public function Bimar_Users_Status()
    {
        return $this->belongsTo(Bimar_Users_Status::class, 'bimar_users_status_id');
    }

    public function Bimar_Role()
    {
        return $this->belongsTo(Bimar_Roles::class, 'bimar_role_id');
    }

    public function Bimar_User_Academic_Degree()
    {
        return $this->belongsTo(Bimar_User_Academic_Degree::class, 'bimar_users_academic_degree_id');
    }
}




