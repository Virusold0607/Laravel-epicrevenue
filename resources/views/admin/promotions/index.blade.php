@extends('admin.shared.layout')

@section('body')
    @if(Session::has('success'))
        {!! Session::get('success') !!}
    @else
        {!! Session::get('error') !!}
    @endif
    <ol class="breadcrumb">
        <li><a href="{!! url('/admin/promotions') !!}">Promotions</a></li>
        <li><a href="{!! url('/admin/promotions') !!}">View Promotions</a></li>
    </ol>
    <div class="table-responsive">
        <table class="table table-bordered ">
            <thead>
            <tr>
                <th>Id</th>
                <th>Status</th>
                <th>Name</th>
                <th>Date Added</th>
                <th>Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($promotions as $c)
                <?php
                if($c->status == 'yes'){
                    $status = 'Active';
                }else{
                    $status = 'Inactive';
                }
                ?>
                <tr>
                    <td>{!! $c->id !!}</td>
                    <td style="color:green">{!! $status !!}</td>
                    <td>{!! $c->name !!}</td>
                    <td>{!! $c->created_at !!}</td>
                    <td>
                        <a href="{!! url('/admin/promotions/' . $c->id . '/edit') !!}" class="btn btn-default">Edit</a>
                        <a href="#" class="btn btn-default">Creative</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $promotions->render() !!}
    </div>
@endsection