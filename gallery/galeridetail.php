<?php
	$id_gallery=$_GET["kd"];
	$sql="select * from `$tbgallery` where `id_gallery`='$id_gallery'";
	$d=getField($conn,$sql);
				$id_gallery=$d["id_gallery"];
				$id_tenant=$d["id_tenant"];
				$nama_gallery=$d["nama_gallery"];
				$deskripsi=$d["deskripsi"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];

?>



<div class="row">
        <div class="span12">
          <article>
            <div class="heading">
              <h4><?php echo $nama_gallery;?></h4>
            </div>
            <div class="clearfix">
            </div>
            <div class="row">
              <div class="span8">
                <!-- start flexslider -->
                <div class="flexslider">
                  <ul class="slides">
                    <li>
                      <img src="ypathfile/<?php echo $gambar;?>" alt="" />
                    </li>
                    <li>
                      <img src="ypathfile/<?php echo $gambar;?>" alt="" />
                    </li>
                    <li>
                      <img src="ypathfile/<?php echo $gambar;?>" alt="" />
                    </li>
                  </ul>
                </div>
                <!-- end flexslider -->
                <p>
                 <?php echo $deskripsi;?>
                </p>
              </div>
              <div class="span4">
                <div class="project-widget">
                  <h4><i class="icon-48 icon-beaker"></i> Project info</h4>
                  <ul class="project-detail">
                    <li><label>Project name :</label> Very nice project</li>
                    <li><label>Category :</label> Web design</li>
                    <li><label>Project date :</label> 2 March 2013</li>
                    <li><label>Project link :</label><a href="#">www.somelink.com</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </article>
          <!-- end article full post -->
        </div>
      </div>