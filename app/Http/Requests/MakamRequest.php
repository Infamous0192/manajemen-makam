<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MakamRequest extends FormRequest
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
            'baris' => 'required|integer|max:6|min:1',
            'kolom' => 'required|integer|max:6|min:1',
            'id_tpu' => 'required|integer|exists:tpu,id',
        ];
    }
}
