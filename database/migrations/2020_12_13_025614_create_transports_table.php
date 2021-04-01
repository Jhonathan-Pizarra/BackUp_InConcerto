<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');//La hora siempre es la misma, de 10 a 13, la fecha varía
            $table->integer('capacity');
            $table->float('instruments_capacity'); //capacidad de instrumentos medida en peso Kg
            $table->boolean('disponibility');
            $table->string('licence_plate'); //Es la matrícula del vehículo
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
        Schema::dropIfExists('transports');
    }
}
