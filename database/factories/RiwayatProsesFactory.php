<?php

namespace Database\Factories;

use App\Models\LaporanKehilangan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RiwayatProses>
 */
class RiwayatProsesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_laporan' => LaporanKehilangan::factory(),
            'id_petugas' => User::factory(),
            'status' => $this->faker->randomElement(['submitted', 'verified', 'processing', 'done', 'rejected']),
            'catatan' => $this->faker->sentence(10),
            'waktu' => now(),
        ];
    }
}
