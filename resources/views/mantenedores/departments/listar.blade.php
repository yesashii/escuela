@extends('layouts.mantenedores.listar.base')


@section('titulo')
    {{ trans('mant_departamentos.tit_listar') }}
@endsection


@section('titulo_panel')
    {{ trans('mant_departamentos.tit_listar') }}
@endsection

<!-- botón nuevo -->
@section('url_btn_nuevo')   {{ url('ingresarDepartamento') }}           @endsection
@section('value_btn_nuevo') {{ trans('mant_departamentos.btn_nuevo') }} @endsection
<!-- fin botón nuevo -->

<!-- botón salir -->
@section('url_btn_salir')   {{ url('#') }}                              @endsection
@section('value_btn_salir') {{ trans('mant_departamentos.btn_salir') }} @endsection
<!-- fin botón salir  -->

<!-- tabla -->
@section('thead_table')
    <th>{{ trans('mant_departamentos.th_name')          }}</th>
    <th>{{ trans('mant_departamentos.th_level')         }}</th>
    <th>{{ trans('mant_departamentos.th_accion')        }}</th>
@endsection

@section('tbody_table')
    @if( count($departments) == 0)
        <tr>
            <td colspan="4">{{ trans('mant_departamentos.msj_no_encontrado') }}</td>
            <td> <button type="button" class="btn btn-primary  "
                         onclick='window.location ="{{ url("listarDepartamentos") }}"'
                >{{ trans('mant_departamentos.btn_volver') }}
                </button></td>
        </tr>
    @else
        <form action={{ url("listarDepartamentos") }} method="post">
            {{ csrf_field() }}
            <tr>
                <td>
                    <input type="text" class="form-control" name="name" id="name"
                           placeholder="{{ trans('mant_departamentos.ph_name') }}">
                </td>

                <td>
                    <select class="form-control" name="levelDepartments_id" id="levelDepartments_id">
                        <option  value="0">{{ trans('mant_departamentos.isd_level') }}</option>
                        @foreach( $niveles as $nivele )
                            <option value="{{ $nivele->id }}">{{ $nivele->level }}</option>
                        @endforeach
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn btn-primary ">{{ trans('mant_departamentos.btn_buscar') }}</button>
                </td>
            </tr>
        </form>
        @foreach($departments as $department)
            <tr>
                <td>{{ $department->name                    }}</td>
                <td>{{ $department->levelDepartments->level }}</td>

                <td><a class="iconos" href="{{ url('actualizarUsuario/'.$department->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_departamentos.tt_Editar')}}" >
                        <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                    </a> |

                    <a class="iconos" href="{{ url('verUsuario/'.$department->id) }}"
                       data-toggle="tooltip"
                       title="{{ trans('mant_departamentos.tt_ver_mas')}}" >
                        <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                    </a> |
                    <a class="iconos"
                       href="javascript:confirmarEliminar(
                               '{{ url('eliminarUsuario/'.$department->id) }}',
                               '{{ $department->first_name }}',
                               '{{ trans('mant_departamentos.jal_confirm_elmnar_user')}}'
                               )"
                       data-toggle="tooltip"
                       title="{{ trans('mant_departamentos.tt_Eliminar')}}">
                        <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                    </a>

                </td>
            </tr>
        @endforeach


    @endif

@endsection

@section('paginador')
    @if($buscar == 'false')
        {!! $departments->render() !!}
    @endif
@endsection



<!-- fin tabla -->

