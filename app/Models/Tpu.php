<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tpu extends Model
{
    protected $table = 'tpu';

    protected $fillable = [
        'nama',
        'alamat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
    ];
}
