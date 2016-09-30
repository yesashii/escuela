<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\LevelPositions;

use Illuminate\Support\Facades\Redirect;

class MantenedorDeNivelesCargos extends Controller
{

    private $datosPorPagina = 5;

    public function listarTodos()
    {
        $cantidades         = LevelPositions::all();

        $nivelesCargos      = LevelPositions::paginate( $this->datosPorPagina );
        $numnivelesCargo    = count ( $nivelesCargos );
        $max                = LevelPositions::max('level');


        return view('mantenedores/listarNivelesCargos', array(

            'cantidades'                => $cantidades,
            'nivelesCargos'             => $nivelesCargos,
            'numnivelesCargo'           => $numnivelesCargo,
            'max'                       => $max,

        ));
    }

    public function buscar()
    {
        //dd($_POST);
        $nivel_id      = $_POST['level'];

        if( $nivel_id == 0)
        {
            return Redirect::to('listarNivelCargo');
        }else{
            $nivelesCargos       = LevelPositions::where('id', '=', $nivel_id)
                ->paginate( $this->datosPorPagina );
        }

        $numnivelesCargo    = count ( $nivelesCargos );
        $cantidades         = LevelPositions::all();
        $max                = LevelPositions::max('level');

        return view('mantenedores/listarNivelesCargos', array(

            'cantidades'        => $cantidades,
            'nivelesCargos'     => $nivelesCargos,
            'numnivelesCargo'   => $numnivelesCargo,
            'max'               => $max,

        ));

    }

    public function ingresar(Request $request)
    {
        $max_level      = LevelPositions::max('level');
        $level          = new LevelPositions();

        $nuevo_nivel    = $max_level + 1;
        $level->level   = $nuevo_nivel;


        $level->save();

        $request->session()->flash( 'alert-success',trans( 'mantLvCargos.msj_ingresado_1').$nuevo_nivel. trans('mantLvCargos.msj_ingresado_2') );

        return Redirect::to(route('listarNivelCargo'));
    }

    public function eliminar(Request $request, $id)
    {
        $nivel      = LevelPositions::find($id);
        $mensaje    = trans( 'mantLvCargos.msj_eliminado_1').$nivel->level.trans( 'mantLvCargos.msj_eliminado_2');

        $nivel->delete();

        $request->session()->flash('alert-success', $mensaje);
        return Redirect::to('listarNivelCargo');
    }

    public function ver($id)
    {
        $nivel          = LevelPositions::find($id);
        $cargos         = $nivel->positions;

        //dd($cargos);



        return view('mantenedores/verNivelCargo', [
            'nivel'         => $nivel,
            'cargos' => $cargos,
        ]);
    }



}
