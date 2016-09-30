@extends('layouts.principal')


@section('titulo') {{ trans('mantLvCargos.tit_listarNivelCargo') }} @endsection

@section('contenido')



    <div class="container">

        <h1>{{ trans('mantLvCargos.tit_listarNivelCargo') }}</h1>
        @include('layouts.mensajes')



        <form action="{{ url('listarNivelCargo') }}" method="post">
            {{ csrf_field() }}

            <div class="row col-xs-4">
                <label for="level">{{ trans('mantLvCargos.l_level') }}</label>
                <select class="form-control" name="level" id="level">
                    <option  value="0">{{ trans('mantLvCargos.isd_level') }}</option>
                    @foreach( $cantidades as $cantidad )
                        <option value="{{ $cantidad->id }}">{{ $cantidad->level }}</option>
                    @endforeach
                </select>
            </div>


            <div class="container">
                <p class="row" >
                <div class="btn-group ">
                    <button type="submit" class="btn btn-primary ">{{ trans('mantLvCargos.btn_buscar') }}</button>
                </div>
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary "
                            onclick='window.location ="{{ url("ingresarNivelCargo") }}"'
                            class="btn btn-primary">{{ trans('mantLvCargos.btn_nuevo') }}
                    </button>
                </div>
                <div class="btn-group ">
                    <button type="button" class="btn btn-primary "
                            onclick='window.location ="{{ url("mantenedores") }}"'
                            class="btn btn-primary">{{ trans('mantLvCargos.btn_salir') }}
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
                <th class="col-xs-10"> {{ trans('mantLvCargos.th_level')         }}  </th>
                <th class="col-xs-2">  {{ trans('mantLvCargos.th_accion')        }}  </th>
            </tr>
            </thead>
            <tbody>

            @if($numnivelesCargo == 0)
                <tr>
                    <td>{{ trans('mantLvCargos.msj_no_encontrado') }}</td>
                </tr>
            @endif

            @if($numnivelesCargo > 0)
                @foreach($nivelesCargos as $nivelesCargo)
                    <tr class="row">
                        <td class="col-xs-10">{{ $nivelesCargo->level }}</td>
                        <td class="col-xs-2">

                            <a class="iconos"
                               href="{{ url('verNivelCargo/'.$nivelesCargo->id) }}"
                               data-toggle="tooltip"
                               title="{{ trans('mantLvCargos.tt_ver_mas')}}" >
                                <img src="{{ url('img/ic_visibility_black_18dp_1x.png') }}"/>
                            </a>

                            @if( $nivelesCargo->level==$max )

                                @if( count($nivelesCargo->positions) )
                                    | <a class="iconos"
                                         href="javascript:alert('{{ trans('mantLvCargos.jal_error_elmnar_level') }}')"
                                         data-toggle="tooltip"
                                         title="{{ trans('mantLvCargos.tt_Eliminar')}}">
                                        <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                                    </a>
                                @else
                                    | <a class="iconos"
                                         href="javascript:confirmarEliminar(
                                    '{{ url('eliminarNivelCargo/'.$nivelesCargo->id) }}',
                                    '{{ $nivelesCargo->level }}',
                                    '{{ trans('mantLvCargos.jal_confirm_elmnar_level')}}')"

                                         data-toggle="tooltip"
                                         title="{{ trans('mantLvCargos.tt_Eliminar')}}">
                                        <img src="{{ url('img/ic_close_black_18dp_1x.png') }}"/>
                                    </a>
                                @endif

                            @endif

                        </td>
                    </tr>
                @endforeach
            @endif



            </tbody>
        </table>

        {!! $nivelesCargos->render() !!}

    </div>





@endsection