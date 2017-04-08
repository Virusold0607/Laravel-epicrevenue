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
                <a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-margin btn-radius">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>LEARN MORE</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
        <div class="container" style="height: 30px;"></div>
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2">
                <ul class="home-list">
                    <li>Lead Generation</li>
                    <li>Flat Rate Sales</li>
                    <li>Millions of Conversion</li>
                    <li>1000k+ Active Publishers</li>
                    <li>No Monthly Fees</li>
                    <li>Dedicated Account Managers</li>
                </ul>
                <a href="{{ url('/influencers/apply') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-margin btn-radius">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>JOIN NOW</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-margin btn-radius">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>LEARN MORE</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
            <div class="col-sm-5 col-sm-offset-1">
                <img class="img-responsive" src="/images/home/laptop.png" alt="">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="container" style="height: 50px;"></div>

        <div class="container text-center">
            <h1 class="line-heading center" style="font-weight: normal">Track your reach</h1>
            <div class="container" style="height: 30px;"></div>
            <p class="text-left col-sm-10" style="font-size: 16px;">From our tracking panel you will be able to see how much clicks your page is driving as well as the amount of revenue being generated <b>in real-time</b>.</p>
            <div class="col-xs-12" style="height:20px;"></div>
            <div class="clearfix"></div>
            <a href="{{ url('/influencers/apply') }}" class="btn btn-primary btn-lg btn-sm-txt btn-extra-margin btn-radius">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>JOIN NOW</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        </div>

        <div class="clearfix"></div>
        <div class="container" style="height: 100px;"></div>

        <div class="container">
            <img class="img-responsive" src="/images/home/j.png" alt="Earnings Graph" style="margin: 0 auto;">
        </div>

        <div class="clearfix"></div>
        <div class="container" style="height: 100px;"></div>

        <div class="container text-left">
            <h1 class="line-heading center" style="font-weight: normal; font-size: 50px;">Brands we've promoted</h1>
            <div class="container" style="height: 50px;"></div>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/amazon.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/king.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/netflix.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/dena.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/ICM-Logo.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/booking.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/expedia.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/groupon.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/nook.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/skout.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/wordswithfriends.png') }}" alt=""/></div>
                <div class="col-md-2 col-sm-3 col-xs-6 brand"><img class="img-responsive" src="{{ url('/images/home/clients/pocket.png') }}" alt=""/></div>
            </div>
        </div>


        <div class="clearfix"></div>
    </div>
    <div class="container">
        <hr>
    </div>
@endsection