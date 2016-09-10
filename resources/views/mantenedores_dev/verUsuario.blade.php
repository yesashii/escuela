@extends('mantenedores_dev.layouts.ver')



@section('titulo')
    {{ 'usuario' }}
@endsection


@section('contenido')

    Nombre:     {{ $usuario->first_name }}                                  <br/>
    Apellido:   {{ $usuario->last_name }}                                   <br/>
    Rut:        {{ $usuario->identifier }}                                  <br/>
    Email:      {{ $usuario->email }}                                       <br/>
    País:       {{ $usuario->cities->first()->countries->first()->name }}   <br/>
    Ciudad:     {{ $usuario->cities->first()->name }}                       <br/>
    Roles:      @foreach( $usuario->roles as $role )
                    {{ $role->name }}                                       <br/>
                @endforeach
    Cargos:     @foreach( $usuario->positions as $position )
                    {{ $position->name }}                                   <br/>
                @endforeach
    Departamentos:  @foreach( $usuario->departments as $department )
                        {{ $department->name }}                             <br/>
                    @endforeach

    <br/><br/>
    <input type="button" onclick='window.location ="{{ route("listarUsuaios") }}"' value="Volver">
@endsection