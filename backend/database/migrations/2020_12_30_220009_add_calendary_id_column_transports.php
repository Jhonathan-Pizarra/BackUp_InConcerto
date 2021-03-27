<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCalendaryIdColumnTransports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transports', function (Blueprint $table) {
            $table->unsignedBigInteger('calendar_id');
            $table->foreign('calendar_id')->references('id')->on('calendars')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transports', function (Blueprint $table) {
            $table->dropForeign(['calendar_id']);
        });

    }
}
