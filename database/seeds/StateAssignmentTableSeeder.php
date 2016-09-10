<?php

use Illuminate\Database\Seeder;

use App\Models\StateAssignment;

class StateAssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(StateAssignment::class,'prestamo')->create();
        factory(StateAssignment::class,'entregado')->create();
        factory(StateAssignment::class,'mantencion')->create();
        factory(StateAssignment::class,'perdido')->create();
    }
}
