@extends('shared/layout')

@section('body')
    <div class="register">
        <div class="hero hero-transparent">
            <div class="container">
                <h1 class="hero-heading">Apply to InfluencersReach</h1>
            </div>
        </div><!-- End .hero -->
        <div class="clearfix"></div>
        <div class="container" style="height:60px;"></div>

        <div class="container">
            <div class="row" id="timeline">
                <div class="col-xs-4">
                    <h4 class="text-center" style="height: 40px;">Account Details</h4>
                    <div>
                        <img src="/images/register/1.png" alt="Step 1" style="margin: 0 auto; display: block;">
                    </div>
                </div>
                <div class="col-xs-4">
                    <h4 class="text-center" style="height: 40px;">Networks</h4>
                    <div>
                        <img src="/images/register/2g.png" alt="Step 2" style="margin: 0 auto; display: block;">
                    </div>
                </div>
                <div class="col-xs-4">
                    <h4 class="text-center" style="height: 40px;">Payment Methods</h4>
                    <div>
                        <img src="/images/register/3g.png" alt="Step 3" style="margin: 0 auto; display: block;">
                    </div>
                </div>
            </div>

            <div class="container" style="height: 30px;"></div>
            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <h2>Reminders</h2>
                <div class="container" style="height: 15px;"></div>
                <ul class="home-list">
                    <li style="margin-bottom: 20px;">Using any other name other than your own is forbidden. </li>
                    <li style="margin-bottom: 20px;">You may not have multiple accounts, you will be banned.</li>
                    <li style="margin-bottom: 20px;">For faster approval you may KiK “influencersreach”.</li>
                </ul>

                <h2>Account Details</h2>
                <div class="container" style="height: 15px;"></div>

                {!! Form::model($user, array('url' => '/influencers/apply', 'method' => 'post', 'class' => '','style' => '')) !!}
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
                        <div class="form-group col-sm-6">
                            {!! Form::label('firstname', 'Firstname', array()) !!}
                            {!! Form::text('firstname', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('lastname', 'Lastname', array()) !!}
                            {!! Form::text('lastname', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email', array()) !!}
                        {!! Form::text('email', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password', array()) !!}
                        {!! Form::password('password', array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password', array()) !!}
                        {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
                    </div>

                    <div>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-2">
                            <input type="checkbox" id="checkbox-2" name="terms" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label">I have <b>read</b> and <b>agree</b> to the <a href="{{ url('/about/terms') }}" target="_blank" title="Terms of Service">Terms of Service</a>.</span>
                        </label>
                        <div class="container" style="height: 12px;"></div>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                            <input type="checkbox" id="checkbox-1" name="privacy" class="mdl-checkbox__input">
                            <span class="mdl-checkbox__label"> I have <b>read</b> and <b>agree</b> to the <a href="{{ url('/about/privacy') }}" target="_blank" title="Privacy Policy">Privacy Policy</a>.</span>
                        </label>
                        <br /><br />
                        <div style="display: block;margin: 0 auto;width: 304px;">
                            {!! app('captcha')->display() !!}
                        </div>
                        <div class="container" style="height: 20px;"></div>

                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" style="margin: 0 auto;display: block;">
                            Next
                        </button>
                        <div class="container" style="height: 30px;"></div>
                    </div>

                    {{--{!! Form::submit('Next', array('class' => 'btn btn-primary btn-lg pull-right')) !!}--}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
