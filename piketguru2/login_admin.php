<?php 

session_start();
require 'config/function.php';
require 'config/connection.php';

global $conn;

if(isset($_POST["login"])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];

    $cek = mysqli_query($conn,"SELECT * FROM regis_admin WHERE email='$email' AND password ='$pass'");
    if(mysqli_num_rows($cek)===1){
        $row = mysqli_fetch_assoc($cek);

        $_SESSION['login']= true;
        $_SESSION['email']=$row['email'];
        $_SESSION['pass']=$row['pass'];
        $_SESSION['nama']=$row['nama'];

        header('location: index.php');

    }

    $error=true;

}
?>

<?php if(isset($error)): ?>
<script>
alert('Username atau password tidak sesuai')
</script>
<?php endif?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <title>LOGIN - Admin</title>
    <link rel="icon" href="assets/img/logosmkn12.png">
    <link rel="stylesheet" href="css/style.css">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #0A2D64;
        color: white;
    }
    </style>
</head>

<body>

    <div class="container">
        <img class="img-login" src="../piketguru/assets/img/logosmkn12.png" alt="">
        <p class="judul-login mt-5">LOGIN</p>
        <hr class="hr-login">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control input-login" name="email" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control input-login" name="pass" id="exampleInputPassword1">
                    </div>
                    <center><button type="submit" name="login" class="btn btn-primary btn-login">Login</button></center>
                </form>

            </div>
            <div class="col"></div>
        </div>

    </div>

    <script src="sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script>
    function haraplogin() {
        if ('<?= isset($_SESSION['harap_login'])&& $_SESSION['harap_login']===true; ?>') {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi kesalahan',
                text: 'Harap login terlebih dahulu!',
            })
            <?php unset($_SESSION['harap_login']);?>

        }
    }
    </script>

    <script>
    $(document).ready(function() {
        haraplogin();
    });
    </script>

</body>

</html>