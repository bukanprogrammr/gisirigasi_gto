<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>GIS | Dashboard</title>

  @include('layouts.pack')
  <link
  rel="shortcut icon"
  href="{{ asset('play-bootstrap-main') }}/assets/images/gto.png"
  type="image/svg"
/>
  
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a class="navbar-brand">GIS Daerah Irigasi Provinsi Gorontalo</a>
        </li>
      </ul>



      <!-- Right navbar links -->
      
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form action="/logout" method="post" onsubmit="return confirm('Yakin logout?')">
            @csrf
            <button type="submit" class="dropdown-item text-gray-400 mr-5">Logout  
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i></button>
          </form>
          
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/home" class="brand-link">

          <img src="{{ asset('AdminLTE') }}/dist/img/SIDI.png" alt="AdminLTE Logo" class="img-fluid" style="max-height: 9vh; background: transparent;">
       
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('AdminLTE') }}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="/home" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="/home" class="nav-link {{ Request::is('home*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p> Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/kabkotas" class="nav-link {{ Request::is('admin/kabkotas*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-map"></i>
                <p> Kabkota
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/dirigasis" class="nav-link {{ Request::is('admin/dirigasis*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-draw-polygon"></i>
                <p> Daerah Irigasi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/bendungs" class="nav-link {{ Request::is('admin/bendungs*') ? 'active' : '' }}">
                <i class="nav-icon fab fa-simplybuilt"></i>
                <p> Bendung
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/jaringans" class="nav-link {{ Request::is('admin/jaringans*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-water"></i>
                <p> Jaringan Irigasi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/sawahs" class="nav-link {{ Request::is('admin/sawahs*') ? 'active' : '' }}">
                <i class="nav-icon fab fa-pagelines"></i>
                <p> Sawah
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/admin/masyarakats" class="nav-link {{ Request::is('masyarakats*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users"></i>
                <p> Partisipasi Masyarakat
                </p>
                <span class="badge badge-danger right">{{ $masyarakat->whereNull('tanggapan')->count() }}</span>
              </a>
            </li>
            <li class="nav-item">
              <a href="/change-password" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p> Keamanan
                </p>
              </a>
            </li>
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              {{-- <h1 class="m-0 text-dark">{{ $title }}</h1> --}}
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">


            @yield('content')


          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <footer class="main-footer">
      <strong>Copyright &copy; 2024-2025 Lorem Ipsum</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
      </div>
    </footer>
  </div>
  
  <!-- ./wrapper -->

  {{-- notif berhasil simpan --}}
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 3000)


    //hitung notif
    let badgeCount = 0;
    // update badge count
    badgeCount = {{ $masyarakat->whereNull('tanggapan')->count() }} ; // replace with actual count
    // check if badge should be displayed
    if (badgeCount < 1) {
      document.querySelector('.badge').style.display = 'none';
    } else {
      document.querySelector('.badge').textContent = badgeCount;
    }
  </script>

</body>

</html