<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tumpangan extends Model
{
    use HasFactory;

    protected $table = 'tumpangan';

    protected $fillable = [
        'nama_pemohon',
        'tempat_lahir',
        'tanggal_lahir',
        'kewarganegaraan',
        'agama',
        'alamat',
        'id_jenazah',
    ];

    public function jenazah()
    {
        return $this->belongsTo(Jenazah::class, 'id_jenazah');
    }
}
