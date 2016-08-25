@extends('shared.layout')

@section('body')
    <div class="hero heading rewards-page">
        <div class="container_12">
            <h1>Get Rewards When You Monetize With Us!</h1>
        </div>
    </div><!-- End .hero -->
    @unless(Auth::check())
    <div class="rewards-page-content">
        <div class="container_12">
            <p>Along with our weekly and monthly contest, Our influencers have the ability to use points earned from getting leads, inviting people, coupon codes we randomly give out and more to earn points which they can then use to redeem rewards below.</p>
        </div>
    </div>
    @endunless
    <div class="page rewards-page">
        <div class="container_12">
            @if(count($rewards)> 0)
            @foreach($rewards as $r)
               
              <div class="grid_3 h_grid_12">
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
             @endforeach
             @else
             <div class="grid_4 h_grid_12">
                <div class="rewards-i">
                    <div class="glyphicon glyphicon-user"></div>
                    <div class="tool-i-title">Rewards Coming Soon</div>
                </div>
            </div>
            @endif
              
        </div>
    </div>
@endsection