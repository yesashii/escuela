@extends('mantenedores.layouts.principal')

@section('titulo')
    {{ 'Ver usuario' }}
@endsection

@section('contenido')


    <div class="row">

        <div class="col-xs-2"></div>
        <div class="panel-group col-xs-8" id="accordion">

            <!--inicio -->
            <div class="panel panel-info">

                <!--Titulo-->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#">
                            {{ 'Detalle del nivel' }}
                        </a>
                    </h4>
                </div>
                <!--Fin Titulo-->

                <div class="panel-body row">

                    <!--Elemento_1-->
                    <p class="row">
                        <div class="col-xs-3">Nombre</div>
                        <div class="col-xs-9">: {{ $cargo->name }}</div>
                    </p>

                    <!--Elemento_2-->
                    <p class="row">
                        <div class="col-xs-3">Nivel del cargo</div>
                        <div class="col-xs-9">: {{ $cargo->levelPositions->level }}</div>
                    </p>

                    <!--Elemento_3-->
                    <p class="row">
                    <div class="col-xs-3">Departamento</div>
                    <div class="col-xs-9">:
                        @if( count($cargo->departments) > 0 )
                            {{ $cargo->departments->name }}
                        @else
                            {{ 'No posee departamento asociado.' }}
                        @endif

                    </div>
                    </p>


                    <!--Elemento_4-->
                    <p class="row">
                    <div class="col-xs-3">Usuarios asociados</div>

                    @if( $numUsuarios > 0 )
                    <div class="col-xs-9">: {{ $numUsuarios }}
                        <ul>
                            @foreach( $usuarios as $usuario)
                                <li>{{ $usuario->first_name." ".$usuario->last_name}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                        <div class="col-xs-9">: {{ 'sin usuarios asociados' }} </div>
                    @endif


                    </p>


                    <!--Botones-->
                    <p class="row">
                        <div class="col-xs-10"></div>
                        <div class="col-xs-2">
                            <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarCargo") }}"' value="Volver">
                        </div>
                    </p>


                </div>

            </div>

        </div>
        <div class="col-xs-2"></div>



    </div>




@endsection