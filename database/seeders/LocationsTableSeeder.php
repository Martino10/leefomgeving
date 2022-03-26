<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'id' => 1,
            'naam' => "Le Carrefour",
            'plaats' => "Leiden",
            'adres' => "Dellaertweg 1",
            'foto' => "/img/lecarrefour.jpg",
        ]);

        DB::table('locations')->insert([
            'id' => 2,
            'naam' => "Thuis",
            'plaats' => "Woubrugge",
            'adres' => "Beatrixlaan 42",
            'foto' => "/img/thuis.jpg",
        ]);
    }
}
