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
        'kewarganegaraan',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'rt',
        'rw',
        'alamat_ktp',
        'alamat_sekarang',
        'status_tinggal',
        'agama',
        'pendidikan',
        'pekerjaan',
        'tanggal_meninggal',
        'tanggal_makam',
        'id_pesanan',
        'id_makam',
        'file_ktp',
        'file_kk',
        'file_akta',
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
