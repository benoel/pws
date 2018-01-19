<header class="header">
  <nav class="navbar">
    <div class="container-fluid">
      <div class="navbar-holder d-flex align-items-center justify-content-between">
        <!-- Navbar Header-->
        <div class="navbar-header">
          <!-- Navbar Brand -->
          <a href="{{ url('') }}" class="navbar-brand">
            <div class="brand-text brand-big hidden-lg-down">
              <span>PT. PRIMANTARA WISESA </span>
              <strong>SEJAHTERA</strong>
            </div>
            <div class="brand-text brand-small">
              <strong>PWS</strong>
            </div>
          </a>
          <!-- Toggle Button-->
          <a id="toggle-btn" href="#" class="menu-btn active">
            <span></span><span></span><span></span>
          </a>
        </div>
        <!-- Navbar Menu -->
        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
          <!-- Logout -->
          <li class="nav-item">
            <a href="#" 
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
            class="nav-link logout">Keluar<i class="fa fa-sign-out"></i></a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </ul>
      </div>
    </div>
  </nav>
</header>