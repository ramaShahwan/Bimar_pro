<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bimar_Users_Status extends Model
{
    // use HasFactory;

    protected $fillable = ['tr_users_status_name_en', 'tr_users_status_name_ar', 'tr_users_status_desc','tr_users_status'];

    protected $table = 'bimar_users_statuses';

    public function Bimar_Trainees(): HasMany
      {
          return $this->hasMany(Bimar_Trainee::class);
      }

      public function Bimar_Users(): HasMany
      {
          return $this->hasMany(Bimar_User::class);
      }
}
