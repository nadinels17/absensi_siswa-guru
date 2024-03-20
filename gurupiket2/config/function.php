<?php
require "connection.php";

function absenGuru($data) {
    global $conn;

    // $nama = isset($data["nama"]) ? $data["nama"] : "";
    $nip = isset($data["nip"]) ? $data["nip"] : "";
    $keterangan = isset($data["keterangan"]) ? $data["keterangan"] : "";
    $hari_tanggal = isset($data["hari-tanggal"]) ? $data["hari-tanggal"] : "";

    $query = "INSERT INTO absensi_guru VALUES (null, '$nip', '$keterangan', '$hari_tanggal')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upAbsenSiswa($data) {
    global $conn;

    $id = $_GET["id"];
    $nama = $data["nama"];
    $kelas =$data["kelas"];
    $keterangan = $data["keterangan"];
    $hari_tanggal = $data["hari-tanggal"];

    mysqli_query($conn,"UPDATE absensi_murid SET id_siswa= '$nama', 
                                        id_kelas= '$kelas', 
                                        keterangan = '$keterangan', 
                                        tanggal = '$hari_tanggal' WHERE id =  '$id' ");
    return mysqli_affected_rows($conn);
}

function hapusabsen($id_siswa){
    global $conn;
    mysqli_query($conn, "DELETE FROM absensi_murid WHERE id= $id_siswa");
    return mysqli_affected_rows($conn);
}

// if ($_GET['aksi']=='data_guru') {
//     $nip = $_GET["nip"];
//     echo '<select id="nama" class="form-select inputt" aria-label="Default select example" name="nama">
//         <option selected>Pilih Nama Guru</option>';
//     $guru = mysqli_query($conn, "SELECT * FROM data_guru WHERE id='$nip'");
//     while ($nama = mysqli_fetch_array($guru)) {
    
//        echo "<option value='".$nama['id']."'>".$nama['nama']."</option>";
//     }
//     }
?>