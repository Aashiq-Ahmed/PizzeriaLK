<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            // "name" => "required|string|max:255",
            // "email" => "required|string|email|max:255|unique:users,email,{$user->id}",
            // "password" => "nullable|string|min:8|confirmed",
            // "role" => "required",
            // "title" => "required",
            // "gender" => "required",
            // "birthday" => "nullable",
            // "landmark" => "nullable",
            // "address" => "required|string",
            // "city" => "required|string|max:255",
            // "phone" => "nullable",
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'customer'])->default('customer');

            // Personal Information
            $table->enum('title', ['mr', 'mrs', 'miss', 'dr', 'prof', 'etc'])->nullable();
            $table->enum('gender', ['male', 'female', 'others'])->nullable(); // We Support LGBTQ <3
            $table->date('birthday')->nullable();

            // Address
            $table->text('landmark')->nullable();
            $table->text('address')->nullable();

            $table->string('city')->nullable();

            $table->string('phone')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
