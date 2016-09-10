<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PruebaLlenadoDeAssignacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('prueba_llenado_de_asignacion', function (Blueprint $table){

            $table->increments('id');
            $table->integer('asset_id');

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
        //
        //
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('prueba_llenado_de_asignacion');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
