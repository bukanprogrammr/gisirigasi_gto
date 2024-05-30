
    <!-- Navbar -->
 
  <!-- /.navbar -->

  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('play-bootstrap-main') }}/assets/images/logo/SIDI.png" alt="Logo" >
    </a>
    <button class="navbar-toggler">
      <span class="toggler-icon"> </span>
      <span class="toggler-icon"> </span>
      <span class="toggler-icon"> </span>
    </button>

    <div class="navbar-collapse">
      <ul id="nav" class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="ud-menu-scroll" href="#home">Home</a>
        </li>

        <li class="nav-item">
          <a class="ud-menu-scroll" href="/map">Map</a>
        </li>
        <li class="nav-item">
          <a class="ud-menu-scroll" href="/map">Partisipasi Masyarakat</a>
        </li>
        <li class="nav-item nav-item-has-children">
          <a href="javascript:void(0)"> Data Irigasi </a>
          <ul class="ud-submenu">
            <li class="ud-submenu-item">
              <a href="/dirigasi" class="ud-submenu-link">
                Data Daerah Irigasi
              </a>
            </li>
            <li class="ud-submenu-item">
              <a href="/bendung" class="ud-submenu-link">
                Data Bendung
              </a>
            </li>
            <li class="ud-submenu-item">
              <a href="/jaringan" class="ud-submenu-link">
                Data Jaringan Irigasi
              </a>
            </li>
            <li class="ud-submenu-item">
              <a href="/sawah" class="ud-submenu-link">
                Data Sawah
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>

    <div class="navbar-btn d-none d-sm-inline-block">
      <a href="/login" class="ud-main-btn ud-login-btn">
        Sign In
      </a>
      <a class="ud-main-btn ud-white-btn" href="javascript:void(0)">
        Sign Up
      </a>
    </div>
  </nav>