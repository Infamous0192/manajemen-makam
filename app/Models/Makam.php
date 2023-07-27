<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makam extends Model
{
    use HasFactory;

    protected $table = 'makam';

    protected $fillable = [
        'nama',
        'baris',
        'kolom',
        'id_tpu',
    ];

    public function tpu()
    {
        return $this->belongsTo(Tpu::class, 'id_tpu');
    }
}
