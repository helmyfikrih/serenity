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
		<center>Laporan Data Peserta:
	</h3>


	<table width="100%" border="0">
		<tr>
			<th width="5%">
				<center>no</td>
			<th width="10%">
				<center>Id Peserta</td>
			<th width="10%">
				<center>Nama Peserta</td>
			<th width="45%">
				<center>Detail Seminar</td>
			<th width="10%">
				<center>Waktu Mendaftar</td>
			<th width="10%">
				<center>Keterangan</td>
			<th width="10%">
				<center>Status</td>
		</tr>
		<?php
		$kode_admin = isset($_GET["kode"]) ? $_GET["kode"] : null;
		$sql = "SELECT p.id_peserta,t.nama_tenant,s.*,p.tanggal AS tgl_daftar, p.jam AS jam_daftar, p.keterangan, p.status FROM tb_peserta p
		LEFT JOIN tb_tenant t ON t.id_tenant= p.id_tenant
		LEFT JOIN tb_seminar s ON s.id_seminar=p.id_seminar
		ORDER BY id_peserta ASC";
		$jum = getJum($conn, $sql);
		$no = 0;
		if ($jum > 0) {
			$arr = getData($conn, $sql);
			foreach ($arr as $d) {
				$no++;
				$id_peserta = $d["id_peserta"];
				$nama_peserta = $d["nama_tenant"];
				$detail_seminar = " Judul: " . $d["nama_seminar"] . "</br>" .
					" Kategori: " . $d["kategori"] . "</br>" .
					" Tanggal: " . $d["tanggal"] . "</br>" .
					" Jam: " . $d["jam"] . "</br>";
				$waktu_daftar = $d["tgl_daftar"] . ' ' . $d['jam_daftar'];
				$keterangan = $d["keterangan"];
				$status = $d["status"];

				if ($no % 2 == 1) {
					echo "<tr bgcolor='#999999'>
					<td>$no</td>
					<td>$id_peserta</td>
					<td>$nama_peserta</td>
					<td>$detail_seminar</td>
					<td>$waktu_daftar</td>
					<td>$keterangan</td>
					<td>$status</td>
					</tr>";
				} //no==1
				else if ($no % 2 == 0) {
					echo "<tr bgcolor='#cccccc'>
					<td>$no</td>
					<td>$id_peserta</td>
					<td>$nama_peserta</td>
					<td>$detail_seminar</td>
					<td>$waktu_daftar</td>
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