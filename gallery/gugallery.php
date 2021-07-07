  <div class="row">
    <!--
        <div class="span12">
          <ul class="filter">
            <li class="all active"><a href="#" class="btn btn-color">All categories</a></li>
            <li class="web"><a href="#" class="btn btn-color">Web design</a></li>
            <li class="brand"><a href="#" class="btn btn-color">Brand identity</a></li>
            <li class="graphic"><a href="#" class="btn btn-color">Graphic design</a></li>
          </ul>
        </div>
        -->
  </div>
  <div class="row">
    <ul class="portfolio-area da-thumbs">


      <?php
      $sql = "select * from `$tbgallery` order by `id_gallery` desc";
      $arr = getData($conn, $sql);
      foreach ($arr as $d) {
        $id_gallery = $d["id_gallery"];
        $id_tenant = $d["id_tenant"];
        $nama_gallery = $d["nama_gallery"];
        $deskripsi = $d["deskripsi"];
        $gambar = $d["gambar"];
        $status = $d["status"];
        $keterangan = $d["keterangan"];

      ?>
        <li class="portfolio-item2" data-id="id-0" data-type="web">
          <div class="span3">
            <div class="thumbnail">
              <div class="image-wrapp">
                <img src="ypathfile/<?php echo $gambar; ?>" alt="<?php echo $nama_gallery; ?>" title="" />
                <article class="da-animate da-slideFromRight" style="display: block;">
                  <h4><?php echo $nama_gallery; ?></h4>
                  <a href="index.php?mnu=galeridetail&kd=<?php echo $id_gallery; ?>"><i class="icon-rounded icon-48 icon-link"></i></a>
                  <span><a class="zoom" data-pretty="prettyPhoto" href="ypathfile/<?php echo $gambar; ?>">
                      <i class="icon-rounded icon-48 icon-zoom-in"></i>
                    </a></span>
                </article>
              </div>
            </div>
          </div>
        </li>

      <?php } ?>
    </ul>
  </div>
  <div class="row">
    <div class="span12">
      <div class="pagination">
        <ul>
          <li><a href="#">Prev</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">Next</a></li>
        </ul>
      </div>
    </div>
  </div>