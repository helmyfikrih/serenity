<?php
$cid_user = $_SESSION["cid"];
$cstatus = $_SESSION["cstatus"];
$ckategori = str_replace("Admin ", "", $_SESSION["ckategori"]);
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
		win = window.open('tenant/abprint<?php echo $ckategori ?>.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
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

<?php
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
?>
<?php
if ($_GET["pro"] == "ubah") {
	$id_tenant = $_GET["kode"];
	$sql = "select * from `$tbtenant` where `id_tenant`='$id_tenant'";
	$d = getField($conn, $sql);
	$id_tenant = $d["id_tenant"];
	$id_user = $d["id_user"];
	$nama_tenant = $d["nama_tenant"];
	$kategori = $d["kategori"];
	$sub_kategori = $d["sub_kategori"];
	$alamat = $d["alamat"];
	$kecamatan = $d["kecamatan"];
	$kelurahan = $d["kelurahan"];
	$email = $d["email"];
	$telepon = $d["telepon"];
	$latitude = $d["latitude"];
	$longitude = $d["longitude"];
	$fasilitas = $d["fasilitas"];
	$deskripsi = $d["deskripsi"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$gambar = $d["gambar"];
	$gambar0 = $d["gambar"];
	$pro = "ubah";
	$label = "Simpan";
}
?>

<!-- -->
<div id="accordion">
	<h3>Form Pelaku Usaha</h3>
	<div>
		<!-- -->

		<form action="" method="post" enctype="multipart/form-data">
			<table width="55%">
				<tr>
					<td width="164"><label for="id_tenant">ID Pelaku Usaha</label>
					<td width="10">:
					<td colspan="2"><b><?php echo $id_tenant; ?></b>
				</tr>

				<tr>
					<td height="24"><label for="id_user">Pilih User</label>
					<td>:
					<td>
						<select name="id_user" required>
							<option value="">Pilih User</option>
							<?php
							$s = "select * from `tb_user` where kategori='$ckategori'";
							$q = getData($conn, $s);
							foreach ($q as $d) {
								$id_user0 = $d["id_user"];
								$nama_user = $d["nama_user"];
								echo "<option value='$id_user0' ";
								if ($id_user0 == $id_user) {
									echo "selected";
								}
								echo ">$id_user0 - $nama_user  </option>";
							}
							?>
						</select>
					</td>
				</tr>

				<tr>
					<td><label for="nama_tenant">Nama Pelaku Usaha</label>
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
							<?php
							$s = "select kategori from `tb_tenant` where kategori='$ckategori'";
							$q = getData($conn, $s);
							$kategori0 = $d["kategori"];
							echo "<option value='$kategori0' ";
							if ($kategori0 == $kategori) {
								echo "selected";
							}
							echo ">$kategori0</option>";
							?>
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
							<option>Pilih Kecamatan</option>
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
					<td height="24"><label for="deskripsi">Deskripsi</label>
					<td>:
					<td><textarea name="deskripsi" id="deskripsi" size="25"><?php echo $deskripsi; ?></textarea>
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
						<input type="radio" name="status" id="status" value="Belum Diverifikasi" <?php if ($status == "Belum Diverifikasi") {
																										echo "checked";
																									} ?> />Belum Diverifikasi
					</td>
				</tr>

				<tr>
					<td height="24"><label for="keterangan">Keterangan</label>
					<td>:
					<td><textarea name="keterangan" id="keterangan" size="25"><?php echo $keterangan; ?></textarea>
					</td>
				</tr>

				<tr>
					<td height="24"><label for="gambar">Gambar</label>
					<td>:
					<td colspan="2">
						<input name="gambar" type="file" id="gambar" size="20" />
						=> <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $kode_admin; ?>")'><?php echo $gambar0; ?></a>
					</td>
				</tr>


				<tr>
					<td>
					<td>
					<td colspan="2"><input onclick="return confirm('Apakah data sudah benar?')" name="Simpan" type="submit" id="Simpan" class="btn btn-primary" value="<?php echo $label; ?>" />
						<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
						<input name="id_tenant" type="hidden" id="id_tenant" value="<?php echo $id_tenant; ?>" />
						<input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0; ?>" />
						<input name="id_tenant0" type="hidden" id="id_tenant0" value="<?php echo $id_tenant0; ?>" />
						<a href="?mnu=abtenant"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>

		<!-- -->
	</div>

	<?php
	$sqlq = "select distinct(kategori) from `$tbtenant` where kategori='$ckategori' order by `id_tenant` desc";
	$jumq = getJum($conn, $sqlq);
	if ($jumq < 1) {
		echo "<h1>Maaf Data Belum Tersedia...</h1>";
	}
	$arrq = getData($conn, $sqlq);
	foreach ($arrq as $dq) {
		$kategori = $dq["kategori"];
	?>
		<h3>Data Pelaku Usaha : <?php echo $kategori; ?></h3>
		<div>
			<!-- -->

			<br />
			Data Pelaku Usaha:
			| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
			<br>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="3%">No</td>
						<th width="15%">Gambar</td>
						<th width="50%">Detail Pelaku Usaha</td>
						<th width="20%">Keterangan</td>
						<th width="15%">Status</td>
						<th width="5%">Menu</td>
					</tr>
				</thead>
				<tbody>

					<?php
					$sql = "select * from `$tbtenant` where kategori='$kategori' order by `id_tenant` desc";
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
							$id_tenant = $d["id_tenant"];
							$id_user = $d["id_user"];

							$sql1 = "select username from `$tbuser` where `id_user`='$id_user'";
							$d1 = getField($conn, $sql1);
							$username = $d1["username"];

							$nama_tenant = $d["nama_tenant"];
							$kategori = $d["kategori"];
							$sub_kategori = $d["sub_kategori"];
							$alamat = $d["alamat"];
							$kecamatan = $d["kecamatan"];
							$kelurahan = $d["kelurahan"];
							$email = $d["email"];
							$telepon = $d["telepon"];
							$latitude = $d["latitude"];
							$longitude = $d["longitude"];
							$fasilitas = $d["fasilitas"];
							$deskripsi = $d["deskripsi"];
							$status = $d["status"];
							$keterangan = $d["keterangan"];
							$gambar = $d["gambar"];
							$gambar0 = $d["gambar"];

							echo "<tr>
				<td>$no</td>
				<td><div align='center'>";
							echo "<a href='#' onclick='buka(\"tenant/zoom.php?id=$id_tenant\")'>
<img src='$YPATH/$gambar' width='120' height='100' /></a></div>";
							echo "</td>
				<td>
					<b>ID User : $id_user</b><br>
					<b>Username : $username</b><br>
					<b>ID Pelaku Usaha : $id_tenant</b><br>
					<b>Nama Pelaku Usaha : $nama_tenant</b><br>
					<b>Sub Kategori :</b> $sub_kategori<br> 
					<b>Deskripsi :</b> $deskripsi<br>
					<b>Fasilitas :</b> $fasilitas<br>
					<b>Alamat :</b> $alamat<br>
					<b>Kecamatan :</b> $kecamatan<br>
					<b>Kelurahan :</b> $kelurahan<br>
					<b>Titik Koordinat :</b> ($latitude , $longitude)<br>
					<b>Kontak :</b> $telepon - $email
				</td>
				<td>$keterangan</td>
				<td>$status</td>
				
				
				<td><div align='center'>
<a href='?mnu=abtenant&pro=ubah&kode=$id_tenant'><i class='icon-pencil'></i></a>
<a href='?mnu=abtenant&pro=hapus&kode=$id_tenant'><i class='icon-trash' alt='hapus' 
onClick='return confirm(\"Apakah Anda Yakin Akan Menghapus Data $nama_tenant?\")'></i> </a></div></td>
				</tr>";

							$no++;
						} //while
					} //if
					else {
						echo "<tr><td colspan='6'><blink>Maaf, Data Pelaku Usaha Belum Tersedia...</blink></td></tr>";
					}
					?>

				</tbody>
			</table>

			<?php
			$jmldata = $jum;
			if ($jmldata > 0) {
				if ($batas < 1) {
					$batas = 1;
				}
				$jmlhal  = ceil($jmldata / $batas);
				echo "<div class=paging>";
				if ($page > 1) {
					$prev = $page - 1;
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=abtenant'>« Prev</a></span> ";
				} else {
					echo "<span class=disabled>« Prev</span> ";
				}

				for ($i = 1; $i <= $jmlhal; $i++)
					if ($i != $page) {
						echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=abtenant'>$i</a> ";
					} else {
						echo " <span class=current>$i</span> ";
					}

				if ($page < $jmlhal) {
					$next = $page + 1;
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=abtenant'>Next »</a></span>";
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
	<?php } ?>
</div>
<!-- -->

<?php
if (isset($_POST["Simpan"])) {
	$pro = strip_tags($_POST["pro"]);
	$id_tenant = strip_tags($_POST["id_tenant"]);
	$id_tenant0 = strip_tags($_POST["id_tenant"]);
	$id_user = strip_tags($_POST["id_user"]);
	$nama_tenant = strip_tags($_POST["nama_tenant"]);
	$kategori = strip_tags($_POST["kategori"]); // $kategori0?
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
	$status = strip_tags($_POST["status"]);
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

	if ($pro == "simpan") {
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
			echo "<script>alert('Data $nama_tenant Berhasil Disimpan!');document.location.href='?mnu=abtenant';</script>";
		} else {
			echo "<script>alert('Data $nama_tenant Gagal Disimpan!');document.location.href='?mnu=abtenant';</script>";
		}
	} else {
		$sql = "update `$tbtenant` set 
	`id_tenant`='$id_tenant',
	`id_user`='$id_user',
	`nama_tenant`='$nama_tenant',
	`kategori`='$kategori',
	`sub_kategori`='$sub_kategori',
	`alamat`='$alamat' ,
	`kecamatan`='$kecamatan' ,
	`kelurahan`='$kelurahan' ,
	`email`='$email' ,
	`telepon`='$telepon',
	`latitude`='$latitude',
	`longitude`='$longitude',
	`fasilitas`='$fasilitas',
	`deskripsi`='$deskripsi',
	`status`='$status',
	`keterangan`='$keterangan',
	`gambar`='$gambar'
	where `id_tenant`='$id_tenant0'";
		$ubah = process($conn, $sql);
		if ($ubah) {
			echo "<script>alert('Data $nama_tenant Berhasil Diubah!');document.location.href='?mnu=abtenant';</script>";
		} else {
			echo "<script>alert('Data $nama_tenant Gagal Diubah!');document.location.href='?mnu=abtenant';</script>";
		}
	} //else simpan
}
?>

<?php
if ($_GET["pro"] == "hapus") {
	$id_tenant = $_GET["kode"];
	$sql = "delete from `$tbtenant` where `id_tenant`='$id_tenant'";
	$hapus = process($conn, $sql);
	if ($hapus) {
		echo "<script>alert('Data $id_tenant Berhasil Dihapus!');document.location.href='?mnu=abtenant';</script>";
	} else {
		echo "<script>alert('Data $id_tenant Gagal Dihapus!');document.location.href='?mnu=abtenant';</script>";
	}
}
?>