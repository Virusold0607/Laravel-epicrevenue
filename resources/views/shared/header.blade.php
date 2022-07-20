<header class="navbar navbar-expand-lg py-3 shadow-sm @if(isset($ActivePage)) {{ $ActivePage }} @endif">
    <nav class="container">
        <a class="navbar-brand fw-700 col-auto" href="{{ url('/') }}">
                <!--
                <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="logo">
                <img class="logo" src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" data-src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" alt="District Gurus">-->
                #EPICREVENUE
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                @if(auth()->check())
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
                        <a class="nav-link dropdown-toggle" aria-current="page" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">{{ auth()->user()->firstname }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ url('/settings') }}">Settings</a></li>
                            <li><a class="dropdown-item" href="{{ url('/invite') }}">Invite</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item menu-area">
                        <a class="nav-link" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item menu-area {{ request()->is('affiliates') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/affiliates') }}">Affiliates</a>
                    </li>
                    <li class="nav-item menu-area {{ request()->is('advertisers') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('/advertisers') }}">Advertisers</a>
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
