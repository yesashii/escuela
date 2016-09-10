<?php

use Illuminate\Database\Seeder;
use App\Models\Supplier;
use App\Pivots\PaySuppliers;
use App\Models\PayMetod;

class PaySuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $id_Suppier_maximo  = Supplier::max('id');

        $id_payMetod_maximo = PayMetod::max('id');

        for($i=1; $i<($id_Suppier_maximo + 1); $i++)
        {
            PaySuppliers::create([
                'pay_metod_id' => rand(1,$id_payMetod_maximo),
                'supplier_id' => $i,
            ]);
        }
    }
}
