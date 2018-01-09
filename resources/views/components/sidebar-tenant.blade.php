<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar">
      <img src="{{ asset('img/avatar-default.png') }}" class="img-fluid rounded-circle">
    </div>
    <div class="title">
      <h1 class="h4">{{ Auth::user()->name }}</h1>
      <p>{{ Auth::user()->company != '' ? Auth::user()->company : '-'}}</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus-->
  <span class="heading">Main</span>
  <ul class="list-unstyled">
    <li class="{{Request::is('tenant/profile') || Request::is('tenant/profile/*')  ? 'active' : '' }}"> 
      <a href="{{ route('tenant.index') }}"><i class="icon-user"></i>Profile</a>
    </li>
    <li class="{{Request::is('tenant/invoice') || Request::is('tenant/invoice/*')  ? 'active' : '' }}"> 
      <a href="{{ route('tenant.invoice') }}"><i class="icon-interface-windows"></i>Riwayat Sewa dan Tagihan</a>
    </li>
    <li class="{{Request::is('tenant/devolution') || Request::is('tenant/devolution/*')  ? 'active' : '' }}"> 
      <a href="{{ route('tenant.devolution') }}"><i class="icon-interface-windows"></i>Peralihan Sewa</a>
    </li>
  </ul>
</nav>