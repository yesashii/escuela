<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('purchases', function(Blueprint $table){

            $table->increments('id');
            $table->dateTime('date');
            $table->integer('quantity');
            $table->double('unit_price');
            $table->double('total');

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
        Schema::dropIfExists('purchases');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
