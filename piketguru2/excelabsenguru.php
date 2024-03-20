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

$query = mysqli_query($conn, "SELECT * FROM absensi_guru JOIN data_guru using(nip)");
$query2 = mysqli_query($conn, "SELECT * FROM regis_admin");
$no = 1;

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data absensi guru.xls");

?>

<body>

    <center>
        <h1> ABSENSI GURU <a href="absensi_siswa.php" class="text-dark"></a></h1>
        <br><br>
        <!-- table guru -->
        <table border="1" id="table_absensi_guru">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Keterangan</th>
                    <th>Hari/Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $data) : ?>
                <tr>
                    <th scope="row"><?= $no++ ?></th>
                    <td><?= $data['nama']; ?></td>
                    <td><?= $data['nip']; ?></td>
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