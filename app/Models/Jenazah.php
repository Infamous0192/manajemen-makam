<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenazah extends Model
{
    use HasFactory;

    protected $table = 'jenazah';

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_kawin',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'alamat_ktp',
        'alamat_sekarang',
        'agama',
        'pendidikan',
        'pekerjaan',
        'tanggal_meninggal',
        'tanggal_makam',
        'id_pesanan',
        'id_makam',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'id_pesanan');
    }

    public function makam()
    {
        return $this->belongsTo(Makam::class, 'id_makam');
    }
}
