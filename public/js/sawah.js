// Iterasi melalui array sawah dengan forEach
sawah.forEach(function(data) {
    // Buat URL geojson dengan data->geojson
    var url = 'storage/geojson-sawah/' + data.geojson;

    // Lakukan permintaan GET JSON
    $.getJSON(url, function(geojsonData) {
        // Tambahkan geojson ke peta
        L.geoJSON(geojsonData, {
            style : {
                color : 'green',
                fillOpacity : 0.4
            }
        }).addTo(map);
    });
});