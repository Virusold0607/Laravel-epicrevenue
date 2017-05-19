@extends('shared/layout')

@section('body')
    <div class="main dashboard payouts">
        <div class="signup-bg">
            <div class="container">
                <form class="signup-content form-login" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <h1 class="text-center">Signin</h1>
                    <div class="signup-small-container">
                        <ul class="signup-form">
                            <li class="{{ $errors->has('email') ? ' is-invalid' : '' }}">
                                <input type="text" placeholder="Email" value="{{ old('email') }}" type="email" name="email" id="email" />

                                @if ($errors->has('email'))
                                    <span class="help-text" style="color: red;">{{ $errors->first('email') }}</span>
                                @endif
                            </li>
                            <li class="{{ $errors->has('password') ? ' is-invalid' : '' }}">
                                <input placeholder="Password" type="password" name="password" id="password" />

                                @if ($errors->has('password'))
                                    <span style="color: red;">{{ $errors->first('password') }}</span>
                                @endif
                            </li>
                            <li class="text-center">
                                <div class="input-checkbox">
                                    <input id="forget" type="checkbox" name="remember" class="custom-select" checked />
                                    <label for="forget" class="font-large">Remember Me</label>
                                </div>
                            </li>
                            <li class="text-center">
                                <button class="btn default-btn black-button small-round font-large">SIGN	IN</button>
                            </li>
                            <li class="text-center font-large">
                                <a class="color-black" href="{!! url('/password/reset/') !!}">Forgot	your	Password?</a>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(e) {
            $(".custom-select select").selectbox();
            $(".custom-select .sbOptions li:first-child").addClass("active");
        });
    </script>
@endsection