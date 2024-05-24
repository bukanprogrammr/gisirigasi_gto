@extends('layouts.frontend')

@section('content')

<div class="card">
  <div class="card-header bg-dark text-light">
      {{ $title }}
  </div>
  <div class="card-body">
          <div id="map" style="width: 100%; height: 600px;"></div>
      </div>
  </div>
    <div class="col-md-12">

      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Data {{ $title }}</h3>

          <div class="card-tools">
          </div>
          <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         
            <table id="tabel1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th width="30px">No</th>
                        <th>Nama</th>
                        <th>Warna</th>
                        <th>Daerah Irigasi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $no=1; ?>
                  @foreach ($kabkota as $data)
                      <tr>
                        <td>{{ $no++ }}</td>
                        <td><a href="#" onclick="zoomToCoordinate(<?= $data->geojson ?>)">{{ $data->nama_kabkota }}</a></td>
                        <td>{{ $data->warna }}</td>
                        <td>{{ $data->dirigasi->count() }}</td>
                        <td>{{ $data->sawah->count() }}</td>
                        <button id="zoom-button">Zoom to GeoJSON</button>
                      </tr>
                  @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    
    <script>
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

            @foreach ($kabkota as $data)
            var data{{ $data->id }} = L.layerGroup();
            @endforeach


            var map = L.map('map', {
                center: [0.7163124374861523, 122.40620802112356],
                zoom: 9,
                layers: [peta1, 
                @foreach ($kabkota as $data)
                data{{ $data->id }},
                @endforeach
            ]
            });
            
            var overlayer = {
                @foreach ($kabkota as $data)
                "{{ $data->nama_kabkota }}" : data{{ $data->id }},
                @endforeach
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
            }).addTo(data{{ $data->id }}).bindPopup("{{ $data->nama_kabkota }}");
          });

            @endforeach
            
            // zoom ke marker
            function zoomToCoordinate(geojson) {
              map.fitBounds(geojson.getBounds());
            }
            

    </script>

@endsection
