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
        Schema::create('bimar_roles', function (Blueprint $table) {
            // $table->id('tr_role_id')->autoIncrement();
            $table->id();
            $table->string('tr_role_code', 50)->nullable();
            $table->string('tr_role_name_en', 255)->nullable();
            $table->string('tr_role_name_ar', 255)->nullable();
            $table->string('tr_role_desc', 255)->nullable();
            $table->tinyInteger('tr_role_status')->default(1);

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            // $table->primary('tr_role_id');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_roles');
    }
};