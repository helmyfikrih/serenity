<?php
$cid_user=$_SESSION["cid"];
$cstatus=$_SESSION["cstatus"];
$ckategori=$_SESSION["ckategori"];
?>
 <?php
	$id_user=$cid_user;
	
	
	
				$sql2="select * from `$tbuser` where `id_user`='$cid_user'";
				$d2=getField($conn,$sql2);
				$nama_user=$d2["nama_user"];
				$kategori_user=$d["kategori"];
				$email_user=$d2["email"];
				$telepon_user=$d2["telepon"];
				$username=$d2["username"];
				$password=$d2["password"];
				$status_user=$d2["status"];
				
				
	//$sql="select * from `$tbtenant` where `id_user`='$id_user'";
	//$d=getField($conn,$sql);
				//$id_tenant=$d["id_tenant"];
				//$id_user=$d["id_user"];
				
				
				//$nama_tenant=$d["nama_tenant"];
				//$kategori=$d["kategori"];
				//$sub_kategori=$d["sub_kategori"];
				//$alamat=$d["alamat"];
				//$kecamatan=$d["kecamatan"];
				//$kelurahan=$d["kelurahan"];
				//$email=$d["email"];
				//$telepon=$d["telepon"];
				//$latitude=$d["latitude"];
				//$longitude=$d["longitude"];
				//$fasilitas=$d["fasilitas"];
				//$deskripsi=$d["deskripsi"];
				//$status=$d["status"];
				//$keterangan=$d["keterangan"];
				//$gambar=$d["gambar"];
				//$gambar0=$d["gambar"];

?>

      <div class="row">
        <div class="span4">
          <aside>

		   
		   <div class="widget">
              <h4>Profil Admin</h4>
              <ul>
                <li><label><strong>Nama Admin : </strong></label>
                  <p>
                    <?php echo $nama_user;?>
                  </p>
                </li>
                <li><label><strong>Kategori : </strong></label>
                  <p>
                 <?php echo $ckategori;?> <!-- Kenapa tidak muncul??? -->
                  </p>
                </li>
				<li><label><strong>Kontak : </strong></label>
                  <p>
                     Email :  <?php echo $email_user;?><br>
					 Telp. :	 <?php echo $telepon_user;?>
                  </p>
                </li>
				
				<li><label><strong>Username : </strong></label>
                  <p>
                  <?php echo $username;?>
                  </p>
                </li>
				
				<li><label><strong>Status : </strong></label>
                  <p>
                  <?php echo $status_user;?>
                  </p>
                </li>
              </ul>
            </div>
            <div class="widget">
				
				<div class="text-center">
					<a href="index.php?mnu=gantipasswordab&kd=<?php echo $id_user;?>">
						<button class="btn btn-color btn-rounded">Ganti Password</button>
					</a>
				</div>
			</div>
			
		  
          </aside>
        </div>
        
		<!--
		<div class="span8">
			<img src="ypathfile/<?php echo $gambar;?>" alt="<?php echo $nama_gallery;?>" title="" style="height :400px;width:100%;" />
          <div class="spacer30"></div>
          <div id="errormessage"></div>
              <form class="contactForm">    
			     <div class="span4 form-group">
			 <h3>Profil User</h3>
			 </div>
         <div class="row">
          
             <div class="span4 form-group">
			    
			
				Nama User :
                <input type="text" name="nama_user" class="form-control"  disabled id="name" placeholder="Your Name" data-rule="minlen:4" value="<?php echo $nama_user;?>"
                  data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>

              <div class="span4 form-group">
				Email :
                <input type="email" class="form-control" name="email" disabled id="email" placeholder="Your Email" data-rule="email" value="<?php echo $email_user;?>"
                  data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="span8 form-group">
                Username : 
				<input type="text" class="form-control" name="username"  disabled id="subject" placeholder="Subject" data-rule="minlen:4" value="<?php echo $username;?>"
                   />
                <div class="validation"></div>
              </div>
			  <div class="span8 form-group">
			    Status :
               <input type="text" class="form-control" name="status"  disabled id="subject" placeholder="Subject" data-rule="minlen:4" value="<?php echo $status_user;?>"
                   />
                <div class="validation"></div>
                <div >
					<a href="index.php?mnu=gantipassword"><button class="btn btn-color btn-rounded">Ubah Password</button></a>
				</div>
              </div>
            </div>
         </form>
        </div>
      </div> -->