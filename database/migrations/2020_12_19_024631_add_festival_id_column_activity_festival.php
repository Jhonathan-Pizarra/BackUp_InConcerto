<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFestivalIdColumnActivityFestival extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_festivals', function (Blueprint $table) {
            $table->unsignedBigInteger('festival_id');
            $table->foreign('festival_id')->references('id')->on('festivals')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_festivals', function (Blueprint $table) {
            $table->dropForeign(['festival_id']);
        });

    }
}
