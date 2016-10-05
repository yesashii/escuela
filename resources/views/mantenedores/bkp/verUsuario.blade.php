@extends('mantenedores.layouts.principal')

@section('titulo') {{ trans( 'mantusuarios.tit_verUsuario' ) }} @endsection

@section('contenido')

    <div class="container col-xs-12">

     <div class="col-xs-3"></div>
    <div class="panel panel-info col-xs-6 ">
        <div class="panel-heading">
            <h3 class="panel-title">{{ trans( 'mantusuarios.tit_verUsuario' ) }}</h3>
        </div>
        <div class="panel-body">
            <p class="row">
                <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_first_name' ) }}</div>
                <div class="col-xs-9">: {{ $usuario->first_name }}</div>
            </p>

            <p class="row">
                <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_last_name' ) }}</div>
                <div class="col-xs-9">: {{ $usuario->last_name }}</div>
            </p>

            <p class="row">
                <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_email' ) }}</div>
                <div class="col-xs-9">: {{ $usuario->email }}</div>
            </p>

            <p class="row">
                <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_identifier' ) }}</div>
                <div class="col-xs-9">: {{ $usuario->identifier }}</div>
            </p>

            <p class="row">
                <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_country' ) }}</div>
                <div class="col-xs-9">: {{ $usuario->cities()->first()->countries()->first()->name }}</div>
            </p>

            <p class="row">
                <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_city' ) }}</div>
                <div class="col-xs-9">: {{ $usuario->cities()->first()->name }}</div>

            </p>

            <p class="row">
            <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_roles' ) }}</div>
            <div class="col-xs-9">:<br/>
                <ul>
                @foreach( $usuario->roles as $role )
                        <li>{{ $role->name }}</li>
                @endforeach
                </ul>
            </div>
            </p>

            <p class="row">
            <div class="col-xs-3">{{ trans( 'mantusuarios.lvm_positions' ) }}</div>
            <div class="col-xs-9">:<br/>
                <ul>

                @foreach( $usuario->positions as $position )

                   <li> {{ $position->name }} </li>
                @endforeach
                </ul>
            </div>
            </p>



            <p class="row">
            <div class="col-xs-10"></div>
            <div class="col-xs-2">
                <input type="button" class="btn btn-primary "
                       onclick='window.location ="{{ route("listarUsuario") }}"'
                       value="{{ trans( 'mantusuarios.btn_volver' ) }}">
            </div>
            </p>

        </div>

    </div>

    </div>



@endsection