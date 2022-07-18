@extends('shared.layout')
@section('body')
    <div class="hero text-center border-bottom py-6">
        <div class="container">
            <h1 class="hero-heading">{{ $campaign->name }}</h1>
            @if( !is_null( $custom_rate ) )
                <p class="get-piad">Get paid <span style="text-decoration: line-through;">${{ $campaign->rate }} </span><b>${{ $custom_rate->rate }}</b> per lead.</p>
            @else
                <p class="get-piad">Get paid <b>${{ $campaign->rate }}</b> per lead. </p>
            @endif
        </div>
    </div>
    <div class="page-container no-shadow no-border pb-6">
        <div class="container">
            @if($daily_cap_status)
                <div class="alert alert-danger">This campaign has reached its daily cap ({{ $campaign->daily_cap }} leads a day). It will reset at midnight.</div>
            @endif
            <h2>Category: {{ $campaign->category->name }}</h2>
            <hr>
            <div class="c-info-post">{{ $campaign->description }}</div>
            <div class="c-info-req">
                <h5><strong>Requirements:</strong></h5>
                <div>{{ $campaign->requirements }}</div>
            </div>

            <div class="container" style="height: 20px;"></div>
            @if(auth()->check())
            @unless($daily_cap_status)
                <div id="promotionalLink">
                    <hr>
                    <div class="input-group">
                        <label class="input-group-addon" for="exampleInputAmount">Promotion Link</label>
                        <input type="text" class="form-control" id="exampleInputAmount" value="{{ url('/track/'. $campaign->id . '/' . auth()->user()->id) }}">
                    </div>
                    <hr>
                </div>
            @endunless
            @endif
 

            @unless(is_null($images))
                <h5><strong>Promotional Images:</strong></h5>
                <div class="row">
                    @foreach($images as $file)
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="thumbnail">
                                <img src="/campaign/gallery/image/{!! $campaign->id . '/' . $file !!}" alt="...">
                            </div>
                        </div>
                    @endforeach
                </div>
            @endunless

            <hr>

            <div>
                <a class="btn btn-primary btn-lg" href="{!! url('/campaigns')  !!}">Go Back</a>
            </div>
        </div>
    </div>


@endsection


@section('scripts')

    

@endsection
