<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pewaris extends Model
{
    use HasFactory;

    protected $table = 'pewaris';

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'status_waris',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'rt',
        'rw',
        'alamat',
        'no_hp',
        'agama',
        'pendidikan',
        'pekerjaan',
        'id_mendiang',
    ];

    public function mendiang()
    {
        return $this->belongsTo(Jenazah::class, 'id_mendiang');
    }
}
