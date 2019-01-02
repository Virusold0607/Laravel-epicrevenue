<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-xs-12">
                <img class="footer-logo-image" src="/images/footer-logo.png">
            </div>
            <div class="col-sm-5">
                <div class="col-sm-6 col-xs-12">
                    <ul class="border-dashed">
                        <li class="footertitle">Navigation</li>
                        <li>
                            <a href="{{ url('/about') }}">About</a>
                        </li>
                        <li>
                            <a href="{{ url('/faqs') }}">FAQ's</a>
                        </li>
                        <!--
                        <li>
                            <a href="{{ url('/contact') }}">Contact</a>
                        </li>
                        -->
                        <li>
                            <a href="{{ url('/login') }}">Sign In ?</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-6 col-xs-12">
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

            </div>
        </div>

    </div>




    <div class="footer-bottom">
        <div class="container">
            <p class="text-left">
                Funded by <a href="https://ggxcompany.com">GG x Company</a>, Created by <a href="https://servicedbyone.com">Serviced By ONE</a> &copy; {{ date("Y") }} 
            </p>
        </div>
    </div>
</div>
