<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('levels', function (Blueprint $table){

            $table->increments('id');
            $table->string('name');

            $table->string('user_control');
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('levels');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
