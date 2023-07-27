<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kenal extends Model
{
    use HasFactory;

    protected $table    = 'kenal';
    public $timestamps  = false;
    protected $fillable = [
        'nama_jenazah',
        'kelamin',
        'alamat_temu',
        'tanggal_temu',
        'desa_temu',
        'kabupaten_temu',
        'provinsi_temu',
        'negara_temu',
        'rt_temu',
        'rw_temu'
    ];
}
