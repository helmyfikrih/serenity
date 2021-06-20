 <?php
	$id_user=$_SESSION["cid"];
	$sql="select * from `$tbtenant` where `id_user`='$id_user'";
	$d=getField($conn,$sql);
				$id_tenant=$d["id_tenant"];
				$id_user=$d["id_user"];
				$nama_tenant=$d["nama_tenant"];
				$kategori=$d["kategori"];
				$sub_kategori=$d["sub_kategori"];
				$alamat=$d["alamat"];
				$kecamatan=$d["kecamatan"];
				$kelurahan=$d["kelurahan"];
				$email=$d["email"];
				$telepon=$d["telepon"];
				$latitude=$d["latitude"];
				$longitude=$d["longitude"];
				$fasilitas=$d["fasilitas"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];

?>
 
 
 <div class="row">
        <div class="span4">
          <aside>
            <div class="widget">
              <h4>Get in touch with us</h4>
              <ul>
                <li><label><strong>Nama  : </strong></label>
                  <p>
                    +900 888 707 123
                  </p>
                </li>
                <li><label><strong>Email : </strong></label>
                  <p>
                    name@yoursite.com
                  </p>
                </li>
                <li><label><strong>Adress : </strong></label>
                  <p>
                    Pasar kambing 58 Suite X.110 Peterongan Semarang, Indonesia
                  </p>
                </li>
              </ul>
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

          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="row">
              <div class="span4 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4"
                  data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>

              <div class="span4 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email"
                  data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="span8 form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4"
                  data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="span8 form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us"
                  placeholder="Message"></textarea>
                <div class="validation"></div>
                <div class="text-center">
                  <button class="btn btn-color btn-rounded" type="submit">Send message</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>