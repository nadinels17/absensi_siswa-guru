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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<?php

require "config/connection.php";
$query1 = mysqli_query($conn, "SELECT * FROM regis_admin");
$query3 = mysqli_query($conn, "SELECT * FROM data_siswa");

$batas = 10;
$data = mysqli_query($conn, "SELECT * FROM data_siswa");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$halaman_awal = ($batas * $halaman) - $batas;

$query2 = mysqli_query($conn, "SELECT * FROM data_siswa INNER JOIN kode_kelas ON 
                                                    data_siswa.id_kodekelas = kode_kelas.id_kodekelas 
                                                    INNER JOIN tb_kelas ON data_siswa.id_kelas = tb_kelas.id_kelas LIMIT $halaman_awal, $batas");
$no = 1;

?>

<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>



        <div id="layoutSidenav_content">
            <main>

                <div class="container">
                    <div class="row-1">
                        <!-- <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                                style="margin-top: -30px">
                        </form> -->
                    </div>

                    <br><br>

                    <div class="row-2">
                        <h5><b>DATA SISWA</b></h5>
                        <a href="RegisSiswa.php"><img src="assets/img/add.png" alt="" height="30px" width="30px"
                                style="position: absolute; margin-left: 75%; margin-top: -30px;"></a>
                        <hr size="7" color="black" style="border-radius: 50px;">

                    </div>
                </div>

                <br>

                <div class="row-3">
                    <div class="container">
                        <table class="table">
                            <thead class="table-head" style="background-color: #0A2D64;">
                                <tr style="color: white; font-size: 15px;">
                                    <th scope="col">NO</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">USERNAME</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">KODE</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query2 as $data) : ?>
                                <tr>
                                    <th><?= $no++; ?></th>
                                    <!--untuk nomor-->
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td><?= $data['nama_kelas']; ?></td>
                                    <td><?= $data['kode_kelas']; ?></td>
                                    <td>


                                        <a href="updateSiswa.php?id=<?=$data['id'];?>" type="button"
                                            class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>

                                        <a href="deletesiswa.php?id=<?=$data['id'];?>" type="button"
                                            class="btn btn-danger alert_hapus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
                                            </svg>
                                        </a>

                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if ($halaman > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman - 1; ?>">Previous</a>
                        </li>
                        <?php else : ?>
                        <li class="page-item disabled"><span class="page-link">Previous</span></li>
                        <?php endif; ?>

                        <?php for ($x = 1; $x <= $total_halaman; $x++) : ?>
                        <?php if ($x == $halaman) : ?>
                        <li class="page-item active" aria-current="page"><a class="page-link"
                                href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
                        <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $x; ?>"><?= $x; ?></a></li>
                        <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($halaman < $total_halaman) : ?>
                        <li class="page-item"><a class="page-link" href="?halaman=<?= $halaman + 1; ?>">Next</a></li>
                        <?php else : ?>
                        <li class="page-item disabled"><span class="page-link">Next</span></li>
                        <?php endif; ?>
                    </ul>
                </nav>

            </main>


            <br><br>


            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; SMKN 12 JAKARTA 2023</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
    $('.alert_hapus').on('click', function() {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Yakin ingin menghapus akun ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Hapus akun',
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
    <script>
    function berhasilUpload() {
        if ('<?= isset($_SESSION['upload_siswa'])&& $_SESSION['upload_siswa']===true; ?>') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    <?php unset($_SESSION['upload_siswa']);?>
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Akun berhasil Didaftarkan!'
            })
        }
    }
    </script>
    <script>
    function berhasilUpdate() {
        if ('<?= isset($_SESSION['berhasil_update'])&& $_SESSION['berhasil_update']===true; ?>') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    <?php unset($_SESSION['berhasil_update']);?>
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Akun berhasil Diedit!'
            })
        }
    }
    </script>
    <script>
    function berhasilHapus() {
        if ('<?= isset($_SESSION['hapus_siswa'])&& $_SESSION['hapus_siswa']===true; ?>') {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    <?php unset($_SESSION['hapus_siswa']);?>
                }
            })

            Toast.fire({
                icon: 'success',
                title: 'Akun berhasil Diedit!'
            })
        }
    }
    </script>


    <script>
    $(document).ready(function() {
        berhasilHapus();
    });
    </script>
    <script>
    $(document).ready(function() {
        berhasilUpdate();
    });
    </script>
    <script>
    $(document).ready(function() {
        berhasilUpload();
    });
    </script>
</body>

</html>