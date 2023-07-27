<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenazahKenal extends Model
{
    use HasFactory;

    protected $table = 'jenazah_kenal';

    protected $fillable = [
        'nama',
        'tempat_ditemukan',
        'tanggal_ditemukan',
        'jenis_kelamin',
        'kewarganegaraan',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'rt',
        'rw',
        'id_makam',
    ];

    public function makam()
    {
        return $this->belongsTo(Makam::class, 'id_makam');
    }
}
