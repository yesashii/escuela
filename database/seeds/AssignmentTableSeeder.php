<?php

use Illuminate\Database\Seeder;
use App\Models\Assignment;

class AssignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Assignment::class,10)->create();
    }
}
