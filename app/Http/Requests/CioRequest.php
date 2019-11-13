<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DateTime;

class CioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y-m-d');
        $validator = [
            'animal_id' => 'required',
            'date_animal_heat' => 'required|before_or_equal:'.$hoje,
            'date_coverage' => 'required|after_or_equal:2010/01/01|after_or_equal:date_animal_heat',
            'childbirth_type' => 'required',
            'status' => 'nullable',
            'father' => 'nullable',
            'father_id' => 'nullable|integer',
            'father_name' => 'nullable',
        ];

        return $validator;
    }

    public function messages()
    {
        return [
            'animal_id:required' => 'Campo ID é necessário',
            'date_animal_heat:required' => 'O campo Data do cio é necessário,' .
                'verifique também a se a data que você colocou não é poterior a de hoje',
            'date_coverage:after_or_equal:2010/01/01' => 'Por favor, selecione uma data posterior a 01/01/2010',
            'date_coverage:after_or_equal:date_animal_heat' => 'Não selecione uma data posterior a hoje',
            'childbirth_type:required' => 'Selecione o tipo da cobertura',
            'father:required' => 'O campo Pai da Cobertura é necessário',
            'father_id:required' => 'O campo ID do Touro é necessário',
            'father_name:required' => 'O campo Nome do Touro é necessário',
        ];
    }
}
