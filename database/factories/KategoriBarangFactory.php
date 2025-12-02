<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoriBarang>
 */
class KategoriBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kategori' => $this->faker->randomElement([
                'Dompet', 'Handphone', 'Laptop', 'Surat Penting', 'Motor', 'Perhiasan'
            ]),
            'deskripsi' => $this->faker->sentence(8),
        ];
    }
}
