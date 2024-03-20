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
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');


    body {
        overflow-x: hidden;

    }

    input[type="file"]::-webkit-file-upload-button {
        background-color: #0A2D64;
        color: white;
    }


    .container {
        margin-top: -100px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins';
        font-style: normal;

    }
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<!-- PHP Memasukan data Guru ke web -->
<?php
require "config/connection.php";
require "config/function.php";

$query = mysqli_query($conn, "SELECT * FROM regis_admin");

if (isset($_POST['input'])) {

    if (regisGuru($_POST) > 0) {
        $_SESSION['kode_hari']= $_POST['kode_hari'];
        echo "
            <script>
              document.location.href = 'data-guru.php'
            </script>";
    } else {
        $_SESSION['guru_gagal']=true;
        echo "
            <script>
                document.location.href = 'registrasi-guru.php'
            </script>";
    }
}
?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>

        </div>

        <!-- Side Nav Konten -->
        <div id="layoutSidenav_content">
            <h2 class="h2-regisguru">
                <b>
                    <center>REGISTER GURU</center>
                </b>
            </h2>

            <div class="container container-form" style="margin-top:10px;">
                <img id="img3" src="assets/img/logosmkn12.png" alt="">

                <!-- Form Data Guru -->
                <form action="" class="form-regisguru mx-auto" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control input-dataguru" id="nama" name="nama"
                            placeholder="Nama Guru" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control input-dataguru" id="nama" name="nip"
                            placeholder="Masukkan Nip" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control input-dataguru" id="email" name="email"
                            placeholder="Email" required>
                    </div>

                    <!-- form group untuk kejuruan -->
                    <select class="form-select" name="nama_kejuruan" id="id_kejuruan"
                        aria-label="Default select example" style="margin-left:10px; margin-top:10px;">
                        <option value="-" class="text-muted">Pilih Jurusan</option>
                        <?php
                            $qry = mysqli_query($conn, "SELECT * FROM tb_kejuruan") or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($qry)) {
                        ?>
                        <option value="<?= $data['id_kejuruan']; ?>"><?= $data['nama_kejuruan']; ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <!-- form group untuk hari -->
                    <select class="form-select" name="kode_hari" id="kode_hari" aria-label="Default select example"
                        style="margin-left:10px; margin-top:10px;">
                        <option value="-" class="text-muted">Pilih Hari</option>
                        <?php
                            $qry = mysqli_query($conn, "SELECT * FROM kode_hari") or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($qry)) {
                        ?>
                        <option value="<?= $data['id_hari']; ?>"><?= $data['hari']; ?></option>
                        <?php
                            }
                        ?>
                    </select>

                    <div class="form-group">
                        <input type="file" class="form-control input-dataguru" id="file" name="file" required>
                    </div>

                    <center><button type="submit" class="btn btn-guru " name="input">Submit</button></center>
                </form>
                <!-- END FORM GURU -->
            </div>

            <!-- FOOTER -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="justify-content-between small">
                        <div class="text-muted">
                            <center>Copyright &copy; SMKN 12 JAKARTA 2023</center>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- Script Js eye untuk password -->
            <script>
            console.log("step 1")
            var passwordToggle = document.getElementById("password-toggle");
            var passwordInput = document.getElementById("password");

            passwordToggle.addEventListener("click", function() {
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    passwordToggle.innerHTML = '<i class="fa-solid fa-eye fa-sm"></i>';
                } else {
                    passwordInput.type = "password";
                    passwordToggle.innerHTML = '<i class="fa-solid fa-eye-slash fa-sm"></i>';
                }
            });

            $id = $_GET['id_hari'];
            $queryy = mysqli_query($conn, "SELECT * from kode_hari where id_hari = $id");

            function kodehari() {
                console.log("step func 12")

                if ('<?= isset($_SESSION['input'])&& $_SESSION['input']===true; ?>') {
                    console.log("step 135353")
                    // ($queryy as $data);
                    Swal.fire(
                        'kode hari anda adalah'
                    );
                    <?php unset($_POST['input']);?>

                }
            }
            </script>
            <!-- END SCRIPT JS -->


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function() {
        kodehari();
    });
    </script>
</body>

</html>