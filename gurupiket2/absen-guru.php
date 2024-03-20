<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>GURU PIKET</title>
    <script src="js/ajax.js"></script>
    <link rel="icon" href="assets/img/LOGODUBES.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php
require "config/connection.php";
require "config/function.php";


if (isset($_POST['input'])) {
    // $nama = $_POST["nama"];
    $nip = $_POST["nip"];
    $date = $_POST["hari-tanggal"];
    $ket = $_POST["keterangan"];

    if (empty($nip)){
        echo "
        <script>
          alert('Kolom NIP Belum Terisi')
          document.location.href = 'absen-guru.php'
        </script>";
    }
    elseif (empty($date)){
        echo "
        <script>
          alert('Kolom Hari-Tanggal Belum Terisi')
          document.location.href = 'absen-guru.php'
        </script>";
    }
    elseif (empty($ket)){
        echo "
        <script>
          alert('Kolom Keterangan Belum Terisi')
          document.location.href = 'absen-guru.php'
        </script>";
    }
    elseif (absenGuru($_POST) > 0) {
        echo "
            <script>
              alert('Data Absen Terkirim')
              document.location.href = 'dataabsen-guru.php'
            </script>";
    }
    
    else {
        echo "
            <script>
                alert('Data Absen Tidak Terkirim')
                document.location.href = 'absen-guru.php'
            </script>";
    }
}

$data_guru = $conn->query("SELECT * FROM data_guru");

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

                <h3 class="input-absensiswa">ABSEN GURU</h3>
                <hr class="garis-siswa">

                <div class="formabsen">
                    <form action="" method="post">
                        <!-- PILIH NIP -->
                        <select id="nip" class="form-select inputt" aria-label="Default select example" name="nip">
                            <option selected>Pilih Nama</option>
                            <?php
                                $qry = mysqli_query($conn, "SELECT * FROM data_guru") or die(mysqli_error($conn));
                                while ($data = mysqli_fetch_array($qry)) {
                            ?>
                                <option value="<?= $data['nip']; ?>"><?= $data['nama']; ?></option>
                            <?php } ?>
                         </select>

                        <br>
                        <!-- PILIH NAMA -->
                        <!-- <select id="nama_guru" class="form-select inputt"  name="nama">
                            <option value="">Pilih Nama Guru</option>

                        </select>

                        <br> -->

                        <!-- PILIH KETERANGAN -->
                        <select name="keterangan" class="form-select inputt" aria-label="Default select example">
                            <option selected disabled hidden>Keterangan</option>
                            <option value="sakit">Sakit</option>
                            <option value="izin">Izin</option>
                            <option value="alfa">Alfa</option>
                        </select>

                        <br>

                        <div class="mb-3">
                            <input type="date" class="form-control inputt" id="hari-tanggal" name="hari-tanggal">
                        </div>

                        <br><br>

                        <button name="input" type="submit" class="btn color-button">Submit</button>
                    </form>
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

    <script src="../piketketulas/js/bootstrap.js"></script>

    <script>
        // $("#nip").change(function() {
        //     // value nip
        //     const nip = $("#nip").val();

        //     // hapus attribute disable
        //     $("#nama_guru").removeAttr("disabled")
            
        //     // mengirim value dan menerima data
        //     $.ajax({
        //         type: "POST",
        //         dataType: "html",
        //         url: "./dataabsen-guru.php",
        //         data: "NIP=" + nip,
        //         success: function(data) {
        //             $("#nama_guru").html(data);
        //         }
        //     });
        // });
    </script>


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