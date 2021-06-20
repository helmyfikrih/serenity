<?php
session_start();
?>
 <div class="row">
        <div class="span4">
          <aside>
            <div class="widget">
			<form method="post">
              <h4>Login</h4>
              <ul>
                <li><label><strong>Username : </strong></label>
                  <input type="text" name="user" class="form-control" id="name" placeholder="Username" data-rule="minlen:4"
               
                </li>
                <li><label><strong>Password : </strong></label>
                 <input type="password" name="pass" class="form-control" id="name" placeholder="Password" data-rule="minlen:4"
               
                </li>
                <li><button class="btn btn-color btn-rounded" name="Login" type="submit">Login</button>
                  <button class="btn btn-color btn-rounded" type="submit">Daftar</button>
         
                </li>
              </ul>
			  </form>
            </div>
            <div class="widget">
              <h4>Social network</h4>
              <ul class="social-links">
                <li><a href="#" title="Twitter"><i class="icon-rounded icon-32 icon-twitter"></i></a></li>
                <li><a href="#" title="Facebook"><i class="icon-rounded icon-32 icon-facebook"></i></a></li>
                <li><a href="#" title="Google plus"><i class="icon-rounded icon-32 icon-google-plus"></i></a></li>
                <li><a href="#" title="Linkedin"><i class="icon-rounded icon-32 icon-linkedin"></i></a></li>
                <li><a href="#" title="Pinterest"><i class="icon-rounded icon-32 icon-pinterest"></i></a></li>
              </ul>
            </div>
          </aside>
        </div>
        <div class="span8">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22864.11283411948!2d-73.96468908098944!3d40.630720240038435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbg!4v1540447494452" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

          <div class="spacer30"></div>

        </div>
<?php
if(isset($_POST["Login"])){
	$usr=$_POST["user"];
	$pas=$_POST["pass"];
	
		$sql1="select * from `$tbuser` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		//$sql2="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		//$sql3="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Aktif'";
		
		if(getJum($conn,$sql1)>0){
			$d=getField($conn,$sql1);
				$kode=$d["id_user"];
				$nama=$d["nama_user"];
				$kategori=$d["kategori"];
				$st="Super Admin";
				if($kategori=="Admin Bidang Koperasi dan UKM" || $kategori=="Admin Bidang Perdagangan" || $kategori=="Admin Bidang Perindustrian"){
					$st="Administrator";
				}elseif($kategori=="Bidang Koperasi dan UKM" || $kategori=="Bidang Perdagangan" || $kategori=="Bidang Perindustrian"){
					$st="Pengguna";
				}else{
						$st="Super Admin";
				}
				   $_SESSION["cid"]=$kode;
				   $_SESSION["cnama"]=$nama;
				   $_SESSION["ckategori"]=$kategori;
				   $_SESSION["cstatus"]=$st;
				   
		echo "<script>alert('Otentikasi ".$_SESSION["cstatus"]." ".$_SESSION["cnama"]." (".$_SESSION["cid"].") berhasil Login!');
		document.location.href='index.php?mnu=home';</script>";
		}
		//elseif(getJum($conn,$sql2)>0){
			
		//	}
		else{
			session_destroy();
			echo "<script>alert('Otentikasi Login GAGAL !,Silakan cek data Anda kembali...');
			document.location.href='index.php?mnu=login';</script>";
		}
}


?>