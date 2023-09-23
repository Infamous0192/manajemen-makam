<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|max:50',
            'jenis' => 'required|in:baru,perpanjangan',
            'jumlah' => 'required|integer',
            'domisili' => 'required',
            'jasa_gali' => 'required',
            'jasa_rawat' => 'required',
            'id_jenazah' => 'required|integer|exists:jenazah,id',
            // 'id_makam' => 'required|integer|exists:makam,id',
        ];
    }
}
