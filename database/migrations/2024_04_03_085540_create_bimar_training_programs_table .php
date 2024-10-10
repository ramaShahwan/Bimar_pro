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
        Schema::create('bimar_training_programs', function (Blueprint $table) {
            // $table->id('tr_program_id')->autoIncrement();
            $table->id();
            $table->string('tr_program_code', 50);
            $table->string('tr_program_name_en');
            $table->string('tr_program_name_ar');
            $table->string('tr_program_img', 200)->nullable();
            $table->integer('tr_program_status')->default(0);
            $table->text('tr_program_desc')->nullable();

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            // $table->primary('tr_program_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_training_programs');
    }
};
