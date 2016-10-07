@extends('layouts.mantenedores.ver.base')

@section('titulo_pestania')
    {{ trans( 'mantActivos.tit_verActivo' ) }}
@endsection

@section('panel_title')
    {{ trans( 'mantActivos.tit_verActivo' ) }}
@endsection

@section('panel_body')

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_code' ) }}</div>
        <div class="col-xs-9">: {{ $activo->code }}</div>
    </p>

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_name' ) }}</div>
        <div class="col-xs-9">: {{ $activo->name }}</div>
    </p>

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_description' ) }}</div>
        <div class="col-xs-9">: {{ $activo->description }}</div>
    </p>

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_supplier' ) }}</div>
        <div class="col-xs-9">: {{ $activo->suppliers->find($activo->supplier_id)->name }}</div>
    </p>

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_available' ) }}</div>
        <div class="col-xs-9">: {{ $disponible }}</div>
    </p>

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_state' ) }}</div>
        <div class="col-xs-9">: {{ $activo->state_assets->find($activo->state_asset_id)->name }}</div>
    </p>

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_purchase' ) }}</div>
        <div class="col-xs-9">: {{ $activo->purchase_id }}</div>
    </p>

    <p class="row">
        <div class="col-xs-3">{{ trans( 'mantActivos.lvm_fecha_purchase' ) }}</div>
        <div class="col-xs-9">: {{ $activo->purchases->find($activo->purchase_id)->date }}</div>
    </p>

    <p class="row">
    <div class="col-xs-3">{{ trans( 'mantActivos.lvm_assignements' ) }}</div>
    <div class="col-xs-9">:<br/>
        <ul>
            @foreach( $activo->assignments as $assignment )

                <li> {{ $assignment->users->first_name }}
                    <ul>
                        <li>{{ 'Estado      : '.$assignment->state_assignments->find($assignment->state_assignment_id)->name    }}</li>
                        <li>{{ 'Asignado    : '.$assignment->assigned_at                                                        }}</li>
                        <li>{{ 'entregado   : '.$assignment->returned_at                                                        }}</li>
                    </ul>
                </li>

            @endforeach
        </ul>
    </div>
    </p>
    </p>




@endsection

@section('location_btn_volver')
    onclick='window.location ="{{ route("listarActivo") }}"'
@endsection

@section('value_btn_volver')
    value="{{ trans( 'mantActivos.btn_volver' ) }}"
@endsection