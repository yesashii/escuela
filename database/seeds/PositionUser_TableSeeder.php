<?php

use Illuminate\Database\Seeder;

use App\Models\Position;
use App\Models\User;

class PositionUser_TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $id_position_maximo     = Position::max('id');

        $id_user_maximo         = User::max('id');

        for($i=1; $i<($id_user_maximo + 1); $i++)
        {
            \App\Pivots\PositionUser::create([
                'position_id' => rand(1,$id_position_maximo),
                'user_id' => $i,
            ]);
        }


    }
}
