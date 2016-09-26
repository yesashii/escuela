<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateLevelDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('levelDepartments', function (Blueprint $table){

            $table->increments('id');
            $table->integer('level');

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
        Schema::dropIfExists('levelDepartments');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
