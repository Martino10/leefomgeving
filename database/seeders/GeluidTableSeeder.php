<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GeluidTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('geluid')->insert([
            'location_id' => 1,
            'value' => "nee",
        ]);

        DB::table('geluid')->insert([
            'location_id' => 1,
            'value' => "ja",
        ]);

        DB::table('geluid')->insert([
            'location_id' => 2,
            'value' => "nee",
        ]);
    }
}
