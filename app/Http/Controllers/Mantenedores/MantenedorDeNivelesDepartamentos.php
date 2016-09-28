<?php

namespace App\Http\Controllers\Mantenedores;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LevelDepartments;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class MantenedorDeNivelesDepartamentos extends Controller
{
    private $datosPorPagina = 5;

    public function listarTodos()
    {
        $cantidades = LevelDepartments::all();
        
        $nivelesDepartamentos       = LevelDepartments::paginate( $this->datosPorPagina );
        $numnivelesDepartamentos    = count ( $nivelesDepartamentos );

        $max                        = LevelDepartments::max('level');


        return view('mantenedores/listarNivelesDepartamentos', array(

            'cantidades'                => $cantidades,
            'nivelesDepartamentos'      => $nivelesDepartamentos,
            'numnivelesDepartamentos'   => $numnivelesDepartamentos,
            'max'                       => $max,

            ));
    }

    public function buscar()
    {
        //dd($_POST);
        $nivel = $_POST['level'];

        if( $nivel == 0)
        {
            $nivelesDepartamentos       = LevelDepartments::paginate( $this->datosPorPagina );
        }else{
            $nivelesDepartamentos       = LevelDepartments::where('level', '=', $nivel)->paginate( $this->datosPorPagina );
        }


        $numnivelesDepartamentos    = count ( $nivelesDepartamentos );

        $cantidades = LevelDepartments::all();

        $max                        = LevelDepartments::max('level');

        return view('mantenedores/listarNivelesDepartamentos', array(

            'cantidades'                => $cantidades,
            'nivelesDepartamentos'      => $nivelesDepartamentos,
            'numnivelesDepartamentos'   => $numnivelesDepartamentos,
            'max'                       => $max,

        ));

    }

    public function ingresar(Request $request)
    {
        $max_level      = LevelDepartments::max('level');
        $level          = new LevelDepartments();

        $nuevo_nivel    = $max_level + 1;

        $level->level   = $nuevo_nivel;

        //dd($level->level);

        $level->save();

        $request->session()->flash( 'alert-success',trans( 'mantLvDepartamentos.msj_ingresado_1').$nuevo_nivel. trans('mantLvDepartamentos.msj_ingresado_2') );

        return Redirect::to(route('listarNivelDepartamento'));
    }



    public function actualizar( $id )
    {        
        $nivelesDepartamentos   = LevelDepartments::all();
        
        return view('mantenedores/actualizarNivelDepartamento',
            [
                'id'                            => $id,
                'nivelesDepartamentos'         => $nivelesDepartamentos,
            ]);
    }


}
