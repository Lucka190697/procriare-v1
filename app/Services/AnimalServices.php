<?php

namespace App\Services;

//use http\Env\Request;
use App\Http\Requests\CioRequest;
use App\Repositories\CioRepository;

Class AnimalServices
{

    public function managementFather($request, $data)
    {
        if (isset($request->father_id) && (isset($request->father_name))) {
            $data['father'] = $request->father_id . '-' . $request->father_name;
        } else {
            $request->father_id = null;
            $request->father_name = null;
        }
        return $data;
    }

    public function partoPrevisto($request, $data)
    {
        $partoPrevisto = date('Y-m-d', strtotime('+280 days', strtotime($data['date_coverage'])));
        $data['date_childbirth_foreseen'] = $partoPrevisto;

        return $data;
    }

    public function createCio($request, $data)
    {
        $status = 'pending';
        $data['status'] = $status;
        $data = AnimalRepository::created_by($data);

        return $data;
    }
}
