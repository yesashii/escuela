<?php

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Level::class,'1')->create();
        factory(Level::class,'2')->create();
        factory(Level::class,'3')->create();
    }
}
