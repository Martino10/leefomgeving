<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gas')->insert([
            'concentratie' => 312,
        ]);

        DB::table('gas')->insert([
            'concentratie' => 412,
        ]);
    }
}