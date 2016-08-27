<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">IR Admin Panel</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @if(auth()->check())
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/admin') }}">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Publishers <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/#/publishers">View All</a></li>
                            <li><a href="/admin/#/publishers/my">My Publishers</a></li>
                            <li class="divider"></li>
                            <li><a href="/admin/#/socialaccounts">Social Accounts</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Campaigns <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/#/campaigns/">View Campaigns</a></li>
                            <li><a href="{{ url('/admin/campaigns/create') }}">Add campaign</a></li>
                            <li><a href="{{ url('/admin/campaigns/categories') }}">Categories</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/admin/campaigns/rates') }}">Custom rates</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/admin/campaigns/block/?subids') }}">SubID's block</a></li>
                            <li><a href="{{ url('/admin/campaigns/block/?singleBlock') }}">Single block</a></li>
                            <li><a href="{{ url('/admin/campaigns/block/?networkBlock') }}">Network block</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Promotions <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/promotions/') }}">View Promotions</a></li>
                            <li><a href="{{ url('/admin/promotions/create') }}">Add Promotion</a></li>
                            <li><a href="{{ url('/admin/promotions/categories') }}">Categories</a></li>
                            <li><a href="{{ url('/admin/promotions/creatives') }}">View Creatives</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rewards <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/rewards') }}">View Rewards</a></li>
                            <li><a href="{{ url('/admin/rewards/create') }}">Add Reward</a></li>
                        </ul>
                    </li>

                    <li><a href="/admin/#/reports/">Reports</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Contests <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/#/contests/?page=1') }}">View All</a></li>
                            <li><a href="{{ url('/admin/#/contests/create') }}">Create</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Maintenance <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/admin/support/') }}">Support Tickets</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/admin/postback/') }}">Postback Manager</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ url('/admin/payments/') }}">Payments</a></li>
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
    </div><!-- /.container-fluid -->
</nav>