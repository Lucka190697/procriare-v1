<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PermissionsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(FarmTableSeeder::class);
         $this->call(AnimalTableSeeder::class);
         $this->call(AnimalHeatTableSeeder::class);
    }
}
