

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GURU PIKET</title>
    <link rel="icon" href="assets/img/LOGODUBES.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
    h6 {
        margin-left: 10px;
    }
</style>

<?php

require "config/connection.php";
require "config/function.php";
$query = mysqli_query($conn, "SELECT * FROM absensi_guru INNER JOIN data_guru ON absensi_guru.nip = data_guru.nip ");
$query1 = mysqli_query($conn, "SELECT * FROM absensi_murid INNER JOIN tb_kelas ON absensi_murid.id_kelas = tb_kelas.id_kelas
                                                            INNER JOIN siswa_smkn12 ON absensi_murid.id_siswa = siswa_smkn12.id_siswa");

$no = 1;
?>

<body class="sb-nav-fixed">
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <?php include 'sidebar.php'; ?>
        </div>

        <!--ISI CONTENT-->
        <div id="layoutSidenav_content">

            <main>

                <img class="logo-smkn12" src="../gurupiket2/assets/img/logodubes.png" alt="">

                <h3 class="input-absensiswa">Dashboard</h3>
                <hr class="garis-siswa">

                <br>

                <img class="school-dubes" src="../gurupiket2/assets/img/dubes.jpg" alt="">

                <br><br>

                <div class="tabel">
                    <h4><b>ABSENSI SISWA TERBARU</b></h4>
                    <br>

                    <table class="table table-hover">

                        <thead class="head-table">
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                            <?php foreach ($query1 as $data) : ?>
                            <tr>
                                <th scope="row"><?= $data['tanggal']; ?></th>
                                <td><?= $data['nama_siswa']; ?></td>
                                <td><?= $data['nama_kelas']; ?></td>
                                <td><?= $data['keterangan']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>

                    <br>

                    <a href="dataabsen-siswa.php" type="submit" class="btn siswa-absen">Show More</a>
                </div>


                <br><br>

                <div class="tabel">
                    <h4><b>ABSENSI GURU TERBARU</b></h4>
                    <br>

                    <table class="table table-hover">

                        <thead class="head-table">
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Guru</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                        <?php foreach ($query as $data) : ?>
                            <tr>
                                <th scope="row"><?= $data['tanggal']; ?></th>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['nip']; ?></td>
                                <td><?= $data['keterangan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>

                    <br>

                    <a href="dataabsen-guru.php" type="submit" class="btn siswa-absen">Show More</a>
                </div>

            </main>





            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>