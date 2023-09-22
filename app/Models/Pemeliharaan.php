<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeliharaan extends Model
{
    use HasFactory;

    protected $table    = 'pemeliharaan';
    public $timestamps  = true;
    protected $fillable = [
        'hari',
        'jam',
        'tindakan',
        'id_pekerja',
    ];

    public function pekerja()
    {
        return $this->belongsTo(Pekerja::class, 'id_pekerja');
    }
}
