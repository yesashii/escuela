<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Departments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Departments', function (Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('description');

            $table->integer('levelDepartments_id')->unsigned();

            $table->string('user_control');

            $table->timestamps();

            $table->foreign('levelDepartments_id')
                ->references('id')
                ->on('levelDepartments')
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
    }
}
