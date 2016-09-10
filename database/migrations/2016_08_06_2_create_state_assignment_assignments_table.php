<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateAssignmentAssignmentsTable extends Migration

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('state_assignment_assignments', function (Blueprint $table){

            $table->increments('id');
            $table->integer('state_assignment_id')->unsigned();
            $table->integer('assignment_id')->unsigned();

            $table->timestamps();

            $table->foreign('state_assignment_id')
                ->references('id')
                ->on('state_assignments')
                ->onDelete('cascade');

            $table->foreign('assignment_id')
                ->references('id')
                ->on('assignments')
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
        Schema::dropIfExists('state_assignment_assignments');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
