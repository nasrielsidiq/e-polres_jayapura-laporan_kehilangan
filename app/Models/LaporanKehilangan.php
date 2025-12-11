<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class LaporanKehilangan extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $primaryKey = 'id_laporan';
    protected $fillable = [
        'nomor_laporan',
        'id_user',
        'tanggal_lapor',
        'id_kategori_barang',
        'nama_barang',
        'deskripsi_barang',
        'lokasi_kehilangan',
        'waktu_kehilangan',
        'kronologi',
        'status',
        'verified_by',
        'verified_at',
        'selesai_at',
        'submission_count',
    ];

    protected $casts = [
        'tanggal_lapor' => 'datetime',
        'waktu_kehilangan' => 'datetime',
        'verified_at' => 'datetime',
        'selesai_at' => 'datetime',
    ];
    /** Pelapor */
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /** Petugas verifikator (tetap memakai model User) */
    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /** Kategori barang */
    public function kategori()
    {
        return $this->belongsTo(KategoriBarang::class, 'id_kategori_barang');
    }

    /** Riwayat proses */
    public function riwayat()
    {
        return $this->hasMany(RiwayatProses::class, 'id_laporan');
    }

    /** Lampiran media */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('lampiran')
            ->useDisk('public')
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'application/pdf',
            ]);
    }
}
