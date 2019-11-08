<?php

use Illuminate\Database\Seeder;

use App\Models\AnimalHeat;

class AnimalHeatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heat = AnimalHeat::create([
            'date_animal_heat' => '2019-09-03 19:05:00',
            'date_coverage' => '2019-09-03 19:05:00',
            'date_childbirth' => '2019-09-03 19:05:00',
            'date_childbirth_foreseen' => '2019-09-03 19:05:00',
            'father' => '1 - Aron',
            'childbirth_type' => 'natural',
            'status' => 'pending',
            'responsible_id' => 1,
            'animal_id' => 1
        ]);

        $heat->save();
    }
}
