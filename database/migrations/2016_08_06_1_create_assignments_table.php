<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('assignments', function (Blueprint $table){

            $table->increments('id');
            $table->string('description');

            $table->integer('user_id')->unsigned();
            $table->integer('asset_id')->unsigned();

            $table->string('user_control');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('asset_id')
                ->references('id')
                ->on('assets')
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
        Schema::dropIfExists('assignments');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
