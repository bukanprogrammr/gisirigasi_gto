
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
  
</head>
<body>

    <body class="hold-transition layout-top-nav">
        <div class="wrapper"> 
  <!-- Navbar -->
@include('layouts.navbar')
  <!-- /.navbar -->

  <div id="map" style="height: 93.7vh;" ></div>

</body>
</html>

@include('layouts.map')
