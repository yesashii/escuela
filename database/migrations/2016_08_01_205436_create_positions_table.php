<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('positions', function (Blueprint $table){

            $table->increments('id');
            $table->string('name');


            $table->integer('department_id')->unsigned();
            $table->integer('levelpositions_id')->unsigned();

            $table->string('user_control');
            $table->timestamps();


            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');

            $table->foreign('levelpositions_id')
                ->references('id')
                ->on('levelPositions')
                ->onDelete('cascade');

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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('positions');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
