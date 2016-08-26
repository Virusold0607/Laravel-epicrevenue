<div class="container" style="height:20px;"></div>
<div class="container">
    <hr>
</div>
<div class="container" style="height:5px;"></div>
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1 col-xs-12">
                <h3 class="footer-brand">influencers<strong>reach</strong></h3>
                <div class="social-icons">
                    <a target="_blank" href="https://www.facebook.com/influencersreach"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://twitter.com/useinfluencers"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://www.google.com/+Influencersreach"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    <a target="_blank" href="https://instagram.com/influencersreach/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row col-sm-7">
                <div class="col-sm-4 col-xs-12">
                    <ul>
                        <li class="footertitle">Navigation</li>
                        <li>
                            <a href="http://blog.influencersreach.com/" target="_blank">Blog</a>
                        </li>
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
                            <a href="#login" data-toggle="modal">Sign In ?</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <ul>
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
        <div class="clearfix"></div>
    </div>

    <div class="container" style="height:20px;"></div>
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

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="login_label">Sign in</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(array('url' => '/login', 'method' => 'post', 'class' => 'form-stacked')) !!}
                <div class="form-group">
                    {!! Form::email('email', null, array('class' => 'form-control' ,'placeholder' => 'Email')) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', array('class' => 'form-control' ,'placeholder' => 'Password')) !!}
                </div>
                <input type="checkbox" name="remember" />
                Remember Me
                <div class="form-group" style="margin-top: 10px;">
                    {!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}
                </div>
                <div class="form-group">
                    <p>
                        <a href="{{ url('/password/email') }}">Can't access your account?</a>
                    </p>
                    <p>
                        <a href="{{ url('/register') }}">Don't have an account?</a>
                    </p>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
