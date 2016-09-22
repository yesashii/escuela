@extends('layouts.principal')

@section('titulo')
    {{ 'Asignar activo' }}
@endsection




@section('contenido')
    <div class="container">
        <h1>Buscar usuario</h1>
        <form action="#" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese Apellido">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese Email">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="identificador">Rut</label>
                    <input type="dentificador" class="form-control" name="identificador" id="dentificador" placeholder="Ingrese Rut">
                </div>
            </div>

            <div class="container">
                <p class="row" >
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <button type="button" class="btn btn-primary">Salir</button>
                </p>
            </div>
        </form>
    </div>


    <div class="container">
        <table class="table table-striped col-sm-6 col-xs-12">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Rut</th>
                <th>Ciudad</th>
                <th>País</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ 'Pepe'               }}</td>
                        <td>{{ 'de los palos'       }}</td>
                        <td>{{ 'pepe@prueba.dev'    }}</td>
                        <td>{{ '15370707-3'         }}</td>
                        <td>{{ 'Quitof'             }}</td>
                        <td>{{ 'Ecuador'            }}</td>
                        <td> <input class="btn-default" type="button" onclick='window.location ="{{ url("asignarActivo") }}"' value="Seleccionar"> </td>
                    </tr>
                    <tr>
                        <td>{{ 'Pepe'               }}</td>
                        <td>{{ 'de los palos'       }}</td>
                        <td>{{ 'pepe@prueba.dev'    }}</td>
                        <td>{{ '15370707-3'         }}</td>
                        <td>{{ 'Quitof'             }}</td>
                        <td>{{ 'Ecuador'            }}</td>
                        <td> <input class="btn-default" type="button" value="Seleccionar"> </td>
                    </tr>
                    <tr>
                        <td>{{ 'Pepe'               }}</td>
                        <td>{{ 'de los palos'       }}</td>
                        <td>{{ 'pepe@prueba.dev'    }}</td>
                        <td>{{ '15370707-3'         }}</td>
                        <td>{{ 'Quitof'             }}</td>
                        <td>{{ 'Ecuador'            }}</td>
                        <td> <input class="btn-default" type="button" value="Seleccionar"> </td>
                    </tr>
            </tbody>
        </table>

    </div>
@endsection