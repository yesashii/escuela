@extends('mantenedores.layouts.principal')

@section('titulo') Ingresar usuario @endsection








@section('contenido')


    <div class="container">
        <h2>Actualizar Usuario</h2>
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
        <form action="{{ url('ingresarUsuario') }}" method="post">
            {{ csrf_field() }}

            <div class="panel-group" id="accordion">

                <!--inicio Datos personales-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#datosPersonales">Ingreso de datos personales</a>
                        </h4>
                    </div>
                    <div id="datosPersonales" class="panel-collapse collapse in">
                        <div class="panel-body">

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="identifier">Rut</label>
                                <input type="text" class="form-control" name="identifier" id="identifier" value="">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="last_name">Apellido</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="">
                            </div>

                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="">
                            </div>


                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <label for="country_id">País</label>
                                <select class="form-control" name="country_id" id="country_id" onchange="cargaComboCiudad('cargaCiudadUsuario/'+this.value)" >
                                    <option selected disabled>Seleccione un país</option>
                                    @foreach( $paises as $pais )
                                            <option value="{{ $pais->id }}">{{ $pais->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-sm-12 col-xs-12 pegado-izquierda">
                                <div id="comboCiudad">
                                    <label for="city_id">Ciudad</label>
                                    <select class="form-control" name="city_id" id="city_id">
                                        <option selected disabled>Seleccione una ciudad</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!--fin Datos personales-->

                <!--inicio Roles-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Ingreso de roles</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p><strong>Roles</strong></p>
                            @foreach($roles as $rol)

                                <label class="checkbox col-xs-6 ">
                                        <input type="checkbox" name="roles[]" id="{{ $rol->id }}" value="{{ $rol->id }}">{{ $rol->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--fin Roles-->

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Ingreso de cargos</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">

                        <div class="panel-body">
                            @foreach($positions as $position)
                                <label class="checkbox col-xs-6 ">
                                    <input type="checkbox" name="positions[]" value="{{ $position->id }}">{{ $position->name }}
                                </label>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Ingreso de departamentos</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <p><strong>Departamentos</strong></p>
                            @foreach($departments as $department)
                                <label class="checkbox col-xs-6 margenes-bottom">
                                    <input type="checkbox" name="departments[]" value="{{ $department->id }}">{{ $department->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!--botones-->
            <div class="row col-sm-12 padding col-xs-12  margenes-botones">
                <input type="submit" class="btn btn-primary " value="Guardar">
                <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarUsuario") }}"' value="Volver">
            </div>
            <div class="row"> </div><hr/>
            <!-- fin botones-->

        </form>
        <!-- fin formulario-->
    </div>


@endsection