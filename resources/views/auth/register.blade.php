@extends('shared/layout')

@section('body')
    <div class="hero hero-txt">
        <div class="container">
            <h1 class="hero-heading">Become a Influencer</h1>
        </div>
    </div>

    <div class="page wide">
        <div class="container regular">

            <ul id='timeline'>
                <div id='timeline2' style="width:25%"></div>
                <li class='work'>
                    <input class='radio' id='work5' name='works' type='radio' checked>
                    <div class="relative">
                        <span class='date checked'>Account Details</span>
                        <span class='circle checked'>1</span>
                    </div>
                </li>
                <li class='work'>
                    <input class='radio' id='work4' name='works' type='radio'>
                    <div class="relative">
                        <span class='date'>Networks</span>
                        <span class='circle'>2</span>
                    </div>
                </li>
                <li class='work'>
                    <input class='radio' id='work3' name='works' type='radio'>
                    <div class="relative">
                        <span class='date'>Payment Method</span>
                        <span class='circle'>3</span>
                    </div>
                </li>
            </ul>

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

            {!! Form::model($user, array('url' => '/register', 'method' => 'post', 'class' => 'col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2','style' => '')) !!}
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
                {!! Form::submit('Next', array('class' => 'bttn')) !!}
            {!! Form::close() !!}

        </div>
    </div>
@endsection
