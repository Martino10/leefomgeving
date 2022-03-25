<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuchtvochtigheidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luchtvochtigheid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('luchtvochtigheid');
            $table->dateTime('gemeten_op');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luchtvochtigheid');
    }
}
