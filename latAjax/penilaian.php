<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
//error_reporting(0);
require_once"konmysqli.php";
date_default_timezone_set("Asia/Jakarta");

?>

<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
   tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
   }); 
</script>

<script type="text/javascript">
var xmlHttp

function showUser(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getUser.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject(){
var xmlHttp=null;
try{xmlHttp=new XMLHttpRequest();}
catch (e){
	try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
 	catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
 }
return xmlHttp;
}
</script>



<form action="" method="post" enctype="multipart/form-data">
<table width="70%">



<tr>
<td height="24"><label for="kode_user">Pilih User</label>
<td valign="top">:<td colspan="2">
  <select name="kode_user" id="kode_user" onChange="showUser(this.value)">
    <option value="Pilih">Pilih USer</option>
    <?php
	  $s="select * from `tb_user`";
	$q=getData($conn,$s);
		foreach($q as $d){							
				$kode_user0=$d["kode_user"];
	echo"<option value='$kode_user0' ";if($kode_user0==$kode_user){echo"selected";} echo">$kode_user0</option>";
	}
	?>
  </select></td>
</tr>


<tr>
<td height="24"><label for="nama_user">Nama user</label>
<td valign="top">:
<td><div id="txtHint"><input name="nama_user" type="text" id="nama_user" value="" size="30" /></div>
</tr>
<tr>
  <td height="24">
  <td valign="top">
  <td><label for="textarea"></label>
    <textarea name="textarea" id="textarea" cols="45" rows="5"></textarea>
  </tr>

<tr>
<td>
<td valign="top">
<td colspan="2">	
<input name="Simpan" type="submit" id="Simpan"  value="Simpan" />
</td></tr>
</table>
</form>

<?php

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}


?>
