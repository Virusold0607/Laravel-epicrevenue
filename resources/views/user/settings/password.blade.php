@extends('shared.layout')

@section('body')
    <div class="hero small">
        <div class="container_12">
            <h1 class="semibold hero_heading">Settings</h1>
        </div>
    </div>
    <div class="page wide">
        <div class="container_12">
            <div class="grid_4 h_grid_12">
                <div class="panel panel-default">
                    <div class="panel-heading">Change Password</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger" role="alert">
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        {!! Form::open(array('url' => '/settings/updatePassword', 'method' => 'post'))!!}
                            <div class="form-group">
                                {!! Form::label('currentPassword', 'Current Password', array('class' => 'control-label')) !!}
                                {!! Form::password('currentPassword', array('class' => 'form-control', 'required'=>'required')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password', 'New Password', array()) !!}
                                {!! Form::password('password', array('class' => 'form-control', 'required'=>'required')) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password_confirmation', 'Confirm Password', array()) !!}
                                {!! Form::password('password_confirmation', array('class' => 'form-control', 'required'=>'required')) !!}
                            </div>
                            {!! Form::submit('Update Password', array('class' => 'btn btn-default')) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection