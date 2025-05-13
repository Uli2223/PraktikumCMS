<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Tidak perlu isi 'id_karyawan' karena auto-increment
            'nama_karyawan' => $this->faker->name(),
            'jabatan' => $this->faker->randomElement([
                'Direktur',
                'Koki',
                'Bakery',
                'Pramusaji',
                'Kasir',
            ]),
            'alamat' => $this->faker->address(),
            'nomor_telepon' => $this->faker->phoneNumber(),
        ];
    }
}
