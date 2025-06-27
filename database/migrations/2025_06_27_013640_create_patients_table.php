<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nik');
            $table->text('address');
            $table->string('phone');
            $table->timestamps();
        });

        // Insert sample data
        DB::table('patients')->insert([
            [
                'name' => 'Ahmad Santoso',
                'nik' => '3273010101010001',
                'address' => 'Jl. Merdeka No. 10, Jakarta',
                'phone' => '0812345678901',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Budi Setiawan',
                'nik' => '3374020202020002',
                'address' => 'Jl. Sudirman No. 45, Surabaya',
                'phone' => '0823456789012',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
