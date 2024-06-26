@extends('layouts.outer')

@section('content')

<!-- ====== Banner Start ====== -->
<section class="ud-page-banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 wow fadeInUp" data-wow-delay=".2s">
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
        <div class="card card-dark wow fadeInUp" data-wow-delay=".2s">
          <!-- /.card-header -->
          <div class="card-body">
        
            <table id="tabel1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="30px">No</th>
                  <th>Kab./Kota</th>
                  <th>Jumlah Sawah</th>
      
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                @foreach ($kabkota as $data)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $data->nama_kabkota }}</td>
                  <td>{{ $data->sawah->count() }}</td>
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
            @include('map.basemap')
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
            
            // tampil area kecamatan
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
            
            var sawah = @json($sawah);// Iterasi melalui array sawah dengan forEach
            
</script>
<script src="js/sawah.js"></script>

@endsection