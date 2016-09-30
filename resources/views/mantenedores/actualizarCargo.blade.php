@extends('mantenedores.layouts.principal')

@section('titulo')
    {{ 'Actualizar cargo' }}
@endsection


@section('contenido')

    <div class="container">
        <h2>Actualizar Cargo</h2>
        @if( count($errors) > 0 )
            @foreach( $errors->all() as $error )
                <p class="alert alert-danger">{{ $error }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endforeach
        @endif
    </div><!-- fin mensajes de error -->


    <div class="container">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        @endforeach
    </div> <!-- fin mensajes de flash -->


    <div class="container">

        <!--inicio formulario-->
        <form action="{{ url("actualizarCargo/".$cargo->id) }}" method="post">
            {{ csrf_field() }}

            <div class="panel-group" id="accordion">

                <!--inicio Datos personales-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#datosPersonales">Datos de cargo</a>
                        </h4>
                    </div>
                    <div id="datosPersonales" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="name">Cargo</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $cargo->name }}">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="LevelPositions_id">Nivel</label>
                                <select class="form-control" name="LevelPositions_id" id="LevelPositions_id"  >
                                    <option selected disabled>Seleccione un nivel</option>

                                    @foreach( $niveles as $nivel )
                                        @if( $nivel->id == $cargo->levelPositions->id)
                                            <option selected value="{{ $cargo->levelPositions->id }}">{{ $nivel->level }}</option>
                                        @else
                                            <option value="{{ $nivel->id }}">{{ $nivel->level }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="department_id">Departamento</label>
                                <select class="form-control" name="department_id" id="department_id"  >
                                    <option selected disabled>Seleccione un departamento</option>

                                    @foreach( $departments as $department )
                                        @if( $department->id == $cargo->departments->id)
                                            <option selected value="{{ $department->id  }}">{{ $department->name }}</option>
                                        @else
                                            <option value="{{ $department->id  }}">{{ $department->name }}</option>
                                        @endif
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
                <input type="submit" class="btn btn-primary " value="Guardar">                &nbsp;
                <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarCargo") }}"' value="Volver">
            </div>
            <div class="row"> </div><hr/>
            <!-- fin botones-->

        </form>
        <!-- fin formulario-->
    </div>


@endsection