<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);
?>
<?php
session_start();
//error_reporting(0);
require_once "konmysqli.php";

$mnu = $_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Diskopdagrin Kota Sukabumi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700" rel="stylesheet">
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/docs.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/sequence.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

  <!-- =======================================================
    Theme Name: Serenity
    Theme URL: https://bootstrapmade.com/serenity-bootstrap-corporate-template/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!-- map api -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl9LtfJKn0c-q5ebjAaJfil1ghK6J6TSk&language=id&region=id"></script> -->
  <header>
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <!-- logo -->
          <a class="brand logo" href="#"><img src="assets/img/logo-diskopdagrin.png" alt=""></a>
          <!-- end logo -->
          <!-- top menu -->
          <div class="navigation">
            <nav>
              <ul class="nav topnav">
                <!--  <li class="dropdown active">
                  <a href="index.html">Home</a>
                </li>
                <li class="dropdown">
                  <a href="#">Features</a>
                  <ul class="dropdown-menu">
                    <li><a href="overview.html">Overview</a></li>
                    <li><a href="scaffolding.html">Scaffolding</a></li>
                    <li><a href="base-css.html">Base CSS</a></li>
                    <li><a href="components.html">Components</a></li>
                    <li><a href="javascript.html">Javascripts</a></li>
                    <li><a href="icons.html">More icons</a></li>
                    <li class="dropdown"><a href="#">3rd level</a>
                      <ul class="dropdown-menu sub-menu">
                        <li><a href="#">Example menu</a></li>
                        <li><a href="#">Example menu</a></li>
                        <li><a href="#">Example menu</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Pages</a>
                  <ul class="dropdown-menu">
                    <li><a href="about.html">About us</a></li>
                    <li><a href="pricingtable.html">Pricing table</a></li>
                    <li><a href="fullwidth.html">Fullwidth</a></li>
                    <li><a href="404.html">404</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Portfolio</a>
                  <ul class="dropdown-menu">
                    <li><a href="portfolio-2cols.html">Portfolio 2 columns</a></li>
                    <li><a href="portfolio-3cols.html">Portfolio 3 columns</a></li>
                    <li><a href="portfolio-4cols.html">Portfolio 4 columns</a></li>
                    <li><a href="portfolio-detail.html">Portfolio detail</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#">Blog</a>
                  <ul class="dropdown-menu">
                    <li><a href="blog_left_sidebar.html">Blog left sidebar</a></li>
                    <li><a href="blog_right_sidebar.html">Blog right sidebar</a></li>
                    <li><a href="post_left_sidebar.html">Post left sidebar</a></li>
                    <li><a href="post_right_sidebar.html">Post right sidebar</a></li>
                  </ul>
                </li>
                <li>
                  <a href="contact.html">Contact</a>
                </li> -->

                <?php if ($_SESSION["cstatus"] == "Super Admin") { // Super Admin
                ?>
                  <li <?php if ($mnu == "home") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=home'><i class="icon-home"></i>Home</a></li>
                  <li <?php if ($mnu == "user") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=user'><i class="icon-user"></i>User</a></li>
                  <li <?php if ($mnu == "tenant") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=tenant'><i class="icon-star"></i>Tenant</a></li>
                  <li <?php if ($mnu == "berita") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=berita'><i class="icon-star"></i>Berita</a></li>
                  <li <?php if ($mnu == "seminar") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=seminar'><i class="icon-calendar"></i>Seminar</a></li>
                  <li <?php if ($mnu == "peserta") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=peserta'><i class="icon-list-alt"></i>Peserta</a></li>
                  <li <?php if ($mnu == "gallery") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=gallery'><i class="icon-camera"></i>Gallery</a></li>
                  <li <?php if ($mnu == "logout") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=logout'><i class="icon-off"></i>Logout</a></li>
                <?php } elseif ($_SESSION["cstatus"] == "Administrator") { // Admin Bidang 
                ?>
                  <li <?php if ($mnu == "home") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=home'><i class="icon-home"></i>Home</a></li>
                  <li <?php if ($mnu == "abberita") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=abberita'><i class="icon-star"></i>Berita</a></li>
                  <li <?php if ($mnu == "abseminar") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=abseminar'><i class="icon-calendar"></i>Kegiatan</a></li>
                  <li <?php if ($mnu == "abpeserta") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=abpeserta'><i class="icon-list-alt"></i>Peserta</a></li>
                  <li <?php if ($mnu == "abgallery") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=abgallery'><i class="icon-camera"></i>Produk</a></li>
                  <li <?php if ($mnu == "abtenant") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=abtenant'><i class="icon-star"></i>Pelaku Usaha</a></li>
                  <li <?php if ($mnu == "peta") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=peta'><i class="icon-star"></i>Peta</a></li>
                  <li <?php if ($mnu == "abuser") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=abuser'><i class="icon-star"></i>Profil</a></li>
                  <li <?php if ($mnu == "logout") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=logout'><i class="icon-off"></i>Logout</a></li>
                <?php } elseif ($_SESSION["cstatus"] == "Pengguna") { // Pelaku Usaha 
                ?>
                  <li <?php if ($mnu == "home") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=home'><i class="icon-home"></i>Home</a></li>
                  <li <?php if ($mnu == "puberita") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=puberita'><i class="icon-star"></i>Berita</a></li>
                  <li <?php if ($mnu == "puseminar") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=puseminar'><i class="icon-calendar"></i>Kegiatan</a></li>
                  <li <?php if ($mnu == "peta") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=peta'><i class="icon-list-alt"></i>Peta</a></li>
                  <li <?php if ($mnu == "pugallery") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=pugallery'><i class="icon-camera"></i>Produk</a></li>
                  <li <?php if ($mnu == "putenant") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=putenant'><i class="icon-star"></i>Profil</a></li>
                  <li <?php if ($mnu == "logout") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=logout'><i class="icon-off"></i>Logout</a></li>
                <?php } else { // Guest User 
                ?>
                  <li <?php if ($mnu == "home") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=home'><i class="icon-home"></i>Home</a></li>
                  <li <?php if ($mnu == "guberita") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=guberita'><i class="icon-home"></i>Berita</a></li>
                  <li <?php if ($mnu == "guseminar") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=guseminar'><i class="icon-home"></i>Seminar</a></li>
                  <li <?php if ($mnu == "peta") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=peta'><i class="icon-home"></i>Peta</a></li>
                  <li <?php if ($mnu == "gugallery") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=gugallery'><i class="icon-home"></i>Galeri</a></li>
                  <li <?php if ($mnu == "gutentang") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=gutentang'><i class="icon-home"></i>Tentang Kami</a></li>
                  <li <?php if ($mnu == "daftar") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=daftar'><i class="icon-off"></i>Buat Akun</a></li>
                  <li <?php if ($mnu == "login") {
                        echo "class='active'";
                      } ?>><a href='index.php?mnu=login'><i class="icon-off"></i>Login</a></li>
                <?php   } ?>
              </ul>
            </nav>
          </div>
          <!-- end menu -->
        </div>
      </div>
    </div>
  </header>


  <?php if ($mnu == "" || $mnu == "home") { ?>
    <section id="intro">
      <div class="jumbotron masthead">
        <div class="container">
          <!-- slider navigation -->
          <div class="sequence-nav">
            <div class="prev">
              <span></span>
            </div>
            <div class="next">
              <span></span>
            </div>
          </div>
          <!-- end slider navigation -->
          <div class="row">
            <div class="span12">
              <div id="slider_holder">
                <div id="sequence">
                  <ul>
                    <!-- Layer 1 -->
                    <li>
                      <div class="info animate-in">
                        <h2><?php echo $_SESSION["cstatus"];
                            echo $_SESSION["ckategori"]; ?></h2>
                        <br>
                        <h3>Corporate business</h3>
                        <p>
                          Lorem ipsum dolor sit amet, munere commodo ut nam, quod volutpat in per. At nec case iriure, consul recteque nec et.
                        </p>
                        <a class="btn btn-success" href="#">Learn more &raquo;</a>
                      </div>
                      <img class="slider_img animate-in" src="assets/img/slides/sequence/img-1.png" alt="">
                    </li>
                    <!-- Layer 2 -->
                    <li>
                      <div class="info">
                        <h2>Smart and fresh</h2>
                        <br>
                        <h3>Rich of features</h3>
                        <p>
                          Lorem ipsum dolor sit amet, munere commodo ut nam, quod volutpat in per. At nec case iriure, consul recteque nec et.
                        </p>
                        <a class="btn btn-success" href="#">Learn more &raquo;</a>
                      </div>
                      <img class="slider_img" src="assets/img/slides/sequence/img-2.png" alt="">
                    </li>
                    <!-- Layer 3 -->
                    <li>
                      <div class="info">
                        <h2>Far from ugly</h2>
                        <br>
                        <h3>Latest technology</h3>
                        <p>
                          Lorem ipsum dolor sit amet, munere commodo ut nam, quod volutpat in per. At nec case iriure, consul recteque nec et.
                        </p>
                        <a class="btn btn-success" href="#">Learn more &raquo;</a>
                      </div>
                      <img class="slider_img" src="assets/img/slides/sequence/img-3.png" alt="">
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Sequence Slider::END-->
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php } else { ?>

    <section id="subintro">
      <div class="jumbotron subhead" id="overview">
        <div class="container">
          <div class="row">
            <div class="span12">
              <div class="centered">
                <?php if ($mnu == "user") {
                  $tittle = "FORM USER";
                } elseif ($mnu == "tenant" || $mnu == "abtenant") {
                  $tittle = "FORM PELAKU USAHA";
                } elseif ($mnu == "berita" || $mnu == "abberita") {
                  $tittle = "FORM BERITA";
                } elseif ($mnu == "seminar" || $mnu == "abseminar") {
                  $tittle = "FORM KEGIATAN";
                } elseif ($mnu == "peserta" || $mnu == "abpeserta") {
                  $tittle = "FORM PESERTA";
                } elseif ($mnu == "gallery") {
                  $tittle = "FORM GALERI PRODUK";
                } elseif ($mnu == "abgallery") {
                  $tittle = "DATA GALERI PRODUK";
                } elseif ($mnu == "login") {
                  $tittle = "FORM LOGIN";
                } elseif ($mnu == "putenant") {
                  $tittle = "Profil Pelaku Usaha";
                } elseif ($mnu == "puberita" || $mnu == "puberitadetail") {
                  $tittle = "Berita";
                } elseif ($mnu == "puseminar" || $mnu == "puseminardetail") {
                  $tittle = "Kegiatan";
                } elseif ($mnu == "abuser") {
                  $tittle = "Profil Admin";
                } elseif ($mnu == "pugallery") {
                  $tittle = "Galeri Produk";
                } elseif ($mnu == "peta") {
                  $tittle = "Peta";
                } elseif ($mnu == "direction") {
                  $tittle = "Direction";
                }
                ?>

                <?php if ($mnu == "login") {
                  $desc = "*Jika anda belum memiliki akun, silahkan daftar terlebih dahulu";
                } elseif ($mnu == "putenant") {
                  $desc = "Pada menu ini, anda dapat mengubah password atau mengubah data usaha anda";
                } elseif ($mnu == "puberita" || $mnu == "puberitadetail") {
                  $desc = "Berita terupdate berdasarkan...";
                } elseif ($mnu == "puseminar" || $mnu == "puseminardetail") {
                  $desc = "Silahkan melakukan pendaftaran kegiatan dengan klik tombol daftar";
                } elseif ($mnu == "abuser") {
                  $desc = "Pada menu ini, anda dapat mengubah password atau mengubah data diri anda";
                } elseif ($mnu == "abgallery") {
                  $desc = "Pada menu ini, anda dapat mengubah ataupun menghapus data produk";
                } elseif ($mnu == "pugallery") {
                  $desc = "Pada menu ini, anda dapat menambahkan data produk atau foto pada data usaha anda";
                } elseif ($mnu == "peta") {
                  $desc = "Peta sebaran lokasi koperasi, ukm, perdagangan dan perindustrian di Kota Sukabumi";
                } elseif ($mnu == "direction") {
                  $desc = "Petunjuk Arah";
                } else {
                  $desc = "*Anda dapat menambahkan data baru, mengubah data lama, atau menghapus data.";
                }

                ?>
                <!-- Bates Ijo-->
                <h3><?php echo $tittle; ?></h3>
                <p>
                  <?php echo $desc; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } ?>






  <?php

  require_once "konmysqli.php";

  date_default_timezone_set("Asia/Jakarta");

  function getField($conn, $sql)
  {
    $rs = $conn->query($sql);
    $rs->data_seek(0);
    $d = $rs->fetch_assoc();
    $rs->free();
    return $d;
  }


  $id_tenant = $_GET["origin"];
  $sql = "select * from `$tbtenant` where `id_tenant`='$id_tenant'";
  $d = getField($conn, $sql);
  $id_tenant = $d["id_tenant"];
  $id_user = $d["id_user"];
  $nama_tenant = $d["nama_tenant"];
  $kategori = $d["kategori"];
  $sub_kategori = $d["sub_kategori"];
  $alamat = $d["alamat"];
  $kecamatan = $d["kecamatan"];
  $kelurahan = $d["kelurahan"];
  $email = $d["email"];
  $telepon = $d["telepon"];
  $latitude = $d["latitude"];
  $longitude = $d["longitude"];
  $fasilitas = $d["fasilitas"];
  $deskripsi = $d["deskripsi"];
  $status = $d["status"];
  $keterangan = $d["keterangan"];
  $gambar = $d["gambar"];
  $gambar0 = $d["gambar"];



  ?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Draggable Directions</title>
    <style>
      #right-panel {
        font-family: 'Roboto', 'sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select,
      #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }

      html,
      body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

      #map {
        height: 100%;
        float: left;
        width: 63%;
        height: 100%;
      }

      #right-panel {
        float: right;
        width: 34%;
        height: 100%;
      }

      .panel {
        height: 100%;
        overflow: auto;
      }
    </style>
  </head>

  <body>

    <div id="map">INI MAP</div>
    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
    </div>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAl9LtfJKn0c-q5ebjAaJfil1ghK6J6TSk&callback=initMap">
    </script>
  </body>

  </html>

  <!-- Footer
 ================================================== -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="span4">
          <div class="widget">
            <!-- logo -->
            <a class="brand logo" href="index.html">
              <img src="assets/img/logo-diskopdagrin-dark.png" alt="">
            </a>
            <!-- end logo -->
            <address>
              <strong>Dinas Koperasi, UKM, Perdagangan dan Perindustrian Kota Sukabumi</strong><br>
              Jl. Surya Kencana No.78, Selabatu, Kec. Cikole<br>
              Kota Sukabumi, Jawa Barat 43115<br>
              <abbr title="Phone">No. Tlp:</abbr> +62266 222407
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="verybottom">
      <div class="container">
        <div class="row">
          <div class="span6">
            <p>
              &copy; Diskopdagrin Kota Sukabumi - All right reserved
            </p>
          </div>
          <div class="span6">
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Serenity
              -->
              Designed by <a href="https://www.facebook.com/ardi.seftiansyah.1">Ardi Seftiansyah</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- JavaScript Library Files -->
  <?php if (
    $mnu == "" || $mnu == "home" || $mnu == "gugallery" || $mnu == "galeridetail" || $mnu == "gutentang" || $mnu == "guseminar"
    || $mnu == "guberita" || $mnu == "putenant" || $mnu == "puseminar" || $mnu == "puberita"
    || $mnu == "abuser" || $mnu == "peta" || $mnu == "direction"
  ) { ?>
    <script src="assets/js/jquery.min.js"></script>
  <?php } ?>
  <script src="assets/js/jquery.easing.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/modernizr.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/sequence/sequence.jquery-min.js"></script>
  <script src="assets/js/sequence/setting.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/application.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/hover/jquery-hover-effect.js"></script>
  <script src="assets/js/hover/setting.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>

  <script>
    $(document).ready(function() {
      initMap();
    })

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 13,
        center: {
          lat: -6.353525,
          lng: 106.831629
        }
      });

      var directionsService = new google.maps.DirectionsService;
      var directionsRenderer = new google.maps.DirectionsRenderer({
        draggable: true,
        map: map,
        panel: document.getElementById('right-panel')
      });

      directionsRenderer.addListener('directions_changed', function() {
        computeTotalDistance(directionsRenderer.getDirections());
      });



      <?php
      $lat0 = -6.914109;
      $lon0 = 106.933485;
      ?>
      var awal = new google.maps.LatLng({
        lat: <?php echo $lat0; ?>,
        lng: <?php echo $lon0; ?>
      });
      var ahir = new google.maps.LatLng({
        lat: <?php echo $latitude; ?>,
        lng: <?php echo $longitude; ?>
      });
      // var myLatLng32 = new google.maps.LatLng({lat: -6.168428, lng: 106.827406});




      displayRoute(awal, ahir, directionsService, directionsRenderer);
      $("#right-panel").append(`<a href="index.php?mnu=peta" onclick="return window.history.back();"><input name="Batal" class="btn btn-info" type="button" id="Batal" value="Kembali" /></a>`)
    }

    function displayRoute(origin, destination, service, display) {
      service.route({
        origin: origin,
        destination: destination,
        travelMode: 'DRIVING',
        avoidTolls: true
      }, function(response, status) {
        if (status === 'OK') {
          display.setDirections(response);
        } else {
          alert('Could not display directions due to: ' + status);
        }
      });
    }

    function computeTotalDistance(result) {
      var total = 0;
      var myroute = result.routes[0];
      for (var i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
      }
      total = total / 1000;
      document.getElementById('total').innerHTML = total + ' km';
    }
  </script>
</body>

</html>

<?php function RP($rupiah)
{
  return number_format($rupiah, "2", ",", ".");
} ?>
<?php
function WKT($sekarang)
{
  $tanggal = substr($sekarang, 8, 2) + 0;
  $bulan = substr($sekarang, 5, 2);
  $tahun = substr($sekarang, 0, 4);

  $judul_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
  $wk = $tanggal . " " . $judul_bln[(int)$bulan] . " " . $tahun;
  return $wk;
}
?>
<?php
function WKTP($sekarang)
{
  $tanggal = substr($sekarang, 8, 2) + 0;
  $bulan = substr($sekarang, 5, 2);
  $tahun = substr($sekarang, 2, 2);

  $judul_bln = array(1 => "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des");
  $wk = $tanggal . " " . $judul_bln[(int)$bulan] . "'" . $tahun;
  return $wk;
}
?>
<?php
function BAL($tanggal)
{
  $arr = explode(" ", $tanggal);
  if ($arr[1] == "Januari" || $arr[1] == "January") {
    $bul = "01";
  } else if ($arr[1] == "Februari" || $arr[1] == "February") {
    $bul = "02";
  } else if ($arr[1] == "Maret" || $arr[1] == "March") {
    $bul = "03";
  } else if ($arr[1] == "April") {
    $bul = "04";
  } else if ($arr[1] == "Mei" || $arr[1] == "May") {
    $bul = "05";
  } else if ($arr[1] == "Juni" || $arr[1] == "June") {
    $bul = "06";
  } else if ($arr[1] == "Juli" || $arr[1] == "July") {
    $bul = "07";
  } else if ($arr[1] == "Agustus" || $arr[1] == "August") {
    $bul = "08";
  } else if ($arr[1] == "September") {
    $bul = "09";
  } else if ($arr[1] == "Oktober" || $arr[1] == "October") {
    $bul = "10";
  } else if ($arr[1] == "November") {
    $bul = "11";
  } else if ($arr[1] == "Nopember") {
    $bul = "11";
  } else if ($arr[1] == "Desember" || $arr[1] == "December") {
    $bul = "12";
  }
  return "$arr[2]-$bul-$arr[0]";
}
?>


<?php
function BALP($tanggal)
{
  $arr = split(" ", $tanggal);
  if ($arr[1] == "Jan") {
    $bul = "01";
  } else if ($arr[1] == "Feb") {
    $bul = "02";
  } else if ($arr[1] == "Mar") {
    $bul = "03";
  } else if ($arr[1] == "Apr") {
    $bul = "04";
  } else if ($arr[1] == "Mei") {
    $bul = "05";
  } else if ($arr[1] == "Jun") {
    $bul = "06";
  } else if ($arr[1] == "Jul") {
    $bul = "07";
  } else if ($arr[1] == "Agu") {
    $bul = "08";
  } else if ($arr[1] == "Sep") {
    $bul = "09";
  } else if ($arr[1] == "Okt") {
    $bul = "10";
  } else if ($arr[1] == "Nov") {
    $bul = "11";
  } else if ($arr[1] == "Nop") {
    $bul = "11";
  } else if ($arr[1] == "Des") {
    $bul = "12";
  }
  return "$arr[2]-$bul-$arr[0]";
}
?>


<?php
function process($conn, $sql)
{
  $s = false;
  $conn->autocommit(FALSE);
  try {
    $rs = $conn->query($sql);
    if ($rs) {
      $conn->commit();
      $last_inserted_id = $conn->insert_id;
      $affected_rows = $conn->affected_rows;
      $s = true;
    }
  } catch (Exception $e) {
    echo 'fail: ' . $e->getMessage();
    $conn->rollback();
  }
  $conn->autocommit(TRUE);
  return $s;
}

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
  //foreach($arr as $row) {
  //  echo $row['nama_kelas'] . '*<br>';
  //}

  $rs->free();
  return $arr;
}

function getUser($conn, $kode)
{
  $field = "nama_user";
  $sql = "SELECT `$field` FROM `tb_user` where `id_user`='$kode'";
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
  return $row[$field];
}



function getTenant($conn, $kode)
{
  $field = "nama_tenant";
  $sql = "SELECT `$field` FROM `tb_tenant` where `id_tenant`='$kode'";
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
  return $row[$field];
}



function getSeminar($conn, $kode)
{
  $field = "nama_seminar";
  $sql = "SELECT `$field` FROM `tb_seminar` where `id_seminar`='$kode'";
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
  return $row[$field];
}



function getIdTenant($conn, $kode)
{
  $field = "id_tenant";
  $sql = "SELECT `$field` FROM `tb_tenant` where `id_user`='$kode'";
  $rs = $conn->query($sql);
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
  return $row[$field];
}
?>