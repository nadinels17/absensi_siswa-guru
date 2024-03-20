<?php
session_start();

if (!isset($_SESSION["login"])) {

    $_SESSION['harap_login'] = true;
    header('location: login_admin.php');
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
    <title>Dashboard - Admin</title>
    <link rel="icon" href="assets/img/logosmkn12.png">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
    #h2c {
        display: flex;
        justify-content: center;
        margin-bottom: 8%;


    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #img2 {
        position: absolute;
        width: 110px;
        height: 102px;
        margin-right: 3%;
        top: 0;
        right: 0;

    }

    form {
        width: 400px;
    }

    input {
        margin: 10px;
    }

    .btn-primariy:hover {
        background-color: #0f4398;
    }

    .btn {
        display: flex;
        justify-content: center;
        background-color: #0A2D64;
        color: white;
    }

    button {
        width: 250px;
        margin: auto;
        color: white;
        transition: 0.5s;
    }

    .fa-eye {
        position: absolute;
        top: 45%;
        right: 27%;
        cursor: pointer;
    }

    #password-toggle {
        position: absolute;
        top: 51%;
        right: 25%;
        background-color: transparent;
        background: none;
        width: 44px;

    }
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php
require "config/connection.php";
$query1 = mysqli_query($conn, "SELECT * FROM regis_admin");
?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <?php foreach ($query1 as $data) : ?>
                        <a href="profil-admin.php" class="link-profile"> <img class="profile-user rounded-circle"
                                src="assets/img/logosmkn12.png" alt="">
                            <h6 style="text-transform: capitalize;" class="name-user"><?= $data['nama']; ?></h6>
                            <hr class="hr-user">
                        </a>
                        <?php endforeach; ?>


                        <a class="nav-link dasboard-user" href="index.php">
                            <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16">
                                    <path
                                        d="M7.462 0H0v7.19h7.462V0zM16 0H8.538v7.19H16V0zM7.462 8.211H0V16h7.462V8.211zm8.538 0H8.538V16H16V8.211z" />
                                </svg></div>
                            DASHBOARD
                        </a>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            ABSENSI
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                <a class="nav-link" href="absensi_guru.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;">ABSENSI GURU</span></a>
                                <br>
                                <a class="nav-link" style="margin-top: -35px;" href="absensi_siswa.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;"> ABSENSI SISWA</span></a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            DATA
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                <a class="nav-link" href="data-guru.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;">DATA GURU</span></a>
                                <br>
                                <a class="nav-link" style="margin-top: -35px;" href="data-siswa.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;"> DATA SISWA</span></a>
                            </nav>
                        </div>

                    </div>
                </div>
            </nav>
        </div>

        <?php

        require "config/function.php";

        if (isset($_POST["submit"])) {

            if (updatasiswa($_POST) > 0) {
                $_SESSION["berhasil_update"] = true;
                echo "
              <script>
              document.location.href = 'data-siswa.php';
              </script>
              ";
            } else {
                echo "
              <script>
                alert('DATA GAGAL DI EDIT!!');
                document.location.href = 'data-siswa.php';
              </script>
            ";
            }
        }


        ?>


        <div id="layoutSidenav_content">

            <?php
            global $conn;

            $id = $_GET["id"];


            $query2 = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN kode_kelas ON 
                                                                    data_siswa.id_kodekelas = kode_kelas.id_kodekelas 
                                                                    INNER JOIN tb_kelas ON data_siswa.id_kelas = tb_kelas.id_kelas WHERE id = '$id'");

            ?>

            <?php foreach ($query2 as $data) : ?>

            <img id="img2" src="assets/img/logosmkn12.png" alt="" srcset="">
            <h2 id="h2c">Update Siswa</h2>
            <div class="container">
                <form action="" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Siswa"
                            value="<?= $data["nama"]; ?>">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder=" NIS"
                            value="<?= $data["username"]; ?>">
                    </div>



                    <select class="form-select" name="kelas" id="" aria-label="Default select example"
                        style="margin-left:10px;">
                        <option value="<?= $data['id_kelas']; ?>"><?= $data['nama_kelas']; ?></option>
                        <?php
                            $qry = mysqli_query($conn, "SELECT * FROM tb_kelas") or die(mysqli_error($conn));
                            while ($kelas = mysqli_fetch_array($qry)) {
                            ?>
                        <option value="<?= $kelas['id_kelas']; ?>"><?= $kelas['nama_kelas']; ?></option>
                        <?php
                            }
                            ?>
                    </select>

                    <br>
                    <select class="form-select" name="id_kodekelas" id="id_kodekelas"
                        aria-label="Default select example" style="margin-left:10px;">
                        <?php
                            $qry = mysqli_query($conn, "SELECT * FROM kode_kelas") or die(mysqli_error($conn));
                            while ($kode = mysqli_fetch_array($qry)) {
                            ?>
                        <option value="<?= $kode['id_kodekelas']; ?>"
                            <?= $kode['kode_kelas'] == $data['kode_kelas'] ? 'selected' : '' ?>>
                            <?= $kode['kode_kelas']; ?>
                        </option>
                        <?php
                            }
                            ?>
                    </select>
                    <button name="submit" type="submit" class="btn btn-primary mt-2">Update</button>
                </form>
            </div>
            <?php endforeach; ?>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="justify-content-between small">
                        <div class="text-muted">
                            <center>Copyright &copy; SMKN 12 JAKARTA 2023</center>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="us.js"></script>
</body>

</html>