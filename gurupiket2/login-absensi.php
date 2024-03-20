<?php 

session_start();
require 'config/function.php';
require 'config/connection.php';

global $conn;

if(isset($_POST["submit"])){
    $nip = $_POST["nip"];
    $kode_hari = $_POST["kode_hari"];

    $cek = mysqli_query($conn,"SELECT * from data_guru inner join kode_hari WHERE data_guru.nip= '$nip' AND kode_hari.kode ='$kode_hari'");
    if(mysqli_num_rows($cek)===1){
        $row = mysqli_fetch_assoc($cek);

        $_SESSION['submit']= true;
        $_SESSION['foto']=$row['foto'];
        $_SESSION['nama']=$row['nama'];
        $_SESSION['nip']=$row['nip'];
        $_SESSION['kode_hari']=$row['kode'];

        header('location: index.php');

    }

    $error=true;

}
?>

<?php if(isset($error)): ?>
  <script>
    alert('nip atau password tidak sesuai')
  </script>
<?php endif?>


<!DOCTYPE html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

</head>

<body class="sb-nav-fixed">


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <img class="profile-user rounded-circle" src="assets/img/logodubes.png" alt="">
                       <center> <p class="ket-accordion">VISI :

                                “ Menghasilkan Tamatan Yang Berakhlak Mulia Dan Memiliki Pengetahuan

                                Serta Keterampilan Yang Berkualitas.”<br><br>

                                MISI :

                                “ Memberikan Kontribusi Nyata Dalam Menghasilkan Tenaga Kerja Siap

                                Kerja Yang Profesional Melalui Taqwa Terhadap Tuhan Yang Maha Esa,

                                Disiplin, Jujur, Toleransi, Kasih Sayang, Tekun, Adil, Tanggung Jawab,

                                dan Terampil.”
                        </p> </center>
                    </div>
                </div>
            </nav>
        </div>



        <div id="layoutSidenav_content">
            <main>
                <img src="../gurupiket2/assets/img/logodubes.png" class="logo-dubes" alt="">
                <div class="container">
                    <p class="judul-login">LOGIN</p>
                    <p class="bawah-login">Selamat datang, Silahkan LOGIN terlebih dahulu!!</p>
                    <div class="container jumbotron col-8">
                        <form  method="POST">
                            <div class="form-group">
                                <input type="number" name="nip" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP">
                            </div>
                            <div class="form-group">

                                <input type="password" name="kode_hari" id="pass" class="form-control" placeholder="MASUKKAN KODE">
                                <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                                <i id="mybutton" onclick="change()" class="input-group-text sb-nav-fixed">

                                    <!-- icon mata bawaan bootstrap  -->
                                    <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg> -->
                                </i>


                            </div>
                            <br>
                            <center><button type="submit" name="submit" class="btn btn-primary">MASUK</button></center>
                        </form>
                    </div>

                    <script>
                            function haraplogin(){
                                if('<?= isset($_SESSION['harap_login'])&& $_SESSION['harap_login']===true; ?>'){
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Terjadi kesalahan',
                                        text: 'Harap login terlebih dahulu!',
                                    })
                                    <?php unset($_SESSION['harap_login']);?>
                                
                                }
                            }
                    </script>

                    <!-- <script>
                        // membuat fungsi change
                        function change() {

                            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password 
                            var x = document.getElementById('pass').type;

                            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
                            if (x == 'password') {

                                //ubah form input password menjadi text
                                document.getElementById('pass').type = 'text';

                                //ubah icon mata terbuka menjadi tertutup
                                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                                            <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                                            </svg>`;
                            } else {

                                //ubah form input password menjadi text
                                document.getElementById('pass').type = 'password';

                                //ubah icon mata terbuka menjadi tertutup
                                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                                            <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                                            </svg>`;
                            }
                        }
                    </script> -->

                </div>

            </main>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>