@extends('shared/layout')

@section('body')

    <div class="main dashboard payouts">
        <div class="signup-bg">
            <div class="container">
                <form class="signup-content form-login" role="form" method="POST" action="{{ route('register') }}">

                {{--<div class="signup-content">--}}
                    <h1 class="text-center">Apply	to	Epic Revenue</h1>

                    <div class="payment-steps">
                        <ul>
                            <li class="active">
                                <span class="payment-label">Account	Details</span>
                                <div class="graphic">
                                    <span>2</span>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li>
                                <div class="dots step1"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
                            </li>
                            <li class="">
                                <span class="payment-label">Networks</span>
                                <div class="graphic">
                                    <span>2</span>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </li>
                            <li>
                                <div class="dots step2"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></div>
                            </li>
                            <li>
                                <span class="payment-label">Payment	Methods</span>
                                <div class="graphic">
                                    <span>3</span>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="small-container">
                        <h2>REMINDERS</h2>
                        <div class="small-container">
                            <ul class="reminder-list">
                                <li>Using	any	other	name	than	your	own	is	forbidden.</li>
                                <li>You	may	not	have	multiple	accounts,	you	will	be	banned.</li>
                                {{--<li>For	faster	approval	you	may	Kik	“epicrevenue”.</li>--}}
                            </ul>
                        </div>

                        <h2 style="padding-left: 5%;">Account Details</h2>
                        <div class="setting-form singup-section">
                            {{-- Was there an error? --}}
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Form::label('firstname', 'Firstname', array()) !!}
                                    <div class="input-text">
                                        {!! Form::text('firstname', null, array('class' => '')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::label('lastname', 'Lastname', array()) !!}
                                    <div class="input-text">
                                        {!! Form::text('lastname', null, array('class' => '')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    {!! Form::label('email', 'Email', array()) !!}
                                    <div class="input-text">
                                        {!! Form::text('email', null, array('class' => '')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::label('password', 'Password', array()) !!}
                                    <div class="input-text">
                                        {!! Form::password('password', array('class' => '')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {!! Form::label('password_confirmation', 'Confirm Password', array()) !!}
                                    <div class="input-text">
                                        {!! Form::password('password_confirmation', array('class' => '')) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="signup-small-container">
                                        <ul class="signup-form padding-bottom-60">
                                            <li class="text-center input-checkbox-outher">
                                                <div class="input-checkbox">
                                                    <input id="forget" checked="" name="privacy" type="checkbox">
                                                    <label for="forget" class="font-large">I have agreed to <a href="#">Terms of Services</a></label>
                                                </div>
                                            </li>
                                            <li class="text-center input-checkbox-outher">
                                                <div class="input-checkbox">
                                                    <input id="forget1" checked="" name="terms" type="checkbox">
                                                    <label for="forget" class="font-large">I have agreed to <a href="#">Terms of Services</a></label>
                                                </div>
                                            </li>
                                            <li class="text-center">
                                                {!! app('captcha')->display() !!}
                                                {{--<img src="/images/captcha.png" />--}}
                                            </li>
                                            <li class="text-center">
                                                <button class="btn default-btn black-button small-round font-large" type="submit">Next</button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
