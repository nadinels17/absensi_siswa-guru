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
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="css/style.css" rel="stylesheet" />
    
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php
require "config/connection.php";
$query = mysqli_query($conn, "SELECT * FROM regis_admin");
?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <?php foreach ($query as $data) : ?>
                            <a href="profil-admin.php" class="link-profile"> <img class="profile-user rounded-circle" src="assets/img/logosmkn12.png" alt="">
                                <h6 style="text-transform: capitalize;" class="name-user"><?= $data['nama']; ?></h6>
                                <hr class="hr-user">
                            </a>
                    <?php endforeach; ?>


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

                                <a class="nav-link" href="absensi_guru.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;">ABSENSI GURU</span></a>
                                <br>
                                <a class="nav-link" style="margin-top: -35px;" href="absensi_siswa.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;"> ABSENSI SISWA</span></a>
                            </nav>
                        </div>


                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            DATA
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>

                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">

                                <a class="nav-link" href="data-guru.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;">DATA GURU</span></a>
                                <br>
                                <a class="nav-link" style="margin-top: -35px;" href="data-siswa.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                        <circle cx="8" cy="8" r="8" />
                                    </svg> <span style="margin-left: 10px;"> DATA SISWA</span></a>
                            </nav>
                        </div>

                    </div>
                </div>
            </nav>
        </div>
        <div class="h">

            <h1 id="h2-proadmin">Profile Admin</h1>
        </div>
        <img id="img2" src="assets/img/logosmkn12.png" alt="" srcset="">
        <img src="assets/Vector (1).png" alt="" srcset="" style=" margin-left:315px; margin-top: 63px; position: absolute; top: 0; left: 0;" alt="Logo">
        <hr id="hr1" style="border-color: black;">

        <span style="height: 5px; background: black; display: block;"></span>

        <div id="layoutSidenav_content">

            <?php foreach ($query as $data) : ?>
                <div id="cont2" class="container">

                    <div class="row">
                        <div class="col">

                            <div class="container">
                                <table class="table">
                                    <thead class="table-head" style="background-color: #0A2D64;">
                                        <tr style="color: white; font-size: 15px;">
                                            <th colspan="3" align="center">INFORMASI AKUN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Nama: </th>
                                            <td style="text-transform: capitalize;" ><?= $data['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email: </th>
                                            <td><?= $data['email']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
            <?php endforeach; ?>

                    <div id="col2" class="col col d-flex justify-content-center">
                        <div class="container">
                            <img src="assets/img/admin.png" width="50px" alt="" id="profile" class="profile">
                            <a href="config/logout.php" class="btn btn-logout btn-primary alert_logout"><p style="margin-top: 5px;">Log Out</p></a>
                        </div>
                        
                        <script>
                            function preview() {
                                var file = document.getElementById("file").files[0];
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById("profile").src = e.target.result;
                                };
                                reader.readAsDataURL(file);
                            }
                        </script>
                    </div>
                    </div>
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>        
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script>
        $('.alert_logout').on('click', function() {
            var getLink = $(this).attr('href');
            Swal.fire({
                title: "Yakin ingin log out?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'keluar',
                cancelButtonColor: '#3085d6',
                cancelButtonText: "Batal"

            }).then(result => {
                //jika klik ya maka arahkan ke proses.php
                if (result.isConfirmed) {
                    window.location.href = getLink
                }
            })
            return false;
        });
    </script>

</body>

</html>