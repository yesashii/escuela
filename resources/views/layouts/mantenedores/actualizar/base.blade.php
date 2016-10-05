@extends('layouts.principal')


@section('titulo')
    @yield('titulo')
@endsection


@section('contenido')

    <div class="container">
        <h3>  @yield('titulo_principal')  </h3>
        @include('layouts.mensajes')
        @yield('formulario')
    </div>

@endsection