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
            'identifier'        => '1-9',
            'first_name'        => 'Usuario',
            'last_name'         =>  'Prueba',
            'city_id'           =>  1,
            'user_control'      => 'seeder',
            'email'             => 'user@prueba.dev',
            'password'          => bcrypt('secret'),
            'remember_token'    => str_random(10),
            'active'            => 1,
        ]);
        // usuario para iniciar sesión 02
        User::create([
            'identifier'        => '17351592-8',
            'first_name'        => 'Ninoska Isbania',
            'last_name'         =>  'Garcés Jara',
            'city_id'           =>  2,
            'user_control'      => 'seeder',
            'email'             => 'ngarces@delpa.cl',
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
