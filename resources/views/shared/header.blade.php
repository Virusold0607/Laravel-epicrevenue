<header class="{{ $navbar_inverse ? 'transparent-header' : '' }}" id="navbar-header">
    <nav class="navbar {{ $navbar_inverse ? 'navbar-inverse non-sticky navbar-fixed-top' : 'navbar-default' }}" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" title="Influencers Reach">
                    <img class="img-responsive" src="{{ $navbar_inverse ? url('/images/logo.png') : url('/images/logo1.png') }}" alt="Influencers Reach">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->check())
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('/promote') }}">Promote</a></li>
                        <li><a href="{{ url('/campaigns') }}">Campaigns</a></li>
                        <li><a href="{{ url('/reach/') }}">Reach</a></li>
                        <li><a href="{{ url('/rewards') }}">Rewards</a></li>
                        <li><a href="{{ url('/reports') }}">Reports</a></li>
                        <li><a href="{{ url('/contests') }}">Contests</a></li>
                        <li class="dropdown show-user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ url('/images/default-user-icon.png') }}" class="img-responsive nav-user-img" />
                                {!! auth()->user()->firstname !!}
                                <span class="caret"></span>
                            </a>

                            {{--<a href="#" class="dropdown-toggle user-holder" data-toggle="dropdown">--}}
                                {{--<img src="{{ url('/images/default-user-icon.png') }}" class="user-icon img-responsive" />--}}
                                {{--<div class="name">{!! auth()->user()->firstname !!}</div>--}}
                                {{--<b class="caret"></b>--}}
                            {{--</a>--}}
                            <ul class="dropdown-menu">
                                <!--<li><a href="#">Tools</a></li>-->
                                <li><a href="{{ url('/invite') }}">Invite</a></li>
                                <li><a href="{{ url('/payouts') }}">Payouts</a></li>
                                <li><a href="{{ url('/settings') }}">Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('/logout') }}">Logout</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ url('') }}">Home</a></li>
                        <li><a href="{{ url('/influencers') }}">Influencers</a></li>
                        <li><a href="{{ url('/advertisers') }}">Advertisers</a></li>
                        {{--<li><a href="{{ url('/shoutouts') }}">Shoutouts</a></li>--}}
                        <li><a href="{{ url('/rewards') }}">Rewards</a></li>
                        {{--<li><a href="{{ url('/contact') }}">Contact Us</a></li>--}}

                        <li><a href="#login" data-toggle="modal" class="sign_in">Sign in</a></li>
                        <li><a class="sign_up" href="{{ url('/register') }}">Sign Up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>