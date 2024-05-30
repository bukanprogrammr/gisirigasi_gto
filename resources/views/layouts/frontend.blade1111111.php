
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
    .header-image-container {
        position: relative;
        width: 100%;
        max-height: 800px; /* Adjust this value to make the header smaller or larger */
        overflow: hidden; /* Ensure any overflow is hidden */
    }
    .header-image {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensure the image covers the container without distortion */
        filter: blur(5px); /* Adjust the blur level as needed */
        -webkit-filter: blur(3px); /* For Safari */
    }
    .header-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        font-size: 24px;
        font-weight: bold;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Optional: adds a shadow to the text */
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->
    <div class="header-image-container">
      <img src="{{ asset('AdminLTE') }}/dist/img/header.jpg" alt="Header Image" class="header-image">
      <div class="header-text"><h1><strong>Your Text Here</strong></h1></div>
    </div>
    
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
