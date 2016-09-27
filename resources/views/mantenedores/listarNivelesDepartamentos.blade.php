@extends('layouts.principal')

@section('titulo') {{ trans('mantLvDepartamentos.tit_listarNivelDepartamentos') }} @endsection

@section('contenido')

	<div class="container">
		<h1>{{ trans('mantLvDepartamentos.tit_listarNivelDepartamentos') }}</h1>
		<form action="" method="post">
			{{ csrf_field() }}

			<div class="row col-xs-4">
					 <label for="level">{{ trans('mantLvDepartamentos.l_level') }}</label>
					<select class="form-control" name="level" id="level">
						<option  value="">{{ trans('mantLvDepartamentos.isd_level') }}</option>
						@foreach( $cantidades as $cantidad )
								<option value="{{ $cantidad->id }}">{{ $cantidad->level }}</option>
						@endforeach
					</select>
			</div>

            <div class="container">
                <p class="row" >
                <div class="btn-group ">
                    <button type="submit" class="btn btn-primary ">{{ trans('mantLvDepartamentos.btn_buscar') }}</button>
                </div>
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary "
                            class="btn btn-primary">{{ trans('mantLvDepartamentos.btn_nuevo') }}
                    </button>
                </div>
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary "
                            class="btn btn-primary">{{ trans('mantLvDepartamentos.btn_salir') }}
                    </button>
                </div>

                </p>
            </div>



		</form>
	</div>

    <div class="container">
        <table class="table">
            <thead>
            <tr class="row">
                <th class="col-xs-10"> {{ trans('mantLvDepartamentos.th_level')      }}</th>
                <th class="col-xs-2">  {{ trans('mantLvDepartamentos.th_accion')      }}  </th>
            </tr>
            </thead>
            <tbody>

            @if($numnivelesDepartamentos == 0)
                <tr>
                    <td>{{ trans('mantLvDepartamentos.msj_no_encontrado') }}</td>
                </tr>
            @endif

            @if($numnivelesDepartamentos > 0)
                @foreach($nivelesDepartamentos as $nivelesDepartamento)
                    <tr class="row">
                        <td class="col-xs-10">{{ $nivelesDepartamento->level }}</td>
                        <td class="col-xs-2"><a class="iconos" href=""
                               data-toggle="tooltip"
                               title="{{ trans('mantLvDepartamentos.tt_Editar')}}" >
                                <img src="{{ url('img/ic_edit_black_18dp_1x.png') }}"/>
                            </a> |

                            <a class="iconos" href=""
                               data-toggle="tooltip"
                               title="{{ trans('mantLvDepartamentos.tt_ver_mas')}}" >
                                <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                            </a> |
                            <a class="iconos"
                               href="javascript:confirmarEliminar(
                               '{{ url('eliminarNivelDepartamento/'.$nivelesDepartamento->id) }}',
                               '{{ $nivelesDepartamento->level }}',
                               '{{ trans('mantLvDepartamentos.jal_confirm_elmnar_level')}}'
                               )"
                               data-toggle="tooltip"
                               title="{{ trans('mantLvDepartamentos.tt_Eliminar')}}">
                                <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                            </a>

                        </td>
                    </tr>
                @endforeach
            @endif



            </tbody>
        </table>

        {!! $nivelesDepartamentos->render() !!}

    </div>





@endsection