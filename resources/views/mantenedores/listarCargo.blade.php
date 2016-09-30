@extends('mantenedores.layouts.principal')

@section('titulo') Mantenedor de cargos @endsection


@section('contenido')

    <div class="container">
        <h1>Mantenedor de Cargos</h1>

        @include('layouts.mensajes')

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
                    <button type="button" onclick='window.location ="{{ url("mantenedores") }}"'  class="btn btn-primary">Salir</button>
                </p>
            </div>
        </form>


        <div class="row" >

            <div class="col-xs-12" >
                <table class="table ">
                    <thead>
                    <tr class="row">
                        <th class="col-xs-5">Nombre         </th>
                        <th class="col-xs-2">Nivel          </th>
                        <th class="col-xs-3">Departamento   </th>
                        <th class="col-xs-2">Acción         </th>
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
                                <td class="col-xs-5">{{ $cargo->name }}</td>
                                <td class="col-xs-2 centered">{{ $cargo->levelPositions->level }}</td>
                                <td class="col-xs-3 centered">{{ $cargo->departments->name }}</td>

                                <td class=" col-xs-2">
                                    <a class="iconos" href="{{ url('actualizarCargo/'.$cargo->id) }}"   data-toggle="tooltip" title="Editar" >  <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/></a> |
                                    <a class="iconos" href="{{ url('verCargo/'.$cargo->id) }}"          data-toggle="tooltip" title="Ver más" > <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/></a> |

                                    <!-- inicio eliminar -->
                                    @if ( count( $cargo->users ) > 0 )
                                        <a class="iconos"
                                           href="javascript:alert('El cargo posee usuarios asociados, no se puede eliminar')"
                                           data-toggle="tooltip" title="Eliminar">
                                            <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                                        </a>
                                    @else
                                        <a class="iconos"
                                           href="javascript:confirmarEliminar(
                                            '{{ url('eliminarCargo/'.$cargo->id) }}',
                                            '{{ $cargo->name }}',
                                            '{{ 'mensaje ekiminar'}}'
                                           )"
                                           data-toggle="tooltip" title="Eliminar">
                                            <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                                        </a>
                                    @endif
                                    <!-- fin eliminar -->

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