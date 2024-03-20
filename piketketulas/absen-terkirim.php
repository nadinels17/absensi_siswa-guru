<?php session_start(); ?>
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
            <?=$_SESSION["kelas"];?>
        </a>

        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item" href="#">Kode Kelas= <?=$_SESSION["kode"];?></a></li>
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
                    sediakan. <br><br>
                    3. Klik dropdown jika ada yang tidak hadir, klik angka sesuai dengan jumlah murid yang tidak hadi.
                    <br><br>
                    4. Jika lupa mengisi absen di hari sebelumnya, maka klik “Absensi Sebelumnya” di nama kelas kamu.
                    <br><br>
                </div>
            </div>
        </div>
    </div>

    <br><br>
    <center>

        <div class="div_image_v">
            <div class="image">
                <svg class="icon-v" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </g>
                </svg>
            </div>
        </div>


        <br>
        <div class="card" style="width: 18rem; box-shadow: 1px wheat ">
            <div class="card-body">
                <h6>ABSEN BERHASIL TERKIRIM!</h6>
                <p>Terima kasih sudah <br> mengisi absen hari ini!</p>

            </div>
        </div>
        <br>

        <a href="absensi-kehadiran.php" class="btn btn-primary kirim"> <span class="btn-text">Selesai</span> </a>



    </center>

    <svg class="gelombang" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#0A2D64" fill-opacity="1"
            d="M0,0L60,48C120,96,240,192,360,213.3C480,235,600,181,720,149.3C840,117,960,107,1080,122.7C1200,139,1320,181,1380,
    202.7L1440,224L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path>
    </svg>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>