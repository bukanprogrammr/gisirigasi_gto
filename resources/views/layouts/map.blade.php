<script>
    
    // layer grup
    var kabkota = L.layerGroup();
    var sawah = L.layerGroup();
    var jaringan = L.layerGroup();
    var bendung = L.layerGroup();
    var masyarakat = L.layerGroup();
    
    // tampil di map
    var map = L.map('map', {
        center: [0.7163124374861523, 122.40620802112356],
        zoom: 9,
        minZoom: 9,
        maxBounds: L.latLngBounds(
            L.latLng(0.7163124374861523 - 1.50, 122.40620802112356 - 1.50), // Batas bawah kiri
            L.latLng(0.7163124374861523 + 1.50, 122.40620802112356 + 1.50)  // Batas atas kanan
        ),
        layers: [peta4, kabkota, sawah, jaringan, bendung, masyarakat]
    });
    
    var overlayer = {
        "Kabkota": kabkota,
        "Sawah": sawah,
        "Jaringan": jaringan,
        "Bendung": bendung,
        "Masalah": masyarakat,
    };
    
    L.control.layers(baseMaps, overlayer).addTo(map);
    
    L.control.resetView({
        position: "topleft",
        title: "Reset view",
        latlng: L.latLng([0.7163124374861523, 122.40620802112356]),
        zoom: 9,
    }).addTo(map);
    
    
    
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
    }).bindPopup(`<table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">
                    <img width="150" src="{{ asset('storage/foto-jaringan/' . $data->foto) }}">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">
                    Jaringan Irigasi {{ $data->dirigasi->nama_dirigasi }}
                </td>
            </tr>
            <tr>
                <td style="text-align: justify; display: none;">
                    {{ $data->deskripsi }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                   <button onclick="zoomToLayer({{ $loop->index }}, '{{ $data->dirigasi->nama_dirigasi }}', '{{ $data->deskripsi }}', '{{ asset('storage/foto-jaringan/' . $data->foto) }}')" class="btn btn-primary">Zoom</button>
                </td>
            </tr>
        </tbody>
    </table>`).addTo(jaringan).bringToFront();
    jaringanLayers.push({
        name: "{{ $data->dirigasi->nama_dirigasi }}".toLowerCase(),
        layer: layer
    });
});
@endforeach

    //Fungsi zoom ke geojson
    function zoomToLayer(index) {
        var layer = jaringanLayers[index].layer;
        map.fitBounds(layer.getBounds());
    }

var bendungLayers = [];
@foreach ($bendung as $data)
    // icon
    var myIcon = L.icon({
        iconUrl: '{{asset ('AdminLTE')}}//dist/img/bendung.png',
        iconSize: [30, 30],
    });
    
    var marker = L.marker([<?= $data->koordinat ?>], { icon: myIcon }).addTo(bendung)
        .bindPopup(`<table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">
                    <img width="150" src="{{ asset('storage/foto-bendung/' . $data->foto) }}">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center;">
                    Bendung {{ $data->nama_bendung }}
                </td>
            </tr>
            <tr id="desc-{{ $data->id }}" style="display: none;">
                <td style="text-align: center; white-space: normal;">
                    {{ $data->deskripsi }}
                </td>
            </tr>
            <tr>
                <td style="text-align: center;">
                    <button class="btn btn-primary btn-xs" onclick="zoomToCoordinate([<?= $data->koordinat ?>], {{ $data->id }}, 'bendung', '{{ $data->dirigasi->nama_dirigasi }}', '{{ $data->deskripsi }}', '{{ asset('storage/foto-bendung/' . $data->foto) }}')">Zoom</button>
                </td>
            </tr>
        </tbody>
    </table>`);
    bendungLayers.push({
        name: "{{ $data->nama_bendung }}".toLowerCase(), // Simpan nama bendung dalam huruf kecil
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
        .bindPopup(`<table class="table table-bordered" style="border-collapse: collapse;">
    <thead>
        <tr>
            <th style="padding: 10px 5px; text-align: left;">
                <img width="150" src="{{ asset('storage/foto-masalah/' . $data->foto) }}" style="display: block; margin: 0 auto;">
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="padding: 10px 5px; text-align: justify;">
                <strong>Permasalahan :</strong> {{ $data->kritik }}
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                 <button class="btn btn-primary btn-xs" onclick="zoomToCoordinate([<?= $data->koordinat ?>], {{ $data->id }}, 'masalah', '{{ $data->kritik }}', '', '{{ asset('storage/foto-masalah/' . $data->foto) }}')">Zoom</button>
            </td>
        </tr>
    </tbody>
</table>`);
    @endforeach

    
</script>