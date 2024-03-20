<?php 
session_start();
require '../piketguru2/config/connection.php';

global $conn;

if(isset($_POST["masuk"])){
  $username = $_POST["username"];
  $pass = $_POST["kode"];

  $qry = mysqli_query($conn, "SELECT * from data_siswa inner join kode_kelas  JOIN tb_kelas ON data_siswa.id_kelas = tb_kelas.id_kelas 
                    WHERE data_siswa.username= '$username' AND kode_kelas.kode_kelas ='$pass' ");

  if(mysqli_num_rows($qry)===1){
    $cek = mysqli_fetch_assoc($qry);

    $_SESSION["masuk"] = true;
    $_SESSION["username"] = $cek["username"];
    $_SESSION["nama"] = $cek["nama"];
    $_SESSION["kelas"] = $cek["nama_kelas"];
    $_SESSION["id_kelas"] = $cek["id_kelas"];
    $_SESSION["kode"] = $cek["kode_kelas"];

    header('location: absensi-kehadiran.php');
  }
  $error=true;
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
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
body {
    background-color: #0A2D64;
}
</style>

<body>


    <img class="img-login" src="assets/img/logosmkn12.png" alt="" srcset="">
    <b>
        <h2 class="h2-login">ABSENSI SISWA</h2>
    </b>

    <div class="card card-login">
        <div class="card-body">
            <b>
                <h2 class="h2-masuk">MASUK</h2>
            </b>
            <hr class="hr-login">
            <br><br>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" name="kode" class="form-control" placeholder="Kode Kelas">
                </div>
                <br><br>
                <center><button name="masuk" type="submit" class=" buton-login">Submit</button></center>
            </form>
            <br>
        </div>
    </div>

    <br><br>







    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>