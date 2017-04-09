<div class="android-header mdl-layout__header mdl-layout__header--waterfall is-casting-shadow">
    <div class="mdl-layout__header-row">
        <span class="android-title mdl-layout-title">
            <img class="android-logo-image" src="/images/logo1.png">
        </span>
        <!-- Add spacer, to align navigation to the right in desktop -->
        <div class="android-header-spacer mdl-layout-spacer"></div>
        <!-- Navigation -->
        <div class="android-navigation-container">
            @if(auth()->check())
                <nav class="android-navigation mdl-navigation">
                    <a href="{{ url('/dashboard') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Dashboard</a>
                    <a href="{{ url('/promote') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Promote</a>
                    <a href="{{ url('/campaigns') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Campaigns</a>
                    {{--<a href="{{ url('/reach/') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reach</a>--}}
                    <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
                    <a href="{{ url('/reports') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reports</a>
                    <a href="{{ url('/contests') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contests</a>
                    <!--<a href="#" class="mdl-navigation__link mdl-typography--text-uppercase nav-user" 
                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ url('/images/default-user-icon.png') }}" class="img-responsive nav-user-img" />
                        <div>{!! auth()->user()->firstname !!}</div><span class="caret"></span>
                    </a>-->
                    <!--<li class="dropdown show-user-menu">
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
                    {{--<li><a href="#">Tools</a></li>--}}
                    <li><a href="{{ url('/invite') }}">Invite</a></li>
                    <li><a href="{{ url('/payouts') }}">Payouts</a></li>
                    <li><a href="{{ url('/settings') }}">Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                    </li>-->
                </nav>
            @else
                <nav class="android-navigation mdl-navigation">
                    <a href="{{ url('') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Home</a></li>
                    <a href="{{ url('/influencers') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Influencers</a>
                    <a href="{{ url('/advertisers') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Advertisers</a>
                    {{--<a href="{{ url('/shoutouts') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Shoutouts</a>--}}
                    <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
                    {{--<a href="{{ url('/contact') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contact Us</a>--}}

                    <a href="{{ url('/login') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_in">Sign in</a>
                    <a href="{{ url('/influencers/apply') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_up">Sign Up</a>  
                </nav>
            @endif
        </div>
        <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="/images/logo1.png">
        </span>

        @if(auth()->check())
        <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item"><a href="{{ url('/invite') }}" class="mdl-typography--text-uppercase">Invite</a></li>
            <li class="mdl-menu__item"><a href="{{ url('/payouts') }}" class="mdl-typography--text-uppercase">Payouts</a></li>
            <li class="mdl-menu__item"><a href="{{ url('/settings') }}" class="mdl-typography--text-uppercase">Settings</a></li>
            <li class="mdl-menu__item"><a href="{{ url('/logout') }}" class="mdl-typography--text-uppercase">Logout</a></li>
        </ul>
        @endif
    </div>
</div>

<div class="android-drawer mdl-layout__drawer">
    <!--<header class="demo-drawer-header">
        <img src="images/user.jpg" class="demo-avatar">
        <div class="demo-avatar-dropdown">
        <span>hello@example.com</span>
        <div class="mdl-layout-spacer"></div>
        <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" data-upgraded=",MaterialButton,MaterialRipple">
        <i class="material-icons" role="presentation">arrow_drop_down</i>
        <span class="visuallyhidden">Accounts</span>
        <span class="mdl-button__ripple-container"><span class="mdl-ripple"></span></span></button>
        <div class="mdl-menu__container is-upgraded"><div class="mdl-menu__outline mdl-menu--bottom-right"></div><ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-js-ripple-effect--ignore-events" for="accbtn" data-upgraded=",MaterialMenu,MaterialRipple">
        <li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple">hello@example.com<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
        <li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple">info@example.com<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
        <li class="mdl-menu__item mdl-js-ripple-effect" tabindex="-1" data-upgraded=",MaterialRipple"><i class="material-icons">add</i>Add another account...<span class="mdl-menu__item-ripple-container"><span class="mdl-ripple"></span></span></li>
        </ul></div>
        </div>
    </header>-->

    @if(auth()->check())
        <header class="drawer-header">
            <div>
                <img src="{{ url('/images/default-user-icon.png') }}" class="avatar">
                <div class="avatar-dropdown">
                    <span>{{ auth()->user()->firstname }}</span>
                    <div class="mdl-layout-spacer"></div>
                    <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
                        <i class="material-icons" role="presentation">arrow_drop_down</i>
                        <span class="visuallyhidden">Account</span>
                    </button>
                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
                        <li class="mdl-menu__item"><a href="{{ url('/invite') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Invite</a></li>
                        <li class="mdl-menu__item"><a href="{{ url('/payouts') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Payouts</a></li>
                        <li class="mdl-menu__item"><a href="{{ url('/settings') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Settings</a></li>
                        <li class="mdl-menu__item"><a href="{{ url('/logout') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Logout</a></li>
                    </ul>
                </div>
            </div>
        </header>
    @else
        <span class="mdl-layout-title rm-padding-left" style="height:90px;">
            <img src="/images/logo.png" class="android-logo-image">
            <!--<img class="android-logo-image" src="images/android-logo-white.png">-->
        </span>
    @endif
    <nav class="mdl-navigation">

        @if(auth()->check())
            <a href="{{ url('/dashboard') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Dashboard</a>
            <a href="{{ url('/promote') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Promote</a>
            <a href="{{ url('/campaigns') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Campaigns</a>
            {{--<a href="{{ url('/reach/') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reach</a>--}}
            <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
            <a href="{{ url('/reports') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reports</a>
            <a href="{{ url('/contests') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contests</a>
        @else
            <a href="{{ url('') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Home</a></li>
            <a href="{{ url('/influencers') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Influencers</a>
            <a href="{{ url('/advertisers') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Advertisers</a>
            {{--<a href="{{ url('/shoutouts') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Shoutouts</a>--}}
            <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
            {{--<a href="{{ url('/contact') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contact Us</a>--}}

            <a href="{{ url('/login') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_in">Sign in</a>
            <a href="{{ url('/influencers/apply') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_up">Sign Up</a> 
        @endif
        <div class="android-drawer-separator"></div>
        <span class="mdl-navigation__link" href="">Legal</span>
        <a class="mdl-navigation__link" href="{{ url('/privacy') }}">Privacy Policy</a>
        <a class="mdl-navigation__link" href="{{ url('/terms') }}">Terms of Service</a>
        <div class="android-drawer-separator"></div>
        <span class="mdl-navigation__link" href="">Navigation</span>
        <a class="mdl-navigation__link" href="{{ url('/about') }}">About</a>
        <a class="mdl-navigation__link" href="{{ url('/faqs') }}">FAQ's</a>
        <a class="mdl-navigation__link" href="{{ url('/contact') }}">Contact</a>
        <div class="android-drawer-separator"></div>
        <span class="mdl-navigation__link" href="">Find us</span>
        <a class="mdl-navigation__link" href="https://twitter.com/useinfluencers/" target="_blank">InfluencersReach on Facebook</a>
        <a class="mdl-navigation__link" href="https://facebook.com/influencersreach/" target="_blank">InfluencersReach on Twitter</a>
    </nav>
</div>

<!--
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

            {{-- Collect the nav links, forms, and other content for toggling --}}
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->check())
                        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('/promote') }}">Promote</a></li>
                        <li><a href="{{ url('/campaigns') }}">Campaigns</a></li>
                        {{--<li><a href="{{ url('/reach/') }}">Reach</a></li>--}}
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
                                {{--<li><a href="#">Tools</a></li>--}}
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

                        <li><a href="{{ url('/login') }}" class="sign_in">Sign in</a></li>
                        <li><a class="sign_up" href="{{ url('/influencers/apply') }}">Sign Up</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>-->