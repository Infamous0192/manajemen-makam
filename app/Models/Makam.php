<?php

namespace App\Models;

use App\Http\Requests\MakamRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function isAvailable(MakamRequest $request, $id = null)
    {
        $query = DB::table('makam')
            ->where('id_tpu', $request->id_tpu)
            ->where('nama', $request->nama)
            ->where('baris', $request->baris)
            ->where('kolom', $request->kolom);

        if ($id != null) {
            $query->whereNot('id', $id);
        }

        return $query->count() == 0;
    }
}
