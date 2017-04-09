@extends('shared.layout')

@section('body')

    <div class="hero hero-transparent">
        <div class="container">
            <h1 class="hero-heading">Get Rewards When You Monetize With Us</h1>
        </div>
    </div><!-- End .hero -->
    <div class="clearfix"></div>
    <div class="container" style="height:60px;"></div>

    <div class="container">
        @if(count($rewards)> 0)
            <div class="row">
                @foreach($rewards as $r)
                    <div class="col-sm-3">
                        <div class="panel panel-default" style="border-color: #fff; box-shadow: none;">
                            <div class="panel-heading" style="border-color: #fff;"><h3 class="panel-title">{!! $r->name !!}</h3></div>
                            <div class="panel-body" style="border-color: #fff;">
                                <div class="reward-img">{!! Html::image('/images/rewards/'. $r->image, 'picture', ['class' => 'img-responsive', 'style' => '-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;']) !!} <br /></div>
                                <p>{!! $r->description !!}</p>
                                @if(auth()->check())
                                    <p><strong>Points Required: </strong>{!! $r->points !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
        @else
            <div class="clearfix"></div>
            <div class="alert alert-info">Rewards Coming Soon</div>
        @endif
    </div>
@endsection