<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawans')->insert([
            [
                'nama_karyawan' => 'Andi Saputra',
                'jabatan' => 'Kasir',
                'alamat' => 'Jl. Mawar No. 10',
                'nomor_telepon' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_karyawan' => 'Siti Nurhaliza',
                'jabatan' => 'Admin',
                'alamat' => 'Jl. Melati No. 5',
                'nomor_telepon' => '081298765432',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        {
            Karyawan::factory()->count(10)->create(); // Buat 10 data otomatis
        }

    }
}
