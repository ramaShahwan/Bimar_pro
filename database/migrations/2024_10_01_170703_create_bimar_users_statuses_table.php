<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bimar_users_statuses', function (Blueprint $table) {
            // $table->id('tr_users_status_id')->autoIncrement();
            $table->id();
            $table->string('tr_users_status_name_en', 45);
            $table->string('tr_users_status_name_ar', 45);
            $table->text('tr_users_status_desc')->nullable();
            $table->tinyInteger('tr_users_status')->default(1);

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            // $table->primary('tr_users_status_id');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_users_statuses');
    }
};
