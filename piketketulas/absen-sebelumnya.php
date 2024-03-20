<?php session_start();
require "config/function.php";

$kelas = $_SESSION["kelas"];

$absen = mysqli_query($konek, "SELECT * FROM absensi_murid JOIN siswa_smkn12 ON absensi_murid.id_siswa = siswa_smkn12.id_siswa 
                                            JOIN tb_kelas ON absensi_murid.id_kelas = tb_kelas.id_kelas WHERE nama_kelas = '$kelas' ");


?>
<!doctype html>
<html lang="en">

<head>
    <title>ABSENSI SISWA</title>
    <link rel="icon" href="assets/img/logosmkn12.png">
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- NAVBAR -->

    <div class="dropdown">
        <a class="dropdown-toggle nama-kelas" style="color:black; text-decoration:none;" href="#" role="button"
            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION["kelas"]; ?>
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Kode Kelas= <?= $_SESSION["kode"]; ?></a></li>
            <li><a class="dropdown-item" href="absen-sebelumnya.php">Absensi Sebelumnya </a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="info">
        <svg class="i-info" data-bs-toggle="modal" data-bs-target="#exampleModal" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path
                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
        </svg>
        <img class="logo-absen" src="assets/img/logosmkn12.png" alt="">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penggunaan :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    1. Login dengan kode kelas yang telah diberikan. <br><br>
                    2. Jika semua murid dalam kelas hadir, maka berikan keterangan “NIHIL” pada form yang sudah di
                    sediakan.
                    <br><br>
                    3. Klik dropdown jika ada yang tidak hadir, klik tambah sesuai dengan jumlah murid yang tidak hadir.
                    <br><br>
                    4. Jika lupa mengisi absen di hari sebelumnya, maka klik “Absensi Sebelumnya” di nama kelas kamu.
                    <br><br>
                    5. Jika lupa absen dihari sebelumnya, harap lapor ke guru piket<br><br>
                </div>
            </div>
        </div>
    </div>

    <br>

    <!-- ISI -->
    <a href="absensi-kehadiran.php" class="btn btn-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left"
            viewBox="0 0 16 16">
            <path
                d="M10 12.796V3.204L4.519 8zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753" />
        </svg> Absen
    </a><br><br>
    <center>
        <h2>Data Absensi</h2>
        <br>
        <div class="card" style="width: 20rem;">
            <div class="card-body">
                <table class="table table-primary table-striped">
                    <thead>
                        <tr>
                            <th scope="col tb-data">Nama</th>
                            <th scope="col tb-data">Keterangan</th>
                            <th scope="col tb-data">Hari/Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($absen as $data):?>
                        <tr>
                            <th scope="row" class="tb-data"><?=$data["nama_siswa"];?></th>
                            <td class="tb-data"><?=$data["keterangan"];?></td>
                            <td class="tb-data"><?=$data["tanggal"];?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </center>







    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>