@extends('admin.shared.layout')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('body')
    <h2>Campaign #{!! $campaign->id !!} <small><a href="{!! url('/admin/campaigns/'.$campaign->id.'/edit') !!}">edit</a></small></h2>
    <h3><a href="{!! url('/admin/campaigns/gallery/'.$campaign->id.'/edit') !!}">Upload Images</a></h3>
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
    <div class="container">
        <div class="row">
            @foreach($files as $file)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                        <img src="/campaign/gallery/image/{!! $campaign->id . '/' . $file !!}" alt="...">
                        <div class="caption">
                            <p><a href="/admin/campaigns/gallery/image/{!! $campaign->id . '/' . $file !!}/delete" class="btn btn-danger" role="button">Delete</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection