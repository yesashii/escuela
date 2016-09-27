<?php

use Illuminate\Database\Seeder;

use App\Models\Departments;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Departments::create([
            'name'                  => 'Gerencia',
            'levelDepartments_id'   => '1',
            'user_control'          => 'seeder',
        ]);

        Departments::create([
            'name'                  => 'Informática',
            'levelDepartments_id'   => '2',
            'user_control'          => 'seeder',
        ]);
    }
}
