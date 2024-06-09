<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GIS | Daerah Irigasi</title>

    <!-- Primary Meta Tags -->
<meta name="title" content="Play - Free Open Source HTML Bootstrap Template by UIdeck">
<meta name="description" content="Play - Free Open Source HTML Bootstrap Template by UIdeck Team">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="https://uideck.com/play/">
<meta property="og:title" content="Play - Free Open Source HTML Bootstrap Template by UIdeck">
<meta property="og:description" content="Play - Free Open Source HTML Bootstrap Template by UIdeck Team">
<meta property="og:image" content="https://uideck.com/wp-content/uploads/2021/09/play-meta-bs.jpg">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://uideck.com/play/">
<meta property="twitter:title" content="Play - Free Open Source HTML Bootstrap Template by UIdeck">
<meta property="twitter:description" content="Play - Free Open Source HTML Bootstrap Template by UIdeck Team">
<meta property="twitter:image" content="https://uideck.com/wp-content/uploads/2021/09/play-meta-bs.jpg">

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="{{ asset('play-bootstrap-main') }}/assets/images/gto.png"
      type="image/svg"
    />
{{-- leaflet --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
<link rel="stylesheet" href="css/Leaflet.PolylineMeasure.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-easyprint@2.1.9/dist/bundle.css"/>
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    
    {{-- play-bootstrap-main --}}
<link rel="stylesheet" href="{{ asset('play-bootstrap-main') }}/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{ asset('play-bootstrap-main') }}/assets/css/animate.css" />
<link rel="stylesheet" href="{{ asset('play-bootstrap-main') }}/assets/css/lineicons.css" />
<link rel="stylesheet" href="{{ asset('play-bootstrap-main') }}/assets/css/ud-styles.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

  </head>
  <body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            @include('layouts.navbar')
          </div>
        </div>
      </div>
    </header>
    <!-- ====== Header End ====== -->
    {{-- leaflet --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>
    <script src="js/Leaflet.PolylineMeasure.js"></script>
    <script src="https://unpkg.com/leaflet-easyprint@2.1.9/dist/bundle.js"></script>
    {{-- play-bootstrap-main --}}
    <script src="{{ asset('play-bootstrap-main') }}/assets/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('play-bootstrap-main') }}/assets/js/wow.min.js"></script>
    <script src="{{ asset('play-bootstrap-main') }}/assets/js/main.js"></script>
    {{-- AdminLTE --}}
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
   <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="{{ asset('AdminLTE') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('AdminLTE') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    {{-- slider-carousel --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    
    @yield('content')

    <!-- ====== Footer Start ====== -->
    
    <!-- ====== Footer End ====== -->

    <!-- ====== Back To Top Start ====== -->
    
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->

  </body>
</html>
