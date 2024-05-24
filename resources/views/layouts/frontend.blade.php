
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

  <title>GIS Daerah Irigasi | {{ $title }}</title>

  @include('layouts.pack')
  <style>
    .content-wrapper {
        background-image: url('http://vegetasi-gto2.test/AdminLTE/dist/img/background.jp');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        padding: 20px; /* tambahkan padding sesuai kebutuhan */
    }
</style>  
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper"> 
<!-- Navbar -->
@include('layouts.navbar')
<!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1 class="m-0 text-dark"><small>{{ $title }}</small></h1> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
          @yield('content')
        </div>
    </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include('layouts.footer')
  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper --> --}}

<!-- REQUIRED SCRIPTS -->

</body>
</html>
