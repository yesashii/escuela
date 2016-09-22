@extends('mantenedores.layouts.principal')

@section('titulo')
    {{ 'Ver usuario' }}
@endsection

@section('contenido')

    <div class="container col-xs-12">

        <div class="col-xs-3"></div>
        <div class="panel panel-info col-xs-6 ">
            <div class="panel-heading">
                <h3 class="panel-title">Información del cargo</h3>
            </div>
            <div class="panel-body">

                <p class="row">
                    <div class="col-xs-2">Nombre</div>
                    <div class="col-xs-10">: {{ $cargo->name }}</div>
                </p>

                <p class="row">
                    <div class="col-xs-2">Nivel</div>
                    <div class="col-xs-10">: {{ $cargo->levels->name }}</div>
                </p>

                <p class="row">
                <div class="col-xs-2">Usuarios</div>
                <div class="col-xs-10">: Total: {{ $numUsuarios }}
                <ul>
                    @foreach( $usuarios as $usuario)
                        <li>{{ $usuario->first_name." ".$usuario->last_name}}</li>
                    @endforeach
                </ul>
                </div>
                </p>


                <p class="row">
                <div class="col-xs-10"></div>
                <div class="col-xs-2">
                    <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarCargo") }}"' value="Volver">
                </div>
                </p>

            </div>

        </div>

    </div>



@endsection