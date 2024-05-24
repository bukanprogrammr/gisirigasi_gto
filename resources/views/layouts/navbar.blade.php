
    <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="/" class="navbar-brand">
        <img src="{{ asset('AdminLTE') }}/dist/img/SIDIG.png" alt="AdminLTE Logo" style="max-height: 8vh; background: transparent;">
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item ml-4">
            <a href="/" class="nav-link"><i class="fa fa-home"></i></a>
          </li>
          <li class="nav-item">
            <a href="/map" class="nav-link">Map</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Data Irigasi</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              {{-- <li><a href="/kabkota" class="dropdown-item">Data Kab./kota</a></li> --}}
              <li><a href="/dirigasi" class="dropdown-item">Data Daerah Irigasi</a></li>
              <li><a href="/bendung" class="dropdown-item">Data Bendung</a></li>
              <li><a href="/jaringan" class="dropdown-item">Data Jaringan Irigasi</a></li>
              <li><a href="/sawah" class="dropdown-item">Data Sawah</a></li>
            </ul>
            </ul>

     <!-- Right navbar links -->
     <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
      <!-- Check if user is on login page -->
      @if(!Request::is('login'))
      <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">
              <i class="fas fa-user"></i> Login
          </a>
      </li>
      @endif
  </ul>
</div>
</div>
</nav>
  <!-- /.navbar -->