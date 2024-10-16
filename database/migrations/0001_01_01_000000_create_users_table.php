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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            $table->rememberToken();
            // $table->timestamps();



            $table->string('tr_user_name', 50)->unique()->nullable(); // varchar(50) NOT NULL UNIQUE
            $table->string('tr_user_fname_en', 100)->nullable(); // varchar(100) NOT NULL
            $table->string('tr_user_lname_en', 100)->nullable(); // varchar(100) NOT NULL
            $table->string('tr_user_fname_ar', 100); // varchar(100) NOT NULL
            $table->string('tr_user_lname_ar', 100); // varchar(100) NOT NULL
            $table->unsignedBigInteger('bimar_users_gender_id'); // tinyint(1) NOT NULL
            $table->string('tr_user_address', 255)->nullable(); // varchar(255) DEFAULT NULL
            $table->string('tr_user_phone', 25)->nullable(); // varchar(25) DEFAULT NULL
            $table->string('tr_user_mobile', 25); // varchar(25) NOT NULL
            $table->string('email')->unique(); // varchar(50) NOT NULL
            $table->string('tr_user_personal_img', 200)->nullable(); // varchar(200) DEFAULT NULL
            $table->string('password'); // varchar(255) NOT NULL
            $table->string('tr_last_pass', 255); // varchar(255) NOT NULL
            $table->unsignedBigInteger('bimar_users_status_id')->default(1); // tinyint(1) NOT NULL DEFAULT 1
            $table->unsignedBigInteger('bimar_role_id'); // int NOT NULL
            $table->unsignedBigInteger('bimar_users_academic_degree_id'); // int NOT NULL
            $table->timestamp('tr_user_passchangedate')->nullable(); // timestamp DEFAULT NULL
            $table->timestamp('tr_user_lastaccess')->nullable(); // timestamp DEFAULT NULL
            // $table->timestamp('tr_user_createdate')->useCurrent();
            $table->timestamps();
      
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

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
