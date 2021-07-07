<style type="text/css">
	body {
		width: 100%;
	}
</style>

<body OnLoad="window.print()" OnFocus="window.close()">
	<?php
	include "../konmysqli.php";
	echo "<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
	?>


	<h3>
		<center>Laporan Data Pelaku Usaha:
	</h3>


	<table width="100%" border="0">
		<tr>
			<th width="5%">
				<center>No</td>
			<th width="10%">
				<center>Nama Usaha</td>
			<th width="10%">
				<center>Nama Pemilik</td>
			<th width="10%">
				<center>Kategori</td>
			<th width="45%">
				<center>Detail Usaha</td>
			<th width="10%">
				<center>Keterangan</td>
			<th width="10%">
				<center>Status</td>
		</tr>
		<?php
		$kode_admin = isset($_GET["kode"]) ? $_GET["kode"] : null;
		$sql = "SELECT t.nama_user,p.* FROM tb_tenant p 
		LEFT JOIN tb_user t ON t.id_user= p.id_user
		ORDER BY kategori,id_tenant ASC";
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
				$nama_tenant = $d["nama_tenant"];
				$nama_user = $d["nama_user"];
				$kategori = $d["kategori"];
				$detail_usaha = " ID Pelaku Usaha: " . $d["id_tenant"] . "</br>" .
					" Sub Kategori: " . $d["sub_kategori"] . "</br>" .
					" Alamat: " . $d["alamat"] . "</br>" .
					" Kecamatan: " . $d["kecamatan"] . "</br>" .
					" Kelurahan: " . $d["kelurahan"] . "</br>" .
					" Titik Koordinat: (" . $d["latitude"] . " , " . $d["longitude"] . ") </br>" .
					" Kontak: " . $d["telepon"] . " - " . $d["telepon"] . "</br>";
				$keterangan = $d["keterangan"];
				$status = $d["status"];

				if ($no % 2 == 1) {
					echo "<tr bgcolor='#999999'>
					<td>$no</td>
					<td>$nama_tenant</td>
					<td>$nama_user</td>
					<td>$kategori</td>
					<td>$detail_usaha</td>
					<td>$keterangan</td>
					<td>$status</td>
					</tr>";
				} //no==1
				else if ($no % 2 == 0) {
					echo "<tr bgcolor='#cccccc'>
					<td>$no</td>
					<td>$nama_tenant</td>
					<td>$nama_user</td>
					<td>$kategori</td>
					<td>$detail_usaha</td>
					<td>$keterangan</td>
					<td>$status</td>
					</tr>";
				}
			} //while
		} //if
		else {
			echo "<tr><td colspan='7'><blink>Maaf, Data admin belum tersedia...</blink></td></tr>";
		}

		/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

		function getJum($conn, $sql)
		{
			$rs = $conn->query($sql);
			$jum = $rs->num_rows;
			$rs->free();
			return $jum;
		}

		function getData($conn, $sql)
		{
			$rs = $conn->query($sql);
			$rs->data_seek(0);
			$arr = $rs->fetch_all(MYSQLI_ASSOC);

			$rs->free();
			return $arr;
		}

		?>

	</table>