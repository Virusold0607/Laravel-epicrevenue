<!-- Navbar Vertical -->
  <aside id="navbarSupportedContent" class="sidebar collapse col-lg-auto col-sm-12">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">

        <!-- Content -->
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
            <div class="nav-item">
                <a class="nav-link nav-link-main " href="{{ url('/admin') }}" data-placement="left">
                  <i class="bi-house-door nav-icon"></i>
                  <span class="nav-link-title">{{ __("Dashboard") }}</span>
                </a>
              </div>

            <span class="dropdown-header">{{ __("Users Management") }}</span>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link nav-link-main dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">{{ __("Publishers") }} <span class="badge bg-primary rounded-pill ms-1">5</span></span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse showwww" data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link " href="/admin/#/publishers">{{ __("All Publishers") }} <span class="badge bg-primary rounded-pill ms-1">5</span></a>
                  <a class="nav-link " href="/admin/#/publishers/my">{{ __("My Publishers") }}</a>
                  <a class="nav-link " href="/admin/#/socialaccounts">{{ __("Social Accounts") }} <span class="badge bg-primary rounded-pill ms-1">5</
                </div>
              </div>
              <!-- End Collapse -->

              <span class="dropdown-header mt-4">{{ __("Content") }}</span>

              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link nav-link-main dropdown-toggle " href="#navbarVerticalMenuAllPostMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuAllPostMenu" aria-expanded="false" aria-controls="navbarVerticalMenuAllPostMenu">
                  <i class="bi bi-pin-angle-fill nav-icon"></i>
                  <span class="nav-link-title">{{ __("Campaigns") }}</span>
                </a>

                <div id="navbarVerticalMenuAllPostMenu" class="nav-collapse collapse @if($activePage == 'posts') show @endif" data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link activeee" href="/admin/#/campaigns/">{{ __("View Campaigns") }}</a>
                  <a class="nav-link activeee" href="{{ url('/admin/campaigns/create') }}">{{ __("Add Campaign") }}</a>
                  <a class="nav-link activeee" href="{{ url('/admin/campaigns/categories') }}">{{ __("Categories") }}</a>
                  <a class="nav-link activeee" href="{{ url('/admin/campaigns/featured') }}">{{ __("Homepage Featured") }}</a>
                  <a class="nav-link activeee" href="{{ url('/admin/campaigns/rates') }}">{{ __("Custom rates") }}</a>
                  <a class="nav-link activeee" href="{{ url('/admin/campaigns/block/?subids') }}">{{ __("SubID's block") }}</a>
                  <a class="nav-link activeee" href="{{ url('/admin/campaigns/block/?singleBlock') }}">{{ __("Single block") }}</a>
                  <a class="nav-link activeee" href="{{ url('/admin/campaigns/block/?networkBlock') }}">{{ __("Network block") }}</a>
                </div>
              </div>
              <!-- End Collapse -->

              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link nav-link-main dropdown-toggle " href="#navbarVerticalMenuAllPagesMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuAllPagesMenu" aria-expanded="false" aria-controls="navbarVerticalMenuAllPagesMenu">
                  <i class="bi-stickies nav-icon"></i>
                  <span class="nav-link-title">{{ __("Promotions") }}</span>
                </a>

                <div id="navbarVerticalMenuAllPagesMenu" class="nav-collapse collapse showwww" data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link " href="{{ url('/admin/promotions/') }}">{{ __("View Promotions") }}</a>
                  <a class="nav-link " href="{{ url('/admin/promotions/create') }}">{{ __("Add Promotion") }}</a>
                  <a class="nav-link " href="{{ url('/admin/promotions/categories') }}">{{ __("Categories") }}</a>
                  <a class="nav-link " href="{{ url('/admin/promotions/creatives') }}">{{ __("View Creatives") }}</a>
                </div>
              </div>
              <!-- End Collapse -->

              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link nav-link-main dropdown-toggle " href="#navbarVerticalMenuAllOrdersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuAllOrdersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuAllOrdersMenu">
                  <i class="bi bi-receipt nav-icon"></i>
                  <span class="nav-link-title">{{ __("Rewards") }}</span>
                </a>
                <div id="navbarVerticalMenuAllOrdersMenu" class="nav-collapse collapse showwww" data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link activeee" href="{{ url('/admin/rewards') }}">{{ __("View Rewards") }}</a>
                  <a class="nav-link " href="{{ url('/admin/rewards/create') }}">{{ __("Add Reward") }}</a>
                </div>
              </div>
              <!-- End Collapse -->

              <div class="nav-item">
                <a class="nav-link nav-link-main " href="/admin/#/reports/" data-placement="left">
                  <i class="bi-folder2-open nav-icon"></i>
                  <span class="nav-link-title">Reports</span>
                </a>
              </div>


              <span class="dropdown-header mt-4">{{ __("General") }}</span>

              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link nav-link-main dropdown-toggle " href="#navbarVerticalMenuAllOrdersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuAllOrdersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuAllOrdersMenu">
                  <i class="bi bi-receipt nav-icon"></i>
                  <span class="nav-link-title">{{ __("Reports") }}</span>
                </a>
                <div id="navbarVerticalMenuAllOrdersMenu" class="nav-collapse collapse showwww" data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link activeee" href="{{ url('/admin/rewards') }}">{{ __("View Rewards") }}</a>
                  <a class="nav-link " href="{{ url('/admin/rewards/create') }}">{{ __("Add Reward") }}</a>
                </div>
              </div>
              <!-- End Collapse -->

              <div class="nav-item">
                <a class="nav-link nav-link-main " href="#" data-placement="left">
                  <i class="bi-key nav-icon"></i>
                  <span class="nav-link-title">API Keys</span>
                </a>
              </div>

        </div>
        <!-- End Content -->

        <!-- Footer -->
        <div class="navbar-vertical-footer">
          <ul class="navbar-vertical-footer-list">
            

            
          </ul>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>

  <!-- End Navbar Vertical -->
