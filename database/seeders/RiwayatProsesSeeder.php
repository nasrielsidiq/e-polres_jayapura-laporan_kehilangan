<?php

namespace Database\Seeders;

use App\Models\LaporanKehilangan;
use App\Models\RiwayatProses;
use App\Models\User;
use Illuminate\Database\Seeder;

class RiwayatProsesSeeder extends Seeder
{
    public function run(): void
    {
        $petugas = User::role('petugas')->first();

        foreach (LaporanKehilangan::all() as $laporan) {
            RiwayatProses::factory()->create([
                'id_laporan' => $laporan->id_laporan,
                'id_petugas' => $petugas->id_user,
                'status'     => $laporan->status,
            ]);
        }
    }
}
