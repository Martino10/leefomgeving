<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LuchtvochtigheidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('luchtvochtigheid')->insert([
            'location_id' => 1,
            'luchtvochtigheid' => 121,
        ]);

        DB::table('luchtvochtigheid')->insert([
            'location_id' => 1,
            'luchtvochtigheid' => 232,
        ]);
    }
}
