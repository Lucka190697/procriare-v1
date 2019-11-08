<?php

namespace App\Repositories;

use App\Models\Animal;

Class AnimalStatusRepository
{
    public function status($status, $id)
    {
        dd('metodo status do Animal Status Class');
    }

    public function statusMorte($data)
    {
        $status = "Morto";
        $data['status'] = $status;
        return $data;
    }

    public function statusVendido($data)
    {
        $status = "Vendido";
        $data['status'] = $status;
        Animal::update($data);
        return $data;
    }

    public function statusDesativado($data)
    {
        $status = "Desativado";
        $data['status'] = $status;
        return $data;
    }
}
