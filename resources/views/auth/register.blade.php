@extends('shared/layout')

@section('body')
<div class="hero hero-auth">
    <div class="container">
        <center>
            <h2>Become a Epic Revenue Affiliate</h2>
            <p>Start promoting some of the top products and brand in as soon as 24 hours!</p>
        </center>
    </div>
</div><!-- End .hero -->

<div class="container">
    <!-- row -->
    <div class="row">
        <!-- col -->
        <div class="col-lg-8 col-12 mx-auto">
            <!-- card -->
            <div class="px-4 py-3 py-lg-4 card rounded">
            <!--
            <ul id='timeline'>
                <span id='timeline2' style="width:25%"></span>
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
                        <span class='date'>Address</span>
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
            -->
            {!! Form::model($user, array('url' => '/affiliate/apply', 'method' => 'post', 'class' => 'col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2','style' => '')) !!}
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

                    {!! Form::checkbox('terms', null, false) !!}&nbsp; I have <b>read</b> and <b>agree</b> to the <a href="{{ url('/terms') }}" target="_blank" title="Terms of Service">Terms of Service</a>.
                    <br />
                    {!! Form::checkbox('privacy', null, false) !!}&nbsp; I have <b>read</b> and <b>agree</b> to the <a href="{{ url('/privacy') }}" target="_blank" title="Privacy Policy">Privacy Policy</a>.
                    <br /><br />
                    {!! app('captcha')->display() !!}
                </div>
            </div>
            {!! Form::submit('Next', array('class' => 'btn btn-primary btn-lg pull-right')) !!}
            {!! Form::close() !!}

            </div>
            <!-- !card -->
        </div>
        <!-- !col -->
    </div>
    <!-- !row -->
</div>
@endsection
