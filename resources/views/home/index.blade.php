@extends('shared/layout')

@section('styles')
@endsection

@section('body')
    <div class="main home">
        <div class="home-banner">

            <div class="home-body">
                <div class="container">
                    <h1>MONETIZE THE REACH OF YOUR  <br/>SOCIAL MEDIA FOLLOWING</h1>
                    <p>Do you have a fan page, a niche page, <br>a model page, or any other type of page with a large following?</p>
                    <a href="{{ route('register') }}" class="btn btn-default btn-lg blue-button">JOIN NOW</a>
                </div>
            </div>
        </div>
        <div class="become-an-influencer">
            <div class="container">
                <div class="text-center">
                    <h2 class="page-title-1">Become	an	Publisher</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/6q3qpxKgioM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                        {{--<iframe width="560" height="315" src="https://www.youtube.com/embed/6q3qpxKgioM?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>--}}
                        {{--<img src="/images/become.png" class="img-responsive">--}}
                    </div>
                    <div class="col-sm-6">
                        <div class="become-an-influencer-text">
                            <ul>
                                <li>Over	200	Live	Promotions</li>
                                <li>Guaranteed Top Payouts</li>
                                <li>Free	Training	&	Tools</li>
                                <li>Rewards	Program	&	Contests</li>
                            </ul>
                            <div class="button-box">
                                <a href="{{ route('register') }}" class="btn btn-default btn-lg blue-button">APPLY  NOW</a>
                                <a href="#" class="btn btn-default btn-lg black-button">LEARN  MORE</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="services">
            {{--<img src="/images/services-bg.png" class="img-responsive">--}}
            <div class="services-wrp">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="service-box">
                                <div class="service-img">
                                    <img src="/images/service1.png" class="img-responsive">
                                </div>
                                <h3>#SEE MORE</h3>
                                <p>See visually how your account grows, </br>analyze your audience, target better.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="service-box">
                                <div class="service-img">
                                    <img src="/images/service2.png" class="img-responsive">
                                </div>
                                <h3>#MAKE MORE</h3>
                                <p>Paid to post, paid to drive leads, </br>plus a lot more ways to generate revenue.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="service-box">
                                <div class="service-img">
                                    <img src="/images/service3.png" class="img-responsive">
                                </div>
                                <h3>#DO MORE</h3>
                                <p>Use our services, </br>team and exclusive services to grow your brand.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="become-an-influencer become-an-advertiser">
            <div class="container">
                <div class="text-center">
                    <h2 class="page-title-2">Become	an	Advertiser</h2>
                </div>
                <div class="row">
                    <div class="col-sm-5 pull-right-laptop">
                        <img src="images/influencer2.png" class="img-responsive">
                    </div>
                    <div class="col-sm-7">
                        <div class="become-an-influencer-text">
                            <ul>
                                <li>Lead	Generation</li>
                                <li>Flat-Rate	Sales</li>
                                <li>Million	of	Conversions</li>
                                <li>1000k+	Active	Publishers</li>
                                <li>No	Monthly	Fees</li>
                                <li>Dedicated	Account	Managers</li>
                            </ul>
                            <div class="button-box">
                                <a href="{{ route('register') }}" class="btn btn-default btn-lg blue-button">APPLY  NOW</a>
                                <a href="#" class="btn btn-default btn-lg black-button">LEARN  MORE</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="track">
            <div class="container">
                <div class="text-center">
                    <h2 class="page-title-3">Track	your	Reach</h2>
                </div>
                <p>From	our	tracking	panel	you	will	be	able	to	see	how	much	clicks	your	page	is	driving as	well	as	the	amount	of	revenue	being	generated	in	real-time.</p>
                <div class="button-box text-center">
                    <a href="{{ route('register') }}" class="btn btn-default btn-lg black-button">JOIN	US</a>
                </div>
                {{--<div class="grap">--}}
                    {{--<img src="/images/grap.png" class="img-responsive">--}}
                {{--</div>--}}
            </div>
        </div>

        <div class="partners">
            <div class="container">
                <div class="text-center">
                    <h2 class="page-title-2">Brands we’ve promoted</h2>
                </div>
                <ul class="row partner-list">
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener1.png" class="img-responsive"></a>
                    </li>
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener2.png" class="img-responsive"></a>
                    </li>
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener3.png" class="img-responsive"></a>
                    </li>
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener4.png" class="img-responsive"></a>
                    </li>
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener5.png" class="img-responsive"></a>
                    </li>
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener6.png" class="img-responsive"></a>
                    </li>
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener7.png" class="img-responsive"></a>
                    </li>
                    <li class="col-sm-3 col-xs-6">
                        <a href="#"><img src="/images/partener8.png" class="img-responsive"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection