<script>

    //basemap
    @include('layouts.basemap')

    //layer grup
    var kabkota = L.layerGroup();
    var sawah = L.layerGroup();
    var jaringan = L.layerGroup();
    var bendung = L.layerGroup();
    var masyarakat = L.layerGroup();

    //tampil di map
    var map = L.map('map', {
        center: [0.7163124374861523, 122.40620802112356],
        zoom: 10,
        layers: [peta1, kabkota, sawah, jaringan, bendung, masyarakat,
        
    ]
    });
    
    var overlayer = {
        "Kabkota" : kabkota,
        "Sawah" : sawah,
        "Jaringan" : jaringan,
        "Bendung" : bendung,
        "Masalah" : masyarakat,
        
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
    
    // tampil area sawah
    @foreach ($sawah as $data)
      $.getJSON("{{ asset('storage/geojson-sawah/' . $data->geojson) }}", function(data) {
      L.geoJSON(data,{
          style : {
              color : 'green',
              fillOpacity : 0.4
          }
    }).addTo(sawah).bindPopup("{{ $data->id }}");
  });
    @endforeach
    
    // tampil area jaringan
    @foreach ($jaringan as $data)
      $.getJSON("{{ asset('storage/geojson-jaringan/' . $data->geojson) }}", function(data) {
      L.geoJSON(data,{
          style : {
              color : 'cyan',
              fillOpacity : 3
          }
    }).addTo(jaringan).bindPopup("Jaringan Irigasi {{ $data->dirigasi->nama_dirigasi }}");
  });
    @endforeach

    // tampil marker bendung
    @foreach ($bendung as $data)
    // icon
    var myIcon = L.icon({
        iconUrl:'http://vegetasi-gto2.test/AdminLTE/dist/img/bendung.png',
    iconSize: [30, 30],
    });

    L.marker ([<?= $data->koordinat ?>],{icon: myIcon}).addTo(bendung)
    .bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:center colspan="2"><img width="150" src="{{ asset('storage/foto-bendung/' . $data->foto) }}"</th></tr></thead><tr><td align="center" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Bendungan {{ $data->dirigasi->nama_dirigasi }}</tr></td></tbody></table>');
    @endforeach

    // tampil marker masalah
    @foreach ($masyarakat as $data)
    // icon
    var myIcon = L.icon({
        iconUrl:'https://cdn-icons-png.flaticon.com/512/8376/8376179.png',
    iconSize: [30, 30],
    });

    L.marker ([<?= $data->koordinat ?>],{icon: myIcon}).addTo(masyarakat)
    .bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align: colspan="2"><img width="150" src="{{ asset('storage/foto-masalah/' . $data->foto) }}" style="display: block; margin: 0 auto;"></th></tr></thead><tr><td align="justify" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Permasalahan : {{ $data->kritik }}</tr></td></tbody></table>');
    @endforeach
    
</script>
