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
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

</head>

<?php

require "config/connection.php";
require "config/function.php";

$no = 1;

if (isset($_POST["search"])) {
    $tanggal_awal=$_POST["tanggal_awal"];
    $tanggal_akhir=$_POST["tanggal_akhir"];

    // Ubah format tanggal_awal
    $dateTimeAwal = new DateTime($tanggal_awal);
    $tanggal_awal_formatted = $dateTimeAwal->format("Y/m/d");

    // Ubah format tanggal_akhir
    $dateTimeAkhir = new DateTime($tanggal_akhir);
    $tanggal_akhir_formatted = $dateTimeAkhir->format("Y/m/d");

    $query = mysqli_query($conn, "SELECT * FROM absensi_guru INNER JOIN data_guru ON absensi_guru.nip = data_guru.nip WHERE tanggal BETWEEN '$tanggal_awal_formatted' AND '$tanggal_akhir_formatted'");

}

$query1 = mysqli_query($conn, "SELECT * FROM absensi_guru INNER JOIN data_guru ON absensi_guru.nip = data_guru.nip");

?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>

        <!--ISI CONTENT-->
        <div id="layoutSidenav_content">

            <main>

                <h3 class="input-absensiswa text-center"> ABSENSI GURU <a href="absensi_siswa.php" class="text-dark"><i
                            class="bi bi-caret-right ms-5"></i></a></h3>

                <div class="container">

                    <div class="row-1 mt-5">
                        <form class="d-flex" method="post" action="absensi_guru.php">

                            <input name="tanggal_awal" class="form-control me-2" type="date" aria-label="Search"
                                style="margin-top: 20px; margin-left:20px; color:black;" placeholder="input tanggal">
                            <input name="tanggal_akhir" class="form-control me-2" type="date" aria-label="Search"
                                style="margin-top: 20px; color:black;" placeholder="input tanggal">


                            <button type="submit" name="search" class="btn btn-primary"
                                style="margin-top: 20px; height:40px;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-search" viewBox="0 0 16 16">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg>
                            </button>

                            <a href="excelabsenguru.php" name="export" class="btn btn-danger excel">EXPORT TO EXCEL</a>
                        </form>
                    </div>

                    <div class="row mt-4">
                        <!-- DATE -->
                        <div class="date">
                            <div class="text-end">
                                <p><span><?= $hari_sekarang ?></span>, <?= $tanggal ?> <?= $bulan_sekarang ?>
                                    <?= $tahun ?></p>
                            </div>
                        </div>

                        <!-- table guru -->
                        <div class="table-responsive ">
                            <table class="table" id="table_absensi_guru">
                                <thead class="table" style="background-color: #0A2D64; color: white;">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIP</th>
                                        <th>Keterangan</th>
                                        <th>Hari/Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($query1 as $data) : ?>
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
                        </div>
                        <!-- end table guru -->
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
</body>

</html>