<?php

namespace App\Http\Controllers\Mantenedores;

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
}
