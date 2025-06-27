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
            [
                'name' => 'Citra Dewi',
                'nik' => '3273030303030003',
                'address' => 'Jl. Diponegoro No. 12, Bandung',
                'phone' => '0834567890123',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dedi Pratama',
                'nik' => '3273040404040004',
                'address' => 'Jl. Ahmad Yani No. 7, Medan',
                'phone' => '0845678901234',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Eka Putri',
                'nik' => '3273050505050005',
                'address' => 'Jl. Gajah Mada No. 15, Semarang',
                'phone' => '0856789012345',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Fajar Hidayat',
                'nik' => '3273060606060006',
                'address' => 'Jl. Sisingamangaraja No. 21, Yogyakarta',
                'phone' => '0867890123456',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Gita Lestari',
                'nik' => '3273070707070007',
                'address' => 'Jl. Pemuda No. 8, Malang',
                'phone' => '0878901234567',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hendra Saputra',
                'nik' => '3273080808080008',
                'address' => 'Jl. Asia Afrika No. 19, Palembang',
                'phone' => '0889012345678',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Indah Permata',
                'nik' => '3273090909090009',
                'address' => 'Jl. Gatot Subroto No. 11, Makassar',
                'phone' => '0890123456789',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Joko Susilo',
                'nik' => '3273101010100010',
                'address' => 'Jl. Slamet Riyadi No. 5, Solo',
                'phone' => '0810987654321',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Kiki Amelia',
                'nik' => '3273111111110011',
                'address' => 'Jl. Pahlawan No. 13, Balikpapan',
                'phone' => '0821098765432',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Lukman Hakim',
                'nik' => '3273121212120012',
                'address' => 'Jl. Rajawali No. 17, Denpasar',
                'phone' => '0832109876543',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hafiz Aryan Siregar',
                'nik' => '1221070612020001',
                'address' => 'Jl. Bangau Sakti, Panam',
                'phone' => '085156839681',
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
