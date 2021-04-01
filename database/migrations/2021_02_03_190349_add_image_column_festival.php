<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageColumnFestival extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Añade la clumna image en festivals
        Schema::table('festivals', function (Blueprint $table) {
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Elimina esa columna de la tabla
        Schema::table('festivals', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
