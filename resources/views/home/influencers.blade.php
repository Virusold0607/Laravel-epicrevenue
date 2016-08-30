@extends('shared.layout')

@section('body')
    <div class="hero">
        <div class="container">
            <h1>Are you ready to maximize your revenue?</h1>
            <h4>Trusted by more than <span class="green">< Total Publishers ></span> accounts</h4>
        </div>
    </div><!-- End .hero -->

    <div class="container">
        <div class="influencers-page-content text-center">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-television"></i></a> <div class="pill-title">Our Network</div></li>
                <li><a data-toggle="pill" href="#menu1"><i class="fa fa-bar-chart"></i></a> <div class="pill-title">Reporting</div></li>
                <li><a data-toggle="pill" href="#menu2"><i class="fa fa-lightbulb-o"></i></a> <div class="pill-title">Creatives & Landing Pages</div></li>
                <li><a data-toggle="pill" href="#menu3"><i class="fa fa-lock"></i></a> <div class="pill-title">Advanced Security</div></li>
                <li><a data-toggle="pill" href="#menu4"><i class="fa fa-wrench"></i></a> <div class="pill-title">Tools</div></li>
                <li><a data-toggle="pill" href="#menu5"><i class="fa fa-list"></i></a> <div class="pill-title">Features</div></li>
                <li><a data-toggle="pill" href="#menu6"><i class="fa fa-cog"></i></a> <div class="pill-title">Optimization</div></li>
                <li><a data-toggle="pill" href="#menu7"><i class="fa fa-usd"></i></a> <div class="pill-title">Payments</div></li>
            </ul>


            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3 class="tab-title">The best network</h3>
                    <h4 class="tab-sub-title">Simply put, We are the best out heres why.</h4>
                    <p>We offer what your favorite network offers and tons more. We have features they dont have, we have higher conversion rate, we pay you faster, and we offer top of the line support.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3 class="tab-title">Reporting</h3>
                    <h4 class="tab-sub-title">Track your performance in real-time</h4>
                    <p>Once you login to the site you will reach the dashboard. From the dashboard you are able to view your performance and see your clicks, leads, and earnings change in near real-time. Along with the dashboard there is a page dedicated to reporting which allows you to break down your stats even more to see your performance by daily, weekly, monthly and yearly.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3 class="tab-title">Creatives & Landing Pages</h3>
                    <p>Have an idea of something you want to promote? Let our team know and they create it for you. Setup a custom shop, page, etc.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3 class="tab-title">Advanced Security</h3>
                    <p>Our network runs on an SSL secured connection meaning all information is transferred securely. Along with that your personal information is encrpyted with bank level encryption.</p>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h3 class="tab-title">Tools</h3>
                    <p>We have tools impelemented that allows you to track the growth and engagement of your page. See day by day the amount of activity you get per post and the amount of changes that occurs in your follower count.</p>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <h3 class="tab-title">Features</h3>
                    <p>Track your page growth and engagement, easily find influencers to do shoutouts with, these are some of the things you can do as an influencer.</p>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <h3 class="tab-title">Optimization</h3>
                    <p>We have a custom properiety system that automatically optimizate ALL traffic you send. Desktop and mobile traffic is intelligently sent to the best campaign.</p>
                </div>
                <div id="menu7" class="tab-pane fade">
                    <h3 class="tab-title">Weekly Payments!</h3>
                    <p>Every Friday if your balance to be paid is over your set threshold you will be paid. No need to request the payment it will automatically be sent to your selected payment method.</p>
                </div>
            </div>
        </div>
    </div>
@endsection