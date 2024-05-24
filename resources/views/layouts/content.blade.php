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
      @yield('contentmap')
      <div class="container">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>