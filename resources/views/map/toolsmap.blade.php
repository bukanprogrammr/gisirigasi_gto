<script>

    //Fungsi zoom ke geojson
    function zoomToLayer(index) {
        var layer = jaringanLayers[index].layer;
        map.fitBounds(layer.getBounds());
    }




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
    


    // Ukur Jarak
    L.control.scale ({maxWidth:240, metric:true, imperial:false, position: 'bottomleft'}).addTo (map);
            let polylineMeasure = L.control.polylineMeasure ({position:'topleft', unit:'kilometres', showBearings:true, clearMeasurementsOnStop: false, showClearControl: true, showUnitControl: true})
            polylineMeasure.addTo (map);

            function debugevent(e) { console.debug(e.type, e, polylineMeasure._currentLine) }

            map.on('polylinemeasure:toggle', debugevent);
            map.on('polylinemeasure:start', debugevent);
            map.on('polylinemeasure:resume', debugevent);
            map.on('polylinemeasure:finish', debugevent);
            map.on('polylinemeasure:change', debugevent);
            map.on('polylinemeasure:clear', debugevent);
            map.on('polylinemeasure:add', debugevent);
            map.on('polylinemeasure:insert', debugevent);
            map.on('polylinemeasure:move', debugevent);
            map.on('polylinemeasure:remove', debugevent);
            

    L.control.fullscreen({
    position: 'topright', // Atur posisi tombol fullscreen
    title: 'Fullscreen',   // Judul tooltip untuk tombol fullscreen
    titleCancel: 'Exit Fullscreen', // Judul tooltip saat keluar dari fullscreen
    forceSeparateButton: true // Menampilkan tombol fullscreen terpisah
}).addTo(map);
        
</script>