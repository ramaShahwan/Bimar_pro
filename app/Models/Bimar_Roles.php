<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Roles extends Model
{
    // use HasFactory;

    protected $fillable = ['tr_role_code', 'tr_role_name_en', 'tr_role_name_ar','tr_role_desc','tr_role_status'];

    protected $table = 'bimar_roles';

      public function Bimar_Users(): HasMany
      {
          return $this->hasMany(Bimar_User::class);
      }
}
