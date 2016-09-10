<?php

use Illuminate\Database\Seeder;
use App\Models\Asset;

class AssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Asset::class,100)->create();
    }
}
