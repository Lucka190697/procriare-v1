<?php

use Illuminate\Database\Seeder;

use App\Models\Animal;

class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animal = Animal::firstOrNew([
            'code' => '123456'
        ]);

        $animal->fill([
            'code' => '123456',
            'name' => 'Animal 01',
            'born_date' => '2019-09-03 19:05:00',
            'sex' => 'male',
            'class' => 'bull-castrated',
            'breed' => 'jersey',
            'status' => 'alive',
            'farm_id' => 1,
            'responsible_id' => 1
        ]);

        $animal->save();
    }
}
