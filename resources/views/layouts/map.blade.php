<script>
    @include('layouts.basemap')
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
    var kabkotaLayers = [];
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
    }).bindPopup('<table class="table table-bordered" style="border-collapse:collapse;border-spacing:0"><thead><tr><th font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:center colspan="2"><img width="150" src="{{ asset('storage/foto-jaringan/' . $data->foto) }}"</th></tr></thead><tr><td align="center" font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;text-align:left;vertical-align:top>Jaringan Irigasi {{ $data->dirigasi->nama_dirigasi }}<br><button onclick="zoomToLayer({{ $loop->index }})" class="btn btn-primary">Zoom</button></td></tr></tbody></table>').addTo(jaringan).bringToFront();
    jaringanLayers.push({
        name: "{{ $data->dirigasi->nama_dirigasi }}".toLowerCase(),
        layer: layer
    });
});
@endforeach

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

    // Fungsi zoom ke marker
function zoomToCoordinate(coordinate) {
                map.setView(coordinate, 15);
            }

   // Fungsi untuk menampilkan saran saat pengguna mengetik
function showSuggestions() {
    var input = document.getElementById("network-name").value.toLowerCase(); // Dapatkan nilai input dan ubah menjadi huruf kecil
    var suggestionsList = document.getElementById("suggestions"); // Dapatkan daftar saran
    suggestionsList.innerHTML = ''; // Bersihkan daftar saran sebelum menambahkan yang baru

    // Loop melalui lapisan sesuai dengan jenis pencarian
    var searchType = document.getElementById("search-type").value;
    var layers = [];
    if (searchType === "jaringan") {
        layers = jaringanLayers;
    } else if (searchType === "bendung") {
        layers = bendungLayers;
    } else if (searchType === "kabkota") {
        layers = kabkotaLayers;
    }

    // Cari lapisan yang cocok dengan input pengguna dan tambahkan ke daftar saran
    layers.forEach(function(layer) {
        if (layer.name.includes(input)) {
            var suggestion = document.createElement('div');
            suggestion.textContent = layer.name;
            suggestion.classList.add('suggestion');
            suggestion.addEventListener('click', function() {
                // Ketika pengguna memilih saran, isi input dengan nilai saran
                document.getElementById("network-name").value = layer.name;
                // Panggil fungsi pencarian
                searchNetwork();
                // Sembunyikan daftar saran
                suggestionsList.innerHTML = '';
            });
            suggestionsList.appendChild(suggestion);
        }
    });

    // Tampilkan atau sembunyikan daftar saran sesuai dengan apakah ada saran yang cocok
    if (suggestionsList.children.length > 0) {
        suggestionsList.style.display = 'block';
    } else {
        suggestionsList.style.display = 'none';
    }
}

// Tambahkan event listener ke input untuk memanggil fungsi tampilkan saran saat pengguna mengetik
document.getElementById("network-name").addEventListener("input", showSuggestions);

// Tambahkan event listener untuk mendeteksi tombol Enter
document.getElementById("network-name").addEventListener("keyup", function(event) {
    if (event.key === "Enter") {
        searchNetwork();
    }
});

// Tambahkan event listener ke body untuk menyembunyikan daftar saran saat klik di luar daftar
document.body.addEventListener("click", function(event) {
    var suggestionsList = document.getElementById("suggestions");
    if (!event.target.closest("#suggestions") && event.target.id !== "network-name") {
        suggestionsList.innerHTML = ''; // Sembunyikan daftar saran
    }
});

    // Function to search and highlight network
    function searchNetwork() {
        var input = document.getElementById("network-name").value.toLowerCase(); // Ubah input ke huruf kecil
        var searchType = document.getElementById("search-type").value; // Ambil nilai dari select
        var found = false;

        if (searchType === "jaringan") {
            jaringanLayers.forEach(function(jaringan) {
                if (jaringan.name.includes(input)) { // Cari substring
                    map.fitBounds(jaringan.layer.getBounds());
                    jaringan.layer.openPopup();
                    found = true;
                }
            });
        } else if (searchType === "bendung") {
            bendungLayers.forEach(function(bendung) {
                if (bendung.name.includes(input)) { // Cari substring
                    map.setView(bendung.layer.getLatLng(), 15);
                    bendung.layer.openPopup();
                    found = true;
                }
            });
        }

        if (!found) {
            alert("Tidak ditemukan");
        }
    }

    // Tambahkan event listener untuk mendeteksi tombol Enter
    document.getElementById("network-name").addEventListener("keyup", function(event) {
        if (event.key === "Enter") {
            searchNetwork();
        }
    });
</script>