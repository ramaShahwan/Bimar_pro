<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bimar_users_genders', function (Blueprint $table) {
            // $table->id('tr_users_gender_id')->autoIncrement();
            $table->id();
            $table->string('tr_users_gender_name_en', 45);
            $table->string('tr_users_gender_name_ar', 45);
            $table->tinyInteger('tr_users_status')->default(1);

            // $table->primary('tr_users_gender_id');

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_users_genders');
    }
};
