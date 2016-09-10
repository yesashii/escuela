@extends('mantenedores_dev.layouts.main')



@section('buscador')

<form action={{ url("buscarUsuario") }} method="post">

    {{ csrf_field() }}

    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre">

    <label for="apellido">Apellido</label>
    <input type="text" name="apellido" id="apellido"> <br/><br/>

    <label for="email">Email</label>
    <input type="email" name="email" id="email">

    <label for="identificador">Rut</label>
    <input type="text" name="identificador" id="identificador"> <br/><br/>

    <input type="submit"  value="Buscar">
    <input type="button" onclick='window.location ="{{ url("ingresarUsuario") }}"'  value="Nuevo usuario">
    <input type="button" value="Salir">


</form>

@endsection


@section('filas')


    <tr>
        <td>NOMBRE      </td>
        <td>APELLIDO    </td>
        <td>EMAIL       </td>
        <td>RUT         </td>
        <td>CIUDAD      </td>
        <td>PAIS        </td>
        <td>ACCIÓN      </td>
    </tr>

    @if($numUsuarios == 0)
        <tr>
            <td>{{'No existen usuarios con el criterio de búsqueda'}}</td>
        </tr>
    @endif

    @if($numUsuarios > 0)
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->first_name                                                  }}</td>
                <td>{{ $usuario->last_name                                                   }}</td>
                <td>{{ $usuario->email                                                       }}</td>
                <td>{{ $usuario->identifier                                                  }}</td>
                <td>{{ $usuario->cities()->first()->name                                     }}</td>
                <td>{{ $usuario->cities()->first()->countries()->first()->name               }}</td>
                <td><a href="{{ url('actualizarUsuario/'.$usuario->id) }}">editar</a> |
                    <a href="{{ url('verUsuario/'.$usuario->id) }}">ver</a> |
                    <a href="{{ url('eliminarUsuario/'.$usuario->id) }}">eliminar</a>
                </td>
            </tr>
        @endforeach
    @endif





@endsection