<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>
    <br>
    <section class="content">
        <?php foreach ($unit as $un) { ?>
            <form enctype="multipart/form-data" action="<?php echo base_url('perusahaan/update_perusahaan'); ?>" method="post">
                <div class=" form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Nama Perusahaan</label>
                        <input type="hidden" name="id_perusahaan" class="form-control" value="<?php echo $un->id_perusahaan ?>">
                        <input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $un->nama_perusahaan ?>">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>Logo</label>
                        <input type="file" name="logo_perusahaan" class="form-control">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label>QR CODE</label>
                        <input type="text" name="qr" class="form-control" value="<?php echo $un->qr ?>">
                    </div>
                </div>
                <div class=" form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="">Desa/Kota/Kecamatan</label>
                        <input type="text" name="alamat_perusahaan" class="form-control" value="<?php echo $un->alamat_perusahaan ?>">
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <label for="">Latitude</label>
                        <input type="text" id="latitude" name="latitude" class="form-control" value="<?php echo $un->latitude ?>">
                    </div>
                    <div class="col-sm-4">
                        <label for="">Longitude</label>
                        <input type="text" id="longitude" name="longtitude" class="form-control" value="<?php echo $un->longtitude ?>">
                    </div>
                </div>
                <a onclick="return confirm('Yakin untuk diubah?');"><button style="margin:10px;" type="submit" class="btn btn-primary float-right btn-lg"><i class="far fa-paper-plane"> Simpan</i></button></a>
                <a href="<?php echo base_url('perusahaan/index'); ?>" style="margin:10px;" class="btn btn-danger float-right btn-lg"><i class="fas fa-angle-double-left"></i></a>
            </form>

    </section>
</div>
<div id="map" class="w-100 h-50"></div>
<script src="<?= base_url('src/assets/js/jquery-1.10.2.js'); ?>"></script>
<script>
    var curLocation = [0, 0];
    if (curLocation[0] == 0 && curLocation[1] == 0) {
        curLocation = [<?php echo $un->latitude ?>, <?php echo $un->longtitude ?>];
    }
    var map = L.map('map').setView([<?php echo $un->latitude ?>, <?php echo $un->longtitude ?>], 16);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);

    map.attributionControl.setPrefix(false);

    var marker = new L.marker(curLocation, {
        draggable: 'true'
    }).addTo(map).bindPopup("<b><?php echo $un->nama_perusahaan ?></b><br>I am a popup.").openPopup();
    <?php } ?>

    marker.on('dragend', function(event) {
        var position = marker.getLatLng();
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        $('#latitude').val(position.lat);
        $('#longitude').val(position.lng).keyup();
    })

    $('#latitude, #longitude').change(function() {
        var position = [parseInt($('#latitude').val()), parseInt($('#longitude').val())];
        marker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update();
        map.panTo(position);
    });
    // var popup = L.popup()
    //     .setLatLng([-7.406934902013996, 112.71154027096266])
    //     .setContent('I am a standalone popup.')
    //     .openOn(map);

    // function onMapClick(e) {
    //     popup
    //         .setLatLng(e.latlng)
    //         .setContent('You clicked the map at ' + e.latlng.toString())
    //         .openOn(map);
    // }

    map.on('click', onMapClick);

    map.addLayer(marker);
    // var map = L.map('map').setView([-7.406934902013996, 112.71154027096266], 16);

    // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    //     maxZoom: 18,
    //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
    //         'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    //     id: 'mapbox/streets-v11',
    //     tileSize: 512,
    //     zoomOffset: -1
    // }).addTo(map);

    // var marker = L.marker([-7.406934902013996, 112.71154027096266]).addTo(map).bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();

    // var popup = L.popup()
    //     .setLatLng([-7.406934902013996, 112.71154027096266])
    //     .setContent('I am a standalone popup.')
    //     .openOn(map);

    // function onMapClick(e) {
    //     popup
    //         .setLatLng(e.latlng)
    //         .setContent('You clicked the map at ' + e.latlng.toString())
    //         .openOn(map);
    // }

    // map.on('click', onMapClick);

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