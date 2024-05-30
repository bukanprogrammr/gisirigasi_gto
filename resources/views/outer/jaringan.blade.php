@extends('layouts.frontend')

@section('content')

<!-- ====== Banner Start ====== -->
<section class="ud-page-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="ud-banner-content">
          <h1>{{ $title }}</h1>
        </div>
        <div class="card">
          <div class="card-body ">
            <div id="map" style="width: 100%; height: 600px; z-index: 0;"></div>
              </div>
          </div>  
      </div>
    </div>
    
    </div>
  </section>
  <!-- ====== Banner End ====== -->
  
  <!-- ====== About Start ====== -->
  <section id="about" class="ud-about">
    <div class="container">
      <br>
        <div class="card card-dark">
          <!-- /.card-header -->
          <div class="card-body">
        
            <table id="tabel1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="30px">No</th>
                  <th>Daerah Irigasi</th>
                  <th>Foto</th>
      
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach ($jaringan as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  {{-- <td><a href="#" class="zoom-geojson-link" data-geojson="{{ asset('storage/' . $data->geojson) }}">{{ $data->dirigasi->nama_dirigasi }}</a></td> --}}
                  <td>{{ $data->dirigasi->nama_dirigasi }}</td>
                  <td><img src="{{asset('storage/foto-jaringan/' . $data->foto)}}" class="img-fluid" style="max-height: 100px; max-width: 150px;"></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
  </div>
</section>
@include('layouts.footer')

<script>
  $(function() {
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
            $.getJSON("{{ asset('storage/geojson-kabkota/' . $data->geojson) }}", function(data) {
            L.geoJSON(data,{
                style : {
                    color : 'black',
                    fillColor : '{{ $data->warna }}',
                    fillOpacity : 0.4
                }
            }).addTo(data{{ $data->id }}).bindPopup("{{ $data->nama_kabkota }}");
          });
            @endforeach
            
            @foreach ($jaringan as $data)
            $.getJSON("{{ asset('storage/geojson-jaringan/' . $data->geojson) }}", function(data) {
            L.geoJSON(data,{
                style : {
                    color : 'cyan',
                    fillOpacity : 3
                }
          }).addTo(map).bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align: colspan="2"><img width="150" src="{{ asset('storage/foto-jaringan/' . $data->foto) }}"</th></tr></thead><tr><td align="center" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Jaringan Irigasi {{ $data->dirigasi->nama_dirigasi }}</tr></td></tbody></table>');
        });
            @endforeach

            // Mendapatkan semua link dengan class "zoom-geojson-link"
    var zoomGeoJSONLinks = document.querySelectorAll('.zoom-geojson-link');

// Menambahkan event listener untuk setiap link
zoomGeoJSONLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah perilaku default dari link
        
        // Mendapatkan URL GeoJSON dari atribut data-geojson link yang diklik
        var url = this.getAttribute('data-geojson');
        
        // Mendapatkan data GeoJSON dari URL
        $.getJSON(url, function(data) {
            // Membuat layer GeoJSON dari data
            var layer = L.geoJSON(data, {
                style: {
                    color: 'cyan',
                    fillOpacity: 0.3,
                }
            }).addTo(map);
            
            // Melakukan zoom ke GeoJSON
            map.fitBounds(layer.getBounds());
        });
    });
});
           
</script>

@endsection