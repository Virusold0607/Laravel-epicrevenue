@extends('master')
@section('content')
@if(Session::has('success'))
{!! Session::get('success') !!}
@else
{!! Session::get('error') !!}
@endif
<h3>Promotion Creative list</h3>
@if(count($promotion_creatives) > 0)
<table class="table table-responsive">
    <thead>
        <tr>
            <th>Id</th>
            <th>Promotion Id</th>
            <th>pid</th>
            <th>Public</th>
            <th>Creative Location</th>
            <th>creative file Type</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        @foreach($promotion_creatives as $c)
        <tr>
            <td>{!! $c->id !!}</td>
            <td>{!! $c->promotion_id !!}</td>
            <td>{!! $c->pid !!}</td>
            <td>{!! $c->public !!}</td>
            <td>{!! $c->creative_location !!}</td>
             <td>{!! $c->creative_filetype !!}</td>
            <td>
            <a href="{!! route('creative.edit', [$c->id]) !!}" class="btn btn-sm">Edit</a>
            </td>
            <td>
             <a href="#">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
<h3>Add New Promotion</h3>
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
{!! Form::open(array('url' => 'creative'))!!}
<div class="input-group-sm">
    {!! Form::select('promotion_id', App\Promotion::orderBy('id', 'ASC')->lists('name', 'id') ,null, array('class' => 'form-control', 'placeholder' => 'Select Your Promotion', 'required'=>'required' )) !!}
</div>
<div class="input-group-sm">
    {!! Form::select('public', array('0' => 'Make it public', '1' => 'Make it private'),null, array('class' => 'form-control', 'placeholder' => 'Select Type', 'required'=>'required' )) !!}
</div>

<div class="input-group-sm">
    {!! Form::file('creative_location', null, array('class' => 'form-control', 'placeholder' => 'Creative Location', 'required'=>'required' )) !!}
</div>

<div class="input-group-sm">
    {!! Form::text('creative_filetype', null, array('class' => 'form-control', 'placeholder' => 'File type no need it will fill by code when upload file', 'required'=>'required' )) !!}
</div>


<div class="input-group-sm">
    <button type="submit" class="btn btn-success pull-right">Update Info</button>
</div>
{!! Form::close() !!}

@endsection