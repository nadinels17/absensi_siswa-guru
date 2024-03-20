<?php
session_start();

if(!isset($_SESSION["login"])){

    $_SESSION['harap_login']=true;
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
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

    .btn:hover {
        background-color: #0A2D64;
        color: white;
    }

    .btn {
        display: flex;
        justify-content: center;
        font-family: 'Poppins';
        font-style: normal;
        font-weight: 600;
        font-weight: bolder;
        margin: auto;
        width: 200px;
        border-radius: 8px;
        margin-top: 5%;
        border-color: #0A2D64;
        margin-left: 440px;

    }

    h1 {
        text-align: center;
        font-size: 18;
    }



    form {

        height: 45px;
        width: 50%;
        left: 42%;
        top: 23%;
    }

    input {
        margin: 10px;
    }


    .container {

        margin-left: 260px;
        align-items: center;
        font-family: 'Poppins';
        font-style: normal;
        margin-top: 50px;

    }

    input[type="file"]::-webkit-file-upload-button {
        background-color: #0A2D64;
        color: white;
    }

    span.psw {
        float: right;
        padding-top: 0;
        padding-right: 15px;
    }

    /* Change styles for span on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
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

            if (updataguru($_POST) > 0) {
                echo "
              <script>
              document.location.href = 'data-guru.php';
              </script>
              ";
            } else {

                echo "
              <script>
              alert('DATA GAGAL DI EDIT!!');
              document.location.href = 'update-guru.php';
                  </script>
            ";
            }
        }


        ?>

        <div id="layoutSidenav_content">

            <main>

                <?php
            global $conn;
            $id = $_GET['id'];
            $query2 = mysqli_query($conn, "SELECT * FROM data_guru INNER JOIN kode_hari ON data_guru.id_hari = kode_hari.id_hari JOIN tb_kejuruan ON 
                                                                                data_guru.id_kejuruan= tb_kejuruan.id_kejuruan WHERE id = '$id'");
            ?>

                <?php foreach ($query2 as $data) : ?>

                <H2 style="margin-left: 420px;">Update Guru Piket</H2>
                <form action="" method="POST" style="margin-bottom: 500px;" enctype="multipart/form-data">
                    <div class="formcontainer">
                        <div class="container">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $data["id"]; ?>">
                                <input type="hidden" name="foto_lama" value="<?= $data["foto"]; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                    value="<?= $data["nama"]; ?>">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" id="nip" name="nip" placeholder="NIP"
                                    value="<?= $data["nip"]; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email"
                                    value="<?= $data["email"]; ?>">
                            </div>
                            <div class="form-group ms-2">
                                <select class="form-select" id="gurukejuru" name="gurukejuru"
                                    aria-label="Default select example">
                                    <?php
                            $qry = mysqli_query($conn, "SELECT * FROM tb_kejuruan") or die(mysqli_error($conn));
                            while ($jurusan = mysqli_fetch_array($qry)) {
                            ?>
                                    <option value="<?= $jurusan['id_kejuruan']; ?>"
                                        <?= $jurusan['nama_kejuruan'] == $data['nama_kejuruan'] ? 'selected' : '' ?>>
                                        <?= $jurusan['nama_kejuruan']; ?>
                                    </option>
                                    <?php
                            }
                            ?>
                                </select>
                            </div>
                            <!-- form group untuk hari -->
                            <select class="form-select" name="kode_hari" id="kode_hari"
                                aria-label="Default select example" style="margin-left:10px; margin-top:10px;">
                                <?php                       
                                    $qry = mysqli_query($conn, "SELECT * FROM kode_hari") or die(mysqli_error($conn)); {
                                    ?>
                                <option value="<?= $data['id_hari']; ?>"><?= $data['hari']; ?></option>
                                <?php
                                    }
                                ?>
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
                                <input type="file" class="form-control" id="file" accept="image/*" name="fileBaru">
                                <input type="hidden" class="form-control" id="file" name="fileLama">
                            </div>
                            <img src="assets/imgregis-guru/<?= $data["foto"]; ?>" width="100px">
                        </div>
                        <button name="submit" type="submit" class="btn">Update!</button>
                    </div>
                </form>
                <?php endforeach; ?>
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