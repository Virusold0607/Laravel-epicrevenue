@extends('shared/layout')

@section('styles')
@endsection

@section('body')
    <div class="homepage">
        <div class="hero main-promo">
            <div class="container">
                <h1>Monetize the reach of your social media following</h1>
                <div class="row">
                    <div class="col-sm-8">
                        <h4>Monetize, track, manage, and optimize your reach and promotions all in one place.</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
                <a href="{{ url('/affiliate/apply') }}" class="hero-apply-bttn btn ">Become an Affiliate</a>
            </div>
        </div><!-- End .hero -->

        @foreach($featured_campaigns as $campaign)
            @if(empty($campaign->campaign->homepage_featured_image_background))
                @if(empty($campaign->campaign->homepage_featured_image))
                    @php($bg = '/campaign/image/'. $campaign->id)
                @else
                    @php($bg = "/storage/images/campaign/" . $campaign->campaign->homepage_featured_image)
                @endif
            @else
                @php($bg = "/storage/images/campaign/" . $campaign->campaign->homepage_featured_image_background)
            @endif
            <div class="hero" style="background: url('{!! url($bg) !!}') #000;">
                <div class="container">
                    <div class="col-md-4 col-xs-12">
                        <div class="home-promo-photo">
                            @if(empty($campaign->campaign->homepage_featured_image_background))
                                @if(empty($campaign->campaign->homepage_featured_image))
                                    @php($image = '/campaign/image/'. $campaign->id)
                                @else
                                    @php($image = "/storage/images/campaign/" . $campaign->campaign->homepage_featured_image)
                                @endif
                            @else
                                @php($image = "/storage/images/campaign/" . $campaign->campaign->homepage_featured_image_background)
                            @endif
                            <img src="{!! url($image) !!}" alt="Campaign Image" />
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <h1 class="promo-title">{{$campaign->name}}</h1>
                        <p>{{$campaign->description}}</p>
                        <a href="{{ url('/affiliate/apply') }}" class="apply-now-button btn">Promote Now</a>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="hero fifth-promo">
            <div class="container text-center">
                <h2 style="padding: 70px 0;">Brands we've promoted</h2>
                <div class="row">
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/ICM-Logo.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/booking.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/expedia.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/groupon.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/king.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/netflix.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/nook.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/skout.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/wordswithfriends.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/amazon.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/pocket.png') }}" alt=""/></div>
                    <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/dena.png') }}" alt=""/></div>
                </div>
            </div>
        </div>
    </div>
@endsection