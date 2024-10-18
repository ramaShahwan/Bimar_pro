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
        Schema::create('bimar_users', function (Blueprint $table) {
            // $table->id('tr_user_id')->autoIncrement(); // bigint NOT NULL AUTO_INCREMENT
            $table->id();
            $table->string('tr_user_name', 50)->unique(); // varchar(50) NOT NULL UNIQUE
            $table->string('tr_user_fname_en', 100); // varchar(100) NOT NULL
            $table->string('tr_user_lname_en', 100); // varchar(100) NOT NULL
            $table->string('tr_user_fname_ar', 100); // varchar(100) NOT NULL
            $table->string('tr_user_lname_ar', 100); // varchar(100) NOT NULL
            $table->unsignedBigInteger('bimar_users_gender_id'); // tinyint(1) NOT NULL
            $table->string('tr_user_address', 255)->nullable(); // varchar(255) DEFAULT NULL
            $table->string('tr_user_phone', 25)->nullable(); // varchar(25) DEFAULT NULL
            $table->string('tr_user_mobile', 25); // varchar(25) NOT NULL
            $table->string('tr_user_email', 50); // varchar(50) NOT NULL
            $table->string('tr_user_personal_img', 200)->nullable(); // varchar(200) DEFAULT NULL
            $table->string('tr_user_pass', 255); // varchar(255) NOT NULL
            $table->string('tr_last_pass', 255)->nullable(); // varchar(255) NOT NULL
            $table->unsignedBigInteger('bimar_users_status_id')->default(1); // tinyint(1) NOT NULL DEFAULT 1
            $table->unsignedBigInteger('bimar_role_id'); // int NOT NULL
            $table->unsignedBigInteger('bimar_users_academic_degree_id'); // int NOT NULL
            $table->timestamp('tr_user_passchangedate')->nullable()->default(null); // timestamp DEFAULT NULL
            $table->timestamp('tr_user_lastaccess')->nullable(); // timestamp DEFAULT NULL
            $table->timestamp('tr_user_createdate')->useCurrent();
            // $table->timestamp(); // هذا سيضيف tr_user_createdate مع CURRENT_TIMESTAMP
            // $table->primary('tr_user_id');

            if (Schema::hasTable('bimar_roles')) {
                $table->foreign('bimar_role_id')->references('id')->on('bimar_roles')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_users_statuses')) {
                $table->foreign('bimar_users_status_id')->references('id')->on('bimar_users_statuses')->cascadeOnDelete();
            }
            if (Schema::hasTable('bimar_users_genders')) {
                $table->foreign('bimar_users_gender_id')->references('id')->on('bimar_users_genders')->cascadeOnDelete();
            }

            if (Schema::hasTable('bimar_users_academic_degrees')) {
                $table->foreign('bimar_users_academic_degree_id')->references('id')->on('bimar_users_academic_degrees')->cascadeOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bimar_users');
    }

};
