<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeluidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geluid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('location_id')->default(1);
            $table->string('value'); # Ja of Nee, gebaseerd op true/false waarde
            $table->timestamp('gemeten_op')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geluid');
    }
}
