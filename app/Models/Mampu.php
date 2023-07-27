<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mampu extends Model
{
    use HasFactory;

    protected $table    = 'mampu';
    public $timestamps  = false;
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_ktp',
        'alamat_now',
        'desa',
        'kecamatan',
        'kota',
        'provinsi',
        'negara',
        'rw',
        'rt',
        'agama',
        'pendidikan',
        'pekerjaan',
        'kawin',
        'tinggal',
        'tempat_dimakamkan',
        'tanggal_meninggal',
        'tanggal_dimakamkan'
    ];

    public function waris()
    {
        return $this->hasOne(Waris::class, 'id_mendiang');
    }
}
