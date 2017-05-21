<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-6 pull-right" style="z-index: 1;">
                <div class="row">
                    <div class="col-sm-6" style="z-index: 1;">
                        <div class="footer-navigation">
                            <h4>Navigation</h4>
                            <ul>
                                <li><a href="{{ url('/about') }}">About</a></li>
                                @if(!auth()->check())
                                <li><a href="{{ url('/influencers/apply') }}">Sign Up</a></li>
                                @endif
                                <li><a href="{{ url('/faqs') }}">FAQ’s</a></li>
                                <li><a href="{{ url('/rewards') }}">Rewards</a></li>
                                @if(!auth()->check())
                                <li><a href="{{ url('/login') }}">Sign In</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6" style="z-index: 1;">
                        <div class="footer-navigation">
                            <h4>Legal</h4>
                            <ul>
                                <li><a href="{{ url('/privacy') }}">Privacy Policy</a></li>
                                <li><a href="{{ url('/privacy') }}">Cookies</a></li>
                                <li class="full"><a href="{{ url('/terms') }}">Terms of Service</a></li>
                                <li class="full"><a href="{{ url('/privacy') }}">User Agreement</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="footer-about">
                    <h4>About InfluencersReach</h4>
                    <p>Our network operates the largest influencer network in the world. Using our platform advertisers can target the largest markets to the narrowest niches through social media. With our unique advertising options advertisers only pay for quality leads.</p>
                </div>
            </div>
        </div>
    </div>
</div>