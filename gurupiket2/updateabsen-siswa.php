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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php
require "config/connection.php";
require "config/function.php";

if (isset($_POST['input'])) {

    if (upAbsenSiswa($_POST) > 0) {
        echo "
            <script>
              alert('Data Absen Terupdate')
              document.location.href = 'dataabsen-siswa.php'
            </script>";
    } else {
        echo "
            <script>
                alert('Data Absen Tidak Terupdate')
                document.location.href = 'absen-siswa.php'
            </script>";
    }
}
$id = $_GET["id"];
$absen = mysqli_query($conn, "SELECT * FROM absensi_murid JOIN tb_kelas ON absensi_murid.id_kelas = tb_kelas.id_kelas
                                                INNER JOIN siswa_smkn12 ON absensi_murid.id_siswa = siswa_smkn12.id_siswa WHERE id = '$id' ")
?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include 'sidebar.php'; ?>
        </div>

        <!--ISI CONTENT-->
        <div id="layoutSidenav_content">

            <main>

                <img class="logo-smkn12" src="../user/assets/img/LOGO DUBES.png" alt="">

                <h3 class="input-absensiswa">ABSEN SISWA</h3>
                <hr class="garis-siswa">

                <div class="formabsen">
                    <?php foreach($absen as $siswa):?>
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="hidden" value="<?=$siswa["id_siswa"];?>" class=" form-control inputt"
                                id="namamurid" name="nama" placeholder="Masukkan Nama">
                        </div>

                        <!-- form group untuk kejuruan -->
                        <select type="hidden" class="form-select inputt" name="kelas" id="kelas"
                            aria-label="Default select example" style="margin-left:10px; margin-top:10px;">
                            <option value="-" class="text-muted">Pilih Kelas</option>
                            <?php
                                                $qry = mysqli_query($conn, "SELECT id_kelas FROM absensi_murid") or die(mysqli_error($conn));
                                                while ($kelas = mysqli_fetch_array($qry)) {
                                            ?>
                            <option value="<?= $siswa['id_kelas']; ?>"
                                <?= $kelas['id_kelas'] == $siswa['id_kelas'] ? "selected":''; ?>>
                                <?= $siswa['nama_kelas']; ?></option>
                            <?php
                                                }
                                            ?>
                        </select>

                        <div class="mb-3">
                            <input type="datetime-local" value="<?=$siswa["tanggal"];?>" class="form-control inputt"
                                id="hari-tanggal" name="hari-tanggal">
                        </div>

                        <select name="keterangan" class="form-select inputt" aria-label="Default select example">
                            <option selected disabled hidden>Keterangan</option>
                            <?php
                                                $qry = mysqli_query($conn, "SELECT keterangan FROM absensi_murid") or die(mysqli_error($conn));
                                                while ($kelas = mysqli_fetch_array($qry)) {
                                            ?>
                            <option value="<?= $siswa['keterangan']; ?>"
                                <?= $kelas['keterangan'] == $siswa['keterangan'] ? "selected":''; ?>>
                                <?= $siswa['keterangan']; ?></option>
                            <?php
                                                }
                                            ?>
                        </select>

                        <br><br>

                        <button type="submit" name="input" class="btn color-button">Submit</button>
                    </form>
                    <?php endforeach;?>
                </div>

            </main>

            <footer class=" py-4 bg-light mt-auto">
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