<?php
$kecamatan=$_GET["q"];				
if($kecamatan=="Baros"){ // 1?>
<select name="kelurahan">
<option value="0">Pilih Kelurahan</option>
<option value="Baros">Baros</option>
<option value="Jayamekar">Jayamekar</option>
<option value="Jayaraksa">Jayaraksa</option>
<option value="Sudajaya Hilir">Sudajaya Hilir</option>
</select>
<?php }elseif($kecamatan=="Cibeureum"){ // 2?>
<select name="kelurahan">
<option value="0">Pilih Kelurahan</option>
<option value="Babakan">Babakan</option>
<option value="Cibeureum Hilir">Cibeureum Hilir</option>
<option value="Limusnunggal">Limusnunggal</option>
<option value="Sindang Palay">Sindang Palay</option>
</select>
<?php }elseif($kecamatan=="Cikole"){ // 3?>
<select name="kelurahan">
<option value="0">Pilih Kelurahan</option>
<option value="Cikole">Cikole</option>
<option value="Cisarua">Cisarua</option>
<option value="Gunungparang">Gunungparang</option>
<option value="Kebonjati">Kebonjati</option>
<option value="Selabatu">Selabatu</option>
<option value="Subangjaya">Subangjaya</option>
</select>
<?php }elseif($kecamatan=="Citamiang"){ // 4?>
<select name="kelurahan">
<option value="0">Pilih Kelurahan</option>
<option value="Cikondang">Cikondang</option>
<option value="Citamiang">Citamiang</option>
<option value="Gedongpanjang">Gedongpanjang</option>
<option value="Nanggeleng">Nanggeleng</option>
<option value="Tipar">Tipar</option>
</select>
<?php }elseif($kecamatan=="Gunungpuyuh"){ // 5?>
<select name="kelurahan">
<option value="0">Pilih Kelurahan</option>
<option value="Gunungpuyuh">Gunungpuyuh</option>
<option value="Karamat">Karamat</option>
<option value="Karangtengah">Karangtengah</option>
<option value="Sriwidari">Sriwidari</option>
</select>
<?php }elseif($kecamatan=="Lembursitu"){ // 6?>
<select name="kelurahan">
<option value="0">Pilih Kelurahan</option>
<option value="Cikundul">Cikundul</option>
<option value="Cipanengah">Cipanengah</option>
<option value="Lembursitu">Lembursitu</option>
<option value="Sindangsari">Sindangsari</option>
<option value="Situmekar">Situmekar</option>
</select>
<?php }else{ // 7?>
<select name="kelurahan">
<option value="0">Pilih Kelurahan</option>
<option value="Benteng">Benteng</option>
<option value="Dayeuhluhur">Dayeuhluhur</option>
<option value="Nyomplong">Nyomplong</option>
<option value="Sukakarya">Sukakarya</option>
<option value="Warudoyong">Warudoyong</option>
</select>
<?php }?>