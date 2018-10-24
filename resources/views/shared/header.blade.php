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

