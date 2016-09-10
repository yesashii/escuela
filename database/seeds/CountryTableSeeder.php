<?php

use Illuminate\Database\Seeder;
use \App\Models\Country;
use \App\Models\City;



class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

       // factory(Country::class, 10)->create();
        

        factory(Country::class, 10)->create()->each(function ($country){

            $city = factory(City::class)->make();
            $country->cities()->save($city);

        });
    }
}
