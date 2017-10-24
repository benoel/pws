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
    <li class="active"> 
      <a href="{{ route('admin.index') }}"><i class="icon-user"></i>Admin</a>
    </li>
    <li> 
      <a href="{{ route('admin.tenant.index') }}"><i class="icon-form"></i>Penyewa</a>
    </li>
    <li> 
      <a href=""><i class="icon-home"></i>Unit</a>
    </li>
    <li> 
      <a href=""><i class="icon-bill"></i>Transaksi Sewa</a>
    </li>
    <li>
      <a href="#laporan" aria-expanded="false" data-toggle="collapse"> 
        <i class="icon-presentation"></i>Laporan
      </a>
      <ul id="laporan" class="collapse list-unstyled">
        <li><a href="#">Sewa</a></li>
        <li><a href="#">Page</a></li>
        <li><a href="#">Page</a></li>
        <li><a href="#">Page</a></li>
      </ul>
    </li>
  </ul>
  <span class="heading">Master</span>
  <ul class="list-unstyled">
    <li>
      <a href="#masterdata" aria-expanded="false" data-toggle="collapse"> 
        <i class="icon-website"></i>Master Data
      </a>
      <ul id="masterdata" class="collapse list-unstyled">
        <li><a href="#">Blok</a></li>
        <li><a href="#">Lantai</a></li>
        <li><a href="#">Tipe</a></li>
        <li><a href="#">Usaha</a></li>
        <li><a href="#">Jenis Usaha</a></li>
        <li><a href="#">Biaya Servis</a></li>
      </ul>
    </li>
  </ul>


  {{-- <span class="heading">Extras</span>
  <ul class="list-unstyled">
    <li> <a href="#"> <i class="icon-flask"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-screen"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-mail"></i>Demo </a></li>
    <li> <a href="#"> <i class="icon-picture"></i>Demo </a></li>
  </ul> --}}
</nav>