<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('departments', function (Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('office_id')->unsigned();

            $table->string('user_control');
            $table->timestamps();

            $table->foreign('office_id')
                ->references('id')
                ->on('offices')
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
        Schema::dropIfExists('departments');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
