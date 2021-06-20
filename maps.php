<!-- <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyBhSg6I2JvHNU_jLqIpvc5MEwc_xi3Ttvg"></script> -->

<!-- map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl9LtfJKn0c-q5ebjAaJfil1ghK6J6TSk&language=id&region=id"></script>
<script>
  var map;

  Number.prototype.toRad = function() {
    return this * Math.PI / 180;
  }

  function initialize() {
    <?php
    $lat0 = -6.914109;
    $lon0 = 106.933485;
    ?>
    var lat1 = <?php echo $lat0; ?>;
    var lon1 = <?php echo $lon0; ?>;

    var myLatlng = new google.maps.LatLng(lat1, lon1);
    var mapOptions = {
      zoom: 13,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    var image = 'http://localhost/Serenity/ypathicon/home2.png';
    var location0 = new google.maps.LatLng(lat1, lon1);
    var marker0 = new google.maps.Marker({
      position: location0,
      map: map,
      icon: image
    });
    marker0.setTitle("Posisi Anda");
    var content0 = "Diskopdagrin Kota Sukabumi";
    attachSecretMessage(marker0, content0);


    // or: new Array();
    var arLat = [];
    var arLon = [];
    var arNama = [];
    var arLok = [];
    var arJarak = [];
    var n = 0;
    var JM = 200000000;
    <?php
    $filter = '';
    if (isset($_POST["Cari"])) {
      $kategori2 = $_POST["kategori2"];
      $kecamatan2 = $_POST["kecamatan2"];
      if ($kategori2 != 0 || $kategori2 != '0') {
        $filter .= "AND kategori LIKE '%$kategori2%'";
      }
      if ($kecamatan2 != 0 || $kecamatan2 != '0') {
        $filter .= "AND kecamatan LIKE '%$kecamatan2%'";
      }
      // if (($kategori2 != 0) && ($kecamatan2 != 0)) {
      //   $sql = "select * from `$tbtenant` where kategori='$kategori2' and kecamatan like '%$kecamatan2%'"; // where status='Diterima'
      // } elseif (($kategori2 == 0) && ($kecamatan2 != 0)) {
      //   $sql = "select * from `$tbtenant` where kecamatan like '%$kecamatan2%'"; // where status='Diterima'
      // } else if (($kategori2 != 0) && ($kecamatan2 == 0)) {
      //   $sql = "select * from `$tbtenant` where kategori='$kategori2'"; // where status='Diterima'
      // }
      // if ($kecamatan2 == "") {
      //   $sql = "select * from `$tbtenant` where kategori='$kategori2' "; // where status='Diterima'

      // } elseif ($kategori2 == "") {
      //   $sql = "select * from `$tbtenant` where kecamatan like '%$kecamatan2%'"; // where status='Diterima'

      // } else {
      //   $sql = "select * from `$tbtenant` where kategori='$kategori2' and kecamatan like '%$kecamatan2%' "; // where status='Diterima'
      // }
    }
    $sql = "select * from `$tbtenant` WHERE 1=1 $filter"; // where status='Diterima'


    $arr = getData($conn, $sql);
    $j = 0;
    foreach ($arr as $d) {
      $id_tenant = $d["id_tenant"];
      $id_user = getUser($conn, $d["id_user"]);
      $nama_tenant = $d["nama_tenant"];
      $kategori = $d["kategori"];
      $sub_kategori = $d["sub_kategori"];
      $alamat = $d["alamat"];
      $kecamatan = $d["kecamatan"];
      $kelurahan = $d["kelurahan"];
      $email = $d["email"];
      $telepon = $d["telepon"];
      $latitude = $d["latitude"] ? $d["latitude"] : 0;
      $longitude = $d["longitude"] ? $d["longitude"] : 0;
      $fasilitas = $d["fasilitas"];
      $deskripsi = $d["deskripsi"];
      $status = $d["status"];
      $keterangan = $d["keterangan"];
      $gambar = $d["gambar"];
    ?>
      var lat2 = <?php echo $latitude ? $latitude : 0; ?>;
      var lon2 = <?php echo $longitude ? $longitude : 0; ?>;

      var R = 6371; // km
      //has a problem with the .toRad() method below.
      var x1 = lat2 - lat1;
      var dLat = x1.toRad();
      var x2 = lon2 - lon1;
      var dLon = x2.toRad();
      var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(lat1.toRad()) * Math.cos(lat2.toRad()) *
        Math.sin(dLon / 2) * Math.sin(dLon / 2);
      var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
      var d = R * c;

      arLat[n] = <?php echo $latitude; ?>;
      arLon[n] = <?php echo $longitude; ?>;
      arNama[n] = "<?php echo $nama_tenant; ?>";
      arLok[n] = "<?php echo "#<a href='testdir.php?mnu=peta&lat=$lat0&lon=$lon0&id=$id_pb&origin=$id_tenant' >Go Direction</a>"; ?>";
      arJarak[n] = d;
      n = n + 1;
    <?php
    } //else
    ?>

    for (var i = 0; i < n; i++) {
      var location = new google.maps.LatLng(arLat[i], arLon[i]);
      var image2 = 'http://localhost/Serenity/ypathicon/location.png';
      var marker = new google.maps.Marker({
        position: location,
        map: map,
        icon: image2
      });
      marker.setTitle(arNama[i]);
      var content = arNama[i] + "\n" + arLok[i] + " jarak :" + arJarak[i] + " KM";
      attachSecretMessage(marker, content);
    }
  }

  function attachSecretMessage(marker, lokasi) {
    var infowindow = new google.maps.InfoWindow({
      content: lokasi,
      size: new google.maps.Size(50, 50)
    });
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>


<body>
  <form method="post">
    <div class="span3 form-group">
      Kateogori :
      <select name="kategori2">
        <option value="0">Pilih Kategori</option>
        <option value="Bidang Koperasi dan UKM" <?php if ($kategori2 == "Bidang Koperasi dan UKM") {
                                                  echo "selected";
                                                } ?>>Bidang Koperasi dan UKM</option>
        <option value="Bidang Perdagangan" <?php if ($kategori2 == "Bidang Perdagangan") {
                                              echo "selected";
                                            } ?>>Bidang Perdagangan</option>
        <option value="Bidang Perindustrian" <?php if ($kategori2 == "Bidang Perindustrian") {
                                                echo "selected";
                                              } ?>>Bidang Perindustrian</option>
      </select>
    </div>

    <div class="span3 form-group">
      Kecamatan :
      <select name="kecamatan2">
        <option value="" <?php if ($kecamatan2 == "0") {
                            echo "selected";
                          } ?>>Pilih Kecamatan</option>
        <option value="Baros" <?php if ($kecamatan2 == "Baros") {
                                echo "selected";
                              } ?>>Baros</option>
        <option value="Cibeureum" <?php if ($kecamatan2 == "Cibeureum") {
                                    echo "selected";
                                  } ?>>Cibeureum</option>
        <option value="Cikole" <?php if ($kecamatan2 == "Cikole") {
                                  echo "selected";
                                } ?>>Cikole</option>
        <option value="Citamiang" <?php if ($kecamatan2 == "Citamiang") {
                                    echo "selected";
                                  } ?>>Citamiang</option>
        <option value="Gunungpuyuh" <?php if ($kecamatan2 == "Gunungpuyuh") {
                                      echo "selected";
                                    } ?>>Gunungpuyuh</option>
        <option value="Lembursitu" <?php if ($kecamatan2 == "Lembursitu") {
                                      echo "selected";
                                    } ?>>Lembursitu</option>
        <option value="Warudoyong" <?php if ($kecamatan2 == "Warudoyong") {
                                      echo "selected";
                                    } ?>>Warudoyong</option>
      </select>
    </div>

    <div class="span3 form-group"><br>
      <button name="Cari" class="btn btn-color btn-rounded" type="submit">Filter</button>
    </div>
  </form>

  <div id="map_canvas" style="width:100%;height:500px;"></div>

  <br>



</body>
