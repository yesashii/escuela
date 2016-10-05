@extends('layouts.principal')

@section('titulo')
    @yield('titulo_pestania')
@endsection

@section('contenido')

    <div class="row">

        <div class="col-xs-2"></div>
        <div class="panel-group col-xs-8" id="accordion">

            <!--inicio -->
            <div class="panel panel-info">

                <!--Titulo-->
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#">
                            @yield('panel_title')
                        </a>
                    </h4>
                </div>
                <!--Fin Titulo-->

                <div class="panel-body row">
                    @yield('panel_body')

                    <p class="row">
                    <div class="col-xs-10"></div>
                    <div class="col-xs-2">
                        <input type="button" class="btn btn-primary "
                                @yield('location_btn_volver')
                                @yield('value_btn_volver') />
                    </div>
                    </p>
                </div>

            </div>

        </div>
        <div class="col-xs-2"></div>

    </div>

@endsection
