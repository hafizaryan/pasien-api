<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Insert sample users
        DB::table('users')->insert([
            [
                'name' => 'Admin Rumah Sakit Syafira',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'), // Ganti dengan password yang aman
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hafiz Aryan Siregar',
                'email' => 'hafizaryansiregar@gmail.com',
                'password' => Hash::make('password123'), // Ganti dengan password yang aman
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
    }
};
