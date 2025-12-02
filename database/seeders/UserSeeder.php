<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        $admin = User::factory()->create([
            'nama_lengkap' => 'Admin Sistem',
            'no_hp'        => '081234567890',
            'email'        => 'admin@example.com',
        ]);
        $admin->assignRole('admin');

        // Petugas
        $petugas = User::factory()->create([
            'nama_lengkap' => 'Petugas Pusat',
            'no_hp'        => '081234567891',
            'email'        => 'petugas@example.com',
        ]);
        $petugas->assignRole('petugas');

        // Pelapor
        $pelapor = User::factory()->create([
            'nama_lengkap' => 'User Pelapor',
            'no_hp'        => '081234567892',
            'email'        => 'pelapor@example.com',
        ]);
        $pelapor->assignRole('pelapor');
    }
}
