@extends('layouts.outer')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet-fullscreen/dist/leaflet.fullscreen.css" />
<script src="https://unpkg.com/leaflet-fullscreen/dist/Leaflet.fullscreen.min.js"></script>
<style>

@media print {
            body {
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            #map {
                width: 100vw;
                height: 50vh;
            }
        }
  
  #search-box {
      position: absolute;
      top: 100px;
      left: 50px;
      z-index: 1000;
      background: white;
      padding: 5px;
      border: 1px solid gray;
  }

  .suggestion {
      cursor: pointer;
      padding: 5px;
  }

  .suggestion:hover {
      background-color: #f0f0f0;
  }
</style>
<section class="ud-hero-map" id="home">
  
  
  <div id="search-box">
    <select id="search-type">
      <option value="jaringan" >Cari Jaringan Irigasi</option>
      <option value="bendung">Cari Bendung</option>
    </select>
    <input type="text" id="network-name" placeholder="Masukkan Nama">
    <button onclick="searchNetwork()" class="btn btn-primary btn-xs">Cari</button>
    <!-- Daftar saran akan ditampilkan di bawah input -->
    <div id="suggestions" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; display: none;"></div>
  </div>
  
  <div id="map" style="height: 90vh; z-index: 0;"></div>
  {{-- <button onclick="resetZoom()">Reset Zoom</button> --}}
  <div id="tabel-info" style="display: none; position: fixed; bottom: 10px; right: 10px; width: 400px; max-height: 95vh; overflow: auto; background-color: white; border: 1px solid black; padding: 10px; z-index: 1000;"></div>
  
  </div>
  
</section>

@include('map.basemap')
@include('layouts.map')
@include('map.toolsmap')
{{-- @include('map.popup') --}}



@endsection
