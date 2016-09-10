<?php

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Técnica hecha debido a que no hay certeza que faker me genere un dato único,
         * por tanto si se cae la base de datos, se atrapa el error.
         */

        // usuario para iniciar sesión 01
        User::create([
            'identifier'        => '15370707-3',
            'first_name'        => 'Luis Emmanuel',
            'last_name'         =>  'Herrera Gárnica',
            'city_id'           =>  1,
            'user_control'      => 'seeder',
            'email'             => 'lherrera@gignosoft.cl',
            'password'          => bcrypt('secret'),
            'remember_token'    => str_random(10),
            'active'            => 1,
        ]);

        $users = factory(User::class, 10)->make();
        foreach ($users as $user)
        {
            repeat:
            try
            {
                $user->save();
            } catch (\Illuminate\Database\QueryException $e) {
                $user = factory(User::class)->make();
                goto repeat;
            }
        }
    

    }
}
