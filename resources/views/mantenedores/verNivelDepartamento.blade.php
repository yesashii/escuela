@extends('mantenedores.layouts.principal')

@section('titulo') {{ trans('mantLvDepartamentos.tit_verNivelDepartamento') }}  @endsection

@section('contenido')

<div class="row">

    <div class="col-xs-2"></div>
    <div class="panel-group col-xs-8" id="accordion">

        <!--inicio Datos personales-->
        <div class="panel panel-info">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#">
                        {{ trans('mantLvDepartamentos.tp_detalle_nivel') }}
                    </a>
                </h4>
            </div>

            <div class="panel-body row">

                <p class="row">
                    <div class="col-xs-3">{{ trans('mantLvDepartamentos.l_level') }}</div>
                    <div class="col-xs-9">: {{ $nivel->level }}</div>
                </p>

                <p class="row">
                <div class="col-xs-3">{{ trans('mantLvDepartamentos.l_departamentos') }}</div>
                <div class="col-xs-9">
                <ul>
                    @if( sizeof($departamentos) > 0)
                        @foreach( $departamentos as $departamento )
                            <li>{{ $departamento->name }}</li>
                        @endforeach
                    @else
                        <li>{{ trans('mantLvDepartamentos.li_sin_departamento') }} </li>
                    @endif



                </ul>

                </div>
                </p>



                <p class="row">
                <div class="col-xs-10"></div>
                <div class="col-xs-2">
                    <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarNivelDepartamento") }}"' value="Volver">
                </div>
                </p>

            </div>

        </div>

    </div>
    <div class="col-xs-2"></div>



</div>




@endsection