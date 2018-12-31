@extends('shared/layout')


@section('body')
    @if($is_mobile)
<div class="container page-top-margin" style="padding-top: 15px; margin-bottom: 50px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal form-login" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                        <h2>Login</h2>
                    
                        <div class="container">

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

                        </div>
                        <div class="container-fluid" style="height: 15px;"></div>
                        <div class="text-left" style="display: inline-block;padding-top: 6px;">
                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                                <input type="checkbox" id="remember" class="mdl-checkbox__input">
                                <span class="mdl-checkbox__label">Remember Me</span>
                            </label>
                        </div>
                        <div class="text-right" style="display: inline-block;position: absolute;right:0;">
                            <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </div>
                        <div class="container-fluid" style="height: 15px;"></div>
                        
                        <!-- Colored raised button -->
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="background-color: #3b76ed;width: 100%">
                        Login
                        </button>
                </form>
            </div>
        </div>
    </div>
    @else
    <div class="container page-top-margin" style="padding-top: 15px; margin-bottom: 50px;">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal form-login" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                        <h2>Login</h2>
                    
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
                        <div class="container-fluid">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="btn btn-primary"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection