@extends('mantenedores.layouts.principal')

@section('titulo') {{ trans('mantusuarios.titulo') }} @endsection


@section('contenido')

    <div class="container">
        <h1>{{ trans('mantusuarios.titulo') }}</h1>
        <form action={{ url("listarUsuario") }} method="post">
            {{ csrf_field() }}

            <div class="row">
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="nombre">{{ trans('mantusuarios.i_l_first_name') }}</label>
                    <input type="text" class="form-control" name="nombre" id="nombre"
                           placeholder="{{ trans('mantusuarios.i_p_first_name') }}">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="apellido">{{ trans('mantusuarios.i_l_last_name') }}</label>
                    <input type="text" class="form-control" name="apellido" id="apellido"
                           placeholder="{{ trans('mantusuarios.i_p_last_name') }}">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="email">{{ trans('mantusuarios.i_l_email') }}</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="{{ trans('mantusuarios.i_p_email') }}">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="identificador">{{ trans('mantusuarios.i_l_identifier') }}</label>
                    <input type="dentificador" class="form-control" name="identificador" id="dentificador"
                           placeholder="{{ trans('mantusuarios.i_p_identifier') }}">
                </div>
            </div>



            <div class="container">
            <p class="row" >
                <div class="btn-group ">
                    <button type="submit" class="btn btn-primary ">{{ trans('mantusuarios.btn_buscar') }}</button>
                </div>
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary "
                            onclick='window.location ="{{ url("ingresarUsuario") }}"'
                            class="btn btn-primary">{{ trans('mantusuarios.btn_nuevo') }}
                    </button>
                </div>
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary "
                            onclick='window.location ="{{ url("mantenedores") }}"'
                            class="btn btn-primary">{{ trans('mantusuarios.btn_salir') }}
                    </button>
                </div>

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
                <th>{{ trans('mantusuarios.tbl_col_country') }}</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>

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
                        <td><a class="iconos" href="{{ url('actualizarUsuario/'.$usuario->id) }}"
                               data-toggle="tooltip" title="Editar" >
                                <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                            </a> |

                            <a class="iconos" href="{{ url('verUsuario/'.$usuario->id) }}"
                               data-toggle="tooltip" title="Ver más" >
                                <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                            </a> |

                            <a class="iconos" href="{{ url('eliminarUsuario/'.$usuario->id) }}"
                               data-toggle="tooltip" title="Eliminar">
                                <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif



            </tbody>
        </table>

        {!! $usuarios->render() !!}

    </div>
@endsection