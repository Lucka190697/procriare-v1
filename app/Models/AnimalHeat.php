<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnimalHeat extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'animal_id',//id
        'date_animal_heat',//dt_cio
        'date_coverage',//dt_cobertura
        'date_childbirth', //dt_parto
        'date_childbirth_foreseen',//data do parto previsto
        'childbirth_type',//tipo de cobertura
        'father',//pai
        'status',//status
        'responsible_id'//usuario q cadastrou
    ];

    protected $dates = ['deleted_at'];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'animal_id', 'id');
    }

    /*SEARCH*/
    public function search(Array $data)
    {
        $cios = $this->where(function ($query) use ($data) {
            if (isset($data['name']))
                $query->where('name', 'like', '%' . $data['name'] . '%');
        });
        return $cios->get();
    }
}
