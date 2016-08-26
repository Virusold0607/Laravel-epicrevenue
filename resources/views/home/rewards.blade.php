@extends('shared.layout')

@section('body')
    <div class="hero">
        <div class="container">
            <h1>Get Rewards When You Monetize With Us!</h1>
        </div>
    </div><!-- End .hero -->
    @unless(Auth::check())
        <div class="container">
            <p>Along with our weekly and monthly contest, Our influencers have the ability to use points earned from getting leads, inviting people, coupon codes we randomly give out and more to earn points which they can then use to redeem rewards below.</p>
        </div>
    @endunless
    <div class="container">
        @if(count($rewards)> 0)
            @foreach($rewards as $r)

                <div class="row">
                    <div class="col-sm-3">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">{!! $r->name !!}</h3></div>
                            <div class="panel-body">
                                <div class="reward-img">{!! Html::image('/images/rewards/'. $r->image, 'picture') !!} <br /></div>
                                <p>{!! $r->description !!}</p>
                                @if(Auth::check())
                                    <p><strong>Points Required: </strong>{!! $r->points !!}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-info">Rewards Coming Soon</div>
        @endif
    </div>
@endsection