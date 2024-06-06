@extends('layouts.outer')

@section('content')
<style>
  
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
      <option value="jaringan">Cari Jaringan</option>
      <option value="bendung">Cari Bendung</option>
    </select>
    <input type="text" id="network-name" placeholder="Masukkan Nama">
    <button onclick="searchNetwork()">Cari</button>
    <!-- Daftar saran akan ditampilkan di bawah input -->
    <div id="suggestions" style="position: absolute; top: 100%; left: 0; width: 100%; background: #fff; border: 1px solid #ccc; display: none;"></div>
  </div>
  
  <div id="map" style="height: 90vh; z-index: 0;"></div>
</section>

@include('layouts.map')

@endsection
