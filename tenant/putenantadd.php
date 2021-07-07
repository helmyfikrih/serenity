<?php
$cid_user = $_SESSION["cid"];
$cstatus = $_SESSION["cstatus"];
$ckategori = $_SESSION["ckategori"];
?>

<?php

$tanggal = WKT(date("Y-m-d"));
$pro = "simpan";
$label = "Tambah";
$gambar0 = "avatar.jpg";
$status = "Aktif";
$sub_kategori = "-";
$kelurahan = "-";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/"; ?>ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo "$PATH/"; ?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/"; ?>ui/i18n/ui.datepicker-id.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#tanggal").datepicker({
      dateFormat: "dd MM yy",
      changeMonth: true,
      changeYear: true
    });
  });
</script>

<script type="text/javascript">
  function PRINT() {
    win = window.open('tenant/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
  }
</script>
<script language="JavaScript">
  function buka(url) {
    window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
  }
</script>


<script type="text/javascript">
  var xmlHttp

  function showKategori(str) {
    xmlHttp = GetXmlHttpObject()
    if (xmlHttp == null) {
      alert("Browser tidak support HTTP Request")
      return
    }
    var url = "getKategori.php"
    url = url + "?q=" + str
    url = url + "&sid=" + Math.random()
    xmlHttp.onreadystatechange = SC1
    xmlHttp.open("GET", url, true)
    xmlHttp.send(null)
  }

  function SC1() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
      document.getElementById("txtHint").innerHTML = xmlHttp.responseText
    }
  }

  function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
      xmlHttp = new XMLHttpRequest();
    } catch (e) {
      try {
        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
    }
    return xmlHttp;
  }
</script>

<script type="text/javascript">
  var xmlHttp

  function showKecamatan(str) {
    xmlHttp = GetXmlHttpObject2()
    if (xmlHttp == null) {
      alert("Browser tidak support HTTP Request")
      return
    }
    var url = "getKecamatan.php"
    url = url + "?q=" + str
    url = url + "&sid=" + Math.random()
    xmlHttp.onreadystatechange = SC12
    xmlHttp.open("GET", url, true)
    xmlHttp.send(null)
  }

  function SC12() {
    if (xmlHttp.readyState == 4 || xmlHttp.readyState == "complete") {
      document.getElementById("txtHint2").innerHTML = xmlHttp.responseText
    }
  }

  function GetXmlHttpObject2() {
    var xmlHttp = null;
    try {
      xmlHttp = new XMLHttpRequest();
    } catch (e) {
      try {
        xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
    }
    return xmlHttp;
  }
</script>

<!-- -->
<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
<script>
  $(function() {
    $("#accordion").accordion({
      collapsible: true
    });
  });
</script>
<!-- -->


<!-- -->
<h3>Input Data Usaha</h3>


<form action="" method="post" enctype="multipart/form-data">
  <table width="55%">


    <tr>
      <td><label for="nama_tenant">Nama Usaha</label>
      <td>:
      <td width="326"><input name="nama_tenant" type="text" id="nama_tenant" value="<?php echo $nama_tenant; ?>" size="20" required />
      </td>
      <td width="81" rowspan="4">
        <center>
          <?php
          echo "<a href='#' onclick='buka(\"admin/zoom.php?id=$kode_admin\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
          ?>
        </center>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="kategori">Kategori</label>
      <td>:
      <td>
        <select name="kategori" onChange="showKategori(this.value)" required>
          <option value="">Pilih Kategori</option>
          <option value="Bidang Koperasi dan UKM" <?php if ($kategori == "Bidang Koperasi dan UKM") {
                                                    echo "selected";
                                                  } ?>>Bidang Koperasi dan UKM</option>
          <option value="Bidang Perdagangan" <?php if ($kategori == "Bidang Perdagangan") {
                                                echo "selected";
                                              } ?>>Bidang Perdagangan</option>
          <option value="Bidang Perindustrian" <?php if ($kategori == "Bidang Perindustrian") {
                                                  echo "selected";
                                                } ?>>Bidang Perindustrian</option>
        </select>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="sub_kategori">Sub Kategori</label>
      <td>:
      <td>
        <div id="txtHint">
          <select name="sub_kategori" required>
            <option value="<?php echo $sub_kategori; ?>"><?php echo $sub_kategori; ?></option>
          </select>
        </div>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="alamat">Alamat</label>
      <td>:
      <td><textarea name="alamat" id="alamat" size="25" required><?php echo $alamat; ?></textarea>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="kecamatan">Kecamatan</label>
      <td>:
      <td>
        <select name="kecamatan" onChange="showKecamatan(this.value)" required>
          <option value="">Pilih Kecamatan</option>
          <option value="Baros" <?php if ($kecamatan == "Baros") {
                                  echo "selected";
                                } ?>>Baros</option>
          <option value="Cibeureum" <?php if ($kecamatan == "Cibeureum") {
                                      echo "selected";
                                    } ?>>Cibeureum</option>
          <option value="Cikole" <?php if ($kecamatan == "Cikole") {
                                    echo "selected";
                                  } ?>>Cikole</option>
          <option value="Citamiang" <?php if ($kecamatan == "Citamiang") {
                                      echo "selected";
                                    } ?>>Citamiang</option>
          <option value="Gunungpuyuh" <?php if ($kecamatan == "Gunungpuyuh") {
                                        echo "selected";
                                      } ?>>Gunungpuyuh</option>
          <option value="Lembursitu" <?php if ($kecamatan == "Lembursitu") {
                                        echo "selected";
                                      } ?>>Lembursitu</option>
          <option value="Warudoyong" <?php if ($kecamatan == "Warudoyong") {
                                        echo "selected";
                                      } ?>>Warudoyong</option>
        </select>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="kelurahan">Kelurahan</label>
      <td>:
      <td>
        <div id="txtHint2">
          <select name="kelurahan" required>
            <option value="<?php echo $kelurahan; ?>"><?php echo $kelurahan; ?></option>
          </select>
        </div>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="email">Email</label>
      <td>:
      <td><input name="email" type="text" id="email" value="<?php echo $email; ?>" size="25" />
      </td>
    </tr>

    <tr>
      <td height="24"><label for="telepon">Telepon</label>
      <td>:
      <td><input name="telepon" type="text" id="telepon" value="<?php echo $telepon; ?>" size="15" required />
      </td>
    </tr>

    <tr>
      <td height="24"><label for="latitude">Latitude</label>
      <td>:
      <td><input name="latitude" type="text" id="latitude" value="<?php echo $latitude; ?>" size="25" required />
      </td>
    </tr>

    <tr>
      <td height="24"><label for="longitude">Longitude</label>
      <td>:
      <td><input name="longitude" type="text" id="longitude" value="<?php echo $longitude; ?>" size="25" required />
      </td>
    </tr>

    <tr>
      <td height="24"><label for="fasilitas">Fasilitas</label>
      <td>:
      <td><textarea name="fasilitas" cols="40" rows="3" id="fasilitas"><?php echo $fasilitas; ?></textarea>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="deskripsi">Deskripsi Usaha</label>
      <td>:
      <td><textarea name="deskripsi" id="deskripsi" size="25"><?php echo $deskripsi; ?></textarea>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="keterangan">Keterangan</label>
      <td>:
      <td><textarea name="keterangan" id="keterangan" size="25"><?php echo $keterangan; ?></textarea>
      </td>
    </tr>

    <tr>
      <td height="24"><label for="gambar">Logo Usaha</label>
      <td>:
      <td colspan="2">
        <input name="gambar" type="file" id="gambar" size="20" />
        => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kode_admin; ?>")'><?php echo $gambar0; ?></a>
      </td>
    </tr>


    <tr>
      <td>
      <td>
      <td colspan="2"><input onclick="return confirm('Apakah data sudah benar?')" name="Simpan" type="submit" id="Simpan" class="btn btn-primary" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0; ?>" />
        <a href="?mnu=putenant"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
      </td>
    </tr>
  </table>
</form>

<?php
if (isset($_POST["Simpan"])) {

  $sql = "select `id_tenant` from `$tbtenant` order by `id_tenant` desc";
  $q = mysqli_query($conn, $sql);
  $jum = mysqli_num_rows($q);
  $th = date("y");
  $bl = date("m") + 0;
  if ($bl < 10) {
    $bl = "0" . $bl;
  }

  $kd = "IDT" . $th . $bl; //KEG1610001
  if ($jum > 0) {
    $d = mysqli_fetch_array($q);
    $idmax = $d["id_tenant"];

    $bul = substr($idmax, 5, 2);
    $tah = substr($idmax, 3, 2);
    if ($bul == $bl && $tah == $th) {
      $urut = substr($idmax, 7, 3) + 1;
      if ($urut < 10) {
        $idmax = "$kd" . "00" . $urut;
      } else if ($urut < 100) {
        $idmax = "$kd" . "0" . $urut;
      } else {
        $idmax = "$kd" . $urut;
      }
    } //==
    else {
      $idmax = "$kd" . "001";
    }
  } //jum>0
  else {
    $idmax = "$kd" . "001";
  }
  $id_tenant = $idmax;


  $id_user = $_SESSION["cid"];
  $nama_tenant = strip_tags($_POST["nama_tenant"]);
  $kategori = strip_tags($_POST["kategori"]);
  $sub_kategori = strip_tags($_POST["sub_kategori"]);
  $alamat = strip_tags($_POST["alamat"]);
  $kecamatan = strip_tags($_POST["kecamatan"]);
  $kelurahan = strip_tags($_POST["kelurahan"]);
  $email = strip_tags($_POST["email"]);
  $telepon = strip_tags($_POST["telepon"]);
  $latitude = strip_tags($_POST["latitude"]);
  $longitude = strip_tags($_POST["longitude"]);
  $fasilitas = strip_tags($_POST["fasilitas"]);
  $deskripsi = strip_tags($_POST["deskripsi"]);
  $status = "Belum diverifikasi";
  $keterangan = strip_tags($_POST["keterangan"]);

  $gambar0 = strip_tags($_POST["gambar0"]);
  if ($_FILES["gambar"] != "") {
    @copy($_FILES["gambar"]["tmp_name"], "$YPATH/" . $_FILES["gambar"]["name"]);
    $gambar = $_FILES["gambar"]["name"];
  } else {
    $gambar = $gambar0;
  }
  if (strlen($gambar) < 1) {
    $gambar = $gambar0;
  }

  $sql = " INSERT INTO `$tbtenant` (
`id_tenant` ,
`id_user` ,
`nama_tenant` ,
`kategori` ,
`sub_kategori` ,
`alamat` ,
`kecamatan` ,
`kelurahan` ,
`email` ,
`telepon` ,
`latitude`,
`longitude`,
`fasilitas`,
`deskripsi`,
`status`,
`keterangan`,
`gambar`
) VALUES (
'$id_tenant', 
'$id_user', 
'$nama_tenant',
'$kategori',
'$sub_kategori', 
'$alamat',
'$kecamatan',
'$kelurahan',
'$email',
'$telepon',
'$latitude',
'$longitude',
'$fasilitas',
'$deskripsi',
'$status',
'$keterangan',
'$gambar'
)";

  $simpan = process($conn, $sql);
  if ($simpan) {
    echo "<script>alert('Data $id_tenant Berhasil Disimpan !');document.location.href='?mnu=putenant';</script>";
  } else {
    echo "<script>alert('Data $id_tenant Gagal Disimpan...');document.location.href='?mnu=putenantadd';</script>";
  }
}
?>