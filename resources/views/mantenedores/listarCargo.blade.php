@extends('mantenedores.layouts.principal')

@section('titulo') Mantenedor de cargos @endsection








@section('contenido')

    <div class="container">
        <h1>Mantenedor de Cargos</h1>
        <form action={{ url("listarCargo") }} method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese Nombre">
                </div>
             </div>
            <div class="container">
                <p class="row" >
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <button type="button" onclick='window.location ="{{ url("ingresarCargo") }}"' class="btn btn-primary">Nuevo</button>
                    <button type="button" class="btn btn-primary">Salir</button>
                </p>
            </div>
        </form>


        <div class="row" >

            <div class="col-xs-12" >
                <table class="table ">
                    <thead>
                    <tr class="row">
                        <th class="col-xs-9">Nombre</th>
                        <th class="col-xs-1">Nivel</th>
                        <th class="col-xs-2">Acción</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if($numCargos == 0)
                        <tr>
                            <td>{{'No existen usuarios con el criterio de búsqueda'}}</td>
                        </tr>
                    @endif

                    @if($numCargos > 0)
                        @foreach($cargos as $cargo)
                            <tr class="row">
                                <td class="col-xs-9">{{ $cargo->name }}</td>
                                <td class="col-xs-1 centered">{{ $cargo->levels->name }}</td>

                                <td class=" col-xs-2">
                                    <a class="iconos" href="{{ url('actualizarCargo/'.$cargo->id) }}"   data-toggle="tooltip" title="Editar" >  <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/></a> |
                                    <a class="iconos" href=""   data-toggle="tooltip" title="Ver más" > <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/></a> |
                                    <a class="iconos" href=""   data-toggle="tooltip" title="Eliminar"> <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/></a>

                                </td>

                            </tr>
                        @endforeach
                    @endif
                    </tbody>


                </table>

            </div>

        </div>

        {!! $cargos->render() !!}

    </div>


@endsection