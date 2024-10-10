<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bimar_users_academic_degrees', function (Blueprint $table) {
            // $table->id('tr_users_degree_id')->autoIncrement();
            $table->id();
            $table->string('tr_users_degree_name_en', 45);
            $table->string('tr_users_degree_name_ar', 45);
            $table->text('tr_users_degree_desc')->nullable();
            $table->tinyInteger('tr_users_degree_status')->default(1);

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            // $table->primary('tr_users_degree_id');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_users_academic_degrees');
    }
};
