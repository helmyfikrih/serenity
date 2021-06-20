<?php
$id_seminar = $_GET["kd"];
$sql = "select * from `$tbseminar` where `id_seminar`='$id_seminar'";
$d = getField($conn, $sql);
$id_seminar = $d["id_seminar"];
$nama_seminar = $d["nama_seminar"];
$deskripsi = $d["deskripsi"];
$gambar = $d["gambar"];
$gambar0 = $d["gambar"];
$status = $d["status"];
$keterangan = $d["keterangan"];
$tanggal = WKT($d["tanggal"]);
$jam = $d["jam"];
$kategori = $d["kategori"];

?>



<div class="row">
  <div class="span12">
    <article>
      <div class="heading">
        <h4><?php echo $nama_seminar; ?></h4>
      </div>
      <div class="clearfix">
      </div>
      <div class="row">
        <div class="span4">
          <!-- start flexslider -->
          <div>

            <img width="400" height="400" src="ypathfile/<?php echo $gambar; ?>" alt="" />

          </div>
          <!-- end flexslider -->
        </div>
        <div class="span8">
          <div class="project-widget">
            <h4><i class="icon-48 icon-search"></i>Detail Kegiatan</h4>

            <form method="post">

              <ul class="project-detail">
                <li><label>Judul : </label><?php echo $nama_seminar; ?></li>
                <li><label>Kategori : </label><?php echo $kategori; ?></li>
                <li><label>Dilaksanakan pada : </label><?php echo $tanggal; ?> - Jam : <?php echo $jam; ?></li>
                <li><label>Deskripsi : </label><?php echo $deskripsi; ?></li>
                <li>
                  <input name="Simpan" type="submit" id="Simpan" class="btn btn-primary" value="Daftar" />
                  <input name="id_seminar" type="hidden" id="id_seminar" value="<?php echo $id_seminar; ?>" />
                  <input name="id_peserta" type="hidden" id="id_peserta" value="<?php echo $id_peserta; ?>" />
                  <input name="id_peserta0" type="hidden" id="id_peserta0" value="<?php echo $id_peserta0; ?>" />
                </li>
              </ul>
            </form>
            <a href="index.php?mnu=guseminar"><button class="btn">Kembali</button></a>
          </div>
        </div>
      </div>
    </article>
    <!-- end article full post -->
  </div>
</div>



<?php
if (isset($_POST["Simpan"])) {

  if (!$_SESSION) {
    echo "<script>alert('LOGIN DULU GAN')</script>";
    die;
  }
  $sql = "select `id_peserta` from `$tbpeserta` order by `id_peserta` desc";
  $q = mysqli_query($conn, $sql);
  $jum = mysqli_num_rows($q);
  $th = date("y");
  $bl = date("m") + 0;
  if ($bl < 10) {
    $bl = "0" . $bl;
  }

  $kd = "IDP" . $th . $bl; //KEG1610001
  if ($jum > 0) {
    $d = mysqli_fetch_array($q);
    $idmax = $d["id_peserta"];

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
  $id_peserta = $idmax;


  $id_seminar = strip_tags($_POST["id_seminar"]);


  $sql = "select * from `$tbtenant` where `id_user`='" . $_SESSION["cid"] . "'";
  $d = getField($conn, $sql);
  $id_tenant = $d["id_tenant"];
  $id_user = $d["id_user"];


  $tanggal = date("Y-m-d");
  $jam = date("H:i:s");
  $status = "Belum Diverifikasi";
  $keterangan = "-";

  $sql2 = "select * from `$tbpeserta` where id_tenant='$id_tenant' and id_seminar='$id_seminar'";
  $jum2 = getJum($conn, $sql2);
  if ($jum2 > 0) {
    echo "<script>alert('Peserta $id_peserta Sudah Pernah Mendaftar !');</script>";
  } else {

    $sql = " INSERT INTO `$tbpeserta` (
`id_peserta` ,
`id_seminar` ,
`id_tenant` ,
`tanggal` ,
`jam` ,
`status` ,
`keterangan`
) VALUES (
'$id_peserta', 
'$id_seminar',
'$id_tenant', 
'$tanggal',
'$jam',
'$status',
'$keterangan'
)";

    $simpan = process($conn, $sql);
    if ($simpan) {
      echo "<script>alert('Peserta $id_peserta berhasil Mendaftar !');document.location.href='?mnu=guseminardetail&kd=$id_seminar';</script>";
    } else {
      echo "<script>alert('Data $id_peserta gagal disimpan...');document.location.href='?mnu=guseminardetail&kd=$id_seminar';</script>";
    }
  }
}
?>