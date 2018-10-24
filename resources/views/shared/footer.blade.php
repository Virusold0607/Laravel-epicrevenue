<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-xs-12 hidden-sm hidden-xs">
                <h3 class="footer-brand">Epic Revenue</h3>
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
                    <ul class="border-dashed">
                        <li class="footertitle">Legal</li>
                        <li>
                            <a href="https://epicrevenue.com/privacy ">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="https://epicrevenue.com/terms ">Terms of Service</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>




    <div class="footer-bottom">
        <div class="container">
            <p class="text-left">
                Created and maintained by AdsAndAffiliates &copy; {{ date("Y") }}
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
