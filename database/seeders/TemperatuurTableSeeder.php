<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class TemperatuurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temperatuur')->insert([
            'location_id' => 1,
            'value' => 22,
        ]);

        DB::table('temperatuur')->insert([
            'location_id' => 1,
            'value' => 20,
        ]);

        DB::table('temperatuur')->insert([
            'location_id' => 2,
            'value' => 15,
        ]);
    }
}
