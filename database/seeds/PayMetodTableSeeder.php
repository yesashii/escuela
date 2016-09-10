<?php

use Illuminate\Database\Seeder;
use App\Models\PayMetod;



class PayMetodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(PayMetod::class,'Contado')->create();

        factory(PayMetod::class,'30')->create();

    }
}
