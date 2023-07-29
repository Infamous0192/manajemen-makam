<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TumpanganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_pemohon' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'kewarganegaraan' => 'required|string|max:50',
            'agama' => 'required|string|max:50',
            'alamat' => 'required|string',
            'id_jenazah' => 'required|integer|exists:jenazah,id',
        ];
    }
}
