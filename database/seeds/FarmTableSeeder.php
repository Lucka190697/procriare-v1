<?php

use Illuminate\Database\Seeder;

use App\Models\Farm;

class FarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $farm = Farm::firstOrNew([
            'name' => 'Fazenda 01'
        ]);

        $farm->fill([
            'id' => '01',
            'name' => 'Fazenda 01',
            'cep' => '85155-000',
            'city' => 'Inácio Martins',
            'state' => 'PR',
            'auth_user' => '01'
        ]);

        $farm->save();
    }
}
