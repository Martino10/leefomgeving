<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class QualityscoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('qualityscore')->insert([
            'location_id' => 1,
            'value' => 90,
        ]);

        DB::table('qualityscore')->insert([
            'location_id' => 1,
            'value' => 77,
        ]);

        DB::table('qualityscore')->insert([
            'location_id' => 2,
            'value' => 59,
        ]);
    }
}
