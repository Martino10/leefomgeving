<?php

namespace Database\Seeders;

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
        $this->call([
            GeluidTableSeeder::class,
            TemperatuurTableSeeder::class,
            LuchtvochtigheidTableSeeder::class,
            GasTableSeeder::class,
            LdrTableSeeder::class,
            LocationsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
