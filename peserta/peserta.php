<?php

$tanggal = WKT(date("Y-m-d"));
$jam = date('H:i:s');
$pro = "simpan";
$label = "Tambah";
$status = "Daftar";
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
		win = window.open('peserta/print.php', 'win', 'width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0');
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
?>
<?php
if ($_GET["pro"] == "ubah") {
	$id_peserta = $_GET["kode"];
	$sql = "select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$d = getField($conn, $sql);
	$id_peserta = $d["id_peserta"];
	$id_seminar = $d["id_seminar"];
	$id_tenant = $d["id_tenant"];
	$tanggal = WKT($d["tanggal"]);
	$jam = $d["jam"];
	$status = $d["status"];
	$keterangan = $d["keterangan"];
	$pro = "ubah";
	$label = "Simpan";
}
?>

<!-- -->
<div id="accordion">

	<!-- -->

	<h3>Data Peserta</h3>
	<div>
		<!-- -->

		<br />
		Data Peserta:
		| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
		<br>

		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="3%">No</td>
					<th width="10%">ID Peserta</td>
					<th width="10%">Nama Peserta</td>
					<th width="30%">Detail Seminar</td>
					<th width="15%">Waktu Mendaftar</td>
					<th width="15%">Keterangan</td>
					<th width="5%">Status</td>
				</tr>
			</thead>
			<tbody>

				<?php
				$sql = "select * from `$tbpeserta` order by `id_peserta` desc";
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
						$id_peserta = $d["id_peserta"];
						$id_seminar = $d["id_seminar"];

						$sql1 = "select * from `$tbseminar` where `id_seminar`='$id_seminar'";
						$d1 = getField($conn, $sql1);
						$id_seminar = $d1["id_seminar"];
						$nama_seminar = $d1["nama_seminar"];
						$kategori = $d1["kategori"];
						$tanggal2 = WKT($d1["tanggal"]);
						$jam2 = $d1["jam"];

						$id_tenant = getTenant($conn, $d["id_tenant"]);
						$tanggal = WKT($d["tanggal"]);
						$jam = $d["jam"];
						$status = $d["status"];
						$keterangan = $d["keterangan"];

						echo "<tr>
				<td>$no</td>
				<td>$id_peserta</td>
				<td>$id_tenant</td>
				<td>
					<b>Judul : $nama_seminar</b><br>
					<b>Kategori : $kategori</b><br>
					<b>Tanggal :</b> $tanggal2<br>
					<b>Jam :</b> $jam2<br>
				</td>
				<td>
					<b>Tanggal :</b> $tanggal<br>
					<b>Jam :</b> $jam<br>
				</td>
				<td>$keterangan</td>
				<td>$status</td>
				
				
				</tr>";

						$no++;
					} //while
				} //if
				else {
					echo "<tr><td colspan='6'><blink>Maaf, Data peserta belum tersedia...</blink></td></tr>";
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
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=peserta'>« Prev</a></span> ";
			} else {
				echo "<span class=disabled>« Prev</span> ";
			}

			for ($i = 1; $i <= $jmlhal; $i++)
				if ($i != $page) {
					echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=peserta'>$i</a> ";
				} else {
					echo " <span class=current>$i</span> ";
				}

			if ($page < $jmlhal) {
				$next = $page + 1;
				echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=peserta'>Next »</a></span>";
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
<!-- -->

<?php
if (isset($_POST["Simpan"])) {
	$pro = strip_tags($_POST["pro"]);
	$id_peserta = strip_tags($_POST["id_peserta"]);
	$id_peserta0 = strip_tags($_POST["id_peserta"]);
	$id_seminar = strip_tags($_POST["id_seminar"]);
	$id_tenant = strip_tags($_POST["id_tenant"]);
	$tanggal = BAL(strip_tags($_POST["tanggal"]));
	$jam = strip_tags($_POST["jam"]);
	$status = strip_tags($_POST["status"]);
	$keterangan = strip_tags($_POST["keterangan"]);

	if ($pro == "simpan") {
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
			echo "<script>alert('Data $id_peserta berhasil disimpan !');document.location.href='?mnu=peserta';</script>";
		} else {
			echo "<script>alert('Data $id_peserta gagal disimpan...');document.location.href='?mnu=peserta';</script>";
		}
	} else {
		$sql = "update `$tbpeserta` set 
	`id_peserta`='$id_peserta',
	`nama_peserta`='$id_seminar',
	`deskripsi`='$id_tenant',
	`gambar`='$tanggal' ,
	`gambar`='$jam' ,
	`status`='$status',
	`keterangan`='$keterangan'
	where `id_peserta`='$id_peserta0'";
		$ubah = process($conn, $sql);
		if ($ubah) {
			echo "<script>alert('Data $id_peserta berhasil diubah !');document.location.href='?mnu=peserta';</script>";
		} else {
			echo "<script>alert('Data $id_peserta gagal diubah...');document.location.href='?mnu=peserta';</script>";
		}
	} //else simpan
}
?>

<?php
if ($_GET["pro"] == "hapus") {
	$id_peserta = $_GET["kode"];
	$sql = "delete from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$hapus = process($conn, $sql);
	if ($hapus) {
		echo "<script>alert('Data $id_peserta berhasil dihapus !');document.location.href='?mnu=peserta';</script>";
	} else {
		echo "<script>alert('Data $id_peserta gagal dihapus...');document.location.href='?mnu=peserta';</script>";
	}
}
?>