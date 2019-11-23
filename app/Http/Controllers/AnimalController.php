<?php

namespace App\Http\Controllers;

use App\Models\AnimalHeat;
use App\Models\Farm;
use Illuminate\Http\Request;
use App\Http\Requests\FlockRequest;
use App\Models\Animal;
use App\Services\AnimalRepository;
use App\Services\AnimalStatus;
use Spatie\Permission\Models\Role;
//use const http\Client\Curl\AUTH_ANY;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class AnimalController extends Controller
{
    private $paginate = 10;

    public function index(Request $request, Animal $animal)
    {
        $title = 'Flock';
        $farms = Farm::all();
        foreach ($farms as $farm_item) {
            $farm_item->auth_user;
        }

        $animals = Animal::orderBy('id', 'DESC')->paginate(10);

        return view('animals.flock.index', compact('animals', 'farms', 'farm_item', 'title'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create(Animal $animal)
    {
        $title = 'Create new Animal';
        $animals = $animal->all();

        return view('animals.flock.create', compact('animals', 'title'));
    }

    public function store(FlockRequest $request, AnimalRepository $auxAnimal, Animal $animal, Farm $farm)
    {
        $data = $auxAnimal->createAnimalProfile($request);
        $data = $auxAnimal->created_by($data);
        $data = $auxAnimal->farm_by($data);

        $animal->create($data);
        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Animal cadastrado!',
            'alert-danger', 'Oops! não foi possível cadastrar!');

        return redirect()->route('animals.index');
    }

    public function edit($id)
    {
        $title = 'Edit new Animal';
        $animals = Animal::find($id);

        return view('animals.flock.edit', compact('animals', 'title'));
    }

    public function update(Request $request, Animal $animal, AnimalRepository $auxAnimal, $id)
    {
        $current = Animal::find($id);
        $data = $auxAnimal->updateAnimalProfile($current);
        $data = $auxAnimal->created_by($data);
        $data = $auxAnimal->farm_by($data);

        $animal->update($data);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-success', 'Animal atualizado com sucesso!',
            'alert-danger', 'Oops! não foi possível cadastrar!');

        return redirect()->route('animals.index');
    }

    public function show(Animal $animal, $id)
    {
        $animals = $animal->find($id);
        return view('animals.flock.show', compact('animals'));
    }

    public function destroy(AnimalHeat $animalHeat, Request $request, $id)//$animal_id
    {
        $cio = $animalHeat->find($id);
        dd($cio->id);

        $animal = Animal::find($id);
        Animal::destroy($id);

        $mensagem = $request->mensagem;
        $request->session()->flash('alert-warning', 'Animal Deletado !',
            'alert-danger', 'Oops! não foi possível deletar!');

        return redirect()->route('animals.index')
            ->with('success', 'User deleted successfully');
    }


    public function animalsReports(PDF $pdf)
    {
        $animals = Animal::all();
        $farms = Farm::all();
        foreach ($farms as $farm_item)
            $farm_item->name;

        foreach ($animals as $animal)
            $animal->id;

        $report = $pdf->
        loadView('reports.flock-registers',
            compact('animal', 'animals', 'farm_item', "Total-Animais"))
            ->setPaper('A4', 'landscape')->stream();

        return $report->download('flock-all.pdf');
    }

    public function search(Request $request, Animal $animal)
    {
        $title = 'search';
        $dataForm = $request->all();
        $users = $animal->search($dataForm);

        $farms = Farm::all();
        foreach ($farms as $farm_item) {
            $farm_item->auth_user;
        }

        $animals = Animal::orderBy('id', 'DESC')->paginate(10);

        return view('animals.flock.index', compact(['users'], 'title', 'farms', 'farm_item', 'animals'));
    }
}
