<?php

namespace App\Services;

//use http\Env\Request;
use App\Http\Requests\CioRequest;
use App\Repositories\CioRepository;
use App\Enums\AnimalHeatStatusEnum;
use DateTime;

Class AnimalServices
{

    public function animal_id($request, $data)
    {
        $data['animal_id'] = (int)$data['animal_id'];
        return $data;
    }

    public function managementFather($request, $data)
    {
        if (isset($request->father_id) && (isset($request->father_name))) {
            $data['father'] = $request->father_id . '-' . $request->father_name;
        } elseif (isset($request->father)) {

            $request->father_id = "-";
            $request->father_name = "-";
            $data['father'] = $request->father;
        }
        return $data;
    }

    public function partoPrevisto($request, $data)
    {
        $partoPrevisto = date('Y-m-d', strtotime('+280 days', strtotime($data['date_coverage'])));
        $data['date_childbirth_foreseen'] = $partoPrevisto;
        return $data;
    }

    public function status($request, $data)
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y-m-d');
        $d = strtotime($hoje) - strtotime($data['date_animal_heat']);
        $dias = floor($d / (60 * 60 * 24));
        if ($dias < 21) {
            $data['status'] = 'cleaning'; //AnimalHeatStatusEnum::CLEANING;
        } else {
            $status = 'pending';
            $data['status'] = $status;
        }
        return $data;
    }

    public function updatePartoPrevisto($request, $data)
    {
        if ($data['status'] == 'abortion') {
            $data['date_childbirth_foreseen'] = null;
            $data['date_childbirth'] = null;
            return $data;
        } else {
            $partoPrevisto = date('Y-m-d', strtotime('+280 days', strtotime($data['date_coverage'])));
            $data['date_childbirth_foreseen'] = $partoPrevisto;
            return $data;
        }
    }

    public function create_by($request, $data)
    {
        $data = AnimalRepository::created_by($data);

        return $data;
    }
}
