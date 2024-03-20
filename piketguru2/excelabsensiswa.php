<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen-guru</title>
</head>

<style>
table {
    border-collapse: collapse;
}

table th,
table td {
    border: 3px solid pink;
    padding: 4px 60px;
}

h1 {
    color: black;
}
</style>

<?php

require "config/connection.php";
require "config/function.php";
$query2 = mysqli_query($conn, "SELECT * FROM absensi_murid JOIN tb_kelas ON absensi_murid.id_kelas = tb_kelas.id_kelas
                                            INNER JOIN siswa_smkn12 ON absensi_murid.id_siswa = siswa_smkn12.id_siswa");

if (isset($_POST["search"])) {
    $tanggal_awal=$_POST["tanggal_awal"];
    $tanggal_akhir=$_POST["tanggal_akhir"];

    $query2 = mysqli_query($conn, "SELECT * FROM absensi_murid WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");

}

$no = 1;

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data absensi siswa.xls");



?>

<body>

    <center>
        <h1> ABSENSI SISWA <a href="absensi_siswa.php" class="text-dark"></a></h1>
        <br><br>
        <!-- table guru -->
        <table border="1" id="table_absensi_guru">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query2 as $data) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['nama_siswa']; ?></td>
                    <td><?= $data['nama_kelas']; ?></td>
                    <td><?= $data['keterangan']; ?></td>
                    <td><?= $data['tanggal']; ?></td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <!-- end table guru -->
    </center>
</body>

</html>