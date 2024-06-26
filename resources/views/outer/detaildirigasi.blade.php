@extends('layouts.outer')
@section('content')


<section class="ud-hero" id="home">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
          <h1 class="ud-hero-title">
            {{ $title }}
          </h1>
        </div>
        <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
          <div class="card">
            <div class="card-body">
                @if (!$bendung->isEmpty() || !$jaringan->isEmpty())
                <div id="map" style="width: 100%; height: 540px;"></div>
                @else
                <p class="text-center">Data bendung dan jaringan tidak tersedia untuk ditampilkan!</p>
                @endif
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
              <button type="button" class="btn btn-warning" onclick="toggleCard('card1')"><i class="fas fa-info"></i> Bendung</button>
              <button type="button" class="btn btn-warning" onclick="toggleCard('card2')"><i class="fas fa-info"></i> Jaringan</button>
            </div>
        </div>
          <img
            src="{{ asset('play-bootstrap-main') }}/assets/images/hero/dotted-shape.svg"
            alt="shape"
            class="shape shape-1"
          />
          <img
            src="{{ asset('play-bootstrap-main') }}/assets/images/hero/dotted-shape.svg"
            alt="shape"
            class="shape shape-2"
          />
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ud-blog-grids">
  <div class="container" id="card1" style="display: none;">
    <div class="row justify-content-center text-center">
      @if ($bendung->isEmpty())
      <div class="col-lg-4 col-md-6 text-center">
        <p>Data Bendung Belum Tersedia!</p>
      </div>
      @else
      @foreach ($bendung as $data)
      <div class="col-lg-4 col-md-6">
        <div class="ud-single-blog">
          <div class="ud-blog-image">
            <strong>Bendung {{ $data->nama_bendung }}</strong>
              <img src="{{ asset('storage/foto-bendung/' . $data->foto) }}" class="img-fluid" alt="Foto Bendung" style=" max-height : 255px">
          </div>
          <span class="ud-blog-date">Koordinat : {{ $data->koordinat }}</span>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>

  <div class="container" id="card2" style="display: none;">
    <div class="row justify-content-center">
      @if ($jaringan->isEmpty())
      <div class="col-lg-4 col-md-6 text-center">
        <p>Data Jaringan Irigasi Belum Tersedia!</p>
      </div>
      @else
      @foreach ($jaringan as $data)
      <div class="col-lg-4 col-md-6">
        <div class="ud-single-blog">
          <div class="ud-blog-image">
              <img src="{{ asset('storage/foto-jaringan/' . $data->foto) }}" class="img-fluid" alt="Foto Jaringan">
          </div>
        </div>
      </div>
      @endforeach
      @endif
    </div>
  </div>
</section>
@include('layouts.footer')
@include('map.basemap')

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
            $.getJSON("{{ asset('storage/geojson-kabkota/' . $data->geojson) }}", function(data) {
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
$.getJSON("{{ asset('storage/geojson-jaringan/'. $data->geojson) }}", function(data) {
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
                iconUrl:'{{asset ('AdminLTE')}}//dist/img/bendung.png',
            iconSize: [38, 38],
            });

            L.marker ([<?= $data->koordinat ?>],{icon: myIcon}).addTo(map)
          .bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align: colspan="2"><img width="150" src="{{ asset('storage/foto-bendung/' . $data->foto) }}"</th></tr></thead><tr><td align="center" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Bendung {{ $data->dirigasi->nama_dirigasi }}</tr></td></tbody></table>');
          @endforeach

          </script>
@endsection