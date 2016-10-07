@extends('layouts.mantenedores.listar.baseAsset')

@section('titulo')
    {{ trans('mantActivos.tit_listarActivo') }}
@endsection

@section('titulo_panel')
    {{ trans('mantActivos.tit_listarActivo') }}
@endsection



<!-- botón salir -->
@section('url_btn_salir')   {{ url('mantenedores') }}             @endsection
@section('value_btn_salir') {{ trans('mantActivos.btn_salir') }} @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th>{{ trans('mantActivos.th_code')             }}</th>
    <th>{{ trans('mantActivos.th_name')             }}</th>
    <th>{{ trans('mantActivos.th_supplier_id')      }}</th>
    <th>{{ trans('mantActivos.th_state_asset_id')   }}</th>
    <th>{{ trans('mantActivos.th_accion')           }}</th>
@endsection

@section('tbody_table')
    @if(count($activos) == 0)
        <tr>
            <td colspan="4">{{ trans('mantActivos.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarActivo") }}"'
                >{{ trans('mantActivos.btn_volver') }}
                </button></td>
        </tr>

    @else
        <form action={{ url("listarActivo") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="code" id="code"
                           placeholder="{{ trans('mantActivos.ph_code') }}">
                </td>

                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mantActivos.ph_name') }}">
                </td>

                <td>
                    <select class="form-control" name="supplier_id" id="supplier_id">
                        <option  value="">{{ trans('mantActivos.isd_supplier_id') }}</option>
                        @foreach( $proveedores as $proveedor )
                            <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <select class="form-control" name="state_asset_id" id="state_asset_id">
                        <option  value="">{{ trans('mantActivos.isd_state_asset_id') }}</option>
                        @foreach( $estados as $estado )
                            <option value="{{ $estado->id }}">{{ $estado->name }}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mantActivos.btn_buscar') }}</button>
                </td>
            </tr>
        </form>

        @foreach($activos as $activo)

            <tr>
                <td>{{ $activo->code }}</td>
                <td>{{ $activo->name }}</td>
                <td>{{ $activo->suppliers->name }}</td>
                <td>{{ $activo->state_assets->name }}</td>

                <td><a class="iconos" href="{{ url('actualizarActivo/'.$activo->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mantActivos.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verActivo/'.$activo->id)  }}"
                       data-toggle="tooltip"
                       title="{{ trans('mantActivos.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a>

                </td>
            </tr>

        @endforeach
    @endif
@endsection

@section('paginador')
    @if($buscar == 'false')
        {!! $activos->render() !!}
    @endif
@endsection
