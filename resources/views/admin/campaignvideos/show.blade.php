@extends('admin.shared.layout')

@section('styles')

@endsection

@section('scripts')

@endsection

@section('body')
    <h2>Campaign #{!! $campaign->id !!} <small><a href="{!! url('/admin/campaigns/'.$campaign->id.'/edit') !!}">edit</a></small></h2>
    <a href="{!! url('/admin/campaigns/video/'.$campaign->id.'/edit') !!}" class="btn btn-primary">Upload Videos</a>

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
                        <video controls style="width: 100%;">
                            <source src="/campaign/gallery/video/{!! $campaign->id . '/' . $file !!}" type="video/{{ pathinfo($file, PATHINFO_EXTENSION) }}">
                            Your browser does not support the video element.
                        </video>

                        {{--<img src="/campaign/gallery/video/{!! $campaign->id . '/' . $file !!}" alt="...">--}}
                        <div class="caption">
                            <p><a href="/admin/campaigns/gallery/video/{!! $campaign->id . '/' . $file !!}/delete" class="btn btn-danger" role="button">Delete</a></p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection