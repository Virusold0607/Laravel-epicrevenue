@extends('admin.shared.layout')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('body')
    {!! Form::model($campaign, array('url' => '/admin/campaigns/video/' . $campaign->id, 'method' => 'put', 'enctype' => 'multipart/form-data', 'id' => 'addCampaignVideo')) !!}
    <div class="container">
        {{-- Was there an error? --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <table class="table table-striped table-bordered">
        <tr>
            <td>Campaign name:</td>
            <td>
                {!! $campaign->name !!}
            </td>
        </tr>
        <tr>
            <td valign="top">Campaign description:</td>
            <td>
                {!! $campaign->description !!}
            </td>
        </tr>

        <tr>
            <td>Feature image:</td>
            <td>
                <img src="{!! url('/campaign/video/' . $campaign->id) !!}" alt="">
            </td>
        </tr>
        <tr>
            <td>Upload Images</td>
            <td>
                {!! Form::file('videos[]', ['multiple', 'type' => 'file', 'accept' => 'video/*']) !!}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                {!! Form::submit('Upload Videos', array('class' => 'btn btn-default')) !!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}

@endsection