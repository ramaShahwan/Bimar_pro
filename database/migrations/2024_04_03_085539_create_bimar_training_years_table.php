<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bimar_training_years', function (Blueprint $table) {
            // $table->id('tr_year_id')->autoIncrement();
            $table->id();
            $table->string('tr_year_name');
            $table->integer('tr_year');
            $table->date('tr_year_start_date');
            $table->date('tr_year_end_date');
            $table->integer('tr_year_status')->default(0);
            $table->text('tr_year_desc')->nullable();

            // $table->charset('utf8mb4');
            // $table->collation('utf8mb4_unicode_ci');

            // $table->primary('tr_year_id');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_training_years');
    }
};
