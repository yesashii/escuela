<?php

namespace App\Http\Controllers\Mantenedores;

use App\Models\Departments;
use App\Models\LevelPositions;
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
        $cargos     = Position::paginate($this->datosPorPagina);
        $numCargos  = count($cargos);
        return view('mantenedores/listarCargo', array('cargos' => $cargos, 'numCargos' => $numCargos));
    }

    public function buscarCargo()
    {
        $nombre = $_POST['nombre'];
        $cargos = Position::where('name', 'LIKE', '%' . $nombre . '%')->paginate($this->datosPorPagina);
        
        

        $numCargos = count($cargos);
        return view('mantenedores/listarCargo', array('cargos' => $cargos, 'numCargos' => $numCargos));
    }


    public function actualizar($id)
    {


        $cargo          = Position::find($id);
        $niveles        = LevelPositions::all();
        $departments    = Departments::all();

        return view('mantenedores/actualizarCargo',
            [
                'cargo'         => $cargo,
                'niveles'       => $niveles,
                'departments'   => $departments,
            ]);
    }

    public function accionActualizar(Request $request, $id)
    {
        //dd($_POST);
        $mensaje_de_vacio = ", estaba vacío.";

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'LevelPositions_id' => 'required',
            'department_id' => 'required',
        ], $messages = [
            'name.required' => 'El campo Nombre ' . $mensaje_de_vacio,
            'LevelPositions_id.required' => 'El campo Nivel ' . $mensaje_de_vacio,
            'department_id.required' => 'El campo departamento ' . $mensaje_de_vacio, //reparar mensajes
        ]);

        if ($validator->fails()) {

            return redirect('actualizarCargo/' . $id . '')
                ->withErrors($validator)
                ->withInput();
        }

        $name               = $_POST['name'];
        $LevelPositions_id  = $_POST['LevelPositions_id'];
        $department_id      = $_POST['department_id'];

        $cargo = Position::find($id);
        $cargo->name = $name;
        $cargo->department_id = $department_id;
        $cargo->LevelPositions_id = $LevelPositions_id;

        $cargo->save();

        // dd($cargo->name);

        $request->session()->flash('alert-success', 'El Cargo ha sido correctamente actualizado.');
        return Redirect::to('actualizarCargo/' . $id);
    }


    public function ingresar()
    {
        $niveles        = LevelPositions::all();

        $departamentos  = Departments::all();
        return view('mantenedores/ingresarCargo', [
            'niveles'       => $niveles,
            'departamentos' => $departamentos,

        ]);
    }

    public function accionIngresar(Request $request)
    {
        //dd($_POST);
        $name               = $_POST['name'];
        $LevelPositions_id  = $_POST['levelPositions_id'];
        $department_id      = $_POST['department_id'];

        if (isset($LevelPositions_id)) {
            $mensaje_de_vacio = ", estaba vacío.";

            $validator = Validator::make($request->all(), [
                'name'              => 'required',
                'levelPositions_id' => 'required',
                'department_id'     => 'required',
            ], $messages = [
                'name.required'                 => 'El campo Nombre ' . $mensaje_de_vacio,
                'levelPositions_id.required'    => 'Seleccione un nivel ',
                'department_id.required'        => 'Seleccione un departamento ',
            ]);

            if ($validator->fails()) {

                return redirect('ingresarCargo')
                    ->withErrors($validator)
                    ->withInput();
            }
            // fin validaciones


            $cargo = new Position();
            $cargo->name                = $name;
            $cargo->LevelPositions_id   = $LevelPositions_id;
            $cargo->department_id       = $department_id;

            $cargo->save();

            $request->session()->flash('alert-success', 'El cargo ha sido correctamente ingresado.');
            return Redirect::to('ingresarCargo');


        }

    }

    public function ver($id)
    {
        $cargo                      = Position::find($id);
        $usuarios                   = $cargo->users;//User::all();
        $numUsuarios                = count ( $usuarios );

       // dd($usuarios);
        return view('mantenedores/verCargo',
            [
                'cargo'         => $cargo,
                'numUsuarios'   => $numUsuarios,
                'usuarios'      => $usuarios,
            ]);

    }

    public function eliminar($id, Request $request)
    {
        //dd($_POST);
        $cargo      = Position::find($id);
        $mensaje    = 'El cargo: '.$cargo->name.', ha sido correctamente eliminado.';

        $cargo->delete();
        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to('listarCargo');
    }
}
