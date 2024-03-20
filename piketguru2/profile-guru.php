
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        label {
            text-decoration: underline;
            cursor: pointer;
        }
    </style>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php
    require "config/connection.php";
    $query1 = mysqli_query($conn, "SELECT * FROM regis_admin");
    ?>


    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
        <?php include "navbar.php"; ?>
       
        </div>
        <div class="h">

            <h1 id="h2">Profile Guru</h1>
        </div>

        <img id="img2" src="assets/img/logosmkn12.png" alt="" srcset="">
        <img src="assets/Vector (1).png" alt="" srcset="" style=" margin-left:315px; margin-top: 63px; position: absolute; top: 0; left: 0;" alt="Logo">
        <hr id="hr1" style="border-color: black;">

        <span style="height: 5px; background: black; display: block;"></span>
        <div id="layoutSidenav_content">
            
            <?php
            $ID = $_GET['id'];
            $query2 = mysqli_query($conn, "SELECT * from data_guru join kode_hari ON data_guru.id_hari=kode_hari.id_hari JOIN tb_kejuruan ON data_guru.id_kejuruan = tb_kejuruan.id_kejuruan AND id= '$ID' ");
            ?>

            <div id="cont2" class="container">

                <div class="row " style="margin-left: -20px;">
                    <div class="col">
                        <table class="table table-profguru">
                            <?php foreach ($query2 as $data) : ?>
                                <tr>
                                    <th>Nama</th>
                                </tr>
                                <tr>
                                    <td><?= $data['nama']; ?></td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                </tr>
                                <tr>
                                    <td><?= $data['nip']; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                </tr>
                                <tr>
                                    <td><?= $data['email']; ?></td>
                                </tr>
                                <tr>
                                    <th>Kode Hari</th>
                                </tr>
                                <tr>
                                    <td><?= $data['kode']; ?></td>
                                </tr>
                                <tr>
                                    <th>Jurusan</th>
                                </tr>
                                <tr>
                                    <td><?= $data['nama_kejuruan']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                    </div>


                    <div id="col2" class="col col d-flex justify-content-center">
                        <div class="container">
                            <img src="assets/imgregis-guru/<?= $data['foto']; ?>" id="profile" class="profile mb-3">
                            <br>
                            <!-- <a href="update-guru.php?id=<?= $data['id'];?>" class="btn btn-edit btn-success"><p class="mt-2">Edit Profil</p></a> -->
                            
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
</body>

</html>