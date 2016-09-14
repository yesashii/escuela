<?php

namespace App\Http\Controllers\Mantenedores;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Position;

class MantenedorDeCargos extends Controller
{
    private $datosPorPagina = 5;
    public function listarTodos()
    {
        $cargos     = Position::where('active', '=', 1)->paginate( $this->datosPorPagina );
        $numCargos  = count ( $cargos );
        return view('mantenedores/listarCargo', array('cargos' => $cargos, 'numCargos' => $numCargos));
    }

    public function buscarCargo()
    {
        $nombre     = $_POST['nombre'];
        $cargos     = Position::where('name', 'LIKE', '%'.$nombre.'%')->paginate( $this->datosPorPagina );

        $numCargos = count ( $cargos );
        return view('mantenedores/listarCargo', array('cargos' => $cargos, 'numCargos' => $numCargos));
    }


    public function actualizar($id)
    {


        $cargo = Position::find($id);

        return view('mantenedores/actualizarCargo',
            [
                'cargo' => $cargo,
            ]);
    }

    public function accionActualizar(Request $request, $id)
    {
        //dd($_POST);
        $mensaje_de_vacio = ", estaba vacío.";

        $validator = Validator::make($request->all(), [
            'name'    => 'required',
        ],$messages = [
            'name.required'       => 'El campo Nombre '.$mensaje_de_vacio,
        ]);

        if ($validator->fails()) {

            return redirect('actualizarCargo/'.$id.'')
                ->withErrors($validator)
                ->withInput();
        }

        $name           = $_POST['name'];

        $cargo          = Position::find($id);
        $cargo->name    = $name;

        $cargo->save();

       // dd($cargo->name);

        $request->session()->flash('alert-success', 'El Cargo ha sido correctamente actualizado.');
        return Redirect::to('actualizarCargo/'.$id);
    }
    
    
    public function ingresar()
    {
        return view('mantenedores/ingresarCargo');
    }

    public function accionIngresar(Request $request)
    {
        //dd($_POST);
        $mensaje_de_vacio = ", estaba vacío.";

        $validator = Validator::make($request->all(), [
            'name'    => 'required',
        ],$messages = [
            'name.required'       => 'El campo Nombre '.$mensaje_de_vacio,
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

}
