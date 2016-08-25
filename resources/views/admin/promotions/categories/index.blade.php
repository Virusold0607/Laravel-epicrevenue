@extends('admin.shared.layout')

@section('body')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {!! Session::get('success') !!}
        </div>
    @elseif(Session::has('error'))
        <div class="alert alert-danger">
            {!! Session::get('error') !!}
        </div>
    @endif

    @if(count($categories) > 0)
        <div class ="table-responsive">
            <table class="table table-condensed table-bordered">
                <thead>
                <tr>
                    <th colspan="3" style="background-color: green; border:none; font-weight:bold; font-size:20px; color:white;">Category</th>
                </tr>
                <tr>
                    <th><b>Category ID</b></th>
                    <th><b>Category Name</b></th>
                    <th><b>Options</b></th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $c)
                    <tr>
                        <td>{!! $c->id !!}</td>
                        <td>{!! $c->name !!}</td>
                        <td>
                            <a href="{!! url('/admin/promotions/delete', [$c->id])!!}" class="btn btn-default">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
    <div class="form-group">
        <label for="categories" class="col-sm-2 control-label"></label>
        <div class="col-sm-9">
            <h3>Add new category</h3>
        </div>
    </div>
    {{--@if(count($errors) > 0)--}}
        {{--<div class="alert alert-danger">--}}
            {{--<ul style="list-style-type:none;>--}}
            {{--@foreach ($errors->all() as $error)--}}
                    {{--<li">--}}
                {{--@foreach($errors->all() as $error)--}}
                    {{--<li>{{ $error }}</li>--}}
                {{--@endforeach--}}
            {{--</ul>--}}
        {{--</div>--}}
    {{--@endif--}}
    {!! Form::open(array('url' => '/admin/promotions/categories', 'class' => 'form-horizontal'))!!}
        <div class="form-group">
            <label for="categories" class="col-sm-2 control-label">Category Name</label>
            <div class="col-sm-9">
                {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Category Name', 'required'=>'required' )) !!}
            </div>
        </div>

        <div class="form-group">
            <label for="categories" class="col-sm-2 control-label"></label>
            <div class="col-sm-9">
                <button type="submit" class="btn btn-default">Add Category</button>
            </div>
        </div>
    {!! Form::close() !!}
@endsection