<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JenazahRequest extends FormRequest
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
            'nik' => 'required|string|size:16',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki,perempuan',
            'status_kawin' => 'required|boolean',
            'kewarganegaraan' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kabupaten' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',
            'kelurahan' => 'required|string|max:50',
            'rt' => 'required|string|max:50',
            'rw' => 'required|string|max:50',
            'alamat_ktp' => 'required|string',
            'alamat_sekarang' => 'required|string',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:50',
            'tanggal_meninggal' => 'required|date',
            'tanggal_makam' => 'required|date',
            'id_pesanan' => [
                'required',
                Rule::unique(\App\Models\Jenazah::class, 'id_pesanan')->ignore($this->route('jenazah'), 'id')
            ],
            'id_makam' => [
                'required',
                Rule::unique(\App\Models\Jenazah::class, 'id_makam')->ignore($this->route('jenazah'), 'id')
            ],
        ];
    }
}
