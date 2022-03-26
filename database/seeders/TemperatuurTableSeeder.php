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
            'graden_celsius' => 12,
        ]);

        DB::table('temperatuur')->insert([
            'graden_celsius' => 20,
        ]);
    }
}
