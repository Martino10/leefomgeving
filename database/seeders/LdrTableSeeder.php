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
            'value' => 700,
        ]);

        DB::table('ldr')->insert([
            'location_id' => 1,
            'value' => 420,
        ]);

        DB::table('ldr')->insert([
            'location_id' => 2,
            'value' => 340,
        ]);
    }
}
