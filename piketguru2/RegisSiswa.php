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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    footer {
        position: absolute;
        bottom: 0;
        margin-left: 40rem;
    }

    #h11 {
        display: flex;
        justify-content: center;
        margin-top: 8%;
        margin-bottom: 5%;
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-size: 25px;

    }

    .container {
        margin-top: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Poppins';
        font-style: normal;
    }
    </style>
</head>

<?php
require "config/connection.php";
require "config/function.php";

$query = mysqli_query($conn, "SELECT * FROM regis_admin");

if (isset($_POST['input'])) {

    if (regisSiswa($_POST) > 0) {
        $_SESSION['upload_siswa']=true;
        echo "
            <script>
              document.location.href = 'data-siswa.php'
            </script>";
    } else {
        echo "
            <script>
                alert('Siswa tidak terdaftarkan')
                document.location.href = 'RegisSiswa.php'
            </script>";
    }
}
?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>
    </div>



    <div id="layoutSidenav_content mb-5 ms-5">
        <img id="img2" src="assets/img/logosmkn12.png" alt="" srcset="">
        <h1 id="h11">REGISTRASI SISWA</h1>
        <div class="container container-form">
            <form class="form-regissiswa" action="" method="post">
                <!-- form group untuk nama -->
                <div class="form-group">
                    <input type="text" class="form-control input-siswa" id="nama" name="nama" placeholder="Nama Siswa"
                        required>
                </div>
                <!-- form group untuk nis -->
                <div class="form-group">
                    <input type="text" class="form-control input-siswa" id="username" name="username"
                        placeholder="username" required>
                </div>

                <!-- form group untuk kode kelas -->
                <select class="form-select" name="kode_kelas" id="pangkat" aria-label="Default select example"
                    style="margin-left:10px;">
                    <option value="-" class="text-muted">Pilih Kode Kelas</option>
                    <?php
                            $qry = mysqli_query($conn, "SELECT * FROM kode_kelas") or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($qry)) {
                        ?>
                    <option value="<?= $data['id_kodekelas']; ?>"><?= $data['kode_kelas']; ?></option>
                    <?php
                            }
                        ?>
                </select>

                <br>

                <!-- form group untuk kelas -->
                <select class="form-select" name="nama_kelas" id="pangkat" aria-label="Default select example"
                    style="margin-left:10px;">
                    <option value="-" class="text-muted">Pilih Kelas</option>
                    <?php
                            $qry = mysqli_query($conn, "SELECT * FROM tb_kelas ORDER BY nama_kelas ASC") or die(mysqli_error($conn));
                            while ($data = mysqli_fetch_array($qry)) {
                        ?>
                    <option value="<?= $data['id_kelas']; ?>"><?= $data['nama_kelas']; ?></option>
                    <?php
                            }
                        ?>
                </select>
                <!-- button submit -->
                <button type="submit" class="btn btn-siswa" name="input">Submit</button>
            </form>
        </div>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="justify-content-between small">
                    <div class="text-muted">
                        <center>Copyright &copy; SMKN 12 JAKARTA 2023</center>
                    </div>
                </div>
            </div>
        </footer>
        <script>
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
        </script>
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