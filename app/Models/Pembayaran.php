<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'jumlah',
        'id_jenazah',
        'id_makam',
    ];

    public function jenazah()
    {
        return $this->belongsTo(Jenazah::class, 'id_jenazah');
    }

    public function makam()
    {
        return $this->belongsTo(Makam::class, 'id_makam');
    }
}
