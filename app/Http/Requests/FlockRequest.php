<?php

namespace App\Http\Requests;

use http\Env\Request;
use Illuminate\Foundation\Http\FormRequest;
use DateTime;

class FlockRequest extends FormRequest
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

    public function rules()
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y-m-d');
        return [
            'code' => 'required|unique:animals|numeric',
            'name' => 'required|unique:animals|string|min:4|max:255',
            'born_date' => 'required|after_or_equal:2010/01/01|before_or_equal:' . $hoje,
            'sex' => 'required',
            'class' => 'required',
            'status' => 'nullable',
            'breed' => 'nullable',
            'thumbnail' => 'nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048', 'min:1',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'O id é necessário ser preenchido corretamente com números somente!',
            'code.unique' => 'O id é o número de identificação do animal e deve ser único!',
            'name.required' => 'O nome é necessário! Se houve alum erro, pode ser que você tenha '
                . 'digitado um nome que já exista cadastrado no sistema',
            'name.min:4' => 'Use um nome com no mínimo 4 caracteres',
            'name.max:255' => 'Use um nome com no máximo 225 caracteres',
            'born_date.required' => 'A data de Nascimento é necessária!'
                . 'Não use datas muito antigas como anteriores a 2001 e nem datas posteriores a de hoje',
            'born_date.after_or_equal:2010/01/01' => 'Não use datas anteriores a 01/01/2010',
            'sex.required' => 'Campo sexo é necessário!',
            'class.required' => 'Campo classificação é necessário!',
            'breed.required' => 'Campo raca é necessário!',
            'status.required' => 'Campo raca é necessário!',
            'thumbnail.image' => 'Selecione um arquivo de imagem válido no formato jpeg, jpg, png ou gif!',
            'thumbnail.mimes:jpeg,png,jpg,gif' => 'Selecione um arquivo de imagem válido no formato jpeg, jpg, png ou gif!',
            'thumbnail.max:2048' => 'Selecione um arquivo com no máximo 2GB!',
            'thumbnail.min:1' => 'Este arquivo é muito pequeno!',
        ];
    }
}
