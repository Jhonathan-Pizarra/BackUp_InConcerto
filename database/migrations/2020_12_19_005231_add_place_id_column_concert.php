<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaceIdColumnConcert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('concerts', function (Blueprint $table) {
            $table->unsignedBigInteger('place_id'); //crea el campo place_id en la tabla concerts
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade'); //establece al campo creado como una FK, es decir este campo place_id hace referencia al id de la tabla places
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('concerts', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
        });

    }
}
