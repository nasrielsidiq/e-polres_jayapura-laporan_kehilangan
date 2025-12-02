<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBarang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kategori';
    protected $fillable = ['nama_kategori', 'deskripsi'];

    public function laporan()
    {
        return $this->hasMany(LaporanKehilangan::class, 'id_kategori_barang');
    }
}
