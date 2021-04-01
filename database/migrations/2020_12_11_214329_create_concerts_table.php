<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('dateConcert');//La hora siempre es la misma, de 10 a 13, la fecha varía
            $table->string('name');
            $table->time('duration');
            $table->boolean('free');
            $table->boolean('insitu'); //Es como un permiso de si o no
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concerts');
    }
}
