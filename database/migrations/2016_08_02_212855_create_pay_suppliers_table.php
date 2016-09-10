<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaySuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pay_suppliers', function(Blueprint $table){

            $table->increments('id');
            $table->integer('pay_metod_id')->unsigned();
            $table->integer('supplier_id')->unsigned();

            $table->timestamps();

            $table->foreign('pay_metod_id')
                ->references('id')
                ->on('pay_metods')
                ->onDelete('cascade');


            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
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
        Schema::dropIfExists('pay_suppliers');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
