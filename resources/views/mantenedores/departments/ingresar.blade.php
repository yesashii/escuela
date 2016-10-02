@extends('layouts.principal');


@section('titulo')
    {{ 'Ingresar cargos' }}
@endsection


@section('contenido')

    <div class="container">
        <h2>{{ trans('mant_departamentos.tit_Ingresar') }}</h2>
        @include('layouts.mensajes')

    <div class="container">

        <!--inicio formulario-->
        <form action="" method="post">
            {{ csrf_field() }}

            <div class="panel-group" id="accordion">

                <!--inicio Datos personales-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#datosPersonales">
                                {{ trans('mant_departamentos.tp_datos_departamento') }}
                            </a>
                        </h4>
                    </div>
                    <div id="datosPersonales" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="name">{{ trans('mant_departamentos.l_departamento') }}</label>
                                <input type="text" class="form-control" name="name" id="name" value=""
                                       placeholder="{{ trans('mant_departamentos.ph_name') }}">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="levelDepartments_id">{{ trans('mant_departamentos.l_nivel') }}</label>
                                <select class="form-control" name="levelDepartments_id" id="levelDepartments_id"  >
                                    <option value="" >{{ trans('mant_departamentos.isd_level2') }}</option>
                                    @foreach( $niveles as $nivel )
                                        <option value="{{ $nivel->id }}">{{ $nivel->id }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <!--fin Datos personales-->

            </div>

            <!--botones-->
            <div class="row col-sm-12 padding col-xs-12  margenes-botones">
                <input type="submit" class="btn btn-primary " value="{{ trans('mant_departamentos.btn_guardar') }}">                &nbsp;
                <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarDepartamentos") }}"' value="{{ trans('mant_departamentos.btn_volver') }}">
            </div>
            <div class="row"> </div><hr/>
            <!-- fin botones-->

        </form>
        <!-- fin formulario-->
    </div>
    </div>



@endsection