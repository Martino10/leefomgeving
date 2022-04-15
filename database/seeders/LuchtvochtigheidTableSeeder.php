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
            'value' => 30,
        ]);

        DB::table('luchtvochtigheid')->insert([
            'location_id' => 1,
            'value' => 43,
        ]);

        DB::table('luchtvochtigheid')->insert([
            'location_id' => 2,
            'value' => 60,
        ]);
    }
}
