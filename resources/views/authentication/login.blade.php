@extends('authentication.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="form" action="{{ route('auth/login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" id="email">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="password" name="password" id="password">
                            </div>

                            <div class="checkbox">
                                <label><input name="remember" type="checkbox"> Remember me</label>
                            </div>

                            <input class="btn btn-primary" type="submit" value="login">

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection