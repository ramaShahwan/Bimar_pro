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
        Schema::create('bimar_training_courses', function (Blueprint $table) {
            // $table->id('tr_course_id')->autoIncrement();
            $table->id();
            $table->string('tr_course_code', 50);
            $table->string('tr_course_name_en');
            $table->string('tr_course_name_ar');
            $table->string('tr_course_img', 200)->nullable();
            // $table->unsignedBigInteger('bimar_training_program_id');
            $table->text('tr_course_desc')->nullable();
            $table->integer('tr_course_status')->default(0);
            $table->integer('tr_is_diploma')->default(0);

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');
            $table->timestamps();

            // foreign
             $table->foreignId('bimar_training_program_id')->constrained()->cascadeOnDelete()->nullable();

            // index
            $table->index('bimar_training_program_id', 'TR_COURSE_PROGRAM_ID_INDEX');
            $table->index('tr_course_status', 'TR_COURSE_STATUS_INDEX');



            // $table->foreign('tr_course_program_id')
            //       ->references('tr_program_id')
            //       ->on('bimar_training_programs')
            //       ->onDelete('cascade');

            // $table->primary('tr_course_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_training_courses');
    }
};
