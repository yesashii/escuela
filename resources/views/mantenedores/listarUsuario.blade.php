@extends('mantenedores.layouts.principal')

@section('titulo') {{ trans('mantusuarios.tit_listarUsuario') }} @endsection


@section('contenido')

    <div class="container">
        <h1>{{ trans('mantusuarios.tit_listarUsuario') }}</h1>
        <form action={{ url("listarUsuario") }} method="post">
            {{ csrf_field() }}

            <div class="row">
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="first_name">{{ trans('mantusuarios.l_first_name') }}</label>
                    <input type="text" class="form-control" name="first_name" id="first_name"
                           placeholder="{{ trans('mantusuarios.ph_first_name') }}">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="last_name">{{ trans('mantusuarios.l_last_name') }}</label>
                    <input type="text" class="form-control" name="last_name" id="last_name"
                           placeholder="{{ trans('mantusuarios.ph_last_name') }}">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="email">{{ trans('mantusuarios.l_email') }}</label>
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="{{ trans('mantusuarios.ph_email') }}">
                </div>
                <div class="form-group col-sm-6 col-xs-12">
                    <label for="identifier">{{ trans('mantusuarios.l_identifier') }}</label>
                    <input type="text" class="form-control" name="identifier" id="identifier"
                           placeholder="{{ trans('mantusuarios.ph_identifier') }}">
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
                <th>{{ trans('mantusuarios.th_first_name')      }}</th>
                <th>{{ trans('mantusuarios.th_last_name')       }}</th>
                <th>{{ trans('mantusuarios.th_email')           }}</th>
                <th>{{ trans('mantusuarios.th_identifier')      }}</th>
                <th>{{ trans('mantusuarios.th_cities_name')     }}</th>
                <th>{{ trans('mantusuarios.th_countries_name')  }}</th>
                <th>{{ trans('mantusuarios.th_accion')          }}</th>
            </tr>
            </thead>
            <tbody>

            @if($numUsuarios == 0)
                <tr>
                    <td>{{ trans('mantusuarios.msj_no_encontrado') }}</td>
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
                               data-toggle="tooltip"
                               title="{{ trans('mantusuarios.tt_Editar')}}" >
                                <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                            </a> |

                            <a class="iconos" href="{{ url('verUsuario/'.$usuario->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('mantusuarios.tt_ver_mas')}}" >
                                <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                            </a> |
                            <a class="iconos"
                               href="javascript:confirmarEliminar(
                               '{{ url('eliminarUsuario/'.$usuario->id) }}',
                               '{{ $usuario->first_name }}',
                               '{{ trans('mantusuarios.jal_confirm_elmnar_user')}}'
                               )"
                               data-toggle="tooltip"
                               title="{{ trans('mantusuarios.tt_Eliminar')}}">
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