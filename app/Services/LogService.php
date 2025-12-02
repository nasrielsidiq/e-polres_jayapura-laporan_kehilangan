<?php
namespace App\Services;

use App\Models\LogAktivitas;

class LogService
{
    public function log($id_user, $aktivitas, $ip = null)
    {
        LogAktivitas::create([
            'id_user' => $id_user,
            'aktivitas' => $aktivitas,
            'waktu' => now(),
            'ip_address' => $ip ?? request()->ip(),
        ]);
    }
}
