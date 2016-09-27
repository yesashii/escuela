<?php

use Illuminate\Database\Seeder;

use App\Models\LevelPositions;

class LevelPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // creo niveles del 1 al 10
        for($i=1; $i<11; $i++)
        {
            LevelPositions::create([
                'level'             =>  $i,
                'user_control'      => 'seeder',
            ]);
        }
    }
}
