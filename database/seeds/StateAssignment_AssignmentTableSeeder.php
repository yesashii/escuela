<?php

use Illuminate\Database\Seeder;
use App\Models\Assignment;
use App\Models\StateAssignment;
use App\Pivots\StateAssignmentAssignment;

class StateAssignment_AssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $id_assignment_maximo       = Assignment::max('id');
        $max_stateAssignment_id     = StateAssignment::max('id');




        for($i=1; $i<($id_assignment_maximo + 1); $i++)
        {            
            $state_assignment_id = rand(1,$max_stateAssignment_id);
            StateAssignmentAssignment::create([
                'state_assignment_id'   => $state_assignment_id,
                'assignment_id'         => $i,
            ]);

            if($state_assignment_id == 2)
            {

                $assets = DB::table('assets')
                    ->join('assignments', 'assignments.asset_id', '=', 'assets.id')
                    ->where('assignments.id', '=', $i)
                    ->select('assets.*')
                    ->get();

                foreach($assets as $asset)
                {
                    DB::table('assets')
                        ->where('id', $asset->id)
                        ->update(['available' => 1]);
                }


            }



        }


    }



}
