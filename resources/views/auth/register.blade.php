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

            <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                <div class="panel panel-default networks">
                    <div class="panel-heading">Reminder</div>
                    <div class="panel-body">
                        <ul>
                            <li>Using any other name other than your own is forbidden. </li>
                            <li>You may not have multiple accounts, you will be banned.</li>
                            <li>For faster approval you may KiK “influencersreach”.</li>
                        </ul>
                    </div>
                </div>
            </div>

            {!! Form::model($user, array('url' => '/influencers/apply', 'method' => 'post', 'class' => 'col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2','style' => '')) !!}
            <div class="panel panel-default networks">
                <div class="panel-heading">Account Details</div>
                <div class="panel-body">
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

                    <div class="form-group">
                        {!! Form::label('firstname', 'Firstname', array()) !!}
                        {!! Form::text('firstname', null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lastname', 'Lastname', array()) !!}
                        {!! Form::text('lastname', null, array('class' => 'form-control')) !!}
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

                    {!! Form::checkbox('terms', null, false) !!}&nbsp; I have <b>read</b> and <b>agree</b> to the <a href="{{ url('/about/terms') }}" target="_blank" title="Terms of Service">Terms of Service</a>.
                    <br />
                    {!! Form::checkbox('privacy', null, false) !!}&nbsp; I have <b>read</b> and <b>agree</b> to the <a href="{{ url('/about/privacy') }}" target="_blank" title="Privacy Policy">Privacy Policy</a>.
                    <br /><br />
                    {!! app('captcha')->display() !!}
                </div>
            </div>
            {!! Form::submit('Next', array('class' => 'btn btn-primary btn-lg pull-right')) !!}
            {!! Form::close() !!}

        </div>
    </div>
@endsection
