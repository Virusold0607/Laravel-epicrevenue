@extends('shared/layout')

@section('body')
 
<div class="hero main-promo text-white border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <h1 class="pb-2">Monetize the reach of your following</h1>
                <h4 class="col-lg-8 pb-2">Find great brands, products, and services to promote.</h4>
                <a href="{{ url('/account/create') }}" class="hero-apply-bttn btn btn-lg btn-primary">Become an Affiliate</a>
            </div>
        </div>
    </div>
</div><!-- End .hero -->
<div class="hero info-promo py-8">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="p-2">
                    <div class="black rounded p-6">
                        <img src="https://epicrevenue.com/assets/img/influencers.jpg" class="w-100 rounded" />
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-10 mx-auto">
                <div class="pt-8">
                    <h3 class="fw-700 fs-30 mb-4">Popular fashion and beauty brands are experiencing explosive growth online with influencers.</h3>
                    <p class="fs-18">The global fashion influencer marketing market was warth over S1 billion in 2019. according to Grand Vien Research, Scaling up an influencer and affiliate campalans is e8su with Refersions tracking capabilities, See how these fashion brands achieve growth with affiliate campaigns.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="hero fifth-promo">
    <div class="container text-center">
        <h2 style="padding: 70px 0;">Brands we've promoted</h2>
        <div class="row">

        <!--
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
        -->
        </div>
    </div>
</div>
 
@endsection
