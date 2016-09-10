<?php

use Illuminate\Database\Seeder;

use App\Models\StateAsset;

class StateAssetTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(StateAsset::class, 'nuevo')->create();
        factory(StateAsset::class, 'usado')->create();
    }
}
