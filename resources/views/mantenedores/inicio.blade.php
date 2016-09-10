@extends('mantenedores.layouts.principal')


@section('titulo')
    {{ 'Mantenedores' }}
@endsection


@section('contenido')

    <ul>
        <li><a href="{{ route('listarUsuario') }}">Mantenedor de usuarios</a></li>
    </ul>

@endsection