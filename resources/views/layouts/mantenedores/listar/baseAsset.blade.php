@extends('layouts.principal')


@section('titulo')
    @yield('titulo')
@endsection

@section('contenido')

    <div class="container">
        @include('layouts.mensajes')

        <div class="panel panel-info">
            <div class="panel-heading ">
                <div class="row">
                    <h3 class="col-xs-12"> @yield('titulo_panel')</h3>
                </div>
                <div class="row">
                    <div class="col-xs-9"></div>

                    <div class="btn-group col-xs-3">

                        <button type="button"
                                class="btn btn-primary "
                                onclick='window.location ="@yield('url_btn_salir')"'>
                            @yield('value_btn_salir')
                        </button>
                    </div>

                </div>

            </div>

            <div class="panel-body">

                <table class="table table-striped col-sm-6 col-xs-12">
                    <thead>
                    <tr> @yield('thead_table') </tr>
                    </thead>
                    <tbody>
                    @yield('tbody_table')
                    </tbody>
                </table>

                @yield('paginador')

            </div>

        </div>
    </div>

@endsection