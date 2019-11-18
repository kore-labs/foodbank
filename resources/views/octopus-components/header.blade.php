<header class="header">
  <div class="logo-container">
    <span class="logo">
      <logo >{{ config('app.name', 'NextBin') }}</logo>
    </span>
    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
      <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
    </div>
  </div>

  <!-- start: search & user box -->
  <div class="header-right">

    <!--<form action="pages-search-results.html" class="search nav-form">
      <div class="input-group input-search">
        <input type="text" class="form-control" name="q" id="q" placeholder="Search...">
        <span class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
        </span>
      </div>
    </form>-->


    <!-- Notifications
    <span class="separator"></span>


    <ul class="notifications">



      <li>
        <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
          <i class="fa fa-bell"></i>
          <span class="badge">0</span>
        </a>

        <div class="dropdown-menu notification-menu">
          <div class="notification-title">
            <span class="pull-right label label-default">1</span>
            Alerts
          </div>

          <div class="content">
            <ul>
              <li>
                <a href="#" class="clearfix">
                  <div class="image">
                    <i class="fa fa-thumbs-down bg-success"></i>
                  </div>
                  <span class="title">Welcome to {{ config('app.name', 'NextBin') }} </span>
                  <span class="message">Just now</span>
                </a>
              </li>


            <hr />

            <div class="text-right">
              <a href="#" class="view-more">View All</a>
            </div>
          </div>
        </div>
      </li>


    </ul>
    -->

    <span class="separator"></span>

    <div id="userbox" class="userbox">
      <a href="#" data-toggle="dropdown">
        <figure class="profile-picture">
          <img src="/images/!logged-user.jpg" alt="Joseph Doe" class="img-circle" data-lock-picture="/images/!logged-user.jpg" />
        </figure>
        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
          <span class="name">Karl Strauss</span>
          <span class="role">San Diego</span>
        </div>

        <i class="fa custom-caret"></i>
      </a>

      <div class="dropdown-menu">
        <ul class="list-unstyled">
          <li class="divider"></li>
          <li>
            <a role="menuitem" tabindex="-1" href="/profile"><i class="fa fa-user"></i> My Profile</a>
          </li>

          <li>
            <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"
                             ><i class="fa fa-power-off"></i> {{ __('Logout') }}</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end: search & user box -->
</header>
