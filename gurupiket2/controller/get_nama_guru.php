<?php
require "../piketguru2/config/connection.php";
?>
<?php
$nipguru = $_GET["nip"];
echo '<select onchange="show_nama()" id="nama" class="form-select inputt" aria-label="Default select example" name="nama">
                <option selected>Pilih Nama Guru</option>';
$dataguru = mysqli_query($conn, "SELECT * FROM data_guru WHERE id='$nipguru'");
while ($nama = mysqli_fetch_array($dataguru)) {

	 echo "<option value='".$nama['id']."'>".$nama['nama']."</option>";
}
?> 
