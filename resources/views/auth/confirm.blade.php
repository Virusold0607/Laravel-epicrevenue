@extends('shared.layout')

@section('body')
    <div class="hero small">
        <div class="container_12">
            <h1 class="semibold hero_heading">Registration Successful</h1>
        </div>
    </div>
        <div class="page-container">
            <div class="container">
                <div class="alert alert-success">{!! $message !!}</div>
            </div>
        </div>
@endsection