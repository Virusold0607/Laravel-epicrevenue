@extends('shared/layout')

@section('styles')
@endsection

@section('body')
    <div class="homepage">
        <div class="hero hero-lg hero-homepage" style="max-height: 1000px;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <h1 style="text-transform: uppercase;">Monetize the reach of your social media following</h1>
                        <img src="/images/line-white.png" alt="">
                        <div class="container" style="height: 10px;"></div>
                        <h4>Do you have a fan page, a niche page, a model page, or any other type of page with a large following?</h4>
                        <div class="container" style="height: 8px;"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <a href="{{ url('/influencers/apply') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-margin btn-radius">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>JOIN NOW</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <div class="container" style="height: 400px;"></div>
            </div>
        </div><!-- End .hero -->

        <div class="clearfix"></div>
        <div class="container text-center">
            <h1 class="line-heading center">Become an Influencer</h1>
        </div>
        <div class="clearfix"></div>
        <div class="container" style="height: 40px;"></div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <img class="img-responsive" src="/images/home/e.png" alt="">
            </div>
            <div class="col-sm-6">
                <ul class="home-list">
                    <li>Over 200 Live Promotions</li>
                    <li>Gurantted Top Payouts</li>
                    <li>Free Training & Tools</li>
                    <li>Rewards Program & Contests</li>
                </ul>
                <a href="{{ url('/influencers/apply') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-margin btn-radius">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>JOIN NOW</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="{{ url('/influencers/apply') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-margin btn-radius">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>LEARN MORE</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="hero hero-curved" style="background-color: transparent;">
            <div class="container" style="height: 300px;"></div>
            <div class="container">
                <div class="row text-center offers">
                    <div class="col-sm-4">
                        <div class="ir-icon"><img class="img-responsive" src="/images/home/f.png" alt="See More"></div>
                        <h4>#SEEMORE</h4>
                        <p class="">See visually how your account grows, analyze your audience, target better.</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="ir-icon"><img class="img-responsive" src="/images/home/g.png" alt="MAKEMORE"></div>
                        <h4>#MAKEMORE</h4>
                        <p class="">Paid to post, paid to drive leads, plus a lot more ways to generate revenue.</p>
                    </div>
                    <div class="col-sm-4">
                        <div class="ir-icon"><img class="img-responsive" src="/images/home/h.png" alt="DOMORE"></div>
                        <h4>#DOMORE</h4>
                        <p class="">Use our services, team and exclusive services to grow your brand.</p>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="container" style="height: 500px;"></div>
        </div>
        <div class="clearfix"></div>
        <div class="container" style="height: 100px;"></div>
        <div class="container text-center">
            <h1 class="line-heading center">Become an Influencer</h1>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <ul>
                    <li>Lead Generation</li>
                    <li>Over 200 live promotions</li>
                </ul>
            </div>
            <div class="col-sm-6">
                <img src="/images/" alt="">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container" style="height: 50px;"></div>

        <div class="container text-center">
            <img class="img-responsive" style="padding: 70px 0;margin: 0 auto;width: 250px;" src="https://i.imgur.com/YIisQ4r.png">

            <div class="clearfix"></div>

            <div>
                <a href="{{ url('/influencers/apply') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-padding btn-extra-margin btn-radius">Apply Now</a> <a href="{{ url('/influencers') }}" class="btn btn-gray btn-lg btn-sm-txt btn-extra-padding btn-extra-margin btn-radius">Learn More</a>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="container">
            <hr>
        </div>
        <div class="container text-center">
            <h5 class="font-dark-gray"><strong>Track</strong></h5>
            <h2 style="margin-top:10px; margin-bottom: 20px;">Track your reach</h2>
            <p>From our tracking panel you will be able to see how much clicks your page is driving as well as the amount of revenue being generated <b>in real-time</b>.</p>
            <div class="col-xs-12" style="height:20px;"></div>
            <a href="{{ url('/influencers/apply') }}" class="btn btn-default btn-lg btn-sm-txt btn-extra-padding btn-extra-margin btn-radius">Join Now!</a>
        </div>

        <div class="clearfix"></div>
        <img class="img-responsive" src="{{ url('/images/home/curve.png') }}" alt="Graph">
        <div class="container">
            <hr>
        </div>

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


        <div class="clearfix"></div>
    </div>
    <div class="container">
        <hr>
    </div>
@endsection