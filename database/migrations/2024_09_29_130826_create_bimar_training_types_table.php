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
        Schema::create('bimar_training_types', function (Blueprint $table) {
            // $table->id('tr_type_id')->autoIncrement();
            $table->id();
            $table->string('tr_type_name_en', 45);
            $table->string('tr_type_name_ar', 45);
            $table->integer('tr_type_status')->default(0);

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            // $table->primary('tr_type_id');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bimar_training_types');
    }
};
