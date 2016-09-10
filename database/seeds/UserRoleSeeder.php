<?php

use Illuminate\Database\Seeder;
use App\Pivots\UserRole;
use App\Models\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // se insertan 3 usuarios administradores
        for ($i=1; $i<3; $i++)
        {
            UserRole::create([
                'user_id' => $i,
                'role_id' => 1,
            ]);
        }

        //se les asigna el rol a los demás usuarios

        $id_usuario_maximo = User::max('id');

        for($i=3; $i<($id_usuario_maximo + 1); $i++)
        {
            UserRole::create([
                'user_id' => $i,
                'role_id' => 2,
            ]);
        }

    }
}
