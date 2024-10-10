<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bimar_course_enrollments', function (Blueprint $table) {
            // $table->id('tr_course_enrol_id')->autoIncrement();
            $table->id();
            $table->unsignedBigInteger('tr_course_enrol_program_id');
            $table->unsignedBigInteger('tr_course_enrol_course_id');
            $table->unsignedBigInteger('tr_course_enrol_year_id');
            $table->unsignedBigInteger('tr_course_enrol_arrangement');
            $table->unsignedBigInteger('tr_course_enrol_discount')->default(0);
            $table->text('tr_course_enrol_desc')->nullable();
            $table->date('tr_course_enrol_reg_start_date')->nullable();
            $table->date('tr_course_enrol_reg_end_date')->nullable();
            $table->date('tr_course_enrol_session_start_date')->nullable();
            $table->date('tr_course_enrol_session_end_date')->nullable();
            $table->integer('tr_course_enrol_mark')->nullable();
            $table->float('tr_course_enrol_oralmark', 5, 2)->nullable();
            $table->float('tr_course_enrol_finalmark', 5, 2)->nullable();
            $table->float('tr_course_enrol_price');
            $table->unsignedBigInteger('tr_course_enrol_type');
            $table->unsignedBigInteger('tr_course_enrol_status')->default(0);
            $table->dateTime('tr_course_enrol_update_date')->nullable();
            $table->dateTime('tr_course_enrol_create_date')->useCurrent();

            // $table->primary('tr_course_enrol_id');

            $table->timestamps();
           //index
            $table->index('tr_course_enrol_program_id', 'TR_COURSE_ENROL_PROGRAM_ID_INDEX');
            $table->index('tr_course_enrol_course_id', 'TR_COURSE_ENROL_COURSE_ID_INDEX');
            $table->index('tr_course_enrol_year_id', 'TR_COURSE_ENROL_YEAR_ID_INDEX');

            //foreign
            $table->foreignId('bimar_training_program_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('bimar_training_course_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('bimar_training_year_id')->constrained()->cascadeOnDelete()->nullable();
            $table->foreignId('bimar_training_type_id')->constrained()->cascadeOnDelete()->nullable();

            // $table->foreign('tr_course_enrol_program_id')->references('tr_program_id')->on('bimar_training_programs');
            // $table->foreign('tr_course_enrol_course_id')->references('tr_course_id')->on('bimar_training_courses');
            // $table->foreign('tr_course_enrol_year_id')->references('tr_year_id')->on('bimar_training_year');
            // $table->foreign('tr_course_enrol_type')->references('tr_type_id')->on('bimar_training_type');

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_course_enrollments');
    }
};
