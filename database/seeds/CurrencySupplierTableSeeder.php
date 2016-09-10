<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Pivots\CurrencySupplier;

class CurrencySupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $id_suppier_maximo = Supplier::max('id');

        for($i=1; $i<($id_suppier_maximo + 1); $i++)
        {
            CurrencySupplier::create([
                'currency_id' => 1,
                'supplier_id' => $i,
            ]);
        }
    }
}
