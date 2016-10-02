@extends('layouts.principal')


@section('titulo')
    {{ 'Mantenedores' }}
@endsection


@section('contenido')

    <ul>
        <li><a href="{{ route('listarNivelDepartamento') }}">Mantenedor de niveles de departamentos</a></li>
        <li><a href="{{ route('listarCargo') }}">Mantenedor de cargos</a></li>
        <li><a href="{{ route('listarNivelCargo') }}">Mantenedor de niveles de cargos</a></li>
        <li><a href="{{ route('listarUsuario') }}">Mantenedor de usuarios</a></li>



    </ul>

@endsection