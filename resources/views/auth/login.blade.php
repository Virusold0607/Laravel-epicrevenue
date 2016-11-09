@extends('shared/layout')


@section('body')
    <div class="container page-top-margin" style="padding-top: 15px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal form-login" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>
                        
                        <div class="panel-body">
                            <div class="container-fluid">

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="control-label"></label>
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-user"></i>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" />
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label"></label>
                                    <div class="inner-addon left-addon">
                                        <i class="glyphicon glyphicon-lock"></i>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="panel-footer">
                            <div class="container-fluid">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Login
                                    </button>

                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection