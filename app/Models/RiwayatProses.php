<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatProses extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_riwayat';
    protected $fillable = [
        'id_laporan',
        'id_petugas',
        'status',
        'catatan',
        'waktu'
    ];

    public $timestamps = false;

    public function laporan()
    {
        return $this->belongsTo(LaporanKehilangan::class, 'id_laporan');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }
}
