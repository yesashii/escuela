@extends('layouts.principal')

@section('titulo') {{ trans('mantusuarios.tit_listarUsuario') }} @endsection


@section('contenido')




    <div class="container">

        @include('layouts.mensajes')
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3>{{ trans('mantusuarios.tit_listarUsuario') }}</h3>

                <div class="col-xs-10"></div>

                <div class="btn-group ">
                    <button type="button" class="btn btn-success  "
                            onclick='window.location ="{{ url("ingresarUsuario") }}"'
                            >{{ trans('mantusuarios.btn_nuevo') }}
                    </button>
                </div>

                <div class="btn-group text-right ">
                    <button type="button" class="btn btn-primary "
                            onclick='window.location ="{{ url("mantenedores") }}"'
                            >{{ trans('mantusuarios.btn_salir') }}
                    </button>
                </div>

            </div>
            <div class="panel-body">



        <table class="table table-striped col-sm-6 col-xs-12">
            <thead>
            <tr>
                <th>{{ trans('mantusuarios.th_first_name')      }}</th>
                <th>{{ trans('mantusuarios.th_last_name')       }}</th>
                <th>{{ trans('mantusuarios.th_email')           }}</th>
                <th>{{ trans('mantusuarios.th_identifier')      }}</th>
                <th>{{ trans('mantusuarios.th_accion')          }}</th>
            </tr>
            </thead>
            <tbody>

            @if($numUsuarios == 0)
                <tr>
                    <td colspan="4">{{ trans('mantusuarios.msj_no_encontrado') }}</td>
                    <td> <button type="button" class="btn btn-primary  "
                            onclick='window.location ="{{ url("listarUsuario") }}"'
                            >{{ trans('mantusuarios.btn_volver') }}
                        </button></td>
                </tr>
            @endif

            @if($numUsuarios > 0)
                <form action={{ url("listarUsuario") }} method="post">
                    {{ csrf_field() }}
                <tr>
                    <td>
                        <input type="text" class="form-control" name="first_name" id="first_name"
                               placeholder="{{ trans('mantusuarios.ph_first_name') }}">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="last_name" id="last_name"
                               placeholder="{{ trans('mantusuarios.ph_last_name') }}">
                    </td>

                    <td>
                        <input type="email" class="form-control" name="email" id="email"
                               placeholder="{{ trans('mantusuarios.ph_email') }}">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="identifier" id="identifier"
                               placeholder="{{ trans('mantusuarios.ph_identifier') }}">
                    </td>

                    <td>
                        <button type="submit" class="btn btn-primary ">{{ trans('mantusuarios.btn_buscar') }}</button>
                    </td>
                </tr>
                </form>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->first_name                                                  }}</td>
                        <td>{{ $usuario->last_name                                                   }}</td>
                        <td>{{ $usuario->email                                                       }}</td>
                        <td>{{ $usuario->identifier                                                  }}</td>
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
        </table><br>

        @if($buscar == 'false')
            {!! $usuarios->render() !!}
        @endif


    </div>

   </div>
  </div>
@endsection