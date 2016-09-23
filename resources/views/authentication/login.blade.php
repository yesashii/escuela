@extends('authentication.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('auth.login') }}</div>
                    <div class="panel-body">
                        <form class="form" action="{{ route('auth/login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>{{ trans('auth.usuario') }}</label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label>{{ trans('auth.pass') }}</label>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="password" name="password" id="password">
                            </div>

                            <div class="checkbox">
                                <label><input name="remember" type="checkbox"> {{ trans('auth.recordar') }}</label>
                            </div>

                            <input class="btn btn-primary" type="submit" value="{{ trans('auth.boton_login') }}">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection