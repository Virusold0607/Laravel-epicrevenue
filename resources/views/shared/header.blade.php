<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="logo"><a href="{{url('/')}}"><img src="/images/logo.png" alt="logo" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-8 pull-right text-right">
                @if(auth()->check())
                    <div class="extra-link">
                        <ul class="nav navbar-nav setting-menu">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-user"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{!! url('/invite') !!}">Invite</a></li>
                                    <li><a href="{!! url('/logout') !!}">Logout</a></li>
                                </ul>
                            </li>
                            <li><a href="{!! url('/settings') !!}"><i class="fa fa-cog"></i></a></li>
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
                                <li class="{{ request()->is('promote') ? 'active' : '' }}"><a href="{{ url('/promote') }}">PROMOTE</a></li>
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
                            <li class="{{ request()->is('influencers') ? 'active' : '' }}"><a href="{{ url('/influencers') }}">INFLUENCERS</a></li>
                            <li class="{{ request()->is('advertisers') ? 'active' : '' }}"><a href="{{ url('/advertisers') }}">ADVERTISERS</a></li>
                            <li class="{{ request()->is('rewards') ? 'active' : '' }}"><a href="{{ url('/rewards') }}">REWARDS</a></li>
                            <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ url('/login') }}">SIGN IN</a></li>
                            <li class="{{ request()->is('influencers/apply') ? 'active' : '' }}"><a href="{{ url('/influencers/apply') }}">SIGN UP</a></li>
                        </ul>
                        @endif
                    </div>
                </nav>

            </div>
        </div>
    </div>
</div>