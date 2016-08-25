@extends('admin.shared.layout')

@section('body')
    {!! Form::model($postback, array('url' => '/admin/postbacks/'.$postback->id, 'method' => 'put')) !!}
    <table class="table table-striped table-bordered">
        <tr>
            <td><b>Network name:</b></td>
            <td>{!! Form::text('name', null, array('required')) !!}</td>
        </tr>
        <tr>
            <td><b>Credit hash:</b></td>
            <td>{!! Form::text('ch_slot', null, array('required')) !!} <small>(slot, s1)</small></td>
        </tr>
        <tr>
            <td><b>Veri Slot:</b></td>
            <td>{!! Form::text('veri_slot', null, array('required')) !!}</td>
        </tr>
        <tr>
            <td></td>
            <td>{!! Form::submit('Create') !!}</td>
        </tr>
    </table>
    {!! Form::close() !!}
@endsection