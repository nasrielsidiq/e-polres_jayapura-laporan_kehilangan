<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\KategoriBarang;
use App\Models\LaporanKehilangan;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $pelapor  = User::role('pelapor')->first();
        $kategori = KategoriBarang::inRandomOrder()->first();

        // Membuat 10 laporan kehilangan dummy
        LaporanKehilangan::factory()
            ->count(10)
            ->create([
                'id_user' => $pelapor->id_user,
                'id_kategori_barang' => $kategori->id_kategori,
            ])
            ->each(function ($laporan) {
                // Tambahkan dummy media (optional)
                // $laporan->addMedia(storage_path('app/sample.jpg'))->toMediaCollection('lampiran');
            });
    }
}
