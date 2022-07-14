<header class="navbar navbar-expand-lg py-3">
    <nav class="container">
        <a class="navbar-brand col-auto" href="{{ route('index') }}">
                <!--
                <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="logo">
                <img class="logo" src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" data-src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" alt="District Gurus">-->
                #JewelryCG
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                @if(auth()->check())
                    <li class="nav-item menu-area">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item menu-area {{ request()->is('dashboard') ? 'active' : '' }}">
                        <a class="nav-link" href="{{url('/dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item menu-area {{ request()->is('campaigns') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/campaigns') }}">Campaigns</a>
                    </li>
                    <li class="nav-item menu-area {{ request()->is('reports') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/reports') }}">Analytics</a>
                    </li>
                <!--<li class="nav-item menu-area {{ request()->is('contests') ? 'active' : '' }}"><a class="nav-link" href="{{ url('/contests') }}">CONTESTS</a></li>-->
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" aria-current="page" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">{{ auth()->user()->firstname }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="{{ url('/invite') }}">Invite</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item menu-area">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item menu-area {{ request()->is('affiliates') ? 'active' : '' }}">
                        <a href="{{ url('/affiliates') }}">Partners</a>
                    </li>
                    <li class="nav-item menu-area {{ request()->is('advertisers') ? 'active' : '' }}">
                        <a href="{{ url('/advertisers') }}">Advertisers</a>
                    </li>
                    <li class="nav-item {{ request()->is('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>  
                    </li>
                    <li class="nav-item {{ request()->is('affiliate/apply') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/affiliate/apply') }}">Register</a>  
                    </li>

                @endif

            </ul>
        </div>
    </nav>
</header>




        <div id="navbar" class="navbar-collapse collapse pull-right">
            @if(auth()->check())
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="{{ request()->is('campaigns') ? 'active' : '' }}"><a href="{{ url('/campaigns') }}">Campaigns</a></li>
                    <li class="{{ request()->is('reports') ? 'active' : '' }}"><a href="{{ url('/reports') }}">Analytics</a></li>
                    <!--<li class="{{ request()->is('contests') ? 'active' : '' }}"><a href="{{ url('/contests') }}">CONTESTS</a></li>-->
                    <li class="dropdown">
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
                <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{url('/')}}">Home</a></li>
                <li class="{{ request()->is('affiliates') ? 'active' : '' }}"><a href="{{ url('/affiliates') }}">Partners</a></li>
                <li class="{{ request()->is('advertisers') ? 'active' : '' }}"><a href="{{ url('/advertisers') }}">Advertisers</a></li>
                <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">SIGN IN</a></li>
                <li class="{{ request()->is('affiliate/apply') ? 'active' : '' }}"><a href="{{ url('/affiliate/apply') }}">SIGN UP</a></li>
            </ul>
            @endif
        </div>
        </nav>
    </div>
</div>
