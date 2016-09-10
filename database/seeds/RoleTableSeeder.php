<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        //
        factory(Role::class, 'admin')->create();
        factory(Role::class, 'visitor')->create();


        /*
        factory(Role::class, 2)->create()->each(function ($role){
            $users = factory(User::class, 2)->make();
            foreach ($users as $user)
            {
                repeat:
                try
                {
                    $role->users()->save($user);
                } catch (\Illuminate\Database\QueryException $e) {
                    $user = factory(User::class)->make();
                        goto repeat;
                }
            }

        });
*/



       // factory(Role::class, 'visitor')->create();
    }
}
