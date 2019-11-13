<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FarmRequest extends FormRequest
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
            'name' => 'required|unique:farms|string|min:5|max:255',
            'cep' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'name:required' => 'Campo Nome é necessário',
            'name:unique' => 'O nome já existe!',
            'name:min:5' => 'Esse nome é muito pequeno! Use no mínimo 5 caracteres!',
            'name:max:255' => 'Nome muito grande! Use no máximo 255 caracteres!',
            'cep:required' => 'Campo Cep é Necessário',
            'city:required' => 'Campo Cep é Necessário',
            'state:required' => 'Campo Cep é Necessário',
        ];
    }
}
