<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

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
        'province_code',
        'city_code',
        'district_code',
        'village_code',
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

    /** Address Relations */
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_code', 'code');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_code', 'code');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_code', 'code');
    }

    public function getFullAddressAttribute()
    {
        $parts = [];
        if ($this->alamat) $parts[] = $this->alamat;
        if ($this->village) $parts[] = $this->village->name;
        if ($this->district) $parts[] = $this->district->name;
        if ($this->city) $parts[] = $this->city->name;
        if ($this->province) $parts[] = $this->province->name;
        
        return implode(', ', $parts);
    }
}
