<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPlaceIdColumnFeedings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('feedings', function (Blueprint $table) {
            $table->unsignedBigInteger('place_id');
            $table->foreign('place_id')->references('id')->on('feeding_places')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feedings', function (Blueprint $table) {
            $table->dropForeign(['place_id']);
        });

    }
}
