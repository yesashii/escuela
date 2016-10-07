<?php

use Illuminate\Database\Seeder;
use App\Models\Assignment;
use App\Models\User;
use App\Models\Asset;
use App\Models\StateAssignment;




class AssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $num_usuarios   = count( User::all() );
        $num_activos    = count( Asset::all() );
        $num_stados     = count( StateAssignment::all() );

        $maximo     = min($num_usuarios, $num_activos);

        $faker                  = Faker\Factory::create();

        for($i = 1; $i < ($maximo + 1); $i++)
        {
            $asignacion             = new Assignment();

            $user_id                = $i;
            $asset_id               = $i;
            $state_assignment_id    = rand(1, $num_stados);
            $user_control           = 'seeder';


            $asignacion->description            = $faker->paragraph;
            $asignacion->user_id                = $user_id;
            $asignacion->asset_id               = $asset_id;
            $asignacion->state_assignment_id    = $state_assignment_id;
            $asignacion->user_control           = $user_control;

            $asignacion->assigned_at            = date('Y-m-d H:m:s');

            if($state_assignment_id == 2)//entregado
            {
                $asignacion->returned_at        = date('Y-m-d H:m:s');
            }

            $asignacion->save();

            if($state_assignment_id == 1)
            {
                $activo = Asset::find($asset_id);
                $activo->available = 1;
                $activo->save();
            }

        }
    }
}
