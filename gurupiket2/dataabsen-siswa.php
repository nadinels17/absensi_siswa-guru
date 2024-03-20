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
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php

require "config/connection.php";
require "config/function.php";
$query = mysqli_query($conn, "SELECT * FROM absensi_murid JOIN tb_kelas ON absensi_murid.id_kelas = tb_kelas.id_kelas
                                                            INNER JOIN siswa_smkn12 ON absensi_murid.id_siswa = siswa_smkn12.id_siswa");
$query2 = mysqli_query($conn, "SELECT * FROM absensi_murid JOIN tb_kelas ON absensi_murid.id_kelas = tb_kelas.id_kelas WHERE keterangan = 'NIHIL' ");
$no = 1;


$batas = 50;
$jumlah_data = mysqli_num_rows($query);
$total_halaman = ceil($jumlah_data / $batas);
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$halaman_awal = ($batas * $halaman) - $batas;

?>

<body class="sb-nav-fixed">


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include 'sidebar.php'; ?>
        </div>



        <div id="layoutSidenav_content">
            <main>
                <div class="row-1">
                    <center>
                        <h5><b>ABSENSI SISWA</b></h5>
                    </center>
                </div>
                <br><br>

                <!-- <a href="absen-siswa.php"><img src="assets/img/add.png" alt="" height="20px" width="20px" style="position: absolute; margin-left: 75%; margin-top: -30px;"></a> -->
                <div class="row-2">
                    <div class="container">
                        <table class="table table-data">
                            <thead class="table-head" style="background-color: #0A2D64;">
                                <tr style="color: white; font-size: 15px;">
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">TANGGAL</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $data) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $data['nama_siswa']; ?></td>
                                    <td><?= $data['nama_kelas']; ?></td>
                                    <td><?= $data['keterangan']; ?></td>
                                    <td><?= $data['tanggal']; ?></td>
                                    <td>
                                        <a href="deleteabsensiswa.php?id=<?= ["id"]; ?>" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        </a>

                                        <a href="updateabsen-siswa.php?id= <?= $data["id"]; ?>" class="btn btn-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <br><br><br>
                        <div class="row-1">
                            <center>
                                <h5><b>ABSENSI NIHIL</b></h5>
                            </center>
                            <br>
                            <hr>
                            <br><br>
                        </div>
                        <table class="table table-data">
                            <thead class="table-head" style="background-color: #0A2D64;">
                                <tr style="color: white; font-size: 15px;">
                                    <th scope="col">NO</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">TANGGAL</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query2 as $data) : ?>
                                <tr>
                                    <th scope="row"><?= $no++; ?></th>
                                    <td><?= $data['nama_kelas']; ?></td>
                                    <td><?= $data['keterangan']; ?></td>
                                    <td><?= $data['tanggal']; ?></td>
                                    <td>
                                        <a href="deleteabsensiswa.php?id=<?= ["id"]; ?>" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                </div>

                <br>

                <nav aria-label=" Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if ($halaman > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman - 1; ?>">Previous</a>
                        </li>
                        <?php else : ?>
                        <li class="page-item disabled"><span class="page-link">Previous</span>
                        </li>
                        <?php endif; ?>

                        <?php for ($x = 1; $x <= $total_halaman; $x++) : ?>
                        <?php if ($x == $halaman) : ?>
                        <li class="page-item active" aria-current="page"><a class="page-link"
                                href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
                        <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
                        <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($halaman < $total_halaman) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman + 1; ?>">Next</a></li>
                        <?php else : ?>
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                        <?php endif; ?>
                    </ul>
                </nav>


            </main>

            <br><br>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SMKN 12 JAKARTA 2023</div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>