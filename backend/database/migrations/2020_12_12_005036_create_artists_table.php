<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ciOrPassport');
            $table->string('artisticOrGroupName'); //El nombre artisitico puede ser como de un grupo: Guns N Roses o solista como Michael Jackson
            $table->string('name');
            $table->string('lastName');
            $table->string('nationality');
            $table->string('mail');
            $table->string('phone');
            $table->boolean('passage'); //El pasaje si fue comprado o no por InConcerto
            $table->string('instruments');
            $table->string('emergencyPhone');
            $table->string('emergencyMail');
            $table->string('foodGroup');
            $table->text('observation');
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
        Schema::dropIfExists('artists');
    }
}
