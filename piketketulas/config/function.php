<?php

$konek = mysqli_connect("localhost", "root", "", "projekpiket");



function absenSiswa($data)
{
    global $konek;

    if (!isset($_SESSION["id_kelas"])) {
        die("LOGIN TERLEBIH DAHULU!!.");
    }

    $nama = $data['nama'];
    $kelas = $data['kelas'];
    $keterangan = $data['keterangan'];


    for ($i = 0; $i < count($nama); $i++) {
        // //validasi nama 
        // $validnama = mysqli_query($konek, "SELECT * FROM absensi_murid WHERE id_siswa = '$nama' ");
        // if (mysqli_fetch_assoc($validnama)) {
        //     echo "
        //     <script>
        //         alert('TIDAK BOLEH MENGIRIM 2 NAMA YANG SAMA');
        //     </script>
        // ";
        //     return false;
        // }
        $sql = mysqli_query($konek, "INSERT INTO absensi_murid VALUES(null, '$nama[$i]', '$kelas', '$keterangan[$i]', now())");
    }
    return mysqli_affected_rows($konek);
}