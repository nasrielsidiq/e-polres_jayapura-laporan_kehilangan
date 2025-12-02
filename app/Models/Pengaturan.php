<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Pengaturan extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'key', 'value'
    ];
}
