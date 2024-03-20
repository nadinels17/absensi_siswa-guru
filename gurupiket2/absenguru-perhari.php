<?php
session_start();

if (!isset($_SESSION["submit"])) {

    $_SESSION['harap_login'] = true;
    header('location: login-absensi.php');
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GURU PIKET</title>
    <link rel="icon" href="assets/img/dubes.jpg">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php

require "../piketguru/config/connection.php";
$query = mysqli_query($conn, "SELECT * FROM absensi_guru");
$no = 1;

?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">

                    <div class="nav">

                        <img class="profile-user rounded-circle" src="../user/assets/img/jennie.jfif" alt="">
                        <h6 class="name-user"> Irwan Saputra</h6>
                        <p class="nip-user">NIP : </p>
                        <hr class="hr-user">


                        <a class="nav-link dasboard-user" href="index.php">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16">
                                    <path d="M7.462 0H0v7.19h7.462V0zM16 0H8.538v7.19H16V0zM7.462 8.211H0V16h7.462V8.211zm8.538 0H8.538V16H16V8.211z" />
                                </svg></div>
                            DASHBOARD
                        </a>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            ABSENSI
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="dataabsen-guru.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;">ABSENSI GURU</span></a>
                                <br>
                                <a class="nav-link" style="margin-top: -35px;" href="dataabsen-siswa.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;"> ABSENSI SISWA</span></a>
                            </nav>
                        </div>

                    </div>
                </div>

            </nav>
        </div>

        <!--ISI CONTENT-->
        <div id="layoutSidenav_content">

            <main>

                <img class="logo-smkn12" src="../user/assets/img/LOGO DUBES.png" alt="">

                <h3 class="input-absensiswa"><b>ABSENSI GURU TERBARU</b></h3>
                <hr class="garis-siswa">
                <br>

                <div class="tabel">

                    <table class="table table-hover">

                        <thead class="head-table">
                            <tr>
                                <th scope="col">Hari/Tanggal</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="body-table">
                        <?php foreach ($query as $data) : ?>
                            <tr>
                                <th scope="row"><?= $data['hari-tanggal']; ?></th>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['nip']; ?></td>
                                <td><?= $data['keterangan']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>

                    </table>

                    <br>



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