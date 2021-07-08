<?php

$tanggal = WKT(date("Y-m-d"));
$pro = "simpan";
$label = "Tambah";
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
		win = window.open('user/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
	}
</script>
<script language="JavaScript">
	function buka(url) {
		window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');
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
$sql = "select `id_user` from `$tbuser` order by `id_user` desc";
$q = mysqli_query($conn, $sql);
$jum = mysqli_num_rows($q);
$th = date("y");
$bl = date("m") + 0;
if ($bl < 10) {
	$bl = "0" . $bl;
}

$kd = "IDU" . $th . $bl; //KEG1610001
if ($jum > 0) {
	$d = mysqli_fetch_array($q);
	$idmax = $d["id_user"];

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
$id_user = $idmax;
?>
<?php
if ($_GET["pro"] == "ubah") {
	$id_user = $_GET["kode"];
	$sql = "select * from `$tbuser` where `id_user`='$id_user'";
	$d = getField($conn, $sql);
	$id_user = $d["id_user"];
	$nama_user = $d["nama_user"];
	$kategori = $d["kategori"];
	$email = $d["email"];
	$telepon = $d["telepon"];
	$username = $d["username"];
	$password = $d["password"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
	$label = "Simpan";
}
?>

<!-- -->
<div id="accordion">
	<h3>Form User</h3>
	<div>
		<!-- -->

		<form action="" method="post" enctype="multipart/form-data">
			<table width="40%">
				<tr>
					<td width="66"><label for="id_user">ID User</label>
					<td width="9">:
					<td colspan="2"><b><?php echo $id_user; ?></b>
				</tr>
				<tr>
					<td><label for="nama_user">Nama User</label>
					<td>:
					<td width="213"><input name="nama_user" type="text" id="nama_user" value="<?php echo $nama_user; ?>" size="20" required />
					</td>

				</tr>

				<tr>
					<td height="24"><label for="kategori">Kategori</label>
					<td>:
					<td>
						<select name="kategori" required>
							<option value="">Pilih Kategori</option>
							<option value="Super Admin" <?php if ($kategori == "Super Admin") {
															echo "selected";
														} ?>>Super Admin</option>
							<option value="Admin Bidang Koperasi dan UKM" <?php if ($kategori == "Admin Bidang Koperasi dan UKM") {
																				echo "selected";
																			} ?>>Admin Bidang Koperasi dan UKM</option>
							<option value="Admin Bidang Perdagangan" <?php if ($kategori == "Admin Bidang Perdagangan") {
																			echo "selected";
																		} ?>>Admin Bidang Perdagangan</option>
							<option value="Admin Bidang Perindustrian" <?php if ($kategori == "Admin Bidang Perindustrian") {
																			echo "selected";
																		} ?>>Admin Bidang Perindustrian</option>
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
					<td height="24"><label for="username">Username</label>
					<td>:
					<td><input name="username" type="text" id="username" value="<?php echo $username; ?>" size="25" required />
					</td>
				</tr>

				<tr>
					<td height="24"><label for="password">Password</label>
					<td>:
					<td><input name="password" type="text" id="password" value="<?php echo $password; ?>" size="25" required />
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
					<td>
					<td>
					<td colspan="2"><input onclick="return confirm('Apakah data sudah benar?')" name="Simpan" type="submit" id="Simpan" class="btn btn-primary" value="<?php echo $label; ?>" />
						<input name="pro" type="hidden" id="pro" value="<?php echo $pro; ?>" />
						<input name="id_user" type="hidden" id="id_user" value="<?php echo $id_user; ?>" />
						<input name="id_user0" type="hidden" id="id_user0" value="<?php echo $id_user0; ?>" />
						<a href="?mnu=user"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
					</td>
				</tr>
			</table>
		</form>

		<!-- -->
	</div>

	<?php
	$sqlq = "select distinct(kategori) from `$tbuser` order by `kategori`,`id_user` desc";
	$jumq = getJum($conn, $sqlq);
	if ($jumq < 1) {
		echo "<h1>Maaf data belum tersedia...</h1>";
	}
	$arrq = getData($conn, $sqlq);
	foreach ($arrq as $dq) {
		$kategori = $dq["kategori"];
	?>
		<h3>Data User : <?php echo $kategori; ?></h3>
		<div>
			<!-- -->

			<br />
			Data User:
			| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
			<br>

			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="3%">No</td>
						<th width="20%">Detail User</td>
						<th width="20%">Akun</td>
						<th width="10%">Keterangan</td>
						<th width="5%">Status</td>
						<th width="5%">Menu</td>
					</tr>
				</thead>
				<tbody>

					<?php
					$sql = "select * from `$tbuser` where kategori='$kategori' order by `id_user` desc";
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
							$id_user = $d["id_user"];
							$nama_user = $d["nama_user"];
							$kategori = $d["kategori"];
							$email = $d["email"];
							$telepon = $d["telepon"];
							$username = $d["username"];
							$password = $d["password"];
							$status = $d["status"];
							$keterangan = $d["keterangan"];

							echo "<tr>
				<td>$no</td>
				<td>
					<b>ID User : $id_user</b><br>
					<b>Nama User : $nama_user</b><br>
					<b>Kontak :</b> $telepon - $email<br>
				</td>
				<td>
					<b>Username : $username</b><br>
					<b>Password : $password</b><br>
				</td>
				<td>$keterangan</td>
				<td>$status</td>
				
				<td><div align='center'>
<a href='?mnu=user&pro=ubah&kode=$id_user'><i class='icon-pencil'></i></a>
<a href='?mnu=user&pro=hapus&kode=$id_user'><i class='icon-trash' alt='hapus' 
onClick='return confirm(\"Apakah Anda Yakin Akan Menghapus Data User $nama_user?\")'></i> </a></div></td>
				</tr>";

							$no++;
						} //while
					} //if
					else {
						echo "<tr><td colspan='6'><blink>Maaf, Data User Belum Tersedia...</blink></td></tr>";
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
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=user'>« Prev</a></span> ";
				} else {
					echo "<span class=disabled>« Prev</span> ";
				}

				for ($i = 1; $i <= $jmlhal; $i++)
					if ($i != $page) {
						echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=user'>$i</a> ";
					} else {
						echo " <span class=current>$i</span> ";
					}

				if ($page < $jmlhal) {
					$next = $page + 1;
					echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=user'>Next »</a></span>";
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
	$id_user = strip_tags($_POST["id_user"]);
	$id_user0 = strip_tags($_POST["id_user"]);
	$nama_user = strip_tags($_POST["nama_user"]);
	$kategori = strip_tags($_POST["kategori"]);
	$email = strip_tags($_POST["email"]);
	$telepon = strip_tags($_POST["telepon"]);
	$username = strip_tags($_POST["username"]);
	$password = strip_tags($_POST["password"]);
	$status = strip_tags($_POST["status"]);
	$keterangan = strip_tags($_POST["keterangan"]);


	if ($pro == "simpan") {
		$sql = " INSERT INTO `$tbuser` (
`id_user` ,
`nama_user` ,
`kategori` ,
`email` ,
`telepon` ,
`username`,
`password`,
`status`,
`keterangan` 
) VALUES (
'$id_user', 
'$nama_user',
'$kategori', 
'$email',
'$telepon',
'$username',
'$password',
'$status',
'$keterangan'
)";

		$simpan = process($conn, $sql);
		if ($simpan) {
			echo "<script>alert('Data User $nama_user Berhasil Disimpan!');document.location.href='?mnu=user';</script>";
		} else {
			echo "<script>alert('Data User $nama_user Gagal Disimpan!');document.location.href='?mnu=user';</script>";
		}
	} else {
		$sql = "update `$tbuser` set 
	`id_user`='$id_user',
	`nama_user`='$nama_user',
	`kategori`='$kategori',
	`email`='$email' ,
	`telepon`='$telepon',
	`username`='$username',
	`password`='$password',
	`status`='$status',
	`keterangan`='$keterangan'
	where `id_user`='$id_user0'";
		$ubah = process($conn, $sql);
		if ($ubah) {
			echo "<script>alert('Data User $nama_user Berhasil Diubah!');document.location.href='?mnu=user';</script>";
		} else {
			echo "<script>alert('Data User $nama_user Gagal Diubah!');document.location.href='?mnu=user';</script>";
		}
	} //else simpan
}
?>

<?php
if ($_GET["pro"] == "hapus") {
	$id_user = $_GET["kode"];
	$sql = "delete from `$tbuser` where `id_user`='$id_user'";
	$hapus = process($conn, $sql);
	if ($hapus) {
		echo "<script>alert('Data User $id_user Berhasil Dihapus!');document.location.href='?mnu=user';</script>";
	} else {
		echo "<script>alert('Data User $id_user Gagal Dihapus!');document.location.href='?mnu=user';</script>";
	}
}
?>