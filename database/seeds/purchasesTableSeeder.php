<?php

use Illuminate\Database\Seeder;
use App\Models\Purchase;

class purchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Purchase::class,20)->create();
    }
}
