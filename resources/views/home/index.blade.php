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
                        <h4>Do you have a large following ? Apply to our network and start promoting today.</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
                <a href="{{ url('/affiliate/apply') }}" class="btn hero-apply-bttn">Become an Affiliate</a>
            </div>
        </div><!-- End .hero -->

        <div class="hero first-promo">
            <div class="container">
                <div class="col-md-4 col-xs-12">
                <div class="home-promo-photo"><img src="https://i.imgur.com/PsT06Bp.jpg" /></div>
                </div>
                <div class="col-md-8 col-xs-12">
                <h1 class="promo-title">Fiverr</h1>
                <p>Promote this service and get paid $15 per person that orders a $5 gig.</p>
                <a href="{{ url('/affiliate/apply') }}" class="apply-now-button btn">Promote Now</a>
                </div>
            </div>
        </div>
        <div class="hero second-promo">
            <div class="container">
                <div class="col-md-4 col-xs-12">
                <div class="home-promo-photo"><img src="https://i.imgur.com/2BvzlcG.jpg" /></div>
                </div>
                <div class="col-md-8 col-xs-12">
                <h1 class="promo-title">Booking.com</h1>
                <p>Promote this service and earn 4% of each sale. Example send a $1000 booking earn $40.</p>
                <a href="{{ url('/affiliate/apply') }}" class="apply-now-button btn">Promote Now</a>
                </div>
            </div>
        </div>
        <div class="hero third-promo">
            <div class="container">
                <div class="col-md-4 col-xs-12">
                <div class="video"><iframe width="100%" height="215" src="https://www.youtube.com/embed/4fn9u9YtrdY?controls=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></div>
                </div>
                <div class="col-md-8 col-xs-12">
                <h1 class="promo-title">Bust A Cheater</h1>
                <p>Promote this service and get paid $24 per person that purchases the $0.95 trial.</p>
                <a href="{{ url('/affiliate/apply') }}" class="apply-now-button btn">Promote Now</a>
                </div>
            </div>
        </div>

<div class="hero fourth-promo">
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