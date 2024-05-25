@extends('layouts.frontend')
@section('content')

<div class="row">
    <div class="col-md-6">
      <h2><b>{{ $title }}</b></h2>
    </div>
    <div class="col-md-6 text-right text-center">
      <button type="button" class="btn btn-dark" onclick="toggleCard('card1')">Bendung</button>
      <button type="button" class="btn btn-dark" onclick="toggleCard('card2')">Jaringan</button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-dark text-light">
                Lokasi
                <div class="card-tools">
                    <button type="button" class="btn btn-dark btn-sm" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                @if (!$bendung->isEmpty() || !$jaringan->isEmpty())
                <div id="map" style="width: 100%; height: 540px;"></div>
                @else
                <p class="text-center">Data bendung dan jaringan tidak tersedia untuk ditampilkan!</p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <p class="card-description font-weight-bold">Info Daerah irigasi</p>
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td>{{ $dirigasi->nama_dirigasi }}</td>
                    </tr>
                    <tr>
                        <th>Wilayah Sebaran</th>
                        <td>:</td>
                        <td>
                            @foreach ($kabkota as $data)
                            - {{ $data->nama_kabkota }} <br>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>Luas</th>
                        <td>:</td>
                        <td>{{ $dirigasi->luas }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="card1" style="display: none;">

            @if ($bendung->isEmpty())
            <div class="card">
                <div class="card-body">
                    <p class="card-description font-weight-bold">Info Bendung</p>
                    <table class="table">
                        <tr>
                            <th>Belum ada data Bendung</th>
                        </tr>
                    </table>
                </div>
            </div>
            @else
            @foreach ($bendung as $data)
            <div class="card">
                <div class="card-body">
                    <p class="card-description font-weight-bold">Info Bendung</p>
                    @if ($data->foto)
                    <img src="{{ asset('storage/' . $data->foto) }}" class="img-fluid" alt="Foto Bendung">
                    @else
                    <p>Foto belum ada</p>
                    @endif
                    <p class="card-description font-weight-bold">Koordinat : {{ $data->koordinat }}</p>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <div id="card2" style="display: none;">
            @if ($jaringan->isEmpty())
            <div class="card">
                <div class="card-body">
                    <p class="card-description font-weight-bold">Info jaringan</p>
                    <table class="table">
                        <tr>
                            <th>Belum ada data jaringan</th>
                        </tr>
                    </table>
                </div>
            </div>
            @else
            @foreach ($jaringan as $data)
            <div class="card">
                <div class="card-body">
                    <p class="card-description font-weight-bold">Info jaringan</p>
                    @if ($data->foto)
                    <img src="{{ asset('storage/' . $data->foto) }}" class="img-fluid" alt="Foto jaringan">
                    @else
                    <p>Belum ada foto</p>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

  {{-- Jaringan Irigasi --}}
  {{-- <div class="grid-margin stretch-card" style="display: none;" id="card2">
    
    @if ($jaringan->isEmpty())
    <div class="card">
      <div class="card-body">
        <p class="card-description font-weight-bold">Info Jaringan Irigasi</p>
        <table class="table">
          <tr>
            <th>Belum ada data Jaringan Irigasi</th>
          </tr>
        </table>
      </div>
    </div>

    <div class="card">
      <div class="card">
        <div class="card-body">
          <p class="card-description font-weight-bold">Foto Jaringan Irigasi</p>
          <img src="" alt="belum ada foto">
        </div>
      </div>
    </div>

  @else
    @foreach ($jaringan as $data)
    <div class="card">
      <div class="card-body">
        <p class="card-description font-weight-bold">Info Jaringan Irigasi</p>
        <table class="table">
          <tr>
            <th>Titik Koordinat</th>
            <th>:</th>
            <th>@foreach ($jaringan as $data){{ $data->koordinat }}@endforeach</th>
          </tr>
        </table>
      </div>
    </div>

      <div class="card">
        <div class="card-body">
          <p class="card-description font-weight-bold">Foto Jaringan Irigasi</p>
          <img src="{{ asset('storage/' . $data->foto) }}" class="rounded" style="max-width: 100%; height: auto;">
        </div>
      </div>
    @endforeach
  @endif
  </div>
</div> --}}
{{-- kolom pencarian --}}
<script>

function toggleCard(cardId) {
    var bendungCard = document.getElementById('card1');
    var jaringanCard = document.getElementById('card2');

    if (cardId === 'card1') {
      bendungCard.style.display = 'block';
      jaringanCard.style.display = 'none';
    } else if (cardId === 'card2') {
      bendungCard.style.display = 'none';
      jaringanCard.style.display = 'block';
    }
  }

//tabel responsive
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

            var kabkota = L.layerGroup();

            var map = L.map('map', {
              center: [0.7163124374861523, 122.40620802112356],
                layers: [peta1, kabkota, ]
            });
            
            var overlayer = {
                "Kabkota" : kabkota,
            };
            
            L.control.layers(baseMaps, overlayer).addTo(map);
            
            // tampil area kabkota
            @foreach ($kabkota as $data)
            $.getJSON("{{ asset('storage/' . $data->geojson) }}", function(data) {
             L.geoJSON(data,{
                style : {
                    color : 'black',
                    fillColor : '{{ $data->warna }}',
                    fillOpacity : 0.4
                }
            }).addTo(kabkota).bindPopup("{{ $data->nama_kabkota }}");
          });
          @endforeach
            
            // tampil area jaringan
            @foreach ($jaringan as $data)
$.getJSON("{{ asset('storage/'. $data->geojson) }}", function(data) {
  var layer = L.geoJSON(data, {
    style: {
      color: 'cyan',
    }
  }).addTo(kabkota).bindPopup("{{ $dirigasi->nama_dirigasi }}");

  // Get the bounds of the layer
  var bounds = layer.getBounds();

  // Calculate the center point of the bounds
  var center = bounds.getCenter();

  // Set the view of the map to the center point of the layer
  map.setView(center, 12);
});
@endforeach

@foreach ($bendung as $data)
            // icon
            var myIcon = L.icon({
                iconUrl:'http://vegetasi-gto2.test/AdminLTE/dist/img/bendung.png',
            iconSize: [38, 38],
            });

            L.marker ([<?= $data->koordinat ?>],{icon: myIcon}).addTo(map)
          .bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align: colspan="2"><img width="150" src="{{ asset('storage/' . $data->foto) }}"</th></tr></thead><tr><td align="center" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Bendung {{ $data->dirigasi->nama_dirigasi }}</tr></td></tbody></table>');
          @endforeach

          </script>
@endsection