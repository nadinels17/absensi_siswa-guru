<?php
session_start();

if (!isset($_SESSION["submit"])) {

    $_SESSION['harap_login'] = true;
    header('location: login-absensi.php');
}

// $nama = $_SESSION['nama'];
// $query2 = mysqli_query($conn, "SELECT * FROM data_guru WHERE nama = '$nama'");
?>

<!doctype html>
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

<body>

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">

            <div class="nav">
                <img class="profile-user rounded-circle"
                    src="../piketguru2/assets/imgregis-guru/<?=$_SESSION['foto'];?>">
                <h6 class="mt-4 text-center"><?= $_SESSION['nama']; ?></h6>
                <p class="text-center"><?= $_SESSION['nip']; ?></p>

                <hr class="hr-user">



                <a class="nav-link dasboard-user" href="index.php">
                    <div class="sb-nav-link-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16">
                            <path
                                d="M7.462 0H0v7.19h7.462V0zM16 0H8.538v7.19H16V0zM7.462 8.211H0V16h7.462V8.211zm8.538 0H8.538V16H16V8.211z" />
                        </svg></div>
                    DASHBOARD
                </a>


                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    ABSENSI
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>

                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="dataabsen-guru.php">
                            <svg style="margin-top:-15px" xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p style="margin-left: 10px;"> ABSENSI GURU</p>
                        </a>
                        <br>
                        <a class="nav-link" href="dataabsen-siswa.php">
                            <svg style="color: white; margin-top:-80px;" xmlns="http://www.w3.org/2000/svg" width="14"
                                height="14" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                <circle cx="8" cy="8" r="8" />
                            </svg>
                            <p style="margin-left: 10px; margin-top: -65px;"> ABSENSI SISWA</p>
                        </a>
                    </nav>
                </div>
                <a class="log-out" href="logout.php">
                    <svg class="logout-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path
                            d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                    </svg>
                    <h6>Logout</h6>
                </a>
            </div>
        </div>
    </nav>





</body>

</html>