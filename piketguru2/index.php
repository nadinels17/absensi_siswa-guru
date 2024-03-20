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
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>


<body class="sb-nav-fixed">

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "navbar.php"; ?>
        </div>

        <div id="layoutSidenav_content">
            <main>

                <img src="assets/img/logosmkn12.png" class="logo-dubes" alt="">
                <div class="container">
                    <p class="judul">Selamat Datang Admin!</p>
                    <p class="judul-2">Silahkan Pilih Jadwal!</p>

                    <div class="row baris-1">

                        <div class="col">
                            <?php $senin = mysqli_query($conn, "SELECT * FROM data_guru INNER JOIN kode_hari using(id_hari) WHERE hari = 'senin' "); ?>

                            <div class="card card-hari card-senin">
                                <p class="hari">SENIN</p>
                                <div class="card card-nama-guru">
                                    <?php foreach($senin as $data):?>
                                    <p class="nama-atas"><?=$data["nama"];?></p>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <?php $selasa = mysqli_query($conn, "SELECT * FROM data_guru INNER JOIN kode_hari using(id_hari) WHERE hari = 'selasa' "); ?>
                            <center>
                                <div class="card card-hari">
                                    <p class="hari">SELASA</p>
                                    <div class="card card-nama-guru">
                                        <?php foreach($selasa as $data):?>
                                        <p class="nama-atas"><?=$data["nama"];?></p>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="col">
                            <?php $rabu = mysqli_query($conn, "SELECT * FROM data_guru INNER JOIN kode_hari using(id_hari) WHERE hari = 'rabu' "); ?>
                            <div class="card card-hari card-rabu">
                                <p class="hari">RABU</p>
                                <div class="card card-nama-guru">
                                    <?php foreach($rabu as $data):?>
                                    <p class="nama-atas"><?=$data["nama"];?></p>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col">
                            <?php $kamis = mysqli_query($conn, "SELECT * FROM data_guru INNER JOIN kode_hari using(id_hari) WHERE hari = 'kamis' "); ?>
                            <div class="card card-hari card-kamis">
                                <p class="hari">KAMIS</p>
                                <div class="card card-nama-guru">
                                    <?php foreach($kamis as $data):?>
                                    <p class="nama-atas"><?=$data["nama"];?></p>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <?php $jumat = mysqli_query($conn, "SELECT * FROM data_guru INNER JOIN kode_hari using(id_hari) WHERE hari = 'jumat' "); ?>

                            <div class="card card-hari">
                                <p class="hari">JUMAT</p>
                                <div class="card card-nama-guru">
                                    <?php foreach($jumat as $data):?>
                                    <p class="nama-atas"><?=$data["nama"];?></p>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </main>
            <br><br>

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