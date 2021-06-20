<?php
$kode_user=$_GET["q"];

require_once"konmysqli.php";

	$sql="select * from `tb_user` where `kode_user`='$kode_user'";
	$d=getField($conn,$sql);
				$nama_user=$d["nama_user"];
				$alamat=$d["alamat"];
				$email=$d["email"];
				
?>

<input name="nama_user" type="text" id="nama_user" value="<?php echo $nama_user;?>" size="30" />

<?php

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

?>
