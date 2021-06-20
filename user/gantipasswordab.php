<?php
$cid_user=$_SESSION["cid"];
$cstatus=$_SESSION["cstatus"];
$ckategori=$_SESSION["ckategori"];
?>


<?php

$tanggal=WKT(date("Y-m-d"));
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
win=window.open('user/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
	$id_user=$cid_user;
	$sql="select * from `$tbuser` where `id_user`='$id_user'";
	$d=getField($conn,$sql);
				$id_user=$d["id_user"];
				$nama_user=$d["nama_user"];
				$kategori=$d["kategori"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$username=$d["username"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
			
?>
 
  <h3>Ubah Password</h3>

<!-- --> 
  
<form action="" method="post" enctype="multipart/form-data">
<table width="40%" >


<tr>
<td height="24"><label for="password">Input Password Lama</label>
<td>:<td><input name="password1" type="text" id="password" value="<?php echo $password;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="password">Input Password Baru</label>
<td>:<td><input name="password2" type="text" id="password" value="<?php echo $password;?>" size="25" />
</td>
</tr>

<tr>
<td height="24"><label for="password">Konfirmasi Password Baru</label>
<td>:<td><input name="password3" type="text" id="password" value="<?php echo $password;?>" size="25" />
</td>
</tr>
<tr>
<td>
<td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" class="btn btn-primary"  value="Ubah Password" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_user" type="hidden" id="id_user" value="<?php echo $id_user;?>" />
        <input name="id_user0" type="hidden" id="id_user0" value="<?php echo $id_user0;?>" />
        <a href="?mnu=putenant"><input name="Batal" class="btn btn-danger" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>

<?php
if(isset($_POST["Simpan"])){
	$id_user=strip_tags($_POST["id_user"]);
	$password1=strip_tags($_POST["password1"]);
	$password2=strip_tags($_POST["password2"]);
	$password3=strip_tags($_POST["password3"]);
	$ada=0;
	$sama=0;
	  //ada
	  $sql="select * from `$tbuser` where password='$password1' and `id_user`='$id_user'";
	   $jums=getJum($conn,$sql);
		echo"jums : $jums<br>";
		if($jums>0){
			$ada=1;
		}else{	
		echo"<script>alert('Password 1 Salah');document.location.href='?mnu=gantipasswordab';</script>";		
	
		}
		
		//sama
		if($password2 == $password3){
			echo"jums : $jums<br>";
		
		echo"jums : $jums<br>";
		
			$sama=1;	
		}else{
		echo"<script>alert('Password 3 tidaksesuai');document.location.href='?mnu=gantipasswordab';</script>";
		}
		
		if($ada>0 && $sama>0 ){
			$sql="update `$tbuser` set `password`='$password2' where `id_user`='$id_user'";
			$ubah=process($conn,$sql);
			echo "<script>alert('Berhasil Ubah Password !');document.location.href='?mnu=abuser';</script>";
		}else{
		//echo"<script>alert('Password 1 Salah');document.location.href='?mnu=gantipassword';</script>";		
		}
		
		
		
		
		
		//if(jums > 0){
		//	echo"<script>alert('Password 1 Salah');document.location.href='?mnu=gantipassword';</script>";		
		//}else{
		//	if($password2 == "password3"){
		//	echo"<script>alert('Password 3 tidaksesuai');document.location.href='?mnu=gantipassword';</script>";
		//	}else{
				
		//	$sql="update `$tbuser` set `password`='$password2' where `id_user`='$id_user'";
		//		$ubah=process($conn,$sql);
		//		if($ubah){
		//			echo "<script>alert('Berhasil Ubah Password !');document.location.href='?mnu=putenant';</script>";
		//			}else{
		//				echo"<script>alert('Data $id_user gagal diubah...');document.location.href='?mnu=gantipassword';</script>";
		//			}
		//	}
			
		//}	
			
			
			
		
	
	
}

?>
