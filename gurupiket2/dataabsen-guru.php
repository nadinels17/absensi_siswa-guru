

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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet" />
</head>



<?php

require "config/connection.php";
require "config/function.php";
$query = mysqli_query($conn, "SELECT * FROM absensi_guru INNER JOIN data_guru ON absensi_guru.nip = data_guru.nip");
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
                <?php
                $no = 1;
                ?>
                <div class="row-1">
                    <center>
                        <h5><b>ABSENSI GURU</b></h5>
                    </center>
                </div>
                <br><br>
                <!-- PHP TANGGAL -->
                    <?php 
                        
                        $tanggal_numerik = date("Y/m/d");
                    ?>
                <a href="absen-guru.php"><img src="../gurupiket2/assets/img/add.png" alt="" height="20px" width="20px" style="position: absolute; margin-left: 75%; margin-top: -30px;"></a>
                <p style="margin-left: 90%; font-size: 17px;"><?=$tanggal_numerik;?></p>
                <div class="row-2">
                    <div class="container">
                        <table class="table table-data">
                            <thead class="table-head" style="background-color: #0A2D64;">
                                <tr style="color: white; font-size: 15px;">
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">KETERANGAN</th>
                                    <th scope="col">TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($query as $data) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['nip']; ?></td>
                                <td><?= $data['keterangan']; ?></td>
                                <td><?= $data['tanggal']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if ($halaman > 1) : ?>
                            <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman - 1; ?>">Previous</a></li>
                        <?php else : ?>
                            <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        <?php endif; ?>

                        <?php for ($x = 1; $x <= $total_halaman; $x++) : ?>
                            <?php if ($x == $halaman) : ?>
                                <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>