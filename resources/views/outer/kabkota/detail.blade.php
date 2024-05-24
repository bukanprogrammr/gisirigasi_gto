@extends('layouts.frontend')
@section('content')
 
<div class="text-center"><h2><b>{{ $title }}</b></h2>
  <div class="row mt-4">
    <div class="col-lg-6">
    <div class="card" >
<div class="card-header bg-dark text-light">
    Lokasi
    <div class="card-tools">
        <button type="button" class="btn btn-dark btn-sm" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
        </button>
        </div>
</div>
<div class="card-body">
        <div id="map" style="width: 100%; height: 500px;"></div>
    </div>
</div>
</div>
<div class="col-lg-6 grid-margin stretch-card">
  <div class="card" >
  <div class="card-body">
    <p class="card-description font-weight-bold">
      Basic table with card
    </p>

      <table class="table" >
          <tr>
            <th>Nama</th>
            <th>:</th>
            <th>{{ $dirigasi->nama_dirigasi }}</th>
          </tr>
          <tr>
            <th>Luas</th>
            <th>:</th>
            <th>{{ $dirigasi->luas }}</th>
          </tr>

      </table>
    </div>
  </div>
  {{-- @foreach ($bendung as $data)
      
  <div class="card" id="dtl-bendung">
    <div class="card-body">
      <p class="card-description font-weight-bold" >
        Basic table with card
      </p>
      <img src="{{ asset('storage/' . $data->foto) }}" class=" rounded" >
    </div>
  </div>
  @endforeach
  </div>
    
    
<div class="col-md-6">
  <div class="card card-default">
  <div class="card-header">
  <h3 class="card-title">
  <i class="fas fa-bullhorn"></i>
  Daftar Komponen Daerah Irigasi {{ $dirigasi->nama_dirigasi }}
  </h3>
  </div>
  
  <div class="card-body" id="">
  <div class="callout callout-danger" style="cursor: pointer;" id="btn-bendung">
  <h4>BENDUNG</h4>
  <p>@foreach ($bendung as $data)
    {{ $data->nama_bendung }},
    @endforeach</p>
  </div>
  <div class="callout callout-info">
  <h4>SALURAN</h4>
  <p>Follow the steps to continue to payment.</p>
  </div>
  <div class="callout callout-warning">
  <h5>I am a warning callout!</h5>
  <p>This is a yellow callout.</p>
  </div>
  <div class="callout callout-success">
  <h5>I am a success callout!</h5>
  <p>This is a green callout.</p>
  </div>
  </div> --}}
  
  </div>
  
  </div>
  
  </div>
  
</div>
</div>
{{-- kolom pencarian --}}
{{-- <script>
    $(function () {
      $("#tabel1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

//basemap
@include('layouts.basemap')
            
            var data{{ $kabkota->id }} = L.layerGroup();

            var map = L.map('map', {
              @foreach ($bendung as $data)
              center: [{{ $data->koordinat }}],
                @endforeach 
                zoom: 13,
                layers: [peta1, data{{ $kabkota->id }}, ]
            });
            
            var overlayer = {
                "{{ $kabkota->nama_kabkota }}" : data{{ $kabkota->id }},
            };
            
            L.control.layers(baseMaps, overlayer).addTo(map);
            
            // tampil area kabkota
            var lpp = L.geoJSON(<?= $kabkota->geojson ?>, {
                style : {
                    color : 'black',
                    fillColor : '{{ $kabkota->warna }}',
                    fillOpacity : 0.4
                }
            }).addTo(data{{ $kabkota->id }}).bindPopup("{{ $kabkota->nama_kabkota }}");

            // tampil koordinat sekolah
            @foreach ($bendung as $data)
            // icon
            var myIcon = L.icon({
                iconUrl:'https://icon-icons.com/icons2/2588/PNG/512/dam_icon_154350.png',
            iconSize: [38, 38],
            });

            L.marker ([<?= $data->koordinat ?>],{icon: myIcon}).addTo(map)
            .bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align: colspan="2"><img width="150" src="{{ asset('storage/' . $data->fotoa) }}"</th></tr></thead><tbody><tr><td font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Nama</td><td font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>{{ $data->nama_bendung }}</td></tr><tr><td font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:><tr><td font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:><tr><td align="center" colspan="2"><a href="/detail/{{ $data->id_bendung }}" class="btn-xs btn-success text-light">Detail</a></td></tr></tbody></table>');
            @endforeach
            
            // tampil area sawah
          @foreach ($sawah as $data)
          L.geoJSON(<?= $data->geojson ?>,{
              style : {
                  color : 'black',
                  fillOpacity : 0.4
              }
          }).addTo(map).bindPopup("{{ $data->id }}");
          @endforeach
          
          //tampil detail
                  document.getElementById("btn-bendung").addEventListener("click", function() {
          var div = document.getElementById("dtl-bendung");
          if (div.style.display === "none") {
            div.style.display = "block";
          } else {
            div.style.display = "none";
          }
        }); 

          </script> --}}
@endsection