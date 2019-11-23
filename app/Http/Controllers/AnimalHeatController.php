<?php

namespace App\Http\Controllers;

use App\Models\Farm;
use App\Services\AnimalServices;
use App\Http\Requests\CioRequest;
use App\Models\AnimalHeat;
use App\Repositories\CioRepository;
use App\Models\Animal;
use Illuminate\Http\Request;


class AnimalHeatController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $title = 'Cio';
        $animals = Animal::all();
        foreach ($animals as $animal)
            $animal->farm_id;
        $farms = Farm::all();
        foreach ($farms as $farm)
            $farm->auth_user = (int)$farm->auth_user;

        $cios = AnimalHeat::paginate($this->paginate);
        return view('animals.flock.cios.index', ['cios' => $cios],
            compact('title', 'animals', 'animal', 'farm'));
    }

    public function create(Animal $animal, $id)
    {
        $title = 'Create new Animal';
        $animals = Animal::find($id);
        $flock = Animal::all();

        return view('animals.flock.cios.create', compact('animals', 'flock', 'title'));
    }

    public function store(CioRequest $request, AnimalHeat $animalHeat, AnimalServices $services)
    {
        $title = 'create-cio';
        $data = $request->all();
        $data = $services->managementFather($request, $data);
        $data = $services->status($request, $data);
        $data = $services->partoPrevisto($request, $data);
        $data = $services->create_by($request, $data);

//        $cios = AnimalHeat::create($data);
        $animalHeat->create($data);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Cio Atualizado !',
            'alert-danger', 'Oops! não foi possível atuaizar!');

        return redirect()->route('cio.index')->with($title);
    }

    public function edit(AnimalHeat $animalHeat, $id)
    {
        $title = 'Edit Cio';
        $cios = AnimalHeat::find($id);
        $animals = Animal::all();

        return view('animals.flock.cios.edit', compact('cios', 'animals', 'title'));
    }

    public function update(CioRequest $cioRequest, AnimalServices $animalServices,
                          AnimalHeat $animalHeat, $id)
    {
        $title = 'edit-cio';
        $cios = AnimalHeat::find($id);
        $data = $cioRequest->all();
        $data = $animalServices->updatePartoPrevisto($cioRequest, $data);
        $data = $animalServices->status($cioRequest, $data);
        $data = $animalServices->create_by($cioRequest, $data);
//        dd($data);
        $data = $animalServices->partoSucesso($cioRequest, $data);

        $cios->update($data);

        $mensagem = $cioRequest->mensagem;
        $cioRequest->session()->flash('alert-primary', 'Cio Atualizado !',
            'alert-danger', 'Oops! não foi possível atuaizar!');

        return redirect()->route('cio.index')->with($title);
    }

    public function show($id)
    {
        $title = 'Show Cio Details';
        $cios = AnimalHeat::find($id)->all();
        $animals = Animal::find($id)->all();
        foreach ($cios as $cio)
            $cio->id;
        foreach ($animals as $animal)
            $animal->profile;
        return view('animals.flock.cios.show', compact('cio', 'title', 'animal'));
    }

    public function search(Request $request, Animal $animal)
    {
        $title = 'search';
        $dataForm = $request->all();
        $animals = $animal->search($dataForm);

        $cios = AnimalHeat::paginate($this->paginate);

        return view('animals.flock.cios.index', compact(['users'], 'title', 'cios', 'animals'));
    }
}
