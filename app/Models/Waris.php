<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waris extends Model
{
    use HasFactory;

    protected $table    = 'waris';
    public $timestamps  = false;
    protected $fillable = ['id_mendiang', 'status_waris', 'nik_waris', 'nama_waris', 'tempat_waris', 'tanggal_waris', 'kelamin', 'kecamatan', 'kabupaten', 'provinsi', 'agama', 'negara', 'pekerjaan', 'no_hp'];

    public function mampu()
    {
        return $this->belongsTo(Mampu::class, 'id_mendiang', 'id');
    }
}
