<?php

namespace App\Http\Controllers\Mantenedores;



use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Models\Departments;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Role;
use App\Models\Position;
use App\Pivots\UserRole;
use App\Pivots\PositionUser;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeUsuarios extends Controller
{
    private $datosPorPagina = 5;

    /*-------------------------------------------------------------------------
    | LISTAR
    |----------------------------------------------------------------------*/
    public function listarTodos()
    {
        $usuarios = User::where('active', '=', 1)
            ->paginate( $this->datosPorPagina );

        $numUsuarios = count( $usuarios );


        return view('mantenedores.users.listar', array(
            'usuarios'      => $usuarios,
            'numUsuarios'   => $numUsuarios,
            'buscar'        => 'false',
        ));
    }


    public function buscarUsuario()
    {
        $nombre         = $_POST['first_name'];
        $apellido       = $_POST['last_name'];
        $email          = $_POST['email'];
        $identificador  = $_POST['identifier'];

        $usuarios = User::where('first_name', 'LIKE', '%'.$nombre.'%')
            ->Where('last_name', 'LIKE', '%'.$apellido.'%')
            ->Where('email', 'LIKE', '%'.$email.'%')
            ->Where('identifier', 'LIKE', '%'.$identificador.'%')
            ->Where('active', '=', 1)
            ->get();
        if( count( $usuarios ) == count( User::all() ) )
        {
            return Redirect::to('listarUsuario');
        }

        $numUsuarios = count ( $usuarios );
        return view('mantenedores.users.listar', array(
            'usuarios'      => $usuarios,
            'numUsuarios'   => $numUsuarios,
            'buscar'        => 'true',
        ));
    }

    /*-------------------------------------------------------------------------
    | ACTUALIZAR
    |----------------------------------------------------------------------*/

    public function actualizar($id)
    {
        $paises             = Country::All();
        $usuario            = User::find($id);
        $id_pais            = $usuario->cities()->first()->countries()->first()->id;
        $id_ciudad          = $usuario->cities()->first()->id;
        $ciudades_del_pais  = City::where('country_id', '=', $id_pais)->get();
        $roles              = Role::All();

        $rol_check = "";

        $positions      = Position::All();
        $departments    = Departments::All();



        return view('mantenedores.users.actualizar',
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

        $validator = Validator::make($request->all(), [
            'identifier'    => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'city_id'       => 'required',
            'roles'         => 'required',
            'positions'     => 'required',
        ],$messages = [
            'identifier.required'       => trans(   'mantusuarios.msj_identifier_requerido' ),
            'first_name.required'       => trans(   'mantusuarios.msj_first_name_requerido' ),
            'last_name.required'        => trans(   'mantusuarios.msj_last_name_requerido'  ),
            'email.required'            => trans(   'mantusuarios.msj_email_requerido'      ),
            'city_id.required'          => trans(   'mantusuarios.msj_city_id_requerido'    ),
            'roles.required'            => trans(   'mantusuarios.msj_roles_requerido'      ),
            'positions.required'        => trans(   'mantusuarios.msj_positions_requerido'  ),
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

        $user = User::find($id);

        if($identifier <> $user->identifier) // esto es por que si se intenta actualizar el mismo rut no lo valida
        {
            $validator = Validator::make($request->all(), [
                'identifier'    => 'unique:users',
            ],$messages = [
                'identifier.unique'   => trans('mantusuarios.msj_identifier_unique'),
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

        $user->save();
        $request->session()->flash('alert-success', trans('mantusuarios.msj_usuario_actualizado_ok'));
        return Redirect::to('actualizarUsuario/'.$id);
    }
    public function restablecerContrasenia($id, Request $request)
    {
        $usuario = User::find($id);
        $usuario->password = bcrypt('secret');
        $usuario->save();
        $request->session()->flash( 'alert-success', trans( 'mantusuarios.msj_reset_pass_ok' ) );
        return Redirect::to('actualizarUsuario/'.$id);
    }


    /*-------------------------------------------------------------------------
    | INSERTAR
    |----------------------------------------------------------------------*/
    
    public function ingresarUsuario()
    {
        $paises = Country::All();
        $roles  = Role::All();
        $rol_check = "";
        $positions = Position::All();

        return view('mantenedores.users.insertar',
            [
                'paises'    => $paises,
                'roles'     => $roles,
                'positions' => $positions,
                'rol_check' => $rol_check
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

        $validator = Validator::make($request->all(), [
            'identifier'    => 'required',
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required',
            'city_id'       => 'required',
            'roles'         => 'required',
            'positions'     => 'required',
        ],$messages = [
            'identifier.required'       => trans('mantusuarios.msj_email_requerido'),
            'first_name.required'       => trans('mantusuarios.msj_first_name_requerido'),
            'last_name.required'        => trans('mantusuarios.msj_last_name_requerido'),
            'email.required'            => trans('mantusuarios.msj_email_requerido'),
            'city_id.required'          => trans('mantusuarios.msj_city_id_requerido'),
            'roles.required'            => trans('mantusuarios.msj_roles_requerido'),
            'positions.required'        => trans('mantusuarios.msj_positions_requerido'),
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

        $password       = bcrypt('secret');
        $user_control   = $request->user()->identifier;
        $remember_token = str_random(10);
        $active         =  1;


        $user = User::where('identifier', '=', $identifier)->get();

        if(isset($user->identifier))
        {
            $validator = Validator::make($request->all(), [
                'identifier'    => 'unique:users',
            ],$messages = [
                'identifier.unique'   => trans('mantusuarios.msj_identifier_unique'),
            ]);

            if ($validator->fails()) {

                return redirect('ingresarUsuario')
                    ->withErrors($validator)
                    ->withInput();
            }
        }  
        
        if (!$this->valida_rut($identifier)) {

            return redirect('ingresarUsuario')
                ->withErrors( trans('mantusuarios.msj_identifier_invalid') );
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



        $request->session()->flash('alert-success', trans('mantusuarios.msj_usuario_ingresado_ok'));
        return Redirect::to('ingresarUsuario');
    }

    /*-------------------------------------------------------------------------
    | VER
    |----------------------------------------------------------------------*/
    public function verUsuario($id )
    {

        $usuario = User::find($id);

        return view('mantenedores.users.ver',
            [
                'usuario'   => $usuario,
            ]);

    }
    /*-------------------------------------------------------------------------
    | ELIMINAR
    |----------------------------------------------------------------------*/
    public function eliminarUsuario($id, Request $request)
    {      
        
        $usuario = User::find($id);
        $mensaje    = trans( 'mantusuarios.msj_eliminado_1').$usuario->first_name.trans( 'mantusuarios.msj_eliminado_2');
        
        $usuario->active = 0;
        $usuario->save();
        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to(route('listarUsuario'));
    }



    /*-------------------------------------------------------------------------
    | EXTRAS
    |----------------------------------------------------------------------*/
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
