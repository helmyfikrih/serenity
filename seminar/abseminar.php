<?php
$cid_user=$_SESSION["cid"];
$cstatus=$_SESSION["cstatus"];
$ckategori=str_replace("Admin ","",$_SESSION["ckategori"]);
?>

<?php

$tanggal=WKT(date("Y-m-d"));
$jam=date('H:i:s');
$pro="simpan";
$label="Tambah";
$status="Aktif";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('seminar/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<!-- -->
<link rel="stylesheet" href="jsacordeon/jquery-ui.css">
<link rel="stylesheet" href="resources/demos/style.css">
<script src="jsacordeon/jquery-1.12.4.js"></script>
<script src="jsacordeon/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
<!-- -->

<?php
  $sql="select `id_seminar` from `$tbseminar` order by `id_seminar` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $th=date("y");
  $bl=date("m")+0;if($bl<10){$bl="0".$bl;}

  $kd="IDS".$th.$bl;//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_seminar"];
   
   $bul=substr($idmax,5,2);
   $tah=substr($idmax,3,2);
    if($bul==$bl && $tah==$th){
     $urut=substr($idmax,7,3)+1;
     if($urut<10){$idmax="$kd"."00".$urut;}
     else if($urut<100){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."001";
     }   
   }//jum>0
  else{$idmax="$kd"."001";}
  $id_seminar=$idmax;
?>
<?php
if($_GET["pro"]=="ubah"){
	$id_seminar=$_GET["kode"];
	$sql="select * from `$tbseminar` where `id_seminar`='$id_seminar'";
	$d=getField($conn,$sql);
				$id_seminar=$d["id_seminar"];
				$nama_seminar=$d["nama_seminar"];
				$deskripsi=$d["deskripsi"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$kategori=$d["kategori"];
				$pro="ubah";
				$label="Simpan";
}
?>

<!-- -->
<div id="accordion">
  <h3>Form Kegiatan</h3>
  <div>
<!-- --> 

<form action="" method="post" enctype="multipart/form-data">
<table width="40%" >
<tr>
<td width="66"><label for="id_seminar">ID Kegiatan</label>
<td width="9">:
<td colspan="2"><b><?php echo $id_seminar;?></b></tr>
<tr>
<td><label for="nama_seminar">Judul</label>
<td>:<td width="213"><input name="nama_seminar" type="text" id="nama_seminar" value="<?php echo $nama_seminar;?>" size="20" />
</td>
<td width="81" rowspan="4">
<center>
<?php 
echo"<a href='#' onclick='buka(\"seminar/zoom.php?id=$id_seminar\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="24"><label for="deskripsi">Deskripsi</label>
<td>:<td><textarea name="deskripsi"  id="deskripsi"  size="25"  ><?php echo $deskripsi;?></textarea>
</td>
</tr>

<tr>
  <td height="24"><label for="gambar">Gambar</label>
    <td>:<td colspan="2">
        <input name="gambar" type="file" id="gambar" class="btn" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $id_seminar;?>")'><?php echo $gambar0;?></a></td>
</tr>

<tr>
<td><label for="status">Status</label>
<td>:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif 
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
</td></tr>

<tr>
<td height="24"><label for="keterangan">Keterangan</label>
<td>:<td><textarea name="keterangan"  id="keterangan"  size="25"  ><?php echo $keterangan;?></textarea>
</td>
</tr>

<tr>
<td height="24"><label for="tanggal">Tanggal</label>
<td>:<td><input name="tanggal" type="text" id="tanggal" value="<?php echo $tanggal;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="jam">Jam</label>
<td>:<td><input name="jam" type="text" id="jam" value="<?php echo $jam;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="kategori">Kategori</label>
<td>:<td>
<select name="kategori" onChange="showKategori(this.value)">
<option value="Pilih" >Pilih Kategori</option>
<option value="<?php echo $ckategori;?>"><?php echo $ckategori;?></option>
</select>
</td>
</tr>


<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" class="btn btn-primary" value="<?php echo $label;?>" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_seminar" type="hidden" id="id_seminar" value="<?php echo $id_seminar;?>" />
        <input name="id_seminar0" type="hidden" id="id_seminar0" value="<?php echo $id_seminar0;?>" />
		<input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <a href="?mnu=abseminar"><input name="Batal" type="button" id="Batal" class="btn btn-danger" value="Batal" /></a>
</td></tr>
</table>
</form>

<!-- -->
</div>
    
 <h3>Data Kegiatan : <?php echo $ckategori;?></h3>
  <div>
<!-- --> 

<br />
Data Kegiatan: 
| <a href="seminar/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="seminar/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <a href="seminar/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table  class="table table-bordered table-striped">
 <thead>
     <tr>
    <th width="3%">No</td>
    <th width="60%">Detail Kegiatan</td>
    <th width="15%">Gambar</td>
    <th width="20%">Keterangan</td>
    <th width="5%%">Status</td>
    <th width="5%">Menu</td>
  </tr>
  </thead>
  <tbody>
  
<?php  
  $sql="select * from `$tbseminar` where kategori='$ckategori' order by `id_seminar` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
//--------------------------------------------------------------------------------------------
$batas   = 10;
$page = $_GET['page'];
if(empty($page)){$posawal  = 0;$page = 1;}
else{$posawal = ($page-1) * $batas;}

$sql2 = $sql." LIMIT $posawal,$batas";
$no = $posawal+1;
//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {						
				$id_seminar=$d["id_seminar"];
				$nama_seminar=$d["nama_seminar"];
				$deskripsi=$d["deskripsi"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$kategori=$d["kategori"];
			
echo"<tr>
				<td>$no</td>
				<td>
					<b>ID Kegiatan : $id_seminar</b><br>
					<b>Judul : $nama_seminar</b><br>
					<b>Tanggal :</b> $tanggal<br>
					<b>Jam :</b> $jam<br><hr>
					<b>Deskripsi :</b> $deskripsi<br>
				</td>
				
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"seminar/zoom.php?id=$id_seminar\")'>
<img src='$YPATH/$gambar' width='120' height='100' /></a></div>";
				echo"</td>
				
				<td>$keterangan</td>
				<td>$status</td>
					
				<td><div align='center'>
<a href='?mnu=abseminar&pro=ubah&kode=$id_seminar'><i class='icon-pencil'></i></a>
<a href='?mnu=abseminar&pro=hapus&kode=$id_seminar'><i class='icon-trash' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama_seminar pada data seminar ?..\")'></i> </a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data seminar belum tersedia...</blink></td></tr>";}
?>

</tbody>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=abseminar'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=abseminar'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=abseminar'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>

<!-- -->
</div>
		
</div>
<!-- -->

<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_seminar=strip_tags($_POST["id_seminar"]);
	$id_seminar0=strip_tags($_POST["id_seminar"]);
	$nama_seminar=strip_tags($_POST["nama_seminar"]);
	$deskripsi=strip_tags($_POST["deskripsi"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	$tanggal=BAL(strip_tags($_POST["tanggal"]));
	$jam=strip_tags($_POST["jam"]);
	$kategori=strip_tags($_POST["kategori"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbseminar` (
`id_seminar` ,
`nama_seminar` ,
`deskripsi` ,
`gambar` ,
`status` ,
`keterangan`,
`tanggal`,
`jam`,
`kategori`
) VALUES (
'$id_seminar', 
'$nama_seminar',
'$deskripsi', 
'$gambar',
'$status',
'$keterangan',
'$tanggal',
'$jam',
'$kategori'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('Data $id_seminar berhasil disimpan !');document.location.href='?mnu=abseminar';</script>";}
		else{echo"<script>alert('Data $id_seminar gagal disimpan...');document.location.href='?mnu=abseminar';</script>";}
	}
	else{
	$sql="update `$tbseminar` set 
	`id_seminar`='$id_seminar',
	`nama_seminar`='$nama_seminar',
	`deskripsi`='$deskripsi',
	`gambar`='$gambar' ,
	`status`='$status',
	`keterangan`='$keterangan',
	`tanggal`='$tanggal',
	`jam`='$jam',
	`kategori`='$kategori'
	where `id_seminar`='$id_seminar0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_seminar berhasil diubah !');document.location.href='?mnu=abseminar';</script>";}
		else{echo"<script>alert('Data $id_seminar gagal diubah...');document.location.href='?mnu=abseminar';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_seminar=$_GET["kode"];
$sql="delete from `$tbseminar` where `id_seminar`='$id_seminar'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_seminar berhasil dihapus !');document.location.href='?mnu=abseminar';</script>";}
	else{echo"<script>alert('Data $id_seminar gagal dihapus...');document.location.href='?mnu=abseminar';</script>";}
}
?>

