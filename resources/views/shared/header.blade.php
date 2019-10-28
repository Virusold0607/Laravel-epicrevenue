<div class="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
          <a href="{{url('/')}}"><img src="/images/logo1.png" alt="logo" class="logo img-responsive"></a>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed pull-right" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
            <!--<span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> -->
            <span class="navbar-toggler-icon nk-icon-burger"> <span class="nk-t-1"></span> <span class="nk-t-2"></span> <span class="nk-t-3"></span> </span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse pull-right">
            @if(auth()->check())
                <ul class="nav navbar-nav">
                    <li class="{{ request()->is('dashboard') ? 'active' : '' }}"><a href="{{url('/dashboard')}}">Dashboard</a></li>
                    <li class="{{ request()->is('campaigns') ? 'active' : '' }}"><a href="{{ url('/campaigns') }}">Promotions</a></li>
                    <li class="{{ request()->is('reports') ? 'active' : '' }}"><a href="{{ url('/reports') }}">Reports</a></li>
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