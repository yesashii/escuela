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


        return view('mantenedores/listarNivelesDepartamentos', array(

            'cantidades'                => $cantidades,
            'nivelesDepartamentos'      => $nivelesDepartamentos,
            'numnivelesDepartamentos'   => $numnivelesDepartamentos,

            ));
    }
}
