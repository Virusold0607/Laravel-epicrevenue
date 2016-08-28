@extends('shared.layout')

@section('body')
    <div class="hero">
        <div class="container">
            <h1>Are you ready to maximize your revenue?</h1>
        </div>
        <div>Trusted by more than <span class="green">< Total Publishers ></span> accounts</div>
    </div><!-- End .hero -->

    <div class="container">
        <div class="influencers-page-content text-center">
            <ul class="nav nav-pills">
                <li class="active"><a data-toggle="pill" href="#home"><i class="fa fa-television"></i></a> <div class="pill-title">Our Network</div></li>
                <li><a data-toggle="pill" href="#menu1"><i class="fa fa-bar-chart"></i></a> <div class="pill-title">Reporting</div></li>
                <li><a data-toggle="pill" href="#menu2"><i class="fa fa-lightbulb-o"></i></a> <div class="pill-title">Innovative Landing pages</div></li>
                <li><a data-toggle="pill" href="#menu3"><i class="fa fa-file-image-o"></i></a> <div class="pill-title">Creatives</div></li>
                <li><a data-toggle="pill" href="#menu4"><i class="fa fa-wrench"></i></a> <div class="pill-title">Tools</div></li>
                <li><a data-toggle="pill" href="#menu5"><i class="fa fa-list"></i></a> <div class="pill-title">Features</div></li>
                <li><a data-toggle="pill" href="#menu6"><i class="fa fa-cog"></i></a> <div class="pill-title">Optimization</div></li>
                <li><a data-toggle="pill" href="#menu7"><i class="fa fa-usd"></i></a> <div class="pill-title">Payments</div></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <h3 class="tab-title">Why You Should Apply To Our Network?</h3>
                    <h4 class="tab-sub-title">Simply put, We are the best out heres why.</h4>
                    <p>Influencers Reach gives you instantaneous access to a large number of campaigns when you join. Along with those campaigns your affilaite manager will often offer you custom promotions to post on your page. Last but not least by joining Influencers Reach your page is available to our advertisers who may offer you content to promote.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <h3 class="tab-title">Reporting</h3>
                    <h4 class="tab-sub-title">Track your performance in real-time</h4>
                    <p>Once you login to the site you will reach the dashboard. From the dashboard you are able to view your performance and see your clicks, leads, and earnings change in near real-time. Along with the dashboard there is a page dedicated to reporting which allows you to break down your stats even more to see your performance by daily, weekly, monthly and yearly.</p>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3 class="tab-title">Innovative Landing pages</h3>
                    <h4 class="tab-sub-title">Better landing pages means... A lot more revenue!</h4>
                    <p>We have a team of designers that ensures that all of our landing pages are appealing, responsive and loads fast. These landing pages paired with our API's gives users a seamless experience which means higher conversation rate.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3 class="tab-title">Creatives</h3>
                    <p>We provide tons of images and media to use when doing promotions. We also have a feature that allows our influencers to share their creatives with each other.</p>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <h3 class="tab-title">Tools</h3>
                    <p>We have tools impelemented that allows you to track the growth and engagement of your page. See day by day the amount of activity you get per post and the amount of changes that occurs in your follower count.</p>
                </div>
                <div id="menu5" class="tab-pane fade">
                    <h3 class="tab-title">Features</h3>
                    <p>We provide many features for you to interact with other users such as out live chat. We also provide a shoutout features that automatically matches you with other users who you can shoutout and they can return the favor.</p>
                </div>
                <div id="menu6" class="tab-pane fade">
                    <h3 class="tab-title">Optimization</h3>
                    <p>With better optimization comes better revenue which is why we have a system in place that properly distribute all in coming tracking to the right campaign to ensure higher revenue.</p>
                </div>
                <div id="menu7" class="tab-pane fade">
                    <h3 class="tab-title">Payments are sent every Friday!</h3>
                    <p>We send out payments to our members every Friday on a Net-5 payment term. What Net-5 means is the revenue generated for the current week will be paid to you Friday of the following week.</p>
                </div>
            </div>
        </div>
    </div>
@endsection