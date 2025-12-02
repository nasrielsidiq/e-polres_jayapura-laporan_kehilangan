<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, InteractsWithMedia;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'email',
        'no_hp',
        'alamat',
        'password',
        'status'
    ];

    public function getAuthIdentifierName()
    {
        return 'no_hp';
    }

    public function username()
    {
        return 'no_hp';
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** Laporan yang dibuat user */
    public function laporan()
    {
        return $this->hasMany(LaporanKehilangan::class, 'id_user');
    }

    /** Laporan yang diverifikasi user */
    public function verifikasi()
    {
        return $this->hasMany(LaporanKehilangan::class, 'verified_by');
    }

    /** Log aktivitas */
    public function logs()
    {
        return $this->hasMany(LogAktivitas::class, 'id_user');
    }
}
