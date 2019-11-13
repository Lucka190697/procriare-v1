<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'min:5', 'max:255'],
            'email' => 'required|email', Rule::unique((new User)->getTable())->ignore(auth()->id()),
            'phone' => ['required', 'string', 'max:14', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
        if (!$this->user && in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['email'] .= ",{$this->user}";
            $hasPassword = isset($this->user['password']) && $this->user['password'] !== null;
            $rules['password'] = ($hasPassword)
                ? rules['password']
                : 'sometimes|confirmed';
        }
        return $rules;
    }

    public function messages()
{
    return [
        'name.required' => 'Preencha corretamente o campo Nome',
        'name.string' => 'Campo nome deve ser uma string',
        'name.min:5' => 'Campo nome deve ter no mínomo 5 caracteres',
        'name.max:255' => 'Campo nome deve ter no maximo 255 caracteres',
        'email.required' => 'Insira um endereço de email válido!',
        'email.string' => 'Campo email deve ser uma string',
        'email.email' => 'Insita um email valido',
        'email.max:255' => 'Insita um email valido com no maximo 255 caracteres',
        'email.unique' => 'Oops! esse email já existe em nosso sistema! Insira um novo!',
        'phone.required' => 'Campo telefone é obrigatório!',
        'phone.string' => 'Campo telefone é uma string',
        'phone.min:8' => 'Campo telefone deve ter no mínimo 8 números',
        'phone.max:14' => 'Campo telefone deve ter no maximo 14 caracteres',
        'password.required' => 'As senhas devem ser idênticas',
        'password.min:8' => 'A senha deve ter no mínimo 8 caracteres!',
        'thumbnail.image' => 'Por favor carregue um arquivo de imagem válido com os formatos jpeg,png,jpg,gif,svg',
        'thumbnail.max:2048' => 'Por favor carregue um arquivo de imagem com no máximo 2GB',
    ];
}
}
