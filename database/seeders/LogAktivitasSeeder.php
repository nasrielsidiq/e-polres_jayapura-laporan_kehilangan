<?php

namespace Database\Seeders;

use App\Models\LogAktivitas;
use App\Models\User;
use Illuminate\Database\Seeder;

class LogAktivitasSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::role('pelapor')->first();

        LogAktivitas::factory()->count(5)->create([
            'id_user' => $user->id_user,
        ]);
    }
}
