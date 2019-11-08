<?php

namespace App\Repositories;

use App\Services\AnimalRepository;
use App\Http\Requests\CioRequest;
use App\Http\Requests;
use App\Models\Animal;

Class CioRepository
{
    public function validationcios(CioRequest $request)
    {
        $data = $request->all();
        dd($data);

        $data = $request->all();
        $status = 'pendente';
        $data['status'] = $status;
        $data = Animal::created_by($data);
        $partoPrevisto = date('Y-m-d', strtotime('+280 days', strtotime($data['dt_cobertura'])));
        $data['dt_parto_previsto'] = $partoPrevisto;

    }

    public function calcularPartoPrevisto()
    {

    }
}
