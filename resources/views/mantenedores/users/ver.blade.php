@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mantusuarios.tit_verUsuario' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mantusuarios.tit_verUsuario' ) }}
@endsection

@section('panel_body')
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
@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarUsuario") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mantusuarios.btn_volver' ) }}"
@endsection




