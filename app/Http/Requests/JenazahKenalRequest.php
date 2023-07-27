<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JenazahKenalRequest extends FormRequest
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
            'nama' => 'required|string|max:50',
            'tempat_ditemukan' => 'required|string|max:50',
            'tanggal_ditemukan' => 'required|date',
            'jenis_kelamin' => 'required|in:laki,perempuan',
            'kewarganegaraan' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kabupaten' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',
            'kelurahan' => 'required|string|max:50',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'id_makam' => 'required|integer|exists:makam,id|unique:jenazah_kenal',
        ];
    }
}
