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
            'jenis' => 'required|in:baru,perpanjangan',
            'jumlah' => 'required|integer',
            'id_jenazah' => 'required|integer|exists:jenazah,id',
            'id_makam' => 'required|integer|exists:makam,id',
        ];
    }
}