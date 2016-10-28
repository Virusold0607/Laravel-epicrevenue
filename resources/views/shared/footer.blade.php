<div class="container" style="height:5px;"></div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12 hidden-sm hidden-xs">
                <h3 class="footer-brand">influencers<strong>reach</strong></h3>
            </div>
            <div class="col-sm-8">
                <div class="col-sm-4 col-xs-12">
                    <ul class="border-dashed">
                        <li class="footertitle">Navigation</li>
                        <li>
                            <a href="{{ url('/about') }}">About</a>
                        </li>
                        <li>
                            <a href="{{ url('/faqs') }}">FAQ's</a>
                        </li>
                        <li>
                            <a href="{{ url('/contact') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ url('/login') }}">Sign In ?</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <ul class="border-dashed">
                        <li class="footertitle">Legal</li>
                        <li>
                            <a href="{{ url('/privacy') }} ">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="{{ url('/terms') }} ">Terms of Service</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <ul>
                        <li class="footertitle">Get Connected</li>
                        <li class="social-icons">
                            <a target="_blank" href="https://www.facebook.com/influencersreach"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://twitter.com/useinfluencers"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://www.google.com/+Influencersreach"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a target="_blank" href="https://instagram.com/influencersreach/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="container">
        <hr>
    </div>
    <div class="container" style="height:10px;"></div>

    <div class="footer-bottom">
        <div class="container">
            <p class="text-left">
                Created and maintained by Influencers Reach &copy;{{ date("Y") }}
            </p>
            <ul class="text-right pull-right">
                <li><a href="#">USER AGREEMENT</a></li>
                <li><a href="{{ url('/privacy') }}">PRIVACY</a></li>
                <li><a href="#">COOKIES</a></li>
                <li><a href="{{ url('/terms') }}">TERMS OF SERVICES</a></li>
            </ul>
        </div>
    </div>
</div>