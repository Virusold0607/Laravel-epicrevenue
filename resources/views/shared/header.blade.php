<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo"><a href="{{url('/')}}"><img src="/images/logo1.png" alt="logo" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-8 pull-right text-right">
                @if(auth()->check())
                    <div class="extra-link">
                        <ul class="nav navbar-nav setting-menu">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!! url('/settings') !!}">Settings</a></li>
                                    <li><a href="{!! url('/invite') !!}">Invite</a></li>
                                    <li><a href="{!! url('/logout') !!}">Logout</a></li>
                                </ul>
                            </li>
                            {{--<li><a href="{!! url('/settings') !!}"><i class="fa fa-cog"></i></a></li>--}}
                        </ul>
                    </div>
                @endif
                <nav class="navbar navbar-inverse navbar-static-top custum-nav">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    </div>
                    <div id="navbar" class="navbar-collapse  collapse">
                        @if(auth()->check())
                            <ul class="nav navbar-nav">
                                <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{url('/dashboard')}}">DASHBOARD</a></li>
                                <li class="{{ request()->is('promote') ? 'active' : '' }}"><a href="{{ url('/promote') }}">EARN</a></li>
                                {{--<li class="{{ request()->is('campaigns') ? 'active' : '' }}"><a href="{{ url('/campaigns') }}">Campaigns</a></li>--}}
                                <li class="{{ request()->is('rewards') ? 'active' : '' }}"><a href="{{ url('/rewards') }}">REWARDS</a></li>
                                <li class="{{ request()->is('reports') ? 'active' : '' }}"><a href="{{ url('/reports') }}">REPORTS</a></li>
                                <li class="{{ request()->is('contests') ? 'active' : '' }}"><a href="{{ url('/contests') }}">CONTESTS</a></li>
                                <li class="dropdown hidden-lg hidden-md hidden-sm">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ auth()->user()->firstname }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/settings') }}">Settings</a></li>
                                        <li><a href="{{ url('/invite') }}">Invite</a></li>
                                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                        <ul class="nav navbar-nav">
                            <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{url('/')}}">HOME</a></li>
                            <li class="{{ request()->is('affiliates') ? 'active' : '' }}"><a href="{{ url('/affiliates') }}">Affiliates</a></li>
                            <li class="{{ request()->is('advertisers') ? 'active' : '' }}"><a href="{{ url('/advertisers') }}">ADVERTISERS</a></li>
                            <li class="{{ request()->is('rewards') ? 'active' : '' }}"><a href="{{ url('/rewards') }}">REWARDS</a></li>
                            <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">SIGN IN</a></li>
                            <li class="{{ request()->is('affiliate/apply') ? 'active' : '' }}"><a href="{{ url('/affiliate/apply') }}">SIGN UP</a></li>
                        </ul>
                        @endif
                    </div>
                </nav>

            </div>
        </div>
    </div>
</div>
<!--
<div class="android-header mdl-layout__header mdl-layout__header--waterfall is-casting-shadow">
    <div class="container">
    <div class="mdl-layout__header-row" style="height: initial;">
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
                    {{--<a href="{{ url('/promote') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Promote</a>--}}
                    <a href="{{ url('/campaigns') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Campaigns</a>
                    {{--<a href="{{ url('/reach/') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reach</a>--}}
                    <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
                    <a href="{{ url('/reports') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reports</a>
{{--                    <a href="{{ url('/contests') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contests</a>--}}

                </nav>
            @else
                <nav class="android-navigation mdl-navigation">
                    <a href="{{ url('') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Home</a></li>
                    <a href="{{ url('/affiliates') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Affiliates</a>
                    <a href="{{ url('/advertisers') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Advertisers</a>
                    {{--<a href="{{ url('/shoutouts') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Shoutouts</a>--}}
                    <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
                    {{--<a href="{{ url('/contact') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contact Us</a>--}}

                    <a href="{{ url('/login') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_in">Sign in</a>
                    <a href="{{ url('/affiliate/apply') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_up">Sign Up</a>
                </nav>
            @endif
        </div>
        <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="/images/logo1.png">
        </span>
        <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons">more_vert</i>
        </button>
        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item"><a href="{{ url('/invite') }}" class="mdl-typography--text-uppercase">Invite</a></li>
            <li class="mdl-menu__item"><a href="{{ url('/payouts') }}" class="mdl-typography--text-uppercase">Payouts</a></li>
            <li class="mdl-menu__item"><a href="{{ url('/settings') }}" class="mdl-typography--text-uppercase">Settings</a></li>
            <li class="mdl-menu__item"><a href="{{ url('/logout') }}" class="mdl-typography--text-uppercase">Logout</a></li>
        </ul>
    </div>
    </div>
</div>

<div class="android-drawer mdl-layout__drawer">

    @if(auth()->check())
        <header class="drawer-header">
            <div class="container">
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
            <img src="/images/logo1.png" class="android-logo-image">
        </span>
    @endif
    <nav class="mdl-navigation">

        @if(auth()->check())
            <a href="{{ url('/dashboard') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Dashboard</a>
            {{--<a href="{{ url('/promote') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Promote</a>--}}
            <a href="{{ url('/campaigns') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Campaigns</a>
            {{--<a href="{{ url('/reach/') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reach</a>--}}
            <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
            <a href="{{ url('/reports') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Reports</a>
            {{--<a href="{{ url('/contests') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contests</a>--}}
        @else
            <a href="{{ url('') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Home</a></li>
            <a href="{{ url('/affiliates') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Affiliates</a>
            <a href="{{ url('/advertisers') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Advertisers</a>
            {{--<a href="{{ url('/shoutouts') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Shoutouts</a>--}}
            <a href="{{ url('/rewards') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Rewards</a>
            {{--<a href="{{ url('/contact') }}" class="mdl-navigation__link mdl-typography--text-uppercase">Contact Us</a>--}}

            <a href="{{ url('/login') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_in">Sign in</a>
            <a href="{{ url('/affiliate/apply') }}" class="mdl-navigation__link mdl-typography--text-uppercase sign_up">Sign Up</a>
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
        <a class="mdl-navigation__link" href="https://twitter.com/useinfluencers/" target="_blank">AdsAndAffiliates on Facebook</a>
        <a class="mdl-navigation__link" href="https://facebook.com/influencersreach/" target="_blank">AdsAndAffiliates on Twitter</a>
    </nav>
</div>
-->
