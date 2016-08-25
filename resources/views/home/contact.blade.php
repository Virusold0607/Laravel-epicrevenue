@extends('shared.layout')

@section('body')
    <div class="hero small">
        <div class="container_12">
            <h1 class="semibold hero_heading">Contact us</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3" style="margin-top: 40px; margin-bottom: 40px;">
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('success') }}</div>
                @else
                    {!! Form::open(array('url' => 'contact', 'method' => 'post')) !!}
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
                            {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Your Name')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Enter Email')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('subject', null, array('class' => 'form-control', 'placeholder' => 'Subject')) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::textarea('message', null, array('class' => 'form-control', 'placeholder' => 'Type your message here')) !!}
                        </div>
                        {!! Form::submit('Submit', array('class' => 'bttn')) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>
@endsection