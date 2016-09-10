@extends('mantenedores.layouts.principal')

@section('titulo')
    {{ 'Ver usuario' }}
@endsection

@section('contenido')

    <div class="container col-xs-12">

     <div class="col-xs-3"></div>
    <div class="panel panel-info col-xs-6 ">
        <div class="panel-heading">
            <h3 class="panel-title">Información del usuario</h3>
        </div>
        <div class="panel-body">
            <p class="row">
                <div class="col-xs-2">Nombre</div>
                <div class="col-xs-10">: {{ $usuario->first_name }}</div>
            </p>

            <p class="row">
                <div class="col-xs-2">Apellido</div>
                <div class="col-xs-10">: {{ $usuario->last_name }}</div>
            </p>

            <p class="row">
                <div class="col-xs-2">Email</div>
                <div class="col-xs-10">: {{ $usuario->email }}</div>
            </p>

            <p class="row">
                <div class="col-xs-2">Rut</div>
                <div class="col-xs-10">: {{ $usuario->identifier }}</div>
            </p>

            <p class="row">
                <div class="col-xs-2">País</div>
                <div class="col-xs-10">: {{ $usuario->cities()->first()->countries()->first()->name }}</div>
            </p>

            <p class="row">
                <div class="col-xs-2">Ciudad</div>
                <div class="col-xs-10">: {{ $usuario->cities()->first()->name }}</div>
            </p>

            <p class="row">
            <div class="col-xs-2">Roles</div>
            <div class="col-xs-10">:
                <?php $contador = 0; ?>
                @foreach( $usuario->roles as $role )
                    @if($contador > 0){{ ', ' }}@endif
                     {{ $role->name }}
                 <?php $contador ++; ?>
                @endforeach
            </div>

            </p>

            <p class="row">
            <div class="col-xs-2">Cargos</div>
            <div class="col-xs-10">:
                <?php $contador = 0; ?>
                @foreach( $usuario->positions as $position )
                    @if($contador > 0){{ ', ' }}@endif
                    {{ $position->name }}
                    <?php $contador ++; ?>
                @endforeach
            </div>
            </p>

            </p>

            <p class="row">
            <div class="col-xs-2">Departamentos</div>
            <div class="col-xs-10">:
                <?php $contador = 0; ?>
                @foreach( $usuario->departments as $department )
                    @if($contador > 0){{ ', ' }}@endif
                    {{ $department->name }}
                    <?php $contador ++; ?>
                @endforeach
            </div>
            </p>

            <p class="row">
            <div class="col-xs-10"></div>
            <div class="col-xs-2">
                <input type="button" class="btn btn-primary " onclick='window.location ="{{ route("listarUsuario") }}"' value="Volver">
            </div>
            </p>

        </div>

    </div>

    </div>



@endsection