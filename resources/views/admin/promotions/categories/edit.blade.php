@extends('master')
@section('content')
<h3>Update Category</h3>
@if(Session::has('success'))
{!! Session::get('success') !!}
@else
{!! Session::get('error') !!}
@endif
{!! Form::model($category, url(''=>'', [])!!}
<div class="input-group-sm">
    {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Category Name', 'required'=>'required' )) !!}
</div>
<div class="input-group-sm">
    <button type="submit" class="btn btn-success pull-right">Add Category</button>
</div>
{!! Form::close() !!}
@endsection