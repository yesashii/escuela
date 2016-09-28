@extends('mantenedores.layouts.principal')


@section('titulo')
    {{ 'Mantenedores' }}
@endsection


@section('contenido')

    <ul>
        <li><a href="{{ route('listarNivelDepartamento') }}">Mantenedor de niveles de departamentos</a></li>

    </ul>

@endsection