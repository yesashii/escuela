@extends('layouts.mantenedores.actualizar.base')

@section('titulo')
    {{ trans('mantActivos.tit_actualizarActivo') }}
@endsection

@section('titulo_principal')
    {{ trans('mantActivos.tit_actualizarActivo') }}
@endsection



@section('formulario')
    <form action="{{ url("actualizarActivo/".$activo->id) }}" method="post">
        {{ csrf_field() }}

        <div class="panel-group" id="accordion">

            <div class="panel panel-info">

                <div class="panel-heading">

                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse">
                            {{ trans('mantActivos.tp_activos') }}
                        </a>
                    </h4>

                </div>

                <div id="collapse" class="panel-collapse collapse in">

                    <div class="panel-body">

                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="code">{{ trans('mantActivos.l_code') }}</label>
                            <input type="text" class="form-control" name="code" id="code"
                                   value="{{ $activo->code }}">
                        </div>

                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mantActivos.l_name') }}</label>
                            <input type="text" class="form-control" name="name" id="name"
                                   value="{{ $activo->name }}">
                        </div>

                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="name">{{ trans('mantActivos.l_description') }}</label>
                            <input type="text" class="form-control" name="description" id="description"
                                   value="{{ $activo->description }}">
                        </div>

                        <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                            <label for="supplier_id">{{ trans('mantActivos.l_supplier') }}</label>
                            <select class="form-control" name="supplier_id" id="supplier_id">
                                @foreach( $proveedores as $proveedor )
                                    @if( $proveedor->id == $activo->supplier_id )
                                        <option selected value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                                    @else
                                        <option value="{{ $proveedor->id }}">{{ $proveedor->name }}</option>
                                    @endif

                                @endforeach
                            </select>
                        </div>

                        <!--botones-->
                            &nbsp;
                            <input type="submit" class="btn btn-primary "
                                   value="{{ trans('mantActivos.btn_guardar') }}">
                            &nbsp;
                            <input type="button" class="btn btn-primary "
                                   onclick='window.location ="{{ route("listarActivo") }}"'
                                   value="{{ trans('mantActivos.btn_volver') }}">
                        <!-- fin botones-->

                    </div>

                </div>

            </div>

        </div>



    </form>
@endsection