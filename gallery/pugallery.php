<?php
$cid_user = $_SESSION["cid"];
$cstatus = $_SESSION["cstatus"];
$ckategori = $_SESSION["ckategori"];
?>

<?php // Session biar kebawa terus pas pindah" file
$cid_user = $_SESSION["cid"];
$cstatus = $_SESSION["cstatus"];
$ckategori = $_SESSION["ckategori"];
$id_tenant = getIdTenant($conn, $cid_user); // dipake buat get id tenant	
?>

<?php

$tanggal = WKT(date("Y-m-d"));
$pro = "simpan";
$label = "Tambah";
$gambar0 = "avatar.jpg";
$status = "Aktif";
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
		win = window.open('gallery/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
	}
</script>

<!-- Start Script Acordeon -->
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
<!-- End Script Acordeon -->

<?php // Query Otomatis Generate ID/TGL
$sql = "select `id_gallery` from `$tbgallery` order by `id_gallery` desc";
$q = mysqli_query($conn, $sql);
$jum = mysqli_num_rows($q);
$th = date("y");
$bl = date("m") + 0;
if ($bl < 10) {
	$bl = "0" . $bl;
}

$kd = "IDG" . $th . $bl; //KEG1610001
if ($jum > 0) {
	$d = mysqli_fetch_array($q);
	$idmax = $d["id_gallery"];

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
$id_gallery = $idmax;
?>

<?php // Query ketika tekan tombol ubah
if ($_GET["pro"] == "ubah") {
	$id_gallery = $_GET["kode"];
	$sql = "select * from `$tbgallery` where `id_gallery`='$id_gallery'";
	$d = getField($conn, $sql);
	$id_gallery = $d["id_gallery"];
	$id_tenant = $d["id_tenant"];
	$nama_gallery = $d["nama_gallery"];
	$deskripsi = $d["deskripsi"];
	$gambar = $d["gambar"];
	$gambar0 = $d["gambar"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
	$label = "Simpan";
}
?>

<!-- Start Code of Acordeon -->
<div id="accordion">
	<h3>Form Galeri Produk</h3>
	<div>
		<!-- -->

		<form action="" method="post" enctype="multipart/form-data">
			<table width="40%">
				<tr>
					<td width="66"><label for="id_gallery">ID Produk</label>
					<td width="9">:
					<td colspan="2"><b><?php echo $id_gallery; ?></b>
				</tr>

				<tr>
					<td><label for="nama_gallery">Nama Produk</label>
					<td>:
					<td width="213"><input name="nama_gallery" type="text" id="nama_gallery" value="<?php echo $nama_gallery; ?>" size="20" required />
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
					<td height="24"><label for="deskripsi">Deskripsi</label>
					<td>:
					<td><textarea name="deskripsi" id="deskripsi" size="25"><?php echo $deskripsi; ?></textarea>
					</td>
				</tr>

				<tr>
					<td height="24"><label for="gambar">Gambar Produk</label>
					<td>:
					<td colspan="2">
						<input name="gambar" type="file" id="gambar" class="btn" size="20" required />
						=> <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kode_admin; ?>")'><?php echo $gambar0; ?></a>
					</td>
				</tr>

				<tr>
					<td><label for="status">Status</label>
					<td>:
					<td colspan="2">
						<input type="radio" name="status" id="status" checked="checked" value="Aktif" <?php if ($status == "Aktif") {
																											echo "checked";
																										} ?> />Aktif
						<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if ($status == "Tidak Aktif") {
																								echo "checked";
																							} ?> />Tidak Aktif
					</td>
				</tr>

				<tr>
					<td height="24"><label for="keterangan">Keterangan</label>
					<td>:
					<td><textarea name="keterangan" id="keterangan" size="25"><?php echo $keterangan; ?></textarea>
					</td>
				</tr>

				<tr>
					<td>
					<td>
					<td colspan="2"><input onclick="return confirm('Apakah data sudah benar?')" name="Simpan" type="submit" id="Simpan" class="btn btn-primary" value="<?php echo $label; ?>" />
						<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
						<input name="id_gallery" type="hidden" id="id_gallery" value="<?php echo $id_gallery; ?>" />
						<input name="id_gallery0" type="hidden" id="id_gallery0" value="<?php echo $id_gallery0; ?>" />
						<input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0; ?>" />
						<a href="?mnu=pugallery"><input name="Batal" type="button" id="Batal" class="btn btn-danger" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>

		<!-- -->
	</div>
	<h3>Data Produk</h3>
	<div>
		<!-- -->

		<br />
		Data Produk:
		| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
		<br>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="3%">No</td>
					<th width="10%">Gambar</td>
					<th width="30%">Detail Produk</td>
					<th width="5%%">Status</td>
					<th width="5%%">Menu</td>
				</tr>
			</thead>
			<tbody>

				<?php  // Query untuk nampilin tabel (Icon Ubah + Icon Hapus)
				$sql = "select * from `$tbgallery` where id_tenant='$id_tenant' order by `id_gallery` desc";
				$jum = getJum($conn, $sql);
				if ($jum > 0) {
					//--------------------------------------------------------------------------------------------
					$batas   = 10;
					$page = $_GET['page'];
					if (empty($page)) {
						$posawal  = 0;
						$page = 1;
					} else {
						$posawal = ($page - 1) * $batas;
					}

					$sql2 = $sql . " LIMIT $posawal,$batas";
					$no = $posawal + 1;
					//--------------------------------------------------------------------------------------------									
					$arr = getData($conn, $sql2);
					foreach ($arr as $d) {
						$id_gallery = $d["id_gallery"];
						$id_tenant = $d["id_tenant"];
						$nama_gallery = $d["nama_gallery"];
						$deskripsi = $d["deskripsi"];
						$gambar = $d["gambar"];
						$gambar0 = $d["gambar"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];

						echo "<tr>
				<td>$no</td>
				
				<td><div align='center'>";
						echo "<a href='#' onclick='buka(\"admin/zoom.php?id=$kode_admin\")'>
<img src='$YPATH/$gambar' width='100' height='100' /></a></div>";
						echo "</td>
				
				<td>
					<b>ID Produk : $id_gallery</b><br>
					<b>Nama Produk : $nama_gallery</b><br><hr>
					<b>Deskripsi :</b> $deskripsi<br>
				</td>
				
				<td>$status</td>
				
				<td><div align='center'>
<a href='?mnu=pugallery&pro=ubah&kode=$id_gallery'><i class='icon-pencil'></i></a>
<a href='?mnu=pugallery&pro=hapus&kode=$id_gallery'><i class='icon-trash' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_gallery pada data gallery ?..\")'></i> </a></div></td>
				</tr>";

						$no++;
					} //while
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data gallery belum tersedia...</blink></td></tr>";
				}
				?>

			</tbody>
		</table>

		<?php // Query Otomatis Ganti Halaman
		$jmldata = $jum;
		if ($jmldata > 0) {
			if ($batas < 1) {
				$batas = 1;
			}
			$jmlhal  = ceil($jmldata / $batas);
			echo "<div class=paging>";
			if ($page > 1) {
				$prev = $page - 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pugallery'>« Prev</a></span> ";
			} else {
				echo "<span class=disabled>« Prev</span> ";
			}

			for ($i = 1; $i <= $jmlhal; $i++)
				if ($i != $page) {
					echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pugallery'>$i</a> ";
				} else {
					echo " <span class=current>$i</span> ";
				}

			if ($page < $jmlhal) {
				$next = $page + 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pugallery'>Next »</a></span>";
			} else {
				echo "<span class=disabled>Next »</span>";
			}
			echo "</div>";
		} //if jmldata

		$jmldata = $jum;
		echo "<p align=center>Total data <b>$jmldata</b> item</p>";
		?>

		<!-- -->
	</div>
</div>
<!-- End Code of Acordeon-->

<?php // Query untuk simpan hasil ubahan
if (isset($_POST["Simpan"])) {
	$pro = strip_tags($_POST["pro"]);
	$id_gallery = strip_tags($_POST["id_gallery"]);
	$id_gallery0 = strip_tags($_POST["id_gallery"]);

	$id_tenant = getIdTenant($conn, $cid_user);

	$nama_gallery = strip_tags($_POST["nama_gallery"]);
	$deskripsi = strip_tags($_POST["deskripsi"]);

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

	$status = strip_tags($_POST["status"]);
	$keterangan = strip_tags($_POST["keterangan"]);
	$kategori = $ckategori;

	if ($pro == "simpan") {
		$sql = " INSERT INTO `$tbgallery` (
`id_gallery` ,
`id_tenant` ,
`nama_gallery` ,
`deskripsi` ,
`gambar` ,
`status` ,
`keterangan`,
`kategori`
) VALUES (
'$id_gallery', 
'$id_tenant', 
'$nama_gallery',
'$deskripsi', 
'$gambar',
'$status',
'$keterangan',
'$kategori'
)";

		$simpan = process($conn, $sql);
		if ($simpan) {
			echo "<script>alert('Data $id_gallery berhasil disimpan !');document.location.href='?mnu=pugallery';</script>";
		} else {
			echo "<script>alert('Data $id_gallery gagal disimpan...');document.location.href='?mnu=pugallery';</script>";
		}
	} else {
		$sql = "update `$tbgallery` set 
	`id_gallery`='$id_gallery',
	`id_tenant`='$id_tenant',
	`nama_gallery`='$nama_gallery',
	`deskripsi`='$deskripsi',
	`gambar`='$gambar' ,
	`status`='$status',
	`keterangan`='$keterangan'
	where `id_gallery`='$id_gallery0'";
		$ubah = process($conn, $sql);
		if ($ubah) {
			echo "<script>alert('Data $id_gallery berhasil diubah !');document.location.href='?mnu=pugallery';</script>";
		} else {
			echo "<script>alert('Data $id_gallery gagal diubah...');document.location.href='?mnu=pugallery';</script>";
		}
	} //else simpan
}
?>

<?php
if ($_GET["pro"] == "hapus") {
	$id_gallery = $_GET["kode"];
	$sql = "delete from `$tbgallery` where `id_gallery`='$id_gallery'";
	$hapus = process($conn, $sql);
	if ($hapus) {
		echo "<script>alert('Data $id_gallery berhasil dihapus !');document.location.href='?mnu=pugallery';</script>";
	} else {
		echo "<script>alert('Data $id_gallery gagal dihapus...');document.location.href='?mnu=pugallery';</script>";
	}
}
?>