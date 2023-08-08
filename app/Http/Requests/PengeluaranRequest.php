<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengeluaranRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'jenis' => 'required',
            'jumlah' => 'required|integer',
            'tanggal' => 'required|date',
        ];
    }
}
