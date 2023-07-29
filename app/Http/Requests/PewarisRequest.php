<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PewarisRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama' => 'required|string|max:50',
            'nik' => 'required|string|size:16',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki,perempuan',
            'status_waris' => 'required|in:ayah,ibu,anak,paman,bibi',
            'kewarganegaraan' => 'required|string|max:50',
            'provinsi' => 'required|string|max:50',
            'kabupaten' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',
            'kelurahan' => 'required|string|max:50',
            'rt' => 'required|integer',
            'rw' => 'required|integer',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:50',
            'agama' => 'required|string|max:50',
            'pendidikan' => 'required|string|max:50',
            'pekerjaan' => 'required|string|max:50',
            'id_mendiang' => 'required|integer|exists:jenazah,id',
        ];
    }
}
