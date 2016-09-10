<?php

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\User;
use App\Pivots\DepartmentUser;

class Department_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $id_users_maximo  = User::max('id');

        $id_departments_maximo = Department::max('id');

        for($i=1; $i<($id_users_maximo + 1); $i++)
        {
            DepartmentUser::create([
                'department_id' => rand(1,$id_departments_maximo),
                'user_id' => $i,
            ]);
        }
    }
}
