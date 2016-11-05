@extends('shared/layout')

@section('body')
    <div class="container" style="height: 20px;"></div>
    <div class="container page-top-margin">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default networks">
                    <div class="panel-heading">Login</div>
                    <div class="panel-body">
                        <form class="" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="email" id="email" name="email" value="{{ old('email') }}">
                                <label class="mdl-textfield__label" for="email">Email</label>
                            
                                @if ($errors->has('email'))
                                    <span class="mdl-textfield__error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>


                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="password" id="password" name="password">
                                <label class="mdl-textfield__label" for="password">Password</label>
                            
                                @if ($errors->has('password'))
                                    <span class="mdl-textfield__error">{{ $errors->first('password') }}</span>
                                @endif
                            </div>

                            <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                                <input type="checkbox" id="remember" class="mdl-checkbox__input" name="remember"  checked>
                                <span class="mdl-checkbox__label">Remember Me</span>
                            </label>

                            <!-- Accent-colored raised button with ripple -->
                            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary" data-upgraded=",MaterialButton,MaterialRipple">
                            Login
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection