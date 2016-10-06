<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Asset;
use App\Models\Supplier;
use App\Models\StateAsset;



class MantenedorDeActivos extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activos        = Asset::paginate(5);

        $proveedores    = Supplier::all();
        $estados        = StateAsset::all();

        return view('mantenedores.assets.listar', [

            'activos'       => $activos,
            'proveedores'   => $proveedores,
            'estados'       => $estados,
            'buscar'        => 'false',

        ]);

    }

    public function search()
    {
        //
        //dd($_POST);
        $code           = $_POST['code'];
        $name           = $_POST['name'];
        $supplier_id    = $_POST['supplier_id'];
        $state_asset_id = $_POST['state_asset_id'];


        $activos = Asset::all();



        $activos = Asset::where( 'code',     '=',    $code           )
            ->Where ( 'name',                'LIKE', '%'.$name.'%'   )
            ->Where ( 'supplier_id',         '=',    $supplier_id    )
            ->Where ( 'state_asset_id',      '=',    $state_asset_id )
            ->get();

        dd($activos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
