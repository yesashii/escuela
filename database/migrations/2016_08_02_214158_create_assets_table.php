<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('assets', function(Blueprint $table){

            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('code');
            $table->integer('supplier_id')->unsigned();
            $table->integer('state_asset_id')->unsigned();
            $table->integer('purchase_id')->unsigned();
            $table->boolean('available')->default(1);

            $table->string('user_control');
            $table->timestamps();

            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers')
                ->onDelete('cascade');

            $table->foreign('state_asset_id')
                ->references('id')
                ->on('state_assets')
                ->onDelete('cascade');

            $table->foreign('purchase_id')
                ->references('id')
                ->on('purchases')
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
        Schema::dropIfExists('assets');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
