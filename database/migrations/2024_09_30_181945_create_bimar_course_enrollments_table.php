<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // public function up(): void
    // {
    //     Schema::create('bimar_course_enrollments', function (Blueprint $table) {
    //         $table->id();
    //         $table->unsignedBigInteger('bimar_training_program_id')->nullable();
    //         $table->unsignedBigInteger('bimar_training_course_id')->nullable();
    //         $table->unsignedBigInteger('bimar_training_year_id')->nullable();
    //         $table->unsignedBigInteger('tr_course_enrol_arrangement');
    //         $table->unsignedBigInteger('tr_course_enrol_discount')->default(0);
    //         $table->text('tr_course_enrol_desc')->nullable();
    //         $table->date('tr_course_enrol_reg_start_date')->nullable();
    //         $table->date('tr_course_enrol_reg_end_date')->nullable();
    //         $table->date('tr_course_enrol_session_start_date')->nullable();
    //         $table->date('tr_course_enrol_session_end_date')->nullable();
    //         $table->integer('tr_course_enrol_mark')->nullable();
    //         $table->float('tr_course_enrol_oralmark', 5, 2)->nullable();
    //         $table->float('tr_course_enrol_finalmark', 5, 2)->nullable();
    //         $table->float('tr_course_enrol_price');
    //         $table->unsignedBigInteger('tr_course_enrol_type');
    //         $table->unsignedBigInteger('tr_course_enrol_status')->default(0);
    //         $table->dateTime('tr_course_enrol_update_date')->nullable();
    //         $table->dateTime('tr_course_enrol_create_date')->useCurrent();
    //         $table->timestamps();
        
    //         // فهارس
    //         $table->index('bimar_training_program_id', 'TR_COURSE_ENROL_PROGRAM_ID_INDEX');
    //         $table->index('bimar_training_course_id', 'TR_COURSE_ENROL_COURSE_ID_INDEX');
    //         $table->index('bimar_training_year_id', 'TR_COURSE_ENROL_YEAR_ID_INDEX');
        
    //         // مفاتيح خارجية
    //         $table->foreign('bimar_training_program_id')->references('id')->on('bimar_training_programs')->cascadeOnDelete();
    //         $table->foreign('bimar_training_course_id')->references('id')->on('bimar_training_courses')->cascadeOnDelete();
    //         $table->foreign('bimar_training_year_id')->references('id')->on('bimar_training_years')->cascadeOnDelete();
    //         $table->foreignId('bimar_training_type_id')->constrained()->cascadeOnDelete()->nullable();
    //     });  
    // }

    public function up(): void
    {
        Schema::create('bimar_course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bimar_training_program_id')->nullable();
            $table->unsignedBigInteger('bimar_training_course_id')->nullable();
            $table->unsignedBigInteger('bimar_training_year_id')->nullable();
            // $table->unsignedBigInteger('bimar_training_type_id')->nullable();

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
            $table->unsignedBigInteger('tr_course_enrol_status')->default(0);
            $table->dateTime('tr_course_enrol_update_date')->nullable();
            $table->dateTime('tr_course_enrol_create_date')->useCurrent();
            $table->timestamps();

            // indexes
            $table->index('bimar_training_program_id', 'TR_COURSE_ENROL_PROGRAM_ID_INDEX');
            $table->index('bimar_training_course_id', 'TR_COURSE_ENROL_COURSE_ID_INDEX');
            $table->index('bimar_training_year_id', 'TR_COURSE_ENROL_YEAR_ID_INDEX');

            // foreigns
            if (Schema::hasTable('bimar_training_programs')) {
                $table->foreign('bimar_training_program_id')->references('id')->on('bimar_training_programs')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_training_courses')) {
                $table->foreign('bimar_training_course_id')->references('id')->on('bimar_training_courses')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_training_years')) {
                $table->foreign('bimar_training_year_id')->references('id')->on('bimar_training_years')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_training_types')) {
                $table->foreignId('bimar_training_type_id')->constrained()->cascadeOnDelete()->nullable();
            }
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bimar_course_enrollments');
    }
};
