<?php session_start();

if (!isset($_SESSION["submit"])) {

    "<script>
    alert('HARUS LOGIN DULU!!')
    document.location.href = 'index.php'
  </script>";
}


require 'config/function.php';

// Pastikan variabel kelas sudah didefinisikan dalam sesi sebelum mengaksesnya
if (!isset($_SESSION["id_kelas"])) {
    die("Variabel kelas belum didefinisikan.");
}


$kelas = $_SESSION["id_kelas"];

if (isset($_POST["send"])) {
    if (absenSiswa($_POST) > 0) {
        echo "<script>
    alert('ABSEN BERHASIL DIKIRIM');
    document.location.href = 'absen-terkirim.php'
    </script>";
    } else {
        echo "<script>
    alert('ABSEN TIDAK TERKIRIM');
    document.location.href = 'absensi-kehadiran.php'
    </script>";
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>ABSENSI SISWA</title>
    <link rel="icon" href="assets/img/logosmkn12.png">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="dropdown">
        <a class="dropdown-toggle nama-kelas" style="color:black; text-decoration:none;" href="#" role="button"
            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION["kelas"]; ?>
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Kode Kelas= <?= $_SESSION["kode"]; ?></a></li>
            <li><a class="dropdown-item" href="absen-sebelumnya.php">Absensi Sebelumnya </a></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="info">
        <svg class="i-info" data-bs-toggle="modal" data-bs-target="#exampleModal" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path
                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
        </svg>
        <img class="logo-absen" src="assets/img/logosmkn12.png" alt="">
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Penggunaan :</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    1. Login dengan kode kelas yang telah diberikan. <br><br>
                    2. Jika semua murid dalam kelas hadir, maka berikan keterangan “NIHIL” pada form yang sudah di
                    sediakan.
                    <br><br>
                    3. Klik dropdown jika ada yang tidak hadir, klik tambah sesuai dengan jumlah murid yang tidak hadir.
                    <br><br>
                    4. Jika lupa mengisi absen di hari sebelumnya, maka klik “Absensi Sebelumnya” di nama kelas kamu.
                    <br><br>
                    5. Jika lupa absen dihari sebelumnya, harap lapor ke guru piket<br><br>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <center>

        <!-- PHP TANGGAL -->
        <?php

        $tanggal_numerik = date("Y/m/d");
        ?>

        <h1 class="judul-absen">ABSENSI KEHADIRAN SISWA/I <br> SMKN 12 JAKARTA</h1>
        <div class="card kartu-absen">
            <div class="card-body">
                <b><?= $tanggal_numerik; ?></b>
            </div>
        </div>

        <hr class="hr-absen">

        <!-- FORUM ABSENSI -->
        <form action="" method="POST">
            <div class="baris">
                <h2 class="h2-judul">KETIDAK HADIRAN</h2>
                <button type="button" class="btn btn-outline-success btn-sm tambah-siswa rounded addAbsen mx-2"
                    name="tmbPlgr">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                    </svg>
                </button>
            </div>
            <br><br>

            <div class="d-flex" id="absen1">

                <div class="keterangan">
                    <!-- form group untuk kelas -->
                    <select class="form-select pilih-siswa" name="nama[]" id="siswa" aria-label="Default select example"
                        required>
                        <option value="-" class="text-muted nama-siswa">Pilih Nama Siswa</option>
                        <option class="nama-siswa" value="0">NIHIL</option>
                        <?php
                        $qry = mysqli_query($konek, "SELECT * FROM siswa_smkn12 WHERE id_kelas = '$kelas' ORDER BY nama_siswa ASC ") or die(mysqli_error($konek));
                        while ($data = mysqli_fetch_array($qry)) {
                        ?>
                        <option class="nama-siswa" value="<?= $data['id_siswa']; ?>"><?= $data['nama_siswa']; ?>
                        </option>
                        <?php
                        }
                        ?>
                    </select>

                    <input name="kelas" type="hidden" value="<?= $_SESSION['id_kelas']; ?>">

                    <div class="izin">
                        <select class="form-select pilih-ket" name="keterangan[]" aria-label="Default select example">
                            <option class="keter" selected>Keterangan</option>
                            <option class="keter" value="NIHIL">NIHIL</option>
                            <option class="keter" value="Sakit">Sakit</option>
                            <option class="keter" value="Izin">Izin</option>
                            <option class="keter" value="Alfa">Alfa</option>
                        </select>
                    </div>
                </div>
            </div>

            <button name="send" type="submit" class="btn btn-primary kirim"> <span class="btn-text">Kirim</span>
            </button>
        </form>
    </center>

    <svg class="gelombang" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0A2D64" fill-opacity="1"
            d="M0,0L60,48C120,96,240,192,360,213.3C480,235,600,181,720,149.3C840,117,960,107,1080,122.7C1200,139,1320,181,1380,
    202.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>

    <!-- SCRIPT TAMBAH INPUTAN  -->

    <script src="../js/bootstrap.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        screenWidth();
    });
    let btn = document.querySelector('.addAbsen');
    btn.onclick = function() {
        tambahabsen();
        screenWidth();
        shortString(".short");
    }
    </script>
    <script>
    let indexAbsen = 1

    function tambahabsen() {
        const absen = document.getElementById("absen" + indexAbsen);
        const element = `<div class="d-flex mt-2" id="absen${indexAbsen + 1}">
        
                                  <div class="keterangan">
                                  <!-- form group untuk kelas -->
                                  <select class="form-select pilih-siswa" name="nama[]" id="siswa" aria-label="Default select example" required>
                                    <option value="-" class="text-muted nama-siswa">Pilih Nama Siswa</option>
                                    <?php
                                    $qry = mysqli_query($konek, "SELECT * FROM siswa_smkn12 WHERE id_kelas = '$kelas' ") or die(mysqli_error($konek));
                                    while ($data = mysqli_fetch_array($qry)) {
                                    ?>
                                    <option class="nama-siswa" value="<?= $data['id_siswa']; ?>"><?= $data['nama_siswa']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>

                                  <input name="kelas" type="hidden" value="<?= $_SESSION['id_kelas']; ?>">

                                  <div class="izin">
                                    <select class="form-select pilih-ket" name="keterangan[]" aria-label="Default select example" required>
                                      <option class="keter" selected>Keterangan</option>
                                      <option class="keter" value="Sakit">Sakit</option>
                                      <option class="keter" value="Izin">Izin</option>
                                      <option class="keter" value="Alfa">Alfa</option>
                                    </select>
                                  </div>
                                </div>
                            </div>`
        absen.insertAdjacentHTML('afterend', element);
        indexAbsen++
        screenWidth();
        shortString();
    }
    </script>
    <script>
    function screenWidth() {
        let w = $(window).width();
        if (w > 900) {
            $(".short").attr("data-limit", "70");
        } else if (w > 800 && w <= 900) {
            $(".short").attr("data-limit", "50");
        } else if (w >= 768 && w <= 800) {
            $(".short").attr("data-limit", "48");
        } else if (w > 700 && w <= 767) {
            $(".short").attr("data-limit", "95");
        } else if (w > 650 && w <= 700) {
            $(".short").attr("data-limit", "93");
        } else if (w > 600 && w <= 650) {
            $(".short").attr("data-limit", "90");
        } else if (w <= 600 && w >= 550) {
            $(".short").attr("data-limit", "75");
        } else if (w < 550 && w >= 500) {
            $(".short").attr("data-limit", "65");
        } else if (w < 500 && w >= 450) {
            $(".short").attr("data-limit", "60");
        } else if (w < 450 && w >= 400) {
            $(".short").attr("data-limit", "52");
        } else if (w < 400) {
            $(".short").attr("data-limit", "47");
        }
    }
    </script>
    <script>
    function shortString(selector) {
        const elements = document.querySelectorAll(selector);
        const tail = '...';
        if (elements && elements.length) {
            for (const element of elements) {
                let text = element.innerText;
                if (element.hasAttribute('data-limit')) {
                    if (text.length > element.dataset.limit) {
                        element.innerText = `${text.substring(0, element.dataset.limit - tail.length).trim()}${tail}`;
                    }
                } else {
                    throw Error('Cannot find attribute \'data-limit\'');
                }
            }
        }
    }
    window.onload = function() {
        shortString('.short');
    };
    </script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>