<?php
$cid_user = $_SESSION["cid"];
$cstatus = $_SESSION["cstatus"];
$ckategori = $_SESSION["ckategori"];
?>

<div class="row">
	<div class="span12">

		<?php
		$sql = "select * from `$tbberita` where kategori='$ckategori' order by `tanggal` desc";
		$arr = getData($conn, $sql);
		foreach ($arr as $d) {
			$id_berita = $d["id_berita"];
			$nama_berita = $d["nama_berita"];
			$deskripsi = $d["deskripsi"];
			$gambar = $d["gambar"];
			$gambar0 = $d["gambar"];
			$status = $d["status"];
			$keterangan = $d["keterangan"];
			$tanggal = WKT($d["tanggal"]);
			$jam = $d["jam"];
			$kategori = $d["kategori"];
		?>
			<!-- start article 1 -->
			<article class="blog-post">
				<div class="post-heading">
					<h3><a href="#"><?php echo $nama_berita; ?> </a></h3>
				</div>
				<div class="row">
					<div class="span3">
						<div class="post-image">
							<a href="#"><img src="ypathfile/<?php echo $gambar; ?>" /></a>
						</div>
					</div>
					<div class="span9">
						<ul class="post-meta">
							<li class="first"><i class="icon-calendar"></i><?php echo $tanggal; ?></li>
							<li><i class="icon-list-alt"></i><?php echo $jam; ?></li>
							<li class="last"><i class="icon-tags"></i><span><a href="#"><?php echo $kategori; ?></a></span></li>
						</ul>
						<div class="clearfix">
						</div>
						<p>
							<?php echo $deskripsi; ?>
						</p>
						<a href="index.php?mnu=puberitadetail&kd=<?php echo $id_berita; ?>">
							<button class="btn" type="button">Read more</button>
						</a>
					</div>
				</div>
			</article>
			<!-- end article 1 -->
		<?php } ?>

		<!-- <div class="pagination">
            <ul>
				<li><a href="#">Prev</a></li>
				<li><a href="#">1</a></li>
				<li class="active"><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">Next</a></li>
            </ul>
        </div> -->
	</div>

	<!-- <div class="span4">
        <aside>
            <div class="widget">
				<form class="form-search">
					<input placeholder="Type something" type="text" class="input-medium search-query">
					<button type="submit" class="btn btn-flat btn-color">Search</button>
				</form>
            </div>
            <div class="widget">
				<h4>Categories</h4>
				<ul class="cat">
					<li><a href="#">Web design (114)</a></li>
					<li><a href="#">Internet news (15)</a></li>
					<li><a href="#">Tutorial and tips (20)</a></li>
					<li><a href="#">Design trends (15)</a></li>
					<li><a href="#">Online business (10)</a></li>
				</ul>
            </div>
            <div class="widget">
				<h4>Recent posts</h4>
				<ul class="recent-posts">
					<li><a href="#">Lorem ipsum dolor sit amet munere commodo ut nam</a>
					  <div class="clear">
					  </div>
					  <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
					  <span class="comment"><i class="icon-comment"></i> 4 Comments</span>
					</li>
					<li><a href="#">Sea nostrum omittantur ne mea malis nominavi insolens</a>
					  <div class="clear">
					  </div>
					  <span class="date"><i class="icon-calendar"></i> 6 March, 2013</span>
					  <span class="comment"><i class="icon-comment"></i> 2 Comments</span>
					</li>
					<li><a href="#">Eius graece recusabo no pri odio tale quo id, mea at saepe</a>
					  <div class="clear">
					  </div>
					  <span class="date"><i class="icon-calendar"></i> 4 March, 2013</span>
					  <span class="comment"><i class="icon-comment"></i> 12 Comments</span>
					</li>
					<li><a href="#">Malorum deserunt at nec usu ad graeco elaboraret at rebum</a>
					  <div class="clear">
					  </div>
					  <span class="date"><i class="icon-calendar"></i> 3 March, 2013</span>
					  <span class="comment"><i class="icon-comment"></i> 3 Comments</span>
					</li>
				</ul>
            </div>
            <div class="widget">
				<h4>Tags</h4>
				<ul class="tags">
					<li><a href="#" class="btn">Tutorial</a></li>
					<li><a href="#" class="btn">Tricks</a></li>
					<li><a href="#" class="btn">Design</a></li>
					<li><a href="#" class="btn">Trends</a></li>
					<li><a href="#" class="btn">Online</a></li>
				</ul>
            </div>
        </aside>
    </div> -->
</div>