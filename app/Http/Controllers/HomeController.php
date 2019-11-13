<?php

namespace App\Http\Controllers;

use App\Models\AnimalHeat;
use App\Models\Animal;
use App\Models\Farm;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(AnimalHeat $animalHeat, Animal $animal)
    {
        $cios = $animalHeat->all();
        $animals = $animal->all();
        $farms = Farm::all();
        foreach ($farms as $farm_item)
            $farm_item->auth_user;
        foreach ($animals as $item_animal)
            $item_animal->farm_id;
        return view('home', compact('cios', 'item_animal', 'farm_item'));
    }
}
