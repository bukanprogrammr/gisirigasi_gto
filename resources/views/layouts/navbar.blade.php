
    <!-- Navbar -->
 
  <!-- /.navbar -->
<style>
  .navbar-white-transparent {
    background-color: rgba(255, 255, 255, 0.8); /* Warna putih dengan transparansi 80% */
}
</style>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('play-bootstrap-main') }}/assets/images/logo/SIDI.png" alt="Logo" style="max-height: 8vh; background: transparent;" >
    </a>
    <button class="navbar-toggler">
      <span class="toggler-icon"> </span>
      <span class="toggler-icon"> </span>
      <span class="toggler-icon"> </span>
    </button>

    <div class="navbar-collapse">
      <ul id="nav" class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="ud-menu-scroll" href="{{ Request::is('/') ? url('#home') : url('/') }}">Home</a>
        </li>

        <li class="nav-item">
          <a class="ud-menu-scroll" href="/map">Map</a>
        </li>
        <li class="nav-item">
          <a class="ud-menu-scroll" href="{{ Request::is('/') ? url('#team') : url('/#team') }}">Partisipasi Masyarakat</a>
        </li>
        <li class="nav-item nav-item-has-children">
          <a href="#"> Data Irigasi </a>
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
      <a class="ud-main-btn ud-white-btn" href="/login">
        <i class="fas fa-user"></i> Login
      </a>
    </div>
  </nav>

  <script>
     window.logoSrcSticky = "{{ asset('play-bootstrap-main/assets/images/logo/SIDIG.png') }}";
    window.logoSrcDefault = "{{ asset('play-bootstrap-main/assets/images/logo/SIDI.png') }}";
  </script>