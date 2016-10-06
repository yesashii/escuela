<?php

namespace App\Http\Controllers\Mantenedores;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Asset;
use App\Models\Supplier;
use App\Models\StateAsset;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

        $ope_code           = '=';
        $ope_supplier_id    = '=';
        $ope_state_asset_id = '=';


        if( $code == '' && $supplier_id == '' && $state_asset_id == '' && $name == '')
        {
            return Redirect::to('listarActivo');
        }
        if($code == '')
        {
            $code       = '%'.$code.'%';
            $ope_code   = 'like';
        }

        if($supplier_id == '')
        {
            $supplier_id       = '%'.$supplier_id.'%';
            $ope_supplier_id   = 'like';
        }

        if($state_asset_id == '')
        {
            $state_asset_id       = '%'.$state_asset_id.'%';
            $ope_state_asset_id   = 'like';
        }

        $activos = Asset::where( 'code',     $ope_code          ,    $code              )
            ->Where ( 'name',                'LIKE'             , '%'.$name.'%'         )
            ->Where ( 'supplier_id',         $ope_supplier_id   ,    $supplier_id       )
            ->Where ( 'state_asset_id',      $ope_state_asset_id,    $state_asset_id    )
            ->get();

        $proveedores    = Supplier::all();
        $estados        = StateAsset::all();

        //dd($activos);

        return view('mantenedores.assets.listar', [

            'activos'       => $activos,
            'proveedores'   => $proveedores,
            'estados'       => $estados,
            'buscar'        => 'true',

        ]);
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
        $activo         = Asset::find($id);
        $proveedores    = Supplier::all();


        return view('mantenedores.assets.actualizar', [

            'activo'        => $activo,
            'proveedores'   => $proveedores,

        ]);

    }

    public function actionEdit($id, Request $request)
    {
        //
        //dd($_POST);
        $code           = $_POST['code'];
        $name           = $_POST['name'];
        $description    = $_POST['description'];
        $supplier_id    = $_POST['supplier_id'];


        $validator = Validator::make($request->all(), [
            'code'          => 'required',
            'name'          => 'required',
            'description'   => 'required',
        ],$messages = [
            'code.required'         => trans(   'mantActivos.msj_code_requerido' ),
            'name.required'         => trans(   'mantActivos.msj_name_requerido' ),
            'description.required'  => trans(   'mantActivos.msj_description_requerido'  ),
        ]);

        $activo                 = Asset::find($id);

        $activo->code           = $code;
        $activo->name           = $name;
        $activo->description    = $description;
        $activo->supplier_id    = $supplier_id;

        $activo->save();
        $request->session()->flash('alert-success', trans('mantActivos.msj_asset_actualizado_ok'));
        return Redirect::to('actualizarActivo/'.$id);

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
        $activo                 = Asset::find($id);


        if( $activo->available == 0)
        {
            $disponible = trans(   'mantActivos.val_disponible' );
        }else{
            $disponible = trans(   'mantActivos.val_no_disponible' );
        }

        return view('mantenedores.assets.ver', [

            'activo'        => $activo,
            'disponible'    => $disponible,

        ]);

    }



}
