<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Bimar_User_Academic_Degree extends Model
{
    // use HasFactory;

    protected $fillable = ['tr_users_degree_name_en', 'tr_users_degree_name_ar', 'tr_users_degree_desc','tr_users_degree_status'];

    protected $table = 'bimar_users_academic_degrees';

      public function Bimar_Users(): HasMany
      {
          return $this->hasMany(Bimar_User::class);
      }
}
