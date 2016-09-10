<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Supplier::class, 50)->create();
    }
}
