<?php

namespace App\Http\Controllers\Mantenedores;


use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use App\Models\Position;
use App\Models\Department;
use App\Pivots\UserRole;
use App\Pivots\DepartmentUser;
use App\Pivots\PositionUser;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeUsuarios extends Controller
{
    private $datosPorPagina = 5;

    public function listarTodos()
    {
        $usuarios = User::where('active', '=', 1)->paginate( $this->datosPorPagina );

        $numUsuarios = count ( $usuarios );


        return view('mantenedores/listarUsuario', array('usuarios' => $usuarios, 'numUsuarios' => $numUsuarios));
    }


    public function buscarUsuario()
    {
        $nombre         = $_POST['nombre'];
        $apellido       = $_POST['apellido'];
        $email          = $_POST['email'];
        $identificador  = $_POST['identificador'];

        $usuarios = User::where('first_name', 'LIKE', '%'.$nombre.'%')
            ->Where('last_name', 'LIKE', '%'.$apellido.'%')
            ->Where('email', 'LIKE', '%'.$email.'%')
            ->Where('identifier', 'LIKE', '%'.$identificador.'%')
            ->Where('active', '=', 1)
            ->paginate( $this->datosPorPagina );

        $numUsuarios = count ( $usuarios );
        return view('mantenedores/listarUsuario', array('usuarios' => $usuarios, 'numUsuarios' => $numUsuarios));
    }

      /************************/  
     /*  INGRESO DE USARIOS  */
    /************************/
    public function ingresarUsuario()
    {
        $paises = Country::All();

        $roles = Role::All();

        //dd($roles_de_usuario);
        $rol_check = "";

        $positions = Position::All();

        $departments = Department::All();

        return view('mantenedores/ingresarUsuario',
            [
                'paises'            => $paises,
                'roles'             => $roles,
                'positions'         => $positions,
                'departments'       => $departments,
                'rol_check'        => $rol_check
            ]);

    }


    public function cargaCiudadUsuario($id)
    {    
        $ciudades = City::where('country_id', '=', $id)->get();
        return view('mantenedores/trozosHtml/dinamicCiudades', ['ciudades' => $ciudades]);
    }

    public function accionIngresarUsuario(Request $request)
    {
        //dd($_POST);
        $mensaje_de_vacio = ", estaba vacío.";

        $validator = Validator::make($request->all(), [
            'identifier'    => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'city_id'       => 'required',
            'roles'         => 'required',
            'positions'     => 'required',
            'departments'   => 'required',
        ],$messages = [
            'identifier.required'       => 'El campo Rut '.$mensaje_de_vacio,
            'first_name.required'       => 'El campo Nombre '.$mensaje_de_vacio,
            'last_name.required'        => 'El campo Apellido '.$mensaje_de_vacio,
            'email.required'            => 'El campo Email '.$mensaje_de_vacio,
            'city_id.required'          => 'El campo Ciudad '.$mensaje_de_vacio,
            'roles.required'            => 'El campo Roles '.$mensaje_de_vacio,
            'positions.required'        => 'El campo Cargos '.$mensaje_de_vacio,
            'departments.required'      => 'El campo Departamentos '.$mensaje_de_vacio,
        ]);



        if ($validator->fails()) {

            return redirect('ingresarUsuario')
                ->withErrors($validator)
                ->withInput();
        }

        $identifier     = $_POST['identifier'];
        $first_name     = $_POST['first_name'];
        $last_name      = $_POST['last_name'];
        $email          = $_POST['email'];
        $city_id        = $_POST['city_id'];
        $roles          = $_POST['roles'];
        $positions      = $_POST['positions'];
        $departments    = $_POST['departments'];

        $password       = bcrypt('admin');
        $user_control   = $request->user()->identifier;
        $remember_token = str_random(10);
        $active         =  1;


        $user = User::where('identifier', '=', $identifier)->get();

        if(isset($user->identifier))
        {
            $validator = Validator::make($request->all(), [
                'identifier'    => 'unique:users',
            ],$messages = [
                'identifier.unique'   => 'Este Rut, ya existe.',
            ]);

            if ($validator->fails()) {

                return redirect('ingresarUsuario')
                    ->withErrors($validator)
                    ->withInput();
            }
        }  
        
        if (!$this->valida_rut($identifier)) {

            return redirect('ingresarUsuario')
                ->withErrors('El rut ingresado no es válido');
        }       

        // fin validaciones
        
        $user = new User();
        $user->identifier       = $identifier;
        $user->first_name       = $first_name;
        $user->last_name        = $last_name;
        $user->email            = $email;
        $user->city_id          = $city_id;
        $user->user_control     = $user_control;
        $user->password         = $password;
        $user->remember_token   = $remember_token;
        $user->active           = $active;

        $user->save();// va antes para que exista el usuario antes de ingresarlo a los roles

        $user->roles()->attach($roles);
        $user->positions()->attach($positions);
        $user->departments()->attach($departments);



        $request->session()->flash('alert-success', 'El usuario ha sido correctamente guardado.');
        return Redirect::to('ingresarUsuario');
    }
    
    /************************/
    
    public function actualizar($id)
    {
        $paises = Country::All();

        $usuario = User::find($id);
        
        $id_pais = $usuario->cities()->first()->countries()->first()->id;
        
        $id_ciudad = $usuario->cities()->first()->id;
        
        $ciudades_del_pais = City::where('country_id', '=', $id_pais)->get();
        
        $roles = Role::All();
        
        //dd($roles_de_usuario);
        $rol_check = "";

        $positions = Position::All();

        $departments = Department::All();

        return view('mantenedores/actualizarUsuario',
            [
                'usuario'           => $usuario,
                'paises'            => $paises,
                'id_pais'           => $id_pais, 
                'id_ciudad'         => $id_ciudad,
                'ciudades_del_pais' => $ciudades_del_pais,
                'roles'             => $roles,
                'positions'         => $positions,
                'departments'       => $departments, 
                'rol_check'        => $rol_check
            ]);
    }

    /**
     * @return string
     */
    public function accionActializarUsuario($id, Request $request)
    {
       // dd($_POST);

        $mensaje_de_vacio = ", estaba vacío.";

        $validator = Validator::make($request->all(), [
            'identifier'    => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'city_id'       => 'required',
            'roles'         => 'required',
            'positions'     => 'required',
            'departments'   => 'required',
        ],$messages = [
            'identifier.required'       => 'El campo Rut '.$mensaje_de_vacio,
            'first_name.required'       => 'El campo Nombre '.$mensaje_de_vacio,
            'last_name.required'        => 'El campo Apellido '.$mensaje_de_vacio,
            'email.required'            => 'El campo Email '.$mensaje_de_vacio,
            'city_id.required'          => 'El campo Ciudad '.$mensaje_de_vacio,
            'roles.required'            => 'El campo Roles '.$mensaje_de_vacio,
            'positions.required'        => 'El campo Cargos '.$mensaje_de_vacio,
            'departments.required'      => 'El campo Departamentos '.$mensaje_de_vacio,
        ]);



        if ($validator->fails()) {

            return redirect('actualizarUsuario/'.$id.'')
                ->withErrors($validator)
                ->withInput();
        }

        $identifier     = $_POST['identifier'];
        $first_name     = $_POST['first_name'];
        $last_name      = $_POST['last_name'];
        $email          = $_POST['email'];
        $city_id        = $_POST['city_id'];
        $user_control   = $request->user()->identifier;
        $roles          = $_POST['roles'];
        $positions      = $_POST['positions'];
        $departments    = $_POST['departments'];


        $user = User::find($id);

        if($identifier <> $user->identifier) // esto es por que si se intenta actualizar el mismo rut no lo valida
        {
            $validator = Validator::make($request->all(), [
                'identifier'    => 'unique:users',
            ],$messages = [
                'identifier.unique'   => 'Este Rut, ya existe.',
            ]);
        }
        if ($validator->fails()) {

            return redirect('actualizarUsuario/'.$id.'')
                ->withErrors($validator)
                ->withInput();

        }

        /* suprimido mientras el seeder no genere ruts válidos
        if (!$this->valida_rut($identifier)) {

            return redirect('actualizarUsuario/'.$id.'')
                ->withErrors('El rut ingresado no es válido');
        }
        */


        $user->identifier       = $identifier;
        $user->first_name       = $first_name;
        $user->last_name        = $last_name;
        $user->email            = $email;
        $user->city_id          = $city_id;
        $user->user_control     = $user_control;

        UserRole::where('user_id', $user->id)->delete();
        $user->roles()->attach($roles);

        PositionUser::where('user_id', $user->id)->delete();
        $user->positions()->attach($positions);

        DepartmentUser::where('user_id', $user->id)->delete();
        $user->departments()->attach($departments);


        $user->save();
        $request->session()->flash('alert-success', 'El usuario ha sido correctamente actualizado.');
        return Redirect::to('actualizarUsuario/'.$id);
    }

    public function verUsuario($id )
    {

        $usuario = User::find($id);

        return view('mantenedores/verUsuario',
            [
                'usuario'           => $usuario,
            ]);

    }

    public function eliminarUsuario($id)
    {
        $usuario = User::find($id);
        $usuario->active = 0;
        $usuario->save();
        return Redirect::to(route('listarUsuario'));
    }

    public function restablecerContrasenia($id, Request $request)
    {
        $usuario = User::find($id);
        $usuario->password = bcrypt('secret');
        $usuario->save();
        $request->session()->flash('alert-success', 'La contraseña ha sido restablecida correctamente.');
        return Redirect::to('actualizarUsuario/'.$id);
    }



    public function valida_rut($rut)
    {
        $rut = preg_replace('/[^k0-9]/i', '', $rut);
        $dv  = substr($rut, -1);
        $numero = substr($rut, 0, strlen($rut)-1);
        $i = 2;
        $suma = 0;
        foreach(array_reverse(str_split($numero)) as $v)
        {
            if($i==8)
                $i = 2;
            $suma += $v * $i;
            ++$i;
        }
        $dvr = 11 - ($suma % 11);

        if($dvr == 11)
            $dvr = 0;
        if($dvr == 10)
            $dvr = 'K';
        if($dvr == strtoupper($dv))
            return true;
        else
            return false;
    }

}
