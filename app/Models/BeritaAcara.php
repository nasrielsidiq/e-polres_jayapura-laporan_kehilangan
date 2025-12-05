<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BeritaAcara extends Model
{
    protected $fillable = [
        'nomor_ba',
        'id_laporan',
        'created_by',
        'keterangan'
    ];

    public function laporan()
    {
        return $this->belongsTo(LaporanKehilangan::class, 'id_laporan', 'id_laporan');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by', 'id_user');
    }
}