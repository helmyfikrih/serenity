<?php
$id_gallery = $_GET["kd"];
$sql = "SELECT t.nama_tenant,g.* FROM `$tbgallery` g 
              LEFT JOIN tb_tenant t ON t.id_tenant= g.id_tenant
              WHERE `id_gallery`='$id_gallery'";
$d = getField($conn, $sql);
$id_gallery = $d["id_gallery"];
$id_tenant = $d["id_tenant"];
$nama_gallery = $d["nama_gallery"];
$deskripsi = $d["deskripsi"];
$gambar = $d["gambar"];
$gambar0 = $d["gambar"];
$status = $d["status"];
$keterangan = $d["keterangan"];
$nama_tenant = $d["nama_tenant"];

?>



<div class="row">
  <div class="span12">
    <article>
      <div class="heading">

      </div>
      <div class="clearfix">
      </div>
      <div class="row">
        <div class="span8">
          <!-- start flexslider -->
          <div class="flexslider">
            <ul class="slides">
              <li>
                <img src="ypathfile/<?php echo $gambar; ?>" alt="" />
              </li>
              <li>
                <img src="ypathfile/<?php echo $gambar; ?>" alt="" />
              </li>
              <li>
                <img src="ypathfile/<?php echo $gambar; ?>" alt="" />
              </li>
            </ul>
          </div>
          <!-- end flexslider -->

        </div>
        <div class="span4">
          <div class="project-widget">
            <h4><i class="icon-48 icon-beaker"></i>Detail Produk</h4>
            <ul class="project-detail">
              <li>
                <h5><?php echo $nama_tenant; ?></h5>
                <h5>Produk : <?php echo $nama_gallery; ?></h5>
                <p>Deskripsi : <br>
                  <?php echo $deskripsi; ?>
                </p>
              </li>
              <li><a href="?mnu=gugallery"><input name="Batal" type="button" id="Batal" class="btn btn-danger" value="Kembali" /></a></li>
            </ul>
          </div>
        </div>
      </div>
    </article>
    <!-- end article full post -->
  </div>
</div>