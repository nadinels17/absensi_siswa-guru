<?php
 
$no = 1;

$bulan = array(
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
);

$tanggal = date('d');
$bulan_sekarang = $bulan[intval(date('m')) - 1]; // Mengambil nama bulan dari array sesuai dengan bulan saat ini
$tahun = date('Y');

$hari = array(
    'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'
);

$hari_sekarang = $hari[intval(date('w'))]; // Mengambil nama hari dari array sesuai dengan hari saat ini

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Admin</title>
    <link rel="icon" href="assets/img/logosmkn12.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="css/style.css" rel="stylesheet" />

</head>

<?php
require "config/connection.php";
require "config/function.php";
$query3 = mysqli_query($conn, "SELECT * FROM absensi_murid INNER JOIN tb_kelas using(id_kelas) INNER JOIN siswa_smkn12 using(id_siswa)");   

if (isset($_POST["search"])) {
    $tanggal_awal=$_POST["tanggal_awal"];
    $tanggal_akhir=$_POST["tanggal_akhir"];

    $query2 = mysqli_query($conn, "SELECT * FROM absensi_murid JOIN tb_kelas ON absensi_murid.id_kelas =
                                                                        tb_kelas.id_kelas JOIN siswa_smkn12 ON 
                                                                        absensi_murid.id_siswa = siswa_smkn12.id_siswa WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");

}
?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>

        <!--ISI CONTENT-->
        <div id="layoutSidenav_content">

            <main>

                <h3 class="input-absensiswa text-center" style="margin-left: -8%;"><a href="absensi_guru.php"
                        class="text-dark"><i class="bi bi-caret-left me-5"></i></a>ABSENSI SISWA</h3>

                <div class="container">
                    <div class="row-1 mt-5">
                        <form class="d-flex" method="post" action="absensi_siswa.php">
                            <input name="tanggal_awal" class="form-control me-2 absenserch" type="date"
                                aria-label="Search" placeholder="input tanggal">
                            <input name="tanggal_akhir" class="form-control me-2 absenserch" type="date"
                                aria-label="Search" placeholder="input tanggal">

                            <button type="submit" name="search" class="btn btn-primary"
                                style="margin-top: 20px; height:40px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>
                        </form>

                        <a href="excelabsensiswa.php" class="btn btn-danger excelsiswa">EXPORT TO EXCEL</a>
                    </div>

                    <div class="row mt-4">
                        <!-- DATE -->
                        <div class="date">
                            <div class="text-end">
                                <p><span><?= $hari_sekarang ?></span>, <?= $tanggal ?> <?= $bulan_sekarang ?>
                                    <?= $tahun ?></p>
                            </div>
                        </div>

                        <!-- table siswa -->
                        <div class="table-responsive">
                            <table class="table" id="table_absensi_siswa">
                                <thead class="table" style="background-color: #0A2D64; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query3 as $data) : ?>
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
                        </div>
                        <!-- end table siswa -->
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>




</body>

</html>