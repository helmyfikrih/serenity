<?php

require_once"konmysqli.php";

date_default_timezone_set("Asia/Jakarta");

function getField($conn,$sql){
 $rs=$conn->query($sql);
 $rs->data_seek(0);
 $d= $rs->fetch_assoc();
 $rs->free();
 return $d;
}


$id_tenant=$_GET["origin"];
	$sql="select * from `$tbtenant` where `id_tenant`='$id_tenant'";
	$d=getField($conn,$sql);
				$id_tenant=$d["id_tenant"];
				$id_user=$d["id_user"];
				$nama_tenant=$d["nama_tenant"];
				$kategori=$d["kategori"];
				$sub_kategori=$d["sub_kategori"];
				$alamat=$d["alamat"];
				$kecamatan=$d["kecamatan"];
				$kelurahan=$d["kelurahan"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$latitude=$d["latitude"];
				$longitude=$d["longitude"];
				$fasilitas=$d["fasilitas"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];

 

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable Directions</title>
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
        float: left;
        width: 63%;
        height: 100%;
      }
      #right-panel {
        float: right;
        width: 34%;
        height: 100%;
      }
      .panel {
        height: 100%;
        overflow: auto;
      }
    </style>
  </head>
  <body>
  <h1 align="center">Judul</h1>
    <div id="map"></div>
    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
	   </div>
	   
	   
	     <a href="index.php?mnu=peta"><button >Kembali</button></a>
 
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -6.353525, lng: 106.831629}
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsRenderer = new google.maps.DirectionsRenderer({
          draggable: true,
          map: map,
          panel: document.getElementById('right-panel')
        });

        directionsRenderer.addListener('directions_changed', function() {
          computeTotalDistance(directionsRenderer.getDirections());
        });
  


 <?php
 $lat0= -6.9291855;
 $lon0=106.9288922;
 ?>
 var awal = new google.maps.LatLng({lat: <?php echo $lat0;?>, lng: <?php echo $lon0;?>});
 var ahir = new google.maps.LatLng({lat: <?php echo $latitude;?>, lng: <?php echo $longitude;?>});
// var myLatLng32 = new google.maps.LatLng({lat: -6.168428, lng: 106.827406});




  displayRoute(awal,ahir, directionsService,directionsRenderer);
      }

      function displayRoute(origin, destination, service, display) {
        service.route({
          origin: origin,
          destination: destination,
          travelMode: 'DRIVING',
          avoidTolls: true
        }, function(response, status) {
          if (status === 'OK') {
            display.setDirections(response);
          } else {
            alert('Could not display directions due to: ' + status);
          }
        });
      }

      function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl9LtfJKn0c-q5ebjAaJfil1ghK6J6TSk&callback=initMap">
    </script>
  </body>
</html>

