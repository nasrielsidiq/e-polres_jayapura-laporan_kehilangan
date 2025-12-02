<?php

namespace Database\Factories;

use App\Models\KategoriBarang;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaporanKehilangan>
 */
class LaporanKehilanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_laporan' => 'LP-' . strtoupper(Str::random(8)),
            'id_user' => User::factory(),
            'id_kategori_barang' => KategoriBarang::factory(),
            'tanggal_lapor' => now(),
            'nama_barang' => $this->faker->word(),
            'deskripsi_barang' => $this->faker->sentence(20),
            'lokasi_kehilangan' => $this->faker->address(),
            'waktu_kehilangan' => $this->faker->dateTimeBetween('-10 days'),
            'kronologi' => $this->faker->paragraph(3),
            'status' => $this->faker->randomElement(['submitted', 'verified', 'processing', 'done', 'rejected']),
            'verified_by' => null,
            'verified_at' => null,
            'selesai_at' => null,
        ];
    }
}
