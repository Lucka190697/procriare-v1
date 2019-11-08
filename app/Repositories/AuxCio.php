<?php

namespace App\Services;

//use http\Env\Request;
use App\Http\Requests\CioRequest;
use App\Services\AnimalRepository;

Class CioRepository
{

    public function managementFather($request, $data)
    {
        if (isset($request->pai_id) && (isset($request->pai_nome))) {
            $data['pai'] = $request->pai_id . '-' . $request->pai_nome;
            $data['pai_id'] = "-";
            $data['pai_name'] = "-";
        }
        else{
            $request->pai_id = '-';
            $request->pai_mae = '-';
        }
        return $data;
    }

    public function partoPrevisto($request, $data)
    {
        $partoPrevisto = date('Y-m-d', strtotime('+280 days', strtotime($data['dt_cobertura'])));
        $data['dt_parto_previsto'] = $partoPrevisto;

        return $data;
    }

    public function createCio($request, $data)
    {
        $status = 'pendente';
        $data['status'] = $status;
        $data = AnimalRepository::created_by($data);

        return $data;
    }
}
