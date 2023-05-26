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
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('picture')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->timestamp('last_online')->nullable();
            $table->date('last_accept_date')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('new_email')->nullable();
            $table->string('status');
            $table->integer('first')->default(0);
            $table->string('company_contact')->nullable();
            $table->decimal('credits')->nullable();
            $table->boolean('first_trip')->nullable();
            $table->boolean('incomplete_profile')->nullable();
            $table->boolean('phone_verify')->nullable();
            $table->string('token_auto_login')->nullable();
            $table->string('user_vertical')->nullable();
            $table->string('language_id')->nullable();
            $table->boolean('no_registered')->nullable();
            $table->rememberToken();
            $table->timestamp('created')->nullable();
            $table->timestamp('modified')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
