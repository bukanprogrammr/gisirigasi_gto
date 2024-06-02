@extends('layouts.outer')

@section('content')

<!-- ====== Banner Start ====== -->
<div id="map" style="height: 100vh;" ></div>
  @include('layouts.map')
  @endsection
  
  <!-- ====== Banner End ====== -->
  
  <!-- ====== About Start ====== -->

{{-- <!DOCTYPE html>
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

  @include('layouts.packouter')
  
</head>
<body>

    <body class="hold-transition layout-top-nav">
        <div class="wrapper"> 
  <!-- Navbar -->
@include('layouts.navbar')
  <!-- /.navbar -->

  <div id="map" style="height: 91.5vh;" ></div>

</body>
</html>

@include('layouts.map') --}}
