<script>
    @include('map.basemap')
    // basemap
    
    // layer grup
    var kabkota = L.layerGroup();
    var sawah = L.layerGroup();
    var jaringan = L.layerGroup();
    var bendung = L.layerGroup();
    var masyarakat = L.layerGroup();
    
    // tampil di map
    var map = L.map('map', {
        center: [0.7163124374861523, 122.40620802112356],
        zoom: 10,
        minZoom: 10,
        maxBounds: L.latLngBounds(
            L.latLng(0.7163124374861523 - 1.50, 122.40620802112356 - 1.50), // Batas bawah kiri
            L.latLng(0.7163124374861523 + 1.50, 122.40620802112356 + 1.50)  // Batas atas kanan
        ),
        layers: [peta1, kabkota, sawah, jaringan, bendung, masyarakat]
    });
    
    var overlayer = {
        "Kabkota": kabkota,
        "Sawah": sawah,
        "Jaringan": jaringan,
        "Bendung": bendung,
        "Masalah": masyarakat,
    };
    
    L.control.layers(baseMaps, overlayer).addTo(map);
    
    
    
    // tampil area kabkota
    @foreach ($kabkota as $data)
    $.getJSON("{{ asset('storage/geojson-kabkota/' . $data->geojson) }}", function(data) {
        var layer = L.geoJSON(data, {
            style: {
                color: 'black',
                fillColor: '{{ $data->warna }}',
                fillOpacity: 0.3,
            }
        }).bindPopup("{{ $data->nama_kabkota }}").addTo(kabkota).bringToBack();  // Memastikan layer kabkota berada di bawah
    });
    @endforeach
    
    // tampil area sawah
    @foreach ($sawah as $data)
    $.getJSON("{{ asset('storage/geojson-sawah/' . $data->geojson) }}", function(data) {
        L.geoJSON(data, {
            style: {
                color: 'green',
                fillOpacity: 0.4,
                 }
        }).addTo(sawah).bindPopup("{{ $data->id }}").bringToBack();
    });
    @endforeach
    
    // tampil area jaringan
    var jaringanLayers = [];
    @foreach ($jaringan as $data)
$.getJSON("{{ asset('storage/geojson-jaringan/' . $data->geojson) }}", function(data) {
    var layer = L.geoJSON(data, {
        style: {
            color: 'cyan',
            fillOpacity: 0.3,
            weight: 5,
            interactive: true,
        }
    }).bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:center colspan="2"><img width="150" src="{{ asset('storage/foto-jaringan/' . $data->foto) }}"</th></tr></thead><tr><td align="center" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top>Jaringan Irigasi {{ $data->dirigasi->nama_dirigasi }}</td></tr><tr><td align="center"><button onclick="zoomToLayer({{ $loop->index }})" class="btn btn-primary">Zoom</button></td></tr></tbody></table>').addTo(jaringan).bringToFront();
    jaringanLayers.push({
        name: "{{ $data->dirigasi->nama_dirigasi }}".toLowerCase(),
        layer: layer
    });
});
@endforeach

var bendungLayers = [];
@foreach ($bendung as $data)
    // icon
    var myIcon = L.icon({
        iconUrl: '{{asset ('AdminLTE')}}//dist/img/bendung.png',
        iconSize: [30, 30],
    });
    
    var marker = L.marker([<?= $data->koordinat ?>], { icon: myIcon }).addTo(bendung)
        .bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:center colspan="2"><img width="150" src="{{ asset('storage/foto-bendung/' . $data->foto) }}"</th></tr></thead><tr><td align="center" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Bendungan {{ $data->dirigasi->nama_dirigasi }}</td></tr><tr><td align="center"><button class="btn btn-primary btn-xs" onclick="zoomToCoordinate([<?= $data->koordinat ?>])")">zoom</button></td></tr></tbody></table>');
    bendungLayers.push({
        name: "{{ $data->dirigasi->nama_dirigasi }}".toLowerCase(), // Simpan nama bendung dalam huruf kecil
        layer: marker
    });
@endforeach
    
    // tampil marker masalah
    @foreach ($masyarakat as $data)
    // icon
    var myIcon = L.icon({
        iconUrl: 'https://cdn-icons-png.flaticon.com/512/8376/8376179.png',
        iconSize: [30, 30],
                
    });
    
    L.marker([<?= $data->koordinat ?>], { icon: myIcon }).addTo(masyarakat)
        .bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align: colspan="2"><img width="150" src="{{ asset('storage/foto-masalah/' . $data->foto) }}" style="display: block; margin: 0 auto;"></th></tr></thead><tr><td align="justify" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:>Permasalahan : {{ $data->kritik }}</td></tr><tr><td align="center"><button class="btn btn-primary btn-xs" onclick="zoomToCoordinate([<?= $data->koordinat ?>])")">zoom</button></td></tr></tbody></table>');
    @endforeach


</script>