<form action="">
    <div class="form-group">
        <label for="">Latitude</label>
        <input type="text" id="latitude" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Longitude</label>
        <input type="text" id="longitude" class="form-control">
    </div>
</form>

<div id="map" class="w-100 h-50"></div>
<script>
    var map = L.map('map').setView([-7.406934902013996, 112.71154027096266], 16);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    var marker = L.marker([-7.406934902013996, 112.71154027096266]).addTo(map).bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

    var popup = L.popup()
        .setLatLng([-7.406934902013996, 112.71154027096266])
        .setContent('I am a standalone popup.')
        .openOn(map);

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent('You clicked the map at ' + e.latlng.toString())
            .openOn(map);
    }

    map.on('click', onMapClick);

    // var greenIcon = L.icon({
    //     iconUrl: 'leaf-green.png',
    //     shadowUrl: 'leaf-shadow.png',

    //     iconSize: [38, 95], // size of the icon
    //     shadowSize: [50, 64], // size of the shadow
    //     iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
    //     shadowAnchor: [4, 62], // the same for the shadow
    //     popupAnchor: [-3, -76] // point from which the popup should open relative to the iconAnchor
    // });

    // L.marker([51.5, -0.09], {
    //     icon: greenIcon
    // }).addTo(map);
</script>