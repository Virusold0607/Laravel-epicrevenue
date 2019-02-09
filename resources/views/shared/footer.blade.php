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
                <a href="https://ggxcompany.com">Funded by GG x Company</a> and <a href="https://servicedbyone.com">Created by Serviced By ONE</a> <a href="https://tevarj.com/jeffery-scaggs/">Jeffery Scaggs</a> | <a href="https://tevarj.com/scaggs-law-firm/">Scaggs Law Firm</a>
                <br />
                &copy; {{ date("Y")}}. All rights reserved  
            </p>
        </div>
    </div>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37796498-35"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-37796498-35');
</script>

