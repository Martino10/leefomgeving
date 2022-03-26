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
            'hertz' => 45,
        ]);

        DB::table('geluid')->insert([
            'location_id' => 1,
            'hertz' => 60,
        ]);
    }
}
