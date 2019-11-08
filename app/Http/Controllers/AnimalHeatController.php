<?php

namespace App\Http\Controllers;

use App\Services\AnimalServices;
use App\Http\Requests\CioRequest;
use App\Models\AnimalHeat;

use App\Repositories\CioRepository;
use App\Models\Animal;
use http\Env\Request;


class AnimalHeatController extends Controller
{
    private $paginate = 10;

    public function index()
    {
        $title = 'Cio';
        $animals = Animal::all();

        $cios = AnimalHeat::paginate($this->paginate);
        return view('animals.flock.cios.index', ['cios' => $cios], compact('title', 'animals'));
    }

    public function create(Animal $animal, $id)
    {
        $title = 'Create new Animal';
        $animals = Animal::find($id);

        return view('animals.flock.cios.create', compact('animals', 'title'));
    }

    public function store(CioRequest $request, AnimalServices $services)
    {
        $data = $request->all();
        $data = $services->managementFather($request, $data);
        $data = $services->partoPrevisto($request, $data);
        $data = $services->createCio($request, $data);

        $cios = AnimalHeat::create($data);

        $request->messages();

        return redirect()->route('cio.index');
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

    public function edit(AnimalHeat $animalHeat, $id)
    {
        $title = 'Edit Cio';
        $cios = AnimalHeat::find($id);
        $animals = Animal::all();

        return view('animals.flock.cios.edit', compact('cios', 'animals', 'title'));
    }

    public function update(CioRequest $cioRequest, Request $request, CioRepository $cioRepository, $id)
    {
        $cios = AnimalHeat::find($id);
        $data = $cioRequest->all();
        AnimalHeat::update($data);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Cio Atualizado !',
            'alert-danger', 'Oops! não foi possível atuaizar!');

        return redirect()->route('cio.index');
    }

    public function destroy(CioRequest $request, $id)
    {
        $cios = Cio::find($id)->all();
        Cio::destroy($cios);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Cio Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!');
    }
}
