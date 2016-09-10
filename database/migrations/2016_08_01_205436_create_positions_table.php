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
            $table->integer('level_id')->unsigned();

            $table->string('user_control');
            $table->timestamps();

            $table->foreign('level_id')
                ->references('id')
                ->on('levels')
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
