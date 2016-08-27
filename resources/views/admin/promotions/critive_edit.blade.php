@extends('master')
@section('content')
<h3> Update promotion creative  information</h3>
{!! Form::model($creative, url(''=> '')!!}
{!! Form::open(array('url' => 'creative'))!!}
<div class="input-group-sm">
    {!! Form::select('promotion_id', App\Promotion::orderBy('id', 'ASC')->pluck('name', 'id') ,null, array('class' => 'form-control', 'placeholder' => 'Select Your Promotion', 'required'=>'required' )) !!}
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
  <a href="{!! route('creative.index') !!}" class="btn btn-success">Cancel</a>  <button type="submit" class="btn btn-success pull-right">Update Info</button>
</div>
{!! Form::close() !!}
@endsection