<nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
    <div class="avatar">
      <img src="{{ asset('img/avatar-default.png') }}" class="img-fluid rounded-circle">
    </div>
    <div class="title">
      <h1 class="h4">{{ Auth::user()->name }}</h1>
      <p>{{ Auth::user()->role_name }}</p>
    </div>
  </div>
  <!-- Sidebar Navidation Menus-->
  <span class="heading">Main</span>
  <ul class="list-unstyled">
    <li class="{{Request::is('admin/admin') || Request::is('admin/admin/*')  ? 'active' : '' }}"> 
      <a href="{{ route('admin.index') }}"><i class="icon-user"></i>Admin</a>
    </li>
    <li class="{{Request::is('admin/tenant') || Request::is('admin/tenant/*') ? 'active' : '' }}"> 
      <a href="{{ route('admin.tenant.index') }}"><i class="icon-form"></i>Penyewa</a>
    </li>
    <li class="{{Request::is('admin/unit') || Request::is('admin/unit/*')  ? 'active' : '' }}"> 
      <a href="{{ route('admin.unit.index') }}"><i class="icon-home"></i>Unit</a>
    </li>
    @php ($a = false)
    @if (Request::is('admin/rent') || Request::is('admin/rent/*') || Request::is('admin/devolution') || Request::is('admin/devolution/*') || Request::is('admin/other_transaction') || Request::is('admin/other_transaction/*'))
    @php ($a = true)
    @endif
    <li class="{{ $a == true ? 'active' : ''}}"> 
      <a href="#transaksi" aria-expanded="false" data-toggle="collapse"> 
        <i class="icon-bill"></i>Transaksi
      </a>
      <ul id="transaksi" class="collapse list-unstyled">
        <li><a href="{{ route('admin.rent.index') }}">Sewa</a></li>
        <li><a href="{{ route('admin.devolution.index') }}">Peralihan</a></li>
        <li><a href="{{ route('admin.other_transaction.index') }}">Lain-lain</a></li>
      </ul>
    </li>
    <li class="{{Request::is('admin/report') || Request::is('admin/report/*')  ? 'active' : '' }}"> 
      <a href="{{ route('admin.report.index') }}"><i class="icon-presentation"></i>Laporan</a>
    </li>
  </ul>
  <span class="heading">Master</span>
  @php ($active = false)
  @if (Request::is('admin/block') || Request::is('admin/block/*') || Request::is('admin/floor') || Request::is('admin/floor/*') || Request::is('admin/type') || Request::is('admin/type/*') || Request::is('admin/business_field') || Request::is('admin/business_field/*') || Request::is('admin/service_charge') || Request::is('admin/service_charge/*') || Request::is('admin/devolution_cost') || Request::is('admin/devolution_cost/*'))
  @php ($active = true)
  @endif
  <ul class="list-unstyled">
    <li class="{{ $active == true ? 'active' : ''}}">
      <a href="#masterdata" aria-expanded="false" data-toggle="collapse"> 
        <i class="icon-website"></i>Master Data
      </a>
      <ul id="masterdata" class="collapse list-unstyled">
        <li><a href="{{ route('admin.block.index') }}">Blok</a></li>
        <li><a href="{{ route('admin.floor.index') }}">Lantai</a></li>
        <li><a href="{{ route('admin.type.index') }}">Tipe</a></li>
        <li><a href="{{ route('admin.business_field.index') }}">Jenis Usaha</a></li>
        <li><a href="{{ route('admin.service_charge.index') }}">Biaya Servis</a></li>
        <li><a href="{{ route('admin.devolution_cost.index') }}">Biaya Peralihan</a></li>
      </ul>
    </li>
  </ul>
</nav>