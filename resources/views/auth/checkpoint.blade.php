@extends('shared.layout')

@section('body')
    <div class="hero hero-txt">
        <div class="container">
            <h1 class="hero-heading">Account Inaccessible!</h1>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="container">
        <div class="container-fluid">
            <div class="alert alert-danger">{!! $middleware_error !!}</div>
        </div>
    </div>
@endsection