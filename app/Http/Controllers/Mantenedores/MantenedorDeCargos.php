<?php

namespace App\Http\Controllers\Mantenedores;

use App\Models\Level;
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
        $cargos     = Position::paginate( $this->datosPorPagina );
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


        $cargo      = Position::find($id);
        $niveles    = Level::all();

        return view('mantenedores/actualizarCargo',
            [
                'cargo'     => $cargo,
                'niveles'   => $niveles,
            ]);
    }

    public function accionActualizar(Request $request, $id)
    {
        //dd($_POST);
        $mensaje_de_vacio = ", estaba vacío.";

        $validator = Validator::make($request->all(), [
            'name'      => 'required',
            'level_id'  => 'required',
        ],$messages = [
            'name.required'       => 'El campo Nombre '.$mensaje_de_vacio,
            'level_id.required'   => 'El campo Nivel '.$mensaje_de_vacio,
        ]);

        if ($validator->fails()) {

            return redirect('actualizarCargo/'.$id.'')
                ->withErrors($validator)
                ->withInput();
        }

        $name               = $_POST['name'];
        $level_id           = $_POST['level_id'];

        $cargo              = Position::find($id);
        $cargo->name        = $name;
        $cargo->level_id    = $level_id;

        $cargo->save();

       // dd($cargo->name);

        $request->session()->flash('alert-success', 'El Cargo ha sido correctamente actualizado.');
        return Redirect::to('actualizarCargo/'.$id);
    }
    
    
    public function ingresar()
    {
        $niveles    = Level::all();
        return view('mantenedores/ingresarCargo', ['niveles' => $niveles]);
    }

    public function accionIngresar(Request $request)
    {
        //dd($_POST);
        $name       = $_POST['name'];
        $level_id   = $_POST['level_id'];

        if(isset($level_id))
        {
            $mensaje_de_vacio = ", estaba vacío.";

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'level_id' => 'required',
            ], $messages = [
                'name.required' => 'El campo Nombre ' . $mensaje_de_vacio,
                'level_id.required' => 'El campo Nivel ' . $mensaje_de_vacio,
            ]);

            if ($validator->fails()) {

                return redirect('actualizarCargo/' . $id . '')
                    ->withErrors($validator)
                    ->withInput();
            }
            // fin validaciones


            $cargo = new Position();
            $cargo->name = $name;
            $cargo->level_id = $level_id;

            $cargo->save();

            $request->session()->flash('alert-success', 'El cargo ha sido correctamente ingresado.');
            return Redirect::to('ingresarCargo');
        }else{
            $request->session()->flash('alert-warning ', 'Debe seleccionar un nivel.');
            return Redirect::to('ingresarCargo');
        }


    }

}
