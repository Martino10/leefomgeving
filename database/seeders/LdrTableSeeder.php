<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LdrTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ldr')->insert([
            'location_id' => 1,
            'value' => 50,
        ]);

        DB::table('ldr')->insert([
            'location_id' => 1,
            'value' => 20,
        ]);

        DB::table('ldr')->insert([
            'location_id' => 2,
            'value' => 80,
        ]);
    }
}
