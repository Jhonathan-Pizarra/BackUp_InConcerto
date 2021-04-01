<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcertResourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('concert_resource', function (Blueprint $table) {
            $table->unsignedBigInteger('concert_id');
            $table->foreign('concert_id')->references('id')->on('concerts')->onDelete('restrict');
            $table->unsignedBigInteger('resource_id');
            $table->foreign('resource_id')->references('id')->on('resources')->onDelete('restrict');
            //$table->boolean('state');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('concert_resource');
        Schema::enableForeignKeyConstraints();
    }
}
