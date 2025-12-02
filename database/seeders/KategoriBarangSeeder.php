<?php

namespace Database\Seeders;

use App\Models\KategoriBarang;
use Illuminate\Database\Seeder;

class KategoriBarangSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
            'Dompet', 'Handphone', 'Laptop', 'Perhiasan',
            'Surat Penting', 'Kendaraan', 'Dokumen'
        ];

        foreach ($kategori as $item) {
            KategoriBarang::firstOrCreate([
                'nama_kategori' => $item,
            ]);
        }
    }
}
