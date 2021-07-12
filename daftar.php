<?php
session_start();
?>

<div align="center">
  <div class="span12">
    <aside>
      <div class="widget">
        <form method="post">
          <h4>Buat Akun</h4>
          <ul>
            <li><label><strong>Nama User : </strong></label>
              <input type="text" name="nama_user" class="form-control" id="nama_user" placeholder="Nama User" data-rule="minlen:4" required>
            </li>
            <li><label><strong>Kategori : </strong></label>

              <select name="kategori" required>
                <option value="">Pilih Kategori</option>
                <option value="Bidang Koperasi dan UKM" <?php if ($kategori == "Bidang Koperasi dan UKM") {
                                                          echo "selected";
                                                        } ?>>Bidang Koperasi dan UKM</option>
                <option value="Bidang Perdagangan" <?php if ($kategori == "Bidang Perdagangan") {
                                                      echo "selected";
                                                    } ?>>Bidang Perdagangan</option>
                <option value="Bidang Perindustrian" <?php if ($kategori == "Bidang Perindustrian") {
                                                        echo "selected";
                                                      } ?>>Bidang Perindustrian</option>
              </select>
            </li>

            <li><label><strong>Email : </strong></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="Email" data-rule="minlen:4" required>
            </li>
            <li><label><strong>Telepon : </strong></label>
              <input type="text" name="telepon" class="form-control" id="telepon" placeholder="Telepon" data-rule="minlen:4" required>
            </li>
            <li><label><strong>Username : </strong></label>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" data-rule="minlen:4" required>
            </li>
            <li><label><strong>Password : </strong></label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Password" data-rule="minlen:4" required>
            </li>
            <li><button onclick="return confirm('Apakah data sudah benar?')" class="btn btn-color btn-rounded" name="Simpan" type="submit">Buat Akun</button>
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


  <?php
  if (isset($_POST["Simpan"])) {

    $sql = "select `id_user` from `$tbuser` order by `id_user` desc";
    $q = mysqli_query($conn, $sql);
    $jum = mysqli_num_rows($q);
    $th = date("y");
    $bl = date("m") + 0;
    if ($bl < 10) {
      $bl = "0" . $bl;
    }

    $kd = "IDU" . $th . $bl; //KEG1610001
    if ($jum > 0) {
      $d = mysqli_fetch_array($q);
      $idmax = $d["id_user"];

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
    $id_user = $idmax;
    $nama_user = strip_tags($_POST["nama_user"]);
    $kategori = strip_tags($_POST["kategori"]);
    $email = strip_tags($_POST["email"]);
    $telepon = strip_tags($_POST["telepon"]);
    $username = strip_tags($_POST["username"]);
    $password = strip_tags($_POST["password"]);
    $status = "Belum Diverifikasi";
    $keterangan = "-";


    $sql = " INSERT INTO `$tbuser` (
`id_user` ,
`nama_user` ,
`kategori` ,
`email` ,
`telepon` ,
`username`,
`password`,
`status`,
`keterangan` 
) VALUES (
'$id_user', 
'$nama_user',
'$kategori', 
'$email',
'$telepon',
'$username',
'$password',
'$status',
'$keterangan'
)";

    $simpan = process($conn, $sql);
    if ($simpan) {
      echo "<script>alert('Data $id_user berhasil Registrasi !');document.location.href='?mnu=login';</script>";
    } else {
      echo "<script>alert('Data $id_user gagal disimpan...');document.location.href='?mnu=daftar';</script>";
    }
  }
  ?>