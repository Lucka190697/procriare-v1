<?php

namespace App\Services;

use App\Enums\AnimalPhaseEnum;
use App\Http\Requests\CioRequest;
use App\Http\Requests\FlockRequest;
use App\Models\Animal;
use Illuminate\Http\Request;
use DateTime;
use App\Repositories\UserRepository;
use App\Enums\AnimalStatusEnum;
use App\Enums\AnimalSexEnum;
use App\Enums\AnimalClassEnum;

Class AnimalRepository
{

    public function createAnimalProfile(FlockRequest $request)
    {
        $data = $request->all();
        if ($request->thumbnail != null) {
            $profile = $request->file('thumbnail');
            request()->thumbnail->move(public_path('animals/'), $request->name);
            $data = $request->all();
            $data['thumbnail'] = $request->name;
            return $data;
        } else
            return UserRepository::profileDefault($data);
    }

    public function updateAnimalProfile($current)
    {
        $data = $current->thumbnail;
        if ($current->thumbnail != null) {
            $profileName = $current->name;
            request()->thumbnail->move(public_path('animals/'), $profileName);
            $data['thumbnail'] = $profileName;
            return $data;
        }
        if (isset($current->thumbnail))
            $data['thumbnail'] = $current->thumbnail;
        else
            UserRepository::profileDefault($data);
        return $data;
    }

    public function validationDt_nasc(Request $request, $data)
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y/m/d');
        $dt_nascimento = $request->dt_nascimento;
        if ($dt_nascimento > $hoje) {
            return $this->idadeAnimal();
        } else if ($dt_nascimento < $hoje)
            return redirect()->route('flock.index')->with($php_errormsg = "Future_Dt_nascimento");
    }

    public function ageCalculation(Request $request, $data)
    {
        $atual = new DateTime();
        $hoje = $atual->format('Y/m/d');
        $born_date = $request->born_date;
        if (($born_date < $hoje) && ($born_date > 0)) {
            $born_date = $request->born_date;
            $idade = floor((time() - strtotime($born_date)) / 31556926);

            return $idade;
        }
        $erro = 'Data inválida';
        return $erro;
    }

//    public function verifyPhase($request, $data)
//    {
//        $idade = $this->ageCalculation($request, $data);
//
//        if ($data['sex'] == AnimalSexEnum::MALE) {
//            if ($idade <= 0.5)
//                $data['class'] = AnimalClassEnum::HE_CALVES;
//            elseif (($idade > 0.5) && ($idade <= 1.0))
//                $data['class'] = AnimalClassEnum::HE_CALVF;
//        } elseif ($data['sex'] == AnimalSexEnum::FEMEALE) {
//            if ($idade <= 0.5)
//                $data['class'] = AnimalClassEnum::SHE_CALVES;
//            elseif (($idade > 0.5) && ($idade <= 1.0))
//                $data['phase'] = AnimalClassEnum::HEIFER;
//            else
//                return $request->messages();
//        }
//        return $data;
//    }

    public static function created_by($data)
    {
        $data['responsible_id'] = auth()->user()->id;

        return $data;
    }

    public function farm_by($data)
    {
        $data['farm_id'] = auth()->user()->farm_id;

        return $data;
    }
}
