<?php
$kategori = $_GET["q"];
if ($kategori == "Bidang Koperasi dan UKM") { // 1
?>
    <select name="sub_kategori">
        <option value="">Pilih Sub Kategori</option>
        <option value="Koperasi">Koperasi</option>
        <option value="UKM Makanan">UKM Makanan</option>
        <option value="UKM Minuman">UKM Minuman</option>
        <option value="UKM Pakaian">UKM Pakaian</option>
        <option value="UKM Alat Tulis">UKM Alat Tulis</option>
        <option value="UKM Lainnya">UKM Lainnya</option>
    </select>
<?php } elseif ($kategori == "Bidang Perdagangan") { // 2
?>
    <select name="sub_kategori">
        <option value="">Pilih Sub Kategori</option>
        <option value="Perusahaan Mikro">Perusahaan Mikro</option>
        <option value="Perusahaan Kecil">Perusahaan Kecil</option>
        <option value="Perusahaan Menengah">Perusahaan Menengah</option>
        <option value="Perusahaan Besar">Perusahaan Besar</option>
        <option value="Lainnya">Lainnya</option>
    </select>
<?php } else { // 3
?>
    <select name="sub_kategori">
        <option value="">Pilih Sub Kategori</option>
        <option value="Industri Agro dan Hasil Hutan">Industri Agro dan Hasil Hutan</option>
        <option value="Industri Aneka">Industri Aneka</option>
        <option value="Industri Logam dan Alat Transportasi">Industri Logam dan Alat Transportasi</option>
        <option value="Lainnya">Lainnya</option>
    </select>
<?php } ?>