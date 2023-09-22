<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PemeliharaanRequest extends FormRequest
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
            'hari' => 'required',
            'jam' => 'required',
            'tindakan' => 'required',
            'tindakan' => 'required',
            'id_pekerja' => 'required|exists:pekerja,id',
        ];
    }
}
