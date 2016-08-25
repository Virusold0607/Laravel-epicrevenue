@extends('admin.shared.layout')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('body')
    {!! Form::model($campaign, array('url' => '/admin/campaigns/gallery/' . $campaign->id, 'method' => 'put', 'enctype' => 'multipart/form-data', 'id' => 'addCampignGallery')) !!}
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
                <img src="{!! url('/campaign/image/' . $campaign->id) !!}" alt="">
            </td>
        </tr>
        <tr>
            <td>Upload Images</td>
            <td>
                {!! Form::file('images[]', ['multiple', 'type' => 'file', 'accept' => 'image/*']) !!}
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                {!! Form::submit('Upload Images', array('class' => 'btn btn-default')) !!}
            </td>
        </tr>
    </table>
    {!! Form::close() !!}

@endsection