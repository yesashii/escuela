<?php

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //factory(Company::class, 10)->create();

        // esto es debido al rut de la compañia.

       $companies = factory(Company::class, 100)->make();
        foreach ($companies as $company)
        {
            repeat:
            try
            {
                $company->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $company = factory(Company::class)->make();
                goto repeat;
            }
        }



    }
}
