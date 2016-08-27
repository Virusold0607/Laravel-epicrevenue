<nav class="navbar navbar-inverse" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" ng-init="navCollapsed = true" ng-click="navCollapsed = !navCollapsed">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Panel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" ng-class="!navCollapsed && 'in'">
        @if(auth()->check())
            <ul class="nav navbar-nav">
                <li><a href="#/stats">Home</a></li>
                <li class="dropdown" uib-dropdown>
                    <a href="#" uib-dropdown-toggle class="dropdown-toggle" data-toggle="dropdown">Publishers <b class="caret"></b></a>
                    <ul class="uib-dropdown-menu" role="menu">
                        <li><a href="#/publishers">View All</a></li>
                        <li><a href="#/publishers/my">My</a></li>
                        <li><a href="#/publishers/status">Unapproved</a></li>
                        <li class="divider"></li>
                        <li><a href="#/socialaccounts">Social Accounts</a></li>
                    </ul>
                </li>
                <li class="dropdown" uib-dropdown>
                    <a href="#" uib-dropdown-toggle class="dropdown-toggle" data-toggle="dropdown">Campaigns <b class="caret"></b></a>
                    <ul class="uib-dropdown-menu" role="menu">
                        <li><a href="#/campaigns/">View All</a></li>
                        <li><a href="{{ url('/admin/campaigns/create') }}">Create</a></li>
                        <li><a href="{{ url('/admin/campaigns/categories') }}">Categories</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/admin/campaigns/rates') }}">Custom rates</a></li>
                    </ul>
                </li>
                <li class="dropdown" uib-dropdown>
                    <a href="#" uib-dropdown-toggle class="dropdown-toggle" data-toggle="dropdown">Promotions <b class="caret"></b></a>
                    <ul class="uib-dropdown-menu" role="menu">
                        <li><a href="{{ url('/admin/promotions/') }}">View Promotions</a></li>
                        <li><a href="{{ url('/admin/promotions/create') }}">Add Promotion</a></li>
                        <li><a href="{{ url('/admin/promotions/categories') }}">Categories</a></li>
                        <li><a href="{{ url('/admin/promotions/creatives') }}">View Creatives</a></li>
                    </ul>
                </li>
                <li class="dropdown" uib-dropdown>
                    <a href="#" uib-dropdown-toggle class="dropdown-toggle" data-toggle="dropdown">Rewards <b class="caret"></b></a>
                    <ul class="uib-dropdown-menu" role="menu">
                        <li><a href="{{ url('/admin/rewards') }}">View Rewards</a></li>
                        <li><a href="{{ url('/admin/rewards/create') }}">Add Reward</a></li>
                    </ul>
                </li>

                <li><a href="#/reports/">Reports</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown" uib-dropdown>
                    <a href="#" uib-dropdown-toggle class="dropdown-toggle" data-toggle="dropdown">Contests <b class="caret"></b></a>
                    <ul class="uib-dropdown-menu" role="menu">
                        <li><a href="#/contests/">View All</a></li>
                        <li><a href="#/contests/create">Create</a></li>
                    </ul>
                </li>
                <li class="dropdown" uib-dropdown>
                    <a href="#" uib-dropdown-toggle class="dropdown-toggle" data-toggle="dropdown">Maintenance <b class="caret"></b></a>
                    <ul class="uib-dropdown-menu" role="menu">
                        <li><a href="{{ url('/admin/support/') }}">Support Tickets</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/admin/postbacks/') }}">Postback Manager</a></li>
                        <li><a href="{{ url('/admin/tools/postbackTest') }}">Postback Test</a></li>
                        <li><a href="{{ url('/admin/tools/postbackTest') }}">Postback Logs</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/admin/payments/') }}">Payments</a></li>
                        <li><a href="{{ url('/publishers/pendingW9') }}">Pending W9 Forms</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('/admin/publishers/failedLogins') }}">Failed Logins</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/logout') }}">Logout</a></li>
            </ul>
        @else
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/admin') }}">Home</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
            </ul>
        @endif
    </div><!-- /.navbar-collapse -->
</nav>