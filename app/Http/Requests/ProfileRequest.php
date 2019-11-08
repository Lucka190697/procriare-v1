<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|email', Rule::unique((new User)->getTable())->ignore(auth()->id()),
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096|min:1',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Campo Nome é necessário!',
            'name.min:3' => 'Por favor use um nome com no mínimo 3 caracteres',
            'email.required' => 'Campo email é necessário!',
            'email.email' => 'Por favor ensira um campo válido!',
            'thumbnail' => 'Por favor insira uma imagem para compor seu perfil!',
            'thumbnail.mimes:jpeg,png,jpg,gif' => 'Selecione um arquivo de imagem válido no formato jpeg, jpg, png ou gif!',
            'thumbnail.max:2048' => 'Selecione um arquivo com no máximo 2GB!',
            'thumbnail.min:1' => 'Este arquivo é muito pequeno!',
        ];
    }
}
